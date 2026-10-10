<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a chat.
 *
 * @see https://core.telegram.org/bots/api#chat
 *
 * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
 *     this identifier.
 * @param string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
 * @param ?string $title Optional. Title, for supergroups, channels and group chats (optional)
 * @param ?string $username Optional. Username, for private chats, supergroups and channels if available (optional)
 * @param ?string $first_name Optional. First name of the other party in a private chat (optional)
 * @param ?string $last_name Optional. Last name of the other party in a private chat (optional)
 * @param ?bool $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled) (optional)
 * @param ?bool $is_direct_messages Optional. True, if the chat is the direct messages chat of a channel (optional)
 */
final class Chat implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly ?string $title = null,
        public readonly ?string $username = null,
        public readonly ?string $first_name = null,
        public readonly ?string $last_name = null,
        public readonly ?bool $is_forum = null,
        public readonly ?bool $is_direct_messages = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['type'] = $this->type;
        if ($this->title !== null) $data['title'] = $this->title;

        if ($this->username !== null) $data['username'] = $this->username;

        if ($this->first_name !== null) $data['first_name'] = $this->first_name;

        if ($this->last_name !== null) $data['last_name'] = $this->last_name;

        if ($this->is_forum !== null) $data['is_forum'] = $this->is_forum;

        if ($this->is_direct_messages !== null) $data['is_direct_messages'] = $this->is_direct_messages;


        return $data;
    }
}
