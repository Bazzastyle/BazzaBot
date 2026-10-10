<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media to send is a live photo.
 *
 * @see https://core.telegram.org/bots/api#inputpaidmedialivephoto
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
 */
final class InputPaidMediaLivePhoto implements InputPaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly string $photo,
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

        return $data;
    }
}
