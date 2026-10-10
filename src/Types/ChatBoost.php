<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about a chat boost.
 *
 * @see https://core.telegram.org/bots/api#chatboost
 *
 * @param string $boost_id Unique identifier of the boost
 * @param int $add_date Point in time (Unix timestamp) when the chat was boosted
 * @param int $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's
 *     Telegram Premium subscription is prolonged
 * @param ChatBoostSource|array $source Source of the added boost
 */
final class ChatBoost implements \JsonSerializable
{
    public function __construct(
        public readonly string $boost_id,
        public readonly int $add_date,
        public readonly int $expiration_date,
        public readonly ChatBoostSource|array $source,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['boost_id'] = $this->boost_id;
        $data['add_date'] = $this->add_date;
        $data['expiration_date'] = $this->expiration_date;
        $data['source'] = $this->source;

        return $data;
    }
}
