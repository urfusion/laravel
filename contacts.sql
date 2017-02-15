-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2015 at 05:21 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fabmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `message`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'basant', 'bas@gmail.com', 'sdsadasd'),
(2, '2015-09-01 08:09:11', '2015-09-01 08:09:11', 'asdasd', 'asdasd', 'adsad'),
(3, '2015-09-01 08:11:09', '2015-09-01 08:11:09', 'sadasd', 'asdsad', 'asdasd@gmil.com'),
(4, '2015-09-01 08:27:37', '2015-09-01 08:27:37', 'asdsad', 'asdsa', 'asdasd@sad.sdf'),
(5, '2015-09-01 08:29:40', '2015-09-01 08:29:40', 'asdsad', 'asdsa', 'asdasd@sad.sdf'),
(6, '2015-09-01 08:30:10', '2015-09-01 08:30:10', 'asdasd', 'asdasd', 'asdas@df.gf'),
(7, '2015-09-01 08:43:59', '2015-09-01 08:43:59', 'sdasd', 'sadasd', 'asdsa@sadas.gdf'),
(8, '2015-09-02 00:21:15', '2015-09-02 00:21:15', 'sdsadas', 'asdasd', 'asdas@asd.asd'),
(9, '2015-09-02 00:21:55', '2015-09-02 00:21:55', 'sdsadas', 'asdasd', 'asdas@asd.asd'),
(10, '2015-09-02 00:22:09', '2015-09-02 00:22:09', 'sdasda', 'adasda', 'asd@asd.sdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
