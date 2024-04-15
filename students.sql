-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 07:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `superviser` varchar(255) NOT NULL,
  `co_superviser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `discipline`, `topic`, `superviser`, `co_superviser`, `email`) VALUES
(1, '678hjk', 'Dev Protim ', 'Sikdar', 'Philosophy', 'An Inquiry into Rationality of Scientific Theories', 'Dr. Nirmalya Guha', 'Prof. Prabhat Kumar', 'a@b.com'),
(2, '123dfg', 'Sandeepan', 'Nath', 'Computational Linguistics', 'Headline Parsing of Indian English News Domain.', 'Dr. Ajit Kumar Mishra', '  Dr. Anil Kumar Singh', 'a@b.com'),
(3, 'Et rerum si', 'Samson', 'Malone', 'Quis in assumenda id', 'Asperiores ipsa sin', 'Reprehenderit nisi b', 'Ullam perspiciatis ', 'xypaw@mailinator.com'),
(4, 'Et rerum si', 'Samson', 'Malone', 'Quis in assumenda id', 'Asperiores ipsa sin', 'Reprehenderit nisi b', 'Ullam perspiciatis ', 'xypaw@mailinator.com'),
(5, 'Aut maiores', 'Tana', 'Skinner', 'Repellendus Cupidat', 'Esse in aute duis i', 'In magnam velit eaqu', 'Fugiat eiusmod ulla', 'nirydyz@mailinator.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
