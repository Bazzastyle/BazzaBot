<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an issue in an unspecified place. The error is considered resolved when new data is
 * added.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
 *
 * @param string $source Error source, must be unspecified
 * @param string $type Type of element of the user's Telegram Passport which has the issue
 * @param string $element_hash Base64-encoded element hash
 * @param string $message Error message
 */
final class PassportElementErrorUnspecified implements PassportElementError, \JsonSerializable
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $element_hash,
        public readonly string $message,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['source'] = $this->source;
        $data['type'] = $this->type;
        $data['element_hash'] = $this->element_hash;
        $data['message'] = $this->message;

        return $data;
    }
}
