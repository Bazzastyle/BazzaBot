<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A hashtag.
 *
 * @see https://core.telegram.org/bots/api#richtexthashtag
 *
 * @param string $type Type of the rich text, always “hashtag”
 * @param RichText|array $text The text
 * @param string $hashtag The hashtag
 */
final class RichTextHashtag implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $hashtag,
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
        $data['hashtag'] = $this->hashtag;

        return $data;
    }
}
