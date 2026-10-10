<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains basic information about an invoice.
 *
 * @see https://core.telegram.org/bots/api#invoice
 *
 * @param string $title Product name
 * @param string $description Product description
 * @param string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
 * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
 * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
 *     price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number
 *     of digits past the decimal point for each currency (2 for the majority of currencies).
 */
final class Invoice implements \JsonSerializable
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $start_parameter,
        public readonly string $currency,
        public readonly int $total_amount,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['start_parameter'] = $this->start_parameter;
        $data['currency'] = $this->currency;
        $data['total_amount'] = $this->total_amount;

        return $data;
    }
}
