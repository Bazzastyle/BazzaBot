<?php

declare(strict_types=1);

namespace BazzaBot\Logging;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Stringable;

/**
 * Tags every record with a component name ("api", "database", "webhook", ...) and, when an
 * explicit allow-list is given, silently drops records from components the user didn't ask for.
 * Lets `env['logging']['channels']` decide *what* gets logged, independently of the minimum level.
 */
final class ChannelLogger extends AbstractLogger {
	/** @param string[]|null $enabledChannels null means every channel is enabled */
	public function __construct(
		private readonly LoggerInterface $logger,
		private readonly string $channel,
		private readonly ?array $enabledChannels = null,
	) {}

	public function log ( $level, string|Stringable $message, array $context = [] ) : void {
		if ( $this->enabledChannels !== null && ! in_array( $this->channel, $this->enabledChannels, true ) ) return;

		$this->logger->log( $level, $message, $context + [ 'channel' => $this->channel ] );
	}
}
