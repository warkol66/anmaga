-- phpMyAdmin SQL Dump
-- version 2.9.1.1-Debian-2ubuntu1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 28, 2007 at 01:39 PM
-- Server version: 5.0.38
-- PHP Version: 5.2.1
-- 
-- Database: `importaciones`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `MLUSE_Language`
-- 

DROP TABLE IF EXISTS `MLUSE_Language`;
CREATE TABLE IF NOT EXISTS `MLUSE_Language` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `MLUSE_Language`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `MLUSE_Text`
-- 

DROP TABLE IF EXISTS `MLUSE_Text`;
CREATE TABLE IF NOT EXISTS `MLUSE_Text` (
  `id` int(11) NOT NULL auto_increment,
  `languageId` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`,`languageId`),
  KEY `MLUSE_Text_ibfk_1` (`languageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `MLUSE_Text`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `SupplierUser`
-- 

DROP TABLE IF EXISTS `SupplierUser`;
CREATE TABLE IF NOT EXISTS `SupplierUser` (
  `userId` int(11) NOT NULL COMMENT 'User ID',
  `supplierId` int(11) NOT NULL COMMENT 'Supplier ID',
  PRIMARY KEY  (`userId`,`supplierId`),
  KEY `SupplierUser_FI_2` (`supplierId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Users / Suppliers';

-- 
-- Dumping data for table `SupplierUser`
-- 

INSERT INTO `SupplierUser` (`userId`, `supplierId`) VALUES 
(6, 1),
(7, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `actionLogs_label`
-- 

DROP TABLE IF EXISTS `actionLogs_label`;
CREATE TABLE IF NOT EXISTS `actionLogs_label` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Id Label',
  `action` varchar(100) NOT NULL COMMENT 'action en que se loguea el dato',
  `label` varchar(100) NOT NULL COMMENT 'mensaje del log',
  `language` varchar(100) default NULL COMMENT 'idioma de la etiqueta',
  `forward` varchar(100) default NULL COMMENT 'tipo de accion de la etiqueta',
  PRIMARY KEY  (`id`,`action`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Etiquetas de logueo' AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `actionLogs_label`
-- 

INSERT INTO `actionLogs_label` (`id`, `action`, `label`, `language`, `forward`) VALUES 
(1, 'modulesList', 'Mostrar lista de mÃ³dulos del sistema', 'esp', 'success'),
(2, 'modulesList', 'List system modules', 'eng', 'success'),
(3, 'modulesList', 'No se pudo mostrar lista de mÃ³dulos del sistema', 'esp', 'failure'),
(4, 'modulesList', 'Unable to list system modules', 'eng', 'failure'),
(5, 'modulesEdit', 'Ingresar a editar modulo', 'esp', 'success'),
(6, 'modulesEdit', 'Enter to edit module ', 'eng', 'success'),
(7, 'modulesEdit', 'No pudo ingresar a editar modulo', 'esp', 'failure'),
(8, 'modulesEdit', 'He cannot enter to edit module', 'eng', 'failure'),
(9, 'modulesDoActivateX', 'Activar un mÃ³dulo', 'esp', 'success'),
(10, 'modulesDoActivateX', 'Active module ', 'eng', 'success'),
(11, 'modulesDoActivateX', 'No pudo activar un mÃ³dulo', 'esp', 'errorDependencyOff'),
(12, 'modulesDoActivateX', 'He cannot enable a module', 'eng', 'errorDependencyOff'),
(13, 'modulesDoActivateX', 'No pudo desactivar un mÃ³dulo', 'esp', 'errorDependencyOn'),
(14, 'modulesDoActivateX', 'He cannot disable a module', 'eng', 'errorDependencyOn');

-- --------------------------------------------------------

-- 
-- Table structure for table `actionLogs_log`
-- 

DROP TABLE IF EXISTS `actionLogs_log`;
CREATE TABLE IF NOT EXISTS `actionLogs_log` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Id log',
  `userId` int(11) NOT NULL COMMENT 'Id del usuario',
  `affiliateId` int(11) NOT NULL COMMENT 'Id del afiliado',
  `datetime` datetime NOT NULL COMMENT 'Fecha en que se logueo el dato',
  `action` varchar(100) NOT NULL COMMENT 'action en que se logueo el dato',
  `object` varchar(100) NOT NULL COMMENT 'objeto sobre el cual se realizo la accion',
  `forward` varchar(100) default NULL COMMENT 'tipo de accion de la etiqueta',
  PRIMARY KEY  (`id`),
  KEY `actionLogs_log_FI_1` (`userId`),
  KEY `actionLogs_log_FI_2` (`action`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='logs del sistema' AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `actionLogs_log`
-- 

INSERT INTO `actionLogs_log` (`id`, `userId`, `affiliateId`, `datetime`, `action`, `object`, `forward`) VALUES 
(1, 1, 0, '2007-06-12 08:04:13', 'modulesList', 'listando general', 'success'),
(2, 1, 0, '2007-06-12 08:24:18', 'modulesList', 'listando general', 'success'),
(3, 1, 0, '2007-06-12 08:24:27', 'modulesList', 'listando general', 'success'),
(4, 1, 0, '2007-06-12 08:24:46', 'modulesList', 'listando general', 'success'),
(5, 1, 0, '2007-06-12 08:26:39', 'modulesList', 'listando general', 'success'),
(6, 1, 0, '2007-06-12 08:27:57', 'modulesList', 'listando general', 'success'),
(7, 1, 0, '2007-06-12 08:36:01', 'modulesList', 'listando general', 'success'),
(8, 1, 0, '2007-06-12 08:42:00', 'modulesList', 'listando general', 'success'),
(9, 1, 0, '2007-06-12 08:48:23', 'modulesList', 'listando general', 'success'),
(10, 1, 0, '2007-06-12 09:06:48', 'modulesList', 'listando general', 'success'),
(11, 1, 0, '2007-06-12 09:07:50', 'modulesList', 'listando general', 'success'),
(12, 1, 0, '2007-06-12 09:10:11', 'modulesList', 'listando general', 'success'),
(13, 1, 0, '2007-06-12 09:12:12', 'modulesList', 'listando general', 'success'),
(14, 1, 0, '2007-06-12 10:33:25', 'modulesList', 'listando general', 'success'),
(15, 1, 0, '2007-06-12 12:13:27', 'modulesList', 'listando general', 'success'),
(16, 1, 0, '2007-06-12 12:13:47', 'modulesList', 'listando general', 'success'),
(17, 1, 0, '2007-06-12 12:14:01', 'modulesList', 'listando general', 'success'),
(18, 1, 0, '2007-11-28 16:47:49', 'modulesList', 'listando general', 'success'),
(19, 1, 0, '2007-11-29 09:46:24', 'modulesList', 'listando general', 'success'),
(20, 1, 0, '2007-12-04 08:51:58', 'modulesList', 'listando general', 'success'),
(21, 2, 0, '2007-12-05 06:10:14', 'modulesList', 'listando general', 'success'),
(22, 2, 0, '2007-12-07 06:39:29', 'modulesList', 'listando general', 'success'),
(23, 2, 0, '2007-12-11 08:26:46', 'modulesList', 'listando general', 'success'),
(24, 2, 0, '2007-12-11 08:27:22', 'modulesList', 'listando general', 'success');

-- --------------------------------------------------------

-- 
-- Table structure for table `affiliate`
-- 

DROP TABLE IF EXISTS `affiliate`;
CREATE TABLE IF NOT EXISTS `affiliate` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Id afiliado',
  `name` varchar(255) collate latin1_general_cs NOT NULL COMMENT 'nombre afiliado',
  `ownerId` int(11) default NULL COMMENT 'Id del usuario administrador del afiliado',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Afiliados' AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `affiliate`
-- 

INSERT INTO `affiliate` (`id`, `name`, `ownerId`) VALUES 
(1, 'Makro', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `affiliateInfo`
-- 

DROP TABLE IF EXISTS `affiliateInfo`;
CREATE TABLE IF NOT EXISTS `affiliateInfo` (
  `affiliateId` int(11) NOT NULL COMMENT 'Id afiliado',
  `affiliateInternalNumber` int(11) NOT NULL COMMENT 'Id interno',
  `address` varchar(255) collate latin1_general_cs default NULL COMMENT 'Direccion afiliado',
  `phone` varchar(50) collate latin1_general_cs default NULL COMMENT 'Telefono afiliado',
  `email` varchar(50) collate latin1_general_cs default NULL COMMENT 'Email afiliado',
  `contact` varchar(50) collate latin1_general_cs default NULL COMMENT 'Nombre de persona de contacto',
  `contactEmail` varchar(100) collate latin1_general_cs default NULL COMMENT 'Email de persona de contacto',
  `web` varchar(255) collate latin1_general_cs default NULL COMMENT 'Direccion web del afiliado',
  `memo` text collate latin1_general_cs COMMENT 'Informacion adicional del afiliado',
  PRIMARY KEY  (`affiliateId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Informacion del afiliado';

-- 
-- Dumping data for table `affiliateInfo`
-- 

INSERT INTO `affiliateInfo` (`affiliateId`, `affiliateInternalNumber`, `address`, `phone`, `email`, `contact`, `contactEmail`, `web`, `memo`) VALUES 
(1, 1, 'La Urbina', '567-8900', 'makro@yahoo.com', 'Luis Makro', 'lmakro@yahoo.com', 'makro.com', 'Tienen 9 tienedas');

-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_affiliate`
-- 

DROP TABLE IF EXISTS `affiliates_affiliate`;
CREATE TABLE IF NOT EXISTS `affiliates_affiliate` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Id afiliado',
  `name` varchar(255) NOT NULL COMMENT 'nombre afiliado',
  `ownerId` int(11) default NULL COMMENT 'Id del usuario administrador del afiliado',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Afiliados' AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `affiliates_affiliate`
-- 

INSERT INTO `affiliates_affiliate` (`id`, `name`, `ownerId`) VALUES 
(1, 'Makro', 2),
(2, 'Epa', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_affiliateInfo`
-- 

DROP TABLE IF EXISTS `affiliates_affiliateInfo`;
CREATE TABLE IF NOT EXISTS `affiliates_affiliateInfo` (
  `affiliateId` int(11) NOT NULL COMMENT 'Id afiliado',
  `affiliateInternalNumber` int(11) NOT NULL COMMENT 'Id interno',
  `address` varchar(255) default NULL COMMENT 'Direccion afiliado',
  `phone` varchar(50) default NULL COMMENT 'Telefono afiliado',
  `email` varchar(50) default NULL COMMENT 'Email afiliado',
  `contact` varchar(50) default NULL COMMENT 'Nombre de persona de contacto',
  `contactEmail` varchar(100) default NULL COMMENT 'Email de persona de contacto',
  `web` varchar(255) default NULL COMMENT 'Direccion web del afiliado',
  `memo` text COMMENT 'Informacion adicional del afiliado',
  PRIMARY KEY  (`affiliateId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Informacion del afiliado';

-- 
-- Dumping data for table `affiliates_affiliateInfo`
-- 

INSERT INTO `affiliates_affiliateInfo` (`affiliateId`, `affiliateInternalNumber`, `address`, `phone`, `email`, `contact`, `contactEmail`, `web`, `memo`) VALUES 
(1, 23, 'La Yaguara', '', '', '', '', '', ''),
(2, 13, '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_group`
-- 

DROP TABLE IF EXISTS `affiliates_group`;
CREATE TABLE IF NOT EXISTS `affiliates_group` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Group ID',
  `name` varchar(255) NOT NULL COMMENT 'Group Name',
  `created` datetime NOT NULL COMMENT 'Creation date for',
  `updated` datetime NOT NULL COMMENT 'Last update date',
  `bitLevel` int(11) default NULL COMMENT 'Nivel',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `affiliates_group_U_1` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Groups' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `affiliates_group`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_groupCategory`
-- 

DROP TABLE IF EXISTS `affiliates_groupCategory`;
CREATE TABLE IF NOT EXISTS `affiliates_groupCategory` (
  `groupId` int(11) NOT NULL COMMENT 'Group ID',
  `categoryId` int(11) NOT NULL COMMENT 'Category ID',
  PRIMARY KEY  (`groupId`,`categoryId`),
  KEY `affiliates_groupCategory_FI_2` (`categoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Groups / Categories';

-- 
-- Dumping data for table `affiliates_groupCategory`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_level`
-- 

DROP TABLE IF EXISTS `affiliates_level`;
CREATE TABLE IF NOT EXISTS `affiliates_level` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Level ID',
  `name` varchar(255) NOT NULL COMMENT 'Level Name',
  `bitLevel` int(11) default NULL COMMENT 'Bit del nivel',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `affiliates_level_U_1` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Levels' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `affiliates_level`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_user`
-- 

DROP TABLE IF EXISTS `affiliates_user`;
CREATE TABLE IF NOT EXISTS `affiliates_user` (
  `id` int(11) NOT NULL auto_increment COMMENT 'User Id',
  `affiliateId` int(11) NOT NULL COMMENT 'Id afiliado',
  `username` varchar(255) NOT NULL COMMENT 'username',
  `password` varchar(255) NOT NULL COMMENT 'password',
  `active` int(11) NOT NULL COMMENT 'Is user active?',
  `created` datetime NOT NULL COMMENT 'Creation date for',
  `updated` datetime NOT NULL COMMENT 'Last update date',
  `levelId` int(11) default NULL COMMENT 'User Level',
  `lastLogin` datetime default NULL COMMENT 'Fecha del ultimo login del usuario',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `affiliates_user_U_1` (`username`),
  KEY `affiliates_user_FI_2` (`levelId`),
  KEY `affiliates_user_FI_3` (`affiliateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Usuarios de afiliado' AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `affiliates_user`
-- 

INSERT INTO `affiliates_user` (`id`, `affiliateId`, `username`, `password`, `active`, `created`, `updated`, `levelId`, `lastLogin`) VALUES 
(1, 2, 'Epa', 'f156508e425e0d8bad9f5e830e442a87', 1, '2007-09-06 12:57:29', '2007-11-30 15:15:28', 0, '2007-12-27 13:54:36'),
(2, 1, 'Makro', 'b0672b93fc29da67213f703dec462a5c', 1, '2007-09-06 12:57:29', '2007-11-30 15:15:50', 0, '2007-12-13 19:59:28');

-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_userGroup`
-- 

DROP TABLE IF EXISTS `affiliates_userGroup`;
CREATE TABLE IF NOT EXISTS `affiliates_userGroup` (
  `userId` int(11) NOT NULL COMMENT 'Group ID',
  `groupId` int(11) NOT NULL COMMENT 'Group ID',
  PRIMARY KEY  (`userId`,`groupId`),
  KEY `affiliates_userGroup_FI_2` (`groupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Users / Groups';

-- 
-- Dumping data for table `affiliates_userGroup`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `affiliates_userInfo`
-- 

DROP TABLE IF EXISTS `affiliates_userInfo`;
CREATE TABLE IF NOT EXISTS `affiliates_userInfo` (
  `userId` int(11) NOT NULL COMMENT 'User Id',
  `name` varchar(255) default NULL COMMENT 'name',
  `surname` varchar(255) default NULL COMMENT 'surname',
  `mailAddress` varchar(255) default NULL COMMENT 'Email',
  PRIMARY KEY  (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Information about users by affiliates';

-- 
-- Dumping data for table `affiliates_userInfo`
-- 

INSERT INTO `affiliates_userInfo` (`userId`, `name`, `surname`, `mailAddress`) VALUES 
(1, 'Epa1', 'Epa1', 'Epa1'),
(2, 'Makro1', 'Makro1', 'Makro1');

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'Category name',
  `active` int(11) NOT NULL COMMENT 'Is category active?',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Categorias' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `category`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `comment`
-- 

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ProductRequestConfirmation Id',
  `productRequestId` int(11) NOT NULL COMMENT 'Product Request',
  `createdAt` datetime NOT NULL COMMENT 'Creation date for',
  `userId` int(11) NOT NULL COMMENT 'User',
  `text` text COMMENT 'Texto del comentario',
  `type` tinyint(4) NOT NULL COMMENT 'Client|Supplier',
  PRIMARY KEY  (`id`),
  KEY `comment_FI_1` (`productRequestId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Comentarios' AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `comment`
-- 

INSERT INTO `comment` (`id`, `productRequestId`, `createdAt`, `userId`, `text`, `type`) VALUES 
(1, 19, '2007-12-26 14:26:34', 1, 'mensaje de admin a afiliado', 3),
(2, 19, '2007-12-26 14:34:30', 1, 'mensaje de admin a supplier', 0),
(3, 19, '2007-12-26 14:50:12', 1, 'mensaje de admin a supplier prueba 2', 0),
(4, 19, '2007-12-26 14:55:16', 1, 'mensaje a afiliado prueba 2', 3),
(5, 19, '2007-12-26 15:35:15', 2, 'mensaje de usuario a admin', 2),
(6, 19, '2007-12-26 15:45:03', 2, 'mensaje respuesta de admin a usuario', 3),
(7, 19, '2007-12-26 15:46:27', 2, 'mensaje de usuario a admin 2', 2),
(8, 19, '2007-12-26 15:50:06', 2, 'mensaje de usuario a admin 3', 2),
(9, 19, '2007-12-26 15:53:03', 2, 'mensaje de usuario a admin 4', 2),
(10, 19, '2007-12-26 15:54:35', 2, 'mensaje de usuario a admin 5', 2),
(11, 19, '2007-12-26 15:55:03', 2, 'mensaje de usuario a admin 6', 2),
(12, 19, '2007-12-26 15:55:21', 2, 'mensaje de usuario a admin 7', 2),
(13, 19, '2007-12-26 15:55:39', 2, 'mensaje de usuario a admin 8', 2),
(14, 19, '2007-12-26 15:56:46', 2, 'mensaje de admin a afiliado', 3),
(15, 19, '2007-12-26 15:56:53', 2, 'mensaje de admin a afiliado 2', 3),
(16, 19, '2007-12-26 15:57:05', 2, 'mensaje de admin a afiliado 3\n', 3),
(17, 19, '2007-12-26 16:00:09', 7, 'mensaje de supplier a admin', 1),
(18, 19, '2007-12-26 16:00:17', 7, 'mensaje de supplier a admin 2', 1),
(19, 19, '2007-12-26 16:01:16', 2, 'mensaje de admin a supplier 3', 0),
(20, 26, '2007-12-27 13:11:26', 2, 'pregunta 1 a admin', 2),
(21, 27, '2007-12-27 13:11:45', 2, 'pregunta 2 a admin', 2),
(22, 28, '2007-12-27 13:12:09', 2, 'pregunta 3 a admin', 2),
(23, 26, '2007-12-27 13:14:11', 2, 'respuesta a pregunta 1 de afiliado', 3),
(24, 27, '2007-12-27 13:14:42', 2, 'respuesta a pregunta 2 de afiliado', 3),
(25, 28, '2007-12-27 13:15:10', 2, 'respuesta pregunta 3 de afiliado', 3),
(26, 27, '2007-12-27 13:25:51', 6, 'comentario supplier 1 a admin', 1),
(27, 27, '2007-12-27 13:28:20', 2, 'respuesta comentario supplier 1 a admin', 0),
(28, 27, '2007-12-27 13:28:50', 2, 'comentario a afiliado', 3),
(29, 27, '2007-12-27 13:38:33', 2, 'respuesta a comentario de admin', 2),
(30, 26, '2007-12-27 13:41:03', 2, 'pregunta 2 a admin', 2),
(31, 26, '2007-12-27 13:41:28', 2, 'pregunta 3 a admin', 2),
(32, 26, '2007-12-27 13:42:07', 2, 'pregunta 4 a admin', 2),
(33, 26, '2007-12-27 13:43:00', 2, 'respuestas a preguntas 2,3,4 de afiliados', 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `incoterm`
-- 

DROP TABLE IF EXISTS `incoterm`;
CREATE TABLE IF NOT EXISTS `incoterm` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Tcoterm Id',
  `name` varchar(255) default NULL COMMENT 'Nombre del Tcoterm',
  `description` varchar(255) default NULL COMMENT 'Descripcion del Tcoterm',
  `active` int(11) NOT NULL COMMENT 'Is icoterm active?',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Incoterm' AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `incoterm`
-- 

INSERT INTO `incoterm` (`id`, `name`, `description`, `active`) VALUES 
(1, 'incoterm1', 'incoterm 1 description', 1),
(2, 'incoterm2', 'incoterm2 description', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `modules_dependency`
-- 

DROP TABLE IF EXISTS `modules_dependency`;
CREATE TABLE IF NOT EXISTS `modules_dependency` (
  `moduleName` varchar(255) NOT NULL COMMENT 'Modulo',
  `dependence` varchar(255) NOT NULL COMMENT 'Modulos de los cuales depende',
  PRIMARY KEY  (`moduleName`,`dependence`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Dependencia de modulos ';

-- 
-- Dumping data for table `modules_dependency`
-- 

INSERT INTO `modules_dependency` (`moduleName`, `dependence`) VALUES 
('logs', 'Modules'),
('logs', 'Users'),
('security', 'Modules'),
('security', 'Users');

-- --------------------------------------------------------

-- 
-- Table structure for table `modules_label`
-- 

DROP TABLE IF EXISTS `modules_label`;
CREATE TABLE IF NOT EXISTS `modules_label` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Id module label',
  `name` varchar(255) NOT NULL COMMENT 'nombre del modulo',
  `label` varchar(255) default NULL COMMENT 'Etiqueta',
  `description` varchar(255) default NULL COMMENT 'Descripcion del modulo',
  `language` varchar(100) default NULL COMMENT 'idioma de la etiqueta',
  PRIMARY KEY  (`id`,`name`),
  KEY `modules_label_FI_1` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Etiquetas de modulos ' AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `modules_label`
-- 

INSERT INTO `modules_label` (`id`, `name`, `label`, `description`, `language`) VALUES 
(1, 'modules', 'MÃ³dulos', 'Administrador de MÃ³dulos del Sistema', 'esp'),
(2, 'modules', 'Modules', 'Modules manager', 'eng');

-- --------------------------------------------------------

-- 
-- Table structure for table `modules_module`
-- 

DROP TABLE IF EXISTS `modules_module`;
CREATE TABLE IF NOT EXISTS `modules_module` (
  `name` varchar(255) NOT NULL COMMENT 'nombre del modulo',
  `active` int(11) NOT NULL default '0' COMMENT 'Estado del modulo',
  `alwaysActive` int(11) NOT NULL default '0' COMMENT 'Modulo siempre activo',
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT=' Registro de modulos';

-- 
-- Dumping data for table `modules_module`
-- 

INSERT INTO `modules_module` (`name`, `active`, `alwaysActive`) VALUES 
('modules', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `port`
-- 

DROP TABLE IF EXISTS `port`;
CREATE TABLE IF NOT EXISTS `port` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Port Id',
  `code` varchar(255) default NULL COMMENT 'Codigo del puerto',
  `name` varchar(255) default NULL COMMENT 'Nombre del puerto',
  `active` int(11) NOT NULL COMMENT 'Is port active?',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Puerto' AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `port`
-- 

INSERT INTO `port` (`id`, `code`, `name`, `active`) VALUES 
(1, '1', 'Puerto de Buenos Aires', 0),
(2, '2', 'Puerto de Mar del Plata', 1),
(3, '3', 'Puerto de Buenos Aires', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `product`
-- 

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Product Id',
  `code` varchar(255) default NULL COMMENT 'Codigo del producto',
  `name` varchar(255) default NULL COMMENT 'Nombre del producto',
  `description` text COMMENT 'Descripcion del producto',
  `supplierId` int(11) default NULL COMMENT 'Supplier',
  `active` int(11) NOT NULL COMMENT 'Is product active?',
  PRIMARY KEY  (`id`),
  KEY `product_FI_1` (`supplierId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Productos' AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `product`
-- 

INSERT INTO `product` (`id`, `code`, `name`, `description`, `supplierId`, `active`) VALUES 
(1, '1', 'product1', 'product 1 description', 3, 1),
(2, '2', 'product2', 'product 2 description', 1, 1),
(3, '3', 'product3', 'product 3 description', 3, 1),
(4, '4', 'product 4', 'product4 description', 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `productRequest`
-- 

DROP TABLE IF EXISTS `productRequest`;
CREATE TABLE IF NOT EXISTS `productRequest` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ProductRequest Id',
  `requestId` int(11) NOT NULL COMMENT 'Request',
  `productId` int(11) NOT NULL COMMENT 'Product',
  `supplierId` int(11) default NULL COMMENT 'Supplier',
  `quantity` int(11) default NULL COMMENT 'Cantidad del producto en el pedido',
  `priceSupplier` float default NULL COMMENT 'Precio del proveedor',
  `timestampPriceSupplier` datetime default NULL COMMENT 'Fecha de la ultima modificacion del priceSupplier',
  `priceClient` float default NULL COMMENT 'Precio para el cliente',
  `timestampPriceClient` datetime default NULL COMMENT 'Fecha de la ultima modificacion del priceClient',
  `incotermId` int(11) default NULL COMMENT 'Icoterm',
  `portId` int(11) default NULL COMMENT 'Port',
  `status` int(11) NOT NULL COMMENT 'Request Status',
  `timestampStatus` datetime default NULL COMMENT 'Fecha del ultimo cambio de status',
  PRIMARY KEY  (`id`),
  KEY `productRequest_FI_1` (`requestId`),
  KEY `productRequest_FI_2` (`productId`),
  KEY `productRequest_FI_3` (`supplierId`),
  KEY `productRequest_FI_4` (`incotermId`),
  KEY `productRequest_FI_5` (`portId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Products of each request' AUTO_INCREMENT=32 ;

-- 
-- Dumping data for table `productRequest`
-- 

INSERT INTO `productRequest` (`id`, `requestId`, `productId`, `supplierId`, `quantity`, `priceSupplier`, `timestampPriceSupplier`, `priceClient`, `timestampPriceClient`, `incotermId`, `portId`, `status`, `timestampStatus`) VALUES 
(18, 8, 2, 1, 2, 11, NULL, NULL, NULL, 2, 2, 2, NULL),
(17, 8, 2, 1, 10, 25, NULL, NULL, NULL, 1, 2, 2, NULL),
(9, 7, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 7, 2, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(19, 9, 1, 3, 12, NULL, NULL, 14, NULL, NULL, NULL, 3, NULL),
(20, 9, 3, 3, 24, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(21, 9, 2, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(22, 10, 1, 3, 12, 11, NULL, 24, NULL, 1, 2, 4, NULL),
(23, 10, 2, 1, 8, 12, NULL, 16, NULL, 2, 2, 5, NULL),
(24, 10, 3, 3, 24, 23, NULL, 46, NULL, 2, 2, 4, NULL),
(26, 11, 1, 3, 12, 15, '2007-12-27 13:36:13', 20, '2007-12-27 13:37:13', 1, 2, 3, '2007-12-27 13:37:13'),
(27, 11, 2, 1, 24, 12, '2007-12-27 13:24:34', 18, '2007-12-27 13:29:10', 2, 2, 4, '2007-12-27 13:38:20'),
(28, 11, 3, 3, 25, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2007-12-27 13:06:11'),
(29, 11, 4, 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2007-12-27 13:13:39'),
(30, 12, 1, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2007-12-27 13:54:57'),
(31, 13, 2, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2007-12-27 14:00:04');

-- --------------------------------------------------------

-- 
-- Table structure for table `productRequestConfirmation`
-- 

DROP TABLE IF EXISTS `productRequestConfirmation`;
CREATE TABLE IF NOT EXISTS `productRequestConfirmation` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ProductRequestConfirmation Id',
  `productRequestId` int(11) NOT NULL COMMENT 'Product Request',
  `createdAt` datetime NOT NULL COMMENT 'Creation date for',
  `userId` int(11) NOT NULL COMMENT 'User',
  `attach` varchar(255) default NULL COMMENT 'Nombre del archivo adjunto',
  PRIMARY KEY  (`id`),
  KEY `productRequestConfirmation_FI_1` (`productRequestId`),
  KEY `productRequestConfirmation_FI_2` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Confirmacion por parte del cliente a cada pedido de producto' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `productRequestConfirmation`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `request`
-- 

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Request Id',
  `createdAt` datetime NOT NULL COMMENT 'Creation date for',
  `userId` int(11) NOT NULL COMMENT 'User',
  `status` int(11) NOT NULL COMMENT 'Request Status',
  `timestampStatus` datetime default NULL COMMENT 'Fecha del ultimo cambio de status',
  PRIMARY KEY  (`id`),
  KEY `request_FI_1` (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Requests' AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `request`
-- 

INSERT INTO `request` (`id`, `createdAt`, `userId`, `status`, `timestampStatus`) VALUES 
(9, '2007-09-06 12:36:26', 2, 0, NULL),
(8, '2007-09-06 12:36:26', 1, 0, NULL),
(7, '2007-09-06 12:36:26', 1, 0, NULL),
(10, '2007-09-06 12:36:26', 2, 0, NULL),
(11, '2007-09-06 12:36:26', 2, 0, NULL),
(12, '2007-09-06 12:36:26', 2, 0, '2007-12-27 13:54:57'),
(13, '2007-12-27 14:00:04', 2, 0, '2007-12-27 14:00:04');

-- --------------------------------------------------------

-- 
-- Table structure for table `security_action`
-- 

DROP TABLE IF EXISTS `security_action`;
CREATE TABLE IF NOT EXISTS `security_action` (
  `action` varchar(100) NOT NULL COMMENT 'Action pagina',
  `module` varchar(100) default NULL COMMENT 'Modulo',
  `section` varchar(100) default NULL COMMENT 'Seccion',
  `access` int(11) default NULL COMMENT 'El acceso a ese action',
  `accessAffiliateUser` int(11) default NULL COMMENT 'El acceso a ese action para los usuarios por afiliados',
  `active` int(11) default NULL COMMENT 'Si el action esta activo o no',
  `pair` varchar(100) default NULL COMMENT 'Par del Action',
  PRIMARY KEY  (`action`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Actions del sistema';

-- 
-- Dumping data for table `security_action`
-- 

INSERT INTO `security_action` (`action`, `module`, `section`, `access`, `accessAffiliateUser`, `active`, `pair`) VALUES 
('usersList', 'users', '1', 1, 1, NULL, NULL),
('modulesList', 'modules', '1', 3, 3, NULL, 'ModulesDoList'),
('modulesEdit', 'modules', '1', 3, 3, NULL, 'ModulesDoEdit'),
('modulesDoActivateX', 'modules', '1', 1, 1, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `security_actionLabel`
-- 

DROP TABLE IF EXISTS `security_actionLabel`;
CREATE TABLE IF NOT EXISTS `security_actionLabel` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Id label security',
  `action` varchar(100) NOT NULL COMMENT 'Action pagina',
  `language` varchar(100) default NULL COMMENT 'Idioma de la etiqueta',
  `label` varchar(100) default NULL COMMENT 'Etiqueta',
  PRIMARY KEY  (`id`,`action`),
  KEY `I_referenced_security_action_FK_1_1` (`action`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='etiquetas de actions de seguridad' AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `security_actionLabel`
-- 

INSERT INTO `security_actionLabel` (`id`, `action`, `language`, `label`) VALUES 
(1, 'modulesList', 'esp', 'Listado de mÃ³dulos'),
(2, 'modulesList', 'eng', 'Modules list'),
(3, 'modulesEdit', 'esp', 'EdiciÃ³n de mÃ³dulos'),
(4, 'modulesEdit', 'eng', 'Modules edit'),
(5, 'modulesDoActivateX', 'esp', 'ActivaciÃ³n de mÃ³dulos'),
(6, 'modulesDoActivateX', 'eng', 'Modules activation');

-- --------------------------------------------------------

-- 
-- Table structure for table `security_module`
-- 

DROP TABLE IF EXISTS `security_module`;
CREATE TABLE IF NOT EXISTS `security_module` (
  `module` varchar(100) NOT NULL COMMENT 'Modulo',
  `access` int(11) default NULL COMMENT 'El acceso a ese action',
  `accessAffiliateUser` int(11) default NULL COMMENT 'El acceso a ese action para los usuarios por afiliados',
  PRIMARY KEY  (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Modulos del sistema';

-- 
-- Dumping data for table `security_module`
-- 

INSERT INTO `security_module` (`module`, `access`, `accessAffiliateUser`) VALUES 
('security', 3, NULL),
('logs', 3, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `supplier`
-- 

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'Nombre',
  `active` int(11) NOT NULL COMMENT 'Is supplier active?',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Proveedores' AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `supplier`
-- 

INSERT INTO `supplier` (`id`, `name`, `active`) VALUES 
(1, 'Supplier1', 1),
(2, 'Supplier2', 0),
(3, 'Supplier3', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `usersByAffiliate_group`
-- 

DROP TABLE IF EXISTS `usersByAffiliate_group`;
CREATE TABLE IF NOT EXISTS `usersByAffiliate_group` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Group ID',
  `name` varchar(255) collate latin1_general_cs NOT NULL COMMENT 'Group Name',
  `created` datetime NOT NULL COMMENT 'Creation date for',
  `updated` datetime NOT NULL COMMENT 'Last update date',
  `bitLevel` int(11) default NULL COMMENT 'Nivel',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `usersByAffiliate_group_U_1` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Groups' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `usersByAffiliate_group`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `usersByAffiliate_groupCategory`
-- 

DROP TABLE IF EXISTS `usersByAffiliate_groupCategory`;
CREATE TABLE IF NOT EXISTS `usersByAffiliate_groupCategory` (
  `groupId` int(11) NOT NULL COMMENT 'Group ID',
  `categoryId` int(11) NOT NULL COMMENT 'Category ID',
  PRIMARY KEY  (`groupId`,`categoryId`),
  KEY `usersByAffiliate_groupCategory_ibfk_2` (`categoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Groups / Categories';

-- 
-- Dumping data for table `usersByAffiliate_groupCategory`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `usersByAffiliate_level`
-- 

DROP TABLE IF EXISTS `usersByAffiliate_level`;
CREATE TABLE IF NOT EXISTS `usersByAffiliate_level` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Level ID',
  `name` varchar(255) collate latin1_general_cs NOT NULL COMMENT 'Level Name',
  `bitLevel` int(11) default NULL COMMENT 'Bit del nivel',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `usersByAffiliate_level_U_1` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Levels' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `usersByAffiliate_level`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `usersByAffiliate_user`
-- 

DROP TABLE IF EXISTS `usersByAffiliate_user`;
CREATE TABLE IF NOT EXISTS `usersByAffiliate_user` (
  `id` int(11) NOT NULL auto_increment COMMENT 'User Id',
  `affiliateId` int(11) NOT NULL COMMENT 'Id afiliado',
  `username` varchar(255) collate latin1_general_cs NOT NULL COMMENT 'username',
  `password` varchar(255) collate latin1_general_cs NOT NULL COMMENT 'password',
  `active` int(11) NOT NULL COMMENT 'Is user active?',
  `created` datetime NOT NULL COMMENT 'Creation date for',
  `updated` datetime NOT NULL COMMENT 'Last update date',
  `levelId` int(11) default NULL COMMENT 'User Level',
  `lastLogin` datetime default NULL COMMENT 'Fecha del ultimo login del usuario',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `usersByAffiliate_user_U_1` (`username`),
  KEY `usersByAffiliate_user_ibfk_2` (`levelId`),
  KEY `usersByAffiliate_user_ibfk_3` (`affiliateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Usuarios de afiliado' AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `usersByAffiliate_user`
-- 

INSERT INTO `usersByAffiliate_user` (`id`, `affiliateId`, `username`, `password`, `active`, `created`, `updated`, `levelId`, `lastLogin`) VALUES 
(1, 2, 'juan', '9779c1d0c2d241a3e3a709f44af98ef1', 1, '2007-04-24 15:06:03', '2007-04-24 15:06:03', 0, '2007-05-30 14:33:44'),
(2, 1, 'makro', 'b0672b93fc29da67213f703dec462a5c', 1, '2007-06-08 10:48:10', '2007-06-08 10:48:10', 1, '2007-06-13 12:42:06');

-- --------------------------------------------------------

-- 
-- Table structure for table `usersByAffiliate_userGroup`
-- 

DROP TABLE IF EXISTS `usersByAffiliate_userGroup`;
CREATE TABLE IF NOT EXISTS `usersByAffiliate_userGroup` (
  `userId` int(11) NOT NULL COMMENT 'Group ID',
  `groupId` int(11) NOT NULL COMMENT 'Group ID',
  PRIMARY KEY  (`userId`,`groupId`),
  KEY `usersByAffiliate_userGroup_ibfk_2` (`groupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Users / Groups';

-- 
-- Dumping data for table `usersByAffiliate_userGroup`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `usersByAffiliate_userInfo`
-- 

DROP TABLE IF EXISTS `usersByAffiliate_userInfo`;
CREATE TABLE IF NOT EXISTS `usersByAffiliate_userInfo` (
  `userId` int(11) NOT NULL COMMENT 'User Id',
  `name` varchar(255) collate latin1_general_cs default NULL COMMENT 'name',
  `surname` varchar(255) collate latin1_general_cs default NULL COMMENT 'surname',
  `mailAddress` varchar(255) collate latin1_general_cs NOT NULL COMMENT 'Email',
  PRIMARY KEY  (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Information about users by affiliates';

-- 
-- Dumping data for table `usersByAffiliate_userInfo`
-- 

INSERT INTO `usersByAffiliate_userInfo` (`userId`, `name`, `surname`, `mailAddress`) VALUES 
(1, 'Juan', 'Perez', 'jp@gmail.com'),
(2, 'Luis', 'Makro', 'lmakro@yahoo.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `users_group`
-- 

DROP TABLE IF EXISTS `users_group`;
CREATE TABLE IF NOT EXISTS `users_group` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Group ID',
  `name` varchar(255) NOT NULL COMMENT 'Group Name',
  `created` datetime NOT NULL COMMENT 'Creation date for',
  `updated` datetime NOT NULL COMMENT 'Last update date',
  `bitLevel` int(11) default NULL COMMENT 'Nivel',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_group_U_1` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Groups' AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `users_group`
-- 

INSERT INTO `users_group` (`id`, `name`, `created`, `updated`, `bitLevel`) VALUES 
(1, 'supervisor', '2007-09-06 12:36:26', '2007-09-06 12:36:26', NULL),
(2, 'admin', '2007-09-06 12:36:26', '2007-09-06 12:36:26', NULL),
(3, 'suppliers', '2007-12-11 08:09:56', '2007-12-11 08:09:56', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `users_groupCategory`
-- 

DROP TABLE IF EXISTS `users_groupCategory`;
CREATE TABLE IF NOT EXISTS `users_groupCategory` (
  `groupId` int(11) NOT NULL COMMENT 'Group ID',
  `categoryId` int(11) NOT NULL COMMENT 'Category ID',
  PRIMARY KEY  (`groupId`,`categoryId`),
  KEY `users_groupCategory_FI_2` (`categoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Groups / Categories';

-- 
-- Dumping data for table `users_groupCategory`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users_level`
-- 

DROP TABLE IF EXISTS `users_level`;
CREATE TABLE IF NOT EXISTS `users_level` (
  `id` int(11) NOT NULL auto_increment COMMENT 'Level ID',
  `name` varchar(255) NOT NULL COMMENT 'Level Name',
  `bitLevel` int(11) default NULL COMMENT 'Bit del nivel',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_level_U_1` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Levels' AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `users_level`
-- 

INSERT INTO `users_level` (`id`, `name`, `bitLevel`) VALUES 
(1, 'Supervisor', 1),
(2, 'Administrador', 2),
(3, 'Usuario', 4),
(4, 'Supplier', 8);

-- --------------------------------------------------------

-- 
-- Table structure for table `users_user`
-- 

DROP TABLE IF EXISTS `users_user`;
CREATE TABLE IF NOT EXISTS `users_user` (
  `id` int(11) NOT NULL auto_increment COMMENT 'User Id',
  `username` varchar(255) NOT NULL COMMENT 'username',
  `password` varchar(255) NOT NULL COMMENT 'password',
  `active` int(11) NOT NULL COMMENT 'Is user active?',
  `created` datetime NOT NULL COMMENT 'Creation date for',
  `updated` datetime NOT NULL COMMENT 'Last update date',
  `levelId` int(11) default NULL COMMENT 'User Level',
  `lastLogin` datetime default NULL COMMENT 'Fecha del ultimo login del usuario',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_user_U_1` (`username`),
  KEY `users_user_FI_2` (`levelId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Users' AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `users_user`
-- 

INSERT INTO `users_user` (`id`, `username`, `password`, `active`, `created`, `updated`, `levelId`, `lastLogin`) VALUES 
(1, 'supervisor', 'dcfa2235bcfefeaabb3d030733caefc8', 1, '2007-09-06 12:36:26', '2007-09-06 12:36:26', 1, '2007-12-05 13:06:48'),
(2, 'admin', '45c48d97153f26e17d101be744368331', 1, '2007-09-06 12:36:26', '2007-05-28 13:57:28', 2, '2007-12-28 12:27:50'),
(3, 'luisperez', '115cf60d97f8af2be39246b3f4f6c734', 1, '2007-09-06 09:41:29', '2007-12-02 14:57:47', 3, '2007-12-02 16:37:09'),
(4, 'lala', '1c10da2d46480d0db11c66b61ab5a984', 0, '2007-12-11 08:44:25', '2007-12-11 08:44:25', 3, NULL),
(5, 'martin', '1c10da2d46480d0db11c66b61ab5a984', 0, '2007-12-11 09:26:50', '2007-12-11 09:26:50', 4, NULL),
(6, 'supplier1', '758cc169db57c1be741255ba4ebdfe98', 1, '2007-12-11 09:48:46', '2007-12-23 13:27:42', 4, '2007-12-27 13:19:00'),
(7, 'supplier3', 'c9741893456bf27f816f34cdfc541db0', 1, '2007-12-23 13:26:19', '2007-12-23 13:27:09', 4, '2007-12-27 13:35:47');

-- --------------------------------------------------------

-- 
-- Table structure for table `users_userGroup`
-- 

DROP TABLE IF EXISTS `users_userGroup`;
CREATE TABLE IF NOT EXISTS `users_userGroup` (
  `userId` int(11) NOT NULL COMMENT 'Group ID',
  `groupId` int(11) NOT NULL COMMENT 'Group ID',
  PRIMARY KEY  (`userId`,`groupId`),
  KEY `users_userGroup_FI_2` (`groupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Users / Groups';

-- 
-- Dumping data for table `users_userGroup`
-- 

INSERT INTO `users_userGroup` (`userId`, `groupId`) VALUES 
(1, 1),
(1, 2),
(2, 2),
(4, 3),
(6, 3),
(7, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `users_userInfo`
-- 

DROP TABLE IF EXISTS `users_userInfo`;
CREATE TABLE IF NOT EXISTS `users_userInfo` (
  `userId` int(11) NOT NULL COMMENT 'User Id',
  `name` varchar(255) default NULL COMMENT 'name',
  `surname` varchar(255) default NULL COMMENT 'surname',
  `mailAddress` varchar(255) default NULL COMMENT 'Email',
  PRIMARY KEY  (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Information about users';

-- 
-- Dumping data for table `users_userInfo`
-- 

INSERT INTO `users_userInfo` (`userId`, `name`, `surname`, `mailAddress`) VALUES 
(1, 'Supervisor', 'Supervisor', ''),
(2, 'Admin', 'Admin', ''),
(3, 'Luis', 'PÃ©rez', 'ljperezve@yahoo.com'),
(4, 'lala', 'lala', 'ak@fibertel.com.ar'),
(5, 'martin', 'martin', 'ak@fibertel.com.ar'),
(6, 'supplier1', 'supplier1', 'ak@fibertel.com.ar'),
(7, 'supplier3', 'supplier3', 'ak@fibertel.com.ar');
