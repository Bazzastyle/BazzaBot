<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a map, corresponding to the custom HTML tag <tg-map>.
 *
 * @see https://core.telegram.org/bots/api#richblockmap
 *
 * @param string $type Type of the block, always “map”
 * @param Location|array $location Location of the center of the map
 * @param int $zoom Map zoom level
 * @param int $width Expected width of the map
 * @param int $height Expected height of the map
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class RichBlockMap implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Location|array $location,
        public readonly int $zoom,
        public readonly int $width,
        public readonly int $height,
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
        $data['location'] = $this->location;
        $data['zoom'] = $this->zoom;
        $data['width'] = $this->width;
        $data['height'] = $this->height;
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
