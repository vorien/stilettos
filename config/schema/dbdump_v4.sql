/*
SQLyog Ultimate v12.16 (64 bit)
MySQL - 5.5.47-0ubuntu0.14.04.1 : Database - stilettos
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

/*Table structure for table `displays` */

DROP TABLE IF EXISTS `displays`;

CREATE TABLE `displays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `displays` */

insert  into `displays`(`id`,`name`,`created`,`modified`) values 
(1,'Armor Piercing','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'Clairsentience','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'Concentration','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'Connection','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,'Destination','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(6,'Detect Stiletto','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(7,'Extra Time','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(8,'Focus','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(9,'Incantations','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(10,'Indirect','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(11,'MegaScale','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(12,'Teleportation','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(13,'Costs Endurance','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(14,'Ranged','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(15,'Reduced Endurance','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(16,'Requires A Roll','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(17,'Requires Multiple Users','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(18,'Restrainable','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(19,'Side Effects','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(20,'Static','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(21,'Telekinesis','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(22,'Usable On Others','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(23,'Mind Link','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(24,'No Range Modifier','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(25,'Clairsentience',NULL,NULL),
(26,'Extra Senses',NULL,NULL),
(27,'Range',NULL,NULL),
(28,'Mobile Perception Point',NULL,NULL);

/*Table structure for table `maneuvers` */

DROP TABLE IF EXISTS `maneuvers`;

CREATE TABLE `maneuvers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `lock_level` int(11) DEFAULT '1',
  `active` tinyint(4) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `maneuvers` */

insert  into `maneuvers`(`id`,`name`,`sort_order`,`lock_level`,`active`,`created`,`modified`) values 
(1,'Communication',2,4,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'Detection',1,2,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'Manipulation',3,6,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'Relocation',4,8,1,'2016-02-25 12:09:53','2016-02-25 12:09:53');

/*Table structure for table `modifier_classes` */

DROP TABLE IF EXISTS `modifier_classes`;

CREATE TABLE `modifier_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `modifier_classes` */

insert  into `modifier_classes`(`id`,`name`,`sort_order`,`created`,`modified`) values 
(1,'adder',1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'advantage',2,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'limitation',4,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'penalty',5,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,'endurance_reduction',3,'2016-02-25 12:09:53','2016-02-25 12:09:53');

/*Table structure for table `modifier_types` */

DROP TABLE IF EXISTS `modifier_types`;

CREATE TABLE `modifier_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `modifier_types` */

insert  into `modifier_types`(`id`,`name`,`created`,`modified`) values 
(1,'checkbox','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'input','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'select','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'radio','2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,'multiplier','2016-02-25 12:09:53','2016-02-25 12:09:53');

/*Table structure for table `modifier_values` */

DROP TABLE IF EXISTS `modifier_values`;

CREATE TABLE `modifier_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lock_level_requirement` int(11) DEFAULT '1',
  `value` float DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

/*Data for the table `modifier_values` */

