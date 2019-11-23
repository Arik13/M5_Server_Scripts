<?php

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