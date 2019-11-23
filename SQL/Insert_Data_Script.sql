INSERT INTO SecurityStatus VALUES 
	(1, 0),
	(2, 0),
	(3, 0),
	(4, 0),
	(5, 0),
	(6, 0),
	(7, 0),
	(8, 0),
	(9, 0),
	(10, 0);


INSERT INTO SecurityStatus 	VALUES 
	(-1, 500),
	(-2, 1000),
	(-3, 2500),
	(-4, 5000),
	(-5, 12500),
	(-6, 25000),
	(-7, 50000),
	(-8, 100000),
	(-9, 200000),
	(-10, 500000);
	
INSERT INTO Location VALUES 
	("Citadel", 8),
	("Sinq Laison", 5),
	("Apanake", 1),
	("Genesis", -5),
	("Jita", 9),
	("Amarr", 9),
	("Perimeter", 9),
	("Caldari", 9),
	("Eve", 9),
	("Shard", 9);


INSERT INTO Corporation VALUES 
	("The Squirrel Academy", "Citadel"),
	("Atomic Energy Corp", "Sinq Laison"),
	("The Order of Celestial Knights", "Genesis"),
	("Goonswarm", "Apanake"),
	("Merchants of New Eden", "Jita"),
	("Dragoons of Austera", "Jita"),
	("Drakans Medallion", "Jita"),
	("Complaints Department", "Eve"),
	("SILENT", "Shard"),
	("Amarr Congolermate", "Eve"),
	("Defenders of Hisec", "Genesis");

INSERT INTO Pilot VALUES
	("Burney TheBolt", null, "3", "The Squirrel Academy"),
	("Yang Aurilen", '2021-11-10', "5", "Atomic Energy Corp"),
	("Madame Mila", '2020-5-25', "-5", "Goonswarm"),
	("Head Uitra", null, "-10", "Merchants of New Eden"),
	('Michael',null,5,'The Order of Celestial Knights'),
	('Cassandra','2020-04-06 00:00:00',2,'Atomic Energy Corp'),
	("TryAgainZero", '2020-4-6', "5", "The Order of Celestial Knights"),
	('John',null,-5,'Goonswarm'),
	('Dan',null,-6,'Goonswarm'),
	('Bob',null,-7,'Goonswarm');

INSERT INTO ShipAttributes VALUES 
	("frigate", 1.0),
	("destroyer", 0.8),
	("cruiser", 0.7),
	("battleCruiser", 0.6),
	("strategicCruiser", 1.0),
	("battleship", 0.4),
	("titan", 0.3),
	("capital", 0.25),
	("freighter", 0.15),
	("industrial", 0.10);

INSERT INTO Ship VALUES
	("Venture", "cruiser", 5000000, 1),
	("Mymirdon", "battleCruiser", 6000000, 0),
	("Heron", "frigate", 100000, 1),
	("Tristan", "destroyer", 200000, 0),
	("Loki", "strategicCruiser", 60000000, 1),
	("Occator", "battleship", 90000000, 1),
	("Archon", "titan", 500000000, 1),
	("Sabre", "capital", 25000000, 1),
	("Gigant", "capital", 30000000, 1);


INSERT INTO Pilots VALUES 
	("Burney TheBolt", "Venture"),
	("Yang Aurilen", "Tristan"),
	("Madame Mila", "Loki"),
	("Head Uitra", "Heron"),
	("TryAgainZero", "Venture"),
	('Michael', 'Tristan'),
	('Cassandra', 'Sabre'),
	('Bob', 'Venture'),
	('Dan', 'Sabre');
	
INSERT INTO Battle VALUES 
	(1, '2019-10-1', "Citadel"),
	(2, '2019-10-1', "Sinq Laison"),
	(3, '2019-10-16', "Jita"),
	(4, '2019-11-12', "Apanake"),
	(5, '2019-12-1', "Jita");

INSERT INTO FightsIn VALUES
	(1, "Venture", 1),
	(1, "Tristan", 0),
	(2, "Sabre", 1),
	(2, "Loki", 0),
	(3, "Mymirdon", 1),
	(3, "Heron", 0), 
	(4, "Heron", 0),
	(4, "Tristan", 1),
	(4, "Loki", 1),
	(5, "Venture", 1),
	(5, "Loki", 0),
	(5, "Sabre", 1),
	(5, "Tristan", 1),
	(5, "Mymirdon", 0);
	

INSERT INTO SpaceStation VALUES 
	("Jita", "Jita Trading Facility"),
	("Jita", "Jita Production Facility"),
	("Citadel", "Citadel Trading Facility"),
	("Jita", "Citadel Navy Facility"),
	("Sinq Laison", "Sinq Laison Trading Facility");

INSERT INTO Wars VALUES 
	("Goonswarm", "The Order of Celestial Knights", '2018-10-11', '2018-10-20'),
	("Goonswarm", "Atomic Energy Corp", '2018-10-21', '2018-10-30'),
	("The Order of Celestial Knights", "Merchants of New Eden", '2019-1-7', '2019-1-20'),
	("Atomic Energy Corp", "Goonswarm", '2019-2-20', '2019-2-25'),
	("Merchants of New Eden", "Goonswarm", '2019-3-2', '2019-3-10');

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
                WHERE pilot.corporationName = 'conditionString') AS t
            GROUP BY homeBaseName;", 
	'LOCATION');
	

INSERT INTO ColumnMetaData VALUES
	('SECURITYSTATUS', 0, '', NULL),
	('SECURITYSTATUS', 1, '', NULL),

	('SHIPATTRIBUTES', 0, '', NULL),
	('SHIPATTRIBUTES', 1, '', NULL),

	('LOCATION', 0, '', NULL),
	('LOCATION', 1, '', NULL),

	('CORPORATION', 0, 'link', 'Q1'),
	('CORPORATION', 1, '', NULL),

	('PILOT', 0, '', NULL),
	('PILOT', 1, '', NULL),
	('PILOT', 2, '', NULL),
	('PILOT', 3, '', NULL),

	('SHIP', 0, '', NULL),
	('SHIP', 1, '', NULL),
	('SHIP', 2, '', NULL),
	('SHIP', 3, '', NULL),

	('PILOTS', 0, '', NULL),
	('PILOTS', 1, '', NULL),

	('FIGHTSIN', 0, '', NULL),
	('FIGHTSIN', 1, '', NULL),
	('FIGHTSIN', 2, '', NULL),

	('SPACESTATION', 0, '', NULL),
	('SPACESTATION', 1, '', NULL),

	('WARS', 0, '', NULL),
	('WARS', 1, '', NULL),
	('WARS', 2, '', NULL),
	('WARS', 3, '', NULL),

	('BATTLE', 0, '', NULL),
	('BATTLE', 1, '', NULL),
	('BATTLE', 2, '', NULL),

	('Q1', 0, '', NULL),
	('Q1', 1, '', NULL),
	('Q1', 2, '', NULL);