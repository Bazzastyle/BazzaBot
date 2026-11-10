<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a backdrop, which can be used as the background of a theme of the screen for
 * sharing a link to a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#chatsharethemebackdrop
 *
 * @param int $id Unique identifier of the backdrop
 * @param string $name Name of the backdrop
 * @param UniqueGiftBackdropColors|array $colors Colors of the backdrop
 */
final class ChatShareThemeBackdrop implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly UniqueGiftBackdropColors|array $colors,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['colors'] = $this->colors;

        return $data;
    }
}
