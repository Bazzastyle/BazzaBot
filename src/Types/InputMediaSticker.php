<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a sticker file to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediasticker
 *
 * @param string $type Type of the media, must be sticker
 * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
 *     an HTTP URL for Telegram to get a .WEBP sticker from the Internet, or pass
 *     “attach://<file_attach_name>” to upload a new .WEBP, .TGS, or .WEBM sticker using
 *     multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @param ?string $emoji Optional. Emoji associated with the sticker; only for just uploaded stickers (optional)
 */
final class InputMediaSticker implements InputPollOptionMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $emoji = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['media'] = $this->media;
        if ($this->emoji !== null) $data['emoji'] = $this->emoji;


        return $data;
    }
}
