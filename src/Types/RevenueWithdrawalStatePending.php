<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The withdrawal is in progress.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 *
 * @param string $type Type of the state, always “pending”
 */
final class RevenueWithdrawalStatePending implements RevenueWithdrawalState, \JsonSerializable
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
