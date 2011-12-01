<?php 
require_once "includes/db.inc.php";
$dbh = open_db()
$ID = $_SESSION['id']
$UserData = $dbh->query("SELECT * FROM users WHERE id = :ID");

?>



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
		<p>Viewing: <?php echo $UserName ?> </p>
				<table border = "1">
		<tr>
		<td>User</td><td>Organization</td><td>Email</td>
		</tr>
		<tr>
		<td>dfg</td><td>Bob</td><td>Dictionary</td>
		</tr>

		</table>
		
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>