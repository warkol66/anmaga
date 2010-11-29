DELETE FROM `security_actionLabel` WHERE `action` LIKE 'Config%' and `language` = '';
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ConfigSet', 'Modify config values', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ConfigEdit', 'Edit config options', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ConfigView', 'View config values', 'eng');
