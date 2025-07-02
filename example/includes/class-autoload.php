<?php
  /**
   * Autoloader.
   *
   * @package UsernameBot
   */

  namespace UsernameBot;

  if ( ! class_exists( __NAMESPACE__ . '\\Autoloader' ) ) {
    /**
     * Autoloader class.
     */
    class Autoloader {

      /**
       * Path to the includes directory.
       *
       * @var string
       */
      private string $includePath = '';

      /**
       * The Constructor.
       */
      public function __construct () {
        if ( function_exists( '__autoload' ) ) spl_autoload_register( '__autoload' );

        spl_autoload_register( [ $this, 'autoload', ] );
        $this->includePath = __DIR__ . '/';
      }

      /**
       * Autoload plugins' classes on demand to reduce memory consumption.
       *
       * @param string $class Class name.
       */
      public function autoload( string $class ): void {
        if ( str_starts_with( $class, __NAMESPACE__ . '\\' ) ) {
          $filePath = $this->includePath . 'class-' . strtolower( str_replace( '\\', '-', substr( $class, strlen( __NAMESPACE__ ) + 1 ) ) ) . '.php';

          if ( is_readable( $filePath ) ) include_once $filePath;
          else error_log( "❌ Autoloader: classe [$class] non trovata. Atteso: $filePath" );
        }
      }
    }
  }

  new Autoloader();
  Globals::init( $client, $env );
  $tg = $client->tg ?? Globals::$tg;
  $db = $client->db ?? Globals::$db;