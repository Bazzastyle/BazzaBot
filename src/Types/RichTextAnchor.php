<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * An anchor.
 *
 * @see https://core.telegram.org/bots/api#richtextanchor
 *
 * @param string $type Type of the rich text, always “anchor”
 * @param string $name The name of the anchor
 */
final class RichTextAnchor implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
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
        $data['name'] = $this->name;

        return $data;
    }
}
