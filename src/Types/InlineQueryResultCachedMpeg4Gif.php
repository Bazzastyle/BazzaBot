<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram
 * servers. By default, this animated MPEG-4 file will be sent by the user with an optional caption.
 * Alternatively, you can use input_message_content to send a message with the specified content
 * instead of the animation.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 *
 * @param string $type Type of the result, must be mpeg4_gif
 * @param string $id Unique identifier for this result, 1-64 bytes
 * @param string $mpeg4_file_id A valid file identifier for the MPEG4 file
 * @param ?string $title Optional. Title for the result (optional)
 * @param ?string $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the message media (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the video animation (optional)
 */
final class InlineQueryResultCachedMpeg4Gif implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $mpeg4_file_id,
        public readonly ?string $title = null,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?bool $show_caption_above_media = null,
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
        $data['mpeg4_file_id'] = $this->mpeg4_file_id;
        if ($this->title !== null) $data['title'] = $this->title;

        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->show_caption_above_media !== null) $data['show_caption_above_media'] = $this->show_caption_above_media;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;


        return $data;
    }
}
