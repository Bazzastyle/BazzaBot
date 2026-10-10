<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a music file, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockaudio
 *
 * @param string $type Type of the block, always “audio”
 * @param InputMediaAudio|array $audio The audio. Caption is ignored.
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockAudio implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaAudio|array $audio,
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
        $data['audio'] = $this->audio;
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
