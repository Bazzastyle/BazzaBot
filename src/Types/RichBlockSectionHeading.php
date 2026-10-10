<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A section heading, corresponding to the HTML tags <h1>, <h2>, <h3>, <h4>, <h5>, or <h6>.
 *
 * @see https://core.telegram.org/bots/api#richblocksectionheading
 *
 * @param string $type Type of the block, always “heading”
 * @param RichText|array $text Text of the block
 * @param int $size Relative size of the text font; 1-6, 1 is the largest, 6 is the smallest
 */
final class RichBlockSectionHeading implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly int $size,
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
        $data['size'] = $this->size;

        return $data;
    }
}
