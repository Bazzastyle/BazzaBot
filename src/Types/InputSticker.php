<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a sticker to be added to a sticker set.
 *
 * @see https://core.telegram.org/bots/api#inputsticker
 *
 * @param string $sticker The added sticker. Pass a file_id as a String to send a file that already exists on the Telegram
 *     servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or pass
 *     “attach://<file_attach_name>” to upload a new file using multipart/form-data under
 *     <file_attach_name> name. Animated and video stickers can't be uploaded via HTTP URL. More
 *     information on Sending Files »
 * @param string $format Format of the added sticker, must be one of “static” for a .WEBP or .PNG image, “animated”
 *     for a .TGS animation, “video” for a .WEBM video
 * @param array $emoji_list List of 1-20 emoji associated with the sticker
 * @param MaskPosition|array|null $mask_position Optional. Position where the mask should be placed on faces. For “mask” stickers only. (optional)
 * @param ?array $keywords Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters. For
 *     “regular” and “custom_emoji” stickers only. (optional)
 */
final class InputSticker implements \JsonSerializable
{
    public function __construct(
        public readonly string $sticker,
        public readonly string $format,
        public readonly array $emoji_list,
        public readonly MaskPosition|array|null $mask_position = null,
        public readonly ?array $keywords = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['sticker'] = $this->sticker;
        $data['format'] = $this->format;
        $data['emoji_list'] = $this->emoji_list;
        if ($this->mask_position !== null) $data['mask_position'] = $this->mask_position;

        if ($this->keywords !== null) $data['keywords'] = $this->keywords;


        return $data;
    }
}
