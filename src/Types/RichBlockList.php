<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A list of blocks, corresponding to the HTML tag <ul> or <ol> with multiple nested tags <li>.
 *
 * @see https://core.telegram.org/bots/api#richblocklist
 *
 * @param string $type Type of the block, always “list”
 * @param array $items Items of the list
 */
final class RichBlockList implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $items,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['items'] = $this->items;

        return $data;
    }
}
