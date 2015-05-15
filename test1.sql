/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : test1

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-15 17:23:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_task`
-- ----------------------------
DROP TABLE IF EXISTS `admin_task`;
CREATE TABLE `admin_task` (
  `Ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ProblemSummary` varchar(90) NOT NULL,
  `DateReported` date NOT NULL,
  `PersonReported` varchar(90) NOT NULL,
  `Source` varchar(90) NOT NULL,
  `ProdState` varchar(10) NOT NULL,
  `AssignTo` varchar(90) DEFAULT NULL,
  `Geos` varchar(30) NOT NULL,
  `Family` varchar(30) NOT NULL,
  `DataArea` varchar(30) NOT NULL,
  `Severity` text NOT NULL,
  `ImpactSize` varchar(50) DEFAULT NULL,
  `ProblemDetails` varchar(700) DEFAULT NULL,
  `file_path` varchar(700) DEFAULT NULL,
  `prob_state` varchar(20) DEFAULT NULL,
  `dist` int(10) DEFAULT NULL COMMENT '1,0',
  PRIMARY KEY (`Ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1479 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_task
-- ----------------------------
INSERT INTO `admin_task` VALUES ('1476', 'testfile22', '2015-02-10', 'testperson', 'CTO', 'Pre', 'user1', 'geo2', 'f2', 'dr2', 'sry2', '22', 'asdadadsaa', '', 'Closed', '0');
INSERT INTO `admin_task` VALUES ('1477', 'problem', '2015-02-11', 'person', 'UF', 'LOIS', 'user2', 'geo3', 'f3', 'dr3', 'sry3', '33', 'asdadadsaa', '[\"bitso.txt\",\"biso bug.txt\",\"a.txt\",\"qqqq.txt\"]', 'open', '1');
INSERT INTO `admin_task` VALUES ('1478', 'problem', '2015-02-10', 'aaa', 'BM', 'Post', 'admin', 'geo1', 'f1', 'dr1', 'sry1', '2222', '水电费打算', '', 'open', '0');

-- ----------------------------
-- Table structure for `bugs`
-- ----------------------------
DROP TABLE IF EXISTS `bugs`;
CREATE TABLE `bugs` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `char` varchar(40) DEFAULT NULL COMMENT 'c',
  `value` text COMMENT 'v',
  `AD` date DEFAULT NULL,
  `submitter` varchar(20) DEFAULT NULL,
  `modifier` varchar(20) DEFAULT NULL COMMENT 'New , In Progress, Done',
  `status` varchar(20) DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bugs
