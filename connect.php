<?php
function openConnection() {
	// The default server parameters
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "eveDB";

	// Create a connection object
	$connection = new mysqli($servername, $username, $password, $dbname);

	// Handle connection error
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	return $connection;
}
?>