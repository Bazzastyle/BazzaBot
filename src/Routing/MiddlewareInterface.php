<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Routing;

/**
 * Onion-style middleware (simplified PSR-15, no HTTP message dependency:
 * an Update is not an HTTP request). Call $next($context) to continue the
 * pipeline, or simply don't (or call $context->stopPropagation()) to
 * short-circuit it.
 */
interface MiddlewareInterface
{
    public function process(Context $context, \Closure $next): void;
}
