<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Log;

use Bazzastyle\BazzaBot\Exception\ConfigException;
use Psr\Log\{AbstractLogger, LogLevel};

/**
 * Writes structured, Monolog-like lines to a file:
 * "[2026-07-19T10:00:00+02:00] bot.ERROR: message {"key":"value"}"
 */
final class FileLogger extends AbstractLogger
{
    public function __construct(
        private readonly string $filePath,
        private readonly string $channel = 'bot',
        private readonly string $minLevel = LogLevel::DEBUG,
    ) {
        $dir = dirname($filePath);
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            throw new ConfigException(sprintf('Unable to create log directory: %s', $dir));
        }
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $level = (string) $level;
        if (!LogSupport::atLeast($level, $this->minLevel)) {
            return;
        }

        file_put_contents($this->filePath, $this->formatLine($level, (string) $message, $context), FILE_APPEND | LOCK_EX);
    }

    /** @param array<string, mixed> $context */
    private function formatLine(string $level, string $message, array $context): string
    {
        $safeContext = LogSupport::sanitizeContext($context);
        $interpolated = $this->interpolate($message, $safeContext);
        $contextJson = $safeContext !== [] ? ' ' . json_encode($safeContext, JSON_UNESCAPED_SLASHES) : '';

        return sprintf(
            "[%s] %s.%s: %s%s\n",
            date('c'),
            $this->channel,
            strtoupper($level),
            $interpolated,
            $contextJson,
        );
    }

    /** @param array<string, scalar|null> $context */
    private function interpolate(string $message, array $context): string
    {
        if (!str_contains($message, '{')) {
            return $message;
        }

        $replace = [];
        foreach ($context as $key => $value) {
            $replace['{' . $key . '}'] = (string) $value;
        }

        return strtr($message, $replace);
    }
}
