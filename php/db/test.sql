-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 10:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Clothing'),
(1, 'Dairy'),
(11, 'Entertainment'),
(3, 'Food'),
(2, 'Tabacco'),
(6, 'dune'),
(12, 'poeple'),
(5, 'voicemod');

--
-- Triggers `category`
--
DELIMITER $$
CREATE TRIGGER `deletecategory` BEFORE DELETE ON `category` FOR EACH ROW delete from productcategories where idcategory = (select id from category where id = idcategory)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'name',
  `description` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT 'descr',
  `status` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'status',
  `image` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `status`, `image`) VALUES
(1, 'Water', 'WaTeR', 'Just Arrived', 'https://assets.sainsburys-groceries.co.uk/gol/7856691/1/640x640.jpg'),
(2, 'Milk', 'Fresh from the cow', 'Just Arrived', 'https://laz-img-sg.alicdn.com/p/6ef1555f8f9df1bc7c6e141e6e0e4342.png'),
(8, 'shorts2', 'torn', 'Second pair of torn shorts', 'https://m.media-amazon.com/images/I/81IKU+TK+2L._SX500_.jpg'),
(9, 'Snow White', 'used', 'Snow white cd', 'https://static.posters.cz/image/1300/affiches-et-posters/snow-white-and-the-seven-dwarfs-i11206.jpg'),
(12, 'pizza peperoni', 'fresh', 'fresh pizza from pizzabythesli', 'https://wallpapercave.com/wp/wp7451993.jpg'),
(13, 'Vegeta', 'E128', 'not good for health', 'http://www.vegeta.us.com/datastore/imagestore/1440xauto/1440xauto_1474445556Vegeta_SAD_1_kg.jpg?v=14'),
(14, 'powerade', 'fresh', 'energy drink', 'https://i.pinimg.com/originals/b1/65/86/b16586c8b67382e1cbd5027f0d92e3cd.jpg'),
(22, 'monster', 'fresh', 'energy drink', 'https://popsamerica.com/109-large_default/monster-energy-ultra-fiesta-mango.jpg'),
(75, '4 kg de canabis', 'illégal', 'à fumer', 'https://wallpaperaccess.com/full/2209294.jpg');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `deleteproduct` BEFORE DELETE ON `product` FOR EACH ROW delete from productcategories where idproduct = (select id from product where id = idproduct)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `idProduct` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`idProduct`, `idCategory`) VALUES
(75, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD UNIQUE KEY `UC_idprodcat` (`idProduct`,`idCategory`),
  ADD KEY `idCategory` (`idCategory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD CONSTRAINT `productcategories_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `productcategories_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
