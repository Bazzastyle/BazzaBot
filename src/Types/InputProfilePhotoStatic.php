<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A static profile photo in the .JPG format.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotostatic
 *
 * @param string $type Type of the profile photo, must be static
 * @param string $photo The static profile photo. Profile photos can't be reused and can only be uploaded as a new file, so
 *     you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data
 *     under <file_attach_name>. More information on Sending Files »
 */
final class InputProfilePhotoStatic implements InputProfilePhoto, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
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
        $data['photo'] = $this->photo;

        return $data;
    }
}
