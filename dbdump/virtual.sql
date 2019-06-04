-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2019 a las 16:15:08
-- Versión del servidor: 5.6.38
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `gender`, `pass`) VALUES
(4, 'ale', 'ale@dh.com', 'masc', '$2y$10$4mam0F9qqYy0JnPS53QPpueEv64333PL9INJ2zbiERv7v.krEuMoe'),
(5, 'Nacho', 'nachov@dh.com', 'masc', '$2y$10$3WX2vMmn8ba4Qwlz5QTiXuwTxV//QZQCnW0VMJOPqTXYVuegYLGGu'),
(6, 'Alex', 'alex@dh.com', 'masc', '$2y$10$s/4MrnBPgDo9q7fXJQN6XOTwdC8A9s4AJ42riDAfKl4Az.mDCHYOe'),
(7, 'karly', 'karly@dh.com', 'fem', '$2y$10$RSRZMfEWuCrLyKywjDUdAepJ/ZjKRBb7Cpz6yvNKXMFULwRd8CYve'),
(8, 'dani', 'dani@dh.com', 'fem', '$2y$10$IM.HaRmCjqmkw8pnk3rE5esD4XMYZFHGoBczz1H29vUcl7fu8sWDG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
