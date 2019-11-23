INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (1, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (2, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (3, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (4, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (5, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (6, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (7, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (8, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (9, 0);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (10, 0);

INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-1, 500);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-2, 1000);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-3, 2500);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-4, 5000);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-5, 12500);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-6, 25000);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-7, 50000);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-8, 100000);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-9, 200000);
INSERT INTO SecurityStatus (securityStatus, bounty) VALUES (-10, 500000);

INSERT INTO Location (name, securitySpace) VALUES ("Citadel", 8);
INSERT INTO Location (name, securitySpace) VALUES ("Sinq Laison", 5);
INSERT INTO Location (name, securitySpace) VALUES ("Apanake", 1);
INSERT INTO Location (name, securitySpace) VALUES ("Genesis", -5);
INSERT INTO Location (name, securitySpace) VALUES ("Jita", 9);


INSERT INTO Corporation (name, homeBaseName) VALUES ("The Squirrel Academy", "Citadel");
INSERT INTO Corporation (name, homeBaseName) VALUES ("Atomic Energy Corp", "Sinq Laison");
INSERT INTO Corporation (name, homeBaseName) VALUES ("The Order of Celestial Knights", "Genesis");
INSERT INTO Corporation (name, homeBaseName) VALUES ("Goonswarm", "Apanake");
INSERT INTO Corporation (name, homeBaseName) VALUES ("Merchants of New Eden", "Jita");


INSERT INTO Pilot (name, subscriptionEndDate, securityStatus, corporationName) VALUES ("Burney TheBolt", null, "3", "The Squirrel Academy");
INSERT INTO Pilot (name, subscriptionEndDate, securityStatus, corporationName) VALUES ("Yang Aurilen", '2021-11-10', "5", "Atomic Energy Corp");
INSERT INTO Pilot (name, subscriptionEndDate, securityStatus, corporationName) VALUES ("Madame Mila", '2020-5-25', "-5", "Goonswarm");
INSERT INTO Pilot (name, subscriptionEndDate, securityStatus, corporationName) VALUES ("Head Uitra", null, "-10", "Merchants of New Eden");
INSERT INTO Pilot (name, subscriptionEndDate, securityStatus, corporationName) VALUES ("TryAgainZero", '2020-4-6', "5", "The Order of Celestial Knights");

INSERT INTO ShipAttributes (shipClass, agility) VALUES ("frigate", 1.0);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("destroyer", 0.8);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("cruiser", 0.7);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("battleCruiser", 0.6);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("strategicCruiser", 0.5);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("battleship", 0.4);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("titan", 0.3);
INSERT INTO ShipAttributes (shipClass, agility) VALUES ("capital", 0.25);


INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Venture", "cruiser", 5000000, 1);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Mymirdon", "battleCruiser", 6000000, 0);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Heron", "frigate", 100000, 1);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Tristan", "destroyer", 200000, 0);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Loki", "strategicCruiser", 60000000, 1);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Occator", "battleship", 90000000, 1);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Archon", "titan", 500000000, 1);
INSERT INTO Ship (shipName, shipClass, value, isIntact) VALUES ("Sabre", "capital", 25000000, 1);

INSERT INTO Pilots (pilotName, shipName) VALUES ("Burney TheBolt", "Venture");
INSERT INTO Pilots (pilotName, shipName) VALUES ("Yang Aurilen", "Tristan");
INSERT INTO Pilots (pilotName, shipName) VALUES ("Madame Mila", "Loki");
INSERT INTO Pilots (pilotName, shipName) VALUES ("Head Uitra", "Heron");
INSERT INTO Pilots (pilotName, shipName) VALUES ("TryAgainZero", "Venture");

INSERT INTO Battle (battleID, date, locationName) VALUES (1, '2019-10-1', "Citadel");
INSERT INTO Battle (battleID, date, locationName) VALUES (2, '2019-10-5', "Sinq Laison");
INSERT INTO Battle (battleID, date, locationName) VALUES (3, '2019-10-16', "Jita");
INSERT INTO Battle (battleID, date, locationName) VALUES (4, '2019-11-12', "Apanake");
INSERT INTO Battle (battleID, date, locationName) VALUES (5, '2019-12-1', "Jita");

INSERT INTO FightsIn (battleID, shipName, isAggressor) VALUES(1, "Venture", 1); 
INSERT INTO FightsIn (battleID, shipName, isAggressor) VALUES(1, "Tristan", 0); 
INSERT INTO FightsIn (battleID, shipName, isAggressor) VALUES(2, "Sabre", 1); 
INSERT INTO FightsIn (battleID, shipName, isAggressor) VALUES(2, "Loki", 0); 
INSERT INTO FightsIn (battleID, shipName, isAggressor) VALUES(3, "Mymirdon", 1); 
INSERT INTO FightsIn (battleID, shipName, isAggressor) VALUES(3, "Heron", 0); 

