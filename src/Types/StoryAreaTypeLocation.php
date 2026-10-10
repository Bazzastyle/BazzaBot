<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a story area pointing to a location. Currently, a story can have up to 10 location areas.
 *
 * @see https://core.telegram.org/bots/api#storyareatypelocation
 *
 * @param string $type Type of the area, always “location”
 * @param float $latitude Location latitude in degrees
 * @param float $longitude Location longitude in degrees
 * @param LocationAddress|array|null $address Optional. Address of the location (optional)
 */
final class StoryAreaTypeLocation implements StoryAreaType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly LocationAddress|array|null $address = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['latitude'] = $this->latitude;
        $data['longitude'] = $this->longitude;
        if ($this->address !== null) $data['address'] = $this->address;


        return $data;
    }
}
