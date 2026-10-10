<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a contact with a phone number. By default, this contact will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified content
 * instead of the contact.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
 *
 * @param string $type Type of the result, must be contact
 * @param string $id Unique identifier for this result, 1-64 Bytes
 * @param string $phone_number Contact's phone number
 * @param string $first_name Contact's first name
 * @param ?string $last_name Optional. Contact's last name (optional)
 * @param ?string $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the contact (optional)
 * @param ?string $thumbnail_url Optional. Url of the thumbnail for the result (optional)
 * @param ?int $thumbnail_width Optional. Thumbnail width (optional)
 * @param ?int $thumbnail_height Optional. Thumbnail height (optional)
 */
final class InlineQueryResultContact implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name = null,
        public readonly ?string $vcard = null,
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
        $data['phone_number'] = $this->phone_number;
        $data['first_name'] = $this->first_name;
        if ($this->last_name !== null) $data['last_name'] = $this->last_name;

        if ($this->vcard !== null) $data['vcard'] = $this->vcard;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;

        if ($this->thumbnail_url !== null) $data['thumbnail_url'] = $this->thumbnail_url;

        if ($this->thumbnail_width !== null) $data['thumbnail_width'] = $this->thumbnail_width;

        if ($this->thumbnail_height !== null) $data['thumbnail_height'] = $this->thumbnail_height;


        return $data;
    }
}
