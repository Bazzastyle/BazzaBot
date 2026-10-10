<?php

declare(strict_types=1);

/**
 * Update type: managed_bot
 * https://core.telegram.org/bots/api#managedbotupdated
 *
 * Fired when a new bot is created to be managed by this bot, or the token/
 * owner of an already-managed bot changes. Fetch the managed bot's token
 * with getManagedBotToken().
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::ManagedBot, function (Context $context): void {
    $managedBot = $context->update->raw->managed_bot;

    $context->logger->info('Bot gestito creato/aggiornato', [
        'owner_user_id' => $managedBot->user->id ?? null,
        'managed_bot_id' => $managedBot->bot->id ?? null,
    ]);
});
