<?php
ob_start(); #I don't get it, PHP. just freaking let me write my headers
require_once "session.inc.php";
if( !logged_in() ) {
	header("Location: http://{$_SERVER['SERVER_NAME']}/team13/login.php?acesserror=true"); 
}
?>
