-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 07:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agents`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'ADMIN', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `company` varchar(50) NOT NULL,
  `gst` int(50) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `slab` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `mob_no`, `email`, `password`, `address`, `company`, `gst`, `balance`, `slab`) VALUES
(7, 'GAURAV SHARMA', 7014274820, 'gaurav.20jics018@jietjodhpur.ac.in', 'user-password', 'JIET Engineering College', 'Student', 0, 1000, 1),
(29, 'garvit sharma', 4444444444, 'garvit@gmail.com', 'user-password', 'sdfc', 'sd', 0, 300, 3),
(31, 'gaurav.live', 23, 'gaurav@ive', 'user-password', '3', '3', 1, 0, 2),
(34, 'gaurav.live', 43534, 'gaurav@ive', 'user-password', '3', '3', 0, 43535, 3),
(35, 'fsdrf', 345345, 'fds@c.d', 'user-password', 'd', 'd', 1, 245345, 2),
(36, 'GAURAV S', 7014274820, 'gaurav.20jics018@jietjodhpur.ac.in', 'user-password', 'JIET Engineering College', 'Student', 1, 2000, 2),
(39, 'garvit sharma', 4444444444, 'garvit@gmail.com', '', 'sdfc', 'sd', 0, 500, 1),
(40, 'garvit sharma', 4444444444, 'garvit@gmail.com', '1234567890', 'sdfc', 'sd', 0, 500, 1),
(42, 'garvit sharma', 4444444444, 'garvit@gmail.com', 'pass', 'sdfc', 'sd', 0, 3233, 1),
(43, 'garvit sharma', 4444444444, 'garvit@gmail.com', 'pass', 'sdfc', 'sd', 0, 3233, 1),
(44, 'ns1.name.com', 23456, 'gaurav.20jics018@jietjodhpur.ac.in', 'asdfgh', '3', '3', 0, 23456, 2),
(45, 'ns1.name.com', 23456, 'gaurav.20jics018@jietjodhpur.ac.in', 'asdfgh', '3', '3', 0, 23456, 2),
(46, 'demo', 7778889991, 'demo@gmail.com', '345678', 'd', 'd', 0, 2212508, 2),
(47, 'agent', 24368, 'agent@gmail.com', 'agent', 'agent', 'agent', 0, 6112, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(15) NOT NULL,
  `products` varchar(255) NOT NULL,
  `products_price` int(11) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `agent_rem_bal` int(11) NOT NULL,
  `cart_details` varchar(5000) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_mob_no` bigint(10) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `order_date` varchar(10) NOT NULL,
  `order_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `products`, `products_price`, `agent_name`, `agent_rem_bal`, `cart_details`, `customer_name`, `customer_mob_no`, `customer_email`, `shipping_address`, `order_date`, `order_status`) VALUES
(20230726152237, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153536, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153659, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153717, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153723, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153746, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153801, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153806, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726153836, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154028, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154108, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154156, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154214, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154236, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154247, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154308, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154333, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154341, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154353, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154426, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726154705, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Delivered'),
(20230726155408, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726155501, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726193029, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Delivered'),
(20230726193231, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726193255, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726193318, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Not Delivered'),
(20230726193333, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Delivered'),
(20230726193346, 'testing (1),Trigonik (2),', 9878, 'agent', 14490, 'images.jpg, testing, 8378, 1, 8378 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 2, 1500 next product details =>', 'GAURAV SHARMA', 7014274820, '', 'GAURAV SHARMA<br>07014274820<br>JIET Engineering College<br>jodhpur<br>Jodhpur,Rajasthan<br>342802', '2023-07-26', 'Delivered'),
(20230730115911, 'testing (1), ', 8378, 'agent', 6112, 'images.jpg, testing, 8378, 1, 8378 next product details =>', 'GAURAV SHARMA', 56456554, '', 'GAURAV SHARMA<br>56456554<br>JIET Engineering College<br>jodhpur<br>Jodhpur, Rajasthan,Rajasthan<br>', '30-07-2023', 'Not Delivered'),
(20230730123732, 'testing (15), Trigonik (10), ', 133170, 'demo', 2212508, 'images.jpg, testing, 8378, 15, 125670 next product details =>20230706121654_trigonikthegame2.jpg, Trigonik, 750, 10, 7500 next product details =>', 'GAURAV SHARMA', 23452334, 'gaurav.20jics018@jietjodhpur.ac.in', 'GAURAV SHARMA<br>23452334<br>JIET Engineering College<br>jodhpur<br>Jodhpur, Rajasthan,Rajasthan<br>', '30-07-2023', 'Not Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `images` varchar(100) NOT NULL,
  `slab_1_price` int(11) NOT NULL,
  `slab_2_price` int(11) NOT NULL,
  `slab_3_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `images`, `slab_1_price`, `slab_2_price`, `slab_3_price`) VALUES
(1, 'Trigonik', 'Trigonik is the World\'s First Trigonometry Based Strategy Board Game Created for Two Players. It can be learned and played by anyone about the age of 10+. For More Information Please Checkout at -https://www.trigonik.com/', '20230706121654_trigonikthegame2.jpg', 1000, 750, 500),
(41, 'TrigoNik 2', 'Trigonik is the World\'s First Trigonometry Based Strategy Board Game Created for Two Players. It can be learned and played by anyone about the age of 10+. For More Information Please Checkout at -https://www.trigonik.com/', '20230813183302_trigonikthegame5.jpg', 500, 450, 400),
(42, 'I\'m GROOT (Wallpaper)', 'Groot from Guardians of the Galaxy ', '20230813184346_wallpaperflare.com_wallpaper.jpg', 50, 40, 30),
(43, 'The Mandalorian Wallpaper', 'The Mandalorian from STAR WARS', '20230813184446_wallpaperflare.com_wallpaper (14).jpg', 50, 40, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
