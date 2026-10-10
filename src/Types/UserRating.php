<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the rating of a user based on their Telegram Star spendings.
 *
 * @see https://core.telegram.org/bots/api#userrating
 *
 * @param int $level Current level of the user, indicating their reliability when purchasing digital goods and services.
 *     A higher level suggests a more trustworthy customer; a negative level is likely reason for concern.
 * @param int $rating Numerical value of the user's rating; the higher the rating, the better
 * @param int $current_level_rating The rating value required to get the current level
 * @param ?int $next_level_rating Optional. The rating value required to get to the next level; omitted if the maximum level was
 *     reached (optional)
 */
final class UserRating implements \JsonSerializable
{
    public function __construct(
        public readonly int $level,
        public readonly int $rating,
        public readonly int $current_level_rating,
        public readonly ?int $next_level_rating = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['level'] = $this->level;
        $data['rating'] = $this->rating;
        $data['current_level_rating'] = $this->current_level_rating;
        if ($this->next_level_rating !== null) $data['next_level_rating'] = $this->next_level_rating;


        return $data;
    }
}
