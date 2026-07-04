<?php

declare(strict_types=1);

namespace BazzaBot\Webhook;

use BazzaBot\Exceptions\WebhookValidationException;

final class WebhookGuard {
	private const TELEGRAM_IP_RANGES = [
		[ 'lower' => '149.154.160.0', 'upper' => '149.154.175.255' ],
		[ 'lower' => '91.108.4.0', 'upper' => '91.108.7.255' ],
	];

	/**
	 * Resolve the bot token to use for this request, enabling a single codebase/entry point to
	 * serve multiple bot clones ("multibot"): leave `botToken` empty in the configuration and
	 * supply the actual token per-request (e.g. via `?api=` on a webhook URL, or as a CLI argument
	 * for cron/getUpdates), one clone per distinct token/URL.
	 *
	 * If `botToken` is already configured, $suppliedToken is ignored entirely — a statically
	 * configured token can never be overridden by an incoming request, so a single-bot deployment
	 * is not affected by, or vulnerable to, this mechanism.
	 *
	 * @throws WebhookValidationException (406) if no botToken is configured and none was supplied.
	 */
	public static function resolveBotToken ( array $env, ?string $suppliedToken ) : array {
		if ( ! empty( $env[ 'botToken' ] ) ) return $env;

		if ( empty( $suppliedToken ) ) throw new WebhookValidationException( 'No botToken configured and no token supplied for multibot mode', 406 );

		$env[ 'botToken' ] = $suppliedToken;

		return $env;
	}

	/**
	 * @throws WebhookValidationException if the request does not look like it came from Telegram,
	 *                                     or if the secret token does not match.
	 */
	public static function assertValidRequest ( array $env, array $server ) : void {
		if ( empty( $env[ 'botToken' ] ) ) throw new WebhookValidationException( 'Missing botToken in configuration', 406 );

		$secret = $server[ 'HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN' ] ?? null;
		if ( ! empty( $secret ) && $secret !== ( $env[ 'botApiSecretToken' ] ?? null ) ) throw new WebhookValidationException( 'Secret token mismatch', 401 );

		$trustCloudflare = $env[ 'trustCloudflareHeader' ] ?? true;
		$remoteIp        = ( $trustCloudflare && ! empty( $server[ 'HTTP_CF_CONNECTING_IP' ] ) ) ? $server[ 'HTTP_CF_CONNECTING_IP' ] : ( $server[ 'REMOTE_ADDR' ] ?? null );

		if ( $remoteIp === null || ! self::isTelegramIp( $remoteIp ) ) throw new WebhookValidationException( "Request did not originate from a Telegram IP range: {$remoteIp}", 418 );
	}

	public static function isTelegramIp ( string $ip ) : bool {
		$ipLong = ip2long( $ip );
		if ( $ipLong === false ) return false;

		$ipDec = (float) sprintf( '%u', $ipLong );

		foreach ( self::TELEGRAM_IP_RANGES as $range ) {
			$lower = (float) sprintf( '%u', ip2long( $range[ 'lower' ] ) );
			$upper = (float) sprintf( '%u', ip2long( $range[ 'upper' ] ) );
			if ( $ipDec >= $lower && $ipDec <= $upper ) return true;
		}

		return false;
	}
}
