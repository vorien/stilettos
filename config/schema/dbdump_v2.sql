/*
SQLyog Ultimate v12.16 (64 bit)
MySQL - 5.5.46-0ubuntu0.14.04.2 : Database - stilettos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stilettos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `stilettos`;

/*Table structure for table `abilities` */

DROP TABLE IF EXISTS `abilities`;

CREATE TABLE `abilities` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `locklevel` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `has_range` varchar(255) DEFAULT NULL,
  `use_end` varchar(255) DEFAULT NULL,
  `maneuver_id` int(11) DEFAULT NULL,
  `power_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `abilities` */

insert  into `abilities`(`id`,`name`,`locklevel`,`type`,`duration`,`target`,`has_range`,`use_end`,`maneuver_id`,`power_id`,`created`,`modified`) values 
(1,'Communication-Clairsentience',99,'Standard/Sensory','Constant','Stiletto','Yes/x10m','Y',1,1,NULL,NULL),
(2,'Detection-Enhanced Senses',2,'Special/Sensory','Persistent','Self Only','Self','N',2,2,NULL,NULL),
(3,'Manipulation-Telekinesis',4,'Standard/Attack','Constant','Stiletto','Yes/x10m','Y',3,3,NULL,NULL),
(4,'Relocation-Teleportation',5,'Movement','Instant','Stiletto','Self','Y',4,4,NULL,NULL),
(5,'Transportation-Teleportation',7,'Movement','Instant','Self Only','Self','Y',5,4,NULL,NULL),
(6,'Communication-Mind Link',1,'Standard/Sensory','Constant','Stiletto','Yes/x10m','Y',1,5,NULL,NULL);

/*Table structure for table `abilities_displays` */

DROP TABLE IF EXISTS `abilities_displays`;

CREATE TABLE `abilities_displays` (
  `id` double NOT NULL AUTO_INCREMENT,
  `ability_id` int(11) DEFAULT NULL,
  `display_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `abilities_displays` */

insert  into `abilities_displays`(`id`,`ability_id`,`display_id`,`created`,`modified`) values 
(1,3,1,NULL,NULL),
(2,4,1,NULL,NULL),
(3,5,1,NULL,NULL),
(4,1,2,NULL,NULL),
(5,1,3,NULL,NULL),
(6,2,3,NULL,NULL),
(7,3,3,NULL,NULL),
(8,4,3,NULL,NULL),
(9,5,3,NULL,NULL),
(10,1,4,NULL,NULL),
(11,2,4,NULL,NULL),
(12,3,4,NULL,NULL),
(13,4,4,NULL,NULL),
(14,5,4,NULL,NULL),
(15,5,5,NULL,NULL),
(16,2,6,NULL,NULL),
(17,1,7,NULL,NULL),
(18,2,7,NULL,NULL),
(19,3,7,NULL,NULL),
(20,4,7,NULL,NULL),
(21,5,7,NULL,NULL),
(22,1,8,NULL,NULL),
(23,2,8,NULL,NULL),
(24,3,8,NULL,NULL),
(25,4,8,NULL,NULL),
(26,5,8,NULL,NULL),
(27,1,9,NULL,NULL),
(28,3,10,NULL,NULL),
(29,1,11,NULL,NULL),
(30,2,11,NULL,NULL),
(31,4,11,NULL,NULL),
(32,5,11,NULL,NULL),
(33,4,12,NULL,NULL),
(34,5,12,NULL,NULL),
(35,5,13,NULL,NULL),
(36,2,14,NULL,NULL),
(37,4,14,NULL,NULL),
(38,5,14,NULL,NULL),
(39,1,15,NULL,NULL),
(40,3,15,NULL,NULL),
(41,4,15,NULL,NULL),
(42,5,15,NULL,NULL),
(43,1,16,NULL,NULL),
(44,2,16,NULL,NULL),
(45,3,16,NULL,NULL),
(46,4,16,NULL,NULL),
(47,5,16,NULL,NULL),
(48,5,17,NULL,NULL),
(49,4,18,NULL,NULL),
(50,5,18,NULL,NULL),
(51,1,19,NULL,NULL),
(52,2,19,NULL,NULL),
(53,3,19,NULL,NULL),
(54,4,19,NULL,NULL),
(55,5,19,NULL,NULL),
(56,1,20,NULL,NULL),
(57,2,20,NULL,NULL),
(58,3,20,NULL,NULL),
(59,4,20,NULL,NULL),
(60,5,20,NULL,NULL),
(61,3,21,NULL,NULL),
(62,1,22,NULL,NULL),
(63,5,22,NULL,NULL),
(64,6,3,NULL,NULL),
(65,6,4,NULL,NULL),
(66,6,7,NULL,NULL),
(67,6,8,NULL,NULL),
(68,6,9,NULL,NULL),
(69,6,15,NULL,NULL),
(70,6,16,NULL,NULL),
(71,6,18,NULL,NULL),
(72,6,19,NULL,NULL),
(73,6,20,NULL,NULL),
(74,6,22,NULL,NULL),
(75,6,23,NULL,NULL);

