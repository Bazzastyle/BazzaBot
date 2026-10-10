<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an issue with a document scan. The error is considered resolved when the file with the
 * document scan changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfile
 *
 * @param string $source Error source, must be file
 * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”,
 *     “bank_statement”, “rental_agreement”, “passport_registration”,
 *     “temporary_registration”
 * @param string $file_hash Base64-encoded file hash
 * @param string $message Error message
 */
final class PassportElementErrorFile implements PassportElementError, \JsonSerializable
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
