<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a transaction with a user.
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 *
 * @param string $type Type of the transaction partner, always “user”
 * @param string $transaction_type Type of the transaction, currently one of “invoice_payment” for payments via invoices,
 *     “paid_media_payment” for payments for paid media, “gift_purchase” for gifts sent by the bot,
 *     “premium_purchase” for Telegram Premium subscriptions gifted by the bot,
 *     “business_account_transfer” for direct transfers from managed business accounts
 * @param User|array $user Information about the user
 * @param AffiliateInfo|array|null $affiliate Optional. Information about the affiliate that received a commission via this transaction. Can be
 *     available only for “invoice_payment” and “paid_media_payment” transactions. (optional)
 * @param ?string $invoice_payload Optional. Bot-specified invoice payload. Can be available only for “invoice_payment”
 *     transactions. (optional)
 * @param ?int $subscription_period Optional. The duration of the paid subscription. Can be available only for “invoice_payment”
 *     transactions. (optional)
 * @param ?array $paid_media Optional. Information about the paid media bought by the user; for “paid_media_payment”
 *     transactions only (optional)
 * @param ?string $paid_media_payload Optional. Bot-specified paid media payload. Can be available only for “paid_media_payment”
 *     transactions. (optional)
 * @param Gift|array|null $gift Optional. The gift sent to the user by the bot; for “gift_purchase” transactions only (optional)
 * @param ?int $premium_subscription_duration Optional. Number of months the gifted Telegram Premium subscription will be active for; for
 *     “premium_purchase” transactions only (optional)
 */
final class TransactionPartnerUser implements TransactionPartner, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $transaction_type,
        public readonly User|array $user,
        public readonly AffiliateInfo|array|null $affiliate = null,
        public readonly ?string $invoice_payload = null,
        public readonly ?int $subscription_period = null,
        public readonly ?array $paid_media = null,
        public readonly ?string $paid_media_payload = null,
        public readonly Gift|array|null $gift = null,
        public readonly ?int $premium_subscription_duration = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['transaction_type'] = $this->transaction_type;
        $data['user'] = $this->user;
        if ($this->affiliate !== null) $data['affiliate'] = $this->affiliate;

        if ($this->invoice_payload !== null) $data['invoice_payload'] = $this->invoice_payload;

        if ($this->subscription_period !== null) $data['subscription_period'] = $this->subscription_period;

        if ($this->paid_media !== null) $data['paid_media'] = $this->paid_media;

        if ($this->paid_media_payload !== null) $data['paid_media_payload'] = $this->paid_media_payload;

        if ($this->gift !== null) $data['gift'] = $this->gift;

        if ($this->premium_subscription_duration !== null) $data['premium_subscription_duration'] = $this->premium_subscription_duration;


        return $data;
    }
}
