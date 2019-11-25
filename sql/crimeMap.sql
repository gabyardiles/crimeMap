-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2019 a las 13:30:06
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.1.32

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
  `ID_crime` int(11) NOT NULL,
  `type_crime_id` int(11) NOT NULL,
  `crime_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_register` date DEFAULT NULL,
  `latitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `longitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_crime` date DEFAULT NULL,
  `hour_crime` time DEFAULT NULL,
  `zone_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `crime`
--

INSERT INTO `crime` (`ID_crime`, `type_crime_id`, `crime_description`, `date_register`, `latitude`, `longitude`, `date_crime`, `hour_crime`, `zone_id`, `address`, `status`) VALUES
(1, 1, 'Me acosaron en el Roca', '2018-01-05', '-34.737410', '-58.392321', '2018-01-05', '10:00:00', 1, NULL, 'Disponible'),
(2, 1, 'Acoso en vía pública', '2018-04-04', '-34.751941', '-58.392321', '2018-04-04', '12:00:00', 2, NULL, 'Disponible'),
(3, 2, 'Entraron a mi casa', '2019-07-07', '-34.742017', '-58.394496', '2019-07-07', '15:05:00', 2, NULL, 'Disponible'),
(4, 2, 'Se metieron por la ventana!!!', '2019-04-01', '-34.743022', '-58.399303', '2019-04-01', '17:01:00', 2, NULL, 'Disponible'),
(5, 5, 'Venden Paco!!!', '2019-07-01', '-34.808489', '-58.473670', NULL, NULL, 3, NULL, 'Disponible'),
(6, 6, 'Rompieron la plaza', '2019-07-05', '-34.797422', '-58.445157', '2019-07-05', '11:00:00', 5, NULL, 'Disponible'),
(7, 1, 'Me manoseó una chica en la calle', '2019-07-05', '-34.787511', '-58.402322', '2019-07-05', '11:15:00', 1, NULL, 'Disponible'),
(8, 1, 'Me dijeron groserías y se fueron corriendo.', '2019-07-05', '-34.772141', '-58.397751', '2019-07-04', '17:00:00', 2, NULL, 'Aprobado'),
(9, 2, 'Entradera en ocasión de fiesta', '2019-10-07', '-34.752170', '-58.394496', '2019-08-07', '18:30:00', 2, NULL, 'Aprobado'),
(10, 2, 'Robo de alfajores y otros', '2019-08-01', '-34.743888', '-58.399999', '2019-07-01', '14:00:00', 2, NULL, 'Aprobado'),
(11, 5, 'Venden estupefacientes a toda hora', '2019-07-02', '-34.832422', '-58.488817', '2019-07-02', '00:00:00', 5, NULL, 'Aprobado'),
(12, 6, 'Destrozaron todo, son los chicos de Pocha que siempre hacen esto', '2019-07-07', '-34.803422', '-58.447217', '2019-07-07', '12:00:00', 5, NULL, 'Aprobado'),
(13, 4, 'Agregar descripcion', '2019-05-05', '-34.787515', '-58.402362', '2019-09-05', '11:15:00', 3, NULL, 'Disponible'),
(14, 4, 'Agregar descripcion', '2019-10-05', '-34.787515', '-58.402362', '2019-10-05', '11:15:00', 3, NULL, 'Disponible'),
(15, 2, 'Agregar descripcion', '2019-04-05', '-34.787565', '-58.402361', '2019-03-05', '11:15:00', 5, NULL, 'Disponible'),
(16, 5, 'Agregar descripcion', '2019-08-05', '-34.786565', '-58.402391', '2019-04-05', '11:15:00', 2, NULL, 'Disponible'),
(17, 1, 'Agregar descripcion', '2019-01-05', '-34.787515', '-58.402345', '2019-04-05', '11:15:00', 5, NULL, 'Aprobado'),
(18, 1, 'Agregar descripcion', '2019-02-06', '-34.787515', '-58.402345', '2019-02-06', '11:15:00', 5, NULL, 'Aprobado'),
(19, 1, 'Agregar descripcion', '2019-03-07', '-34.787515', '-58.402345', '2019-03-07', '11:15:00', 5, NULL, 'Aprobado'),
(20, 1, 'Agregar descripcion', '2019-04-08', '-34.787515', '-58.402345', '2019-04-08', '11:15:00', 5, NULL, 'Aprobado'),
(21, 1, 'Agregar descripcion', '2019-05-09', '-34.787515', '-58.402345', '2019-04-08', '11:15:00', 5, NULL, 'Aprobado'),
(22, 1, 'Agregar descripcion', '2019-06-10', '-34.787515', '-58.402345', '2019-05-09', '11:15:00', 5, NULL, 'Aprobado'),
(23, 1, 'Agregar descripcion', '2019-07-11', '-34.794208', '-58.4493372,14', '2019-05-09', '11:15:00', 8, NULL, 'Aprobado'),
(24, 5, 'Agregar descripcion', '2019-07-25', '-34.6613781', '-58.3764069,15', '2019-07-05', '11:15:00', 9, NULL, 'Aprobado'),
(25, 3, 'Agregar descripcion', '2019-07-15', '-34.7146879', '-58.4283555,13', '2019-07-05', '11:15:00', 10, NULL, 'Aprobado'),
(26, 4, 'Agregar descripcion', '2019-06-26', '-38.787511', '-57.402322', '2019-07-05', '11:15:00', 1, NULL, 'Aprobado'),
(27, 1, 'Agregar descripcion', '2019-12-27', '-32.787511', '-55.402322', '2019-07-05', '11:15:00', 1, NULL, 'Aprobado'),
(28, 4, 'Agregar descripcion', '2019-11-20', '-39.787511', '-58.407322', '2019-07-05', '11:15:00', 1, NULL, 'Aprobado'),
(29, 1, 'Agregar descripcion', '2019-12-02', '-37.787811', '-58.478322', '2019-07-05', '11:15:00', 1, NULL, 'Aprobado'),
(31, 5, 'Agregar descripcion', '2019-12-31', '-37.787911', '-58.408922', '2019-07-31', '11:15:00', 1, NULL, 'Aprobado'),
(1000, 4, 'DescripciÛn delito 1000', '2019-10-01', '-34.788830', '-58.405360', '2019-10-01', '11:15:00', 1, NULL, 'Disponible'),
(1001, 5, 'DescripciÛn delito 1001', '2019-09-10', '-34.784068', '-58.404523', '2019-09-10', '11:15:00', 1, NULL, 'Disponible'),
(1002, 5, 'DescripciÛn delito 1002', '2019-06-27', '-34.781103', '-58.402681', '2019-06-27', '11:15:00', 1, NULL, 'Disponible'),
(1003, 5, 'DescripciÛn delito 1003', '2019-03-07', '-34.788244', '-58.40245', '2019-03-07', '11:15:00', 1, NULL, 'Disponible'),
(1004, 1, 'DescripciÛn delito 1004', '2019-01-05', '-34.783194', '-58.408195', '2019-01-05', '11:15:00', 1, NULL, 'Disponible'),
(1005, 2, 'DescripciÛn delito 1005', '2019-02-17', '-34.789372', '-58.407730', '2019-02-17', '11:15:00', 1, NULL, 'Disponible'),
(1006, 4, 'DescripciÛn delito 1006', '2019-02-23', '-34.781651', '-58.405508', '2019-02-23', '11:15:00', 1, NULL, 'Disponible'),
(1007, 5, 'DescripciÛn delito 1007', '2019-07-23', '-34.783384', '-58.404013', '2019-07-23', '11:15:00', 1, NULL, 'Disponible'),
(1008, 4, 'DescripciÛn delito 1008', '2019-09-05', '-34.781970', '-58.402985', '2019-09-05', '11:15:00', 1, NULL, 'Disponible'),
(1009, 5, 'DescripciÛn delito 1009', '2019-12-19', '-34.78829', '-58.409028', '2019-12-19', '11:15:00', 1, NULL, 'Disponible'),
(1010, 2, 'DescripciÛn delito 1010', '2019-02-28', '-34.789752', '-58.403231', '2019-02-28', '11:15:00', 1, NULL, 'Disponible'),
(1011, 1, 'DescripciÛn delito 1011', '2019-01-26', '-34.784900', '-58.402433', '2019-01-26', '11:15:00', 1, NULL, 'Disponible'),
(1012, 2, 'DescripciÛn delito 1012', '2019-05-24', '-34.78817', '-58.408668', '2019-05-24', '11:15:00', 1, NULL, 'Disponible'),
(1013, 3, 'DescripciÛn delito 1013', '2019-04-05', '-34.784860', '-58.409746', '2019-04-05', '11:15:00', 1, NULL, 'Disponible'),
(1014, 5, 'DescripciÛn delito 1014', '2019-11-21', '-34.787403', '-58.405333', '2019-11-21', '11:15:00', 1, NULL, 'Disponible'),
(1015, 2, 'DescripciÛn delito 1015', '2019-08-03', '-34.786636', '-58.405885', '2019-08-03', '11:15:00', 1, NULL, 'Disponible'),
(1016, 1, 'DescripciÛn delito 1016', '2019-12-09', '-34.786242', '-58.408256', '2019-12-09', '11:15:00', 1, NULL, 'Disponible'),
(1017, 1, 'DescripciÛn delito 1017', '2019-11-27', '-34.789994', '-58.405807', '2019-11-27', '11:15:00', 1, NULL, 'Disponible'),
(1296, 1, 'Descripcion delito 1296', '2019-10-26', '-34.783534', '-58.407367', '2019-10-26', '11:15:00', 1, NULL, 'Aprobado'),
(1297, 2, 'DescripciÛn delito 1297', '2019-07-21', '-34.784572', '-58.407714', '2019-07-21', '11:15:00', 1, NULL, 'Aprobado'),
(1298, 4, 'DescripciÛn delito 1298', '2019-01-24', '-34.782078', '-58.404471', '2019-01-24', '11:15:00', 1, NULL, 'Aprobado'),
(1299, 3, 'DescripciÛn delito 1299', '2019-03-11', '-34.788849', '-58.407862', '2019-03-11', '11:15:00', 1, NULL, 'Aprobado'),
(1300, 3, 'DescripciÛn delito 1300', '2019-10-11', '-34.787946', '-58.40994', '2019-10-11', '11:15:00', 1, NULL, 'Aprobado'),
(1301, 3, 'DescripciÛn delito 1301', '2019-10-03', '-34.783094', '-58.404782', '2019-10-03', '11:15:00', 1, NULL, 'Aprobado'),
(1302, 3, 'DescripciÛn delito 1302', '2019-06-04', '-34.782226', '-58.402587', '2019-06-04', '11:15:00', 1, NULL, 'Aprobado'),
(1303, 4, 'DescripciÛn delito 1303', '2019-03-21', '-34.781675', '-58.409446', '2019-03-21', '11:15:00', 1, NULL, 'Aprobado'),
(1304, 1, 'DescripciÛn delito 1304', '2019-10-15', '-34.789989', '-58.401953', '2019-10-15', '11:15:00', 1, NULL, 'Aprobado'),
(1305, 3, 'DescripciÛn delito 1305', '2019-09-06', '-34.782810', '-58.407819', '2019-09-06', '11:15:00', 1, NULL, 'Aprobado'),
(1306, 3, 'DescripciÛn delito 1306', '2019-03-29', '-34.78464', '-58.406298', '2019-03-29', '11:15:00', 1, NULL, 'Aprobado'),
(1307, 1, 'DescripciÛn delito 1307', '2019-10-17', '-34.782800', '-58.402598', '2019-10-17', '11:15:00', 1, NULL, 'Aprobado'),
(1308, 3, 'DescripciÛn delito 1308', '2019-08-10', '-34.788359', '-58.406073', '2019-08-10', '11:15:00', 1, NULL, 'Aprobado'),
(1309, 1, 'DescripciÛn delito 1309', '2019-07-02', '-34.787215', '-58.407861', '2019-07-02', '11:15:00', 1, NULL, 'Aprobado'),
(1310, 4, 'DescripciÛn delito 1310', '2019-10-13', '-34.782228', '-58.40466', '2019-10-13', '11:15:00', 1, NULL, 'Aprobado'),
(1311, 2, 'DescripciÛn delito 1311', '2019-05-08', '-34.787299', '-58.40830', '2019-05-08', '11:15:00', 1, NULL, 'Aprobado'),
(1312, 4, 'DescripciÛn delito 1312', '2019-04-26', '-34.782321', '-58.404713', '2019-04-26', '11:15:00', 1, NULL, 'Aprobado'),
(1313, 4, 'DescripciÛn delito 1313', '2019-10-29', '-34.784576', '-58.404273', '2019-10-29', '11:15:00', 1, NULL, 'Aprobado'),
(1315, 2, 'DescripciÛn delito 1315', '2019-11-10', '-34.786122', '-58.402151', '2019-11-10', '11:15:00', 1, NULL, 'Aprobado'),
(1316, 2, 'DescripciÛn delito 1316', '2019-06-29', '-34.785358', '-58.40517', '2019-06-29', '11:15:00', 1, NULL, 'Aprobado'),
(1317, 5, 'DescripciÛn delito 1317', '2019-10-22', '-34.782809', '-58.403192', '2019-10-22', '11:15:00', 1, NULL, 'Aprobado'),
(1318, 5, 'DescripciÛn delito 1318', '2019-03-28', '-34.78428', '-58.404566', '2019-03-28', '11:15:00', 1, NULL, 'Aprobado'),
(1319, 2, 'DescripciÛn delito 1319', '2019-06-16', '-34.787868', '-58.409609', '2019-06-16', '11:15:00', 1, NULL, 'Aprobado'),
(1320, 5, 'DescripciÛn delito 1320', '2019-02-06', '-34.782518', '-58.406020', '2019-02-06', '11:15:00', 1, NULL, 'Aprobado'),
(1321, 2, 'DescripciÛn delito 1321', '2019-02-17', '-34.788150', '-58.408442', '2019-02-17', '11:15:00', 1, NULL, 'Aprobado'),
(1322, 2, 'DescripciÛn delito 1322', '2019-09-29', '-34.784845', '-58.401990', '2019-09-29', '11:15:00', 1, NULL, 'Aprobado'),
(1323, 2, 'DescripciÛn delito 1323', '2019-09-24', '-34.788213', '-58.405003', '2019-09-24', '11:15:00', 1, NULL, 'Aprobado'),
(1324, 1, 'DescripciÛn delito 1324', '2019-07-07', '-34.78280', '-58.409694', '2019-07-07', '11:15:00', 1, NULL, 'Aprobado'),
(1325, 2, 'DescripciÛn delito 1325', '2019-04-05', '-34.784056', '-58.405222', '2019-04-05', '11:15:00', 1, NULL, 'Aprobado');

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
  `nombre` varchar(50) NOT NULL,
  `password` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `type_user_id`, `email`, `nombre`, `password`) VALUES
