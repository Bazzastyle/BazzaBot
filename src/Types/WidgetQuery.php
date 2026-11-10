<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an incoming query from a widget in a message sent by the bot or via the bot.
 * Use answerWidgetQuery to answer the query. Each user can send at most 5 queries per 5 seconds to the
 * bot from all its widgets.
 *
 * @see https://core.telegram.org/bots/api#widgetquery
 *
 * @param string $id Unique identifier for this query
 * @param User|array $from Sender
 * @param string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the widget was sent
 * @param WidgetQueryType|array $type Type of the query
 * @param string $data Data of the query, 1-64 bytes
 * @param Chat|array|null $chat Optional. Chat with the message containing the widget; omitted if the widget is in an inline message (optional)
 * @param ?int $message_id Optional. Identifier of the message containing the widget; omitted if the widget is in an inline
 *     message (optional)
 * @param ?string $inline_message_id Optional. Identifier of the inline message containing the widget (optional)
 * @param ?string $chat_type Optional. For widgets in inline messages, type of the chat to which the message was sent. Can be
 *     either “sender” for a private chat with the inline query sender, “private”, “group”,
 *     “supergroup”, or “channel”. (optional)
 * @param ?string $widget_id Optional. Unique identifier of the shared widget, which sent the query; omitted if the widget isn't
 *     shared (optional)
 */
final class WidgetQuery implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $from,
        public readonly string $chat_instance,
        public readonly WidgetQueryType|array $type,
        public readonly string $data,
        public readonly Chat|array|null $chat = null,
        public readonly ?int $message_id = null,
        public readonly ?string $inline_message_id = null,
        public readonly ?string $chat_type = null,
        public readonly ?string $widget_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['from'] = $this->from;
        $data['chat_instance'] = $this->chat_instance;
        $data['type'] = $this->type;
        $data['data'] = $this->data;
        if ($this->chat !== null) $data['chat'] = $this->chat;

        if ($this->message_id !== null) $data['message_id'] = $this->message_id;

        if ($this->inline_message_id !== null) $data['inline_message_id'] = $this->inline_message_id;

        if ($this->chat_type !== null) $data['chat_type'] = $this->chat_type;

        if ($this->widget_id !== null) $data['widget_id'] = $this->widget_id;


        return $data;
    }
}
