
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
	`accessUsersByAffiliate` INTEGER COMMENT 'El acceso a ese action para los usuarios por afiliados',
	`active` INTEGER COMMENT 'Si el action esta activo o no',
	`pair` VARCHAR(100) COMMENT 'Par del Action',
	PRIMARY KEY (`action`)
)Type=MyISAM COMMENT='Actions del sistema';

#-----------------------------------------------------------------------------
#-- affiliate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliate`;


CREATE TABLE `affiliate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id afiliado',
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre afiliado',
	PRIMARY KEY (`id`),
	CONSTRAINT `affiliate_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `affiliateInfo` (`affiliateId`)
)Type=MyISAM COMMENT='Afiliados';

#-----------------------------------------------------------------------------
#-- affiliateInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliateInfo`;


CREATE TABLE `affiliateInfo`
(
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`affiliateInternalNumber` INTEGER  NOT NULL COMMENT 'Id interno',
	`address` VARCHAR(255) COMMENT 'Direccion afiliado',
	`phone` VARCHAR(50) COMMENT 'Telefono afiliado',
	`email` VARCHAR(50) COMMENT 'Email afiliado',
	`contact` VARCHAR(50) COMMENT 'Nombre de persona de contacto',
	PRIMARY KEY (`affiliateId`),
	CONSTRAINT `affiliateInfo_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliate` (`id`)
)Type=MyISAM COMMENT='Informacion del afiliado';

#-----------------------------------------------------------------------------
#-- usersByAffiliate_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByAffiliate_user`;


CREATE TABLE `usersByAffiliate_user`
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
	UNIQUE KEY `usersByAffiliate_user_U_1` (`username`),
	CONSTRAINT `usersByAffiliate_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `usersByAffiliate_userInfo` (`userId`),
	INDEX `usersByAffiliate_user_FI_2` (`levelId`),
	CONSTRAINT `usersByAffiliate_user_FK_2`
		FOREIGN KEY (`levelId`)
		REFERENCES `usersByAffiliate_level` (`id`),
	INDEX `usersByAffiliate_user_FI_3` (`affiliateId`),
	CONSTRAINT `usersByAffiliate_user_FK_3`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliate` (`id`)
)Type=MyISAM COMMENT='Usuarios de afiliado';

#-----------------------------------------------------------------------------
#-- usersByAffiliate_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByAffiliate_userInfo`;


CREATE TABLE `usersByAffiliate_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `usersByAffiliate_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `usersByAffiliate_user` (`id`)
)Type=MyISAM COMMENT='Information about users by affiliates';

#-----------------------------------------------------------------------------
#-- usersByAffiliate_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByAffiliate_level`;


CREATE TABLE `usersByAffiliate_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `usersByAffiliate_level_U_1` (`name`)
)Type=MyISAM COMMENT='Levels';

#-----------------------------------------------------------------------------
#-- usersByAffiliate_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByAffiliate_userGroup`;


CREATE TABLE `usersByAffiliate_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `usersByAffiliate_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `usersByAffiliate_user` (`id`),
	INDEX `usersByAffiliate_userGroup_FI_2` (`groupId`),
	CONSTRAINT `usersByAffiliate_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `usersByAffiliate_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- usersByAffiliate_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByAffiliate_group`;


CREATE TABLE `usersByAffiliate_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `usersByAffiliate_group_U_1` (`name`)
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
#-- usersByAffiliate_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usersByAffiliate_groupCategory`;


CREATE TABLE `usersByAffiliate_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `usersByAffiliate_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `usersByAffiliate_group` (`id`)
		ON DELETE CASCADE,
	INDEX `usersByAffiliate_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `usersByAffiliate_groupCategory_FK_2`
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
	`label` VARCHAR(255) COMMENT 'Etiqueta',
	`description` VARCHAR(255) COMMENT 'Descripcion del modulo',
	`active` INTEGER default 0 NOT NULL COMMENT 'Estado del modulo',
	`alwaysActive` INTEGER default 0 NOT NULL COMMENT 'Modulo siempre activo',
	PRIMARY KEY (`name`),
	CONSTRAINT `modules_module_FK_1`
		FOREIGN KEY (`name`)
		REFERENCES `modules_dependency` (`module`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT=' Registro de modulos';

#-----------------------------------------------------------------------------
#-- modules_dependency
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_dependency`;


CREATE TABLE `modules_dependency`
(
	`module` VARCHAR(255)  NOT NULL COMMENT 'Modulo',
	`dependence` VARCHAR(255)  NOT NULL COMMENT 'Dependiente',
	PRIMARY KEY (`module`,`dependence`)
)Type=MyISAM COMMENT='Dependencia de modulos ';

#-----------------------------------------------------------------------------
#-- log_actionLog
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `log_actionLog`;


CREATE TABLE `log_actionLog`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id log',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`datetime` DATETIME  NOT NULL COMMENT 'Fecha en que se logueo el dato',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se logueo el dato',
	`message` VARCHAR(100)  NOT NULL COMMENT 'mensaje del log',
	PRIMARY KEY (`id`),
	INDEX `log_actionLog_FI_1` (`userId`),
	CONSTRAINT `log_actionLog_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `log_actionLog_FI_2` (`action`),
	CONSTRAINT `log_actionLog_FK_2`
		FOREIGN KEY (`action`)
		REFERENCES `security_action` (`action`)
)Type=MyISAM COMMENT='logs del sistema';

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
	`created` DATETIME  NOT NULL COMMENT 'Fecha en que se creo el pedido',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`branchId` INTEGER COMMENT 'Id de la sucursal',
	`processed` DATETIME COMMENT 'Fecha en que se proceso el pedido',
	`total` FLOAT COMMENT 'Precio total del pedido',
	`state` INTEGER COMMENT 'Estado del pedido',
	PRIMARY KEY (`id`),
	INDEX `orders_order_FI_1` (`userId`),
	CONSTRAINT `orders_order_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `usersByAffiliate_user` (`id`),
	INDEX `orders_order_FI_2` (`affiliateId`),
	CONSTRAINT `orders_order_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliate` (`id`),
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
		REFERENCES `usersByAffiliate_user` (`id`),
	INDEX `orders_orderTemplate_FI_2` (`affiliateId`),
	CONSTRAINT `orders_orderTemplate_FK_2`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliate` (`id`),
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
	PRIMARY KEY (`id`),
	INDEX `branch_FI_1` (`affiliateId`),
	CONSTRAINT `branch_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliate` (`id`)
)Type=MyISAM COMMENT='Sucursales de Afiliados';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;