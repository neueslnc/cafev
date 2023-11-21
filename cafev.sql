-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2023 г., 04:48
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cafev`
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
(5, 'Картошка', '80', '2023-01-14'),
(6, 'Сосика', '200', '2023-01-15'),
(7, 'Огурцы', '23', '2023-01-15'),
(8, 'Помидор', '20', '2023-01-15'),
(9, 'Масло', '17', '2023-01-15'),
(10, 'ИНгредиент', '0', '2023-02-02'),
(11, 'ыва', '1901', '2023-01-28'),
(12, 'Маслоw', '994', '2023-01-01'),
(13, 'Майонез', '300', '2023-01-17'),
(14, 'Кола', '400', '2202-02-02'),
(15, 'Рис', '400', '2023-01-16'),
(16, 'МОрковь', '1700', '2023-01-26');

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
(7, 'sa'),
(8, 'Блины'),
(9, 'Блины'),
(10, 'Хлеб'),
(11, 'тест'),
(12, 'Кабоб'),
(13, 'Ош'),
(14, 'Кола'),
(15, 'Оши софи');

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
(11, '6', 'Хот дог', '8', 'Помидор', '1'),
(12, '8', 'Блины', '1', 'Чай в пакетиках', '1'),
(13, '8', 'Блины', '5', 'Картошка', '2'),
(14, '8', 'Блины', 'Выбрать', '', ''),
(15, '9', 'Блины', '5', 'Картошка', '1'),
(16, '9', 'Блины', '6', 'Сосика', '2'),
(17, '10', 'Хлеб', '1', 'Чай в пакетиках', '1'),
(18, '10', 'Хлеб', '5', 'Картошка', '3'),
(19, '11', 'тест', '10', 'ИНгредиент', '20'),
(20, '11', 'тест', '11', 'ыва', '99'),
(21, '12', 'Кабоб', '8', 'Помидор', '1'),
(22, '12', 'Кабоб', '9', 'Масло', '2'),
(23, '12', 'Кабоб', '12', 'Маслоw', '2'),
(24, '13', 'Ош', '6', 'Сосика', '30'),
(25, '13', 'Ош', '9', 'Масло', '100'),
(26, '14', 'Кола', '14', 'Кола', '100'),
(27, '15', 'Оши софи', '15', 'Рис', '300'),
(28, '15', 'Оши софи', '16', 'МОрковь', '150');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL
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
(6, 6, 12, '2023-01-15'),
(7, 11, 1, '2023-01-15'),
(8, 3, 1, '2023-01-15'),
(9, 1, 1, '2023-01-15'),
(10, 7, 1, '2023-01-16'),
(11, 12, 2, '2023-01-16'),
(12, 1, 1, '2023-01-16'),
(13, 13, 1, '2023-01-16'),
(14, 12, 1, '2023-01-16'),
(15, 15, 2, '2023-01-16'),
(16, 14, 1, '2023-01-16');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `productnames`
--
ALTER TABLE `productnames`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `productsready`
--
ALTER TABLE `productsready`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
