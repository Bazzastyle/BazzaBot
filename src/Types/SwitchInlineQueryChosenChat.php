<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an inline button that switches the current user to inline mode in a chosen
 * chat, with an optional default inline query.
 *
 * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat
 *
 * @param ?string $query Optional. The default inline query to be inserted in the input field. If left empty, only the bot's
 *     username will be inserted. (optional)
 * @param ?bool $allow_user_chats Optional. True, if private chats with users can be chosen (optional)
 * @param ?bool $allow_bot_chats Optional. True, if private chats with bots can be chosen (optional)
 * @param ?bool $allow_group_chats Optional. True, if group and supergroup chats can be chosen (optional)
 * @param ?bool $allow_channel_chats Optional. True, if channel chats can be chosen (optional)
 */
final class SwitchInlineQueryChosenChat implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $query = null,
        public readonly ?bool $allow_user_chats = null,
        public readonly ?bool $allow_bot_chats = null,
        public readonly ?bool $allow_group_chats = null,
        public readonly ?bool $allow_channel_chats = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->query !== null) $data['query'] = $this->query;

        if ($this->allow_user_chats !== null) $data['allow_user_chats'] = $this->allow_user_chats;

        if ($this->allow_bot_chats !== null) $data['allow_bot_chats'] = $this->allow_bot_chats;

        if ($this->allow_group_chats !== null) $data['allow_group_chats'] = $this->allow_group_chats;

        if ($this->allow_channel_chats !== null) $data['allow_channel_chats'] = $this->allow_channel_chats;


        return $data;
    }
}
