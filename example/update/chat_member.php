<?php
  /**
   * @var BazzaBot\Client $client
   * @var BazzaBot\EasyVars $tg
   * @var BazzaBot\Database $db
   * @var array $env
   * @var string $symbol
   */

  namespace UsernameBot;

  if ( $tg->new_chat_member_status === "left" ) { //uscito
  }
  else if ( $tg->new_chat_member_status === 'kicked' ) { //bannato
  }
  else if ( $tg->new_chat_member_status === 'restricted' ) { //limitato
  }
  else if ( $tg->new_chat_member_status === 'member' ) {
    if ( $tg->old_chat_member_status === 'administrator' ) { //degradato
    }
    else if ( $tg->old_chat_member_status === 'restricted' ) { //slimitato
    }
    else if ( in_array( $tg->old_chat_member_status, [ 'left', 'kicked' ] ) ) { //entrato
    }
  }
  else if ( $tg->new_chat_member_status === 'administrator' ) {
    if ( $tg->old_chat_member_status === 'administrator' ) { //cambio permessi
    }
    else if ( in_array( $tg->old_chat_member_status, [ 'left', 'kicked', 'member', 'restricted' ] ) ) { //promosso
    }
  }