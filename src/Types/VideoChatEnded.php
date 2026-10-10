<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about a video chat ended in the chat.
 *
 * @see https://core.telegram.org/bots/api#videochatended
 *
 * @param int $duration Video chat duration in seconds
 */
final class VideoChatEnded implements \JsonSerializable
{
    public function __construct(
        public readonly int $duration,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['duration'] = $this->duration;

        return $data;
    }
}
