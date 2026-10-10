<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A mention by a username.
 *
 * @see https://core.telegram.org/bots/api#richtextmention
 *
 * @param string $type Type of the rich text, always “mention”
 * @param RichText|array $text The text
 * @param string $username The username
 */
final class RichTextMention implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $username,
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
        $data['username'] = $this->username;

        return $data;
    }
}
