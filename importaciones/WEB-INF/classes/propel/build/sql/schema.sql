
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
#-- request
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `request`;


CREATE TABLE `request`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Request Id',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`userId` INTEGER  NOT NULL COMMENT 'User',
	`status` INTEGER  NOT NULL COMMENT 'Request Status',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	PRIMARY KEY (`id`),
	INDEX `request_FI_1` (`userId`),
	CONSTRAINT `request_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
)Type=MyISAM COMMENT='Requests';

#-----------------------------------------------------------------------------
#-- productRequest
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `productRequest`;


CREATE TABLE `productRequest`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'ProductRequest Id',
	`requestId` INTEGER  NOT NULL COMMENT 'Request',
	`productId` INTEGER  NOT NULL COMMENT 'Product',
	`supplierId` INTEGER COMMENT 'Supplier',
	`quantity` INTEGER COMMENT 'Cantidad del producto en el pedido',
	`priceSupplier` FLOAT COMMENT 'Precio del proveedor',
	`timestampPriceSupplier` DATETIME COMMENT 'Fecha de la ultima modificacion del priceSupplier',
	`priceClient` FLOAT COMMENT 'Precio para el cliente',
	`timestampPriceClient` DATETIME COMMENT 'Fecha de la ultima modificacion del priceClient',
	`icotermId` INTEGER COMMENT 'Icoterm',
	`portId` INTEGER COMMENT 'Port',
	`status` INTEGER  NOT NULL COMMENT 'Request Status',
	`timestampStatus` DATETIME COMMENT 'Fecha del ultimo cambio de status',
	PRIMARY KEY (`id`),
	INDEX `productRequest_FI_1` (`requestId`),
	CONSTRAINT `productRequest_FK_1`
		FOREIGN KEY (`requestId`)
		REFERENCES `request` (`id`),
	INDEX `productRequest_FI_2` (`productId`),
	CONSTRAINT `productRequest_FK_2`
		FOREIGN KEY (`productId`)
		REFERENCES `product` (`id`),
	INDEX `productRequest_FI_3` (`supplierId`),
	CONSTRAINT `productRequest_FK_3`
		FOREIGN KEY (`supplierId`)
		REFERENCES `supplier` (`id`),
	INDEX `productRequest_FI_4` (`icotermId`),
	CONSTRAINT `productRequest_FK_4`
		FOREIGN KEY (`icotermId`)
		REFERENCES `icoterm` (`id`),
	INDEX `productRequest_FI_5` (`portId`),
	CONSTRAINT `productRequest_FK_5`
		FOREIGN KEY (`portId`)
		REFERENCES `port` (`id`)
)Type=MyISAM COMMENT='Products of each request';

#-----------------------------------------------------------------------------
#-- productRequestConfirmation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `productRequestConfirmation`;


CREATE TABLE `productRequestConfirmation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'ProductRequestConfirmation Id',
	`productRequestId` INTEGER  NOT NULL COMMENT 'Product Request',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`userId` INTEGER  NOT NULL COMMENT 'User',
	`attach` VARCHAR(255) COMMENT 'Nombre del archivo adjunto',
	PRIMARY KEY (`id`),
	INDEX `productRequestConfirmation_FI_1` (`productRequestId`),
	CONSTRAINT `productRequestConfirmation_FK_1`
		FOREIGN KEY (`productRequestId`)
		REFERENCES `productRequest` (`id`),
	INDEX `productRequestConfirmation_FI_2` (`userId`),
	CONSTRAINT `productRequestConfirmation_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Confirmacion por parte del cliente a cada pedido de producto';

#-----------------------------------------------------------------------------
#-- comment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;


CREATE TABLE `comment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'ProductRequestConfirmation Id',
	`productRequestId` INTEGER  NOT NULL COMMENT 'Product Request',
	`createdAt` DATETIME  NOT NULL COMMENT 'Creation date for',
	`userId` INTEGER  NOT NULL COMMENT 'User',
	`text` TEXT COMMENT 'Texto del comentario',
	`type` TINYINT  NOT NULL COMMENT 'Client|Supplier',
	PRIMARY KEY (`id`),
	INDEX `comment_FI_1` (`productRequestId`),
	CONSTRAINT `comment_FK_1`
		FOREIGN KEY (`productRequestId`)
		REFERENCES `productRequest` (`id`)
)Type=MyISAM COMMENT='Comentarios';

#-----------------------------------------------------------------------------
#-- product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;


CREATE TABLE `product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Product Id',
	`code` VARCHAR(255) COMMENT 'Codigo del producto',
	`name` VARCHAR(255) COMMENT 'Nombre del producto',
	`description` TEXT COMMENT 'Descripcion del producto',
	`supplierId` INTEGER COMMENT 'Supplier',
	`active` INTEGER  NOT NULL COMMENT 'Is product active?',
	PRIMARY KEY (`id`),
	INDEX `product_FI_1` (`supplierId`),
	CONSTRAINT `product_FK_1`
		FOREIGN KEY (`supplierId`)
		REFERENCES `supplier` (`id`)
)Type=MyISAM COMMENT='Productos';

#-----------------------------------------------------------------------------
#-- port
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `port`;


CREATE TABLE `port`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Port Id',
	`code` VARCHAR(255) COMMENT 'Codigo del puerto',
	`name` VARCHAR(255) COMMENT 'Nombre del puerto',
	`active` INTEGER  NOT NULL COMMENT 'Is port active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Puerto';

#-----------------------------------------------------------------------------
#-- icoterm
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `icoterm`;


CREATE TABLE `icoterm`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Tcoterm Id',
	`name` VARCHAR(255) COMMENT 'Nombre del Tcoterm',
	`description` VARCHAR(255) COMMENT 'Descripcion del Tcoterm',
	`active` INTEGER  NOT NULL COMMENT 'Is icoterm active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Icoterm';

#-----------------------------------------------------------------------------
#-- supplier
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `supplier`;


CREATE TABLE `supplier`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre',
	`active` INTEGER  NOT NULL COMMENT 'Is supplier active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Proveedores';

#-----------------------------------------------------------------------------
#-- SupplierUser
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `SupplierUser`;


CREATE TABLE `SupplierUser`
(
	`userId` INTEGER  NOT NULL COMMENT 'User ID',
	`supplierId` INTEGER  NOT NULL COMMENT 'Supplier ID',
	PRIMARY KEY (`userId`,`supplierId`),
	CONSTRAINT `SupplierUser_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
		ON DELETE CASCADE,
	INDEX `SupplierUser_FI_2` (`supplierId`),
	CONSTRAINT `SupplierUser_FK_2`
		FOREIGN KEY (`supplierId`)
		REFERENCES `supplier` (`id`)
)Type=MyISAM COMMENT='Users / Suppliers';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
