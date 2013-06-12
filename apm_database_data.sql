-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2013 a las 17:16:05
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `apm`
--

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `client_id`, `scrum_master_id`) VALUES
(1, 'TFG2013', 'Trabajo fin de grado 2013', 32, 29);

--
-- Volcado de datos para la tabla `project_user`
--

INSERT INTO `project_user` (`project_id`, `user_id`, `id`) VALUES
(1, 28, 19);

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `name`, `responsible_id`, `state`, `estimate`, `user_story_id`) VALUES
(2, 'Definir Informes', 28, 'Running', 20, 1),
(7, 'Modelo de datos', 28, 'Init', 100, 1),
(8, 'Control de acceso por rol', 28, 'Init', 100, 1),
(9, 'Crear de Modelo de datos', 28, 'Finish', 150, 6),
(10, 'Crear clases MVC', 28, 'Running', 250, 6),
(11, 'Modificar modelo de datos', 28, 'Init', 90, 7);

--
-- Volcado de datos para la tabla `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `user_id`) VALUES
(17, 7, 28),
(18, 2, 28),
(19, 8, 28),
(20, 9, 28),
(21, 10, 28),
(22, 11, 28);

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `salt`, `email`, `active`, `rol`, `creation_date`) VALUES
(28, 'jesus2', '3054760308196f1e5e5ecfe63196b6b2792ff80466e9e76884d19320fa19faadac1904cc871ed02c431a4aa2b3c4637aca010ec225602a359a7729eb8bb6b163', '3d501594ea6ff79ee141e9d15e4a441d', 'jesus2@jesus.com', 1, 'member', '2013-05-14 18:13:45'),
(29, 'Eraso', '3054760308196f1e5e5ecfe63196b6b2792ff80466e9e76884d19320fa19faadac1904cc871ed02c431a4aa2b3c4637aca010ec225602a359a7729eb8bb6b163', '27dccc7c14c02d0cb46e90c0628b1649', 'jesus3@jesus.com', 1, 'scrum master', '2013-05-14 18:15:06'),
(31, 'txumari', '3054760308196f1e5e5ecfe63196b6b2792ff80466e9e76884d19320fa19faadac1904cc871ed02c431a4aa2b3c4637aca010ec225602a359a7729eb8bb6b163', 'e6e075ff43d0f40ca5ad4662a7474216', 'carlos@carlos.es', 1, 'admin', '2013-05-16 19:26:51'),
(32, 'aransay', '3054760308196f1e5e5ecfe63196b6b2792ff80466e9e76884d19320fa19faadac1904cc871ed02c431a4aa2b3c4637aca010ec225602a359a7729eb8bb6b163', '58093a15e0105c5261c2c183381a5d95', 'aransay@aransay.es', 1, 'client', '2013-05-19 11:37:56');

--
-- Volcado de datos para la tabla `user_stories`
--

INSERT INTO `user_stories` (`id`, `name`, `description`, `project_id`, `priority`, `value`, `estimate`) VALUES
(1, 'Acceso director proyectos', 'Como director de proyectos tengo que tengo que poder consultar la información de historias de usuario y tareas', 1, 11, 500, 600),
(6, 'Alta historia de usuario', 'Debera estar asignada a un proyecto', 1, 8, 200, 200),
(7, 'Sprint backlog', 'Como miembro del equipo quiero poder consultar el sprint backlog', 1, 14, 300, 300);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
