<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A regular emoji.
 *
 * @see https://core.telegram.org/bots/api#emojitypeemoji
 *
 * @param string $type Type of the emoji, always “emoji”
 * @param string $emoji The emoji
 */
final class EmojiTypeEmoji implements EmojiType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $emoji,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['emoji'] = $this->emoji;

        return $data;
    }
}
