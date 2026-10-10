<?php

declare(strict_types=1);

/**
 * Update type: purchased_paid_media
 * https://core.telegram.org/bots/api#paidmediapurchased
 *
 * Fired when a user purchases paid media (photos/videos) posted by the bot
 * in a channel.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::PurchasedPaidMedia, function (Context $context): void {
    $purchase = $context->update->raw->purchased_paid_media;

    $context->logger->info('Media a pagamento acquistato', [
        'buyer_user_id' => $purchase->from->id ?? null,
        'payload' => $purchase->paid_media_payload ?? null,
    ]);
});
