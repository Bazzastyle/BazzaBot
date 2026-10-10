<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A collage, corresponding to the custom HTML tag <tg-collage>.
 *
 * @see https://core.telegram.org/bots/api#richblockcollage
 *
 * @param string $type Type of the block, always “collage”
 * @param array $blocks Elements of the collage
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class RichBlockCollage implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly RichBlockCaption|array|null $caption = null,
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
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
