<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\RateLimit;

use Bazzastyle\BazzaBot\Http\TelegramResponse;

/**
 * Enforces the three limits documented by Telegram
 * (https://core.telegram.org/bots/faq#my-bot-is-hitting-limits-how-do-i-avoid-this):
 * a global cap, a per-chat cap, and a per-group cap. Also honours the
 * `retry_after` Telegram returns on HTTP 429 by freezing the offending
 * chat for that many seconds.
 */
final class TelegramRateLimiter implements RateLimiterInterface
{
    private readonly TokenBucket $global;

    /** @var array<int|string, TokenBucket> */
    private array $perChat = [];

    /** @var array<int|string, TokenBucket> */
    private array $perGroup = [];

    /** @var array<int|string, float> chatId => microtime until which sending is paused */
    private array $penaltyUntil = [];

    public function __construct(
        private readonly float $globalPerSecond = 30.0,
        private readonly float $chatPerSecond = 1.0,
        private readonly float $groupPerMinute = 20.0,
    ) {
        $this->global = new TokenBucket($this->globalPerSecond, $this->globalPerSecond);
    }

    public function acquire(int|string|null $chatId, bool $isGroup): void
    {
        if ($chatId !== null) {
            $this->waitOutPenalty($chatId);
        }

        $this->global->waitAndConsume();

        if ($chatId === null) {
            return;
        }

        $this->chatBucket($chatId)->waitAndConsume();

        if ($isGroup) {
            $this->groupBucket($chatId)->waitAndConsume();
        }
    }

    public function onResponse(int|string|null $chatId, TelegramResponse $response): void
    {
        if ($chatId === null || !$response->isRateLimited()) {
            return;
        }

        $retryAfter = $response->getRetryAfter() ?? 1;
        $this->penaltyUntil[$chatId] = microtime(true) + $retryAfter;
    }

    private function waitOutPenalty(int|string $chatId): void
    {
        $until = $this->penaltyUntil[$chatId] ?? null;
        if ($until === null) {
            return;
        }

        $remaining = $until - microtime(true);
        if ($remaining > 0) {
            usleep((int) ceil($remaining * 1_000_000));
        }

        unset($this->penaltyUntil[$chatId]);
    }

    private function chatBucket(int|string $chatId): TokenBucket
    {
        return $this->perChat[$chatId] ??= new TokenBucket($this->chatPerSecond, $this->chatPerSecond);
    }

    private function groupBucket(int|string $chatId): TokenBucket
    {
        return $this->perGroup[$chatId] ??= new TokenBucket($this->groupPerMinute, $this->groupPerMinute / 60);
    }
}
