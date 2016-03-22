set foreign_key_checks = 0;
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
dateCreated DateTime NOT NULL,
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
/** FOREIGN KEY (userName) REFERENCES Customers (name) ON DELETE CASCADE ON UPDATE CASCADE */
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

INSERT INTO Ingredients VALUES ('Flour', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Butter', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Icing sugar', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Roasted, chopped nuts', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Fine-ground nuts', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Ground, roasted nuts', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Bread crumbs', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Sugar', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Egg whites', 100000, NOW(), 'dl');
INSERT INTO Ingredients VALUES ('Chocolate', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Marzipan', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Eggs', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Potato starch', 100000, NOW(), 'g');
INSERT INTO Ingredients VALUES ('Wheat flour', 100000, NOW(), 'g');

/**Cookies*/

INSERT INTO Cookies VALUES ('Nut ring');
INSERT INTO Cookies VALUES ('Nut cookie');
INSERT INTO Cookies VALUES ('Amneris');

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

