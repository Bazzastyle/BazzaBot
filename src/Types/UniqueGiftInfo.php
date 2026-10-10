<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a unique gift that was sent or received.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftinfo
 *
 * @param UniqueGift|array $gift Information about the gift
 * @param string $origin Origin of the gift. Currently, either “upgrade” for gifts upgraded from regular gifts,
 *     “transfer” for gifts transferred from other users or channels, “resale” for gifts bought
 *     from other users, “gifted_upgrade” for upgrades purchased after the gift was sent, or
 *     “offer” for gifts bought or sold through gift purchase offers.
 * @param ?string $text Optional. Text of the message that was added to the gift (optional)
 * @param ?array $entities Optional. Special entities that appear in the text (optional)
 * @param ?bool $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone
 *     will be able to see them (optional)
 * @param ?string $last_resale_currency Optional. For gifts bought from other users, the currency in which the payment for the gift was
 *     done. Currently, one of “XTR” for Telegram Stars or “TON” for TON grams. (optional)
 * @param ?int $last_resale_amount Optional. For gifts bought from other users, the price paid for the gift in either Telegram Stars or
 *     nanograms (optional)
 * @param ?string $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received on
 *     behalf of business accounts (optional)
 * @param ?int $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot
 *     transfer the gift (optional)
 * @param ?int $next_transfer_date Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in the past,
 *     then the gift can be transferred now. (optional)
 */
final class UniqueGiftInfo implements \JsonSerializable
{
    public function __construct(
        public readonly UniqueGift|array $gift,
        public readonly string $origin,
        public readonly ?string $text = null,
        public readonly ?array $entities = null,
        public readonly ?bool $is_private = null,
        public readonly ?string $last_resale_currency = null,
        public readonly ?int $last_resale_amount = null,
        public readonly ?string $owned_gift_id = null,
        public readonly ?int $transfer_star_count = null,
        public readonly ?int $next_transfer_date = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['gift'] = $this->gift;
        $data['origin'] = $this->origin;
        if ($this->text !== null) $data['text'] = $this->text;

        if ($this->entities !== null) $data['entities'] = $this->entities;

        if ($this->is_private !== null) $data['is_private'] = $this->is_private;

        if ($this->last_resale_currency !== null) $data['last_resale_currency'] = $this->last_resale_currency;

        if ($this->last_resale_amount !== null) $data['last_resale_amount'] = $this->last_resale_amount;

        if ($this->owned_gift_id !== null) $data['owned_gift_id'] = $this->owned_gift_id;

        if ($this->transfer_star_count !== null) $data['transfer_star_count'] = $this->transfer_star_count;

        if ($this->next_transfer_date !== null) $data['next_transfer_date'] = $this->next_transfer_date;


        return $data;
    }
}
