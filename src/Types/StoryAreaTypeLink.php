<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a story area pointing to an HTTP or tg:// link. Currently, a story can have up to 3 link
 * areas.
 *
 * @see https://core.telegram.org/bots/api#storyareatypelink
 *
 * @param string $type Type of the area, always “link”
 * @param string $url HTTP or tg:// URL to be opened when the area is clicked
 */
final class StoryAreaTypeLink implements StoryAreaType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $url,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['url'] = $this->url;

        return $data;
    }
}
