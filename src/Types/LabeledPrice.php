<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a portion of the price for goods or services.
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 *
 * @param string $label Portion label
 * @param int $amount Price of the product in the smallest units of the currency (integer, not float/double). For example,
 *     for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the
 *     number of digits past the decimal point for each currency (2 for the majority of currencies).
 */
final class LabeledPrice implements \JsonSerializable
{
    public function __construct(
        public readonly string $label,
        public readonly int $amount,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['label'] = $this->label;
        $data['amount'] = $this->amount;

        return $data;
    }
}
