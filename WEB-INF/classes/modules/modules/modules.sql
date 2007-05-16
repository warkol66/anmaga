

CREATE TABLE IF NOT EXISTS  `modules_module`(
    `name` VARCHAR(255) NOT NULL  COMMENT 'nombre del modulo',
    `label` VARCHAR(255)  COMMENT 'Etiqueta',
    `description` VARCHAR(255)  COMMENT 'Descripcion del modulo',
    `active` INTEGER default 0 NOT NULL  COMMENT 'Estado del modulo',
    `alwaysActive` INTEGER default 0 NOT NULL  COMMENT 'Modulo siempre activo',
    PRIMARY KEY(`name`),
    CONSTRAINT `modules_module_ibfk_1` FOREIGN KEY (`name`) REFERENCES `modules_dependency` (`module`))
Type=MyISAM COMMENT=' Registro de modulos';


CREATE TABLE IF NOT EXISTS `modules_dependency`(
    `module` VARCHAR(255) NOT NULL  COMMENT 'Modulo',
    `dependence` VARCHAR(255) NOT NULL  COMMENT 'Dependiente',
    PRIMARY KEY(`module`,`dependence`))
Type=MyISAM COMMENT='Dependencia de modulos ';
