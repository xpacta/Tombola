-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.10-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para tombola
CREATE DATABASE IF NOT EXISTS `tombola` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tombola`;

-- Volcando estructura para tabla tombola.concursantes
CREATE TABLE IF NOT EXISTS `concursantes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nomina` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Ganador` int(11) NOT NULL,
  `Time` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nomina` (`Nomina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla tombola.concursantes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `concursantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `concursantes` ENABLE KEYS */;

-- Volcando estructura para tabla tombola.invitados
CREATE TABLE IF NOT EXISTS `invitados` (
  `Nomina` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Departamento` varchar(100) DEFAULT NULL,
  `Puesto` varchar(100) DEFAULT NULL,
  `Participa` varchar(100) DEFAULT NULL,
  `asistio` int(11) NOT NULL,
  PRIMARY KEY (`Nomina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla tombola.invitados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `invitados` DISABLE KEYS */;
/*!40000 ALTER TABLE `invitados` ENABLE KEYS */;

-- Volcando estructura para tabla tombola.regalos
CREATE TABLE IF NOT EXISTS `regalos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Regalo` varchar(200) NOT NULL,
  `Ganador` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla tombola.regalos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `regalos` DISABLE KEYS */;
/*!40000 ALTER TABLE `regalos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
