-- query to create tables

CREATE TABLE brands ( brandID INT AUTO_INCREMENT PRIMARY KEY, brandName VARCHAR(255) NOT NULL );
INSERT INTO brands (brandName) VALUES ('Intel'), ('AMD'), ('NVIDIA'), ('Corsair'), ('ASUS'), ('Gigabyte'), ('Seagate');

CREATE TABLE partTypes ( partTypeID INT AUTO_INCREMENT PRIMARY KEY, typeName VARCHAR(255) NOT NULL );
INSERT INTO partTypes (typeName) VALUES ('Processor'), ('Graphics Card'), ('Memory Module'), ('Motherboard'), ('Storage');

CREATE TABLE parts ( partID INT AUTO_INCREMENT PRIMARY KEY, partName VARCHAR(255) NOT NULL, partTypeID INT, brandID INT, price DECIMAL(10, 2) );

INSERT INTO parts (partName, partTypeID, brandID, price) VALUES ('Processor A', 1, 1, 199.99), ('Graphics Card X', 2, 3, 349.99), ('Memory Module B', 3, 4, 79.99), ('Motherboard Y', 4, 5, 149.99), ('Storage Z', 5, 7, 89.99), ('Processor B', 1, 2, 179.99), ('Graphics Card Y', 2, 3, 289.99), ('Memory Module A', 3, 4, 99.99), ('Motherboard X', 4, 6, 129.99), ('Storage A', 5, 7, 109.99), ('Processor C', 1, 1, 229.99), ('Graphics Card Z', 2, 3, 399.99);


ALTER TABLE parts ADD FOREIGN KEY (partTypeID) REFERENCES partTypes(partTypeID), ADD FOREIGN KEY (brandID) REFERENCES brands(brandID);

-- relational keys





