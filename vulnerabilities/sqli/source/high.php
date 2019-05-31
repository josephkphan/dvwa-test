<?php
if( isset( $_GET[ 'Submit' ] ) ) {
  $id = $_GET[ 'id' ];
  if(is_numeric( $id )) {
    $sql = $db->prepare( 'SELECT first_name, last_name FROM users WHERE user_id = (:id);' );
    $sql->bindParam( ':id', $id, PDO::PARAM_INT );
    $sql->execute();
    $row = $sql->fetch();
    if( $sql->rowCount() == 1 ) {
      $first = $row[ 'first_name' ];
      $last  = $row[ 'last_name' ];
      $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
    }
  }
}
?>
