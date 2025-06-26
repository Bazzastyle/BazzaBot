<?php
	require_once __DIR__ . '/../vendor/autoload.php';
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
	if ( empty( $env[ 'botToken' ] ) && ! empty( $argv[1] ) ) $env[ 'botToken' ] = $argv[1];
	if ( empty( $env[ 'botToken' ] ) ) die( http_response_code( 406 ) );
	if ( ! empty( $argv[2] ) && $argv[2] !== $env[ 'botApiSecretToken' ] ) die( http_response_code( 401 ) );

	use BazzaBot\Client;
	use BazzaBot\InputFile;
	use function Amp\async;

	$client = new Client( $env );

	function handleUpdate ( Client $client, array $env ) : void {
		require_once __DIR__ . '/includes/class-autoload.php';

		set_exception_handler( 'Globals::errorLog' );

		Cron::execute();
	}

	$future = async( handleUpdate( ... ), $client, $env );
	$future->await();