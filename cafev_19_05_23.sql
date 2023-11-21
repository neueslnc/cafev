-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2023 г., 05:54
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

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
  `id` int NOT NULL,
  `ingname` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `qty` varchar(100) NOT NULL,
  `incomingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `productname` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `location` varchar(355) NOT NULL,
  `sell_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `productnames`
--

INSERT INTO `productnames` (`id`, `productname`, `location`, `sell_price`) VALUES
(1, 'Сомса', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 5000),
(2, 'Пицца', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 300),
(3, 'Хот дог', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 8000),
(4, 'Хот дог2', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 12000),
(5, 'Сомса', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 15000),
(6, 'Хот дог', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 20000),
(7, 'sa', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 8500),
(8, 'Блины', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 9000),
(9, 'Блины', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 9500),
(10, 'Хлеб', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 5000),
(11, 'тест', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 8000),
(12, 'Кабоб', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 10000),
(13, 'Ош', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 12000),
(14, 'Кола', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 13000),
(15, 'Оши софи', 'userphotos/a8baa15206b7f3020b494176bd656775photo_2022-09-23_22-44-03.jpg', 15500);

-- --------------------------------------------------------

--
-- Структура таблицы `productsready`
--

CREATE TABLE `productsready` (
  `id` int NOT NULL,
  `productname_id` varchar(100) NOT NULL,
  `productname` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ingname_id` varchar(15) NOT NULL,
  `ingname` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `id_check` int NOT NULL,
  `payment` int NOT NULL,
  `point` int NOT NULL,
  `smena` int NOT NULL,
  `procent` int NOT NULL,
  `sum` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `id_check`, `payment`, `point`, `smena`, `procent`, `sum`, `date`) VALUES
(25, 1684382903, 0, 1, 1, 10, 281500, '2023-05-18'),
(26, 1684384144, 0, 1, 2, 10, 72000, '2023-05-17'),
(27, 1684384211, 0, 1, 1, 10, 124000, '2023-05-18'),
(28, 1684384219, 0, 1, 3, 10, 119500, '2023-05-15'),
(29, 1684384736, 0, 1, 3, 10, 32000, '2023-05-18'),
(30, 1684386088, 0, 2, 3, 50, 368000, '2023-05-18');

-- --------------------------------------------------------

--
-- Структура таблицы `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int NOT NULL,
  `id_check` int NOT NULL,
  `id_product` int NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `sales_products`
--

INSERT INTO `sales_products` (`id`, `id_check`, `id_product`, `qty`, `price`) VALUES
(4, 1684382903, 3, 1, 8000),
(5, 1684382903, 6, 4, 20000),
(6, 1684382903, 10, 5, 5000),
(7, 1684382903, 7, 5, 8500),
(8, 1684382903, 11, 3, 8000),
(9, 1684382903, 12, 4, 10000),
(10, 1684382903, 15, 4, 15500),
(11, 1684384144, 4, 3, 12000),
(12, 1684384144, 8, 4, 9000),
(13, 1684384211, 4, 5, 12000),
(14, 1684384211, 8, 2, 9000),
(15, 1684384211, 12, 3, 10000),
(16, 1684384211, 11, 2, 8000),
(17, 1684384219, 7, 3, 8500),
(18, 1684384219, 6, 3, 20000),
(19, 1684384219, 10, 3, 5000),
(20, 1684384219, 9, 2, 9500),
(21, 1684384736, 3, 4, 8000),
(22, 1684386088, 1, 5, 5000),
(23, 1684386088, 5, 4, 15000),
(24, 1684386088, 6, 5, 20000),
(25, 1684386088, 10, 4, 5000),
(26, 1684386088, 14, 5, 13000),
(27, 1684386088, 15, 4, 15500),
(28, 1684386088, 11, 2, 8000),
(29, 1684386088, 12, 2, 10000);

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `full_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `father_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `user_level` tinyint NOT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
-- Индексы таблицы `sales_products`
--
ALTER TABLE `sales_products`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `productnames`
--
ALTER TABLE `productnames`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `productsready`
--
ALTER TABLE `productsready`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
