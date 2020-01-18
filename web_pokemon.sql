/*
SQLyog Community v12.5.1 (32 bit)
MySQL - 10.4.6-MariaDB : Database - web_pokemon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`web_pokemon` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `web_pokemon`;

/*Table structure for table `element_tb` */

DROP TABLE IF EXISTS `element_tb`;

CREATE TABLE `element_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `element_tb` */

insert  into `element_tb`(`id`,`name`) values 
(1,'Grasss'),
(2,'Poison'),
(3,'Electric'),
(4,'Dragon'),
(5,'Flying');

/*Table structure for table `pokemon_tb` */

DROP TABLE IF EXISTS `pokemon_tb`;

CREATE TABLE `pokemon_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `str` varchar(50) DEFAULT NULL,
  `def` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pokemon_tb` */

insert  into `pokemon_tb`(`id`,`name`,`str`,`def`,`photo`) values 
(1,'Pikachus','scas','',''),
(2,'Bulbasur',NULL,NULL,NULL),
(3,'Rayquaza',NULL,NULL,NULL);

/*Table structure for table `rel_p_e_tb` */

DROP TABLE IF EXISTS `rel_p_e_tb`;

CREATE TABLE `rel_p_e_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pokemon` int(11) DEFAULT NULL,
  `id_element` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `rel_p_e_tb` */

insert  into `rel_p_e_tb`(`id`,`id_pokemon`,`id_element`) values 
(1,2,1),
(2,2,2),
(3,1,3),
(4,3,4),
(5,3,5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
