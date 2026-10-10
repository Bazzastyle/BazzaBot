<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about the bot that was created to be managed by the current bot.
 *
 * @see https://core.telegram.org/bots/api#managedbotcreated
 *
 * @param User|array $bot Information about the bot. The bot's token can be fetched using the method getManagedBotToken.
 */
final class ManagedBotCreated implements \JsonSerializable
{
    public function __construct(
        public readonly User|array $bot,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['bot'] = $this->bot;

        return $data;
    }
}
