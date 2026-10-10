<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a location to which a chat is connected.
 *
 * @see https://core.telegram.org/bots/api#chatlocation
 *
 * @param Location|array $location The location to which the supergroup is connected. Can't be a live location.
 * @param string $address Location address; 1-64 characters, as defined by the chat owner
 */
final class ChatLocation implements \JsonSerializable
{
    public function __construct(
        public readonly Location|array $location,
        public readonly string $address,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['location'] = $this->location;
        $data['address'] = $this->address;

        return $data;
    }
}