INSERT INTO SpaceStation (locationName, spaceStationName) VALUES ("Jita", "Jita Trading Facility");
INSERT INTO SpaceStation (locationName, spaceStationName) VALUES ("Jita", "Jita Production Facility");
INSERT INTO SpaceStation (locationName, spaceStationName) VALUES ("Citadel", "Citadel Trading Facility");
INSERT INTO SpaceStation (locationName, spaceStationName) VALUES ("Jita", "Citadel Navy Facility");
INSERT INTO SpaceStation (locationName, spaceStationName) VALUES ("Sinq Laison", "Sinq Laison Trading Facility");

INSERT INTO Wars (aggressorName, defenderName, startDate, endDate) VALUES ("Goonswarm", "The Order of Celestial Knights", '2018-10-11', '2018-10-20');
INSERT INTO Wars (aggressorName, defenderName, startDate, endDate) VALUES ("Goonswarm", "Atomic Energy Corp", '2018-10-21', '2018-10-30');
INSERT INTO Wars (aggressorName, defenderName, startDate, endDate) VALUES ("The Order of Celestial Knights", "Merchants of New Eden", '2019-1-7', '2019-1-20');
INSERT INTO Wars (aggressorName, defenderName, startDate, endDate) VALUES ("Atomic Energy Corp", "Goonswarm", '2019-2-20', '2019-2-25');
INSERT INTO Wars (aggressorName, defenderName, startDate, endDate) VALUES ("Merchants of New Eden", "Goonswarm", '2019-3-2', '2019-3-10');


INSERT INTO Pilot VALUES	
	('Michael', null,5,'The Order of Celestial Knights'),
	('Cassandra','2020-04-06 00:00:00',2,'Atomic Energy Corp'),
	('John',null,-5,'Goonswarm'),
	('Dan',null,-6,'Goonswarm'),
	('Bob',null,-7,'Goonswarm');
INSERT INTO Pilots VALUES 
	('Michael', 'Tristan'),
	('Cassandra', 'Sabre'),
	('Bob', 'Venture'),
	('Dan', 'Sabre');

INSERT INTO QueryObject VALUES
	('SECURITYSTATUS', 'SELECT * FROM SECURITYSTATUS', 'Security Status'),
	('SHIPATTRIBUTES', 'SELECT * FROM SHIPATTRIBUTES', 'Ship Attributes'),
	('LOCATION', 'SELECT * FROM LOCATION', 'Location'),
	('CORPORATION', 'SELECT * FROM CORPORATION', 'Corporation'),
	('PILOT', 'SELECT * FROM PILOT', 'Pilot'),
	('SHIP', 'SELECT * FROM SHIP', 'Ship'),
	('PILOTS', 'SELECT * FROM PILOTS', 'Pilots'),
	('FIGHTSIN', 'SELECT * FROM FIGHTSIN', 'Fights In'),
	('SPACESTATION', 'SELECT * FROM SPACESTATION', 'Space Station'),
	('WARS', 'SELECT * FROM WARS', 'Wars'),
	('BATTLE', 'SELECT * FROM BATTLE', 'Battle'),
	('Q1', 
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
	'LOCATION');
	

INSERT INTO ColumnStyling VALUES
	('SECURITYSTATUS', 0, ''),
	('SECURITYSTATUS', 1, ''),

	('SHIPATTRIBUTES', 0, ''),
	('SHIPATTRIBUTES', 1, ''),

	('LOCATION', 0, ''),
	('LOCATION', 1, ''),

	('CORPORATION', 0, 'link'),
	('CORPORATION', 1, ''),

	('PILOT', 0, ''),
	('PILOT', 1, ''),
	('PILOT', 2, ''),
	('PILOT', 3, ''),

	('SHIP', 0, ''),
	('SHIP', 1, ''),
	('SHIP', 2, ''),
	('SHIP', 3, ''),

	('PILOTS', 0, ''),
	('PILOTS', 1, ''),

	('FIGHTSIN', 0, ''),
	('FIGHTSIN', 1, ''),
	('FIGHTSIN', 2, ''),

	('SPACESTATION', 0, ''),
	('SPACESTATION', 1, ''),

	('WARS', 0, ''),
	('WARS', 1, ''),
	('WARS', 2, ''),
	('WARS', 3, ''),

	('BATTLE', 0, ''),
	('BATTLE', 1, ''),
	('BATTLE', 2, ''),

	('Q1', 0, ''),
	('Q1', 1, ''),
	('Q1', 2, '');