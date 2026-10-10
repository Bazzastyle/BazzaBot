<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent
 * by the user. Alternatively, you can use input_message_content to send a message with the specified
 * content instead of the sticker.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 *
 * @param string $type Type of the result, must be sticker
 * @param string $id Unique identifier for this result, 1-64 bytes
 * @param string $sticker_file_id A valid file identifier of the sticker
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 * @param InputMessageContent|array|null $input_message_content Optional. Content of the message to be sent instead of the sticker (optional)
 */
final class InlineQueryResultCachedSticker implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $sticker_file_id,
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
        $data['sticker_file_id'] = $this->sticker_file_id;
        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;

        if ($this->input_message_content !== null) $data['input_message_content'] = $this->input_message_content;


        return $data;
    }
}
