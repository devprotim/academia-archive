-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2024 at 01:05 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia-archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'Dev', '1234', 'a@b.com', '2024-04-15 07:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `discipline` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `superviser` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `co_superviser` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `discipline`, `topic`, `superviser`, `co_superviser`, `email`) VALUES
(1, '678hjk', 'Dev Protim ', 'Sikdar', 'Philosophy', 'An Inquiry into Rationality of Scientific Theories', 'Dr. Nirmalya Guha', 'Prof. Prabhat Kumar', 'a@b.com'),
(2, '123dfg', 'Sandeepan', 'Nath', 'Computational Linguistics', 'Headline Parsing of Indian English News Domain.', 'Dr. Ajit Kumar Mishra', '  Dr. Anil Kumar Singh', 'a@b.com'),
(3, 'Et rerum si', 'Samson', 'Malone', 'Quis in assumenda id', 'Asperiores ipsa sin', 'Reprehenderit nisi b', 'Ullam perspiciatis ', 'xypaw@mailinator.com'),
(4, 'Et rerum si', 'Samson', 'Malone', 'Quis in assumenda id', 'Asperiores ipsa sin', 'Reprehenderit nisi b', 'Ullam perspiciatis ', 'xypaw@mailinator.com'),
(5, 'Aut maiores', 'Tana', 'Skinner', 'Repellendus Cupidat', 'Esse in aute duis i', 'In magnam velit eaqu', 'Fugiat eiusmod ulla', 'nirydyz@mailinator.com'),
(6, 'Odio porro ', 'Dakota', 'White', 'Possimus molestias ', 'Sunt et fuga Ex sed', 'Nobis omnis a lorem ', 'Quod tempore dicta ', 'zute@mailinator.com'),
(7, 'Dicta fuga ', 'Robert', 'Solis', 'Atque quia quibusdam', 'Duis laboris volupta', 'Aut qui exercitation', 'Quia consectetur fac', 'hujahono@mailinator.com'),
(8, 'Dicta fuga ', 'Robert', 'Solis', 'Atque quia quibusdam', 'Duis laboris volupta', 'Aut qui exercitation', 'Quia consectetur fac', 'hujahono@mailinator.com'),
(9, 'Dicta fuga ', 'Robert', 'Solis', 'Atque quia quibusdam', 'Duis laboris volupta', 'Aut qui exercitation', 'Quia consectetur fac', 'hujahono@mailinator.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
