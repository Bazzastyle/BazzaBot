<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Support;

use Bazzastyle\BazzaBot\Routing\{Context, MiddlewareInterface};

/**
 * Test double: wraps a closure as a MiddlewareInterface so tests can assert
 * on ordering/short-circuiting without declaring a new class per case.
 */
final class CallableMiddleware implements MiddlewareInterface
{
    public function __construct(private readonly \Closure $callback)
    {
    }

    public function process(Context $context, \Closure $next): void
    {
        ($this->callback)($context, $next);
    }
}
