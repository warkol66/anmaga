DROP TABLE IF EXISTS `content_content`;
CREATE TABLE `content_content` (
  `id` int(10) NOT NULL auto_increment,
  `type` int(11) NOT NULL default '0',
  `parent` int(10) default NULL,
  `title` varchar(255) collate utf8_general_ci NOT NULL default '',
  `titleInMenu` varchar(120) collate utf8_general_ci default NULL,
  `image` varchar(255) collate utf8_general_ci default NULL,
  `imageOnOver` varchar(255) collate utf8_general_ci default NULL,
  `alt` varchar(255) collate utf8_general_ci default NULL,
  `content` mediumtext collate utf8_general_ci,
  `link` varchar(255) collate utf8_general_ci default NULL,
  `order` smallint(6) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
