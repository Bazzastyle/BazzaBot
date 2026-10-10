<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is automatically filled based on the selected colors.
 *
 * @see https://core.telegram.org/bots/api#backgroundtypefill
 *
 * @param string $type Type of the background, always “fill”
 * @param BackgroundFill|array $fill The background fill
 * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 */
final class BackgroundTypeFill implements BackgroundType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly BackgroundFill|array $fill,
        public readonly int $dark_theme_dimming,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['fill'] = $this->fill;
        $data['dark_theme_dimming'] = $this->dark_theme_dimming;

        return $data;
    }
}
