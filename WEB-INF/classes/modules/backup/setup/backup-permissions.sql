DELETE FROM `security_module` WHERE `module` = 'backup';
INSERT INTO `security_module` ( `module` , `noCheckLogin` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('backup', '', '2', '0','0');
DELETE FROM `security_action` WHERE `module` = 'backup';
