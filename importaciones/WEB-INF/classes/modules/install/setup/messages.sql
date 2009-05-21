DELETE FROM `actionLogs_label` WHERE `action` LIKE 'Install%';
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Módulo instalado correctamente','esp','success');
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Module installed successfully','eng','success');
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Error al instalar el módulo','esp','failure');
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Module installation failed','eng','failure');
