<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat
 * messages.
 *
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 *
 * @param string $status The member's status in the chat, always “kicked”
 * @param User|array $user Information about the user
 * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned
 *     forever.
 */
final class ChatMemberBanned implements ChatMember, \JsonSerializable
{
    public function __construct(
        public readonly string $status,
        public readonly User|array $user,
        public readonly int $until_date,
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
        $data['until_date'] = $this->until_date;

        return $data;
    }
}
