<?php
  /**
   * Cron.
   *
   * @package Classes
   */

  if ( ! class_exists( 'Cron' ) ) {
    class Cron extends Globals {
      public static function add ( int $chat_id, int $msg_id, int $minutes, string $type ) : array {
        return self::$db->query(
          'INSERT INTO `cron`(`chat_id`, `msg_id`, `data`, `type`) VALUES (:chat_id, :msg_id, :data, :type)',
          [ [ 'chat_id', $chat_id, 'int' ], [ 'msg_id', $msg_id, 'int' ], [ 'data', date( 'd/m/Y H:i', strtotime( '+' . $minutes . ' minutes' ) ), 'str' ], [ 'type', $type, 'str' ] ]
        );
      }

      public static function del ( int $id ) : void {
        self::$db->query( 'DELETE FROM `cron` WHERE `id` = :id', [ [ 'id', $id, 'int' ] ] );
      }

      public static function execute () : void {}
    }
  }