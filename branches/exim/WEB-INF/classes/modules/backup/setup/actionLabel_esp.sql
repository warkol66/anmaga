DELETE FROM `security_actionLabel` WHERE `action` LIKE 'Backup%' AND `language` = 'esp';
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupRestore', 'Restaurar respaldo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupCreateToFile', 'Crear respaldo en archvi para descargar', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupCreate', 'Crear respaldo en servidor', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupDelete', 'Eliminar respaldo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupList', 'Lista de respaldo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupRestoreFromFile', 'Restaurar respaldo desde archivo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupDownload', 'Descargar archivo de respaldo', 'esp');
