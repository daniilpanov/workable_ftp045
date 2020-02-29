-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Хост: mysql011.infobox.ru
-- Время создания: Янв 23 2020 г., 15:28
-- Версия сервера: 5.6.30-log
-- Версия PHP: 5.6.30-0+deb8u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `z159472_pn11`
--
CREATE DATABASE `z159472_pn11` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `z159472_pn11`;

-- --------------------------------------------------------

--
-- Структура таблицы `constants`
--

CREATE TABLE `constants` (
                             `id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `name` varchar(255) NOT NULL,
                             `value` longtext,
                             `translate` tinytext,
                             PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `constants`
--

INSERT INTO `constants` (`id`, `name`, `value`, `translate`) VALUES
(3, 'top-products', 'upload/images/m1.jpg', NULL),
(4, 'top-products', 'upload/images/m2.jpg', NULL),
(5, 'sidebar-img', 'upload/images/sidebar1.png', NULL),
(6, 'sidebar-img', 'upload/images/sidebar2.png', NULL),
(7, 'sidebar-img', 'upload/images/sidebar3.png', NULL),
(8, 'sidebar-img', 'upload/images/sidebar4.png', NULL),
(9, 'top-products', 'upload/images/m3.png', NULL),
(10, 'top-products', 'upload/images/m4.png', NULL),
(11, 'top-products', 'upload/images/m5.png', NULL),
(12, 'top-products', 'upload/images/m6.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
                         `id` bigint(20) NOT NULL AUTO_INCREMENT,
                         `parent` bigint(20) DEFAULT NULL,
                         `name` varchar(255) NOT NULL,
                         `content` longtext,
                         `language` varchar(6) DEFAULT NULL,
                         `keywords` tinytext,
                         `description` mediumtext,
                         `position` bigint(20) DEFAULT NULL,
                         `title` varchar(200) DEFAULT NULL,
                         `is_in_top` enum('0','1') NOT NULL,
                         `is_link` enum('0','1') NOT NULL DEFAULT '0',
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `parent`, `name`, `content`, `language`, `keywords`, `description`, `position`, `title`, visible, `is_link`) VALUES
(1, 0, 'дизайнерские решения', '<img class="float-left" alt="Лестница" src="files/upload/images/for_2.1.png">\n\n<p>\n    <span class="excl blue">\n        Второй ярус. Для чего нужен и как его оформить\n    </span>\n<p>\n    Разбивка помещения на 2 уровня визуально увеличивает пространство и повышает функциональность небольшой по площади\n    комнаты с высокими потолками. Высота потолков определяет возможность использования такого способа зонирования.\n    Полноценный второй уровень получится с высотой в 4 метра и более. Если расстояние до потолка 3-3,5 метра,\n    то второй уровень делают высотой не менее 1 метра, например для спального места, а внизу располагают гардеробную,\n    книжный шкаф, или компьютерный стол.\n<p>\n    В загородных домах второй уровень можно запланировать еще на этапе проектирования. Таким способом можно увеличить\n    гостиную, когда первый ярус плавно по лестнице перетекает на второй. На дополнительном ярусе можно обустроить\n    комфортную зону с библиотекой или игровую зону для детей и взрослых или дополнительную спальную зону. При этом по\n    затратам такая планировка более привлекательна, чем полноценный второй этаж. Исторически идея развивалась вместе\n    со стилем «лофт», при освоении нежилых помещений заброшенных фабрик и мастерских с высокими потолками.\n\n<p>\n    <span class="excl blue">Яркие дизайнерские решения</span>\n<p>\n    Конструкцию второго уровня для квартир с высотой стен менее 4 метров называют антресолью. Она состоит из опорной\n    конструкции, невысокого ограждения (балюстрады), лестницы и основания.\n<p>\n    Второй ярус в комнате станет островком для спокойного отдыха, чтения книг и творческой работы.\n    Это та личная зона, которой так не хватает подросткам в однокомнатной квартире.\n<p>\n    Наверх удобнее всего поднять спальное место. В таком случае высота яруса будет минимальной.\n    Фактически, двух ярусные детские <b>кровати с приставной лестницей</b> и являются таким вторым ярусом.\n    Для детей такое спальное место декорируется под корабль или машину или сказочный город. Здесь фантазия дизайнера\n    может разыграться в полной мере.\n<div class="frame row center">\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.2.png" alt="Двухъярусная кровать"></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.3.png" alt=""></div>\n    <div class="w-100"></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.4.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.5.png" alt=""></div>\n</div>\n\n<p>\n    Люди творческих профессий на втором ярусе обустраивают домашние мастерские или рабочие кабинеты.\n    Это позволяет отвлечься от расслабленной домашней обстановки и сосредоточится на работе.\n<div class="frame row center">\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.6.png" alt="Двухъярусная кровать"></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.7.png" alt=""></div>\n</div>\n\n<p></p>\n<p>\n    <img src="files/upload/images/for_2.8.png" alt="" class="float-left">\n    Еще один функциональный способ использования второго яруса — обустройство домашней библиотеки.\n    В частном доме она может быть солидной, с кожаными креслами в английском стиле.\n    Книжные шкафы сплошной стеной до потолка. Лестница в классическом стиле с резным первым столбом\n    и стеновыми панелями. Частный дом предоставляет больше возможностей для реализации смелых идей.\n    Ярусную планировку можно использовать вместо мансардной. Так неполноценный этаж на чердаке заменяют\n    открытой площадкой с комфортной высотой потолка.\n\n<p></p>\n<p>\n    <img src="files/upload/images/for_2.10.png" alt="" class="float-left smarg">\n    <img src="files/upload/images/for_2.9.png" alt="" class="float-right smarg">\n<p>\n    Второй ярус может занимать весь периметр комнаты или холла частного дома.\n    Так наверху будет место для нескольких функциональных зон.\n<p>\n</p>\n\n<div class="row frame center">\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.11.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.12.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.13.png" alt=""></div>\n    <div class="w-100"></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.14.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.15.png" alt=""></div>\n</div>\n\n<p>\n    Уникальный дизайн антресоли передают с помощью <b>балюстрады (ограждения балкона)</b> и лестницы.\n    Балюстраду изготавливают <b>из дерева, кованное, из нержавеющей стали,\n        стекла триплекс закаленного</b> или комбинированного материала.\n    Выбор материала зависит от стиля и обстановки в комнате. Сплошное стекло, например, облегчает всю конструкцию,\n    металл подчеркивает стиль Hi tech, дерево вписывается в классический стиль.\n<p>\n    Для экономия места часто используют <b>лестницы</b> с крутым подъемом, более 45 градусов.\n    Чтобы такая лестница была безопасной, ее делают с так называемым «<b>гусиным шагом</b>».\n<p>\n    Ступени такой лестницы имеют нестандартную форму – косые или овальные вырезы.\n    На них полноценно может уместиться лишь ступня одной ноги.\n    Подходит для установки в ограниченном пространстве.\n    Так же часто используют винтовые лестницы. Такая лестница, чем у нее больше радиус, тем комфортней подъем.\n<div class="row frame center">\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.16.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.17.png" alt=""></div>\n</div>\n\n<p></p>\n<img src="files/upload/images/for_2.18.png" class="float-left" alt="">\n<p>\n    Популярны функциональные перегородки в виде открытого стеллажа или книжной полки.\n    С одной стороны они закрывают уровень от посторонних глаз, а с другой — служат дополнительным местом хранения.\n<p>\n    <b>Лестница на второй ярус</b> должна быть полноценной с удобными ступенями и надежным креплением.\n    Чтобы лестница была функциональной, рекомендуем использовать под лестничное пространство.\n    Например, там можно расположить шкаф или выдвижные ящики.\n\n<p></p>\n<div class="row center frame">\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.19.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.20.png" alt=""></div>\n</div>\n<p>\n    Из нашего краткого обзора легко понять охват дизайнерских идей\n    в области обустройства дополнительного уровня в помещении.\n    Не составит труда разработать проект второго яруса и лестницы\n    под ваши предпочтения и с учетом технических характеристик комнаты.\n\n<p></p>\n<span class="excl blue">Нормы при строительстве второго уровня</span>\n<p>\n    Специалисты рекомендуют доверять изготовление и монтаж второго уровня только профессионалам,\n    которые гарантируют безопасность конструкции и сохранение комфортных условий.\n<p>\n    Следующий момент, который нельзя упускать из внимания — вентиляция воздуха наверху.\n    Горячий воздух легче холодного, поэтому у потолка всегда душно.\n    Решить эту проблему может дополнительный канал вентиляции или хороший потолочный вентилятор.\n    Если есть небольшое окно, то вопрос с проветриванием решается проще.\n<p>\n    Если высота потолка позволяет встать в полный рост, то <b>балюстрада</b> по высоте должна доходить до пояса,\n    т. е. Быть выше центра тяжести (где-то 1 метр в высоту). Такая норма обязательна, когда есть дети.\n<p>\n    На этапе планирования рассчитывают общую нагрузку на основание.\n    В зависимости от этого выбирают способ крепления и материалы.\n    Изготовление антресоли и <b>лестницы</b> к ней выполняется обычно <b>по индивидуальному проекту</b>,\n    который учитывает все Ваши пожелания.\n\n<p></p>\n<div class="row center frame">\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.21.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.22.png" alt=""></div>\n    <div class="frame-item col-md"><img src="files/upload/images/for_2.23.png" alt=""></div>\n</div>', 'ru', 'лестницы', 'Про лестницы', 1, 'Лестницы', '1', '0'),
(4, 3, 'ЛЕСТНИЦЫ', NULL, 'ru', NULL, NULL, 1, NULL, '', '0'),
(5, 3, 'МЕБЕЛЬ', NULL, 'ru', NULL, NULL, 2, NULL, '1', '0'),
(6, 3, 'ДИЗАЙН ПРОЕКТЫ', NULL, 'ru', NULL, NULL, 3, NULL, '1', '0'),
(3, 0, 'ОБРАЗЦЫ РАБОТ', NULL, 'ru', NULL, NULL, 2, NULL, '1', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `page`, `author`, `email`, `content`, `rating`, `visible`, `created`, `mods`) VALUES
(1, 3, 'Author 1', 'example@mail.ru', 'It&acute;s a good production', 8, '1', 10, '');
