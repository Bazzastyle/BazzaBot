<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a shipping address.
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 *
 * @param string $country_code Two-letter ISO 3166-1 alpha-2 country code
 * @param string $state State, if applicable
 * @param string $city City
 * @param string $street_line1 First line for the address
 * @param string $street_line2 Second line for the address
 * @param string $post_code Address post code
 */
final class ShippingAddress implements \JsonSerializable
{
    public function __construct(
        public readonly string $country_code,
        public readonly string $state,
        public readonly string $city,
        public readonly string $street_line1,
        public readonly string $street_line2,
        public readonly string $post_code,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['country_code'] = $this->country_code;
        $data['state'] = $this->state;
        $data['city'] = $this->city;
        $data['street_line1'] = $this->street_line1;
        $data['street_line2'] = $this->street_line2;
        $data['post_code'] = $this->post_code;

        return $data;
    }
}
