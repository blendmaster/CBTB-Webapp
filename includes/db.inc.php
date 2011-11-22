<?php

function open_db() {
	$host = "localhost";
	$user = "team13";
	$pass = "crowberry";
	$dbname = "team13_cbtb";
	
	try {  
		# MySQL with PDO_MYSQL  
		$dbh =  new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbh;
	}  
		catch(PDOException $e) {  
		echo $e->getMessage();  
		return false;
	}  
}
?>