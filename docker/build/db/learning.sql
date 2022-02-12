-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Час створення: Лют 12 2022 р., 11:40
-- Версія сервера: 8.0.28
-- Версія PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `learning`
--

-- --------------------------------------------------------

--
-- Структура таблиці `car`
--

CREATE TABLE `car` (
  `id` int NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `car`
--

INSERT INTO `car` (`id`, `brand`, `model`, `reg_number`, `created_at`) VALUES
(1, 'Nissan', 'Rogue Sport', 'AA3789PK', '2022-02-12 00:00:00'),
(2, 'Mitsubishi', 'Colt', 'AA8825KH', '2022-02-12 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблиці `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220210154055', '2022-02-10 17:41:06', 195),
('DoctrineMigrations\\Version20220211054030', '2022-02-11 07:40:37', 176);

-- --------------------------------------------------------

--
-- Структура таблиці `fuel`
--

CREATE TABLE `fuel` (
  `id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `fuel`
--

INSERT INTO `fuel` (`id`, `type`) VALUES
(1, 'Бензин 92'),
(2, 'Бензин 95'),
(3, 'Спиртовой 95E'),
(4, 'Газ'),
(5, 'Дизель');

-- --------------------------------------------------------

--
-- Структура таблиці `petrol_station`
--

CREATE TABLE `petrol_station` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `petrol_station`
--

INSERT INTO `petrol_station` (`id`, `name`, `picture_filename`) VALUES
(1, 'OKKO', 'okko-6206dfca5303b.jpg'),
(2, 'ANP', 'photo-5bd9cac6340c5-6206de41de6ac.png'),
(3, 'WOG', 'wog-6206de33d587f.png'),
(4, 'Авиас', 'avias-6206de4ccefe7.png'),
(5, 'Сокар', 'socar-6206decbb3375.png'),
(6, 'Glusko', 'glusko-6207959f7816f.png'),
(7, 'UPG', 'upg-6206d596d0440.png'),
(8, 'БРСМ', 'photo-5deaeb397848f0-11502882-6206e0e8194c1.jpg'),
(9, 'Другая', 'gas-station-sign-logo-4717751525-seeklogo-com-6206e074ae4eb.png'),
(10, 'УкрАвто', 'ukravto-6206e0861e3fd.jpg');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `petrol_station`
--
ALTER TABLE `petrol_station`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `car`
--
ALTER TABLE `car`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `petrol_station`
--
ALTER TABLE `petrol_station`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
