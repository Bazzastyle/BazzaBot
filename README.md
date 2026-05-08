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
