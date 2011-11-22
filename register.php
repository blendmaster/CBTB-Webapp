<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Compassion by the Book -- Register</title>
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
	<div id="main" role="main">
		<form>
			<fieldset>
				<legend>Account Details</legend>
				<table>	
					<tr>
						<td>
							<label for="username">Username:&nbsp;</label>
						</td>
						<td>
							<input type="text" name="username" id="username" placeholder='Desired Username' required autofocus />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="password">Password:&nbsp;</label>
						</td>
						<td>
							<input type="password" name="password" id="password" required />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="email">Email:&nbsp;</label>
						</td>
						<td>
							<input type="email" name="email" id="email" placeholder='Email Address' required />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="organization">Organization:&nbsp; </label>
						</td>
						<td>
							<select name="organization" id="organization">
								<option value="organizationAlpha">Organization Alpha</option>
								<option value="organizationOmega">Organization Omega</option>
							</select>
						</td>
					</tr>

				</table>
				<p>
					<input type="Submit" value="Create Account" />
				</p>
			</fieldset>
		</form>
	</div>
	<footer>

	</footer>
</div> <!--! end of #container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script src="js/libs/webshim/polyfiller.js"></script>
<script>
//thank you based polyfill
if(!Modernizr.input.placeholder || !Modernizr.input.autofocus || !Modernizr.inputtypes.email ){
	$.webshims.polyfill('forms');
}
</script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
