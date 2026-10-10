<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a video file of a specific quality.
 *
 * @see https://core.telegram.org/bots/api#videoquality
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param int $width Video width
 * @param int $height Video height
 * @param string $codec Codec that was used to encode the video, for example, “h264”, “h265”, or “av01”
 * @param ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
 *     difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
 *     64-bit integer or double-precision float type are safe for storing this value. (optional)
 */
final class VideoQuality implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $width,
        public readonly int $height,
        public readonly string $codec,
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
        $data['width'] = $this->width;
        $data['height'] = $this->height;
        $data['codec'] = $this->codec;
        if ($this->file_size !== null) $data['file_size'] = $this->file_size;


        return $data;
    }
}
