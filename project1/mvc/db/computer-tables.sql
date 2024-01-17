-- SQL queries

CREATE TABLE ComputerParts ( PartID INT PRIMARY KEY AUTO_INCREMENT, PartName VARCHAR(255) NOT NULL, PartTypeID INT, BrandID INT, Price DECIMAL(10, 2) NOT NULL, Compatibility VARCHAR(255) NOT NULL );

INSERT INTO `ComputerParts` (`PartID`, `PartName`, `PartTypeID`, `BrandID`, `Price`, `Compatibility`) VALUES 
(NULL, 'Processor A', '1', '1', '199.99', '1'), 
(NULL, 'Graphics Card X', '2', '3', '349.99', '2');

INSERT INTO `ComputerParts` (`PartID`, `PartName`, `PartTypeID`, `BrandID`, `Price`, `Compatibility`) VALUES 
(NULL, 'Memory Module B', '3', '4', '79.99', '4'),
(NULL, 'Motherboard Y', '4', '5', '149.99', '5'),

-- (NULL, 'Storage Z', '5', '5', '89.99', '7'),
-- (NULL, 'Processor B', '1', '2', '179.99', '2'),
-- (NULL, 'Graphics Card Y', '2', '3', '289.99', '3'),
-- (NULL, 'Memory Module A', '3', '4', '99.99', '4'),
-- (NULL, 'Motherboard X', '4', '4', '129.99', '6'),
-- (NULL, 'Storage A', '5', '5', '109.99', '7'),
-- (NULL, 'Processor C', '1', '1', '229.99', '1'),
-- (NULL, 'Graphics Card Z', '2', '3', '399.99', '3');

CREATE TABLE computerBrands ( brandID INT PRIMARY KEY AUTO_INCREMENT, brandName VARCHAR(255) NOT NULL );
INSERT INTO computerBrands (brandID, brandName) VALUES (1, 'Intel'), (2, 'AMD'), (3, 'NVIDIA'), (4, 'Corsair'), (5, 'ASUS'), (6, 'Gigabyte'), (7, 'Seagate');

CREATE TABLE ComputerPartTypes ( PartTypeID INT PRIMARY KEY AUTO_INCREMENT, TypeName VARCHAR(255) NOT NULL );
INSERT INTO ComputerPartTypes (PartTypeID, TypeName) VALUES (1, 'Processor'), (2, 'Graphics Card'), (3, 'Memory Module'), (4, 'Motherboard'), (5, 'Storage');

CREATE TABLE `ComputerCompatibility` (`CompatibilityId` INT NOT NULL AUTO_INCREMENT , `CompatibleWith` VARCHAR(256) NOT NULL , PRIMARY KEY (`CompatibilityId`)) ENGINE = InnoDB;
INSERT INTO ComputerCompatibility (CompatibleWith) VALUES ('Intel'), ('NVIDIA'), ('Corsair'), ('ASUS'), ('Seagate');



-- changes made, also I fixed the original query above so this is only for reference

ALTER TABLE `ComputerParts` CHANGE `PartID` `PartID` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `Compatibility` `CompatibilityId` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

-- foreign key constraint

ALTER TABLE `ComputerParts` ADD CONSTRAINT `BrandID` FOREIGN KEY (`BrandID`) REFERENCES `ComputerBrands`(`BrandID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `ComputerParts` ADD CONSTRAINT `PartTypeID` FOREIGN KEY (`PartTypeID`) REFERENCES `ComputerPartTypes`(`PartTypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `ComputerParts` ADD CONSTRAINT `CompatibilityId` FOREIGN KEY (`CompatibilityId`) REFERENCES `ComputerCompatibility`(`CompatibilityId`) ON DELETE RESTRICT ON UPDATE RESTRICT;   


-- Queries

SELECT * FROM ComputerParts, ComputerPartTypes, ComputerBrands, ComputerCompatibility;


-- join queries

SELECT * FROM ComputerParts
JOIN ComputerPartTypes ON ComputerParts.PartTypeID = ComputerPartTypes.PartTypeID
JOIN ComputerBrands ON ComputerParts.BrandID = ComputerBrands.BrandID
JOIN ComputerCompatibility ON ComputerParts.CompatibilityId = ComputerCompatibility.CompatibilityId