<?php

declare(strict_types=1);

namespace BazzaBot\Logging;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\NullLogger;

final class LoggerFactory {
	/**
	 * Build a ready-to-use PSR-3 logger backed by a daily-rotating file.
	 *
	 * @param string $channel Logger channel name, shown in every log line.
	 * @param string $path Path to the log file (rotation appends -YYYY-MM-DD before the extension).
	 * @param string $level Minimum PSR-3 level to record (see Psr\Log\LogLevel).
	 * @param int $maxFiles How many rotated files to keep (0 = unlimited).
	 */
	public static function createFileLogger(
		string $channel,
		string $path,
		string $level = LogLevel::DEBUG,
		int $maxFiles = 14,
	) : LoggerInterface {
		return self::buildLogger( $channel, $path, $level, $maxFiles );
	}

	/**
	 * Build a logger entirely driven by the historical `$env` configuration array, so that
	 * turning logging on/off and routing errors to Telegram is a config change, not a code change:
	 *
	 *   - 'debug' (bool)                    => master on/off switch for file logging, unless
	 *                                           overridden by 'logging.enabled'.
	 *   - 'logging.enabled'  (bool)         => explicit override of the 'debug' switch above.
	 *   - 'logging.level'    (string)       => minimum PSR-3 level written to file (default: debug).
	 *   - 'logging.channels' (string[])     => which components to log ('api', 'database',
	 *                                           'webhook'); omit/null to log all of them.
	 *   - 'logging.maxFiles' (int)          => how many rotated log files to keep (default: 14,
	 *                                           or the $maxFiles argument below; 0 = unlimited).
	 *   - 'displayErrors' (bool)            => also push matching log records to 'logChat' via
	 *                                           Telegram, unless overridden by 'logging.telegram.enabled'.
	 *   - 'logging.telegram.enabled' (bool) => explicit override of the 'displayErrors' switch above.
	 *   - 'logging.telegram.level' (string) => minimum PSR-3 level sent to Telegram (default: warning).
	 *
	 * Returns a NullLogger (no-op) when logging is disabled, so callers can always pass the result
	 * straight into `new Client($env, $logger)` without checking anything themselves.
	 *
	 * @param int $maxFiles Fallback used only when 'logging.maxFiles' is not set in $env.
	 */
	public static function createFromEnv (
		array $env,
		string $logPath,
		string $channel = 'bazzabot',
		int $maxFiles = 14,
	) : LoggerInterface {
		$logging = $env[ 'logging' ] ?? [];

		$enabled = $logging[ 'enabled' ] ?? (bool) ( $env[ 'debug' ] ?? false );
		if ( ! $enabled ) return new NullLogger();

		$logger = self::buildLogger( $channel, $logPath, $logging[ 'level' ] ?? LogLevel::DEBUG, $logging[ 'maxFiles' ] ?? $maxFiles );

		$telegramConfig  = $logging[ 'telegram' ] ?? [];
		$telegramEnabled = $telegramConfig[ 'enabled' ] ?? (bool) ( $env[ 'displayErrors' ] ?? false );

		if ( $telegramEnabled && ! empty( $env[ 'botToken' ] ) && ! empty( $env[ 'logChat' ] ) ) {
			$logger->pushHandler( new TelegramLogHandler(
				botToken: $env[ 'botToken' ],
				chatId: $env[ 'logChat' ],
				endpoint: $env[ 'endpoint' ] ?? 'https://api.telegram.org/bot',
				level: $telegramConfig[ 'level' ] ?? LogLevel::WARNING,
			) );
		}

		return $logger;
	}

	private static function buildLogger ( string $channel, string $path, string $level, int $maxFiles ) : Logger {
		$logger  = new Logger( $channel );
		$handler = new RotatingFileHandler( $path, $maxFiles, $level );
		$handler->setFormatter( new LineFormatter( null, null, true, true ) );
		$logger->pushHandler( $handler );

		return $logger;
	}
}
