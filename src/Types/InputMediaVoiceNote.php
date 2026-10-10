<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a voice message file to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediavoicenote
 *
 * @param string $type Type of the media, must be voice_note
 * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
 *     an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to
 *     upload a new one using multipart/form-data under <file_attach_name> name. More information on
 *     Sending Files »
 * @param ?string $caption Optional. Caption of the voice message to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting options for more
 *     details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?int $duration Optional. Duration of the voice message in seconds (optional)
 */
final class InputMediaVoiceNote implements \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?int $duration = null,
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
        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->duration !== null) $data['duration'] = $this->duration;


        return $data;
    }
}
