<?php
	
	include 'standardPage.php';
	include 'htmlTableGenerator.php';
	
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		// Check if one of the navbar buttons was pressed or the search field was used, get the accompanying table name
		if (isset($_POST['NavButton'])) {
			$queryID = $_POST['NavButton'];
			genTableFromQuery($queryID, null);
		}

		// Get the name of the link and the related query, then generate the table
		else if (isset($_POST['queryID'])) {
			$queryID = $_POST['queryID'];
			$tableHeader = $_POST['header'];
			genTableFromQuery($queryID, $tableHeader);
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