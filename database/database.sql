-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: WISPCH
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idOferta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idCarrito`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idOferta` (`idOferta`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idOferta`) REFERENCES `ofertas` (`idOferta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'GAMER','Menor ping o latencia para mejorar tu jugabilidad y desempeño '),(2,'BASICO','Enfocado para realizar tus tareas cotidianas '),(3,'EMPRESAS','Soporte a la medida a las empresas redundante'),(4,'HOGAR','Enfocado para familias con múltiples integrantes ');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'ELOY','GARCIA','3531034610'),(4,'ELOY','GARCIA','3531034610'),(5,'ELOY','GARCIA','3531034610'),(6,'ELOY','GARCIA','3531034610'),(7,'ELOY','GARCIA','3531034610'),(8,'ELOY','GARCIA','3531034610'),(9,'ELOY','GARCIA','3531034610'),(10,'ELOY','GARCIA','3531034610'),(11,'','','3531034610'),(12,'','','3531021709'),(13,'','','12324'),(14,'','','12324'),(15,'','','353125'),(16,'','','353125'),(17,'Eloy','Garcia Ceja','353-103-4610'),(18,'comunicacion','Garcia','+523531034610'),(19,'comunicacion','Garcia','+523531034610'),(20,'comunicacion','Garcia','+523531034610'),(21,'Eloy','Garcia','+1 23531034610'),(22,'Eloy','Garcia','+1 23531034610'),(23,'Eloy','Garcia','+1 23531034610'),(24,'Eloy','Garcia','+523531034610'),(25,'Eloy','Garcia','+523531034610'),(26,'Eloy','Garcia','+523531034610'),(27,'comunicacion','Garcia','+523531034610'),(28,'Eloy','Garcia','(523) 531-0346'),(29,'comunicacion','Garcia','(523) 531-0346'),(30,'Giovanni','Hernandez','(353) 123-4567'),(31,'Eloy','Garcia','(523) 531-0346'),(32,'Eloy','Garcia','(523) 531-0346'),(33,'Eloy','Garcia','(523) 531-0346'),(34,'Eloy','Garcia','(523) 531-0346');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcciones` (
  `idDireccion` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `referencia` text NOT NULL,
  `numero` varchar(10) NOT NULL,
  `numerointerno` varchar(10) DEFAULT NULL,
  `entrecalles` varchar(20) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idDireccion`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formaspago`
--

DROP TABLE IF EXISTS `formaspago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formaspago` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `formaPago` varchar(100) NOT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formaspago`
--

