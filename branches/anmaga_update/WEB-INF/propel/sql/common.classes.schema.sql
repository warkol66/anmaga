
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- actionLogs_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_log`;


CREATE TABLE `actionLogs_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id log',
	`userObjectType` VARCHAR(50)  NOT NULL COMMENT 'Tipo de usuario',
	`userObjectId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`datetime` DATETIME  NOT NULL COMMENT 'Fecha en que se logueo el dato',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se logueo el dato',
	`object` VARCHAR(100)  NOT NULL COMMENT 'objeto sobre el cual se realizo la accion',
	`forward` VARCHAR(100)   COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`),
	INDEX `actionLogs_log_FI_1` (`userId`),
	CONSTRAINT `actionLogs_log_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `actionLogs_log_FI_2` (`action`),
	CONSTRAINT `actionLogs_log_FK_2`
		FOREIGN KEY (`action`)
		REFERENCES `security_action` (`action`)
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='logs de acciones del sistema';

#-----------------------------------------------------------------------------
#-- actionLogs_label
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_label`;


CREATE TABLE `actionLogs_label`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id Label',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se loguea el dato',
	`label` VARCHAR(100)  NOT NULL COMMENT 'mensaje del log',
	`language` VARCHAR(100)   COMMENT 'idioma de la etiqueta',
	`forward` VARCHAR(100)   COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`,`action`)
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Etiquetas de los logs';

#-----------------------------------------------------------------------------
#-- common_menuItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `common_menuItem`;


CREATE TABLE `common_menuItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`action` VARCHAR(100)   COMMENT 'Nombre de la accion a ejecutar',
	`url` VARCHAR(255)   COMMENT 'Direccion del enlace',
	`order` INTEGER   COMMENT 'Indice de ordenamiento',
	`parentId` INTEGER   COMMENT 'Id item padre',
	`newWindow` BOOL default 0 NOT NULL COMMENT 'Abrir el enlace en nueva ventana',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Items de los menues dinamicos';

#-----------------------------------------------------------------------------
#-- common_menuItemInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `common_menuItemInfo`;


