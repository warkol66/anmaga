
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- categories_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categories_category`;


CREATE TABLE `categories_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`parentId` INTEGER default 0 NOT NULL COMMENT 'Parent Category if it has',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Category name',
	`module` VARCHAR(255) default '' COMMENT 'Module name if it is for a module',
	`active` TINYINT  NOT NULL COMMENT 'Is category active?',
	`isPublic` TINYINT default 0 NOT NULL COMMENT 'Is category public?',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM COMMENT='Categorias';

#-----------------------------------------------------------------------------
#-- users_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_groupCategory`;


CREATE TABLE `users_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `users_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
		ON DELETE CASCADE,
	INDEX `users_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `users_groupCategory_FK_2`
		FOREIGN KEY (`categoryId`)
		REFERENCES `categories_category` (`id`)
) ENGINE=MyISAM COMMENT='Groups / Categories';

#-----------------------------------------------------------------------------
#-- affiliates_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_groupCategory`;


CREATE TABLE `affiliates_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `affiliates_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `affiliates_group` (`id`)
		ON DELETE CASCADE,
	INDEX `affiliates_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `affiliates_groupCategory_FK_2`
		FOREIGN KEY (`categoryId`)
		REFERENCES `categories_category` (`id`)
) ENGINE=MyISAM COMMENT='Groups / Categories';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
