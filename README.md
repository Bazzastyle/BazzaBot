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
