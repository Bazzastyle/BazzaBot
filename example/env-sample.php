<?php
$env = [

#--------------------------------------------------------------------------------------------------#
#                                       ENVIRONMENT SETTING                                        #
#--------------------------------------------------------------------------------------------------#
	'botToken'             => '', # Leave blank if you want to use multibot.
	'jsonPlayload'         => false, # info https://core.telegram.org/bots/faq#how-can-i-make-requests-in-response-to-updates
	'endpoint'             => 'https://api.telegram.org/bot', # info https://core.telegram.org/bots/api#using-a-local-bot-api-server
	'webhook'              => 'https://example.com/' . basename( dirname( __FILE__ ) ) .'/index.php',
	'commandsAlias'        =>  [ '/', '!', '.' ],
	'timezone'             => 'Europe/Rome',
	'setlocale'            => 'it_IT.utf8',
	'admins'               => [
    1234567890 // Your ID
  ],
	'updateType'           => 'webhook', #webhook, getUpdates
	'getUpdates' => [
		'limit' => 100,
		'timeout' => 0,
		'allowedUpdates' => [
			"message",
			"edited_message",
			"channel_post",
			"edited_channel_post",
			"business_connection",
			"business_message",
			"edited_business_message",
			"deleted_business_messages",
			"guest_message",
			"message_reaction",
			"message_reaction_count",
			"inline_query",
			"chosen_inline_result",
			"callback_query",
			"shipping_query",
			"pre_checkout_query",
			"purchased_paid_media",
			"poll",
			"poll_answer",
			"my_chat_member",
			"chat_member",
			"chat_join_request",
			"chat_boost",
			"removed_chat_boost",
			"managed_bot"
		],
	],

#--------------------------------------------------------------------------------------------------#
#                                   MANDATORY DATABASE SETTINGS                                    #
#--------------------------------------------------------------------------------------------------#
	'database'             => [
		'driver'   => 'mysql', #mysql, pgsql, sqlite
		'host'     => 'localhost',
		'port'     => 3306, # mysql 3306, pgsql 5432
		'name'     => 'my-project',
		'user'     => 'root',
		'password' => 'password',
		'charset'  => 'utf8mb4',
		'collate'  => 'utf8mb4_unicode_520_ci'
	],

#--------------------------------------------------------------------------------------------------#
#                                              DEBUG                                               #
#--------------------------------------------------------------------------------------------------#
	'debug'                => true, # master on/off switch for the PSR-3 file logger, see 'logging' below
	'displayStartupErrors' => true,
	'displayErrors'        => true, # also push matching log records to 'logChat' via Telegram, see 'logging.telegram' below
	'errorLog'             => '/error.log', # base path for both PHP's native error_log and the rotating PSR-3 logger (see LoggerFactory::createFromEnv)
	'ignoreRepeatedErrors' => true,
	'logChat'              => 1234567890,

	# Build the app logger with `LoggerFactory::createFromEnv($env, __DIR__ . $env['errorLog'])`
	# instead of hardcoding these choices in every entry point (webhook.php, cron.php, ...).
	'logging' => [
		'enabled'  => null, # true/false to override 'debug' above; null = follow 'debug'
		'level'    => 'debug', # minimum PSR-3 level written to file: debug, info, warning, error, ...
		'channels' => null, # e.g. ['database'] to only log DB activity; null = log every component (api, database, webhook)
		'maxFiles' => 14, # how many rotated log files to keep (one per day); 0 = unlimited, never delete old logs
		'telegram' => [
			'enabled' => null, # true/false to override 'displayErrors' above; null = follow 'displayErrors'
			'level'   => 'warning', # minimum PSR-3 level sent to 'logChat' (keep this at warning+ to avoid spamming the chat)
		],
	],

#--------------------------------------------------------------------------------------------------#
#                                             SECURITY                                             #
#--------------------------------------------------------------------------------------------------#
	'botApiSecretToken'    => 'your_secret_token',
	'trustCloudflareHeader' => true, # set to false if your webhook is NOT served behind Cloudflare

#--------------------------------------------------------------------------------------------------#
#                                    HTTP CLIENT (Client.php)                                      #
#--------------------------------------------------------------------------------------------------#
	'http' => [
		'connectTimeout'    => 5.0,
		'tlsTimeout'        => 5.0,
		'transferTimeout'   => 30.0,
		'inactivityTimeout' => 15.0,
		'maxRetries'        => 3, # applies to transport errors and Telegram 429 rate limits
	],

#--------------------------------------------------------------------------------------------------#
#                          SECRETS FROM .env (optional, opt-in)                                    #
#--------------------------------------------------------------------------------------------------#
	# Passing $envFilePath to `new Client($env, $logger, envFilePath: __DIR__)` loads a `.env` file
	# from that directory (requires composer require vlucas/phpdotenv) and/or reads real environment
	# variables (BAZZABOT_TOKEN, BAZZABOT_SECRET_TOKEN, BAZZABOT_DB_*), which take precedence over the
	# values above when set. This array remains fully valid on its own if you don't use .env.
];

?>