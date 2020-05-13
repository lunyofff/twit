use twitter;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `description`, `email`, `pass`) VALUES
(1, 'Иван', 'Иванов', 'Студент ркси', 'mads@mads.ru', 'drum322'),
(2, 'Саша', 'Смирнов', 'Студент ринх', 'space@space.ru', 'reg123');

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`sender_id`, `receiver_id`) VALUES
(1, 2);

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `text`, `is_visible`, `user_id`) VALUES
(1, 'Твитнул', 1, 1),
(2, 'Еще раз твитнул', 1, 1),
(3, 'Тоже твитнул', 1, 2);
