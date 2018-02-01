-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2017 at 02:08 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `photo` text,
  `desc` text,
  `lat` double DEFAULT NULL,
  `lang` double DEFAULT NULL,
  `location` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `photo`, `desc`, `lat`, `lang`, `location`, `date`) VALUES
(39, '78daaa3ce32fcaee59d1937f318e1805.jpg', 'pertama', -7.9309088, 112.62927, 1, '2017-01-08 05:01:54'),
(40, '16bf12340440cfe70518ed8fd6b07ffe.jpg', 'percobaan k 2', -15.798093250016878, -49.51178669929504, 1, '2017-01-08 05:01:35'),
(41, 'a84cbd9000f74dcc741ad0933b5cc8b0.jpg', 'percobaan 3 no location', NULL, NULL, 0, '2017-01-08 05:01:26'),
(42, '29a2295fb41a716141110060ac74b254.jpg', 'Creed', 45.161163687606006, 11.67322341352701, 1, '2017-01-08 05:01:37'),
(43, '38a2267ab764b86b601a64dfe826b230.jpg', '', NULL, NULL, 0, '2017-01-08 06:01:58'),
(44, '1666d471b2db1b34009abdb6ca49446d.jpg', '', NULL, NULL, 0, '2017-01-08 06:01:25'),
(45, '69bad20e74d35ed2395d288455844d55.jpg', '', NULL, NULL, 0, '2017-01-08 06:01:49'),
(46, 'c50b2fadcc044096354b03ef8fbc7bf5.jpg', 'ulululuuu', -7.9308008, 112.6294289, 1, '2017-01-08 02:01:42'),
(47, '5d5822814c2936f2dcc0abee68f89db9.jpg', 'duroo', -7.9307983, 112.6294207, 1, '2017-01-08 02:01:08'),
(48, '9ccf1313db80ad45f4b6650f30033555.jpg', '#cccccc', 30.702213536348204, 37.828306183218956, 1, '2017-01-08 04:01:53'),
(49, 'd78d851530893516800d4ff024e7049a.jpg', 'Hallo', -7.9470407, 112.6153098, 1, '2017-01-11 02:01:03'),
(50, 'e558a7be19555999992a945ba33232e4.jpg', 'xxx', -7.949445322132731, 112.61140991002321, 1, '2017-01-11 02:01:02'),
(51, 'bc321cf5b95012a58f59f731a28fb617.jpg', '', NULL, NULL, 0, '2017-01-11 14:39:08'),
(52, '9b7e0847f1674ea8b4269fd551407198.jpg', 'Hallo Tegar', NULL, NULL, 0, '2017-01-11 14:39:33'),
(53, '503643a40a0a1cfc3cdf28b6454911b5.jpg', '', NULL, NULL, 0, '2017-01-11 14:39:58'),
(54, 'f790b9d6c59494aa586cc0fdd3a01a7c.jpg', '', NULL, NULL, 0, '2017-01-11 15:59:39'),
(55, '6b0cb58e335dfc2c71b0f3e24edc46ab.jpg', 'Hello MI-3C', -7.9470227, 112.6152709, 1, '2017-01-11 16:04:39'),
(56, '2f9f0bc527ed78da467cb7638bddf305.jpg', 'jj', -7.9470741, 112.615535, 1, '2017-01-11 16:22:35'),
(57, '1e06d8fff95545c8b3d577aa79f017f9.jpg', '', NULL, NULL, 0, '2017-02-10 15:47:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
