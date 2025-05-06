-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2024 a las 23:38:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paty_sport`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarUsuario` (IN `p_Tipo_Documento` VARCHAR(10), IN `p_Num_Documento` VARCHAR(20), IN `p_Nombres` VARCHAR(50), IN `p_Apellidos` VARCHAR(50), IN `p_Telefono` VARCHAR(15), IN `p_Correo` VARCHAR(100), IN `p_RolidRol` INT, IN `p_EstadoCodigoEstado` INT, IN `p_GeneroidGenero` INT)   BEGIN  
    INSERT INTO usuario (Tipo_Documento, Num_Documento, Nombres, Apellidos, Telefono, Correo, RolidRol, EstadoCodigoEstado, GeneroidGenero)  
    VALUES (p_Tipo_Documento, p_Num_Documento, p_Nombres, p_Apellidos, p_Telefono, p_Correo, p_RolidRol, p_EstadoCodigoEstado, p_GeneroidGenero);  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Mostrar nombre de la categoria de cada producto` ()   BEGIN  
    SELECT   
        p.CodigoProducto,  
        p.Nombre AS NombreProducto,  
        c.Nombre AS NombreCategoria  
    FROM   
        producto p  
    LEFT JOIN   
        categoria c ON p.CategoriaCodigoCategoría = c.CodigoCategoría;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarUsuariosInactivos` ()   SELECT   
u.Num_Documento,
    u.Nombres,  
    e.tipoEstado AS Estado  
FROM   
    usuario u  
JOIN   
    estado e ON u.EstadoCodigoEstado = e.CodigoEstado  
WHERE   
    e.tipoEstado = 'INACTIVO'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerUsuariosEmpleado` ()   SELECT   
u.Num_Documento,
    u.Nombres,  
    r.tipoRol AS rol  
FROM   
    usuario u  
JOIN   
    rol r ON u.RolidRol= r.idRol 
WHERE   
    r.tipoRol = 'Empleado'$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `TotalProductosTabla` () RETURNS INT(11) DETERMINISTIC BEGIN  
    DECLARE total INT;  

    SELECT COUNT(*) INTO total  
    FROM producto;  

    RETURN total;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CodigoCategoría` int(10) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `GeneroidGenero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodigoCategoría`, `Nombre`, `GeneroidGenero`) VALUES
(121, 'Conjuntos', 1),
(122, 'Busos', 5),
(123, 'Sudaderas', 1),
(124, 'Camisas', 5),
(125, 'Chaquetas', 2),
(126, 'Pantalonetas', 2),
(127, 'Bodys', 2),
(128, 'Vestidos', 2),
(129, 'Disfraz', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `ProductoCodigoProducto` int(12) NOT NULL,
  `TicketSalidaidTicketIngreso` int(12) NOT NULL,
  `Cantidad` int(10) DEFAULT NULL,
  `Descripción` varchar(45) DEFAULT NULL,
  `PrecioIngreso` double DEFAULT NULL,
  `Empleado` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`ProductoCodigoProducto`, `TicketSalidaidTicketIngreso`, `Cantidad`, `Descripción`, `PrecioIngreso`, `Empleado`) VALUES
(301, 1, 6, 'NULL', 17000, 52747225),
(301, 8, 40, '0', 17000, 52747225),
(302, 5, 8, 'NULL', 25000, 52747225),
(303, 4, 8, 'NULL', 32000, 52747225),
(304, 3, 10, 'NULL', 35000, 52747225),
(306, 2, 10, 'NULL', 24000, 52747225),
(310, 9, 25, '0', 500, 52747225),
(310, 10, 3, '0', 500, 52747225);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `ProductoCodigoProducto` int(12) NOT NULL,
  `SalidaIdTicketSalida` int(12) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `ValorUnitario` double DEFAULT NULL,
  `Empleado` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_salida`
--

INSERT INTO `detalle_salida` (`ProductoCodigoProducto`, `SalidaIdTicketSalida`, `Cantidad`, `ValorUnitario`, `Empleado`) VALUES
(301, 1, 1, 30000, 80461462),
(302, 3, 3, 60000, 80461462),
(315, 2, 3, 40000, 80461462);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `CodigoEstado` int(10) NOT NULL,
  `tipoEstado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`CodigoEstado`, `tipoEstado`) VALUES
(101, 'ACTIVO'),
(102, 'INACTIVO'),
(103, 'AGOTADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `Nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Genero no binario'),
(4, 'Genero fluido'),
(5, 'Unisex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Num_Documento` int(15) NOT NULL,
  `Password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Num_Documento`, `Password`) VALUES
