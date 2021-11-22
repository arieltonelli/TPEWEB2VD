-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2021 a las 22:28:21
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
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
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
(23, 'Tenis', 'Monfils', '500', 1),
(24, 'Tom y JErry', 'Walt', '899', 6),
(25, 'Rolex', 'Ricky', '800000', 4),
(26, 'La historia del Cafe', 'Juan Valdez', '777', 2),
(27, 'El mundo de la Cocina', 'Paulina', '7000', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `body` varchar(750) DEFAULT NULL,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comment`, `subject`, `body`, `id_book`, `id_user`) VALUES
(1, 'Hola', 'Muy bueno todo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publishers`
--

CREATE TABLE `publishers` (
  `id_publisher` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publishers`
--

INSERT INTO `publishers` (`id_publisher`, `name`, `language`) VALUES
(1, 'Salamanca', 'Español'),
(2, 'Paidos', 'Español'),
(4, 'Santillana', 'Español'),
(6, 'Targus', 'Inglés'),
(9, 'La Nacion', 'Español'),
(10, 'Pearson', 'Inglés'),
(11, 'Minotauro', 'Portugues');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` tinyint(1) NOT NULL,
  `id_user` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `password`, `rol`, `id_user`) VALUES
('ariel@adm.com', '$2y$10$6mrJbLsEMH64SIUQ/uTRNO3ToTNan2vfP7RVyiX3AEqt5U9QuU6Xm', 1, 1),
('analia@adm.com', '$2y$10$3WrBl181IbPrJYazDa4J5uBrelfztXz1qe7lqKqvOAhuXAYx9QNrW', 1, 2),
('pedrito@adm.com', '$2y$10$UC1YHI.XzczcInxiSJ1MX.u1KT9moJG3oswayIHsTVAO8ebl8m0Vm', 0, 3),
('electra@catmail.com', '$2y$10$ZR1X8ktLlesukMukUWZCaeUTmg.bFeNw2AivfROH7/FsOlPBf94r6', 0, 7);

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
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indices de la tabla `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
