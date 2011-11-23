	<?php require_once "includes/session.inc.php"; ?>
	<header>
		<h1><a href="index.php">Compassion By The Book</a></h1>
		<?php if( logged_in() ): ?>
			<p>Welcome <?= $_SESSION['username'] ?></p>
		<?php endif ?>
	</header>
	<nav>
		<ul>
			<?php if( logged_in() ): ?>
				<li><a href="dashboard.php">User Dashboard</a></li>
				<li><a href="useradmin.php">User Priveleges Management</a></li>
				<li><a href="addbook.php">Add Books</a></li>
				<li><a href="adddonor.php">Add Donors</a></li>
				<li><a href="adddonation.php">Add Donation</a></li>
				<li><a href="books.php">Book Inventory</a></li>
				<li><a href="logout.php">Logout</a></li>
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			<?php endif; ?>
		</ul>
	</nav>
