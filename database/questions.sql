-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 06:02 AM
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
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `answer_a` varchar(255) NOT NULL,
  `answer_b` varchar(255) NOT NULL,
  `answer_c` varchar(255) NOT NULL,
  `answer_d` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`) VALUES
(1, 'What does HTML stand for?', 'Hyper Text Markup Language', 'Hot Mail', 'How to Make Lasagna', 'Home Tool Markup Language', 'A'),
(3, 'What does CSS stand for?', 'Creative Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'Colorful Style Sheets', 'B'),
(4, 'Which property is used to change the background color?', 'color', 'background-color', 'bgcolor', 'background', 'B'),
(5, 'What does PHP stand for?', 'Personal Hypertext Processor', 'Private Home Page', 'PHP: Hypertext Preprocessor', 'Public Hypertext Processor', 'C'),
(6, 'Which symbol is used to declare a variable in PHP?', '!', '$', '&', '#', 'B'),
(7, 'Which function is used to connect to a MySQL database in PHP?', 'mysqli_connect()', 'mysql_connect()', 'db_connect()', 'connect()', 'A'),
(8, 'Which MySQLi function is used to execute an SQL query?', 'mysqli_execute()', 'mysqli_query()', 'execute_query()', 'db_query()', 'B'),
(9, 'Which function is used to load a model in CodeIgniter?', '$this->load->model()', '$this->load_model()', 'load->model()', 'load_model()', 'A'),
(10, 'Which directory contains the controllers in a CodeIgniter application?', 'models', 'controllers', 'views', 'libraries', 'B'),
(11, 'What does SQL stand for?', 'Structured Query Language', 'Standard Query Language', 'Simple Query Language', 'Sequential Query Language', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
