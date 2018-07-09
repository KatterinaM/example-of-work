-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 18 2018 г., 21:33
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_new` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `dt_public` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_new`, `title`, `content`, `dt_public`) VALUES
(31, '1234', '<br />\r\n<b>Notice</b>:  Undefined variable: content in <b>C:\\xampp\\htdocs\\mysite\\Обучение PHP\\ДЗ№7\\1\\v\\v_edit.php</b> on line <b>9</b><br />', '2018-01-31 18:44:03'),
(33, 'Работает!!!', 'итттъ', '2018-02-06 12:08:21'),
(37, 'вапролдждлор', 'ждлорпам тиь', '2018-02-06 13:58:46'),
(39, 'кнвовтыты ч', 'вылылялля', '2018-02-13 17:04:27'),
(40, 'ывапрол', '75325789', '2018-02-14 10:43:58'),
(41, 'padam', 'xbshhs', '2018-02-14 10:51:27'),
(43, 'что-то там что-то там что-то', 'fghjkl', '2018-02-16 09:10:16'),
(46, 'что-то там что-то там что-то', 'drtyuik', '2018-02-16 10:10:09'),
(47, 'Я сделаль!', 'sdfghjkl;', '2018-02-18 20:32:18');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id_session` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `dt_open` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id_session`, `id_user`, `token`, `dt_open`, `status`) VALUES
(1, 1, 'a4cc0a643d00544104b9276ec93f0bce9fc3d7f76f639e82942512589625c340', '2018-02-18 20:01:48', '0'),
(2, 1, '5cb3f7a25335997b23007564547de72de334afb285937936fcfe1fa641c38dd4', '2018-02-18 20:04:52', '0'),
(3, 1, '03ae5f6e0c0f1063a907f8c367b6a964f05a46dd3d2575916b3d3b6107cd1a3a', '2018-02-18 20:24:29', '0'),
(4, 2, '7a9c2697d215f84fd754e7656707d9252576c26b45475b6be89dc8452cd1582e', '2018-02-18 20:26:56', '0'),
(5, 1, '586823c0c613a603d697bd41f5e8fcd207729fca517f4c045e7edeb22ec1ad0a', '2018-02-18 20:31:37', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `dt_registr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `status`, `dt_registr`) VALUES
(1, 'admin', '47072593625598aca249e473f946576c9b714757a9924428117043505820a19a', '0', '2018-02-18 16:12:07'),
(2, 'meneger', '47072593625598aca249e473f946576c9b714757a9924428117043505820a19a', '0', '2018-02-18 16:29:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_session`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
