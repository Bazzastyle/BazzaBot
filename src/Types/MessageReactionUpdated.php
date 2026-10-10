<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a change of a reaction on a message performed by a user.
 *
 * @see https://core.telegram.org/bots/api#messagereactionupdated
 *
 * @param Chat|array $chat The chat containing the message the user reacted to
 * @param int $message_id Unique identifier of the message inside the chat
 * @param int $date Date of the change in Unix time
 * @param array $old_reaction Previous list of reaction types that were set by the user
 * @param array $new_reaction New list of reaction types that have been set by the user
 * @param User|array|null $user Optional. The user that changed the reaction, if the user isn't anonymous (optional)
 * @param Chat|array|null $actor_chat Optional. The chat on behalf of which the reaction was changed, if the user is anonymous (optional)
 */
final class MessageReactionUpdated implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly int $message_id,
        public readonly int $date,
        public readonly array $old_reaction,
        public readonly array $new_reaction,
        public readonly User|array|null $user = null,
        public readonly Chat|array|null $actor_chat = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['message_id'] = $this->message_id;
        $data['date'] = $this->date;
        $data['old_reaction'] = $this->old_reaction;
        $data['new_reaction'] = $this->new_reaction;
        if ($this->user !== null) $data['user'] = $this->user;

        if ($this->actor_chat !== null) $data['actor_chat'] = $this->actor_chat;


        return $data;
    }
}
