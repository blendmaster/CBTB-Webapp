<?php 
  require_once "includes/db.inc.php";
  $book_added = false;
  $error = false;
  if(count($_POST) > 0 ) {
	  if(!isset($_POST['donor'])) {
		  $error = "Please enter a valid donor name";
    } elseif(!isset($_POST['email']) || !filter_var($_POST['email'])) {
		  $error = "Please enter a valid email address";
	  } elseif($dbh = open_db()) {
		  try{
			  $donor = $_POST['donor'];
			  $email = $_POST['email'];
			
			  $stmt = $dbh->prepare("insert into donors (donor, email) values (:donor, :email)");
		
			  $stmt->execute(array(":donor" => $donor,
								    ":email" => $email));
			
			  $book_added = true;
		  } catch (PDOException $e) {
			  $error = "Donor was not added: " . $e->getMessage();
		  }
	  } else {
		  $error = "Error connecting to db";
	  }
	  if($error) echo $error;
  } 
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book -- Add Donor</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
		<form action='adddonor.php' method='post'>
		  <table>
		    <tr>
		      <td><label for="donor">Donor:&nbsp;</label></td>
		      <td><input type="text" name="donor" id="donor" /></td>
		    </tr>
		    <tr>
		      <td><label for="email">Email:&nbsp;</label></td>
		      <td><input type="text" name="email" id="email" /></td>
		    </tr>
		  </table>
		  <input type="Submit" value="Add Book" />
    </form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
