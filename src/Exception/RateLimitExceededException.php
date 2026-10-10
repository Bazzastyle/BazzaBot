<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

/**
 * Thrown when Telegram keeps responding 429 beyond the configured retry budget.
 */
class RateLimitExceededException extends BazzabotException
{
    public function __construct(
        private readonly int|string $chatId,
        private readonly int $attempts,
        int $retryAfter,
    ) {
        parent::__construct(
            sprintf(
                'Rate limit exceeded for chat %s after %d attempt(s), Telegram asked to retry after %ds',
                (string) $chatId,
                $attempts,
                $retryAfter,
            ),
        );
    }

    public function getChatId(): int|string
    {
        return $this->chatId;
    }

    public function getAttempts(): int
    {
        return $this->attempts;
    }
}
