<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A mention of a Telegram user by their identifier.
 *
 * @see https://core.telegram.org/bots/api#richtexttextmention
 *
 * @param string $type Type of the rich text, always “text_mention”
 * @param RichText|array $text The text
 * @param User|array $user The mentioned user
 */
final class RichTextTextMention implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly User|array $user,
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
        $data['user'] = $this->user;

        return $data;
    }
}
