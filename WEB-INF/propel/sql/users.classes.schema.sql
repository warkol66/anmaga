
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- users_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_user`;


CREATE TABLE `users_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`passwordUpdated` DATE   COMMENT 'Fecha de actualizacion de la clave',
	`active` TINYINT  NOT NULL COMMENT 'Is user active?',
	`levelId` INTEGER   COMMENT 'User Level',
	`lastLogin` DATETIME   COMMENT 'Fecha del ultimo login del usuario',
	`timezone` VARCHAR(25)   COMMENT 'Timezone GMT del usuario',
	`recoveryHash` VARCHAR(255)   COMMENT 'Hash enviado para la recuperacion de clave',
	`recoveryHashCreatedOn` DATETIME   COMMENT 'Momento de la solicitud para la recuperacion de clave',
	`name` VARCHAR(90)   COMMENT 'Nombre',
	`surname` VARCHAR(90)   COMMENT 'Apellido',
	`mailAddress` VARCHAR(90)   COMMENT 'Direccion electronica',
	`mailAddressAlt` VARCHAR(90)   COMMENT 'Direccion electronica alternativa',
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_user_U_1` (`username`),
	INDEX `users_user_FI_1` (`levelId`),
	CONSTRAINT `users_user_FK_1`
		FOREIGN KEY (`levelId`)
		REFERENCES `users_level` (`id`)
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Users';

#-----------------------------------------------------------------------------
#-- users_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userInfo`;


CREATE TABLE `users_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255)   COMMENT 'name',
	`surname` VARCHAR(255)   COMMENT 'surname',
	`mailAddress` VARCHAR(255)   COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `users_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
) ENGINE=MyISAM COMMENT='Information about users';

#-----------------------------------------------------------------------------
#-- users_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userGroup`;


CREATE TABLE `users_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `users_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `users_userGroup_FI_2` (`groupId`),
	CONSTRAINT `users_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- users_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_group`;


CREATE TABLE `users_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER   COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_group_U_1` (`name`)
) ENGINE=MyISAM COMMENT='Groups';

#-----------------------------------------------------------------------------
#-- users_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_level`;


CREATE TABLE `users_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER   COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_level_U_1` (`name`)
) ENGINE=MyISAM COMMENT='Levels';

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
		REFERENCES `category` (`id`)
) ENGINE=MyISAM COMMENT='Groups / Categories';

#-----------------------------------------------------------------------------
#-- usersByRegistration_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByRegistration_user`;


CREATE TABLE `usersByRegistration_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` TINYINT  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`ip` VARCHAR(255)  NOT NULL COMMENT 'Registration IP',
	`lastLogin` DATETIME   COMMENT 'Fecha del ultimo login del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `usersByRegistration_user_U_1` (`username`),
	CONSTRAINT `usersByRegistration_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `usersByRegistration_userInfo` (`userId`)
) ENGINE=MyISAM COMMENT='Users by registration';

#-----------------------------------------------------------------------------
#-- usersByRegistration_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByRegistration_userInfo`;


CREATE TABLE `usersByRegistration_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'UserByRegistration Id',
	`name` VARCHAR(255)   COMMENT 'name',
	`surname` VARCHAR(255)   COMMENT 'surname',
	`mailAddress` VARCHAR(255)   COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `usersByRegistration_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `usersByRegistration_user` (`id`)
) ENGINE=MyISAM COMMENT='Information about users by registration';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
