# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.

SET FOREIGN_KEY_CHECKS = 0;
# -----------------------------------------------------------------------
# users_user# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `users_user`;

CREATE TABLE `users_user`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'User Id',
    `username` VARCHAR(255) NOT NULL  COMMENT 'username',
    `password` VARCHAR(255) NOT NULL  COMMENT 'password',
    `active` INTEGER NOT NULL  COMMENT 'Is user active?',
    `created` DATETIME NOT NULL  COMMENT 'Creation date for',
    `updated` DATETIME NOT NULL  COMMENT 'Last update date',
    `levelId` INTEGER  COMMENT 'User Level',
    PRIMARY KEY(`id`),
    CONSTRAINT `users_user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users_userInfo` (`userId`),
    CONSTRAINT `users_user_ibfk_2` FOREIGN KEY (`levelId`) REFERENCES `users_level` (`id`),
    UNIQUE KEY `users_user_U_1` (`username`))
Type=MyISAM COMMENT='Users';
# -----------------------------------------------------------------------
# users_userInfo# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `users_userInfo`;

CREATE TABLE `users_userInfo`(
    `userId` INTEGER NOT NULL  COMMENT 'User Id',
    `name` VARCHAR(255)  COMMENT 'name',
    `surname` VARCHAR(255)  COMMENT 'surname',
    PRIMARY KEY(`userId`),
    CONSTRAINT `users_userInfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users_user` (`id`))
Type=MyISAM COMMENT='Information about users';
# -----------------------------------------------------------------------
# users_userGroup# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `users_userGroup`;

CREATE TABLE `users_userGroup`(
    `userId` INTEGER NOT NULL  COMMENT 'Group ID',
    `groupId` INTEGER NOT NULL  COMMENT 'Group ID',
    PRIMARY KEY(`userId`,`groupId`),
    CONSTRAINT `users_userGroup_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users_user` (`id`),
    CONSTRAINT `users_userGroup_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `users_group` (`id`))
Type=MyISAM COMMENT='Users / Groups';
# -----------------------------------------------------------------------
# users_group# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `users_group`;

CREATE TABLE `users_group`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
    `name` VARCHAR(255) NOT NULL  COMMENT 'Group Name',
    `created` DATETIME NOT NULL  COMMENT 'Creation date for',
    `updated` DATETIME NOT NULL  COMMENT 'Last update date',
    `bitLevel` INTEGER  COMMENT 'Nivel',
    PRIMARY KEY(`id`),
    UNIQUE KEY `users_group_U_1` (`name`))
Type=MyISAM COMMENT='Groups';
# -----------------------------------------------------------------------
# users_level# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `users_level`;

CREATE TABLE `users_level`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
    `name` VARCHAR(255) NOT NULL  COMMENT 'Level Name',
    `bitLevel` INTEGER  COMMENT 'Bit del nivel',
    PRIMARY KEY(`id`),
    UNIQUE KEY `users_level_U_1` (`name`))
Type=MyISAM COMMENT='Levels';
# -----------------------------------------------------------------------
# security_action# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `security_action`;

CREATE TABLE `security_action`(
    `action` VARCHAR(100) NOT NULL  COMMENT 'Action pagina',
    `module` VARCHAR(100)  COMMENT 'Modulo',
    `section` VARCHAR(100)  COMMENT 'Seccion',
    `access` INTEGER  COMMENT 'El acceso a ese action',
    `active` INTEGER  COMMENT 'Si el action esta activo o no',
    PRIMARY KEY(`action`))
Type=MyISAM COMMENT='Actions del sistema';
# -----------------------------------------------------------------------
# affiliate# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `affiliate`;

CREATE TABLE `affiliate`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id afiliado',
    `name` VARCHAR(255) NOT NULL  COMMENT 'nombre afiliado',
    PRIMARY KEY(`id`),
    CONSTRAINT `affiliate_ibfk_1` FOREIGN KEY (`id`) REFERENCES `affiliateInfo` (`affiliateId`))
Type=MyISAM COMMENT='Afiliados';
# -----------------------------------------------------------------------
# affiliateInfo# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `affiliateInfo`;

CREATE TABLE `affiliateInfo`(
    `affiliateId` INTEGER NOT NULL  COMMENT 'Id afiliado',
    `affiliateInternalNumber` INTEGER NOT NULL  COMMENT 'Id interno',
    `address` VARCHAR(255)  COMMENT 'Direccion afiliado',
    `phone` VARCHAR(50)  COMMENT 'Telefono afiliado',
    `email` VARCHAR(50)  COMMENT 'Email afiliado',
    `contact` VARCHAR(50)  COMMENT 'Nombre de persona de contacto',
    PRIMARY KEY(`affiliateId`),
    CONSTRAINT `affiliateInfo_ibfk_1` FOREIGN KEY (`affiliateId`) REFERENCES `affiliate` (`id`))
Type=MyISAM COMMENT='Informacion del afiliado';
# -----------------------------------------------------------------------
# usersByAffiliate_user# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `usersByAffiliate_user`;

CREATE TABLE `usersByAffiliate_user`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'User Id',
    `affiliateId` INTEGER NOT NULL  COMMENT 'Id afiliado',
    `username` VARCHAR(255) NOT NULL  COMMENT 'username',
    `password` VARCHAR(255) NOT NULL  COMMENT 'password',
    `active` INTEGER NOT NULL  COMMENT 'Is user active?',
    `created` DATETIME NOT NULL  COMMENT 'Creation date for',
    `updated` DATETIME NOT NULL  COMMENT 'Last update date',
    `levelId` INTEGER  COMMENT 'User Level',
    PRIMARY KEY(`id`),
    CONSTRAINT `usersByAffiliate_user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usersByAffiliate_userInfo` (`userId`),
    CONSTRAINT `usersByAffiliate_user_ibfk_2` FOREIGN KEY (`levelId`) REFERENCES `usersByAffiliate_level` (`id`),
    CONSTRAINT `usersByAffiliate_user_ibfk_3` FOREIGN KEY (`affiliateId`) REFERENCES `affiliate` (`id`),
    UNIQUE KEY `usersByAffiliate_user_U_1` (`username`))
Type=MyISAM COMMENT='Usuarios de afiliado';
# -----------------------------------------------------------------------
# usersByAffiliate_userInfo# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `usersByAffiliate_userInfo`;

CREATE TABLE `usersByAffiliate_userInfo`(
    `userId` INTEGER NOT NULL  COMMENT 'User Id',
    `name` VARCHAR(255)  COMMENT 'name',
    `surname` VARCHAR(255)  COMMENT 'surname',
    PRIMARY KEY(`userId`),
    CONSTRAINT `usersByAffiliate_userInfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usersByAffiliate_user` (`id`))
Type=MyISAM COMMENT='Information about users by affiliates';
# -----------------------------------------------------------------------
# usersByAffiliate_level# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `usersByAffiliate_level`;

CREATE TABLE `usersByAffiliate_level`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
    `name` VARCHAR(255) NOT NULL  COMMENT 'Level Name',
    `bitLevel` INTEGER  COMMENT 'Bit del nivel',
    PRIMARY KEY(`id`),
    UNIQUE KEY `usersByAffiliate_level_U_1` (`name`))
Type=MyISAM COMMENT='Levels';
# -----------------------------------------------------------------------
# usersByAffiliate_userGroup# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `usersByAffiliate_userGroup`;

CREATE TABLE `usersByAffiliate_userGroup`(
    `userId` INTEGER NOT NULL  COMMENT 'Group ID',
    `groupId` INTEGER NOT NULL  COMMENT 'Group ID',
    PRIMARY KEY(`userId`,`groupId`),
    CONSTRAINT `usersByAffiliate_userGroup_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usersByAffiliate_user` (`id`),
    CONSTRAINT `usersByAffiliate_userGroup_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `usersByAffiliate_group` (`id`))
