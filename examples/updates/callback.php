<?php

declare(strict_types=1);

/**
 * Update type: callback_query
 * https://core.telegram.org/bots/api#callbackquery
 *
 * Qui vivono sia i callback specifici (callback()/callbackPattern(), provati
 * per primi dal Router) sia il fallback generico per i callback_query il cui
 * callback_data non ha trovato corrispondenza (onUpdateType(CallbackQuery),
 * provato dopo comandi/callback e prima di onText()/fallback()).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */

// Pulsanti del menu inviato da /menu (vedi updates/message.php), callback_data
// "menu:a" / "menu:b".
$bot->router->callbackPattern('menu:*', function (Context $context): void {
    $context->client->answerCallbackQuery($context->update->getCallbackQueryId(), text: 'Hai premuto un pulsante del menu.');
});

// Fallback: callback_data che non ha trovato corrispondenza in nessuna
// callback()/callbackPattern() sopra (bottone di un vecchio messaggio, dato
// scaduto/malformato, ...). Rispondi sempre con answerCallbackQuery(),
// altrimenti il client Telegram dell'utente resta con lo spinner sul bottone.
$bot->router->onUpdateType(UpdateType::CallbackQuery, function (Context $context): void {
    $context->logger->warning('Callback_data non riconosciuto', [
        'data' => $context->update->getCallbackData(),
        'from_id' => $context->update->getFromId(),
    ]);

    $context->client->answerCallbackQuery(
        $context->update->getCallbackQueryId(),
        text: 'Questo pulsante non è più disponibile.',
        show_alert: true,
    );
});
