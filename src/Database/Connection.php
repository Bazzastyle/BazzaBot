<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Database;

use Bazzastyle\BazzaBot\Config\Config;
use Bazzastyle\BazzaBot\Exception\{ConfigException, DatabaseException};

/**
 * PDO wrapper supporting mysql/pgsql/sqlite. Unlike ad-hoc scripts, this
 * layer never calls exit()/die() or reaches out over the network on error:
 * failures always surface as DatabaseException so the caller (or a global
 * exception handler wired by the consuming bot) decides what to do.
 */
final class Connection
{
    private const OPTIONS = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ];

    private readonly \PDO $pdo;

    /** @param array<string, mixed> $params host/port/name/user/password/charset/path */
    public function __construct(string $driver, array $params)
    {
        DriverDetector::assertAvailable($driver);

        try {
            $this->pdo = new \PDO(
                $this->buildDsn($driver, $params),
                $params['user'] ?? null,
                $params['password'] ?? null,
                self::OPTIONS,
            );
        } catch (\PDOException $e) {
            throw new DatabaseException(sprintf('Unable to connect to database (%s): %s', $driver, $e->getMessage()), 0, $e);
        }
    }

    public static function fromConfig(Config $config): self
    {
        $driver = $config->getString('DB_DRIVER');
        if ($driver === null || $driver === '') {
            throw new ConfigException('DB_DRIVER is not configured');
        }

        return new self($driver, [
            'host' => $config->getString('DB_HOST'),
            'port' => $config->getInt('DB_PORT'),
            'name' => $config->getString('DB_NAME'),
            'user' => $config->getString('DB_USER'),
            'password' => $config->getString('DB_PASSWORD'),
            'charset' => $config->getString('DB_CHARSET', 'utf8mb4'),
        ]);
    }

    /**
     * @param array<int, array{0: string, 1: mixed, 2: string}> $bindings tuples [name, value, 'str'|'int'|'bool'|'null']
     * @return array<int, array<string, mixed>>
     */
    public function query(string $sql, array $bindings = []): array
    {
        return $this->prepareAndBind($sql, $bindings)->fetchAll();
    }

    /**
     * @param array<int, array{0: string, 1: mixed, 2: string}> $bindings
     */
    public function execute(string $sql, array $bindings = []): int
    {
        return $this->prepareAndBind($sql, $bindings)->rowCount();
    }

    /**
     * @param array<int, array{0: string, 1: mixed, 2: string}> $bindings
     */
    public function insertAndGetId(string $sql, array $bindings = []): string|false
    {
        $this->prepareAndBind($sql, $bindings);

        return $this->pdo->lastInsertId();
    }

    /** @param \Closure(self): mixed $callback */
    public function transaction(\Closure $callback): mixed
    {
        $this->pdo->beginTransaction();

        try {
            $result = $callback($this);
            $this->pdo->commit();

            return $result;
        } catch (\Throwable $e) {
            $this->pdo->rollBack();

            throw $e;
        }
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    }

    /** @param array<int, array{0: string, 1: mixed, 2: string}> $bindings */
    private function prepareAndBind(string $sql, array $bindings): \PDOStatement
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $this->bindValues($stmt, $bindings);
            $stmt->execute();

            return $stmt;
        } catch (\PDOException $e) {
            throw DatabaseException::fromPdoException($e, $sql);
        }
    }

    /** @param array<int, array{0: string, 1: mixed, 2: string}> $bindings */
    private function bindValues(\PDOStatement $stmt, array $bindings): void
    {
        foreach ($bindings as [$name, $value, $type]) {
            $paramType = match ($type) {
                'int' => \PDO::PARAM_INT,
                'bool' => \PDO::PARAM_BOOL,
                'null' => \PDO::PARAM_NULL,
                default => \PDO::PARAM_STR,
            };

            $placeholder = str_starts_with($name, ':') ? $name : ':' . $name;
            $stmt->bindValue($placeholder, $value, $paramType);
        }
    }

    /** @param array<string, mixed> $params */
    private function buildDsn(string $driver, array $params): string
    {
        return match ($driver) {
            'mysql' => sprintf(
                'mysql:host=%s;port=%d;dbname=%s;charset=%s',
                $params['host'] ?? '127.0.0.1',
                $params['port'] ?? 3306,
                $params['name'] ?? '',
                $params['charset'] ?? 'utf8mb4',
            ),
            'pgsql' => sprintf(
                'pgsql:host=%s;port=%d;dbname=%s',
                $params['host'] ?? '127.0.0.1',
                $params['port'] ?? 5432,
                $params['name'] ?? '',
            ),
            'sqlite' => sprintf('sqlite:%s', $params['path'] ?? $params['host'] ?? ':memory:'),
            default => throw new ConfigException(sprintf('Unsupported database driver: "%s"', $driver)),
        };
    }
}