-- ----------------------------
INSERT INTO `bugs` VALUES ('1', 'a11', '[\"111\",\"222\",\"333\"]', '2015-03-05', 'me', 'li', 'In Progress', '2015-03-11 08:31:28', null);
INSERT INTO `bugs` VALUES ('2', 'cc', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2015-03-04', 'lic', 'liu', 'New', '2015-03-11 08:15:27', null);
INSERT INTO `bugs` VALUES ('3', 'c', '[\"ws\",\"xf\",\"xv\"]', '2015-03-05', '232', 'aa', 'In Progress', '2015-03-11 08:15:23', '2015-03-05 06:25:58');
INSERT INTO `bugs` VALUES ('4', 'a', '[\"111\",\"222\",\"333\"]', '2015-03-11', 'andy', 'James Hu', 'Done', '2015-03-11 08:31:15', '2015-03-11 08:22:24');

-- ----------------------------
-- Table structure for `change_history`
-- ----------------------------
DROP TABLE IF EXISTS `change_history`;
CREATE TABLE `change_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL COMMENT 'tickets_id',
  `pro_id` int(20) NOT NULL COMMENT 'project_name',
  `change_user` varchar(50) NOT NULL COMMENT 'changeuser',
  `change_time` datetime NOT NULL COMMENT 'changetime',
  `oper` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of change_history
-- ----------------------------
INSERT INTO `change_history` VALUES ('4', '2', '1', 'test', '2015-01-30 09:52:20', 'update');
INSERT INTO `change_history` VALUES ('5', '2', '1', 'test', '2015-01-30 10:07:52', 'add');
INSERT INTO `change_history` VALUES ('6', '2', '1', 'test', '2015-01-30 10:21:26', 'add');
INSERT INTO `change_history` VALUES ('7', '2', '1', 'test', '2015-01-30 10:21:57', 'update');
INSERT INTO `change_history` VALUES ('8', '2', '1', 'test', '2015-01-30 10:23:39', 'add');
INSERT INTO `change_history` VALUES ('9', '2', '1', 'test', '2015-01-30 10:23:47', 'update');
INSERT INTO `change_history` VALUES ('10', '2', '1', 'user', '2015-02-05 06:16:05', 'add');
INSERT INTO `change_history` VALUES ('11', '2', '1', 'user', '2015-02-05 08:01:52', 'update');
INSERT INTO `change_history` VALUES ('12', '2', '1', 'user', '2015-02-05 08:03:17', 'update');
INSERT INTO `change_history` VALUES ('13', '2', '1', 'user', '2015-02-05 08:05:15', 'update');
INSERT INTO `change_history` VALUES ('14', '2', '1', 'user', '2015-02-05 08:06:35', 'update');
INSERT INTO `change_history` VALUES ('15', '2', '1', 'user', '2015-02-05 08:09:31', 'update');
INSERT INTO `change_history` VALUES ('16', '2', '1', 'user', '2015-02-05 08:10:00', 'update');
INSERT INTO `change_history` VALUES ('17', '2', '1', 'user', '2015-02-05 08:10:26', 'update');
INSERT INTO `change_history` VALUES ('18', '2', '1', 'user', '2015-02-06 03:22:43', 'update');
INSERT INTO `change_history` VALUES ('19', '1', '3', 'user', '2015-02-06 06:51:56', 'add');
INSERT INTO `change_history` VALUES ('20', '10', '3', 'user', '2015-02-06 07:00:31', 'add');
INSERT INTO `change_history` VALUES ('21', '10', '3', 'user', '2015-02-06 07:14:22', 'update');
INSERT INTO `change_history` VALUES ('22', '10', '3', 'user', '2015-02-06 07:15:00', 'update');
INSERT INTO `change_history` VALUES ('23', '11', '3', 'admin', '2015-02-09 06:52:12', 'update');
INSERT INTO `change_history` VALUES ('24', '5', '1', 'user1', '2015-02-09 08:21:24', 'update');
INSERT INTO `change_history` VALUES ('25', '1', '2', 'user2', '2015-02-10 03:13:42', 'add');
INSERT INTO `change_history` VALUES ('26', '2', '2', 'user2', '2015-02-10 05:49:58', 'add');
INSERT INTO `change_history` VALUES ('27', '2', '2', 'user2', '2015-02-10 05:53:39', 'update');
INSERT INTO `change_history` VALUES ('28', '2', '2', 'user2', '2015-02-10 05:54:53', 'update');
INSERT INTO `change_history` VALUES ('29', '2', '2', 'user2', '2015-02-10 05:55:01', 'update');
INSERT INTO `change_history` VALUES ('30', '1', '2', 'user2', '2015-02-10 06:00:11', 'update');
INSERT INTO `change_history` VALUES ('31', '10', '3', 'admin', '2015-02-12 02:58:16', 'update');
INSERT INTO `change_history` VALUES ('32', '10', '3', 'admin', '2015-02-12 02:58:40', 'update');
INSERT INTO `change_history` VALUES ('33', '12', '3', 'admin', '2015-02-12 02:59:18', 'update');
INSERT INTO `change_history` VALUES ('34', '7', '1', 'admin', '2015-03-02 08:52:22', 'update');
INSERT INTO `change_history` VALUES ('35', '25', '1', 'admin', '2015-03-13 06:15:49', 'update');
INSERT INTO `change_history` VALUES ('36', '25', '1', 'admin', '2015-03-13 06:24:33', 'update');
INSERT INTO `change_history` VALUES ('37', '25', '1', 'admin', '2015-03-13 06:24:53', 'update');
INSERT INTO `change_history` VALUES ('38', '551', '2', 'admin', '2015-03-13 06:39:20', 'update');
INSERT INTO `change_history` VALUES ('39', '551', '2', 'admin', '2015-03-13 06:41:58', 'update');
INSERT INTO `change_history` VALUES ('40', '3', '0', 'admin', '2015-03-23 09:15:54', 'add');
INSERT INTO `change_history` VALUES ('41', '4', '0', 'admin', '2015-03-23 10:32:37', 'add');
INSERT INTO `change_history` VALUES ('42', '8', '2', 'admin', '2015-03-23 10:36:31', 'update');
INSERT INTO `change_history` VALUES ('43', '8', '2', 'admin', '2015-03-23 10:36:39', 'update');
INSERT INTO `change_history` VALUES ('44', '8', '2', 'admin', '2015-03-23 10:36:59', 'update');
INSERT INTO `change_history` VALUES ('45', '3', '6', 'admin', '2015-03-23 10:37:42', 'update');
INSERT INTO `change_history` VALUES ('46', '1829', '7', 'admin', '2015-03-23 10:38:02', 'update');
INSERT INTO `change_history` VALUES ('47', '8', '2', 'admin', '2015-03-23 10:39:12', 'update');
INSERT INTO `change_history` VALUES ('48', '8', '2', 'admin', '2015-03-23 10:41:15', 'update');
INSERT INTO `change_history` VALUES ('49', '1829', '7', 'admin', '2015-03-23 10:41:27', 'update');
INSERT INTO `change_history` VALUES ('50', '24', '1', 'admin', '2015-03-23 11:04:52', 'update');

-- ----------------------------
-- Table structure for `common_action`
-- ----------------------------
DROP TABLE IF EXISTS `common_action`;
CREATE TABLE `common_action` (
  `ACID` int(11) NOT NULL COMMENT 'Action ID',
  `ACTION` varchar(30) NOT NULL COMMENT 'Action',
  PRIMARY KEY (`ACID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_action
-- ----------------------------
INSERT INTO `common_action` VALUES ('1', 'New MT');
INSERT INTO `common_action` VALUES ('2', 'Refresh');
INSERT INTO `common_action` VALUES ('3', 'Modify');

-- ----------------------------
-- Table structure for `common_brand`
-- ----------------------------
DROP TABLE IF EXISTS `common_brand`;
CREATE TABLE `common_brand` (
  `bid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Brand ID',
  `bname` varchar(30) NOT NULL COMMENT 'Brand Name',
  PRIMARY KEY (`bid`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_brand
-- ----------------------------
INSERT INTO `common_brand` VALUES ('1', '4321');

-- ----------------------------
-- Table structure for `common_bu`
-- ----------------------------
DROP TABLE IF EXISTS `common_bu`;
CREATE TABLE `common_bu` (
  `bu_id` int(11) NOT NULL AUTO_INCREMENT,
  `bu_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_bu
-- ----------------------------
INSERT INTO `common_bu` VALUES ('1', 'LBG Accessory');
INSERT INTO `common_bu` VALUES ('2', 'TBG Accessory');
INSERT INTO `common_bu` VALUES ('3', 'EBG Accessory');
INSERT INTO `common_bu` VALUES ('4', 'Visual');
INSERT INTO `common_bu` VALUES ('5', 'Service');
INSERT INTO `common_bu` VALUES ('6', 'MBG Accessory');

-- ----------------------------
-- Table structure for `common_category1`
-- ----------------------------
DROP TABLE IF EXISTS `common_category1`;
CREATE TABLE `common_category1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_category1
-- ----------------------------
INSERT INTO `common_category1` VALUES ('1', 'cate');
INSERT INTO `common_category1` VALUES ('2', 'cate2');

-- ----------------------------
-- Table structure for `common_category2`
-- ----------------------------
DROP TABLE IF EXISTS `common_category2`;
CREATE TABLE `common_category2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cc_id` int(11) NOT NULL,
  `nc_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_category2
-- ----------------------------

-- ----------------------------
-- Table structure for `common_group`
-- ----------------------------
DROP TABLE IF EXISTS `common_group`;
CREATE TABLE `common_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(20) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_group
-- ----------------------------
INSERT INTO `common_group` VALUES ('1', 'LOIS');
INSERT INTO `common_group` VALUES ('2', 'CTO');
INSERT INTO `common_group` VALUES ('3', 'IAL');

-- ----------------------------
-- Table structure for `common_project`
-- ----------------------------
DROP TABLE IF EXISTS `common_project`;
CREATE TABLE `common_project` (
  `projectid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  PRIMARY KEY (`projectid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_project
-- ----------------------------
INSERT INTO `common_project` VALUES ('1', 'LOIS TBG/IPG');
INSERT INTO `common_project` VALUES ('2', 'LOIS OPT');
INSERT INTO `common_project` VALUES ('3', 'LOIS ELEMET');
INSERT INTO `common_project` VALUES ('4', 'LOIS OPT_SPB');
INSERT INTO `common_project` VALUES ('5', 'LOIS OPT_SVC_REQ');
INSERT INTO `common_project` VALUES ('6', 'LOIS COMPT');
INSERT INTO `common_project` VALUES ('7', 'LOIS SVC');

-- ----------------------------
-- Table structure for `common_status`
-- ----------------------------
DROP TABLE IF EXISTS `common_status`;
CREATE TABLE `common_status` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Status ID',
  `stype` varchar(30) NOT NULL COMMENT 'Status type',
  PRIMARY KEY (`sid`),
  KEY `STYPE` (`stype`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_status
-- ----------------------------
INSERT INTO `common_status` VALUES ('2', 'Draft');
INSERT INTO `common_status` VALUES ('4', 'Final');
INSERT INTO `common_status` VALUES ('1', 'Initial');
INSERT INTO `common_status` VALUES ('3', 'RFR');

-- ----------------------------
-- Table structure for `common_user`
-- ----------------------------
DROP TABLE IF EXISTS `common_user`;
CREATE TABLE `common_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `UPWD` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `active` tinyint(4) NOT NULL COMMENT '0:inactive,1:active',
  `group` varchar(20) NOT NULL,
  `project` varchar(20) DEFAULT NULL,
  `local` varchar(30) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1.admin  2.user',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_user
-- ----------------------------
INSERT INTO `common_user` VALUES ('1', '96e79218965eb72c92a549dd5a330112', '1111', 'asdsa', '1', 'IAL', '', '2100', 'admin', '1');
INSERT INTO `common_user` VALUES ('2', '96e79218965eb72c92a549dd5a330112', '123@163.com', 'title', '1', 'LOIS', 'LOIS TBG/IPG', 'localhsot', 'user1', '1');
INSERT INTO `common_user` VALUES ('3', '96e79218965eb72c92a549dd5a330112', 'user2@163.com', 'svc', '1', 'CTO', 'LOIS OPT/SVC', '12212', 'user2', '2');
INSERT INTO `common_user` VALUES ('4', '96e79218965eb72c92a549dd5a330112', 'user3@163.com', 'element', '1', 'LOIS', 'LOIS Element', 'sdfdsf', 'user3', '2');
INSERT INTO `common_user` VALUES ('5', '96e79218965eb72c92a549dd5a330112', 'asdsad@163.cn', '', '1', 'LOIS', 'LOIS TBG/IPG', '', 'aaa', '2');

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `FileID` int(11) NOT NULL AUTO_INCREMENT,
  `UniqueName` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `FileExt` varchar(5) DEFAULT NULL,
  `FileCategoryId` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CreatedByUserId` int(11) DEFAULT NULL,
  `CreatedDtTime` timestamp NULL DEFAULT NULL,
  `UpdatedByUserId` int(11) DEFAULT NULL,
  `UpdatedDtTime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`FileID`)
) ENGINE=MyISAM AUTO_INCREMENT=1496 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('28', '20100909172320', 'WW_DATA_Loadsheet_07-21.csv', 'csv', '29', '1', '83', '2010-09-09 17:23:20', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('29', '20100912022707', 'Profile Snapshot.doc', 'doc', '30', '1', '83', '2010-09-12 02:27:07', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('15', '20100908171818', '', '', '16', '1', '83', '2010-09-08 17:18:18', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('11', 'Active_Ann_Aug 02 2010_20100901174617xls', 'Active_Ann_Aug 02 2010.xls', 'xls', '12', '1', '83', '2010-09-01 17:46:17', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('33', '20100916224107', 'Profile Snapshot.doc', 'doc', '35', '1', '83', '2010-09-16 22:41:07', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('32', '20100913222033', 'test.doc', 'doc', '34', '1', '84', '2010-09-13 22:20:33', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('27', '20100909170528', 'Profile Snapshot.doc', 'doc', '28', '1', '83', '2010-09-09 17:05:28', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('34', '20100922014627', 'BITSO_Tickets.xls', 'xls', '36', '1', '27', '2010-09-22 01:46:27', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('37', '20100928203808', 'Corelistcleanup_09222010.xls', 'xls', '39', '1', '52', '2010-09-28 20:38:08', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('38', '20100928205405', 'Lenovo Balint Reports3_UNSPSC.xls', 'xls', '40', '1', '52', '2010-09-28 20:54:05', '0', '0000-00-00 00:00:00');
INSERT INTO `files` VALUES ('44', '20101006203934', 'Topseller_audience_cvar_10062010.xlsx', 'xlsx', '46', '1', '52', '2010-10-06 20:39:34', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ial_bpl_list`
-- ----------------------------
DROP TABLE IF EXISTS `ial_bpl_list`;
CREATE TABLE `ial_bpl_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IAL_NO` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `Product_Name` varchar(50) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `type_of_IAL` varchar(20) DEFAULT NULL,
  `comment` text,
  `RTM` date DEFAULT NULL,
  `AD` date DEFAULT NULL,
  `EOW` date DEFAULT NULL,
  `BPL_NO` varchar(50) DEFAULT NULL,
  `ODT` varchar(50) DEFAULT NULL,
  `warranty` varchar(50) DEFAULT NULL,
  `US_part_NO` text,
  `Fru_Part_NO` text,
  `relayware` int(2) DEFAULT NULL,
  `somo` varchar(10) DEFAULT NULL,
  `MTM` int(2) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_bpl_list
-- ----------------------------
INSERT INTO `ial_bpl_list` VALUES ('1', '6', 'sssssssss', '56', '', null, 'tyui', '2015-05-17', '2015-05-13', '2015-05-02', '', '77', null, 'tyui', 'yutyui', '0', ' ', '0', '2015-05-02');

-- ----------------------------
-- Table structure for `ial_category1`
-- ----------------------------
DROP TABLE IF EXISTS `ial_category1`;
CREATE TABLE `ial_category1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_category1
-- ----------------------------
INSERT INTO `ial_category1` VALUES ('1', '1118');
INSERT INTO `ial_category1` VALUES ('2', '789');
INSERT INTO `ial_category1` VALUES ('3', '1234');

-- ----------------------------
-- Table structure for `ial_category2`
-- ----------------------------
DROP TABLE IF EXISTS `ial_category2`;
CREATE TABLE `ial_category2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ic_id` int(11) NOT NULL,
  `nc_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_category2
-- ----------------------------
INSERT INTO `ial_category2` VALUES ('1', '1', '222');
INSERT INTO `ial_category2` VALUES ('2', '1', '456789');
INSERT INTO `ial_category2` VALUES ('3', '2', '567888888888');
INSERT INTO `ial_category2` VALUES ('4', '2', '789');

-- ----------------------------
-- Table structure for `ial_common_bpl_relayware`
-- ----------------------------
DROP TABLE IF EXISTS `ial_common_bpl_relayware`;
CREATE TABLE `ial_common_bpl_relayware` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `relayware` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_common_bpl_relayware
-- ----------------------------

-- ----------------------------
-- Table structure for `ial_common_brand`
-- ----------------------------
DROP TABLE IF EXISTS `ial_common_brand`;
CREATE TABLE `ial_common_brand` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_common_brand
-- ----------------------------
INSERT INTO `ial_common_brand` VALUES ('4', '123452345');
INSERT INTO `ial_common_brand` VALUES ('5', '12345');
INSERT INTO `ial_common_brand` VALUES ('6', '9876543');
INSERT INTO `ial_common_brand` VALUES ('7', '123');
INSERT INTO `ial_common_brand` VALUES ('8', 'ttttttttttt');
INSERT INTO `ial_common_brand` VALUES ('9', '帇4');

-- ----------------------------
-- Table structure for `ial_common_status`
-- ----------------------------
DROP TABLE IF EXISTS `ial_common_status`;
CREATE TABLE `ial_common_status` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `stype` varchar(255) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_common_status
-- ----------------------------
INSERT INTO `ial_common_status` VALUES ('1', 'sssssssss');
INSERT INTO `ial_common_status` VALUES ('2', '11111');
INSERT INTO `ial_common_status` VALUES ('3', 'eeeeeeeeeeee');

-- ----------------------------
-- Table structure for `ial_common_subseries`
-- ----------------------------
DROP TABLE IF EXISTS `ial_common_subseries`;
CREATE TABLE `ial_common_subseries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_series` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_common_subseries
-- ----------------------------
INSERT INTO `ial_common_subseries` VALUES ('1', 'qqqqqqqq');
INSERT INTO `ial_common_subseries` VALUES ('2', '123456');

-- ----------------------------
-- Table structure for `ial_family`
-- ----------------------------
DROP TABLE IF EXISTS `ial_family`;
CREATE TABLE `ial_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Family_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_family
-- ----------------------------
INSERT INTO `ial_family` VALUES ('1', '123');
INSERT INTO `ial_family` VALUES ('2', '1235');
INSERT INTO `ial_family` VALUES ('3', '11111111111111111111111111111111111111111111111111');

-- ----------------------------
-- Table structure for `ial_history`
-- ----------------------------
DROP TABLE IF EXISTS `ial_history`;
CREATE TABLE `ial_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ial_id` int(11) DEFAULT NULL,
  `ial_decide` varchar(20) DEFAULT NULL,
  `change_user` varchar(20) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `oper` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_history
-- ----------------------------
INSERT INTO `ial_history` VALUES ('1', '3', '5', 'admin', '2015-05-12 10:56:05', 'update');
INSERT INTO `ial_history` VALUES ('2', '3', '5', 'admin', '2015-05-12 10:56:15', 'update');
INSERT INTO `ial_history` VALUES ('3', '1', '5', 'admin', '2015-05-12 10:56:26', 'update');
INSERT INTO `ial_history` VALUES ('4', '1', '5', 'admin', '2015-05-12 10:58:43', 'update');
INSERT INTO `ial_history` VALUES ('5', '1', '5', 'admin', '2015-05-12 11:12:24', 'update');
INSERT INTO `ial_history` VALUES ('6', '1', '5', 'admin', '2015-05-12 11:12:29', 'update');
INSERT INTO `ial_history` VALUES ('7', '1', '5', 'admin', '2015-05-12 11:13:21', 'update');
INSERT INTO `ial_history` VALUES ('8', '1', '5', 'admin', '2015-05-12 12:13:35', 'update');
INSERT INTO `ial_history` VALUES ('9', null, null, 'admin', '2015-05-13 03:40:23', 'add');
INSERT INTO `ial_history` VALUES ('10', '4', '5', 'admin', '2015-05-13 03:43:21', 'update');
INSERT INTO `ial_history` VALUES ('11', '4', '5', 'admin', '2015-05-13 03:43:42', 'update');
INSERT INTO `ial_history` VALUES ('12', null, null, 'admin', '2015-05-13 04:08:46', 'add');
INSERT INTO `ial_history` VALUES ('13', null, null, 'admin', '2015-05-13 04:56:16', 'add');
INSERT INTO `ial_history` VALUES ('14', null, null, 'admin', '2015-05-13 05:02:40', 'add');
INSERT INTO `ial_history` VALUES ('15', null, null, 'admin', '2015-05-13 05:09:37', 'add');
INSERT INTO `ial_history` VALUES ('16', '1', '5', 'admin', '2015-05-13 05:31:32', 'update');
INSERT INTO `ial_history` VALUES ('17', '1', '5', 'admin', '2015-05-13 05:45:05', 'update');
INSERT INTO `ial_history` VALUES ('18', null, null, 'admin', '2015-05-13 05:52:39', 'add');
INSERT INTO `ial_history` VALUES ('19', '2', 'relayware', 'admin', '2015-05-13 05:55:48', 'update');
INSERT INTO `ial_history` VALUES ('20', '1', 'relayware', 'admin', '2015-05-13 05:56:14', 'update');
INSERT INTO `ial_history` VALUES ('21', null, null, 'admin', '2015-05-13 08:06:14', 'add');
INSERT INTO `ial_history` VALUES ('22', '3', 'relayware', 'admin', '2015-05-13 08:06:27', 'update');
INSERT INTO `ial_history` VALUES ('23', '3', 'relayware', 'admin', '2015-05-13 08:07:02', 'update');
INSERT INTO `ial_history` VALUES ('24', '3', 'relayware', 'admin', '2015-05-13 08:14:40', 'update');
INSERT INTO `ial_history` VALUES ('25', '3', 'relayware', 'admin', '2015-05-13 08:14:51', 'update');
INSERT INTO `ial_history` VALUES ('26', '3', 'relayware', 'admin', '2015-05-13 08:15:20', 'update');
INSERT INTO `ial_history` VALUES ('27', '1', 'pn', 'admin', '2015-05-13 08:20:13', 'add');
INSERT INTO `ial_history` VALUES ('28', '1', 'pn', 'admin', '2015-05-13 08:20:18', 'update');
INSERT INTO `ial_history` VALUES ('29', '3', 'relayware', 'admin', '2015-05-13 08:24:23', 'update');
INSERT INTO `ial_history` VALUES ('30', '3', 'relayware', 'admin', '2015-05-13 08:24:28', 'update');
INSERT INTO `ial_history` VALUES ('31', '8', '5', 'admin', '2015-05-13 08:24:44', 'update');
INSERT INTO `ial_history` VALUES ('32', '1', '5', 'admin', '2015-05-13 08:26:05', 'update');
INSERT INTO `ial_history` VALUES ('33', '1', '5', 'admin', '2015-05-13 08:26:17', 'update');
INSERT INTO `ial_history` VALUES ('34', '2', '5', 'admin', '2015-05-13 08:26:51', 'update');
INSERT INTO `ial_history` VALUES ('35', '1', '5', 'admin', '2015-05-13 08:27:08', 'update');
INSERT INTO `ial_history` VALUES ('36', '1', '5', 'admin', '2015-05-13 08:27:19', 'update');
INSERT INTO `ial_history` VALUES ('37', '1', '5', 'admin', '2015-05-13 08:30:06', 'update');
INSERT INTO `ial_history` VALUES ('38', '1', 'relayware', 'admin', '2015-05-13 08:35:30', 'update');
INSERT INTO `ial_history` VALUES ('39', '2', 'relayware', 'admin', '2015-05-13 08:35:45', 'update');
INSERT INTO `ial_history` VALUES ('40', '1', 'ial', 'admin', '2015-05-15 04:09:35', 'add');
INSERT INTO `ial_history` VALUES ('41', '1', 'ial', 'admin', '2015-05-15 04:10:31', 'update');
INSERT INTO `ial_history` VALUES ('42', '1', 'ial', 'admin', '2015-05-15 04:10:59', 'update');
INSERT INTO `ial_history` VALUES ('43', '1', 'ial', 'admin', '2015-05-15 04:18:14', 'update');
INSERT INTO `ial_history` VALUES ('44', '1', 'ial', 'admin', '2015-05-15 04:26:02', 'update');

-- ----------------------------
-- Table structure for `ial_issue`
-- ----------------------------
DROP TABLE IF EXISTS `ial_issue`;
CREATE TABLE `ial_issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ial_id` int(11) DEFAULT NULL,
  `pending` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ial_decide` varchar(20) DEFAULT NULL,
  `ca1_id` int(11) DEFAULT NULL,
  `ca2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_issue
-- ----------------------------
INSERT INTO `ial_issue` VALUES ('2', '3', '1111111111111', 'sssssssss', '5', '1', '1');
INSERT INTO `ial_issue` VALUES ('3', '3', '543', 'sssssssss', '5', '1', '1');
INSERT INTO `ial_issue` VALUES ('7', '4', 'aaaaaaaaaaaaaa11', '11111', '5', '2', '3');
INSERT INTO `ial_issue` VALUES ('8', '6', '9876543', 'sssssssss', '5', '1', '1');
INSERT INTO `ial_issue` VALUES ('39', '1', 'wwwwwwwwwwwwwwww', 'sssssssss', 'pn', '1', '1');
INSERT INTO `ial_issue` VALUES ('41', '3', 'zzzzzzzzzzz', 'sssssssss', 'relayware', '1', '1');
INSERT INTO `ial_issue` VALUES ('42', '8', '65432', 'sssssssss', '5', '1', '1');
INSERT INTO `ial_issue` VALUES ('56', '2', '22', 'sssssssss', '5', '1', '1');
INSERT INTO `ial_issue` VALUES ('59', '1', '111', 'sssssssss', '5', '1', '1');
INSERT INTO `ial_issue` VALUES ('60', '1', '9876543', 'sssssssss', 'relayware', '1', '1');
INSERT INTO `ial_issue` VALUES ('61', '2', '87654', 'sssssssss', 'relayware', '1', '1');
INSERT INTO `ial_issue` VALUES ('62', '2', '87654', 'sssssssss', 'relayware', '2', '3');

-- ----------------------------
-- Table structure for `ial_pn_main`
-- ----------------------------
DROP TABLE IF EXISTS `ial_pn_main`;
CREATE TABLE `ial_pn_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `email_subject` text,
  `Requester` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `Manual` int(2) DEFAULT NULL COMMENT '0.yes 1.no',
  `sales_org` varchar(100) DEFAULT NULL,
  `PN` text,
  `PN_quantity` int(11) DEFAULT NULL,
  `Comments` text,
  `summary` varchar(100) DEFAULT NULL,
  `team` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_pn_main
-- ----------------------------
INSERT INTO `ial_pn_main` VALUES ('1', '2015-05-31', '0000-00-00', '', '', 'sssssssss', '0', '', '', '0', '', '', null);

-- ----------------------------
-- Table structure for `ial_relayware`
-- ----------------------------
DROP TABLE IF EXISTS `ial_relayware`;
CREATE TABLE `ial_relayware` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BPL_PAL_Number` varchar(255) DEFAULT NULL,
  `Brand` varchar(255) DEFAULT NULL,
  `AD` date DEFAULT NULL,
  `Requester` varchar(255) DEFAULT NULL,
  `Description` text,
  `Upload_Date` date DEFAULT NULL,
  `Comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_relayware
-- ----------------------------
INSERT INTO `ial_relayware` VALUES ('1', '12345', 'ttttttttttt', '2015-05-12', 'poiuytr', '098765432', '2015-05-01', 'poiuytre;oiu87654');
INSERT INTO `ial_relayware` VALUES ('2', '7654', '12345', '2015-06-20', '654', '543', '2015-05-02', '654');
INSERT INTO `ial_relayware` VALUES ('3', '87654', '12345', '2015-07-26', '543', 'tre', '2015-05-02', 'trew');

-- ----------------------------
-- Table structure for `ial_task`
-- ----------------------------
DROP TABLE IF EXISTS `ial_task`;
CREATE TABLE `ial_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Record_Date` date NOT NULL,
  `IAL_number` varchar(255) NOT NULL,
  `Family_name` varchar(255) DEFAULT NULL,
  `Brand` varchar(255) DEFAULT NULL,
  `Sub_Series` varchar(255) DEFAULT NULL,
  `AD` date DEFAULT NULL,
  `EOW` date DEFAULT NULL,
  `Planner` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `RTM` date DEFAULT NULL,
  `BPL_Number` varchar(255) DEFAULT NULL,
  `BPL_Relayware` varchar(255) DEFAULT NULL,
  `Comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_task
-- ----------------------------
INSERT INTO `ial_task` VALUES ('1', '2015-05-04', 'yu', '1235', 'ttttttttttt', '123456', '2015-05-14', '2015-05-10', 'oy', 'sssssssss', '2015-05-09', 'yui', 'YES', 'yoiuytr;jhgf;hgf;hgf;;gfd');
INSERT INTO `ial_task` VALUES ('2', '2015-05-06', '9876543', '123', '12345', 'qqqqqqqq', '2015-05-14', '2015-05-21', '87654', 'sssssssss', '2015-05-31', '9876543', ' ', '9876543');
INSERT INTO `ial_task` VALUES ('3', '2015-05-02', '', '123', '12345', 'qqqqqqqq', '0000-00-00', '0000-00-00', '', 'sssssssss', '0000-00-00', '', null, '');
INSERT INTO `ial_task` VALUES ('4', '2015-05-02', '54312', '1235', 'ttttttttttt', '123456', '2015-05-14', '2015-05-15', '543', 'eeeeeeeeeeee', '2015-05-11', '6543', 'YES', 'rew');
INSERT INTO `ial_task` VALUES ('6', '0000-00-00', '', '123', '12345', 'qqqqqqqq', '0000-00-00', '0000-00-00', '', 'sssssssss', '0000-00-00', '', ' ', '');
INSERT INTO `ial_task` VALUES ('7', '0000-00-00', '', '123', '12345', 'qqqqqqqq', '0000-00-00', '0000-00-00', '', 'sssssssss', '0000-00-00', '', ' ', '');
INSERT INTO `ial_task` VALUES ('8', '0000-00-00', '', '123', '12345', 'qqqqqqqq', '0000-00-00', '0000-00-00', '', 'sssssssss', '0000-00-00', '', ' ', '');

-- ----------------------------
-- Table structure for `ial_team`
-- ----------------------------
DROP TABLE IF EXISTS `ial_team`;
CREATE TABLE `ial_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_team
-- ----------------------------

-- ----------------------------
-- Table structure for `ial_type`
-- ----------------------------
DROP TABLE IF EXISTS `ial_type`;
CREATE TABLE `ial_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ial_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ial_warranty`
-- ----------------------------
DROP TABLE IF EXISTS `ial_warranty`;
CREATE TABLE `ial_warranty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warranty_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ial_warranty
-- ----------------------------

-- ----------------------------
-- Table structure for `lois_compatibility`
-- ----------------------------
DROP TABLE IF EXISTS `lois_compatibility`;
CREATE TABLE `lois_compatibility` (
  `TASKR_DATE` date NOT NULL,
  `START_DATE` date NOT NULL,
  `COMPLETE_DATE` date NOT NULL,
  `Deadline` date NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOADSHEET` varchar(100) NOT NULL,
  `Submitter` varchar(20) NOT NULL,
  `BU` varchar(10) NOT NULL,
  `MODELCOUNT` int(11) NOT NULL,
  `USER` varchar(20) NOT NULL,
  `OWNER` varchar(20) NOT NULL,
  `PN` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) NOT NULL,
  `archive` int(10) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lois_compatibility
-- ----------------------------
INSERT INTO `lois_compatibility` VALUES ('2015-03-17', '2015-03-16', '2015-03-16', '0000-00-00', '3', '78', '78', 'dd', '678', 'aaa', '567', '67;654;hgfrref;;v;;', '', 'RFR', '1');
INSERT INTO `lois_compatibility` VALUES ('0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '4', '123', '4321', 'LBG Access', '8', 'aaa', '4321', '9', '', 'Draft', '1');
INSERT INTO `lois_compatibility` VALUES ('2015-04-17', '2015-04-15', '2015-04-13', '2015-04-17', '5', '', '', 'Service', '0', 'admin', '', '', '', 'Draft', '0');
INSERT INTO `lois_compatibility` VALUES ('0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '6', '', '', 'dd', '0', 'admin', '', '', '[\"a.txt\"]', 'Draft', '0');
INSERT INTO `lois_compatibility` VALUES ('0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '7', '', '', 'dd', '0', 'admin', '', '', '[\"a.txt\"]', 'Draft', '0');
INSERT INTO `lois_compatibility` VALUES ('0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '8', '', '', 'dd', '0', 'admin', '', '', '[\"qqqq.txt\"]', 'Draft', '0');
INSERT INTO `lois_compatibility` VALUES ('0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '9', '', '', 'dd', '0', 'admin', '', '', '[\"qwewq.txt\"]', 'Draft', '0');

-- ----------------------------
-- Table structure for `lois_element`
-- ----------------------------
DROP TABLE IF EXISTS `lois_element`;
CREATE TABLE `lois_element` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CSR_Version` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Receive_Date` date NOT NULL,
  `Type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AD` date DEFAULT NULL,
  `DeadLine` date DEFAULT NULL,
  `Count` int(11) DEFAULT NULL,
  `Status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Owner` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `archive` int(5) DEFAULT '0',
  `Drr_Complete_Date` date DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`,`CSR_Version`),
  KEY `Project_Name` (`project_name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lois_element
-- ----------------------------
INSERT INTO `lois_element` VALUES ('14', 'LOIS SVC', '', '0000-00-00', 'update', '0000-00-00', '0000-00-00', '0', 'Draft', '', '0', null, null);
INSERT INTO `lois_element` VALUES ('15', 'LOIS TBG/IPG', '', '0000-00-00', 'update', '0000-00-00', '0000-00-00', '0', 'Draft', '', '0', null, null);

-- ----------------------------
-- Table structure for `lois_ep_req`
-- ----------------------------
DROP TABLE IF EXISTS `lois_ep_req`;
CREATE TABLE `lois_ep_req` (
  `Deadline` date DEFAULT NULL,
  `BU` varchar(50) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RequestDate` date DEFAULT NULL,
  `CompletionDate` date DEFAULT NULL,
  `ModelCount` int(11) DEFAULT NULL,
  `DataSpecialist` varchar(500) DEFAULT NULL,
  `Request` varchar(200) DEFAULT NULL,
  `Requestor` varchar(20000) DEFAULT NULL,
  `Owner` varchar(40) DEFAULT NULL,
  `PN` varchar(20000) DEFAULT NULL,
  `Subject` varchar(200) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `archive` int(10) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7528 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lois_ep_req
-- ----------------------------

-- ----------------------------
-- Table structure for `lois_opt`
-- ----------------------------
DROP TABLE IF EXISTS `lois_opt`;
CREATE TABLE `lois_opt` (
  `OPTID` int(11) NOT NULL AUTO_INCREMENT,
  `Deadline` date DEFAULT NULL,
  `OPT_EOW` date DEFAULT NULL,
  `OPT_AD` date DEFAULT NULL,
  `TASKR_DATE` date DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `DRR_DATE` date DEFAULT NULL,
  `CK_DRR_DATE` date DEFAULT NULL,
  `COMPLETE_DATE` date DEFAULT NULL,
  `BU` varchar(10) DEFAULT NULL,
  `IAL_NO` int(5) unsigned zerofill DEFAULT NULL,
  `VERSION` varchar(50) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL,
  `MODELCOUNT` int(11) DEFAULT NULL,
  `USER` varchar(50) DEFAULT NULL,
  `REQUESTER` varchar(55) DEFAULT NULL,
  `STATUS` varchar(44) DEFAULT NULL,
  `IMG` varchar(20) DEFAULT NULL,
  `OWNER` varchar(33) DEFAULT NULL,
  `PN` varchar(20000) DEFAULT NULL,
  `new_element_name` varchar(50) DEFAULT NULL,
  `archive` int(10) DEFAULT '0',
  PRIMARY KEY (`OPTID`),
  KEY `OPT_AD` (`OPT_AD`),
  KEY `OPT_EOW` (`OPT_EOW`),
  KEY `IAL_NO` (`IAL_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=634 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lois_opt
-- ----------------------------
INSERT INTO `lois_opt` VALUES ('8', '2015-03-04', '0000-00-00', '2013-07-30', '2013-06-17', '2013-06-17', '2013-06-21', '2013-07-01', '2013-07-01', 'dd', '61198', 'A3', 'update', '26', 'aaa', 'Caro Liu', 'Final', 'yes', '', '', '', '1');
INSERT INTO `lois_opt` VALUES ('9', '0000-00-00', null, '2013-07-09', '2013-06-19', '2013-06-19', '2013-06-21', '2013-06-26', '2013-06-26', '', '60890', 'A5', 'New Announcement', '2', 'Olivia', 'Bob Zhou', 'Final', null, '', '', null, '1');
INSERT INTO `lois_opt` VALUES ('10', '0000-00-00', null, '2013-07-09', '2013-06-19', '2013-06-19', '2013-06-21', '2013-06-28', '2013-06-28', '', '60972', 'A3', 'New Announcement', '2', 'Olivia', 'Bob Zhou', 'Final', null, '', '', null, '1');
INSERT INTO `lois_opt` VALUES ('11', '0000-00-00', '0000-00-00', '2013-07-09', '2013-06-28', '2013-06-28', '2013-07-04', '2013-07-08', '2013-07-08', 'LBG Access', '60741', 'A4', 'update', '1', 'admin', 'Jan Solar', 'Final', 'yes', 'Jana/Shelia/Jan', '', '', '1');
INSERT INTO `lois_opt` VALUES ('12', '2015-03-23', '2015-04-03', '2015-04-13', '2013-06-28', '2015-04-18', '2015-03-23', '2015-04-04', '2015-04-03', 'LBG Access', '60742', 'A4', 'update', '18', 'admin', 'Jan Solar', 'Final', 'yes', 'Jana/Shelia/Jan', '', '', '0');
INSERT INTO `lois_opt` VALUES ('13', '0000-00-00', null, '2013-07-16', '2013-07-04', '2013-07-04', '2013-07-08', '2013-07-15', '2013-07-15', '', '61350', ' A6 ', 'New Announcement', '1', 'Olivia', 'Bob Zhou', 'Final', null, 'Bob Zhou', '', null, '0');
INSERT INTO `lois_opt` VALUES ('14', '0000-00-00', null, '2013-07-16', '2013-07-04', '2013-07-04', '2013-07-10', '2013-07-16', '2013-07-16', '', '61504', ' A2 ', 'New Announcement', '2', 'Olivia', 'Xuesong Wang', 'Final', null, 'Shelia/Zhang Shen/Xuesong Wang', '', null, '0');
INSERT INTO `lois_opt` VALUES ('15', '0000-00-00', null, '0000-00-00', '2013-07-10', '2013-07-12', '0000-00-00', '0000-00-00', '2013-07-13', '', '60270', ' A3 ', 'Modification', '4', 'Olivia', '', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('16', '0000-00-00', null, '0000-00-00', '2013-07-10', '2013-07-12', '0000-00-00', '0000-00-00', '2013-07-13', '', '61360', ' A2 ', 'Modification', '1', 'Olivia', '', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('17', '0000-00-00', null, '2013-07-30', '2013-07-11', '2013-07-11', '2013-07-12', '2013-07-15', '2013-07-15', '', '60720', ' A5 ', 'New Announcement', '1', 'Olivia', 'Jan Solar', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('18', '0000-00-00', null, '2013-08-06', '2013-07-17', '2013-07-17', '2013-07-22', '2013-07-23', '2013-07-23', '', '61599', ' A3 ', 'New Announcement', '2', 'Olivia', 'Angie Chen', 'Final', null, 'Amy/Eric Zhang/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('19', '0000-00-00', null, '2013-08-06', '2013-07-17', '2013-07-17', '2013-07-19', '2013-07-22', '2013-07-22', '', '60689', ' A3 ', 'New Announcement', '21', 'Olivia', 'Jan Solar', ' Final ', null, 'Shelia/Jan Solor', '', null, '0');
INSERT INTO `lois_opt` VALUES ('20', '0000-00-00', null, '2013-08-13', '2013-07-23', '2013-07-23', '2013-07-23', '2013-07-23', '2013-07-23', '', '61693', ' A2 ', 'New Announcement', '2', 'Olivia', 'Angie Chen', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('21', '0000-00-00', null, '2013-07-16', '2013-07-23', '2013-07-23', '2013-07-24', '2013-07-24', '2013-07-24', '', '61505', ' A4 ', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('22', '0000-00-00', null, '2013-07-30', '2013-07-26', '2013-07-26', '2013-07-30', '2013-07-30', '2013-07-30', '', '61494', ' A3 ', 'New Announcement', '4', 'Olivia', 'Zhang ZX5', 'Final', null, 'Zixuan ZX5 Zhang', '', null, '0');
INSERT INTO `lois_opt` VALUES ('23', '0000-00-00', null, '2013-08-13', '2013-07-31', '2013-07-31', '2013-08-08', '2013-08-09', '2013-08-09', '', '61562', ' A4 ', 'New Announcement', '1', 'Olivia', 'Bill Liang8 Zhang', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('24', '0000-00-00', null, '2013-09-10', '2013-08-21', '2013-08-19', '2013-08-21', '2013-08-22', '2013-08-22', '', '61372', 'A2', 'New Announcement', '1', 'Olivia', 'Jan Solar', 'Final', null, 'Jan Solar', '', null, '0');
INSERT INTO `lois_opt` VALUES ('25', '0000-00-00', null, '2013-09-10', '2013-08-21', '2013-08-19', '2013-08-21', '2013-08-21', '2013-08-21', '', '61482', 'A3', 'New Announcement', '3', 'Olivia', 'Mattney Beck', 'Final', null, 'Mattney Beck', '', null, '0');
INSERT INTO `lois_opt` VALUES ('26', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-23', '2013-08-30', '2013-08-30', '2013-08-30', '', '61923', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('27', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-23', '2013-09-02', '2013-09-02', '2013-09-02', '', '61924', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('28', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-23', '2013-08-30', '2013-08-30', '2013-08-30', '', '61925', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('29', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-23', '2013-09-04', '2013-09-04', '2013-09-04', '', '61905', 'A3', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('30', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-23', '2013-08-30', '2013-08-30', '2013-08-30', '', '61909', 'A3', 'New Announcement', '3', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('31', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-23', '2013-08-30', '2013-08-30', '2013-08-30', '', '61910', 'A2', 'New Announcement', '3', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('32', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-24', '2013-08-30', '2013-08-30', '2013-08-30', '', '61911', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('33', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-24', '2013-08-26', '2013-08-26', '2013-08-26', '', '61917', 'A3', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('34', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-24', '2013-08-26', '2013-08-26', '2013-08-26', '', '61957', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen', '', null, '0');
INSERT INTO `lois_opt` VALUES ('35', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-24', '2013-08-26', '2013-08-26', '2013-08-26', '', '61920', 'A2', 'New Announcement', '2', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen', '', null, '0');
INSERT INTO `lois_opt` VALUES ('36', '0000-00-00', null, '2013-09-10', '2013-08-20', '2013-08-25', '2013-08-26', '2013-08-26', '2013-08-26', '', '61915', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('37', '0000-00-00', null, '2013-09-24', '2013-08-20', '2013-08-29', '2013-09-04', '2013-09-04', '2013-09-05', '', '61837', 'A3', 'New Announcement', '5', 'Olivia', 'Fang Feng', 'Final', null, 'Feng Fang/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('38', '0000-00-00', null, '2013-09-17', '2013-08-20', '2013-08-29', '2013-09-04', '2013-09-05', '2013-09-05', '', '61841', 'A4', 'New Announcement', '3', 'Olivia', 'Fang Feng', 'Final', null, 'Feng Fang/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('39', '0000-00-00', null, '2013-09-17', '2013-08-27', '2013-08-30', '2013-09-04', '2013-09-04', '2013-09-04', '', '61906', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('40', '0000-00-00', null, '2013-09-24', '2013-09-04', '2013-09-03', '0000-00-00', '0000-00-00', '2013-09-03', '', '61966', 'A3', 'VLH', '1', 'Olivia', '', 'Final', null, '', '', null, '0');
INSERT INTO `lois_opt` VALUES ('41', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-03', '2013-09-06', '2013-09-06', '2013-09-06', '', '61995', 'A2', 'New Announcement', '14', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('42', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-03', '2013-09-06', '2013-09-06', '2013-09-06', '', '61996', 'A2', 'New Announcement', '14', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('43', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-03', '2013-09-06', '2013-09-06', '2013-09-06', '', '61997', 'A2', 'New Announcement', '14', 'Olivia', 'Angie Chen', 'Final', null, 'Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('44', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-04', '2013-09-06', '2013-09-06', '2013-09-06', '', '62020', 'A2', 'New Announcement', '10', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('45', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-04', '2013-09-06', '2013-09-06', '2013-09-06', '', '62021', 'A2', 'New Announcement', '2', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('46', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-05', '2013-09-06', '2013-09-06', '2013-09-06', '', '62022', 'A2', 'New Announcement', '4', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('47', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-05', '2013-09-06', '2013-09-06', '2013-09-06', '', '62023', 'A2', 'New Announcement', '2', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('48', '0000-00-00', null, '2013-09-24', '2013-09-03', '2013-09-05', '2013-09-06', '2013-09-06', '2013-09-06', '', '62024', 'A2', 'New Announcement', '1', 'Olivia', 'Angie Chen', 'Final', null, 'Angie Chen/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('49', '0000-00-00', null, '2013-09-17', '2013-09-03', '2013-09-06', '0000-00-00', '0000-00-00', '2013-09-06', '', '61672', 'A6', 'Not for Announce', '1', 'Olivia', '', 'Final', null, 'Bob Zhou/Shelia', '', null, '0');
INSERT INTO `lois_opt` VALUES ('50', '0000-00-00', null, '2013-09-17', '2013-09-11', '2013-09-10', '2013-09-11', '2013-09-11', '2013-09-11', '', '62029', 'A5', 'Not for Announce', '1', 'Olivia', 'Jan Solar', 'Final', null, 'Jan Solar/Shelia', '', null, '0');

-- ----------------------------
-- Table structure for `lois_opt_spb`
-- ----------------------------
DROP TABLE IF EXISTS `lois_opt_spb`;
CREATE TABLE `lois_opt_spb` (
  `TID` int(11) NOT NULL AUTO_INCREMENT,
  `Deadline` date NOT NULL,
  `TASKR_DATE` date NOT NULL,
  `START_DATE` date NOT NULL,
  `COMPLETE_DATE` date NOT NULL,
  `EntityID` int(11) NOT NULL,
  `MODELCOUNT` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `USER` varchar(20) NOT NULL,
  `OWNER` varchar(20) NOT NULL,
  `archive` int(10) DEFAULT '0',
  PRIMARY KEY (`TID`),
  KEY `EntityID` (`EntityID`)
) ENGINE=MyISAM AUTO_INCREMENT=3184 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lois_opt_spb
-- ----------------------------

-- ----------------------------
-- Table structure for `lois_svc`
-- ----------------------------
DROP TABLE IF EXISTS `lois_svc`;
CREATE TABLE `lois_svc` (
  `SVCID` int(11) NOT NULL AUTO_INCREMENT,
  `Deadline` date DEFAULT NULL,
  `EOW` date DEFAULT NULL,
  `AD` date DEFAULT NULL,
  `TASKR_DATE` date DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `COMPLETE_DATE` date DEFAULT NULL,
  `Loadsheet` varchar(100) DEFAULT NULL,
  `Submitter` varchar(20) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `MODEL_COUNT` int(11) DEFAULT NULL,
  `USER` varchar(30) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `OWNER` varchar(11) DEFAULT NULL,
  `PN` varchar(20000) DEFAULT NULL,
  `new_element_name` varchar(50) DEFAULT NULL,
  `archive` int(10) DEFAULT '0',
  PRIMARY KEY (`SVCID`)
) ENGINE=MyISAM AUTO_INCREMENT=1858 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lois_svc
-- ----------------------------

-- ----------------------------
-- Table structure for `old_tickets`
-- ----------------------------
DROP TABLE IF EXISTS `old_tickets`;
CREATE TABLE `old_tickets` (
  `Ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ProblemSummary` varchar(90) NOT NULL,
  `DateReported` date NOT NULL,
  `PersonReported` varchar(90) NOT NULL,
  `Source` varchar(90) NOT NULL,
  `ProdState` set('Post','Pre','LOIS') NOT NULL DEFAULT 'Post',
  `AssignTo` varchar(90) DEFAULT NULL,
  `RefNum` varchar(50) DEFAULT NULL,
  `Geos` varchar(30) NOT NULL,
  `Family` varchar(30) NOT NULL,
  `ProdType` varchar(30) NOT NULL,
  `DataArea` varchar(30) NOT NULL,
  `Severity` text NOT NULL,
  `ImpactSize` varchar(50) DEFAULT NULL,
  `SystemDate` date NOT NULL,
  `ProblemDetails` varchar(700) DEFAULT NULL,
  `FileID` int(11) NOT NULL,
  `ProblemState` text NOT NULL,
  `LogState` varchar(700) NOT NULL,
  `Status` varchar(700) NOT NULL,
  `DateFixed` date DEFAULT NULL,
  `OverrideStatusColor` text COMMENT 'Override Status Color',
  `RCValues` varchar(100) NOT NULL,
  `DateClosed` date DEFAULT NULL,
  `AddInfo` varchar(200) NOT NULL,
  `Author` varchar(90) NOT NULL,
  PRIMARY KEY (`Ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1473 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of old_tickets
-- ----------------------------

-- ----------------------------
-- Table structure for `peissue`
-- ----------------------------
DROP TABLE IF EXISTS `peissue`;
CREATE TABLE `peissue` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL COMMENT '对应表tickets表的id',
  `pending` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT '状态',
  `pro_id` int(11) NOT NULL,
  `ca1_id` int(11) NOT NULL,
  `ca2_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=882 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of peissue
-- ----------------------------

-- ----------------------------
-- Table structure for `project_attach`
-- ----------------------------
DROP TABLE IF EXISTS `project_attach`;
CREATE TABLE `project_attach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL COMMENT 'common_pro 的id',
  `attachment` varchar(50) DEFAULT NULL COMMENT '附件',
  `pr_name` varchar(50) DEFAULT NULL COMMENT 'common_pro 的pname',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_attach
-- ----------------------------
INSERT INTO `project_attach` VALUES ('9', '1', 'qqqq.txt', 'LOIS TBG/IPG');
INSERT INTO `project_attach` VALUES ('10', '1', 'qwewq.txt', 'LOIS TBG/IPG');
INSERT INTO `project_attach` VALUES ('11', '1', 'qwewq.txt', 'LOIS TBG/IPG');

-- ----------------------------
-- Table structure for `request_type`
-- ----------------------------
DROP TABLE IF EXISTS `request_type`;
CREATE TABLE `request_type` (
  `rqid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Request ID',
  `rqtype` varchar(30) NOT NULL COMMENT 'Request Type',
  PRIMARY KEY (`rqid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of request_type
-- ----------------------------
INSERT INTO `request_type` VALUES ('1', 'update');
INSERT INTO `request_type` VALUES ('2', 'add');
INSERT INTO `request_type` VALUES ('3', 'delete');
INSERT INTO `request_type` VALUES ('4', 'all');
INSERT INTO `request_type` VALUES ('5', 'yes');
INSERT INTO `request_type` VALUES ('6', 'zcszczx1111');

-- ----------------------------
-- Table structure for `tickets`
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family` varchar(50) NOT NULL,
  `deadline` date DEFAULT NULL,
  `ann_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `Drr_date` date DEFAULT NULL,
  `Drr_received` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `request_type` varchar(11) NOT NULL,
  `POR_Version` varchar(100) NOT NULL,
  `received_date` date DEFAULT NULL,
  `brand` varchar(20) NOT NULL,
  `model_count` int(20) DEFAULT NULL,
  `IAL_NO` varchar(20) DEFAULT NULL,
  `MT_NO` varchar(50) DEFAULT NULL,
  `Data_Specialist` varchar(50) NOT NULL,
  `Planner` varchar(50) DEFAULT NULL,
  `Owner` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Work_flow_Instance_Name` varchar(50) DEFAULT NULL,
  `Drr_Reply` varchar(20) DEFAULT NULL,
  `PN` text,
  `EOW` date DEFAULT NULL,
  `Drr_No` varchar(50) NOT NULL,
  `Action` set('New MT','Refresh','Modify') DEFAULT NULL,
  `archive` int(11) DEFAULT NULL,
  `Drr_Complete_Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1928 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('24', 'TP X230 Tablet', '2013-07-02', '2013-07-02', '2013-06-25', '2013-06-25', '2013-06-25', '2013-06-25', 'update', 'Comet 2.0 POR 2013.06.24', '2013-06-25', 'NB', '1', '61415 ', '3437 ', 'aaa', 'Thomas Masich', '', 'Draft', '', '', '34373RK', '0000-00-00', '', 'New MT', null, null);
INSERT INTO `tickets` VALUES ('25', 'TP Helix', '2013-07-02', '2013-07-02', '2013-06-26', '0000-00-00', '0000-00-00', '2013-06-26', 'update', 'Prince 1 0 POR 2013.06.10', '2013-06-25', 'NB', '13', '61411 ', '369737013702 ', 'Lynn', '', '', 'Draft', '', '', '1111;2222;33333;4444;555;6666;777', '0000-00-00', '', 'New MT', null, null);
INSERT INTO `tickets` VALUES ('26', 'TP X1 Carbon', '2013-07-02', '2013-07-02', '2013-06-26', '0000-00-00', '0000-00-00', '2013-06-26', 'Refresh', 'Genesis 1 0 POR 2013.06.19', '2013-06-25', 'NB', '17', '61373 ', '34433448 ', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('27', 'TP T430S', '2013-07-02', '2013-07-02', '2013-06-26', '0000-00-00', '0000-00-00', '2013-06-26', 'Refresh', 'Shinai 4.0 POR 2013.06.12', '2013-06-25', 'NB', '35', '61417 ', '23532355 ', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('28', 'TP T431', '2013-07-02', '2013-07-02', '2013-06-26', '0000-00-00', '0000-00-00', '2013-06-26', 'Refresh', 'Santana 1.0 POR 2013-06-20', '2013-06-25', 'NB', '25', '61420 ', '20AA', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('29', 'TPE S531', '2013-07-02', '2013-07-02', '2013-06-27', '0000-00-00', '0000-00-00', '2013-06-27', 'Refresh', 'Guinness 1.0 PORModelReport_201306270037', '2013-06-25', 'NB', '15', '61015 ', '20B0', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('30', 'TP T430', '2013-07-02', '2013-07-02', '2013-06-28', '0000-00-00', '0000-00-00', '2013-06-28', 'Refresh', 'Nozomi 4.0 POR 20130612', '2013-06-25', 'NB', '178', '61414 ', '2342234423472340 ', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('31', 'Tablet TP Tab2', '0000-00-00', '2013-07-02', '2013-07-02', '0000-00-00', '0000-00-00', '2013-07-02', 'Refresh', 'Coltrane 1 0 POR 2013 06 13', '2013-07-02', 'NB', '3', '61410 ', '3682 ', 'Lynn', '', 'Britt Davis', 'Final', '', '36824TJ', '36824SJ', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('32', 'TP L430', '2013-07-16', '2013-07-16', '2013-07-02', '0000-00-00', '0000-00-00', '2013-07-03', 'Refresh', 'Cardiff 1 POR 20130617', '2013-07-02', 'NB', '46', '61432 ', '2468 ', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('33', 'TP X230', '2013-07-02', '2013-07-02', '2013-07-02', '0000-00-00', '0000-00-00', '2013-07-02', 'Refresh', 'Dasher 2 POR 2013.06.18', '2013-07-02', 'NB', '103', '61416 ', '23062320 ', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('34', 'TC M93Z', '2013-07-09', '2013-07-23', '2013-07-03', '2013-07-11', '2013-07-12', '2013-07-12', 'New MT', 'Memphis 1.0_M93z_PORModelReport_201307031117  PORModelReport_201306272344.xls', '2013-07-03', 'DT', '187', '61525/61531', '10AC', 'Lynn', 'Ziyu', 'Ziyu;Shelia', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('35', 'TC M93P', '2013-07-02', '2013-07-09', '2013-07-03', '0000-00-00', '0000-00-00', '2013-07-03', 'New MT', 'Mississippi PORModelReport_20130619', '2013-07-03', 'DT', '408', '61159 ', '10A4,10AA,10AB', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('36', 'TC M93P', '2013-07-09', '2013-07-09', '2013-07-03', '0000-00-00', '0000-00-00', '2013-07-03', 'Refresh', 'Mississippi PORModelReport_20130628', '2013-07-03', 'DT', '233', '61433 ', '10A6,10A7.10A8,10AA,10AB', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('37', 'TP X1 Carbon', '2013-07-09', '2013-07-09', '2013-07-03', '0000-00-00', '0000-00-00', '2013-07-03', 'Refresh', 'Genesis 1 0 POR 2013.06.26', '2013-07-03', 'NB', '3', '61509 ', '3444 ', 'Lynn', '', '', 'Final ', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('38', 'TC M72z', '2013-07-09', '2013-07-09', '2013-07-05', '0000-00-00', '0000-00-00', '2013-07-05', 'Refresh', 'Montego Bay Ivy POR 20130618 with BLS', '2013-07-03', 'DT', '3', '61434 ', '3554 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('39', 'TC M72e', '2013-07-09', '2013-07-09', '2013-07-05', '0000-00-00', '0000-00-00', '2013-07-05', 'Refresh', 'Moscow Ivy Tiny POR with BLS 20130619 remove Japan models as IE9', '2013-07-03', 'DT', '34', '61437 ', '400438563267 ', 'Lynn', 'Amanda', 'Amanda ', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('40', 'TC M72e', '2013-07-09', '2013-07-09', '2013-07-05', '0000-00-00', '0000-00-00', '2013-07-05', 'Refresh', 'Moscow Ivy TWR and SFF POR with BLS 20130619 remove Japan model', '2013-07-03', 'DT', '2', '61478 ', '3578 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('41', 'TC E72', '0000-00-00', '0000-00-00', '2013-07-05', '0000-00-00', '0000-00-00', '2013-08-21', 'Obsolete', 'Taipei Ivy POR 20130619 with BLS', '2013-07-03', 'DT', '10', '61423 ', '3493 ', 'Lynn', '', 'Shelia', 'Retired', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('42', 'TC G72z', '2013-07-09', '2013-07-09', '2013-07-05', '0000-00-00', '0000-00-00', '2013-07-05', 'Refresh', 'Topeka Ivy POR 20130618 with BLS', '2013-07-03', 'DT', '2', '61436 ', '3569 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('43', 'TP W530', '2013-07-02', '2013-07-02', '2013-07-08', '0000-00-00', '0000-00-00', '2013-07-08', 'Refresh', 'Kendo W530 4.0 POR 2013.06.24', '2013-06-26', 'NB', '4', '61418 ', '2441 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('44', 'TP T430U', '2013-06-04', '2013-06-04', '2013-07-08', '0000-00-00', '0000-00-00', '2013-07-08', 'Refresh', 'Abba Intel POR 2013-06-25 Official', '2013-06-25', 'NB', '206', '61119 ', '33513352 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('45', 'M92', '2013-07-09', '2013-07-09', '2013-07-08', '0000-00-00', '0000-00-00', '2013-07-08', 'Refresh', 'Manhattan POR 20130618 with BLS', '2013-07-03', 'DT', '58', '61439 ', '3229 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('46', 'TP X230T', '2013-05-07', '2013-05-07', '2013-07-08', '0000-00-00', '0000-00-00', '2013-07-08', 'Refresh', 'Comet 2.0 POR 2013.06.27', '2013-06-27', 'NB', '23', '60950 ', '3438 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('47', 'TC M93z', '2013-07-09', '2013-07-09', '2013-07-08', '0000-00-00', '0000-00-00', '2013-07-08', 'New MT', 'Memphis-1.0 PORModelReport_201305231540  PORModelReport_201306282344.xls', '2013-06-17', 'DT', '680', '60549 ', '10AC,10AD,10AE,10AF', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('48', 'TP E431', '2013-07-16', '2013-07-16', '2013-07-09', '0000-00-00', '0000-00-00', '2013-07-17', 'Refresh', 'Lion Intel POR 2013-6-20 Official', '2013-06-20', 'NB', '246', '61465 ', '62776886 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('49', 'TP E431', '2013-07-16', '2013-07-16', '2013-07-09', '0000-00-00', '0000-00-00', '2013-07-09', 'Refresh', 'Lion Intel POR 2013-6-27 Official', '2013-06-27', 'NB', '64', '61465 ', '6277 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
INSERT INTO `tickets` VALUES ('50', 'TP E531', '2013-07-16', '2013-07-16', '2013-07-09', '0000-00-00', '0000-00-00', '2013-07-16', 'Refresh', 'Grant Intel POR 2013-6-20 Offcial', '2013-06-20', 'NB', '237', '60548/61466', '6885 ', 'Lynn', '', '', 'Final', '', '', '', null, '', null, null, null);
