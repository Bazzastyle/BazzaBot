<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media is a live photo.
 *
 * @see https://core.telegram.org/bots/api#paidmedialivephoto
 *
 * @param string $type Type of the paid media, always “live_photo”
 * @param LivePhoto|array $live_photo The photo
 */
final class PaidMediaLivePhoto implements PaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly LivePhoto|array $live_photo,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['live_photo'] = $this->live_photo;

        return $data;
    }
}
