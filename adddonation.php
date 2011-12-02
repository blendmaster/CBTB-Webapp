<?php 
  require_once "includes/db.inc.php";
  $donation_added = false;
  $error = false;
  if(count($_POST) > 0) {
	  if(!isset($_POST['donator'])) {
		  $error = "Please enter a donator";
	  } elseif(!isset($_POST['organization'])) {
		  $error = "Please enter a valid organization";
    } elseif(!issset($_POST['location'])) {
      $error = "Pleae enter a valid location";
	  } elseif($dbh = open_db()) {
		  try{
			  $donator = $_POST['donator'];
			  $organization = $_POST['organization'];
			  $location = $_POST['location'];
			
			  $stmt = $dbh->prepare("insert into donation (donator, organization, location) values (:donator, :organization, :location)");
		
			  $stmt->execute(array( ":donator" => $donator,
								    ":organization" => $organization,
								    ":location" => $location));
			
			  $donation_added = true;
		  } catch (PDOException $e) {
			  $error = "Donation was not added: " . $e->getMessage();
		  }
	  } else {
		  $error = "Error connecting to db";
	  }
	  if($error) 	echo $error;
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
