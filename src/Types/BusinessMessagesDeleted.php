<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object is received when messages are deleted from a connected business account.
 *
 * @see https://core.telegram.org/bots/api#businessmessagesdeleted
 *
 * @param string $business_connection_id Unique identifier of the business connection
 * @param Chat|array $chat Information about a chat in the business account. The bot may not have access to the chat or the
 *     corresponding user.
 * @param array $message_ids The list of identifiers of deleted messages in the chat of the business account
 */
final class BusinessMessagesDeleted implements \JsonSerializable
{
    public function __construct(
        public readonly string $business_connection_id,
        public readonly Chat|array $chat,
        public readonly array $message_ids,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['business_connection_id'] = $this->business_connection_id;
        $data['chat'] = $this->chat;
        $data['message_ids'] = $this->message_ids;

        return $data;
    }
}
