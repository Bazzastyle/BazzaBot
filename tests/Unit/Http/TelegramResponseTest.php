<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Http;

use Bazzastyle\BazzaBot\Exception\TelegramApiException;
use Bazzastyle\BazzaBot\Http\TelegramResponse;
use PHPUnit\Framework\TestCase;

final class TelegramResponseTest extends TestCase
{
    public function testParsesOkResponse(): void
    {
        $response = TelegramResponse::fromJson('{"ok":true,"result":{"message_id":1}}');

        self::assertTrue($response->ok);
        self::assertFalse($response->isRateLimited());
        self::assertNull($response->getRetryAfter());
    }

    public function testParsesRateLimitedResponse(): void
    {
        $response = TelegramResponse::fromJson(
            '{"ok":false,"error_code":429,"description":"Too Many Requests","parameters":{"retry_after":5}}',
        );

        self::assertFalse($response->ok);
        self::assertTrue($response->isRateLimited());
        self::assertSame(5, $response->getRetryAfter());
    }

    public function testThrowIfErrorThrowsOnFailure(): void
    {
        $response = TelegramResponse::fromJson('{"ok":false,"error_code":400,"description":"Bad Request"}');

        $this->expectException(TelegramApiException::class);
        $response->throwIfError('sendMessage', ['chat_id' => 1]);
    }

    public function testThrowIfErrorReturnsSelfWhenOk(): void
    {
        $response = TelegramResponse::fromJson('{"ok":true}');

        self::assertSame($response, $response->throwIfError());
    }

    public function testMalformedJsonYieldsNotOk(): void
    {
        $response = TelegramResponse::fromJson('not json');

        self::assertFalse($response->ok);
    }
}
