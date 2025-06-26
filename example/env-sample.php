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
			"removed_chat_boost"
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
	'debug'                => true,
	'displayStartupErrors' => true,
	'displayErrors'        => true,
	'errorLog'             => '/error.log',
	'ignoreRepeatedErrors' => true,
	'logChat'              => 1234567890,

#--------------------------------------------------------------------------------------------------#
#                                             SECURITY                                             #
#--------------------------------------------------------------------------------------------------#
	'botApiSecretToken'    => 'your_secret_token'
];

?>