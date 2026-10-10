<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a video to post as a story.
 *
 * @see https://core.telegram.org/bots/api#inputstorycontentvideo
 *
 * @param string $type Type of the content, must be video
 * @param string $video The video to post as a story. The video must be of the size 720x1280, streamable, encoded with H.265
 *     codec, with key frames added each second in the MPEG4 format, and must not exceed 30 MB. The video
 *     can't be reused and can only be uploaded as a new file, so you can pass
 *     “attach://<file_attach_name>” if the video was uploaded using multipart/form-data under
 *     <file_attach_name>. More information on Sending Files »
 * @param ?float $duration Optional. Precise duration of the video in seconds; 0-60 (optional)
 * @param ?float $cover_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static cover for the story.
 *     Defaults to 0.0. (optional)
 * @param ?bool $is_animation Optional. Pass True if the video has no sound (optional)
 */
final class InputStoryContentVideo implements InputStoryContent, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $video,
        public readonly ?float $duration = null,
        public readonly ?float $cover_frame_timestamp = null,
        public readonly ?bool $is_animation = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['video'] = $this->video;
        if ($this->duration !== null) $data['duration'] = $this->duration;

        if ($this->cover_frame_timestamp !== null) $data['cover_frame_timestamp'] = $this->cover_frame_timestamp;

        if ($this->is_animation !== null) $data['is_animation'] = $this->is_animation;


        return $data;
    }
}
