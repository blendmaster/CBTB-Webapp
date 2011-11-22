<?php session_start(); ?>
<html>
<head>
  <script type="text/javascript">
    function redirecter(){
        window.location = "../javascriptredirect.php"
    }
  </script>
</head>
<body>
<?php
	include "includes/db.inc.php";

	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	
	if ($dbh = open_db() ) {
		try { 
			$users = $dbh->prepare('select username, password from users where username = :username');
			$users->execute(array(":username" => $myusername));
			
			if($user = $users->fetch()) {
				if( $user['password'] == sha1($mypassword) ) {
					printf( "<p>Login for user %s successful</p>", $myusername);
					$_SESSION['username'] = $_POST['username'];
					?><a href="dashboard.php" onLoad="setTimeout('redirecter()', 5000)">Login successful, being redirected...</a><?php
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
</body>
</html?
