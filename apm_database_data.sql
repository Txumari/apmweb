-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2013 a las 18:35:51
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
(1, 'TFG2013', 'Trabajo fin de grado 2013', 28, 32),
(2, 'Test1', 'description 1', 29, 32),
(3, 'Test2', 'Description 2', 29, 32);

--
-- Volcado de datos para la tabla `project_user`
--

INSERT INTO `project_user` (`project_id`, `user_id`, `id`) VALUES
(1, 1, 14),
(1, 8, 15),
(1, 26, 8),
(1, 27, 10),
(2, 1, 16),
(3, 24, 18),
(3, 26, 17);

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `salt`, `email`, `active`, `rol`, `creation_date`) VALUES
(1, 'FredSmith', '00ef18ed4976d8c85c50c4506b8de2ba20b9fddc2e992bd246a6d59ffb52b7fb6a3e87c65c59de72ae3d623bbfeb566519b48f2f4616a77441f4c0b08bd8598f', '9d6492588e23214c216e36fed2648437', 'fred@smith.com', 1, 'member', '2013-05-07 18:51:07'),
(8, 'FredSmith1', '3f28568366240a54e802b8130077b999f479b077', '9d6492588e23214c216e36fed2648437', 'fred@smith1.com', 1, 'member', '2013-05-07 19:04:31'),
(24, 'FredSmith2', '3f28568366240a54e802b8130077b999f479b077', '9d6492588e23214c216e36fed2648437', 'fred@smith2.com', 1, 'member', '2013-05-07 19:21:40'),
(25, 'FredSmith3', '841bf101a2a869e2d7d708e78226a28f7cf0823fa0c1cea7a5c3ad45942baa4a929ccede9470bb63ec659b1d26551d82c018a84b1045afa5c631271fab96d211', '9d6492588e23214c216e36fed2648437', 'fred@smith3.com', 1, 'member', '2013-05-09 18:27:47'),
(26, 'jesus', '67623d6e417f605bc6d03cb5b0461c8326e410cdda648ead14ceb64f87b8d3d87e752d9387e10cf026cb3ea9ab913734415f6b6bfb15cc8aace6bd1e5568b772', '99d0e6ee83de40b16867ea034a428222', 'jesus@jesus.com', 1, 'member', '2013-05-14 18:05:08'),
(27, 'jesus1', '2a514cf0cda5068b3440b5b2b984df1bb42bfbbbe7c2e6beb3f449808fad7fe2a56bb44a8196a0b44d4b02f2decdd207288ba3bb97be1a42a4e429335e3b8b54', 'd29783f8ab895bdb708b162ed105d35d', 'txumaritig@gmail.com', 1, 'member', '2013-05-14 18:10:55'),
(28, 'jesus2', '3054760308196f1e5e5ecfe63196b6b2792ff80466e9e76884d19320fa19faadac1904cc871ed02c431a4aa2b3c4637aca010ec225602a359a7729eb8bb6b163', '3d501594ea6ff79ee141e9d15e4a441d', 'jesus2@jesus.com', 1, 'client', '2013-05-14 18:13:45'),
(29, 'jesus32', 'db76494b198510053d2ed6408dd7288ca4c1c893006e6c30fa0210240e94de583b349e84e5f2cc69af3a667b2c70d20acdc805ce32657c9612f2e1ddff5fa5ae', '27dccc7c14c02d0cb46e90c0628b1649', 'jesus3@jesus.com', 1, 'client', '2013-05-14 18:15:06'),
(30, 'juan', '4edece35fdff0e8b2a58d50305dfbc6eae5b8722b3f9ec2c9e8b2fdcacfe104d2337afd26fe808c6cd940f63b91ed8883cd291e71d5c3bdaf512622213ebe8a7', '30d335b8f955be0898882d999b6f7df6', 'juan@juan.ess', 1, 'member', '2013-05-16 19:24:08'),
(31, 'carlos', 'f74361342c4faeb7e64b5687a799dee3c72191e4859fdcb8225db7be70388beb71388cb058e04f6a5e36c5466c32acce3db401aa727711536e992eecace06a6c', 'e6e075ff43d0f40ca5ad4662a7474216', 'carlos@carlos.es', 1, 'admin', '2013-05-16 19:26:51'),
(32, 'aransay', '40e92e7ac456cbd7fec40ea75d78ff3dec2fc97b4392b14c97dbf5a33359ee1e7d98ed4729e74e80ed52348a879b2c69d9e564bbf0e06856018570e0eb6e68d7', '58093a15e0105c5261c2c183381a5d95', 'aransay@aransay.es', 1, 'scrum master', '2013-05-19 11:37:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
