<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such
 * code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiftcode
 *
 * @param string $source Source of the boost, always “gift_code”
 * @param User|array $user User for which the gift code was created
 */
final class ChatBoostSourceGiftCode implements ChatBoostSource, \JsonSerializable
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
