<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a boost removed from a chat.
 *
 * @see https://core.telegram.org/bots/api#chatboostremoved
 *
 * @param Chat|array $chat Chat which was boosted
 * @param string $boost_id Unique identifier of the boost
 * @param int $remove_date Point in time (Unix timestamp) when the boost was removed
 * @param ChatBoostSource|array $source Source of the removed boost
 */
final class ChatBoostRemoved implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly string $boost_id,
        public readonly int $remove_date,
        public readonly ChatBoostSource|array $source,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['boost_id'] = $this->boost_id;
        $data['remove_date'] = $this->remove_date;
        $data['source'] = $this->source;

        return $data;
    }
}
