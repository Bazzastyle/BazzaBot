<?php

declare(strict_types=1);

namespace BazzaBot\Exceptions;

final class DatabaseException extends BazzaBotException {
	public function __construct(
		string $message,
		public readonly ?string $query = null,
		public readonly array $params = [],
		int $code = 0,
		?\Throwable $previous = null,
	) {
		parent::__construct( $message, $code, $previous );
	}
}
