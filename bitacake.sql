-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-02-2014 a las 21:21:12
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.4.4-14+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bitacake`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 80),
(2, 1, NULL, NULL, 'Admin', 2, 5),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 1, NULL, NULL, 'Comments', 6, 17),
(5, 4, NULL, NULL, 'index', 7, 8),
(6, 4, NULL, NULL, 'view', 9, 10),
(7, 4, NULL, NULL, 'add', 11, 12),
(8, 4, NULL, NULL, 'edit', 13, 14),
(9, 4, NULL, NULL, 'delete', 15, 16),
(10, 1, NULL, NULL, 'Groups', 18, 29),
(11, 10, NULL, NULL, 'admin_index', 19, 20),
(12, 10, NULL, NULL, 'admin_view', 21, 22),
(13, 10, NULL, NULL, 'admin_add', 23, 24),
(14, 10, NULL, NULL, 'admin_edit', 25, 26),
(15, 10, NULL, NULL, 'admin_delete', 27, 28),
(16, 1, NULL, NULL, 'Pages', 30, 33),
(17, 16, NULL, NULL, 'display', 31, 32),
(18, 1, NULL, NULL, 'Posts', 34, 47),
(19, 18, NULL, NULL, 'index', 35, 36),
(20, 18, NULL, NULL, 'listado', 37, 38),
(21, 18, NULL, NULL, 'view', 39, 40),
(22, 18, NULL, NULL, 'admin_add', 41, 42),
(23, 18, NULL, NULL, 'admin_edit', 43, 44),
(24, 18, NULL, NULL, 'admin_delete', 45, 46),
(25, 1, NULL, NULL, 'Users', 48, 69),
(26, 25, NULL, NULL, 'admin_delete', 49, 50),
(27, 25, NULL, NULL, 'admin_edit', 51, 52),
(28, 25, NULL, NULL, 'index', 53, 54),
(29, 25, NULL, NULL, 'admin_index', 55, 56),
(30, 25, NULL, NULL, 'login', 57, 58),
(31, 25, NULL, NULL, 'admin_login', 59, 60),
(32, 25, NULL, NULL, 'logout', 61, 62),
(33, 25, NULL, NULL, 'register', 63, 64),
(34, 25, NULL, NULL, 'view', 65, 66),
(35, 25, NULL, NULL, 'admin_view', 67, 68),
(36, 1, NULL, NULL, 'AclExtras', 70, 71),
(37, 1, NULL, NULL, 'DebugKit', 72, 79),
(38, 37, NULL, NULL, 'ToolbarAccess', 73, 78),
(39, 38, NULL, NULL, 'history_state', 74, 75),
(40, 38, NULL, NULL, 'sql_explain', 76, 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da táboa `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `comment` longtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfils`
--

CREATE TABLE IF NOT EXISTS `perfils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `avatar` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Estrutura da táboa `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `body` longtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
