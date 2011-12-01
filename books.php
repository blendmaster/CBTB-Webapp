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
		<table border = "1">
		<tr>
		<td>User</td><td>Doner</td><td>Book Title</td><td>ISBN</td><td>Author</td><td>Value</td><td>Notes</td><td>Borrow</td>
		</tr>
		<tr>
		<td>Bob</td><td>Bob</td><td>Dictionary</td><td>1234</td><td>Webster</td><td>$25</td><td>2005 ed.</td><td><input type="checkbox" value="1234"/> </td>
		</tr>
		<tr>
		<td>~~</td><td>Jeff</td><td>Robin Hood</td><td>2341</td><td>Paul Creswick</td><td>$20</td><td>Great read</td><td><input type="checkbox" value="2341"/> </td>
		</tr>
		<tr>
		<td>Sarah</td><td>Sarah</td><td>Tale of Two Cities</td><td>3412</td><td>Charles Dickons</td><td>$25</td><td>~~</td><td><input type="checkbox" value="3412"/> </td>
		</tr>
		</table>
		<input type="submit" value="Borrow" /></br>
		
		<p> Please select which book you would like to borrow and click borrow, and return within seven(7) days</p>
		
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container --> 
<?php include "includes/scripts.inc.php" ?>
</body>
</html>


require_once "includes/db.inc.php";
$dbh = open_db()
$UserData = $dbh->query('select * from organizations');