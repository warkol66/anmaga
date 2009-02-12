DELETE FROM `modules_label` WHERE `name` = 'config';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('config', 'Configuración', 'Módulo para manejo de la configuración del sistema', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('config', 'Config', 'Config management', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'config';
DELETE FROM `modules_module` WHERE `name` = 'config';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive` ) VALUES ('config', '1', '1');
