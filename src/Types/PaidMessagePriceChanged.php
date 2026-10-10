<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a change in the price of paid messages within a chat.
 *
 * @see https://core.telegram.org/bots/api#paidmessagepricechanged
 *
 * @param int $paid_message_star_count The new number of Telegram Stars that must be paid by non-administrator users of the supergroup chat
 *     for each sent message
 */
final class PaidMessagePriceChanged implements \JsonSerializable
{
    public function __construct(
        public readonly int $paid_message_star_count,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['paid_message_star_count'] = $this->paid_message_star_count;

        return $data;
    }
}
