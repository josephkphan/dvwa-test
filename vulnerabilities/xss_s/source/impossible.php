<?php
if( isset( $_POST[ 'btnSign' ] ) ) {
  $message = trim( $_POST[ 'mtxMessage' ] );
  $name    = trim( $_POST[ 'txtName' ] );

  $message = stripslashes( $message );
  $message = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"],  $message ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
  $message = htmlspecialchars( $message );

  $name = stripslashes( $name );
  $name = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"],  $name ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
  $name = htmlspecialchars( $name );

  $data = $db->prepare( 'INSERT INTO guestbook ( comment, name ) VALUES ( :message, :name );' );
  $data->bindParam( ':message', $message, PDO::PARAM_STR );
  $data->bindParam( ':name', $name, PDO::PARAM_STR );
  $data->execute();
}
?>
