<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is taken directly from a built-in chat theme.
 *
 * @see https://core.telegram.org/bots/api#backgroundtypechattheme
 *
 * @param string $type Type of the background, always “chat_theme”
 * @param string $theme_name Name of the chat theme, which is usually an emoji
 */
final class BackgroundTypeChatTheme implements BackgroundType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $theme_name,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['theme_name'] = $this->theme_name;

        return $data;
    }
}
