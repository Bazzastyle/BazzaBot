<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The withdrawal succeeded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 *
 * @param string $type Type of the state, always “succeeded”
 * @param int $date Date the withdrawal was completed in Unix time
 * @param string $url An HTTPS URL that can be used to see transaction details
 */
final class RevenueWithdrawalStateSucceeded implements RevenueWithdrawalState, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly string $url,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['date'] = $this->date;
        $data['url'] = $this->url;

        return $data;
    }
}
