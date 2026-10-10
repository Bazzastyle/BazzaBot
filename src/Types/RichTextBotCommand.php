<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A bot command.
 *
 * @see https://core.telegram.org/bots/api#richtextbotcommand
 *
 * @param string $type Type of the rich text, always “bot_command”
 * @param RichText|array $text The text
 * @param string $bot_command The bot command
 */
final class RichTextBotCommand implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $bot_command,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['text'] = $this->text;
        $data['bot_command'] = $this->bot_command;

        return $data;
    }
}
