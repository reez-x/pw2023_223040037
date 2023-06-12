-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 12:00 AM
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
-- Database: `tubespw`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `jk`, `email`, `gambar`, `role`) VALUES
(1, 'admin', '$2y$10$dFr.n2x3Ztj90pISf.SRbuRC8WToDf5NkaCAJpU0WYdU1IWgdqFOO', '', '', '', 'admin'),
(2, 'dev123', '$2y$10$zPCUKOKYwhi6iRlVAHKTl.2S2pJN7Uc.OmdxxD2Ut73itRytFUF1e', '', 'dev123@gmail.com', '', 'user'),
(3, 'user', '$2y$10$/WSPcvOOaUWayI0wnZksb.2BfrtJh0rqQrjUshVAdwgrPybDkZC6q', '', '', '', 'user'),
(27, 'qrqwrqwr', '$2y$10$XEzk26iKB6F5W49WxaK8kupVBPJIYlKQlfg5pl8R2cBPTrlNZxxRW', '1', '', '', 'user'),
(28, 'halo', '$2y$10$Dw0l1M9.x/dU7YSfcMlAyeNvyGdRPyvgUYQ1qAjXyelxsIIQMfEhO', '0', 'halo@gmail.com', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
