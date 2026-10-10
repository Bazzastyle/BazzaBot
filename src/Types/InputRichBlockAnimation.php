<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with an animation, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockanimation
 *
 * @param string $type Type of the block, always “animation”
 * @param InputMediaAnimation|array $animation The animation. Caption is ignored.
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockAnimation implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaAnimation|array $animation,
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
        $data['animation'] = $this->animation;
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
