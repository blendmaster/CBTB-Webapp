<?php
ob_start(); #header hates me so
require_once "includes/session.inc.php";
log_out();
header("Location: http://{$_SERVER['SERVER_NAME']}/team13/index.php"); 
?>

