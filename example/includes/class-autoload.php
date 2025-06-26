<?php
  /**
   * Autoloader.
   *
   * @package Classes
   */

  if ( ! class_exists( 'Autoloader' ) ) {
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
       * Take a class name and turn it into a file name.
       *
       * @param string $class Class name.
       *
       * @return string
       */
      private function getFileNameFromClass ( string $class ) : string {
        return 'class-' . str_replace( '_', '-', $class ) . '.php';
      }

      /**
       * Include a class file.
       *
       * @param string $path File path.
       *
       * @return bool Successful or not.
       */
      private function loadFile ( string $path ) : bool {
        if ( $path && is_readable( $path ) ) {
          include_once $path;

          return true;
        }

        return false;
      }

      /**
       * Autoload plugins' classes on demand to reduce memory consumption.
       *
       * @param string $class Class name.
       */
      public function autoload ( string $class ) : void {
        $class = strtolower( $class );

        $file = $this->getFileNameFromClass( $class );
        $path = '';

        if ( empty( $path ) || ! $this->loadFile( $path . $file ) ) $this->loadFile( $this->includePath . $file );
      }
    }
  }

  new Autoloader();
  Globals::init( $client, $env );
  $tg = $client->tg ?? Globals::$tg;
  $db = $client->db ?? Globals::$db;