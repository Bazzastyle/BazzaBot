<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A custom emoji.
 *
 * @see https://core.telegram.org/bots/api#emojitypecustomemoji
 *
 * @param string $type Type of the emoji, always “custom_emoji”
 * @param string $custom_emoji_id Identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the
 *     sticker.
 */
final class EmojiTypeCustomEmoji implements EmojiType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $custom_emoji_id,
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

        return $data;
    }
}
