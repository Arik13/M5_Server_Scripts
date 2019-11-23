<?php
/*
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
}

function getQueryMetaData($queryID) {
	$queryMetaData = array(							
		"SECURITYSTATUS" => array("Security Status", array("",""), getQuery($queryID)),
		"SHIPATTRIBUTES" => array("Security Status", array("",""), getQuery($queryID)),
		"LOCATION" => 		array("Security Status", array("",""), getQuery($queryID)),
		"CORPORATION" => 	array("Security Status", array("",""), getQuery($queryID)),
		"PILOT" => 			array("Security Status", array("",""), getQuery($queryID)),
		"SHIP" => 			array("Security Status", array("",""), getQuery($queryID)),
		"PILOTS" => 		array("Security Status", array("",""), getQuery($queryID)),
		"FIGHTSIN" => 		array("Security Status", array("",""), getQuery($queryID)),
		"SPACESTATION" => 	array("Security Status", array("",""), getQuery($queryID)),
		"WARS" => 			array("Security Status", array("",""), getQuery($queryID)),
		"BATTLE" => 		array("Security Status", array("",""), getQuery($queryID)),
		"Q1" => 			array("Security Status", array("",""), getQuery($queryID)),
	);
	return $headerMap[strtoupper($queryID)];
}
*/

?>