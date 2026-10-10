<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\RateLimit;

use Bazzastyle\BazzaBot\RateLimit\TokenBucket;
use PHPUnit\Framework\TestCase;

final class TokenBucketTest extends TestCase
{
    public function testConsumesUpToCapacityThenRejects(): void
    {
        $bucket = new TokenBucket(3.0, 1.0);

        self::assertTrue($bucket->tryConsume());
        self::assertTrue($bucket->tryConsume());
        self::assertTrue($bucket->tryConsume());
        self::assertFalse($bucket->tryConsume());
    }

    public function testRefillsOverTime(): void
    {
        $bucket = new TokenBucket(1.0, 10.0); // 10 tokens/sec => ~100ms per token

        self::assertTrue($bucket->tryConsume());
        self::assertFalse($bucket->tryConsume());

        usleep(150_000);

        self::assertTrue($bucket->tryConsume());
    }

    public function testWaitTimeIsZeroWhenTokensAreAvailable(): void
    {
        $bucket = new TokenBucket(5.0, 5.0);

        self::assertSame(0.0, $bucket->waitTime());
    }

    public function testWaitTimeIsPositiveWhenExhausted(): void
    {
        $bucket = new TokenBucket(1.0, 2.0);
        $bucket->tryConsume();

        self::assertGreaterThan(0.0, $bucket->waitTime());
    }
}
