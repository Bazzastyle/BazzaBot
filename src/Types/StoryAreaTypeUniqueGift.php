<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a story area pointing to a unique gift. Currently, a story can have at most 1 unique gift
 * area.
 *
 * @see https://core.telegram.org/bots/api#storyareatypeuniquegift
 *
 * @param string $type Type of the area, always “unique_gift”
 * @param string $name Unique name of the gift
 */
final class StoryAreaTypeUniqueGift implements StoryAreaType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['name'] = $this->name;

        return $data;
    }
}
