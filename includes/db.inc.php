<?php

function open_db() {
	$host = "localhost";
	$user = "team13";
	$pass = "crowberry";
	$dbname = "team13_cbtb";
	
	try {  
		# MySQL with PDO_MYSQL  
		return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
	}  
		catch(PDOException $e) {  
		echo $e->getMessage();  
		return false;
	}  
}
?>