
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
	`nameChinese` VARCHAR(255) COMMENT 'Nombre del producto en chino',
	`descriptionChinese` TEXT COMMENT 'Descripcion del producto en chino',
	`status` INTEGER  NOT NULL COMMENT 'product status',
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
	`defaultIncotermId` INTEGER COMMENT 'id de incoterm por default del proveedor',
	`defaultPortId` INTEGER COMMENT 'id de puerto por default del proveedor',
	PRIMARY KEY (`id`),
	INDEX `import_supplier_FI_1` (`defaultIncotermId`),
	CONSTRAINT `import_supplier_FK_1`
		FOREIGN KEY (`defaultIncotermId`)
		REFERENCES `import_incoterm` (`id`),
	INDEX `import_supplier_FI_2` (`defaultPortId`),
	CONSTRAINT `import_supplier_FK_2`
		FOREIGN KEY (`defaultPortId`)
		REFERENCES `import_port` (`id`)
)Type=MyISAM COMMENT='Proveedores';

#-----------------------------------------------------------------------------
#-- import_clientQuote
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientQuote`;


CREATE TABLE `import_clientQuote`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de cotizacion de cliente',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Afiliado',
	`affiliateUserId` INTEGER COMMENT 'usuario del afiliado si creo la cotizacion',
	`userId` INTEGER COMMENT 'Usuario de anmaga si creo la cotizacion',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	PRIMARY KEY (`id`),
	INDEX `import_clientQuote_FI_1` (`userId`),
	CONSTRAINT `import_clientQuote_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `import_clientQuote_FI_2` (`affiliateId`),
	CONSTRAINT `import_clientQuote_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`),
	INDEX `import_clientQuote_FI_3` (`affiliateUserId`),
	CONSTRAINT `import_clientQuote_FK_3`
		FOREIGN KEY (`affiliateUserId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Cotizacion a Cliente';

#-----------------------------------------------------------------------------
#-- import_clientQuoteHistory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientQuoteHistory`;


CREATE TABLE `import_clientQuoteHistory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`clientQuoteId` INTEGER  NOT NULL COMMENT 'Id de la cotizacion de cliente',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`createdAt` DATETIME COMMENT 'Fecha del cambio de status',
	PRIMARY KEY (`id`),
	INDEX `import_clientQuoteHistory_FI_1` (`clientQuoteId`),
	CONSTRAINT `import_clientQuoteHistory_FK_1`
		FOREIGN KEY (`clientQuoteId`)
		REFERENCES `import_clientQuote` (`id`)
)Type=MyISAM COMMENT='Historial de Cotizacion a Cliente';

#-----------------------------------------------------------------------------
#-- import_clientQuoteItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientQuoteItem`;


CREATE TABLE `import_clientQuoteItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de cotizacion de Cliente',
	`clientQuoteId` INTEGER  NOT NULL COMMENT 'Id de cotizacion de cliente',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`price` FLOAT COMMENT 'precio de producto',
	`quantity` INTEGER COMMENT 'cantidad de producto',
	PRIMARY KEY (`id`),
	INDEX `import_clientQuoteItem_FI_1` (`clientQuoteId`),
	CONSTRAINT `import_clientQuoteItem_FK_1`
		FOREIGN KEY (`clientQuoteId`)
		REFERENCES `import_clientQuote` (`id`),
	INDEX `import_clientQuoteItem_FI_2` (`productId`),
	CONSTRAINT `import_clientQuoteItem_FK_2`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`)
)Type=MyISAM COMMENT='Elemento de Cotizacion Cliente';

#-----------------------------------------------------------------------------
#-- import_supplierQuote
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierQuote`;


CREATE TABLE `import_supplierQuote`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de cotizacion de proveedor',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`supplierId` INTEGER  NOT NULL COMMENT 'Supplier',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	`clientQuoteId` INTEGER COMMENT 'id de cotizacion relacionada',
	`supplierAccessToken` VARCHAR(255)  NOT NULL COMMENT 'token de validacion del acceso al proveedor a la orden',
	PRIMARY KEY (`id`),
	INDEX `import_supplierQuote_FI_1` (`clientQuoteId`),
	CONSTRAINT `import_supplierQuote_FK_1`
		FOREIGN KEY (`clientQuoteId`)
		REFERENCES `import_clientQuote` (`id`),
	INDEX `import_supplierQuote_FI_2` (`supplierId`),
	CONSTRAINT `import_supplierQuote_FK_2`
		FOREIGN KEY (`supplierId`)
		REFERENCES `import_supplier` (`id`)
)Type=MyISAM COMMENT='Cotizacion de Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierQuoteHistory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierQuoteHistory`;


