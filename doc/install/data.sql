INSERT INTO `users_group` (`name` , `created` , `updated` ) VALUES ('admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users_group` (`name` , `created` , `updated` ) VALUES ('supervisor', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users_user` (`username` , `password` , `active` , `created` , `updated` ) VALUES ('admin', '45c48d97153f26e17d101be744368331', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users_user` (`username` , `password` , `active` , `created` , `updated` ) VALUES ('supervisor', '45c48d97153f26e17d101be744368331', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users_userGroup` ( `userId` , `groupId` ) VALUES ('1', '1');
INSERT INTO `users_userGroup` ( `userId` , `groupId` ) VALUES ('2', '1');
INSERT INTO `users_userGroup` ( `userId` , `groupId` ) VALUES ('2', '2');
INSERT INTO `users_userInfo` ( `userId` , `name` , `surname` ) VALUES ('1', 'Admin', 'Admin');
INSERT INTO `users_userInfo` ( `userId` , `name` , `surname` ) VALUES ('2', 'Supervisor', 'Supervisor');

