<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the position of a clickable area within a story.
 *
 * @see https://core.telegram.org/bots/api#storyareaposition
 *
 * @param float $x_percentage The abscissa of the area's center, as a percentage of the media width
 * @param float $y_percentage The ordinate of the area's center, as a percentage of the media height
 * @param float $width_percentage The width of the area's rectangle, as a percentage of the media width
 * @param float $height_percentage The height of the area's rectangle, as a percentage of the media height
 * @param float $rotation_angle The clockwise rotation angle of the rectangle, in degrees; 0-360
 * @param float $corner_radius_percentage The radius of the rectangle corner rounding, as a percentage of the media width
 */
final class StoryAreaPosition implements \JsonSerializable
{
    public function __construct(
        public readonly float $x_percentage,
        public readonly float $y_percentage,
        public readonly float $width_percentage,
        public readonly float $height_percentage,
        public readonly float $rotation_angle,
        public readonly float $corner_radius_percentage,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['x_percentage'] = $this->x_percentage;
        $data['y_percentage'] = $this->y_percentage;
        $data['width_percentage'] = $this->width_percentage;
        $data['height_percentage'] = $this->height_percentage;
        $data['rotation_angle'] = $this->rotation_angle;
        $data['corner_radius_percentage'] = $this->corner_radius_percentage;

        return $data;
    }
}
