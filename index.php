<?php
session_start();
$_SESSION=array();
session_destroy();

header('Location: /CeCorrente/src/index.php');
exit;
?>

