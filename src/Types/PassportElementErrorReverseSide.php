<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an issue with the reverse side of a document. The error is considered resolved when the
 * file with reverse side of the document changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorreverseside
 *
 * @param string $source Error source, must be reverse_side
 * @param string $type The section of the user's Telegram Passport which has the issue, one of “driver_license”,
 *     “identity_card”
 * @param string $file_hash Base64-encoded hash of the file with the reverse side of the document
 * @param string $message Error message
 */
final class PassportElementErrorReverseSide implements PassportElementError, \JsonSerializable
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $file_hash,
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
        $data['file_hash'] = $this->file_hash;
        $data['message'] = $this->message;

        return $data;
    }
}
