<?php
include 'connect.php';
include 'htmlTableGenerator.php';

// Encapsulates the name, header names and data of a table, and the methods for retrieving them
class TableModel {
	var $tableName;
	var $tableHeaders;
	var $tableData;
	var $columnStyles;
	var $relatedQueries;
    public function __construct($tableName, $tableHeaders, $tableData, $columnStyles, $relatedQueries) {
    	$this->tableName = $tableName;
        $this->tableHeaders = $tableHeaders;
        $this->tableData = $tableData;
		$this->columnStyles = $columnStyles;
		$this->relatedQueries = $relatedQueries;
    }
    public function getTableName() {
		return $this->tableName;
	}
	public function getTableHeaders() {
		return $this->tableHeaders;
	}
	public function getTableData() {
		return $this->tableData;
	}
	public function getColumnStyles() {
		return $this->columnStyles;
	}
	public function getRelatedQueries() {
		return $this->relatedQueries;
	}
}

// Queries the database for all rows and columns of the given table name
function getTable($dataQueryString, $tableName, $columnFormats) {
	// Connect to the server and query it for the given table
	$connection = openConnection();
	$dataQueryResult = $connection->query($dataQueryString);

	// If the query was invalid, prompt and return
	if (!$dataQueryResult) {
		echo "<p>No result found!</p>";
		return;
	}

	// Extract the table headers and data into arrays, from the queries
	$tableData = $dataQueryResult->fetch_all(MYSQLI_ASSOC);
	$tableHeaders = array();
	if(!empty($tableData)){
	    $tableHeaders = array_keys($tableData[0]);
	}
	// Instantiate a table model with the name parameter and queried headers and data
	$tableModel = new TableModel($tableName, $tableHeaders, $tableData, $columnFormats);

	// Use the table model to make an html table
	generateTable($tableModel);

	// close the connection to the server
	$connection->close();
}

// Queries the database for all rows and columns of the given table name
function genTableFromQuery($queryID, $tableHeader) {
	// Connect to the server and query it for the given table
	$connection = openConnection();

	// Query the DB for the Table Name and the SQL to call it
	$query1 = 
		"SELECT queryBody, tableHeader 
		FROM queryobject 
		WHERE queryID = '$queryID'";
	$queryResult = $connection->query($query1);
	if (!$queryResult) {
		echo "<p>No result found!</p>";
		return;
	}
	$query1Data = $queryResult->fetch_all(MYSQLI_ASSOC);
	$queryBody = $query1Data[0]["queryBody"];

	if (!$tableHeader) {
		$tableHeader = $query1Data[0]["tableHeader"];
	} 
	else {
		$queryBody = str_replace("conditionString",$tableHeader,$queryBody);
	}
	// Query the DB for the column schema formats
	$query2 = 
		"SELECT style, relatedQuery
		FROM ColumnMetaData
		WHERE queryID = '$queryID'";
	$queryResult = $connection->query($query2);
	if (!$queryResult) {
		echo "<p>No result found!</p>";
		return;
	}
	$query2Data = $queryResult->fetch_all(MYSQLI_ASSOC);
	$columnStyles = array();
	$relatedQueries = array();
	for ($i = 0; $i < count($query2Data); $i++) {
		array_push($columnStyles, $query2Data[$i]["style"]);
		array_push($relatedQueries, $query2Data[$i]["relatedQuery"]);
	}

	// Do the main query
	$dataQueryResult = $connection->query($queryBody);

	// If the query was invalid, prompt and return
	if (!$dataQueryResult) {
		echo "<p>No result found!</p>";
		return;
	}

	// Extract the table headers and data into arrays, from the queries
	$tableData = $dataQueryResult->fetch_all(MYSQLI_ASSOC);
	$tableHeaders = array();
	if(!empty($tableData)){
	    $tableHeaders = array_keys($tableData[0]);
	}
	// Instantiate a table model with the name parameter and queried headers and data
	$tableModel = new TableModel($tableHeader, $tableHeaders, $tableData, $columnStyles, $relatedQueries);



	// Use the table model to make an html table
	generateTable($tableModel);

	// close the connection to the server
	$connection->close();
}