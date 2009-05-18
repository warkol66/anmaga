DELETE FROM `modules_label` WHERE `name` = 'security';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('security', 'Securidad', 'Administrar permisos', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('security', 'Security', 'Manage security', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'security';
DELETE FROM `modules_module` WHERE `name` = 'security';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('security', '1', '1','');
