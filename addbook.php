<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book -- Add Book</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
		<form>
      <label for="cause">Cause</label><input type="text" name="cause" id="cause" />
      <label for="ISBN">ISBN</label><input type="text" name="ISBN" id="ISBN" />
      <label for="title">Title</label><input type="text" name="title" id="title" />
      <label for="author">Author</label><input type="text" name="author" id="author" />
      <label for="donor">Donor</label><input type="text" name="donor" id="donor" />
      <label for="email">Email</label><input type="text" name="email" id="email" />
      <label for="emailReceipt">Email Receipt</label><input type="checkbox" name="emailReceipt" id="emailReceipt"/>
      <label for="value">Value</label><input type="text" name="value" id="value" />
      <label for="status">Status</label><input type="text" name="status" id="status" />
      <label for="forSale">For Sale?</label><input type="text" name="forSale" id="forSale" />
      <label for="location">Location</label><input type="text" name="location" id="location" />
    </form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
