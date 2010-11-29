DELETE FROM `security_module` WHERE `module` = 'modules';
INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('modules', '0', '0','0');
DELETE FROM `security_action` WHERE `module` = 'modules';
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('modulesExtra','modules','','1','0','1','','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('modulesDoActivateX','modules','','1','0','1','','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('modulesList','modules','','1','0','1','','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('modulesEdit','modules','','1','0','1','modulesDoEdit','','0' );