CREATE TABLE `import_supplierQuoteHistory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`supplierQuoteId` INTEGER  NOT NULL COMMENT 'Id de la cotizacion de proveedor',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`createdAt` DATETIME COMMENT 'Fecha del cambio de status',
	PRIMARY KEY (`id`),
	INDEX `import_supplierQuoteHistory_FI_1` (`supplierQuoteId`),
	CONSTRAINT `import_supplierQuoteHistory_FK_1`
		FOREIGN KEY (`supplierQuoteId`)
		REFERENCES `import_supplierQuote` (`id`)
)Type=MyISAM COMMENT='Historial de Cotizacion a Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierQuoteItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierQuoteItem`;


CREATE TABLE `import_supplierQuoteItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de cotizacion de proveedor',
	`supplierQuoteId` INTEGER  NOT NULL COMMENT 'Id de cotizacion de proveedor',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`replacedProductId` INTEGER COMMENT 'Id producto que fue reemplazado por el actual',
	`clientQuoteItemId` INTEGER  NOT NULL COMMENT 'Id de cotizacion de proveedor',
	`status` INTEGER  NOT NULL COMMENT 'Status de Item de Cotizacion',
	`quantity` INTEGER  NOT NULL COMMENT 'cantidad producto',
	`portId` INTEGER  NOT NULL COMMENT 'id de puerto',
	`incotermId` INTEGER  NOT NULL COMMENT 'id de incoterm',
	`price` FLOAT COMMENT 'precio de producto',
	`supplierComments` VARCHAR(255) COMMENT 'Comentarios del proveedor ',
	`delivery` INTEGER COMMENT 'Tiempo en dias para la entrega del producto.',
	`package` INTEGER COMMENT 'A seleccionar entre Unidades o Bultos',
	`unitLength` FLOAT COMMENT 'Largo del empaque de la unidad ',
	`unitWidth` FLOAT COMMENT 'Ancho del empaque de la unidad ',
	`unitHeight` FLOAT COMMENT 'Alto del empaque de la unidad ',
	`unitGrossWeigth` FLOAT COMMENT 'Peso del empaque de la unidad ',
	`unitsPerCarton` INTEGER COMMENT 'Unidades por bulto',
	`cartons` INTEGER COMMENT 'Cantidad de bultos',
	`cartonLength` FLOAT COMMENT 'Largo del bulto',
	`cartonWidth` FLOAT COMMENT 'Ancho del bulto',
	`cartonHeight` FLOAT COMMENT 'Alto del bulto',
	`cartonGrossWeigth` FLOAT COMMENT 'Peso del bulto',
	PRIMARY KEY (`id`),
	INDEX `import_supplierQuoteItem_FI_1` (`supplierQuoteId`),
	CONSTRAINT `import_supplierQuoteItem_FK_1`
		FOREIGN KEY (`supplierQuoteId`)
		REFERENCES `import_supplierQuote` (`id`),
	INDEX `import_supplierQuoteItem_FI_2` (`clientQuoteItemId`),
	CONSTRAINT `import_supplierQuoteItem_FK_2`
		FOREIGN KEY (`clientQuoteItemId`)
		REFERENCES `import_clientQuoteItem` (`id`),
	INDEX `import_supplierQuoteItem_FI_3` (`productId`),
	CONSTRAINT `import_supplierQuoteItem_FK_3`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_supplierQuoteItem_FI_4` (`replacedProductId`),
	CONSTRAINT `import_supplierQuoteItem_FK_4`
		FOREIGN KEY (`replacedProductId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_supplierQuoteItem_FI_5` (`incotermId`),
	CONSTRAINT `import_supplierQuoteItem_FK_5`
		FOREIGN KEY (`incotermId`)
		REFERENCES `import_incoterm` (`id`),
	INDEX `import_supplierQuoteItem_FI_6` (`portId`),
	CONSTRAINT `import_supplierQuoteItem_FK_6`
		FOREIGN KEY (`portId`)
		REFERENCES `import_port` (`id`)
)Type=MyISAM COMMENT='Elemento de Cotizacion de Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierQuoteItemComment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierQuoteItemComment`;


