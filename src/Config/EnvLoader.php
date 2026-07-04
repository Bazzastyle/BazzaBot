<?php

declare(strict_types=1);

namespace BazzaBot\Config;

final class EnvLoader {
	private const DEFAULT_KEY_MAP = [
		'botToken'          => 'BAZZABOT_TOKEN',
		'botApiSecretToken' => 'BAZZABOT_SECRET_TOKEN',
		'database.driver'   => 'BAZZABOT_DB_DRIVER',
		'database.host'     => 'BAZZABOT_DB_HOST',
		'database.port'     => 'BAZZABOT_DB_PORT',
		'database.name'     => 'BAZZABOT_DB_NAME',
		'database.user'     => 'BAZZABOT_DB_USER',
		'database.password' => 'BAZZABOT_DB_PASSWORD',
	];

	/**
	 * Merge an explicit $env array (the historical format) with values coming from real
	 * environment variables / a .env file. Environment values, when present, take
	 * precedence over the array; the array remains fully valid on its own when no
	 * environment variable is set and/or $envFilePath is not provided.
	 *
	 * @param array $env Explicit configuration array (historical format), used as-is if nothing else is found.
	 * @param string|null $envFilePath Path to a directory/file containing a .env to load (opt-in, no-op if null).
	 * @param array<string,string> $envKeyMap Map of dotted $env key => environment variable name.
	 */
	public static function merge(
		array $env,
		?string $envFilePath = null,
		array $envKeyMap = self::DEFAULT_KEY_MAP,
	) : array {
		if ( $envFilePath !== null ) self::loadDotEnvIfAvailable( $envFilePath );

		foreach ( $envKeyMap as $envArrayKey => $envVarName ) {
			$value = getenv( $envVarName );
			if ( $value !== false && $value !== '' ) self::setNested( $env, $envArrayKey, $value );
		}

		return $env;
	}

	private static function loadDotEnvIfAvailable ( string $path ) : void {
		if ( ! class_exists( \Dotenv\Dotenv::class ) ) return;

		$dir = is_dir( $path ) ? $path : dirname( $path );
		if ( ! is_readable( $dir ) ) return;

		\Dotenv\Dotenv::createImmutable( $dir )->safeLoad();
	}

	private static function setNested ( array &$env, string $dottedKey, string $value ) : void {
		$parts = explode( '.', $dottedKey );
		$ref   = &$env;

		foreach ( $parts as $i => $part ) {
			if ( $i === count( $parts ) - 1 ) {
				$ref[ $part ] = $value;
				break;
			}
			$ref[ $part ] ??= [];
			$ref = &$ref[ $part ];
		}
	}
}
