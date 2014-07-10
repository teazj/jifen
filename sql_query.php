<?php
//这里记录数据库的表操作语句
1，ALTER TABLE `ff_users_info` DROP `username`,DROP `password` ;

ALTER TABLE `ff_users_info` ADD `users_id` INT NOT NULL COMMENT '用户id' AFTER `id` ;

ALTER TABLE `ff_users` CHANGE `uid` `id` INT( 10 ) UNSIGNED NOT NULL COMMENT '用户id';

ALTER TABLE `ff_users` ADD PRIMARY KEY(`id`);

ALTER TABLE `ff_users` ADD `email` VARCHAR( 30 ) NOT NULL COMMENT '注册邮箱' AFTER `balance` ;

2，ALTER TABLE `ff_vistainfo` CHANGE `pid` `pid` INT(11) NOT NULL COMMENT '外键，对应表place';

ALTER TABLE `ff_users` CHANGE `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id';


DROP TABLE IF EXISTS `ff_cart`;
CREATE TABLE `ff_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `session_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `resource_type` int(11) DEFAULT '0',
  `item_id` int(11) DEFAULT '0',
  `item_img` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `item_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `market_price` float(8,2) DEFAULT '0.00',
  `price` float(8,2) DEFAULT '0.00',
  `discount` float(8,2) DEFAULT '0.00',
  `quantity` int(11) DEFAULT '1',
  `amount` float(8,2) DEFAULT '0.00',
  `create_time` datetime DEFAULT '0000-00-00 00:00:00',
  `item_sn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `merchantid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `ff_cart` VALUES ('9', '27', '2907947802', 'n6opit986l33ikg14ecd5dgf77', '0', '3', 'pd_1_3.jpg', '丝宝宝 茶树菇145g/袋', '26.50', '20.40', '0.00', '1', '0.00', '2013-08-14 12:01:47', 'No3', '0', '0');
INSERT INTO `ff_cart` VALUES ('10', '29', '2559479647', 'de1glp3fd4hgctb5qkjcl1f572', '0', '3', 'pd_1_3.jpg', '丝宝宝 茶树菇145g/袋', '26.50', '20.40', '0.00', '1', '0.00', '2013-08-18 19:46:37', 'No3', '0', '0');
INSERT INTO `ff_cart` VALUES ('25', '28', '2909951914', 'adl3g0nmsk7m8flm5lh79ci3t2', '0', '2', 'pd_1_2.jpg', '农夫山泉 维他命水美丽速度(石榴蓝莓风', '30.00', '30.00', '0.00', '1', '0.00', '2013-08-19 12:08:42', 'No2', '0', '0');
INSERT INTO `ff_cart` VALUES ('91', '173', '张三', '8938d84a7f320de5416ad950cc4b585c', '0', '103', 'M_52676bbb8a20d.jpg', '2013秋冬韩版女装 长袖单排牛角扣连帽纯色时尚加厚毛衣外套', '192.00', '106.00', '0.00', '1', '0.00', '2014-02-10 08:42:41', '77926', '0', '23');
INSERT INTO `ff_cart` VALUES ('75', '15', '123456', '98154a52c8920c3dfef025eb1e412602', '0', '3', 'pd_1_3.jpg', '丝宝宝 茶树菇145g/袋', '26.50', '20.40', '0.00', '1', '0.00', '2013-08-22 11:37:02', 'No3', '0', '0');
INSERT INTO `ff_cart` VALUES ('76', '15', '123456', '98154a52c8920c3dfef025eb1e412602', '0', '16', 'M_5212f6b76eb0a.gif', '手机', '140.00', '120.00', '0.00', '1', '0.00', '2013-08-22 11:37:07', '001', '0', '23');
INSERT INTO `ff_cart` VALUES ('81', '124', 'zhangxinye', '74f6835d9738ad24d545f9658dfc3ddc', '0', '44', 'M_5227334db13cf.jpg', '捷波朗（Jabra） MOTION 魔声 蓝牙耳机 黑色', '900.00', '879.00', '0.00', '1', '0.00', '2013-09-07 21:03:49', '006', '0', '117');
INSERT INTO `ff_cart` VALUES ('85', '164', 'hne138', 'f8248eff41aa6ffdfabdc39887093347', '0', '65', 'M_52304813a8580.jpg', '漫步者（EDIFIER） R201T12 2.1声道 多媒体音箱 黑色', '220.00', '190.00', '0.00', '1', '0.00', '2013-11-24 14:45:41', '014', '0', '117');
INSERT INTO `ff_cart` VALUES ('95', '178', 'southchina007', 'd14362c7f23f1d2dc755816d66d07063', '0', '56', 'M_522ed518ead18.jpg', '开博尔（Kaiboer） C9双核网络电视机顶盒', '460.00', '429.00', '0.00', '1', '0.00', '2014-03-03 16:24:26', '010', '0', '117');
INSERT INTO `ff_cart` VALUES ('92', '177', 'leihaodegg', '9f8f2728eb432c72e636f2884332f38b', '0', '57', 'M_522ed1e48d8df.jpg', '佳能（Canon） IXUS255 HS 数码相机 黑色', '1400.00', '1379.00', '0.00', '1', '0.00', '2014-02-24 11:55:31', '012', '0', '117');


CREATE TABLE `ff_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `shengfen` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
  `shi` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
  `qu` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lianxiren` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ismr` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


删除ff_goods_detail表的库存字段

ALTER TABLE `ff_orders` CHANGE `status` `status` TINYINT( 4 ) NOT NULL DEFAULT '0' COMMENT '订单状态0待处理，1已付款';

ALTER TABLE `ff_orders_detail` CHANGE `oid` `oid` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单ID';

ALTER TABLE `ff_goods` CHANGE `price` `price` DOUBLE( 6, 2 ) UNSIGNED NOT NULL DEFAULT '0.01' COMMENT '商品价格';

ALTER TABLE `ff_users_info` CHANGE `phone` `phone` VARCHAR( 30 ) NULL COMMENT '电话';

ALTER TABLE `ff_users_info` CHANGE `nickname` `nickname` VARCHAR( 16 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '真实名字';

11，alter table ff_rzvista add column `desc` varchar(50) NOT NULL COMMENT '描述' after vid;

12，ALTER TABLE `ff_rzorder` CHANGE `phone` `phone` BIGINT(20) UNSIGNED NOT NULL;

13，ALTER TABLE `ff_qzorder` CHANGE `phone` `phone` BIGINT(20) UNSIGNED NOT NULL;

14,alter table `ff_flink` add column type tinyint(1) not null default 1 comment "1友情链接 2合作伙伴" after addtime;