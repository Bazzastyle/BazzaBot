<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A link to a reference.
 *
 * @see https://core.telegram.org/bots/api#richtextreferencelink
 *
 * @param string $type Type of the rich text, always “reference_link”
 * @param RichText|array $text The link text
 * @param string $reference_name The name of the reference
 */
final class RichTextReferenceLink implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $reference_name,
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
        $data['reference_name'] = $this->reference_name;

        return $data;
    }
}
