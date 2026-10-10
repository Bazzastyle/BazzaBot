<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a link to an article or web page.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultarticle
 *
 * @param string $type Type of the result, must be article
 * @param string $id Unique identifier for this result, 1-64 Bytes
 * @param string $title Title of the result
 * @param InputMessageContent|array $input_message_content Content of the message to be sent
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param ?string $url Optional. URL of the result (optional)
 * @param ?string $description Optional. Short description of the result (optional)
 * @param ?string $thumbnail_url Optional. Url of the thumbnail for the result (optional)
 * @param ?int $thumbnail_width Optional. Thumbnail width (optional)
 * @param ?int $thumbnail_height Optional. Thumbnail height (optional)
 */
final class InlineQueryResultArticle implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $title,
        public readonly InputMessageContent|array $input_message_content,
        public readonly InlineKeyboardMarkup|array|null $reply_markup = null,
        public readonly ?string $url = null,
        public readonly ?string $description = null,
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
        $data['input_message_content'] = $this->input_message_content;
        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->url !== null) $data['url'] = $this->url;

        if ($this->description !== null) $data['description'] = $this->description;

        if ($this->thumbnail_url !== null) $data['thumbnail_url'] = $this->thumbnail_url;

        if ($this->thumbnail_width !== null) $data['thumbnail_width'] = $this->thumbnail_width;

        if ($this->thumbnail_height !== null) $data['thumbnail_height'] = $this->thumbnail_height;


        return $data;
    }
}
