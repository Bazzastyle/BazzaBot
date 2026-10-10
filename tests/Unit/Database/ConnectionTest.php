<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Database;

use Bazzastyle\BazzaBot\Database\{Connection, DriverDetector};
use Bazzastyle\BazzaBot\Exception\ConfigException;
use PHPUnit\Framework\TestCase;

final class ConnectionTest extends TestCase
{
    public function testUnavailableDriverThrowsClearConfigException(): void
    {
        if (DriverDetector::isAvailable('sqlite')) {
            self::markTestSkipped('ext-pdo_sqlite is installed here; this test targets the missing-driver path.');
        }

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessageMatches('/pdo_sqlite/');

        new Connection('sqlite', ['path' => ':memory:']);
    }

    public function testSqliteCrudAndTransactionRollbackWhenDriverAvailable(): void
    {
        if (!DriverDetector::isAvailable('sqlite')) {
            self::markTestSkipped('ext-pdo_sqlite is not installed in this environment.');
        }

        $connection = new Connection('sqlite', ['path' => ':memory:']);
        $connection->execute('CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT)');
        $connection->execute('INSERT INTO users (name) VALUES (:name)', [['name', 'Mario', 'str']]);

        $rows = $connection->query('SELECT * FROM users');
        self::assertCount(1, $rows);
        self::assertSame('Mario', $rows[0]['name']);

        try {
            $connection->transaction(function (Connection $c): void {
                $c->execute('INSERT INTO users (name) VALUES (:name)', [['name', 'Luigi', 'str']]);
                throw new \RuntimeException('force rollback');
            });
            self::fail('Expected exception was not thrown');
        } catch (\RuntimeException) {
            // expected: transaction() must re-throw after rollback
        }

        self::assertCount(1, $connection->query('SELECT * FROM users'));
    }
}
