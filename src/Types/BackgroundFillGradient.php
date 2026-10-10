<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is a gradient fill.
 *
 * @see https://core.telegram.org/bots/api#backgroundfillgradient
 *
 * @param string $type Type of the background fill, always “gradient”
 * @param int $top_color Top color of the gradient in the RGB24 format
 * @param int $bottom_color Bottom color of the gradient in the RGB24 format
 * @param int $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
 */
final class BackgroundFillGradient implements BackgroundFill, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $top_color,
        public readonly int $bottom_color,
        public readonly int $rotation_angle,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['top_color'] = $this->top_color;
        $data['bottom_color'] = $this->bottom_color;
        $data['rotation_angle'] = $this->rotation_angle;

        return $data;
    }
}
