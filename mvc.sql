-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 okt 2022 om 10:32
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `location`) VALUES
(2, 'GERARD', '06-12345678', 'gerad@outlook.com', 'fit for free'),
(3, 'Tibo', '06-12345679', 'tibo@rocmn.nl', 'nieuwegein'),
(4, 'Tibo', '06-12345679', 'tibo@rocmn.nl', 'nieuwegein'),
(18, 'Stan', '06-12345678', 'email@email.com', 'vianen'),
(19, 'Stan', '0612345678', 'email@email.com', 'vianen'),
(20, 'Stan', '06-12345678', 'email@email.com', 'vianen'),
(29, 'Johan', '06-12345678', 'johannnn@outlook.com', 'fit for free'),
(30, 'Johan', '06-12345678', 'gerad@outlook.com', 'Nog nieuwere locaite'),
(31, 'GERARD', '06-12345678', 'gerad@outlook.com', 'fit for free');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `author` varchar(40) NOT NULL,
  `title` varchar(60) NOT NULL,
  `images` int(11) NOT NULL,
  `contents` text NOT NULL,
  `socialmedia` int(11) NOT NULL,
  `publishdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`id`, `author`, `title`, `images`, `contents`, `socialmedia`, `publishdate`) VALUES
(1, '', 'Artikel titel', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_type_code` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_name` varchar(80) DEFAULT NULL,
  `product_price` varchar(80) DEFAULT NULL,
  `other_product_details` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`, `image`) VALUES
(1, 1, 1, 'Chocolate', '1.29', '1 pc.', ''),
(2, 1, 1, 'Sprinkled', '1.29', '1 pc.', ''),
(3, 1, 1, 'Maple', '1.49', '1 pc.', ''),
(4, 2, 2, 'Dunkacchino', '1.69', 'small', ''),
(5, 3, 3, 'Steak long jim', '2.29', 'steak wrap', ''),
(9, 1, 3, 'Banaan', '1.30', '1 pc.', ''),
(10, 1, 2, 'driehoek', '1.29', 'dit heeft 3 hoeken', 'e864c8490ab37ebf.jpg'),
(11, 123456, 0, '', '<p style=\"text-align: right;\"><em>testdata</em></p>', '', ''),
(12, 0, 12345, '', '<p><s><span style=\"color: rgb(126, 140, 141);\">Details</span></s></p>', '', ''),
(13, 12, 2, 'Appel', '12.99', '<p>lekker</p>', ''),
(14, 21345678, 3, 'Banaan', '1.20', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `middlename` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `address_street` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `address_number` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `address_city` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `address_zipcode` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `psw` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `username`, `email`, `address_street`, `address_number`, `address_city`, `address_zipcode`, `phone`, `psw`, `user_admin`) VALUES
(1, 'Stan', 'de', 'Rijk', 'stendemen', 'standerijk@gmail.com', NULL, NULL, NULL, NULL, NULL, 'stan', 0),
(2, 'johan', NULL, 'jansen', 'johanieboy23', 'johan@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Johan', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT voor een tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
