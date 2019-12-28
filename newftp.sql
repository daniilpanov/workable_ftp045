-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: newftp
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `constants`
--

DROP TABLE IF EXISTS `constants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constants` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` longtext,
  `translate` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constants`
--

LOCK TABLES `constants` WRITE;
/*!40000 ALTER TABLE `constants` DISABLE KEYS */;
INSERT INTO `constants` VALUES (3,'top-products','upload/images/m1.jpg',NULL),(4,'top-products','upload/images/m2.jpg',NULL),(5,'sidebar-img','upload/images/sidebar1.png',NULL),(6,'sidebar-img','upload/images/sidebar2.png',NULL),(7,'sidebar-img','upload/images/sidebar3.png',NULL),(8,'sidebar-img','upload/images/sidebar4.png',NULL);
/*!40000 ALTER TABLE `constants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` longtext,
  `language` varchar(6) DEFAULT NULL,
  `keywords` tinytext,
  `description` mediumtext,
  `position` bigint(20) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'лестницы','<img class=\"float-left\" alt=\"Лестница\" src=\"files/upload/images/for_2.1.png\">\r\n\r\n<p>\r\n    <span class=\"excl blue\">\r\n        Второй ярус. Для чего нужен и как его оформить\r\n    </span>\r\n<p>\r\n    Разбивка помещения на 2 уровня визуально увеличивает пространство и повышает функциональность небольшой по площади\r\n    комнаты с высокими потолками. Высота потолков определяет возможность использования такого способа зонирования.\r\n    Полноценный второй уровень получится с высотой в 4 метра и более. Если расстояние до потолка 3-3,5 метра,\r\n    то второй уровень делают высотой не менее 1 метра, например для спального места, а внизу располагают гардеробную,\r\n    книжный шкаф, или компьютерный стол.\r\n<p>\r\n    В загородных домах второй уровень можно запланировать еще на этапе проектирования. Таким способом можно увеличить\r\n    гостиную, когда первый ярус плавно по лестнице перетекает на второй. На дополнительном ярусе можно обустроить\r\n    комфортную зону с библиотекой или игровую зону для детей и взрослых или дополнительную спальную зону. При этом по\r\n    затратам такая планировка более привлекательна, чем полноценный второй этаж. Исторически идея развивалась вместе\r\n    со стилем «лофт», при освоении нежилых помещений заброшенных фабрик и мастерских с высокими потолками.\r\n\r\n<p>\r\n    <span class=\"excl blue\">Яркие дизайнерские решения</span>\r\n<p>\r\n    Конструкцию второго уровня для квартир с высотой стен менее 4 метров называют антресолью. Она состоит из опорной\r\n    конструкции, невысокого ограждения (балюстрады), лестницы и основания.\r\n<p>\r\n    Второй ярус в комнате станет островком для спокойного отдыха, чтения книг и творческой работы.\r\n    Это та личная зона, которой так не хватает подросткам в однокомнатной квартире.\r\n<p>\r\n    Наверх удобнее всего поднять спальное место. В таком случае высота яруса будет минимальной.\r\n    Фактически, двух ярусные детские <b>кровати с приставной лестницей</b> и являются таким вторым ярусом.\r\n    Для детей такое спальное место декорируется под корабль или машину или сказочный город. Здесь фантазия дизайнера\r\n    может разыграться в полной мере.\r\n<div class=\"frame row center\">\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.2.png\" alt=\"Двухъярусная кровать\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.3.png\" alt=\"\"></div>\r\n    <div class=\"w-100\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.4.png\" alt=\"\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.5.png\" alt=\"\"></div>\r\n</div>\r\n\r\n<p>\r\n    Люди творческих профессий на втором ярусе обустраивают домашние мастерские или рабочие кабинеты.\r\n    Это позволяет отвлечься от расслабленной домашней обстановки и сосредоточится на работе.\r\n<div class=\"frame row center\">\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.6.png\" alt=\"Двухъярусная кровать\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.7.png\" alt=\"\"></div>\r\n</div>\r\n\r\n<p>\r\n    <img src=\"files/upload/images/for_2.8.png\" alt=\"\" class=\"float-left\">\r\n    Еще один функциональный способ использования второго яруса — обустройство домашней библиотеки.\r\n    В частном доме она может быть солидной, с кожаными креслами в английском стиле.\r\n    Книжные шкафы сплошной стеной до потолка.  Лестница в классическом стиле с резным первым столбом\r\n    и стеновыми панелями.  Частный дом предоставляет больше возможностей для реализации смелых идей.\r\n    Ярусную планировку можно использовать вместо мансардной. Так неполноценный этаж на чердаке заменяют\r\n    открытой площадкой с комфортной высотой потолка.\r\n\r\n<p>\r\n    <img src=\"files/upload/images/for_2.10.png\" alt=\"\" class=\"float-left\">\r\n    <img src=\"files/upload/images/for_2.9.png\" alt=\"\" class=\"float-right\">\r\n    Второй ярус может занимать весь периметр комнаты или холла частного дома.\r\n    Так наверху будет место для нескольких функциональных зон.\r\n\r\n<p>\r\n</p>\r\n\r\n<div class=\"row frame center\">\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.11.png\" alt=\"\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.12.png\" alt=\"\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.13.png\" alt=\"\"></div>\r\n    <div class=\"w-100\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.14.png\" alt=\"\"></div>\r\n    <div class=\"frame-item col-md\"><img src=\"files/upload/images/for_2.15.png\" alt=\"\"></div>\r\n</div>','ru','лестницы','Про лестницы',1,'Лестницы');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-26  9:53:01
