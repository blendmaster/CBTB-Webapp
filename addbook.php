TEST!
<?php 
require_once "includes/db.inc.php";
$book_added = false;
$error = false;
if( count($_POST) > 0 ) {
	if( !isset($_POST['title']) ) {
		$error = "Please enter a book title";
	} elseif( !isset($_POST['author']) || !preg_match( '/^[a-zA-Z]+\s[a-zA-z]+$/', $_POST['author'] ) ) {
		$error = "The author name must be first and last and cannot contain special characters";
	} elseif( !isset($_POST['ISBN']) || strlen( $_POST['ISBN'] ) < 10 || strlen( $_POST['ISBN'] ) > 13) {
		$error = "Please enter a valid ISBN";
	} elseif( !isset($_POST['location']) )  {
		$error = "Please enter a location";
	} elseif( !isset($_POST['organization']) )  {
		$error = "Please enter a valid organization";
	} elseif ($dbh = open_db() ) {
		try{
			$username = $_SESSION['username'];
			$organization = $_POST['organization'];
			$location = $_POST['location'];
			
			$stmt = $dbh->prepare("insert into users (username, organization, location) values (:username, :organization, :location)");
		
			$stmt->execute(array( ":username" => $_POST['username'],
								  ":location" => $_POST['location'],
								  ":organization" => $_POST['organization']));
			
			$title = $_POST['title'];
			$author = $_POST['author'];
			$ISBN = $_POST['ISBN'];
			$donation_id = $dbh->query('select id, username, from donation where username = :username');
			
			$stmt = $dbh->prepare("insert into books (ISBN, title, author, donation_id) values (:ISBN, :title, :author, :donation_ID)");
		
			$stmt->execute(array( ":ISBN" => $ISBN,
								  ":title" => $title,
								  ":author" => $author,
								  ":donation_id" => $donation_id));
			
			$book_added = true;
		} catch (PDOException $e) {
			$error = "Book was not added: " . $e->getMessage();
		}
	} else {
		$error = "Error connecting to db";
	}
	if($error) echo $error;
} ?>
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
		<form action='addbook.php' method='post'>
			<fieldset>
				<legend>Book Description</legend>
				<table>							
					<tr>
						<td>
							<label for="title">Title:&nbsp;</label>
						</td>
						<td>
							<input type="title" name="title" id="title" placeholder='Title' required maxlength='255' <?php if( isset($_POST['title']) ) { printf( "value='%s'", $_POST['title']); } ?>/>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="author">Author:&nbsp; </label>
						</td>
						<td>
							<input type="author" name="author" id="author" placeholder='Author' required maxlength='255' <?php if( isset($_POST['author']) ) { printf( "value='%s'", $_POST['author']); } ?>/>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="ISBN">ISBN:&nbsp;</label>
						</td>
						<td>
							<input type="ISBN" name="ISBN" id="ISBN" placeholder="ISBN" required maxlength='13' <?php if( isset($_POST['ISBN']) ) { printf( "value='%s'", $_POST['ISBN']); } ?> />
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="organization">Organization:&nbsp;</label>
						</td>
						<td>
							<select name="organization" id="organization">
								<?php 
									if( $dbh = open_db() ) {
										$organizations = $dbh->query('select * from organizations');
										while( $organization = $organizations->fetch() ) {
											printf( "\t\t\t\t\t\t\t\t<option value='%s' %s>%s</option>\n", 
											$organization['id'], 
											(isset( $_POST['organization'] ) && $_POST['organization'] == $organization['id'] ) ? "selected" : "",
											$organization['name']);
										}
									}
								?>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="location">Location:&nbsp; </label>
						</td>
						<td>
							<input type="location" name="location" id="location" placeholder='Location' required maxlength='255' <?php if( isset($_POST['location']) ) { printf( "value='%s'", $_POST['location']); } ?>/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="receipt">Email Receipt:&nbsp; </label>
						</td>
						<td>
							<input type="checkbox" name="receipt" id="receipt" value="yes" <?php if( isset($_POST['receipt']) ) { printf( "value='%s'", $_POST['receipt']); } ?>/>
						</td>
					</tr>
					
				</table>
				<p>
					<input type="Submit" value="Add Book" />
				</p>
			</fieldset>
		</form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
