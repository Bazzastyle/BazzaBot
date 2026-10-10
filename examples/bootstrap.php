<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Bazzastyle\BazzaBot\Bot;

// Più bot, stesso codice: se il webhook è stato impostato come
// ".../webhook.php?api=<token>" (vedi examples/setup.php), quel token ha la
// precedenza su TELEGRAM_BOT_TOKEN nel .env condiviso (secret/DB/rate limit
// restano comuni a tutti i bot). In CLI (poll.php) $_GET è sempre vuoto, quindi
// qui non cambia nulla e si usa il token del .env come al solito.
$bot = Bot::fromEnvFile(__DIR__ . '/.env', $_GET['api'] ?? null);

// Esempio di broadcast concorrente (curl_multi), rispettando il rate limiter:
//
// $chatIds = [111111111, 222222222, 333333333];
// foreach ($bot->client->broadcast('sendMessage', $chatIds, ['text' => 'Comunicazione a tutti gli utenti']) as $chatId => $response) {
//     if (!$response->ok) {
//         $bot->logger->warning('Invio broadcast fallito', ['chat_id' => $chatId, 'description' => $response->description]);
//     }
// }

// Un file per ogni tipo di update (message, callback_query, poll,
// my_chat_member, chat_join_request, inline_query, ...), registrato via
// command()/callback()/callbackPattern()/onUpdateType(). Basta aggiungere un
// file in updates/ per gestire un nuovo tipo: nessuna modifica qui.
foreach (glob(__DIR__ . '/updates/*.php') ?: [] as $updateTypeHandlerFile) {
    require $updateTypeHandlerFile;
}

return $bot;
