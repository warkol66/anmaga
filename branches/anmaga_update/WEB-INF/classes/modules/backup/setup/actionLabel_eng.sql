DELETE FROM `security_actionLabel` WHERE `action` LIKE 'Backup%' AND `language` = 'eng';
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupRestore', 'Restore backup', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupCreateToFile', 'Create backup to download', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupCreate', 'Create backup on server', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupDelete', 'Delete Backup', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupList', 'Backups list', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupRestoreFromFile', 'Restore backup from file', 'eng');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('BackupDownload', 'Download backup', 'eng');
