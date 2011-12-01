<?php
	ob_start(); #output buffer for redirect
	require_once "includes/db.inc.php";
	require_once "includes/PasswordHash.php";
	require_once "includes/session.inc.php";
	
	$error = false;
	
	if( count($_POST) > 0 and 
	  $username = $_POST['username'] and
		$password = $_POST['password'] ) {

		if ($dbh = open_db() ) {
			try { 
				$users = $dbh->prepare('select id, username, password from users where username = :username');
				$users->execute(array(":username" => $username));
				
				if($user = $users->fetch()) {
					if( password_check($password, $user['password']) ) {
						log_in($user);
						header("Location: http://{$_SERVER['SERVER_NAME']}/team13/dashboard.php"); 
						exit();
					} else {
						$error = "Incorrect password for user \"$username\"";
					}
				} else {
					$error = "user \"$username\" doesn't exist.";
				}
			} catch (PDOException $e) {
				$error = 'Connection failed: ' . $e->getMessage();
			}	
		} else {
			$error = "Error connecting to db";
		}
	}
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book -- Add Donation</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
		<form>
      <label for="cause">Cause</label><input type="text" name="cause" id="cause" />
      <label for="location">Location</label><input type="text" name="location" id="location" />
    </form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
