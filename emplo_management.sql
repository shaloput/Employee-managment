-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 28 2015 г., 20:44
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `emplo_management`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `fio_rus` varchar(255) NOT NULL,
  `fio_eng` varchar(255) NOT NULL,
  `is_contract` tinyint(1) NOT NULL,
  `hours` int(11) DEFAULT NULL,
  `hour_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `fio_rus`, `fio_eng`, `is_contract`, `hours`, `hour_rate`) VALUES
(2, 'Иван Иванский Иванченко', 'Ivan Ivan', 0, 150, 50),
(3, 'Вася Васяня Василек', 'Vasily Vaska', 1, 160, 25),
(4, 'Ангелина Поджарая', 'Angelica Slender', 1, 150, 23),
(5, 'Петр Сергеевич', 'Peter Sergies', 0, 150, 43),
(6, 'Сифон', 'Siphon', 1, 150, 98),
(7, 'Борода', 'Boroda', 1, 160, 78),
(8, 'Александр Бородач', 'Alexand Beardman', 0, 170, 44),
(9, 'Киса Воробьянинов', 'Keesza Sparrow', 0, 44, 12),
(10, 'Остап Бендер', 'Ostap Bender', 1, 152, 24),
(11, 'Бармалей', 'Barmaley', 0, NULL, NULL),
(12, 'Мубарак Обама', 'Mubarak Obama', 0, NULL, NULL),
(13, 'Опра Хьюстон', 'Oprah Houston', 1, NULL, NULL),
(14, 'Риана Сергевна', 'Rihanna van Sergo', 0, NULL, NULL),
(15, 'Джей Зи', 'Jay-Z', 1, NULL, NULL),
(16, 'Еминем', 'Eminem', 1, NULL, NULL),
(17, 'Баста Раймс', 'Busta Rhymes', 1, NULL, NULL),
(18, 'Сергей Рахманинов', 'Sergey Rakhmaninov', 0, NULL, NULL),
(19, 'Чак Паланик', 'Chak Palanik', 1, NULL, NULL),
(20, 'Мария Кюри', 'Marie Cueri', 0, NULL, NULL),
(21, 'Тайлер Дерден', 'Tailer Derden', 0, NULL, NULL),
(22, 'Кот-Бегемот', 'The Behemoth-Cat', 0, NULL, NULL),
(23, 'Понтий Пилат', 'Pontiy Pilat', 0, NULL, NULL),
(24, 'Гаргантьюа', 'Gargantya', 0, NULL, NULL),
(25, 'Пантагрюэль', 'Pantagruel', 0, NULL, NULL),
(26, 'Валентина Микоян', 'Valentina Mikoyan', 0, NULL, NULL),
(27, 'Аристарх Бедросов', 'Aristarx Bedrosov', 1, NULL, NULL),
(28, 'Плутарх', 'Plutarh', 0, NULL, NULL),
(29, 'Кант', 'Kant', 0, NULL, NULL),
(30, 'Александр Грэхэм Бэлл', 'Alexander Graham Bell', 0, NULL, NULL),
(31, 'Воланд Де Морт', 'Volan de Mort', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
