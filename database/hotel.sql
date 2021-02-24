-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: hotel
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@gmail.com','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billmst`
--

DROP TABLE IF EXISTS `billmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `billmst` (
  `Bill_id` varchar(20) NOT NULL,
  `Booking_id` varchar(20) NOT NULL,
  `Room_id` smallint NOT NULL,
  `Service_id` varchar(7) NOT NULL,
  `Quantity` tinyint NOT NULL,
  PRIMARY KEY (`Bill_id`),
  KEY `Booking_id` (`Booking_id`),
  KEY `Room_id` (`Room_id`),
  KEY `Service_id` (`Service_id`),
  CONSTRAINT `billmst_ibfk_1` FOREIGN KEY (`Booking_id`) REFERENCES `bookingmst` (`Booking_id`),
  CONSTRAINT `billmst_ibfk_2` FOREIGN KEY (`Room_id`) REFERENCES `roommst` (`Room_id`),
  CONSTRAINT `billmst_ibfk_3` FOREIGN KEY (`Service_id`) REFERENCES `servicemst` (`Service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billmst`
--

LOCK TABLES `billmst` WRITE;
/*!40000 ALTER TABLE `billmst` DISABLE KEYS */;
INSERT INTO `billmst` VALUES ('BI110002','AJ00928109',1011,'SV104',2),('BI110003','AJ00928109',1011,'SV101',1),('BI110004','AJ00928109',1011,'SV103',1),('BI110005','MM50928155',1101,'SV104',2),('BI110006','MM50928155',1101,'SV103',2),('BI110007','AJ00965431',203,'SV102',3);
/*!40000 ALTER TABLE `billmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookingmst`
--

DROP TABLE IF EXISTS `bookingmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookingmst` (
  `Booking_id` varchar(20) NOT NULL,
  `Room_id` smallint NOT NULL,
  `User_id` varchar(50) NOT NULL,
  `Date_of_Booking` datetime NOT NULL,
  `Check_in` datetime NOT NULL,
  `Check_out` datetime NOT NULL,
  `No_of_Adults` tinyint NOT NULL,
  `No_of_children` tinyint NOT NULL,
  `Comments` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Booking_id`,`Room_id`),
  KEY `User_id` (`User_id`),
  KEY `Room_id` (`Room_id`),
  CONSTRAINT `bookingmst_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `loginmst` (`User_id`),
  CONSTRAINT `bookingmst_ibfk_2` FOREIGN KEY (`Room_id`) REFERENCES `roommst` (`Room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookingmst`
--

LOCK TABLES `bookingmst` WRITE;
/*!40000 ALTER TABLE `bookingmst` DISABLE KEYS */;
INSERT INTO `bookingmst` VALUES ('AJ00900122',1201,'miloty@gmail.com','2021-01-16 22:34:23','2021-01-20 08:24:25','2021-01-22 12:27:52',2,2,NULL),('AJ00928109',1011,'UdaySighn@gmail.com','2021-01-15 21:22:32','2021-01-20 10:00:55','2021-01-21 12:28:33',1,0,NULL),('AJ00965431',203,'petermachan@gmail.com','2021-01-18 16:22:18','2021-01-26 10:00:55','2021-01-27 11:42:37',2,0,NULL),('BK00928034',202,'jeffpeterson@gmail.com','2021-01-16 10:44:32','2021-01-22 09:10:55','2021-01-23 07:29:44',1,1,NULL),('MM50928155',1101,'UdaySighn@gmail.com','2021-01-17 12:43:27','2021-01-23 06:20:25','2021-01-24 09:55:34',1,0,NULL);
/*!40000 ALTER TABLE `bookingmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `create_account`
--

DROP TABLE IF EXISTS `create_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `create_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `country` varchar(50) NOT NULL,
  `pictrure` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_account`
--

LOCK TABLES `create_account` WRITE;
/*!40000 ALTER TABLE `create_account` DISABLE KEYS */;
INSERT INTO `create_account` VALUES (4,'sunil Vishwakarma','amitvish9999@gmail.com','8190',7275308190,'kolpanday,azamgarh','male','China','img2.png'),(7,'suraj vishwakarma','suraj@gmail.com','8190',9120140055,'kolpanday,azamgarh','male','India','Capture.PNG'),(8,'Om','om@gmail.com','8090',7890809,'bnjkghjbjb','male','india',''),(9,'Ragini Vishwakarma','ragini@gmail.com','1234`',7275540965,'kolpanday(Kolgghat),Azamgarh','male','India','6cy5bLaei.jpg'),(10,'Anjali Vishwakarma','anjali@gmail.com','123',7275308190,'kolpanday azamgarh','male','India','God_Shiva_Wallpaper.jpg'),(11,'mrityunjai','mr8090@gmail.com','8190',71727534567,'kolpghta','male','India','amazing-shiv-shankar-images-3d-shiva-on-pinterest-shiv-shankar-images-3d.jpg'),(12,'sanjeev','sanjeevtech2@gmail.com','1234',9015501897,'Noida','male','India','20171120_175518.jpg'),(13,'Udit Shroff','uditshroff00@gmail.com','mypassword',9512765185,'Sujata FlatsA/9','male','India','Download Happy Diwali Greeting With Diya And Text Space for free.jpg');
/*!40000 ALTER TABLE `create_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customermst`
--

DROP TABLE IF EXISTS `customermst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customermst` (
  `User_id` varchar(50) DEFAULT NULL,
  `Customer_Name` varchar(30) NOT NULL,
  `Customer_Age` tinyint NOT NULL,
  `Gender` enum('Male','Female','Others') NOT NULL,
  `Contact_number` bigint NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `Status` enum('Activated','Deleted') NOT NULL,
  KEY `User_id` (`User_id`),
  CONSTRAINT `customermst_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `loginmst` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customermst`
--

LOCK TABLES `customermst` WRITE;
/*!40000 ALTER TABLE `customermst` DISABLE KEYS */;
INSERT INTO `customermst` VALUES ('jeffpeterson@gmail.com','Jeff Peterson',42,'Male',8839277384,'15th avenue,NY','American','Activated'),('ratan@gmail.com','Ratan Gupta',35,'Male',8822310089,'2-Godrej Heights,Rajastan','Indian','Activated'),('miloty@gmail.com','Milo Ty',29,'Male',99203847562,'236-Central parker,NY','American','Activated'),('UdaySighn@gmail.com','Uday Singh',52,'Male',9937482934,'B7-Sector4,Delhi','Indian','Activated'),('petermachan@gmail.com','Peter Machan',35,'Male',7738433423,'23 Beverely Hills,LA','American','Activated');
/*!40000 ALTER TABLE `customermst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details_slider`
--

DROP TABLE IF EXISTS `details_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `details_slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `caption` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details_slider`
--

LOCK TABLES `details_slider` WRITE;
/*!40000 ALTER TABLE `details_slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `details_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Amit','amitvish9999@gmail.com',7275308190,'Nice');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbackmst`
--

DROP TABLE IF EXISTS `feedbackmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbackmst` (
  `Booking_id` varchar(20) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`Booking_id`),
  CONSTRAINT `feedbackmst_ibfk_1` FOREIGN KEY (`Booking_id`) REFERENCES `bookingmst` (`Booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbackmst`
--

LOCK TABLES `feedbackmst` WRITE;
/*!40000 ALTER TABLE `feedbackmst` DISABLE KEYS */;
INSERT INTO `feedbackmst` VALUES ('AJ00928109','Delightful Experience'),('BK00928034','The best service,Helpful Staff,Best Experience'),('MM50928155','Best View in the city');
/*!40000 ALTER TABLE `feedbackmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginmst`
--

DROP TABLE IF EXISTS `loginmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loginmst` (
  `User_id` varchar(50) NOT NULL,
  `Hashed_Password` varchar(60) NOT NULL,
  `Account_Type` enum('Admin','FDM','Customer') NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginmst`
--

LOCK TABLES `loginmst` WRITE;
/*!40000 ALTER TABLE `loginmst` DISABLE KEYS */;
INSERT INTO `loginmst` VALUES ('A001','Ad@#1200994','Admin'),('FDM1001','12bob34','FDM'),('FDM1002','573883kk','FDM'),('FDM1003','134756tts','FDM'),('jeffpeterson@gmail.com','Jeff12','Customer'),('miloty@gmail.com','ytilo34452','Customer'),('petermachan@gmail.com','Mac1122334','Customer'),('ratan@gmail.com','RT12783','Customer'),('UdaySighn@gmail.com','USRe10092','Customer');
/*!40000 ALTER TABLE `loginmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmst`
--

DROP TABLE IF EXISTS `paymentmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymentmst` (
  `Payment_id` varchar(20) NOT NULL,
  `Booking_id` varchar(20) NOT NULL,
  `Room_id` smallint NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Platform` enum('Credit Card','Debit Card','Net Banking','Cash') NOT NULL,
  `Transaction_id` varchar(20) NOT NULL,
  `Date_and_Time` datetime NOT NULL,
  `Pay_Status` enum('Paid','Pending','Complimentary') NOT NULL,
  PRIMARY KEY (`Payment_id`),
  KEY `Room_id` (`Room_id`),
  KEY `Booking_id` (`Booking_id`),
  CONSTRAINT `paymentmst_ibfk_1` FOREIGN KEY (`Room_id`) REFERENCES `roommst` (`Room_id`),
  CONSTRAINT `paymentmst_ibfk_2` FOREIGN KEY (`Booking_id`) REFERENCES `bookingmst` (`Booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmst`
--

LOCK TABLES `paymentmst` WRITE;
/*!40000 ALTER TABLE `paymentmst` DISABLE KEYS */;
INSERT INTO `paymentmst` VALUES ('PI1270002','AJ00928109',1101,35000.00,'Credit Card','AKLL45332667','2021-01-21 12:28:33','Paid'),('PI1272992','AJ00965431',203,160000.00,'Net Banking','AKLL45332667','2021-01-21 12:28:33','Paid'),('PI1277384','BK00928034',1011,12000.00,'Cash','AJKLB4433225','2021-01-23 07:29:44','Paid'),('PI1288394','MM50928155',1101,24000.00,'Cash','ABHU9982907','2021-01-24 09:55:34','Paid'),('PI1345066','AJ00900122',1201,50000.00,'Debit Card','BKOO21328876','2021-01-22 12:27:52','Pending');
/*!40000 ALTER TABLE `paymentmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_booking_details`
--

DROP TABLE IF EXISTS `room_booking_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_booking_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int NOT NULL,
  `contry` varchar(50) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` varchar(6) NOT NULL,
  `check_out_date` date NOT NULL,
  `Occupancy` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_booking_details`
--

LOCK TABLES `room_booking_details` WRITE;
/*!40000 ALTER TABLE `room_booking_details` DISABLE KEYS */;
INSERT INTO `room_booking_details` VALUES (5,'Sumit','sumit@gmail.com',7398713060,'kolpanday,azamgarh','Azamgarh','U.P.',276001,'India','Deluxe Room','2019-12-05','12:00','2019-01-06','single'),(6,'Om','om@gmail.com',7890809,'bnjkghjbjb','azamgarh','up',276001,'India','Deluxe Room','2019-05-08','08:00','2019-06-04','single'),(7,'Ragini Vishwakarma','ragini@gmail.com',727550965,'Kolpanday,Kolghat,Azamgarh','Azamgarh','U.P',276001,'India','Standard Room','2019-12-06','08:00','2019-12-06','single'),(8,'Anlaji viahwakarma','anjali@gmail.com',7275308190,'kolpanday azamgarh','azamgarh','U.P',276001,'India','Standard Room','2019-12-06','08:00','2019-12-06','single'),(12,'sanjeev','sanjeevtech2@gmail.com',0,'dfjdlfj','','',0,'','Suite Room','2019-05-22','22:57','2017-10-31','single');
/*!40000 ALTER TABLE `room_booking_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roommst`
--

DROP TABLE IF EXISTS `roommst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roommst` (
  `Room_id` smallint NOT NULL,
  `Room_type` varchar(10) DEFAULT NULL,
  `Room_tariff` decimal(10,2) NOT NULL,
  `Room_Status` enum('Reserved','Vacant','Occupied','Unavailable') NOT NULL,
  `Notes` varchar(450) DEFAULT NULL,
  `Active_Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Room_id`),
  KEY `fk_room_type` (`Room_type`),
  CONSTRAINT `fk_room_type` FOREIGN KEY (`Room_type`) REFERENCES `roomtypemst` (`Room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roommst`
--

LOCK TABLES `roommst` WRITE;
/*!40000 ALTER TABLE `roommst` DISABLE KEYS */;
INSERT INTO `roommst` VALUES (201,'RM102',20000.00,'Unavailable','Complains about broken air conditioning. lel',1),(202,'RM101',20000.00,'Occupied','',1),(203,'RM101',20000.00,'Vacant','',1),(1011,'RM101',7000.00,'Occupied','',1),(1012,'RM101',7000.00,'Unavailable','Stains on the room floor, to get cleaned',1),(1013,'RM101',7000.00,'Occupied','',1),(1101,'RM103',12000.00,'Vacant','',1),(1201,'RM104',25000.00,'Reserved','Reserved for Mr. and Mrs. Das',1),(1202,'RM104',25000.00,'Unavailable','',1);
/*!40000 ALTER TABLE `roommst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `room_no` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` bigint NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (28,512,'Deluxe Room',15000,'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.','delux_img1.jpg'),(30,504,'Luxurious Suite',16000,'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.','Luxury_img10.jpg'),(31,302,'Standard Room',14000,'Simple design king bedded room are well equipped with modern amenities.','Standard _img16.jpg'),(32,312,'Suite',13000,'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.','Suit_img22.jpg'),(33,205,'Twin Deluxe Room',120000,'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.','Twin_img24.jpg'),(34,0,'Parking Area',0,'ON-SITE PARKING Comfort Hotel Perth City provides 33 secure car parking spaces, free-of-charge for house guests which are subject to availability and on a ...\r\n','parking.jpg');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roomtypemst`
--

DROP TABLE IF EXISTS `roomtypemst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roomtypemst` (
  `Room_type_id` varchar(10) NOT NULL,
  `Room_Name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Room_tariff` decimal(10,2) DEFAULT NULL,
  `Room_desc` varchar(450) NOT NULL,
  PRIMARY KEY (`Room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roomtypemst`
--

LOCK TABLES `roomtypemst` WRITE;
/*!40000 ALTER TABLE `roomtypemst` DISABLE KEYS */;
INSERT INTO `roomtypemst` VALUES ('RM101','Deluxe Room Sea View','1.png',20000.00,'These picturesque sea-facing suites are carefully designed & lavishly appointed offering panoramic views of the Arabian Sea. With a large living area, expansive bedroom and a marble-finished bathroom with a tub, these suites are spacious and airy. The suites also boast of a lovely balcony that overlooks the Gateway of India. These include two way airport transfers and breakfast.'),('RM102','Deluxe Room City View','1.png',7000.00,'Located on higher floors of the Tower, these contemporary rooms are tastefully appointed, offering uninterrupted views of the Mumbai skyline. Fully equipped with all modern facilities, digital connectivity and excellent service, these rooms also offer access to the hotel?s gymnasium and spa. These rooms also feature a balcony with arched windows.'),('RM103','Superior Room Sea View','1.png',12000.00,'Overlooking the Gateway of India & the Arabian Sea, the 26 sq. mt. Superior Sea View rooms are designed with a blend of Indian aesthetics and European flair. Fully equipped with all modern facilities, digital connectivity and excellent service, the rooms at The Bliss also offer access to the hotel?s gymnasium and spa. These rooms also feature a balcony with arched windows offering panoramic views of the sea.'),('RM104','Apollo Suite 1 Bedroom Sea View','1.png',25000.00,'These picturesque sea-facing suites are carefully designed & lavishly appointed offering panoramic views of the Arabian Sea. With a large living area, expansive bedroom and a marble-finished bathroom with a tub, these suites are spacious and airy. The suites also boast of a lovely balcony that overlooks the Gateway of India. These include two way airport transfers and breakfast.');
/*!40000 ALTER TABLE `roomtypemst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicemst`
--

DROP TABLE IF EXISTS `servicemst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicemst` (
  `Service_id` varchar(7) NOT NULL,
  `Supply_id` varchar(10) DEFAULT NULL,
  `Service_Name` varchar(30) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Active_Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Service_id`),
  KEY `Supply_id` (`Supply_id`),
  CONSTRAINT `servicemst_ibfk_1` FOREIGN KEY (`Supply_id`) REFERENCES `suppliesmst` (`Supply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicemst`
--

LOCK TABLES `servicemst` WRITE;
/*!40000 ALTER TABLE `servicemst` DISABLE KEYS */;
INSERT INTO `servicemst` VALUES ('SV101',NULL,'Room_Restock',0.00,1),('SV102','S109','Mini_bar_Juice',250.00,1),('SV103','S110','Mini_bar_Chips',100.00,1),('SV104','S111','Mini_bar_Nuts',300.00,1),('SV105','S112','Mini_bar_Powerbar',250.00,1),('SV106',NULL,'Tea',40.00,1),('SV107','S113','Bulbs',20.00,1);
/*!40000 ALTER TABLE `servicemst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (18,'Slider4.jpg','Come and Enjoy your stay'),(19,'Slider2.jpg','Luxury Vacations, Premium Experience'),(20,'Slider5.jpg','Incredible Sea View');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffattendancemst`
--

DROP TABLE IF EXISTS `staffattendancemst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffattendancemst` (
  `Staff_id` varchar(12) NOT NULL,
  `Clock_in` timestamp NOT NULL,
  `Clock_out` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Staff_id`,`Clock_in`),
  CONSTRAINT `staffattendancemst_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `staffmst` (`Staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffattendancemst`
--

LOCK TABLES `staffattendancemst` WRITE;
/*!40000 ALTER TABLE `staffattendancemst` DISABLE KEYS */;
INSERT INTO `staffattendancemst` VALUES ('A001','2021-01-01 02:22:00','2021-01-02 16:00:00'),('A001','2021-02-19 15:20:00',NULL),('A001','2021-02-19 15:22:00','2021-02-19 19:52:00'),('A001','2021-02-19 17:23:00','2021-02-19 21:53:00'),('A001','2021-02-24 09:23:00','2021-02-24 09:24:00'),('A101','2021-01-22 04:00:25','2021-01-22 16:55:54'),('BB101','2021-01-22 03:30:45','2021-01-22 17:21:58'),('BB101','2021-01-22 04:30:52','2021-12-22 16:50:33'),('FDM1001','2021-10-22 16:30:45','2021-10-22 05:00:33'),('HK1201','2021-01-22 16:50:55','2021-01-22 05:20:55'),('HK1202','2021-01-22 04:30:45','2021-01-22 16:50:55'),('HK1202','2021-11-22 04:30:15','2021-01-22 17:01:23'),('qwerty','2021-02-21 15:13:00','2021-02-21 15:13:00'),('qwerty','2021-02-21 15:52:00',NULL);
/*!40000 ALTER TABLE `staffattendancemst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffmst`
--

DROP TABLE IF EXISTS `staffmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffmst` (
  `Staff_id` varchar(12) NOT NULL,
  `User_id` varchar(50) DEFAULT NULL,
  `Staff_Name` varchar(30) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Salary` bigint NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Age` tinyint NOT NULL,
  `Gender` enum('Male','Female','Others') NOT NULL,
  `Contact_number` bigint NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Leaves_per_month` tinyint NOT NULL,
  `Unclaimed_leave` tinyint NOT NULL,
  `Active_Status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`Staff_id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `staffmst_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `loginmst` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffmst`
--

LOCK TABLES `staffmst` WRITE;
/*!40000 ALTER TABLE `staffmst` DISABLE KEYS */;
INSERT INTO `staffmst` VALUES ('A001','A001','Ram Kumar','Senior Manager',50000,'701-Kala Buildings,Nr.SB Bank,Dwarka',45,'Male',8893209311,'parking.jpg',4,9,1),('A101',NULL,'Abhi chopra','Accountant',90000,'801 Palace,sector21',28,'Female',9283558393,'A101',4,3,1),('BB101',NULL,'Ramesh Jain','Bellboy',34000,'302 northside park,sector23',37,'Female',9374832929,'tb.jpg',4,1,1),('FDM1001','FDM1001','Leela Agrawaal','FrontdeskManager',35000,'212 nirmal park,sector12',36,'Female',9764924321,'FDM1001',4,2,1),('FDM1002','FDM1002','Meena Soni','FrontdeskManager',34000,'302 northside park,sector23',37,'Female',9374832929,'FDM1002',4,5,1),('FDM1003','FDM1003','Rohan Haldani','FrontdeskManager',30000,'302 Amar residency,sector23',37,'Male',9993746451,'FDM1003',4,4,1),('GM101',NULL,'Sheena Chowdhary','General Manager',90000,'B1 Prism Society,sector15',55,'Male',9296541929,'GM101',4,5,1),('HK1201',NULL,'Tina Patel','HouseKeeper',6000,'2 StaffQuaters,sector23',41,'Female',9373444929,'HK1201',4,2,1),('HK1202',NULL,'Raju Patel','HouseKeeper',6000,'7 StaffQuaters,sector23',32,'Male',9227149269,'HK1202',4,9,1),('qwerty',NULL,'Ash Ketchump','manager',11000,'din da hood',37,'Others',123456,'WhatsApp Image 2020-11-01 at 19.25.33 (2).jpeg',7,6,1);
/*!40000 ALTER TABLE `staffmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliesmst`
--

DROP TABLE IF EXISTS `suppliesmst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliesmst` (
  `Supply_id` varchar(10) NOT NULL,
  `Vendor_id` varchar(6) DEFAULT NULL,
  `Supply_Name` varchar(20) DEFAULT NULL,
  `Category` enum('Cleaning','tools','linens','toiletries','electrical','others','stationery','Snacks') NOT NULL,
  `Stock` smallint NOT NULL,
  `Last_restocked` date NOT NULL,
  `Active_Status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`Supply_id`),
  KEY `Vendor_id` (`Vendor_id`),
  CONSTRAINT `suppliesmst_ibfk_1` FOREIGN KEY (`Vendor_id`) REFERENCES `vendormst` (`Vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliesmst`
--

LOCK TABLES `suppliesmst` WRITE;
/*!40000 ALTER TABLE `suppliesmst` DISABLE KEYS */;
INSERT INTO `suppliesmst` VALUES ('S101','V101','Soap','toiletries',111,'2021-02-21',0),('S102','V101','Shampoo','toiletries',14,'2021-02-24',0),('S103','V101','Conditioner','toiletries',200,'2021-02-24',1),('S104','V101','Hand Wash','toiletries',177,'2021-02-24',1),('S105','V101','ToothPaste','toiletries',177,'2021-02-24',1),('S106','V108','King Size bed sheets','linens',172,'2021-02-15',1),('S107','V106','Cushion Cover','linens',172,'2021-03-15',1),('S108','V103','Sanitizer','toiletries',172,'2021-03-16',1),('S109','V107','Chips','Snacks',74,'2021-03-17',1),('S110','V107','Juice','Snacks',32,'2021-03-17',1),('S111','V107','Nuts','Snacks',47,'2021-03-17',1),('S112','V107','PowerBar','Snacks',88,'2021-02-17',1),('S113','V102','Bulbs','electrical',168,'2021-02-15',1),('S114','V102','Swtiches','electrical',170,'2021-02-21',1);
/*!40000 ALTER TABLE `suppliesmst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendormst`
--

DROP TABLE IF EXISTS `vendormst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendormst` (
  `Vendor_id` varchar(6) NOT NULL,
  `Vendor_Name` varchar(30) NOT NULL,
  `Contact_Number` bigint NOT NULL,
  `Comments` varchar(50) DEFAULT NULL,
  `Active_Status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`Vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendormst`
--

LOCK TABLES `vendormst` WRITE;
/*!40000 ALTER TABLE `vendormst` DISABLE KEYS */;
INSERT INTO `vendormst` VALUES ('V101','BoutiquePVTLTD',9228394773,'Best price',1),('V102','John Hardware',9257773173,NULL,1),('V103','ModiCare',9288455362,'fastest Delivery',1),('V104','Goderj Chemicals',9134567333,NULL,1),('V105','Decor',9992283451,NULL,1),('V106','Raymonds Blankets',9884563723,'Really great service',1),('V107','Novelty Snacks',7281920033,'Best Price',1),('V108','Ashok Linens',23897492,'good linens for good price\r\ntalk to Mr. Chirag',1);
/*!40000 ALTER TABLE `vendormst` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-24 18:08:47
