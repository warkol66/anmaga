
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- MLUSE_Text
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `MLUSE_Text`;


CREATE TABLE `MLUSE_Text`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`languageId` INTEGER  NOT NULL,
	`text` TEXT  NOT NULL,
	PRIMARY KEY (`id`,`languageId`),
	INDEX `MLUSE_Text_FI_1` (`languageId`),
	CONSTRAINT `MLUSE_Text_FK_1`
		FOREIGN KEY (`languageId`)
		REFERENCES `MLUSE_Language` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- MLUSE_Language
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `MLUSE_Language`;


CREATE TABLE `MLUSE_Language`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	`code` VARCHAR(30)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
