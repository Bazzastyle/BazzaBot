<?php

declare(strict_types=1);

/**
 * Update types: widget_query, shared_widget_query (Bot API 10.4)
 * https://core.telegram.org/bots/api#widgetquery
 * https://core.telegram.org/bots/api#sharedwidgetquery
 *
 * widget_query: a user interacted with a widget in a message sent by the bot
 * (or via the bot). shared_widget_query: same, but from a forwarded message
 * carrying a shared widget. Answer widget_query with answerWidgetQuery()
 * (max 5 queries per 5 seconds per user); the answer reaches only the widget
 * that asked and does not change its data (use editMessageWidgetData /
 * editSharedWidgetData for that).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::WidgetQuery, function (Context $context): void {
    $query = $context->update->raw->widget_query;

    $context->logger->info('Widget query', [
        'user_id' => $query->from->id ?? null,
        'data' => $query->data ?? null,
    ]);

    $context->client->answerWidgetQuery(widget_query_id: $query->id, data: 'ok');
});

$bot->router->onUpdateType(UpdateType::SharedWidgetQuery, function (Context $context): void {
    $query = $context->update->raw->shared_widget_query;

    $context->logger->info('Shared widget query', [
        'user_id' => $query->from->id ?? null,
        'widget_id' => $query->widget_id ?? null,
    ]);
});
