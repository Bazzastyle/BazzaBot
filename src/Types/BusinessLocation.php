<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains information about the location of a Telegram Business account.
 *
 * @see https://core.telegram.org/bots/api#businesslocation
 *
 * @param string $address Address of the business
 * @param Location|array|null $location Optional. Location of the business (optional)
 */
final class BusinessLocation implements \JsonSerializable
{
    public function __construct(
        public readonly string $address,
        public readonly Location|array|null $location = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['address'] = $this->address;
        if ($this->location !== null) $data['location'] = $this->location;


        return $data;
    }
}
