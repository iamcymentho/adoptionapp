<?php  
	session_start();
	if (!isset($_SESSION['fosterparent_id'])) {

		# redirect the unauthenticated user to login/index
		 header("Location: signin.php");
	}
?>