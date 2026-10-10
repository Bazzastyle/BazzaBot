<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @see https://core.telegram.org/bots/api#photosize
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param int $width Photo width
 * @param int $height Photo height
 * @param ?int $file_size Optional. File size in bytes (optional)
 */
final class PhotoSize implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $width,
        public readonly int $height,
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
        if ($this->file_size !== null) $data['file_size'] = $this->file_size;


        return $data;
    }
}
