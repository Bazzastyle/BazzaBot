<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents one row of the high scores table for a game.
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 *
 * @param int $position Position in high score table for the game
 * @param User|array $user User
 * @param int $score Score
 */
final class GameHighScore implements \JsonSerializable
{
    public function __construct(
        public readonly int $position,
        public readonly User|array $user,
        public readonly int $score,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['position'] = $this->position;
        $data['user'] = $this->user;
        $data['score'] = $this->score;

        return $data;
    }
}
