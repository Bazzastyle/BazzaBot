<?php
	declare(strict_types=1);

	require_once '../vendor/autoload.php';
	require_once __DIR__ . '/env.php';

	use BazzaBot\Client;
	use BazzaBot\Exceptions\BazzaBotException;
	use BazzaBot\Exceptions\WebhookValidationException;
	use BazzaBot\Logging\LoggerFactory;
	use BazzaBot\Webhook\WebhookGuard;
	use function Amp\async;

	setlocale( LC_ALL, $env[ 'setLocale' ] ?? 'it_IT.utf8' );
	error_reporting( E_ALL & ~E_NOTICE & ~E_DEPRECATED );
	date_default_timezone_set( $env[ 'timezone' ] ?? 'Europe/Rome' );
	ini_set( 'display_startup_errors', $env[ 'displayStartupErrors' ] ?? TRUE );
	ini_set( 'display_errors', $env[ 'displayErrors' ] ?? TRUE );
	ini_set( 'error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED );
	ini_set( 'error_log', __DIR__ . $env[ 'errorLog' ] );
	ini_set( 'ignore_repeated_errors', $env[ 'ignoreRepeatedErrors' ] ?? TRUE );

	$logger = LoggerFactory::createFromEnv( $env, __DIR__ . $env[ 'errorLog' ], 'webhook' );

	try {
		// Leave 'botToken' empty in env.php to serve multiple bot clones from this same file,
		// one per distinct "?api=<token>" webhook URL (see WebhookGuard::resolveBotToken()).
		$env = WebhookGuard::resolveBotToken( $env, $_GET[ 'api' ] ?? null );
		WebhookGuard::assertValidRequest( $env, $_SERVER );

		$client = new Client( $env, $logger );
		$update = $client->getUpdate();

		/**
		 * Handle an update from Telegram, log any errors that occur.
		 */
		function handleUpdate ( Client $client, stdClass $update, array $env ) : void {
			require_once __DIR__ . '/includes/class-autoload.php';

			set_exception_handler( 'UsernameBot\Globals::errorLog' );

			if ( isset( $update->message ) || isset( $update->edited_message ) || isset( $update->guest_message ) ) require_once __DIR__ . '/update/message.php';
			elseif ( isset( $update->channel_post ) || isset( $update->edited_channel_post ) ) require_once __DIR__ . '/update/channel.php';
			elseif ( isset( $update->business_message ) || isset( $update->edited_business_message ) || isset( $update->business_connection ) || isset( $update->deleted_business_messages ) ) require_once __DIR__ . '/update/business.php';
			elseif ( isset( $update->message_reaction ) || isset( $update->message_reaction_count ) ) require_once __DIR__ . '/update/reaction.php';
			elseif ( isset( $update->inline_query ) || isset( $update->chosen_inline_result ) ) require_once __DIR__ . '/update/inline.php';
			elseif ( isset( $update->callback_query ) ) require_once __DIR__ . '/update/callback.php';
			elseif ( isset( $update->shipping_query ) ) require_once __DIR__ . '/update/shipping.php';
			elseif ( isset( $update->pre_checkout_query ) ) require_once __DIR__ . '/update/checkout.php';
			elseif ( isset( $update->purchased_paid_media ) ) require_once __DIR__ . '/update/purchased.php';
			elseif ( isset( $update->poll ) || isset( $update->poll_answer ) ) require_once __DIR__ . '/update/poll.php';
			elseif ( isset( $update->my_chat_member ) ) require_once __DIR__ . '/update/my_chat_member.php';
			elseif ( isset( $update->chat_member ) ) require_once __DIR__ . '/update/chat_member.php';
			elseif ( isset( $update->chat_join_request ) ) require_once __DIR__ . '/update/request.php';
			elseif ( isset( $update->chat_boost ) || isset( $update->removed_chat_boost ) ) require_once __DIR__ . '/update/boost.php';
			elseif ( isset( $update->managed_bot ) ) require __DIR__ . '/update/managed_bot.php';
		}

		$future = async( handleUpdate( ... ), $client, $update, $env );
		$future->await();
	}
	catch ( WebhookValidationException $e ) {
		$logger->warning( 'Webhook request rejected', [ 'reason' => $e->getMessage(), 'status' => $e->httpStatus ] );
		http_response_code( $e->httpStatus );
	}
	catch ( BazzaBotException $e ) {
		$logger->error( 'Unhandled BazzaBot exception while processing webhook', [ 'exception' => $e->getMessage() ] );
		http_response_code( 500 );
	}
	catch ( \Throwable $e ) {
		$logger->error( 'Unhandled exception while processing webhook', [ 'exception' => $e->getMessage(), 'trace' => $e->getTraceAsString() ] );
		http_response_code( 500 );
	}
