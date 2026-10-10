<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A cashtag.
 *
 * @see https://core.telegram.org/bots/api#richtextcashtag
 *
 * @param string $type Type of the rich text, always “cashtag”
 * @param RichText|array $text The text
 * @param string $cashtag The cashtag
 */
final class RichTextCashtag implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $cashtag,
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
        $data['cashtag'] = $this->cashtag;

        return $data;
    }
}