(52747225, 0x0c3e115fc3d86dd623e89e9d53e5a274),
(51964869, 0xf7498f64840762dd13ba0bd89425c220);

--
-- Disparadores `login`
--
DELIMITER $$
CREATE TRIGGER `before_insert_login` BEFORE INSERT ON `login` FOR EACH ROW BEGIN 

    SET NEW.password = AES_ENCRYPT(NEW.password, 'LANJ2024'); 

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_login` BEFORE UPDATE ON `login` FOR EACH ROW BEGIN 

    SET NEW.password = AES_ENCRYPT(NEW.password, 'LANJ2024'); 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `CodigoMarca` int(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`CodigoMarca`, `Nombre`) VALUES
(30, 'DK'),
(31, 'Alma'),
(32, 'Dogma IND'),
(33, 'ImperioSg'),
(34, 'Impermeables Gernimo '),
(35, 'Paul Salas'),
(36, 'Robert sp'),
(37, 'Ezzus'),
(38, 'Tentacion Sudaderas'),
(39, 'Mision Fashion'),
(40, 'Adinkra Ps'),
(41, 'Nike'),
(42, 'Adidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `CodigoProducto` int(12) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `Stock` int(10) DEFAULT NULL,
  `IVA` int(10) DEFAULT NULL,
  `Imagen` varchar(25) DEFAULT NULL,
  `CategoriaCodigoCategoría` int(10) NOT NULL,
  `EstadoCodigoEstado` int(10) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `MarcasCodigoMarca` int(10) NOT NULL,
  `TallasCodigoTallas` int(10) NOT NULL,
  `Num_Documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`CodigoProducto`, `Nombre`, `Precio`, `Stock`, `IVA`, `Imagen`, `CategoriaCodigoCategoría`, `EstadoCodigoEstado`, `Descripcion`, `MarcasCodigoMarca`, `TallasCodigoTallas`, `Num_Documento`) VALUES
(301, 'Sudadera de Dama', 30000, 50, 19, NULL, 124, 102, 'Sudadera en algodon perchado y cierres en los bolsillos', 38, 206, 505547805),
(302, 'Conjuto de Sudadera ', 60000, 5, 19, NULL, 122, 102, 'Conjunto dos piezas en algodon perchado con capota remobible', 39, 204, 505547805),
(303, 'Sudadera de dama', 30000, 12, 19, NULL, 123, 101, 'Sudadera en algodon perchado y cierres en los bolsillos', 38, 207, 784514),
(304, 'chaqueta impermeable', 60000, 8, 19, NULL, 125, 101, 'Chaqueta en algodon perchado interno con material impermeeable externo con capota remobible', 40, 207, 1033743193),
(305, 'Sudadera de Dama', 25000, 2, 19, NULL, 123, 101, 'Sudadera encauchada en pretina y bota', 32, 207, 1033743193),
(306, 'Pantaloneta corta', 30000, 5, 19, NULL, 126, 101, 'Pantaloneta corta con cordón y bolsillos herméticos material impermeable y forrada en malla interna', 33, 206, 1025789945),
(307, 'Chaqueta cuero', 90000, 3, 19, NULL, 122, 103, 'ghghgjh', 36, 202, 505547805),
(308, 'Buzo Overzice', 50000, 3, 19, NULL, 122, 101, 'fhgjh', 33, 205, 1004785525),
(309, 'Camisa', 30000, 4, 19, NULL, 124, 102, 'ghfgjgj', 40, 204, 224587524),
(310, 'Camisa', 40000, 30, 19, NULL, 123, 102, 'dgsdgdgd', 38, 203, 80457897),
(311, 'Sudadera blanca', 40000, 5, 19, NULL, 123, 103, 'dsgsdg', 39, 203, 52458241),
(312, 'Buzo dama negro', 45000, 54, 19, NULL, 122, 102, 'fghgfhfgjh', 37, 205, 1004785525),
(313, 'Sudadrea negra', 50000, 76, 19, NULL, 123, 103, 'jxhcdashu', 39, 205, 1004785525),
(314, 'Sudadrea blanca', 30200, 23, 19, NULL, 122, 102, 'dsfsdf', 37, 203, 505547805),
(315, 'Chaqueta jean', 40000, 20, 19, NULL, 125, 101, 'dusfeiwurewiur', 33, 207, 1025789514),
(316, 'Sudadrea Blanca', 30000, 3, 19, NULL, 125, 102, 'jsdhsajhdjhads', 36, 203, 224587524);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(10) NOT NULL,
  `tipoRol` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(21, 'Empleado'),
(22, 'Administrador'),
(23, 'Propietario'),
(24, 'Proveedor'),
(25, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `CodigoTallas` int(10) NOT NULL,
  `Tallas` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`CodigoTallas`, `Tallas`) VALUES
