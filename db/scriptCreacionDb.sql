CREATE DATABASE  IF NOT EXISTS `dbinstituto` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `dbinstituto`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: dbinstituto
-- ------------------------------------------------------
-- Server version	5.6.27-log

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
-- Table structure for table `tasignatura`
--

DROP TABLE IF EXISTS `tasignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasignatura` (
  `nombreAsignatura` varchar(45) NOT NULL,
  `descripcionAsig` varchar(90) DEFAULT NULL,
  `numHoras` int(11) NOT NULL,
  PRIMARY KEY (`nombreAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tcapacitacion`
--

DROP TABLE IF EXISTS `tcapacitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tcapacitacion` (
  `idCapacitacion` int(11) NOT NULL,
  `nombreCapacitacion` varchar(45) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`idCapacitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tciclo`
--

DROP TABLE IF EXISTS `tciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tciclo` (
  `nombreCiclo` varchar(45) NOT NULL,
  `grado` enum('Medio','Superior') NOT NULL,
  `modalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`nombreCiclo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tcurso`
--

DROP TABLE IF EXISTS `tcurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tcurso` (
  `nombreCurso` varchar(45) NOT NULL,
  PRIMARY KEY (`nombreCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tobtiene`
--

DROP TABLE IF EXISTS `tobtiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tobtiene` (
  `nombreCicloOb` varchar(45) NOT NULL,
  `idCapacitacionOb` int(11) NOT NULL,
  PRIMARY KEY (`nombreCicloOb`,`idCapacitacionOb`),
  KEY `idCapacitacionObfk_idx` (`idCapacitacionOb`),
  CONSTRAINT `idCapacitacionObfk` FOREIGN KEY (`idCapacitacionOb`) REFERENCES `tcapacitacion` (`idCapacitacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nombreCicloObfk` FOREIGN KEY (`nombreCicloOb`) REFERENCES `tciclo` (`nombreCiclo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tprepara`
--

DROP TABLE IF EXISTS `tprepara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tprepara` (
  `nombreCicloPre` varchar(45) NOT NULL,
  `idSalidaProPre` int(11) NOT NULL,
  PRIMARY KEY (`nombreCicloPre`,`idSalidaProPre`),
  KEY `idSalidaProPrefk_idx` (`idSalidaProPre`),
  CONSTRAINT `idSalidaProPrefk` FOREIGN KEY (`idSalidaProPre`) REFERENCES `tsalidaprofesional` (`idSalidaPro`) ON UPDATE CASCADE,
  CONSTRAINT `nombreCicloPrefk` FOREIGN KEY (`nombreCicloPre`) REFERENCES `tciclo` (`nombreCiclo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tsalidaprofesional`
--

DROP TABLE IF EXISTS `tsalidaprofesional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsalidaprofesional` (
  `idSalidaPro` int(11) NOT NULL,
  `nombreSalidaPro` varchar(45) NOT NULL,
  PRIMARY KEY (`idSalidaPro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ttiene`
--

DROP TABLE IF EXISTS `ttiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttiene` (
  `nombreCicloT` varchar(45) NOT NULL,
  `nombreCursoT` varchar(45) NOT NULL,
  `nombreAsignaturaT` varchar(45) NOT NULL,
  PRIMARY KEY (`nombreCicloT`,`nombreCursoT`,`nombreAsignaturaT`),
  KEY `nombreCursoTfk_idx` (`nombreCursoT`),
  KEY `nombreAsignaturaTfk_idx` (`nombreAsignaturaT`),
  CONSTRAINT `nombreAsignaturaTfk` FOREIGN KEY (`nombreAsignaturaT`) REFERENCES `tasignatura` (`nombreAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nombreCicloTfk` FOREIGN KEY (`nombreCicloT`) REFERENCES `tciclo` (`nombreCiclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nombreCursoTfk` FOREIGN KEY (`nombreCursoT`) REFERENCES `tcurso` (`nombreCurso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tunidadtrabajo`
--

DROP TABLE IF EXISTS `tunidadtrabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tunidadtrabajo` (
  `nombreUT` varchar(45) NOT NULL,
  `descripcionUT` varchar(45) DEFAULT NULL,
  `apuntes` varchar(90) DEFAULT NULL,
  `nombreAsignaturaUT` varchar(45) NOT NULL,
  PRIMARY KEY (`nombreUT`),
  KEY `nombreAsignaturaUTfk_idx` (`nombreAsignaturaUT`),
  CONSTRAINT `nombreAsignaturaUTfk` FOREIGN KEY (`nombreAsignaturaUT`) REFERENCES `tasignatura` (`nombreAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'dbinstituto'
--

--
-- Dumping routines for database 'dbinstituto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-31 20:03:39
