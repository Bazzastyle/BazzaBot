<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about an option added to a poll.
 *
 * @see https://core.telegram.org/bots/api#polloptionadded
 *
 * @param string $option_persistent_id Unique identifier of the added option
 * @param string $option_text Option text
 * @param MaybeInaccessibleMessage|array|null $poll_message Optional. Message containing the poll to which the option was added, if known. Note that the Message
 *     object in this field will not contain the reply_to_message field even if it itself is a reply. (optional)
 * @param ?array $option_text_entities Optional. Special entities that appear in the option_text (optional)
 */
final class PollOptionAdded implements \JsonSerializable
{
    public function __construct(
        public readonly string $option_persistent_id,
        public readonly string $option_text,
        public readonly MaybeInaccessibleMessage|array|null $poll_message = null,
        public readonly ?array $option_text_entities = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['option_persistent_id'] = $this->option_persistent_id;
        $data['option_text'] = $this->option_text;
        if ($this->poll_message !== null) $data['poll_message'] = $this->poll_message;

        if ($this->option_text_entities !== null) $data['option_text_entities'] = $this->option_text_entities;


        return $data;
    }
}
