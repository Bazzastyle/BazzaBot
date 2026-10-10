<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Database;

use Bazzastyle\BazzaBot\Exception\ConfigException;

/**
 * Verifies a PDO driver is actually available before attempting to connect,
 * instead of letting PDO fail with a cryptic "could not find driver" error.
 */
final class DriverDetector
{
    public static function isAvailable(string $driver): bool
    {
        return in_array($driver, \PDO::getAvailableDrivers(), true);
    }

    public static function assertAvailable(string $driver): void
    {
        if (!self::isAvailable($driver)) {
            throw new ConfigException(sprintf(
                'PDO driver "%s" is not available (missing PHP extension "ext-pdo_%s"). '
                . 'Available drivers on this system: %s',
                $driver,
                $driver,
                implode(', ', \PDO::getAvailableDrivers()) ?: '(none)',
            ));
        }
    }
}
