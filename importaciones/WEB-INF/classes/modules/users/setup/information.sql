DELETE FROM `modules_label` WHERE `name` = 'users';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('users', 'Users', 'M�dulo de UsuariosUsers Management', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('users', '', '', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'users';
DELETE FROM `modules_module` WHERE `name` = 'users';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('users', '1', '1','');
