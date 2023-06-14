-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 04 2022 г., 11:24
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_baby`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bezahlung`
--

CREATE TABLE `bezahlung` (
  `B_id` int(15) NOT NULL,
  `fk_prod` int(10) UNSIGNED DEFAULT NULL,
  `fk_cli` int(11) UNSIGNED DEFAULT NULL,
  `B_menge` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Дамп данных таблицы `bezahlung`
--

INSERT INTO `bezahlung` (`B_id`, `fk_prod`, `fk_cli`, `B_menge`) VALUES
(12, 4, NULL, 1),
(13, 2, NULL, 1),
(14, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `C_id` int(11) UNSIGNED NOT NULL,
  `C_name` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `C_vorname` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `c_adresse` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `c_zipcode` varchar(5) COLLATE latin1_german1_ci NOT NULL,
  `c_phone` varchar(11) COLLATE latin1_german1_ci NOT NULL,
  `c_act` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `produkt`
--

CREATE TABLE `produkt` (
  `P_id` int(15) UNSIGNED NOT NULL,
  `P_name` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `P_preis` float UNSIGNED NOT NULL,
  `P_img` varchar(255) COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Дамп данных таблицы `produkt`
--

INSERT INTO `produkt` (`P_id`, `P_name`, `P_preis`, `P_img`) VALUES
(1, 'Pueree \"FrutoNyanya\" aus Aepfeln, Kirschen, Himbeeren und roten Johannisbeeren \"Red Mix\" FrutoKids 90 g.', 0.5, 'images\\home_1.jpg'),
(2, 'Pueree \"FrutoNyanya\" aus Aepfeln, Bananen, Aprikosen, Mango und Maracuja \"gelber Mix\" FrutoKids 90 g', 0.5, 'images\\home_2.jpg'),
(3, 'Pueree \"FrutoNyanya\" aus Aepfeln, Birnen, Trauben und Kiwi \"Green Mix\" FrutoKids 90 g.', 0.5, 'images\\home_3.jpg'),
(4, 'Pueree \"Gerber\" Apfel-Banane, 90 g', 0.7, 'images\\product_1.jpg'),
(5, 'Pueree \"FrutoNyanya\" Birne, 90 g', 0.6, 'images\\product_2.jpg'),
(6, 'Pueree \"Wenn ich gross werde\" APFEL-BIRNE-MELON, 90 g', 0.55, 'images\\product_3.jpg'),
(7, 'Pueree \"Gerber\" Birne, 80 g', 0.66, 'images\\product_4.jpg'),
(8, 'Mischen Sie \"Nestogen\" 1, 300 g', 2.5, 'images\\product_5.jpg'),
(9, 'Angepasste Trockenmilchnahrung Nutrilak \"Nutrilak\" Premium 1, 300 g', 2.2, 'images\\product_6.jpg'),
(10, 'Kindertee \"Wenn ich groß bin\" Vitaminschutz, 85 g', 3.2, 'images\\product_7.jpg'),
(11, 'Saft \"Gerber\" Apfel-Karotte mit Fruchtfleisch, 175 ml', 2.55, 'images\\product_8.jpg'),
(12, 'Saft \"FrutoNyanya\" Birne geklaert, 200 ml', 2.7, 'images\\product_9.jpg'),
(13, 'Nutrien Standard sterilisiert, 1 l', 5, 'images\\product_image_1.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bezahlung`
--
ALTER TABLE `bezahlung`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `fk_prod` (`fk_prod`,`fk_cli`),
  ADD KEY `fk_cli` (`fk_cli`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`C_id`);

--
-- Индексы таблицы `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`P_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bezahlung`
--
ALTER TABLE `bezahlung`
  MODIFY `B_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `C_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bezahlung`
--
ALTER TABLE `bezahlung`
  ADD CONSTRAINT `bez_prod` FOREIGN KEY (`fk_prod`) REFERENCES `produkt` (`P_id`),
  ADD CONSTRAINT `bezahlung_ibfk_1` FOREIGN KEY (`fk_cli`) REFERENCES `client` (`C_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
