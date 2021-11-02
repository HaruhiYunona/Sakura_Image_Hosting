-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2021-11-02 15:27:29
-- 服务器版本： 5.6.49-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picup`
--

-- --------------------------------------------------------

--
-- 表的结构 `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
  `uid` int(10) NOT NULL,
  `md5` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `picname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `md5` (`md5`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
