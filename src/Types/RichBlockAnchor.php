<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with an anchor, corresponding to the HTML tag <a> with the attribute name.
 *
 * @see https://core.telegram.org/bots/api#richblockanchor
 *
 * @param string $type Type of the block, always “anchor”
 * @param string $name The name of the anchor
 */
final class RichBlockAnchor implements RichBlock, \JsonSerializable
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
