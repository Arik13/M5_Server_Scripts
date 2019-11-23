<?php
	include 'TableModel.php';
	include 'standardPage.php';
	include 'QueryMap.php';

	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		// Generate a session ID if one doesn't exist
		if(!session_id()) session_start();

		// If the logged in attribute doesn't exist yet, create it and set it to false
		if(!isset($_SESSION['loggedIn'])) {
		    $_SESSION['loggedIn'] = false;
		}
		$tableName = null;

		// Check if one of the navbar buttons was pressed or the search field was used, get the accompanying table name
		if (isset($_POST['NavButton'])) {
			$queryID = $_POST['NavButton'];
			genTableFromQuery($queryID, null);
			//$tableName = str_replace(' ', '', $_POST['NavButton']);
			//$columnFormats = getColumnFormats($tableName);
			//getTable($queryString, $tableName, $columnFormats);
		}

		// Get the name of the link and the related query, then generate the table
		else if (isset($_POST['queryID'])) {
			$queryID = $_POST['queryID'];
			$tableHeader = $_POST['header'];
			genTableFromQuery($queryID, $tableHeader);
			//$queryString = getQuery($_POST['queryID'], $tableHeader);
			//$columnFormats = getColumnFormats($_POST['queryID']);
			//getTable($queryString, "$tableHeader", $columnFormats);
		}

		// Handle search
		else if (isset($_POST['searchField'])) {
			echo $_POST['searchField'];
		}

		// Give default message
		else {	
			echo '<p> Welcome to the EVE online database!</p>';
		}
	}
 
?>