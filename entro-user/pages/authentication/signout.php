<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../../../entro-user/index.php");
exit();
?>
