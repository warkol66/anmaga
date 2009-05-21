DELETE FROM `actionLogs_label` WHERE `action` LIKE 'Affiliates%';
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'AffiliateUsersDoLogin', 'Usuario inicio de sesion exitoso','esp','success');
INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( 'AffiliateUsersDoLogin', 'User login successful','eng','success');
