<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a sticker set.
 *
 * @see https://core.telegram.org/bots/api#stickerset
 *
 * @param string $name Sticker set name
 * @param string $title Sticker set title
 * @param string $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
 * @param array $stickers List of all set stickers
 * @param PhotoSize|array|null $thumbnail Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format (optional)
 */
final class StickerSet implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly string $title,
        public readonly string $sticker_type,
        public readonly array $stickers,
        public readonly PhotoSize|array|null $thumbnail = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['sticker_type'] = $this->sticker_type;
        $data['stickers'] = $this->stickers;
        if ($this->thumbnail !== null) $data['thumbnail'] = $this->thumbnail;


        return $data;
    }
}
