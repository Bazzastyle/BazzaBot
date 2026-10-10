<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes an amount of Telegram Stars.
 *
 * @see https://core.telegram.org/bots/api#staramount
 *
 * @param int $amount Integer amount of Telegram Stars, rounded to 0; can be negative
 * @param ?int $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars; from -999999999 to 999999999; can be
 *     negative if and only if amount is non-positive (optional)
 */
final class StarAmount implements \JsonSerializable
{
    public function __construct(
        public readonly int $amount,
        public readonly ?int $nanostar_amount = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['amount'] = $this->amount;
        if ($this->nanostar_amount !== null) $data['nanostar_amount'] = $this->nanostar_amount;


        return $data;
    }
}
