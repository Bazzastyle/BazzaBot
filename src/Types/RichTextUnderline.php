<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * An underlined text.
 *
 * @see https://core.telegram.org/bots/api#richtextunderline
 *
 * @param string $type Type of the rich text, always “underline”
 * @param RichText|array $text The text
 */
final class RichTextUnderline implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
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

        return $data;
    }
}
