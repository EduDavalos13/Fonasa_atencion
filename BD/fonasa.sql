-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2021 a las 22:30:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fonasa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `ID` int(11) NOT NULL,
  `cantPacientes` int(11) DEFAULT NULL,
  `nombreEspecialista` varchar(255) DEFAULT NULL,
  `tipConsulta` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`ID`, `cantPacientes`, `nombreEspecialista`, `tipConsulta`, `estado`, `hospital`) VALUES
(37, 5, 'Pablo Escobar', 'Urgencia', 'Espera', 2),
(38, 6, 'Maria Angelica', 'CGI', 'Espera', 3),
(39, 4, 'Maria Escobar', 'Urgencia', 'Espera', 3),
(40, 28, 'Pablo Canales', 'CGI', 'Espera', 1),
(41, 4, 'Eduardo Dávalos', 'CGI', 'Espera', 3),
(42, 14, 'Pablo Cespedes', 'Urgencia', 'Espera', 1),
(43, 5, 'Ximena Gajardo', 'Urgencia', 'Espera', 2),
(44, 4, 'Maria Gajardo', 'Urgencia', 'Espera', 2),
(47, 9, 'Escobar Eduardo', 'Pediatria', 'Espera', 3),
(48, 9, 'Maria Angelica Canales', 'Urgencia', 'Espera', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`ID`, `nombre`) VALUES
(1, 'Pedro pulgar'),
(2, 'Ernesto Torres Galdames'),
(3, 'Hospital General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nroHistoriaClinica` int(11) DEFAULT NULL,
  `prioridad` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Sin atencion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID`, `nombre`, `edad`, `nroHistoriaClinica`, `prioridad`, `hospital`, `estado`) VALUES
(138, 'Eduardo Dávalos', 59, 11, 5, 3, 'Sin atencion'),
(139, 'Eduardo', 57, 44, 5, 2, 'Sin atencion'),
(140, 'David', 25, 12, 2, 1, 'Sin atencion'),
(141, 'Cristian', 24, 13, 3, 3, 'Sin atencion'),
(142, 'Jorge', 12, 16, 17, 2, 'Sin atencion'),
(143, 'Joaquin', 25, 88, 3, 3, 'Sin atencion'),
(160, 'Gabo', 39, 123, 7, 3, 'Sin atencion'),
(161, 'Gabriel', 38, 124, 6, 2, 'Sin atencion'),
(162, 'Eduardo Multiple', 26, 1236, 7, 2, 'Sin atencion'),
(163, 'Pedro Multiple', 39, 123456, 7, 1, 'Sin atencion'),
(164, 'David Multiple', 38, 789456123, 7, 2, 'Sin atencion'),
(165, 'Cristian Multiple', 37, 2147483647, 7, 3, 'Sin atencion'),
(166, 'Eduardo', 16, 1200000, 3, 3, 'Sin atencion'),
(167, 'Eduardo Viejo', 80, 12300000, 8, 2, 'Sin atencion'),
(168, 'Eduardo niño', 12, 12400000, 4, 2, 'Sin atencion'),
(169, 'Eduardo Hospital 3', 45, 2147483647, 5, 2, 'Sin atencion'),
(170, 'David Hospital 1', 25, 14789, 4, 1, 'Sin atencion'),
(171, 'Eduardo Niño', 12, 12650000, 5, 3, 'Sin atencion'),
(172, 'Jose Maria', 36, 198000, 6, 3, 'Sin atencion'),
(173, 'Cristian Dávalos', 56, 1268799, 5, 3, 'Sin atencion'),
(174, 'Pedro Dávalos', 30, 10232, 3, 3, 'Sin atencion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panciano`
--

CREATE TABLE `panciano` (
  `ID` int(11) NOT NULL,
  `dieta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `panciano`
--

INSERT INTO `panciano` (`ID`, `dieta`) VALUES
(167, 1),
(169, 0),
(173, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pjoven`
--

CREATE TABLE `pjoven` (
  `ID` int(11) NOT NULL,
  `fumador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pjoven`
--

INSERT INTO `pjoven` (`ID`, `fumador`) VALUES
(162, 1),
(163, 0),
(164, 0),
(165, 1),
(166, 1),
(170, 1),
(172, 1),
(174, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pninno`
--

CREATE TABLE `pninno` (
  `ID` int(11) NOT NULL,
  `pesoEstatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pninno`
--

INSERT INTO `pninno` (`ID`, `pesoEstatura`) VALUES
(168, 2),
(171, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hospital` (`hospital`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hospital` (`hospital`);

--
-- Indices de la tabla `panciano`
--
ALTER TABLE `panciano`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pjoven`
--
ALTER TABLE `pjoven`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pninno`
--
ALTER TABLE `pninno`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `hospital`
--
ALTER TABLE `hospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`hospital`) REFERENCES `hospital` (`ID`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`hospital`) REFERENCES `hospital` (`ID`);

--
-- Filtros para la tabla `panciano`
--
ALTER TABLE `panciano`
  ADD CONSTRAINT `panciano_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `paciente` (`ID`);

--
-- Filtros para la tabla `pjoven`
--
ALTER TABLE `pjoven`
  ADD CONSTRAINT `pjoven_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `paciente` (`ID`);

--
-- Filtros para la tabla `pninno`
--
ALTER TABLE `pninno`
  ADD CONSTRAINT `pninno_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `paciente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
