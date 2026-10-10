<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about a chat that was shared with the bot using a
 * KeyboardButtonRequestChat button.
 *
 * @see https://core.telegram.org/bots/api#chatshared
 *
 * @param int $request_id Identifier of the request
 * @param int $chat_id Identifier of the shared chat. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a 64-bit integer or double-precision float type are safe for storing this
 *     identifier. The bot may not have access to the chat and could be unable to use this identifier,
 *     unless the chat is already known to the bot by some other means.
 * @param ?string $title Optional. Title of the chat, if the title was requested by the bot (optional)
 * @param ?string $username Optional. Username of the chat, if the username was requested by the bot and available (optional)
 * @param ?array $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot (optional)
 */
final class ChatShared implements \JsonSerializable
{
    public function __construct(
        public readonly int $request_id,
        public readonly int $chat_id,
        public readonly ?string $title = null,
        public readonly ?string $username = null,
        public readonly ?array $photo = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['request_id'] = $this->request_id;
        $data['chat_id'] = $this->chat_id;
        if ($this->title !== null) $data['title'] = $this->title;

        if ($this->username !== null) $data['username'] = $this->username;

        if ($this->photo !== null) $data['photo'] = $this->photo;


        return $data;
    }
}
