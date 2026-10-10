<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a voice note.
 *
 * @see https://core.telegram.org/bots/api#voice
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param int $duration Duration of the audio in seconds as defined by the sender
 * @param ?string $mime_type Optional. MIME type of the file as defined by the sender (optional)
 * @param ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
 *     difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
 *     64-bit integer or double-precision float type are safe for storing this value. (optional)
 */
final class Voice implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $duration,
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
        $data['duration'] = $this->duration;
        if ($this->mime_type !== null) $data['mime_type'] = $this->mime_type;

        if ($this->file_size !== null) $data['file_size'] = $this->file_size;


        return $data;
    }
}
