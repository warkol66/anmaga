
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- users_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_user`;


CREATE TABLE `users_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` INTEGER  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`levelId` INTEGER COMMENT 'User Level',
	`lastLogin` DATETIME COMMENT 'Fecha del ultimo login del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_user_U_1` (`username`),
	CONSTRAINT `users_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `users_userInfo` (`userId`),
	INDEX `users_user_FI_2` (`levelId`),
	CONSTRAINT `users_user_FK_2`
		FOREIGN KEY (`levelId`)
		REFERENCES `users_level` (`id`)
)Type=MyISAM COMMENT='Users';

#-----------------------------------------------------------------------------
#-- users_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userInfo`;


CREATE TABLE `users_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `users_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
)Type=MyISAM COMMENT='Information about users';

#-----------------------------------------------------------------------------
#-- users_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userGroup`;


CREATE TABLE `users_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `users_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `users_userGroup_FI_2` (`groupId`),
	CONSTRAINT `users_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- users_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_group`;


CREATE TABLE `users_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_group_U_1` (`name`)
)Type=MyISAM COMMENT='Groups';

#-----------------------------------------------------------------------------
#-- users_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_level`;


CREATE TABLE `users_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_level_U_1` (`name`)
)Type=MyISAM COMMENT='Levels';

#-----------------------------------------------------------------------------
#-- security_action
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_action`;


CREATE TABLE `security_action`
(
	`action` VARCHAR(100)  NOT NULL COMMENT 'Action pagina',
	`module` VARCHAR(100) COMMENT 'Modulo',
	`section` VARCHAR(100) COMMENT 'Seccion',
	`access` INTEGER COMMENT 'El acceso a ese action',
	`accessAffiliateUser` INTEGER COMMENT 'El acceso a ese action para los usuarios por afiliados',
	`active` INTEGER COMMENT 'Si el action esta activo o no',
	`pair` VARCHAR(100) COMMENT 'Par del Action',
	PRIMARY KEY (`action`),
	CONSTRAINT `security_action_FK_1`
		FOREIGN KEY (`action`)
		REFERENCES `security_actionLabel` (`action`)
)Type=MyISAM COMMENT='Actions del sistema';

#-----------------------------------------------------------------------------
#-- security_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_module`;


CREATE TABLE `security_module`
(
	`module` VARCHAR(100)  NOT NULL COMMENT 'Modulo',
	`access` INTEGER COMMENT 'El acceso a ese action',
	`accessAffiliateUser` INTEGER COMMENT 'El acceso a ese action para los usuarios por afiliados',
	PRIMARY KEY (`module`)
)Type=MyISAM COMMENT='Modulos del sistema';

#-----------------------------------------------------------------------------
#-- security_actionLabel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_actionLabel`;


CREATE TABLE `security_actionLabel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id label security',
	`action` VARCHAR(100)  NOT NULL COMMENT 'Action pagina',
	`language` VARCHAR(100) COMMENT 'Idioma de la etiqueta',
	`label` VARCHAR(100) COMMENT 'Etiqueta',
	PRIMARY KEY (`id`,`action`),
	INDEX `I_referenced_security_action_FK_1_1` (`action`)
)Type=MyISAM COMMENT='etiquetas de actions de seguridad';

#-----------------------------------------------------------------------------
#-- affiliates_affiliate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_affiliate`;


CREATE TABLE `affiliates_affiliate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id afiliado',
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre afiliado',
	`ownerId` INTEGER COMMENT 'Id del usuario administrador del afiliado',
	PRIMARY KEY (`id`),
	CONSTRAINT `affiliates_affiliate_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `affiliates_affiliateInfo` (`affiliateId`)
)Type=MyISAM COMMENT='Afiliados';

#-----------------------------------------------------------------------------
#-- affiliates_affiliateInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_affiliateInfo`;


