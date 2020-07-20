-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 18 2020 г., 13:51
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `business`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Еда и рестораны'),
(2, 'Развлечения'),
(3, 'Красота и SPA'),
(4, 'Спорт и фитнес'),
(5, 'Обучение'),
(6, 'Текстиль'),
(7, 'Другое');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon` varchar(50) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon`, `data`, `email`, `product_id`) VALUES
(17, 18, 'g1rpX1EmPm9R3bT', '2020-07-17 13:52:59', 'user@gmail.com', 2),
(19, 18, 'niamDUo58mfUGb0', '2020-07-17 13:54:54', 'user@gmail.com', 1),
(20, 19, 'e6cAhrnXmuABwiw', '2020-07-17 14:15:30', 'andrey@gmail.com', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_maps`
--

CREATE TABLE `orders_maps` (
  `id` int(11) NOT NULL,
  `user_b_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `data_start` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Новый',
  `data_stop` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `cost`, `description`, `content`, `image`, `category_id`) VALUES
(1, 'Кафе Мороженное', 500, '15% скидки на все товары', 'Очень вкусное и полезное мороженное, так же присутствует много других вкусняшек. Приходи и приобретай с продукцией отличное настроение.', '', 1),
(2, 'Тибетский массаж', 600, '40% скидки на 10 посещений', 'Лучший тибетский массаж в городе', '', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products_maps`
--

CREATE TABLE `products_maps` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products_maps`
--

INSERT INTO `products_maps` (`id`, `title`, `cost`, `content`, `image`) VALUES
(1, '1 месяц', 300, 'один месяц ваш офис будет виден всем пользователям на картах', ''),
(2, '3 месяца', 700, '3 месяца ваш офис будет виден всем пользователям на картах', '');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `modificator` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `reviewText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `modificator`, `unit_id`, `user_id`, `date_time`, `reviewText`) VALUES
(7, 1, 3, 3, '2020-07-17 19:19:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(8, 1, 3, 4, '2020-07-17 19:21:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(9, 1, 3, 3, '2020-07-17 19:52:20', 'Все отлично, молодцы'),
(10, 1, 3, 3, '2020-07-17 19:53:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(11, 1, 3, 4, '2020-07-17 19:54:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(12, 1, 3, 3, '2020-07-17 19:55:20', 'Оперативно, четко, рекомендую'),
(13, 1, 3, 4, '2020-07-17 23:13:32', 'Так быстро все погрузили и увезли.\r\nМы не ожидали! Здорово!\r\nРекомендую!!!');

-- --------------------------------------------------------

--
-- Структура таблицы `serv_category`
--

CREATE TABLE `serv_category` (
  `serv_cat_id` int(11) NOT NULL,
  `serv_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `serv_category`
--

INSERT INTO `serv_category` (`serv_cat_id`, `serv_cat_name`) VALUES
(1, 'Работы на дому'),
(2, 'Грузоперевозки'),
(3, 'Обучение'),
(4, 'Консультация'),
(5, 'Сдать - арендовать');

-- --------------------------------------------------------

--
-- Структура таблицы `serv_orders`
--

CREATE TABLE `serv_orders` (
  `id` int(11) NOT NULL,
  `user_b_id` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `data` varchar(50) NOT NULL,
  `data_start` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addr_town` varchar(255) NOT NULL,
  `addr_street` varchar(255) NOT NULL,
  `addr_house` varchar(255) NOT NULL,
  `addr_flat` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `data_stop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `serv_orders`
--

INSERT INTO `serv_orders` (`id`, `user_b_id`, `cat_id`, `title`, `description`, `content`, `data`, `data_start`, `phone`, `addr_town`, `addr_street`, `addr_house`, `addr_flat`, `status`, `image`, `data_stop`) VALUES
(3, '1', '1', 'Все виды сантехнических работ', 'Осуществляем ремонт бытовой сантехники. Принимаем частные заказы.', 'Требуется выполнить ремонт сантехники, установить бойлер, заменить кран, прочистить канализацию, заменить стояк канализации и водопровода, отремонтировать унитаз, обслужить питьевой фильтр на кухне, установить умывальник, провести сантехнические работы под ключ в квартире и доме. Мы именно те, кто занимается предоставлением качественных сантехнических услуг, в городе Киев и в пригороде.', '', '', '0631231255', 'Киев', 'Бажова', '1', '19', '', '311235_preview.jpg', ''),
(4, '2', '2', 'Доставка грузов', 'Доставка грузов средней габаритности. Доставляем по всей Украине', ' срочно доставляет грузы от 5 грамм до 5 тонн с выездом к отправителю и доставкой до двери получателя более чем в 250 населённых пунктов Украины. Сеть подразделений в 36 городах и ежедневные рейсы позволяют доставлять Ваши товары получателям за 24-48 часов. Стоимость доставки от 25грн.', '', '', '0671593563', '', '', '', '', '', '311247.jpg', ''),
(5, '', '5', 'Аренда складского помещения', 'Предоставляем складское помещение 500 кв. м. Оборудовано под современный склад, сухое, охрана территории, сигнализация', 'Особенностью этого объекта является эффективная концентрация различных коммерческих площадей в одном комплексе. Важным преимуществом объекта является наличие в структуре комплекса офисных помещений высокого класса и максимально выгодное месторасположение, характеризующееся близостью к транспортным развязкам. Перечисленные факторы заинтересуют как арендаторов, которые ищут офисы, так и тех, кто подбирает оптимальные складские решения.', '', '', '0931172513', '', '', '', '', '', '311239_preview.jpg', ''),
(6, '1', '1', 'Все виды сантехнических работ', 'Осуществляем ремонт бытовой сантехники. Принимаем частные заказы.', 'Требуется выполнить ремонт сантехники, установить бойлер, заменить кран, прочистить канализацию, заменить стояк канализации и водопровода, отремонтировать унитаз, обслужить питьевой фильтр на кухне, установить умывальник, провести сантехнические работы под ключ в квартире и доме. Мы именно те, кто занимается предоставлением качественных сантехнических услуг, в городе Киев и в пригороде.', '', '', '0631231255', 'Киев', 'Бажова', '1', '19', '', '311235_preview.jpg', ''),
(7, '2', '2', 'Доставка грузов', 'Доставка грузов средней габаритности. Доставляем по всей Украине', ' срочно доставляет грузы от 5 грамм до 5 тонн с выездом к отправителю и доставкой до двери получателя более чем в 250 населённых пунктов Украины. Сеть подразделений в 36 городах и ежедневные рейсы позволяют доставлять Ваши товары получателям за 24-48 часов. Стоимость доставки от 25грн.', '', '', '0671593563', '', '', '', '', '', '311247.jpg', ''),
(8, '', '5', 'Аренда складского помещения', 'Предоставляем складское помещение 500 кв. м. Оборудовано под современный склад, сухое, охрана территории, сигнализация', 'Особенностью этого объекта является эффективная концентрация различных коммерческих площадей в одном комплексе. Важным преимуществом объекта является наличие в структуре комплекса офисных помещений высокого класса и максимально выгодное месторасположение, характеризующееся близостью к транспортным развязкам. Перечисленные факторы заинтересуют как арендаторов, которые ищут офисы, так и тех, кто подбирает оптимальные складские решения.', '', '', '0931172513', '', '', '', '', '', '311239_preview.jpg', ''),
(9, '', '1', 'Ремонт на дому Компьютеров Ноутбуков', 'Ремонт вашего ПК на дому в городе Вишневое!\r\nПриеду быстро ! Диагностика и выезд специалиста бесплатно !', 'Мы готовы предложить: ремонт компьютеров, ремонт ноутбуков, установку Windows, чистку ноутбуков от пыли, установку программ, настройку интернет, настройку роутеров, чистку вирусов и т.д. На сегодняшний день рынок услуг заполненный компьютерными специалистами и имеет большую конкуренцию. В свою очередь очень сложно найти настоящее качество, которое соответствует заявленным ценам.', '', '', '044-555-13-27', 'Киев', 'Жилянская', '68', '55', '', '311220_preview.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0,
  `favorites` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `phone`, `confirm_mail`, `verifided`, `favorites`) VALUES
(18, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'User User', '0965202578', 'qNJXATpf7C0w8uuoIiYK', 1, '{\"favorites\":[{\"product_id\":\"1\"},{\"product_id\":\"2\"}]}'),
(19, 'andrey', 'baf22ddb7b1a317d860f48638254e2e9', 'andrey@gmail.com', 'Andrey', '0965202578', 'KvkS5QbVYu3BvSzA87xY', 1, '{\"favorites\":[{\"product_id\":\"1\"}]}');

-- --------------------------------------------------------

--
-- Структура таблицы `users_b`
--

CREATE TABLE `users_b` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users_b`
--

INSERT INTO `users_b` (`id`, `login`, `password`, `email`, `name`, `phone`, `confirm_mail`, `verifided`, `info`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'User User', '0965796933', 'vE4Q0AkV8jK8Xvsr2ZZA', 1, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_maps`
--
ALTER TABLE `orders_maps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_maps`
--
ALTER TABLE `products_maps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_b`
--
ALTER TABLE `users_b`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `orders_maps`
--
ALTER TABLE `orders_maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products_maps`
--
ALTER TABLE `products_maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users_b`
--
ALTER TABLE `users_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
