<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a story area containing weather information. Currently, a story can have up to 3 weather
 * areas.
 *
 * @see https://core.telegram.org/bots/api#storyareatypeweather
 *
 * @param string $type Type of the area, always “weather”
 * @param float $temperature Temperature, in degree Celsius
 * @param string $emoji Emoji representing the weather
 * @param int $background_color A color of the area background in the ARGB format
 */
final class StoryAreaTypeWeather implements StoryAreaType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly float $temperature,
        public readonly string $emoji,
        public readonly int $background_color,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['temperature'] = $this->temperature;
        $data['emoji'] = $this->emoji;
        $data['background_color'] = $this->background_color;

        return $data;
    }
}
