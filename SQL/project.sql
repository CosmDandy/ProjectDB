-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 12 2022 г., 23:47
-- Версия сервера: 5.5.29
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `folders`
--

INSERT INTO `folders` (`id`, `color`, `title`, `user_id`) VALUES
(1, '#7FFFD4', 'ffff', 3),
(2, '#7FFFD4', 'Работа', 1),
(3, '#87CEEB', 'Учёба', 1),
(4, '#DDA0DD', 'Подарки', 1),
(5, '#F6F8FA', 'Магазины', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
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
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `title`, `article`, `created`, `deleted`, `folder_id`, `color`) VALUES
(1, '13 июня', 'Протестировать взаимодействие игрока со стенами\r\nПровести с коллегами встречу, обсудив текущие результаты', '2022-06-09', 0, 2, '#7FFFD4'),
(2, '14 июня', 'Сравнить разные механики бега, выбрав наиболее подходящую, начать обдумывать ее реализацию.', '2022-06-10', 0, 2, '#7FFFD4'),
(3, '15 июня', 'Начать прописывать код для реализации механики бега, по готовности отправить другим работниками для тестирования', '2022-06-12', 0, 2, '#7FFFD4'),
(4, 'Теория вероятности', 'Остались номера: 1253, 1868, 2235, 2365, 2568, 3005, 3264', '2022-05-02', 0, 3, '#87CEEB'),
(5, 'История экономических учений', 'Главы 3, 4, 6\r\nЛабораторные 1, 5, 7, 11', '2022-05-10', 0, 3, '#87CEEB'),
(6, 'Введение в менеджмент ', 'Конспекты по главам 1-5\r\nПрактические 5-8\r\nКурсовая', '2022-05-20', 0, 3, '#87CEEB'),
(7, 'Катя', 'Духи, желательно DKNY', '2022-06-01', 0, 4, '#DDA0DD'),
(8, 'Валера', 'Выбрать из: джойстик, кроссовки, телескоп', '2022-06-12', 0, 4, '#DDA0DD'),
(9, 'Дима', 'Скинуться со всеми на Playstation\r\n', '2022-06-12', 0, 4, '#DDA0DD'),
(10, 'Adidas', '12000', '2022-06-12', 0, 5, '#F6F8FA'),
(11, 'Nike', '11300, но качество в Adidas лучше', '2022-06-12', 0, 5, '#F6F8FA'),
(12, 'Puma', '8000 более бюджетный вариант', '2022-06-12', 0, 5, '#F6F8FA');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `privileges` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `privileges`) VALUES
(1, 'uknow@gh.ru', 'testpass', 'u'),
(2, 'project@req.com', 'project', 'u'),
(3, 'ya@new.ru', 'New_user_parol', 'u');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
