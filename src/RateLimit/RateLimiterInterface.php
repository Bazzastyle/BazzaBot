<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\RateLimit;

use Bazzastyle\BazzaBot\Http\TelegramResponse;

interface RateLimiterInterface
{
    /**
     * Blocks (if necessary) until it is safe to send a request for the given chat.
     * Pass $chatId = null for calls that are not tied to a specific chat (e.g. getMe).
     */
    public function acquire(int|string|null $chatId, bool $isGroup): void;

    /**
     * Inspects a Telegram response and, if it is a 429, records a penalty window
     * for the given chat so subsequent acquire() calls wait accordingly.
     */
    public function onResponse(int|string|null $chatId, TelegramResponse $response): void;
}
