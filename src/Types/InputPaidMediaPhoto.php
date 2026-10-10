<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media to send is a photo.
 *
 * @see https://core.telegram.org/bots/api#inputpaidmediaphoto
 *
 * @param string $type Type of the media, must be photo
 * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
 *     an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
 *     to upload a new one using multipart/form-data under <file_attach_name> name. More information on
 *     Sending Files »
 */
final class InputPaidMediaPhoto implements InputPaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
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

        return $data;
    }
}
