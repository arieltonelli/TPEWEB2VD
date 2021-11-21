-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2021 a las 18:00:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_books`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `title` varchar(35) DEFAULT NULL,
  `author` varchar(35) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `id_publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id_book`, `title`, `author`, `price`, `id_publisher`) VALUES
(1, 'El alquimista', 'Coelho', '100', 1),
(14, 'Terapia Cognitiva', 'Beck', '1200', 2),
(17, 'Teoria Web', 'Ribas', '2040', 4),
(19, 'Computacion', 'Juancito', '4564', 4),
(21, 'MVS', 'Ribas', '436', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publishers`
--

CREATE TABLE `publishers` (
  `id_publisher` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `language` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publishers`
--

INSERT INTO `publishers` (`id_publisher`, `name`, `language`) VALUES
(1, 'Salamanca', 'Español'),
(2, 'Paidos', 'Español'),
(4, 'Santillana', 'Español'),
(6, 'Targus', 'Inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('ariel@adm.com', '$2y$10$6mrJbLsEMH64SIUQ/uTRNO3ToTNan2vfP7RVyiX3AEqt5U9QuU6Xm'),
('analia@adm.com', '$2y$10$3WrBl181IbPrJYazDa4J5uBrelfztXz1qe7lqKqvOAhuXAYx9QNrW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `fk_publisher` (`id_publisher`);

--
-- Indices de la tabla `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id_publisher`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_publisher`) REFERENCES `publishers` (`id_publisher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
