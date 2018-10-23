DROP DATABASE IF EXISTS sistema_tutorias;

CREATE DATABASE IF NOT EXISTS sistema_tutorias;

USE sistema_tutorias;

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2018 a las 04:25:11
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_tutorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  `situacion` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `carrera`, `situacion`, `correo`, `tutor_id`, `foto`) VALUES
('1530002', 'Moises MagaÃ±a Fdz', 1, 'Regular', '1530002@upv.edu.mx', 1, '1530002.png'),
('1530006', 'Froylan Melquiades Wbario Mtz', 1, 'Regular', '1530006@upv.edu.mx', 1, '1530006.png'),
('1530277', 'Luis Torres Grimaldo', 1, 'Regular', '1530277@upv.edu.mx', 1, '1530277.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `carrera_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`carrera_id`, `nombre`) VALUES
(1, 'ITI'),
(2, 'PYMES'),
(3, 'IM'),
(4, 'ITM'),
(5, 'ISA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `sesion_id` int(10) NOT NULL,
  `tutor` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(10) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `tema` int(11) DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`sesion_id`, `tutor`, `fecha`, `hora`, `tipo`, `tema`, `observaciones`) VALUES
(1, 1, '2018-10-23', '9:30 PM', 'Individual', 1, 'ObservaciÃ³n de la tutoria del dia 2018-10-23 con los alumno Moises MagaÃ±a'),
(2, 1, '2018-10-25', '9:30 PM', 'Individual', 1, 'Sesion de tutoria el dia 2018-10-25 con Froylan Melquiades'),
(3, 1, '2018-10-31', '9:30 PM', 'Individual', 1, 'Sesion de tutoria del dia 2018-10-31 con el alumnos Luis Torres'),
(4, 1, '2018-10-31', '9:30 PM', 'Individual', 1, 'Ejemplo de una tutoria grupal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_alumnos`
--

CREATE TABLE `sesion_alumnos` (
  `sesion_id` int(10) DEFAULT NULL,
  `matricula` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion_alumnos`
--

INSERT INTO `sesion_alumnos` (`sesion_id`, `matricula`) VALUES
(1, '1530002'),
(2, '1530006'),
(3, '1530277'),
(4, '1530002'),
(4, '1530006'),
(4, '1530277');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_tema`
--

CREATE TABLE `sesion_tema` (
  `tema_id` int(11) NOT NULL,
  `tema_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion_tema`
--

INSERT INTO `sesion_tema` (`tema_id`, `tema_nombre`) VALUES
(1, 'Personales'),
(2, 'Financieros'),
(3, 'Drogas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `numero_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`numero_empleado`, `nombre`, `carrera`, `correo`, `contrasena`) VALUES
(1, 'Tutor de ejemplo', 1, 'tutor@tutor.com', '1f6f42334e1709a4e0f9922ad789912b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `rol`, `correo`, `contrasena`) VALUES
(1, 'Administrador', 'Oficina Tutoria', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `carrera` (`carrera`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`carrera_id`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`sesion_id`),
  ADD KEY `tutor` (`tutor`),
  ADD KEY `tema` (`tema`);

--
-- Indices de la tabla `sesion_alumnos`
--
ALTER TABLE `sesion_alumnos`
  ADD KEY `sesion_id` (`sesion_id`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `sesion_tema`
--
ALTER TABLE `sesion_tema`
  ADD PRIMARY KEY (`tema_id`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`numero_empleado`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `carrera_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `sesion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sesion_tema`
--
ALTER TABLE `sesion_tema`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`carrera_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`numero_empleado`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `tutores` (`numero_empleado`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sesiones_ibfk_2` FOREIGN KEY (`tema`) REFERENCES `sesion_tema` (`tema_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion_alumnos`
--
ALTER TABLE `sesion_alumnos`
  ADD CONSTRAINT `sesion_alumnos_ibfk_1` FOREIGN KEY (`sesion_id`) REFERENCES `sesiones` (`sesion_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sesion_alumnos_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`carrera_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
