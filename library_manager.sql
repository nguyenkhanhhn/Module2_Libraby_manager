-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2019 at 10:07 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_producer` varchar(50) NOT NULL,
  `book_price` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `book_producer`, `book_price`, `category_id`) VALUES
(1, 'One Pice', 'Oda', 'Kim Dong', 15000, 4),
(2, 'Naruto', 'Massashi', 'Kim Dong', 17000, 7),
(3, 'Conan', 'Aoyama', 'Thanh nien', 20000, 5),
(4, 'King of hell', 'Sungjinwo', 'Thanh nien', 25000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `BorrowOrder`
--

CREATE TABLE `BorrowOrder` (
  `borrow_id` int(11) NOT NULL,
  `loan_day` date NOT NULL,
  `pay_day` date NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BorrowOrder`
--

INSERT INTO `BorrowOrder` (`borrow_id`, `loan_day`, `pay_day`, `student_id`) VALUES
(1, '2019-08-01', '2019-08-08', 1),
(2, '2019-08-07', '2019-08-15', 2),
(3, '2019-08-04', '2019-08-06', 3),
(4, '2019-08-20', '2019-08-28', 4),
(5, '2019-08-07', '2019-08-15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`) VALUES
(1, 'romantic'),
(2, 'horror'),
(3, ' detective'),
(4, 'humor'),
(5, ' detective'),
(7, ' action');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `book_id` int(11) DEFAULT NULL,
  `borrow_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`book_id`, `borrow_id`) VALUES
(3, 1),
(4, 2),
(3, 1),
(4, 2),
(2, 3),
(1, 3),
(2, 3),
(1, 3),
(2, 5),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_class` varchar(50) NOT NULL,
  `student_address` varchar(50) NOT NULL,
  `student_bird_day` date NOT NULL,
  `student_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_class`, `student_address`, `student_bird_day`, `student_phone`) VALUES
(1, 'Dam Quang Duc', 'C0619K1', 'Tran Duy Hung', '2019-08-14', 96699696),
(2, 'Tran Van Huy', 'C0619K1', 'Quang Ninh', '2019-08-26', 86868686),
(3, 'Nguyen Quang Hai', 'C0619K1', 'Hai Phong', '2019-08-04', 483741897),
(4, 'Tong Nguyen Khanh', 'C0418k2', 'Ha Noi', '2019-08-18', 66996699),
(5, 'Nguyen Dinh Huy', 'C0312K3', 'Hoa Binh', '2019-08-10', 487236428);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `BorrowOrder`
--
ALTER TABLE `BorrowOrder`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `borrow_id` (`borrow_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `BorrowOrder`
--
ALTER TABLE `BorrowOrder`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`category_id`);

--
-- Constraints for table `BorrowOrder`
--
ALTER TABLE `BorrowOrder`
  ADD CONSTRAINT `BorrowOrder_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`borrow_id`) REFERENCES `BorrowOrder` (`borrow_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
