<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an issue with a list of scans. The error is considered resolved when the list of files
 * containing the scans changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfiles
 *
 * @param string $source Error source, must be files
 * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”,
 *     “bank_statement”, “rental_agreement”, “passport_registration”,
 *     “temporary_registration”
 * @param array $file_hashes List of base64-encoded file hashes
 * @param string $message Error message
 */
final class PassportElementErrorFiles implements PassportElementError, \JsonSerializable
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly array $file_hashes,
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
        $data['file_hashes'] = $this->file_hashes;
        $data['message'] = $this->message;

        return $data;
    }
}
