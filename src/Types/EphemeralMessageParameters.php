<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * 
 *
 * @see https://core.telegram.org/bots/api#ephemeralmessageparameters
 *
 * @param ?int $receiver_user_id Optional. Identifier of the user who will receive the message; required unless the message is sent
 *     as an ephemeral reply to a callback query. If omitted, then the parameter chat_id of the method is
 *     ignored. If specified together with callback_query_id, then it must be the identifier of the user
 *     who pressed the button. Must be omitted for messages sent in chats where the bot isn't a member,
 *     unless the message is a reply to an ephemeral message. It is not guaranteed that the user will
 *     receive the message, especially if they are offline. See here for more details. (optional)
 * @param ?string $callback_query_id Optional. Identifier of the callback query which triggered the message, if any. If specified and
 *     receiver_user_id is omitted, then the message is sent as an ephemeral reply to the callback query
 *     and will be shown only to the user who pressed the button. Ephemeral replies can't be sent to
 *     callback queries from messages in channel direct messages chats. The bot must still answer the
 *     callback query using answerCallbackQuery. (optional)
 * @param ?bool $replace_callback_query_message Optional. Pass True if the ephemeral message must be shown in place of the original message. Must be
 *     False for callback queries from ephemeral messages, which must be edited using regular
 *     editEphemeralMessage… methods. (optional)
 */
final class EphemeralMessageParameters implements \JsonSerializable
{
    public function __construct(
        public readonly ?int $receiver_user_id = null,
        public readonly ?string $callback_query_id = null,
        public readonly ?bool $replace_callback_query_message = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->receiver_user_id !== null) $data['receiver_user_id'] = $this->receiver_user_id;

        if ($this->callback_query_id !== null) $data['callback_query_id'] = $this->callback_query_id;

        if ($this->replace_callback_query_message !== null) $data['replace_callback_query_message'] = $this->replace_callback_query_message;


        return $data;
    }
}
