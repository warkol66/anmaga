
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

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
