/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.0.67-community-nt : Database - bitso4
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bitso4` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bitso4`;

/*Table structure for table `admin_task` */

DROP TABLE IF EXISTS `admin_task`;

CREATE TABLE `admin_task` (
  `Ticket_id` int(11) NOT NULL auto_increment,
  `ProblemSummary` varchar(90) NOT NULL,
  `DateReported` date NOT NULL,
  `PersonReported` varchar(90) NOT NULL,
  `Source` varchar(90) NOT NULL,
  `ProdState` varchar(10) NOT NULL,
  `AssignTo` varchar(90) default NULL,
  `Geos` varchar(30) NOT NULL,
  `Family` varchar(30) NOT NULL,
  `DataArea` varchar(30) NOT NULL,
  `Severity` text NOT NULL,
  `ImpactSize` varchar(50) default NULL,
  `ProblemDetails` varchar(700) default NULL,
  `file_path` varchar(700) default NULL,
  `prob_state` varchar(20) default NULL,
  `dist` int(10) default NULL COMMENT '1,0',
  PRIMARY KEY  (`Ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1479 DEFAULT CHARSET=utf8;

/*Table structure for table `bugs` */

DROP TABLE IF EXISTS `bugs`;

CREATE TABLE `bugs` (
  `id` bigint(11) unsigned NOT NULL auto_increment,
  `char` varchar(40) default NULL COMMENT 'c',
  `value` text COMMENT 'v',
  `AD` date default NULL,
  `submitter` varchar(20) default NULL,
  `modifier` varchar(20) default NULL COMMENT 'New , In Progress, Done',
  `status` varchar(20) default NULL,
  `last_change` datetime default NULL,
  `create_time` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `change_history` */

DROP TABLE IF EXISTS `change_history`;

CREATE TABLE `change_history` (
  `id` int(11) NOT NULL auto_increment,
  `t_id` int(11) NOT NULL COMMENT 'tickets_id',
  `pro_id` int(20) NOT NULL COMMENT 'project_name',
  `change_user` varchar(50) NOT NULL COMMENT 'changeuser',
  `change_time` datetime NOT NULL COMMENT 'changetime',
  `oper` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

/*Table structure for table `common_action` */

DROP TABLE IF EXISTS `common_action`;

CREATE TABLE `common_action` (
  `ACID` int(11) NOT NULL COMMENT 'Action ID',
  `ACTION` varchar(30) NOT NULL COMMENT 'Action',
  PRIMARY KEY  (`ACID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `common_brand` */

DROP TABLE IF EXISTS `common_brand`;

CREATE TABLE `common_brand` (
  `bid` int(11) NOT NULL auto_increment COMMENT 'Brand ID',
  `bname` varchar(30) NOT NULL COMMENT 'Brand Name',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `common_bu` */

DROP TABLE IF EXISTS `common_bu`;

CREATE TABLE `common_bu` (
  `bu_id` int(11) NOT NULL auto_increment,
  `bu_name` varchar(50) default NULL,
  PRIMARY KEY  (`bu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `common_category1` */

DROP TABLE IF EXISTS `common_category1`;

CREATE TABLE `common_category1` (
  `id` int(11) NOT NULL auto_increment,
  `cate_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `common_category2` */

DROP TABLE IF EXISTS `common_category2`;

CREATE TABLE `common_category2` (
  `id` int(11) NOT NULL auto_increment,
  `cc_id` int(11) NOT NULL,
  `nc_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Table structure for table `common_group` */

DROP TABLE IF EXISTS `common_group`;

CREATE TABLE `common_group` (
  `gid` int(11) NOT NULL auto_increment,
  `gname` varchar(20) NOT NULL,
  PRIMARY KEY  (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `common_project` */

DROP TABLE IF EXISTS `common_project`;

CREATE TABLE `common_project` (
  `projectid` int(11) NOT NULL auto_increment,
  `pname` varchar(30) NOT NULL,
  PRIMARY KEY  (`projectid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `common_status` */

DROP TABLE IF EXISTS `common_status`;

CREATE TABLE `common_status` (
  `sid` int(11) NOT NULL auto_increment COMMENT 'Status ID',
  `stype` varchar(30) NOT NULL COMMENT 'Status type',
  PRIMARY KEY  (`sid`),
  KEY `STYPE` (`stype`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `common_user` */

DROP TABLE IF EXISTS `common_user`;

CREATE TABLE `common_user` (
  `uid` int(11) NOT NULL auto_increment,
  `UPWD` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `title` varchar(20) default NULL,
  `active` tinyint(4) NOT NULL COMMENT '0:inactive,1:active',
  `group` varchar(20) default NULL,
  `project` varchar(20) default NULL,
  `local` varchar(30) NOT NULL,
  `username` varchar(50) default NULL,
  `type` int(11) NOT NULL COMMENT '1.admin  2.user',
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `FileID` int(11) NOT NULL auto_increment,
  `UniqueName` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `FileExt` varchar(5) default NULL,
  `FileCategoryId` int(11) default NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CreatedByUserId` int(11) default NULL,
  `CreatedDtTime` timestamp NULL default NULL,
  `UpdatedByUserId` int(11) default NULL,
  `UpdatedDtTime` timestamp NULL default NULL,
  PRIMARY KEY  (`FileID`)
) ENGINE=MyISAM AUTO_INCREMENT=1496 DEFAULT CHARSET=latin1;

/*Table structure for table `ial_bpl_list` */

DROP TABLE IF EXISTS `ial_bpl_list`;

CREATE TABLE `ial_bpl_list` (
  `id` int(11) NOT NULL auto_increment,
  `IAL_NO` varchar(20) default NULL,
  `status` varchar(20) default NULL,
  `Product_Name` varchar(50) default NULL,
  `brand` varchar(20) default NULL,
  `type_of_IAL` varchar(20) default NULL,
  `comment` text,
  `RTM` date default NULL,
  `AD` date default NULL,
  `EOW` date default NULL,
  `BPL_NO` varchar(50) default NULL,
  `ODT` varchar(50) default NULL,
  `warranty` varchar(50) default NULL,
  `US_part_NO` text,
  `Fru_Part_NO` text,
  `relayware` varchar(10) default NULL,
  `somo` varchar(10) default NULL,
  `MTM` varchar(10) default NULL,
  `review_date` date default NULL,
  `User` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_category1` */

DROP TABLE IF EXISTS `ial_category1`;

CREATE TABLE `ial_category1` (
  `id` int(11) NOT NULL auto_increment,
  `cate_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_category2` */

DROP TABLE IF EXISTS `ial_category2`;

CREATE TABLE `ial_category2` (
  `id` int(11) NOT NULL auto_increment,
  `ic_id` int(11) NOT NULL,
  `nc_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_common_bpl_relayware` */

DROP TABLE IF EXISTS `ial_common_bpl_relayware`;

CREATE TABLE `ial_common_bpl_relayware` (
  `id` int(10) NOT NULL auto_increment,
  `relayware` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `ial_common_brand` */

DROP TABLE IF EXISTS `ial_common_brand`;

CREATE TABLE `ial_common_brand` (
  `bid` int(10) NOT NULL auto_increment,
  `bname` varchar(255) NOT NULL,
  `dis` varchar(30) default NULL,
  PRIMARY KEY  (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_common_status` */

DROP TABLE IF EXISTS `ial_common_status`;

CREATE TABLE `ial_common_status` (
  `sid` int(10) NOT NULL auto_increment,
  `stype` varchar(255) NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_common_subseries` */

DROP TABLE IF EXISTS `ial_common_subseries`;

CREATE TABLE `ial_common_subseries` (
  `id` int(10) NOT NULL auto_increment,
  `sub_series` varchar(50) default NULL,
  `f_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_common_summary` */

DROP TABLE IF EXISTS `ial_common_summary`;

CREATE TABLE `ial_common_summary` (
  `id` int(11) NOT NULL auto_increment,
  `summary` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `ial_family` */

DROP TABLE IF EXISTS `ial_family`;

CREATE TABLE `ial_family` (
  `id` int(11) NOT NULL auto_increment,
  `Family_name` varchar(50) default NULL,
  `bid` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_history` */

DROP TABLE IF EXISTS `ial_history`;

CREATE TABLE `ial_history` (
  `id` int(11) NOT NULL auto_increment,
  `ial_id` int(11) default NULL,
  `ial_decide` varchar(20) default NULL,
  `change_user` varchar(20) default NULL,
  `change_time` datetime default NULL,
  `oper` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_issue` */

DROP TABLE IF EXISTS `ial_issue`;

CREATE TABLE `ial_issue` (
  `id` int(11) NOT NULL auto_increment,
  `ial_id` int(11) default NULL,
  `pending` varchar(20) default NULL,
  `status` varchar(20) default NULL,
  `ial_decide` varchar(20) default NULL,
  `ca1_id` int(11) default NULL,
  `ca2_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_pn_main` */

DROP TABLE IF EXISTS `ial_pn_main`;

CREATE TABLE `ial_pn_main` (
  `id` int(11) NOT NULL auto_increment,
  `request_date` date default NULL,
  `close_date` date default NULL,
  `email_subject` varchar(100) default NULL,
  `Requester` varchar(50) default NULL,
  `status` varchar(30) default NULL,
  `Manual` varchar(10) default NULL,
  `sales_org` text,
  `PN` text,
  `PN_quantity` int(11) default NULL,
  `Comments` text,
  `summary` varchar(100) default NULL,
  `team` varchar(20) default NULL,
  `User` varchar(20) default NULL,
  `file_path` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_relayware` */

DROP TABLE IF EXISTS `ial_relayware`;

CREATE TABLE `ial_relayware` (
  `id` int(11) NOT NULL auto_increment,
  `BPL_PAL_Number` varchar(255) default NULL,
  `Brand` varchar(255) default NULL,
  `AD` date default NULL,
  `Requester` varchar(255) default NULL,
  `Description` text,
  `Upload_Date` date default NULL,
  `Comment` text,
  `User` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_task` */

DROP TABLE IF EXISTS `ial_task`;

CREATE TABLE `ial_task` (
  `id` int(11) NOT NULL auto_increment,
  `Record_Date` date NOT NULL,
  `IAL_number` varchar(255) NOT NULL,
  `Family_name` varchar(255) default NULL,
  `Brand` varchar(255) default NULL,
  `Sub_Series` varchar(255) default NULL,
  `AD` date default NULL,
  `EOW` date default NULL,
  `Planner` varchar(255) default NULL,
  `Status` varchar(255) default NULL,
  `RTM` date default NULL,
  `BPL_Number` varchar(255) default NULL,
  `BPL_Relayware` varchar(255) default NULL,
  `Comment` text,
  `User` varchar(20) default NULL,
  `Options` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_team` */

DROP TABLE IF EXISTS `ial_team`;

CREATE TABLE `ial_team` (
  `id` int(11) NOT NULL auto_increment,
  `team` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_type` */

DROP TABLE IF EXISTS `ial_type`;

CREATE TABLE `ial_type` (
  `id` int(11) NOT NULL auto_increment,
  `ial_type` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `ial_warranty` */

DROP TABLE IF EXISTS `ial_warranty`;

CREATE TABLE `ial_warranty` (
  `id` int(11) NOT NULL auto_increment,
  `warranty_type` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `lois_compatibility` */

DROP TABLE IF EXISTS `lois_compatibility`;

CREATE TABLE `lois_compatibility` (
  `TASKR_DATE` date default NULL,
  `START_DATE` date default NULL,
  `COMPLETE_DATE` date default NULL,
  `Deadline` date default NULL,
  `ID` int(11) NOT NULL auto_increment,
  `LOADSHEET` varchar(100) default NULL,
  `Submitter` varchar(20) default NULL,
  `BU` varchar(50) default NULL,
  `MODELCOUNT` int(11) default NULL,
  `USER` varchar(20) default NULL,
  `OWNER` varchar(20) default NULL,
  `PN` text,
  `file_path` varchar(50) default NULL,
  `STATUS` varchar(30) default NULL,
  `archive` int(5) default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `lois_element` */

DROP TABLE IF EXISTS `lois_element`;

CREATE TABLE `lois_element` (
  `pid` int(11) NOT NULL auto_increment,
  `project_name` varchar(50) default NULL,
  `CSR_Version` varchar(100) default NULL,
  `Receive_Date` date default NULL,
  `Type` varchar(20) default NULL,
  `AD` date default NULL,
  `DeadLine` date default NULL COMMENT 'drr_deadline',
  `Count` int(11) default NULL,
  `Status` varchar(20) default NULL,
  `Owner` varchar(30) default NULL,
  `archive` int(5) default '0' COMMENT '1.archive 0.no_archive',
  `Drr_Complete_Date` date default NULL,
  `brand` varchar(20) default NULL,
  PRIMARY KEY  (`pid`),
  KEY `Project_Name` (`project_name`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Table structure for table `lois_ep_req` */

DROP TABLE IF EXISTS `lois_ep_req`;

CREATE TABLE `lois_ep_req` (
  `Deadline` date default NULL,
  `BU` varchar(50) default NULL,
  `ID` int(11) NOT NULL auto_increment,
  `RequestDate` date default NULL,
  `CompletionDate` date default NULL,
  `ModelCount` varchar(20) default NULL,
  `DataSpecialist` varchar(50) default NULL,
  `Request` varchar(200) default NULL,
  `Requestor` varchar(50) default NULL,
  `Owner` varchar(20) default NULL,
  `PN` varchar(20000) default NULL,
  `Subject` varchar(200) default NULL,
  `status` varchar(20) default NULL,
  `archive` int(5) default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `lois_opt` */

DROP TABLE IF EXISTS `lois_opt`;

CREATE TABLE `lois_opt` (
  `OPTID` int(11) NOT NULL auto_increment COMMENT 'OPT ID',
  `Deadline` date default NULL,
  `OPT_EOW` date default NULL,
  `OPT_AD` date default NULL,
  `TASKR_DATE` date default NULL,
  `START_DATE` date default NULL,
  `DRR_DATE` date default NULL,
  `CK_DRR_DATE` date default NULL COMMENT 'Checked DRR Received',
  `COMPLETE_DATE` date default NULL,
  `BU` varchar(50) default NULL,
  `IAL_NO` int(5) unsigned zerofill default NULL,
  `VERSION` varchar(50) default NULL,
  `TYPE` varchar(50) default NULL,
  `MODELCOUNT` int(11) default NULL,
  `USER` varchar(50) default NULL COMMENT 'Data Specialist',
  `REQUESTER` varchar(30) default NULL COMMENT 'Reviewed By',
  `STATUS` varchar(20) default NULL,
  `IMG` varchar(20) default NULL,
  `OWNER` varchar(30) default NULL,
  `PN` varchar(20000) default NULL,
  `new_element_name` varchar(50) default NULL,
  `archive` int(5) default '0',
  PRIMARY KEY  (`OPTID`),
  KEY `OPT_AD` (`OPT_AD`),
  KEY `OPT_EOW` (`OPT_EOW`),
  KEY `IAL_NO` (`IAL_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `lois_opt_spb` */

DROP TABLE IF EXISTS `lois_opt_spb`;

CREATE TABLE `lois_opt_spb` (
  `TID` int(11) NOT NULL auto_increment,
  `Deadline` date default NULL,
  `TASKR_DATE` date default NULL,
  `START_DATE` date default NULL,
  `COMPLETE_DATE` date default NULL,
  `EntityID` varchar(20) default NULL COMMENT 'EntityID (Report NO.)',
  `MODELCOUNT` varchar(11) default NULL,
  `STATUS` varchar(50) default NULL,
  `USER` varchar(20) default NULL,
  `OWNER` varchar(20) default NULL,
  `archive` int(5) default '0',
  PRIMARY KEY  (`TID`),
  KEY `EntityID` (`EntityID`)
) ENGINE=InnoDB AUTO_INCREMENT=4624 DEFAULT CHARSET=utf8;

/*Table structure for table `lois_svc` */

DROP TABLE IF EXISTS `lois_svc`;

CREATE TABLE `lois_svc` (
  `SVCID` int(11) NOT NULL auto_increment,
  `Deadline` date default NULL,
  `EOW` date default NULL,
  `AD` date default NULL,
  `TASKR_DATE` date default NULL COMMENT 'Task Received Date',
  `START_DATE` date default NULL,
  `COMPLETE_DATE` date default NULL,
  `Loadsheet` varchar(100) default NULL,
  `Submitter` varchar(20) default NULL,
  `Type` varchar(20) default NULL,
  `MODEL_COUNT` int(11) default NULL,
  `USER` varchar(30) default NULL,
  `STATUS` varchar(30) default NULL,
  `OWNER` varchar(20) default NULL,
  `PN` varchar(20000) default NULL,
  `new_element_name` varchar(50) default NULL,
  `archive` int(5) default '0',
  PRIMARY KEY  (`SVCID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `mgts` */

DROP TABLE IF EXISTS `mgts`;

CREATE TABLE `mgts` (
  `id` int(11) NOT NULL auto_increment,
  `EZP` varchar(10) default NULL,
  `product` varchar(15) default NULL,
  `tables` varchar(100) default NULL,
  `table_name` varchar(30) default NULL,
  `user` varchar(15) default NULL,
  `bom_name` varchar(30) default NULL,
  `create_time` date default NULL,
  `update_time` date default NULL,
  `attachment` varchar(300) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Table structure for table `old_tickets` */

DROP TABLE IF EXISTS `old_tickets`;

CREATE TABLE `old_tickets` (
  `Ticket_id` int(11) NOT NULL auto_increment,
  `ProblemSummary` varchar(90) NOT NULL,
  `DateReported` date NOT NULL,
  `PersonReported` varchar(90) NOT NULL,
  `Source` varchar(90) NOT NULL,
  `ProdState` set('Post','Pre','LOIS') NOT NULL default 'Post',
  `AssignTo` varchar(90) default NULL,
  `RefNum` varchar(50) default NULL,
  `Geos` varchar(30) NOT NULL,
  `Family` varchar(30) NOT NULL,
  `ProdType` varchar(30) NOT NULL,
  `DataArea` varchar(30) NOT NULL,
  `Severity` text NOT NULL,
  `ImpactSize` varchar(50) default NULL,
  `SystemDate` date NOT NULL,
  `ProblemDetails` varchar(700) default NULL,
  `FileID` int(11) NOT NULL,
  `ProblemState` text NOT NULL,
  `LogState` varchar(700) NOT NULL,
  `Status` varchar(700) NOT NULL,
  `DateFixed` date default NULL,
  `OverrideStatusColor` text COMMENT 'Override Status Color',
  `RCValues` varchar(100) NOT NULL,
  `DateClosed` date default NULL,
  `AddInfo` varchar(200) NOT NULL,
  `Author` varchar(90) NOT NULL,
  PRIMARY KEY  (`Ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1473 DEFAULT CHARSET=latin1;

/*Table structure for table `peissue` */

DROP TABLE IF EXISTS `peissue`;

CREATE TABLE `peissue` (
  `p_id` int(11) NOT NULL auto_increment,
  `t_id` int(11) NOT NULL COMMENT '对应表tickets表的id',
  `pending` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT '状态',
  `pro_id` int(11) NOT NULL,
  `ca1_id` int(11) default NULL,
  `ca2_id` int(11) default NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1132 DEFAULT CHARSET=utf8;

/*Table structure for table `project_attach` */

DROP TABLE IF EXISTS `project_attach`;

CREATE TABLE `project_attach` (
  `id` int(11) NOT NULL auto_increment,
  `pro_id` int(11) default NULL COMMENT 'common_pro 的id',
  `attachment` varchar(50) character set utf8 default NULL COMMENT '附件',
  `pr_name` varchar(50) character set utf8 default NULL COMMENT 'common_pro 的pname',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Table structure for table `request_type` */

DROP TABLE IF EXISTS `request_type`;

CREATE TABLE `request_type` (
  `rqid` int(11) NOT NULL auto_increment COMMENT 'Request ID',
  `rqtype` varchar(30) NOT NULL COMMENT 'Request Type',
  PRIMARY KEY  (`rqid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL auto_increment,
  `family` varchar(50) NOT NULL,
  `deadline` date default NULL COMMENT 'Final deadline',
  `ann_date` date default NULL,
  `start_date` date default NULL,
  `Drr_date` date default NULL,
  `Drr_received` date default NULL,
  `complete_date` date default NULL,
  `request_type` varchar(50) NOT NULL,
  `POR_Version` varchar(50) NOT NULL,
  `received_date` date default NULL,
  `brand` varchar(20) NOT NULL COMMENT 'common_brand',
  `model_count` int(11) default NULL,
  `IAL_NO` int(11) default NULL,
  `MT_NO` varchar(50) default NULL,
  `Data_Specialist` varchar(50) NOT NULL,
  `Planner` varchar(50) default NULL,
  `Owner` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'common_status',
  `Work_flow_Instance_Name` varchar(50) default NULL,
  `Drr_Reply` varchar(20) default NULL,
  `PN` text,
  `EOW` date default NULL,
  `Drr_No` int(11) NOT NULL,
  `Action` set('New MT','Refresh','Modify') default NULL COMMENT 'common_action',
  `archive` int(5) default NULL COMMENT '1.archive,0.no_archive',
  `Drr_deadline` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2321 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
