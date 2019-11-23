<?php

// queryHandle, queryBody, columnFormats, tableHeader
class QueryModel {
	var $queryHandle;
	var $queryBody;
	var $tableName;
	var $columnFormats;
    public function __construct($queryHandle, $columnFormats) {
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

function getQuery($queryID, $conditionString) {
	$queryMap = array(
		"SECURITYSTATUS" => "SELECT * FROM SECURITYSTATUS",
		"SHIPATTRIBUTES" => "SELECT * FROM SHIPATTRIBUTES",
		"LOCATION" => "SELECT * FROM LOCATION",
		"CORPORATION" => "SELECT * FROM CORPORATION",
		"PILOT" => "SELECT * FROM PILOT",
		"SHIP" => "SELECT * FROM SHIP",
		"PILOTS" => "SELECT * FROM PILOTS",
		"FIGHTSIN" => "SELECT * FROM FIGHTSIN",
		"SPACESTATION" => "SELECT * FROM SPACESTATION",
		"WARS" => "SELECT * FROM WARS",
		"BATTLE" => "SELECT * FROM BATTLE",
		"Q1" => 
			"SELECT	homeBaseName as 'Home Base', 
					count(DISTINCT pilotName) AS 'Number of Pilots', 
					count(DISTINCT shipName) AS 'Number of Ships'
            FROM 
				(SELECT pilot.name AS pilotName,
						pilot.corporationName AS corporationName,
						ship.shipName AS shipName,
						ship.shipClass AS shipClass,
						corporation.homeBaseName as homeBaseName
				FROM pilots
				INNER JOIN pilot ON pilots.pilotName = pilot.name
				INNER JOIN ship ON pilots.shipName = ship.shipName
				INNER JOIN corporation ON corporation.name = pilot.corporationName
                WHERE pilot.corporationName = '$conditionString') AS t
            GROUP BY homeBaseName;",
		"Q2" => "SELECT * FROM BATTLE",	
	);
	return $queryMap[strtoupper($queryID)];
}

function getColumnFormats($queryID) {
	$headerMap = array(							// # of columns in schema
		"SECURITYSTATUS" => array("",""),		// 2
		"SHIPATTRIBUTES" => array("",""),		// 2
		"LOCATION" => array("",""),				// 2
		"CORPORATION" => array("link",""),		// 2
		"PILOT" => array("","","",""),			// 4
		"SHIP" => array("","","",""),			// 4
		"PILOTS" => array("",""),				// 2
		"FIGHTSIN" => array("","",""),			// 3
		"SPACESTATION" => array("",""),			// 2
		"WARS" => array("","","",""),			// 4
		"BATTLE" => array("","",""),			// 3
		"Q1" => array("","",""),				// 3
	);
	return $headerMap[strtoupper($queryID)];
}/*
function getTables() {
	$tables = array(
		0 => array("SECURITYSTATUS", "Security Status"),
		1 => array("SHIPATTRIBUTES", 
		2 => array("LOCATION",
		3 => array("CORPORATION",
		4 => array("PILOT",
		5 => array("SHIP",
		6 => array("PILOTS",
		7 => array("FIGHTSIN",
		8 => array("SPACESTATION",
		9 => array("WARS",
		10 => array("BATTLE",
	);
}*/

?>