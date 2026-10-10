<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a message about the completion of a giveaway with public winners.
 *
 * @see https://core.telegram.org/bots/api#giveawaywinners
 *
 * @param Chat|array $chat The chat that created the giveaway
 * @param int $giveaway_message_id Identifier of the message with the giveaway in the chat
 * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway were selected
 * @param int $winner_count Total number of winners in the giveaway
 * @param array $winners List of up to 100 winners of the giveaway
 * @param ?int $additional_chat_count Optional. The number of other chats the user had to join in order to be eligible for the giveaway (optional)
 * @param ?int $prize_star_count Optional. The number of Telegram Stars that were split between giveaway winners; for Telegram Star
 *     giveaways only (optional)
 * @param ?int $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be
 *     active for; for Telegram Premium giveaways only (optional)
 * @param ?int $unclaimed_prize_count Optional. Number of undistributed prizes (optional)
 * @param ?bool $only_new_members Optional. True, if only users who had joined the chats after the giveaway started were eligible to
 *     win (optional)
 * @param ?bool $was_refunded Optional. True, if the giveaway was canceled because the payment for it was refunded (optional)
 * @param ?string $prize_description Optional. Description of additional giveaway prize (optional)
 */
final class GiveawayWinners implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly int $giveaway_message_id,
        public readonly int $winners_selection_date,
        public readonly int $winner_count,
        public readonly array $winners,
        public readonly ?int $additional_chat_count = null,
        public readonly ?int $prize_star_count = null,
        public readonly ?int $premium_subscription_month_count = null,
        public readonly ?int $unclaimed_prize_count = null,
        public readonly ?bool $only_new_members = null,
        public readonly ?bool $was_refunded = null,
        public readonly ?string $prize_description = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['giveaway_message_id'] = $this->giveaway_message_id;
        $data['winners_selection_date'] = $this->winners_selection_date;
        $data['winner_count'] = $this->winner_count;
        $data['winners'] = $this->winners;
        if ($this->additional_chat_count !== null) $data['additional_chat_count'] = $this->additional_chat_count;

        if ($this->prize_star_count !== null) $data['prize_star_count'] = $this->prize_star_count;

        if ($this->premium_subscription_month_count !== null) $data['premium_subscription_month_count'] = $this->premium_subscription_month_count;

        if ($this->unclaimed_prize_count !== null) $data['unclaimed_prize_count'] = $this->unclaimed_prize_count;

        if ($this->only_new_members !== null) $data['only_new_members'] = $this->only_new_members;

        if ($this->was_refunded !== null) $data['was_refunded'] = $this->was_refunded;

        if ($this->prize_description !== null) $data['prize_description'] = $this->prize_description;


        return $data;
    }
}
