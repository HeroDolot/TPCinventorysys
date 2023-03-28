/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.27-MariaDB : Database - inventorysys_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventorysys_db` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `inventorysys_db`;

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `brands` */

insert  into `brands`(`brand_id`,`brand_name`) values 
(1,'Asus'),
(2,'Acer'),
(3,'Dell'),
(4,'MSI'),
(5,'HP'),
(6,'Lenovo');

/*Table structure for table `carousel` */

DROP TABLE IF EXISTS `carousel`;

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `carousel` */

insert  into `carousel`(`id`,`foldername`,`names`,`ext`,`category`,`brand`,`quantity`,`label`,`descriptions`) values 
(50,'NewArrival','20230210071740.jpg','jpg','4','Asus',10,'GPU','awawdawda'),
(51,'BrandNew','20230210071757.jpeg','jpeg','1','Acer',20,'Samsung Curve','Renovating the productivity!'),
(52,'Surplus','20230210071813.png','png','1','Acer',7,'SSD 1TB','SSD is the new thing!'),
(53,'NewArrival','20230210172123.jpg','jpg','1','GeForce',10,'GeForce 1060ti','Unleash The Beast!'),
(54,'BrandNew','20230210173434.jpg','jpg','2','Samsung',4,'Samsung Curve Monitor','The all new samsung curved monitor has arrived!'),
(55,'NewArrival','20230210174253.jpg','jpg','1','acer',4,'Awit','qwe'),
(56,'NewArrival','20230210185726.jpg','jpg','1','Samsung',10,'Samsung','The Curved'),
(57,'NewArrival','20230213015703.jpg','jpg','2','Asus',1,'Librada','Abnoy abnoy'),
(58,'BrandNew','20230213082018.jpg','jpg','3','Acer',10,'Oliver','Abnoy Abnoy'),
(60,'3','20230215082326.jpg','jpg','1','2',10,'a','a'),
(61,'NewArrival','20230215083102.png','png','Motherboard','Asus',123,'1231','123'),
(62,'Surplus','20230215083113.jpg','jpg','Monitor','Acer',123,'12312','3123'),
(63,'Surplus','20230216020111.jpg','jpg','Motherboard','Asus',1,'1','1'),
(64,'AddItem','20230216023435.jpg','jpg','Monitor','Acer',123,'aa','aa'),
(65,'NewArrival','20230216024423.png','png','Motherboard','Asus',123,'123','123'),
(66,'NewArrival','20230216035540.png','png','Motherboard','Asus',123,'123','123'),
(67,'Surplus','20230218084739.jpg','jpg','Motherboard','Asus',10,'123','123'),
(68,'Surplus','20230222055035.png','png','Monitor','Asus',1,'asdadas','asdasdas');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `lists_id` varchar(255) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cart` */

insert  into `cart`(`id`,`userid`,`lists_id`,`cart_quantity`) values 
(63,'3','20','2'),
(66,'3','20','1'),
(69,'3','20','3'),
(70,'3','20','5'),
(85,'5','22','4'),
(86,'3','21','1'),
(87,'3','23','4');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`product_type`) values 
(1,'Motherboard'),
(2,'Monitor'),
(3,'Graphics Card'),
(4,'HDD'),
(5,'Fan');

/*Table structure for table `foldernames` */

DROP TABLE IF EXISTS `foldernames`;

CREATE TABLE `foldernames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `foldernames` */

insert  into `foldernames`(`id`,`foldername`) values 
(1,'NewArrival');

/*Table structure for table `lists` */

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ptype` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `lists` */

insert  into `lists`(`id`,`foldername`,`product_code`,`names`,`ext`,`category`,`ptype`,`brand_id`,`price`,`quantity`,`label`,`descriptions`) values 
(21,'AddItem','5GKLJ','20230216095823.jpeg','jpeg','Graphics','Surplus',1,15000,4,'GTX 1060Ti','The Next Generation Gaming GPU has Arrived!'),
(22,'AddItem','23KNZ','20230216160132.jpg','jpg','Monitor','Surplus',2,7000,15,'Monitor Oled 16\"','Curved Monitor 16\" Oled Display'),
(23,'AddItem','444LKN','20230217172649.jpg','jpg','Motherboard','Brand New',3,10000,70,'Meow','Meowski'),
(24,'AddItem','NKZ322','20230218064754.jpg','jpg','Monitor','Brand New',3,5000,10,'Monitor','akwhdakjwhdakjdw'),
(25,'AddItem','CN12LK','20230218084259.jpg','jpg','Motherboard','Brand New',2,10000,15,'awit','1231231312312adawhdakwhdlkawhdkahwdkajwh'),
(26,'AddItem','H230AC','20230227094621.png','png','Monitor','Brand New',4,50000,200,'YouTube','Pa Nga!'),
(28,'AddItem','PKLZNA12','20230304024213.png','png','HDD','Surplus',4,2000,5,'HDD 1TB','DELL NAMBAWAN');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `contact_no` int(255) NOT NULL,
  `delivery_type` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`fullname`,`contact_no`,`delivery_type`,`status`,`user_id`,`cart_id`,`list_id`) values 
