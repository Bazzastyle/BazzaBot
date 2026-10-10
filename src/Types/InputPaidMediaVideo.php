<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media to send is a video.
 *
 * @see https://core.telegram.org/bots/api#inputpaidmediavideo
 *
 * @param string $type Type of the media, must be video
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
 * @param ?string $cover Optional. Cover for the video in the message. Pass a file_id to send a file that exists on the
 *     Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or
 *     pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under
 *     <file_attach_name> name. More information on Sending Files » (optional)
 * @param ?int $start_timestamp Optional. Start timestamp for the video in the message (optional)
 * @param ?int $width Optional. Video width (optional)
 * @param ?int $height Optional. Video height (optional)
 * @param ?int $duration Optional. Video duration in seconds (optional)
 * @param ?bool $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming (optional)
 */
final class InputPaidMediaVideo implements InputPaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $thumbnail = null,
        public readonly ?string $cover = null,
        public readonly ?int $start_timestamp = null,
        public readonly ?int $width = null,
        public readonly ?int $height = null,
        public readonly ?int $duration = null,
        public readonly ?bool $supports_streaming = null,
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

        if ($this->cover !== null) $data['cover'] = $this->cover;

        if ($this->start_timestamp !== null) $data['start_timestamp'] = $this->start_timestamp;

        if ($this->width !== null) $data['width'] = $this->width;

        if ($this->height !== null) $data['height'] = $this->height;

        if ($this->duration !== null) $data['duration'] = $this->duration;

        if ($this->supports_streaming !== null) $data['supports_streaming'] = $this->supports_streaming;


        return $data;
    }
}
