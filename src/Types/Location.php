<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a point on the map.
 *
 * @see https://core.telegram.org/bots/api#location
 *
 * @param float $latitude Latitude as defined by the sender
 * @param float $longitude Longitude as defined by the sender
 * @param ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500 (optional)
 * @param ?int $live_period Optional. Time relative to the message sending date, during which the location can be updated; in
 *     seconds. For active live locations only. (optional)
 * @param ?int $heading Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only. (optional)
 * @param ?int $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in
 *     meters. For sent live locations only. (optional)
 */
final class Location implements \JsonSerializable
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?float $horizontal_accuracy = null,
        public readonly ?int $live_period = null,
        public readonly ?int $heading = null,
        public readonly ?int $proximity_alert_radius = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['latitude'] = $this->latitude;
        $data['longitude'] = $this->longitude;
        if ($this->horizontal_accuracy !== null) $data['horizontal_accuracy'] = $this->horizontal_accuracy;

        if ($this->live_period !== null) $data['live_period'] = $this->live_period;

        if ($this->heading !== null) $data['heading'] = $this->heading;

        if ($this->proximity_alert_radius !== null) $data['proximity_alert_radius'] = $this->proximity_alert_radius;


        return $data;
    }
}
