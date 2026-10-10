<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Log;

use Psr\Log\LogLevel;

/**
 * Small internal helpers shared by FileLogger and TelegramLogHandler:
 * PSR-3 level ordering, and making log context safe to serialize (never
 * dump a raw Throwable/object into JSON or HTML output).
 */
final class LogSupport
{
    private const PRIORITIES = [
        LogLevel::EMERGENCY => 0,
        LogLevel::ALERT => 1,
        LogLevel::CRITICAL => 2,
        LogLevel::ERROR => 3,
        LogLevel::WARNING => 4,
        LogLevel::NOTICE => 5,
        LogLevel::INFO => 6,
        LogLevel::DEBUG => 7,
    ];

    private function __construct()
    {
    }

    public static function atLeast(string $level, string $minLevel): bool
    {
        return self::priority($level) <= self::priority($minLevel);
    }

    private static function priority(string $level): int
    {
        return self::PRIORITIES[$level] ?? self::PRIORITIES[LogLevel::INFO];
    }

    /**
     * @param array<string, mixed> $context
     * @return array<string, scalar|null>
     */
    public static function sanitizeContext(array $context): array
    {
        $out = [];
        foreach ($context as $key => $value) {
            $out[$key] = match (true) {
                $value instanceof \Throwable => sprintf('%s: %s', $value::class, $value->getMessage()),
                is_scalar($value) || $value === null => $value,
                $value instanceof \Stringable => (string) $value,
                default => '(' . get_debug_type($value) . ')',
            };
        }

        return $out;
    }
}
