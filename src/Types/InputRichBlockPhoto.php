<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a photo, corresponding to the HTML tag <img>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockphoto
 *
 * @param string $type Type of the block, always “photo”
 * @param InputMediaPhoto|array $photo The photo. Caption is ignored.
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockPhoto implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaPhoto|array $photo,
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
        $data['photo'] = $this->photo;
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
