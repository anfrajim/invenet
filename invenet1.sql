-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2016 a las 03:57:27
-- Versión del servidor: 5.7.13-log
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invenet`
--
CREATE DATABASE IF NOT EXISTS `invenet1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `invenet1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL,
  `articulo_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tipo_procedimiento_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `devolucion_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacenes`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `codigo_de_barras` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `cantidad_min` int(11) DEFAULT '10',
  `iva` double DEFAULT NULL,
  `precio_en` float NOT NULL,
  `precio_sal` float DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasarticulos`
--

CREATE TABLE `categoriasarticulos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasarticulos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id` int(11) NOT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tipo_procedimiento_id` int(11) DEFAULT '3',
  `total` double DEFAULT NULL,
  `efectivo` double DEFAULT NULL,
  `factura_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `devoluciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `vendedor` tinyint(1) NOT NULL DEFAULT '0',
  `contador` tinyint(11) NOT NULL DEFAULT '0',
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `username`, `email`, `password`, `imagen`, `estado`, `admin`, `vendedor`, `contador`, `fecha`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.con', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, 0, 0, '2016-10-10 16:27:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `compania` varchar(50) DEFAULT NULL,
  `direccion1` varchar(50) DEFAULT NULL,
  `direccion2` varchar(50) DEFAULT NULL,
  `telefono1` varchar(50) DEFAULT NULL,
  `telefono2` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidad`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tipo_procedimiento_id` int(11) DEFAULT '2',
  `caja_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `efectivo` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `nombre`) VALUES
(1, 'compra'),
(2, 'venta'),
(3, 'devolucion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`articulo_id`),
  ADD KEY `operation_type_id` (`tipo_procedimiento_id`),
  ADD KEY `sell_id` (`venta_id`),
  ADD KEY `return_id` (`devolucion_id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`categoria_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriasarticulos`
--
ALTER TABLE `categoriasarticulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operation_type_id` (`tipo_procedimiento_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `person_id` (`entidad_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `box_id` (`caja_id`),
  ADD KEY `operation_type_id` (`tipo_procedimiento_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `person_id` (`entidad_id`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoriasarticulos`
--
ALTER TABLE `categoriasarticulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD CONSTRAINT `almacenes_ibfk_1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `almacenes_ibfk_2` FOREIGN KEY (`tipo_procedimiento_id`) REFERENCES `procedimientos` (`id`),
  ADD CONSTRAINT `almacenes_ibfk_3` FOREIGN KEY (`venta_id`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `almacenes_ibfk_4` FOREIGN KEY (`devolucion_id`) REFERENCES `devoluciones` (`id`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoriasarticulos` (`id`),
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_2` FOREIGN KEY (`tipo_procedimiento_id`) REFERENCES `procedimientos` (`id`),
  ADD CONSTRAINT `devoluciones_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `devoluciones_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`id`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`tipo_procedimiento_id`) REFERENCES `procedimientos` (`id`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `facturas_ibfk_4` FOREIGN KEY (`entidad_id`) REFERENCES `entidad` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