insert  into `modifier_values`(`id`,`name`,`lock_level_requirement`,`value`,`is_default`,`sort_order`,`modifier_id`,`created`,`modified`) values 
(1,'0 Endurance',6,0.5,NULL,3,31,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'1 Grant',2,0.25,NULL,1,41,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'Constant - Activation Only',0,0.5,NULL,1,16,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'Affects Whole Object',0,0.25,NULL,1,38,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,'Armor Piercing',5,0.25,NULL,1,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(6,'Detect Stiletto',0,3,NULL,1,10,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(7,'per meter',0,1,NULL,1,23,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(8,'Base UOO',2,0.25,NULL,1,42,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(10,'1/2 DCV',4,0.25,NULL,3,6,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(11,'0 DCV',2,0.5,1,2,6,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(12,'Unaware',0,0.75,NULL,1,6,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(13,'None',8,-6,NULL,3,8,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(14,'Secondary',4,-3,NULL,2,8,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(15,'Primary',0,0,1,1,8,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(16,'Constant',2,2,1,1,7,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(17,'Constant, Throughout',3,2,1,1,19,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(18,'Other',10,-6,NULL,4,9,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(19,'Secondary',5,-3,NULL,3,9,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(20,'Primary',1,-1,1,2,9,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(21,'Home',2,0,NULL,1,9,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(22,'240 Degrees',1,2,NULL,2,11,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(23,'360 Degrees',3,5,NULL,3,11,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(24,'Discriminatory',4,5,NULL,1,12,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(25,'Self / 0 km',0,0,1,1,22,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(26,'Close / 1 km',2,1,NULL,2,22,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(27,'City / 100 km',4,1.5,NULL,3,22,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(28,'NSEW / 1000 km',8,1.75,NULL,4,22,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(29,'Known World / 10000 km',16,2,NULL,5,22,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(30,'Planet / 100000 km',32,2.75,NULL,6,22,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(33,'Half Phase',2,0.25,NULL,16,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(35,'Full Phase',1,0.5,NULL,15,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(37,'1 Turn (Post-Segment 12)',0,1.25,1,14,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(38,'1 Minute',-1,1.5,NULL,13,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(39,'5 Minutes',-2,2,NULL,12,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(40,'20 Minutes',-4,2.5,NULL,11,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(41,'1 Hour',-6,3,NULL,10,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(42,'6 Hours',-8,3.5,NULL,9,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(43,'1 Day',-10,4,NULL,8,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(44,'1 Week',-12,4.5,NULL,7,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(45,'1 Month',-14,5,NULL,6,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(46,'1 Season (3 months)',-16,5.5,NULL,5,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(47,'1 Year',-18,6,NULL,4,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(48,'5 Years',-20,6.5,NULL,3,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(49,'25 Years',-22,7,NULL,2,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(50,'1 Century',-24,7.5,NULL,1,17,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(51,'IIF',3,0.25,NULL,3,18,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(52,'OIF/IAF',1,0.5,NULL,2,18,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(53,'OAF',0,1,1,1,18,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(54,'Fixed Location',2,1,NULL,1,27,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(55,'Incantations',3,0.25,1,1,20,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(56,'Source: Stiletto',6,0.25,NULL,1,21,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(57,'Target: Other',6,0.25,NULL,1,64,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(58,'2x Mass',2,5,NULL,1,24,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(59,'1 Bearer',9,-6,NULL,3,33,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(60,'2 Bearers',3,-3,NULL,2,33,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(61,'3 Bearers',0,0,1,1,33,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(62,'No Range Modifier',3,0.5,NULL,1,28,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(63,'No relative Velocity',6,10,NULL,1,25,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(64,'Only Works On Stiletto Set',0,1,NULL,1,39,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(65,'Partially Penetrative',4,5,NULL,2,13,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(66,'Full Penetrative',8,10,NULL,3,13,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(68,'Ranged',2,0.5,NULL,1,30,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(69,'Requires A Roll',0,0.25,NULL,1,32,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(71,'3 Bearers',0,0.5,NULL,1,34,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(72,'Restrainable',4,0.5,1,1,35,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(73,'Safe Aquatic Teleport',4,5,NULL,1,26,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(74,'Safe Blind Teleport',8,0.25,NULL,1,29,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(75,'Sense (Free Action)',2,2,NULL,1,14,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(76,'Minor',-1,0.25,NULL,3,36,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(77,'Major',-3,0.5,NULL,2,36,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(78,'Extreme',-6,1,NULL,1,36,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(79,'Extreme',5,-8,NULL,5,37,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(80,'Major',4,-5,NULL,4,37,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(81,'Moderate',3,-3,NULL,3,37,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(82,'Minor',2,-1,NULL,2,37,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(83,'None',1,0,1,1,37,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(84,'Targetting',6,10,NULL,1,15,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(86,'Unwilling Recipient',10,1,NULL,1,44,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(87,'x2 Grants',5,0.25,NULL,1,45,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(88,'1 Person',0,10,NULL,1,46,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(89,'x2 People',2,5,NULL,1,47,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(90,'Costs Endurance',0,0.25,NULL,1,48,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(91,'Constant, Costs Endurance',0,2,NULL,1,49,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(92,'Encryption',6,5,NULL,1,50,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(93,'No LoS Needed',4,10,NULL,1,51,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(94,'Only with Bearers',0,1,NULL,1,52,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(95,'Use Hearing Sense Group',0,0.25,NULL,1,53,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(96,'120 Degrees',0,0,1,1,11,NULL,NULL),
(97,'None',0,0,1,4,36,NULL,NULL),
(98,'Movement Only',0,2,1,1,40,NULL,NULL),
(99,'1d6-1',3,12,NULL,2,40,NULL,NULL),
(100,'1d6',5,18,NULL,3,40,NULL,NULL),
(101,'1d6+1',8,29,NULL,4,40,NULL,NULL),
(102,'1 1/2 d6',12,40,NULL,5,40,NULL,NULL),
(103,'None',6,0,NULL,4,6,NULL,NULL),
(104,'None',5,0,NULL,17,17,NULL,NULL),
(105,'None',6,0,NULL,4,18,NULL,NULL),
(106,'Hearing',0,20,NULL,1,57,NULL,NULL),
(109,'2x Range',3,5,NULL,1,60,NULL,NULL),
(110,'Mobile Perception Point',1,5,NULL,1,61,NULL,NULL),
(111,'2x MPP',4,5,NULL,1,62,NULL,NULL),
(112,'Second MPP',4,5,NULL,1,63,NULL,NULL),
(113,'Extra x2 People',2,5,NULL,1,54,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(114,'Full Endurance',0,0,1,1,31,NULL,NULL),
(115,'Half Endurance',3,0.25,NULL,2,31,NULL,NULL),
(116,'No Penetration',0,0,1,1,13,NULL,NULL),
(117,'< 8m',0,0,1,1,55,NULL,NULL),
(118,'9-12m',0,-1,NULL,2,55,NULL,NULL),
(119,'13-16m',0,-2,NULL,3,55,NULL,NULL),
(120,'17-24m',0,-3,NULL,4,55,NULL,NULL),
(121,'25-32m',0,-4,NULL,5,55,NULL,NULL),
(122,'33-48m',0,-5,NULL,6,55,NULL,NULL),
(123,'None',0,0,1,1,59,NULL,NULL),
(124,' Normal Sight',20,5,NULL,2,59,NULL,NULL),
(125,' Nightvision',20,5,NULL,3,59,NULL,NULL),
(126,' Normal Smell',20,5,NULL,4,59,NULL,NULL),
(127,' Normal Taste',20,5,NULL,5,59,NULL,NULL),
(128,' Normal Touch',20,5,NULL,6,59,NULL,NULL),
(129,' Mental Awareness',20,5,NULL,7,59,NULL,NULL),
(130,' Detect',20,5,NULL,8,59,NULL,NULL),
(131,' Infrared Perception',20,10,NULL,9,59,NULL,NULL),
(132,' Ultraviolet Perception',20,10,NULL,10,59,NULL,NULL),
(133,' Active Sonar',20,15,NULL,11,59,NULL,NULL),
(134,' Radio Perception/Transmission',20,15,NULL,12,59,NULL,NULL),
(135,' High Range  Radio Perception',20,15,NULL,13,59,NULL,NULL),
(136,' Ultrasonic Perception',20,15,NULL,14,59,NULL,NULL),
(137,' Radar',20,15,NULL,15,59,NULL,NULL),
(138,' Spatial Awareness',20,20,NULL,16,59,NULL,NULL);

/*Table structure for table `modifiers` */

DROP TABLE IF EXISTS `modifiers`;

CREATE TABLE `modifiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lock_level_modifier` float DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `display_id` int(11) DEFAULT '0',
  `modifier_class_id` int(11) DEFAULT '0',
  `modifier_type_id` int(11) DEFAULT '0',
  `default_input_value` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Data for the table `modifiers` */

insert  into `modifiers`(`id`,`name`,`lock_level_modifier`,`sort_order`,`display_id`,`modifier_class_id`,`modifier_type_id`,`default_input_value`,`created`,`modified`) values 
(1,'Armor Piercing',0.25,1,1,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(6,'Concentration',0.25,1,3,3,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(7,'Constant',0.25,2,3,3,5,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(8,'Connection',0.25,1,4,4,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(9,'Destination',0.25,1,5,4,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(10,'Base Detect',0.25,1,6,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(11,'Detection Angle',0.25,3,6,1,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(12,'Discriminatory',0.25,4,6,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(13,'Penetrating',0.25,5,6,1,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(14,'Sense',0.25,2,6,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(15,'Targeting',0.25,6,6,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(16,'Activation Only (Constant)',0.25,2,7,3,5,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(17,'Extra Time',0.25,1,7,3,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(18,'Focus',0.25,1,8,3,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(19,'Constant, Throughout',0.25,2,9,3,5,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(20,'Incantations',0.25,1,9,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(21,'Source: Stiletto',0.25,1,10,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(22,'Distance',0.25,1,11,2,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(23,'Base Distance',0.25,1,12,1,2,10,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(24,'Mass Doubling',0.25,2,12,1,2,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(25,'No Relative Velocity',0.25,3,12,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(26,'Safe Aquatic Teleport',0.25,4,12,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(27,'Home Location',0.25,1,12,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(28,'No Range Modifier',0.25,2,24,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(29,'Safe Blind Teleport',0.25,3,12,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(30,'Ranged',0.25,1,14,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(31,'Reduced Endurance',0.25,1,15,5,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(32,'Requires a Roll',0.25,1,16,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(33,'Multiple Users',0.25,1,17,4,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(34,'Requires Multiple Bearers',0.25,2,17,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(35,'Restrainable',0.25,1,18,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(36,'Side Effects',0.25,1,19,3,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(37,'Static',0.25,1,20,4,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(38,'Affects Whole Object',0.25,3,21,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(39,'Only On Stiletto Set',0.25,2,21,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(40,'Damage',0.25,1,21,1,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(41,'1 Grant',0.25,3,22,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(42,'Base UOO',0.25,1,22,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(44,'Unwilling Recipient',0.25,5,22,2,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(45,'x2 Grants',0.25,4,22,2,2,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(46,'1 Person',0.25,1,23,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(47,'x2 People',0.25,4,23,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(48,'Costs Endurance',0.25,5,13,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(49,'Constant, Costs Endurance',0.25,2,13,3,5,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(50,'Encryption',0.25,6,23,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(51,'No LoS Needed',0.25,3,23,1,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(52,'Only with Bearers',0.25,4,23,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(53,'Use Hearing Sense Group',0.25,5,23,3,1,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(54,'Extra x2 People',0.25,5,23,1,1,0,NULL,NULL),
(55,'Distance (m)',0.25,2,21,4,3,0,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(57,'Base Clairsentience',0.25,1,25,1,1,0,NULL,NULL),
(59,'Extra Sense',0.25,1,26,1,3,0,NULL,NULL),
(60,'2x Range',0.25,1,27,1,2,0,NULL,NULL),
(61,'Mobile Perception Point',0.25,1,28,1,1,0,NULL,NULL),
(62,'2x MPP',0.25,3,28,1,2,0,NULL,NULL),
(63,'Second MPP',0.25,2,28,1,1,0,NULL,NULL),
(64,'Target: Other',0.25,2,10,2,1,0,NULL,NULL);

/*Table structure for table `powers` */

DROP TABLE IF EXISTS `powers`;

CREATE TABLE `powers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `lock_level_requirement` int(11) DEFAULT '1',
  `type` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `has_range` varchar(255) DEFAULT NULL,
  `use_end` varchar(255) DEFAULT NULL,
  `maneuver_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `powers` */

insert  into `powers`(`id`,`name`,`sort_order`,`lock_level_requirement`,`type`,`duration`,`target`,`has_range`,`use_end`,`maneuver_id`,`active`,`created`,`modified`) values 
(1,'Clairsentience',5,20,'Standard/Sensory','Constant','Area','Yes/x10m','Y',1,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'Enhanced Senses',1,2,'Special/Sensory','Persistent','Self','Self','N',2,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'Telekinesis',3,6,'Standard/Attack','Constant','Target','Yes/x10m','Y',3,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'Teleportation',4,8,'Movement','Instant','Self','Self','Y',4,1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,'Mind Link',2,3,'Standard/Sensory','Constant','Self','Yes/x10m','Y',1,1,'2016-02-25 12:09:53','2016-02-25 12:09:53');

/*Table structure for table `saved_settings` */

DROP TABLE IF EXISTS `saved_settings`;

CREATE TABLE `saved_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `base_cost` int(11) DEFAULT NULL,
  `active_cost` int(11) DEFAULT NULL,
  `endurance_cost` int(11) DEFAULT NULL,
  `real_cost` int(11) DEFAULT NULL,
  `penalty_cost` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `saved_settings` */

/*Table structure for table `saved_values` */

DROP TABLE IF EXISTS `saved_values`;

CREATE TABLE `saved_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` float(8,4) DEFAULT NULL,
  `saved_setting_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `modifier_value_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `saved_values` */

/*Table structure for table `section_types` */

DROP TABLE IF EXISTS `section_types`;

CREATE TABLE `section_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `section_types` */

insert  into `section_types`(`id`,`name`,`sort_order`,`created`,`modified`) values 
(1,'Configuration',1,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'Includes',4,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'Required',3,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'Optional',2,'2016-02-25 12:09:53','2016-02-25 12:09:53');

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `target_id` int(11) DEFAULT NULL,
  `section_type_id` int(11) DEFAULT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

/*Data for the table `sections` */

insert  into `sections`(`id`,`target_id`,`section_type_id`,`modifier_id`,`active`,`created`,`modified`) values 
(1,1,4,6,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,1,4,8,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,2,3,16,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,1,4,17,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(6,1,4,18,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(7,1,4,31,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(8,1,4,36,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(9,1,3,32,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(10,1,4,35,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(11,1,1,37,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(12,17,3,46,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(13,17,4,19,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(14,17,4,20,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(21,19,3,47,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(22,2,3,10,NULL,NULL,NULL),
(23,2,4,11,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(24,2,4,28,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(27,5,4,15,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(28,5,3,30,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(29,6,4,12,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(30,6,4,13,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(31,6,4,14,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(32,6,4,15,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(33,6,4,22,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(34,6,3,30,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(35,7,4,12,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(36,7,4,13,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(37,7,4,14,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(38,7,4,22,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(39,7,3,15,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(40,7,3,30,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(41,4,2,12,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(42,4,2,14,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(43,4,2,15,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(44,8,1,40,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(45,8,4,1,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(46,8,3,38,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(47,8,3,39,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(48,11,3,21,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(49,12,1,23,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(50,12,4,1,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(51,12,4,22,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(52,12,4,24,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(53,12,4,28,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(54,12,4,25,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(55,12,4,26,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(56,12,4,29,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(57,12,1,9,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(58,15,4,45,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(59,15,3,30,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(60,15,1,33,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(61,15,3,34,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(62,15,3,41,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(63,15,3,42,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(65,16,4,44,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(66,16,4,45,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(67,16,3,30,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(68,16,1,33,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(69,16,3,34,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(70,16,3,41,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(71,16,3,42,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(73,14,4,27,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(74,14,3,30,NULL,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(75,17,4,54,1,'2016-02-26 21:24:31','2016-02-26 21:24:31'),
(76,8,1,55,NULL,NULL,NULL),
(77,20,4,22,NULL,NULL,NULL),
(78,20,4,20,NULL,NULL,NULL),
(79,20,4,28,NULL,NULL,NULL),
(80,20,3,57,NULL,NULL,NULL),
(82,20,4,59,NULL,NULL,NULL),
(83,20,4,60,NULL,NULL,NULL),
(84,20,3,61,NULL,NULL,NULL),
(85,20,4,62,NULL,NULL,NULL),
(86,22,3,63,NULL,NULL,NULL),
(87,2,3,48,NULL,NULL,NULL),
(88,2,3,49,NULL,NULL,NULL),
(89,17,4,50,NULL,NULL,NULL),
(90,17,4,51,NULL,NULL,NULL),
(91,17,3,52,NULL,NULL,NULL),
(92,17,3,53,NULL,NULL,NULL),
(93,8,3,16,NULL,NULL,NULL),
(94,17,3,16,NULL,NULL,NULL),
(95,20,3,16,NULL,NULL,NULL),
(96,2,4,7,NULL,NULL,NULL),
(97,8,4,7,NULL,NULL,NULL),
(98,17,4,7,NULL,NULL,NULL),
(99,20,4,7,NULL,NULL,NULL),
(100,11,3,64,NULL,NULL,NULL),
(101,15,3,52,NULL,NULL,NULL);

/*Table structure for table `targets` */

DROP TABLE IF EXISTS `targets`;

CREATE TABLE `targets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `power_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `targets` */

insert  into `targets`(`id`,`name`,`sort_order`,`power_id`,`parent_id`,`lft`,`rght`,`created`,`modified`) values 
(1,'All',0,0,NULL,1,44,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(2,'All Enhanced Senses',0,2,1,2,13,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(3,'Find on Self',1,2,2,3,4,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(4,'Simulated Sense: Sight',2,2,2,5,6,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(5,'Detect at LoS without Sight',3,2,2,7,8,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(6,'Detect without LoS (Transport)',4,2,2,9,10,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(7,'Manipulate/Relocate',5,2,2,11,12,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(8,'All Telekinesis',0,3,1,14,21,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(9,'Direct to Self',1,3,8,15,16,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(10,'Direct to Target',2,3,8,17,18,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(11,'Controlled Flight',3,3,8,19,20,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(12,'All Teleportation',0,4,1,22,31,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(13,'Relocate Stiletto',1,4,12,23,24,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(14,'Relocate Self',2,4,12,25,26,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(15,'Relocate Bearer',3,4,12,27,28,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(16,'Relocate Other',4,4,12,29,30,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(17,'All Mind Link',0,5,1,32,37,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(18,'One Bearer',1,5,17,33,34,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(19,'Two Bearers',2,5,17,35,36,'2016-02-25 12:09:53','2016-02-25 12:09:53'),
(20,'All Clairsentience',0,1,1,38,43,NULL,NULL),
(21,'One Bearer',1,1,20,39,40,NULL,NULL),
(22,'Two Bearers',2,1,20,41,42,NULL,NULL);

/*Table structure for table `all_records` */

DROP TABLE IF EXISTS `all_records`;

/*!50001 DROP VIEW IF EXISTS `all_records` */;
/*!50001 DROP TABLE IF EXISTS `all_records` */;

/*!50001 CREATE TABLE  `all_records`(
 `Maneuvers__id` int(11) ,
 `Maneuvers__name` varchar(255) ,
 `Maneuvers__sort_order` int(11) ,
 `Maneuvers__lock_level` int(11) ,
 `Powers__id` int(11) ,
 `Powers__name` varchar(255) ,
 `Powers__sort_order` int(11) ,
 `Powers__lock_level_requirement` int(11) ,
 `Powers__type` varchar(255) ,
 `Powers__duration` varchar(255) ,
 `Powers__target` varchar(255) ,
 `Powers__has_range` varchar(255) ,
 `Powers__use_end` varchar(255) ,
 `Powers__maneuver_id` int(11) ,
 `Powers__active` tinyint(1) ,
 `Targets__id` int(11) ,
 `Targets__name` varchar(255) ,
 `Targets__sort_order` int(11) ,
 `Targets__power_id` int(11) ,
 `SectionTypes__id` int(11) ,
 `SectionTypes__name` varchar(255) ,
 `SectionTypes__sort_order` int(11) ,
 `Sections__id` int(11) ,
 `Sections__target_id` int(11) ,
 `Sections__section_type_id` int(11) ,
 `Sections__modifier_id` int(11) ,
 `Sections__active` tinyint(1) ,
 `Modifiers__id` int(11) ,
 `Modifiers__name` varchar(255) ,
 `Modifiers__lock_level_modifier` float ,
 `Modifiers__sort_order` int(11) ,
 `Modifiers__display_id` int(11) ,
 `Modifiers__default_input_value` int(11) ,
 `Modifiers__modifier_class_id` int(11) ,
 `Modifiers__modifier_type_id` int(11) ,
 `ModifierClasses__id` int(11) ,
 `ModifierClasses__name` varchar(255) ,
 `ModifierClasses__sort_order` int(11) ,
 `ModifierTypes__id` int(11) ,
 `ModifierTypes__name` varchar(255) ,
 `Displays__id` int(11) ,
 `Displays__name` varchar(255) ,
 `ModifierValues__id` int(11) ,
 `ModifierValues__name` varchar(255) ,
 `ModifierValues__lock_level_requirement` int(11) ,
 `ModifierValues__value` float ,
 `ModifierValues__is_default` tinyint(4) ,
 `ModifierValues__sort_order` int(11) ,
 `ModifierValues__modifier_id` int(11) 
)*/;

/*Table structure for table `modifiers_down` */

DROP TABLE IF EXISTS `modifiers_down`;

/*!50001 DROP VIEW IF EXISTS `modifiers_down` */;
/*!50001 DROP TABLE IF EXISTS `modifiers_down` */;

/*!50001 CREATE TABLE  `modifiers_down`(
 `Modifiers__id` int(11) ,
 `Modifiers__name` varchar(255) ,
 `Modifiers__lock_level_modifier` float ,
 `Modifiers__sort_order` int(11) ,
 `Modifiers__display_id` int(11) ,
 `Modifiers__default_input_value` int(11) ,
 `Modifiers__modifier_class_id` int(11) ,
 `Modifiers__modifier_type_id` int(11) ,
 `ModifierClasses__id` int(11) ,
 `ModifierClasses__name` varchar(255) ,
 `ModifierClasses__sort_order` int(11) ,
 `ModifierTypes__id` int(11) ,
 `ModifierTypes__name` varchar(255) ,
 `Displays__id` int(11) ,
 `Displays__name` varchar(255) ,
 `ModifierValues__id` int(11) ,
 `ModifierValues__name` varchar(255) ,
 `ModifierValues__lock_level_requirement` int(11) ,
 `ModifierValues__value` float ,
 `ModifierValues__is_default` tinyint(4) ,
 `ModifierValues__sort_order` int(11) ,
 `ModifierValues__modifier_id` int(11) 
)*/;

/*View structure for view all_records */

/*!50001 DROP TABLE IF EXISTS `all_records` */;
/*!50001 DROP VIEW IF EXISTS `all_records` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `all_records` AS select `Maneuvers`.`id` AS `Maneuvers__id`,`Maneuvers`.`name` AS `Maneuvers__name`,`Maneuvers`.`sort_order` AS `Maneuvers__sort_order`,`Maneuvers`.`lock_level` AS `Maneuvers__lock_level`,`Powers`.`id` AS `Powers__id`,`Powers`.`name` AS `Powers__name`,`Powers`.`sort_order` AS `Powers__sort_order`,`Powers`.`lock_level_requirement` AS `Powers__lock_level_requirement`,`Powers`.`type` AS `Powers__type`,`Powers`.`duration` AS `Powers__duration`,`Powers`.`target` AS `Powers__target`,`Powers`.`has_range` AS `Powers__has_range`,`Powers`.`use_end` AS `Powers__use_end`,`Powers`.`maneuver_id` AS `Powers__maneuver_id`,`Powers`.`active` AS `Powers__active`,`Targets`.`id` AS `Targets__id`,`Targets`.`name` AS `Targets__name`,`Targets`.`sort_order` AS `Targets__sort_order`,`Targets`.`power_id` AS `Targets__power_id`,`SectionTypes`.`id` AS `SectionTypes__id`,`SectionTypes`.`name` AS `SectionTypes__name`,`SectionTypes`.`sort_order` AS `SectionTypes__sort_order`,`Sections`.`id` AS `Sections__id`,`Sections`.`target_id` AS `Sections__target_id`,`Sections`.`section_type_id` AS `Sections__section_type_id`,`Sections`.`modifier_id` AS `Sections__modifier_id`,`Sections`.`active` AS `Sections__active`,`Modifiers`.`id` AS `Modifiers__id`,`Modifiers`.`name` AS `Modifiers__name`,`Modifiers`.`lock_level_modifier` AS `Modifiers__lock_level_modifier`,`Modifiers`.`sort_order` AS `Modifiers__sort_order`,`Modifiers`.`display_id` AS `Modifiers__display_id`,`Modifiers`.`default_input_value` AS `Modifiers__default_input_value`,`Modifiers`.`modifier_class_id` AS `Modifiers__modifier_class_id`,`Modifiers`.`modifier_type_id` AS `Modifiers__modifier_type_id`,`ModifierClasses`.`id` AS `ModifierClasses__id`,`ModifierClasses`.`name` AS `ModifierClasses__name`,`ModifierClasses`.`sort_order` AS `ModifierClasses__sort_order`,`ModifierTypes`.`id` AS `ModifierTypes__id`,`ModifierTypes`.`name` AS `ModifierTypes__name`,`Displays`.`id` AS `Displays__id`,`Displays`.`name` AS `Displays__name`,`ModifierValues`.`id` AS `ModifierValues__id`,`ModifierValues`.`name` AS `ModifierValues__name`,`ModifierValues`.`lock_level_requirement` AS `ModifierValues__lock_level_requirement`,`ModifierValues`.`value` AS `ModifierValues__value`,`ModifierValues`.`is_default` AS `ModifierValues__is_default`,`ModifierValues`.`sort_order` AS `ModifierValues__sort_order`,`ModifierValues`.`modifier_id` AS `ModifierValues__modifier_id` from (((((((((`targets` `Targets` left join `powers` `Powers` on((`Targets`.`power_id` = `Powers`.`id`))) left join `maneuvers` `Maneuvers` on((`Powers`.`maneuver_id` = `Maneuvers`.`id`))) left join `sections` `Sections` on((`Sections`.`target_id` = `Targets`.`id`))) left join `modifiers` `Modifiers` on((`Modifiers`.`id` = `Sections`.`modifier_id`))) left join `modifier_classes` `ModifierClasses` on((`ModifierClasses`.`id` = `Modifiers`.`modifier_class_id`))) left join `modifier_types` `ModifierTypes` on((`ModifierTypes`.`id` = `Modifiers`.`modifier_type_id`))) left join `displays` `Displays` on((`Displays`.`id` = `Modifiers`.`display_id`))) left join `section_types` `SectionTypes` on((`SectionTypes`.`id` = `Sections`.`section_type_id`))) left join `modifier_values` `ModifierValues` on((`ModifierValues`.`modifier_id` = `Modifiers`.`id`))) */;

/*View structure for view modifiers_down */

/*!50001 DROP TABLE IF EXISTS `modifiers_down` */;
/*!50001 DROP VIEW IF EXISTS `modifiers_down` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `modifiers_down` AS select `Modifiers`.`id` AS `Modifiers__id`,`Modifiers`.`name` AS `Modifiers__name`,`Modifiers`.`lock_level_modifier` AS `Modifiers__lock_level_modifier`,`Modifiers`.`sort_order` AS `Modifiers__sort_order`,`Modifiers`.`display_id` AS `Modifiers__display_id`,`Modifiers`.`default_input_value` AS `Modifiers__default_input_value`,`Modifiers`.`modifier_class_id` AS `Modifiers__modifier_class_id`,`Modifiers`.`modifier_type_id` AS `Modifiers__modifier_type_id`,`ModifierClasses`.`id` AS `ModifierClasses__id`,`ModifierClasses`.`name` AS `ModifierClasses__name`,`ModifierClasses`.`sort_order` AS `ModifierClasses__sort_order`,`ModifierTypes`.`id` AS `ModifierTypes__id`,`ModifierTypes`.`name` AS `ModifierTypes__name`,`Displays`.`id` AS `Displays__id`,`Displays`.`name` AS `Displays__name`,`ModifierValues`.`id` AS `ModifierValues__id`,`ModifierValues`.`name` AS `ModifierValues__name`,`ModifierValues`.`lock_level_requirement` AS `ModifierValues__lock_level_requirement`,`ModifierValues`.`value` AS `ModifierValues__value`,`ModifierValues`.`is_default` AS `ModifierValues__is_default`,`ModifierValues`.`sort_order` AS `ModifierValues__sort_order`,`ModifierValues`.`modifier_id` AS `ModifierValues__modifier_id` from ((((`modifiers` `Modifiers` left join `modifier_classes` `ModifierClasses` on((`ModifierClasses`.`id` = `Modifiers`.`modifier_class_id`))) left join `modifier_types` `ModifierTypes` on((`ModifierTypes`.`id` = `Modifiers`.`modifier_type_id`))) left join `displays` `Displays` on((`Displays`.`id` = `Modifiers`.`display_id`))) left join `modifier_values` `ModifierValues` on((`ModifierValues`.`modifier_id` = `Modifiers`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
