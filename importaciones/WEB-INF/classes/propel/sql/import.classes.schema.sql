
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- import_product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_product`;


CREATE TABLE `import_product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Product Id',
	`code` VARCHAR(255) COMMENT 'Codigo del producto',
	`name` VARCHAR(255) COMMENT 'Nombre del producto en ingles',
	`nameSpanish` VARCHAR(255) COMMENT 'Nombre del producto en espaniol',
	`description` TEXT COMMENT 'Descripcion del producto en ingles',
	`descriptionSpanish` TEXT COMMENT 'Descripcion del producto en espaniol',
	`active` TINYINT  NOT NULL COMMENT 'Is product active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Productos';

#-----------------------------------------------------------------------------
#-- import_productSupplier
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_productSupplier`;


CREATE TABLE `import_productSupplier`
(
	`productId` INTEGER  NOT NULL COMMENT 'Product Id',
	`supplierId` VARCHAR(255) COMMENT 'Nombre del producto',
	`code` VARCHAR(255) COMMENT 'Codigo del producto',
	PRIMARY KEY (`productId`),
	CONSTRAINT `import_productSupplier_FK_1`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_productSupplier_FI_2` (`supplierId`),
	CONSTRAINT `import_productSupplier_FK_2`
		FOREIGN KEY (`supplierId`)
		REFERENCES `import_supplier` (`id`)
)Type=MyISAM COMMENT='Relacion Productos Proveedores';

#-----------------------------------------------------------------------------
#-- import_supplier
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplier`;


CREATE TABLE `import_supplier`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre',
	`email` VARCHAR(255) COMMENT 'email',
	`active` TINYINT  NOT NULL COMMENT 'Is supplier active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Proveedores';

#-----------------------------------------------------------------------------
#-- import_clientQuotation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientQuotation`;


CREATE TABLE `import_clientQuotation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de cotizacion de cliente',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`userId` INTEGER  NOT NULL COMMENT 'User',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	PRIMARY KEY (`id`),
	INDEX `import_clientQuotation_FI_1` (`userId`),
	CONSTRAINT `import_clientQuotation_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
)Type=MyISAM COMMENT='Cotizacion a Cliente';

#-----------------------------------------------------------------------------
#-- import_clientQuotationItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientQuotationItem`;


CREATE TABLE `import_clientQuotationItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de cotizacion de Cliente',
	`clientQuotationId` INTEGER  NOT NULL COMMENT 'Id de cotizacion de cliente',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`price` INTEGER COMMENT 'precio de producto',
	`quantity` INTEGER COMMENT 'cantidad de producto',
	PRIMARY KEY (`id`),
	INDEX `import_clientQuotationItem_FI_1` (`clientQuotationId`),
	CONSTRAINT `import_clientQuotationItem_FK_1`
		FOREIGN KEY (`clientQuotationId`)
		REFERENCES `import_clientQuotation` (`id`),
	INDEX `import_clientQuotationItem_FI_2` (`productId`),
	CONSTRAINT `import_clientQuotationItem_FK_2`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`)
)Type=MyISAM COMMENT='Elemento de Cotizacion Cliente';

#-----------------------------------------------------------------------------
#-- import_supplierQuotation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierQuotation`;


CREATE TABLE `import_supplierQuotation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de cotizacion de proveedor',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`supplierId` INTEGER  NOT NULL COMMENT 'Supplier',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	`clientQuotationId` INTEGER COMMENT 'id de cotizacion relacionada',
	PRIMARY KEY (`id`),
	INDEX `import_supplierQuotation_FI_1` (`clientQuotationId`),
	CONSTRAINT `import_supplierQuotation_FK_1`
		FOREIGN KEY (`clientQuotationId`)
		REFERENCES `import_clientQuotation` (`id`),
	INDEX `import_supplierQuotation_FI_2` (`supplierId`),
	CONSTRAINT `import_supplierQuotation_FK_2`
		FOREIGN KEY (`supplierId`)
		REFERENCES `import_supplier` (`id`)
)Type=MyISAM COMMENT='Cotizacion de Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierQuotationItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierQuotationItem`;


CREATE TABLE `import_supplierQuotationItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de cotizacion de proveedor',
	`supplierQuotationId` INTEGER  NOT NULL COMMENT 'Id de cotizacion de proveedor',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`clientQuotationItemId` INTEGER  NOT NULL COMMENT 'Id de cotizacion de proveedor',
	`price` INTEGER COMMENT 'precio de producto',
	`quantity` INTEGER COMMENT 'cantidad producto',
	`portId` INTEGER COMMENT 'id de puerto',
	`incotermId` INTEGER COMMENT 'id de incoterm',
	PRIMARY KEY (`id`),
	INDEX `import_supplierQuotationItem_FI_1` (`supplierQuotationId`),
	CONSTRAINT `import_supplierQuotationItem_FK_1`
		FOREIGN KEY (`supplierQuotationId`)
		REFERENCES `import_supplierQuotation` (`id`),
	INDEX `import_supplierQuotationItem_FI_2` (`clientQuotationItemId`),
	CONSTRAINT `import_supplierQuotationItem_FK_2`
		FOREIGN KEY (`clientQuotationItemId`)
		REFERENCES `import_clientQuotationItem` (`id`),
	INDEX `import_supplierQuotationItem_FI_3` (`productId`),
	CONSTRAINT `import_supplierQuotationItem_FK_3`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_supplierQuotationItem_FI_4` (`incotermId`),
	CONSTRAINT `import_supplierQuotationItem_FK_4`
		FOREIGN KEY (`incotermId`)
		REFERENCES `import_incoterm` (`id`),
	INDEX `import_supplierQuotationItem_FI_5` (`portId`),
	CONSTRAINT `import_supplierQuotationItem_FK_5`
		FOREIGN KEY (`portId`)
		REFERENCES `import_port` (`id`)
)Type=MyISAM COMMENT='Elemento de Cotizacion de Proveedor';

