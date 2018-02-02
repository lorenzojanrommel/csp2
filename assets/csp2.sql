-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 09:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Seeds'),
(2, 'Fertilizers');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `id_status`, `orderdate`) VALUES
(1, 2, 2000, 1, '2018-02-01 09:21:48'),
(2, 2, 2000, 1, '2018-02-01 13:34:31'),
(3, 2, 450, 1, '2018-02-01 13:50:11'),
(4, 2, 4000, 1, '2018-02-01 14:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `quantity`, `order_id`) VALUES
(1, 3, '1', 1),
(2, 1, '1', 2),
(3, 2, '3', 3),
(4, 2, '1', 4),
(5, 3, '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category_id`, `owner_user_id`) VALUES
(1, 'Dekalb - 9132', ' Dekalb', 'assets/img/dekalb-9132.jpg', '2000', 1, 3),
(2, 'Dekalb 6919', ' Dekalb 6919', 'assets/img/dekalb6919.jpg', '1500', 1, 3),
(3, 'Apple', 'Apple ', 'assets/img/apple.png', '150', 1, 9),
(4, 'Banana', 'banana ', 'assets/img/banana.png', '150', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `birthdate`, `gender`, `address`, `username`, `password`, `user_level`, `user_status`, `reg_date`) VALUES
(1, 'Jan Rommel', 'Lorenzo', 'lorenzojanrommel@gmail.com', '09122235050', '1997-01-24', 'm', 'camiling, tarlac', 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 1, '2018-01-25 09:11:37'),
(2, 'JR', 'Lorenzo', 'misterfewwords@gmail.com', '0912223213213', '1993-12-05', 'm', 'Jrlorenzo_address', 'customer', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 1, '2018-02-01 08:03:32'),
(3, 'JR Sellerrr', 'Seller', 'jrseller@gmail.com', '09123331345', '2018-01-02', 'm', 'Jr Address', 'seller', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-02-01 04:48:45'),
(4, 'Fiery', 'Queen', 'linaqueen@gmail.com', '09123456781', '2018-01-02', 'f', 'Lina_address', 'lina', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-01-29 05:17:52'),
(6, 'Maiden', 'Slark', 'maidenslark@gmail.com', '0912345668', '25 January, 2018', 'f', 'maidenslarkaddress', 'maidenslark', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-01-25 15:49:50'),
(7, 'Akashaaaaa', 'Pain', 'akashapain@gmail.com', '012321312321', '26 January, 2018', 'f', 'Akashapainaddress', 'akasha', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-02-01 04:39:44'),
(8, 'Monet', 'Monet', 'monetmonet@gmaill.com', '0912321321234', '26 January, 2018', 'm', 'monetadress', 'monet', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 1, '2018-01-25 16:12:53'),
(9, 'Fy', 'Fy', 'fy@gmail.com', '0912321321', '26 January, 2018', 'm', 'Fyadress', 'fy', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-01-29 08:10:13'),
(10, 'mister', 'few', 'misterfew@gmail.com', '091521155474', '28 January, 2018', 'm', 'misterfewaddress', 'misterfew', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-01-27 16:46:35'),
(11, 'Few', 'Mister Words', 'fewmister@gmail.com', '0986656565', '28 January, 2018', 'm', 'Fewmisteraddress', 'fewmister', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1, '2018-01-29 05:15:48'),
(14, 'Pucking', 'Wonder', 'puckwonder@gmail.com', '09979797715', '28 January, 2018', 'm', 'Puckwonderaddress', 'puck', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 2, '2018-01-29 07:24:56'),
(16, 'Slark', 'Slark', 'slark@gmail.com', '0695656665989', '29 January, 2018', 'm', 'Slark_address', 'slark', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 2, '2018-01-29 07:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'seller'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'deactivate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `total_price` (`total_price`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `owner_username` (`owner_user_id`),
  ADD KEY `owner_user_id` (`owner_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_status` (`user_status`),
  ADD KEY `users_ibfk_1` (`user_level`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `user_status` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`owner_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
