
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
#-- node
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `node`;


CREATE TABLE `node`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del nodo',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre del nodo',
	`kind` VARCHAR(255)  NOT NULL COMMENT 'Tipo de nodo',
	`objectId` INTEGER COMMENT 'Id del objeto relacionado al nodo',
	`parentId` INTEGER COMMENT 'Id del nodo padre',
	`position` INTEGER COMMENT 'Orden entre los hermanos del nodo',
	PRIMARY KEY (`id`),
	INDEX `node_FI_1` (`parentId`),
	CONSTRAINT `node_FK_1`
		FOREIGN KEY (`parentId`)
		REFERENCES `node` (`id`)
)Type=MyISAM COMMENT='Nodo del Arbol';

#-----------------------------------------------------------------------------
#-- product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;


CREATE TABLE `product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del producto',
	`code` VARCHAR(255) COMMENT 'Codigo del producto',
	`description` VARCHAR(255) COMMENT 'Descripcion',
	`price` FLOAT COMMENT 'Precio del producto',
	`unitId` INTEGER COMMENT 'Unidades',
	`measureUnitId` INTEGER COMMENT 'Unidad de Medida',
	`active` INTEGER default 1 NOT NULL COMMENT 'Is product active?',
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
)Type=MyISAM COMMENT='Producto';

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
)Type=MyISAM COMMENT='Unidades';

#-----------------------------------------------------------------------------
#-- measureUnit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `measureUnit`;


CREATE TABLE `measureUnit`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la unidad de medida',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Unidad de Medida',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Unidad de Medida';

#-----------------------------------------------------------------------------
#-- productCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `productCategory`;


CREATE TABLE `productCategory`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la categoria',
	`description` VARCHAR(255) COMMENT 'Descripcion',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Categorias de Productos';

#-----------------------------------------------------------------------------
#-- orders_order
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_order`;


CREATE TABLE `orders_order`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del pedido',
	`number` INTEGER COMMENT 'Numero interno del pedido',
	`created` DATETIME  NOT NULL COMMENT 'Fecha en que se creo el pedido',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`branchId` INTEGER COMMENT 'Id de la sucursal',
	`total` FLOAT COMMENT 'Precio total del pedido',
	`state` INTEGER COMMENT 'Estado del pedido',
	PRIMARY KEY (`id`),
	INDEX `orders_order_FI_1` (`userId`),
	CONSTRAINT `orders_order_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`),
	INDEX `orders_order_FI_2` (`affiliateId`),
	CONSTRAINT `orders_order_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`),
	INDEX `orders_order_FI_3` (`branchId`),
	CONSTRAINT `orders_order_FK_3`
		FOREIGN KEY (`branchId`)
		REFERENCES `branch` (`id`)
)Type=MyISAM COMMENT='Pedido de Productos';

#-----------------------------------------------------------------------------
#-- orders_orderItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_orderItem`;


CREATE TABLE `orders_orderItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del item del pedido',
	`orderId` INTEGER  NOT NULL COMMENT 'Id del pedido',
	`productId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`price` FLOAT COMMENT 'Precio del producto',
	`quantity` INTEGER COMMENT 'Cantidad del producto en el pedido',
	PRIMARY KEY (`id`),
	INDEX `orders_orderItem_FI_1` (`orderId`),
	CONSTRAINT `orders_orderItem_FK_1`
		FOREIGN KEY (`orderId`)
		REFERENCES `orders_order` (`id`)
		ON DELETE CASCADE,
	INDEX `orders_orderItem_FI_2` (`productId`),
	CONSTRAINT `orders_orderItem_FK_2`
		FOREIGN KEY (`productId`)
		REFERENCES `product` (`id`)
)Type=MyISAM COMMENT='Item del Pedido de Productos';

#-----------------------------------------------------------------------------
#-- orders_stateChanges
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_stateChanges`;


CREATE TABLE `orders_stateChanges`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del cambio de estado del pedido',
	`created` DATETIME  NOT NULL COMMENT 'Fecha en que se cambio el estado',
	`orderId` INTEGER  NOT NULL COMMENT 'Id del pedido',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`state` INTEGER  NOT NULL COMMENT 'Nuevo estado',
	`comment` VARCHAR(255) COMMENT 'Comentarios',
	PRIMARY KEY (`id`),
	INDEX `orders_stateChanges_FI_1` (`orderId`),
	CONSTRAINT `orders_stateChanges_FK_1`
		FOREIGN KEY (`orderId`)
		REFERENCES `orders_order` (`id`)
		ON DELETE CASCADE,
	INDEX `orders_stateChanges_FI_2` (`userId`),
	CONSTRAINT `orders_stateChanges_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`),
	INDEX `orders_stateChanges_FI_3` (`affiliateId`),
	CONSTRAINT `orders_stateChanges_FK_3`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Cambios de Estado de Pedidos de Productos';

#-----------------------------------------------------------------------------
#-- orders_orderTemplate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_orderTemplate`;


