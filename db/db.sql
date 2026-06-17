-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 17 jun 2026 om 14:24
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admininformation`
--

CREATE TABLE `admininformation` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `admininformation`
--

INSERT INTO `admininformation` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$12$.ggQO0J7LPKpox/wYHojcecvzM8QLCFhltLPjdo337dHAKM0dwKdq');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `all-inclusive`
--

CREATE TABLE `all-inclusive` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `all-inclusive`
--

INSERT INTO `all-inclusive` (`id`, `destination`, `price`) VALUES
(2, 'Dubai', 699),
(3, 'Bali', 499),
(4, 'New York', 999),
(5, 'Maldives', 699),
(6, 'Ibiza', 899),
(7, 'Nice', 1099);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_type` varchar(20) NOT NULL,
  `item_id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `flights`
--

CREATE TABLE `flights` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `flights`
--

INSERT INTO `flights` (`id`, `destination`, `price`) VALUES
(1, 'Amsterdam Dubai', 349),
(2, 'Amsterdam New York', 499),
(4, 'Amsterdam Bali', 399),
(5, 'Amsterdam Tokyo', 579),
(6, 'Amsterdam Paris', 129);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `travel plans`
--

CREATE TABLE `travel plans` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `travel plans`
--

INSERT INTO `travel plans` (`id`, `destination`, `price`) VALUES
(1, 'Dubai', 349),
(2, 'New York', 499),
(3, 'Bali', 399),
(4, 'Tokyo', 579),
(5, 'Paris', 129),
(6, 'Cape Town', 699);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userinformation`
--

CREATE TABLE `userinformation` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `userinformation`
--

INSERT INTO `userinformation` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Luke', 'luke@luke.nl', '$2y$12$VDJtmsCIcz8/FlEnQYYDTOcUHeAGYAE43REZgGxFCnfrQZTkARsvK'),
(3, 'Admin', 'Admin@Admin.nl', '$2y$12$.ggQO0J7LPKpox/wYHojcecvzM8QLCFhltLPjdo337dHAKM0dwKdq'),
(4, 'Emre Aktas', 'test@test.nl', '$2y$12$fE0g.Z8kdv16Q2r48Qgsh.N0iJWQ9rMiVvbY7CHVukt356Wo2lpDC');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admininformation`
--
ALTER TABLE `admininformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `all-inclusive`
--
ALTER TABLE `all-inclusive`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `travel plans`
--
ALTER TABLE `travel plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admininformation`
--
ALTER TABLE `admininformation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `all-inclusive`
--
ALTER TABLE `all-inclusive`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `travel plans`
--
ALTER TABLE `travel plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
