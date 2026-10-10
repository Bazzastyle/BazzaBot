<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium
 * subscription to another user.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcepremium
 *
 * @param string $source Source of the boost, always “premium”
 * @param User|array $user User that boosted the chat
 */
final class ChatBoostSourcePremium implements ChatBoostSource, \JsonSerializable
{
    public function __construct(
        public readonly string $source,
        public readonly User|array $user,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['source'] = $this->source;
        $data['user'] = $this->user;

        return $data;
    }
}
