<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about an incoming pre-checkout query.
 *
 * @see https://core.telegram.org/bots/api#precheckoutquery
 *
 * @param string $id Unique query identifier
 * @param User|array $from User who sent the query
 * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
 * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
 *     price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number
 *     of digits past the decimal point for each currency (2 for the majority of currencies).
 * @param string $invoice_payload Bot-specified invoice payload
 * @param ?string $shipping_option_id Optional. Identifier of the shipping option chosen by the user (optional)
 * @param OrderInfo|array|null $order_info Optional. Order information provided by the user (optional)
 */
final class PreCheckoutQuery implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $from,
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
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
        $data['id'] = $this->id;
        $data['from'] = $this->from;
        $data['currency'] = $this->currency;
        $data['total_amount'] = $this->total_amount;
        $data['invoice_payload'] = $this->invoice_payload;
        if ($this->shipping_option_id !== null) $data['shipping_option_id'] = $this->shipping_option_id;

        if ($this->order_info !== null) $data['order_info'] = $this->order_info;


        return $data;
    }
}
