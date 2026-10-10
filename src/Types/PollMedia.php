<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * At most one of the optional fields can be present in any given object.
 *
 * @see https://core.telegram.org/bots/api#pollmedia
 *
 * @param Animation|array|null $animation Optional. Media is an animation, information about the animation (optional)
 * @param Audio|array|null $audio Optional. Media is an audio file, information about the file; currently, can't be received in a poll
 *     option (optional)
 * @param Document|array|null $document Optional. Media is a general file, information about the file; currently, can't be received in a
 *     poll option (optional)
 * @param Link|array|null $link Optional. The HTTP link attached to the poll option (optional)
 * @param LivePhoto|array|null $live_photo Optional. Media is a live photo, information about the live photo (optional)
 * @param Location|array|null $location Optional. Media is a shared location, information about the location (optional)
 * @param ?array $photo Optional. Media is a photo, available sizes of the photo (optional)
 * @param Sticker|array|null $sticker Optional. Media is a sticker, information about the sticker; currently, for poll options only (optional)
 * @param Venue|array|null $venue Optional. Media is a venue, information about the venue (optional)
 * @param Video|array|null $video Optional. Media is a video, information about the video (optional)
 */
final class PollMedia implements \JsonSerializable
{
    public function __construct(
        public readonly Animation|array|null $animation = null,
        public readonly Audio|array|null $audio = null,
        public readonly Document|array|null $document = null,
        public readonly Link|array|null $link = null,
        public readonly LivePhoto|array|null $live_photo = null,
        public readonly Location|array|null $location = null,
        public readonly ?array $photo = null,
        public readonly Sticker|array|null $sticker = null,
        public readonly Venue|array|null $venue = null,
        public readonly Video|array|null $video = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->animation !== null) $data['animation'] = $this->animation;

        if ($this->audio !== null) $data['audio'] = $this->audio;

        if ($this->document !== null) $data['document'] = $this->document;

        if ($this->link !== null) $data['link'] = $this->link;

        if ($this->live_photo !== null) $data['live_photo'] = $this->live_photo;

        if ($this->location !== null) $data['location'] = $this->location;

        if ($this->photo !== null) $data['photo'] = $this->photo;

        if ($this->sticker !== null) $data['sticker'] = $this->sticker;

        if ($this->venue !== null) $data['venue'] = $this->venue;

        if ($this->video !== null) $data['video'] = $this->video;


        return $data;
    }
}
