-- Since the database is already made, we need a way to UPDATE it, instead of deleting the whole database and 'restarting'
-- version 4.9.0.1
-- Enter the commands that need to be done to go to a new database version below. 
--

INSERT INTO `school`(`schoolnaam`) VALUES ('Geen');

-- New table
CREATE TABLE `hboictmemes`.`version` ( `version` VARCHAR(25) NULL DEFAULT NULL ) ENGINE = InnoDB;

-- Enter versionnumber
INSERT INTO `version`(`version`) VALUES ('1.2');