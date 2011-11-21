<?php

function open_db() {
	$server = "localhost";
	$username = "team13";
	$password = "crowberry";
	$db = "team13_cbtb";

	if( mysql_connect($server, $username, $password) ) {
		mysql_select_db($db);
	} else {
		return false;
	}
}
?>