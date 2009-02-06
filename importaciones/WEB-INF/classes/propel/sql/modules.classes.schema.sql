
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- modules_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_module`;


CREATE TABLE `modules_module`
(
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre del modulo',
	`active` TINYINT default 0 NOT NULL COMMENT 'Estado del modulo',
	`alwaysActive` TINYINT default 0 NOT NULL COMMENT 'Modulo siempre activo',
	`hasCategories` TINYINT default 0 NOT NULL COMMENT 'El Modulo tiene categorias relacionadas?',
	PRIMARY KEY (`name`)
)Type=MyISAM COMMENT=' Registro de modulos';

#-----------------------------------------------------------------------------
#-- modules_dependency
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_dependency`;


CREATE TABLE `modules_dependency`
(
	`moduleName` VARCHAR(50)  NOT NULL COMMENT 'Modulo',
	`dependence` VARCHAR(50)  NOT NULL COMMENT 'Modulos de los cuales depende',
	PRIMARY KEY (`moduleName`,`dependence`),
	CONSTRAINT `modules_dependency_FK_1`
		FOREIGN KEY (`moduleName`)
		REFERENCES `modules_module` (`name`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Dependencia de modulos ';

#-----------------------------------------------------------------------------
#-- modules_label
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_label`;


CREATE TABLE `modules_label`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id module label',
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre del modulo',
	`label` VARCHAR(255) COMMENT 'Etiqueta',
	`description` VARCHAR(255) COMMENT 'Descripcion del modulo',
	`language` VARCHAR(100) COMMENT 'idioma de la etiqueta',
	PRIMARY KEY (`id`,`name`),
	INDEX `modules_label_FI_1` (`name`),
	CONSTRAINT `modules_label_FK_1`
		FOREIGN KEY (`name`)
		REFERENCES `modules_module` (`name`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Etiquetas de modulos ';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
