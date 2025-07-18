-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dbtren
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `asesor`
--

DROP TABLE IF EXISTS `asesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesor` (
  `id_empleado` int(11) NOT NULL,
  `estacionTrabajo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  CONSTRAINT `asesor_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesor`
--

LOCK TABLES `asesor` WRITE;
/*!40000 ALTER TABLE `asesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `asesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atiende`
--

DROP TABLE IF EXISTS `atiende`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atiende` (
  `id_empleado` int(11) NOT NULL,
  `id_tran` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`,`id_tran`),
  KEY `id_tran` (`id_tran`),
  CONSTRAINT `atiende_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `tripulante_de_cabina` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `atiende_ibfk_2` FOREIGN KEY (`id_tran`) REFERENCES `transporte` (`id_tran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atiende`
--

LOCK TABLES `atiende` WRITE;
/*!40000 ALTER TABLE `atiende` DISABLE KEYS */;
INSERT INTO `atiende` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(5,6),(6,7),(7,8),(8,9),(9,10),(10,11);
/*!40000 ALTER TABLE `atiende` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chofer`
--

DROP TABLE IF EXISTS `chofer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chofer` (
  `id_empleado` int(11) NOT NULL,
  `licencia` varchar(30) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  CONSTRAINT `chofer_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (11,'LIC11111'),(12,'LIC22222'),(13,'LIC33333'),(14,'LIC44444'),(15,'LIC55555'),(16,'LIC66666'),(17,'LIC77777'),(18,'LIC88888'),(19,'LIC99999'),(20,'LIC00000'),(21,'LIC12121'),(22,'LIC23232'),(23,'LIC34343'),(24,'LIC45454'),(25,'LIC56565');
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL AUTO_INCREMENT,
  `clase` varchar(50) NOT NULL,
  `precio_clase` decimal(10,2) NOT NULL,
  `servicios` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_clase`),
  UNIQUE KEY `clase` (`clase`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
INSERT INTO `clase` VALUES (1,'PeruRail Expedition',150.00,'barra libre'),(2,'PeruRail Vistadome',200.00,' tour'),(3,'PeruRail Vistadome Observatory',250.00,'barra libre'),(4,'Hiram Bingham',400.00,'barra libre');
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conduce`
--

DROP TABLE IF EXISTS `conduce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conduce` (
  `id_empleado` int(11) NOT NULL,
  `id_tran` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`,`id_tran`),
  KEY `id_tran` (`id_tran`),
  CONSTRAINT `conduce_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `chofer` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `conduce_ibfk_2` FOREIGN KEY (`id_tran`) REFERENCES `transporte` (`id_tran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conduce`
--

LOCK TABLES `conduce` WRITE;
/*!40000 ALTER TABLE `conduce` DISABLE KEYS */;
INSERT INTO `conduce` VALUES (11,1),(12,2),(13,3),(14,5),(15,4),(16,6),(17,7),(18,8),(19,9),(20,10),(21,13),(22,11),(23,12),(24,14),(25,15);
/*!40000 ALTER TABLE `conduce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `fech_nac` date NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Carlos','Pérez','12345678','1985-03-15','carlos.perez@example.com',39),(2,'María','López','87654321','1990-07-22','maria.lopez@example.com',34),(3,'Juan','García','11223344','1988-11-05','juan.garcia@example.com',36),(4,'Ana','Ramírez','55667788','1995-01-30','ana.ramirez@example.com',29),(5,'Luis','Fernández','99887766','1982-12-12','luis.fernandez@example.com',42),(6,'Laura','Torres','44332211','1993-09-18','laura.torres@example.com',31),(7,'Pedro','Sánchez','76543210','1986-04-10','pedro.sanchez@example.com',38),(8,'Lucía','Martínez','33445566','1991-02-20','lucia.martinez@example.com',33),(9,'Jorge','Ramos','11224455','1984-08-25','jorge.ramos@example.com',40),(10,'Sofía','Mendoza','77889900','1996-12-05','sofia.mendoza@example.com',28),(11,'Eduardo','Navarro','33441122','1983-01-17','eduardo.navarro@example.com',41),(12,'Paula','Silva','I22334455','1992-03-14','paula.silva@example.com',32),(13,'Andrés','Castro','66778899','1987-05-09','andres.castro@example.com',37),(14,'Mónica','Salas','88990011','1994-06-25','monica.salas@example.com',30),(15,'Felipe','Vargas','55663322','1989-07-19','felipe.vargas@example.com',35),(16,'Camila','Paredes','44556677','1993-09-11','camila.paredes@example.com',31),(17,'Alonso','Reyes','99880077','1981-11-02','alonso.reyes@example.com',43),(18,'Verónica','Morales','33445588','1990-12-21','veronica.morales@example.com',34),(19,'Héctor','Campos','77665544','1985-02-16','hector.campos@example.com',39),(20,'Natalia','Guerrero','22113344','1997-04-30','natalia.guerrero@example.com',27),(21,'Sebastián','Vera','99112233','1987-07-03','sebastian.vera@example.com',37),(22,'Isabel','Herrera','77441100','1990-02-10','isabel.herrera@example.com',34),(23,'Diego','Luna','55889911','1983-10-14','diego.luna@example.com',41),(24,'Valeria','Delgado','44775566','1992-05-22','valeria.delgado@example.com',32),(25,'Francisco','Ortega','33446677','1985-11-30','francisco.ortega@example.com',39);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `duracion_viaje` time NOT NULL,
  `id_ruta` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `id_ruta` (`id_ruta`),
  CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,'Regular','2025-07-18','08:00:00','10:30:00','02:30:00',1),(2,'Regular','2025-07-18','10:30:00','12:30:00','02:00:00',1),(3,'Bimodal','2025-07-18','13:00:00','14:30:00','01:30:00',2),(4,'Regular','2025-07-18','16:00:00','19:00:00','03:00:00',3),(6,'Regular','2025-07-19','06:00:00','08:30:00','02:30:00',1),(7,'Bimodal','2025-07-19','09:00:00','11:00:00','02:00:00',1),(8,'Regular','2025-07-19','12:00:00','15:00:00','03:00:00',2),(9,'Regular','2025-07-19','16:00:00','19:30:00','03:30:00',3),(10,'Regular','2025-07-20','06:30:00','08:30:00','02:00:00',1),(11,'Bimodal','2025-07-20','08:30:00','11:00:00','02:30:00',1),(12,'Regular','2025-07-20','12:00:00','15:00:00','03:00:00',2),(13,'Bimodal','2025-07-20','17:00:00','20:00:00','03:00:00',3),(14,'Regular','2025-07-21','07:30:00','09:00:00','01:30:00',1),(15,'Regular','2025-07-21','09:30:00','11:30:00','02:00:00',1),(16,'Bimodal','2025-07-21','15:00:00','17:00:00','02:00:00',3),(17,'Regular','2025-07-18','05:30:00','07:30:00','02:00:00',4),(18,'Bimodal','2025-07-18','13:00:00','15:00:00','02:00:00',4),(19,'Regular','2025-07-19','08:30:00','11:30:00','03:00:00',4),(20,'Regular','2025-07-19','18:00:00','21:00:00','03:00:00',4),(21,'Regular','2025-07-20','12:00:00','14:00:00','02:00:00',4),(22,'Bimodal','2025-07-20','15:00:00','18:00:00','03:00:00',4),(23,'Regular','2025-07-21','10:00:00','13:00:00','03:00:00',4),(24,'Regular','2025-07-18','06:00:00','10:00:00','04:00:00',5),(25,'Bimodal','2025-07-18','14:00:00','16:00:00','02:00:00',5),(26,'Bimodal','2025-07-19','15:00:00','17:00:00','02:00:00',5),(27,'Regular','2025-07-20','07:40:00','09:30:00','01:50:00',5),(28,'Regular','2025-07-20','13:25:00','16:45:00','03:20:00',5),(29,'Regular','2025-07-21','06:30:00','08:35:00','02:05:00',5),(30,'Regular','2025-07-18','07:30:00','10:35:00','03:05:00',6),(31,'Regular','2025-07-18','11:00:00','14:00:00','03:00:00',6),(32,'Bimodal','2025-07-18','14:00:00','16:00:00','02:00:00',7),(33,'Regular','2025-07-18','17:00:00','19:00:00','02:00:00',8),(34,'Regular','2025-07-19','08:00:00','10:00:00','02:00:00',6),(35,'Regular','2025-07-19','11:30:00','13:30:00','02:00:00',6),(36,'Bimodal','2025-07-19','13:30:00','15:30:00','02:00:00',8),(37,'Regular','2025-07-19','15:30:00','17:30:00','02:00:00',7),(38,'Regular','2025-07-20','06:40:00','08:30:00','01:50:00',6),(39,'Bimodal','2025-07-20','08:40:00','12:00:00','03:20:00',3),(40,'Regular','2025-07-20','12:00:00','14:30:00','02:30:00',1),(41,'Regular','2025-07-20','14:30:00','16:30:00','02:00:00',3),(42,'Regular','2025-07-18','10:00:00','13:00:00','03:00:00',12),(43,'Regular','2025-07-19','10:00:00','13:00:00','03:00:00',12),(44,'Regular','2025-07-20','10:00:00','13:00:00','03:00:00',12),(45,'Regular','2025-07-21','10:00:00','13:00:00','03:00:00',12),(46,'Regular','2025-07-18','12:00:00','14:00:00','02:00:00',9),(47,'Regular','2025-07-18','15:00:00','17:00:00','02:00:00',9),(48,'Regular','2025-07-19','08:30:00','10:15:00','01:45:00',9),(49,'Regular','2025-07-19','10:30:00','15:30:00','05:00:00',9),(50,'Regular','2025-07-20','14:30:00','16:45:00','02:15:00',9),(51,'Regular','2025-07-21','07:00:00','09:45:00','02:45:00',9),(52,'Regular','2025-07-18','10:00:00','12:00:00','02:00:00',10),(53,'Regular','2025-07-19','13:00:00','15:00:00','02:00:00',10),(54,'Regular','2025-07-19','16:00:00','18:00:00','02:00:00',10),(55,'Regular','2025-07-20','14:30:00','16:30:00','02:00:00',10),(56,'Regular','2025-07-21','07:30:00','10:15:00','02:45:00',10),(57,'Regular','2025-07-18','08:45:00','10:30:00','01:45:00',11),(58,'Regular','2025-07-19','08:15:00','11:00:00','02:45:00',11),(59,'Regular','2025-07-20','11:00:00','13:00:00','02:00:00',11),(60,'Regular','2025-07-21','15:30:00','17:45:00','02:15:00',11),(61,'Bimodal','2025-07-21','07:45:00','09:00:00','01:15:00',6),(62,'Regular','2025-07-21','09:00:00','10:50:00','01:50:00',6),(63,'Regular','2025-07-21','10:50:00','13:00:00','02:10:00',8),(64,'Regular','2025-07-21','15:30:00','17:15:00','01:45:00',7),(65,'Regular','2025-07-18','08:50:00','18:00:00','09:10:00',13),(66,'Regular','2025-07-19','07:50:00','18:00:00','10:10:00',14),(67,'Regular','2025-07-20','07:50:00','18:00:00','10:10:00',15),(68,'Regular','2025-07-21','07:50:00','18:00:00','10:10:00',13);
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,'Tarjeta','2025-07-17',150.00),(2,'Tarjeta','2025-07-17',300.00),(3,'Tarjeta','2025-07-17',2200.00),(4,'Paypal','2025-07-17',500.00),(5,'Paypal','2025-07-17',300.00),(6,'Tarjeta','2025-07-17',300.00);
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasajero`
--

DROP TABLE IF EXISTS `pasajero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasajero` (
  `id_pasajero` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `tipo_documento` char(50) NOT NULL,
  `numero_documento` char(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `fech_nac` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contacto_compra` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_pasajero`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajero`
