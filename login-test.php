<?php
	include "includes/db.inc.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if ($dbh = open_db() ) {
		try { 
			$users = $dbh->prepare('SELECT (username, password) FROM users WHERE username = :username');
			$users->execute(array(":username" => $username));
			
			if($user = $sth->fetch()) {
				if( $user['password'] == sha1($password) ) {
					printf( "<p>Login for user %s successful</p>", $username);
					session_register("username");
					session_register("password");
					#header("location:login.php");
				} else {
					printf( "<p>Incorrect password for user %s </p>", $username );
				}
			} else {
				printf( "<p>user %s doesn't exist</p>", $username);
			}
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}	
	} else {
		echo "<p>Error connecting to db</p>";
	}
?>
