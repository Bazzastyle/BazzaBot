<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of a message with a shared widget to be sent as the result of an inline
 * query. Currently, widgets can't be sent in response to inline queries in the production environment.
 *
 * @see https://core.telegram.org/bots/api#inputsharedwidgetmessagecontent
 *
 * @param string $widget_id Unique identifier of the shared widget created by the bot
 * @param ?string $chat_data Optional. Data of the widget, which is specific to the message, 0-1024 bytes (optional)
 * @param ?string $caption Optional. Widget caption, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the widget caption. See formatting options for more details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the widget (optional)
 */
final class InputSharedWidgetMessageContent implements InputMessageContent, \JsonSerializable
{
    public function __construct(
        public readonly string $widget_id,
        public readonly ?string $chat_data = null,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?bool $show_caption_above_media = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['widget_id'] = $this->widget_id;
        if ($this->chat_data !== null) $data['chat_data'] = $this->chat_data;

        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->show_caption_above_media !== null) $data['show_caption_above_media'] = $this->show_caption_above_media;


        return $data;
    }
}
