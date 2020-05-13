DROP DATABASE IF EXISTS twitter;

CREATE DATABASE twitter;

USE twitter;

--
-- База данных: `twitter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `status` enum('0','1','2') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `text` varchar(128) NOT NULL,
  `is_visible` int NOT NULL DEFAULT '1',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`sender_id`,`receiver_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_fk0` (`user_id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);