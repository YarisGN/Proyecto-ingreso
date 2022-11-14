-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2022 a las 17:59:08
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adso1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id_detalles` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `objeto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `observacion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `entrada` timestamp NULL DEFAULT NULL,
  `salida` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id_detalles`, `id_persona`, `objeto`, `observacion`, `entrada`, `salida`) VALUES
(17, 58, 'awbafngfhdnrtse', 'asbwatnsenteds', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id_item`, `descripcion`) VALUES
(1, 'rol'),
(2, 'tipo documento\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `documento` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `tipo_documento`, `documento`, `nombre`, `apellido`, `pass`, `telefono`, `correo`, `rol`) VALUES
(56, 3, '123456789', 'Yaris', 'Narvaez', '$2y$10$HRT6v.6rdZXsIIsR.6dcr.y2ufNks9FXGfDLt5RGwupqm0qOvq5vW', '123456789', 'Yaris@email.com', 17),
(57, 3, '987654321', 'Luis', 'Quintero', '$2y$10$BC4zp8xg4F16EZZJnyDX3OVDwwJ/G67rPqQwPdWN/wygBoq27U/6S', '123456789', 'Luis@email.com', 18),
(58, 4, '12345', 'Milena', 'Luz', '', '123456789', 'MilenaLuz@email.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `documento` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `placa` varchar(30) NOT NULL,
  `serial` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id_salida`, `id_persona`, `documento`, `descripcion`, `placa`, `serial`, `cantidad`, `precio`) VALUES
(14, NULL, 12345, 'fdhdfhfdj', '4546', '4565', 2, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_item`
--

CREATE TABLE `sub_item` (
  `id_sub_item` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sub_item`
--

INSERT INTO `sub_item` (`id_sub_item`, `id_item`, `descripcion`) VALUES
(1, 1, 'Aprendiz'),
(2, 1, 'Instructor'),
(3, 2, 'C.C'),
(4, 2, 'T.I'),
(17, 1, 'Administrador'),
(18, 1, 'Vigilante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id_detalles`),
  ADD UNIQUE KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `tipo_documento` (`tipo_documento`,`rol`) USING BTREE,
  ADD KEY `rol` (`rol`) USING BTREE,
  ADD KEY `tipo_documento_2` (`tipo_documento`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD UNIQUE KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `sub_item`
--
ALTER TABLE `sub_item`
  ADD PRIMARY KEY (`id_sub_item`),
  ADD KEY `id_item` (`id_item`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id_sub_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
