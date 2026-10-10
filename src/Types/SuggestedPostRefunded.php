<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a payment refund for a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostrefunded
 *
 * @param string $reason Reason for the refund. Currently, one of “post_deleted” if the post was deleted within 24 hours
 *     of being posted or removed from scheduled messages without being posted, or “payment_refunded”
 *     if the payer refunded their payment.
 * @param Message|array|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not
 *     contain the reply_to_message field even if it itself is a reply. (optional)
 */
final class SuggestedPostRefunded implements \JsonSerializable
{
    public function __construct(
        public readonly string $reason,
        public readonly Message|array|null $suggested_post_message = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['reason'] = $this->reason;
        if ($this->suggested_post_message !== null) $data['suggested_post_message'] = $this->suggested_post_message;


        return $data;
    }
}
