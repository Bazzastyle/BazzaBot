<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a checklist to create.
 *
 * @see https://core.telegram.org/bots/api#inputchecklist
 *
 * @param string $title Title of the checklist; 1-255 characters after entities parsing
 * @param array $tasks List of 1-30 tasks in the checklist
 * @param ?string $parse_mode Optional. Mode for parsing entities in the title. See formatting options for more details. (optional)
 * @param ?array $title_entities Optional. List of special entities that appear in the title, which can be specified instead of
 *     parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, custom_emoji, and
 *     date_time entities are allowed. (optional)
 * @param ?bool $others_can_add_tasks Optional. Pass True if other users can add tasks to the checklist (optional)
 * @param ?bool $others_can_mark_tasks_as_done Optional. Pass True if other users can mark tasks as done or not done in the checklist (optional)
 */
final class InputChecklist implements \JsonSerializable
{
    public function __construct(
        public readonly string $title,
        public readonly array $tasks,
        public readonly ?string $parse_mode = null,
        public readonly ?array $title_entities = null,
        public readonly ?bool $others_can_add_tasks = null,
        public readonly ?bool $others_can_mark_tasks_as_done = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['title'] = $this->title;
        $data['tasks'] = $this->tasks;
        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->title_entities !== null) $data['title_entities'] = $this->title_entities;

        if ($this->others_can_add_tasks !== null) $data['others_can_add_tasks'] = $this->others_can_add_tasks;

        if ($this->others_can_mark_tasks_as_done !== null) $data['others_can_mark_tasks_as_done'] = $this->others_can_mark_tasks_as_done;


        return $data;
    }
}
