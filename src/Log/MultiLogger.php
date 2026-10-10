<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Log;

use Psr\Log\{AbstractLogger, LoggerInterface};

/**
 * Fans a single log call out to several loggers (typically FileLogger +
 * TelegramLogHandler).
 */
final class MultiLogger extends AbstractLogger
{
    /** @param LoggerInterface[] $loggers */
    public function __construct(private readonly array $loggers)
    {
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message, $context);
        }
    }
}
