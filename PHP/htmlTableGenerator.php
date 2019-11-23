<?php

include 'connect.php';
include 'TableModel.php';

// Queries the database for all rows and columns of the given table name
function genTableFromQuery($queryID, $tableHeader) {
	// Connect to the server
	$connection = openConnection();

	// Query the DB with the queryID, retrieve the query and table header associated with ID
	$queryGetterQuery = 
		"SELECT queryBody, tableHeader 
		FROM queryobject 
		WHERE queryID = '$queryID'";
	$queryResult = $connection->query($queryGetterQuery);
	if (!validate($queryResult)) return;

	// Fetch the query we're querying for
	$queryGetterData = $queryResult->fetch_all(MYSQLI_ASSOC);
	$mainQueryBody = $queryGetterData[0]["queryBody"];

	// Get the table header if one wasn't provided
	if (!$tableHeader) {
		$tableHeader = $queryGetterData[0]["tableHeader"];
	} 
	// A header wasn't provided, so the initial query was dynamic. Insert the given header into the retrieved template query
	else {
		$mainQueryBody = str_replace("conditionString",$tableHeader,$mainQueryBody);
	}
	// Query the DB for the column meta data (column styling and related query for retrieving new tables)
	$columnMetaDataQuery = 
		"SELECT style, relatedQuery
		FROM ColumnMetaData
		WHERE queryID = '$queryID'";
	$queryResult = $connection->query($columnMetaDataQuery);
	if (!validate($queryResult)) return;

	// Extract the styles and related queries
	$columnMetaData = $queryResult->fetch_all(MYSQLI_ASSOC);
	$columnStyles = array();
	$relatedQueries = array();
	for ($i = 0; $i < count($columnMetaData); $i++) {
		array_push($columnStyles, $columnMetaData[$i]["style"]);
		array_push($relatedQueries, $columnMetaData[$i]["relatedQuery"]);
	}

	// Query the DB with the retrieved query
	$dataQueryResult = $connection->query($mainQueryBody);
	if (!validate($queryResult)) return;

	// Extract the table headers and data
	$tableData = $dataQueryResult->fetch_all(MYSQLI_ASSOC);
	$tableHeaders = array();
	if(!empty($tableData)){
	    $tableHeaders = array_keys($tableData[0]);
	}
	// Instantiate the table model
	$tableModel = new TableModel($tableHeader, $tableHeaders, $tableData, $columnStyles, $relatedQueries);

	// Use the table model to generate an html table
	generateTable($tableModel);

	// close the connection to the server
	$connection->close();
}

function validate($queryResult) {
	if (!$queryResult) {
		echo "<p>No result found!</p>";
	}
	return $queryResult;
}

function generateTable($tableModel) {
	$tableName = $tableModel->getTableName();
	$tableHeaders = $tableModel->getTableHeaders();
	$tableData = $tableModel->getTableData();
	$columnStyles = $tableModel->getColumnStyles();
	$relatedQueries = $tableModel->getRelatedQueries();
	
	// Format the table name and return it as an html header
	$formattedTableName = camelCaseToUpperCaseSpaces($tableName);
	echo "<h1 class=\"tableTitle\">{$formattedTableName}</h1>";
	
	// Format the headers and return them in an html table row
	echo "<table>";
	echo "<tr class=\"tableRow\">";
	for ($i = 0; $i < count($tableHeaders); $i++) {
		$tableHeaderItem = $tableHeaders[$i];
		$formattedHeader = camelCaseToUpperCaseSpaces($tableHeaderItem);
		echo "<th>{$formattedHeader}</th>";
	}
	echo "</tr>";

	// Place the data in an html table and return it
	for ($i = 0; $i < count($tableData); $i++) {
		echo "<tr>";
		for ($j = 0; $j < count($tableHeaders); $j++) {
			$dataElement = $tableData[$i][$tableHeaders[$j]];
			$styledDataElement = styleData($dataElement, $columnStyles[$j], $relatedQueries[$j]);
			echo $styledDataElement;
		}
		echo "</tr>";
	}
}

// Credit for this algorithm goes to "ridgerunner" as seen at:
// https://stackoverflow.com/questions/4519739/split-camelcase-word-into-words-with-php-preg-match-regular-expression
function camelCaseToUpperCaseSpaces($str) {
	$ccWord = $str;
	$re = '/(?#! splitCamelCase Rev:20140412)
	    # Split camelCase "words". Two global alternatives. Either g1of2:
	      (?<=[a-z])      # Position is after a lowercase,
	      (?=[A-Z])       # and before an uppercase letter.
	    | (?<=[A-Z])      # Or g2of2; Position is after uppercase,
	      (?=[A-Z][a-z])  # and before upper-then-lower case.
	    /x';
	$arr = preg_split($re, $ccWord);
	$formattedString = "";
	for ($j = 0; $j < count($arr); ++$j) {
		$formattedString = ($formattedString.(ucwords($arr[$j]))).(" ");
	}
	return $formattedString;
}
function styleData($dataElement, $columnFormats, $relatedQuery) {
	if ($columnFormats == 'link') {
		return "
		<td>
		<form method='post' action='index.php'>
			<input type='hidden' name='queryID' value='$relatedQuery'>
			<input class='tableLink' type='submit' name='header' value='$dataElement'>
		</form>
		</td>
		";
	}
	else {
		return "<td>{$dataElement}</td>";
	}
}

?>