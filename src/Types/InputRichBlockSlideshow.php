<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A slideshow, corresponding to the custom HTML tag <tg-slideshow>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockslideshow
 *
 * @param string $type Type of the block, always “slideshow”
 * @param array $blocks Elements of the slideshow
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockSlideshow implements InputRichBlock, \JsonSerializable
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
