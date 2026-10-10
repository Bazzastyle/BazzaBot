<?php

declare(strict_types=1);

/**
 * Update types: chat_boost, removed_chat_boost
 * https://core.telegram.org/bots/api#chatboostupdated
 * https://core.telegram.org/bots/api#chatboostremoved
 *
 * Fired when a chat gains or loses a boost. Requires the bot to be an
 * administrator in the chat.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::ChatBoost, function (Context $context): void {
    $boost = $context->update->raw->chat_boost;

    $context->logger->info('Nuovo boost ricevuto', [
        'chat_id' => $boost->chat->id,
        'boost_id' => $boost->boost->boost_id ?? null,
    ]);
});

$bot->router->onUpdateType(UpdateType::RemovedChatBoost, function (Context $context): void {
    $removed = $context->update->raw->removed_chat_boost;

    $context->logger->info('Boost rimosso', [
        'chat_id' => $removed->chat->id,
        'boost_id' => $removed->boost_id ?? null,
    ]);
});
