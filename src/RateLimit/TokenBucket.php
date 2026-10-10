<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\RateLimit;

/**
 * Classic token bucket: refills continuously at $refillPerSecond up to
 * $capacity, and consumes tokens on demand. Single-process, in-memory —
 * sufficient for a single bot worker; sharing across processes is not
 * required by this framework.
 */
final class TokenBucket
{
    private float $tokens;
    private float $lastRefillMicrotime;

    public function __construct(
        private readonly float $capacity,
        private readonly float $refillPerSecond,
    ) {
        $this->tokens = $capacity;
        $this->lastRefillMicrotime = microtime(true);
    }

    public function tryConsume(float $count = 1.0): bool
    {
        $this->refill();

        if ($this->tokens >= $count) {
            $this->tokens -= $count;

            return true;
        }

        return false;
    }

    /**
     * Seconds to wait before $count tokens would be available, without
     * actually consuming them. Returns 0.0 if available right now.
     */
    public function waitTime(float $count = 1.0): float
    {
        $this->refill();

        if ($this->tokens >= $count) {
            return 0.0;
        }

        $missing = $count - $this->tokens;

        return $this->refillPerSecond > 0 ? $missing / $this->refillPerSecond : 0.0;
    }

    /**
     * Blocks (usleep) until $count tokens are available, then consumes them.
     */
    public function waitAndConsume(float $count = 1.0): void
    {
        while (!$this->tryConsume($count)) {
            $wait = $this->waitTime($count);
            if ($wait > 0) {
                usleep((int) ceil($wait * 1_000_000));
            }
        }
    }

    private function refill(): void
    {
        $now = microtime(true);
        $elapsed = $now - $this->lastRefillMicrotime;
        if ($elapsed <= 0) {
            return;
        }

        $this->tokens = min($this->capacity, $this->tokens + $elapsed * $this->refillPerSecond);
        $this->lastRefillMicrotime = $now;
    }
}