(1, 2, 'ardilesgraciela@gmail.com', 'Ardiles Graciela', '12345678'),
(3, 2, 'garridonm@gmail.com', 'Nicolas Garrido', '12345678'),
(4, 3, 'gaby_ardiles@hotmail.com.ar', 'Angel Ardiles', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zones`
--

CREATE TABLE `zones` (
  `ID` int(11) NOT NULL,
  `zone_description` varchar(100) NOT NULL,
  `order_zones` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `zones`
--

INSERT INTO `zones` (`ID`, `zone_description`, `order_zones`) VALUES
(1, 'Lomas', 0),
(2, 'Banfield', 0),
(3, 'Monte grande', 0),
(4, 'Ezeiza', 0),
(5, 'Luis guillon', 0),
(6, 'La union', 0),
(7, 'Canning', 0),
(8, 'LLavallol', 0),
(9, 'Avellaneda', 0),
(10, 'Lanús', 0),
(11, 'Remedios de escalada', 0),
(12, 'Temperley', 0),
(13, 'El jaguel', 0),
(14, 'Tristan suarez', 0),
(15, 'Spegazzini', 0),
(16, 'Otros', 99999);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`ID_crime`),
  ADD KEY `type_crime_id` (`type_crime_id`),
  ADD KEY `zone_id` (`zone_id`);

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
-- Indices de la tabla `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crime`
--
ALTER TABLE `crime`
  MODIFY `ID_crime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1371;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zones`
--
ALTER TABLE `zones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`type_crime_id`) REFERENCES `type_crime` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `crime_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type_user_id`) REFERENCES `type_user` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
