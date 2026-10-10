<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A divider, corresponding to the HTML tag <hr/>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdivider
 *
 * @param string $type Type of the block, always “divider”
 */
final class InputRichBlockDivider implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;

        return $data;
    }
}
