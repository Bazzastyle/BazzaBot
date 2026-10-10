<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a sticker.
 *
 * @see https://core.telegram.org/bots/api#sticker
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param string $type Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the
 *     sticker is independent from its format, which is determined by the fields is_animated and is_video.
 * @param int $width Sticker width
 * @param int $height Sticker height
 * @param bool $is_animated True, if the sticker is animated
 * @param bool $is_video True, if the sticker is a video sticker
 * @param PhotoSize|array|null $thumbnail Optional. Sticker thumbnail in the .WEBP or .JPG format (optional)
 * @param ?string $emoji Optional. Emoji associated with the sticker (optional)
 * @param ?string $set_name Optional. Name of the sticker set to which the sticker belongs (optional)
 * @param File|array|null $premium_animation Optional. For premium regular stickers, premium animation for the sticker (optional)
 * @param MaskPosition|array|null $mask_position Optional. For mask stickers, the position where the mask should be placed (optional)
 * @param ?string $custom_emoji_id Optional. For custom emoji stickers, unique identifier of the custom emoji (optional)
 * @param ?bool $needs_repainting Optional. True, if the sticker must be repainted to a text color in messages, the color of the
 *     Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in
 *     other places (optional)
 * @param ?int $file_size Optional. File size in bytes (optional)
 */
final class Sticker implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly string $type,
        public readonly int $width,
        public readonly int $height,
        public readonly bool $is_animated,
        public readonly bool $is_video,
        public readonly PhotoSize|array|null $thumbnail = null,
        public readonly ?string $emoji = null,
        public readonly ?string $set_name = null,
        public readonly File|array|null $premium_animation = null,
        public readonly MaskPosition|array|null $mask_position = null,
        public readonly ?string $custom_emoji_id = null,
        public readonly ?bool $needs_repainting = null,
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
        $data['type'] = $this->type;
        $data['width'] = $this->width;
        $data['height'] = $this->height;
        $data['is_animated'] = $this->is_animated;
        $data['is_video'] = $this->is_video;
        if ($this->thumbnail !== null) $data['thumbnail'] = $this->thumbnail;

        if ($this->emoji !== null) $data['emoji'] = $this->emoji;

        if ($this->set_name !== null) $data['set_name'] = $this->set_name;

        if ($this->premium_animation !== null) $data['premium_animation'] = $this->premium_animation;

        if ($this->mask_position !== null) $data['mask_position'] = $this->mask_position;

        if ($this->custom_emoji_id !== null) $data['custom_emoji_id'] = $this->custom_emoji_id;

        if ($this->needs_repainting !== null) $data['needs_repainting'] = $this->needs_repainting;

        if ($this->file_size !== null) $data['file_size'] = $this->file_size;


        return $data;
    }
}
