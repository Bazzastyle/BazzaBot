<?php

declare(strict_types=1);

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot = require __DIR__ . '/bootstrap.php';

$bot->handleWebhook(
    secretHeader: $_SERVER['HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN'] ?? null,
    // Passa qui l'IP sorgente corretto per la tua topologia di rete se
    // TELEGRAM_ALLOWED_IP_CHECK=true (es. $_SERVER['HTTP_CF_CONNECTING_IP']
    // se dietro Cloudflare, altrimenti $_SERVER['REMOTE_ADDR']).
    sourceIp: $_SERVER['REMOTE_ADDR'] ?? null,
);
