
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- actionlogs_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionlogs_log`;


CREATE TABLE `actionlogs_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id log',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`datetime` DATETIME  NOT NULL COMMENT 'Fecha en que se logueo el dato',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se logueo el dato',
	`object` VARCHAR(100)  NOT NULL COMMENT 'objeto sobre el cual se realizo la accion',
	`forward` VARCHAR(100)   COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`),
	INDEX `actionlogs_log_FI_1` (`userId`),
	CONSTRAINT `actionlogs_log_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `actionlogs_log_FI_2` (`action`),
	CONSTRAINT `actionlogs_log_FK_2`
		FOREIGN KEY (`action`)
		REFERENCES `security_action` (`action`)
) ENGINE=MyISAM COMMENT='logs del sistema';

#-----------------------------------------------------------------------------
#-- actionlogs_label
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionlogs_label`;


CREATE TABLE `actionlogs_label`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id Label',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se loguea el dato',
	`label` VARCHAR(100)  NOT NULL COMMENT 'mensaje del log',
	`language` VARCHAR(100)   COMMENT 'idioma de la etiqueta',
	`forward` VARCHAR(100)   COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`,`action`)
) ENGINE=MyISAM COMMENT='Etiquetas de logueo';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
