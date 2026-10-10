<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Log;

use Bazzastyle\BazzaBot\Http\TelegramClient;
use Psr\Log\{AbstractLogger, LogLevel};

/**
 * Sends log entries at or above $minLevel to a Telegram chat, for
 * at-a-glance visibility of critical errors. Fire-and-forget: if sending
 * itself fails, it is swallowed — a logger must never crash the app it is
 * logging for, nor loop back into itself.
 */
final class TelegramLogHandler extends AbstractLogger
{
    public function __construct(
        private readonly TelegramClient $client,
        private readonly int|string $chatId,
        private readonly string $minLevel = LogLevel::CRITICAL,
    ) {
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $level = (string) $level;
        if (!LogSupport::atLeast($level, $this->minLevel)) {
            return;
        }

        try {
            $this->client->sendMessage(
                $this->chatId,
                $this->formatHtml($level, (string) $message, $context),
                parse_mode: 'HTML',
            );
        } catch (\Throwable) {
            // Swallow: never let logging itself take down the bot.
        }
    }

    /** @param array<string, mixed> $context */
    private function formatHtml(string $level, string $message, array $context): string
    {
        $lines = [
            sprintf('<b>%s</b> — %s', strtoupper($level), htmlspecialchars(date('c'), ENT_QUOTES)),
            htmlspecialchars($message, ENT_QUOTES),
        ];

        $safeContext = LogSupport::sanitizeContext($context);
        if ($safeContext !== []) {
            $encoded = json_encode($safeContext, JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR) ?: '';
            $lines[] = '<pre>' . htmlspecialchars($encoded, ENT_QUOTES) . '</pre>';
        }

        // Telegram messages are capped at 4096 characters.
        return mb_substr(implode("\n", $lines), 0, 4096);
    }
}
