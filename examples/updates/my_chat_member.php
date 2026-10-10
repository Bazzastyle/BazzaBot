<?php

declare(strict_types=1);

/**
 * Update type: my_chat_member
 * https://core.telegram.org/bots/api#chatmemberupdated
 *
 * Fired when the BOT ITSELF is added, removed, or has its permissions
 * changed in a chat (private, group, supergroup or channel). Not fired for
 * other members joining/leaving — that's chat_member.php.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::MyChatMember, function (Context $context): void {
    $update = $context->update->raw->my_chat_member;
    $oldStatus = $update->old_chat_member->status ?? null;
    $newStatus = $update->new_chat_member->status ?? null;
    $chatId = $update->chat->id ?? null;

    if ($chatId === null) {
        return;
    }

    match (true) {
        in_array($newStatus, ['left', 'kicked'], true) => $context->logger->info('Bot rimosso/bannato dalla chat', ['chat_id' => $chatId]),
        $newStatus === 'member' && in_array($oldStatus, ['left', 'kicked'], true)
            => $context->client->sendMessage($chatId, 'Ciao a tutti! Grazie per avermi aggiunto. Scrivi /start per iniziare.'),
        $newStatus === 'administrator' && $oldStatus !== 'administrator'
            => $context->client->sendMessage($chatId, 'Sono stato promosso ad amministratore, grazie!'),
        $newStatus === 'member' && $oldStatus === 'administrator'
            => $context->logger->info('Bot degradato da amministratore', ['chat_id' => $chatId]),
        $newStatus === 'restricted' => $context->logger->warning('Permessi del bot limitati', ['chat_id' => $chatId]),
        default => null,
    };
});
