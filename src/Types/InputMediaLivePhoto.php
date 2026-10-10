<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a live photo to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmedialivephoto
 *
 * @param string $type Type of the media, must be live_photo
 * @param string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram servers
 *     (recommended) or pass “attach://<file_attach_name>” to upload a new one using
 *     multipart/form-data under <file_attach_name> name. More information on Sending Files ». Sending
 *     live photos by a URL is currently unsupported.
 * @param string $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers
 *     (recommended) or pass “attach://<file_attach_name>” to upload a new one using
 *     multipart/form-data under <file_attach_name> name. More information on Sending Files ». Sending
 *     live photos by a URL is currently unsupported.
 * @param ?string $caption Optional. Caption of the live photo to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the live photo caption. See formatting options for more
 *     details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the message media (optional)
 * @param ?bool $has_spoiler Optional. Pass True if the live photo needs to be covered with a spoiler animation (optional)
 */
final class InputMediaLivePhoto implements InputPollMedia, InputPollOptionMedia, InputMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly string $photo,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?bool $show_caption_above_media = null,
        public readonly ?bool $has_spoiler = null,
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
        $data['photo'] = $this->photo;
        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->show_caption_above_media !== null) $data['show_caption_above_media'] = $this->show_caption_above_media;

        if ($this->has_spoiler !== null) $data['has_spoiler'] = $this->has_spoiler;


        return $data;
    }
}
