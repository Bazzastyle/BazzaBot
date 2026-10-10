<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

/**
 * Base exception for the whole framework. Catch this to handle any
 * framework-originated error without also swallowing unrelated PHP errors.
 */
class BazzabotException extends \RuntimeException
{
}
