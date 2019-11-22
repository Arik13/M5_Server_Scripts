<?php
include 'header.php';

function loadStandardPage($headerFactory, $contentFactory) {
	echo "
		<!DOCTYPE html>

		<html>
		<head>	
			<link rel='stylesheet' type='text/css' href='stylesheet.css'>
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