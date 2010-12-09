
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
	`active` BOOL  NOT NULL COMMENT 'Is user active?',
	`levelId` INTEGER(4)   COMMENT 'User Level',
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
#-- users_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userGroup`;


CREATE TABLE `users_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'User ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `users_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `users_userGroup_FI_2` (`groupId`),
	CONSTRAINT `users_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Users / Groups';

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
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Groups';

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
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Levels';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
