<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

/**
 * Thrown for missing/malformed .env values or unavailable PDO drivers.
 * Always carries a human-actionable message (e.g. which php.ini extension to enable).
 */
class ConfigException extends BazzabotException
{
}
