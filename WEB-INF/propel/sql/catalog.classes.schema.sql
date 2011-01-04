
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- catalog_affiliateProduct
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_affiliateProduct`;


CREATE TABLE `catalog_affiliateProduct`
(
	`productId` INTEGER  NOT NULL COMMENT 'Producto',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Afiliado',
	`price` FLOAT   COMMENT 'Precio del producto',
	PRIMARY KEY (`productId`,`affiliateId`),
	UNIQUE KEY `catalog_affiliateProduct_U_1` (`productId`, `affiliateId`),
	CONSTRAINT `catalog_affiliateProduct_FK_1`
		FOREIGN KEY (`productId`)
		REFERENCES `product` (`id`),
	INDEX `catalog_affiliateProduct_FI_2` (`affiliateId`),
	CONSTRAINT `catalog_affiliateProduct_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
) ENGINE=MyISAM COMMENT='Precios de Productos por Afiliado';

#-----------------------------------------------------------------------------
#-- catalog_affiliateProductCode
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_affiliateProductCode`;


CREATE TABLE `catalog_affiliateProductCode`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`affiliateId` INTEGER  NOT NULL COMMENT 'Afiliado',
	`productCode` VARCHAR(255)   COMMENT 'Codigo del Producto',
	`productCodeAffiliate` VARCHAR(255)   COMMENT 'Codigo del Producto para el afiliado',
	PRIMARY KEY (`id`),
	UNIQUE KEY `catalog_affiliateProductCode_U_1` (`affiliateId`, `productCodeAffiliate`),
	CONSTRAINT `catalog_affiliateProductCode_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
) ENGINE=MyISAM COMMENT='Codigos de Productos por Afiliado';

#-----------------------------------------------------------------------------
#-- product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;


CREATE TABLE `product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del producto',
	`code` VARCHAR(255)   COMMENT 'Codigo del producto',
	`description` VARCHAR(255)   COMMENT 'Descripcion',
	`price` FLOAT   COMMENT 'Precio del producto',
	`unitId` INTEGER   COMMENT 'Unidades',
	`measureUnitId` INTEGER   COMMENT 'Unidad de Medida',
	`active` TINYINT default 1 NOT NULL COMMENT 'Is product active?',
	`orderCode` VARCHAR(255)   COMMENT 'Codigo de ordenamiento del producto',
	`salesUnit` INTEGER   COMMENT 'Multiplo de la unidad de medida en que se puede ordenar el producto',
	PRIMARY KEY (`id`),
	UNIQUE KEY `product_U_1` (`code`),
	INDEX `product_FI_1` (`unitId`),
	CONSTRAINT `product_FK_1`
		FOREIGN KEY (`unitId`)
		REFERENCES `unit` (`id`),
	INDEX `product_FI_2` (`measureUnitId`),
	CONSTRAINT `product_FK_2`
		FOREIGN KEY (`measureUnitId`)
		REFERENCES `measureUnit` (`id`)
) ENGINE=MyISAM COMMENT='Producto';

#-----------------------------------------------------------------------------
#-- unit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `unit`;


CREATE TABLE `unit`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la unidad',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Unidad',
	`unitQuantity` INTEGER  NOT NULL COMMENT 'Cantidad de unidades que posee la unidad',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM COMMENT='Unidades';

#-----------------------------------------------------------------------------
#-- measureUnit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `measureUnit`;


CREATE TABLE `measureUnit`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la unidad de medida',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Unidad de Medida',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM COMMENT='Unidad de Medida';

#-----------------------------------------------------------------------------
#-- catalog_productCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_productCategory`;


CREATE TABLE `catalog_productCategory`
(
	`productCode` VARCHAR(255)  NOT NULL COMMENT 'Codigo del producto',
	`categoryId` INTEGER(5)  NOT NULL COMMENT 'Category Id',
	PRIMARY KEY (`productCode`,`categoryId`),
	INDEX `catalog_productCategory_FI_1` (`categoryId`),
	CONSTRAINT `catalog_productCategory_FK_1`
		FOREIGN KEY (`categoryId`)
		REFERENCES `categories_category` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `catalog_productCategory_FK_2`
		FOREIGN KEY (`productCode`)
		REFERENCES `product` (`code`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' COMMENT='Relacion Categorias y Productos';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
