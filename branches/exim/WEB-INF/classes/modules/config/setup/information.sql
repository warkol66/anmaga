DELETE FROM `modules_module` WHERE `name` = 'config';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('config', '1', '1','');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'config';
