<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @see https://core.telegram.org/bots/api#chatmemberleft
 *
 * @param string $status The member's status in the chat, always “left”
 * @param User|array $user Information about the user
 */
final class ChatMemberLeft implements ChatMember, \JsonSerializable
{
    public function __construct(
        public readonly string $status,
        public readonly User|array $user,
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

        return $data;
    }
}
