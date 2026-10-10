<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

/**
 * Thrown when the incoming webhook request fails secret-token or IP allowlist validation.
 */
class WebhookValidationException extends BazzabotException
{
}
