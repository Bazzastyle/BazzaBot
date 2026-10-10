<?php

declare(strict_types=1);

/**
 * Update types: message_reaction, message_reaction_count
 * https://core.telegram.org/bots/api#messagereactionupdated
 * https://core.telegram.org/bots/api#messagereactioncountupdated
 *
 * "message_reaction" fires with the exact reactor (only in private chats,
 * or chats where the bot is admin with can_post_messages-like visibility);
 * "message_reaction_count" fires with anonymised aggregate counts otherwise.
 * Neither is sent by default: add "message_reaction"/"message_reaction_count"
 * to allowed_updates when setting the webhook.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::MessageReaction, function (Context $context): void {
    $reaction = $context->update->raw->message_reaction;

    $context->logger->info('Reazione a un messaggio', [
        'chat_id' => $reaction->chat->id,
        'message_id' => $reaction->message_id,
        'new_reaction' => $reaction->new_reaction ?? [],
    ]);
});

$bot->router->onUpdateType(UpdateType::MessageReactionCount, function (Context $context): void {
    $reactionCount = $context->update->raw->message_reaction_count;

    $context->logger->info('Conteggio reazioni aggiornato', [
        'chat_id' => $reactionCount->chat->id,
        'message_id' => $reactionCount->message_id,
    ]);
});