CREATE TABLE `import_supplierQuoteItemComment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`supplierQuoteItemId` INTEGER  NOT NULL COMMENT 'Id del item de la cotizacion de proveedor',
	`supplierId` INTEGER  NOT NULL COMMENT 'Supplier que comento',
	`userId` INTEGER COMMENT 'Usuario de anmaga que comento',
	`price` FLOAT COMMENT 'precio de producto',
	`comments` VARCHAR(255) COMMENT 'Comentarios',
	`delivery` INTEGER COMMENT 'Tiempo en dias para la entrega del producto.',
	`createdAt` DATETIME COMMENT 'Fecha del cambio de status',
	PRIMARY KEY (`id`),
	INDEX `import_supplierQuoteItemComment_FI_1` (`userId`),
	CONSTRAINT `import_supplierQuoteItemComment_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `import_supplierQuoteItemComment_FI_2` (`supplierId`),
	CONSTRAINT `import_supplierQuoteItemComment_FK_2`
		FOREIGN KEY (`supplierId`)
		REFERENCES `import_supplier` (`id`),
	INDEX `import_supplierQuoteItemComment_FI_3` (`supplierQuoteItemId`),
	CONSTRAINT `import_supplierQuoteItemComment_FK_3`
		FOREIGN KEY (`supplierQuoteItemId`)
		REFERENCES `import_supplierQuoteItem` (`id`)
)Type=MyISAM COMMENT='Feedback entre supplier y usuario admin de anmaga sobre un Item';

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

#-----------------------------------------------------------------------------
#-- import_clientPurchaseOrder
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientPurchaseOrder`;


CREATE TABLE `import_clientPurchaseOrder`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de Orden de Pedido de Cliente',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`status` INTEGER  NOT NULL COMMENT 'Status de Cotizacion',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	`clientQuoteId` INTEGER  NOT NULL COMMENT 'id de cotizacion de proveedor relacionada',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Afiliado',
	`affiliateUserId` INTEGER COMMENT 'usuario del afiliado si creo la cotizacion',
	`userId` INTEGER COMMENT 'Usuario de anmaga si creo la cotizacion',
	PRIMARY KEY (`id`),
	INDEX `import_clientPurchaseOrder_FI_1` (`clientQuoteId`),
	CONSTRAINT `import_clientPurchaseOrder_FK_1`
		FOREIGN KEY (`clientQuoteId`)
		REFERENCES `import_clientQuote` (`id`),
	INDEX `import_clientPurchaseOrder_FI_2` (`userId`),
	CONSTRAINT `import_clientPurchaseOrder_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `import_clientPurchaseOrder_FI_3` (`affiliateId`),
	CONSTRAINT `import_clientPurchaseOrder_FK_3`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`),
	INDEX `import_clientPurchaseOrder_FI_4` (`affiliateUserId`),
	CONSTRAINT `import_clientPurchaseOrder_FK_4`
		FOREIGN KEY (`affiliateUserId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Orden de Pedido a Cliente';

#-----------------------------------------------------------------------------
#-- import_clientPurchaseOrderItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientPurchaseOrderItem`;


CREATE TABLE `import_clientPurchaseOrderItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de Orden de Pedido a Cliente',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`clientPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id producto',
	`quantity` INTEGER COMMENT 'Id producto',
	`price` FLOAT COMMENT 'precio de producto',
	PRIMARY KEY (`id`),
	INDEX `import_clientPurchaseOrderItem_FI_1` (`productId`),
	CONSTRAINT `import_clientPurchaseOrderItem_FK_1`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_clientPurchaseOrderItem_FI_2` (`clientPurchaseOrderId`),
	CONSTRAINT `import_clientPurchaseOrderItem_FK_2`
		FOREIGN KEY (`clientPurchaseOrderId`)
		REFERENCES `import_clientPurchaseOrder` (`id`)
)Type=MyISAM COMMENT='Elemento de Orden de Pedido a Cliente';

#-----------------------------------------------------------------------------
#-- import_clientPurchaseOrderHistory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_clientPurchaseOrderHistory`;


