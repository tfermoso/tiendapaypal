-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2023 a las 15:45:00
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
(3, 'Learning Vue.js 2', '110.00', '* Learn how to propagate DOM changes across the website without writing extensive jQuery callbacks code.\r\n* Learn how to achieve reactivity and easily compose views with Vue.js and understand what it does behind the scenes.\r\n* Explore the core features of Vue.js with small examples, learn how to build dynamic content into preexisting web applications, and build Vue.js applications from scratch.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7864/9781786469946.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
