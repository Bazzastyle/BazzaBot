<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 *
 * @param int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
 */
final class MessageAutoDeleteTimerChanged implements \JsonSerializable
{
    public function __construct(
        public readonly int $message_auto_delete_time,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['message_auto_delete_time'] = $this->message_auto_delete_time;

        return $data;
    }
}
