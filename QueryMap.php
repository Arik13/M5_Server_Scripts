<?php

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
		"Q1" => "
			SELECT 	homeBaseName as 'Home Base', 
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
	$headerMap = array(
		"SECURITYSTATUS" => array("",""),
		"SHIPATTRIBUTES" => array("",""),
		"LOCATION" => array("",""),
		"CORPORATION" => array("link",""),
		"PILOT" => array("","","",""),
		"SHIP" => array("","","",""),
		"PILOTS" => array("",""),
		"FIGHTSIN" => array("","",""),
		"SPACESTATION" => array("",""),
		"WARS" => array("","", "", ""),
		"BATTLE" => array("","",""),
		"Q1" => array("", "", "")
	);
	return $headerMap[strtoupper($queryID)];
}

?>