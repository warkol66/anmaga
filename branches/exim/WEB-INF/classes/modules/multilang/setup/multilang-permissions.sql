DELETE FROM `security_module` WHERE `module` = 'multilang';
INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('multilang', '0', '0','0');
DELETE FROM `security_action` WHERE `module` = 'multilang';
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangTextsDoDelete','multilang','','3','0','1','Array','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangLanguagesDoDelete','multilang','','3','0','1','Array','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangTextsDump','multilang','','3','0','1','Array','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangTextsList','multilang','','3','0','1','Array','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangLanguagesList','multilang','','3','0','1','Array','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangTextsEditBulk','multilang','','3','0','1','multilangTextsDoEditBulk','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangLanguagesEdit','multilang','','3','0','1','multilangLanguagesDoEdit','','0' );
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` , `noCheckLogin`, `accessRegistrationUser` ) VALUES ('multilangTextsEdit','multilang','','3','0','1','multilangTextsDoEdit','','0' );
