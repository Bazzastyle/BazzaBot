<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A custom emoji.
 *
 * @see https://core.telegram.org/bots/api#richtextcustomemoji
 *
 * @param string $type Type of the rich text, always “custom_emoji”
 * @param string $custom_emoji_id Unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the
 *     sticker.
 * @param string $alternative_text Alternative emoji for the custom emoji
 */
final class RichTextCustomEmoji implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $custom_emoji_id,
        public readonly string $alternative_text,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['custom_emoji_id'] = $this->custom_emoji_id;
        $data['alternative_text'] = $this->alternative_text;

        return $data;
    }
}
