==============================
Revisión 631 - Fecha 20101224
------------------------------

ALTER TABLE  `security_action` CHANGE  `accessUsersByAffiliate`  `accessAffiliateUser` INT( 11 ) NULL DEFAULT NULL COMMENT  'El acceso a ese action para los usuarios por afiliados';
ALTER TABLE  `security_action` ADD  `accessRegistrationUser` INT NULL COMMENT  'El acceso a ese action para los usuarios por registracion' AFTER  `accessAffiliateUser`;
ALTER TABLE  `security_action` ADD  `noCheckLogin` BOOLEAN NULL COMMENT  'Si no se chequea login ese action';

ALTER TABLE `security_module` ADD `accessAffiliateUser` INTEGER COMMENT 'El acceso a ese modulo para los usuarios por afiliados';
ALTER TABLE `security_module` ADD `accessRegistrationUser` INTEGER COMMENT 'El acceso a ese modulo para los usuarios por registracion';
ALTER TABLE `security_module` ADD `noCheckLogin` TINYINT default 0 COMMENT 'Si no se chequea login ese modulo';

==============================
Revisión 638 - Fecha 20101224
------------------------------
#-----------------------------------------------------------------------------
#-- users_user
#-----------------------------------------------------------------------------

ALTER TABLE users_user
ADD 	`passwordUpdated` DATE   COMMENT 'Fecha de actualizacion de la clave',
ADD 	`recoveryHash` VARCHAR(255)   COMMENT 'Hash enviado para la recuperacion de clave',
ADD 	`recoveryHashCreatedOn` DATETIME   COMMENT 'Momento de la solicitud para la recuperacion de clave',
ADD 	`name` VARCHAR(90)   COMMENT 'Nombre',
ADD 	`surname` VARCHAR(90)   COMMENT 'Apellido',
ADD 	`mailAddress` VARCHAR(90)   COMMENT 'Direccion electronica',
ADD 	`mailAddressAlt` VARCHAR(90)   COMMENT 'Direccion electronica alternativa',
ADD 	`deleted_at` DATETIME,
ADD 	`created_at` DATETIME,
ADD 	`updated_at` DATETIME,
DROP `updated`,
DROP `created`;

UPDATE `users_user` ,`users_userInfo` SET `users_user`.`name` = `users_userInfo`.`name`,
`users_user`.`surname` = `users_userInfo`.`surname`,
`users_user`.`mailAddress` = `users_userInfo`.`mailAddress`,
`passwordUpdated` = '2010-01-01'
 WHERE `users_userInfo`.`userId` = `users_user`.`id`;


CREATE TABLE IF NOT EXISTS `multilang_language` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate latin1_general_cs NOT NULL,
  `code` varchar(30) collate latin1_general_cs NOT NULL,
  `locale` varchar(30) collate latin1_general_cs default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=4 ;

--
-- Dumping data for table `multilang_language`
--

INSERT INTO `multilang_language` (`id`, `name`, `code`, `locale`) VALUES
(1, 'EspaÃ±ol', 'esp', '');

-- --------------------------------------------------------

--
-- Table structure for table `multilang_text`
--

