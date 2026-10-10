<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a custom keyboard with reply options (see Introduction to bots for details
 * and examples). Not supported in channels and for messages sent on behalf of a business account.
 *
 * @see https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * @param array $keyboard Array of button rows, each represented by an Array of KeyboardButton objects
 * @param ?bool $is_persistent Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults
 *     to False, in which case the custom keyboard can be hidden and opened with a keyboard icon. (optional)
 * @param ?bool $resize_keyboard Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the
 *     keyboard smaller if there are just two rows of buttons). Defaults to False, in which case the custom
 *     keyboard is always of the same height as the app's standard keyboard. (optional)
 * @param ?bool $one_time_keyboard Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still
 *     be available, but clients will automatically display the usual letter-keyboard in the chat - the
 *     user can press a special button in the input field to see the custom keyboard again. Defaults to
 *     False. (optional)
 * @param ?string $input_field_placeholder Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64
 *     characters (optional)
 * @param ?bool $selective Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1)
 *     users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply to a
 *     message in the same chat and forum topic, sender of the original message.Example: A user requests to
 *     change the bot's language, bot replies to the request with a keyboard to select the new language.
 *     Other users in the group don't see the keyboard. (optional)
 * @param ?bool $force_reply Optional. Pass True if the reply interface must be shown to the user, as if they had manually
 *     selected the bot's message and tapped 'Reply' (optional)
 */
final class ReplyKeyboardMarkup implements \JsonSerializable
{
    public function __construct(
        public readonly array $keyboard,
        public readonly ?bool $is_persistent = null,
        public readonly ?bool $resize_keyboard = null,
        public readonly ?bool $one_time_keyboard = null,
        public readonly ?string $input_field_placeholder = null,
        public readonly ?bool $selective = null,
        public readonly ?bool $force_reply = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['keyboard'] = $this->keyboard;
        if ($this->is_persistent !== null) $data['is_persistent'] = $this->is_persistent;

        if ($this->resize_keyboard !== null) $data['resize_keyboard'] = $this->resize_keyboard;

        if ($this->one_time_keyboard !== null) $data['one_time_keyboard'] = $this->one_time_keyboard;

        if ($this->input_field_placeholder !== null) $data['input_field_placeholder'] = $this->input_field_placeholder;

        if ($this->selective !== null) $data['selective'] = $this->selective;

        if ($this->force_reply !== null) $data['force_reply'] = $this->force_reply;


        return $data;
    }
}
