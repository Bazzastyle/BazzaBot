<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Http;

use Bazzastyle\BazzaBot\Exception\TelegramApiException;

/**
 * Typed value object mirroring Telegram's response envelope
 * {ok, result, error_code, description, parameters}.
 */
final class TelegramResponse
{
    /**
     * @param array<string, mixed>|null $parameters
     */
    public function __construct(
        public readonly bool $ok,
        public readonly mixed $result = null,
        public readonly ?int $errorCode = null,
        public readonly ?string $description = null,
        public readonly ?array $parameters = null,
    ) {
    }

    public static function fromJson(string $json): self
    {
        $decoded = json_decode($json, false);

        if (!$decoded instanceof \stdClass) {
            return new self(false, null, null, 'Malformed JSON response from Telegram');
        }

        $parameters = null;
        if (isset($decoded->parameters) && $decoded->parameters instanceof \stdClass) {
            $parameters = (array) $decoded->parameters;
        }

        return new self(
            (bool) ($decoded->ok ?? false),
            $decoded->result ?? null,
            isset($decoded->error_code) ? (int) $decoded->error_code : null,
            $decoded->description ?? null,
            $parameters,
        );
    }

    public function getRetryAfter(): ?int
    {
        $value = $this->parameters['retry_after'] ?? null;

        return $value === null ? null : (int) $value;
    }

    public function isRateLimited(): bool
    {
        return $this->errorCode === 429;
    }

    /**
     * Returns $this when ok, otherwise throws TelegramApiException.
     *
     * @param array<string, mixed> $params the params sent for this call, for exception context
     */
    public function throwIfError(string $method = '', array $params = []): static
    {
        if (!$this->ok) {
            throw new TelegramApiException($this, $method, $params);
        }

        return $this;
    }
}
