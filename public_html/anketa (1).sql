-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 25 2015 г., 08:26
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `anketa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `point_id` int(11) NOT NULL,
  `portnumb_value` double NOT NULL,
  `frequency_value` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `point_id` (`point_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `point_id`, `portnumb_value`, `frequency_value`) VALUES
(164, 25, 1, 0, 1),
(165, 25, 2, 0, 1),
(166, 25, 3, 0, 1),
(167, 25, 4, 0, 1),
(168, 25, 5, 0, 1),
(169, 25, 6, 0, 1),
(170, 25, 7, 0, 1),
(171, 25, 8, 1, 2),
(172, 25, 9, 2, 3),
(173, 25, 10, 1, 4),
(174, 26, 1, 0, 1),
(175, 26, 2, 0, 1),
(176, 26, 3, 0, 1),
(177, 26, 4, 0, 1),
(178, 26, 5, 0, 1),
(179, 26, 6, 2, 5),
(180, 26, 7, 1, 4),
(181, 26, 8, 1, 4),
(182, 26, 9, 0, 1),
(183, 26, 10, 0, 1),
(184, 26, 11, 2, 4),
(185, 26, 12, 2, 3),
(186, 26, 13, 1, 4),
(187, 26, 14, 0, 1),
(188, 26, 15, 0, 1),
(189, 26, 16, 0, 1),
(190, 26, 17, 1, 3),
(191, 26, 18, 1, 3),
(192, 26, 19, 0, 1),
(193, 26, 20, 0, 1),
(194, 26, 21, 0, 1),
(195, 26, 22, 0, 1),
(196, 26, 23, 0, 1),
(197, 26, 24, 0, 1),
(198, 26, 25, 0, 1),
(199, 26, 26, 1, 2),
(200, 26, 27, 2, 3),
(201, 26, 28, 2, 3),
(202, 26, 29, 3, 3),
(203, 26, 30, 1, 4),
(204, 26, 31, 1, 3),
(205, 26, 32, 0, 1),
(206, 26, 33, 0, 1),
(207, 26, 34, 0, 1),
(208, 26, 35, 0, 1),
(209, 26, 36, 0, 1),
(210, 26, 37, 1, 3),
(211, 26, 38, 0, 1),
(212, 26, 39, 0, 1),
(213, 26, 40, 0, 1),
(214, 26, 41, 0, 1),
(215, 26, 42, 0, 1),
(216, 26, 43, 0, 1),
(217, 26, 44, 0, 1),
(218, 26, 45, 0, 1),
(219, 26, 46, 2, 4),
(220, 26, 47, 0, 1),
(221, 26, 48, 0, 1),
(222, 26, 49, 0, 1),
(223, 26, 50, 0, 1),
(224, 26, 51, 0, 1),
(225, 26, 52, 0, 1),
(226, 26, 56, 0, 1),
(227, 26, 57, 2, 3),
(228, 26, 58, 0, 1),
(229, 26, 59, 1, 4),
(230, 26, 60, 0, 1),
(231, 26, 61, 0, 1),
(232, 26, 62, 0, 1),
(233, 26, 63, 0, 1),
(234, 26, 64, 0, 1),
(235, 26, 65, 0, 1),
(236, 26, 66, 1, 6),
(237, 26, 67, 0, 1),
(238, 26, 69, 0, 1),
(239, 26, 70, 0, 1),
(240, 26, 72, 0, 1),
(241, 23, 1, 0.02, 2),
(242, 23, 2, 0, 1),
(243, 23, 3, 0, 1),
(244, 23, 4, 0, 1),
(245, 23, 5, 0, 1),
(246, 23, 6, 0, 1),
(247, 23, 7, 0, 1),
(248, 23, 8, 0.05, 2),
(249, 23, 9, 0.1, 2),
(250, 23, 10, 0.12, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `blanks`
--

CREATE TABLE IF NOT EXISTS `blanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `blanks`
--

INSERT INTO `blanks` (`id`, `number`, `name`) VALUES
(1, 1, 'ХЛЕБОБУЛОЧНЫЕ ИЗДЕЛИЯ'),
(2, 2, 'КАШИ, МАКАРОНЫ'),
(3, 3, 'ОВОЩИ'),
(4, 4, 'ФРУКТЫ'),
(5, 5, 'КОНДИТЕРСКИЕ ИЗДЕЛИЯ'),
(6, 6, 'МАСЛА, ЖИРЫ (видимые столовые жиры в салатах, бутербродах, заправка каш)'),
(7, 7, 'МЯСО И МЯСНЫЕ ПРОДУКТЫ'),
(8, 8, 'РЫБА И МОРЕПРОДУКТЫ'),
(9, 9, 'МОЛОКО И МОЛОЧНЫЕ ПРОДУКТЫ'),
(10, 10, 'НАПИТКИ');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'users'),
(2, 'admins');

-- --------------------------------------------------------

--
-- Структура таблицы `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blank_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(127) NOT NULL,
  `portion` varchar(32) NOT NULL,
  `portnumb` double NOT NULL DEFAULT '0',
  `frequency` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `blank_id` (`blank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Дамп данных таблицы `points`
--

INSERT INTO `points` (`id`, `blank_id`, `number`, `title`, `portion`, `portnumb`, `frequency`) VALUES
(1, 1, 1, 'Булка сдобная', 'шт., 50 г', 0, 0),
(2, 1, 2, 'Блины', 'шт., 50 г', 0, 0),
(3, 1, 3, 'Пирожки любые', 'шт., 80 г', 0, 0),
(4, 1, 4, 'Сушки, баранки', 'шт., 12 г', 0, 0),
(5, 1, 5, 'Печенье, пряники', 'шт., 15 г', 0, 0),
(6, 1, 6, 'Хлеб белый', 'кус., 25г', 0, 0),
(7, 1, 7, 'Хлеб черный', 'кус., 40г', 0, 0),
(8, 2, 8, 'Макароны отварн.  (гарнир, блюда)', 'тар., 150 г', 0, 0),
(9, 2, 9, 'Крупы (каши без  молока, гарнир)', 'тар., 150 г', 0, 0),
(10, 2, 10, 'Каши или супы из круп  молочные', 'тар., 250 г', 0, 0),
(11, 3, 11, 'Картоф. отварн пюре', 'шт., 100 г', 0, 0),
(12, 3, 12, 'Картофель жарен', 'тар., 150 г', 0, 0),
(13, 3, 13, 'Лук репчатый', 'шт., 60 г', 0, 0),
(14, 3, 14, 'Огурцы свежие', 'шт., 120 г', 0, 0),
(15, 3, 15, 'Капуста свежая (сырая,  тушеная)', 'порц.,  100г', 0, 0),
(16, 3, 16, 'Капуста квашеная', 'порц, 150г', 0, 0),
(17, 3, 17, 'Борщи, щи, овощ. супы', 'тар., 300 г', 0, 0),
(18, 3, 18, 'Морковь', 'шт., 120 г', 0, 0),
(19, 3, 19, 'Свекла, винегрет', 'порц., 120г', 0, 0),
(20, 3, 20, 'Редька,репа, редис', 'порц., 120г', 0, 0),
(21, 3, 21, 'Кабачки, патиссоны,  тыква', 'порц.,  100 г', 0, 0),
(22, 3, 22, 'Помидоры свежие', 'шт., 150 г', 0, 0),
(23, 3, 23, 'Петруш. укроп зелень', 'пуч., 10 г', 0, 0),
(24, 3, 24, 'Бобовые в люб. виде  (фасоль, горох, соя)', 'порц.,   20 г', 0, 0),
(25, 3, 25, 'Солен. и марин.овощи', 'порц.,150 г', 0, 0),
(26, 4, 26, 'Яблоки свежие', 'шт., 150 г', 0, 0),
(27, 4, 27, 'Ягоды (смородина, земляника, черника)', 'стак,140 г', 0, 0),
(28, 4, 28, 'Вишня, черешня, слива,  абрикосы', 'стак,140 г', 0, 0),
(29, 4, 29, 'Апельсины, манда-  рины, грейпфруты', 'шт., 150 г', 0, 0),
(30, 4, 30, 'Компоты дом.консерв.', 'стак,200 г', 0, 0),
(31, 4, 31, 'Соки натур.фруктовые', 'стак,200 г', 0, 0),
(32, 4, 32, 'Орехи любые', 'стак, 50 г', 0, 0),
(33, 5, 33, 'Варенье,повидло,джем, мед', 'ст.л, 40г', 0, 0),
(34, 5, 34, 'Конфеты карамель', 'шт., 6 г', 0, 0),
(35, 5, 35, 'Шоколад, конф. шокол', 'шт., 12 г', 0, 0),
(36, 5, 36, 'Пирожные, торты', 'шт., 80 г', 0, 0),
(37, 6, 37, 'Масло растительное', 'ст.л, 17г', 0, 0),
(38, 6, 38, 'Майонез', 'ст.л, 15г', 0, 0),
(39, 6, 39, 'Маргарин', 'ст.л, 15г', 0, 0),
(40, 6, 40, 'Масло сливочное', 'ст.л, 10г', 0, 0),
(41, 6, 41, 'Сало свиное', 'кус., 10г', 0, 0),
(42, 7, 42, 'Сосиски, сардельки', 'шт., 50 г', 0, 0),
(43, 7, 43, 'Колбаса копч., ветчина', 'кус., 20г', 0, 0),
(44, 7, 44, 'Колбаса вареная', 'кус., 50г', 0, 0),
(45, 7, 45, 'Говядина в люб.виде', 'кус., 50г', 0, 0),
(46, 7, 46, 'Свинина в люб.виде', 'кус., 50г', 0, 0),
(47, 7, 47, 'Консервы мясн.(тушенка)', 'ст.л, 20г', 0, 0),
(48, 7, 48, 'Печень животных', 'кус., 50г', 0, 0),
(49, 7, 49, 'Мясо птицы (втч кур)', 'кус., 50г', 0, 0),
(50, 7, 50, 'Баранина в люб.виде', 'кус., 50г', 0, 0),
(51, 7, 51, 'Котлеты и др. из рубл.мяса', 'шт., 60 г', 0, 0),
(52, 7, 52, 'Пельмени из мяса', 'порц.,120 г', 0, 0),
(56, 8, 53, 'Рыба (варен, жар.и др).', 'кус., 80г', 0, 0),
(57, 8, 54, 'Рыба копч., солен., вял', 'кус., 30г', 0, 0),
(58, 9, 55, 'Кефир, простокв., ряж.', 'стак,200 г', 0, 0),
(59, 9, 56, 'Молоко', 'стак,200 г', 0, 0),
(60, 9, 57, 'Сгущенка', 'ст.л, 30г', 0, 0),
(61, 9, 58, 'Сметана, сливки', 'ст.л, 18г', 0, 0),
(62, 9, 59, 'Творог и блюда из твор', 'ст.л, 20г', 0, 0),
(63, 9, 60, 'Сыр тверд и плавлен.', 'кус., 20г', 0, 0),
(64, 9, 61, 'Яйцо варен,омлет,яичн', 'шт., 45 г', 0, 0),
(65, 10, 62, 'Кофе', 'стак,200 г', 0, 0),
(66, 10, 63, 'Чай', 'стак,200 г', 0, 0),
(67, 10, 64, 'Сахар', '1 ч.л., 7г', 0, 0),
(69, 10, 65, 'Пиво', 'бут.,500 г', 0, 0),
(70, 10, 66, 'Вино', 'стак,150 г', 0, 0),
(72, 10, 67, 'Водка, коньяк', 'рюм., 50г.', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `blanks_filled` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `group` int(1) NOT NULL,
  `loc` int(1) NOT NULL,
  `region` varchar(128) NOT NULL,
  `ration` int(1) NOT NULL,
  `growth` double NOT NULL,
  `weight` double NOT NULL,
  `complaints` text NOT NULL,
  `waist` int(11) NOT NULL,
  `hips` int(11) NOT NULL,
  `shoulder` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `blanks_filled`, `age`, `email`, `sex`, `group`, `loc`, `region`, `ration`, `growth`, `weight`, `complaints`, `waist`, `hips`, `shoulder`) VALUES
(12, 23, 2, 25, '', 'm', 3, 3, '55', 2, 1.83, 73, 'Периодические головные боли', 0, 0, 0),
(13, 25, 2, 27, '', 'w', 2, 1, '', 0, 1.6, 41, '', 0, 0, 0),
(14, 26, 10, 29, 'mymail@mail.ru', 'm', 4, 1, '', 0, 1.9, 98, 'Периодические головные боли', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(3) unsigned NOT NULL,
  `question` text NOT NULL,
  `type` varchar(128) NOT NULL,
  `additional` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `number`, `question`, `type`, `additional`) VALUES
(1, 1, 'Ваша дата рождения', 'normal', '-'),
(2, 2, 'Вопрос 1', 'normal', '-'),
(3, 3, 'Вопрос 2', 'normal', '-'),
(4, 4, 'Вопрос 4', 'normal', '-'),
(5, 5, 'Вопрос 5', 'normal', '-'),
(6, 6, 'Вопрос с выбором ответа', 'radio', 'вариант ответа 1;вариант ответа 2;вариант ответа 3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `pass` varchar(127) DEFAULT NULL,
  `answers` int(3) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `authorised` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `answers`, `date`, `group_id`, `authorised`) VALUES
(15, 'admin', 'dbc4d84bfcfe2284ba11beffb853a8c4', 0, '2015-12-25 05:25:03', 2, 1),
(23, 'Имеющий Профиль Пользователь', NULL, 0, '2015-12-15 15:34:10', 1, 0),
(24, 'Совершенно Новый Пользователь', NULL, 0, '2015-12-15 15:49:36', 1, 0),
(25, 'Известный Системе Пользователь', NULL, 0, '2015-12-15 15:58:42', 1, 0),
(26, 'Заполнивший Анкету Пользователь', NULL, 0, '2015-12-15 16:02:59', 1, 0),
(27, 'Новый пользователь номер01', NULL, 0, '2015-12-15 17:10:20', 1, 0),
(28, 'yjdsqfsd', NULL, 0, '2015-12-15 19:48:46', 1, 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`);

--
-- Ограничения внешнего ключа таблицы `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`blank_id`) REFERENCES `blanks` (`id`);

--
-- Ограничения внешнего ключа таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
