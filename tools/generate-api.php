#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Convenience wrapper: regenerates both src/Types/*.php and
 * src/Http/GeneratedMethods.php from the current Telegram Bot API spec.
 * Run this whenever Telegram publishes a new Bot API version:
 *
 *   php tools/generate-api.php
 */

$typesExit = 0;
passthru(PHP_BINARY . ' ' . escapeshellarg(__DIR__ . '/generate-types.php'), $typesExit);

$methodsExit = 0;
passthru(PHP_BINARY . ' ' . escapeshellarg(__DIR__ . '/generate-methods.php'), $methodsExit);

exit(max($typesExit, $methodsExit));
