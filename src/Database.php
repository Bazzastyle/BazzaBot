<?php

declare(strict_types=1);

namespace BazzaBot;

use BazzaBot\Exceptions\ConfigurationException;
use BazzaBot\Exceptions\DatabaseException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class Database
 *
 * @package BazzaBot
 */
class Database {
	private \PDO $pdo;
	private array $connection;
	private LoggerInterface $logger;
	private float $slowQueryThresholdMs;

	const OPTIONS = [
		\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		\PDO::ATTR_EMULATE_PREPARES   => false,
	];

	public function __construct ( array $connection, ?LoggerInterface $logger = null, float $slowQueryThresholdMs = 200.0 ) {
		$this->connection           = $connection;
		$this->logger               = $logger ?? new NullLogger();
		$this->slowQueryThresholdMs = $slowQueryThresholdMs;
		$this->connect();
	}

	private function connect () : void {
		try {
			$this->pdo = new \PDO( $this->buildDSN(), $this->connection[ 'user' ] ?? null, $this->connection[ 'password' ] ?? null, self::OPTIONS );
		}
		catch ( \PDOException $e ) {
			$this->logger->error( 'Database connection failed', [
				'driver' => $this->connection[ 'driver' ] ?? null,
				'host'   => $this->connection[ 'host' ] ?? null,
				'name'   => $this->connection[ 'name' ] ?? null,
				'code'   => $e->getCode(),
			] );

			throw new DatabaseException( 'Unable to connect to database: ' . $e->getMessage(), code: (int) $e->getCode(), previous: $e );
		}
	}

	private function buildDSN () : string {
		return match ( $this->connection[ 'driver' ] ?? null ) {
			'mysql'  => "mysql:host={$this->connection['host']};port={$this->connection['port']};dbname={$this->connection['name']};charset={$this->connection['charset']}",
			'pgsql'  => "pgsql:host={$this->connection['host']};port={$this->connection['port']};dbname={$this->connection['name']}",
			'sqlite' => "sqlite:{$this->connection['host']}",
			default  => throw new ConfigurationException( "Unsupported or missing database driver: " . ( $this->connection[ 'driver' ] ?? '(none)' ) ),
		};
	}

	/**
	 * @param string $query SQL query with named/positional placeholders.
	 * @param array $params List of [ key, value, type ] triples, type in { 'str', 'int', 'bool' }.
	 * @param bool $returnLastInsertId When true, returns the last insert id (as string) instead of the result set.
	 *
	 * @return array|string Result rows (FETCH_ASSOC), or the last insert id when $returnLastInsertId is true.
	 */
	public function query ( string $query, array $params = [], bool $returnLastInsertId = false ) : array|string {
		$start = hrtime( true );

		try {
			$stmt = $this->pdo->prepare( $query );

			foreach ( $params as $param ) {
				[ $key, $value, $typeStr ] = $param;
				$type = match ( $typeStr ) {
					'str'   => \PDO::PARAM_STR,
					'int'   => \PDO::PARAM_INT,
					'bool'  => \PDO::PARAM_BOOL,
					default => \PDO::PARAM_STR,
				};
				$stmt->bindValue( $key, $value, $type );
			}

			$stmt->execute();

			$durationMs = ( hrtime( true ) - $start ) / 1e6;
			$context    = [ 'query' => $query, 'duration_ms' => $durationMs ];

			if ( $durationMs > $this->slowQueryThresholdMs ) $this->logger->warning( 'Slow database query', $context + [ 'params' => $params ] );
			else $this->logger->debug( 'Database query executed', $context );

			if ( $returnLastInsertId ) return (string) $this->pdo->lastInsertId();

			return $stmt->fetchAll( \PDO::FETCH_ASSOC );
		}
		catch ( \PDOException $e ) {
			$this->logger->error( 'Database query failed', [
				'query'    => $query,
				'sqlstate' => $e->getCode(),
				'message'  => $e->getMessage(),
			] );
			$this->logger->debug( 'Database query failure details', [ 'query' => $query, 'params' => $params, 'trace' => $e->getTraceAsString() ] );

			throw new DatabaseException( 'Query failed: ' . $e->getMessage(), query: $query, params: $params, code: (int) $e->getCode(), previous: $e );
		}
	}

	public function beginTransaction () : bool {
		try {
			$this->logger->debug( 'Database transaction started' );

			return $this->pdo->beginTransaction();
		}
		catch ( \PDOException $e ) {
			throw new DatabaseException( 'Unable to start transaction: ' . $e->getMessage(), code: (int) $e->getCode(), previous: $e );
		}
	}

	public function commit () : bool {
		try {
			$this->logger->debug( 'Database transaction committed' );

			return $this->pdo->commit();
		}
		catch ( \PDOException $e ) {
			throw new DatabaseException( 'Unable to commit transaction: ' . $e->getMessage(), code: (int) $e->getCode(), previous: $e );
		}
	}

	public function rollBack () : bool {
		try {
			$this->logger->debug( 'Database transaction rolled back' );

			return $this->pdo->rollBack();
		}
		catch ( \PDOException $e ) {
			throw new DatabaseException( 'Unable to rollback transaction: ' . $e->getMessage(), code: (int) $e->getCode(), previous: $e );
		}
	}

	public function inTransaction () : bool {
		return $this->pdo->inTransaction();
	}

	public function lastInsertId ( ?string $name = null ) : string {
		return (string) $this->pdo->lastInsertId( $name );
	}
}