(2,'Allan Condiman',343245353,1,0,3,86,21),
(3,'Allan Condiman',343245353,1,0,3,87,23),
(4,'Allan Condiman',343245353,1,0,3,86,21),
(5,'Allan Condiman',343245353,1,0,3,87,23),
(6,'Allan Condiman',343245353,2,0,3,86,21),
(7,'Allan Condiman',343245353,2,0,3,87,23);

/*Table structure for table `procurement` */

DROP TABLE IF EXISTS `procurement`;

CREATE TABLE `procurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `po_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `procurement` */

insert  into `procurement`(`id`,`supplier_name`,`supplier_contact`,`item`,`quantity`,`unit_price`,`total_price`,`po_code`) values 
(1,'Cisco','12345','Graphics Card','1','1','1','PO-8'),
(2,'Cisco','12345','Graphics Card','1','12','12','PO-8');

/*Table structure for table `procurement_number` */

DROP TABLE IF EXISTS `procurement_number`;

CREATE TABLE `procurement_number` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_code` varchar(255) NOT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

/*Data for the table `procurement_number` */

insert  into `procurement_number`(`po_id`,`po_code`) values 
(1,'PO-1'),
(2,'PO-2'),
(3,'PO-1'),
(4,'PO-1'),
(5,'PO-1'),
(6,'PO-1'),
(7,'PO-1'),
(8,'PO-1'),
(9,''),
(10,''),
(11,'PO-13'),
(12,'PO-13'),
(13,'PO-8'),
(14,'PO-8');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `products` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

insert  into `supplier`(`supplier_id`,`supplier_name`,`supplier_contact`) values 
(1,'Cisco','12345'),
(2,'Librada','090909'),
(3,'Reynan','696969'),
(4,'MSI','99999'),
(5,'APPLE','123456789'),
(6,'Acer','09999'),
(7,'asus','0982312'),
(8,'GeForce','112123'),
(9,'amd','3213213'),
(10,'samsung','123123123');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `contact` decimal(15,0) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`uname`,`contact`,`email`,`address1`,`pword`,`roles`) values 
(1,'admin',9055270361,'dolot.hero@gmail.com','#10 Ruby St. Sta Lucia Village PH5 Punturin Valenzuela City','$2y$10$lQxi1M/1hY12cX/eb2hyieOjitEvMi1hPQDjU4zhL1Ql7tXyO11pO','admin'),
(2,'user1',1234,'abcd@gmail.com','abcd','$2y$10$HBKVV94PnxcBT846BDUjgeheanIjIOrK3iyX35yLxhuhIR0hFH2xq','user'),
(3,'user2',123,'abcd@gmail.com','123','$2y$10$FDOkBInFJoeHQkKHU/NzyOia5IS7fqCKx8.KsJ48.rYvNv.9kQKT6','user'),
(5,'user3',123,'123@gmail.com','123','$2y$10$32wUwAhTod73SO7jafTVgOWjCQj8WUFrpISTSoFgkz5B4JkuJaG/m','user'),
(6,'Lexi',123,'123@gmail.com','Meycauayan Bulucan','$2y$10$2ki.f78u8fb4fE3PCeoxweg/jd6Onb/A6aon4QlCvqQKLl5g2vYZG','user'),
(7,'Olive',123,'123@gmail.com','Libtong','$2y$10$SauLAR8ks43dHwe200jSg.DFXEA4X1sj3Esa09y.emWgza7zdGG/a','user'),
(8,'Hero',123,'abc@gmail.com','123','$2y$10$FG0FZk3w6pqSulqMdj1XDuYT2EDfJE4PEXyAnZ31Rs9suKHg9Wnw2','admin'),
(9,'user',123,'123@gmail.com','123','$2y$10$CbNyI9FykZ1I42GqBLRw6uWM6rp9U5Sk.HJS9UAg.roVB0Wh7DYmy','user'),
(10,'Diaz',123,'123@gmail.com','123','$2y$10$SsW3NSMnrsmeQbunXhMHJeoBbLdg6q62arlOaoJ8F7RNAQj0crNs6','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
