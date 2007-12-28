-- phpMyAdmin SQL Dump
-- version 2.9.1.1-Debian-2ubuntu1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 12, 2007 at 11:11 AM
-- Server version: 5.0.38
-- PHP Version: 5.2.1
-- 
-- Database: `importaciones`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `users_group`
-- 

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
(1, 'supervisor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'suppliers', '2007-12-11 08:09:56', '2007-12-11 08:09:56', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `users_level`
-- 

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
