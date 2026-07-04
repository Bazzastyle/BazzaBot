[![API](https://img.shields.io/badge/Telegram%20Bot%20API-10.0%09--%20May%208,%202026-28a8ea.svg?logo=telegram)](https://core.telegram.org/bots/api)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/bazzastyle/bazzabot.svg?label=composer&logo=composer)](https://packagist.org/packages/bazzastyle/bazzabot)
![PHP](https://img.shields.io/packagist/dependency-v/bazzastyle/bazzabot/php?logo=php)
![License](https://img.shields.io/github/license/bazzastyle/bazzabot)

[![Packagist Downloads](https://img.shields.io/packagist/dm/bazzastyle/bazzabot)](https://packagist.org/packages/bazzastyle/bazzabot)
[![Packagist Downloads](https://img.shields.io/packagist/dt/bazzastyle/bazzabot)](https://packagist.org/packages/bazzastyle/bazzabot)
[![GitHub Issues](https://img.shields.io/github/issues/bazzastyle/bazzabot)](https://github.com/bazzastyle/bazzabot/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/bazzastyle/bazzabot)](https://github.com/bazzastyle/bazzabot/pulls)

[![Maintainability](https://qlty.sh/gh/nutgram/projects/nutgram/maintainability.svg)](https://qlty.sh/gh/nutgram/projects/nutgram/maintainability)
[![Test Coverage](https://qlty.sh/gh/nutgram/projects/nutgram/coverage.svg)](https://qlty.sh/gh/nutgram/projects/nutgram/coverage)

# BazzaBot fork [TuriBot](https://github.com/davtur19/TuriBot/tree/async)
> BazzaBot is a simple way to communicate with Telegram APIs in PHP

## Requirements
PHP 8.4 or higher

From composer:
amphp/http-client 5.0
amphp/file 3.0

## Installation
```sh
composer require bazzastyle/bazzabot
```
- Copy the example folder outside the vendor folder and rename it as you wish.
- Rename env-sample.php to env.php

### Environment
Set the required values in the env.php file

### Webhook
Open [setupWebhook.php](https://github.com/bazzastyle/BazzaBot/blob/master/example/setupWebhook.php) in your browser and follow the setup wizard.

### GetUpdates
[Setup Token](https://github.com/bazzastyle/BazzaBot/blob/master/example/getUpdates.php#L8)

## Usage
- Look at the examples ([webhook.php](https://github.com/bazzastyle/BazzaBot/blob/master/example/webhook.php) and [getUpdates.php](https://github.com/bazzastyle/BazzaBot/blob/master/examples/getUpdates.php)), it's very simple if you know PHP and OOP
- All methods have the parameters in the same order as the [BotAPIs](https://core.telegram.org/bots/api#available-methods)

## Custom endpoint
With the Bot API 5.0 it is now possible to [self host your own Bot API](https://core.telegram.org/bots/api#using-a-local-bot-api-server), here is an example of how to add your own endpoint

## Json payload
Only works with webhooks, for more info: https://core.telegram.org/bots/faq#how-can-i-make-requests-in-response-to-updates

I do not recommend using it as it may need a particular configuration to the webserver for flushing and you cannot get a response from the Bot API

## Logging (PSR-3 / Monolog)
`Client` and `Database` accept an optional [PSR-3](https://www.php-fig.org/psr/psr-3/) `LoggerInterface` as constructor argument (default: a no-op `NullLogger`, so passing nothing keeps prior behavior of "no logging"). A ready-to-use rotating file logger is provided:

```php
use BazzaBot\Client;
use BazzaBot\Logging\LoggerFactory;

$logger = LoggerFactory::createFileLogger('mybot', __DIR__ . '/bot.log');
$client = new Client($env, $logger);
```

API calls are logged at `debug` (method + duration), `warning` (Telegram application errors, rate limits) or `error` (transport failures). Database queries are logged at `debug`, or `warning` if they exceed the configurable slow-query threshold. The bot token is never logged in full.

## Secrets from environment variables (optional)
The historical `$env` array remains the primary and fully supported configuration format. If you want to source secrets from real environment variables or a `.env` file instead of a plaintext PHP array, pass `envFilePath` to the `Client` constructor:

```php
$client = new Client($env, $logger, envFilePath: __DIR__);
```

This reads `BAZZABOT_TOKEN`, `BAZZABOT_SECRET_TOKEN`, `BAZZABOT_DB_*` from the environment (and from a `.env` file in that directory if [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv) is installed), overriding the matching `$env` keys when set. Nothing changes if you don't pass `envFilePath`.

## Breaking changes (upgrading from earlier versions)
This version hardens the library's security, error handling and observability. If you're updating existing bots, review:

- **`Client::$env` (public static) has been removed.** Configuration is now private and passed via constructor DI. Read `$client->db` as before (unchanged, still a public instance property) instead of the removed static state.
- **`Client::debug()` and `Client::cURL()` have been removed.** They sent arbitrary data to a Telegram chat (`debug()`) or duplicated the HTTP client (`cURL()`). Use the injected PSR-3 logger instead, or call `amphp/http-client` directly for ad-hoc HTTP requests.
- **`Database` no longer calls `exit()` on connection/query failures.** It throws `BazzaBot\Exceptions\DatabaseException` (with `->query`/`->params` for context) instead. Wrap DB calls in try/catch where you want to recover or show a custom message; uncaught exceptions now surface as PHP fatal errors instead of silently exiting the process after sending a Telegram message with the raw SQL to the log chat.
- **`Database::query()` no longer auto-detects `INSERT` via regex.** To get the last insert id, pass `returnLastInsertId: true` explicitly: `$id = $db->query('INSERT ...', $params, returnLastInsertId: true);`, or call `$db->lastInsertId()` after the insert.
- **Transport-level Telegram API errors now throw `BazzaBot\Exceptions\TelegramApiException`** (connection/timeout/stream failures) instead of returning a fake `{"ok":false,"http_error":true}` response. Application-level Telegram errors (e.g. "chat not found") are unchanged and still returned as `stdClass` with `->ok === false`. 429 rate limits are now retried automatically with backoff before giving up.
- **Missing `botToken` now throws `BazzaBot\Exceptions\ConfigurationException`** instead of failing later with an unclear error.
- New dependencies: `monolog/monolog`, `psr/log`, `ext-pdo` (already required at runtime, now declared). `vlucas/phpdotenv` is an optional `suggest`.
