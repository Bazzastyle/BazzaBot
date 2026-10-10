<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @see https://core.telegram.org/bots/api#giveawaycompleted
 *
 * @param int $winner_count Number of winners in the giveaway
 * @param ?int $unclaimed_prize_count Optional. Number of undistributed prizes (optional)
 * @param Message|array|null $giveaway_message Optional. Message with the giveaway that was completed, if it wasn't deleted (optional)
 * @param ?bool $is_star_giveaway Optional. True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the giveaway is a
 *     Telegram Premium giveaway. (optional)
 */
final class GiveawayCompleted implements \JsonSerializable
{
    public function __construct(
        public readonly int $winner_count,
        public readonly ?int $unclaimed_prize_count = null,
        public readonly Message|array|null $giveaway_message = null,
        public readonly ?bool $is_star_giveaway = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['winner_count'] = $this->winner_count;
        if ($this->unclaimed_prize_count !== null) $data['unclaimed_prize_count'] = $this->unclaimed_prize_count;

        if ($this->giveaway_message !== null) $data['giveaway_message'] = $this->giveaway_message;

        if ($this->is_star_giveaway !== null) $data['is_star_giveaway'] = $this->is_star_giveaway;


        return $data;
    }
}
