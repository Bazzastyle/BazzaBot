<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the affiliate program that issued the affiliate commission received via this transaction.
 *
 * @see https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 *
 * @param string $type Type of the transaction partner, always “affiliate_program”
 * @param int $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by the
 *     affiliate program sponsor from referred users
 * @param User|array|null $sponsor_user Optional. Information about the bot that sponsored the affiliate program (optional)
 */
final class TransactionPartnerAffiliateProgram implements TransactionPartner, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $commission_per_mille,
        public readonly User|array|null $sponsor_user = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['commission_per_mille'] = $this->commission_per_mille;
        if ($this->sponsor_user !== null) $data['sponsor_user'] = $this->sponsor_user;


        return $data;
    }
}
