<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a clickable area on a story media.
 *
 * @see https://core.telegram.org/bots/api#storyarea
 *
 * @param StoryAreaPosition|array $position Position of the area
 * @param StoryAreaType|array $type Type of the area
 */
final class StoryArea implements \JsonSerializable
{
    public function __construct(
        public readonly StoryAreaPosition|array $position,
        public readonly StoryAreaType|array $type,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['position'] = $this->position;
        $data['type'] = $this->type;

        return $data;
    }
}
