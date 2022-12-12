-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: huasi_database
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Elena','Nito del Bosque','elena@gmail.com'),(2,'Jacky','Sieras','jacky@gmail.com'),(3,'Monica','Galera','monica@gmail.com'),(5,'Elvis','Teck','elvis@gmail.com'),(6,'Kepa','Jamecho','kepa@gmail.com'),(7,'Andrés','Trozado','andres@gmail.com'),(8,'Helen','Chufe','helen@gmail.com'),(9,'Alex','Tintor','alex@gmail.com'),(10,'Leo','Dario','leo@gmail.com'),(11,'Inés','Sesario','ines@gmail.com'),(12,'Zacarias','Flores','zacarias@gmail.com'),(13,'Armando','Paredes','armando@gmail.com');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,45,'San Juan de Miraflores',5,0),(2,5,9,'Ventanilla Manzana 5 Lote 3 A.A.H.H Victor Raul Haya de la Torre',5,0),(3,11,22,'Cercado de Lima 643',1,0),(4,13,36,'Barranco',3,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `img_url` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Tamalito Verde',14,1,'../img/Entradas_Criollas/entradas_1.jpeg'),(2,'Papa a la Huancaína a la Antigua',26,1,'../img/Entradas_Criollas/entradas_2.jpg'),(3,'Tequeños Huasi de Ají de Gallina',36,1,'../img/Entradas_Criollas/entradas_3.jpg'),(4,'Pastel de Choclo',39,1,'../img/Entradas_Criollas/entradas_4.jpg'),(5,'Papa Rellena',19,1,'../img/Entradas_Criollas/entradas_5.jpg'),(6,'Boliyucas de Queso',29,1,'../img/Entradas_Criollas/entradas_6.jpg'),(7,'La Causa Limeña de Pollo',38,1,'../img/Entradas_Criollas/entradas_7.png'),(8,'Papa a la Huancaína Clásica',26,1,'../img/Entradas_Criollas/entradas_8.jpg'),(9,'Chicharrón de Pollo',38,1,'../img/Entradas_Criollas/entradas_9.jpg'),(10,'La Causa Limeña de Langostinos',39,1,'../img/Entradas_Criollas/entradas_10.jpg'),(11,'Pan con Chicharrón',28,2,'../img/Sanguches/sanguches_1.jpg'),(12,'Sánguche de Lomo',37,2,'../img/Sanguches/sanguches_2.png'),(13,'Sánguche de Pollo a la Parrilla',27,2,'../img/Sanguches/sanguches_3.jpg'),(14,'Anticucho de Corazón de Pollo',36,3,'../img/Anticuchos/anticuchos_1.jpg'),(15,'Anticucho de Pollo',39,3,'../img/Anticuchos/anticuchos_2.jpg'),(16,'Anticucho de Hígado de Pollo',36,3,'../img/Anticuchos/anticuchos_3.jpg'),(17,'El Súper Piqueo Yerbateros',53,3,'../img/Anticuchos/anticuchos_4.jpg'),(18,'Anticucho de Corazón de Res',39,3,'../img/Anticuchos/anticuchos_5.png'),(19,'Anticucho de Lomo Fino',59,3,'../img/Anticuchos/anticuchos_6.jpg'),(20,'Sangrecita',36,4,'../img/Cocina_Criolla/cocina_1.jpg'),(21,'Dúo de Cau Cau con Sangrecita',39,4,'../img/Cocina_Criolla/cocina_2.jpg'),(22,'Cau Cau de Mondongo',49,4,'../img/Cocina_Criolla/cocina_3.jpg'),(23,'Patita con Maní Especial con Todo',39,4,'../img/Cocina_Criolla/cocina_4.jpg'),(24,'Mancha Pecho',39,4,'../img/Cocina_Criolla/cocina_5.jpg'),(25,'Ají de Gallina',39,4,'../img/Cocina_Criolla/cocina_6.jpg'),(26,'Cristal',12,5,'../img/Cervezas/cervezas_1.jpg'),(27,'Cusqueña Malta',12,5,'../img/Cervezas/cervezas_2.jpg'),(28,'Pilsen',12,5,'../img/Cervezas/cervezas_3.jpg'),(29,'Cusqueña Red Lager',12,5,'../img/Cervezas/cervezas_4.png'),(30,'Cusqueña de Trigo',12,5,'../img/Cervezas/cervezas_5.jpg'),(31,'Cusqueña Dorada',12,5,'../img/Cervezas/cervezas_6.jpg'),(32,'San Luis con Gas',8,6,'../img/Aguas/aguas_1.jpg'),(33,'San Mateo sin Gas',9,6,'../img/Aguas/aguas_2.jpg'),(34,'San Luis sin Gas',8,6,'../img/Aguas/aguas_3.jpg'),(35,'Andea con Gas',12,6,'../img/Aguas/aguas_4.jpg'),(36,'San Mateo con Gas',9,6,'../img/Aguas/aguas_5.jpg'),(37,'Andea sin Gas',12,6,'../img/Aguas/aguas_6.jpg'),(38,'Coca Cola',8,7,'../img/Gaseosas/gaseosas_1.jpg'),(39,'Coca Cola Zero',8,7,'../img/Gaseosas/gaseosas_2.jpg'),(40,'Fanta',8,7,'../img/Gaseosas/gaseosas_3.png,7'),(41,'Sprite',8,7,'../img/Gaseosas/gaseosas_4.jpg'),(42,'Inca Kola',8,7,'../img/Gaseosas/gaseosas_5.jpg'),(43,'Evervess (Ginger Ale)',8,7,'../img/Gaseosas/gaseosas_6.jpg'),(44,'Bernad Humbrecht, Francia, Riesling',139,8,'../img/Vinos/vinos_1.jpg'),(45,'Cantina Povero Langhe, Italia',169,8,'../img/Vinos/vinos_2.jpg'),(46,'Cartagena Chile, Garnacha-Syrah',99,8,'../img/Vinos/vinos_3.jpg'),(47,'Catalpa, Argentina, Chardonnay',139,8,'../img/Vinos/vinos_4.jpg'),(48,'Puerco Vin Puerco Espin, Argentina, Cabernet Fran',109,8,'../img/Vinos/vinos_5.jpg'),(49,'Petit Pitacum, España, Mensia',119,8,'../img/Vinos/vinos_6.jpg'),(50,'Jose Santos, Perú, Malbec',139,8,'../img/Vinos/vinos_7.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'samir@gmail.com','8a589d366bcf8a6b128e1bc3e9df442898cccc8e','Samir Raul','Barreto Flores',1),(2,'elena@gmail.com','272c3535af7a4f28febc6a4d95f156601f77e35e','Elena','Nito del Bosque',2),(3,'jacky@gmail.com','8d6ce2cb126b5ae200e25e194fe09b467bb1d5c6','Jacky','Sieras',2),(5,'monica@gmail.com','8b0d7ba4bd87c3c86e7cfea9b9e0f54455787153','Monica','Galera',2),(6,'josephcavero@gmail.com','f1534017511f39ec36886b3795ef1001d7bc5cc7','Joseph Gianfranco','Cavero Ramos',1),(7,'juan@gmail.com','998f73df45b4db51ad37ab6e1a6dbe511c432a66','Juan José','De La Portilla Cárdenas',1),(8,'seiyisuehiro@gmail.com','6070e425bcff7f72cb469739e38936906b1a0083','Seiyi Jeanpierre','Suehiro Castillo',1),(9,'gianpierrevargas@gmail.com','0e608490ef100e5fbe831a99fec609ae0e52f8ae','Gianpierre Javier','Vargas Carrasco',1),(10,'elvis@gmail.com','370b6e1bcf4866310eb589aa7bdbe7d93fd401fd','Elvis','Teck',2),(11,'kepa@gmail.com','8f686c0bf1c9747daeb995c73d89e9db7c5075b1','Kepa','Jamecho',2),(12,'andres@gmail.com','883768b6dd2c42aea0031b24be8a2da40fef4b64','Andrés','Trozado',2),(13,'helen@gmail.com','6469cae2f553d304b9fdfc5c08fe688f83a0ed79','Helen','Chufe',2),(14,'alex@gmail.com','60c6d277a8bd81de7fdde19201bf9c58a3df08f4','Alex','Tintor',2),(15,'leo@gmail.com','1f0a51c36efaa0f44e4899c26d2028681997c8ea','Leo','Dario',2),(16,'ines@gmail.com','fd8db66f2f05d9b8731c71baaceec582265a8fa1','Inés','Sesario',2),(17,'zacarias@gmail.com','00b0725d19ce413c6274ebe3cf293a6677b12298','Zacarias','Flores',2),(18,'armando@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Armando','Paredes',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-12 13:52:55
