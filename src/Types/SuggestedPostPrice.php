<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the price of a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostprice
 *
 * @param string $currency Currency in which the post will be paid. Currently, must be one of “XTR” for Telegram Stars or
 *     “TON” for TON grams.
 * @param int $amount The amount of the currency that will be paid for the post in the smallest units of the currency,
 *     i.e. Telegram Stars or nanograms. Currently, price in Telegram Stars must be between 5 and 100000,
 *     and price in nanograms must be between 10000000 and 10000000000000.
 */
final class SuggestedPostPrice implements \JsonSerializable
{
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['currency'] = $this->currency;
        $data['amount'] = $this->amount;

        return $data;
    }
}
