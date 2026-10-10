<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a link to a page containing an embedded video player or a video file. By default, this
 * video file will be sent by the user with an optional caption. Alternatively, you can use
 * input_message_content to send a message with the specified content instead of the video.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvideo
 *
 * @param string $type Type of the result, must be video
 * @param string $id Unique identifier for this result, 1-64 bytes
 * @param string $video_url A valid URL for the embedded video player or video file
 * @param string $mime_type MIME type of the content of the video URL, “text/html” or “video/mp4”
 * @param string $thumbnail_url URL of the thumbnail (JPEG only) for the video
 * @param string $title Title for the result
 * @param ?string $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing (optional)
 * @param ?string $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options for more details. (optional)
 * @param ?array $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
 *     parse_mode (optional)
 * @param ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the message media (optional)
 * @param ?int $video_width Optional. Video width (optional)
 * @param ?int $video_height Optional. Video height (optional)
 * @param ?int $video_duration Optional. Video duration in seconds (optional)
 * @param ?string $description Optional. Short description of the result (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the video. This field is required if
 *     InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video). (optional)
 */
final class InlineQueryResultVideo implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $video_url,
        public readonly string $mime_type,
        public readonly string $thumbnail_url,
        public readonly string $title,
        public readonly ?string $caption = null,
        public readonly ?string $parse_mode = null,
        public readonly ?array $caption_entities = null,
        public readonly ?bool $show_caption_above_media = null,
        public readonly ?int $video_width = null,
        public readonly ?int $video_height = null,
        public readonly ?int $video_duration = null,
        public readonly ?string $description = null,
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
        $data['video_url'] = $this->video_url;
        $data['mime_type'] = $this->mime_type;
        $data['thumbnail_url'] = $this->thumbnail_url;
        $data['title'] = $this->title;
        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->show_caption_above_media !== null) $data['show_caption_above_media'] = $this->show_caption_above_media;

        if ($this->video_width !== null) $data['video_width'] = $this->video_width;

        if ($this->video_height !== null) $data['video_height'] = $this->video_height;

        if ($this->video_duration !== null) $data['video_duration'] = $this->video_duration;

        if ($this->description !== null) $data['description'] = $this->description;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;


        return $data;
    }
}
