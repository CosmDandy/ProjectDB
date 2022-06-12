-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 08:25 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `color`, `title`, `user_id`) VALUES
(15, '#7FFFD4', 'folder_1', 1),
(16, '#F6F8FA', 'Folder_2', 1),
(17, '#FFF493', 'Folder_3', 1),
(18, '#87CEEB', 'Folder_4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `article` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `folder_id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `article`, `created`, `deleted`, `folder_id`, `color`) VALUES
(32, 'title', 'jyhgghjhjkg', '2022-06-06', 0, 15, '#7FFFD4'),
(33, 'gkjgkhjl', 'gljkwjklgwkoj;gw', '2022-06-06', 0, 15, '#7FFFD4'),
(34, 'aboba', 'gklhjgllwkg', '2022-06-06', 0, 16, '#F6F8FA'),
(35, '1', 'ggegq', '2022-06-06', 0, 17, '#FFF493'),
(36, '2', 'ggqgqgfqq', '2022-06-06', 0, 17, '#FFF493'),
(37, '1', 'fqfq', '2022-06-06', 0, 18, '#87CEEB'),
(38, '2', 'jyjtjethjeth', '2022-06-06', 0, 18, '#87CEEB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `privileges` varchar(1) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `privileges`, `username`) VALUES
(1, 'login', 'password', '1', NULL),
(2, 'New_user@huya.tv', 'New_user_ahueni_parol', 'u', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
