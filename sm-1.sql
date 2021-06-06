-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 02:50 PM
-- Server version: 5.5.62
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `contact` double DEFAULT NULL,
  `f_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c1` (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `address`, `email`, `contact`, `f_id`) VALUES
('CTM00001', 'mahesh', 'male', 'hasana', 'mahesh@gmail.com', 9654824576, 'RV002'),
('CTM00012', 'aishani', 'female', 'manglore', 'aishani@gmail.com', 9654824001, 'RV002'),
('CTM00014', 'vijay', 'male', 'banglore', 'vijay@gmail.com', 9654821791, 'RV003'),
('CTM00015', 'shreya goshal', 'female', 'jaipur', 'shreya@gmail.com', 9654828120, 'RV004'),
('CTM00019', 'rakesh', 'male', 'kundgol', 'rakesh@gmail.com', 9654897776, 'RV005'),
('CTM00037', 'manoj', 'male', 'hanuman nagar', 'manoj@gmail.com', 965489846, 'RV006'),
('CTM00039', 'jayesh', 'male', 'hubli', 'jayesh@gmail.com', 9654822638, 'RV001');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dnumber` int(11) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `mgssn` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`dnumber`),
  KEY `mgssn` (`mgssn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dnumber`, `dname`, `mgssn`) VALUES
(1, 'Grocery', NULL),
(2, 'Men Fashion', NULL),
(3, 'Dining & Serving', NULL),
(4, 'Electronics', NULL),
(5, 'Footwear', NULL),
(6, 'Watches', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ssn` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dno` int(11) NOT NULL DEFAULT '1',
  `pass` varchar(20) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `contact` double DEFAULT NULL,
  `position` varchar(30) NOT NULL,
  PRIMARY KEY (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ssn`, `name`, `address`, `email`, `dob`, `age`, `dno`, `pass`, `salary`, `contact`, `position`) VALUES
('101', 'harish', 'banglore', 'nharish615@gmail.com', '06/08/1999', 20, 1, 'harish123', '65000.00', 9876543265, 'employee'),
('102', 'manoj', 'banglore', 'manoj@gmail.com', '01/01/2000', 19, 1, 'manoj123', '50000.00', 3654216312, 'employee'),
('103', 'girish', 'banglore', 'girrish@gmail.com', '07/08/1999', 20, 1, 'girish123', '45000.00', 876543267, 'employee'),
('mgrssn', 'ISHWAR', 'banglore', 'ishwar@gmail.com', '01/01/2000', 20, 1, 'ish123', '65555.00', 9876432987, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `empssn`
--

CREATE TABLE IF NOT EXISTS `empssn` (
  `ssn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empssn`
--

INSERT INTO `empssn` (`ssn`) VALUES
('101');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` varchar(15) NOT NULL,
  `text` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `text`, `rating`) VALUES
('RV001', 'Pears has expired', 2),
('RV002', 'Quality is not good', 3),
('RV003', 'vegetable is bad', 2),
('RV004', 'Sony speakers is fake', 1),
('RV005', 'Nice shoes!', 4),
('RV006', 'good mobile with less cost', 4);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` varchar(15) NOT NULL,
  `cust_id` varchar(15) NOT NULL,
  `amount` float NOT NULL,
  `inv_date` date DEFAULT NULL,
  `payment_mode_id` varchar(6) NOT NULL,
  `cashier_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `i1` (`payment_mode_id`),
  KEY `i2` (`cashier_id`),
  KEY `i3` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `percentage` int(11) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `type`, `percentage`, `sdate`, `edate`) VALUES
('CASH10', 'Cash payment offer', 10, '2018-01-01', '2019-03-31'),
('CREDIT5', 'Credit card offer', 5, '2018-01-01', '2019-03-31'),
('DEBIT5', 'Debit card offer', 5, '2018-01-01', '2019-04-30'),
('KHUSIWALIDIWALI', 'Diwali offer', 15, '2018-10-01', '2019-10-20'),
('OFF10', 'Discount', 10, '2018-01-01', '2019-03-31'),
('PAYTM8', 'Paytm offer', 8, '2018-01-01', '2019-04-30'),
('RANGBHARIHOLI', 'Holi offer', 15, '2019-03-01', '2019-03-20'),
('SUMMER25', 'Summer offer', 25, '2018-03-05', '2018-05-28'),
('SUMMER5', 'Summer offer', 5, '2018-03-01', '2018-06-28'),
('WINTER20', 'Winter offer', 20, '2018-11-01', '2019-07-28'),
('WINTER5', 'Winter offer', 5, '2018-11-01', '2019-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` varchar(15) NOT NULL,
  `mode_of` varchar(20) NOT NULL,
  `off_id` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p1` (`off_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `mode_of`, `off_id`) VALUES
('PAY001', 'Cash', 'CASH10'),
('PAY003', 'Debit card', 'DEBIT5'),
('PAY004', 'Paytm', 'PAYTM8');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` varchar(15) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `cprice` double DEFAULT NULL,
  `sprice` double DEFAULT NULL,
  `sec_id` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sec_id` (`sec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cprice`, `sprice`, `sec_id`) VALUES
('103', 'pen', 4, 10, 'GR001'),
('f1', 'food', 200, 200, 'GR001'),
('f2', 'chiken', 140, 150, 'GR001');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` varchar(15) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `dno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dno` (`dno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `dno`) VALUES
('DN001', 'Soaps & Detergents', 3),
('DN002', 'Coffee, Tea & Beverages', 3),
('DN003', 'Fragrances', 3),
('ELC001', 'Smartphones', 4),
('ELC002', 'Tablets', 4),
('ELC003', 'Laptop', 4),
('ELC004', 'LED Television', 4),
('ELC005', 'Speaker , Woofer & MP3 player', 4),
('FW001', 'Men Footwear', 5),
('FW002', 'Women Footwear', 5),
('FW003', 'Kids Footwear', 6),
('GR001', 'Fruits & Vegetables', 1),
('GR002', 'Spices', 1),
('GR003', 'Dry Fruits', 1),
('GR004', 'Oils', 1),
('GR005', 'Rice & Pulses', 1),
('MF001', 'Men Shirts', 2),
('MF002', 'Men Trousers', 2),
('MF003', 'Men Innerwear', 2),
('WAT001', 'Men Watches', 6),
('WAT002', 'Women Watches', 6),
('WAT003', 'Kids Watches', 6);

-- --------------------------------------------------------

--
-- Table structure for table `update_pro`
--

CREATE TABLE IF NOT EXISTS `update_pro` (
  `name` varchar(30) NOT NULL,
  `sprice` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_pro`
--

INSERT INTO `update_pro` (`name`, `sprice`) VALUES
('pen', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `c1` FOREIGN KEY (`f_id`) REFERENCES `feedback` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`mgssn`) REFERENCES `employee` (`ssn`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `i1` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `i2` FOREIGN KEY (`cashier_id`) REFERENCES `employee` (`ssn`) ON DELETE CASCADE,
  ADD CONSTRAINT `i3` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `p1` FOREIGN KEY (`off_id`) REFERENCES `offers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sec_id`) REFERENCES `section` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`dno`) REFERENCES `department` (`dnumber`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
