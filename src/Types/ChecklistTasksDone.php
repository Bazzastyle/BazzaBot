<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about checklist tasks marked as done or not done.
 *
 * @see https://core.telegram.org/bots/api#checklisttasksdone
 *
 * @param Message|array|null $checklist_message Optional. Message containing the checklist whose tasks were marked as done or not done. Note that
 *     the Message object in this field will not contain the reply_to_message field even if it itself is a
 *     reply. (optional)
 * @param ?array $marked_as_done_task_ids Optional. Identifiers of the tasks that were marked as done (optional)
 * @param ?array $marked_as_not_done_task_ids Optional. Identifiers of the tasks that were marked as not done (optional)
 */
final class ChecklistTasksDone implements \JsonSerializable
{
    public function __construct(
        public readonly Message|array|null $checklist_message = null,
        public readonly ?array $marked_as_done_task_ids = null,
        public readonly ?array $marked_as_not_done_task_ids = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->checklist_message !== null) $data['checklist_message'] = $this->checklist_message;

        if ($this->marked_as_done_task_ids !== null) $data['marked_as_done_task_ids'] = $this->marked_as_done_task_ids;

        if ($this->marked_as_not_done_task_ids !== null) $data['marked_as_not_done_task_ids'] = $this->marked_as_not_done_task_ids;


        return $data;
    }
}
