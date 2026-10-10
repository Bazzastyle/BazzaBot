<?php

declare(strict_types=1);

/**
 * Update type: shipping_query
 * https://core.telegram.org/bots/api#shippingquery
 *
 * Fired for invoices with flexible/variable shipping (is_flexible = true),
 * before payment, so the bot can offer shipping options. Always answer with
 * answerShippingQuery(), ok either true (with shipping_options) or false
 * (with an error_message).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::ShippingQuery, function (Context $context): void {
    $query = $context->update->raw->shipping_query;

    $context->client->answerShippingQuery(shipping_query_id: $query->id, ok: true, shipping_options: []);
});
