DELETE FROM `modules_label` WHERE `name` = 'security';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('security', 'Seguridad', 'Administración de permisos', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('security', 'Security', 'Permissions manager', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'security';
DELETE FROM `modules_module` WHERE `name` = 'security';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('security', '1', '1','');
