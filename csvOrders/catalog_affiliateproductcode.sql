-- phpMyAdmin SQL Dump
-- version 2.9.0
-- http://www.phpmyadmin.net
-- 
-- Host: localhost:3316
-- Generation Time: Nov 30, 2007 at 01:58 PM
-- Server version: 4.1.21
-- PHP Version: 5.1.5
-- 
-- Database: `anmaga3`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `catalog_affiliateproductcode`
-- 

CREATE TABLE `catalog_affiliateproductcode` (
  `id` int(11) NOT NULL auto_increment,
  `affiliateId` int(11) NOT NULL default '0' COMMENT 'Afiliado',
  `productCode` varchar(255) default NULL COMMENT 'Codigo del Producto',
  `productCodeAffiliate` varchar(255) default NULL COMMENT 'Codigo del Producto para el afiliado',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `catalog_affiliateProductCode_U_1` (`affiliateId`,`productCodeAffiliate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Codigos de Productos por Afiliado' AUTO_INCREMENT=145 ;

-- 
-- Dumping data for table `catalog_affiliateproductcode`
-- 

INSERT INTO `catalog_affiliateproductcode` (`id`, `affiliateId`, `productCode`, `productCodeAffiliate`) VALUES 
(1, 1, '02-040-030', '112008'),
(2, 1, '03-010-010', '27859'),
(3, 1, '03-240-001', '110591'),
(4, 1, '0', '112164'),
(5, 1, '0', '112242'),
(6, 1, '0', '112450'),
(7, 1, '0', '113204'),
(8, 1, '0', '114244'),
(9, 1, '02-001-010', '149331'),
(10, 1, '0', '342056'),
(11, 1, '0', '342771'),
(12, 1, '03-130-001', '394745'),
(13, 1, '03-130-010', '394758'),
(14, 1, '03-020-010', '394953'),
(15, 1, '01-100-001', '126633'),
(16, 1, '0', '143624'),
(17, 1, '0', '67327'),
(18, 1, '0', '67340'),
(19, 1, '0', '112190'),
(20, 1, '01-110-001', '126373'),
(21, 1, '02-001-001', '148902'),
(22, 1, '03-340-001', '289523'),
(23, 1, '03-340-020', '305682'),
(24, 1, '03-340-010', '305721'),
(25, 1, '03-250-001', '334867'),
(26, 1, '0', '342082'),
(27, 1, '0', '342199'),
(28, 1, '0', '342316'),
(29, 1, '0', '342433'),
(30, 1, '02-310-001', '426036'),
(31, 1, '02-310-010', '426140'),
(32, 1, '03-110-001', '501241'),
(33, 1, '0', '113334'),
(34, 1, '03-250-010', '334698'),
(35, 1, '0', '110838'),
(36, 1, '01-010-001', '128037'),
(37, 1, '02-040-020', '293436'),
(38, 1, '03-310-001', '201825'),
(39, 1, '02-300-010', '143572'),
(40, 1, '0', '30524'),
(41, 1, '0', '34515'),
(42, 1, '0', '112255'),
(43, 1, '0', '113074'),
(44, 1, '0', '177424'),
(45, 1, '03-320-001', '200928'),
(46, 1, '02-020-001', '201955'),
(47, 1, '03-010-001', '212446'),
(48, 1, '04-140-001', '394901'),
(49, 1, '0', '176436'),
(50, 1, '0', '34684'),
(51, 1, '0', '36920'),
(52, 1, '0', '28210'),
(53, 1, '04-140-010', '394914'),
(54, 1, '03-300-001', '201461'),
(55, 1, '03-230-001', '18369'),
(56, 1, '0', '342212'),
(57, 1, '04-140-020', '394966'),
(58, 1, '0', '113737'),
(59, 1, '0', '158457'),
(60, 1, '0', '112463'),
(61, 1, '0', '721487'),
(62, 1, '0', '721591'),
(63, 1, '0', '721604'),
(64, 1, '0', '721721'),
(65, 1, '0', '721760'),
(66, 1, '0', '721773'),
(67, 1, '0', '721786'),
(68, 1, '0', '721799'),
(69, 1, '0', '721825'),
(70, 1, '0', '721578'),
(71, 1, '0', '721669'),
(72, 1, '0', '721812'),
(73, 1, '0', '721877'),
(74, 1, '0', '674024'),
(75, 1, '03-130-020', '394771'),
(76, 1, '03-100-001', '51064'),
(77, 2, '0', '1006062'),
(78, 2, '03-020-010', '1006203'),
(79, 2, '01-010-001', '1006475'),
(80, 2, '01-100-001', '1006477'),
(81, 2, '01-110-010', '1006479'),
(82, 2, '0', '1011956'),
(83, 2, '03-340-001', '1021004'),
(84, 2, '03-340-010', '1021005'),
(85, 2, '03-312-030', '1021156'),
(86, 2, '03-140-020', '1024006'),
(87, 2, '03-140-040', '1024012'),
(88, 2, '03-140-050', '1024015'),
(89, 2, '03-140-060', '1024018'),
(90, 2, '03-140-070', '1024021'),
(91, 2, '03-140-080', '1024024'),
(92, 2, '03-143-001', '1024045'),
(93, 2, '03-142-001', '1024048'),
(94, 2, '03-141-010', '1024062'),
(95, 2, '03-141-020', '1024064'),
(96, 2, '03-145-010', '1024074'),
(97, 2, '03-130-001', '1024303'),
(98, 2, '03-130-010', '1024315'),
(99, 2, '03-320-001', '1027452'),
(100, 2, '01-010-010', '1006478'),
(101, 2, '02-040-020', '1011963'),
(102, 2, '03-340-020', '1021006'),
(103, 2, '03-141-001', '1024060'),
(104, 2, '03-300-010', '1027310'),
(105, 2, '03-040-001', '1006217'),
(106, 2, '01-004-030', '1006560'),
(107, 2, '02-040-030', '1011631'),
(108, 2, '03-250-010', '1024333'),
(109, 2, '03-100-010', '1024501'),
(110, 2, '06-041-020', '1009926'),
(111, 2, '03-140-001', '1024001'),
(112, 2, '03-144-010', '1024072'),
(113, 2, '01-110-001', '1006476'),
(114, 2, '03-240-001', '1018500'),
(115, 2, '03-250-001', '1024330'),
(116, 2, '03-110-001', '1024650'),
(117, 2, '02-001-001', '1009052'),
(118, 2, '02-001-005', '1009315'),
(119, 2, '02-020-020', '1011910'),
(120, 2, '03-010-010', '1024651'),
(121, 2, '02-001-010', '1009309'),
(122, 2, '03-310-001', '1021100'),
(123, 2, '03-320-010', '1027445'),
(124, 2, '01-001-100', '1006561'),
(125, 2, '03-300-001', '1027326'),
(126, 2, '04-140-001', '1254011'),
(127, 2, '04-140-020', '1254013'),
(128, 2, '04-140-010', '1254012'),
(129, 2, '0', '1606271'),
(130, 2, '04-710-010', '1642701'),
(131, 2, '0', '2617002'),
(132, 2, '0', '2626004'),
(133, 2, '0', '2617001'),
(134, 2, '0', '1024660'),
(135, 2, '03-030-010', '1006206'),
(136, 2, '03-040-010', '1006219'),
(137, 2, '02-120-010', '1009316'),
(138, 2, '06-041-030', '1009928'),
(139, 2, '03-142-010', '1024070'),
(140, 2, '0', '1009930'),
(141, 2, '03-001-001', '1411004'),
(142, 2, '0', '2626001'),
(143, 2, '0', '2626003'),
(144, 2, '0', '1011914');