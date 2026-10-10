<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

/**
 * Thrown when an incoming update payload cannot be decoded or is missing required fields.
 */
class InvalidUpdateException extends BazzabotException
{
}
