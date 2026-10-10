<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes reply parameters for the message that is being sent.
 *
 * @see https://core.telegram.org/bots/api#replyparameters
 *
 * @param ?int $message_id Optional. Identifier of the message that will be replied to in the current chat, or in the chat
 *     chat_id if it is specified. Required if ephemeral_message_id isn't specified. (optional)
 * @param int|string|null $chat_id Optional. If the message to be replied to is from a different chat, unique identifier for the chat
 *     or username of the bot, supergroup or channel in the format @username. Not supported for messages
 *     sent on behalf of a business account, messages from channel direct messages chats and ephemeral
 *     messages. (optional)
 * @param ?int $ephemeral_message_id Optional. Identifier of the incoming ephemeral message that will be replied to in the current chat.
 *     A reply to an ephemeral message must itself be an ephemeral message. An ephemeral message may only
 *     be replied to within 15 seconds of being sent. Required if message_id isn't specified. (optional)
 * @param ?bool $allow_sending_without_reply Optional. Pass True if the message should be sent even if the specified message to be replied to is
 *     not found. Always False for replies in another chat or forum topic, and sent ephemeral messages.
 *     Always True for messages sent on behalf of a business account. (optional)
 * @param ?string $quote Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The
 *     quote must be an exact substring of the message to be replied to, including bold, italic, underline,
 *     strikethrough, spoiler, custom_emoji, and date_time entities. The message will fail to send if the
 *     quote isn't found in the original message. Ignored for ephemeral messages. (optional)
 * @param ?string $quote_parse_mode Optional. Mode for parsing entities in the quote. See formatting options for more details. (optional)
 * @param ?array $quote_entities Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified
 *     instead of quote_parse_mode. (optional)
 * @param ?int $quote_position Optional. Position of the quote in the original message in UTF-16 code units (optional)
 * @param ?int $checklist_task_id Optional. Identifier of the specific checklist task to be replied to (optional)
 * @param ?string $poll_option_id Optional. Persistent identifier of the specific poll option to be replied to (optional)
 */
final class ReplyParameters implements \JsonSerializable
{
    public function __construct(
        public readonly ?int $message_id = null,
        public readonly int|string|null $chat_id = null,
        public readonly ?int $ephemeral_message_id = null,
        public readonly ?bool $allow_sending_without_reply = null,
        public readonly ?string $quote = null,
        public readonly ?string $quote_parse_mode = null,
        public readonly ?array $quote_entities = null,
        public readonly ?int $quote_position = null,
        public readonly ?int $checklist_task_id = null,
        public readonly ?string $poll_option_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->message_id !== null) $data['message_id'] = $this->message_id;

        if ($this->chat_id !== null) $data['chat_id'] = $this->chat_id;

        if ($this->ephemeral_message_id !== null) $data['ephemeral_message_id'] = $this->ephemeral_message_id;

        if ($this->allow_sending_without_reply !== null) $data['allow_sending_without_reply'] = $this->allow_sending_without_reply;

        if ($this->quote !== null) $data['quote'] = $this->quote;

        if ($this->quote_parse_mode !== null) $data['quote_parse_mode'] = $this->quote_parse_mode;

        if ($this->quote_entities !== null) $data['quote_entities'] = $this->quote_entities;

        if ($this->quote_position !== null) $data['quote_position'] = $this->quote_position;

        if ($this->checklist_task_id !== null) $data['checklist_task_id'] = $this->checklist_task_id;

        if ($this->poll_option_id !== null) $data['poll_option_id'] = $this->poll_option_id;


        return $data;
    }
}
