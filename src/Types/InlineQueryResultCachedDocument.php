<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by
 * the user with an optional caption. Alternatively, you can use input_message_content to send a
 * message with the specified content instead of the file.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 *
 * @param string $type Type of the result, must be document
 * @param string $id Unique identifier for this result, 1-64 bytes
 * @param string $title Title for the result
 * @param string $document_file_id A valid file identifier for the file
 * @param ?string $description Optional. Short description of the result (optional)
 * @param ?string $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more
 *     details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the file (optional)
 */
final class InlineQueryResultCachedDocument implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $title,
        public readonly string $document_file_id,
        public readonly ?string $description = null,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly InlineKeyboardMarkup|array|null $reply_markup = null,
        public readonly InputMessageContent|array|null $input_message_content = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['id'] = $this->id;
        $data['title'] = $this->title;
        $data['document_file_id'] = $this->document_file_id;
        if ($this->description !== null) $data['description'] = $this->description;

        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;


        return $data;
    }
}
