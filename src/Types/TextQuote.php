<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about the quoted part of a message that is replied to by the given
 * message.
 *
 * @see https://core.telegram.org/bots/api#textquote
 *
 * @param string $text Text of the quoted part of a message that is replied to by the given message
 * @param int $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
 * @param ?array $entities Optional. Special entities that appear in the quote. Currently, only bold, italic, underline,
 *     strikethrough, spoiler, custom_emoji, and date_time entities are kept in quotes. (optional)
 * @param ?bool $is_manual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was
 *     added automatically by the server. (optional)
 */
final class TextQuote implements \JsonSerializable
{
    public function __construct(
        public readonly string $text,
        public readonly int $position,
        public readonly ?array $entities = null,
        public readonly ?bool $is_manual = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['text'] = $this->text;
        $data['position'] = $this->position;
        if ($this->entities !== null) $data['entities'] = $this->entities;

        if ($this->is_manual !== null) $data['is_manual'] = $this->is_manual;


        return $data;
    }
}
