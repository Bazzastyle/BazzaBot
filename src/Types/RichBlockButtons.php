<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block containing a list of buttons that are shown in one row, corresponding to the custom HTML tag
 * <tg-button-row>.
 *
 * @see https://core.telegram.org/bots/api#richblockbuttons
 *
 * @param string $type Type of the block, always “buttons”
 * @param array $buttons The buttons
 * @param ?string $align Optional. Horizontal alignment of the buttons. Currently, must be one of “left”, “center”,
 *     or “right”. (optional)
 */
final class RichBlockButtons implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $buttons,
        public readonly ?string $align = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['buttons'] = $this->buttons;
        if ($this->align !== null) $data['align'] = $this->align;


        return $data;
    }
}
