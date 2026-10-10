<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a video, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#richblockvideo
 *
 * @param string $type Type of the block, always “video”
 * @param Video|array $video The video
 * @param ?bool $has_spoiler Optional. True, if the media preview is covered by a spoiler animation (optional)
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class RichBlockVideo implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Video|array $video,
        public readonly ?bool $has_spoiler = null,
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
        $data['video'] = $this->video;
        if ($this->has_spoiler !== null) $data['has_spoiler'] = $this->has_spoiler;

        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
