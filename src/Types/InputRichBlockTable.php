<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A table, corresponding to the HTML tag <table>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocktable
 *
 * @param string $type Type of the block, always “table”
 * @param array $cells Cells of the table
 * @param ?bool $is_bordered Optional. Pass True if the table has borders (optional)
 * @param ?bool $is_striped Optional. Pass True if the table is striped (optional)
 * @param ?bool $is_compact Optional. Pass True if table cells must have smaller indents (optional)
 * @param RichText|array|null $caption Optional. Caption of the table (optional)
 */
final class InputRichBlockTable implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $cells,
        public readonly ?bool $is_bordered = null,
        public readonly ?bool $is_striped = null,
        public readonly ?bool $is_compact = null,
        public readonly RichText|array|null $caption = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['cells'] = $this->cells;
        if ($this->is_bordered !== null) $data['is_bordered'] = $this->is_bordered;

        if ($this->is_striped !== null) $data['is_striped'] = $this->is_striped;

        if ($this->is_compact !== null) $data['is_compact'] = $this->is_compact;

        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
