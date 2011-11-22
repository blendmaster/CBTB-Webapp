<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Compassion by the Book -- Register</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>

<div id="container">
	<header>

	</header>
	
	<div id="main" role="main">
		<?php 
		include "includes/db.inc.php";
		$user_created = false;
		if( count($_POST) > 0 ) {
			if( !isset($_POST['username']) || !preg_match( '/^\w+$/', $_POST['username'] ) ) {
				echo "<p>Your username cannot contain spaces or special characters</p>";
			} elseif( !isset($_POST['password']) || strlen( $_POST['password'] ) < 6 ) {
				echo "<p>Please create a longer password.</p>";
			} elseif( !isset($_POST['email']) || !filter_var( $_POST['email'] ) ) {
				echo "<p>Please enter a valid email address</p>";
			} elseif ( !isset($_POST['organization']) )  {
				echo "<p>Please enter a valid organization</p>";
			} elseif ($dbh = open_db() ) {
				try{ 
					$stmt = $dbh->prepare("insert into users (username, password, email, organization) values (:username, :password, :email, :organization");
				
					$stmt->execute(array( ":username" => $_POST['username'],
										  ":password" => $_POST['password'],
										  ":email" => $_POST['email'],
										  ":organization" => $_POST['organization']));
					echo "<p>User successfully created.</p>";
					$user_created = true;
				} catch (PDOException $e) {
					echo 'Connection failed: ' . $e->getMessage();
				}
			} else {
				echo "<p>Error connecting to db</p>";
			}
		}
		if( !$user_created ):
		?>
		<form action='register.php' method='post'>
			<fieldset>
				<legend>Account Details</legend>
				<table>	
					<tr>
						<td>
							<label for="username">Username:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="username" id="username" placeholder='Desired Username' required autofocus />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="password">Password:&nbsp;</label>
						</td>
						<td>
							<input type="password" name="password" id="password" placeholder="New Password" required />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="email">Email:&nbsp;</label>
						</td>
						<td>
							<input type="email" name="email" id="email" placeholder='Email Address' required />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="organization">Organization:&nbsp; </label>
						</td>
						<td>
							<select name="organization" id="organization">
								<option value="organizationAlpha">Organization Alpha</option>
								<option value="organizationOmega">Organization Omega</option>
							</select>
						</td>
					</tr>

				</table>
				<p>
					<input type="Submit" value="Create Account" />
				</p>
			</fieldset>
		</form>
		<?php endif; ?>
	</div>
	
	<footer>

	</footer>
</div> <!--! end of #container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script src="js/libs/webshim/polyfiller.js"></script>
<script>
//thank you based polyfill
if(!Modernizr.input.placeholder || !Modernizr.input.autofocus || !Modernizr.inputtypes.email ){
	$.webshims.polyfill('forms');
}
</script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
