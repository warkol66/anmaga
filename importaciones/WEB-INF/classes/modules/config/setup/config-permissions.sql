DELETE FROM `security_module` WHERE `module` = 'config';
INSERT INTO `security_module` ( `module` , `noCheckLogin` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('config', '', '2', '0','0');
DELETE FROM `security_action` WHERE `module` = 'config';
