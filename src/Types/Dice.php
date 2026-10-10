<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an animated emoji that displays a random value.
 *
 * @see https://core.telegram.org/bots/api#dice
 *
 * @param string $emoji Emoji on which the dice throw animation is based
 * @param int $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and
 *     “⚽” base emoji, 1-64 for “🎰” base emoji
 */
final class Dice implements \JsonSerializable
{
    public function __construct(
        public readonly string $emoji,
        public readonly int $value,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['emoji'] = $this->emoji;
        $data['value'] = $this->value;

        return $data;
    }
}
