<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * An animated profile photo in the MPEG4 format.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotoanimated
 *
 * @param string $type Type of the profile photo, must be animated
 * @param string $animation The animated profile photo. Profile photos can't be reused and can only be uploaded as a new file,
 *     so you can pass “attach://<file_attach_name>” if the photo was uploaded using
 *     multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @param ?float $main_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static profile photo. Defaults
 *     to 0.0. (optional)
 */
final class InputProfilePhotoAnimated implements InputProfilePhoto, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $animation,
        public readonly ?float $main_frame_timestamp = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['animation'] = $this->animation;
        if ($this->main_frame_timestamp !== null) $data['main_frame_timestamp'] = $this->main_frame_timestamp;


        return $data;
    }
}
