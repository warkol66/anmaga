DELETE FROM `actionLogs_label` WHERE `action` LIKE 'Install%' AND `language` = 'eng';
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Module installed successfully','eng','success');
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'InstallSetupMessages', 'Module installation failed','eng','failure');