CREATE TABLE `affiliates_affiliateInfo`
(
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`affiliateInternalNumber` INTEGER  NOT NULL COMMENT 'Id interno',
	`address` VARCHAR(255) COMMENT 'Direccion afiliado',
	`phone` VARCHAR(50) COMMENT 'Telefono afiliado',
	`email` VARCHAR(50) COMMENT 'Email afiliado',
	`contact` VARCHAR(50) COMMENT 'Nombre de persona de contacto',
	`contactEmail` VARCHAR(100) COMMENT 'Email de persona de contacto',
	`web` VARCHAR(255) COMMENT 'Direccion web del afiliado',
	`memo` TEXT COMMENT 'Informacion adicional del afiliado',
	PRIMARY KEY (`affiliateId`),
	CONSTRAINT `affiliates_affiliateInfo_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Informacion del afiliado';

#-----------------------------------------------------------------------------
#-- affiliates_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_user`;


CREATE TABLE `affiliates_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` INTEGER  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`levelId` INTEGER COMMENT 'User Level',
	`lastLogin` DATETIME COMMENT 'Fecha del ultimo login del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_user_U_1` (`username`),
	CONSTRAINT `affiliates_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `affiliates_userInfo` (`userId`),
	INDEX `affiliates_user_FI_2` (`levelId`),
	CONSTRAINT `affiliates_user_FK_2`
		FOREIGN KEY (`levelId`)
		REFERENCES `affiliates_level` (`id`),
	INDEX `affiliates_user_FI_3` (`affiliateId`),
	CONSTRAINT `affiliates_user_FK_3`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Usuarios de afiliado';

#-----------------------------------------------------------------------------
#-- affiliates_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_userInfo`;


CREATE TABLE `affiliates_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `affiliates_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Information about users by affiliates';

#-----------------------------------------------------------------------------
#-- affiliates_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_level`;


CREATE TABLE `affiliates_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_level_U_1` (`name`)
)Type=MyISAM COMMENT='Levels';

#-----------------------------------------------------------------------------
#-- affiliates_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_userGroup`;


CREATE TABLE `affiliates_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `affiliates_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`),
	INDEX `affiliates_userGroup_FI_2` (`groupId`),
	CONSTRAINT `affiliates_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `affiliates_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- affiliates_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_group`;


CREATE TABLE `affiliates_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_group_U_1` (`name`)
)Type=MyISAM COMMENT='Groups';

#-----------------------------------------------------------------------------
#-- category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;


CREATE TABLE `category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Category name',
	`active` INTEGER  NOT NULL COMMENT 'Is category active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Categorias';

#-----------------------------------------------------------------------------
#-- users_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_groupCategory`;


CREATE TABLE `users_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `users_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
		ON DELETE CASCADE,
	INDEX `users_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `users_groupCategory_FK_2`
		FOREIGN KEY (`categoryId`)
		REFERENCES `category` (`id`)
)Type=MyISAM COMMENT='Groups / Categories';

#-----------------------------------------------------------------------------
#-- affiliates_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_groupCategory`;


CREATE TABLE `affiliates_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `affiliates_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `affiliates_group` (`id`)
		ON DELETE CASCADE,
	INDEX `affiliates_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `affiliates_groupCategory_FK_2`
		FOREIGN KEY (`categoryId`)
		REFERENCES `category` (`id`)
)Type=MyISAM COMMENT='Groups / Categories';

#-----------------------------------------------------------------------------
#-- modules_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_module`;


CREATE TABLE `modules_module`
(
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre del modulo',
	`active` INTEGER default 0 NOT NULL COMMENT 'Estado del modulo',
	`alwaysActive` INTEGER default 0 NOT NULL COMMENT 'Modulo siempre activo',
	PRIMARY KEY (`name`)
)Type=MyISAM COMMENT=' Registro de modulos';

#-----------------------------------------------------------------------------
#-- modules_dependency
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_dependency`;


CREATE TABLE `modules_dependency`
(
	`moduleName` VARCHAR(255)  NOT NULL COMMENT 'Modulo',
	`dependence` VARCHAR(255)  NOT NULL COMMENT 'Modulos de los cuales depende',
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

#-----------------------------------------------------------------------------
#-- actionLogs_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_log`;


CREATE TABLE `actionLogs_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id log',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`datetime` DATETIME  NOT NULL COMMENT 'Fecha en que se logueo el dato',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se logueo el dato',
	`object` VARCHAR(100)  NOT NULL COMMENT 'objeto sobre el cual se realizo la accion',
	`forward` VARCHAR(100) COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`),
	INDEX `actionLogs_log_FI_1` (`userId`),
	CONSTRAINT `actionLogs_log_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `actionLogs_log_FI_2` (`action`),
	CONSTRAINT `actionLogs_log_FK_2`
		FOREIGN KEY (`action`)
		REFERENCES `security_action` (`action`)
)Type=MyISAM COMMENT='logs del sistema';

#-----------------------------------------------------------------------------
#-- actionLogs_label
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_label`;


CREATE TABLE `actionLogs_label`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id Label',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se loguea el dato',
	`label` VARCHAR(100)  NOT NULL COMMENT 'mensaje del log',
	`language` VARCHAR(100) COMMENT 'idioma de la etiqueta',
	`forward` VARCHAR(100) COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`,`action`)
)Type=MyISAM COMMENT='Etiquetas de logueo';

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
	`active` INTEGER  NOT NULL COMMENT 'Is product active?',
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
	`active` INTEGER  NOT NULL COMMENT 'Is supplier active?',
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
	`active` INTEGER  NOT NULL COMMENT 'Is port active?',
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
	`active` INTEGER  NOT NULL COMMENT 'Is incoterm active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Incoterm';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
