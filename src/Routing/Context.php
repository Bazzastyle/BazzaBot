<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Routing;

use Bazzastyle\BazzaBot\Http\TelegramClient;
use Bazzastyle\BazzaBot\Update\Update;
use Psr\Log\LoggerInterface;

/**
 * Carries the current Update through the middleware pipeline and into the
 * resolved handler. The attributes bag lets middleware pass data downstream
 * (e.g. a user record loaded from the database).
 */
final class Context
{
    private array $attributes = [];
    private bool $propagationStopped = false;

    public function __construct(
        public readonly Update $update,
        public readonly TelegramClient $client,
        public readonly LoggerInterface $logger,
    ) {
    }

    public function set(string $key, mixed $value): void
    {
        $this->attributes[$key] = $value;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->attributes[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * Stops the middleware pipeline: no further middleware or the terminal
     * handler will run for this update.
     */
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}
