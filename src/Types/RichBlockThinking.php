<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a “Thinking…” placeholder, corresponding to the custom HTML tag <tg-thinking>.
 * The block may be used only in sendRichMessageDraft, therefore it can't be received in messages. See
 * https://t.me/addemoji/AIActions for examples of custom emoji that are recommended for usage in the
 * block.
 *
 * @see https://core.telegram.org/bots/api#richblockthinking
 *
 * @param string $type Type of the block, always “thinking”
 * @param RichText|array $text Text of the block. See https://t.me/addemoji/AIActions for examples of custom emoji that are
 *     recommended for usage in the block.
 */
final class RichBlockThinking implements RichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['text'] = $this->text;

        return $data;
    }
}
