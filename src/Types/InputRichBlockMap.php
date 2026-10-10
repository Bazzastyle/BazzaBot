<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a map, corresponding to the custom HTML tag <tg-map>. The map's width and height must
 * not exceed 10000 in total. The width and height ratio must be at most 20.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmap
 *
 * @param string $type Type of the block, always “map”
 * @param Location|array $location Location of the center of the map
 * @param ?int $zoom Optional. Map zoom level; 0-24 (optional)
 * @param ?int $width Optional. Map width; 0-10000 (optional)
 * @param ?int $height Optional. Map height; 0-10000 (optional)
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockMap implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Location|array $location,
        public readonly ?int $zoom = null,
        public readonly ?int $width = null,
        public readonly ?int $height = null,
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
        if ($this->zoom !== null) $data['zoom'] = $this->zoom;

        if ($this->width !== null) $data['width'] = $this->width;

        if ($this->height !== null) $data['height'] = $this->height;

        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
