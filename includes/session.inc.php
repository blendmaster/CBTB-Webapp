<?php 
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function log_in($user) {
		session_start();
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
	}
	
	function log_out() {
		session_start();

		// Unset all of the session variables.
		$_SESSION = array();

		// delete the session cookie.
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

		// Finally, destroy the session.
		session_destroy();
	}
?>
