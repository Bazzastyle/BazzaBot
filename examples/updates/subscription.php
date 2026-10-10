<?php

declare(strict_types=1);

/**
 * Update type: subscription
 * https://core.telegram.org/bots/api#botsubscriptionupdated
 *
 * Fired when a user's recurring payment subscription toward the bot
 * changes state: "active" (started or re-enabled), "canceled" (the user
 * cancelled it) or "failed" (a payment attempt failed).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::Subscription, function (Context $context): void {
    $subscription = $context->update->raw->subscription;
    $userId = $subscription->user->id ?? null;
    $state = $subscription->state ?? null; // "active" | "canceled" | "failed"

    match ($state) {
        'active' => $context->logger->info('Abbonamento attivato', ['user_id' => $userId]),
        'canceled' => $context->logger->info('Abbonamento annullato', ['user_id' => $userId]),
        'failed' => $context->logger->warning('Pagamento abbonamento fallito', ['user_id' => $userId]),
        default => $context->logger->warning('Stato abbonamento sconosciuto', ['user_id' => $userId, 'state' => $state]),
    };
});
