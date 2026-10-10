<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @see https://core.telegram.org/bots/api#messageoriginchat
 *
 * @param string $type Type of the message origin, always “chat”
 * @param int $date Date the message was sent originally in Unix time
 * @param Chat|array $sender_chat Chat that sent the message originally
 * @param ?string $author_signature Optional. For messages originally sent by an anonymous chat administrator, original message author
 *     signature (optional)
 */
final class MessageOriginChat implements MessageOrigin, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly Chat|array $sender_chat,
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
        $data['sender_chat'] = $this->sender_chat;
        if ($this->author_signature !== null) $data['author_signature'] = $this->author_signature;


        return $data;
    }
}
