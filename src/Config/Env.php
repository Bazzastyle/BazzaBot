<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Config;

use Bazzastyle\BazzaBot\Exception\ConfigException;

/**
 * Minimal dependency-free .env parser. Supports KEY=VALUE, single/double
 * quoting, "#" comments and blank lines. No variable interpolation on
 * purpose — it is not required and keeps the parser small and predictable.
 */
final class Env
{
    /**
     * @return array<string, string>
     */
    public static function load(string $path): array
    {
        if (!is_file($path) || !is_readable($path)) {
            throw new ConfigException(sprintf('Env file not found or not readable: %s', $path));
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            throw new ConfigException(sprintf('Unable to read env file: %s', $path));
        }

        $values = [];
        foreach ($lines as $line) {
            $parsed = self::parseLine($line);
            if ($parsed !== null) {
                [$key, $value] = $parsed;
                $values[$key] = $value;
            }
        }

        return $values;
    }

    /**
     * @return array{0: string, 1: string}|null
     */
    private static function parseLine(string $line): ?array
    {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#')) {
            return null;
        }

        if (!str_contains($line, '=')) {
            return null;
        }

        [$key, $rawValue] = explode('=', $line, 2);
        $key = trim($key);
        if ($key === '' || !preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $key)) {
            return null;
        }

        $value = trim($rawValue);

        // Strip inline comments only when the value is NOT quoted.
        if ($value !== '' && $value[0] !== '"' && $value[0] !== "'") {
            $hashPos = strpos($value, ' #');
            if ($hashPos !== false) {
                $value = rtrim(substr($value, 0, $hashPos));
            }
        }

        $value = self::unquote($value);

        return [$key, $value];
    }

    private static function unquote(string $value): string
    {
        $length = strlen($value);
        if ($length >= 2 && $value[0] === '"' && $value[$length - 1] === '"') {
            $inner = substr($value, 1, -1);
            return str_replace(['\\n', '\\"', '\\\\'], ["\n", '"', '\\'], $inner);
        }

        if ($length >= 2 && $value[0] === "'" && $value[$length - 1] === "'") {
            return substr($value, 1, -1);
        }

        return $value;
    }

    /**
     * @param array<string, string> $vars
     */
    public static function putIntoEnvironment(array $vars, bool $overwriteExisting = false): void
    {
        foreach ($vars as $key => $value) {
            if (!$overwriteExisting && (getenv($key) !== false || array_key_exists($key, $_ENV))) {
                continue;
            }
            putenv("{$key}={$value}");
            $_ENV[$key] = $value;
        }
    }
}
