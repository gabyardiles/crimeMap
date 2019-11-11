-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2019 a las 00:14:39
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crimeMap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crime`
--

CREATE TABLE `crime` (
  `ID` int(11) NOT NULL,
  `type_crime_id` int(11) NOT NULL,
  `crime_description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_crime`
--

CREATE TABLE `type_crime` (
  `ID` int(11) NOT NULL,
  `type_crime_description` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `type_crime`
--

INSERT INTO `type_crime` (`ID`, `type_crime_description`, `color`) VALUES
(1, 'Acoso y violación', 'red'),
(2, 'Robo de inmuebles', 'orange'),
(3, 'Robo de vehículos', 'pink'),
(4, 'Robo a individuos', 'skyblue'),
(5, 'Venta de estupefacientes', 'beige'),
(6, 'Vandalismo', 'yellow');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_user`
--

CREATE TABLE `type_user` (
  `ID` int(11) NOT NULL,
  `type_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `type_user`
--

INSERT INTO `type_user` (`ID`, `type_description`) VALUES
(1, 'Administrador'),
(2, 'Moderador'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `type_user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `type_user_id`, `email`, `nombre`) VALUES
(1, 1, 'ardilesgraciela@gmail.com', 'Ardiles Graciela');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type_crime_id` (`type_crime_id`);

--
-- Indices de la tabla `type_crime`
--
ALTER TABLE `type_crime`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type_user_id` (`type_user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crime`
--
ALTER TABLE `crime`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `type_crime`
--
ALTER TABLE `type_crime`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `type_user`
--
ALTER TABLE `type_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`type_crime_id`) REFERENCES `type_crime` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type_user_id`) REFERENCES `type_user` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
