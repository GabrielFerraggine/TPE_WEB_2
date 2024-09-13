-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2024 a las 15:27:24
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
-- Base de datos: `tp_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `heladerias`
--

CREATE TABLE `heladerias` (
  `ID_Heladerias` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Fecha_Asociacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `heladerias`
--

INSERT INTO `heladerias` (`ID_Heladerias`, `Nombre`, `Direccion`, `Fecha_Asociacion`) VALUES
(1, 'Grido', 'Av. Perón 1399, B7000 Tandil, Provincia de Buenos Aires', '2012-12-21'),
(2, 'Iglu', 'Av. España 975, B7000 Tandil, Provincia de Buenos Aires', '2023-04-11'),
(3, 'Helados Chinos', '9 de Julio 992, B7000 Tandil, Provincia de Buenos Aires', '2016-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helados`
--

CREATE TABLE `helados` (
  `ID_Helados` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Subcategorias` varchar(30) NOT NULL,
  `Peso` int(100) NOT NULL,
  `Precio_Costo` double NOT NULL,
  `Precio_Venta` double NOT NULL,
  `ID_Heladerias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `helados`
--

INSERT INTO `helados` (`ID_Helados`, `Nombre`, `Subcategorias`, `Peso`, `Precio_Costo`, `Precio_Venta`, `ID_Heladerias`) VALUES
(1, 'Chocolate', 'Chocolate', 20, 100000, 150000, 1),
(2, 'Dulce De Leche', 'Dulce De Leche', 20, 120000, 190000, 2),
(3, 'Vainilla', 'Crema', 20, 110000, 170000, 3),
(4, 'Frutilla', 'Frutales', 10, 50000, 75000, 1),
(5, 'Menta Granizada', 'Cremas', 15, 90000, 135000, 2),
(7, 'Banana Split', 'Frutales', 5, 27000, 47750, 3),
(8, 'Chocolate Blanco', 'Chocolate', 30, 150000, 25000, 1),
(9, 'Marroc', 'Crema Especial', 12, 66000, 99000, 3),
(10, 'Crema Americana', 'Cremas', 18, 90000, 135000, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `heladerias`
--
ALTER TABLE `heladerias`
  ADD PRIMARY KEY (`ID_Heladerias`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Direccion` (`Direccion`);

--
-- Indices de la tabla `helados`
--
ALTER TABLE `helados`
  ADD PRIMARY KEY (`ID_Helados`),
  ADD KEY `ID_Heladerias` (`ID_Heladerias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `heladerias`
--
ALTER TABLE `heladerias`
  MODIFY `ID_Heladerias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `helados`
--
ALTER TABLE `helados`
  MODIFY `ID_Helados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `helados`
--
ALTER TABLE `helados`
  ADD CONSTRAINT `helados_ibfk_1` FOREIGN KEY (`ID_Heladerias`) REFERENCES `heladerias` (`ID_Heladerias`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
