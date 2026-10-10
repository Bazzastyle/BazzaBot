<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a story.
 *
 * @see https://core.telegram.org/bots/api#story
 *
 * @param Chat|array $chat Chat that posted the story
 * @param int $id Unique identifier for the story in the chat
 */
final class Story implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly int $id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['id'] = $this->id;

        return $data;
    }
}
