<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains a list of Telegram Star transactions.
 *
 * @see https://core.telegram.org/bots/api#startransactions
 *
 * @param array $transactions The list of transactions
 */
final class StarTransactions implements \JsonSerializable
{
    public function __construct(
        public readonly array $transactions,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['transactions'] = $this->transactions;

        return $data;
    }
}
