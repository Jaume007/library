-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-03-2017 a las 12:58:39
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jaume`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `pickDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `realReturn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `book_id`, `pickDate`, `returnDate`, `realReturn`) VALUES
(8, 5, 2, '2017-03-25', '2017-04-01', '2017-03-17'),
(9, 5, 2, '2017-04-02', '2017-04-09', '2017-03-17'),
(10, 5, 2, '2017-03-17', '2017-03-24', '2017-03-17'),
(11, 5, 2, '2017-04-10', '2017-04-17', NULL),
(12, 2, 15, '2017-03-17', '2017-03-31', '2017-03-17'),
(13, 2, 2, '2017-04-20', '2017-04-27', '2017-03-17'),
(14, 2, 15, '2017-04-11', '2017-04-25', '2017-03-17'),
(15, 6, 2, '2017-03-29', '2017-04-01', NULL),
(16, 6, 2, '2017-03-17', '2017-03-24', NULL),
(17, 5, 2, '2017-04-18', '2017-05-02', NULL),
(18, 6, 2, '2017-05-10', '2017-05-24', NULL),
(20, 2, 2, '2017-03-25', '2017-03-28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `conservation` smallint(6) NOT NULL,
  `protection` smallint(6) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `isbn`, `conservation`, `protection`, `active`) VALUES
(2, '0385233132', 0, 1, 1),
(3, '0385247931', 0, 0, 1),
(4, '0553293354', 0, 0, 1),
(5, '0385177259', 0, 0, 1),
(6, '0385233124', 0, 0, 1),
(7, '1476781117', 0, 1, 1),
(8, '1886778272', 0, 0, 1),
(9, '1476782237', 0, 0, 1),
(10, '0606171185', 1, 1, 1),
(11, '0748122966', 1, 0, 1),
(12, '0748122982', 0, 0, 1),
(13, '0356504247', 0, 1, 1),
(14, '0748122974', 0, 0, 1),
(15, '0356504182', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `IDcard` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'img/noprofile.jpg',
  `adress` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `name`, `surname`, `IDcard`, `telephone`, `email`, `photo`, `adress`, `type`) VALUES
(2, 'librarian', '$2y$10$wv/j4o81u44C3AOU4hYK8OhYSJBgjCvB6I.XiVj77rYj58lxcUcla', 'Maria Eul&agrave;lia', 'asdfasdf', '3412351251534', '', 'afdasdfas@asdfasd.com', 'img/noprofile.jpg', '', 51),
(5, 'admin', '$2y$10$kk2jIRDGQaBTl/eYIgYF4Oi77KECzNFAgF80JpjsnUxmfcm7TXWyO', 'asdfafs', 'asdfafds', '123412341234', '12341123618', 'asdffasd@sdfasdf.com', 'img/noprofile.jpg', 'asdfa sdfas dfsad', 100),
(6, 'jaume', '$2y$10$Wum3bgj41.kOiIDo4So4R.l.erDcUIDujHS9KRk7mvVj/TtvUMS.y', 'Jaume', 'Pons', '12341234', '2141234123', 'jaume@prova.com', 'img/users/6', 'asdfasd f', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_users_id_fk` (`user_id`),
  ADD KEY `bookings_books_id_fk` (`book_id`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_books_id_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `bookings_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
