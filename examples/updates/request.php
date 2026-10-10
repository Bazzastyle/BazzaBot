<?php

declare(strict_types=1);

/**
 * Update type: chat_join_request
 * https://core.telegram.org/bots/api#chatjoinrequest
 *
 * Fired when a user requests to join a chat that has join requests enabled
 * (and the bot has the can_invite_users right).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::ChatJoinRequest, function (Context $context): void {
    $request = $context->update->raw->chat_join_request;
    $chatId = $request->chat->id;
    $userId = $request->from->id;

    // Approvazione automatica di ogni richiesta: sostituisci con la tua logica
    // (es. controllo su una lista di invitati, verifica captcha, ecc.).
    $response = $context->client->approveChatJoinRequest(chat_id: $chatId, user_id: $userId);

    if (!$response->ok) {
        $context->logger->warning('Impossibile approvare la richiesta di ingresso', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'description' => $response->description,
        ]);
    }
});
