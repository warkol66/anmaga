DELETE FROM `modules_label` WHERE `name` = 'modules';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('modules', 'Módulos', 'Administrador de módulos del sistema', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('modules', 'Modules', 'Module management', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'modules';
DELETE FROM `modules_module` WHERE `name` = 'modules';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('modules', '1', '1','');
