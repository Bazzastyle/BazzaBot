<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Routing;

use Bazzastyle\BazzaBot\Http\TelegramClient;
use Bazzastyle\BazzaBot\RateLimit\TelegramRateLimiter;
use Bazzastyle\BazzaBot\Routing\{Context, Router};
use Bazzastyle\BazzaBot\Tests\Support\CallableMiddleware;
use Bazzastyle\BazzaBot\Update\{Update, UpdateType};
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

final class RouterTest extends TestCase
{
    public function testDispatchesMatchingCommandWithArgs(): void
    {
        $router = new Router();
        $received = null;

        $router->command('start', function (Context $context, string $args) use (&$received): void {
            $received = $args;
        });

        $router->dispatch($this->makeContext($this->messageUpdate()));

        self::assertSame('hello world', $received);
    }

    public function testArgsCaptureWorksForMentionsAndPlainTextAndNoArgs(): void
    {
        $router = new Router();
        $received = [];

        $router->command('ban', function (Context $context, string $args) use (&$received): void {
            $received[] = $args;
        });

        $router->dispatch($this->makeContext($this->textUpdate('/ban @username')));
        $router->dispatch($this->makeContext($this->textUpdate('/ban testo libero')));
        $router->dispatch($this->makeContext($this->textUpdate('/ban')));

        self::assertSame(['@username', 'testo libero', ''], $received);
    }

    public function testCustomPrefixesTriggerTheSameHandler(): void
    {
        $router = new Router(['/', '.', '#']);
        $received = [];

        $router->command('ban', function (Context $context, string $args) use (&$received): void {
            $received[] = $args;
        });

        $router->dispatch($this->makeContext($this->textUpdate('/ban @mario spam')));
        $router->dispatch($this->makeContext($this->textUpdate('.ban @mario spam')));
        $router->dispatch($this->makeContext($this->textUpdate('#ban @mario spam')));

        self::assertSame(['@mario spam', '@mario spam', '@mario spam'], $received);
    }

    public function testPrefixNotInConfiguredListIsNotTreatedAsCommand(): void
    {
        $router = new Router(['/']);
        $called = false;

        $router->command('ban', function () use (&$called): void {
            $called = true;
        });

        $router->dispatch($this->makeContext($this->textUpdate('.ban @mario')));

        self::assertFalse($called);
    }

    public function testDispatchesRegisteredUpdateTypeHandler(): void
    {
        $router = new Router();
        $received = null;

        $router->onUpdateType(UpdateType::Poll, function (Context $context) use (&$received): void {
            $received = $context->update->raw->poll->id;
        });

        $router->dispatch($this->makeContext($this->pollUpdate()));

        self::assertSame('poll-1', $received);
    }

    public function testCommandTakesPriorityOverUpdateTypeHandlerForMessages(): void
    {
        $router = new Router();
        $order = [];

        $router->onUpdateType(UpdateType::Message, function () use (&$order): void {
            $order[] = 'update-type';
        });
        $router->command('start', function () use (&$order): void {
            $order[] = 'command';
        });

        $router->dispatch($this->makeContext($this->messageUpdate()));

        self::assertSame(['command'], $order);
    }

    public function testUpdateTypeHandlerFiresBeforeOnTextForNonCommandMessages(): void
    {
        $router = new Router();
        $order = [];

        $router->onText(function () use (&$order): void {
            $order[] = 'text';
        });
        $router->onUpdateType(UpdateType::Message, function () use (&$order): void {
            $order[] = 'update-type';
        });

        $router->dispatch($this->makeContext($this->textUpdate('just a plain message')));

        self::assertSame(['update-type'], $order);
    }

    public function testDispatchesMatchingCallbackPattern(): void
    {
        $router = new Router();
        $received = null;

        $router->callbackPattern('menu:*', function (Context $context) use (&$received): void {
            $received = $context->update->getCallbackData();
        });

        $router->dispatch($this->makeContext($this->callbackUpdate()));

        self::assertSame('menu:main', $received);
    }

    public function testStopPropagationPreventsHandlerExecution(): void
    {
        $router = new Router();
        $handlerCalled = false;

        $router->middleware(new CallableMiddleware(function (Context $context, \Closure $next): void {
            $context->stopPropagation();
        }));
        $router->command('start', function () use (&$handlerCalled): void {
            $handlerCalled = true;
        });

        $router->dispatch($this->makeContext($this->messageUpdate()));

        self::assertFalse($handlerCalled);
    }

    public function testMiddlewareRunsInOrderAndSharesContextData(): void
    {
        $router = new Router();
        $order = [];

        $router->middleware(new CallableMiddleware(function (Context $context, \Closure $next) use (&$order): void {
            $order[] = 'first';
            $context->set('user', 'mario');
            $next($context);
        }));
        $router->middleware(new CallableMiddleware(function (Context $context, \Closure $next) use (&$order): void {
            $order[] = 'second';
            $next($context);
        }));
        $router->command('start', function (Context $context) use (&$order): void {
            $order[] = 'handler:' . $context->get('user');
        });

        $router->dispatch($this->makeContext($this->messageUpdate()));

        self::assertSame(['first', 'second', 'handler:mario'], $order);
    }

    private function messageUpdate(): Update
    {
        return Update::fromJson((string) file_get_contents(__DIR__ . '/../../Fixtures/update-message.json'));
    }

    private function callbackUpdate(): Update
    {
        return Update::fromJson((string) file_get_contents(__DIR__ . '/../../Fixtures/update-callback.json'));
    }

    private function textUpdate(string $text): Update
    {
        return Update::fromJson((string) json_encode([
            'update_id' => 999,
            'message' => [
                'message_id' => 1,
                'date' => 0,
                'chat' => ['id' => 111, 'type' => 'private'],
                'from' => ['id' => 111, 'is_bot' => false, 'first_name' => 'T'],
                'text' => $text,
            ],
        ]));
    }

    private function pollUpdate(): Update
    {
        return Update::fromJson((string) json_encode([
            'update_id' => 998,
            'poll' => [
                'id' => 'poll-1',
                'question' => 'Pizza o pasta?',
                'options' => [],
                'total_voter_count' => 0,
                'is_closed' => false,
                'is_anonymous' => true,
                'type' => 'regular',
                'allows_multiple_answers' => false,
            ],
        ]));
    }

    private function makeContext(Update $update): Context
    {
        $client = new TelegramClient('test-token', new TelegramRateLimiter(), new NullLogger());

        return new Context($update, $client, new NullLogger());
    }
}
