-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              8.0.31 - MySQL Community Server - GPL
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database compra
CREATE DATABASE IF NOT EXISTS `compra` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `compra`;

-- Dump della struttura di tabella compra.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `codice_fiscale` varchar(50) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `indirizzo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codice_fiscale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dump dei dati della tabella compra.cliente: ~3 rows (circa)
REPLACE INTO `cliente` (`codice_fiscale`, `nome`, `indirizzo`, `Email`, `Password`) VALUES
	('78019778', 'Alexander Fuentes Medina', 'Lambayeque-Ferreñafe', 'alexanderfuentes@gmail.com', 'admin'),
	('cstfnc91b18z506d', 'Francisco Acosta', 'via vaccarolo', 'acostaj46@gmail.com', 'martinez');

-- Dump della struttura di tabella compra.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `idCompras` int unsigned NOT NULL AUTO_INCREMENT,
  `codice_fiscale` varchar(255) NOT NULL,
  `idPago` int unsigned NOT NULL,
  `FechaCompras` varchar(11) DEFAULT NULL,
  `Monto` double DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCompras`),
  KEY `Compras_FKIndex1` (`idPago`),
  KEY `FK_compras_cliente` (`codice_fiscale`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idPago`) REFERENCES `pago` (`idPago`),
  CONSTRAINT `FK_compras_cliente` FOREIGN KEY (`codice_fiscale`) REFERENCES `cliente` (`codice_fiscale`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dump dei dati della tabella compra.compras: ~0 rows (circa)

-- Dump della struttura di tabella compra.detalle_compras
CREATE TABLE IF NOT EXISTS `detalle_compras` (
  `idDetalle` int unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int unsigned NOT NULL,
  `idCompras` int unsigned NOT NULL,
  `Cantidad` int unsigned DEFAULT NULL,
  `PrecioCompra` double DEFAULT NULL,
  PRIMARY KEY (`idDetalle`,`idProducto`,`idCompras`),
  KEY `Producto_has_Compras_FKIndex1` (`idProducto`),
  KEY `Producto_has_Compras_FKIndex2` (`idCompras`),
  CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  CONSTRAINT `detalle_compras_ibfk_2` FOREIGN KEY (`idCompras`) REFERENCES `compras` (`idCompras`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dump dei dati della tabella compra.detalle_compras: ~0 rows (circa)

-- Dump della struttura di tabella compra.pago
CREATE TABLE IF NOT EXISTS `pago` (
  `idPago` int unsigned NOT NULL AUTO_INCREMENT,
  `Monto` double DEFAULT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dump dei dati della tabella compra.pago: ~0 rows (circa)

-- Dump della struttura di tabella compra.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int unsigned NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(255) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `Stock` int unsigned DEFAULT NULL,
  `codice_fiscale` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `FK_producto_cliente` (`codice_fiscale`),
  CONSTRAINT `FK_producto_cliente` FOREIGN KEY (`codice_fiscale`) REFERENCES `cliente` (`codice_fiscale`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;

-- Dump dei dati della tabella compra.producto: ~22 rows (circa)
REPLACE INTO `producto` (`idProducto`, `Nombres`, `Foto`, `Descripcion`, `Precio`, `Stock`, `codice_fiscale`) VALUES
	(20, 'iPhone 6s', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'iOS 11\nCapacidad 64GB\nChip A9 con arquitectura de 64 bits\nCoprocesador de movimiento M9 integrado\nCamara de 12 Mpx', 700, 100, 'cstfnc91b18z506d'),
	(21, 'iPhone 8 Plus', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'iOS 13 Capacidad 128GB \nChip A9 con arquitectura de 64 bits \nCoprocesador de movimiento M9 integrado Camara de 24 Mpx', 1500, 1000, 'cstfnc91b18z506d'),
	(22, 'iPhone 11 Pro Max', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'iOS 13 Capacidad 128GB Chip A9 con arquitectura de 64 bits Coprocesador de movimiento M9 integrado Camara Dual de 24 Mpx', 1600, 1000, 'cstfnc91b18z506d'),
	(23, 'AirPods - Apple', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Los AirPods ahora te ofrecen una duracion inigualable de 5 horas de audio y hasta 3 horas para hablar con una sola carga', 150, 100, 'cstfnc91b18z506d'),
	(24, 'iPad  Pro - Apple', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Face ID\nEl A12X Bionic es el chip mas inteligente y potente que hemos creado hasta ahora. Capacidad de 256GB Pantalla 4K ', 2400, 1000, 'cstfnc91b18z506d'),
	(25, 'Apple - Pencil', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'El Apple Pencil reinventada la forma de dibujar, tomar notas y marcar documentos para hacerla mÃ¡s intuitiva, precisa y mÃ¡gica.', 200, 1000, 'cstfnc91b18z506d'),
	(26, 'MacBook Air', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Pantalla de retina de alta resolucion 2560 x 1600 La MacBook Air ahora trae Touch ID Capacidad de 1TB SSD Memoria RAM de 16GB DDR4 Intel Core i7 de Septima generacion.', 4500, 1000, 'cstfnc91b18z506d'),
	(28, 'MacBook Pro', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Pantalla de retina de alta resolucion 2560 x 1600 La MacBook Pro ahora trae Touch ID Capacidad de 2TB SSD Memoria RAM de 32GB DDR4 Intel Core i9 de novena generacion.', 16200, 1000, 'cstfnc91b18z506d'),
	(29, 'TV - Apple', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Una forma de ver television como siempre sonaste: tus servicios de streaming favoritos, miles de titulos para comprar o alquilar, e historias originales de Apple TV+ ', 1500, 5000, 'cstfnc91b18z506d'),
	(30, 'Apple Watch Series 3', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Monitorea tu salud, Los calculos Pararse, Moverse y Ejercicio te muestran todos los movimientos que haces diariamente. Nunca te pierdas una llamada o notificacion importante, llamada automaticas', 450, 1200, 'cstfnc91b18z506d'),
	(31, 'iMac Pro - Apple', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Procesador Xeon de\n8, 10, 14 o 18 nucleos\nTurbo Boost de hasta 4.5 GHz\nHasta 42 MB de cache. Gracias al GPU Radeon Pro Vega, la iMac Pro ofrece los graficos mÃ¡s espectaculares de todas las Mac', 5600, 100, 'cstfnc91b18z506d'),
	(32, 'Home Pod - Apple', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'Dimensiones:\n17,2 cm de alto\n14,2 cm de ancho\n\nPeso:\n2,5 kg\n\nColor:\nGris espacial\nBlanco\nWiFi 802.11ac con MIMO\nAcceso directo para invitados\nBluetooth 5.0\nAdmite altavoces en varias habitaciones con AirPlay ', 500, 200, 'cstfnc91b18z506d'),
	(33, 'iPhone 11 Pro max', 'https://i5.walmartimages.com/asr/11ea3121-ac0a-4af5-a0d9-2be5fda85fcb.3672819435a7755194222c3ed907a4f9.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', 'iOS 13 Capacidad 128GB Chip A12 con arquitectura de 64 bits Coprocesador de movimiento M9 integrado Camara de 48 Mpx', 5000, 100, 'cstfnc91b18z506d'),
	(36, 'play', './img/producto/play_2.png', 'es una consola', 15, 10, NULL),
	(37, 'hola', './img/producto/hola_5.png', 'consola', 15, 10, NULL),
	(38, 'playu', './img/producto/playu_25.png', 'cons', 150, 5, 'cstfnc91b18z506d'),
	(39, 'chico', './img/producto/chico_49.png', 'kak', 5, 5, 'cstfnc91b18z506d'),
	(40, 'chii', './img/producto/chii_77.png', 'doko', 15, 5, 'cstfnc91b18z506d'),
	(41, 'hola', './img/producto/hola_30.png', 'lld', 5, 10, 'cstfnc91b18z506d'),
	(42, 'hl', './img/producto/', 'ld', 5, 5, 'cstfnc91b18z506d'),
	(43, 'hola', './img/producto/hola_75.png', 'l', 5, 15, 'cstfnc91b18z506d'),
	(44, 'hola', './img/producto/hola_42.png', '5', 5, 5, 'cstfnc91b18z506d');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
