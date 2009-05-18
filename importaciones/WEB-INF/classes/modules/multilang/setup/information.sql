DELETE FROM `modules_label` WHERE `module` = 'multilang';
INSERT INTO `modules_label` ( `module` , `label` , `description` , `language` ) VALUES ('multilang', 'Multi-idioma', 'Administrador de mensajes en distintos idiomas', 'esp');
INSERT INTO `modules_label` ( `module` , `label` , `description` , `language` ) VALUES ('multilang', 'Multilanguage', 'Manages multilanguage messages', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'multilang';
DELETE FROM `modules_module` WHERE `name` = 'multilang';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('multilang', '1', '1','1');
