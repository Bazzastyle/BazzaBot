<?php
  require_once "vendor/autoload.php";
  require_once __DIR__ . '/env.php';

  setlocale( LC_ALL, $env[ 'setLocale' ] ?? 'it_IT.utf8' );
	error_reporting( E_ALL & ~E_NOTICE & ~E_DEPRECATED );
	date_default_timezone_set( $env[ 'timezone' ] ?? 'Europe/Rome' );
	ini_set( 'display_startup_errors', $env[ 'displayStartupErrors' ] ?? TRUE );
	ini_set( 'display_errors', $env[ 'displayErrors' ] ?? TRUE );
	ini_set( 'error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED );
	ini_set( 'error_log', __DIR__ . $env[ 'errorLog' ] );
	ini_set( 'ignore_repeated_errors', $env[ 'ignoreRepeatedErrors' ] ?? TRUE );

  use BazzaBot\Client;
  use function Amp\async;

  $client = new Client( $env );
  $offset = 0;

  function handleUpdate ( Client $client, object $update, array $env ) : void {
    require_once __DIR__ . '/includes/class-autoload.php';

		set_exception_handler( 'Globals::errorLog' );

    if ( isset( $update->message ) || isset( $update->edited_message ) ) require __DIR__ . '/update/message.php';
		elseif ( isset( $update->channel_post ) || isset( $update->edited_channel_post ) ) require __DIR__ . '/update/channel.php';
		elseif ( isset( $update->business_message ) || isset( $update->edited_business_message ) || isset( $update->business_connection ) || isset( $update->deleted_business_messages ) ) require __DIR__ . '/update/business.php';
		elseif ( isset( $update->message_reaction ) || isset( $update->message_reaction_count ) ) require __DIR__ . '/update/reaction.php';
		elseif ( isset( $update->inline_query ) || isset( $update->chosen_inline_result ) ) require __DIR__ . '/update/inline.php';
		elseif ( isset( $update->callback_query ) ) require __DIR__ . '/update/callback.php';
		elseif ( isset( $update->shipping_query ) ) require __DIR__ . '/update/shipping.php';
		elseif ( isset( $update->pre_checkout_query ) ) require __DIR__ . '/update/checkout.php';
		elseif ( isset( $update->purchased_paid_media ) ) require __DIR__ . '/update/purchased.php';
		elseif ( isset( $update->poll ) || isset( $update->poll_answer ) ) require __DIR__ . '/update/poll.php';
		elseif ( isset( $update->my_chat_member ) ) require __DIR__ . '/update/my_chat_member.php';
		elseif ( isset( $update->chat_member ) ) require __DIR__ . '/update/chat_member.php';
		elseif ( isset( $update->chat_join_request ) ) require __DIR__ . '/update/request.php';
		elseif ( isset( $update->chat_boost ) || isset( $update->removed_chat_boost ) ) require __DIR__ . '/update/boost.php';
  }

  function getUpdatesCatch ( Client $client, int $offset, array $env ) {
    try { return $client->getUpdates( offset: $offset, limit: $env[ 'limit' ], timeout: $env[ 'timeout' ], allowed_updates: $env[ 'allowedUpdates' ] ); }
    catch ( Throwable $e ) { echo "getUpdates error: $e" . PHP_EOL; }
    return false;
  }

  while ( true ) {
    $updates = getUpdatesCatch( $client, $offset, $env[ 'getUpdates' ] );
    if ( isset( $updates->ok ) && $updates->ok ) {
      foreach ($updates->result as $update) {
        $offset = $update->update_id + 1;
        async( handleUpdate( ... ), $client, $update, $env );
      }
    }
    else echo isset( $updates->description ) ? "Error: " . $updates->description . PHP_EOL : "Error: No description available" . PHP_EOL;
  }