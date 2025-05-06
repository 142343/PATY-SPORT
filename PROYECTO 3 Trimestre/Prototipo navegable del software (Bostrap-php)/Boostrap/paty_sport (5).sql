-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2024 a las 04:10:52
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
(126, 'Pantalonetas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `ProductoCodigoProducto` int(12) NOT NULL,
  `Ticket SalidaidTicketIngreso` int(12) NOT NULL,
  `NombreProducto` varchar(25) DEFAULT NULL,
  `Cantidad` int(10) DEFAULT NULL,
  `Descripción` varchar(45) DEFAULT NULL,
  `PrecioIngreso` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`ProductoCodigoProducto`, `Ticket SalidaidTicketIngreso`, `NombreProducto`, `Cantidad`, `Descripción`, `PrecioIngreso`) VALUES
(301, 1, 'Sudadera de hombre', 6, 'NULL', 17000),
(302, 5, 'Conjunto corto ', 8, 'NULL', 25000),
(303, 4, 'Sudadera de bota alta ', 8, 'NULL', 32000),
(304, 3, 'Chaqueta impermeable acol', 10, 'NULL', 35000),
(306, 2, 'Pantaloneta impermeable', 10, 'NULL', 24000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `ProductoCodigoProducto` int(12) NOT NULL,
  `Ticket SalidaIdTicketSalida` int(12) NOT NULL,
  `NombreProducto` varchar(25) DEFAULT NULL,
  `Descricpción` varchar(45) DEFAULT NULL,
  `Cantidad` int(10) DEFAULT NULL,
  `ValorUnitario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_salida`
--

INSERT INTO `detalle_salida` (`ProductoCodigoProducto`, `Ticket SalidaIdTicketSalida`, `NombreProducto`, `Descricpción`, `Cantidad`, `ValorUnitario`) VALUES
(301, 3, 'Sudadera de hombre', NULL, 4, 25000),
(304, 1, 'Chaqueta impermeable acol', NULL, 1, 50000),
(306, 2, 'Pantaloneta corta ', NULL, 1, 40000);

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
(40, 'Adinkra Ps');

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
  `Descripcion` varchar(255) DEFAULT NULL,
  `MarcasCodigoMarca` int(10) NOT NULL,
  `TallasCodigoTallas` int(10) NOT NULL,
  `Num_Documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`CodigoProducto`, `Nombre`, `Precio`, `Stock`, `IVA`, `Imagen`, `CategoriaCodigoCategoría`, `EstadoCodigoEstado`, `Descripcion`, `MarcasCodigoMarca`, `TallasCodigoTallas`, `Num_Documento`) VALUES
(301, 'Sudadera de Hombre', 30000, 12, 19, NULL, 121, 101, 'Sudadera en algodon perchado y cierres en los bolsillos', 39, 201, 784514),
(302, 'Conjuto de Sudadera ', 60000, 8, 19, NULL, 121, 101, 'Conjunto dos piezas en algodon perchado con capota remobible', 40, 207, 1033743193),
(303, 'Sudadera de dama', 30000, 12, 19, NULL, 123, 101, 'Sudadera en algodon perchado y cierres en los bolsillos', 32, 207, 1033743193),
(304, 'chaqueta impermeable', 60000, 8, 19, NULL, 125, 101, 'Chaqueta en algodon perchado interno con material impermeeable externo con capota remobible', 40, 207, 1033743193),
(305, 'Sudadera de Dama', 25000, 2, 19, NULL, 123, 101, 'Sudadera encauchada en pretina y bota', 32, 207, 1033743193),
(306, 'Pantaloneta corta', 30000, 5, 19, NULL, 126, 101, 'Pantaloneta corta con cordón y bolsillos herméticos material impermeable y forrada en malla interna', 33, 206, 1025789945),
(307, 'Chaqueta cuero', 90000, 3, 4000, NULL, 122, 103, 'ghghgjh', 36, 202, 505547805),
(308, 'Buzo Overzice', 50000, 3, 3000, NULL, 122, 101, 'fhgjh', 33, 205, 1004785525),
(309, 'Camisa', 30000, 4, 40999, NULL, 124, 102, 'ghfgjgj', 40, 204, 224587524),
(310, 'Camisa', 40000, 2, 2000, NULL, 123, 102, 'dgsdgdgd', 38, 203, 80457897),
(311, 'Sudadera blanca', 40000, 5, 3000, NULL, 123, 103, 'dsgsdg', 39, 203, 52458241),
(312, 'Buzo dama negro', 45000, 54, 4600, NULL, 122, 102, 'fghgfhfgjh', 37, 205, 1004785525);

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
(24, 'Proveedor');

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
(207, 'Unica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_ingreso`
--

CREATE TABLE `ticket_ingreso` (
  `idTicketIngreso` int(12) NOT NULL,
  `FechaIngresoProducto` date DEFAULT NULL,
  `PrecioUnitario` double DEFAULT NULL,
  `PrecioTotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket_ingreso`
--

INSERT INTO `ticket_ingreso` (`idTicketIngreso`, `FechaIngresoProducto`, `PrecioUnitario`, `PrecioTotal`) VALUES
(1, '2024-07-13', 17000, 102000),
(2, '2024-07-17', 24000, 240000),
(3, '2024-07-17', 35000, 35000),
(4, '2024-07-31', 32000, 192000),
(5, '2024-08-07', 25000, 200000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_salida`
--

CREATE TABLE `ticket_salida` (
  `IdTicketSalida` int(12) NOT NULL,
  `FechaSalida` date DEFAULT NULL,
  `PrecioTotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket_salida`
--

INSERT INTO `ticket_salida` (`IdTicketSalida`, `FechaSalida`, `PrecioTotal`) VALUES
(1, '2024-07-19', 50000),
(2, '2024-08-19', 25000),
(3, '2024-09-05', 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Tipo_Documento` varchar(30) DEFAULT NULL,
  `Num_Documento` int(15) NOT NULL,
  `Nombres` varchar(25) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `Teléfono` varchar(15) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `RolidRol` int(10) NOT NULL,
  `EstadoCodigoEstado` int(10) NOT NULL,
  `GeneroidGenero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Tipo_Documento`, `Num_Documento`, `Nombres`, `Apellidos`, `Teléfono`, `Correo`, `RolidRol`, `EstadoCodigoEstado`, `GeneroidGenero`) VALUES
('PPT', 784514, 'Dilan Sebastian', 'Parras Pinoza', '3125747841', 'Almamodafres@gmail.com', 24, 101, 1),
('C.C', 24154854, 'Johan Sebastian', 'Bonilla Bautista ', '3201179669', 'MisionFashion@gmail.com', 24, 101, 1),
('C.C', 45789874, 'Danna', 'cortes', '3202258578', 'MisionFashion@gmail.com', 24, 101, 2),
('C.C', 51964869, 'Laureana ', 'Cortes Laguna ', '3104637195', 'Lauracortes343@gmail.com', 23, 101, 2),
('C.C', 52458241, 'Jhoseph Daniel', 'Bautista Valbuena', '3124085254', 'ImperGermno_432@gmail.com', 24, 101, 1),
('C.C', 52747225, 'Viviana ', 'Escobar Cortes', '3168524776', 'CortesViviana086@gmail.com', 22, 101, 2),
('C.C', 80457897, 'Karen Liliana', 'Trujillo Ballesteros', '3104447857', 'RobertSp@gmail.com', 24, 101, 2),
('C.C', 80461462, 'Jonny Duverney', 'Pulido Monroy ', '3197875874', 'Jonny_duverney1973@hotmail.com.com', 21, 101, 1),
('C.C', 224587524, 'Valentina', 'Ortis Areas', '3198587821', 'Ezzus143@gmail.com', 24, 101, 2),
('C.C', 505547805, 'Sara Stefania', 'Amador Solano', '3215487857', 'Tentacionfk@gmail.com', 24, 101, 2),
('C.C', 1004785525, 'Angie Daniela ', 'Arias Lievano', '3152247824', 'DOKCHER21@gmail.com', 24, 102, 2),
('C.C', 1022478787, 'Kevin Julian', 'Romero Torres', '3145124578', 'SalasPOUL@gmail.com', 24, 101, 1),
('C.C', 1025789514, 'Miguel Angel ', 'Robayo Hernanadez', '3102284715', 'Dogmaind@gmail.com', 24, 101, 1),
('C.C', 1025789945, 'Andres Felipe', 'Garzon Linares', '3204712545', 'ImperioSg43@gmail.com', 24, 101, 1),
('C.C', 1033743193, 'Kevin Santiago ', 'Pulido Escobar ', '3192044487', 'KevinPulido0802@gmail.com', 21, 101, 1);

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
  ADD PRIMARY KEY (`ProductoCodigoProducto`,`Ticket SalidaidTicketIngreso`),
  ADD KEY `FKDetalle_In571151` (`Ticket SalidaidTicketIngreso`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`ProductoCodigoProducto`,`Ticket SalidaIdTicketSalida`),
  ADD KEY `FKDetalle_Sa242719` (`Ticket SalidaIdTicketSalida`);

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
  ADD KEY `FKProducto736650` (`CategoriaCodigoCategoría`),
  ADD KEY `FKProducto323712` (`EstadoCodigoEstado`),
  ADD KEY `FKProducto469343` (`MarcasCodigoMarca`),
  ADD KEY `FKProducto698452` (`TallasCodigoTallas`),
  ADD KEY `fk_usuario` (`Num_Documento`);

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
  MODIFY `CodigoCategoría` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
  MODIFY `CodigoMarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `CodigoProducto` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `CodigoTallas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de la tabla `ticket_ingreso`
--
ALTER TABLE `ticket_ingreso`
  MODIFY `idTicketIngreso` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ticket_salida`
--
ALTER TABLE `ticket_salida`
  MODIFY `IdTicketSalida` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Num_Documento` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033743194;

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
  ADD CONSTRAINT `FKDetalle_In571151` FOREIGN KEY (`Ticket SalidaidTicketIngreso`) REFERENCES `ticket_ingreso` (`idTicketIngreso`);

--
-- Filtros para la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD CONSTRAINT `FKDetalle_Sa242719` FOREIGN KEY (`Ticket SalidaIdTicketSalida`) REFERENCES `ticket_salida` (`IdTicketSalida`),
  ADD CONSTRAINT `FKDetalle_Sa99242` FOREIGN KEY (`ProductoCodigoProducto`) REFERENCES `producto` (`CodigoProducto`);

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
