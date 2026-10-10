<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @see https://core.telegram.org/bots/api#chatmembermember
 *
 * @param string $status The member's status in the chat, always “member”
 * @param User|array $user Information about the user
 * @param ?string $tag Optional. Tag of the member (optional)
 * @param ?int $until_date Optional. Date when the user's subscription will expire; Unix time (optional)
 */
final class ChatMemberMember implements ChatMember, \JsonSerializable
{
    public function __construct(
        public readonly string $status,
        public readonly User|array $user,
        public readonly ?string $tag = null,
        public readonly ?int $until_date = null,
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
        if ($this->tag !== null) $data['tag'] = $this->tag;

        if ($this->until_date !== null) $data['until_date'] = $this->until_date;


        return $data;
    }
}
