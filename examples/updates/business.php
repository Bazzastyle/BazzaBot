<?php

declare(strict_types=1);

/**
 * Update types: business_connection, business_message, edited_business_message,
 * deleted_business_messages
 * https://core.telegram.org/bots/api#businessconnection
 *
 * Fired when the bot is connected to (or its connection changes for) a
 * Telegram Business account, and for messages sent/edited/deleted on behalf
 * of that connected account.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::BusinessConnection, function (Context $context): void {
    $connection = $context->update->raw->business_connection;

    $context->logger->info('Connessione business aggiornata', [
        'connection_id' => $connection->id,
        'is_enabled' => $connection->is_enabled ?? false,
    ]);
});

$bot->router->onUpdateType(UpdateType::BusinessMessage, function (Context $context): void {
    $message = $context->update->raw->business_message;

    $context->logger->info('Messaggio business ricevuto', ['business_connection_id' => $message->business_connection_id]);
});

$bot->router->onUpdateType(UpdateType::EditedBusinessMessage, function (Context $context): void {
    $message = $context->update->raw->edited_business_message;

    $context->logger->info('Messaggio business modificato', ['business_connection_id' => $message->business_connection_id]);
});

$bot->router->onUpdateType(UpdateType::DeletedBusinessMessages, function (Context $context): void {
    $deleted = $context->update->raw->deleted_business_messages;

    $context->logger->info('Messaggi business eliminati', [
        'business_connection_id' => $deleted->business_connection_id,
        'message_ids' => $deleted->message_ids ?? [],
    ]);
});
