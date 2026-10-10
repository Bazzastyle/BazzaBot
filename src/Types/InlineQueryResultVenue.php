<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use
 * input_message_content to send a message with the specified content instead of the venue.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvenue
 *
 * @param string $type Type of the result, must be venue
 * @param string $id Unique identifier for this result, 1-64 Bytes
 * @param float $latitude Latitude of the venue location in degrees
 * @param float $longitude Longitude of the venue location in degrees
 * @param string $title Title of the venue
 * @param string $address Address of the venue
 * @param ?string $foursquare_id Optional. Foursquare identifier of the venue if known (optional)
 * @param ?string $foursquare_type Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
 *     “arts_entertainment/aquarium” or “food/icecream”.) (optional)
 * @param ?string $google_place_id Optional. Google Places identifier of the venue (optional)
 * @param ?string $google_place_type Optional. Google Places type of the venue. (See supported types.) (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the venue (optional)
 * @param ?string $thumbnail_url Optional. Url of the thumbnail for the result (optional)
 * @param ?int $thumbnail_width Optional. Thumbnail width (optional)
 * @param ?int $thumbnail_height Optional. Thumbnail height (optional)
 */
final class InlineQueryResultVenue implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id = null,
        public readonly ?string $foursquare_type = null,
        public readonly ?string $google_place_id = null,
        public readonly ?string $google_place_type = null,
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
        $data['latitude'] = $this->latitude;
        $data['longitude'] = $this->longitude;
        $data['title'] = $this->title;
        $data['address'] = $this->address;
        if ($this->foursquare_id !== null) $data['foursquare_id'] = $this->foursquare_id;

        if ($this->foursquare_type !== null) $data['foursquare_type'] = $this->foursquare_type;

        if ($this->google_place_id !== null) $data['google_place_id'] = $this->google_place_id;

        if ($this->google_place_type !== null) $data['google_place_type'] = $this->google_place_type;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;

        if ($this->thumbnail_url !== null) $data['thumbnail_url'] = $this->thumbnail_url;

        if ($this->thumbnail_width !== null) $data['thumbnail_width'] = $this->thumbnail_width;

        if ($this->thumbnail_height !== null) $data['thumbnail_height'] = $this->thumbnail_height;


        return $data;
    }
}
