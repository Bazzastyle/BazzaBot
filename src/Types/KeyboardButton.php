<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents one button of the reply keyboard. At most one of the fields other than text,
 * icon_custom_emoji_id, and style must be used to specify the type of the button. For simple text
 * buttons, String can be used instead of this object to specify the button text.
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 *
 * @param string $text Text of the button. If none of the fields other than text, icon_custom_emoji_id, and style are used,
 *     it will be sent as a message when the button is pressed.
 * @param ?string $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown before the text of the button. Can only be
 *     used by bots that purchased additional usernames on Fragment or in the messages directly sent by the
 *     bot to private, group and supergroup chats if the owner of the bot has a Telegram Premium
 *     subscription. (optional)
 * @param ?string $style Optional. Style of the button. Must be one of “danger” (red), “success” (green) or
 *     “primary” (blue). If omitted, then an app-specific style is used. (optional)
 * @param KeyboardButtonRequestUsers|array|null $request_users Optional. If specified, pressing the button will open a list of suitable users. Identifiers of
 *     selected users will be sent to the bot in a “users_shared” service message. Available in private
 *     chats only. (optional)
 * @param KeyboardButtonRequestChat|array|null $request_chat Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat
 *     will send its identifier to the bot in a “chat_shared” service message. Available in private
 *     chats only. (optional)
 * @param KeyboardButtonRequestManagedBot|array|null $request_managed_bot Optional. If specified, pressing the button will ask the user to create and share a bot that will be
 *     managed by the current bot. Available for bots that enabled management of other bots in the
 *     @BotFather Mini App. Available in private chats only. (optional)
 * @param ?bool $request_contact Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
 *     Available in private chats only. (optional)
 * @param ?bool $request_location Optional. If True, the user's current location will be sent when the button is pressed. Available in
 *     private chats only. (optional)
 * @param KeyboardButtonPollType|array|null $request_poll Optional. If specified, the user will be asked to create a poll and send it to the bot when the
 *     button is pressed. Available in private chats only. (optional)
 * @param WebAppInfo|array|null $web_app Optional. If specified, the described Web App will be launched when the button is pressed. The Web
 *     App will be able to send a “web_app_data” service message. Available in private chats only. (optional)
 */
final class KeyboardButton implements \JsonSerializable
{
    public function __construct(
        public readonly string $text,
        public readonly ?string $icon_custom_emoji_id = null,
        public readonly ?string $style = null,
        public readonly KeyboardButtonRequestUsers|array|null $request_users = null,
        public readonly KeyboardButtonRequestChat|array|null $request_chat = null,
        public readonly KeyboardButtonRequestManagedBot|array|null $request_managed_bot = null,
        public readonly ?bool $request_contact = null,
        public readonly ?bool $request_location = null,
        public readonly KeyboardButtonPollType|array|null $request_poll = null,
        public readonly WebAppInfo|array|null $web_app = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['text'] = $this->text;
        if ($this->icon_custom_emoji_id !== null) $data['icon_custom_emoji_id'] = $this->icon_custom_emoji_id;

        if ($this->style !== null) $data['style'] = $this->style;

        if ($this->request_users !== null) $data['request_users'] = $this->request_users;

        if ($this->request_chat !== null) $data['request_chat'] = $this->request_chat;

        if ($this->request_managed_bot !== null) $data['request_managed_bot'] = $this->request_managed_bot;

        if ($this->request_contact !== null) $data['request_contact'] = $this->request_contact;

        if ($this->request_location !== null) $data['request_location'] = $this->request_location;

        if ($this->request_poll !== null) $data['request_poll'] = $this->request_poll;

        if ($this->web_app !== null) $data['web_app'] = $this->web_app;


        return $data;
    }
}
