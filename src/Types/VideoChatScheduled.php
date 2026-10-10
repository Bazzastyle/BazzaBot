<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @see https://core.telegram.org/bots/api#videochatscheduled
 *
 * @param int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
 */
final class VideoChatScheduled implements \JsonSerializable
{
    public function __construct(
        public readonly int $start_date,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['start_date'] = $this->start_date;

        return $data;
    }
}
