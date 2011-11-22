<?php
  include "includes/db.inc.php";

  $myusername=$_POST['username'];
  $mypassword=$_POST['password'];

  $myusername = stripslashes($myusername);
  $mypassword = sha1(stripslashes($mypassword));
  echo $myusername;
  echo $mypassword;

    if ($dbh = open_db() ) {
			try { 
			  $query = 'SELECT (username, password) FROM users WHERE username = ' . $myusername . ' and password = ' . $mypassword;
				$sth = $dbh->prepare($query);
			
				$sth->setFetchMode(PDO::FETCH_OBJ);
				
				if($row = $sth->fetch()) {
  				session_register("myusername");
          session_register("mypassword");
          header("location:login.php");
  		  } else {
  		    echo "Wrong username or password";
  		  }
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}	
		} else {
			echo "<p>Error connecting to db</p>";
		}
?>
