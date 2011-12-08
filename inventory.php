<?php require_once "includes/db.inc.php"; ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
	
		<h2>Book Inventory</h2>
		
		<table border = "1">
		    <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Donor</th>
        <td>Location</th>
		  <?php 
		    $error = false;
        if($dbh = open_db()) {
          try{
            $query = 'select title, author, ISBN, donation_id from books';
            if(isset($_POST['search'])) {
              $query .= "where title = " . $_POST['search'];
            }
            $inventory = $dbh->query($query);
            $inventory->setFetchMode(PDO::FETCH_ASSOC);
    
            while($row = $inventory->fetch()) {
              ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo $row['author'];?></td>
                  <td><?php echo $row['ISBN'];?></td>
                  <?php
                    try{
                      $query = 'select donor, location from donations where id = ' . $row['donation_id'];
                      $donation = $dbh->query($query);
                      $donation -> setFetchMode(PDO::FETCH_ASSOC);
                      $theDonation = $donation->fetch();
                    } catch (PDOException $e) {
                      $error = 'Connection failed: ' . $e->getMessage();
                    }
                    if($error) {
                      echo '<td>' . $error . '</td><td></td>';
                    } else {
                      ?>
                      <td><?php echo $theDonation['donor'];?></td>
                      <td><?php echo $theDonation['location'];?></td>
                      <?php
                    }
                  ?>
                </tr>
              <?php
            }
          } catch (PDOException $e) {
            $error = 'Connection failed: ' . $e->getMessage();
          }	
        } else {
          $error = "Error connecting to db";
        }
        if($error) echo $error;
      ?>
		</table>
		<form action='register.php' method='post'>
			<table>
				<tr>
					<td>
							<label for="search">Search:&nbsp;</label>
						</td>
						<td>
							<input type="search" name="search" id="search" placeholder='Title' required maxlength='255' <?php if( isset($_POST['search']) ) { printf( "value='%s'", $_POST['search']); } ?>/>
						</td>
				</tr>
			</table>
      <input type="Submit" value="Search" />
		</form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
