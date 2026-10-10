<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the physical address of a location.
 *
 * @see https://core.telegram.org/bots/api#locationaddress
 *
 * @param string $country_code The two-letter ISO 3166-1 alpha-2 country code of the country where the location is located
 * @param ?string $state Optional. State of the location (optional)
 * @param ?string $city Optional. City of the location (optional)
 * @param ?string $street Optional. Street address of the location (optional)
 */
final class LocationAddress implements \JsonSerializable
{
    public function __construct(
        public readonly string $country_code,
        public readonly ?string $state = null,
        public readonly ?string $city = null,
        public readonly ?string $street = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['country_code'] = $this->country_code;
        if ($this->state !== null) $data['state'] = $this->state;

        if ($this->city !== null) $data['city'] = $this->city;

        if ($this->street !== null) $data['street'] = $this->street;


        return $data;
    }
}
