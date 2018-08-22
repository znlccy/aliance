/*
SQLyog Job Agent v12.09 (64 bit) Copyright(c) Webyog Inc. All Rights Reserved.


MySQL - 5.6.38 : Database - db_aliance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_aliance` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_aliance`;

/*Table structure for table `tb_activity` */

DROP TABLE IF EXISTS `tb_activity`;

CREATE TABLE `tb_activity` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '活动主键',
  `title` varchar(80) DEFAULT '' COMMENT '活动标题',
  `content` text COMMENT '活动内容',
  `picture` varchar(255) DEFAULT '' COMMENT '活动图片',
  `limit` int(32) DEFAULT '0' COMMENT '限制人数',
  `register` int(32) DEFAULT '0' COMMENT '报名人数',
  `recommend` tinyint(2) DEFAULT '0' COMMENT '是否推荐',
  `status` tinyint(2) DEFAULT '1' COMMENT '活动状态',
  `address` varchar(180) DEFAULT '' COMMENT '活动简写地址',
  `location` text COMMENT '活动详细地址',
  `begin_time` datetime DEFAULT NULL COMMENT '活动开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '活动结束时间',
  `apply_time` datetime DEFAULT NULL COMMENT '活动报名时间',
  `audit_method` tinyint(2) DEFAULT '0' COMMENT '审核方式',
  `rich_text` text COMMENT '富文本区域',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_activity` */

insert  into `tb_activity` values (1,'asdf','asdfs dfs df',NULL,23,0,0,1,'asdfasfsadf','sdfsdfsadf','2018-02-01 00:00:00','2018-02-23 00:00:00','2018-02-28 00:00:00',2,NULL);

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '管理员主键',
  `mobile` varchar(40) DEFAULT '' COMMENT '管理员手机',
  `password` varchar(64) DEFAULT '' COMMENT '管理员密码',
  `nick_name` varchar(40) DEFAULT NULL COMMENT '管理员昵称',
  `email` varchar(80) DEFAULT NULL COMMENT '管理员邮箱',
  `real_name` varchar(40) DEFAULT NULL COMMENT '管理员真实姓名',
  `status` tinyint(2) DEFAULT '1' COMMENT '管理员状态',
  `create_time` datetime DEFAULT NULL COMMENT '管理员创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '管理员更新时间',
  `create_ip` varchar(120) DEFAULT NULL COMMENT '管理员创建的IP',
  `login_time` datetime DEFAULT NULL COMMENT '管理员登陆时间',
  `login_ip` varchar(120) DEFAULT NULL COMMENT '管理员登陆IP',
  `authentication` tinyint(2) DEFAULT '0' COMMENT '授权认证',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_admin` */

insert  into `tb_admin` values (1,'15900785383','7eadafc40e72c85d36be5edcb7a7368d',NULL,NULL,'chencongye',1,'2018-08-20 16:07:11',NULL,'127.0.0.1',NULL,NULL,0);

/*Table structure for table `tb_admin_role` */

DROP TABLE IF EXISTS `tb_admin_role`;

