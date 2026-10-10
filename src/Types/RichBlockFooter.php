<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A footer, corresponding to the HTML tag <footer>.
 *
 * @see https://core.telegram.org/bots/api#richblockfooter
 *
 * @param string $type Type of the block, always “footer”
 * @param RichText|array $text Text of the block
 */
final class RichBlockFooter implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
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

        return $data;
    }
}
