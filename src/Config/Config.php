<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Config;

use Bazzastyle\BazzaBot\Exception\ConfigException;

/**
 * Immutable, typed accessor over a flat key/value configuration array
 * (as produced by Env::load()). Real environment variables (getenv/$_ENV)
 * always take precedence over the .env file, so deploys can override
 * secrets without touching the file.
 */
final class Config
{
    /** @param array<string, mixed> $data */
    public function __construct(private readonly array $data)
    {
    }

    public static function fromEnvFile(string $path): self
    {
        return new self(Env::load($path));
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $envValue = getenv($key);
        if ($envValue !== false) {
            return $envValue;
        }

        return array_key_exists($key, $this->data) ? $this->data[$key] : $default;
    }

    public function has(string $key): bool
    {
        return getenv($key) !== false || array_key_exists($key, $this->data);
    }

    public function getString(string $key, ?string $default = null): ?string
    {
        $value = $this->get($key, $default);

        return $value === null ? null : (string) $value;
    }

    public function getInt(string $key, ?int $default = null): ?int
    {
        $value = $this->get($key, $default);

        return $value === null || $value === '' ? $default : (int) $value;
    }

    public function getBool(string $key, bool $default = false): bool
    {
        $value = $this->get($key);
        if ($value === null || $value === '') {
            return $default;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Returns the raw value, throwing if the key is missing or empty.
     * Use for secrets/credentials: never fall back to a silent default.
     */
    public function require(string $key): mixed
    {
        $value = $this->get($key);
        if ($value === null || $value === '') {
            throw new ConfigException(sprintf('Missing required configuration key: "%s"', $key));
        }

        return $value;
    }
}