(201, 'XS'),
(202, 'S'),
(203, 'M'),
(204, 'L'),
(205, 'XL'),
(206, 'XXL'),
(207, 'Unica'),
(208, 'XXS'),
(209, 'XXXL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_ingreso`
--

CREATE TABLE `ticket_ingreso` (
  `idTicketIngreso` int(12) NOT NULL,
  `FechaIngresoProducto` date DEFAULT NULL,
  `PrecioTotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket_ingreso`
--

INSERT INTO `ticket_ingreso` (`idTicketIngreso`, `FechaIngresoProducto`, `PrecioTotal`) VALUES
(1, '2024-07-13', 102000),
(2, '2024-07-17', 240000),
(3, '2024-07-17', 35000),
(4, '2024-07-31', 192000),
(5, '2024-08-07', 200000),
(8, '2024-10-16', 680000),
(9, '2024-10-16', 12500),
(10, '2024-10-16', 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_salida`
--

CREATE TABLE `ticket_salida` (
  `IdTicketSalida` int(12) NOT NULL,
  `FechaSalida` date NOT NULL,
  `PrecioTotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket_salida`
--

INSERT INTO `ticket_salida` (`IdTicketSalida`, `FechaSalida`, `PrecioTotal`) VALUES
(1, '2024-10-07', 35700),
(2, '2024-10-07', 142800),
(3, '2024-10-07', 214200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Tipo_Documento` varchar(30) DEFAULT NULL,
  `Num_Documento` int(15) NOT NULL,
  `Nombres` varchar(25) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `Teléfono` int(15) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `RolidRol` int(10) NOT NULL,
  `EstadoCodigoEstado` int(10) NOT NULL,
  `GeneroidGenero` int(10) NOT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Tipo_Documento`, `Num_Documento`, `Nombres`, `Apellidos`, `Teléfono`, `Correo`, `RolidRol`, `EstadoCodigoEstado`, `GeneroidGenero`, `Password`) VALUES
('PPT', 784514, 'Dilan Sebastian', 'Parras Pinoza', 2147483647, 'Almamodafres@gmail.com', 24, 101, 1, ''),
('C.C', 45789874, 'Danna', 'cortes', 2147483647, 'MisionFashion@gmail.com', 24, 101, 2, ''),
('C.C', 51964869, 'Laureana ', 'Cortes Laguna ', 2147483647, 'Lauracortes343@gmail.com', 23, 101, 2, ''),
('C.C', 52458241, 'Jhoseph Daniel', 'Bautista Valbuena', 2147483647, 'ImperGermno_432@gmail.com', 24, 101, 1, ''),
('C.C', 52747225, 'Viviana ', 'Escobar Cortes', 2147483647, 'CortesViviana086@gmail.com', 22, 101, 2, ''),
('C.C', 80457897, 'Karen Liliana', 'Trujillo Ballesteros', 2147483647, 'RobertSp@gmail.com', 24, 101, 2, ''),
('C.C', 80461462, 'Jonny Duverney', 'Pulido Monroy ', 2147483647, 'Jonny_duverney1973@hotmail.com.com', 21, 101, 1, ''),
('C.C', 87654321, 'dfghj', 'Nieto', 2147483647, 'nayisnieto3@gmail.com', 25, 101, 3, '$2y$10$k6e'),
('C.C', 224587524, 'Valentina', 'Ortis Areas', 2147483647, 'Ezzus143@gmail.com', 24, 101, 2, ''),
('PPT', 345465432, 'vfcdcdgff', 'fvsfdghgfv', 8765432, 'nayisnieto3@gmail.com', 25, 101, 1, '$2y$10$CUu'),
('C.C', 505547805, 'Sara Stefania', 'Amador Solano', 2147483647, 'Tentacionfk@gmail.com', 24, 101, 2, ''),
('C.C', 1004785525, 'Angie Daniela ', 'Arias Lievano', 2147483647, 'DOKCHER21@gmail.com', 24, 102, 2, ''),
('C.C', 1022478787, 'Kevin Julian', 'Romero Torres', 2147483647, 'SalasPOUL@gmail.com', 24, 101, 1, ''),
('C.C', 1025789514, 'Miguel Angel ', 'Robayo Hernanadez', 2147483647, 'Dogmaind@gmail.com', 24, 101, 1, ''),
('C.C', 1025789945, 'Andres Felipe', 'Garzon Linares', 2147483647, 'ImperioSg43@gmail.com', 24, 101, 1, ''),
('C.C', 1033743193, 'Kevin Santiago ', 'Pulido Escobar ', 2147483647, 'KevinPulido0802@gmail.com', 21, 101, 1, ''),
('C.C', 1109412437, 'Nayarit', 'Gutierrez', 2147483647, 'nayisnieto3@gmail.com', 25, 101, 2, '$2y$10$i9u');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodigoCategoría`),
  ADD KEY `FKCategoria900753` (`GeneroidGenero`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`ProductoCodigoProducto`,`TicketSalidaidTicketIngreso`),
  ADD KEY `FKDetalle_In571151` (`TicketSalidaidTicketIngreso`),
  ADD KEY `FK_Empleados` (`Empleado`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`ProductoCodigoProducto`,`SalidaIdTicketSalida`),
  ADD KEY `FKDetalle_Sa242719` (`SalidaIdTicketSalida`),
  ADD KEY `fk_empleado` (`Empleado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`CodigoEstado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Num_Documento`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`CodigoMarca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`CodigoProducto`),
  ADD KEY `FKMarca` (`MarcasCodigoMarca`) USING BTREE,
  ADD KEY `FKTalla` (`TallasCodigoTallas`) USING BTREE,
  ADD KEY `FKEstado` (`EstadoCodigoEstado`) USING BTREE,
  ADD KEY `fkUsuario` (`Num_Documento`) USING BTREE,
  ADD KEY `FKCategoria` (`CategoriaCodigoCategoría`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`CodigoTallas`);

--
-- Indices de la tabla `ticket_ingreso`
--
ALTER TABLE `ticket_ingreso`
  ADD PRIMARY KEY (`idTicketIngreso`);

--
-- Indices de la tabla `ticket_salida`
--
ALTER TABLE `ticket_salida`
  ADD PRIMARY KEY (`IdTicketSalida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Num_Documento`),
  ADD KEY `FKUsuario123120` (`RolidRol`),
  ADD KEY `FKUsuario280302` (`EstadoCodigoEstado`),
  ADD KEY `FKUsuario65594` (`GeneroidGenero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CodigoCategoría` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `CodigoEstado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Num_Documento` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52747226;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `CodigoMarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `CodigoProducto` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `CodigoTallas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT de la tabla `ticket_ingreso`
--
ALTER TABLE `ticket_ingreso`
  MODIFY `idTicketIngreso` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ticket_salida`
--
ALTER TABLE `ticket_salida`
  MODIFY `IdTicketSalida` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `FKCategoria900753` FOREIGN KEY (`GeneroidGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `FKDetalle_In374496` FOREIGN KEY (`ProductoCodigoProducto`) REFERENCES `producto` (`CodigoProducto`),
  ADD CONSTRAINT `FKDetalle_In571151` FOREIGN KEY (`TicketSalidaidTicketIngreso`) REFERENCES `ticket_ingreso` (`idTicketIngreso`),
  ADD CONSTRAINT `FK_Empleados` FOREIGN KEY (`Empleado`) REFERENCES `usuario` (`Num_Documento`);

--
-- Filtros para la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD CONSTRAINT `FKDetalle_Sa242719` FOREIGN KEY (`SalidaIdTicketSalida`) REFERENCES `ticket_salida` (`IdTicketSalida`),
  ADD CONSTRAINT `FKDetalle_Sa99242` FOREIGN KEY (`ProductoCodigoProducto`) REFERENCES `producto` (`CodigoProducto`),
  ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`Empleado`) REFERENCES `usuario` (`Num_Documento`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_usuario_login` FOREIGN KEY (`Num_Documento`) REFERENCES `usuario` (`Num_Documento`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FKProducto323712` FOREIGN KEY (`EstadoCodigoEstado`) REFERENCES `estado` (`CodigoEstado`),
  ADD CONSTRAINT `FKProducto469343` FOREIGN KEY (`MarcasCodigoMarca`) REFERENCES `marcas` (`CodigoMarca`),
  ADD CONSTRAINT `FKProducto698452` FOREIGN KEY (`TallasCodigoTallas`) REFERENCES `tallas` (`CodigoTallas`),
  ADD CONSTRAINT `FKProducto736650` FOREIGN KEY (`CategoriaCodigoCategoría`) REFERENCES `categoria` (`CodigoCategoría`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`Num_Documento`) REFERENCES `usuario` (`Num_Documento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FKUsuario123120` FOREIGN KEY (`RolidRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `FKUsuario280302` FOREIGN KEY (`EstadoCodigoEstado`) REFERENCES `estado` (`CodigoEstado`),
  ADD CONSTRAINT `FKUsuario65594` FOREIGN KEY (`GeneroidGenero`) REFERENCES `genero` (`idGenero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
