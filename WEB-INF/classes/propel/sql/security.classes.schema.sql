
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- security_action
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_action`;


CREATE TABLE `security_action`
(
	`action` VARCHAR(100)  NOT NULL COMMENT 'Action pagina',
	`module` VARCHAR(100)   COMMENT 'Modulo',
	`section` VARCHAR(100)   COMMENT 'Seccion',
	`access` INTEGER   COMMENT 'El acceso a ese action',
	`accessAffiliateUser` INTEGER   COMMENT 'El acceso a ese action para los usuarios por afiliados',
	`active` INTEGER   COMMENT 'Si el action esta activo o no',
	`pair` VARCHAR(100)   COMMENT 'Par del Action',
	PRIMARY KEY (`action`),
	CONSTRAINT `security_action_FK_1`
		FOREIGN KEY (`action`)
		REFERENCES `security_actionLabel` (`action`)
) ENGINE=MyISAM COMMENT='Actions del sistema';

#-----------------------------------------------------------------------------
#-- security_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_module`;


CREATE TABLE `security_module`
(
	`module` VARCHAR(100)  NOT NULL COMMENT 'Modulo',
	`access` INTEGER   COMMENT 'El acceso a ese action',
	`accessAffiliateUser` INTEGER   COMMENT 'El acceso a ese action para los usuarios por afiliados',
	PRIMARY KEY (`module`)
) ENGINE=MyISAM COMMENT='Modulos del sistema';

#-----------------------------------------------------------------------------
#-- security_actionLabel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_actionLabel`;


CREATE TABLE `security_actionLabel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id label security',
	`action` VARCHAR(100)  NOT NULL COMMENT 'Action pagina',
	`language` VARCHAR(100)   COMMENT 'Idioma de la etiqueta',
	`label` VARCHAR(100)   COMMENT 'Etiqueta',
	PRIMARY KEY (`id`,`action`),
	INDEX `I_referenced_security_action_FK_1_1` (`action`)
) ENGINE=MyISAM COMMENT='etiquetas de actions de seguridad';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
