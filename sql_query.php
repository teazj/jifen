<?php
//这里记录数据库的表操作语句
1，ALTER TABLE `ff_users_info` DROP `username` ,
DROP `password` ;

ALTER TABLE `ff_users_info` ADD `users_id` INT NOT NULL COMMENT '用户id' AFTER `id` ;

ALTER TABLE `ff_users` CHANGE `uid` `id` INT( 10 ) UNSIGNED NOT NULL COMMENT '用户id';

ALTER TABLE `ff_users` ADD PRIMARY KEY(`id`);

ALTER TABLE `ff_users` ADD `email` VARCHAR( 30 ) NOT NULL COMMENT '注册邮箱' AFTER `balance` ;
