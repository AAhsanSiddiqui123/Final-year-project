-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 11:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalyearpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_name` varchar(255) NOT NULL,
  `generation` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `copy_right` varchar(255) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `edition_pages` varchar(100) NOT NULL,
  `ISBN` int(255) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_name`, `generation`, `price`, `author`, `copy_right`, `publisher`, `edition_pages`, `ISBN`, `department`) VALUES
('Urdu', 'second', 100, 'Hassan', 'CopyRight 2017', 'Azeem', '11', 11, 'CS'),
('Social Study', 'second', 100, 'Abdul', 'CopyRight 2017', 'Azeem', '10', 21, 'CS'),
('Networking', 'second', 1000, 'Khalid', 'CopyRight 2017', 'Khalid', '13', 22, 'CS'),
('AI', 'second', 100, 'Tayyab', 'CopyRight 2017', 'Azeem', '12', 45, 'CS'),
('math', 'second', 200, 'Ahsan', 'CopyRight 2017', 'Azeem', '11', 123, 'CS'),
('Pak Study', 'second', 100, 'ahsan', 'CopyRight 2017', 'Azeem', '10', 321, 'CS'),
('Software Engineering', 'second', 100, 'Bilal', 'CopyRight 2017', 'Khalid', '11', 467, 'ME'),
('Database', 'second', 100, 'Asad', 'CopyRight 2017', 'Azeem', '10', 678, 'CS'),
('physcis', 'second', 200, 'Hassan', 'CopyRight 2017', 'Azeem', '10', 1234, 'CS'),
('Automata', 'second', 100, 'ahsan', 'CopyRight 2017', 'Azeem', '13', 4321, 'CS'),
('English', 'second', 200, 'Wahab', 'CopyRight 2017', 'Azeem', '12', 7171, 'ME'),
('Chemistry', 'second', 100, 'Wahab', 'CopyRight 2017', 'Azeem', '13', 12345, 'CS'),
('Bio', 'second', 100, 'Ahsan', 'CopyRight 2017', 'Azeem', '20', 123456, 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `issued_book`
--

CREATE TABLE `issued_book` (
  `id` int(11) NOT NULL,
  `Student_name` varchar(255) NOT NULL,
  `roll_No` int(100) NOT NULL,
  `days` int(50) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_isbn` int(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `due_Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issued_book`
--

INSERT INTO `issued_book` (`id`, `Student_name`, `roll_No`, `days`, `book_name`, `book_isbn`, `date`, `due_Date`) VALUES
(19, 'Ahsan', 1, 2, 'Networking', 22, '2021-10-25', '2021-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `lib_name` varchar(255) NOT NULL,
  `lib_email` varchar(255) NOT NULL,
  `lib_phone` varchar(100) NOT NULL,
  `lib_address` varchar(255) NOT NULL,
  `lib_password` varchar(255) NOT NULL,
  `lib_cPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`lib_name`, `lib_email`, `lib_phone`, `lib_address`, `lib_password`, `lib_cPassword`) VALUES
('admin', 'asiddiqiu@gmail.com', '0', 'House No 16 Street No 29 National Town', 'admin', 'admin'),
('Ahsan', 'Ahsan@gmail.com', '03200761865', 'House No 66 Street No 27 National Town', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Studen_name` text NOT NULL,
  `roll_No` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_No` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Studen_name`, `roll_No`, `email`, `phone_No`, `address`) VALUES
('Ahsan', 1, 'Ahsan@gmail.com', '03200431811', 'House No 67 Street No 88 National Town'),
('Rizwan', 2, 'Rizwan@gmail.com', '03200431813', 'House No 56 Street No 89 National Town'),
('Hamza', 3, 'asiddiqiu@gmail.com', '03200561805', 'House No 24 Street No 287 National Town'),
('Babr', 4, 'asiddiqiu@gmail.com', '0320065114', 'House No 76 Street No 89 National Town'),
('abdulwahab', 5, 'abdulwahabsiddiqui@gmail.com', '2147483647', 'House No 16 Street No 29 National Town'),
('Ahsan', 7, 'asiddiqiu@gmail.com', '320043189', 'House No 18 Street No 6 National Town');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`lib_phone`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issued_book`
--
ALTER TABLE `issued_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
