<?php

declare(strict_types=1);

namespace BazzaBot\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

/**
 * Best-effort Monolog handler that forwards log records to a Telegram chat.
 *
 * Deliberately does NOT go through BazzaBot\Client: that would make Client depend on a logger
 * that depends back on Client. Instead it makes its own minimal, synchronous, blocking HTTP call
 * and NEVER throws — a broken/unreachable Telegram API must never crash the application just
 * because a log line failed to be delivered.
 */
final class TelegramLogHandler extends AbstractProcessingHandler {
	public function __construct(
		private readonly string $botToken,
		private readonly int|string $chatId,
		private readonly string $endpoint = 'https://api.telegram.org/bot',
		int|string|Level $level = Level::Warning,
	) {
		parent::__construct( $level, bubble: true );
	}

	protected function write ( LogRecord $record ) : void {
		$text = '<b>' . htmlspecialchars( $record->level->getName() ) . ' [' . htmlspecialchars( $record->channel ) . ']</b>: ' . htmlspecialchars( $record->message );

		if ( $record->context !== [] ) {
			$context = json_encode( $record->context, JSON_PRETTY_PRINT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_SLASHES );
			$text .= "\n<pre>" . htmlspecialchars( (string) $context ) . '</pre>';
		}

		$this->sendBestEffort( mb_substr( $text, 0, 4090 ) );
	}

	private function sendBestEffort ( string $text ) : void {
		try {
			$ch = curl_init( $this->endpoint . $this->botToken . '/sendMessage' );
			curl_setopt_array( $ch, [
				CURLOPT_POST           => true,
				CURLOPT_POSTFIELDS     => http_build_query( [ 'chat_id' => $this->chatId, 'text' => $text, 'parse_mode' => 'HTML' ] ),
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT        => 5,
				CURLOPT_CONNECTTIMEOUT => 3,
			] );
			curl_exec( $ch );
			curl_close( $ch );
		}
		catch ( \Throwable ) {
			// A failed log delivery must never propagate and break the caller.
		}
	}
}
