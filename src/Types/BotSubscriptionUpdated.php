<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about changes to a user payment subscription toward the current
 * bot.
 *
 * @see https://core.telegram.org/bots/api#botsubscriptionupdated
 *
 * @param User|array $user User who subscribed for payments toward the bot
 * @param string $invoice_payload Bot-specified invoice payload
 * @param string $state The new state of the subscription. Currently, it can be one of “canceled” if the user canceled
 *     the subscription, “active” if the user re-enabled a previously canceled subscription, or
 *     “failed” if payment for the subscription failed.
 */
final class BotSubscriptionUpdated implements \JsonSerializable
{
    public function __construct(
        public readonly User|array $user,
        public readonly string $invoice_payload,
        public readonly string $state,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['user'] = $this->user;
        $data['invoice_payload'] = $this->invoice_payload;
        $data['state'] = $this->state;

        return $data;
    }
}
