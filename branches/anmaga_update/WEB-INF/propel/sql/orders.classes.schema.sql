
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- orders_order
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_order`;


CREATE TABLE `orders_order`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del pedido',
	`number` INTEGER   COMMENT 'Numero interno del pedido',
	`created` DATETIME  NOT NULL COMMENT 'Fecha en que se creo el pedido',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`branchId` INTEGER   COMMENT 'Id de la sucursal',
	`total` FLOAT   COMMENT 'Precio total del pedido',
	`state` INTEGER   COMMENT 'Estado del pedido',
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
) ENGINE=MyISAM COMMENT='Pedido de Productos';

#-----------------------------------------------------------------------------
#-- orders_orderItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_orderItem`;


CREATE TABLE `orders_orderItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del item del pedido',
	`orderId` INTEGER  NOT NULL COMMENT 'Id del pedido',
	`productId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`price` FLOAT   COMMENT 'Precio del producto',
	`quantity` INTEGER   COMMENT 'Cantidad del producto en el pedido',
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
) ENGINE=MyISAM COMMENT='Item del Pedido de Productos';

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
	`comment` TEXT   COMMENT 'Comentarios',
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
) ENGINE=MyISAM COMMENT='Cambios de Estado de Pedidos de Productos';

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
	`branchId` INTEGER   COMMENT 'Id de la sucursal',
	`total` FLOAT   COMMENT 'Precio total del pedido',
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
) ENGINE=MyISAM COMMENT='Plantillas de Pedido de Productos';

#-----------------------------------------------------------------------------
#-- orders_orderTemplateItem
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orders_orderTemplateItem`;


CREATE TABLE `orders_orderTemplateItem`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del item del pedido',
	`orderTemplateId` INTEGER  NOT NULL COMMENT 'Id del pedido',
	`productId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`price` FLOAT   COMMENT 'Precio del producto',
	`quantity` INTEGER   COMMENT 'Cantidad del producto en el pedido',
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
) ENGINE=MyISAM COMMENT='Item de la Plantilla de Pedido de Productos';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
