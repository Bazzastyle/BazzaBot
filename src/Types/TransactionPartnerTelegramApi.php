<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a transaction with payment for paid broadcasting.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramapi
 *
 * @param string $type Type of the transaction partner, always “telegram_api”
 * @param int $request_count The number of successful requests that exceeded regular limits and were therefore billed
 */
final class TransactionPartnerTelegramApi implements TransactionPartner, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $request_count,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['request_count'] = $this->request_count;

        return $data;
    }
}
