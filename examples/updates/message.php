<?php

declare(strict_types=1);

/**
 * Update type: message (+ edited_message, channel_post, edited_channel_post,
 * guest_message — Update::getText()/getChatId()/... treat them tutti allo
 * stesso modo)
 * https://core.telegram.org/bots/api#message
 *
 * Qui vivono sia i comandi (command(), provati per primi dal Router) sia il
 * fallback generico per i messaggi che NON sono un comando riconosciuto
 * (onUpdateType(Message), provato dopo comandi/callback e prima di
 * onText()/fallback()).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Types\{InlineKeyboardButton, InlineKeyboardMarkup};
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */

// /start — il primo messaggio che un utente vede aprendo il bot.
$bot->router->command('start', function (Context $context): void {
    $context->client->sendMessage($context->update->getChatId(), 'Ciao! Sono vivo.');
});

// /ping — verifica rapida che il bot risponda.
$bot->router->command('ping', function (Context $context): void {
    $context->client->sendMessage($context->update->getChatId(), 'pong');
});

// /menu — invia una tastiera inline; i pulsanti sono gestiti in updates/callback.php
// (callback_data "menu:a"/"menu:b", pattern "menu:*").
$bot->router->command('menu', function (Context $context): void {
    $markup = new InlineKeyboardMarkup(inline_keyboard: [
        [new InlineKeyboardButton(text: 'Opzione A', callback_data: 'menu:a')],
        [new InlineKeyboardButton(text: 'Opzione B', callback_data: 'menu:b')],
    ]);

    $context->client->sendMessage($context->update->getChatId(), 'Scegli un\'opzione:', reply_markup: $markup);
});

// /ban <@username|testo libero> [motivo] — solo per gli admin configurati in
// ADMINS nel .env ($bot->admins->isAdmin(...)). L'handler riceve tutto il
// testo dopo il nome del comando, per intero: sia "/ban @mario spam nel
// gruppo" che "/ban @mario" arrivano come $args, quindi separare un eventuale
// username da un motivo tocca all'handler stesso.
// $bot non viene catturato automaticamente dalla closure: serve "use ($bot)"
// esplicito (vedi nota sul README su questo gotcha).
$bot->router->command('ban', function (Context $context, string $args) use ($bot): void {
    if (!$bot->admins->isAdmin($context->update->getFromId())) {
        $context->client->sendMessage($context->update->getChatId(), 'Comando riservato agli amministratori.');

        return;
    }

    if ($args === '') {
        $context->client->sendMessage($context->update->getChatId(), 'Uso: /ban @username [motivo]');

        return;
    }

    [$target, $reason] = array_pad(explode(' ', $args, 2), 2, null);

    $context->client->sendMessage(
        $context->update->getChatId(),
        $reason !== null
            ? "Bannato {$target} (motivo: {$reason})"
            : "Bannato {$target}",
    );
});

// /note <testo> — esempio di uso del database (Bazzastyle\BazzaBot\Database\Connection,
// esposto come $bot->database quando DB_DRIVER è configurato nel .env): crea
// la tabella "notes" se non esiste, inserisce una nota per l'utente e
// rimostra le sue ultime note. Query sempre preparate, mai concatenazione di
// stringhe: i valori vanno passati come tuple [nome, valore, tipo] a
// query()/execute() (tipo: 'str'|'int'|'bool'|'null').
$bot->router->command('note', function (Context $context, string $args) use ($bot): void {
    if ($bot->database === null) {
        $context->client->sendMessage(
            $context->update->getChatId(),
            'Database non configurato: imposta DB_DRIVER (e DB_HOST/DB_NAME/...) nel .env.',
        );

        return;
    }

    if ($args === '') {
        $context->client->sendMessage($context->update->getChatId(), 'Uso: /note <testo>');

        return;
    }

    $db = $bot->database;

    // La sintassi per una chiave auto-incrementante cambia tra i driver
    // supportati: la si sceglie a runtime in base al driver PDO attivo,
    // niente di hardcoded per un singolo database.
    $primaryKey = match ($db->pdo()->getAttribute(\PDO::ATTR_DRIVER_NAME)) {
        'sqlite' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
        'pgsql' => 'SERIAL PRIMARY KEY',
        default => 'INT AUTO_INCREMENT PRIMARY KEY', // mysql
    };

    $db->execute(<<<SQL
        CREATE TABLE IF NOT EXISTS notes (
            id {$primaryKey},
            user_id INTEGER NOT NULL,
            text TEXT NOT NULL,
            created_at INTEGER NOT NULL
        )
        SQL);

    $userId = $context->update->getFromId();

    $db->execute(
        'INSERT INTO notes (user_id, text, created_at) VALUES (:user_id, :text, :created_at)',
        [
            ['user_id', $userId, 'int'],
            ['text', $args, 'str'],
            ['created_at', time(), 'int'],
        ],
    );

    $notes = $db->query(
        'SELECT text FROM notes WHERE user_id = :user_id ORDER BY id DESC LIMIT 5',
        [['user_id', $userId, 'int']],
    );

    $list = implode("\n", array_map(static fn (array $row): string => "- {$row['text']}", $notes));

    $context->client->sendMessage($context->update->getChatId(), "Nota salvata! Le tue ultime note:\n{$list}");
});

// Fallback: messaggio che non è un comando riconosciuto (testo libero, o
// media senza didascalia riconosciuta come comando). In gruppo ci si limita
// a loggare (rispondere a ogni messaggio non tuo in un gruppo è fastidioso);
// in privata si risponde direttamente, dato che l'utente sta parlando solo
// con il bot.
$bot->router->onUpdateType(UpdateType::Message, function (Context $context): void {
    $update = $context->update;

    if ($update->isGroupChat()) {
        $context->logger->info('Messaggio di gruppo non riconosciuto come comando', [
            'chat_id' => $update->getChatId(),
            'update_id' => $update->updateId,
        ]);

        return;
    }

    if ($update->getText() !== null) {
        $context->client->sendMessage(
            $update->getChatId(),
            "Non ho capito \"{$update->getText()}\". Prova /start per l'elenco dei comandi.",
        );

        return;
    }

    // Contenuto non testuale (foto, sticker, documento, posizione, ...):
    // accessibile solo via raw, es. $update->raw->message->photo ?? null.
    $context->logger->info('Ricevuto messaggio non testuale', [
        'chat_id' => $update->getChatId(),
        'update_id' => $update->updateId,
    ]);
});
