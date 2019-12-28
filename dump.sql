-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Хост: mysql011.infobox.ru
-- Время создания: Дек 26 2019 г., 09:50
-- Версия сервера: 5.6.30-log
-- Версия PHP: 5.6.30-0+deb8u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `z159472_pn11`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `parent` int(3) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` longtext,
  `author` int(2) DEFAULT NULL,
  `type` enum('section','article') NOT NULL,
  `navigation` enum('open','scroll') NOT NULL,
  `reviews_vis` enum('0','1') NOT NULL,
  `reviews_add` int(3) DEFAULT '0',
  `position` int(3) NOT NULL,
  `is_const` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `parent`, `name`, `content`, `author`, `type`, `navigation`, `reviews_vis`, `reviews_add`, `position`, `is_const`) VALUES
(1, NULL, 'home', '	\n<p><b><i>Купили квартиру или дом?<br>\nРешили обновить свое жилье? Или дизайн офиса уже устарел?</i></b>&emsp;\n<span class=''excl red''>ВАМ СЮДА!</span></p>\n<p><span class=''excl red''>ЛЕСТНИЦЫ, мебель и предметы интерьера</span></p>\n<p>Лестницы компании «Студия Ступени» — красивые, надежные и безопасные лестничные     конструкции для вашего дома. Мы будем рады, если вы доверите нам спроектировать,           изготовить и установить лестницы в вашей квартире, загородном доме, коттедже или на даче.\nПроектирование и изготовление на заказ\nМы проектируем, изготавливаем и монтируем лестничные конструкции на заказ для квартир, загородных домов, коттеджей и дач в СПб и Ленинградской области. Если вы планируете строительство или ремонт, закажите у нас проект и изготовление лестницы для дома,         квартиры или дачи. Мы посоветуем лучшее решение с учетом планировки и           площади дома, особенностей интерьера.</p>\n<p>Лестницы «Студии Ступени» — это:\n<ul>\n<li>Качественные, тщательно отобранные материалы</li>\n<li>Конструкции под ключ: проект, изготовление, установка</li>\n<li>Продажа готовых решений и индивидуальные проекты</li>\n<li>Доступные цены</li>\n<li>Гарантия</li>\n</ul>\n</p>\n', 0, 'section', 'scroll', '0', 0, 1, '1'),
(2, NULL, 'contacts', '', NULL, 'section', 'scroll', '0', 0, 4, '1'),
(3, NULL, 'reviews', '<h2>Отзывы: </h2><br>', NULL, 'section', 'scroll', '1', 1, 3, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `page` int(3) NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `rating` int(1) NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `created` int(15) NOT NULL,
  `mods` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `page`, `author`, `email`, `content`, `rating`, `visible`, `created`, `mods`) VALUES
(1, 3, 'Author 1', 'example@mail.ru', 'It&acute;s a good production', 8, '1', 10, '');
