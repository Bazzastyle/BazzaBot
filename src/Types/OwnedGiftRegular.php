<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a regular gift owned by a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#ownedgiftregular
 *
 * @param string $type Type of the gift, always “regular”
 * @param Gift|array $gift Information about the regular gift
 * @param int $send_date Date the gift was sent in Unix time
 * @param ?string $owned_gift_id Optional. Unique identifier of the gift for the bot; for gifts received on behalf of business
 *     accounts only (optional)
 * @param User|array|null $sender_user Optional. Sender of the gift if it is a known user (optional)
 * @param ?string $text Optional. Text of the message that was added to the gift (optional)
 * @param ?array $entities Optional. Special entities that appear in the text (optional)
 * @param ?bool $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone
 *     will be able to see them (optional)
 * @param ?bool $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf
 *     of business accounts only (optional)
 * @param ?bool $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift; for gifts received on behalf of
 *     business accounts only (optional)
 * @param ?bool $was_refunded Optional. True, if the gift was refunded and isn't available anymore (optional)
 * @param ?int $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver instead of the gift; omitted
 *     if the gift cannot be converted to Telegram Stars; for gifts received on behalf of business accounts
 *     only (optional)
 * @param ?int $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were paid for the ability to upgrade the gift (optional)
 * @param ?bool $is_upgrade_separate Optional. True, if the gift's upgrade was purchased after the gift was sent; for gifts received on
 *     behalf of business accounts only (optional)
 * @param ?int $unique_gift_number Optional. Unique number reserved for this gift when upgraded. See the number field in UniqueGift. (optional)
 */
final class OwnedGiftRegular implements OwnedGift, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Gift|array $gift,
        public readonly int $send_date,
        public readonly ?string $owned_gift_id = null,
        public readonly User|array|null $sender_user = null,
        public readonly ?string $text = null,
        public readonly ?array $entities = null,
        public readonly ?bool $is_private = null,
        public readonly ?bool $is_saved = null,
        public readonly ?bool $can_be_upgraded = null,
        public readonly ?bool $was_refunded = null,
        public readonly ?int $convert_star_count = null,
        public readonly ?int $prepaid_upgrade_star_count = null,
        public readonly ?bool $is_upgrade_separate = null,
        public readonly ?int $unique_gift_number = null,
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

        if ($this->text !== null) $data['text'] = $this->text;

        if ($this->entities !== null) $data['entities'] = $this->entities;

        if ($this->is_private !== null) $data['is_private'] = $this->is_private;

        if ($this->is_saved !== null) $data['is_saved'] = $this->is_saved;

        if ($this->can_be_upgraded !== null) $data['can_be_upgraded'] = $this->can_be_upgraded;

        if ($this->was_refunded !== null) $data['was_refunded'] = $this->was_refunded;

        if ($this->convert_star_count !== null) $data['convert_star_count'] = $this->convert_star_count;

        if ($this->prepaid_upgrade_star_count !== null) $data['prepaid_upgrade_star_count'] = $this->prepaid_upgrade_star_count;

        if ($this->is_upgrade_separate !== null) $data['is_upgrade_separate'] = $this->is_upgrade_separate;

        if ($this->unique_gift_number !== null) $data['unique_gift_number'] = $this->unique_gift_number;


        return $data;
    }
}
