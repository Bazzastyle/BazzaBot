<?php

declare(strict_types=1);

/**
 * Update type: pre_checkout_query
 * https://core.telegram.org/bots/api#precheckoutquery
 *
 * Fired right before the user is charged, after they've confirmed payment
 * details. Telegram waits up to 10 seconds for answerPreCheckoutQuery() —
 * always answer, even just with ok:true, or the payment is cancelled.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::PreCheckoutQuery, function (Context $context): void {
    $query = $context->update->raw->pre_checkout_query;

    $context->client->answerPreCheckoutQuery(pre_checkout_query_id: $query->id, ok: true);
});
