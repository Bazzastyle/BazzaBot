<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block quotation, corresponding to the HTML tag <blockquote>.
 *
 * @see https://core.telegram.org/bots/api#richblockblockquotation
 *
 * @param string $type Type of the block, always “blockquote”
 * @param array $blocks Content of the block
 * @param RichText|array|null $credit Optional. Credit of the block (optional)
 */
final class RichBlockBlockQuotation implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly RichText|array|null $credit = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['blocks'] = $this->blocks;
        if ($this->credit !== null) $data['credit'] = $this->credit;


        return $data;
    }
}
