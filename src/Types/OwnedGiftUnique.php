<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a unique gift received and owned by a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#ownedgiftunique
 *
 * @param string $type Type of the gift, always “unique”
 * @param UniqueGift|array $gift Information about the unique gift
 * @param int $send_date Date the gift was sent in Unix time
 * @param ?string $owned_gift_id Optional. Unique identifier of the received gift for the bot; for gifts received on behalf of
 *     business accounts only (optional)
 * @param User|array|null $sender_user Optional. Sender of the gift if it is a known user (optional)
 * @param ?bool $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf
 *     of business accounts only (optional)
 * @param ?bool $can_be_transferred Optional. True, if the gift can be transferred to another owner; for gifts received on behalf of
 *     business accounts only (optional)
 * @param ?int $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot
 *     transfer the gift (optional)
 * @param ?int $next_transfer_date Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in the past,
 *     then the gift can be transferred now. (optional)
 */
final class OwnedGiftUnique implements OwnedGift, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly UniqueGift|array $gift,
        public readonly int $send_date,
        public readonly ?string $owned_gift_id = null,
        public readonly User|array|null $sender_user = null,
        public readonly ?bool $is_saved = null,
        public readonly ?bool $can_be_transferred = null,
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
        $data['type'] = $this->type;
        $data['gift'] = $this->gift;
        $data['send_date'] = $this->send_date;
        if ($this->owned_gift_id !== null) $data['owned_gift_id'] = $this->owned_gift_id;

        if ($this->sender_user !== null) $data['sender_user'] = $this->sender_user;

        if ($this->is_saved !== null) $data['is_saved'] = $this->is_saved;

        if ($this->can_be_transferred !== null) $data['can_be_transferred'] = $this->can_be_transferred;

        if ($this->transfer_star_count !== null) $data['transfer_star_count'] = $this->transfer_star_count;

        if ($this->next_transfer_date !== null) $data['next_transfer_date'] = $this->next_transfer_date;


        return $data;
    }
}