CREATE TABLE `tb_admin_role` (
  `admin_id` int(12) NOT NULL COMMENT '管理员主键',
  `role_id` int(12) NOT NULL COMMENT '角色主键',
  PRIMARY KEY (`admin_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_admin_role` */

/*Table structure for table `tb_carousel` */

DROP TABLE IF EXISTS `tb_carousel`;

CREATE TABLE `tb_carousel` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '轮播主键',
  `title` varchar(80) DEFAULT '' COMMENT '轮播标题',
  `url` varchar(80) DEFAULT '' COMMENT '轮播跳转URL',
  `picture` varchar(255) DEFAULT '' COMMENT '轮播图片',
  `sort` tinyint(2) DEFAULT '0' COMMENT '轮播排序',
  `status` tinyint(2) DEFAULT '1' COMMENT '轮播状态',
  `create_time` datetime DEFAULT NULL COMMENT '轮播创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '轮播更新时间',
  `publish_time` datetime DEFAULT NULL COMMENT '轮播发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_carousel` */

insert  into `tb_carousel` values (2,'而且沃尔夫为','http://www.youku.com',NULL,1,1,'2018-08-17 16:21:54','2018-08-17 16:21:54','2018-08-17 16:21:54');

/*Table structure for table `tb_category` */

DROP TABLE IF EXISTS `tb_category`;

CREATE TABLE `tb_category` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(255) DEFAULT '' COMMENT '分类名称',
  `status` tinyint(2) DEFAULT '1' COMMENT '分类状态',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_category` */

insert  into `tb_category` values (1,'CCYZNL01',1,'2018-08-16 17:52:47','2018-08-16 17:52:49'),(2,'CCYZNL01',1,'2018-08-16 17:52:54','2018-08-16 17:52:56');

/*Table structure for table `tb_column` */

DROP TABLE IF EXISTS `tb_column`;

CREATE TABLE `tb_column` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '栏目主键',
  `name` varchar(120) DEFAULT '' COMMENT '栏目名称',
  `sort` int(12) DEFAULT NULL COMMENT '栏目排序',
  `status` tinyint(2) DEFAULT '1' COMMENT '栏目状态',
  `create_time` datetime DEFAULT NULL COMMENT '栏目创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '栏目更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_column` */

insert  into `tb_column` values (2,'ZNLCCY01',1,1,'2018-08-16 17:36:00','2018-08-16 17:36:00'),(3,'ZNLCCY02',2,1,'2018-08-16 17:36:06','2018-08-16 17:36:06'),(4,'ZNLCCY03',3,1,'2018-08-16 17:36:12','2018-08-16 17:36:12'),(5,'ZNLCCY04',3,1,'2018-08-16 17:36:16','2018-08-16 17:36:16');

/*Table structure for table `tb_dynamic` */

DROP TABLE IF EXISTS `tb_dynamic`;

CREATE TABLE `tb_dynamic` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '动态主键',
  `column_id` int(12) DEFAULT NULL COMMENT '栏目主键',
  `title` varchar(255) DEFAULT '' COMMENT '动态标题',
  `description` varchar(255) DEFAULT '' COMMENT '动态简介',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `picture` varchar(255) DEFAULT NULL COMMENT '动态图片',
  `recommend` tinyint(2) DEFAULT '0' COMMENT '是否推荐',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `publisher` varchar(30) DEFAULT '' COMMENT '发布人',
  `rich_text` text COMMENT '富文本',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_dynamic` */

insert  into `tb_dynamic` values (1,1,'暗示法大神的','撒地方的撒旦法萨法','2018-08-17 10:44:19','2018-08-17 10:44:19','2018-08-17 10:44:18',NULL,1,1,'chen','&lt;img src=&quot;/static/images/logo.png&quot; /&gt;&lt;p&gt;这是啥玩意&lt;/p&gt;&lt;img src=&quot;/static/images/logo.png&quot; /&gt;');

/*Table structure for table `tb_group` */

DROP TABLE IF EXISTS `tb_group`;

CREATE TABLE `tb_group` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '分组ID',
  `name` varchar(255) DEFAULT '' COMMENT '分组名称',
  `sort` int(8) DEFAULT NULL COMMENT '分组排序',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_group` */

insert  into `tb_group` values (1,'CEO',1,'2018-08-15 16:34:19','2018-08-15 16:34:19'),(2,'CTO',2,'2018-08-15 16:34:44','2018-08-15 16:35:17'),(3,'CIO',2,'2018-08-15 16:34:56','2018-08-15 16:35:36'),(4,'CFO',2,'2018-08-15 17:04:23','2018-08-15 17:04:23'),(5,'CMO',4,'2018-08-16 10:02:18','2018-08-16 10:02:18');

/*Table structure for table `tb_information` */

DROP TABLE IF EXISTS `tb_information`;

CREATE TABLE `tb_information` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '消息主键',
  `title` varchar(255) DEFAULT '' COMMENT '消息主题',
  `create_time` datetime DEFAULT NULL COMMENT '消息创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '消息更新时间',
  `publisher` varchar(80) DEFAULT '' COMMENT '消息发布人',
  `status` tinyint(2) DEFAULT '1' COMMENT '消息状态',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `rich_text` text COMMENT '消息富文本',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_information` */

insert  into `tb_information` values (1,'测试新闻',NULL,'2018-08-21 09:04:57',NULL,1,'2018-08-21 09:04:57','Hello World');

/*Table structure for table `tb_member` */

DROP TABLE IF EXISTS `tb_member`;

CREATE TABLE `tb_member` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '成员主键',
  `mobile` varchar(30) DEFAULT '' COMMENT '成员账号',
  `password` varchar(34) DEFAULT '' COMMENT '成员密码',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `login_time` datetime DEFAULT NULL COMMENT '登录时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '用户状态',
  `auditor` tinyint(2) DEFAULT '0' COMMENT '审核状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_member` */

/*Table structure for table `tb_permission` */

DROP TABLE IF EXISTS `tb_permission`;

CREATE TABLE `tb_permission` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '权限主键',
  `name` varchar(80) DEFAULT '' COMMENT '权限名称',
  `path` varchar(255) DEFAULT '' COMMENT '权限路径',
  `pid` int(12) DEFAULT NULL COMMENT '父节点',
  `description` varchar(255) DEFAULT '' COMMENT '权限描述',
  `sort` int(12) DEFAULT NULL COMMENT '权限描述',
  `level` int(12) DEFAULT NULL COMMENT '权限等级',
  `status` tinyint(2) DEFAULT NULL COMMENT '权限状态',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `icon` varchar(32) DEFAULT '' COMMENT '权限图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_permission` */

insert  into `tb_permission` values (1,'admin','/admin/permission/save',1,'super admin',1,1,1,'2018-08-20 15:15:38',NULL,'user icon'),(2,'user','/admin/permission/detail',1,'ordinary user',2,2,1,'2018-08-20 15:16:23',NULL,'find icon');

/*Table structure for table `tb_role` */

DROP TABLE IF EXISTS `tb_role`;

CREATE TABLE `tb_role` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '角色主键',
  `name` varchar(60) DEFAULT '' COMMENT '角色名称',
  `parent_id` int(12) DEFAULT '0' COMMENT '父节点',
  `description` varchar(255) DEFAULT '' COMMENT '角色描述',
  `status` tinyint(2) DEFAULT '1' COMMENT '角色状态',
  `sort` int(12) DEFAULT NULL COMMENT '角色排序',
  `left_key` int(12) DEFAULT '0' COMMENT '左键值',
  `right_key` int(12) DEFAULT '0' COMMENT '右键值',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `level` int(12) DEFAULT '0' COMMENT '等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_role` */

insert  into `tb_role` values (1,'什么角色',1,'不知道',1,1,1,4,'2018-08-20 13:48:29','2018-08-20 12:01:01',1),(2,'超级管理员',1,'不知道',1,2,2,3,'2018-08-20 12:01:18','2018-08-20 13:48:27',1);

/*Table structure for table `tb_role_permission` */

DROP TABLE IF EXISTS `tb_role_permission`;

CREATE TABLE `tb_role_permission` (
  `role_id` int(12) NOT NULL COMMENT '角色主键',
  `permission_id` int(12) NOT NULL COMMENT '权限主键',
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_role_permission` */

insert  into `tb_role_permission` values (1,1),(1,2);

/*Table structure for table `tb_service` */

DROP TABLE IF EXISTS `tb_service`;

CREATE TABLE `tb_service` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '服务ID',
  `name` varchar(80) DEFAULT '' COMMENT '服务名称',
  `description` varchar(255) DEFAULT '' COMMENT '服务描述',
  `picture` varchar(255) DEFAULT '' COMMENT '服务图片',
  `category_id` int(12) DEFAULT '0' COMMENT '分类主键',
  `price` int(80) DEFAULT '0' COMMENT '服务价格',
  `recommend` tinyint(2) DEFAULT '0' COMMENT '是否推荐',
  `status` tinyint(2) DEFAULT '1' COMMENT '服务状态',
  `address` varchar(255) DEFAULT '' COMMENT '服务地址',
  `create_time` datetime DEFAULT NULL COMMENT '服务创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '服务更新时间',
  `publish_time` datetime DEFAULT NULL COMMENT '服务发布时间',
  `rich_text` text COMMENT '服务富文本',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tb_service` */

insert  into `tb_service` values (1,'写字服务','这是使用人工智能技术提供写字服务，伴你一生便携式书写','/static/images/jenny.jpg',1,189,1,1,'http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes',NULL,NULL,'2018-08-07 10:27:04','<p><strong style=\"text-indent: 2em;\">哔哔2：拳头透露下一款大作情报！网友：充值2万打底！</strong></p>\r\n<p>LOL已经发布9年，但拳头公司何时才会推出下一款大作却一直没有消息。不过最近拳头创始人Merrill在接受外媒采访时表示，新的大作已经在研发中，而且这款游戏不会是大众游戏。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/PwlPgvbmufjlluE.jpg\" width=\"600\" height=\"323\" alt=\"timg.jpg\"></p>\r\n<p>“我们要做的是满足特定用户需求的游戏，而且是玩法优先，然后IP需要和游戏本身贴合，我们不会做大众游戏，就像当时做LOL也是为了一小部分玩家的需求一样”，Merrill说。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/qpLJMKbmufjllud.jpg\" width=\"550\" height=\"363\" alt=\"tim2g.jpg\"><br>↑↑拳头游戏创始人之一的Marc Merrill（右）</p>\r\n<p>那么问题来了：你期待拳头公司的新游戏吗？你觉得会是什么类型呢？</p>\r\n<p><strong>BoYellow炜：</strong>英雄联盟宇宙出了，做个mmo完全没问题！</p>\r\n<p><strong>电动小马达：</strong>我觉得不如做些有剧情有机制的pve和pvp地图，打起来比千篇一律的对战有意思多了，顺便期待水晶之痕还有星之守护者地图的回归。</p>\r\n<p><strong>黄油作品赏析：</strong>新游戏？《提莫的一百种死法》应该会有不少人玩。</p>\r\n<p><strong>hCcCcCcCcco：</strong>出了充值两万打底！期待啊！拳头大作！</p>'),(2,'读书服务','这是使用最新的大数据分析技术提供的读书服务','/static/images/elyse.png',2,1223,0,1,'http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes',NULL,NULL,'2018-08-07 10:27:04','<p><strong style=\"text-indent: 2em;\">哔哔2：拳头透露下一款大作情报！网友：充值2万打底！</strong></p>\r\n<p>LOL已经发布9年，但拳头公司何时才会推出下一款大作却一直没有消息。不过最近拳头创始人Merrill在接受外媒采访时表示，新的大作已经在研发中，而且这款游戏不会是大众游戏。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/PwlPgvbmufjlluE.jpg\" width=\"600\" height=\"323\" alt=\"timg.jpg\"></p>\r\n<p>“我们要做的是满足特定用户需求的游戏，而且是玩法优先，然后IP需要和游戏本身贴合，我们不会做大众游戏，就像当时做LOL也是为了一小部分玩家的需求一样”，Merrill说。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/qpLJMKbmufjllud.jpg\" width=\"550\" height=\"363\" alt=\"tim2g.jpg\"><br>↑↑拳头游戏创始人之一的Marc Merrill（右）</p>\r\n<p>那么问题来了：你期待拳头公司的新游戏吗？你觉得会是什么类型呢？</p>\r\n<p><strong>BoYellow炜：</strong>英雄联盟宇宙出了，做个mmo完全没问题！</p>\r\n<p><strong>电动小马达：</strong>我觉得不如做些有剧情有机制的pve和pvp地图，打起来比千篇一律的对战有意思多了，顺便期待水晶之痕还有星之守护者地图的回归。</p>\r\n<p><strong>黄油作品赏析：</strong>新游戏？《提莫的一百种死法》应该会有不少人玩。</p>\r\n<p><strong>hCcCcCcCcco：</strong>出了充值两万打底！期待啊！拳头大作！</p>'),(3,'刷牙服务','这是中国最新科研成果，为未来懒人提供便捷服务','/static/images/jenny.jpg',3,58,1,1,'http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes',NULL,NULL,'2018-08-07 10:27:04','<p><strong style=\"text-indent: 2em;\">哔哔2：拳头透露下一款大作情报！网友：充值2万打底！</strong></p>\r\n<p>LOL已经发布9年，但拳头公司何时才会推出下一款大作却一直没有消息。不过最近拳头创始人Merrill在接受外媒采访时表示，新的大作已经在研发中，而且这款游戏不会是大众游戏。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/PwlPgvbmufjlluE.jpg\" width=\"600\" height=\"323\" alt=\"timg.jpg\"></p>\r\n<p>“我们要做的是满足特定用户需求的游戏，而且是玩法优先，然后IP需要和游戏本身贴合，我们不会做大众游戏，就像当时做LOL也是为了一小部分玩家的需求一样”，Merrill说。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/qpLJMKbmufjllud.jpg\" width=\"550\" height=\"363\" alt=\"tim2g.jpg\"><br>↑↑拳头游戏创始人之一的Marc Merrill（右）</p>\r\n<p>那么问题来了：你期待拳头公司的新游戏吗？你觉得会是什么类型呢？</p>\r\n<p><strong>BoYellow炜：</strong>英雄联盟宇宙出了，做个mmo完全没问题！</p>\r\n<p><strong>电动小马达：</strong>我觉得不如做些有剧情有机制的pve和pvp地图，打起来比千篇一律的对战有意思多了，顺便期待水晶之痕还有星之守护者地图的回归。</p>\r\n<p><strong>黄油作品赏析：</strong>新游戏？《提莫的一百种死法》应该会有不少人玩。</p>\r\n<p><strong>hCcCcCcCcco：</strong>出了充值两万打底！期待啊！拳头大作！</p>'),(4,'洗衣服服务','这是采用高科技纳米技术，衣服从此以后再也不用担心被弄脏了','/static/images/molly.png',4,245,0,1,'http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes',NULL,NULL,'2018-08-07 10:27:04',''),(5,'购买服务','这是采用最新语音识别技术，能够快速的根据您的需求购买您需要的商品','/static/images/elyse.png',2,687,0,1,'http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes',NULL,NULL,'2018-08-07 10:27:04','<p><strong style=\"text-indent: 2em;\">哔哔2：拳头透露下一款大作情报！网友：充值2万打底！</strong></p>\r\n<p>LOL已经发布9年，但拳头公司何时才会推出下一款大作却一直没有消息。不过最近拳头创始人Merrill在接受外媒采访时表示，新的大作已经在研发中，而且这款游戏不会是大众游戏。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/PwlPgvbmufjlluE.jpg\" width=\"600\" height=\"323\" alt=\"timg.jpg\"></p>\r\n<p>“我们要做的是满足特定用户需求的游戏，而且是玩法优先，然后IP需要和游戏本身贴合，我们不会做大众游戏，就像当时做LOL也是为了一小部分玩家的需求一样”，Merrill说。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/qpLJMKbmufjllud.jpg\" width=\"550\" height=\"363\" alt=\"tim2g.jpg\"><br>↑↑拳头游戏创始人之一的Marc Merrill（右）</p>\r\n<p>那么问题来了：你期待拳头公司的新游戏吗？你觉得会是什么类型呢？</p>\r\n<p><strong>BoYellow炜：</strong>英雄联盟宇宙出了，做个mmo完全没问题！</p>\r\n<p><strong>电动小马达：</strong>我觉得不如做些有剧情有机制的pve和pvp地图，打起来比千篇一律的对战有意思多了，顺便期待水晶之痕还有星之守护者地图的回归。</p>\r\n<p><strong>黄油作品赏析：</strong>新游戏？《提莫的一百种死法》应该会有不少人玩。</p>\r\n<p><strong>hCcCcCcCcco：</strong>出了充值两万打底！期待啊！拳头大作！</p>'),(6,'穿鞋服务','这是采用精准的红外线探测头技术，准确的找到你的鞋子所摆放的位置','/static/images/elyse.png',5,345,1,1,'http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes',NULL,NULL,'2018-08-07 10:27:04','<p><strong style=\"text-indent: 2em;\">哔哔2：拳头透露下一款大作情报！网友：充值2万打底！</strong></p>\r\n<p>LOL已经发布9年，但拳头公司何时才会推出下一款大作却一直没有消息。不过最近拳头创始人Merrill在接受外媒采访时表示，新的大作已经在研发中，而且这款游戏不会是大众游戏。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/PwlPgvbmufjlluE.jpg\" width=\"600\" height=\"323\" alt=\"timg.jpg\"></p>\r\n<p>“我们要做的是满足特定用户需求的游戏，而且是玩法优先，然后IP需要和游戏本身贴合，我们不会做大众游戏，就像当时做LOL也是为了一小部分玩家的需求一样”，Merrill说。</p>\r\n<p class=\"p-image\" style=\"text-align: center;\"><img src=\"//i.17173cdn.com/2fhnvk/YWxqaGBf/cms3/qpLJMKbmufjllud.jpg\" width=\"550\" height=\"363\" alt=\"tim2g.jpg\"><br>↑↑拳头游戏创始人之一的Marc Merrill（右）</p>\r\n<p>那么问题来了：你期待拳头公司的新游戏吗？你觉得会是什么类型呢？</p>\r\n<p><strong>BoYellow炜：</strong>英雄联盟宇宙出了，做个mmo完全没问题！</p>\r\n<p><strong>电动小马达：</strong>我觉得不如做些有剧情有机制的pve和pvp地图，打起来比千篇一律的对战有意思多了，顺便期待水晶之痕还有星之守护者地图的回归。</p>\r\n<p><strong>黄油作品赏析：</strong>新游戏？《提莫的一百种死法》应该会有不少人玩。</p>\r\n<p><strong>hCcCcCcCcco：</strong>出了充值两万打底！期待啊！拳头大作！</p>'),(13,'测试','简介',NULL,2,520,0,0,'www.qq.com',NULL,NULL,'2018-08-08 19:21:40',''),(14,'好东西','1212',NULL,3,123,1,0,'www',NULL,NULL,'2018-08-08 19:33:12','');

/*Table structure for table `tb_sms` */

DROP TABLE IF EXISTS `tb_sms`;

CREATE TABLE `tb_sms` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '短信验证主键',
  `mobile` varchar(18) DEFAULT '' COMMENT '手机号码',
  `code` int(8) DEFAULT NULL COMMENT '短信验证码',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `expiration_time` datetime DEFAULT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_sms` */

insert  into `tb_sms` values (1,'15787845545',519705,'2018-08-16 09:53:23','2018-08-16 09:55:08','2018-08-16 10:05:08'),(2,'15900785383',634072,'2018-08-16 09:55:24','2018-08-21 11:58:10','2018-08-21 12:08:10'),(3,'15001056491',811337,'2018-08-16 10:08:03','2018-08-16 10:08:03','2018-08-16 10:18:03');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '成员主键',
  `username` varchar(60) DEFAULT '' COMMENT '用户姓名',
  `mobile` varchar(18) DEFAULT '' COMMENT '用户手机',
  `password` varchar(32) DEFAULT '' COMMENT '用户密码',
  `company` varchar(255) DEFAULT '' COMMENT '公司名称',
  `stage` varchar(255) DEFAULT '' COMMENT '公司所处阶段',
  `website` varchar(255) DEFAULT '' COMMENT '公司网址',
  `industry` varchar(255) DEFAULT '' COMMENT '所属行业',
  `occupation` varchar(255) DEFAULT '' COMMENT '所属职业',
  `legal_person` varchar(180) DEFAULT '' COMMENT '公司法人',
  `duty` varchar(255) DEFAULT '' COMMENT '职务',
  `phone` varchar(60) DEFAULT '' COMMENT '单位座机',
  `email` varchar(80) DEFAULT '' COMMENT '用户邮箱',
  `register_address` varchar(255) DEFAULT '' COMMENT '公司注册地址',
  `business_license` varchar(255) DEFAULT '' COMMENT '公司营业执照',
  `register_capital` varchar(100) DEFAULT '' COMMENT '注册资金',
  `license_scan` varchar(255) DEFAULT '' COMMENT '营业执照扫描件',
  `mailing_address` varchar(255) DEFAULT '' COMMENT '邮寄地址',
  `sales_volume` varchar(120) DEFAULT '' COMMENT '上年度销售额',
  `total_people` varchar(80) DEFAULT '' COMMENT '公司总人数',
  `developer_people` varchar(80) DEFAULT '' COMMENT '研发人数',
  `patent` varchar(255) DEFAULT '' COMMENT '专利',
  `high_technology` tinyint(2) DEFAULT '0' COMMENT '高新技术企业',
  `service_direction` varchar(255) DEFAULT '' COMMENT '期望服务方向',
  `products_introduce` text COMMENT '主要产品介绍',
  `business_introduce` text COMMENT '主营业务介绍',
  `auditor` tinyint(2) DEFAULT '0' COMMENT '审核状态',
  `status` tinyint(2) DEFAULT '1' COMMENT '用户状态',
  `operator` varchar(255) DEFAULT NULL COMMENT '操作者',
  `logo` varchar(255) DEFAULT '' COMMENT '公司logo',
  `create_time` datetime DEFAULT NULL COMMENT '注册时间',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `login_time` datetime DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user` values (1,'','15900785383','123456chen','上海游达','','','','','','','','','','','','','','','','','',0,'',NULL,NULL,0,1,NULL,'','2018-08-21 19:41:27','2018-08-22 11:01:08',NULL),(2,'','13323762193','123456chen','上海一汽','','','','','','','','','','','','','','','','','',0,'',NULL,NULL,0,1,NULL,'','2018-08-22 09:45:07','2018-08-22 10:51:38',NULL),(3,'','15725836945','123456chen','上海宝马','','','','','','','','','','','','','','','','','',0,'',NULL,NULL,1,1,NULL,'','2018-08-22 10:37:46','2018-08-22 10:46:32',NULL),(5,'','15235658814','','werwerw','这是轮播图','qwerwerqwer','qwerqwer','','qwerwqerwer','qwwerwerwqerqw','qawer14rdf','afq34rasdfas@chen.com','afasfq34dsf','asfasdf','asfasdf','/images/20180822/67c41f9f0298505cd47abaf23b95ddeb.jpg','awerawe','arfaef','aasfasf','afssa','fsfas',1,'dsfasfda','主营业务介绍','fasdfsdf',0,1,NULL,'/images/20180822/56032ec666973560c35c7e0b84ae3ee1.png','2018-08-22 16:45:54','2018-08-22 16:45:54',NULL);

/*Table structure for table `tb_user_activity` */

DROP TABLE IF EXISTS `tb_user_activity`;

CREATE TABLE `tb_user_activity` (
  `user_id` int(12) NOT NULL COMMENT '用户主键',
  `activity_id` int(12) NOT NULL COMMENT '活动主键',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `apply_time` datetime DEFAULT NULL COMMENT '报名时间',
  PRIMARY KEY (`user_id`,`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_user_activity` */

/*Table structure for table `tb_user_group` */

DROP TABLE IF EXISTS `tb_user_group`;

CREATE TABLE `tb_user_group` (
  `user_id` int(12) NOT NULL COMMENT '用户主键',
  `group_id` int(12) NOT NULL COMMENT '分组主键',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_user_group` */

insert  into `tb_user_group` values (1,1,NULL,NULL),(2,1,NULL,NULL),(3,1,NULL,NULL);

/*Table structure for table `tb_user_info` */

DROP TABLE IF EXISTS `tb_user_info`;

CREATE TABLE `tb_user_info` (
  `user_id` int(12) NOT NULL COMMENT '用户主键',
  `info_id` int(12) NOT NULL COMMENT '消息主键',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`user_id`,`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_user_info` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
