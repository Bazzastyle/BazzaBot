<?php
	require_once '../vendor/autoload.php';
	require_once __DIR__ . '/env.php';

	setlocale( LC_ALL, $env[ 'setLocale' ] ?? 'it_IT.utf8' );
	error_reporting( E_ALL & ~E_NOTICE & ~E_DEPRECATED );
	date_default_timezone_set( $env[ 'timezone' ] ?? 'Europe/Rome' );
	ini_set( 'display_startup_errors', $env[ 'displayStartupErrors' ] ?? TRUE );
	ini_set( 'display_errors', $env[ 'displayErrors' ] ?? TRUE );
	ini_set( 'error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED );
	ini_set( 'error_log', __DIR__ . $env[ 'errorLog' ] );
	ini_set( 'ignore_repeated_errors', $env[ 'ignoreRepeatedErrors' ] ?? TRUE );

	if ( empty( $_GET[ 'api' ] ) && ! empty( $env[ 'botToken' ] ) ) die( http_response_code( 406 ) );
	if ( empty( $env[ 'botToken' ] ) && ! empty ( $_GET[ 'api' ] ) ) $env[ 'botToken' ] = $_GET[ 'api' ];
	if ( empty( $env[ 'botToken' ] ) ) die( http_response_code( 406 ) );
	if ( ! empty( $_SERVER[ 'HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN' ] ) && $_SERVER[ 'HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN' ] !== $env[ 'botApiSecretToken' ] ) die( http_response_code( 401 ) );

	$ip_dec = ( float ) sprintf( '%u', ip2long( $_SERVER[ 'HTTP_CF_CONNECTING_IP' ] ) );
	$ok = false;

	foreach ( [ [ 'lower' => '149.154.160.0', 'upper' => '149.154.175.255' ], [ 'lower' => '91.108.4.0', 'upper' => '91.108.7.255' ] ] as $telegram_ip_range ) {
		if ( $ip_dec >= ( float ) sprintf( '%u', ip2long( $telegram_ip_range[ 'lower' ] ) ) && ( float ) sprintf( '%u', ip2long( $telegram_ip_range[ 'upper' ] ) ) >= $ip_dec ) {
			$ok = true;
			break;
		}
	}

	if ( ! $ok ) die( http_response_code( 418 ) );

	use BazzaBot\Client;
	use function Amp\async;

	$client = new Client( $env );
	$update = $client->getUpdate();
	if ( ! isset( $update ) ) die( http_response_code( 400 ) );

	/**
	 * Handle an update from Telegram, log any errors that occur.
	 *
	 * @param Client $client
	 * @param mixed $update
	 */
	function handleUpdate ( Client $client, stdClass $update, array $env ) : void {
		require_once __DIR__ . '/includes/class-autoload.php';

		set_exception_handler( 'Globals::errorLog' );

		if ( isset( $update->message ) || isset( $update->edited_message ) ) require_once __DIR__ . '/update/message.php';
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
	}

	$future = async( handleUpdate( ... ), $client, $update, $env );
	$future->await();