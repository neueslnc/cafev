-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 15 2023 г., 19:17
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cafe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(5) NOT NULL,
  `ingname` varchar(350) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `qty` varchar(100) NOT NULL,
  `incomingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingname`, `qty`, `incomingdate`) VALUES
(1, 'Чай в пакетиках', '100', '2023-01-13'),
(5, 'Картошка', '100', '2023-01-14'),
(6, 'Сосика', '23', '2023-01-15'),
(7, 'Огурцы', '23', '2023-01-15'),
(8, 'Помидор', '23', '2023-01-15');

-- --------------------------------------------------------

--
-- Структура таблицы `productnames`
--

CREATE TABLE `productnames` (
  `id` int(5) NOT NULL,
  `productname` varchar(350) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `productnames`
--

INSERT INTO `productnames` (`id`, `productname`) VALUES
(1, 'Сомса'),
(2, 'Пицца'),
(3, 'Хот дог'),
(4, 'Хот дог2'),
(5, 'Сомса'),
(6, 'Хот дог'),
(7, 'sa');

-- --------------------------------------------------------

--
-- Структура таблицы `productsready`
--

CREATE TABLE `productsready` (
  `id` int(5) NOT NULL,
  `productname_id` varchar(100) NOT NULL,
  `productname` varchar(350) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ingname_id` varchar(15) NOT NULL,
  `ingname` varchar(350) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `productsready`
--

INSERT INTO `productsready` (`id`, `productname_id`, `productname`, `ingname_id`, `ingname`, `qty`) VALUES
(1, '2', 'Пицца', '5', 'Картошка', '233'),
(2, '3', 'Хот дог', '5', 'Картошка', '20'),
(3, '3', 'Хот дог', '1', 'Чай в пакетиках', '2'),
(4, '4', 'Хот дог2', '1', 'Чай в пакетиках', '1'),
(5, '4', 'Хот дог2', '5', 'Картошка', '100'),
(6, '5', 'Сомса', '1', 'Чай в пакетиках', '1'),
(7, '5', 'Сомса', '5', 'Картошка', '200'),
(8, '5', 'Сомса', 'Выбрать', '', ''),
(9, '6', 'Хот дог', '6', 'Сосика', '1'),
(10, '6', 'Хот дог', '7', 'Огурцы', '1'),
(11, '6', 'Хот дог', '8', 'Помидор', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `product`, `qty`, `date`) VALUES
(1, 6, 1, '2023-01-15'),
(2, 6, 50, '2023-01-15'),
(3, 6, 12, '2023-01-15'),
(4, 6, 1, '2023-01-15'),
(5, 1, 1, '2023-01-15'),
(6, 6, 12, '2023-01-15');

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `full_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `father_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `user_level` tinyint(4) NOT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT 1,
  `add_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usertbl`
--

INSERT INTO `usertbl` (`id`, `username`, `password`, `full_name`, `last_name`, `father_name`, `gender`, `user_level`, `activity`, `add_date`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Alisher', '', '', NULL, 1, 1, '2020-11-06 20:54:24');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `productnames`
--
ALTER TABLE `productnames`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `productsready`
--
ALTER TABLE `productsready`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `productnames`
--
ALTER TABLE `productnames`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `productsready`
--
ALTER TABLE `productsready`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
