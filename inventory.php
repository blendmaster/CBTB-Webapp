<?php require_once "includes/db.inc.php"; ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<script type="text/javascript" src="js/libs/inventorySort.js></script>
	<title>Compassion by the Book</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>



<div id="container">
	<?php include "includes/header.inc.php"; ?>
	<div id="main" role="main">
	
		<h2>Book Inventory</h2>
		
		<table border = "1" class="tablesorter" id="inventoryTable">
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
              $query .= " where " . $_POST['criteria'] . " like '%" . $_POST['search'] . "%'";
            }
            if(isset($_POST['search']) && ($_POST['daFilter'] != 'NULL')) $query .= " and";
            if(!isset($_POST['search']) && ($_POST['daFilter'] != 'NULL')) $query .= " where";
            if(($_POST['daFilter'] != 'NULL')) {
              $query .= " author = '" . $_POST['daFilter'] . "'";
            }
            if(isset($_POST['order'])) {
              $query .= " ORDER BY " . $_POST['order'];
            } else {
              $query .= " ORDER BY title";
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
		<form action='inventory.php' method='post'>
			<table>
        <tr>
          <td>
            <label for="order">Order By:&nbsp;</label>
          </td>
          <td>
            <select name="order" id="order">
            	<option value='title'>Title</option>
              <option value='author'>Author</option>
              <option value='ISBN'>ISBN</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="daFilter">Filter by Author:&nbsp;</label>
          </td>
          <td>
            <select name="daFilter" id="daFilter">
              <option value=NULL>---</option>
              <?php 
                if( $dbh = open_db() ) {
                  $authors = $dbh->query('select * from books');
                  while( $author = $authors->fetch() ) {
                    echo '<option value="' . $author['author'] . '">' . $author['author'] . '</option>';
                  }
                }
              ?>
            </select>
          </td>
        </tr>
				<tr>
					<td>
            <label for="search">Search:&nbsp;</label>
          </td>
          <td>
            <input type="search" name="search" id="search" placeholder='Search Term' maxlength='255' <?php if( isset($_POST['search']) ) { printf( "value='%s'", $_POST['search']); } ?>/>
          </td>
          <td>
            <select name="criteria" id="criteria">
              <option value='title'>Title</option>
              <option value='author'>Author</option>
              <option value='ISBN'>ISBN</option>
            </select>
          </td>
        </tr>
			</table>
      <input type="Submit" value="Apply" />
		</form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
