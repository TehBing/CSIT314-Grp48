-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csit314`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite_tbl`
--

CREATE TABLE `favourite_tbl` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `property_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_tbl`
--

CREATE TABLE `property_tbl` (
  `id` int(6) NOT NULL,
  `prop_name` varchar(30) NOT NULL,
  `prop_location` text NOT NULL,
  `prop_status` varchar(15) NOT NULL,
  `prop_price` decimal(5,2) NOT NULL DEFAULT 0.00,
  `prop_image` blob NOT NULL,
  `prop_img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_tbl`
--

INSERT INTO `property_tbl` (`id`, `prop_name`, `prop_location`, `prop_status`, `prop_price`, `prop_image`, `prop_img_path`) VALUES
(2, 'Property K', 'Location K', 'Available', 999.99, '', 'uploads/image_2.jpg'),
(3, 'Property L', 'Location L', 'Available', 999.99, '', 'uploads/image_3.jpg'),
(4, 'Property M', 'Location M', 'Available', 999.99, '', 'uploads/image_4.jpg'),
(5, 'Property N', 'Location N', 'Available', 999.99, '', 'uploads/image_5.jpg'),
(6, 'Property O', 'Location O', 'Available', 999.99, '', 'uploads/image_6.jpg'),
(7, 'Property P', 'Location P', 'Available', 999.99, '', 'uploads/image_7.jpg'),
(8, 'Property Q', 'Location Q', 'Available', 999.99, '', 'uploads/image_8.jpg'),
(9, 'Property R', 'Location R', 'Available', 999.99, '', 'uploads/image_9.jpg'),
(10, 'Property S', 'Location S', 'Available', 999.99, '', 'uploads/image_10.jpg'),
(11, 'Property T', 'Location T', 'Available', 999.99, '', 'uploads/image_11.jpg'),
(12, 'Property U', 'Location U', 'Available', 999.99, '', 'uploads/image_12.jpg'),
(13, 'Property V', 'Location V', 'Available', 999.99, '', 'uploads/image_13.jpg'),
(14, 'Property W', 'Location W', 'Available', 999.99, '', 'uploads/image_14.jpg'),
(15, 'Property X', 'Location X', 'Available', 999.99, '', 'uploads/image_15.jpg'),
(16, 'Property Y', 'Location Y', 'Available', 999.99, '', 'uploads/image_16.jpg'),
(17, 'Property Z', 'Location Z', 'Available', 999.99, '', 'uploads/image_17.jpg'),
(18, 'Property AA', 'Location AA', 'Available', 999.99, '', 'uploads/image_18.jpg'),
(19, 'Property AB', 'Location AB', 'Available', 999.99, '', 'uploads/image_19.jpg'),
(20, 'Property AC', 'Location AC', 'Available', 999.99, '', 'uploads/image_20.jpg'),
(21, 'Property AD', 'Location AD', 'Available', 999.99, '', 'uploads/image_1.jpg'),
(22, 'Property AE', 'Location AE', 'Available', 999.99, '', 'uploads/image_2.jpg'),
(23, 'Property AF', 'Location AF', 'Available', 999.99, '', 'uploads/image_3.jpg'),
(24, 'Property AG', 'Location AG', 'Available', 999.99, '', 'uploads/image_4.jpg'),
(25, 'Property AH', 'Location AH', 'Available', 999.99, '', 'uploads/image_5.jpg'),
(26, 'Property AI', 'Location AI', 'Available', 999.99, '', 'uploads/image_6.jpg'),
(27, 'Property AJ', 'Location AJ', 'Available', 999.99, '', 'uploads/image_7.jpg'),
(28, 'Property AK', 'Location AK', 'Available', 999.99, '', 'uploads/image_8.jpg'),
(29, 'Property AL', 'Location AL', 'Available', 999.99, '', 'uploads/image_9.jpg'),
(30, 'Property AM', 'Location AM', 'Available', 999.99, '', 'uploads/image_10.jpg'),
(31, 'Property AN', 'Location AN', 'Available', 999.99, '', 'uploads/image_11.jpg'),
(32, 'Property AO', 'Location AO', 'Available', 999.99, '', 'uploads/image_12.jpg'),
(33, 'Property AP', 'Location AP', 'Available', 999.99, '', 'uploads/image_13.jpg'),
(34, 'Property AQ', 'Location AQ', 'Available', 999.99, '', 'uploads/image_14.jpg'),
(35, 'Property AR', 'Location AR', 'Available', 999.99, '', 'uploads/image_15.jpg'),
(36, 'Property AS', 'Location AS', 'Available', 999.99, '', 'uploads/image_16.jpg'),
(37, 'Property AT', 'Location AT', 'Available', 999.99, '', 'uploads/image_17.jpg'),
(38, 'Property AU', 'Location AU', 'Available', 999.99, '', 'uploads/image_18.jpg'),
(39, 'Property AV', 'Location AV', 'Available', 999.99, '', 'uploads/image_19.jpg'),
(40, 'Property AW', 'Location AW', 'Available', 999.99, '', 'uploads/image_20.jpg'),
(41, 'Property AX', 'Location AX', 'Available', 999.99, '', 'uploads/image_1.jpg'),
(42, 'Property AY', 'Location AY', 'Available', 999.99, '', 'uploads/image_2.jpg'),
(43, 'Property AZ', 'Location AZ', 'Available', 999.99, '', 'uploads/image_3.jpg'),
(44, 'Property BA', 'Location BA', 'Available', 999.99, '', 'uploads/image_4.jpg'),
(45, 'Property BB', 'Location BB', 'Available', 999.99, '', 'uploads/image_5.jpg'),
(46, 'Property BC', 'Location BC', 'Available', 999.99, '', 'uploads/image_6.jpg'),
(47, 'Property BD', 'Location BD', 'Available', 999.99, '', 'uploads/image_7.jpg'),
(48, 'Property BE', 'Location BE', 'Available', 999.99, '', 'uploads/image_8.jpg'),
(49, 'Property BF', 'Location BF', 'Available', 999.99, '', 'uploads/image_9.jpg'),
(50, 'Property BG', 'Location BG', 'Available', 999.99, '', 'uploads/image_10.jpg'),
(51, 'Property BH', 'Location BH', 'Available', 999.99, '', 'uploads/image_11.jpg'),
(52, 'Property BI', 'Location BI', 'Available', 999.99, '', 'uploads/image_12.jpg'),
(53, 'Property BJ', 'Location BJ', 'Available', 999.99, '', 'uploads/image_13.jpg'),
(54, 'Property BK', 'Location BK', 'Available', 999.99, '', 'uploads/image_14.jpg'),
(55, 'Property BL', 'Location BL', 'Available', 999.99, '', 'uploads/image_15.jpg'),
(56, 'Property BM', 'Location BM', 'Available', 999.99, '', 'uploads/image_16.jpg'),
(57, 'Property BN', 'Location BN', 'Available', 999.99, '', 'uploads/image_17.jpg'),
(58, 'Property BO', 'Location BO', 'Available', 999.99, '', 'uploads/image_18.jpg'),
(59, 'Property BP', 'Location BP', 'Available', 999.99, '', 'uploads/image_19.jpg'),
(134, 'mah crib', 'crib', 'Available', 999.99, '', 'uploads/image_8.jpg'),
(135, 'joel home', 'bp', 'Available', 345.00, '', 'uploads/image_17.jpg'),
(136, 'ngee ann city', 'queenstown', 'Sold', 999.99, '', 'uploads/663796be1f35d_image_9.jpg'),
(137, 'nyc tower 345', 'london tower', 'Available', 989.00, '', 'uploads/663797138eb61_image_8.jpg'),
(138, 'joel prop 99', 'Yishun', 'Available', 12.00, '', 'uploads/image_20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review_tbl`
--

CREATE TABLE `review_tbl` (
  `id` int(6) NOT NULL,
  `review` text NOT NULL,
  `rating` int(1) NOT NULL,
  `agent_id` int(6) NOT NULL,
  `review_dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_tbl`
--

INSERT INTO `review_tbl` (`id`, `review`, `rating`, `agent_id`, `review_dateTime`, `user_email`) VALUES
(1, 'My Favourite agent', 5, 8, '2024-05-01 02:30:00', 'tommy@gmail.com'),
(2, 'He can improve on his fengshui', 3, 8, '2024-05-03 02:30:00', 'sherry@gmail.com'),
(4, 'ben is not the best', 3, 4, '2024-02-01 03:30:00', 'sherry@gmail.com'),
(6, 'Great Worker, hope to recommend', 3, 4, '2024-05-05 01:36:23', 'user@test.com'),
(7, 'I really like the way he speak to me', 4, 8, '2024-05-05 02:01:05', 'user@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(6) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `user_name`, `user_email`, `user_pass`, `user_role`) VALUES
(1, 'Tommy Lim', 'tommy@gmail.com', 'admin', 'admin'),
(2, 'Shery Tan', 'sherry@gmail.com', 'buyer', 'buyer'),
(3, 'Jason Hong Xin Lim', 'jason@gmail.com', 'seller', 'seller'),
(4, 'Holland Ben', 'tben@gmail.com', 'agent', 'agent'),
(5, 'James Lim', 'James@gmail.com', 'admin', 'admin'),
(6, 'Xiao Ming Tan', 'ming@gmail.com', 'buyer', 'buyer'),
(7, 'Merlin', 'Merlin@gmail.com', 'seller', 'seller'),
(8, 'Jeraldine', 'Jeraldine@gmail.com', 'agent', 'agent'),
(9, 'admin', 'admin@test.com', '$2y$10$WbW8/coDZLvXl5eiH0NTLu8J4k0CA4kcxN7p1R0kUuy58eN4cBhCG', 'admin'),
(10, 'userGammy', 'user@test.com', '$2y$10$VH9CsKjl0s/KiqPhhQVUdOhC/Ghr7SLtqUDNl/GOxdAFlFAR9l8Kq', 'buyer'),
(11, 'agent', 'agent@123.com', '$2y$10$60bQXiuifseizIDPlGrazutPL/FhMi7AHlnXrrE5PnDUoAs5fT82i', 'admin'),
(12, 'agent', 'agent@123.com', '$2y$10$taSmHCC45exQ4DLcKa/BkOMwIbyIFRRIw.ZWtimSZ2XvOJ9KgZswS', 'agent'),
(13, 'agent', 'agent@1234.com', '$2y$10$UeEfqXw7lA9bQSAY0k.JzevEPvtqVozl2u7F4zfs0.sF8UDuLpezC', 'agent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property_tbl`
--
ALTER TABLE `property_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_tbl`
--
ALTER TABLE `review_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property_tbl`
--
ALTER TABLE `property_tbl`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `review_tbl`
--
ALTER TABLE `review_tbl`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review_tbl`
--
ALTER TABLE `review_tbl`
  ADD CONSTRAINT `review_tbl_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_tbl` (`id`),
  ADD CONSTRAINT `review_tbl_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
