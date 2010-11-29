DELETE FROM `modules_label` WHERE `name` = 'config' and `language` = 'eng';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('config', 'Configuration', 'Manage config options', 'eng');
