<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The message was originally sent to a channel chat.
 *
 * @see https://core.telegram.org/bots/api#messageoriginchannel
 *
 * @param string $type Type of the message origin, always “channel”
 * @param int $date Date the message was sent originally in Unix time
 * @param Chat|array $chat Channel chat to which the message was originally sent
 * @param int $message_id Unique message identifier inside the chat
 * @param ?string $author_signature Optional. Signature of the original post author (optional)
 */
final class MessageOriginChannel implements MessageOrigin, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly Chat|array $chat,
        public readonly int $message_id,
        public readonly ?string $author_signature = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['date'] = $this->date;
        $data['chat'] = $this->chat;
        $data['message_id'] = $this->message_id;
        if ($this->author_signature !== null) $data['author_signature'] = $this->author_signature;


        return $data;
    }
}
