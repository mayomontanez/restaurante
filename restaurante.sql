CREATE DATABASE  IF NOT EXISTS `restaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `restaurant`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: restaurant
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `alerta`
--

DROP TABLE IF EXISTS `alerta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alerta` (
  `IDALERTA` int(11) NOT NULL AUTO_INCREMENT,
  `ALERTA` varchar(50) NOT NULL,
  PRIMARY KEY (`IDALERTA`),
  UNIQUE KEY `ALERTA` (`ALERTA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alerta`
--

LOCK TABLES `alerta` WRITE;
/*!40000 ALTER TABLE `alerta` DISABLE KEYS */;
INSERT INTO `alerta` VALUES (2,'Ayuda directo a mesa'),(1,'Impresión de cuenta'),(3,'Platillo no ha sido atendido');
/*!40000 ALTER TABLE `alerta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `IDCATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORIA` varchar(70) NOT NULL,
  `IMAGEN` varchar(250) NOT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDCATEGORIA`),
  UNIQUE KEY `CATEGORIA` (`CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Entrada','imgservice-iconentrada.png',1),(2,'Plato Fuerte','imgservice-iconplatofuerte.png',1),(3,'Bebida','imgservice-iconebida.png',1),(4,'Postres','imgservice-iconpostre.png',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `IDCUENTA` int(11) NOT NULL AUTO_INCREMENT,
  `IDMESA` int(11) NOT NULL,
  `ABIERTA` int(11) NOT NULL DEFAULT '1',
  `CANCELADA` int(11) NOT NULL DEFAULT '0',
  `TOTAL` decimal(10,0) NOT NULL DEFAULT '0',
  `PAGADA` int(11) NOT NULL DEFAULT '0',
  `FECHAREG` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDCUENTA`),
  UNIQUE KEY `IDMESA` (`IDMESA`,`FECHAREG`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (1,3,0,0,571,1,'2015-10-31 19:45:59'),(2,0,1,0,0,0,'2015-10-31 19:54:22'),(3,1,0,0,181,1,'2015-10-31 20:53:34'),(4,2,0,0,292,1,'2015-10-31 20:54:23'),(5,4,0,0,91,1,'2015-11-03 20:43:36'),(6,1,0,0,45,1,'2015-11-10 06:58:05'),(7,2,0,0,16,1,'2015-11-10 07:04:44'),(8,1,1,0,137,0,'2015-11-11 19:35:06'),(9,3,1,0,59,0,'2015-11-12 05:53:32'),(10,6,1,0,257,0,'2015-11-14 18:06:58');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa`
--

