<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a link to a file. By default, this file will be sent by the user with an optional
 * caption. Alternatively, you can use input_message_content to send a message with the specified
 * content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultdocument
 *
 * @param string $type Type of the result, must be document
 * @param string $id Unique identifier for this result, 1-64 bytes
 * @param string $title Title for the result
 * @param string $document_url A valid URL for the file
 * @param string $mime_type MIME type of the content of the file, either “application/pdf” or “application/zip”
 * @param ?string $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more
 *     details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?string $description Optional. Short description of the result (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the file (optional)
 * @param ?string $thumbnail_url Optional. URL of the thumbnail (JPEG only) for the file (optional)
 * @param ?int $thumbnail_width Optional. Thumbnail width (optional)
 * @param ?int $thumbnail_height Optional. Thumbnail height (optional)
 */
final class InlineQueryResultDocument implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $title,
        public readonly string $document_url,
        public readonly string $mime_type,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?string $description = null,
        public readonly InlineKeyboardMarkup|array|null $reply_markup = null,
        public readonly InputMessageContent|array|null $input_message_content = null,
        public readonly ?string $thumbnail_url = null,
        public readonly ?int $thumbnail_width = null,
        public readonly ?int $thumbnail_height = null,
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
        $data['document_url'] = $this->document_url;
        $data['mime_type'] = $this->mime_type;
        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->description !== null) $data['description'] = $this->description;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;

        if ($this->thumbnail_url !== null) $data['thumbnail_url'] = $this->thumbnail_url;

        if ($this->thumbnail_width !== null) $data['thumbnail_width'] = $this->thumbnail_width;

        if ($this->thumbnail_height !== null) $data['thumbnail_height'] = $this->thumbnail_height;


        return $data;
    }
}