CREATE TABLE `import_clientPurchaseOrderHistory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`clientPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id de orden de pedido a proveedor',
	`status` INTEGER  NOT NULL COMMENT 'Codigo del estado guardado.',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	PRIMARY KEY (`id`),
	INDEX `import_clientPurchaseOrderHistory_FI_1` (`clientPurchaseOrderId`),
	CONSTRAINT `import_clientPurchaseOrderHistory_FK_1`
		FOREIGN KEY (`clientPurchaseOrderId`)
		REFERENCES `import_clientPurchaseOrder` (`id`)
)Type=MyISAM COMMENT='Historial de Estados por los que fue pasando la Orden de Pedido a Cliente';

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
	`supplierQuoteId` INTEGER  NOT NULL COMMENT 'id de cotizacion de proveedor relacionada',
	`clientQuoteId` INTEGER  NOT NULL COMMENT 'id de cotizacion a cliente relacionada',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Afiliado',
	`affiliateUserId` INTEGER COMMENT 'usuario del afiliado si creo la cotizacion',
	`userId` INTEGER COMMENT 'Usuario de anmaga si creo la cotizacion',
	PRIMARY KEY (`id`),
	INDEX `import_supplierPurchaseOrder_FI_1` (`supplierQuoteId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_1`
		FOREIGN KEY (`supplierQuoteId`)
		REFERENCES `import_supplierQuote` (`id`),
	INDEX `import_supplierPurchaseOrder_FI_2` (`clientQuoteId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_2`
		FOREIGN KEY (`clientQuoteId`)
		REFERENCES `import_clientQuote` (`id`),
	INDEX `import_supplierPurchaseOrder_FI_3` (`supplierId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_3`
		FOREIGN KEY (`supplierId`)
		REFERENCES `import_supplier` (`id`),
	INDEX `import_supplierPurchaseOrder_FI_4` (`userId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_4`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `import_supplierPurchaseOrder_FI_5` (`affiliateId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_5`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`),
	INDEX `import_supplierPurchaseOrder_FI_6` (`affiliateUserId`),
	CONSTRAINT `import_supplierPurchaseOrder_FK_6`
		FOREIGN KEY (`affiliateUserId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Orden de Pedido a Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierPurchaseOrderItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierPurchaseOrderItem`;


CREATE TABLE `import_supplierPurchaseOrderItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id elemento de Orden de Pedido a Cliente',
	`productId` INTEGER  NOT NULL COMMENT 'Id producto',
	`supplierPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id producto',
	`quantity` INTEGER COMMENT 'Id producto',
	`portId` INTEGER  NOT NULL COMMENT 'id de puerto',
	`incotermId` INTEGER  NOT NULL COMMENT 'id de incoterm',
	`price` FLOAT COMMENT 'precio de producto',
	`delivery` INTEGER COMMENT 'Tiempo en dias para la entrega del producto.',
	`package` INTEGER COMMENT 'A seleccionar entre Unidades o Bultos',
	`unitLength` FLOAT COMMENT 'Largo del empaque de la unidad ',
	`unitWidth` FLOAT COMMENT 'Ancho del empaque de la unidad ',
	`unitHeight` FLOAT COMMENT 'Alto del empaque de la unidad ',
	`unitGrossWeigth` FLOAT COMMENT 'Peso del empaque de la unidad ',
	`unitsPerCarton` INTEGER COMMENT 'Unidades por bulto',
	`cartons` INTEGER COMMENT 'Cantidad de bultos',
	`cartonLength` FLOAT COMMENT 'Largo del bulto',
	`cartonWidth` FLOAT COMMENT 'Ancho del bulto',
	`cartonHeight` FLOAT COMMENT 'Alto del bulto',
	`cartonGrossWeigth` FLOAT COMMENT 'Peso del bulto',
	PRIMARY KEY (`id`),
	INDEX `import_supplierPurchaseOrderItem_FI_1` (`productId`),
	CONSTRAINT `import_supplierPurchaseOrderItem_FK_1`
		FOREIGN KEY (`productId`)
		REFERENCES `import_product` (`id`),
	INDEX `import_supplierPurchaseOrderItem_FI_2` (`supplierPurchaseOrderId`),
	CONSTRAINT `import_supplierPurchaseOrderItem_FK_2`
		FOREIGN KEY (`supplierPurchaseOrderId`)
		REFERENCES `import_supplierPurchaseOrder` (`id`),
	INDEX `import_supplierPurchaseOrderItem_FI_3` (`incotermId`),
	CONSTRAINT `import_supplierPurchaseOrderItem_FK_3`
		FOREIGN KEY (`incotermId`)
		REFERENCES `import_incoterm` (`id`),
	INDEX `import_supplierPurchaseOrderItem_FI_4` (`portId`),
	CONSTRAINT `import_supplierPurchaseOrderItem_FK_4`
		FOREIGN KEY (`portId`)
		REFERENCES `import_port` (`id`)
)Type=MyISAM COMMENT='Elemento de Orden de Pedido a Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierPurchaseOrderHistory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierPurchaseOrderHistory`;


CREATE TABLE `import_supplierPurchaseOrderHistory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`supplierPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id de orden de pedido a proveedor',
	`status` INTEGER  NOT NULL COMMENT 'Codigo del estado guardado.',
	`comments` VARCHAR(255) COMMENT 'Comentarios.',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	PRIMARY KEY (`id`),
	INDEX `import_supplierPurchaseOrderHistory_FI_1` (`supplierPurchaseOrderId`),
	CONSTRAINT `import_supplierPurchaseOrderHistory_FK_1`
		FOREIGN KEY (`supplierPurchaseOrderId`)
		REFERENCES `import_supplierPurchaseOrder` (`id`)
)Type=MyISAM COMMENT='Historial de Estados por los que fue pasando la Orden de Pedido a Proveedor';

#-----------------------------------------------------------------------------
#-- import_supplierPurchaseOrderBankTransfer
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_supplierPurchaseOrderBankTransfer`;


CREATE TABLE `import_supplierPurchaseOrderBankTransfer`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`supplierPurchaseOrderId` INTEGER  NOT NULL COMMENT 'Id de orden de pedido a proveedor',
	`bankTransferNumber` VARCHAR(255)  NOT NULL COMMENT 'numero de transferencia bancaria.',
	`amount` FLOAT  NOT NULL COMMENT 'monto de la transferencia bancaria.',
	`accountNumber` VARCHAR(255)  NOT NULL COMMENT 'Numero de cuenta bancaria destino',
	`bankAccountId` INTEGER  NOT NULL COMMENT 'Cuenta bancaria origen',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	PRIMARY KEY (`id`),
	INDEX `import_supplierPurchaseOrderBankTransfer_FI_1` (`supplierPurchaseOrderId`),
	CONSTRAINT `import_supplierPurchaseOrderBankTransfer_FK_1`
		FOREIGN KEY (`supplierPurchaseOrderId`)
		REFERENCES `import_supplierPurchaseOrder` (`id`),
	INDEX `import_supplierPurchaseOrderBankTransfer_FI_2` (`bankAccountId`),
	CONSTRAINT `import_supplierPurchaseOrderBankTransfer_FK_2`
		FOREIGN KEY (`bankAccountId`)
		REFERENCES `import_bankAccount` (`id`)
)Type=MyISAM COMMENT='Transferencias bancarias realizadas a esa orden de pedido a proveedor';

#-----------------------------------------------------------------------------
#-- import_bankAccount
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `import_bankAccount`;


CREATE TABLE `import_bankAccount`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id',
	`accountNumber` VARCHAR(255)  NOT NULL COMMENT 'Numero de cuenta bancaria',
	`bank` VARCHAR(255)  NOT NULL COMMENT 'Banco',
	`active` TINYINT  NOT NULL COMMENT 'Is product active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Cuentas bancarias';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
