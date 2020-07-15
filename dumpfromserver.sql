-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Хост: mysql011.infobox.ru
-- Время создания: Июн 10 2020 г., 11:23
-- Версия сервера: 5.6.30-log
-- Версия PHP: 5.6.30-0+deb8u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+03:00";

--
-- База данных: `z159472_pn11`
--
CREATE DATABASE IF NOT EXISTS `z159472_pn11` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `z159472_pn11`;

-- --------------------------------------------------------

--
-- Структура таблицы `constants`
--

CREATE TABLE IF NOT EXISTS `constants` (
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

CREATE TABLE IF NOT EXISTS  `pages` (
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

INSERT INTO `pages` (`id`, `parent`, `name`, `content`, `language`, `keywords`, `description`, `position`, `title`, `is_in_top`, `is_link`) VALUES
(1, 0, 'дизайнерские решения', '<img class="float-left" alt="Лестница" src="files/upload/images/for_2.1.png">\r\n\r\n<p>\r\n    <span class="excl blue">\r\n        Второй ярус. Для чего нужен и как его оформить\r\n    </span>\r\n<p>\r\n    Разбивка помещения на 2 уровня визуально увеличивает пространство и повышает функциональность небольшой по площади\r\n    комнаты с высокими потолками. Высота потолков определяет возможность использования такого способа зонирования.\r\n    Полноценный второй уровень получится с высотой в 4 метра и более. Если расстояние до потолка 3-3,5 метра,\r\n    то второй уровень делают высотой не менее 1 метра, например для спального места, а внизу располагают гардеробную,\r\n    книжный шкаф, или компьютерный стол.\r\n<p>\r\n    В загородных домах второй уровень можно запланировать еще на этапе проектирования. Таким способом можно увеличить\r\n    гостиную, когда первый ярус плавно по лестнице перетекает на второй. На дополнительном ярусе можно обустроить\r\n    комфортную зону с библиотекой или игровую зону для детей и взрослых или дополнительную спальную зону. При этом по\r\n    затратам такая планировка более привлекательна, чем полноценный второй этаж. Исторически идея развивалась вместе\r\n    со стилем «лофт», при освоении нежилых помещений заброшенных фабрик и мастерских с высокими потолками.\r\n\r\n<p>\r\n    <span class="excl blue">Яркие дизайнерские решения</span>\r\n<p>\r\n    Конструкцию второго уровня для квартир с высотой стен менее 4 метров называют антресолью. Она состоит из опорной\r\n    конструкции, невысокого ограждения (балюстрады), лестницы и основания.\r\n<p>\r\n    Второй ярус в комнате станет островком для спокойного отдыха, чтения книг и творческой работы.\r\n    Это та личная зона, которой так не хватает подросткам в однокомнатной квартире.\r\n<p>\r\n    Наверх удобнее всего поднять спальное место. В таком случае высота яруса будет минимальной.\r\n    Фактически, двух ярусные детские <b>кровати с приставной лестницей</b> и являются таким вторым ярусом.\r\n    Для детей такое спальное место декорируется под корабль или машину или сказочный город. Здесь фантазия дизайнера\r\n    может разыграться в полной мере.\r\n[frame class="row center"]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.2.png" alt="Двухъярусная кровать">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.3.png" alt="">[/frame-item]\r\n    <div class="w-100"></div>\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.4.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.5.png" alt="">[/frame-item]\r\n[/frame]\r\n\r\n<p>\r\n    Люди творческих профессий на втором ярусе обустраивают домашние мастерские или рабочие кабинеты.\r\n    Это позволяет отвлечься от расслабленной домашней обстановки и сосредоточится на работе.\r\n[frame class="row center"]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.6.png" alt="Двухъярусная кровать">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.7.png" alt="">[/frame-item]\r\n[/frame]\r\n\r\n<p></p>\r\n<p>\r\n    <img src="files/upload/images/for_2.8.png" alt="" class="float-left">\r\n    Еще один функциональный способ использования второго яруса — обустройство домашней библиотеки.\r\n    В частном доме она может быть солидной, с кожаными креслами в английском стиле.\r\n    Книжные шкафы сплошной стеной до потолка. Лестница в классическом стиле с резным первым столбом\r\n    и стеновыми панелями. Частный дом предоставляет больше возможностей для реализации смелых идей.\r\n    Ярусную планировку можно использовать вместо мансардной. Так неполноценный этаж на чердаке заменяют\r\n    открытой площадкой с комфортной высотой потолка.\r\n\r\n<p></p>\r\n<p>\r\n    <img src="files/upload/images/for_2.10.png" alt="" class="float-left smarg">\r\n    <img src="files/upload/images/for_2.9.png" alt="" class="float-right smarg">\r\n    Второй ярус может занимать весь периметр комнаты или холла частного дома.\r\n    Так наверху будет место для нескольких функциональных зон.\r\n<p style="height: 100px">\r\n</p>\r\n[frame class="row center"]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.11.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.12.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.13.png" alt="">[/frame-item]\r\n    <div class="w-100"></div>\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.14.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.15.png" alt="">[/frame-item]\r\n[/frame]\r\n\r\n<p>\r\n    Уникальный дизайн антресоли передают с помощью <b>балюстрады (ограждения балкона)</b> и лестницы.\r\n    Балюстраду изготавливают <b>из дерева, кованное, из нержавеющей стали,\r\n        стекла триплекс закаленного</b> или комбинированного материала.\r\n    Выбор материала зависит от стиля и обстановки в комнате. Сплошное стекло, например, облегчает всю конструкцию,\r\n    металл подчеркивает стиль Hi tech, дерево вписывается в классический стиль.\r\n<p>\r\n    Для экономия места часто используют <b>лестницы</b> с крутым подъемом, более 45 градусов.\r\n    Чтобы такая лестница была безопасной, ее делают с так называемым «<b>гусиным шагом</b>».\r\n<p>\r\n    Ступени такой лестницы имеют нестандартную форму – косые или овальные вырезы.\r\n    На них полноценно может уместиться лишь ступня одной ноги.\r\n    Подходит для установки в ограниченном пространстве.\r\n    Так же часто используют винтовые лестницы. Такая лестница, чем у нее больше радиус, тем комфортней подъем.\r\n[frame class="row center"]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.16.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.17.png" alt="">[/frame-item]\r\n[/frame]\r\n\r\n<p></p>\r\n<img src="files/upload/images/for_2.18.png" class="float-left" alt="">\r\n<p>\r\n    Популярны функциональные перегородки в виде открытого стеллажа или книжной полки.\r\n    С одной стороны они закрывают уровень от посторонних глаз, а с другой — служат дополнительным местом хранения.\r\n<p>\r\n    <b>Лестница на второй ярус</b> должна быть полноценной с удобными ступенями и надежным креплением.\r\n    Чтобы лестница была функциональной, рекомендуем использовать под лестничное пространство.\r\n    Например, там можно расположить шкаф или выдвижные ящики.\r\n\r\n<p></p>\r\n[frame class="row center"]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.19.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.20.png" alt="">[/frame-item]\r\n[/frame]\r\n<p>\r\n    Из нашего краткого обзора легко понять охват дизайнерских идей\r\n    в области обустройства дополнительного уровня в помещении.\r\n    Не составит труда разработать проект второго яруса и лестницы\r\n    под ваши предпочтения и с учетом технических характеристик комнаты.\r\n\r\n<p></p>\r\n<span class="excl blue">Нормы при строительстве второго уровня</span>\r\n<p>\r\n    Специалисты рекомендуют доверять изготовление и монтаж второго уровня только профессионалам,\r\n    которые гарантируют безопасность конструкции и сохранение комфортных условий.\r\n<p>\r\n    Следующий момент, который нельзя упускать из внимания — вентиляция воздуха наверху.\r\n    Горячий воздух легче холодного, поэтому у потолка всегда душно.\r\n    Решить эту проблему может дополнительный канал вентиляции или хороший потолочный вентилятор.\r\n    Если есть небольшое окно, то вопрос с проветриванием решается проще.\r\n<p>\r\n    Если высота потолка позволяет встать в полный рост, то <b>балюстрада</b> по высоте должна доходить до пояса,\r\n    т. е. Быть выше центра тяжести (где-то 1 метр в высоту). Такая норма обязательна, когда есть дети.\r\n<p>\r\n    На этапе планирования рассчитывают общую нагрузку на основание.\r\n    В зависимости от этого выбирают способ крепления и материалы.\r\n    Изготовление антресоли и <b>лестницы</b> к ней выполняется обычно <b>по индивидуальному проекту</b>,\r\n    который учитывает все Ваши пожелания.\r\n\r\n<p></p>\r\n[frame class="row center"]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.21.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.22.png" alt="">[/frame-item]\r\n    [frame-item class="col-md"]<img src="files/upload/images/for_2.23.png" alt="">[/frame-item]\r\n[/frame]', 'ru', 'лестницы, panoff design, дизайнерские решения, помощь, дизайн, интерьер', 'Дизайнерские решения. Описание необычных дизайнерских решений, фотографии и чертежи', 1, 'Дизайнерские решения| Panoff-Design', '1', '0'),
(4, 3, 'ЛЕСТНИЦЫ', '<h3>Образцы лестниц</h3>\r\n<div class="alert alert-info alert-dismissible fade show" role="alert">\r\n    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\r\n        <span aria-hidden="true">&times;</span>\r\n    </button>\r\n    \r\n    <strong>Подсказка:</strong> кликните по картинке, чтобы просмотреть картинки, связанные с ней\r\n</div>\r\n\r\n[frame class=''row''][frame-item class=''col-md-9'']\r\n[slider img=''files/upload/images/carousel/2'' quant=''5'']\r\n[/frame-item]\r\n[frame-item class=''col-md-3 vertical-center-extreme'']\r\n[slider img=''files/upload/images/carousel/4'' quant=''7'']\r\n[/frame-item]\r\n[frame-item class=''col-md-3'']\r\n[slider img=''files/upload/images/carousel/5'' quant=''5'']\r\n[/frame-item]\r\n[frame-item class=''col-md-3'']\r\n[slider img=''files/upload/images/carousel/8'' quant=''4'']\r\n[/frame-item]\r\n[frame-item class=''col-md-3'']\r\n[slider img=''files/upload/images/carousel/9'' quant=''5'']\r\n[/frame-item]\r\n[frame-item class=''col-md-3'']\r\n[slider img=''files/upload/images/carousel/10'' quant=''5'']\r\n[/frame-item]\r\n[/frame]\r\n', 'ru', 'лестницы, интерьер, panoff, panoff design', 'Образцы лестниц, сделанных нами на заказ', 1, 'Лестницы | Panoff-Design', '1', '0'),
(5, 3, 'МЕБЕЛЬ', '<h3>Образцы мебели</h3>\r\n<div class="alert alert-info alert-dismissible fade show" role="alert">\r\n    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\r\n        <span aria-hidden="true">&times;</span>\r\n    </button>\r\n    \r\n    <strong>Подсказка:</strong> кликните по картинке, чтобы просмотреть картинки, связанные с ней\r\n</div>\r\n\r\n[frame class=''row'']\r\n[frame-item class=''col-md-4'']\r\n<img src="files/upload/images/carousel/1.jpg" alt="">\r\n[/frame-item]\r\n[frame-item class=''col-md-8 vertical-center-extreme'']\r\n[slider img=''files/upload/images/carousel/3'' quant=''4'']\r\n[/frame-item]\r\n[frame-item class=''col-md-8 vertical-center-extreme'']\r\n<img src="files/upload/images/carousel/7.jpg" alt="">\r\n[/frame-item]\r\n[frame-item class=''col-md-4'']\r\n<img src="files/upload/images/carousel/11.jpg" alt="">\r\n[/frame-item]\r\n[/frame]', 'ru', 'лестницы, мебель, интерьер, panoff, panoff design', 'Образцы мебели, заказанной у нас', 2, 'Мебель | Panoff-Design', '1', '0'),
(3, 0, 'ОБРАЗЦЫ РАБОТ', NULL, 'ru', NULL, NULL, 2, NULL, '1', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS  `reviews` (
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
