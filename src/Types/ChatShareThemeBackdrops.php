<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains a list of backdrops, which can be used as the background of a theme of the
 * screen for sharing a link to a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#chatsharethemebackdrops
 *
 * @param array $backdrops The list of backdrops
 */
final class ChatShareThemeBackdrops implements \JsonSerializable
{
    public function __construct(
        public readonly array $backdrops,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['backdrops'] = $this->backdrops;

        return $data;
    }
}
