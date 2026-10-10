<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains basic information about a successful payment. Note that if the buyer initiates
 * a chargeback with the relevant payment provider following this transaction, the funds may be debited
 * from your balance. This is outside of Telegram's control.
 *
 * @see https://core.telegram.org/bots/api#successfulpayment
 *
 * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
 * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
 *     price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number
 *     of digits past the decimal point for each currency (2 for the majority of currencies).
 * @param string $invoice_payload Bot-specified invoice payload
 * @param string $telegram_payment_charge_id Telegram payment identifier
 * @param string $provider_payment_charge_id Provider payment identifier
 * @param ?int $subscription_expiration_date Optional. Expiration date of the subscription, in Unix time; for recurring payments only (optional)
 * @param ?bool $is_recurring Optional. True, if the payment is a recurring payment for a subscription (optional)
 * @param ?bool $is_first_recurring Optional. True, if the payment is the first payment for a subscription (optional)
 * @param ?string $shipping_option_id Optional. Identifier of the shipping option chosen by the user (optional)
 * @param OrderInfo|array|null $order_info Optional. Order information provided by the user (optional)
 */
final class SuccessfulPayment implements \JsonSerializable
{
    public function __construct(
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
        public readonly string $telegram_payment_charge_id,
        public readonly string $provider_payment_charge_id,
        public readonly ?int $subscription_expiration_date = null,
        public readonly ?bool $is_recurring = null,
        public readonly ?bool $is_first_recurring = null,
        public readonly ?string $shipping_option_id = null,
        public readonly OrderInfo|array|null $order_info = null,
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
        $data['provider_payment_charge_id'] = $this->provider_payment_charge_id;
        if ($this->subscription_expiration_date !== null) $data['subscription_expiration_date'] = $this->subscription_expiration_date;

        if ($this->is_recurring !== null) $data['is_recurring'] = $this->is_recurring;

        if ($this->is_first_recurring !== null) $data['is_first_recurring'] = $this->is_first_recurring;

        if ($this->shipping_option_id !== null) $data['shipping_option_id'] = $this->shipping_option_id;

        if ($this->order_info !== null) $data['order_info'] = $this->order_info;


        return $data;
    }
}
