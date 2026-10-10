<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains basic information about a refunded payment.
 *
 * @see https://core.telegram.org/bots/api#refundedpayment
 *
 * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always
 *     “XTR”.
 * @param int $total_amount Total refunded price in the smallest units of the currency (integer, not float/double). For example,
 *     for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the
 *     number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @param string $invoice_payload Bot-specified invoice payload
 * @param string $telegram_payment_charge_id Telegram payment identifier
 * @param ?string $provider_payment_charge_id Optional. Provider payment identifier (optional)
 */
final class RefundedPayment implements \JsonSerializable
{
    public function __construct(
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
        public readonly string $telegram_payment_charge_id,
        public readonly ?string $provider_payment_charge_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['currency'] = $this->currency;
        $data['total_amount'] = $this->total_amount;
        $data['invoice_payload'] = $this->invoice_payload;
        $data['telegram_payment_charge_id'] = $this->telegram_payment_charge_id;
        if ($this->provider_payment_charge_id !== null) $data['provider_payment_charge_id'] = $this->provider_payment_charge_id;


        return $data;
    }
}
