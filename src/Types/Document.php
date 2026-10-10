<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 *
 * @see https://core.telegram.org/bots/api#document
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param PhotoSize|array|null $thumbnail Optional. Document thumbnail as defined by the sender (optional)
 * @param ?string $file_name Optional. Original filename as defined by the sender (optional)
 * @param ?string $mime_type Optional. MIME type of the file as defined by the sender (optional)
 * @param ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
 *     difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
 *     64-bit integer or double-precision float type are safe for storing this value. (optional)
 */
final class Document implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly PhotoSize|array|null $thumbnail = null,
        public readonly ?string $file_name = null,
        public readonly ?string $mime_type = null,
        public readonly ?int $file_size = null,
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
        if ($this->thumbnail !== null) $data['thumbnail'] = $this->thumbnail;

        if ($this->file_name !== null) $data['file_name'] = $this->file_name;

        if ($this->mime_type !== null) $data['mime_type'] = $this->mime_type;

        if ($this->file_size !== null) $data['file_size'] = $this->file_size;


        return $data;
    }
}