/*Table structure for table `displays` */

DROP TABLE IF EXISTS `displays`;

CREATE TABLE `displays` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `power` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `displays` */

insert  into `displays`(`id`,`name`,`power`,`created`,`modified`) values 
(1,'Armor Piercing',0,NULL,NULL),
(2,'Clairsentience',1,NULL,NULL),
(3,'Concentration',0,NULL,NULL),
(4,'Connection',0,NULL,NULL),
(5,'Destination',0,NULL,NULL),
(6,'Enhanced Senses',1,NULL,NULL),
(7,'Extra Time',0,NULL,NULL),
(8,'Focus',0,NULL,NULL),
(9,'Incantations',0,NULL,NULL),
(10,'Indirect',0,NULL,NULL),
(11,'MegaScale',0,NULL,NULL),
(12,'Objects/People',1,NULL,NULL),
(13,'People',1,NULL,NULL),
(14,'Ranged',0,NULL,NULL),
(15,'Reduced Endurance',0,NULL,NULL),
(16,'Requires A Roll',0,NULL,NULL),
(17,'Requires Multiple Users',0,NULL,NULL),
(18,'Restrainable',0,NULL,NULL),
(19,'Side Effects',0,NULL,NULL),
(20,'Static',0,NULL,NULL),
(21,'Telekinesis',1,NULL,NULL),
(22,'Usable On Others',0,NULL,NULL),
(23,'Mind Link',1,NULL,NULL);

/*Table structure for table `maneuvers` */

DROP TABLE IF EXISTS `maneuvers`;

CREATE TABLE `maneuvers` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `maneuvers` */

insert  into `maneuvers`(`id`,`name`,`sort_order`,`created`,`modified`) values 
(1,'Communication',1,NULL,NULL),
(2,'Detection',2,NULL,NULL),
(3,'Manipulation',3,NULL,NULL),
(4,'Relocation',4,NULL,NULL),
(5,'Transportation',5,NULL,NULL);

/*Table structure for table `modifier_classes` */

DROP TABLE IF EXISTS `modifier_classes`;

CREATE TABLE `modifier_classes` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `modifier_classes` */

insert  into `modifier_classes`(`id`,`name`,`display_order`,`created`,`modified`) values 
(1,'adder',1,NULL,NULL),
(2,'advantage',2,NULL,NULL),
(3,'limitation',4,NULL,NULL),
(4,'penalty',5,NULL,NULL),
(5,'endurance_reduction',3,NULL,NULL);

/*Table structure for table `modifier_types` */

DROP TABLE IF EXISTS `modifier_types`;

CREATE TABLE `modifier_types` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `modifier_types` */

insert  into `modifier_types`(`id`,`name`,`created`,`modified`) values 
(1,'checkbox',NULL,NULL),
(2,'input',NULL,NULL),
(3,'select',NULL,NULL),
(4,'radio',NULL,NULL),
(5,'multiplier',NULL,NULL);

