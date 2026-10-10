<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the
 * user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely
 * useful if you want to create user-friendly step-by-step interfaces without having to sacrifice
 * privacy mode. Not supported in channels and for messages sent on behalf of a user account.
 *
 * @see https://core.telegram.org/bots/api#forcereply
 *
 * @param bool $force_reply Shows reply interface to the user, as if they had manually selected the bot's message and tapped
 *     'Reply'
 * @param ?string $input_field_placeholder Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters (optional)
 * @param ?bool $selective Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users
 *     that are @mentioned in the text of the Message object; 2) if the bot's message is a reply to a
 *     message in the same chat and forum topic, sender of the original message. (optional)
 */
final class ForceReply implements \JsonSerializable
{
    public function __construct(
        public readonly bool $force_reply,
        public readonly ?string $input_field_placeholder = null,
        public readonly ?bool $selective = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['force_reply'] = $this->force_reply;
        if ($this->input_field_placeholder !== null) $data['input_field_placeholder'] = $this->input_field_placeholder;

        if ($this->selective !== null) $data['selective'] = $this->selective;


        return $data;
    }
}
