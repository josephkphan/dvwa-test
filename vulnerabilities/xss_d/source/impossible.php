<?php
if (isset($_GET[ 'default' ])) {
  $default = $_GET['default'];
  if($default != strip_tags($default)) {
         header ("location: ?default=English");
      exit;
  }
}
?>
