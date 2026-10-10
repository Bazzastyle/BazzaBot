<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a task in a checklist.
 *
 * @see https://core.telegram.org/bots/api#checklisttask
 *
 * @param int $id Unique identifier of the task
 * @param string $text Text of the task
 * @param ?array $text_entities Optional. Special entities that appear in the task text (optional)
 * @param User|array|null $completed_by_user Optional. User that completed the task; omitted if the task wasn't completed by a user (optional)
 * @param Chat|array|null $completed_by_chat Optional. Chat that completed the task; omitted if the task wasn't completed by a chat (optional)
 * @param ?int $completion_date Optional. Point in time (Unix timestamp) when the task was completed; 0 if the task wasn't completed (optional)
 */
final class ChecklistTask implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $text,
        public readonly ?array $text_entities = null,
        public readonly User|array|null $completed_by_user = null,
        public readonly Chat|array|null $completed_by_chat = null,
        public readonly ?int $completion_date = null,
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
        if ($this->text_entities !== null) $data['text_entities'] = $this->text_entities;

        if ($this->completed_by_user !== null) $data['completed_by_user'] = $this->completed_by_user;

        if ($this->completed_by_chat !== null) $data['completed_by_chat'] = $this->completed_by_chat;

        if ($this->completion_date !== null) $data['completion_date'] = $this->completion_date;


        return $data;
    }
}
