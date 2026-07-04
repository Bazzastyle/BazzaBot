<?php

declare(strict_types=1);

namespace BazzaBot\Exceptions;

final class WebhookValidationException extends BazzaBotException {
	public function __construct( string $message, public readonly int $httpStatus ) {
		parent::__construct( $message );
	}
}
