<?php

if( isset( $_GET[ 'Submit' ] ) ) {
  $id = $_GET[ 'id' ];
  if(is_numeric( $id )) {
    $sql = $db->prepare( 'SELECT first_name, last_name FROM users WHERE user_id = (:id);' );
    $sql->bindParam( ':id', $id, PDO::PARAM_INT );
    $sql->execute();
    if( $sql->rowCount() == 1 ) {
      $html .= '<pre>User ID exists in the database.</pre>';
    }
    else {
      header( $_SERVER[ 'SERVER_PROTOCOL' ] . ' 404 Not Found' );
      $html .= '<pre>User ID is MISSING from the database.</pre>';
    }
  }
}
?>
