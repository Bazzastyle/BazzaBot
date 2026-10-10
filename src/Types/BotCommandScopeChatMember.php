<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatmember
 *
 * @param string $type Scope type, must be chat_member
 * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username.
 *     Channel direct messages chats and channel chats aren't supported.
 * @param int $user_id Unique identifier of the target user
 */
final class BotCommandScopeChatMember implements BotCommandScope, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int|string $chat_id,
        public readonly int $user_id,
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
        $data['user_id'] = $this->user_id;

        return $data;
    }
}
