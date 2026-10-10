<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a checklist.
 *
 * @see https://core.telegram.org/bots/api#checklist
 *
 * @param string $title Title of the checklist
 * @param array $tasks List of tasks in the checklist
 * @param ?array $title_entities Optional. Special entities that appear in the checklist title (optional)
 * @param ?bool $others_can_add_tasks Optional. True, if users other than the creator of the list can add tasks to the list (optional)
 * @param ?bool $others_can_mark_tasks_as_done Optional. True, if users other than the creator of the list can mark tasks as done or not done (optional)
 */
final class Checklist implements \JsonSerializable
{
    public function __construct(
        public readonly string $title,
        public readonly array $tasks,
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
        if ($this->title_entities !== null) $data['title_entities'] = $this->title_entities;

        if ($this->others_can_add_tasks !== null) $data['others_can_add_tasks'] = $this->others_can_add_tasks;

        if ($this->others_can_mark_tasks_as_done !== null) $data['others_can_mark_tasks_as_done'] = $this->others_can_mark_tasks_as_done;


        return $data;
    }
}
