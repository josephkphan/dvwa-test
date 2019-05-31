<?php
header ("X-XSS-Protection: 0");
if(isset($_GET[ 'name' ])) {
   $html .= '<pre>Hello ' . htmlspecialchars( $_GET[ 'name' ] ) . '</pre>';
}
?>
