<?php require "includes/loggedin.inc.php" ?>
<?php 
  require_once "includes/db.inc.php";
  $donation_added = false;
  $error = false;
  if(count($_POST) > 0) {
	  if(!isset($_POST['donor'])) {
		  $error = "Please enter a donor";
	  } elseif(!isset($_POST['organization'])) {
		  $error = "Please enter a valid organization";
    } elseif(!isset($_POST['location'])) {
      $error = "Pleae enter a valid location";
    } elseif(!isset($_POST['title'])) {
      $error = "Pleae enter a valid title";
    } elseif(!isset($_POST['author'])) {
      $error = "Pleae enter a valid author";
    } elseif(!isset($_POST['ISBN'])) {
      $error = "Pleae enter a valid ISBN";
    } elseif(!isset($_POST['price'])) {
      $error = "Pleae enter a valid price";
	  } elseif($dbh = open_db()) {
		  try {
			  $donor = $_POST['donor'];
			  $organization = $_POST['organization'];
			  $location = $_POST['location'];
			
			  $donation = $dbh->prepare("insert into donations (donor, organization, location) values (:donor, :organization, :location)");
		
			  $donation->execute(array(":donor" => $donor,
								    ":organization" => $organization,
								    ":location" => $location));
                    
        $donation_id = $dbh->lastInsertId();
			  $donation_added = true;
		  } catch (PDOException $e) {
			  $error = "Donation was not added: " . $e->getMessage();
		  }
      try {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $ISBN = $_POST['ISBN'];
        $price = $_POST['price'];
        
        $book = $dbh->prepare("insert into books (title, author, ISBN, price, donation_id) values (:title, :author, :ISBN, :price, :donation_id)");
        $book->execute(array(":title"=>$title, ":author"=>$author, ":ISBN"=>$ISBN, ":price"=>$price, ":donation_id" => $donation_id));
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
							<label for="donor">Donor:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="donor" id="donor" />
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
            <td>
              <label for="title">Title:&nbsp;</label>
            </td>
            <td>
              <input type="text" name="title" id="title" />
            </td>
          </tr>
          <tr>
            <td>
              <label for="author">Author:&nbsp;</label>
            </td>
            <td>
              <input type="text" name="author" id="author" />
            </td>
          </tr>
          <tr>
            <td>
              <label for="ISBN">ISBN:&nbsp;</label>
            </td>
            <td>
              <input type="text" name="ISBN" id="ISBN" />
            </td>
          <tr>
            <td>
              <label for="price">Price:&nbsp;</label>
            </td>
            <td>
              <input type="text" name="price" id="price" />
            </td>
					</tr>
				</table>
			  <input type="Submit" value="Add Donation" />
			</fieldset>
		</form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
