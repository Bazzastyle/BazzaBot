<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @see https://core.telegram.org/bots/api#inaccessiblemessage
 *
 * @param Chat|array $chat Chat the message belonged to
 * @param int $message_id Unique message identifier inside the chat
 * @param int $date Always 0. The field can be used to differentiate regular and inaccessible messages.
 */
final class InaccessibleMessage implements MaybeInaccessibleMessage, \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly int $message_id,
        public readonly int $date,
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

        return $data;
    }
}
