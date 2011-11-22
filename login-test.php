<?php
	include "includes/db.inc.php";

	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	
	if ($dbh = open_db() ) {
		try { 
			$users = $dbh->prepare('SELECT (username, password) FROM users WHERE username = :username');
			$users->execute(array(":username" => $myusername));
			
			if($user = $sth->fetch()) {
				if( $user['password'] == sha1($mypassword) ) {
					printf( "<p>Login for user %s successful</p>", $myusername);
					session_register("myusername");
					session_register("mypassword");
					#header("location:login.php");
				} else {
					printf( "<p>Incorrect password for user %s </p>", $myusername );
				}
			} else {
				printf( "<p>user %s doesn't exist</p>", $myusername);
			}
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}	
	} else {
		echo "<p>Error connecting to db</p>";
	}
?>
