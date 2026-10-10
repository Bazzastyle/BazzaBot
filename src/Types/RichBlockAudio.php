<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a music file, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#richblockaudio
 *
 * @param string $type Type of the block, always “audio”
 * @param Audio|array $audio The audio
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class RichBlockAudio implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Audio|array $audio,
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
