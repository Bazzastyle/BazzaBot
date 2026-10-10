<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the colors of the backdrop of a unique gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftbackdropcolors
 *
 * @param int $center_color The color in the center of the backdrop in RGB format
 * @param int $edge_color The color on the edges of the backdrop in RGB format
 * @param int $symbol_color The color to be applied to the symbol in RGB format
 * @param int $text_color The color for the text on the backdrop in RGB format
 */
final class UniqueGiftBackdropColors implements \JsonSerializable
{
    public function __construct(
        public readonly int $center_color,
        public readonly int $edge_color,
        public readonly int $symbol_color,
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
        $data['symbol_color'] = $this->symbol_color;
        $data['text_color'] = $this->text_color;

        return $data;
    }
}