#-----------------------------------------------------------------------------
#-- import_clientPurchaseOrder
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientPurchaseOrder`;


CREATE TABLE `import_clientPurchaseOrder`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de Orden de Pedido a Cliente',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`userId` INTEGER  NOT NULL COMMENT 'User',
	`clientQuotationId` INTEGER  NOT NULL COMMENT 'Cotizacion a la que hace referencia',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	PRIMARY KEY (`id`),
	INDEX `import_clientPurchaseOrder_FI_1` (`clientQuotationId`),
	CONSTRAINT `import_clientPurchaseOrder_FK_1`
		FOREIGN KEY (`clientQuotationId`)
		REFERENCES `import_clientQuotation` (`id`)
)Type=MyISAM COMMENT='Orden de Pedido de Cliente';

#-----------------------------------------------------------------------------
#-- import_clientPurchaseOrderItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientPurchaseOrderItem`;


CREATE TABLE `import_clientPurchaseOrderItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de Orden de Pedido a Cliente',
	`clientPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id de item de Orden de Pedido a Cliente',
	`clientQuotationItemId` INTEGER  NOT NULL COMMENT 'Referencia al item cotizado',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`price` INTEGER COMMENT 'Id producto',
	`quantity` INTEGER COMMENT 'Id producto',
	PRIMARY KEY (`id`,`clientPurchaseOrderId`,`productId`),
	INDEX `import_clientPurchaseOrderItem_FI_1` (`clientPurchaseOrderId`),
	CONSTRAINT `import_clientPurchaseOrderItem_FK_1`
		FOREIGN KEY (`clientPurchaseOrderId`)
		REFERENCES `import_clientPurchaseOrder` (`id`),
	INDEX `import_clientPurchaseOrderItem_FI_2` (`productId`),
	CONSTRAINT `import_clientPurchaseOrderItem_FK_2`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_clientPurchaseOrderItem_FI_3` (`clientQuotationItemId`),
	CONSTRAINT `import_clientPurchaseOrderItem_FK_3`
		FOREIGN KEY (`clientQuotationItemId`)
		REFERENCES `import_clientQuotationItem` (`id`)
)Type=MyISAM COMMENT='Elemento de Orden de Pedido a Cliente';

#-----------------------------------------------------------------------------
#-- import_supplierPurchaseOrder
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierPurchaseOrder`;


CREATE TABLE `import_supplierPurchaseOrder`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de Orden de Pedido de Cliente',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`supplierId` INTEGER  NOT NULL COMMENT 'Supplier',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	`supplierQuotationId` INTEGER COMMENT 'id de cotizacion relacionada',
	PRIMARY KEY (`id`),
	INDEX `import_supplierPurchaseOrder_FI_1` (`supplierQuotationId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_1`
		FOREIGN KEY (`supplierQuotationId`)
		REFERENCES `import_supplierQuotation` (`id`),
	INDEX `import_supplierPurchaseOrder_FI_2` (`supplierId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_2`
		FOREIGN KEY (`supplierId`)
		REFERENCES `import_supplier` (`id`)
)Type=MyISAM COMMENT='Orden de Pedido a Proveedor';

#-----------------------------------------------------------------------------
#-- import_purchaseOrderItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_purchaseOrderItem`;


CREATE TABLE `import_purchaseOrderItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de Orden de Pedido a Cliente',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`supplierPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id producto',
	`price` INTEGER COMMENT 'Id producto',
	`quantity` INTEGER COMMENT 'Id producto',
	PRIMARY KEY (`id`),
	INDEX `import_purchaseOrderItem_FI_1` (`productId`),
	CONSTRAINT `import_purchaseOrderItem_FK_1`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_purchaseOrderItem_FI_2` (`supplierPurchaseOrderId`),
	CONSTRAINT `import_purchaseOrderItem_FK_2`
		FOREIGN KEY (`supplierPurchaseOrderId`)
		REFERENCES `import_supplierPurchaseOrder` (`id`)
)Type=MyISAM COMMENT='Elemento de Orden de Pedido a Cliente';

#-----------------------------------------------------------------------------
#-- import_port
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_port`;


CREATE TABLE `import_port`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Port Id',
	`code` VARCHAR(255) COMMENT 'Codigo del puerto',
	`name` VARCHAR(255) COMMENT 'Nombre del puerto',
	`active` TINYINT  NOT NULL COMMENT 'Is port active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Puerto';

#-----------------------------------------------------------------------------
#-- import_incoterm
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_incoterm`;


CREATE TABLE `import_incoterm`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Incoterm Id',
	`name` VARCHAR(255) COMMENT 'Nombre del Incoterm',
	`description` VARCHAR(255) COMMENT 'Descripcion del Incoterm',
	`active` TINYINT  NOT NULL COMMENT 'Is incoterm active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Incoterm';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
