<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a withdrawal transaction with Fragment.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerfragment
 *
 * @param string $type Type of the transaction partner, always “fragment”
 * @param RevenueWithdrawalState|array|null $withdrawal_state Optional. State of the transaction if the transaction is outgoing (optional)
 */
final class TransactionPartnerFragment implements TransactionPartner, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RevenueWithdrawalState|array|null $withdrawal_state = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        if ($this->withdrawal_state !== null) $data['withdrawal_state'] = $this->withdrawal_state;


        return $data;
    }
}
