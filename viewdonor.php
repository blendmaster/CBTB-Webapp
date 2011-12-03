<?php require "includes/loggedin.inc.php" ?>
<?php 
require_once "includes/db.inc.php";
$dbh = open_db();
$ID = 6;//$_SESSION['id'];
$UserData = $dbh->query('SELECT * FROM users');
//$UserName = $UserData['username']; 
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
	
		<h2> Viewing current doners </h2>
		
		<table border = "1">
		<tr>
		<td>User</td><td>Organization</td><td>Email</td>
		</tr>
		<?php while ($User = $UserData-> fetch()){ 
		
		switch ($User['organization']){
			case 1:
				$Org = "NERV";
				break;
			case 2:
				$Org = "SERN";
				break;
			case 3:
				$Org = "SOS Brigade";
				break;
			case 4:
				$Org = "Academy City - Judgement";
				break;
			case 5:
				$Org = "Light Music Club";
				break;
		}
		
		echo '<tr><td>',
		$User['username'], '</td><td>', $Org, '</td><td>', $User['email'], '</td>';
		
		} 
		echo '</table>';
		?>
		
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
