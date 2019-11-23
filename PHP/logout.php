<?php
	// Logout and return to the home page
	if(!session_id()) session_start();
	$_SESSION['loggedIn'] = false;
	echo "<script>window.location = 'index.php'</script>";
?>