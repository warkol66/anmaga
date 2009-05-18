DELETE FROM `modules_label` WHERE `name` = 'install';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('install', 'Instalador', 'Módulo para instalación y generación de información de instalación', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('install', 'Install', 'Installation module and manager for installation information', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'install';
DELETE FROM `modules_module` WHERE `name` = 'install';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('install', '1', '','');
