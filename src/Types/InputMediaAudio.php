<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an audio file to be treated as music to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediaaudio
 *
 * @param string $type Type of the media, must be audio
 * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
 *     an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
 *     to upload a new one using multipart/form-data under <file_attach_name> name. More information on
 *     Sending Files »
 * @param ?string $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is
 *     supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A
 *     thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using
 *     multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
 *     pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
 *     <file_attach_name>. More information on Sending Files » (optional)
 * @param ?string $caption Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the audio caption. See formatting options for more details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?int $duration Optional. Duration of the audio in seconds (optional)
 * @param ?string $performer Optional. Performer of the audio (optional)
 * @param ?string $title Optional. Title of the audio (optional)
 */
final class InputMediaAudio implements InputPollMedia, InputMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $thumbnail = null,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?int $duration = null,
        public readonly ?string $performer = null,
        public readonly ?string $title = null,
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
        if ($this->thumbnail !== null) $data['thumbnail'] = $this->thumbnail;

        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->duration !== null) $data['duration'] = $this->duration;

        if ($this->performer !== null) $data['performer'] = $this->performer;

        if ($this->title !== null) $data['title'] = $this->title;


        return $data;
    }
}
