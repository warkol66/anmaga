INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` ) VALUES ('config', '3', '0');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigDoSet','config','','1','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigSet','config','','0','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigDoEdit','config','','0','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigDoCreateXmlFor','config','','0','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigCreateXmlFor','config','','0','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigEdit','config','','0','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('ConfigView','config','','1073741823','0','1','');
