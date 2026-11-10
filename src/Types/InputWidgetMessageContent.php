<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of a message with an HTML widget to be sent as the result of an inline query.
 * Currently, widgets can't be sent in response to inline queries in the production environment.
 *
 * @see https://core.telegram.org/bots/api#inputwidgetmessagecontent
 *
 * @param string $html HTML code of the widget, 1-32768 bytes. The code must not exceed 4096 bytes when compressed by zlib
 *     with the maximum compression level.
 * @param ?int $width Optional. Width of the widget in logical pixels; omit if the widget must occupy the whole width of
 *     the message bubble. The width is clamped by the app to the range from 200 to the maximum width of
 *     the message bubble. (optional)
 * @param ?int $height Optional. Height of the widget in logical pixels; omit if the height of the widget isn't fixed. The
 *     height is clamped by the app to the range 50-600. (optional)
 * @param ?string $public_data Optional. Public data of the widget, 0-1024 bytes, which will be available wherever the widget is
 *     shown. If the widget is shared, then all messages with it will have the same public data. (optional)
 * @param ?string $chat_data Optional. Data of the widget, which is specific to the message, 0-1024 bytes (optional)
 * @param ?string $caption Optional. Widget caption, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the widget caption. See formatting options for more details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the widget (optional)
 * @param ?bool $allow_queries Optional. Pass True to allow the widget to send queries to the bot (optional)
 * @param ?bool $is_shared Optional. Pass True to create a shared widget. Each message sent from the result creates a separate
 *     shared widget, whose identifier is received by the bot only in the field widget_id of queries from
 *     the widget. To send an existing shared widget in response to an inline query, use
 *     InputSharedWidgetMessageContent instead. (optional)
 */
final class InputWidgetMessageContent implements InputMessageContent, \JsonSerializable
{
    public function __construct(
        public readonly string $html,
        public readonly ?int $width = null,
        public readonly ?int $height = null,
        public readonly ?string $public_data = null,
        public readonly ?string $chat_data = null,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?bool $show_caption_above_media = null,
        public readonly ?bool $allow_queries = null,
        public readonly ?bool $is_shared = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['html'] = $this->html;
        if ($this->width !== null) $data['width'] = $this->width;

        if ($this->height !== null) $data['height'] = $this->height;

        if ($this->public_data !== null) $data['public_data'] = $this->public_data;

        if ($this->chat_data !== null) $data['chat_data'] = $this->chat_data;

        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->show_caption_above_media !== null) $data['show_caption_above_media'] = $this->show_caption_above_media;

        if ($this->allow_queries !== null) $data['allow_queries'] = $this->allow_queries;

        if ($this->is_shared !== null) $data['is_shared'] = $this->is_shared;


        return $data;
    }
}
