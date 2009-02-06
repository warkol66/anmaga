
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- affiliates_affiliate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_affiliate`;


CREATE TABLE `affiliates_affiliate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id afiliado',
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre afiliado',
	`ownerId` INTEGER COMMENT 'Id del usuario administrador del afiliado',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_affiliate_U_1` (`name`)
)Type=MyISAM COMMENT='Afiliados';

#-----------------------------------------------------------------------------
#-- affiliates_affiliateInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_affiliateInfo`;


CREATE TABLE `affiliates_affiliateInfo`
(
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`affiliateInternalNumber` INTEGER  NOT NULL COMMENT 'Id interno',
	`address` VARCHAR(255) COMMENT 'Direccion afiliado',
	`phone` VARCHAR(50) COMMENT 'Telefono afiliado',
	`email` VARCHAR(50) COMMENT 'Email afiliado',
	`contact` VARCHAR(50) COMMENT 'Nombre de persona de contacto',
	`contactEmail` VARCHAR(100) COMMENT 'Email de persona de contacto',
	`web` VARCHAR(255) COMMENT 'Direccion web del afiliado',
	`memo` TEXT COMMENT 'Informacion adicional del afiliado',
	PRIMARY KEY (`affiliateId`)
)Type=MyISAM COMMENT='Informacion del afiliado';

#-----------------------------------------------------------------------------
#-- affiliates_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_user`;


CREATE TABLE `affiliates_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` TINYINT  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`timezone` VARCHAR(100) COMMENT 'Timezone GMT del usuario afiliado',
	`levelId` INTEGER COMMENT 'User Level',
	`lastLogin` DATETIME COMMENT 'Fecha del ultimo login del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_user_U_1` (`username`),
	INDEX `affiliates_user_FI_1` (`levelId`),
	CONSTRAINT `affiliates_user_FK_1`
		FOREIGN KEY (`levelId`)
		REFERENCES `affiliates_level` (`id`),
	INDEX `affiliates_user_FI_2` (`affiliateId`),
	CONSTRAINT `affiliates_user_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Usuarios de afiliado';

#-----------------------------------------------------------------------------
#-- affiliates_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_userInfo`;


CREATE TABLE `affiliates_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `affiliates_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Information about users by affiliates';

#-----------------------------------------------------------------------------
#-- affiliates_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_level`;


CREATE TABLE `affiliates_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_level_U_1` (`name`)
)Type=MyISAM COMMENT='Levels';

#-----------------------------------------------------------------------------
#-- affiliates_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_userGroup`;


CREATE TABLE `affiliates_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `affiliates_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`),
	INDEX `affiliates_userGroup_FI_2` (`groupId`),
	CONSTRAINT `affiliates_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `affiliates_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- affiliates_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_group`;


CREATE TABLE `affiliates_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_group_U_1` (`name`)
)Type=MyISAM COMMENT='Groups';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
