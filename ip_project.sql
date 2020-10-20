-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2020 at 07:51 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

DROP TABLE IF EXISTS `add_to_cart`;
CREATE TABLE IF NOT EXISTS `add_to_cart` (
  `email` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('abc@abc.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_image_url` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `servings` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image_url`, `price`, `servings`) VALUES
(2, 'allo vadi', 'allo_vadi.jpg', '50.00', 'breakfast'),
(3, 'dhokla', 'dhokla.png', '50.00', 'breakfast'),
(4, 'samosa', 'samosa.jpg', '20.00', 'breakfast'),
(5, 'vada', 'vada.jpg', '50.00', 'breakfast'),
(12, 'South Dish', 'south_dish.jpg', '100.00', 'meal'),
(6, 'veg_diet', 'veg_diet.jpg', '50.00', 'breakfast'),
(7, 'upma', 'upma.jpg', '50.00', 'breakfast'),
(8, 'softdrinks', 'soft_drinks.jpg', '20.00', 'breakfast'),
(9, 'coffee', 'coffee.jpg', '20.00', 'breakfast'),
(10, 'biryani', 'biryani.jpg', '100.00', 'meal'),
(11, 'punjabi_dish', 'punjabi_dish.jpg', '100.00', 'meal');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

DROP TABLE IF EXISTS `purchased`;
CREATE TABLE IF NOT EXISTS `purchased` (
  `email` varchar(200) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` int(10) NOT NULL,
  `purchased_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`email`, `product_id`, `product_name`, `quantity`, `purchased_time`) VALUES
('shubham@gmail.com', 4, 'samosa', 1, '30-08-2020'),
('shubham@gmail.com', 5, 'vada', 1, '30-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`email`, `password`) VALUES
('shubham@gmail.com', 'abcd1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
