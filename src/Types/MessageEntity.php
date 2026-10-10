<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs,
 * etc.
 *
 * @see https://core.telegram.org/bots/api#messageentity
 *
 * @param string $type Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag or
 *     #hashtag@chatusername), “cashtag” ($USD or $USD@chatusername), “bot_command”
 *     (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org),
 *     “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text),
 *     “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler
 *     message), “blockquote” (block quotation), “expandable_blockquote” (collapsed-by-default
 *     block quotation), “code” (monowidth string), “pre” (monowidth block), “text_link” (for
 *     clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for
 *     inline custom emoji stickers), or “date_time” (for formatted date and time).
 * @param int $offset Offset in UTF-16 code units to the start of the entity
 * @param int $length Length of the entity in UTF-16 code units
 * @param ?string $url Optional. For “text_link” only, URL that will be opened after user taps on the text (optional)
 * @param User|array|null $user Optional. For “text_mention” only, the mentioned user (optional)
 * @param ?string $language Optional. For “pre” only, the programming language of the entity text (optional)
 * @param ?string $custom_emoji_id Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use
 *     getCustomEmojiStickers to get full information about the sticker. (optional)
 * @param ?int $unix_time Optional. For “date_time” only, the Unix time associated with the entity (optional)
 * @param ?string $date_time_format Optional. For “date_time” only, the string that defines the formatting of the date and time. See
 *     date-time entity formatting for more details. (optional)
 */
final class MessageEntity implements \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $offset,
        public readonly int $length,
        public readonly ?string $url = null,
        public readonly User|array|null $user = null,
        public readonly ?string $language = null,
        public readonly ?string $custom_emoji_id = null,
        public readonly ?int $unix_time = null,
        public readonly ?string $date_time_format = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['offset'] = $this->offset;
        $data['length'] = $this->length;
        if ($this->url !== null) $data['url'] = $this->url;

        if ($this->user !== null) $data['user'] = $this->user;

        if ($this->language !== null) $data['language'] = $this->language;

        if ($this->custom_emoji_id !== null) $data['custom_emoji_id'] = $this->custom_emoji_id;

        if ($this->unix_time !== null) $data['unix_time'] = $this->unix_time;

        if ($this->date_time_format !== null) $data['date_time_format'] = $this->date_time_format;


        return $data;
    }
}
