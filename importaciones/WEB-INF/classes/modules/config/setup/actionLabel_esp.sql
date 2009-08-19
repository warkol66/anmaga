DELETE FROM `security_actionLabel` WHERE `action` LIKE 'Config%' and `language` = '';
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ConfigSet', 'Cambiar configuración', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ConfigEdit', 'Modificar opciones de configuración', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ConfigView', 'Ver valores de configuración', 'esp');
