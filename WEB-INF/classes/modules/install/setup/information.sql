DELETE FROM `modules_dependency` WHERE `moduleName` = 'install';
DELETE FROM `modules_module` WHERE `name` = 'install';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('install', '1', '','');
