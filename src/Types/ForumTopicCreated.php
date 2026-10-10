<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 *
 * @param string $name Name of the topic
 * @param int $icon_color Color of the topic icon in RGB format
 * @param ?string $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon (optional)
 * @param ?bool $is_name_implicit Optional. True, if the name of the topic wasn't specified explicitly by its creator and likely needs
 *     to be changed by the bot (optional)
 */
final class ForumTopicCreated implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly int $icon_color,
        public readonly ?string $icon_custom_emoji_id = null,
        public readonly ?bool $is_name_implicit = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['name'] = $this->name;
        $data['icon_color'] = $this->icon_color;
        if ($this->icon_custom_emoji_id !== null) $data['icon_custom_emoji_id'] = $this->icon_custom_emoji_id;

        if ($this->is_name_implicit !== null) $data['is_name_implicit'] = $this->is_name_implicit;


        return $data;
    }
}
