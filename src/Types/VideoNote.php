<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a video message.
 *
 * @see https://core.telegram.org/bots/api#videonote
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param int $length Video width and height (diameter of the video message) as defined by the sender
 * @param int $duration Duration of the video in seconds as defined by the sender
 * @param PhotoSize|array|null $thumbnail Optional. Video thumbnail (optional)
 * @param ?int $file_size Optional. File size in bytes (optional)
 */
final class VideoNote implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $length,
        public readonly int $duration,
        public readonly PhotoSize|array|null $thumbnail = null,
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
        $data['length'] = $this->length;
        $data['duration'] = $this->duration;
        if ($this->thumbnail !== null) $data['thumbnail'] = $this->thumbnail;

        if ($this->file_size !== null) $data['file_size'] = $this->file_size;


        return $data;
    }
}
