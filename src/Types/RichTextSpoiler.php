<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A text covered by a spoiler.
 *
 * @see https://core.telegram.org/bots/api#richtextspoiler
 *
 * @param string $type Type of the rich text, always “spoiler”
 * @param RichText|array $text The text
 */
final class RichTextSpoiler implements RichText, \JsonSerializable
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
