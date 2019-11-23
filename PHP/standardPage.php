<?php
include 'header.php';

function loadStandardPage($headerFactory, $contentFactory) {
	if(!session_id()) session_start();
	// If the logged in attribute doesn't exist yet, create it and set it to false
	if(!isset($_SESSION['loggedIn'])) {
		$_SESSION['loggedIn'] = false;
	}
	echo "
		<!DOCTYPE html>

		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='../CSS/stylesheet.css'>
			<script src='../js/handlers.js'></script>
		</head>
		<body>
			<!-- Header/Search/Navbar-->
			<div>";
				$headerFactory();	
	echo "	</div>

			<!-- Table/Content-->
			<div class = 'pageContent'>";
				$contentFactory();
	echo "	</div>
		</body>
		</html>";
}

function standardHeaderFactory() {
		getHeader();
}