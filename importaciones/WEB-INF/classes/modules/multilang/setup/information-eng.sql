DELETE FROM `modules_label` WHERE `module` = 'multilang' AND `language` = 'eng';
INSERT INTO `modules_label` ( `module` , `label` , `description` , `language` ) VALUES ('multilang', 'Multilanguage', 'Manages multilanguage messages', 'eng');
