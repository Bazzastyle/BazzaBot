<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a chat member that owns the chat and has all administrator privileges.
 *
 * @see https://core.telegram.org/bots/api#chatmemberowner
 *
 * @param string $status The member's status in the chat, always “creator”
 * @param User|array $user Information about the user
 * @param bool $is_anonymous True, if the user's presence in the chat is hidden
 * @param ?string $custom_title Optional. Custom title for this user (optional)
 */
final class ChatMemberOwner implements ChatMember, \JsonSerializable
{
    public function __construct(
        public readonly string $status,
        public readonly User|array $user,
        public readonly bool $is_anonymous,
        public readonly ?string $custom_title = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['status'] = $this->status;
        $data['user'] = $this->user;
        $data['is_anonymous'] = $this->is_anonymous;
        if ($this->custom_title !== null) $data['custom_title'] = $this->custom_title;


        return $data;
    }
}
