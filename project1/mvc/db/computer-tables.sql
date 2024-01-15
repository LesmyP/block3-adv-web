-- SQL queries

CREATE TABLE ComputerParts ( PartID INT PRIMARY KEY AUTO_INCREMENT, PartName VARCHAR(255) NOT NULL, PartTypeID INT, BrandID INT, Price DECIMAL(10, 2) NOT NULL, Compatibility VARCHAR(255) NOT NULL );
INSERT INTO ComputerParts (PartID, PartName, PartTypeID, BrandID, Price, CompatibilityId) VALUES (1, 'Processor A', 1, 1, 199.99, 'Intel,AMD'), (2, 'Graphics Card X', 2, 3, 349.99, 'NVIDIA'), (3, 'Memory Module B', 3, 4, 79.99, 'Corsair'), (4, 'Motherboard Y', 4, 5, 149.99, 'ASUS,Gigabyte'), (5, 'Storage Z', 5, 7, 89.99, 'Seagate'), (6, 'Processor B', 1, 2, 179.99, 'AMD'), (7, 'Graphics Card Y', 2, 3, 289.99, 'NVIDIA'), (8, 'Memory Module A', 3, 4, 99.99, 'Corsair'), (9, 'Motherboard X', 4, 6, 129.99, 'Gigabyte'), (10, 'Storage A', 5, 7, 109.99, 'Seagate'), (11, 'Processor C', 1, 1, 229.99, 'Intel,AMD'), (12, 'Graphics Card Z', 2, 3, 399.99, 'NVIDIA');

CREATE TABLE ComputerBrands ( BrandID INT PRIMARY KEY AUTO_INCREMENT, BrandName VARCHAR(255) NOT NULL );
INSERT INTO ComputerBrands (BrandID, BrandName) VALUES (1, 'Intel'), (2, 'AMD'), (3, 'NVIDIA'), (4, 'Corsair'), (5, 'ASUS'), (6, 'Gigabyte'), (7, 'Seagate');

CREATE TABLE ComputerPartTypes ( PartTypeID INT PRIMARY KEY AUTO_INCREMENT, TypeName VARCHAR(255) NOT NULL );
INSERT INTO ComputerPartTypes (PartTypeID, TypeName) VALUES (1, 'Processor'), (2, 'Graphics Card'), (3, 'Memory Module'), (4, 'Motherboard'), (5, 'Storage');

CREATE TABLE ComputerCompatibility ( CompatibilityId INT PRIMARY KEY AUTO_INCREMENT, CompatibleWith VARCHAR(255) NOT NULL );
INSERT INTO ComputerCompatibility (CompatibleWith) VALUES ('Intel'), ('NVIDIA'), ('Corsair'), ('ASUS'), ('Seagate');



-- changes made, also I fixed the original query above so this is only for reference

ALTER TABLE `ComputerParts` CHANGE `PartID` `PartID` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `Compatibility` `CompatibilityId` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

-- foreign key constraint

ALTER TABLE `ComputerParts` ADD CONSTRAINT `BrandID` FOREIGN KEY (`BrandID`) REFERENCES `ComputerBrands`(`BrandID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `ComputerParts` ADD CONSTRAINT `PartTypeID` FOREIGN KEY (`PartTypeID`) REFERENCES `ComputerPartTypes`(`PartTypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `ComputerParts` ADD CONSTRAINT `CompatibilityId` FOREIGN KEY (`CompatibilityId`) REFERENCES `ComputerCompatibility`(`CompatibilityId`) ON DELETE RESTRICT ON UPDATE RESTRICT;   


