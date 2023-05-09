-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 03:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `img` blob NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `user_id`, `img`, `date`) VALUES
(6, 'Classic Watches', 'These are watches that have stood the test of time and are known for their timeless design, precision, and craftsmanship. They often feature a simple and elegant design, with a focus on traditional materials such as leather and metal. Some popular classic watch brands include Rolex, Omega, and Jaeger-LeCoultre. These watches are often considered investments due to their durability and lasting value.', 1, 0x706578656c732d70686f746f2d3139303831392e6a7067, '2023-04-30 07:58:27'),
(8, 'Smart watches:', 'Smartwatches: These watches are designed to be paired with a smartphone and come with a range of features, including notifications, fitness tracking, and mobile payments. They often have touchscreens and can be customized with different watch faces and bands. Some popular smartwatch brands include Apple, Samsung, and Fitbit.', 1, 0x706578656c732d70686f746f2d3433373033372e6a706567, '2023-04-25 01:32:09'),
(9, 'Fashion Watches', 'Fashion Watches: These watches are designed with women in mind and often feature stylish and trendy designs that are meant to complement different outfits and occasions. from leather and metal to plastic and fabric, and are often adorned with decorative elements such as crystals, pearls, and colorful dials', 45, 0x706578656c732d70686f746f2d313136323531392e6a7067, '2023-04-25 03:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `user_id`, `item_id`, `date`) VALUES
(2, 'good', 22, 123, '2023-05-03 13:00:35'),
(4, 'baaad', 20, 123, '2023-05-03 13:01:19'),
(5, 'good', 13, 124, '2023-05-03 13:00:22'),
(7, 'nice', 20, 124, '2023-05-02 17:49:40'),
(9, 'not good', 20, 124, '2023-05-02 17:55:20'),
(14, 'nice', 20, 127, '2023-05-05 00:43:12'),
(17, 'nicee', 20, 130, '2023-05-06 01:17:52'),
(18, 'good', 20, 127, '2023-05-08 23:55:00'),
(19, 'nice\r\n', 20, 123, '2023-05-09 01:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `approve_status` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `img` blob NOT NULL,
  `made_in` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `date`, `cat_id`, `user_id`, `approve_status`, `status`, `img`, `made_in`) VALUES
(123, 'Rolex', 'Rolex: A Swiss luxury watchmaker known for its high-quality and durable timepieces', 2897, '2023-05-05 23:15:01', 6, 20, 1, 3, 0x706578656c732d70686f746f2d323738333837332e6a7067, 'london'),
(124, 'Omega', 'Omega: A Swiss luxury watchmaker known for its precision and reliability, with a connection to space exploration.', 1999, '2023-05-05 23:16:39', 6, 17, 1, 2, 0x706578656c732d70686f746f2d3233363931352e6a7067, 'America'),
(126, 'Cartier', ' Cartier: A French luxury goods company that produces elegant and sophisticated watches.', 3999, '2023-05-05 23:18:01', 6, 20, 0, 1, 0x706578656c732d70686f746f2d3238303235302e6a706567, 'french'),
(127, 'Patek Philippe', ' Patek Philippe: A Swiss luxury watchmaker known for exceptional craftsmanship and attention to detail.', 5999, '2023-05-05 23:27:29', 6, 20, 1, 3, 0x706578656c732d70686f746f2d3237373339302e6a7067, 'Swiss'),
(128, 'Breitling', 'Breitling: A Swiss luxury watchmaker known for precision and durability,', 11000, '2023-05-05 23:25:56', 6, 20, 1, 2, 0x706578656c732d70686f746f2d3332353834352e6a706567, 'Swiss '),
(129, ' Panerai', ' Panerai: An Italian luxury watchmaker known for bold and distinctive designs, with a focus on diving and the sea.', 999, '2023-05-05 23:30:55', 6, 20, 1, 2, 0x706578656c732d70686f746f2d323739393533352e6a706567, 'italia'),
(130, 'Apple Watch', 'Apple Watch: A popular smartwatch developed by Apple that syncs with iPhones and allows users to make calls, send messages, track fitness, and access a range of apps and features', 10000, '2023-05-05 23:35:09', 8, 20, 1, 3, 0x706578656c732d70686f746f2d323737393031382e6a7067, 'America'),
(132, 'Samsung Galaxy Watch:', 'Samsung Galaxy Watch: A smartwatch developed by Samsung that offers fitness tracking, mobile payments, and a range of customizable watch faces, as well as syncing with Samsung smartphones.', 2900, '2023-05-05 23:36:29', 8, 20, 0, 2, 0x706578656c732d70686f746f2e6a7067, 'italia'),
(133, 'Fitbit Versa:', ' Fitbit Versa: A smartwatch developed by Fitbit that focuses on fitness tracking, offering features such as heart rate monitoring, workout tracking, and sleep tracking, as well as mobile payments and access to a range of apps.', 9999, '2023-05-05 23:37:52', 8, 20, 1, 2, 0x706578656c732d70686f746f2d3433373033382e6a7067, 'russia'),
(134, 'Garmin Venu', ' Garmin Venu: A smartwatch developed by Garmin that is designed for fitness enthusiasts, offering features such as GPS tracking,', 4555, '2023-05-05 23:40:03', 8, 20, 1, 3, 0x706578656c732d70686f746f2d31323935353838382e6a7067, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `reg_status` tinyint(1) NOT NULL DEFAULT 0,
  `admin_status` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(255) NOT NULL DEFAULT 'Egypt',
  `registerd_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `full_name` varchar(255) NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `password`, `e_mail`, `reg_status`, `admin_status`, `address`, `registerd_date`, `full_name`, `img`) VALUES
(13, 'ali', '123', 'sha3ban@yahoo.com', 1, 0, 'maadi', '2023-04-30 16:30:26', 'abdelsallam mohamed', 0x64342e6a7067),
(17, 'alii', '123', 'sha3ban@yahoo.com', 1, 0, 'giza', '2023-04-26 11:52:56', 'ali ahmed', 0x64352e6a7067),
(20, 'abdullah', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sha3ban@yahoo.com', 1, 0, 'giza', '2023-05-06 02:59:22', 'abdullah shaaban', 0x312d6f6c642e6a7067),
(21, 'omar', '123', 'omar@yahoo.com', 1, 0, 'maadi', '2023-04-26 11:55:29', 'omar ali mohamed', 0x312d6f6c642e6a7067),
(22, 'sameh', '123', 'sameh@yahoo.com', 1, 0, 'giza', '2023-04-26 11:57:48', 'sameh mohamed', 0x352e6a7067),
(23, 'khaled', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'abdullah@yahoo.com', 0, 0, '', '2023-05-05 21:09:44', 'abdullah ', 0x352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(4) NOT NULL,
  `user_ar_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `added_date` datetime NOT NULL,
  `image` blob NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_ar_name`, `username`, `password`, `added_date`, `image`, `e_mail`, `full_name`, `address`) VALUES
(1, 'abdullah', 'abdullah', '12', '2023-04-17 17:08:37', 0x312d6f6c642e6a7067, 'abdullah_shaaban@Gmail.com', 'abdelsallam mohamed ali', 'helwan'),
(22, 'ali', 'ali mohamed', '123', '2023-04-23 05:55:09', 0x7361, '', '', ''),
(45, 'salah', 'salah', '123', '2023-04-23 06:10:31', 0x64, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number1` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment1` (`item_id`),
  ADD KEY `comment2` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items1` (`cat_id`),
  ADD KEY `items2` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `number1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment2` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items2` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
