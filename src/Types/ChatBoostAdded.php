<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about a user boosting a chat.
 *
 * @see https://core.telegram.org/bots/api#chatboostadded
 *
 * @param int $boost_count Number of boosts added by the user
 */
final class ChatBoostAdded implements \JsonSerializable
{
    public function __construct(
        public readonly int $boost_count,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['boost_count'] = $this->boost_count;

        return $data;
    }
}
