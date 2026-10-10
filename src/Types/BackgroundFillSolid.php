<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is filled using the selected color.
 *
 * @see https://core.telegram.org/bots/api#backgroundfillsolid
 *
 * @param string $type Type of the background fill, always “solid”
 * @param int $color The color of the background fill in the RGB24 format
 */
final class BackgroundFillSolid implements BackgroundFill, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $color,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['color'] = $this->color;

        return $data;
    }
}
