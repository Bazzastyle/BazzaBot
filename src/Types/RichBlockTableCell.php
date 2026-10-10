<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Cell in a table.
 *
 * @see https://core.telegram.org/bots/api#richblocktablecell
 *
 * @param string $align Horizontal cell content alignment. Currently, must be one of “left”, “center”, or
 *     “right”.
 * @param string $valign Vertical cell content alignment. Currently, must be one of “top”, “middle”, or “bottom”.
 * @param RichText|array|null $text Optional. Text in the cell. If omitted, then the cell is invisible. (optional)
 * @param ?bool $is_header Optional. True, if the cell is a header cell (optional)
 * @param ?int $colspan Optional. The number of columns the cell spans if it is bigger than 1 (optional)
 * @param ?int $rowspan Optional. The number of rows the cell spans if it is bigger than 1 (optional)
 */
final class RichBlockTableCell implements \JsonSerializable
{
    public function __construct(
        public readonly string $align,
        public readonly string $valign,
        public readonly RichText|array|null $text = null,
        public readonly ?bool $is_header = null,
        public readonly ?int $colspan = null,
        public readonly ?int $rowspan = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['align'] = $this->align;
        $data['valign'] = $this->valign;
        if ($this->text !== null) $data['text'] = $this->text;

        if ($this->is_header !== null) $data['is_header'] = $this->is_header;

        if ($this->colspan !== null) $data['colspan'] = $this->colspan;

        if ($this->rowspan !== null) $data['rowspan'] = $this->rowspan;


        return $data;
    }
}
