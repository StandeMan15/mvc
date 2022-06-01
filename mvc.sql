-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 jun 2022 om 16:54
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
  `content_name` varchar(40) NOT NULL,
  `content_type` varchar(40) NOT NULL,
  `content_html` varchar(200) NOT NULL,
  `content_url` varchar(400) NOT NULL,
  `content_active` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`id`, `content_name`, `content_type`, `content_html`, `content_url`, `content_active`, `creation_date`, `update_date`) VALUES
(1, 'je moeder', 'hoer', 'none', 'none', 0, '2022-03-01', '2022-03-25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(6) NOT NULL,
  `customer_id` int(6) DEFAULT NULL,
  `order_status_code` varchar(30) DEFAULT NULL,
  `payment_methode_code` varchar(30) DEFAULT NULL,
  `order_date` varchar(50) DEFAULT NULL,
  `der_order_price` varchar(50) DEFAULT NULL,
  `other_other_details` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_orders_product`
--

CREATE TABLE `customer_orders_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `comments` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
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

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`, `image`) VALUES
(1, 1, 1, 'Chocolate', '1.29', '1 pc.', ''),
(2, 1, 1, 'Sprinkled', '1.29', '1 pc.', ''),
(3, 1, 1, 'Maple', '1.49', '1 pc.', ''),
(4, 2, 2, 'Dunkacchino', '1.69', 'small', ''),
(5, 3, 3, 'Steak long jim', '2.29', 'steak wrap', ''),
(9, 1, 3, 'Banaan', '1.30', '1 pc.', ''),
(10, 1, 2, 'driehoek', '1.29', 'dit heeft 3 hoeken', 'e864c8490ab37ebf.jpg'),
(11, 123456, 0, '', '<p style=\"text-align: right;\"><em>testdata</em></p>', '', ''),
(12, 0, 12345, '', '<p><s><span style=\"color: rgb(126, 140, 141);\">Details</span></s></p>', '', ''),
(13, 12, 2, 'dildo', '12.99', '<p>lekker</p>', '');

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
  `website` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `company_name` varchar(90) CHARACTER SET utf8 DEFAULT NULL,
  `psw` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `username`, `email`, `address_street`, `address_number`, `address_city`, `address_zipcode`, `phone`, `website`, `company_name`, `psw`) VALUES
(1, 'Stan', 'de', 'Rijk', 'stendemen', 'standerijk@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stan'),
(2, 'johan', NULL, 'jansen', 'johanieboy23', 'johan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Johan');

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
-- Indexen voor tabel `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexen voor tabel `customer_orders_product`
--
ALTER TABLE `customer_orders_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `order_id_2` (`order_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT voor een tabel `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `customer_orders_product`
--
ALTER TABLE `customer_orders_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `customer_orders_product`
--
ALTER TABLE `customer_orders_product`
  ADD CONSTRAINT `customer_orders_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `customer_orders` (`order_id`),
  ADD CONSTRAINT `customer_orders_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
