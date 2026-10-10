<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files
 * are in JPEG format when decrypted and don't exceed 10MB.
 *
 * @see https://core.telegram.org/bots/api#passportfile
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param int $file_size File size in bytes
 * @param int $file_date Unix time when the file was uploaded
 */
final class PassportFile implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $file_size,
        public readonly int $file_date,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['file_id'] = $this->file_id;
        $data['file_unique_id'] = $this->file_unique_id;
        $data['file_size'] = $this->file_size;
        $data['file_date'] = $this->file_date;

        return $data;
    }
}
