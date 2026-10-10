<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A text with a link.
 *
 * @see https://core.telegram.org/bots/api#richtexturl
 *
 * @param string $type Type of the rich text, always “url”
 * @param RichText|array $text The text
 * @param string $url URL of the link
 */
final class RichTextUrl implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $url,
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
        $data['url'] = $this->url;

        return $data;
    }
}
