<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a withdrawal transaction to the Telegram Ads platform.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramads
 *
 * @param string $type Type of the transaction partner, always “telegram_ads”
 */
final class TransactionPartnerTelegramAds implements TransactionPartner, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;

        return $data;
    }
}
