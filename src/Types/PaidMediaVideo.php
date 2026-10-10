<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media is a video.
 *
 * @see https://core.telegram.org/bots/api#paidmediavideo
 *
 * @param string $type Type of the paid media, always “video”
 * @param Video|array $video The video
 */
final class PaidMediaVideo implements PaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Video|array $video,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['video'] = $this->video;

        return $data;
    }
}
