<?php
	include 'standardPage.php';
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		echo "
			<p>Unauthorized access!</p>
		";
	}
?>
