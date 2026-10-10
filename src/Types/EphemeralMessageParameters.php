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
 * @param int $receiver_user_id Identifier of the user who will receive the message. It is not guaranteed that the user will receive
 *     the message, especially if they are offline. See here for more details.
 * @param ?string $callback_query_id Optional. Identifier of the callback query which triggered the message, if any (optional)
 * @param ?bool $replace_callback_query_message Optional. Pass True if the ephemeral message must be shown in place of the original message. Must be
 *     False for callback queries from ephemeral messages, which must be edited using regular
 *     editEphemeralMessage… methods. (optional)
 */
final class EphemeralMessageParameters implements \JsonSerializable
{
    public function __construct(
        public readonly int $receiver_user_id,
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
        $data['receiver_user_id'] = $this->receiver_user_id;
        if ($this->callback_query_id !== null) $data['callback_query_id'] = $this->callback_query_id;

        if ($this->replace_callback_query_message !== null) $data['replace_callback_query_message'] = $this->replace_callback_query_message;


        return $data;
    }
}
