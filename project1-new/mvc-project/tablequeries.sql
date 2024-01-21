-- query to create tables

CREATE TABLE brands ( brandID INT AUTO_INCREMENT PRIMARY KEY, brandName VARCHAR(255) NOT NULL );
INSERT INTO brands (brandName) VALUES ('Intel'), ('AMD'), ('NVIDIA'), ('Corsair'), ('ASUS'), ('Gigabyte'), ('Seagate');

CREATE TABLE partTypes ( partTypeID INT AUTO_INCREMENT PRIMARY KEY, typeName VARCHAR(255) NOT NULL );
INSERT INTO partTypes (typeName) VALUES ('Processor'), ('Graphics Card'), ('Memory Module'), ('Motherboard'), ('Storage');

CREATE TABLE compatibility ( compatibilityId INT AUTO_INCREMENT PRIMARY KEY, compatibleWith VARCHAR(255) NOT NULL );
INSERT INTO compatibility (compatibleWith) VALUES ('Intel,AMD'), ('NVIDIA'), ('Corsair'), ('ASUS,Gigabyte'), ('Seagate');

CREATE TABLE parts (
    partID INT AUTO_INCREMENT PRIMARY KEY,
    partName VARCHAR(255) NOT NULL,
    partTypeID INT,
    brandID INT,
    price DECIMAL(10, 2),
    compatibilityId INT,
    FOREIGN KEY (partTypeID) REFERENCES partTypes(partTypeID),
    FOREIGN KEY (brandID) REFERENCES brands(brandID),
    FOREIGN KEY (compatibilityId) REFERENCES compatibility(compatibilityId)
);

INSERT INTO parts (partName, partTypeID, brandID, price, compatibilityId) VALUES
('Processor A', 1, 1, 199.99, 1),
('Graphics Card X', 2, 3, 349.99, 2),
('Memory Module B', 3, 4, 79.99, 3),
('Motherboard Y', 4, 5, 149.99, 4),
('Storage Z', 5, 7, 89.99, 5),
('Processor B', 1, 2, 179.99, 1),
('Graphics Card Y', 2, 3, 289.99, 2),
('Memory Module A', 3, 4, 99.99, 3),
('Motherboard X', 4, 6, 129.99, 4),
('Storage A', 5, 7, 109.99, 5),
('Processor C', 1, 1, 229.99, 1),
('Graphics Card Z', 2, 3, 399.99, 2);

-- relational keys





