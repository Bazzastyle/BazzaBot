<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a regular gift that was sent or received.
 *
 * @see https://core.telegram.org/bots/api#giftinfo
 *
 * @param Gift|array $gift Information about the gift
 * @param ?string $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received on
 *     behalf of business accounts (optional)
 * @param ?int $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver by converting the gift;
 *     omitted if conversion to Telegram Stars is impossible (optional)
 * @param ?int $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were prepaid for the ability to upgrade the gift (optional)
 * @param ?bool $is_upgrade_separate Optional. True, if the gift's upgrade was purchased after the gift was sent (optional)
 * @param ?bool $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift (optional)
 * @param ?string $text Optional. Text of the message that was added to the gift (optional)
 * @param ?array $entities Optional. Special entities that appear in the text (optional)
 * @param ?bool $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone
 *     will be able to see them (optional)
 * @param ?int $unique_gift_number Optional. Unique number reserved for this gift when upgraded. See the number field in UniqueGift. (optional)
 */
final class GiftInfo implements \JsonSerializable
{
    public function __construct(
        public readonly Gift|array $gift,
        public readonly ?string $owned_gift_id = null,
        public readonly ?int $convert_star_count = null,
        public readonly ?int $prepaid_upgrade_star_count = null,
        public readonly ?bool $is_upgrade_separate = null,
        public readonly ?bool $can_be_upgraded = null,
        public readonly ?string $text = null,
        public readonly ?array $entities = null,
        public readonly ?bool $is_private = null,
        public readonly ?int $unique_gift_number = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['gift'] = $this->gift;
        if ($this->owned_gift_id !== null) $data['owned_gift_id'] = $this->owned_gift_id;

        if ($this->convert_star_count !== null) $data['convert_star_count'] = $this->convert_star_count;

        if ($this->prepaid_upgrade_star_count !== null) $data['prepaid_upgrade_star_count'] = $this->prepaid_upgrade_star_count;

        if ($this->is_upgrade_separate !== null) $data['is_upgrade_separate'] = $this->is_upgrade_separate;

        if ($this->can_be_upgraded !== null) $data['can_be_upgraded'] = $this->can_be_upgraded;

        if ($this->text !== null) $data['text'] = $this->text;

        if ($this->entities !== null) $data['entities'] = $this->entities;

        if ($this->is_private !== null) $data['is_private'] = $this->is_private;

        if ($this->unique_gift_number !== null) $data['unique_gift_number'] = $this->unique_gift_number;


        return $data;
    }
}