LOCK TABLES `formaspago` WRITE;
/*!40000 ALTER TABLE `formaspago` DISABLE KEYS */;
/*!40000 ALTER TABLE `formaspago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ofertas` (
  `idOferta` int(11) NOT NULL AUTO_INCREMENT,
  `idPaquete` int(11) NOT NULL,
  `porcentaje` decimal(10,0) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idOferta`),
  KEY `idPaquete` (`idPaquete`),
  CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`idPaquete`) REFERENCES `paquetes` (`idPaquete`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ofertas`
--

LOCK TABLES `ofertas` WRITE;
/*!40000 ALTER TABLE `ofertas` DISABLE KEYS */;
INSERT INTO `ofertas` VALUES (8,10,10,1),(9,11,0,0),(11,13,18,1),(12,14,0,0),(13,15,15,1),(14,16,0,0),(15,17,10,1);
/*!40000 ALTER TABLE `ofertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquetes` (
  `idPaquete` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nombrepaquete` varchar(100) DEFAULT NULL,
  `megas` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idPaquete`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `paquetes_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
INSERT INTO `paquetes` VALUES (10,1,'ELRUBIOS','20','Enfocado a los Streamings','',600,540.00),(11,1,'PLAY','10','Enfocado al Gamer Casual',NULL,450,450.00),(13,3,'Business initial','40','Enfocado a pequeñas empresas',NULL,150,123.00),(14,3,'Premium','100','Enfocado a empresas medianas',NULL,4000,4000.00),(15,4,'Family','15','Enfocado a la familia',NULL,350,297.50),(16,4,'Series And Movies','20','Enfocado para los cinefilos',NULL,500,500.00),(17,2,'Ofimatica','5','Realiza sus actividades diarias',NULL,300,270.00);
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contraseña` text NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'WINELOY@OUTLOOK.COM','TUPUTAMADRE12'),(2,9,'WINELOsY@OUTLOOK.COM','TUPUsTAMADRE12'),(4,17,'wineloy@yahoo.com.mx','ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),(8,27,'wineloy@yahoo.com','e13efc991a9bf44bbb4da87cdbb725240184585ccaf270523170e008cf2a3b85f45f86c3da647f69780fb9e971caf5437b3d06d418355a68c9760c70a31d05c7'),(9,30,'gio@gmail.com','ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),(10,34,'wineloy@yahoo.com.mxw','ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'WISPCH'
--
/*!50003 DROP PROCEDURE IF EXISTS `CrearPaquetes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearPaquetes`(
	in _idCategoria integer,
    in _nombrePaquete varchar(100),
    in _velocidad varchar(100), #megas
    in _descripcion text,
    in _imagen varchar(100),
    in precio decimal(10,2)
)
BEGIN
    declare paquete integer;
    start transaction;
		insert into paquetes() Values (null, _idCategoria,  _nombrePaquete, _velocidad,  _descripcion, _imagen, precio);
		select idPaquete from paquetes order by idPaquete desc limit 1 into paquete; #Tengo el ultimo registro de paquete
		insert into Ofertas() values(null, paquete, 0, 0); 
	commit;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario`(
	in _nombre varchar(150),
    in _apellidos varchar(250),
    in _telefono varchar(20),
    in _email varchar(250),
    in _password text
)
BEGIN

	DECLARE idUsuario integer;
    START transaction;
    INSERT INTO CLIENTES () VALUES(NULL,_nombre, _apellidos, _telefono);
	SELECT IDCLIENTE FROM CLIENTES ORDER BY IDCLIENTE DESC LIMIT 1 INTO idUsuario;
    IF exists(SELECT 1 FROM USUARIOS WHERE EMAIL = _email) <> 1 THEN 
		INSERT INTO USUARIOS () VALUES (NULL, idUsuario,  _email, _password);
		SELECT 1; #sE REGISTRO 
    ELSE
		SELECT -1; #CORREO REPETIDO
	END IF;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `datosFormularioCompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `datosFormularioCompra`(
in _email varchar(250)
)
BEGIN
 if exists(select 1 from usuarios where email = _email ) = 1 then
	select C.nombre, C.apellidos, C.telefono, U.email from clientes C inner join usuarios U on (U.idCliente=C.idCliente)
    where U.email= _email LIMIT 1;
 else
	select -1 ;# no existe este correo;
 end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPaquetes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPaquetes`()
BEGIN
	
    #Verifico que existan paquetes en la base de datos
    if exists (select COUNT(idPaquete) FROM paquetes) > 0 then 
		select P. IdPaquete, P.nombrepaquete, P.megas, P.descripcion, C.Categoria, P.precio, P.descuento as 'Precio Con descuento', O.estado, O.Porcentaje from paquetes P inner join ofertas O on (P.idPaquete = O. idPaquete) 
		inner join categorias C on (P.idCategoria= C.idCategoria); 
	else 
		select -1; # no existen paquetes registrados
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarPaquete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarPaquete`(
	in _idCategoria integer,
    in _nombrepaquete varchar(100),
    in _megas varchar(100),
    in _descripcion text,
    in imagen varchar (100),
    in precio decimal (10,2),
    in _porcentaje decimal(10,2)
)
BEGIN

	declare ultimoPaquete integer;
    start transaction;
		#inserto paquete 
		insert into paquetes () values (null, _idCategoria, _nombrepaquete, _megas, _descripcion, imagen, precio );
			#obtengo el ultimo ID generado 
			select idPaquete from paquetes order by idPaquete DESC LIMIT 1 INTO ultimoPaquete;
		#valido si el porcentaje es mayor a 0 
        #Estado 0 = false 1 = true; 
		if ( _porcentaje > 0) then  
			insert into ofertas() values (null, ultimoPaquete, _porcentaje, 1);
		else 
			insert into ofertas() values (null, ultimoPaquete, 0, 0);
		end if;
        commit;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarUsuario`(
	in _email varchar(250),
    in _password text
)
BEGIN

	if exists (select 1 from usuarios where email = _email ) = 1 then 
		if exists(select 1 from usuarios where contraseña = _password) = 1 then 
			select 1; #Te do la autentificacion 
		else 
			select -2; #Contraseña erronea
		end if;
    else
		select -1; #Este email no existe
	end if;
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

-- Dump completed on 2021-01-25 20:32:56
