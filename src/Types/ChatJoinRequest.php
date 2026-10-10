<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a join request sent to a chat.
 *
 * @see https://core.telegram.org/bots/api#chatjoinrequest
 *
 * @param Chat|array $chat Chat to which the request was sent
 * @param User|array $from User that sent the join request
 * @param int $user_chat_id Identifier of a private chat with the user who sent the join request. This number may have more than
 *     32 significant bits and some programming languages may have difficulty/silent defects in
 *     interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision
 *     float type are safe for storing this identifier. The bot can use this identifier for 5 minutes to
 *     send messages until the join request is processed, assuming no other administrator contacted the
 *     user.
 * @param int $date Date the request was sent in Unix time
 * @param ?string $bio Optional. Bio of the user (optional)
 * @param ChatInviteLink|array|null $invite_link Optional. Chat invite link that was used by the user to send the join request (optional)
 * @param ?string $query_id Optional. Identifier of the join request query; for bots assigned to process join requests only. If
 *     present, then the bot must call sendChatJoinRequestWebApp or directly call
 *     answerChatJoinRequestQuery within 10 seconds. (optional)
 */
final class ChatJoinRequest implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly User|array $from,
        public readonly int $user_chat_id,
        public readonly int $date,
        public readonly ?string $bio = null,
        public readonly ChatInviteLink|array|null $invite_link = null,
        public readonly ?string $query_id = null,
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
        $data['user_chat_id'] = $this->user_chat_id;
        $data['date'] = $this->date;
        if ($this->bio !== null) $data['bio'] = $this->bio;

        if ($this->invite_link !== null) $data['invite_link'] = $this->invite_link;

        if ($this->query_id !== null) $data['query_id'] = $this->query_id;


        return $data;
    }
}
