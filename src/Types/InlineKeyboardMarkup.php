<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 *
 * @param array $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 * @param ?bool $force_reply Optional. Pass True if the reply interface must be shown to the user, as if they had manually
 *     selected the bot's message and tapped 'Reply'. The value of the field can't be changed when the
 *     inline keyboard is edited. (optional)
 */
final class InlineKeyboardMarkup implements \JsonSerializable
{
    public function __construct(
        public readonly array $inline_keyboard,
        public readonly ?bool $force_reply = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['inline_keyboard'] = $this->inline_keyboard;
        if ($this->force_reply !== null) $data['force_reply'] = $this->force_reply;


        return $data;
    }
}
