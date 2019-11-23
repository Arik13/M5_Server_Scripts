<?php
function validAccess() {
	if(!session_id()) session_start();
	if (!$_SESSION['loggedIn']) {
		echo "<script>window.location = 'unauthorized.php'</script>";	
	}
	return $_SESSION['loggedIn'];
}
?>