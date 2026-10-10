<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media is a photo.
 *
 * @see https://core.telegram.org/bots/api#paidmediaphoto
 *
 * @param string $type Type of the paid media, always “photo”
 * @param array $photo The photo
 */
final class PaidMediaPhoto implements PaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $photo,
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
