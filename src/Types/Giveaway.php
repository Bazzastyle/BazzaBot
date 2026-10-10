<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a message about a scheduled giveaway.
 *
 * @see https://core.telegram.org/bots/api#giveaway
 *
 * @param array $chats The list of chats which the user must join to participate in the giveaway
 * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected
 * @param int $winner_count The number of users which are supposed to be selected as winners of the giveaway
 * @param ?bool $only_new_members Optional. True, if only users who join the chats after the giveaway started should be eligible to
 *     win (optional)
 * @param ?bool $has_public_winners Optional. True, if the list of giveaway winners will be visible to everyone (optional)
 * @param ?string $prize_description Optional. Description of additional giveaway prize (optional)
 * @param ?array $country_codes Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which
 *     eligible users for the giveaway must come. If empty, then all users can participate in the giveaway.
 *     Users with a phone number that was bought on Fragment can always participate in giveaways. (optional)
 * @param ?int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star
 *     giveaways only (optional)
 * @param ?int $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be
 *     active for; for Telegram Premium giveaways only (optional)
 */
final class Giveaway implements \JsonSerializable
{
    public function __construct(
        public readonly array $chats,
        public readonly int $winners_selection_date,
        public readonly int $winner_count,
        public readonly ?bool $only_new_members = null,
        public readonly ?bool $has_public_winners = null,
        public readonly ?string $prize_description = null,
        public readonly ?array $country_codes = null,
        public readonly ?int $prize_star_count = null,
        public readonly ?int $premium_subscription_month_count = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chats'] = $this->chats;
        $data['winners_selection_date'] = $this->winners_selection_date;
        $data['winner_count'] = $this->winner_count;
        if ($this->only_new_members !== null) $data['only_new_members'] = $this->only_new_members;

        if ($this->has_public_winners !== null) $data['has_public_winners'] = $this->has_public_winners;

        if ($this->prize_description !== null) $data['prize_description'] = $this->prize_description;

        if ($this->country_codes !== null) $data['country_codes'] = $this->country_codes;

        if ($this->prize_star_count !== null) $data['prize_star_count'] = $this->prize_star_count;

        if ($this->premium_subscription_month_count !== null) $data['premium_subscription_month_count'] = $this->premium_subscription_month_count;


        return $data;
    }
}
