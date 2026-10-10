#!/usr/bin/env php
<?php

declare(strict_types=1);

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot = require __DIR__ . '/bootstrap.php';

echo "Avvio polling... CTRL+C per fermare\n";
$bot->runPolling(__DIR__ . '/var/polling.offset');
