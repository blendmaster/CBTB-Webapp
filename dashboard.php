<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Compassion by the Book -- Dashboard</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>

<div id="container">
	<header>
	</header>
	<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
	<div id="main" role="main">
		<li><a href="books.html">Book Inventory</a>
		<a href="summary.html">See Summary</a>
		<a href="addBook.html">Add New Books</a>
		<a href="summary.html">Fill orders</a>
		<h2>General Summary</h2>
		<ul>
			<li>You have collected books</li>
			<li>You have sold books</li>
			<li>You have recycled books</li>
			<li>You have raised $ for your cause(s)</li>
			<li>You have unfulfilled orders</li>
		</ul>
		
		<p> Summary for <?php echo $_SESSION['username']; ?>:
		<table border = "1">
			<tr>
			  <td>Books Collected</td><td>Sold Books</td><td>Recycled Books</td><td>$ raised</td>
			</tr>
			<tr>
			  <td>$0</td><td>$0</td><td>$0</td><td>$0</td>
			</tr>
	  </table>
		
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
