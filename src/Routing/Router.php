<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Routing;

use Bazzastyle\BazzaBot\Update\UpdateType;

/**
 * Minimal dispatcher (command, callback_data, update type, text/fallback)
 * fronted by an onion-style middleware pipeline. All registration happens
 * in userland (the consuming bot) — the framework core never scans the
 * filesystem for handlers.
 *
 * Command matching is independent of Update::isCommand()/getCommand() (which
 * only recognise Telegram's own "/command" bot_command entity): the Router
 * has its own configurable list of trigger symbols, so a bot can also route
 * on "." or "#" (or any other prefix) for plain-text pseudo-commands.
 */
final class Router
{
    /** @var array<string, callable(Context, string): void> */
    private array $commandHandlers = [];

    /** @var array<string, callable(Context): void> */
    private array $callbackHandlers = [];

    /** @var array<int, array{0: string, 1: callable(Context): void}> */
    private array $callbackPatternHandlers = [];

    /** @var array<string, callable(Context): void> keyed by UpdateType::value */
    private array $updateTypeHandlers = [];

    /** @var callable(Context): void|null */
    private $textHandler;

    /** @var callable(Context): void|null */
    private $fallbackHandler;

    /** @var MiddlewareInterface[] */
    private array $middlewares = [];

    private readonly string $commandPattern;
    private readonly string $prefixCharMask;

    /**
     * @param array<int, string> $commandPrefixes symbols that trigger command
     *        matching, e.g. ['/'] (Telegram's own convention) or ['/', '.', '#']
     *        to also accept ".ban"/"#ban" as plain-text pseudo-commands.
     *        Defaults to ['/'] if empty/unset.
     */
    public function __construct(array $commandPrefixes = ['/'])
    {
        $prefixes = array_values(array_unique(array_filter(
            $commandPrefixes,
            static fn (string $prefix): bool => $prefix !== '',
        )));

        if ($prefixes === []) {
            $prefixes = ['/'];
        }

        // Longest first, so a prefix that is itself a prefix of another
        // configured prefix (unlikely, but possible) never wins by accident.
        usort($prefixes, static fn (string $a, string $b): int => strlen($b) <=> strlen($a));

        $alternation = implode('|', array_map(
            static fn (string $prefix): string => preg_quote($prefix, '#'),
            $prefixes,
        ));

        $this->commandPattern = '#^(?:' . $alternation . ')([a-zA-Z0-9_]+)(?:@\S+)?(?:\s+(.*))?$#su';
        $this->prefixCharMask = implode('', array_filter($prefixes, static fn (string $p): bool => strlen($p) === 1));
    }

    /**
     * Registers a handler for a command name, WITHOUT its prefix (e.g.
     * "ban", not "/ban" or ".ban") — the same handler fires regardless of
     * which configured prefix symbol the user actually typed.
     *
     * @param callable(Context, string): void $handler receives the raw text
     *        after the command name (e.g. "/ban @mario spam" -> "@mario spam"),
     *        so splitting it into distinct arguments (a mention, a reason, ...)
     *        is up to the handler.
     */
    public function command(string $name, callable $handler): static
    {
        $this->commandHandlers[ltrim($name, $this->prefixCharMask)] = $handler;

        return $this;
    }

    /** @param callable(Context): void $handler exact callback_data match */
    public function callback(string $exactData, callable $handler): static
    {
        $this->callbackHandlers[$exactData] = $handler;

        return $this;
    }

    /**
     * Registers a fnmatch()-style wildcard pattern (e.g. "menu:*") against
     * callback_data. Patterns are tried in registration order.
     *
     * @param callable(Context): void $handler
     */
    public function callbackPattern(string $pattern, callable $handler): static
    {
        $this->callbackPatternHandlers[] = [$pattern, $handler];

        return $this;
    }

    /**
     * Registers a handler for a whole Telegram update type (poll, my_chat_member,
     * chat_join_request, inline_query, ...) — for update kinds that don't fit
     * the command/callback model. One handler per type; the last call for a
     * given type wins. Tried after command/callback matching (so a command
     * still takes priority for message updates) but before onText()/fallback().
     * See examples/updates/ for one file per type.
     *
     * @param callable(Context): void $handler
     */
    public function onUpdateType(UpdateType $type, callable $handler): static
    {
        $this->updateTypeHandlers[$type->value] = $handler;

        return $this;
    }

    /** @param callable(Context): void $handler fallback for non-command text messages */
    public function onText(callable $handler): static
    {
        $this->textHandler = $handler;

        return $this;
    }

    /** @param callable(Context): void $handler last-resort handler if nothing else matched */
    public function fallback(callable $handler): static
    {
        $this->fallbackHandler = $handler;

        return $this;
    }

    public function middleware(MiddlewareInterface $middleware): static
    {
        $this->middlewares[] = $middleware;

        return $this;
    }

    public function dispatch(Context $context): void
    {
        $terminal = function (Context $context): void {
            if (!$context->isPropagationStopped()) {
                $this->route($context);
            }
        };

        $chain = array_reduce(
            array_reverse($this->middlewares),
            static fn (\Closure $next, MiddlewareInterface $middleware): \Closure
                => static function (Context $context) use ($middleware, $next): void {
                    if (!$context->isPropagationStopped()) {
                        $middleware->process($context, $next);
                    }
                },
            $terminal,
        );

        $chain($context);
    }

    private function route(Context $context): void
    {
        $update = $context->update;
        $text = $update->getText();

        if ($text !== null) {
            $match = $this->matchCommand($text);
            if ($match !== null && isset($this->commandHandlers[$match[0]])) {
                ($this->commandHandlers[$match[0]])($context, $match[1]);

                return;
            }
        }

        $callbackData = $update->getCallbackData();
        if ($callbackData !== null) {
            if (isset($this->callbackHandlers[$callbackData])) {
                ($this->callbackHandlers[$callbackData])($context);

                return;
            }

            foreach ($this->callbackPatternHandlers as [$pattern, $handler]) {
                if (fnmatch($pattern, $callbackData)) {
                    $handler($context);

                    return;
                }
            }
        }

        if (isset($this->updateTypeHandlers[$update->type->value])) {
            ($this->updateTypeHandlers[$update->type->value])($context);

            return;
        }

        if ($text !== null && $this->textHandler !== null) {
            ($this->textHandler)($context);

            return;
        }

        if ($this->fallbackHandler !== null) {
            ($this->fallbackHandler)($context);
        }
    }

    /**
     * @return array{0: string, 1: string}|null [commandName, rawArgs] — e.g. for
     *         "/ban @mario spam" -> ['ban', '@mario spam']; for "/ban" alone -> ['ban', '']
     */
    private function matchCommand(string $text): ?array
    {
        if (!preg_match($this->commandPattern, $text, $matches)) {
            return null;
        }

        return [$matches[1], isset($matches[2]) ? trim($matches[2]) : ''];
    }
}
