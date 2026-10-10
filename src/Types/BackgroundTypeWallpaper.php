<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is a wallpaper in the JPEG format.
 *
 * @see https://core.telegram.org/bots/api#backgroundtypewallpaper
 *
 * @param string $type Type of the background, always “wallpaper”
 * @param Document|array $document Document with the wallpaper
 * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 * @param ?bool $is_blurred Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with
 *     radius 12 (optional)
 * @param ?bool $is_moving Optional. True, if the background moves slightly when the device is tilted (optional)
 */
final class BackgroundTypeWallpaper implements BackgroundType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Document|array $document,
        public readonly int $dark_theme_dimming,
        public readonly ?bool $is_blurred = null,
        public readonly ?bool $is_moving = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['document'] = $this->document;
        $data['dark_theme_dimming'] = $this->dark_theme_dimming;
        if ($this->is_blurred !== null) $data['is_blurred'] = $this->is_blurred;

        if ($this->is_moving !== null) $data['is_moving'] = $this->is_moving;


        return $data;
    }
}
