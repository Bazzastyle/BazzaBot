<?php
  /**
   * Globals.
   *
   * @package Classes
   */

  if ( ! class_exists( 'Globals' ) ) {
    class Globals {
      protected static BazzaBot\Client $client;

      public static ?BazzaBot\EasyVars $tg;
      public static ?BazzaBot\Database $db;
      public static array $env;
      public static string $symbol;

      public static function init ( BazzaBot\Client $client, array $env ) {
        self::$client  = $client;
        self::$tg      = isset( $client->easy ) ? $client->easy : null;
        self::$db      = isset( $client->db ) ? $client->db : null;
        self::$env     = $env;
        self::$symbol  = implode( '|', $env[ 'commandsAlias' ] );
      }

      public static function errorLog( $e ) {
        self::$client->sendMessage(
          chat_id: self::$env[ 'logChat' ],
          text: "<b>⚠️ Si è verificata un'eccezione ⚠️</b>\n<b>✉️ Messaggio:</b> " . $e->getMessage() . "\n<b>📄 File:</b> " . $e->getFile() . "\n<b>📍 Linea:</b> " . $e->getLine() . "\n<blockquote expandable>" . $e->getTraceAsString() . "</blockquote>",
          parse_mode: 'HTML'
        );
      }
    }
  }