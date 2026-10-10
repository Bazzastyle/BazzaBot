<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a button in a RichMessage. Exactly one of the fields other than text and
 * style must be used to specify the type of the button.
 *
 * @see https://core.telegram.org/bots/api#richmessagebutton
 *
 * @param RichText|array $text Text of the button. May contain only plain text, RichTextCustomEmoji and RichTextDateTime entities.
 * @param ?string $style Optional. Style of the button. Must be one of “danger”, “success”, “primary”, or
 *     “link” (the button is shown as a regular link without borders). Apps may use theme-specific
 *     colors for the button background and text based on the style. The style “link” is allowed only
 *     for callback buttons. (optional)
 * @param ?string $url Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id>
 *     can be used to mention a user by their identifier without using a username, if this is allowed by
 *     their privacy settings. (optional)
 * @param ?string $callback_data Optional. Data to be sent in a callback query to the bot when the button is pressed, 1-64 bytes (optional)
 * @param WebAppInfo|array|null $web_app Optional. Description of the Web App that will be launched when the user presses the button. The Web
 *     App will be able to send an arbitrary message on behalf of the user using the method
 *     answerWebAppQuery. Available only in private chats between a user and the bot. Not supported for
 *     messages sent on behalf of a business account. (optional)
 * @param LoginUrl|array|null $login_url Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for
 *     the Telegram Login Widget. Not supported for ephemeral messages. (optional)
 * @param ?string $switch_inline_query Optional. If set, pressing the button will prompt the user to select one of their chats, open that
 *     chat and insert the bot's username and the specified inline query in the input field. May be empty,
 *     in which case just the bot's username will be inserted. Not supported for messages sent in channel
 *     direct messages chats and on behalf of a business account. (optional)
 * @param ?string $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query
 *     in the current chat's input field. May be empty, in which case only the bot's username will be
 *     inserted. Not supported in channels and for messages sent in channel direct messages chats and on
 *     behalf of a business account. (optional)
 * @param SwitchInlineQueryChosenChat|array|null $switch_inline_query_chosen_chat Optional. If set, pressing the button will prompt the user to select one of their chats of the
 *     specified type, open that chat and insert the bot's username and the specified inline query in the
 *     input field. Not supported for messages sent in channel direct messages chats and on behalf of a
 *     business account. (optional)
 * @param CopyTextButton|array|null $copy_text Optional. A button that copies the specified text to the clipboard (optional)
 * @param DisabledButton|array|null $disabled Optional. If set, then the button is disabled and does nothing (optional)
 */
final class RichMessageButton implements \JsonSerializable
{
    public function __construct(
        public readonly RichText|array $text,
        public readonly ?string $style = null,
        public readonly ?string $url = null,
        public readonly ?string $callback_data = null,
        public readonly WebAppInfo|array|null $web_app = null,
        public readonly LoginUrl|array|null $login_url = null,
        public readonly ?string $switch_inline_query = null,
        public readonly ?string $switch_inline_query_current_chat = null,
        public readonly SwitchInlineQueryChosenChat|array|null $switch_inline_query_chosen_chat = null,
        public readonly CopyTextButton|array|null $copy_text = null,
        public readonly DisabledButton|array|null $disabled = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['text'] = $this->text;
        if ($this->style !== null) $data['style'] = $this->style;

        if ($this->url !== null) $data['url'] = $this->url;

        if ($this->callback_data !== null) $data['callback_data'] = $this->callback_data;

        if ($this->web_app !== null) $data['web_app'] = $this->web_app;

        if ($this->login_url !== null) $data['login_url'] = $this->login_url;

        if ($this->switch_inline_query !== null) $data['switch_inline_query'] = $this->switch_inline_query;

        if ($this->switch_inline_query_current_chat !== null) $data['switch_inline_query_current_chat'] = $this->switch_inline_query_current_chat;

        if ($this->switch_inline_query_chosen_chat !== null) $data['switch_inline_query_chosen_chat'] = $this->switch_inline_query_chosen_chat;

        if ($this->copy_text !== null) $data['copy_text'] = $this->copy_text;

        if ($this->disabled !== null) $data['disabled'] = $this->disabled;


        return $data;
    }
}
