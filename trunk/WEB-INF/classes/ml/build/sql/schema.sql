# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.

SET FOREIGN_KEY_CHECKS = 0;
# -----------------------------------------------------------------------
# Text# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `Text`;

CREATE TABLE `Text`(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `languageId` INTEGER NOT NULL ,
    `text` VARCHAR(255) NOT NULL ,
    PRIMARY KEY(`id`,`languageId`),
    CONSTRAINT `Text_ibfk_1` FOREIGN KEY (`languageId`) REFERENCES `Language` (`id`))
Type=MyISAM;
# -----------------------------------------------------------------------
# Language# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `Language`;

CREATE TABLE `Language`(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL ,
    `code` VARCHAR(30) NOT NULL ,
    PRIMARY KEY(`id`))
Type=MyISAM;
  
  
# This restores the fkey checks, after having unset them
# in database-start.tpl

SET FOREIGN_KEY_CHECKS = 1;

start.tpl

SET FOREIGN_KEY_CHECKS = 1;