/*Table structure for table `modifier_values` */

DROP TABLE IF EXISTS `modifier_values`;

CREATE TABLE `modifier_values` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `locklevel` int(11) DEFAULT '1',
  `value` float DEFAULT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

/*Data for the table `modifier_values` */

insert  into `modifier_values`(`id`,`name`,`locklevel`,`value`,`modifier_id`,`created`,`modified`) values 
(1,'0 Endurance',1,0.5,31,NULL,NULL),
(2,'1 Grant',1,0.25,41,NULL,NULL),
(3,'Constant - Activation Only',1,2,16,NULL,NULL),
(4,'Affects Whole Object',1,0.25,38,NULL,NULL),
(5,'Armor Piercing',1,0.25,1,NULL,NULL),
(6,'Detect Stiletto',1,3,10,NULL,NULL),
(7,'per meter',1,1,23,NULL,NULL),
(8,'Base UOO',1,0.25,42,NULL,NULL),
(9,'Base PER Roll with one Sense Group (Targeting or Nontargeting) at Range',1,20,2,NULL,NULL),
(10,'1/2 DCV',1,0.25,6,NULL,NULL),
(11,'0 DCV',1,0.5,6,NULL,NULL),
(12,'Unaware',1,0.75,6,NULL,NULL),
(13,'None',1,-6,8,NULL,NULL),
(14,'Secondary',1,-3,8,NULL,NULL),
(15,'Primary',1,0,8,NULL,NULL),
(16,'Constant',1,2,7,NULL,NULL),
(17,'Constant, Throughout',1,2,19,NULL,NULL),
(18,'Other',1,-6,9,NULL,NULL),
(19,'Secondary',1,-3,9,NULL,NULL),
(20,'Primary',1,-1,9,NULL,NULL),
(21,'Home',1,0,9,NULL,NULL),
(22,'240 degree',1,2,11,NULL,NULL),
(23,'360 degree',1,5,11,NULL,NULL),
(24,'Discriminatory',1,5,12,NULL,NULL),
(25,'Self / 0 km',1,0,22,NULL,NULL),
(26,'Close / 1 km',1,1,22,NULL,NULL),
(27,'City / 100 km',1,1.5,22,NULL,NULL),
(28,'NSEW / 1000 km',1,1.75,22,NULL,NULL),
(29,'Known World / 10000 km',1,2,22,NULL,NULL),
(30,'Planet / 100000 km',1,2.75,22,NULL,NULL),
(31,'Extra Sense (Targeting or Nontargeting)',1,5,3,NULL,NULL),
(32,'Extra Sense Group (Targeting or Nontargeting)',1,10,4,NULL,NULL),
(33,'Delayed Phase',1,0.25,17,NULL,NULL),
(34,'Extra Segment',1,0.5,17,NULL,NULL),
(35,'Full Phase',1,0.5,17,NULL,NULL),
(36,'Extra Phase',1,0.75,17,NULL,NULL),
(37,'1 Turn (Post-Segment 12)',1,1.25,17,NULL,NULL),
(38,'1 Minute',1,1.5,17,NULL,NULL),
(39,'5 Minutes',1,2,17,NULL,NULL),
(40,'20 Minutes',1,2.5,17,NULL,NULL),
(41,'1 Hour',1,3,17,NULL,NULL),
(42,'6 Hours',1,3.5,17,NULL,NULL),
(43,'1 Day',1,4,17,NULL,NULL),
(44,'1 Week',1,4.5,17,NULL,NULL),
(45,'1 Month',1,5,17,NULL,NULL),
(46,'1 Season (3 months)',1,5.5,17,NULL,NULL),
(47,'1 Year',1,6,17,NULL,NULL),
(48,'5 Years',1,6.5,17,NULL,NULL),
(49,'25 Years',1,7,17,NULL,NULL),
(50,'1 Century',1,7.5,17,NULL,NULL),
(51,'IIF',1,0.25,18,NULL,NULL),
(52,'OIF/IAF',1,0.5,18,NULL,NULL),
(53,'OAF',1,1,18,NULL,NULL),
(54,'Fixed Location',1,1,27,NULL,NULL),
(55,'Incantations',1,0.25,20,NULL,NULL),
(56,'Source: Stiletto',1,0.25,21,NULL,NULL),
(57,'Target: Other',1,0.25,21,NULL,NULL),
(58,'2x Mass',1,5,24,NULL,NULL),
(59,'1 Bearer',1,-6,33,NULL,NULL),
(60,'2 Bearers',1,-3,33,NULL,NULL),
(61,'3 Bearers',1,0,33,NULL,NULL),
(62,'No Range Modifier',1,0.5,28,NULL,NULL),
(63,'No relative Velocity',1,10,25,NULL,NULL),
(64,'Only Works On Stiletto Set',1,1,39,NULL,NULL),
(65,'Partially Penetrative',1,5,13,NULL,NULL),
(66,'Full Penetrative',1,10,13,NULL,NULL),
(67,'Each 2x Range',1,5,5,NULL,NULL),
(68,'Ranged',1,0.5,30,NULL,NULL),
(69,'Requires A Roll',1,0.25,32,NULL,NULL),
(70,'Requires Endurance',1,-0.25,43,NULL,NULL),
(71,'3 Bearers',1,0.5,34,NULL,NULL),
(72,'Restrainable',1,0.5,35,NULL,NULL),
(73,'Safe Aquatic Teleport',1,5,26,NULL,NULL),
(74,'Safe Blind Teleport',1,0.25,29,NULL,NULL),
(75,'Sense (Free Action)',1,2,14,NULL,NULL),
(76,'Minor',1,0.25,36,NULL,NULL),
(77,'Major',1,0.5,36,NULL,NULL),
(78,'Extreme',1,1,36,NULL,NULL),
(79,'Extreme',1,-8,37,NULL,NULL),
(80,'Major',1,-5,37,NULL,NULL),
(81,'Moderate',1,-3,37,NULL,NULL),
(82,'Minor',1,-1,37,NULL,NULL),
(83,'None',1,0,37,NULL,NULL),
(84,'Targetting',1,10,15,NULL,NULL),
(85,'per 2 STR',1,3,40,NULL,NULL),
(86,'Unwilling Recipient',1,1,44,NULL,NULL),
(87,'x2 Grants',1,0.25,45,NULL,NULL),
(88,'1 Person',1,10,46,NULL,NULL),
(89,'x2 People',1,5,47,NULL,NULL);

