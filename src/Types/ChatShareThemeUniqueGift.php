<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The theme based on a unique gift owned by the user or the chat.
 *
 * @see https://core.telegram.org/bots/api#chatsharethemeuniquegift
 *
 * @param string $type Type of the theme, always “unique_gift”
 * @param UniqueGift|array $gift The gift
 */
final class ChatShareThemeUniqueGift implements ChatShareTheme, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly UniqueGift|array $gift,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['gift'] = $this->gift;

        return $data;
    }
}
