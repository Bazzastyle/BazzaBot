<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the background of a gift.
 *
 * @see https://core.telegram.org/bots/api#giftbackground
 *
 * @param int $center_color Center color of the background in RGB format
 * @param int $edge_color Edge color of the background in RGB format
 * @param int $text_color Text color of the background in RGB format
 */
final class GiftBackground implements \JsonSerializable
{
    public function __construct(
        public readonly int $center_color,
        public readonly int $edge_color,
        public readonly int $text_color,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['center_color'] = $this->center_color;
        $data['edge_color'] = $this->edge_color;
        $data['text_color'] = $this->text_color;

        return $data;
    }
}