/*Table structure for table `modifiers` */

DROP TABLE IF EXISTS `modifiers`;

CREATE TABLE `modifiers` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `locklevel` int(11) DEFAULT '1',
  `required` int(11) DEFAULT '0',
  `display_id` int(11) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `modifier_class_id` int(11) DEFAULT NULL,
  `modifier_type_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `modifiers` */

insert  into `modifiers`(`id`,`name`,`locklevel`,`required`,`display_id`,`display_order`,`modifier_class_id`,`modifier_type_id`,`created`,`modified`) values 
(1,'Armor Piercing',1,0,1,1,2,1,NULL,NULL),
(2,'Clairsentience Cost',1,1,2,1,1,1,NULL,NULL),
(3,'Extra Sense',99,0,2,2,1,3,NULL,NULL),
(4,'Extra Sense Group',99,0,2,3,1,3,NULL,NULL),
(5,'Range Doubling',1,0,2,4,1,2,NULL,NULL),
(6,'Concentration',1,0,3,1,3,3,NULL,NULL),
(7,'Constant',1,0,3,2,3,5,NULL,NULL),
(8,'Connection',1,0,4,1,4,3,NULL,NULL),
(9,'Destination',1,0,5,1,4,3,NULL,NULL),
(10,'Base Detect',1,1,6,1,1,1,NULL,NULL),
(11,'Detection Angle',1,0,6,2,1,3,NULL,NULL),
(12,'Discriminatory',1,0,6,3,1,1,NULL,NULL),
(13,'Penetration',1,0,6,3,1,3,NULL,NULL),
(14,'Sense',1,0,6,2,1,1,NULL,NULL),
(15,'Targetting',1,0,6,6,1,1,NULL,NULL),
(16,'Activation Only (Constant)',1,0,7,2,3,5,NULL,NULL),
(17,'Extra Time',1,0,7,1,3,3,NULL,NULL),
(18,'Focus',1,0,8,1,3,3,NULL,NULL),
(19,'Constant, Throughout',1,0,9,2,3,5,NULL,NULL),
(20,'Incantations',1,0,9,1,3,1,NULL,NULL),
(21,'Indirect',1,0,10,1,2,3,NULL,NULL),
(22,'Distance',1,0,11,1,2,3,NULL,NULL),
(23,'Base Distance',1,1,12,1,1,2,NULL,NULL),
(24,'Mass Doubling',1,0,12,2,1,2,NULL,NULL),
(25,'No Relative Velocity',1,0,12,3,1,1,NULL,NULL),
(26,'Safe Aquatic Teleport',1,0,12,4,1,1,NULL,NULL),
(27,'Home Location',1,0,13,1,1,1,NULL,NULL),
(28,'No Range Modifier',1,0,13,2,2,1,NULL,NULL),
(29,'Safe Blind Teleport',1,0,13,3,2,1,NULL,NULL),
(30,'Ranged',1,0,14,1,2,1,NULL,NULL),
(31,'0 Endurance',1,0,15,1,5,1,NULL,NULL),
(32,'Requires a Roll',1,1,16,1,3,1,NULL,NULL),
(33,'Multiple Users',1,0,17,1,4,3,NULL,NULL),
(34,'Requires Multiple Bearers',1,1,17,2,3,1,NULL,NULL),
(35,'Restrainable',1,0,18,1,3,1,NULL,NULL),
(36,'Side Effects',1,0,19,1,3,3,NULL,NULL),
(37,'Static',1,0,20,1,4,3,NULL,NULL),
(38,'Affects Whole Object',1,1,21,3,3,1,NULL,NULL),
(39,'Only On Stiletto Set',1,1,21,2,3,1,NULL,NULL),
(40,'Telekinetic STR',1,1,21,1,1,2,NULL,NULL),
(41,'1 Grant',1,2,22,3,2,1,NULL,NULL),
(42,'Base UOO',1,2,22,1,2,1,NULL,NULL),
(43,'Requires Endurance',1,2,22,2,2,1,NULL,NULL),
(44,'Unwilling Recipient',1,0,22,5,2,1,NULL,NULL),
(45,'x2 Grants',1,0,22,4,2,2,NULL,NULL),
(46,'1 Person',1,1,23,1,1,1,NULL,NULL),
(47,'x2 People',1,0,23,2,1,2,NULL,NULL);

/*Table structure for table `powers` */

DROP TABLE IF EXISTS `powers`;

CREATE TABLE `powers` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `powers` */

insert  into `powers`(`id`,`name`,`sort_order`,`created`,`modified`) values 
(1,'Clairsentience',5,NULL,NULL),
(2,'Enhanced Senses',2,NULL,NULL),
(3,'Telekinesis',3,NULL,NULL),
(4,'Teleportation',4,NULL,NULL),
(5,'Mind Link',1,NULL,NULL);

/*Table structure for table `abilities_grid` */

DROP TABLE IF EXISTS `abilities_grid`;

/*!50001 DROP VIEW IF EXISTS `abilities_grid` */;
/*!50001 DROP TABLE IF EXISTS `abilities_grid` */;

/*!50001 CREATE TABLE  `abilities_grid`(
 `abilities_id` double ,
 `abilities_name` varchar(255) ,
 `abilities_locklevel` int(11) ,
 `abilities_type` varchar(255) ,
 `abilities_duration` varchar(255) ,
 `abilities_target` varchar(255) ,
 `abilities_has_range` varchar(255) ,
 `abilities_use_end` varchar(255) ,
 `abilities_maneuver_id` int(11) ,
 `abilities_power_id` int(11) ,
 `displays_id` double ,
 `displays_name` varchar(255) ,
 `displays_power` tinyint(1) ,
 `modifiers_id` double ,
 `modifiers_name` varchar(255) ,
 `modifiers_locklevel` int(11) ,
 `modifiers_required` int(11) ,
 `modifiers_display_id` int(11) ,
 `modifiers_display_order` int(11) ,
 `modifiers_modifier_class_id` int(11) ,
 `modifiers_modifier_type_id` int(11) ,
 `modifier_classes_id` double ,
 `modifier_classes_name` varchar(255) ,
 `modifier_classes_display_order` int(11) ,
 `modifier_types_id` double ,
 `modifier_types_name` varchar(255) ,
 `modifier_values_id` double ,
 `modifier_values_name` varchar(255) ,
 `modifier_values_locklevel` int(11) ,
 `modifier_values_value` float ,
 `modifier_values_modifier_id` int(11) 
)*/;

/*View structure for view abilities_grid */

/*!50001 DROP TABLE IF EXISTS `abilities_grid` */;
/*!50001 DROP VIEW IF EXISTS `abilities_grid` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `abilities_grid` AS select `abilities`.`id` AS `abilities_id`,`abilities`.`name` AS `abilities_name`,`abilities`.`locklevel` AS `abilities_locklevel`,`abilities`.`type` AS `abilities_type`,`abilities`.`duration` AS `abilities_duration`,`abilities`.`target` AS `abilities_target`,`abilities`.`has_range` AS `abilities_has_range`,`abilities`.`use_end` AS `abilities_use_end`,`abilities`.`maneuver_id` AS `abilities_maneuver_id`,`abilities`.`power_id` AS `abilities_power_id`,`displays`.`id` AS `displays_id`,`displays`.`name` AS `displays_name`,`displays`.`power` AS `displays_power`,`modifiers`.`id` AS `modifiers_id`,`modifiers`.`name` AS `modifiers_name`,`modifiers`.`locklevel` AS `modifiers_locklevel`,`modifiers`.`required` AS `modifiers_required`,`modifiers`.`display_id` AS `modifiers_display_id`,`modifiers`.`display_order` AS `modifiers_display_order`,`modifiers`.`modifier_class_id` AS `modifiers_modifier_class_id`,`modifiers`.`modifier_type_id` AS `modifiers_modifier_type_id`,`modifier_classes`.`id` AS `modifier_classes_id`,`modifier_classes`.`name` AS `modifier_classes_name`,`modifier_classes`.`display_order` AS `modifier_classes_display_order`,`modifier_types`.`id` AS `modifier_types_id`,`modifier_types`.`name` AS `modifier_types_name`,`modifier_values`.`id` AS `modifier_values_id`,`modifier_values`.`name` AS `modifier_values_name`,`modifier_values`.`locklevel` AS `modifier_values_locklevel`,`modifier_values`.`value` AS `modifier_values_value`,`modifier_values`.`modifier_id` AS `modifier_values_modifier_id` from ((((((`abilities` join `abilities_displays` on((`abilities_displays`.`ability_id` = `abilities`.`id`))) join `displays` on((`displays`.`id` = `abilities_displays`.`display_id`))) join `modifiers` on((`modifiers`.`display_id` = `displays`.`id`))) join `modifier_types` on((`modifier_types`.`id` = `modifiers`.`modifier_type_id`))) join `modifier_classes` on((`modifier_classes`.`id` = `modifiers`.`modifier_class_id`))) join `modifier_values` on((`modifier_values`.`modifier_id` = `modifiers`.`id`))) order by `modifier_classes`.`display_order`,`displays`.`name`,`modifiers`.`display_order`,`modifier_values`.`value` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
