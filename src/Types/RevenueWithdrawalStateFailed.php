<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The withdrawal failed and the transaction was refunded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 *
 * @param string $type Type of the state, always “failed”
 */
final class RevenueWithdrawalStateFailed implements RevenueWithdrawalState, \JsonSerializable
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
