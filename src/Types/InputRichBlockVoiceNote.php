<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a voice note, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvoicenote
 *
 * @param string $type Type of the block, always “voice_note”
 * @param InputMediaVoiceNote|array $voice_note The voice note. Caption is ignored.
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockVoiceNote implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaVoiceNote|array $voice_note,
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
        $data['voice_note'] = $this->voice_note;
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