CREATE TABLE `orders_orderTemplate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del pedido',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre de la plantilla',
	`created` DATETIME  NOT NULL COMMENT 'Fecha en que se creo el pedido',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`branchId` INTEGER COMMENT 'Id de la sucursal',
	`total` FLOAT COMMENT 'Precio total del pedido',
	PRIMARY KEY (`id`),
	INDEX `orders_orderTemplate_FI_1` (`userId`),
	CONSTRAINT `orders_orderTemplate_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`),
	INDEX `orders_orderTemplate_FI_2` (`affiliateId`),
	CONSTRAINT `orders_orderTemplate_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`),
	INDEX `orders_orderTemplate_FI_3` (`branchId`),
	CONSTRAINT `orders_orderTemplate_FK_3`
		FOREIGN KEY (`branchId`)
		REFERENCES `branch` (`id`)
)Type=MyISAM COMMENT='Plantillas de Pedido de Productos';

#-----------------------------------------------------------------------------
#-- orders_orderTemplateItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_orderTemplateItem`;


CREATE TABLE `orders_orderTemplateItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del item del pedido',
	`orderTemplateId` INTEGER  NOT NULL COMMENT 'Id del pedido',
	`productId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`price` FLOAT COMMENT 'Precio del producto',
	`quantity` INTEGER COMMENT 'Cantidad del producto en el pedido',
	PRIMARY KEY (`id`),
	INDEX `orders_orderTemplateItem_FI_1` (`orderTemplateId`),
	CONSTRAINT `orders_orderTemplateItem_FK_1`
		FOREIGN KEY (`orderTemplateId`)
		REFERENCES `orders_orderTemplate` (`id`)
		ON DELETE CASCADE,
	INDEX `orders_orderTemplateItem_FI_2` (`productId`),
	CONSTRAINT `orders_orderTemplateItem_FK_2`
		FOREIGN KEY (`productId`)
		REFERENCES `product` (`id`)
)Type=MyISAM COMMENT='Item de la Plantilla de Pedido de Productos';

#-----------------------------------------------------------------------------
#-- branch
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `branch`;


CREATE TABLE `branch`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la sucursal',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`number` INTEGER  NOT NULL COMMENT 'Numero de la sucursal',
	`name` VARCHAR(255) COMMENT 'Nombre de la sucursal',
	`phone` VARCHAR(100) COMMENT 'Telefono de la sucursal',
	`contact` VARCHAR(50) COMMENT 'Nombre de persona de contacto',
	`contactEmail` VARCHAR(100) COMMENT 'Email de persona de contacto',
	`memo` TEXT COMMENT 'Informacion adicional de la sucursal',
	PRIMARY KEY (`id`),
	INDEX `branch_FI_1` (`affiliateId`),
	CONSTRAINT `branch_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Sucursales de Afiliados';

#-----------------------------------------------------------------------------
#-- usersByRegistration_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByRegistration_user`;


CREATE TABLE `usersByRegistration_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` INTEGER  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`ip` VARCHAR(255)  NOT NULL COMMENT 'Registration IP',
	`lastLogin` DATETIME COMMENT 'Fecha del ultimo login del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `usersByRegistration_user_U_1` (`username`),
	CONSTRAINT `usersByRegistration_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `usersByRegistration_userInfo` (`userId`)
)Type=MyISAM COMMENT='Users by registration';

#-----------------------------------------------------------------------------
#-- usersByRegistration_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByRegistration_userInfo`;


CREATE TABLE `usersByRegistration_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'UserByRegistration Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `usersByRegistration_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `usersByRegistration_user` (`id`)
)Type=MyISAM COMMENT='Information about users by registration';

#-----------------------------------------------------------------------------
#-- catalog_affiliateProduct
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_affiliateProduct`;


CREATE TABLE `catalog_affiliateProduct`
(
	`productId` INTEGER  NOT NULL COMMENT 'Producto',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Afiliado',
	`price` FLOAT COMMENT 'Precio del producto',
	PRIMARY KEY (`productId`,`affiliateId`),
	UNIQUE KEY `catalog_affiliateProduct_U_1` (`productId`, `affiliateId`),
	CONSTRAINT `catalog_affiliateProduct_FK_1`
		FOREIGN KEY (`productId`)
		REFERENCES `product` (`id`),
	INDEX `catalog_affiliateProduct_FI_2` (`affiliateId`),
	CONSTRAINT `catalog_affiliateProduct_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Precios de Productos por Afiliado';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
