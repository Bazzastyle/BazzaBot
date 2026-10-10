<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a venue to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediavenue
 *
 * @param string $type Type of the media, must be venue
 * @param float $latitude Latitude of the location
 * @param float $longitude Longitude of the location
 * @param string $title Name of the venue
 * @param string $address Address of the venue
 * @param ?string $foursquare_id Optional. Foursquare identifier of the venue (optional)
 * @param ?string $foursquare_type Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
 *     “arts_entertainment/aquarium” or “food/icecream”.) (optional)
 * @param ?string $google_place_id Optional. Google Places identifier of the venue (optional)
 * @param ?string $google_place_type Optional. Google Places type of the venue. (See supported types.) (optional)
 */
final class InputMediaVenue implements InputPollMedia, InputPollOptionMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id = null,
        public readonly ?string $foursquare_type = null,
        public readonly ?string $google_place_id = null,
        public readonly ?string $google_place_type = null,
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
        $data['title'] = $this->title;
        $data['address'] = $this->address;
        if ($this->foursquare_id !== null) $data['foursquare_id'] = $this->foursquare_id;

        if ($this->foursquare_type !== null) $data['foursquare_type'] = $this->foursquare_type;

        if ($this->google_place_id !== null) $data['google_place_id'] = $this->google_place_id;

        if ($this->google_place_type !== null) $data['google_place_type'] = $this->google_place_type;


        return $data;
    }
}
