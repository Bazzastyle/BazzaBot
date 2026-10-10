<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @see https://core.telegram.org/bots/api#maskposition
 *
 * @param string $point The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”,
 *     “mouth”, or “chin”.
 * @param float $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For
 *     example, choosing -1.0 will place mask just to the left of the default mask position.
 * @param float $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For
 *     example, 1.0 will place the mask just below the default mask position.
 * @param float $scale Mask scaling coefficient. For example, 2.0 means double size.
 */
final class MaskPosition implements \JsonSerializable
{
    public function __construct(
        public readonly string $point,
        public readonly float $x_shift,
        public readonly float $y_shift,
        public readonly float $scale,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['point'] = $this->point;
        $data['x_shift'] = $this->x_shift;
        $data['y_shift'] = $this->y_shift;
        $data['scale'] = $this->scale;

        return $data;
    }
}
