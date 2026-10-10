<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about the creation, token update, or owner update of a bot that is
 * managed by the current bot.
 *
 * @see https://core.telegram.org/bots/api#managedbotupdated
 *
 * @param User|array $user User that created the bot
 * @param User|array $bot Information about the bot. Token of the bot can be fetched using the method getManagedBotToken.
 */
final class ManagedBotUpdated implements \JsonSerializable
{
    public function __construct(
        public readonly User|array $user,
        public readonly User|array $bot,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['user'] = $this->user;
        $data['bot'] = $this->bot;

        return $data;
    }
}
