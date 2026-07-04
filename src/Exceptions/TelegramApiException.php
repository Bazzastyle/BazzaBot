<?php

declare(strict_types=1);

namespace BazzaBot\Exceptions;

use stdClass;

final class TelegramApiException extends BazzaBotException {
	public function __construct(
		string $message,
		public readonly string $method,
		public readonly ?int $errorCode = null,
		public readonly ?stdClass $response = null,
		public readonly bool $isRetryable = false,
		int $code = 0,
		?\Throwable $previous = null,
	) {
		parent::__construct( $message, $code, $previous );
	}
}
