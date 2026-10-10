<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a Telegram Star transaction. Note that if the buyer initiates a chargeback with the
 * payment provider from whom they acquired Stars (e.g., Apple, Google) following this transaction, the
 * refunded Stars will be deducted from the bot's balance. This is outside of Telegram's control.
 *
 * @see https://core.telegram.org/bots/api#startransaction
 *
 * @param string $id Unique identifier of the transaction. Coincides with the identifier of the original transaction for
 *     refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful
 *     incoming payments from users.
 * @param int $amount Integer amount of Telegram Stars transferred by the transaction
 * @param int $date Date the transaction was created in Unix time
 * @param ?int $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars transferred by the transaction; from 0
 *     to 999999999 (optional)
 * @param TransactionPartner|array|null $source Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment
 *     refunding a failed withdrawal). Only for incoming transactions. (optional)
 * @param TransactionPartner|array|null $receiver Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a
 *     withdrawal). Only for outgoing transactions. (optional)
 */
final class StarTransaction implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly int $amount,
        public readonly int $date,
        public readonly ?int $nanostar_amount = null,
        public readonly TransactionPartner|array|null $source = null,
        public readonly TransactionPartner|array|null $receiver = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['amount'] = $this->amount;
        $data['date'] = $this->date;
        if ($this->nanostar_amount !== null) $data['nanostar_amount'] = $this->nanostar_amount;

        if ($this->source !== null) $data['source'] = $this->source;

        if ($this->receiver !== null) $data['receiver'] = $this->receiver;


        return $data;
    }
}
