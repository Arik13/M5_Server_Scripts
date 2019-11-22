<?php
include 'connect.php';
include 'htmlTableGenerator.php';

// Encapsulates the name, header names and data of a table, and the methods for retrieving them
class TableModel {
	var $tableName;
	var $tableHeaders;
	var $tableData;
	var $columnFormats;
    public function __construct($tableName, $tableHeaders, $tableData, $columnFormats) {
    	$this->tableName = $tableName;
        $this->tableHeaders = $tableHeaders;
        $this->tableData = $tableData;
        $this->columnFormats = $columnFormats;
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
	public function getColumnFormats() {
		return $this->columnFormats;
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