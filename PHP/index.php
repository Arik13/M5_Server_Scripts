<?php
	
	include 'standardPage.php';
	include 'htmlTableGenerator.php';
	include 'QueryMap.php';
	
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		/*foreach (array_keys($_POST) as $key) {
			echo "$key  : ".$_POST[$key]."<br>";
		}*/
		// Check if one of the navbar buttons was pressed or the search field was used, get the accompanying table name
		if (isset($_POST['NavButton'])) {
			$tableName = $_POST['NavButton'];
			handleTableSpecificElements($tableName);
			handleStaticQueryEvent($tableName, null);
		}
		// Get the name of the link and the related query, then generate the table
		else if (isset($_POST['queryID'])) {
			handleStaticQueryEvent($_POST['queryID'], $_POST['header']);
		}
		else if (isset($_POST['headerCheckList'])) {
			$queryString = buildQueryFromForm();
			$tableName = $_POST["tableName"];

			$queryObject = getQueryObject($tableName);
			$tableMetaData = getMetaData($tableName);
			$queryResult = qetHeadersAndDataFromDB($queryString);
			
			$tableHeader = $queryObject->getFormattedHeader();
			$tableHeaders = $queryResult[0];
			$tableData = $queryResult[1];
			$relatedQueryIDs = $tableMetaData->getRelatedQueryIDs();

			$tableModel = new TableModel($tableHeader, $tableHeaders, $tableData, null, $relatedQueryIDs);
			generateTable($tableModel);
		}

		// Handle search
		else if (isset($_POST['searchField'])) {
			echo "Not implemented yet";
			//echo $_POST['searchField'];
		}

		// Give default message
		else {	
			echo '<p> Welcome to the EVE online database!</p>';
		}
	}
	function handleStaticQueryEvent($queryID, $tableHeader) {
		$queryObject = getQueryObject($queryID);
		$queryString = $queryObject->getQuery();
		if (!$tableHeader) {
			$tableHeader = $queryObject->getFormattedHeader();
		} 
		else {
			$queryString = str_replace("conditionString",$tableHeader,$queryString);
		}
		$tableMetaData = getMetaData($queryID);
		$queryResult = qetHeadersAndDataFromDB($queryString);
		
		$tableHeaders = $queryResult[0];
		$tableData = $queryResult[1];
		$columnStyles = $tableMetaData->getColumnStyles();
		$relatedQueryIDs = $tableMetaData->getRelatedQueryIDs();

		$tableModel = new TableModel($tableHeader, $tableHeaders, $tableData, $columnStyles, $relatedQueryIDs);
		generateTableConfigForm($queryID, $tableHeaders);
		generateTable($tableModel);
	}

	function generateTableConfigForm($tableName, $tableHeaders) {
		echo "<div class='form'>";
		echo "<form name='headerSelectionForm' id='headerSelectionForm' method=post action=index.php>";
	
		// Make selection
		echo "<h4>Column Selection</h4>";
		foreach ($tableHeaders as $header) {
			$formattedHeader = camelCaseToUpperCaseSpaces($header);
			echo "<input type='checkbox' name='headerList[]' value='$header' checked>$formattedHeader<br>";
		}
		echo "<br>";
		// Make Header selection
		echo "<h4>Condition</h4>
		<select name='headerSelectionOption'>";
		echo "<option type='submit' value='none'>none</option>";
		foreach ($tableHeaders as $header) {
			$formattedHeader = camelCaseToUpperCaseSpaces($header);
			echo "<option type='submit' value='$header'>$formattedHeader</option>";
		}
		echo "</select>";

		// Make equality selection
		echo "<select name='equalitySelectionOption'>";
		echo "<option type='submit' value='='>=</option>";
		echo "<option type='submit' value='&lt'>&lt</option>";
		echo "<option type='submit' value='&gt'>&gt</option>";
		echo "<option type='submit' value='&lt='>&lt=</option>";
		echo "<option type='submit' value='&gt='>&gt=</option>";
		echo "</select>";

		// Condition entry
		echo "<input type='text' name='conditionEntry' value=''><br>";

		// Column order by selection
		echo "<h4>Sort By</h4>
		<select name='orderColumnSelectionOption'>";
		echo "<option type='submit' value='none'>none</option>";
		foreach ($tableHeaders as $header) {
			$formattedHeader = camelCaseToUpperCaseSpaces($header);
			echo "<option type='submit' value='$header'>$formattedHeader</option>";
		}
		echo "</select>";
		echo "<select name='orderTypeSelectionOption'>";
		echo "<option type='submit' value='ASC'>ascending</option>";
		echo "<option type='submit' value='DESC'>descending</option>";
		echo "</select>";
		echo "	<input type='hidden' name='tableName' value='$tableName'>
				<input type='submit' name='headerCheckList' value='Submit'>";
		echo "</form></div><br>";
	}

	function buildQueryFromForm() {
		$queryString = "SELECT ";
		foreach($_POST["headerList"] as $postedItem) {
			$queryString = $queryString." $postedItem,";
		}
		$tableName = $_POST["tableName"];
		$queryString = substr($queryString, 0, -1);
		$queryString = $queryString." FROM $tableName";
		if ($_POST["headerSelectionOption"] != "none") {
			$headerOption = $_POST["headerSelectionOption"];
			$equalityOption = $_POST["equalitySelectionOption"];
			$conditionEntry = $_POST["conditionEntry"];
			$queryString = $queryString." WHERE"." $headerOption"." $equalityOption"." '$conditionEntry'";
		}
		if ($_POST["orderColumnSelectionOption"] != "none") {
			$headerOption = $_POST["orderColumnSelectionOption"];
			$orderTypeOption = $_POST["orderTypeSelectionOption"];
			$queryString = $queryString." ORDER BY"." $headerOption"." $orderTypeOption";
		}
		return $queryString;
	}
	function handleTableSpecificElements($tableName) {
		switch($tableName) {
			case "PILOT":
				echo 
				"<form method='post' action='index.php'>
					<input type='hidden' name='queryID' value='Q3'>
					<input type='submit' name='header' value='Average Bounties per Corporation'>
				</form>";
				return;
		}
	}
 
?>