DELETE FROM `security_module` WHERE `module` = 'common';
INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('common', '1073741823', '1073741823','1');
DELETE FROM `security_action` WHERE `module` = 'install';
