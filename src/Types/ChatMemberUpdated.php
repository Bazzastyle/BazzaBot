<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents changes in the status of a chat member.
 *
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 *
 * @param Chat|array $chat Chat the user belongs to
 * @param User|array $from Performer of the action, which resulted in the change
 * @param int $date Date the change was done in Unix time
 * @param ChatMember|array $old_chat_member Previous information about the chat member
 * @param ChatMember|array $new_chat_member New information about the chat member
 * @param ChatInviteLink|array|null $invite_link Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link
 *     events only (optional)
 * @param ?bool $via_join_request Optional. True, if the user joined the chat after sending a direct join request without using an
 *     invite link and being approved by an administrator (optional)
 * @param ?bool $via_chat_folder_invite_link Optional. True, if the user joined the chat via a chat folder invite link (optional)
 */
final class ChatMemberUpdated implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly User|array $from,
        public readonly int $date,
        public readonly ChatMember|array $old_chat_member,
        public readonly ChatMember|array $new_chat_member,
        public readonly ChatInviteLink|array|null $invite_link = null,
        public readonly ?bool $via_join_request = null,
        public readonly ?bool $via_chat_folder_invite_link = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['from'] = $this->from;
        $data['date'] = $this->date;
        $data['old_chat_member'] = $this->old_chat_member;
        $data['new_chat_member'] = $this->new_chat_member;
        if ($this->invite_link !== null) $data['invite_link'] = $this->invite_link;

        if ($this->via_join_request !== null) $data['via_join_request'] = $this->via_join_request;

        if ($this->via_chat_folder_invite_link !== null) $data['via_chat_folder_invite_link'] = $this->via_chat_folder_invite_link;


        return $data;
    }
}
