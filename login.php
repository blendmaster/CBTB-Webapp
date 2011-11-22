<?php session_start(); ?>
<html>
<head>
  <script type="text/javascript">
    function redirecter(){
        window.location = "dashboard.php";
    }
  </script>
</head>
<body>
<?php
	include "includes/db.inc.php";
	include "includes/PasswordHash.php";
	
	if ($dbh = open_db() ) {
		try { 
			$users = $dbh->prepare('select username, password from users where username = :username');
			$users->execute(array(":username" => $_POST['username']));
			
			if($user = $users->fetch()) {
				if( password_check($_POST['password'], $user['password']) ) {
					printf( "<p>Login for user %s successful</p>", $_POST['username']);
					$_SESSION['username'] = $_POST['username'];
					?><a href="dashboard.php">Login successful, being redirected...</a><script type="text/javascript">setTimeout('redirecter()', 2000);</script><?php
				} else {
					printf( "<p>Incorrect password for user %s </p>", $_POST['username'] );
				}
			} else {
				printf( "<p>user %s doesn't exist</p>", $_POST['username']);
			}
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}	
	} else {
		echo "<p>Error connecting to db</p>";
	}
?>
</body>
</html>
