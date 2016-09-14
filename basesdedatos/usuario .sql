-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2016 a las 18:26:36
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `usuario`
--
CREATE DATABASE IF NOT EXISTS `usuario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `usuario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion`
--

CREATE TABLE IF NOT EXISTS `aplicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `fecha_alta` date NOT NULL,
  `url` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `aplicacion`
--

INSERT INTO `aplicacion` (`id`, `descripcion`, `fecha_alta`, `url`) VALUES
(1, 'PRIMER APP PHP', '2016-09-08', 'LOCALHOST/PRIMERPROYECTOPHP/'),
(2, 'PRIMER APP JAVA', '2016-09-08', 'LOCALHOST/PRIMERPROYECTOJAVA/');

--
-- Disparadores `aplicacion`
--
DROP TRIGGER IF EXISTS `logger_delete_aplicacion`;
DELIMITER //
CREATE TRIGGER `logger_delete_aplicacion` BEFORE DELETE ON `aplicacion`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario ,tabla ,accion ,dato) VALUES (OLD.id, now(), user(), 'APLICACION' ,'DELETE' ,CONCAT( OLD.descripcion,', ', OLD.fecha_alta,', ',OLD.url))
//
DELIMITER ;
DROP TRIGGER IF EXISTS `logger_update_aplicacion`;
DELIMITER //
CREATE TRIGGER `logger_update_aplicacion` BEFORE UPDATE ON `aplicacion`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario ,tabla ,accion ,dato) VALUES (OLD.id, now(), user(), 'APLICACION' ,'UPDATE' ,CONCAT( OLD.descripcion,', ', OLD.fecha_alta,', ',OLD.url))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion_permiso`
--

CREATE TABLE IF NOT EXISTS `aplicacion_permiso` (
  `id_aplicacion` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  KEY `id_aplicacion` (`id_aplicacion`),
  KEY `id_permiso` (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aplicacion_permiso`
--

INSERT INTO `aplicacion_permiso` (`id_aplicacion`, `id_permiso`) VALUES
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion_usuario`
--

CREATE TABLE IF NOT EXISTS `aplicacion_usuario` (
  `id_aplicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  KEY `id_aplicacion` (`id_aplicacion`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aplicacion_usuario`
--

INSERT INTO `aplicacion_usuario` (`id_aplicacion`, `id_usuario`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logger`
--

CREATE TABLE IF NOT EXISTS `logger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `tabla` varchar(30) NOT NULL,
  `accion` varchar(6) NOT NULL,
  `dato` text NOT NULL,
  `id_registro` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `logger`
--

INSERT INTO `logger` (`id`, `fecha`, `usuario`, `tabla`, `accion`, `dato`, `id_registro`) VALUES
(1, '2016-09-06', 'root@localhost', 'PERFIL', 'DELETE', 'PEPE, ARGENTO, 39443529, 1945-02-02', 1),
(2, '2016-09-07', 'root@localhost', 'PERFIL', 'UPDATE', 'PIPO, ARGENTO, 20456456, 1965-09-05', 1),
(3, '2016-09-07', 'root@localhost', 'ROL', 'DELETE', 'MODIFICADOR', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `dni` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`) VALUES
(1, 'PEPE', 'ARGENTO', 20456456, '1965-09-05');

--
-- Disparadores `perfil`
--
DROP TRIGGER IF EXISTS `logger_delete_perfil`;
DELIMITER //
CREATE TRIGGER `logger_delete_perfil` BEFORE DELETE ON `perfil`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario ,tabla ,accion ,dato) VALUES (OLD.id, now(), user(), 'PERFIL', 'DELETE' ,CONCAT( OLD.nombre,', ', OLD.apellido,', ',OLD.dni,', ',OLD.fecha_nacimiento))
//
DELIMITER ;
DROP TRIGGER IF EXISTS `logger_update_perfil`;
DELIMITER //
CREATE TRIGGER `logger_update_perfil` BEFORE UPDATE ON `perfil`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario ,tabla ,accion ,dato) VALUES (OLD.id, now(), user(), 'PERFIL', 'UPDATE' ,CONCAT( OLD.nombre,', ', OLD.apellido,', ',OLD.dni,', ',OLD.fecha_nacimiento))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `descripcion`) VALUES
(1, 'SELECT'),
(2, 'INSERT'),
(3, 'UPDATE'),
(4, 'DELETE');

