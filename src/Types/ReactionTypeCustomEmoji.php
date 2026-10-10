<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The reaction is based on a custom emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypecustomemoji
 *
 * @param string $type Type of the reaction, always “custom_emoji”
 * @param string $custom_emoji_id Custom emoji identifier
 */
final class ReactionTypeCustomEmoji implements ReactionType, \JsonSerializable
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
