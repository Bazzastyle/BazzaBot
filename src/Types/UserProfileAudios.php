<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents the audios displayed on a user's profile.
 *
 * @see https://core.telegram.org/bots/api#userprofileaudios
 *
 * @param int $total_count Total number of profile audios for the target user
 * @param array $audios Requested profile audios
 */
final class UserProfileAudios implements \JsonSerializable
{
    public function __construct(
        public readonly int $total_count,
        public readonly array $audios,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['total_count'] = $this->total_count;
        $data['audios'] = $this->audios;

        return $data;
    }
}
