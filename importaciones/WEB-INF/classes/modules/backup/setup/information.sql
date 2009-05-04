DELETE FROM `modules_label` WHERE `name` = 'backup';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('backup', 'Respaldo', 'Módulo para creación y administración de copias de seguridad', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('backup', 'Backup', 'Manage system and information backups', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'backup';
DELETE FROM `modules_module` WHERE `name` = 'backup';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('backup', '1', '','');