--
-- Disparadores `permiso`
--
DROP TRIGGER IF EXISTS `logger_delete_permiso`;
DELIMITER //
CREATE TRIGGER `logger_delete_permiso` BEFORE DELETE ON `permiso`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario, tabla ,accion ,dato) VALUES (OLD.id, now(), user(), 'PERMISO', 'DELETE' ,CONCAT( OLD.descripcion))
//
DELIMITER ;
DROP TRIGGER IF EXISTS `logger_update_permiso`;
DELIMITER //
CREATE TRIGGER `logger_update_permiso` BEFORE UPDATE ON `permiso`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario, tabla ,accion ,dato) VALUES (OLD.id, now(), user(), 'PERMISO', 'UPDATE' ,CONCAT( OLD.descripcion))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE IF NOT EXISTS `permiso_rol` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  KEY `id_rol` (`id_rol`),
  KEY `id_permiso` (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso_rol`
--

INSERT INTO `permiso_rol` (`id_permiso`, `id_rol`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE IF NOT EXISTS `permiso_usuario` (
  `id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  KEY `id_permiso` (`id_permiso`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CREADOR');

--
-- Disparadores `rol`
--
DROP TRIGGER IF EXISTS `logger_delete_rol`;
DELIMITER //
CREATE TRIGGER `logger_delete_rol` BEFORE DELETE ON `rol`
 FOR EACH ROW INSERT INTO logger ( id_registro,fecha ,usuario ,tabla,accion ,dato) VALUES (OLD.id, now(), user(), 'ROL','DELETE' ,CONCAT( OLD.descripcion))
//
DELIMITER ;
DROP TRIGGER IF EXISTS `logger_update_rol`;
DELIMITER //
CREATE TRIGGER `logger_update_rol` BEFORE UPDATE ON `rol`
 FOR EACH ROW INSERT INTO logger ( id_registro,fecha ,usuario ,tabla,accion ,dato) VALUES (OLD.id, now(), user(), 'ROL','UPDATE' ,CONCAT( OLD.descripcion))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`id_rol`, `id_usuario`, `fecha_alta`) VALUES
(1, 1, '2016-09-01'),
(2, 2, '2016-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `contrasenia` varchar(34) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contrasenia`, `estado`) VALUES
(1, 'PEPE', '3d72e9967fe1a33d2ba707551bec221eca', 1),
(2, 'CESAR', '875a051cdfc598717693a67f5dc653d012', 1);

--
-- Disparadores `usuario`
--
DROP TRIGGER IF EXISTS `USUARIO`;
DELIMITER //
CREATE TRIGGER `USUARIO` BEFORE INSERT ON `usuario`
 FOR EACH ROW SET NEW.contrasenia = SHA1(NEW.contrasenia)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `logger_delete_usuario`;
DELIMITER //
CREATE TRIGGER `logger_delete_usuario` BEFORE DELETE ON `usuario`
 FOR EACH ROW INSERT INTO logger ( id_registro, fecha ,usuario ,accion ,dato) VALUES (OLD.id, now(), user(),'USUARIO','DELETE' ,CONCAT(OLD.nombre,', ',OLD.contrasenia,', ',OLD.estado))
//
DELIMITER ;
DROP TRIGGER IF EXISTS `logger_update_usuario`;
DELIMITER //
CREATE TRIGGER `logger_update_usuario` BEFORE UPDATE ON `usuario`
 FOR EACH ROW INSERT INTO logger ( id_registro,fecha ,usuario ,accion ,dato) VALUES (OLD.id, now(), user(),'USUARIO','UPDATE' ,CONCAT(OLD.nombre,', ',OLD.contrasenia,', ',OLD.estado))
//
DELIMITER ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicacion_permiso`
--
ALTER TABLE `aplicacion_permiso`
  ADD CONSTRAINT `aplicacion_permiso_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `aplicacion_permiso_ibfk_2` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicacion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `aplicacion_usuario`
--
ALTER TABLE `aplicacion_usuario`
  ADD CONSTRAINT `aplicacion_usuario_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `aplicacion_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD CONSTRAINT `permiso_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_usuario_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `rol_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
