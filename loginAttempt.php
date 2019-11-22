<?php

// Get the username and password that was input
$username = $_POST["login"];
$password = $_POST["password"];

// If they're invalid go nowhere
if ($username != "admin" || $password != "password") {
	echo "<script>window.location = 'unauthorized.php'</script>";
}
// Else go to the admin view
else {
	if(!session_id()) session_start();
    $_SESSION['loggedIn'] = true;
	echo "<script>window.location = 'adminView.php'</script>";
}
?>