<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book -- Book Inventory</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
		<p> Welcome back <?php echo $_SESSION['username']; ?></p>
		<h2>General Summary for <?php echo $_SESSION['username']; ?></h2>
		<ul>
			<li>You have collected books</li>
			<li>You have sold books</li>
			<li>You have recycled books</li>
			<li>You have raised $ for your cause(s)</li>
			<li>You have unfulfilled orders</li>
		</ul>
		<h2>Alternative Listing for <?php echo $_SESSION['username']; ?></h2>
		<table border = "1">
			<tr>
			  <td>User</td><td>Books Collected</td><td>Sold Books</td><td>Recycled Books</td><td>$ raised</td>
			</tr>
			<tr>
			  <td><?php echo $_SESSION['username']; ?></td><td>$0</td><td>$0</td><td>$0</td><td>$0</td>
			</tr>
	  </table>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container --> 
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
