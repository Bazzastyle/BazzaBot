<?php
	declare(strict_types=1);

	require_once __DIR__ . '/../vendor/autoload.php';
	require_once __DIR__ . '/env.php';

	use BazzaBot\Client;
	use BazzaBot\Exceptions\WebhookValidationException;
	use BazzaBot\InputFile;
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

	$logger = LoggerFactory::createFromEnv( $env, __DIR__ . $env[ 'errorLog' ], 'cron' );

	function handleUpdate ( Client $client, array $env ) : void {
		require_once __DIR__ . '/includes/class-autoload.php';

		set_exception_handler( 'UsernameBot\Globals::errorLog' );
		UsernameBot\Cron::execute();
	}

	try {
		// Leave 'botToken' empty in env.php to reuse this same cron for multiple bot clones,
		// invoked as `php cron.php <token> [secret]` (see WebhookGuard::resolveBotToken()).
		$env = WebhookGuard::resolveBotToken( $env, $argv[1] ?? null );
		if ( ! empty( $argv[2] ) && $argv[2] !== ( $env[ 'botApiSecretToken' ] ?? null ) ) throw new WebhookValidationException( 'Secret token mismatch', 401 );

		$client = new Client( $env, $logger );
		$future = async( handleUpdate( ... ), $client, $env );
		$future->await();
	}
	catch ( WebhookValidationException $e ) {
		$logger->warning( 'Cron invocation rejected', [ 'reason' => $e->getMessage(), 'status' => $e->httpStatus ] );
		http_response_code( $e->httpStatus );
	}
	catch ( \Throwable $e ) {
		$logger->error( 'Unhandled exception while running cron', [ 'exception' => $e->getMessage(), 'trace' => $e->getTraceAsString() ] );
	}