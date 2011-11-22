<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book -- Register</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
		<?php 
		include "includes/db.inc.php";
		include "includes/PasswordHash.php";
		$user_created = false;
		$error = false;
		if( count($_POST) > 0 ) {
			if( !isset($_POST['username']) || !preg_match( '/^\w+$/', $_POST['username'] ) ) {
				$error = "Your username cannot contain spaces or special characters";
			} elseif( !isset($_POST['password']) || strlen( $_POST['password'] ) < 6 || strlen( $_POST['password'] ) > 72) {
				$error = "Please create a password with a length between 6 and 72 characters.";
			} elseif( !isset($_POST['email']) || !filter_var( $_POST['email'] ) ) {
				$error = "Please enter a valid email address";
			} elseif ( !isset($_POST['organization']) )  {
				$error = "Please enter a valid organization";
			} elseif ($dbh = open_db() ) {
				try{ 
					$stmt = $dbh->prepare("insert into users (username, password, email, organization) values (:username, :password, :email, :organization)");
				
					$stmt->execute(array( ":username" => $_POST['username'],
										  ":password" => password_hash($_POST['password']),
										  ":email" => $_POST['email'],
										  ":organization" => $_POST['organization']));
					$user_created = true;
				} catch (PDOException $e) {
					$error = "User could not be created: " . $e->getMessage();
				}
			} else {
				$error = "Error connecting to db";
			}
		} ?>
		
		<?php if( $user_created ): ?>
		
		<p>User "<?= $_POST['username'] ?>" successfully created.</p>
		<p><a href="login.php?username=<?= $_POST['username'] ?>">Login with your new account</a></p>
		
		<?php else: ?>
			<?php if( $error ): ?>
			<p class='error'><?= $error?></p>
			<?php endif; ?>
		<form action='register.php' method='post'>
			<fieldset>
				<legend>Account Details</legend>
				<table>	
					<tr>
						<td>
							<label for="username">Username:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="username" id="username" placeholder='Desired Username' required autofocus maxlength='25' <?php if( isset($_POST['username']) ) { printf( "value='%s'", $_POST['username']); } ?> />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="password">Password:&nbsp;</label>
						</td>
						<td>
							<input type="password" name="password" id="password" placeholder="New Password" required <?php if( isset($_POST['password']) ) { printf( "value='%s'", $_POST['password']); } ?> />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="email">Email:&nbsp;</label>
						</td>
						<td>
							<input type="email" name="email" id="email" placeholder='Email Address' required maxlength='255' <?php if( isset($_POST['email']) ) { printf( "value='%s'", $_POST['email']); } ?>/>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="organization">Organization:&nbsp; </label>
						</td>
						<td>
							<select name="organization" id="organization">
								<?php 
									if( $dbh = open_db() ) {
										$organizations = $dbh->query('select * from organizations');
										while( $organization = $organizations->fetch() ) {
											printf( "\t\t\t\t\t\t\t\t<option value='%s' %s>%s</option>\n", 
											$organization['id'], 
											(isset( $_POST['organization'] ) && $_POST['organization'] == $organization['id'] ) ? "selected" : "",
											$organization['name']);
										}
									}
								?>
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
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
