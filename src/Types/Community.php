<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a community (a group of chats).
 *
 * @see https://core.telegram.org/bots/api#community
 *
 * @param int $id Unique identifier for this community. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
 *     this identifier.
 * @param string $name Name of the community
 */
final class Community implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['name'] = $this->name;

        return $data;
    }
}
