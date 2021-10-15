-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2014 at 01:46 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_mashup`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image_url` text NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image_url`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'Vehicle Techno', '../../img/book1.jpg', 500, '2014-02-27', '2014-02-27'),
(2, 'Chess Games', '../../img/book2.jpg', 700, '2014-02-27', '2014-02-27'),
(3, 'Weight Training', '../../img/book3.jpg', 400, '2014-02-27', '2014-02-27'),
(4, 'Web Services', '../../img/book4.jpg', 800, '2014-02-27', '2014-02-27'),
(5, 'Computer Science', '../../img/book5.jpg', 600, '2014-02-27', '2014-02-27'),
(6, 'Algorithms', '../../img/book6.jpg', 1000, '2014-02-27', '2014-02-27'),
(7, 'Computer Security', '../../img/book7.jpg', 400, '2014-02-27', '2014-02-27'),
(8, 'Ubuntu Linux', '../../img/book8.jpg', 1500, '2014-02-27', '2014-02-27'),
(9, 'Web Design', '../../img/book9.gif', 500, '2014-02-27', '2014-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `reviews`, `created_at`, `updated_at`) VALUES
(1, 2, 'Wow...what a book...you should be read the book ', '2014-03-01 19:05:22', '0000-00-00 00:00:00'),
(2, 2, 'Chess player should read this book', '2014-03-01 19:08:16', '0000-00-00 00:00:00'),
(3, 2, 'Faltu book', '2014-03-01 19:37:46', '2014-03-01 19:37:46'),
(9, 2, '<iframe src="http://www.w3schools.com"></iframe> cfgdf ghdf', '2014-03-01 19:51:32', '2014-03-01 19:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_contact_no` bigint(20) NOT NULL,
  `student_address` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_email`, `student_gender`, `student_contact_no`, `student_address`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'ram', 'ram@gmail.com', 'Male', 9823626481, 'Dadar', 1, '2014-01-18 15:53:59', '2014-02-06 16:00:37'),
(5, 'Deepak', 'Deepak@gmail.com', 'Male', 9757287591, 'Ulhasnagar', 1, '2014-01-08 20:11:36', '2014-02-06 16:53:07'),
(6, 'Emraan', 'om@gmail.com', 'Male', 9757287591, 'Kalyan', 1, '2014-01-09 17:15:20', '2014-01-09 17:15:20'),
(7, 'Seeta', 'seeta@gmail.com', 'Female', 1234567890, 'Thane', 1, '2014-01-09 17:14:17', '2014-02-01 10:28:46'),
(9, 'Hemraj', 'hema@gmail.com', 'Male', 9823626481, 'badlapur', 1, '2014-01-15 17:40:44', '2014-02-06 16:34:23'),
(25, 'Sandeep', 'deepakaranjekar@gmail.com', 'Male', 99554546465465, 'dfllkjdf', 1, '2014-02-03 19:47:47', '2014-02-03 19:51:04'),
(26, 'Hemraj', 'hemraj4684@yahoo.com', 'Male', 9920518910567, 'badlpaur west', 1, '2014-02-04 17:37:50', '2014-02-05 11:32:16'),
(27, 'dhananjay', 'dhananjay.ganvir@gmail.com', 'Male', 65656, 'ulhasnagar', 1, '2014-02-05 13:44:18', '2014-02-06 16:38:13'),
(28, 'Gokul', 'gokul9685@yahoo.com', 'Male', 9920518910, 'badlapur', 1, '2014-02-26 16:42:36', '2014-02-26 17:02:00'),
(29, 'Hemraj', 'hemraj4684@yahoo.com', 'Male', 3453, 'badlapur', 1, '2014-03-01 17:08:22', '2014-03-01 17:08:22'),
(30, 'Gokul', 'deven404@gmail.com', 'Male', 456521332231, 'ok', 1, '2014-03-01 17:09:09', '2014-03-01 17:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `buy_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `buy_date`) VALUES
(1, 1, 1, '2014-02-27 15:13:13'),
(2, 2, 9, '2014-02-27 15:15:14'),
(3, 1, 7, '2014-03-01 10:33:36'),
(4, 1, 1, '2014-03-01 11:56:30'),
(5, 1, 1, '2014-03-01 18:39:15'),
(6, 1, 8, '2014-03-01 18:40:25'),
(7, 1, 8, '2014-03-01 18:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_contact_no` bigint(20) NOT NULL,
  `user_address` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_contact_no`, `user_address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'renu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 456521332231111, 'mumbai ', 1, '2014-02-26 11:31:47', '2014-02-26 13:28:09'),
(6, 'Sandip Karanjekar', 'sandip@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 57857857, 'fbfvc', 1, '2014-03-17 13:45:13', '2014-03-17 13:45:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
