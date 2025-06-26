<?php

namespace BazzaBot;

  /**
   * Class Database
   *
   * @package BazzaBot
   */
class Database {
  private \PDO $pdo;
  private array $connection;

  const OPTIONS = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES => false,
  ];

  public function __construct( array $connection ) {
    $this->connection = $connection;
    $this->connection();
  }

  private function connection () {
    try {
      $this->pdo = new \PDO( $this->buildDSN(), $this->connection['user'], $this->connection['password'], self::OPTIONS );
    }
    catch ( \PDOException $e ) {
      $client = new Client( env: Client::$env );
      $client->sendMessage( chat_id: Client::$env['logChat'], text: "<b>⚠️ Errore di connessione al database ⚠️</b>\n<b>✉️:</b> " . $e->getMessage() . "\n<b>📄 Codice:</b> " . (int) $e->getCode(), parse_mode: 'HTML' );
      exit;
    }
  }

  private function buildDSN(): string {
    return match( $this->connection['driver'] ) {
      'mysql'  => "mysql:host={$this->connection['host']};port={$this->connection['port']};dbname={$this->connection['name']};charset={$this->connection['charset']}",
      'pgsql'  => "pgsql:host={$this->connection['host']};port={$this->connection['port']};dbname={$this->connection['name']}",
      'sqlite' => "sqlite:{$this->connection}",
      default  => throw new \InvalidArgumentException( "Unsupported driver: {$this->connection['driver']}" )
    };
  }

  public function query ( string $query, array $params = [] ) {
    try {
      $stmt = $this->pdo->prepare( $query );

      foreach ( $params as $param ) {
        [ $key, $value, $typeStr ] = $param;
        $type = match( $typeStr ) {
          'str'   => \PDO::PARAM_STR,
          'int'   => \PDO::PARAM_INT,
          'bool'  => \PDO::PARAM_BOOL,
          default => \PDO::PARAM_STR
        };
        $stmt->bindValue( $key, $value, $type );
      }

      $stmt->execute();

      if ( preg_match( "@^insert@si", $query ) ) return [ $this->pdo->lastInsertId() ];
      return $stmt->fetchAll( \PDO::FETCH_ASSOC );

    } catch ( \PDOException $e ) {
      $client = new Client( env: Client::$env );
      $client->sendMessage(
        chat_id: Client::$env['logChat'],
        text: "<b>⚠️ Errore Query ⚠️</b>\n<b>✉️:</b> " . $e->getMessage() . "\n<b>🗄 Query:</b> <code>$query</code>\n<b>🗂 Params:</b> <code>" . json_encode( $params, JSON_PRETTY_PRINT ) . "</code>\n<blockquote expandable>" . $e->getTraceAsString() . "</blockquote>",
        parse_mode: 'HTML'
      );
      exit;
    }
  }
}
