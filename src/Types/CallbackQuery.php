<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an incoming callback query from a callback button in an inline keyboard. If
 * the button that originated the query was attached to a message sent by the bot, the field message
 * will be present. If the button was attached to a message sent via the bot (in inline mode), the
 * field inline_message_id will be present. Exactly one of the fields data or game_short_name will be
 * present.
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 *
 * @param string $id Unique identifier for this query
 * @param User|array $from Sender
 * @param string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the callback button
 *     was sent. Useful for high scores in games.
 * @param MaybeInaccessibleMessage|array|null $message Optional. Message sent by the bot with the callback button that originated the query (optional)
 * @param ?string $inline_message_id Optional. Identifier of the message sent via the bot in inline mode, that originated the query (optional)
 * @param ?string $data Optional. Data associated with the callback button. Be aware that the message originated the query
 *     can contain no callback buttons with this data. (optional)
 * @param ?string $game_short_name Optional. Short name of a Game to be returned, serves as the unique identifier for the game (optional)
 */
final class CallbackQuery implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $from,
        public readonly string $chat_instance,
        public readonly MaybeInaccessibleMessage|array|null $message = null,
        public readonly ?string $inline_message_id = null,
        public readonly ?string $data = null,
        public readonly ?string $game_short_name = null,
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
        $data['chat_instance'] = $this->chat_instance;
        if ($this->message !== null) $data['message'] = $this->message;

        if ($this->inline_message_id !== null) $data['inline_message_id'] = $this->inline_message_id;

        if ($this->data !== null) $data['data'] = $this->data;

        if ($this->game_short_name !== null) $data['game_short_name'] = $this->game_short_name;


        return $data;
    }
}
