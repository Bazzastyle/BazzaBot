<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents reaction changes on a message with anonymous reactions.
 *
 * @see https://core.telegram.org/bots/api#messagereactioncountupdated
 *
 * @param Chat|array $chat The chat containing the message
 * @param int $message_id Unique message identifier inside the chat
 * @param int $date Date of the change in Unix time
 * @param array $reactions List of reactions that are present on the message
 */
final class MessageReactionCountUpdated implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly int $message_id,
        public readonly int $date,
        public readonly array $reactions,
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
        $data['reactions'] = $this->reactions;

        return $data;
    }
}
