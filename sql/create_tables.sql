SET foreign_key_checks = 0;
DROP TABLE IF EXISTS Pallets;
DROP TABLE IF EXISTS Cookies;
DROP TABLE IF EXISTS Customers;
DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Ingredients;
DROP TABLE IF EXISTS Units;
DROP TABLE IF EXISTS CookieIngredients;
DROP TABLE IF EXISTS Delivered;
DROP TABLE IF EXISTS Users;
SET foreign_key_checks = 1;

/**Table creation*/

CREATE TABLE Cookies(
	cookieName varchar(40),
	PRIMARY KEY (cookieName)
);

CREATE TABLE Pallets(
	barcode int AUTO_INCREMENT,
	blocked boolean NOT NULL,
	dateCreated DateTime NOT NULL DEFAULT NOW(),
	cookie varChar(40),
	PRIMARY KEY (barcode),
	FOREIGN KEY (cookie) REFERENCES Cookies (cookieName)
);

CREATE TABLE Customers(
	name varchar(30),
	address varchar(40),
	PRIMARY KEY (name)
);

CREATE TABLE Users(
	userName varchar(40),
	password varChar(128) NOT NULL,
	salt varChar(16) NOT NULL,
	PRIMARY KEY (userName)
);

CREATE TABLE Orders(
	id int AUTO_INCREMENT,
	customerName varchar(40),
	cookieName varchar(40),
	deliveryDate DateTime NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (cookieName) REFERENCES Cookies (cookieName),
	FOREIGN KEY (customerName) REFERENCES Customers (name)
);

CREATE TABLE Units(
	unit varchar(5),
	PRIMARY KEY (unit)
);

CREATE TABLE Ingredients(
	ingredientName varchar(30),
	currentAmount double,
	dateLastDelivered DateTime NOT NULL,
	unit varchar(5),
	PRIMARY KEY (ingredientName),
	FOREIGN KEY (unit) REFERENCES Units (unit)
);

CREATE TABLE CookieIngredients(
	cookieName varchar(40),
	ingredientName varchar(30),
	ingredientAmount double NOT NULL CHECK (ingredientAmount > 0),
	unit varchar(5),
	PRIMARY KEY (cookieName, ingredientName),
	FOREIGN KEY (cookieName) REFERENCES Cookies (cookieName) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (ingredientName) REFERENCES Ingredients (ingredientName) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (unit) REFERENCES Units (unit)
);

CREATE TABLE Delivered(
	barcode int,
	customerName varchar(40),
	receivedDate DateTime NOT NULL,
	PRIMARY KEY (barcode),
	FOREIGN KEY (barcode) REFERENCES Pallets (barcode),
	FOREIGN KEY (customerName) REFERENCES Customers (name)
);

/**Units*/

INSERT INTO Units VALUES ('g');
INSERT INTO Units VALUES ('dl');

/**Ingredients*/

INSERT INTO Ingredients VALUES ('Flour', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Butter', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Icing sugar', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Roasted, chopped nuts', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Fine-ground nuts', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Ground, roasted nuts', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Bread crumbs', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Sugar', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Egg whites', 1000000, NOW(), 'dl');
INSERT INTO Ingredients VALUES ('Chocolate', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Marzipan', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Eggs', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Potato starch', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Wheat flour', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Sodium bicarbonate', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Vanilla', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Cinnamon', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Chopped almonds', 1000000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Vanilla sugar', 100, NOW(), 'g');

/**Cookies*/

INSERT INTO Cookies VALUES ('Nut ring');
INSERT INTO Cookies VALUES ('Nut cookie');
INSERT INTO Cookies VALUES ('Amneris');
INSERT INTO Cookies VALUES ('Tango');
INSERT INTO Cookies VALUES ('Almond delight');
INSERT INTO Cookies VALUES ('Berliner');

/**CookieIngredients*/

INSERT INTO CookieIngredients VALUES ('Nut ring', 'Flour', 450, 'g');
INSERT INTO CookieIngredients VALUES ('Nut ring', 'Butter', 450, 'g');
INSERT INTO CookieIngredients VALUES ('Nut ring', 'Icing sugar', 190, 'g');
INSERT INTO CookieIngredients VALUES ('Nut ring', 'Roasted, chopped nuts', 225, 'g');

INSERT INTO CookieIngredients VALUES ('Nut cookie', 'Fine-ground nuts', 750, 'g');
INSERT INTO CookieIngredients VALUES ('Nut cookie', 'Ground, roasted nuts', 625, 'g');
INSERT INTO CookieIngredients VALUES ('Nut cookie', 'Bread crumbs', 125, 'g');
INSERT INTO CookieIngredients VALUES ('Nut cookie', 'Sugar', 375, 'g');
INSERT INTO CookieIngredients VALUES ('Nut cookie', 'Egg whites', 2.5, 'dl');
INSERT INTO CookieIngredients VALUES ('Nut cookie', 'Chocolate', 50, 'g');

INSERT INTO CookieIngredients VALUES ('Amneris', 'Marzipan', 750, 'g');
INSERT INTO CookieIngredients VALUES ('Amneris', 'Butter', 250, 'g');
INSERT INTO CookieIngredients VALUES ('Amneris', 'Eggs', 250, 'g');
INSERT INTO CookieIngredients VALUES ('Amneris', 'Potato starch', 25, 'g');
INSERT INTO CookieIngredients VALUES ('Amneris', 'Wheat flour', 25, 'g');

INSERT INTO CookieIngredients VALUES ('Tango', 'Flour', 300, 'g');
INSERT INTO CookieIngredients VALUES ('Tango', 'Butter', 200, 'g');
INSERT INTO CookieIngredients VALUES ('Tango', 'Sugar', 250, 'g');
INSERT INTO CookieIngredients VALUES ('Tango', 'Sodium bicarbonate', 4, 'g');
INSERT INTO CookieIngredients VALUES ('Tango', 'Vanilla', 2, 'g');

INSERT INTO CookieIngredients VALUES ('Almond delight', 'Flour', 400, 'g');
INSERT INTO CookieIngredients VALUES ('Almond delight', 'Butter', 400, 'g');
INSERT INTO CookieIngredients VALUES ('Almond delight', 'Sugar', 270, 'g');
INSERT INTO CookieIngredients VALUES ('Almond delight', 'Chopped almonds', 279, 'g');
INSERT INTO CookieIngredients VALUES ('Almond delight', 'Cinnamon', 10, 'g');

INSERT INTO CookieIngredients VALUES ('Berliner', 'Flour', 350, 'g');
INSERT INTO CookieIngredients VALUES ('Berliner', 'Butter', 250, 'g');
INSERT INTO CookieIngredients VALUES ('Berliner', 'Icing sugar', 100, 'g');
INSERT INTO CookieIngredients VALUES ('Berliner', 'Eggs', 50, 'g');
INSERT INTO CookieIngredients VALUES ('Berliner', 'Vanilla sugar', 5, 'g');
INSERT INTO CookieIngredients VALUES ('Berliner', 'Chocolate', 50, 'g');
