<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This
 * boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription for
 * Telegram Premium giveaways and prize_star_count / 500 times for one year for Telegram Star
 * giveaways.
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiveaway
 *
 * @param string $source Source of the boost, always “giveaway”
 * @param int $giveaway_message_id Identifier of a message in the chat with the giveaway; the message could have been deleted already.
 *     May be 0 if the message isn't sent yet.
 * @param User|array|null $user Optional. User that won the prize in the giveaway if any; for Telegram Premium giveaways only (optional)
 * @param ?int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star
 *     giveaways only (optional)
 * @param ?bool $is_unclaimed Optional. True, if the giveaway was completed, but there was no user to win the prize (optional)
 */
final class ChatBoostSourceGiveaway implements ChatBoostSource, \JsonSerializable
{
    public function __construct(
        public readonly string $source,
        public readonly int $giveaway_message_id,
        public readonly User|array|null $user = null,
        public readonly ?int $prize_star_count = null,
        public readonly ?bool $is_unclaimed = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['source'] = $this->source;
        $data['giveaway_message_id'] = $this->giveaway_message_id;
        if ($this->user !== null) $data['user'] = $this->user;

        if ($this->prize_star_count !== null) $data['prize_star_count'] = $this->prize_star_count;

        if ($this->is_unclaimed !== null) $data['is_unclaimed'] = $this->is_unclaimed;


        return $data;
    }
}
