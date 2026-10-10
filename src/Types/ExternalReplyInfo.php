<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about a message that is being replied to, which may come from
 * another chat or forum topic.
 *
 * @see https://core.telegram.org/bots/api#externalreplyinfo
 *
 * @param MessageOrigin|array $origin Origin of the message replied to by the given message
 * @param Chat|array|null $chat Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a
 *     channel. (optional)
 * @param ?int $message_id Optional. Unique message identifier inside the original chat. Available only if the original chat is
 *     a supergroup or a channel. (optional)
 * @param LinkPreviewOptions|array|null $link_preview_options Optional. Options used for link preview generation for the original message, if it is a text message (optional)
 * @param Animation|array|null $animation Optional. Message is an animation, information about the animation (optional)
 * @param Audio|array|null $audio Optional. Message is an audio file, information about the file (optional)
 * @param Document|array|null $document Optional. Message is a general file, information about the file (optional)
 * @param LivePhoto|array|null $live_photo Optional. Message is a live photo, information about the live photo (optional)
 * @param PaidMediaInfo|array|null $paid_media Optional. Message contains paid media; information about the paid media (optional)
 * @param ?array $photo Optional. Message is a photo, available sizes of the photo (optional)
 * @param Sticker|array|null $sticker Optional. Message is a sticker, information about the sticker (optional)
 * @param Story|array|null $story Optional. Message is a forwarded story (optional)
 * @param Video|array|null $video Optional. Message is a video, information about the video (optional)
 * @param VideoNote|array|null $video_note Optional. Message is a video note, information about the video message (optional)
 * @param Voice|array|null $voice Optional. Message is a voice message, information about the file (optional)
 * @param ?bool $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation (optional)
 * @param Checklist|array|null $checklist Optional. Message is a checklist (optional)
 * @param Contact|array|null $contact Optional. Message is a shared contact, information about the contact (optional)
 * @param Dice|array|null $dice Optional. Message is a dice with random value (optional)
 * @param Game|array|null $game Optional. Message is a game, information about the game. More about games » (optional)
 * @param Giveaway|array|null $giveaway Optional. Message is a scheduled giveaway, information about the giveaway (optional)
 * @param GiveawayWinners|array|null $giveaway_winners Optional. A giveaway with public winners was completed (optional)
 * @param Invoice|array|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments » (optional)
 * @param Location|array|null $location Optional. Message is a shared location, information about the location (optional)
 * @param Poll|array|null $poll Optional. Message is a native poll, information about the poll (optional)
 * @param Venue|array|null $venue Optional. Message is a venue, information about the venue (optional)
 */
final class ExternalReplyInfo implements \JsonSerializable
{
    public function __construct(
        public readonly MessageOrigin|array $origin,
        public readonly Chat|array|null $chat = null,
        public readonly ?int $message_id = null,
        public readonly LinkPreviewOptions|array|null $link_preview_options = null,
        public readonly Animation|array|null $animation = null,
        public readonly Audio|array|null $audio = null,
        public readonly Document|array|null $document = null,
        public readonly LivePhoto|array|null $live_photo = null,
        public readonly PaidMediaInfo|array|null $paid_media = null,
        public readonly ?array $photo = null,
        public readonly Sticker|array|null $sticker = null,
        public readonly Story|array|null $story = null,
        public readonly Video|array|null $video = null,
        public readonly VideoNote|array|null $video_note = null,
        public readonly Voice|array|null $voice = null,
        public readonly ?bool $has_media_spoiler = null,
        public readonly Checklist|array|null $checklist = null,
        public readonly Contact|array|null $contact = null,
        public readonly Dice|array|null $dice = null,
        public readonly Game|array|null $game = null,
        public readonly Giveaway|array|null $giveaway = null,
        public readonly GiveawayWinners|array|null $giveaway_winners = null,
        public readonly Invoice|array|null $invoice = null,
        public readonly Location|array|null $location = null,
        public readonly Poll|array|null $poll = null,
        public readonly Venue|array|null $venue = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['origin'] = $this->origin;
        if ($this->chat !== null) $data['chat'] = $this->chat;

        if ($this->message_id !== null) $data['message_id'] = $this->message_id;

        if ($this->link_preview_options !== null) $data['link_preview_options'] = $this->link_preview_options;

        if ($this->animation !== null) $data['animation'] = $this->animation;

        if ($this->audio !== null) $data['audio'] = $this->audio;

        if ($this->document !== null) $data['document'] = $this->document;

        if ($this->live_photo !== null) $data['live_photo'] = $this->live_photo;

        if ($this->paid_media !== null) $data['paid_media'] = $this->paid_media;

        if ($this->photo !== null) $data['photo'] = $this->photo;

        if ($this->sticker !== null) $data['sticker'] = $this->sticker;

        if ($this->story !== null) $data['story'] = $this->story;

        if ($this->video !== null) $data['video'] = $this->video;

        if ($this->video_note !== null) $data['video_note'] = $this->video_note;

        if ($this->voice !== null) $data['voice'] = $this->voice;

        if ($this->has_media_spoiler !== null) $data['has_media_spoiler'] = $this->has_media_spoiler;

        if ($this->checklist !== null) $data['checklist'] = $this->checklist;

        if ($this->contact !== null) $data['contact'] = $this->contact;

        if ($this->dice !== null) $data['dice'] = $this->dice;

        if ($this->game !== null) $data['game'] = $this->game;

        if ($this->giveaway !== null) $data['giveaway'] = $this->giveaway;

        if ($this->giveaway_winners !== null) $data['giveaway_winners'] = $this->giveaway_winners;

        if ($this->invoice !== null) $data['invoice'] = $this->invoice;

        if ($this->location !== null) $data['location'] = $this->location;

        if ($this->poll !== null) $data['poll'] = $this->poll;

        if ($this->venue !== null) $data['venue'] = $this->venue;


        return $data;
    }
}
