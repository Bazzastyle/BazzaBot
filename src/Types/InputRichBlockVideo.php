<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a video, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvideo
 *
 * @param string $type Type of the block, always “video”
 * @param InputMediaVideo|array $video The video. Caption is ignored.
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockVideo implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaVideo|array $video,
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
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
