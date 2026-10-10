<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A reference.
 *
 * @see https://core.telegram.org/bots/api#richtextreference
 *
 * @param string $type Type of the rich text, always “reference”
 * @param RichText|array $text Text of the reference
 * @param string $name The name of the reference
 */
final class RichTextReference implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $name,
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
        $data['name'] = $this->name;

        return $data;
    }
}
