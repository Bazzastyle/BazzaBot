<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the opening hours of a business.
 *
 * @see https://core.telegram.org/bots/api#businessopeninghours
 *
 * @param string $time_zone_name Unique name of the time zone for which the opening hours are defined
 * @param array $opening_hours List of time intervals describing business opening hours
 */
final class BusinessOpeningHours implements \JsonSerializable
{
    public function __construct(
        public readonly string $time_zone_name,
        public readonly array $opening_hours,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['time_zone_name'] = $this->time_zone_name;
        $data['opening_hours'] = $this->opening_hours;

        return $data;
    }
}
