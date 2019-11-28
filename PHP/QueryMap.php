<?php

function getMetaData($queryID) {
    $styleArray = array(
        'BATTLE' => new TableMetaData(array('', '', '', ''), array('', '', '', '')),
        'CORPORATION' => new TableMetaData(array('link', ''), array('Q1', '')),
        'FIGHTSIN' => new TableMetaData(array('', '', ''), array('', '', '')),
        'LOCATION' => new TableMetaData(array('', ''), array('', '')),
        'PILOT' => new TableMetaData(array('', '', '', ''), array('', '', '', '')),
        'PILOTS' => new TableMetaData(array('', ''), array('', '')),
        'SECURITYSTATUS' => new TableMetaData(array('', ''), array('', '')),
        'SHIP' => new TableMetaData(array('link', '', '', ''), array('Q4', '', '', '')),
        'SHIPATTRIBUTES' => new TableMetaData(array('', ''), array('', '')),
        'SPACESTATION' => new TableMetaData(array('', ''), array('', '')),
        'WARS' => new TableMetaData(array('', '', '', ''), array('', '', '', '')),
        'Q1' => new TableMetaData(array('', '', ''), array('', '', '')),
        'Q3' => new TableMetaData(array('', '', ''. '', '', '', ''), array('', '', '', '', '', '', '')),
        'Q3' => new TableMetaData(array('', '', ''. '', '', '', ''), array('', '', '', '', '', '', '')),
        'Q4' => new TableMetaData(array('', '', ''. '', '', '', ''), array('', '', '', '', '', '', '')),
    );
    return $styleArray[$queryID];
}

function getQueryObject($queryID) {
    $querryMap = array(
        'BATTLE' => new QueryObject('BATTLE', 'SELECT * FROM BATTLE','Battle'),
        'CORPORATION' => new QueryObject('CORPORATION' ,"SELECT * FROM CORPORATION" ,'Corporation'),
        'FIGHTSIN' => new QueryObject('FIGHTSIN' ,"SELECT * FROM FIGHTSIN",'Fights In'),
        'LOCATION' => new QueryObject('LOCATION' ,'SELECT * FROM LOCATION','Location'),
        'PILOT' => new QueryObject('PILOT' ,'SELECT * FROM PILOT','Pilot'),
        'PILOTS' => new QueryObject('PILOTS' ,'SELECT * FROM PILOTS','Pilots'),
        'SECURITYSTATUS' => new QueryObject('SECURITYSTATUS' ,'SELECT * FROM SECURITYSTATUS','Security Status'),
        'SHIP' => new QueryObject('SHIP' ,'SELECT * FROM SHIP','Ship'),
        'SHIPATTRIBUTES' => new QueryObject('SHIPATTRIBUTES' ,'SELECT * FROM SHIPATTRIBUTES','Ship Attributes'),
        'SPACESTATION' => new QueryObject('SPACESTATION' ,"SELECT * FROM SPACESTATION",'Space Station'),
        'WARS' => new QueryObject('WARS' ,'SELECT * FROM WARS','Wars'),
        'Q1' => new QueryObject('Q1' , 
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
                      WHERE pilot.corporationName = 'conditionString') AS t
                  GROUP BY homeBaseName;",
                  null),
        'Q2' => new QueryObject('Q2' ,
                "SELECT corporationName as 'Corporation', AVG(bounty) as 'Average Bounty' 
                FROM PILOT 
                INNER JOIN securityStatus ON pilot.securityStatus=securityStatus.securityStatus 
                GROUP BY corporationName"
                , null),
        'Q3' => new QueryObject('Q3' ,
                "SELECT corporationName as 'Corporation', AVG(bounty) as 'Average Bounty' 
                FROM PILOT 
                INNER JOIN securityStatus ON pilot.securityStatus=securityStatus.securityStatus 
                GROUP BY corporationName"
                , null),
        'Q4' => new QueryObject('Q4',
                "SELECT pilot.name AS 'Pilot Name', subscriptionEndDate, securityStatus, corporationName, shipName
                FROM pilot 
                INNER JOIN Pilots ON name = pilots.pilotName 
                WHERE pilots.shipName = 'conditionString';"
                , null),
                
      );
      return $querryMap[$queryID];
}
class QueryObject {
	var $queryID;
	var $queryString;
	var $formattedHeader;
    public function __construct($queryID, $queryString, $formattedHeader) {
    	$this->queryID = $queryID;
        $this->queryString = $queryString;
        $this->formattedHeader = $formattedHeader;
    }
    public function getQueryID() {
		return $this->queryID;
	}
	public function getQuery() {
		return $this->queryString;
	}
	public function getFormattedHeader() {
		return $this->formattedHeader;
	}
}

class TableMetaData {
    var $columnStyles;
    var $relatedQueryIDs;
    public function __construct($columnStyles, $relatedQueryIDs) {
    	$this->columnStyles = $columnStyles;
        $this->relatedQueryIDs = $relatedQueryIDs;
    }
    public function getColumnStyles() {
		return $this->columnStyles;
	}
	public function getRelatedQueryIDs() {
		return $this->relatedQueryIDs;
	}
}

?>