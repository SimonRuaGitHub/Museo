-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2017 a las 05:56:09
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo_db`
--
CREATE DATABASE IF NOT EXISTS `museo_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `museo_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

DROP TABLE IF EXISTS `estilos`;
CREATE TABLE IF NOT EXISTS `estilos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`Codigo`, `nombre`, `descripcion`) VALUES
(3, 'conceptualismo', NULL),
(4, 'realismo', NULL),
(5, 'surrealismo', NULL),
(6, 'expresionismo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

DROP TABLE IF EXISTS `museos`;
CREATE TABLE IF NOT EXISTS `museos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

DROP TABLE IF EXISTS `obras`;
CREATE TABLE IF NOT EXISTS `obras` (
  `ID` varchar(40) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_creacion` varchar(100) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `material` varchar(100) DEFAULT NULL,
  `valor` decimal(14,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `autores` varchar(200) DEFAULT NULL,
  `ID_museo` int(11) DEFAULT NULL,
  `cod_tecnica` int(11) DEFAULT NULL,
  `cod_estilo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_OBRAS_MUSEOS1_idx` (`ID_museo`),
  KEY `fk_OBRAS_TECNICAS1_idx` (`cod_tecnica`),
  KEY `fk_OBRAS_ESTILO1_idx` (`cod_estilo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`ID`, `tipo`, `nombre`, `fecha_creacion`, `periodo`, `fecha_entrada`, `material`, `valor`, `cantidad`, `estado`, `autores`, `ID_museo`, `cod_tecnica`, `cod_estilo`) VALUES
('ESC235', 'Escultura', 'Pelion', 'siglo XV A.C', 'Antiguedad', '2017-01-09', 'Hecho con arcilla', '20000000.00', 1, 'disponible', 'Miguel Angelo y Furier Morr', NULL, 1, 3),
('PIN135', 'pintura', 'Angel', 'siglo V D.C', 'antiguedad', '2014-06-17', NULL, '300000000.00', 1, 'disponible', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restauraciones`
--

DROP TABLE IF EXISTS `restauraciones`;
CREATE TABLE IF NOT EXISTS `restauraciones` (
  `ID` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `ID_obras` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_RESTAURACIONES_OBRAS_idx` (`ID_obras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicas`
--

DROP TABLE IF EXISTS `tecnicas`;
CREATE TABLE IF NOT EXISTS `tecnicas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tecnicas`
--

INSERT INTO `tecnicas` (`codigo`, `nombre`, `descripcion`) VALUES
(1, 'acuarela', NULL),
(2, 'Gouache', NULL),
(3, 'pintura al pastel', NULL),
(5, 'barranquismo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  UNIQUE KEY `rol_UNIQUE` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `rol`, `Usuario`, `Contraseña`) VALUES
(1, 'encargado catalogo', 'ramirezGC', '123654');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `fk_OBRAS_ESTILO1` FOREIGN KEY (`cod_estilo`) REFERENCES `estilos` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OBRAS_MUSEOS1` FOREIGN KEY (`ID_museo`) REFERENCES `museos` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OBRAS_TECNICAS1` FOREIGN KEY (`cod_tecnica`) REFERENCES `tecnicas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restauraciones`
--
ALTER TABLE `restauraciones`
  ADD CONSTRAINT `fk_RESTAURACIONES_OBRAS` FOREIGN KEY (`ID_obras`) REFERENCES `obras` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
