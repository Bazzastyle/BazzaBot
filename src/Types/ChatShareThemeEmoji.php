<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The theme with emoji placed on a background.
 *
 * @see https://core.telegram.org/bots/api#chatsharethemeemoji
 *
 * @param string $type Type of the theme, always “emoji”
 * @param array $emojis The emoji; 0-6 regular or custom emoji
 * @param ?int $background_backdrop_id Optional. Identifier of the backdrop used as the background; omitted if the default background is
 *     used. Use getChatShareThemeBackdrops to get details about the backdrop. (optional)
 */
final class ChatShareThemeEmoji implements ChatShareTheme, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $emojis,
        public readonly ?int $background_backdrop_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['emojis'] = $this->emojis;
        if ($this->background_backdrop_id !== null) $data['background_backdrop_id'] = $this->background_backdrop_id;


        return $data;
    }
}
