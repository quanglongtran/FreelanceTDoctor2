-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: medicvn
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `packing` text COLLATE utf8_unicode_ci NOT NULL,
  `standard` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `guide` text COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `register_company` text COLLATE utf8_unicode_ci NOT NULL,
  `production_company` text COLLATE utf8_unicode_ci NOT NULL,
  `register_country` text COLLATE utf8_unicode_ci NOT NULL,
  `production_country` text COLLATE utf8_unicode_ci NOT NULL,
  `registered_number` text COLLATE utf8_unicode_ci NOT NULL,
  `warning_medicine` text COLLATE utf8_unicode_ci,
  `assign_medicine` text COLLATE utf8_unicode_ci,
  `contraindication_medicine` text COLLATE utf8_unicode_ci,
  `side_effect_medicine` text COLLATE utf8_unicode_ci,
  `careful_medicine` text COLLATE utf8_unicode_ci,
  `overdose_medicine` text COLLATE utf8_unicode_ci,
  `preservation_medicine` text COLLATE utf8_unicode_ci,
  `forget_take_medicine` text COLLATE utf8_unicode_ci,
  `interactive_medicine` text COLLATE utf8_unicode_ci,
  `possible_pharmacological_medicine` text COLLATE utf8_unicode_ci,
  `pharmacokinetic_medicine` text COLLATE utf8_unicode_ci,
  `type_medicine` text COLLATE utf8_unicode_ci,
  `dosage_forms` text COLLATE utf8_unicode_ci,
  `info_drugs` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speciality`
--

DROP TABLE IF EXISTS `speciality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speciality` (
  `speciality_id` int(11) NOT NULL AUTO_INCREMENT,
  `speciality_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `specialty_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`speciality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speciality`
--

LOCK TABLES `speciality` WRITE;
/*!40000 ALTER TABLE `speciality` DISABLE KEYS */;
INSERT INTO `speciality` VALUES (1,'Nhi','nhi'),(2,'Chuẩn đoán hình ảnh','chuan-doan-hinh-anh'),(3,'Sản phụ khoa','san-phu'),(4,'Da liễu','da-lieu'),(5,'Tiêu hóa - Gan mật','tieu-hoa-gan-mat'),(6,'Thần kinh','than-kinh'),(7,'Tai-Mũi - Họng','tai-mui-hong'),(8,'Cơ Xương Khớp','co-xuong-khop'),(9,'Nhãn khoa','nhan-khoa'),(10,'Nam khoa','nam-khoa'),(11,'Ung bướu','ung-buoi'),(12,'Truyền nhiễm','truyen-nhiem'),(13,'Răng - Hàm - Mặt','rang-ham-mat'),(14,'Hô hấp','ho-hap'),(15,'Dinh dưỡng','dinh-duong'),(16,'Nội tiết','noi-tiet'),(17,'Khám bệnh','kham-benh'),(18,'Tâm thần','tam-than'),(19,'Tim  mạch','tim-mach'),(20,'Thận - Tiết niệu','than-tiet-nieu'),(21,'Thẫm mỹ','tham-my'),(22,'Chấn thương chỉnh hình-Cột sống','chan-thuong-chinh-hinnh-cot-song'),(23,'Hiếm muộn - Vô sinh','hiem-muon-vo-sinh'),(24,'Đa khoa','da-khoa'),(25,'Xét nghiệm','xet-nghiem'),(26,'Huyết học - Truyền máu','huyet-hoc-truyen-mau'),(27,'Dị ứng - Miễn dịch','di-ung-mien-dich'),(28,'Dược','duoc'),(29,'Vật lý trị liệu - Phục hồi chức năng','vat-li-tri-lieu-phuc-hoi-chuc-nang'),(30,'Nội soi','noi-soi'),(31,'Y học cổ truyền','y-hoc-co-truyền'),(32,'Giải phẩu bệnh','giai-phau-benh'),(33,'Lão khoa','lao-khoa'),(34,'Chuẩn đoán hình ảnh','chuan-doan-hinh-anh'),(35,'Di truyền & Sinh học phân tử','di-truyen-va-sinh-hoc-phan-tu'),(36,'Phụ khoa','phu-khoa'),(37,'Kiểm soát nhiễm khuẩn','kiem-soat-nhiem-khuan'),(38,'Sản khoa','san-khoa'),(39,'Nhi tiêu hóa - Gan mật','nhi-tieu-hoa-gan-mat'),(40,'Thú y','thu-y'),(41,'Hồi sức - Cấp cứu','hoi-suc-cap-cuu'),(42,'Nội Thần kinh','noi-than-kinh'),(43,'Phuẩn thuật thẩm mỹ','phau-thuat-tham-my'),(44,'Nội Tiêu hóa - Gan mật','noi-tieu-hoa-gan-mat'),(45,'Thăm do chức năng','tham-do-chuc-nang'),(46,'Gây mê hồi sức','gay-me-hoi-suc'),(47,'Nội Thận - Tiết niệu','noi-than-tiet-nieu'),(48,'Ngoại tiêu hóa - Gan mật','ngoai-tieu-hoa-gan-mat'),(49,'Ngoại Thần kinh','ngoai-than-kinh'),(50,'Nhi Thần kinh','nhi-than-kinh'),(51,'Nhi Ung bướu','nhi-ung-bướu'),(52,'Nha khoa Tổng quat','nha-khoa-tong-quat'),(53,'Chấn thương chỉnh hình mặt','chan-thuong-chinh-hinh-mat'),(54,'Nha khoa Thẩm mỹ','nha-khoa-tham-my'),(55,'Nội Cơ Xương khớp','noi-co-xung-khop'),(56,'Nhi Tim mạch','nhi-tim-mạch'),(57,'Nhi Huyết học - Truyền máu','nhi-huyet-hoc-truyen-mau'),(58,'Nhi Thận - Tiết niệu','nhi-than-tiet-nieu'),(59,'Nhi Dị ứng','nhi-di-ung'),(60,'Nhi Sơ sinh','nhi-so-sinh'),(61,'Vật lý trị liệu','vat-ly-tri-lieu'),(62,'Nội Thẩm mỹ','noi-tham-my'),(63,'Nội tim mạch','noi-tim-mach'),(64,'Ngoại Hô hấp','ngoai-ho-hap'),(65,'Ngoại Thận - Tiết niệu','ngoai-than-tiet-nieu'),(66,'Hoạt động trị liệu','hoat-dong-tri-lieu'),(67,'Nhi Truyền nhiễm','nhi-truyen-nhiem'),(68,'Xét nghiệm vi sinh','xet-nghiem-vi-sinh'),(69,'Ngoại Tim mạch','ngoai-tim-mach'),(70,'Ngoại cơ Xương Khớp','ngoai-co-xuong-khop'),(71,'Nha khoa Phục hình','nha-khoa-phuc-hinh'),(72,'Nội nha','noi-nha'),(73,'Vận động trị liệu','van-dong-tri-lieu'),(74,'Nhi Nội tiết - Chuyển hóa di truyền','nhi-noi-tiet-chuyen-hoa-di-truyen'),(75,'Xét nghiệm hóa sinh','xet-nghiem-hoa-sinh'),(76,'Ngôn ngữ trị liệu','ngon-ngu-tri-lieu');
/*!40000 ALTER TABLE `speciality` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-09  9:18:28
