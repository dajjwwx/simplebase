-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-01-21 21:10:50
-- 服务器版本： 5.6.27-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpletestbank`
--

-- --------------------------------------------------------

--
-- 表的结构 `stb_testbank`
--

CREATE TABLE IF NOT EXISTS `stb_testbank` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stb_testbank`
--

INSERT INTO `stb_testbank` (`id`, `title`, `grade`, `published`) VALUES
(1, '2016届凉山一诊', 12, 1453299755),
(2, '会东中学2015-2016学年高二12月月考', 11, 1453357634);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stb_testbank`
--
ALTER TABLE `stb_testbank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stb_testbank`
--
ALTER TABLE `stb_testbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
