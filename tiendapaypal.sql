-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2023 a las 20:24:30
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendapaypal`
--
CREATE DATABASE IF NOT EXISTS `tiendapaypal` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `tiendapaypal`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventas`
--

DROP TABLE IF EXISTS `tbldetalleventas`;
CREATE TABLE `tbldetalleventas` (
  `ID` int(11) NOT NULL,
  `IDVenta` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbldetalleventas`
--

INSERT INTO `tbldetalleventas` (`ID`, `IDVenta`, `IDProducto`, `Precio`, `Cantidad`, `Descargado`) VALUES
(1, 5, 1, '300.00', 1, 0),
(2, 5, 2, '429.00', 1, 0),
(3, 6, 1, '300.00', 1, 0),
(4, 6, 2, '429.00', 1, 0),
(5, 7, 1, '300.00', 1, 0),
(6, 7, 2, '429.00', 1, 0),
(7, 8, 1, '300.00', 1, 0),
(8, 8, 2, '429.00', 1, 0),
(9, 9, 1, '300.00', 1, 0),
(10, 9, 2, '429.00', 1, 0),
(11, 10, 1, '300.00', 1, 0),
(12, 10, 2, '429.00', 1, 0),
(13, 11, 1, '300.00', 1, 0),
(14, 11, 2, '429.00', 1, 0),
(15, 12, 1, '300.00', 1, 0),
(16, 12, 2, '429.00', 1, 0),
(17, 13, 1, '300.00', 1, 0),
(18, 13, 2, '429.00', 1, 0),
(19, 14, 1, '300.00', 1, 0),
(20, 14, 2, '429.00', 1, 0),
(21, 15, 1, '300.00', 1, 0),
(22, 15, 2, '429.00', 1, 0),
(23, 16, 1, '300.00', 1, 0),
(24, 16, 2, '429.00', 1, 0),
(25, 17, 1, '300.00', 1, 0),
(26, 17, 2, '429.00', 1, 0),
(27, 18, 1, '300.00', 1, 0),
(28, 18, 2, '429.00', 1, 0),
(29, 19, 1, '300.00', 1, 0),
(30, 19, 2, '429.00', 1, 0),
(31, 20, 1, '300.00', 1, 0),
(32, 20, 2, '429.00', 1, 0),
(33, 21, 1, '300.00', 1, 0),
(34, 21, 2, '429.00', 1, 0),
(35, 22, 1, '300.00', 1, 0),
(36, 22, 2, '429.00', 1, 0),
(37, 23, 1, '300.00', 1, 0),
(38, 23, 2, '429.00', 1, 0),
(39, 24, 1, '300.00', 1, 0),
(40, 24, 2, '429.00', 1, 0),
(41, 25, 1, '300.00', 1, 0),
(42, 25, 2, '429.00', 1, 0),
(43, 26, 1, '300.00', 1, 0),
(44, 26, 2, '429.00', 1, 0),
(45, 27, 1, '300.00', 1, 0),
(46, 27, 2, '429.00', 1, 0),
(47, 28, 1, '300.00', 1, 0),
(48, 28, 2, '429.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

DROP TABLE IF EXISTS `tblproductos`;
CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(1, 'Learn PHP 7', '300.00', 'This new book on PHP 7 introduces writing solid, secure, object-oriented code in the new PHP 7: you will create a complete three-tier application using a natural process of building and testing modules within each tier. This practical approach teaches you about app development and introduces PHP features when they are actually needed rather than providing you with abstract theory and contrived examples.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg'),
(2, 'Professional ASP.NET MVC 5 ', '429.00', 'MVC 5 is the newest update to the popular Microsoft technology that enables you to build dynamic, data-driven websites. Like previous versions, this guide shows you step-by-step techniques on using MVC to best advantage, with plenty of practical tutorials to illustrate the concepts. It covers controllers, views, and models; forms and HTML helpers; data annotation and validation; membership, authorization, and security.', 'https://images-na.ssl-images-amazon.com/images/I/51u-ERS1W8L._SX396_BO1,204,203,200_.jpg'),
(3, 'Learning Vue.js 2', '1500.50', '* Learn how to propagate DOM changes across the website without writing extensive jQuery callbacks code.\r\n* Learn how to achieve reactivity and easily compose views with Vue.js and understand what it does behind the scenes.\r\n* Explore the core features of Vue.js with small examples, learn how to build dynamic content into preexisting web applications, and build Vue.js applications from scratch.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7864/9781786469946.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

DROP TABLE IF EXISTS `tblventas`;
CREATE TABLE `tblventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblventas`
--

INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES
(1, '98sk5d8m59g05627n6ehj3bm5i', '', '2023-04-11 20:25:26', 'tomas@prueba.com', '1800.50', 'pendiente'),
(2, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 15:42:18', 'tas@asdf', '729.00', 'pendiente'),
(3, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:09:42', 'tomas@prueba.com', '729.00', 'pendiente'),
(4, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:10:58', 'tomas@prueba.com', '729.00', 'pendiente'),
(5, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:11:53', 'tomas@prueba.com', '729.00', 'pendiente'),
(6, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:17:39', 'tomas@prueba.com', '729.00', 'pendiente'),
(7, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:20:47', 'tomas@prueba.com', '729.00', 'pendiente'),
(8, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:24:35', 'tomas@prueba.com', '729.00', 'pendiente'),
(9, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:43:26', 'tomas@prueba.com', '729.00', 'pendiente'),
(10, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:59:48', 'tomas@prueba.com', '729.00', 'pendiente'),
(11, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 16:59:54', 'tomas@prueba.com', '729.00', 'pendiente'),
(12, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 17:01:33', 'tomas@prueba.com', '729.00', 'pendiente'),
(13, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 17:01:36', 'tomas@prueba.com', '729.00', 'pendiente'),
(14, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 17:02:09', 'tomas@prueba.com', '729.00', 'pendiente'),
(15, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 17:18:14', 'tomas@prueba.com', '729.00', 'pendiente'),
(16, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 17:41:32', 'a@a', '729.00', 'pendiente'),
(17, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 17:41:55', 'a@a', '729.00', 'pendiente'),
(18, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 18:18:41', 'a@a', '729.00', 'pendiente'),
(19, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 18:37:17', 'a@a', '729.00', 'pendiente'),
(20, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 18:43:08', 'a@a', '729.00', 'pendiente'),
(21, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:21:05', 'a@a', '729.00', 'pendiente'),
(22, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:22:02', 'a@a', '729.00', 'pendiente'),
(23, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:25:16', 'asdf@asdf', '729.00', 'pendiente'),
(24, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:28:14', 'a@a', '729.00', 'pendiente'),
(25, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:51:50', 'a@a', '729.00', 'pendiente'),
(26, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:57:42', 'asdf@asdf', '729.00', 'pendiente'),
(27, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 19:59:46', 'asdf@asdf', '729.00', 'pendiente'),
(28, '9bmk74p5a14h19i22a5amhrs9g', '', '2023-04-12 20:09:29', 'asdf@asdf', '729.00', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbldetalleventas`
--
ALTER TABLE `tbldetalleventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVenta` (`IDVenta`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldetalleventas`
--
ALTER TABLE `tbldetalleventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
