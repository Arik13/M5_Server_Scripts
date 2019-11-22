<?php
/*

*/
	include 'permissions.php';
		if (!validAccess()) {
			return;
		}
	include 'standardPage.php';
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		echo "
			<p>Welcome to the admin view you magnificent bastard</p>
		";
	}
?>
