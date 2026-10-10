<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup
 * chat.
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatadministrators
 *
 * @param string $type Scope type, must be chat_administrators
 * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username.
 *     Channel direct messages chats and channel chats aren't supported.
 */
final class BotCommandScopeChatAdministrators implements BotCommandScope, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int|string $chat_id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['chat_id'] = $this->chat_id;

        return $data;
    }
}
