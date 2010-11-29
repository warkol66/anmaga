DELETE FROM `security_module` WHERE `module` = 'install';
INSERT INTO `security_module` ( `module` , `noCheckLogin` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('install', '1', '0', '0','0');
DELETE FROM `security_action` WHERE `module` = 'install';
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('installModuleInformationSetup','install','','9','0','1','','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('installFileCheck','install','','0','0','1','installDoFileCheck','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('installSetupActionsLabel','install','','0','0','1','installDoSetupActionsLabel','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('installSetupMessages','install','','0','0','1','installDoSetupMessages','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('installSetupModuleInformation','install','','0','0','1','installDoSetupModuleInformation','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('installSetupPermissions','install','','0','0','1','installDoSetupPermissions','','0' );
