<?php 
  require_once "includes/db.inc.php";
  require_once "includes/PasswordHash.php";
  require_once "includes/session.inc.php";
  $donation_created = false;
  $error = false;
  if( count($_POST) > 0 ) {
    if(!isset($_POST['donator'])) {
      $error = "Please enter a valid donator";
    } elseif(!isset($_POST['location'])) {
      $error = "Please enter a valid location";
    } elseif ( !isset($_POST['organization']) )  {
		  $error = "Please enter a valid organization";
	  } elseif ($dbh = open_db() ) {
		  try{ 
			  $stmt = $dbh->prepare("insert into donation (donator, organization, location) values (:user, :organization, :location)");
		    
		    $parts = array( ":donator" => $_POST['donator'],
								    ":email" => $_POST['email'],
								    ":organization" => $_POST['organization'])
			  $stmt->execute(array( ":donator" => $_POST['donator'],
								    ":email" => $_POST['email'],
								    ":organization" => $_POST['organization']));
			  var_dump($parts);
			  $donation_created = true;
		  } catch (PDOException $e) {
			  $error = "Donation could not be created: " . $e->getMessage();
		  }
	  } else {
		  $error = "Error connecting to db";
	  }
  }
  if($error) echo $error;
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
	  <form action='adddonation.php' method='post'>
			<fieldset>
				<table>	
					<tr>
						<td>
							<label for="donator">Donator:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="donator" id="donator" />
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
					<tr>
						<td>
							<label for="location">Location:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="location" id="location" />
						</td>
					</tr>
				</table>
				<p>
					<input type="Submit" value="Add Donation" />
				</p>
			</fieldset>
		</form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
