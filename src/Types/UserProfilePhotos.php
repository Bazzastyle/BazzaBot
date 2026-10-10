<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represent a user's profile pictures.
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 *
 * @param int $total_count Total number of profile pictures the target user has
 * @param array $photos Requested profile pictures (in up to 4 sizes each)
 */
final class UserProfilePhotos implements \JsonSerializable
{
    public function __construct(
        public readonly int $total_count,
        public readonly array $photos,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['total_count'] = $this->total_count;
        $data['photos'] = $this->photos;

        return $data;
    }
}
