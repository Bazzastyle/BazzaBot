<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an incoming inline query. When the user sends an empty query, your bot could
 * return some default or trending results.
 *
 * @see https://core.telegram.org/bots/api#inlinequery
 *
 * @param string $id Unique identifier for this query
 * @param User|array $from Sender
 * @param string $query Text of the query (up to 256 characters)
 * @param string $offset Offset of the results to be returned, can be controlled by the bot
 * @param ?string $chat_type Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a
 *     private chat with the inline query sender, “private”, “group”, “supergroup”, or
 *     “channel”. The chat type should be always known for requests sent from official clients and most
 *     third-party clients, unless the request was sent from a secret chat. (optional)
 * @param Location|array|null $location Optional. Sender location, only for bots that request user location (optional)
 */
final class InlineQuery implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $from,
        public readonly string $query,
        public readonly string $offset,
        public readonly ?string $chat_type = null,
        public readonly Location|array|null $location = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['from'] = $this->from;
        $data['query'] = $this->query;
        $data['offset'] = $this->offset;
        if ($this->chat_type !== null) $data['chat_type'] = $this->chat_type;

        if ($this->location !== null) $data['location'] = $this->location;


        return $data;
    }
}
