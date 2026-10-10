<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about tasks added to a checklist.
 *
 * @see https://core.telegram.org/bots/api#checklisttasksadded
 *
 * @param array $tasks List of tasks added to the checklist
 * @param Message|array|null $checklist_message Optional. Message containing the checklist to which the tasks were added. Note that the Message
 *     object in this field will not contain the reply_to_message field even if it itself is a reply. (optional)
 */
final class ChecklistTasksAdded implements \JsonSerializable
{
    public function __construct(
        public readonly array $tasks,
        public readonly Message|array|null $checklist_message = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['tasks'] = $this->tasks;
        if ($this->checklist_message !== null) $data['checklist_message'] = $this->checklist_message;


        return $data;
    }
}
