<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

/**
 * Wraps \PDOException. Never include bound parameter values in the message
 * to avoid leaking secrets/PII into logs.
 */
class DatabaseException extends BazzabotException
{
    public static function fromPdoException(\PDOException $e, string $sql): self
    {
        return new self(
            sprintf('Database query failed (%s): %s', $sql, $e->getMessage()),
            (int) $e->getCode(),
            $e,
        );
    }
}
