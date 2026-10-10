<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Update;

use Bazzastyle\BazzaBot\Exception\InvalidUpdateException;

/**
 * Lightweight, typed wrapper around a raw Telegram Update. Covers the
 * common accessors (chat/from id, text, callback data, command parsing);
 * anything less common (photos, documents, location, ...) stays reachable
 * via the always-available raw stdClass.
 */
final class Update
{
    private function __construct(
        public readonly int $updateId,
        public readonly UpdateType $type,
        public readonly \stdClass $raw,
    ) {
    }

    public static function fromJson(string $json): self
    {
        $decoded = json_decode($json, false);

        if (!$decoded instanceof \stdClass) {
            throw new InvalidUpdateException('Update payload is not a valid JSON object');
        }

        return self::fromStdClass($decoded);
    }

    public static function fromStdClass(\stdClass $update): self
    {
        if (!isset($update->update_id)) {
            throw new InvalidUpdateException('Update payload is missing "update_id"');
        }

        return new self((int) $update->update_id, UpdateType::detect($update), $update);
    }

    public function getChatId(): int|string|null
    {
        return self::prop(self::prop($this->message(), 'chat'), 'id')
            ?? self::prop(self::prop(self::prop($this->callbackQuery(), 'message'), 'chat'), 'id');
    }

    public function getFromId(): ?int
    {
        $id = self::prop($this->fromUser(), 'id');

        return $id !== null ? (int) $id : null;
    }

    public function getFromUsername(): ?string
    {
        return self::prop($this->fromUser(), 'username');
    }

    public function getText(): ?string
    {
        $message = $this->message();

        return self::prop($message, 'text') ?? self::prop($message, 'caption');
    }

    public function getMessageId(): ?int
    {
        $id = self::prop($this->message(), 'message_id')
            ?? self::prop(self::prop($this->callbackQuery(), 'message'), 'message_id');

        return $id !== null ? (int) $id : null;
    }

    public function getCallbackData(): ?string
    {
        return self::prop($this->callbackQuery(), 'data');
    }

    public function getCallbackQueryId(): ?string
    {
        return self::prop($this->callbackQuery(), 'id');
    }

    public function isCommand(): bool
    {
        return $this->getCommand() !== null;
    }

    /** "/start@MyBot hello" -> "start" */
    public function getCommand(): ?string
    {
        $text = $this->getText();
        if ($text === null || !preg_match('#^/([a-zA-Z0-9_]+)(?:@\S+)?#', $text, $matches)) {
            return null;
        }

        return $matches[1];
    }

    /** "/start hello world" -> "hello world" */
    public function getCommandArgs(): ?string
    {
        $text = $this->getText();
        if ($text === null || $this->getCommand() === null) {
            return null;
        }

        $spacePos = strpos($text, ' ');

        return $spacePos === false ? null : ltrim(substr($text, $spacePos + 1));
    }

    public function isGroupChat(): bool
    {
        $chatType = self::prop(self::prop($this->message(), 'chat'), 'type')
            ?? self::prop(self::prop(self::prop($this->callbackQuery(), 'message'), 'chat'), 'type');

        return in_array($chatType, ['group', 'supergroup'], true);
    }

    private function message(): ?\stdClass
    {
        return $this->raw->message
            ?? $this->raw->edited_message
            ?? $this->raw->channel_post
            ?? $this->raw->edited_channel_post
            ?? $this->raw->guest_message // same Message shape; reply with answerGuestQuery(), not sendMessage()
            ?? null;
    }

    private function callbackQuery(): ?\stdClass
    {
        return $this->raw->callback_query ?? null;
    }

    private function fromUser(): ?\stdClass
    {
        return self::prop($this->message(), 'from')
            ?? self::prop($this->callbackQuery(), 'from')
            ?? self::prop(self::prop($this->raw, 'inline_query'), 'from')
            ?? self::prop(self::prop($this->raw, 'my_chat_member'), 'from')
            ?? self::prop(self::prop($this->raw, 'chat_member'), 'from')
            ?? self::prop(self::prop($this->raw, 'chat_join_request'), 'from')
            ?? self::prop(self::prop($this->raw, 'shipping_query'), 'from')
            ?? self::prop(self::prop($this->raw, 'pre_checkout_query'), 'from')
            ?? self::prop(self::prop($this->raw, 'poll_answer'), 'user');
    }

    /**
     * Warning-free access to a possibly-absent property on a possibly-null
     * stdClass: Telegram only includes the fields relevant to a given
     * update/object, so most of these lookups are expected to miss.
     */
    private static function prop(?\stdClass $object, string $name): mixed
    {
        return $object?->{$name} ?? null;
    }
}
