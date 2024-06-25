-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 01:54:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquicars`
--
CREATE DATABASE alquicars; 

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--

CREATE TABLE alquicars.`rentas` (
  `idRenta` int(50) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  `auto` varchar(50) NOT NULL,
  `desde` varchar(50) NOT NULL,
  `hasta` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rentas`
--

INSERT INTO alquicars.`rentas` (`idRenta`, `idUsuario`, `auto`, `desde`, `hasta`, `estado`) VALUES
(2, 'santiagocasellas2005@gmail.com', 'pickup', '2024-03-31', '2024-06-06', 'Aceptado'),
(3, 'niideapadre@gmail.com', 'Sedán', '2024-03-31', '2024-06-06', 'Cancelado'),
(4, 'niideapadre@gmail.com', 'suv', '0003-03-31', '0044-04-04', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE alquicars.`users` (
  `idUsuario` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `creacionCuenta` varchar(30) NOT NULL,
  `rol` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO alquicars.`users` (`idUsuario`, `password`, `email`, `creacionCuenta`, `rol`) VALUES
(1, '123', 'santiagocasellas2005@gmail.com', '24-06-2024', 'admin'),
(3, '123', 'niideapadre@gmail.com', '25-06-24', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rentas`
--
ALTER TABLE alquicars.`rentas`
  ADD PRIMARY KEY (`idRenta`);

--
-- Indices de la tabla `users`
--
ALTER TABLE alquicars.`users`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rentas`
--
ALTER TABLE alquicars.`rentas`
  MODIFY `idRenta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE alquicars.`users`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
