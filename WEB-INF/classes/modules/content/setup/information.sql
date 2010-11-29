DELETE FROM `modules_label` WHERE `name` = 'content';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('content', 'Contenido', 'Manejo de informaciÃ³n', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('content', 'Content', 'Information Management', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'content';
DELETE FROM `modules_module` WHERE `name` = 'content';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('content', '1', '','');