CREATE TABLE `common_menuItemInfo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`menuItemId` INTEGER  NOT NULL,
	`name` VARCHAR(100)  NOT NULL COMMENT 'Nombre a mostrar en el item',
	`title` VARCHAR(255)   COMMENT 'Titulo a mostrar en el item',
	`description` TEXT   COMMENT 'Descripcion del item',
	`language` VARCHAR(100)  NOT NULL COMMENT 'Idioma',
	PRIMARY KEY (`id`),
	INDEX `common_menuItemInfo_FI_1` (`menuItemId`),
	CONSTRAINT `common_menuItemInfo_FK_1`
		FOREIGN KEY (`menuItemId`)
		REFERENCES `common_menuItem` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Items de los menues dinamicos';

#-----------------------------------------------------------------------------
#-- common_alertSubscription
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `common_alertSubscription`;


CREATE TABLE `common_alertSubscription`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)   COMMENT 'Nombre de la suscripcion',
	`entityName` VARCHAR(50)   COMMENT 'Nombre unico de la entidad asociada.',
	`entityDateFieldUniqueName` VARCHAR(100)   COMMENT 'Nombre unico del campo fecha',
	`entityBooleanFieldUniqueName` VARCHAR(100)   COMMENT 'Nombre unico del campo a evaluar por verdadero o falso.',
	`anticipationDays` INTEGER   COMMENT 'Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.',
	`entityNameFieldUniqueName` VARCHAR(100)   COMMENT 'Campo a imprimir en representacion del nombre de cada instancia de la entidad',
	`extraRecipients` TEXT   COMMENT 'Destinatarios extra',
	PRIMARY KEY (`id`),
	INDEX `common_alertSubscription_FI_1` (`entityName`),
	CONSTRAINT `common_alertSubscription_FK_1`
		FOREIGN KEY (`entityName`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE CASCADE,
	INDEX `common_alertSubscription_FI_2` (`entityNameFieldUniqueName`),
	CONSTRAINT `common_alertSubscription_FK_2`
		FOREIGN KEY (`entityNameFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	INDEX `common_alertSubscription_FI_3` (`entityDateFieldUniqueName`),
	CONSTRAINT `common_alertSubscription_FK_3`
		FOREIGN KEY (`entityDateFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	INDEX `common_alertSubscription_FI_4` (`entityBooleanFieldUniqueName`),
	CONSTRAINT `common_alertSubscription_FK_4`
		FOREIGN KEY (`entityBooleanFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Suscripciones de alerta';

#-----------------------------------------------------------------------------
#-- common_alertSubscriptionUser
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `common_alertSubscriptionUser`;


CREATE TABLE `common_alertSubscriptionUser`
(
	`alertSubscriptionId` INTEGER  NOT NULL,
	`userId` INTEGER  NOT NULL,
	PRIMARY KEY (`alertSubscriptionId`,`userId`),
	CONSTRAINT `common_alertSubscriptionUser_FK_1`
		FOREIGN KEY (`alertSubscriptionId`)
		REFERENCES `common_alertSubscription` (`id`)
		ON DELETE CASCADE,
	INDEX `common_alertSubscriptionUser_FI_2` (`userId`),
	CONSTRAINT `common_alertSubscriptionUser_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Relacion AlertSubscription - User';

#-----------------------------------------------------------------------------
#-- common_scheduleSubscription
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `common_scheduleSubscription`;


CREATE TABLE `common_scheduleSubscription`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)   COMMENT 'Nombre de la suscripcion',
	`entityName` VARCHAR(50)   COMMENT 'Nombre unico de la entidad asociada.',
	`entityDateFieldUniqueName` VARCHAR(100)   COMMENT 'Nombre unico del campo fecha',
	`entityBooleanFieldUniqueName` VARCHAR(100)   COMMENT 'Nombre unico del campo a evaluar por verdadero o falso.',
	`anticipationDays` INTEGER   COMMENT 'Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.',
	`entityNameFieldUniqueName` VARCHAR(100)   COMMENT 'Campo a imprimir en representacion del nombre de cada instancia de la entidad',
	`extraRecipients` TEXT   COMMENT 'Destinatarios extra',
	PRIMARY KEY (`id`),
	INDEX `common_scheduleSubscription_FI_1` (`entityName`),
	CONSTRAINT `common_scheduleSubscription_FK_1`
		FOREIGN KEY (`entityName`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE CASCADE,
	INDEX `common_scheduleSubscription_FI_2` (`entityNameFieldUniqueName`),
	CONSTRAINT `common_scheduleSubscription_FK_2`
		FOREIGN KEY (`entityNameFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	INDEX `common_scheduleSubscription_FI_3` (`entityDateFieldUniqueName`),
	CONSTRAINT `common_scheduleSubscription_FK_3`
		FOREIGN KEY (`entityDateFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	INDEX `common_scheduleSubscription_FI_4` (`entityBooleanFieldUniqueName`),
	CONSTRAINT `common_scheduleSubscription_FK_4`
		FOREIGN KEY (`entityBooleanFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Suscripciones de schedulea';

#-----------------------------------------------------------------------------
#-- common_scheduleSubscriptionUser
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `common_scheduleSubscriptionUser`;


CREATE TABLE `common_scheduleSubscriptionUser`
(
	`scheduleSubscriptionId` INTEGER  NOT NULL,
	`userId` INTEGER  NOT NULL,
	PRIMARY KEY (`scheduleSubscriptionId`,`userId`),
	CONSTRAINT `common_scheduleSubscriptionUser_FK_1`
		FOREIGN KEY (`scheduleSubscriptionId`)
		REFERENCES `common_scheduleSubscription` (`id`)
		ON DELETE CASCADE,
	INDEX `common_scheduleSubscriptionUser_FI_2` (`userId`),
	CONSTRAINT `common_scheduleSubscriptionUser_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Relacion ScheduleSubscription - User';

#-----------------------------------------------------------------------------
#-- node
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `node`;


CREATE TABLE `node`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del nodo',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre del nodo',
	`kind` VARCHAR(255)  NOT NULL COMMENT 'Tipo de nodo',
	`objectId` INTEGER   COMMENT 'Id del objeto relacionado al nodo',
	`parentId` INTEGER   COMMENT 'Id del nodo padre',
	`position` INTEGER   COMMENT 'Orden entre los hermanos del nodo',
	PRIMARY KEY (`id`),
	INDEX `node_FI_1` (`parentId`),
	CONSTRAINT `node_FK_1`
		FOREIGN KEY (`parentId`)
		REFERENCES `node` (`id`)
) ENGINE=MyISAM COMMENT='Nodo del Arbol';

#-----------------------------------------------------------------------------
#-- branch
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `branch`;


CREATE TABLE `branch`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la sucursal',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`number` INTEGER  NOT NULL COMMENT 'Numero de la sucursal',
	`code` VARCHAR(20)   COMMENT 'Codigo de la sucursal',
	`name` VARCHAR(255)   COMMENT 'Nombre de la sucursal',
	`phone` VARCHAR(100)   COMMENT 'Telefono de la sucursal',
	`contact` VARCHAR(50)   COMMENT 'Nombre de persona de contacto',
	`contactEmail` VARCHAR(100)   COMMENT 'Email de persona de contacto',
	`memo` TEXT   COMMENT 'Informacion adicional de la sucursal',
	PRIMARY KEY (`id`),
	INDEX `branch_FI_1` (`affiliateId`),
	CONSTRAINT `branch_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
) ENGINE=MyISAM COMMENT='Sucursales de Afiliados';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