--

LOCK TABLES `pasajero` WRITE;
/*!40000 ALTER TABLE `pasajero` DISABLE KEYS */;
INSERT INTO `pasajero` VALUES (2,'Nelly','Carita','M','DNI','40233359','995862449','Peru','2004-12-27','rjarratiap@gmail.com',1),(3,'Laura','Boso','F','DNI','40233359','995862449','Estados Unidos','1970-05-05','zlprofeciaslz@gmail.com',1),(4,'Paulo','Londra','M','DNI','70246176','995862449','Estados Unidos','2000-07-18','zlprofeciaslz@gmail.com',1),(5,' Jhean Paul','Paz','M','DNI','40233359','995862449','Estados Unidos','2004-12-27','zlprofeciaslz@gmail.com',1),(6,'Paul','Arratia ','M','DNI','40233359','995862449','Chile','2004-12-27','zlprofeciaslz@gmail.com',1);
/*!40000 ALTER TABLE `pasajero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasajero_corriente`
--

DROP TABLE IF EXISTS `pasajero_corriente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasajero_corriente` (
  `id_pasajero` int(11) NOT NULL,
  PRIMARY KEY (`id_pasajero`),
  CONSTRAINT `pasajero_corriente_ibfk_1` FOREIGN KEY (`id_pasajero`) REFERENCES `pasajero` (`id_pasajero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajero_corriente`
--

LOCK TABLES `pasajero_corriente` WRITE;
/*!40000 ALTER TABLE `pasajero_corriente` DISABLE KEYS */;
INSERT INTO `pasajero_corriente` VALUES (2),(3),(6);
/*!40000 ALTER TABLE `pasajero_corriente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasajero_empresa`
--

DROP TABLE IF EXISTS `pasajero_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasajero_empresa` (
  `id_pasajero` int(11) NOT NULL,
  `RUC` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `razonSocial` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pasajero`),
  CONSTRAINT `pasajero_empresa_ibfk_1` FOREIGN KEY (`id_pasajero`) REFERENCES `pasajero` (`id_pasajero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajero_empresa`
--

LOCK TABLES `pasajero_empresa` WRITE;
/*!40000 ALTER TABLE `pasajero_empresa` DISABLE KEYS */;
INSERT INTO `pasajero_empresa` VALUES (4,'65165165151','Amp Ciudad Nueva Mz 205 Lt 16','Arte'),(5,'516415616516','Centro','Musica');
/*!40000 ALTER TABLE `pasajero_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasajeros_secundarios`
--

DROP TABLE IF EXISTS `pasajeros_secundarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasajeros_secundarios` (
  `id_pasajerosec` int(11) NOT NULL AUTO_INCREMENT,
  `id_reserva` int(11) NOT NULL,
  PRIMARY KEY (`id_pasajerosec`),
  KEY `id_reserva` (`id_reserva`),
  CONSTRAINT `pasajeros_secundarios_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajeros_secundarios`
--

LOCK TABLES `pasajeros_secundarios` WRITE;
/*!40000 ALTER TABLE `pasajeros_secundarios` DISABLE KEYS */;
INSERT INTO `pasajeros_secundarios` VALUES (1,2),(6,4),(7,5),(8,5),(9,6),(10,6);
/*!40000 ALTER TABLE `pasajeros_secundarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_adulto`
--

DROP TABLE IF EXISTS `ps_adulto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_adulto` (
  `id_pasajerosec` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `tipo_documento` char(50) NOT NULL,
  `numero_documento` char(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `fech_nac` date NOT NULL,
  `contacto_compra` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_pasajerosec`),
  CONSTRAINT `ps_adulto_ibfk_1` FOREIGN KEY (`id_pasajerosec`) REFERENCES `pasajeros_secundarios` (`id_pasajerosec`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_adulto`
--

LOCK TABLES `ps_adulto` WRITE;
/*!40000 ALTER TABLE `ps_adulto` DISABLE KEYS */;
INSERT INTO `ps_adulto` VALUES (1,'Russell Jhean Paul','Arratia Paz','M','DNI','70246176','Afganistán','2000-07-18',0),(6,'Lorena','Lola','F','DNI','40233359','Guatemala','2004-12-27',0),(7,'Juan','Douglas','M','DNI','70246176','Francia','2000-07-18',0),(9,'Jorge','Perez','M','DNI','70246176','Francia','2000-07-18',0);
/*!40000 ALTER TABLE `ps_adulto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_infante`
--

DROP TABLE IF EXISTS `ps_infante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_infante` (
  `id_pasajerosec` int(11) NOT NULL,
  `resposable` char(50) NOT NULL,
  PRIMARY KEY (`id_pasajerosec`),
  CONSTRAINT `ps_infante_ibfk_1` FOREIGN KEY (`id_pasajerosec`) REFERENCES `pasajeros_secundarios` (`id_pasajerosec`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_infante`
--

LOCK TABLES `ps_infante` WRITE;
/*!40000 ALTER TABLE `ps_infante` DISABLE KEYS */;
INSERT INTO `ps_infante` VALUES (8,'secundario_1'),(10,'principal');
/*!40000 ALTER TABLE `ps_infante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_niño`
--

DROP TABLE IF EXISTS `ps_niño`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_niño` (
  `id_pasajerosec` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `tipo_documento` char(50) NOT NULL,
  `numero_documento` char(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `fech_nac` date NOT NULL,
  PRIMARY KEY (`id_pasajerosec`),
  CONSTRAINT `ps_niño_ibfk_1` FOREIGN KEY (`id_pasajerosec`) REFERENCES `pasajeros_secundarios` (`id_pasajerosec`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_niño`
--

LOCK TABLES `ps_niño` WRITE;
/*!40000 ALTER TABLE `ps_niño` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_niño` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_viaje` varchar(50) NOT NULL,
  `tipo_transporte` varchar(50) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_retorno` date DEFAULT NULL,
  `id_pasajero` int(11) NOT NULL,
  `id_horario_ida` int(11) NOT NULL,
  `id_horario_retorno` int(11) DEFAULT NULL,
  `id_pago` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  UNIQUE KEY `id_pago` (`id_pago`),
  KEY `id_pasajero` (`id_pasajero`),
  KEY `id_horario_ida` (`id_horario_ida`),
  KEY `id_horario_retorno` (`id_horario_retorno`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_pasajero`) REFERENCES `pasajero` (`id_pasajero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_horario_ida`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`id_horario_retorno`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (2,'solo_ida','Tren','2025-07-17','2025-07-18','2025-07-20',2,1,NULL,2),(4,'solo_ida','Tren','2025-07-17','2025-07-18',NULL,4,2,NULL,4),(5,'solo_ida','Tren','2025-07-17','2025-07-18',NULL,5,1,NULL,5),(6,'solo_ida','Tren','2025-07-17','2025-07-18',NULL,6,1,NULL,6);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_fisica`
--

DROP TABLE IF EXISTS `reserva_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva_fisica` (
  `id_reserva` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_asesor` (`id_asesor`),
  CONSTRAINT `reserva_fisica_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_fisica_ibfk_2` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_fisica`
--

LOCK TABLES `reserva_fisica` WRITE;
/*!40000 ALTER TABLE `reserva_fisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_virtual`
--

DROP TABLE IF EXISTS `reserva_virtual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva_virtual` (
  `id_reserva` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  CONSTRAINT `reserva_virtual_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_virtual`
--

LOCK TABLES `reserva_virtual` WRITE;
/*!40000 ALTER TABLE `reserva_virtual` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva_virtual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad_origen` varchar(50) NOT NULL,
  `ciudad_destino` varchar(50) NOT NULL,
  `estacion_origen` varchar(50) NOT NULL,
  `estacion_destino` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (1,'Cusco','Machu Picchu','Wanchaq','Machu Picchu'),(2,'Cusco','Machu Picchu','San Pedro','Machu Picchu'),(3,'Cusco','Machu Picchu','Poroy','Machu Picchu'),(4,'Urubamba','Machu Picchu','Urubamba','Machu Picchu'),(5,'Ollantaytambo','Machu Picchu','Ollantaytambo','Machu Picchu'),(6,'Machu Picchu','Cusco','Machu Picchu','Wanchaq'),(7,'Machu Picchu','Cusco','Machu Picchu','San Pedro'),(8,'Machu Picchu','Cusco','Machu Picchu','Poroy'),(9,'Machu Picchu','Urubamba','Machu Picchu','Urubamba'),(10,'Machu Picchu','Ollantaytambo','Machu Picchu','Ollantaytambo'),(11,'Machu Picchu','Hidroelectrica','Machu Picchu','Hidroeléctrica'),(12,'Hidroelectrica','Machu Picchu','Hidroeléctrica','Machu Picchu'),(13,'Puno','Cusco','Puno','Wanchaq'),(14,'Puno','Cusco','Puno','San Pedro'),(15,'Puno','Cusco','Puno','Poroy');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene`
--

DROP TABLE IF EXISTS `tiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene` (
  `id_tran` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`,`id_tran`),
  KEY `id_tran` (`id_tran`),
  CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_tran`) REFERENCES `transporte` (`id_tran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene`
--

LOCK TABLES `tiene` WRITE;
/*!40000 ALTER TABLE `tiene` DISABLE KEYS */;
INSERT INTO `tiene` VALUES (1,1),(5,1),(10,2),(13,3),(14,3),(16,4),(4,6),(6,6),(10,7),(15,8),(8,9),(12,9),(2,10),(5,10),(9,11),(13,12),(6,13),(1,14),(16,14),(8,15),(3,16),(11,16),(4,18),(6,18),(7,19),(16,20),(2,21),(6,22),(15,23),(3,24),(8,25),(2,26),(7,26),(11,27),(15,28),(15,29),(1,30),(7,30),(11,31),(7,32),(10,32),(13,33),(2,34),(7,34),(4,35),(10,35),(13,36),(10,37),(5,38),(10,38),(3,39),(7,39),(14,39),(12,40),(11,41),(4,42),(7,43),(9,44),(15,45),(2,46),(9,47),(3,48),(7,49),(11,50),(2,51),(3,52),(6,53),(7,54),(3,55),(8,56),(5,57),(1,58),(8,59),(4,60),(2,61),(15,61),(11,62),(7,63),(15,63),(16,64),(11,65),(12,66),(14,67),(16,68);
/*!40000 ALTER TABLE `tiene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transporte`
--

DROP TABLE IF EXISTS `transporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transporte` (
  `id_tran` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) NOT NULL,
  `aforo` int(11) NOT NULL,
  PRIMARY KEY (`id_tran`),
  KEY `id_clase` (`id_clase`),
  CONSTRAINT `transporte_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transporte`
--

LOCK TABLES `transporte` WRITE;
/*!40000 ALTER TABLE `transporte` DISABLE KEYS */;
INSERT INTO `transporte` VALUES (1,1,20),(2,1,20),(3,1,20),(4,1,20),(5,2,25),(6,2,25),(7,2,25),(8,2,25),(9,3,30),(10,3,30),(11,3,30),(12,3,30),(13,4,10),(14,4,10),(15,4,10),(16,4,10);
/*!40000 ALTER TABLE `transporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tripulante_de_cabina`
--

DROP TABLE IF EXISTS `tripulante_de_cabina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tripulante_de_cabina` (
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  CONSTRAINT `tripulante_de_cabina_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tripulante_de_cabina`
--

LOCK TABLES `tripulante_de_cabina` WRITE;
/*!40000 ALTER TABLE `tripulante_de_cabina` DISABLE KEYS */;
INSERT INTO `tripulante_de_cabina` VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10);
/*!40000 ALTER TABLE `tripulante_de_cabina` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-17 20:50:27
