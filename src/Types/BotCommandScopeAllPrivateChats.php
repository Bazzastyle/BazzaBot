<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the scope of bot commands, covering all private chats.
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 *
 * @param string $type Scope type, must be all_private_chats
 */
final class BotCommandScopeAllPrivateChats implements BotCommandScope, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;

        return $data;
    }
}
