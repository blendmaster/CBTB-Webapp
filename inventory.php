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
		  <th>
		    <td>Title</td><td>Author</td><td>ISBN</td>
		  </th>
		  <?php 
		    $error = false;
        if($dbh = open_db()) {
          try{
            $inventory = $dbh->query('select ISBN, title, author from books');
            $inventory->setFetchMode(PDO::FETCH_ASSOC);
    
            while($row = $inventory->fetch()) {
              ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo $row['author'];?></td>
                  <td><?php echo $row['ISBN'];?></td>
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
		
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
