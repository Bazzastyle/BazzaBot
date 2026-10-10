<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a location to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmedialocation
 *
 * @param string $type Type of the media, must be location
 * @param float $latitude Latitude of the location
 * @param float $longitude Longitude of the location
 * @param ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500 (optional)
 */
final class InputMediaLocation implements InputPollMedia, InputPollOptionMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?float $horizontal_accuracy = null,
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
        if ($this->horizontal_accuracy !== null) $data['horizontal_accuracy'] = $this->horizontal_accuracy;


        return $data;
    }
}
