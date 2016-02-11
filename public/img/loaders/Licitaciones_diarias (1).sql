-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-02-2016 a las 17:46:01
-- Versión del servidor: 5.5.22-0ubuntu1
-- Versión de PHP: 5.6.17-3+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `licitaciones_diarias_04012016`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Licitaciones_diarias`
--

CREATE TABLE `Licitaciones_diarias` (
  `id` int(11) NOT NULL,
  `Demandante` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Unidad De Compra` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Region` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Comuna` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Fecha Publicacion` datetime DEFAULT NULL,
  `Fecha Cierre` datetime DEFAULT NULL,
  `Cod Onu` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Cantidad` double DEFAULT NULL,
  `Unidad de Medida` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Descripción` varchar(10000) CHARACTER SET utf8 DEFAULT NULL,
  `Producto o Servicio a contratar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Licitacion` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Titulo` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `VINCULOS` varchar(5000) CHARACTER SET utf8 DEFAULT NULL,
  `Rut Cliente` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Duración Contrato` varchar(255) DEFAULT NULL,
  `Precio Ponderacion` varchar(255) DEFAULT NULL,
  `Tiempo del Contrato` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Garantia Seriedad Ofertas` varchar(255) DEFAULT NULL,
  `Garantia Seriedad Contrato` varchar(255) DEFAULT NULL,
  `Fechaadjudicacion` datetime DEFAULT NULL,
  `Campo21` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Estado_activo` int(11) DEFAULT '0',
  `link_ficha` varchar(1000) DEFAULT NULL,
  `link_historial` varchar(1000) DEFAULT NULL,
  `link_acta_adjudicacion` varchar(1000) DEFAULT NULL,
  `link_apertura` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Licitaciones_diarias`
--
ALTER TABLE `Licitaciones_diarias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Licitaciones_diarias`
--
ALTER TABLE `Licitaciones_diarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
