<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively,
 * you can use input_message_content to send a message with the specified content instead of the
 * location.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * @param string $type Type of the result, must be location
 * @param string $id Unique identifier for this result, 1-64 Bytes
 * @param float $latitude Location latitude in degrees
 * @param float $longitude Location longitude in degrees
 * @param string $title Location title
 * @param ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500 (optional)
 * @param ?int $live_period Optional. Period in seconds during which the location can be updated, must be between 60 and 86400,
 *     or 0x7FFFFFFF for live locations that can be edited indefinitely (optional)
 * @param ?int $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1
 *     and 360 if specified. (optional)
 * @param ?int $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat
 *     member, in meters. Must be between 1 and 100000 if specified. (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the location (optional)
 * @param ?string $thumbnail_url Optional. Url of the thumbnail for the result (optional)
 * @param ?int $thumbnail_width Optional. Thumbnail width (optional)
 * @param ?int $thumbnail_height Optional. Thumbnail height (optional)
 */
final class InlineQueryResultLocation implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly ?float $horizontal_accuracy = null,
        public readonly ?int $live_period = null,
        public readonly ?int $heading = null,
        public readonly ?int $proximity_alert_radius = null,
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
        if ($this->horizontal_accuracy !== null) $data['horizontal_accuracy'] = $this->horizontal_accuracy;

        if ($this->live_period !== null) $data['live_period'] = $this->live_period;

        if ($this->heading !== null) $data['heading'] = $this->heading;

        if ($this->proximity_alert_radius !== null) $data['proximity_alert_radius'] = $this->proximity_alert_radius;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;

        if ($this->thumbnail_url !== null) $data['thumbnail_url'] = $this->thumbnail_url;

        if ($this->thumbnail_width !== null) $data['thumbnail_width'] = $this->thumbnail_width;

        if ($this->thumbnail_height !== null) $data['thumbnail_height'] = $this->thumbnail_height;


        return $data;
    }
}
