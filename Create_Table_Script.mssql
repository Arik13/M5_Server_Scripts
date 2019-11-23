CREATE TABLE SecurityStatus(
	securityStatus INT,
	bounty REAL,
	PRIMARY KEY(securityStatus)
);

CREATE TABLE ShipAttributes(
	shipClass VARCHAR(32) ,
	agility REAL,
	PRIMARY KEY(shipClass)
);

CREATE TABLE Location(
	name VARCHAR(32) ,
	securitySpace int NOT NULL,
	PRIMARY KEY(name)
);

CREATE TABLE Corporation(
	name VARCHAR(32) ,
	homeBaseName VARCHAR(32),
	PRIMARY KEY(name),
	FOREIGN KEY(homeBaseName) REFERENCES Location(name)
);

CREATE TABLE Pilot(
	name VARCHAR(32) ,
	subscriptionEndDate DATE,
	securityStatus INT DEFAULT "0",
	corporationName VARCHAR(32) DEFAULT "Unaffiliated",
	PRIMARY KEY(name),
	FOREIGN KEY(corporationName) REFERENCES Corporation(name),
	FOREIGN KEY(securityStatus) REFERENCES SecurityStatus(securityStatus)
);

CREATE TABLE Ship(
	shipName VARCHAR(32) ,
	shipClass VARCHAR(32) NOT NULL,
	value REAL NOT NULL,
	isIntact BOOLEAN DEFAULT "1",
	PRIMARY KEY(shipName),
	FOREIGN KEY(shipClass) REFERENCES ShipAttributes(shipClass)
);

CREATE TABLE Pilots(
	pilotName VARCHAR(32) ,
	shipName VARCHAR(32),
	PRIMARY KEY(pilotName, shipName),
	FOREIGN KEY(pilotName) REFERENCES Pilot(name),
	FOREIGN KEY(shipName) REFERENCES Ship(shipName)
);

CREATE TABLE Battle(
	battleID VARCHAR(32),
	date DATE NOT NULL,
	locationName VARCHAR(32) NOT NULL,
	PRIMARY KEY(BATTLEID),
	FOREIGN KEY(locationName) REFERENCES Location(name)
);

CREATE TABLE FightsIn(
	battleID VARCHAR(32),
	shipName VARCHAR(32),
	isAggressor BOOLEAN NOT NULL,
	PRIMARY KEY(battleID, shipName),
	FOREIGN KEY(battleID) REFERENCES Battle(battleID),
	FOREIGN KEY(shipName) REFERENCES Ship(shipName)
);

CREATE TABLE SpaceStation(
	locationName VARCHAR(32),
	spaceStationName VARCHAR(32),
	PRIMARY KEY(locationName, spaceStationName),
	FOREIGN KEY(locationName) REFERENCES Location(name)
);

CREATE TABLE Wars(
	aggressorName VARCHAR(32),
	defenderName VARCHAR(32),
	startDate DATE NOT NULL,
	endDate DATE,
	PRIMARY KEY(aggressorName, defenderName),
	FOREIGN KEY(aggressorName) REFERENCES Corporation(name),
	FOREIGN KEY(defenderName) REFERENCES Corporation(name)
);