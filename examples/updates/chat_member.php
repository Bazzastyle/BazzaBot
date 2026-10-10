<?php

declare(strict_types=1);

/**
 * Update type: chat_member
 * https://core.telegram.org/bots/api#chatmemberupdated
 *
 * Fired when another user's membership/status in a chat changes (joined,
 * left, promoted, restricted, banned, ...) — not the bot's own, see
 * my_chat_member.php. Requires the bot to be an administrator in the chat
 * and "chat_member" to be included in allowed_updates when setting the
 * webhook (it is NOT sent by default).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::ChatMember, function (Context $context): void {
    $update = $context->update->raw->chat_member;
    $oldStatus = $update->old_chat_member->status ?? null;
    $newStatus = $update->new_chat_member->status ?? null;
    $chatId = $update->chat->id ?? null;
    $userName = $update->new_chat_member->user->first_name ?? 'qualcuno';

    if ($chatId === null) {
        return;
    }

    match (true) {
        $newStatus === 'member' && in_array($oldStatus, ['left', 'kicked'], true)
            => $context->client->sendMessage($chatId, "Benvenuto/a {$userName}!"),
        in_array($newStatus, ['left', 'kicked'], true)
            => $context->logger->info('Utente uscito/rimosso dalla chat', ['chat_id' => $chatId, 'user' => $userName]),
        default => null,
    };
});
