<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a task to add to a checklist.
 *
 * @see https://core.telegram.org/bots/api#inputchecklisttask
 *
 * @param int $id Unique identifier of the task; must be positive and unique among all task identifiers currently
 *     present in the checklist
 * @param string $text Text of the task; 1-100 characters after entities parsing
 * @param ?string $parse_mode Optional. Mode for parsing entities in the text. See formatting options for more details. (optional)
 * @param ?array $text_entities Optional. List of special entities that appear in the text, which can be specified instead of
 *     parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, custom_emoji, and
 *     date_time entities are allowed. (optional)
 */
final class InputChecklistTask implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $text,
        public readonly ?string $parse_mode = null,
        public readonly ?array $text_entities = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['text'] = $this->text;
        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->text_entities !== null) $data['text_entities'] = $this->text_entities;


        return $data;
    }
}
