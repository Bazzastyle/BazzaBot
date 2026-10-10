<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * An expandable block for details disclosure, corresponding to the HTML tag <details>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdetails
 *
 * @param string $type Type of the block, always “details”
 * @param RichText|array $summary Always shown summary of the block
 * @param array $blocks Content of the block
 * @param ?bool $is_open Optional. Pass True if the content of the block is visible by default (optional)
 */
final class InputRichBlockDetails implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $summary,
        public readonly array $blocks,
        public readonly ?bool $is_open = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['summary'] = $this->summary;
        $data['blocks'] = $this->blocks;
        if ($this->is_open !== null) $data['is_open'] = $this->is_open;


        return $data;
    }
}
