<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains information about the affiliate that received a commission via this transaction.
 *
 * @see https://core.telegram.org/bots/api#affiliateinfo
 *
 * @param int $commission_per_mille The number of Telegram Stars received by the affiliate for each 1000 Telegram Stars received by the
 *     bot from referred users
 * @param int $amount Integer amount of Telegram Stars received by the affiliate from the transaction, rounded to 0; can
 *     be negative for refunds
 * @param User|array|null $affiliate_user Optional. The bot or the user that received an affiliate commission if it was received by a bot or a
 *     user (optional)
 * @param Chat|array|null $affiliate_chat Optional. The chat that received an affiliate commission if it was received by a chat (optional)
 * @param ?int $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars received by the affiliate; from
 *     -999999999 to 999999999; can be negative for refunds (optional)
 */
final class AffiliateInfo implements \JsonSerializable
{
    public function __construct(
        public readonly int $commission_per_mille,
        public readonly int $amount,
        public readonly User|array|null $affiliate_user = null,
        public readonly Chat|array|null $affiliate_chat = null,
        public readonly ?int $nanostar_amount = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['commission_per_mille'] = $this->commission_per_mille;
        $data['amount'] = $this->amount;
        if ($this->affiliate_user !== null) $data['affiliate_user'] = $this->affiliate_user;

        if ($this->affiliate_chat !== null) $data['affiliate_chat'] = $this->affiliate_chat;

        if ($this->nanostar_amount !== null) $data['nanostar_amount'] = $this->nanostar_amount;


        return $data;
    }
}