CREATE TABLE IF NOT EXISTS `multilang_text` (
  `id` int(11) NOT NULL,
  `moduleName` varchar(255) collate latin1_general_cs NOT NULL,
  `languageCode` varchar(30) collate latin1_general_cs NOT NULL,
  `text` text character set utf8 NOT NULL,
  PRIMARY KEY  (`id`,`moduleName`,`languageCode`),
  KEY `multilang_text_FI_1` (`languageCode`),
  KEY `multilang_text_FI_2` (`moduleName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

#-----------------------------------------------------------------------------
#-- modules_entity
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_entity`;


CREATE TABLE `modules_entity`
(
	`moduleName` VARCHAR(50)  NOT NULL COMMENT 'nombre del modulo',
	`name` VARCHAR(50)  NOT NULL COMMENT 'Nombre de la entidad',
	`phpName` VARCHAR(50)   COMMENT 'Nombre de la Clase',
	`description` VARCHAR(255)   COMMENT 'Descripcion de la entidad',
	`softDelete` BOOL   COMMENT 'Indica si usa softdelete',
	`relation` BOOL   COMMENT 'Indica si es una entidad principal o una relacion de dos entidades',
	`saveLog` BOOL   COMMENT 'Indica si guarda log de cambios',
	`nestedset` BOOL   COMMENT 'Indica si es una entidad nestedset',
	`scopeFieldUniqueName` VARCHAR(100)   COMMENT 'Indica el campo que es usado como scope en el nestedset',
	PRIMARY KEY (`name`),
	INDEX `modules_entity_FI_1` (`moduleName`),
	CONSTRAINT `modules_entity_FK_1`
		FOREIGN KEY (`moduleName`)
		REFERENCES `modules_module` (`name`),
	INDEX `modules_entity_FI_2` (`scopeFieldUniqueName`),
	CONSTRAINT `modules_entity_FK_2`
		FOREIGN KEY (`scopeFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Entidades de modulos ';

#-----------------------------------------------------------------------------
#-- modules_entityField
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_entityField`;


CREATE TABLE `modules_entityField`
(
	`uniqueName` VARCHAR(100)  NOT NULL COMMENT 'Nombre unico del campo',
	`entityName` VARCHAR(50)  NOT NULL COMMENT 'Nombre de la entidad',
	`name` VARCHAR(50)  NOT NULL COMMENT 'Nombre del campo (max 50 caracteres)',
	`description` VARCHAR(255)   COMMENT 'Descripcion del campo (comment)',
	`isRequired` BOOL   COMMENT 'Indica si es obligatorio',
	`isPrimaryKey` BOOL   COMMENT 'Indica si clave primaria',
	`isAutoIncrement` BOOL   COMMENT 'Indica si el campo es autoincremental',
	`order` INTEGER  NOT NULL COMMENT 'Orden',
	`type` INTEGER  NOT NULL COMMENT 'Tipo de campo',
	`unique` BOOL   COMMENT 'Indica si es unica',
	`size` INTEGER   COMMENT 'Size del campo',
	`aggregateExpression` VARCHAR(255)   COMMENT 'Detalles de la expresion agregada',
	`label` VARCHAR(255)   COMMENT 'Etiqueta para el formulario',
	`formFieldType` INTEGER   COMMENT 'Tipo de campo para formulario',
	`formFieldSize` INTEGER   COMMENT 'Size del campo en formulario',
	`formFieldLines` INTEGER   COMMENT 'Size del campo en formulario lineas',
	`formFieldUseCalendar` BOOL   COMMENT 'Si utiliza o no el calendario en formulario',
	`foreignKeyTable` VARCHAR(50)   COMMENT 'Entidad con la que enlaza la clave remota',
	`foreignKeyRemote` VARCHAR(100)   COMMENT 'Nombre del campo en la tabla remota',
	PRIMARY KEY (`uniqueName`),
	INDEX `modules_entityField_FI_1` (`entityName`),
	CONSTRAINT `modules_entityField_FK_1`
		FOREIGN KEY (`entityName`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE CASCADE,
	INDEX `modules_entityField_FI_2` (`foreignKeyTable`),
	CONSTRAINT `modules_entityField_FK_2`
		FOREIGN KEY (`foreignKeyTable`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE SET NULL,
	INDEX `modules_entityField_FI_3` (`foreignKeyRemote`),
	CONSTRAINT `modules_entityField_FK_3`
		FOREIGN KEY (`foreignKeyRemote`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE SET NULL
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Campos de las entidades de modulos';

#-----------------------------------------------------------------------------
#-- modules_entityFieldValidation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_entityFieldValidation`;


CREATE TABLE `modules_entityFieldValidation`
(
	`entityFieldUniqueName` VARCHAR(100)  NOT NULL COMMENT 'Nombre unico del campo',
	`name` VARCHAR(50)  NOT NULL COMMENT 'Nombre del validador',
	`value` VARCHAR(50)   COMMENT 'Valor del validador',
	`message` VARCHAR(255)   COMMENT 'Mensaje',
	PRIMARY KEY (`entityFieldUniqueName`,`name`),
	CONSTRAINT `modules_entityFieldValidation_FK_1`
		FOREIGN KEY (`entityFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE
) ENGINE=MyISAM COMMENT='Validaciones de los campos de las entidades de modulos ';

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


==============================
Revisión 654 - Fecha 20110121
------------------------------
ALTER TABLE affiliates_user
ADD 	`passwordUpdated` DATE   COMMENT 'Fecha de actualizacion de la clave',
ADD 	`recoveryHash` VARCHAR(255)   COMMENT 'Hash enviado para la recuperacion de clave',
ADD 	`recoveryHashCreatedOn` DATETIME   COMMENT 'Momento de la solicitud para la recuperacion de clave',
ADD 	`name` VARCHAR(90)   COMMENT 'Nombre',
ADD 	`surname` VARCHAR(90)   COMMENT 'Apellido',
ADD 	`mailAddress` VARCHAR(90)   COMMENT 'Direccion electronica',
ADD 	`mailAddressAlt` VARCHAR(90)   COMMENT 'Direccion electronica alternativa',
ADD 	`deleted_at` DATETIME,
ADD 	`created_at` DATETIME,
ADD 	`updated_at` DATETIME,
DROP `updated`,
DROP `created`;

UPDATE `affiliates_user` ,`affiliates_userInfo` SET `affiliates_user`.`name` = `affiliates_userInfo`.`name`,
`affiliates_user`.`surname` = `affiliates_userInfo`.`surname`,
`affiliates_user`.`mailAddress` = `affiliates_userInfo`.`mailAddress`,
`passwordUpdated` = '2010-01-01'
 WHERE `affiliates_userInfo`.`userId` = `affiliates_user`.`id`;

ALTER TABLE affiliates_affiliate
ADD 	`internalNumber` VARCHAR(12)   COMMENT 'Id interno',
ADD 	`address` VARCHAR(255)   COMMENT 'Direccion afiliado',
ADD 	`phone` VARCHAR(50)   COMMENT 'Telefono afiliado',
ADD 	`email` VARCHAR(50)   COMMENT 'Email afiliado',
ADD 	`contact` VARCHAR(50)   COMMENT 'Nombre de persona de contacto',
ADD 	`contactEmail` VARCHAR(100)   COMMENT 'Email de persona de contacto',
ADD 	`web` VARCHAR(255)   COMMENT 'Direccion web del afiliado',
ADD 	`memo` TEXT   COMMENT 'Informacion adicional del afiliado',
ADD 	`deleted_at` DATETIME,
ADD 	`created_at` DATETIME,
ADD 	`updated_at` DATETIME;

UPDATE `affiliates_affiliate` ,`affiliates_affiliateInfo` SET `affiliates_affiliate`.`internalNumber` = `affiliates_affiliateInfo`.`affiliateInternalNumber`,
`affiliates_affiliate`.`address` = `affiliates_affiliateInfo`.`address`,
`affiliates_affiliate`.`phone` = `affiliates_affiliateInfo`.`phone`,
`affiliates_affiliate`.`email` = `affiliates_affiliateInfo`.`email`,
`affiliates_affiliate`.`contact` = `affiliates_affiliateInfo`.`contact`,
`affiliates_affiliate`.`contactEmail` = `affiliates_affiliateInfo`.`contactEmail`,
`affiliates_affiliate`.`web` = `affiliates_affiliateInfo`.`web`,
`affiliates_affiliate`.`memo` = `affiliates_affiliateInfo`.`memo`
 WHERE `affiliates_affiliateInfo`.`affiliateId` = `affiliates_affiliate`.`id`;

==============================
Revisión 656 - Fecha 20110203
------------------------------
#Ponemos valor por defecto 1 al campo active de categories.
ALTER TABLE  `categories_category` CHANGE  `active`  `active` TINYINT( 4 ) NOT NULL DEFAULT  '1' COMMENT  'Is category active?'



==============================
Revisión 661 - Fecha 20110204
------------------------------
#Migramos la info del estado de activación de un usuario por afiliado para usar el soft delete.
UPDATE `affiliates_user` SET `deleted_at`=NOW() WHERE `active`=0;
ALTER TABLE  `affiliates_user` DROP  `active`;

#Eliminamos tabla de info.
DROP TABLE IF EXISTS `affiliates_userInfo`

==============================
Revisión 662 - Fecha 20110204
------------------------------
#Borramos tablas que ya no se usan más y que ni siquiera están en los esquemas.
#La info contenida debería estar replicada en affiliates_affiliate. Revisar por si acaso.
#Pero si se cargo la migración del commit 654 debería estar todo ok.

DROP TABLE IF EXISTS `affiliates_affiliateInfo`;
DROP TABLE IF EXISTS `affiliateInfo`;
DROP TABLE IF EXISTS `affiliate`;

==============================
Revisión 668 - Fecha 20110204
------------------------------
#Borramos tablas que ya no se usan más y que ni siquiera están en los esquemas.
DROP TABLE IF EXISTS `users_userInfo`;
==============================
Revisión 670 - Fecha 20110207
------------------------------
# Actualizar la estructura, se trajo el modulo security con su scehma pero no se agrego este campo en su momento
ALTER TABLE `security_actionLabel` ADD `description` VARCHAR(255) COMMENT 'Descripcion';

UPDATE  `security_actionLabel` SET description = label WHERE description IS NULL;


==============================
Revisión 707 - Fecha 20110222
------------------------------

RENAME TABLE `product`  TO `catalog_product`;
RENAME TABLE `unit`  TO `catalog_unit`;
RENAME TABLE `measureUnit`  TO `catalog_measureUnit`;

==============================
Revisión 730 - Fecha 201100302
------------------------------
# !!! Ojo, no necesariamente hace falta, revisar si existen los campos userObjectType y userObjectId
ALTER TABLE `actionLogs_log` ADD `userObjectType` VARCHAR(50) NOT NULL COMMENT 'Tipo de usuario';
ALTER TABLE `actionLogs_log` ADD `userObjectId` INTEGER  NOT NULL COMMENT 'Id del usuario';

# !!! Esto es para que el actionlog tenga la info donde tiene qu eestar, porque el doLog no estaba guardando la info de la nueva forma
UPDATE  `actionLogs_log` SET `userObjectType` = "user" WHERE `affiliateId` = 0;
UPDATE  `actionLogs_log` SET `userObjectId` = `userId` WHERE `affiliateId` = 0;
UPDATE  `actionLogs_log` SET `userObjectType` = "affiliate" WHERE `affiliateId` != 0;
UPDATE  `actionLogs_log` SET `userObjectId` = `userId` WHERE `affiliateId` != 0;

#Ejecutar este sql antes que el diff/migrate para no perder la hitoria del log.

ALTER TABLE `actionLogs_log` CHANGE `object` `message` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Mensaje resultado de la accion'

==============================
Revisión 742 - Fecha 201100314
------------------------------
#Insercion del módulo surveys en tabla de modulos.

INSERT INTO  `modules_module` (
`name` ,
`active` ,
`alwaysActive` ,
`hasCategories`
)
VALUES (
'surveys',  '1',  '0',  '0'
);

