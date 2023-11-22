-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 23:47:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cfe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cantidadpagos`
--

CREATE TABLE `tbl_cantidadpagos` (
  `id` int(50) NOT NULL,
  `hora` time NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `idfac` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_cantidadpagos`
--

INSERT INTO `tbl_cantidadpagos` (`id`, `hora`, `cantidad`, `idfac`) VALUES
(2, '13:29:54', 0.00, 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facturas`
--

CREATE TABLE `tbl_facturas` (
  `id` int(50) NOT NULL,
  `fechaemision` date NOT NULL,
  `fechavenci` date NOT NULL,
  `montototal` decimal(7,2) NOT NULL,
  `idmedidor` int(50) NOT NULL,
  `idcliente` int(50) NOT NULL,
  `montopagado` decimal(7,2) NOT NULL,
  `consumo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_facturas`
--

INSERT INTO `tbl_facturas` (`id`, `fechaemision`, `fechavenci`, `montototal`, `idmedidor`, `idcliente`, `montopagado`, `consumo`) VALUES
(1, '2020-11-18', '2023-11-02', 2300.00, 78, 23, 2300.00, 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pagos`
--

CREATE TABLE `tbl_pagos` (
  `id` int(50) UNSIGNED NOT NULL,
  `fechapago` date NOT NULL,
  `metodopago` varchar(50) NOT NULL,
  `idfactura` int(50) NOT NULL,
  `horapago` time NOT NULL,
  `referpago` int(100) NOT NULL,
  `atrasos` decimal(7,2) NOT NULL,
  `estadopago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_pagos`
--

INSERT INTO `tbl_pagos` (`id`, `fechapago`, `metodopago`, `idfactura`, `horapago`, `referpago`, `atrasos`, `estadopago`) VALUES
(1, '2020-02-15', 'Tarjeta', 89, '11:20:00', 7875412, 0.00, 'Completo'),
(2, '2021-06-20', 'Efectivo', 50, '12:40:00', 978546132, 123.00, 'Pendiente'),
(3, '2023-05-12', 'Tarjeta', 78, '10:30:00', 789456, 0.00, 'Completo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cantidadpagos`
--
ALTER TABLE `tbl_cantidadpagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_pagos`
--
ALTER TABLE `tbl_pagos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_pagos`
--
ALTER TABLE `tbl_pagos`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
