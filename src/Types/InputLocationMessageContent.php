<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 *
 * @param float $latitude Latitude of the location in degrees
 * @param float $longitude Longitude of the location in degrees
 * @param ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500 (optional)
 * @param ?int $live_period Optional. Period in seconds during which the location can be updated, must be between 60 and 86400,
 *     or 0x7FFFFFFF for live locations that can be edited indefinitely (optional)
 * @param ?int $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1
 *     and 360 if specified. (optional)
 * @param ?int $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat
 *     member, in meters. Must be between 1 and 100000 if specified. (optional)
 */
final class InputLocationMessageContent implements InputMessageContent, \JsonSerializable
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
