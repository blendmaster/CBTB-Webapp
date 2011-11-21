<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Compassion by the Book -- Book Inventory</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>

<div id="container">
	<header>
	<p> Current Book inventory: </p>
	</header>
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
	<footer>

	</footer>
</div> <!--! end of #container --> 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
