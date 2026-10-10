<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is a freeform gradient that rotates after every message in the chat.
 *
 * @see https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 *
 * @param string $type Type of the background fill, always “freeform_gradient”
 * @param array $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
 */
final class BackgroundFillFreeformGradient implements BackgroundFill, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly array $colors,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['colors'] = $this->colors;

        return $data;
    }
}
