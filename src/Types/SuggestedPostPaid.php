<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a successful payment for a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostpaid
 *
 * @param string $currency Currency in which the payment was made. Currently, one of “XTR” for Telegram Stars or “TON”
 *     for TON grams.
 * @param Message|array|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not
 *     contain the reply_to_message field even if it itself is a reply. (optional)
 * @param ?int $amount Optional. The amount of the currency that was received by the channel in nanograms; for payments in
 *     TON grams only (optional)
 * @param StarAmount|array|null $star_amount Optional. The amount of Telegram Stars that was received by the channel; for payments in Telegram
 *     Stars only (optional)
 */
final class SuggestedPostPaid implements \JsonSerializable
{
    public function __construct(
        public readonly string $currency,
        public readonly Message|array|null $suggested_post_message = null,
        public readonly ?int $amount = null,
        public readonly StarAmount|array|null $star_amount = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['currency'] = $this->currency;
        if ($this->suggested_post_message !== null) $data['suggested_post_message'] = $this->suggested_post_message;

        if ($this->amount !== null) $data['amount'] = $this->amount;

        if ($this->star_amount !== null) $data['star_amount'] = $this->star_amount;


        return $data;
    }
}
