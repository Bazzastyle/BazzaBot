<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A link to an anchor.
 *
 * @see https://core.telegram.org/bots/api#richtextanchorlink
 *
 * @param string $type Type of the rich text, always “anchor_link”
 * @param RichText|array $text The link text
 * @param string $anchor_name The name of the anchor. If the name is empty, then the link brings back to the top of the message.
 */
final class RichTextAnchorLink implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $anchor_name,
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
        $data['anchor_name'] = $this->anchor_name;

        return $data;
    }
}
