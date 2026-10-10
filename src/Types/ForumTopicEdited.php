<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about an edited forum topic.
 *
 * @see https://core.telegram.org/bots/api#forumtopicedited
 *
 * @param ?string $name Optional. New name of the topic, if it was edited (optional)
 * @param ?string $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty
 *     string if the icon was removed (optional)
 */
final class ForumTopicEdited implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $icon_custom_emoji_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->name !== null) $data['name'] = $this->name;

        if ($this->icon_custom_emoji_id !== null) $data['icon_custom_emoji_id'] = $this->icon_custom_emoji_id;


        return $data;
    }
}
