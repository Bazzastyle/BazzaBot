<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * An item of a list.
 *
 * @see https://core.telegram.org/bots/api#richblocklistitem
 *
 * @param string $label Label of the item
 * @param array $blocks The content of the item
 * @param ?bool $has_checkbox Optional. True, if the item has a checkbox (optional)
 * @param ?bool $is_checked Optional. True, if the item has a checked checkbox (optional)
 * @param ?int $value Optional. For ordered lists, the numeric value of the item label (optional)
 * @param ?string $type Optional. For ordered lists, the type of the item label; must be one of “a” for lowercase
 *     letters, “A” for uppercase letters, “i” for lowercase Roman numerals, “I” for uppercase
 *     Roman numerals, or “1” for decimal numbers (optional)
 */
final class RichBlockListItem implements \JsonSerializable
{
    public function __construct(
        public readonly string $label,
        public readonly array $blocks,
        public readonly ?bool $has_checkbox = null,
        public readonly ?bool $is_checked = null,
        public readonly ?int $value = null,
        public readonly ?string $type = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['label'] = $this->label;
        $data['blocks'] = $this->blocks;
        if ($this->has_checkbox !== null) $data['has_checkbox'] = $this->has_checkbox;

        if ($this->is_checked !== null) $data['is_checked'] = $this->is_checked;

        if ($this->value !== null) $data['value'] = $this->value;

        if ($this->type !== null) $data['type'] = $this->type;


        return $data;
    }
}
