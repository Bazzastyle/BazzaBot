<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a boost added to a chat or changed.
 *
 * @see https://core.telegram.org/bots/api#chatboostupdated
 *
 * @param Chat|array $chat Chat which was boosted
 * @param ChatBoost|array $boost Information about the chat boost
 */
final class ChatBoostUpdated implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly ChatBoost|array $boost,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['boost'] = $this->boost;

        return $data;
    }
}
