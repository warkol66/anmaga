DELETE FROM `actionLogs_label` WHERE `action` LIKE 'Install%' AND `language` = 'esp';
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Módulo instalado correctamente','esp','success');
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Error al instalar el módulo','esp','failure');