Type=MyISAM COMMENT='Users / Groups';
# -----------------------------------------------------------------------
# usersByAffiliate_group# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `usersByAffiliate_group`;

CREATE TABLE `usersByAffiliate_group`(
    `id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
    `name` VARCHAR(255) NOT NULL  COMMENT 'Group Name',
    `created` DATETIME NOT NULL  COMMENT 'Creation date for',
    `updated` DATETIME NOT NULL  COMMENT 'Last update date',
    `bitLevel` INTEGER  COMMENT 'Nivel',
    PRIMARY KEY(`id`),
    UNIQUE KEY `usersByAffiliate_group_U_1` (`name`))
Type=MyISAM COMMENT='Groups';
# -----------------------------------------------------------------------
# category# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL  COMMENT 'Category name',
    `active` INTEGER NOT NULL  COMMENT 'Is category active?',
    PRIMARY KEY(`id`))
Type=MyISAM COMMENT='Categorias';
# -----------------------------------------------------------------------
# users_groupCategory# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `users_groupCategory`;

CREATE TABLE `users_groupCategory`(
    `groupId` INTEGER NOT NULL  COMMENT 'Group ID',
    `categoryId` INTEGER NOT NULL  COMMENT 'Category ID',
    PRIMARY KEY(`groupId`,`categoryId`),
    CONSTRAINT `users_groupCategory_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `users_group` (`id`),
    CONSTRAINT `users_groupCategory_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`))
Type=MyISAM COMMENT='Groups / Categories';
# -----------------------------------------------------------------------
# usersByAffiliate_groupCategory# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `usersByAffiliate_groupCategory`;

CREATE TABLE `usersByAffiliate_groupCategory`(
    `groupId` INTEGER NOT NULL  COMMENT 'Group ID',
    `categoryId` INTEGER NOT NULL  COMMENT 'Category ID',
    PRIMARY KEY(`groupId`,`categoryId`),
    CONSTRAINT `usersByAffiliate_groupCategory_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `usersByAffiliate_group` (`id`),
    CONSTRAINT `usersByAffiliate_groupCategory_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`))
Type=MyISAM COMMENT='Groups / Categories';
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
# This restores the fkey checks, after having unset them
# in database-start.tpl

SET FOREIGN_KEY_CHECKS = 1;

