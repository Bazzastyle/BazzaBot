<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object defines the criteria used to request a suitable chat. Information about the selected
 * chat will be shared with the bot when the corresponding button is pressed. The bot will be granted
 * requested rights in the chat if appropriate. More about requesting chats ».
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 *
 * @param int $request_id Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must
 *     be unique within the message.
 * @param bool $chat_is_channel Pass True to request a channel chat, pass False to request a group or a supergroup chat
 * @param ?bool $chat_is_forum Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not
 *     specified, no additional restrictions are applied. (optional)
 * @param ?bool $chat_has_username Optional. Pass True to request a supergroup or a channel with a username, pass False to request a
 *     chat without a username. If not specified, no additional restrictions are applied. (optional)
 * @param ?bool $chat_is_created Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are
 *     applied. (optional)
 * @param ChatAdministratorRights|array|null $user_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the user in the
 *     chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional
 *     restrictions are applied. (optional)
 * @param ChatAdministratorRights|array|null $bot_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat.
 *     The rights must be a subset of user_administrator_rights. If not specified, no additional
 *     restrictions are applied. (optional)
 * @param ?bool $bot_is_member Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional
 *     restrictions are applied. (optional)
 * @param ?bool $request_title Optional. Pass True to request the chat's title (optional)
 * @param ?bool $request_username Optional. Pass True to request the chat's username (optional)
 * @param ?bool $request_photo Optional. Pass True to request the chat's photo (optional)
 */
final class KeyboardButtonRequestChat implements \JsonSerializable
{
    public function __construct(
        public readonly int $request_id,
        public readonly bool $chat_is_channel,
        public readonly ?bool $chat_is_forum = null,
        public readonly ?bool $chat_has_username = null,
        public readonly ?bool $chat_is_created = null,
        public readonly ChatAdministratorRights|array|null $user_administrator_rights = null,
        public readonly ChatAdministratorRights|array|null $bot_administrator_rights = null,
        public readonly ?bool $bot_is_member = null,
        public readonly ?bool $request_title = null,
        public readonly ?bool $request_username = null,
        public readonly ?bool $request_photo = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['request_id'] = $this->request_id;
        $data['chat_is_channel'] = $this->chat_is_channel;
        if ($this->chat_is_forum !== null) $data['chat_is_forum'] = $this->chat_is_forum;

        if ($this->chat_has_username !== null) $data['chat_has_username'] = $this->chat_has_username;

        if ($this->chat_is_created !== null) $data['chat_is_created'] = $this->chat_is_created;

        if ($this->user_administrator_rights !== null) $data['user_administrator_rights'] = $this->user_administrator_rights;

        if ($this->bot_administrator_rights !== null) $data['bot_administrator_rights'] = $this->bot_administrator_rights;

        if ($this->bot_is_member !== null) $data['bot_is_member'] = $this->bot_is_member;

        if ($this->request_title !== null) $data['request_title'] = $this->request_title;

        if ($this->request_username !== null) $data['request_username'] = $this->request_username;

        if ($this->request_photo !== null) $data['request_photo'] = $this->request_photo;


        return $data;
    }
}