DROP TABLE IF EXISTS `mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa` (
  `IDMESA` int(11) NOT NULL AUTO_INCREMENT,
  `MESA` varchar(15) NOT NULL,
  `DISPONIBLE` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDMESA`),
  UNIQUE KEY `MESA` (`MESA`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` VALUES (1,'Mesa 1',0),(2,'Mesa 2',1),(3,'Mesa 3',0),(4,'Mesa 4',1),(5,'Mesa 5',1),(6,'Mesa 6',0);
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `IDNOTIFICACION` int(11) NOT NULL AUTO_INCREMENT,
  `IDALERTA` int(11) NOT NULL,
  `IDMESA` int(11) NOT NULL,
  `IDCUENTA` int(11) NOT NULL,
  `FREG` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ENVIADA` int(11) NOT NULL DEFAULT '1',
  `RECIBIDA` int(11) NOT NULL DEFAULT '0',
  `FRECIBIDA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`IDNOTIFICACION`),
  UNIQUE KEY `IDALERTA` (`IDALERTA`,`IDCUENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
INSERT INTO `notificacion` VALUES (1,3,3,9,'2015-11-14 18:26:54',1,0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `IDPEDIDO` int(11) NOT NULL AUTO_INCREMENT,
  `IDCUENTA` int(11) NOT NULL,
  `IDPLATILLO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ENVIADO` int(11) NOT NULL DEFAULT '1',
  `ATENDIDO` int(11) NOT NULL DEFAULT '0',
  `TERMINADO` int(11) NOT NULL DEFAULT '0',
  `CANCELADO` int(11) NOT NULL DEFAULT '0',
  `FECHAREG` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDPEDIDO`),
  KEY `IDCUENTA` (`IDCUENTA`),
  KEY `IDPLATILLO` (`IDPLATILLO`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`IDPLATILLO`) REFERENCES `platillo` (`IDPLATILLO`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,1,16,3,1,1,1,0,'2015-11-14 16:23:49'),(2,1,16,3,1,0,0,0,'2015-11-14 16:23:49'),(3,1,27,2,1,0,0,0,'2015-11-14 16:23:49'),(4,1,13,3,1,1,0,0,'2015-11-14 16:23:49'),(5,1,25,1,1,0,0,0,'2015-11-14 16:23:49'),(6,2,18,2,1,0,0,0,'2015-11-14 16:23:49'),(7,2,7,1,1,0,0,0,'2015-11-14 16:23:49'),(8,1,18,2,1,0,0,1,'2015-11-14 16:23:49'),(9,1,27,2,1,1,1,0,'2015-11-14 16:23:49'),(10,3,27,2,1,1,0,0,'2015-11-14 16:23:49'),(11,3,32,1,1,0,0,0,'2015-11-14 16:23:49'),(12,3,2,1,1,0,0,0,'2015-11-14 16:23:49'),(13,3,13,1,1,0,0,0,'2015-11-14 16:23:49'),(14,4,19,4,1,0,0,0,'2015-11-14 16:23:49'),(15,4,16,4,1,0,0,0,'2015-11-14 16:23:49'),(16,1,15,1,1,0,0,0,'2015-11-14 16:23:49'),(17,5,19,2,1,1,1,0,'2015-11-14 16:23:49'),(18,5,14,1,1,1,0,0,'2015-11-14 16:23:49'),(19,3,18,2,1,1,1,0,'2015-11-14 16:23:49'),(20,6,6,1,1,0,0,0,'2015-11-14 16:23:49'),(21,7,31,3,1,0,0,1,'2015-11-14 16:23:49'),(22,7,27,4,1,0,0,1,'2015-11-14 16:23:49'),(23,7,31,1,1,0,0,0,'2015-11-14 16:23:49'),(24,8,27,1,1,1,1,0,'2015-11-14 16:23:49'),(25,8,27,3,1,1,1,0,'2015-11-14 16:23:49'),(26,8,27,1,1,1,1,0,'2015-11-14 16:23:49'),(27,8,4,1,1,1,1,1,'2015-11-14 16:23:49'),(28,8,21,1,1,1,1,0,'2015-11-14 16:23:49'),(29,9,27,1,1,0,0,0,'2015-11-14 16:23:49'),(30,9,28,1,1,0,0,0,'2015-11-14 16:23:49'),(31,9,28,1,1,0,0,0,'2015-11-14 16:23:49'),(32,10,27,3,1,0,0,0,'2015-11-14 18:06:58'),(33,10,31,1,1,0,0,0,'2015-11-14 18:07:08'),(34,10,16,4,1,0,0,0,'2015-11-14 18:07:16');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platillo`
--

DROP TABLE IF EXISTS `platillo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platillo` (
  `IDPLATILLO` int(11) NOT NULL AUTO_INCREMENT,
  `PLATILLO` varchar(150) NOT NULL,
  `IDCATEGORIA` int(11) NOT NULL,
  `PRECIO` decimal(10,0) NOT NULL,
  `IMG1` varchar(250) NOT NULL,
  `IMG2` varchar(250) DEFAULT NULL,
  `IMG3` varchar(250) DEFAULT NULL,
  `RECETA` varchar(1200) DEFAULT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDPLATILLO`),
  UNIQUE KEY `PLATILLO` (`PLATILLO`),
  KEY `IDCATEGORIA` (`IDCATEGORIA`),
  CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`IDCATEGORIA`) REFERENCES `categoria` (`IDCATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platillo`
--

LOCK TABLES `platillo` WRITE;
/*!40000 ALTER TABLE `platillo` DISABLE KEYS */;
INSERT INTO `platillo` VALUES (1,'Coctel de frutas 1',4,37,'img/platillos/1.jpg',NULL,NULL,'Es una preparación a base de una mezcla de diferentes bebidas, que contiene por lo general uno o más tipos de bebidas alcohólicas, aunque puede ser preparado sin bebidas alcoholicas a base de otros ingredientes como jugos, frutas, miel, leche o crema, especias, etc. También son ingredientes comunes de los cócteles las bebidas carbónicas o refrescos sin alcohol, la soda y el agua tónica.',1),(2,'Coctel de frutas 2',4,31,'img/platillos/2.jpg',NULL,NULL,'Es una preparación a base de una mezcla de diferentes bebidas, que contiene por lo general uno o más tipos de bebidas alcohólicas, aunque puede ser preparado sin bebidas alcoholicas a base de otros ingredientes como jugos, frutas, miel, leche o crema, especias, etc. También son ingredientes comunes de los cócteles las bebidas carbónicas o refrescos sin alcohol, la soda y el agua tónica.',1),(3,'Coctel de frutas 3',4,45,'img/platillos/3.jpg',NULL,NULL,'Es una preparación a base de una mezcla de diferentes bebidas, que contiene por lo general uno o más tipos de bebidas alcohólicas, aunque puede ser preparado sin bebidas alcoholicas a base de otros ingredientes como jugos, frutas, miel, leche o crema, especias, etc. También son ingredientes comunes de los cócteles las bebidas carbónicas o refrescos sin alcohol, la soda y el agua tónica.',1),(4,'Agua de mandarina',3,15,'img/platillos/4.jpg',NULL,NULL,'Rica agua de mandarina para bebés, niños y adultos.',1),(5,'Agua de naranja',3,15,'img/platillos/5.jpg',NULL,NULL,'Rica agua de naranja para bebés, niños y adultos.',1),(6,'Pizza Napolitana',2,45,'img/platillos/6.jpg',NULL,NULL,'Esta pizza napolitana significaba pizza redonda, es originaria de Nápoles y está reconocida como una pizza tradicional en Italia.',1),(7,'English Muffin Pizza de Vegetales',2,35,'img/platillos/7.png',NULL,NULL,'La receta de english muffin pizza de vegetales es una buena alternativa para preparar pizza sin tener que tomar todo el tiempo de preparar la masa de pizza. Con los english muffins tu pizza quedará mucho más esponjosita.',1),(8,'Pozole',2,40,'img/platillos/8.jpg',NULL,NULL,'Una sopa tradicional mexicana que se sirve como plato fuerte.',1),(9,'Croquetas de Atún con Papa',2,37,'img/platillos/9.jpg',NULL,NULL,'Receta de croquetas de atún. Son muy fáciles de hacer y las puedes servir como botana o como plato fuerte.',1),(10,'Ratatouille',2,45,'img/platillos/10.png',NULL,NULL,'El ratatouille es una receta típica francesa, es ideal para vegetarianos como plato fuerte pero también lo puedes servir como guarnición.',1),(11,'Pastel Azteca',2,30,'img/platillos/11.jpg',NULL,NULL,'Un delicioso platillo, ideal para un desayuno o como plato fuerte. El yoghurt aporta un toque uno y además tiene menor contenido de calorías.',1),(12,'Sopes de Cochinita',2,14,'img/platillos/12.jpg',NULL,NULL,'Unos deliciosos sopes de cochinita que puedes preparar como plato fuerte y hacerlos de tamaño grande o para servirlos como botana compra sopes chicos y rellénalos igual.',1),(13,'Enchiladas',2,32,'img/platillos/13.jpg',NULL,NULL,'Esta receta es de un platillo exquisito de enchiladas en la Olla Express. Disfrútalas como desayuno o incluso como plato fuerte y sorprende a toda tu familia con estos deliciosos sabores.',1),(14,'Papas con carne',2,37,'img/platillos/14.jpg',NULL,NULL,'Esta receta es de un platillo de papas con carne para compartir con toda tu familia. Preparalo como plato fuerte y acompaña con una buena ensalada y agua de sabor.',1),(15,'Crepas dulces',4,27,'img/platillos/15.jpg',NULL,NULL,'Uno de los postres más ricos que existen son las crepas. En esta receta aprenderás como preparar la masa para crepas dulces, quedarán listas para que las rellenen con la mermelada que más te gusten.',1),(16,'Pastel Sin Harina de 3 Ingredientes',4,46,'img/platillos/16.jpg',NULL,NULL,'El pastel sin harina es un postre muy fácil de preparar y con un sabor muy rico, perfecto para las personas que están cuidando su figura y quieren consentirse. Es una preparación que no tiene harina, solo tiene 3 ingredientes: clara de huevo, chocolate blanco y queso crema.',1),(17,'Pan de elote casero',4,20,'img/platillos/17.jpg',NULL,NULL,'No hay nada más sabroso que un delicioso pan de elote casero, esta receta mexicana es muy sencilla de elaborar y te aseguramos que te va a quedar deliciosa. Perfecta para llevar como postre a una comida o para compartir con tú familia.',1),(18,'Pastel de Merengue',4,28,'img/platillos/18.jpg',NULL,NULL,'El Pastel de Merengue es un postre muy sabroso, ya que mezcla lo crujiente del merengue, lo suntuoso de la crema batida y lo dulce de las fresas. Con esta preparación vas a sorprender a tus invitados.',1),(19,'Chocolate Caliente',3,27,'img/platillos/19.jpg',NULL,NULL,'Delicioso y calientito chocolate caliente para el día de San Valentín. Prepáralo y sorpréndelo en la mañana con esta deliciosa bebida.',1),(20,'Tinto de Verano',3,39,'img/platillos/20.jpg',NULL,NULL,'Nada como un vaso de Tinto de Verano para que te olvides del calor de verano y comiences a disfrutar de tu tarde libre. Es una receta sencilla y con ingredientes que se tienen a la mano. Es una bebida muy popular de España, generalmente se prepara con un vino joven o tempranillo.',1),(21,'Sangría con Frutas',3,27,'img/platillos/21.jpg',NULL,NULL,'No dejes pasar estas vacaciones sin tomar una copa de este delicioso coctel frutal que alegrará cualquier tarde de verano.',1),(22,'Mojitos',3,37,'img/platillos/22.jpg',NULL,NULL,'Bebida de ron con hierbabuena, limon y azúcar morena.',1),(23,'Margarita Frappé',3,20,'img/platillos/23.jpg',NULL,NULL,'Aquí te presentamos una deliciosa y refrescante bebida hecha con tequila, esté cóctel es muy famoso alrededor del mundo. Ideal para un día caluroso.',1),(24,'Berry Collins',3,40,'img/platillos/24.jpg',NULL,NULL,'Una bebida refrescante y deliciosa, prueba el berry collins, esta receta le encantará a todos.',1),(25,'Martini de Manzana con Arándano',3,40,'img/platillos/25.jpg',NULL,NULL,'Este martini de manzana con arándano te encantará, si eres fan de los martinis dulces, esta es tu mejor opción, te encantará.',1),(26,'Sorbete de Piña con Cava',3,35,'img/platillos/26.jpg',NULL,NULL,'Delicioso postre para brindar estas Navidades. La receta de Sorbete de Piña con Cava es una bebida muy sencilla de preparar, perfecta para utilizarla como postre. ¡Riquísima!.',1),(27,'Mini Quiche Lorraine',1,19,'img/platillos/27.jpg',NULL,NULL,'Quiche Lorraine individuales que funcionan perfecto como entrada en un menú festivo.',1),(28,'Corazones de Alcachofa Gratinados',1,20,'img/platillos/28.jpg',NULL,NULL,'Una deliciosa botana o entrada hecha con alcachofa, huevos, y queso rallado.',1),(29,'Ensalada César con Camarones',1,25,'img/platillos/29.jpg',NULL,NULL,'Una ensalada muy deliciosa, utilizada en muchos restaurantes de la zona y es una buena entrada como primer tiempo.',1),(30,'Taquitos de Jamón y Puré de Papa',1,20,'img/platillos/30.jpg',NULL,NULL,'Esta receta de taquitos de jamón y puré de papa es una rica entrada fácil de hacer y saludable.',1),(31,'Esparragos en Hojaldre y Salsa Blanca',1,16,'img/platillos/31.jpg',NULL,NULL,'Espectacular entrada de esparragos en hojaldre con la clasica salsa francesa \"beurre blanc\" en base a vino blanco y mantequilla.',1),(32,'Tortilla de Patatas',1,24,'img/platillos/32.jpg',NULL,NULL,'Este platillo de tortilla de patatas es un clásico español. Se puede servir como entrada o como botana cortado en cuadritos.',1);
/*!40000 ALTER TABLE `platillo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'restaurant'
--
/*!50003 DROP PROCEDURE IF EXISTS `CERRAR_CUENTA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CERRAR_CUENTA`(IN ID_MESA INT)
BEGIN
	DECLARE ID_CUENTA INT DEFAULT 0;

	SELECT C.IDCUENTA INTO ID_CUENTA
	FROM PEDIDO AS P, CUENTA AS C, PLATILLO AS PL, MESA AS M, CATEGORIA AS CA
	WHERE P.IDCUENTA = C.IDCUENTA AND P.IDPLATILLO = PL.IDPLATILLO AND C.IDMESA = M.IDMESA AND CA.IDCATEGORIA = PL.IDCATEGORIA
	AND PL.ACTIVO = 1 AND P.CANCELADO = 0 AND C.PAGADA = 0 AND P.TERMINADO = 0 
	AND C.FECHAREG = (SELECT MAX(FECHAREG) FROM CUENTA WHERE IDMESA = ID_MESA AND PAGADA = 0) AND M.IDMESA = ID_MESA
	GROUP BY C.IDCUENTA;

	UPDATE CUENTA
	SET ABIERTA = 0, PAGADA = 1
	WHERE IDCUENTA = ID_CUENTA;

	UPDATE MESA
	SET DISPONIBLE = 1
	WHERE IDMESA = ID_MESA;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REG_ALERTAS_TIEMPO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REG_ALERTAS_TIEMPO`(IN MINUTOS INT)
BEGIN
	INSERT INTO NOTIFICACION (IDCUENTA, IDMESA, IDALERTA)
	SELECT IDCUENTA, IDMESA, IDALERTA FROM
	(
	SELECT MAX(TIMESTAMPDIFF(MINUTE, P.FECHAREG, CURRENT_TIMESTAMP)) AS MAXTIME, C.IDCUENTA, M.IDMESA, 3 AS IDALERTA
	FROM PEDIDO AS P, CUENTA AS C, PLATILLO AS PL, MESA AS M, CATEGORIA AS CA
	WHERE P.IDCUENTA = C.IDCUENTA AND P.IDPLATILLO = PL.IDPLATILLO AND C.IDMESA = M.IDMESA AND CA.IDCATEGORIA = PL.IDCATEGORIA
	AND PL.ACTIVO = 1 AND P.CANCELADO = 0 AND C.PAGADA = 0 AND P.TERMINADO = 0 AND C.ABIERTA = 1 AND C.PAGADA = 0
	GROUP BY C.IDCUENTA
	ORDER BY P.FECHAREG
	) AS T WHERE T.MAXTIME > MINUTOS;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REG_PEDIDO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REG_PEDIDO`(IN ID_MESA INT, IN ID_PLATILLO INT, IN CANTIDAD INT)
BEGIN
	DECLARE REGISTRA INT DEFAULT 0;
	DECLARE ID_CUENTA INT DEFAULT 0;
	DECLARE VENTA_TOTAL DOUBLE DEFAULT 0;
	DECLARE PEDIDOSMESA INT DEFAULT 0;
	
	/*SELECT IDCLIENTE INTO ID_MESA
	FROM CLIENTE
	WHERE CORREO = CORREO_CTE;*/

	SELECT COUNT(*) INTO PEDIDOSMESA FROM CUENTA WHERE IDMESA = ID_MESA;
	IF(PEDIDOSMESA = 0) THEN
		SET REGISTRA = 1;
	ELSE
		SELECT CASE WHEN (COUNT(*) - SUM(PAGADA)) = 0 THEN 1 ELSE 0 END INTO REGISTRA
		FROM CUENTA
		WHERE IDMESA = ID_MESA;
	END IF;
	IF (REGISTRA = 1) THEN
		INSERT INTO CUENTA(IDMESA) VALUES (ID_MESA);
		UPDATE MESA
		SET DISPONIBLE = 0
		WHERE IDMESA = ID_MESA;
	END IF;
	
	SELECT IDCUENTA INTO ID_CUENTA
	FROM CUENTA
	WHERE IDMESA = ID_MESA AND FECHAREG = (SELECT MAX(FECHAREG) FROM CUENTA WHERE IDMESA = ID_MESA);

	INSERT INTO PEDIDO(IDCUENTA, IDPLATILLO, CANTIDAD)
	VALUES
	(ID_CUENTA, ID_PLATILLO, CANTIDAD);
	
	SELECT SUM(PL.PRECIO * P.CANTIDAD) INTO VENTA_TOTAL
	FROM PEDIDO AS P, CUENTA AS C, PLATILLO AS PL, MESA AS M
	WHERE P.IDCUENTA = C.IDCUENTA AND P.IDPLATILLO = PL.IDPLATILLO AND C.IDMESA = M.IDMESA AND P.CANCELADO = 0 AND C.PAGADA = 0
	AND M.IDMESA = ID_MESA AND C.FECHAREG = (SELECT MAX(FECHAREG) FROM CUENTA V2 WHERE V2.IDMESA = M.IDMESA)
	GROUP BY C.IDCUENTA;

	UPDATE CUENTA
	SET TOTAL = VENTA_TOTAL
	WHERE IDCUENTA = ID_CUENTA;

	SELECT REGISTRA, ID_MESA, ID_CUENTA, ID_PLATILLO, CANTIDAD;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-14 12:57:38
