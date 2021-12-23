-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 11:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_task`
--

CREATE TABLE `add_task` (
  `task_id` int(11) NOT NULL,
  `task_number` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `assign_to` varchar(999) NOT NULL,
  `project` varchar(255) NOT NULL,
  `dua_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pdf_task` varchar(255) NOT NULL,
  `discription_task` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_task`
--

INSERT INTO `add_task` (`task_id`, `task_number`, `task`, `assign_to`, `project`, `dua_date`, `status`, `pdf_task`, `discription_task`) VALUES
(2, '#T-1', 'Website', '13', 'codingClock', '2021-09-23', '0', 'pdf_task/', 'Kumar'),
(5, '#R-2', 'Website', '12', 'codingClock', '2021-09-23', '1', 'pdf_task/dummy.pdf', 'fffffffffffffffffffffffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `all_employee_data`
--

CREATE TABLE `all_employee_data` (
  `employe_id` int(11) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employe_name` varchar(255) NOT NULL,
  `employe_email` varchar(255) NOT NULL,
  `employe_password` varchar(255) NOT NULL,
  `employe_designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_employee_data`
--

INSERT INTO `all_employee_data` (`employe_id`, `employee_number`, `employe_name`, `employe_email`, `employe_password`, `employe_designation`) VALUES
(14, 'EMP-0001', 'Neetesh Kumar', 'neetesh@codinggate.com', 'System39', 'PHP Developer'),
(15, 'EMP-0002', 'Zahid Ali', 'zahid@codinggate.com', 'System39', 'PHP Developer'),
(16, 'EMP-0003', 'Aneel Kumar', 'aneel@codinggate.com', 'System39', 'React-Native Developer'),
(17, 'EMP-0004', ' Talha Hussain', 'talha@codinggate.com', 'System39', 'SEO'),
(18, 'EMP-0005', 'Rizwan', 'rizwan@codinggate.com', 'System39', 'Graphic Desginer'),
(19, 'EMP-0006', 'M. Saqib', 'rafey@codinggate.com', 'System39', 'Intern Wordpress'),
(20, 'EMP-0007', 'Abid', 'abid@codinggate.com', 'System39', 'Junior Graphic Desginer'),
(21, 'EMP-0008', 'Ali Hassan', 'hassan@codinggate.com', 'System39', 'Intern Front-End Developer'),
(22, 'EMP-0009', 'Rafay', 'rafay@codinggate.com', 'System39', 'Intern Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `attendis`
--

CREATE TABLE `attendis` (
  `atten_id` int(11) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employe_name` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_order`
--

CREATE TABLE `comment_order` (
  `comment_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `pro_employee_id` varchar(255) NOT NULL,
  `pro_employee_name` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_pdf` varchar(255) NOT NULL,
  `comment_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_order`
--

INSERT INTO `comment_order` (`comment_id`, `order_number`, `pro_employee_id`, `pro_employee_name`, `date_time`, `comment_pdf`, `comment_order`) VALUES
(6, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:17:45', '', 'dONE PROJECT'),
(7, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:17:45', 'comment_pdf/dummy.pdf', 'ddasds'),
(10, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:17:45', 'comment_pdf/dummy.pdf', 'practies'),
(11, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:17:45', 'comment_pdf/dummy.pdf', 'de3deded'),
(12, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:17:45', 'comment_pdf/dummy.pdf', 'd2d2d2'),
(13, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:17:45', 'comment_pdf/dummy.pdf', 'swswqs'),
(14, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:24:47', 'comment_pdf/dummy.pdf', 'ewwqdwder43r3rwdqsax'),
(20, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 05:10:00', 'comment_pdf/dummy.pdf', 'Date Complete'),
(21, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 06:10:00', 'comment_pdf/dummy.pdf', 'SHagshjDKhslkJL'),
(22, 'ORD-0001', '8', 'Zahid Ali', '2021-10-21 06:30:39', 'comment_pdf/dummy.pdf', 'dwWDdsADSad');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `lead_number` varchar(255) NOT NULL,
  `invoice_amount` varchar(255) NOT NULL,
  `invoice_status` varchar(255) NOT NULL,
  `proof_pdf` varchar(255) NOT NULL,
  `discription_invoice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `lead_number`, `invoice_amount`, `invoice_status`, `proof_pdf`, `discription_invoice`) VALUES
(40, 'INV-0001', 'LD-0001', 'EUR100', '1', 'proof_pdf/dummy.pdf', 'cSGdzf'),
(41, 'INV-0002', 'LD-0002', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(42, 'INV-0003', 'LD-0003', 'EUR1000', '1', 'proof_pdf/LOADER white-8.png', 'dwqdswq'),
(43, 'INV-0004', 'LD-0004', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(44, 'INV-0005', 'LD-0005', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(45, 'INV-0006', 'LD-0006', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(46, 'INV-0007', 'LD-0007', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(47, 'INV-0008', 'LD-0008', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(48, 'INV-0009', 'LD-0009', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(49, 'INV-0010', 'LD-0010', 'EUR1000', 'choose option', 'proof_pdf/', ''),
(50, 'INV-0011', 'LD-0011', 'EUR1000', 'choose option', 'proof_pdf/', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_proof`
--

CREATE TABLE `invoice_proof` (
  `proof_id` int(11) NOT NULL,
  `proof_pdf` varchar(255) NOT NULL,
  `discription_invoice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_proof`
--

INSERT INTO `invoice_proof` (`proof_id`, `proof_pdf`, `discription_invoice`) VALUES
(65, 'proof_pdf/12 (1) (1).pdf', 'ddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `lead_id` int(11) NOT NULL,
  `lead_number` varchar(255) NOT NULL,
  `lead_name` varchar(255) NOT NULL,
  `lead_email` varchar(255) NOT NULL,
  `lead_mobile` varchar(20) NOT NULL,
  `lead_website` varchar(255) NOT NULL,
  `lead_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`lead_id`, `lead_number`, `lead_name`, `lead_email`, `lead_mobile`, `lead_website`, `lead_comment`) VALUES
(23, 'LD-0001', 'customer', 'customer@customer.com', '12345678', 'http://www.codindClock.com', 'asdfghjkl'),
(24, 'LD-0002', 'cutomer1', 'customer1@customer.com', '123456783456', 'https://www.google.com/', 'gxuiahudxYoiuUSpoiiapoks'),
(25, 'LD-0003', 'cutomer2', 'customer2@customer.com', '123456789023', 'https://www.google.com/', 'egfadsfdss'),
(26, 'LD-0004', 'cutomer3', 'customer3@customer.com', '1234567890', 'https://www.google.com/', 'wetrdyuytres'),
(27, 'LD-0005', 'cutomer4', 'customer4@customer.com', '123456789', 'https://www.google.com/', 'fegfdssfdsfds'),
(28, 'LD-0006', 'cutomer5', 'customer5@customer.com', '123456789', 'https://www.google.com/', 'ewrtyuyhtgf'),
(29, 'LD-0007', 'cutomer6', 'customer6@customer.com', '1234567890', 'https://www.google.com/', 'rtyuuiysdfhg'),
(30, 'LD-0008', 'cutomer7', 'customer7@customer.com', '1234567890', 'https://www.google.com/', 'frtyuioiuyh'),
(31, 'LD-0009', 'cutomer8', 'customer8@customer.com', '1234567890', 'https://www.google.com/', 'fdwefdwd'),
(32, 'LD-0010', 'cutomer9', 'customer9@customer.com', '1234567890', 'https://www.google.com/', 'asdfghjkliuhyf'),
(33, 'LD-0011', 'cutomer10', 'customer10@customer.com', '123456789', 'https://www.google.com/', 'dwdwqd');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_email` varchar(255) NOT NULL,
  `pro_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`pro_id`, `pro_name`, `pro_email`, `pro_password`) VALUES
(1, 'Production', 'production@pro.com', 'production');

-- --------------------------------------------------------

--
-- Table structure for table `production_comment`
--

CREATE TABLE `production_comment` (
  `pro_comment_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_comment_pdf` varchar(255) NOT NULL,
  `pro_comment_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_comment`
--

INSERT INTO `production_comment` (`pro_comment_id`, `order_number`, `pro_id`, `pro_name`, `date_time`, `pro_comment_pdf`, `pro_comment_order`) VALUES
(1, 'ORD-0001', '1', 'Production', '2021-10-21 05:52:12', 'pro_comment_pdf/dummy.pdf', 'Production comment'),
(2, 'ORD-0001', '1', 'Production', '2021-10-21 05:52:12', 'pro_comment_pdf/', 'dddsacda'),
(3, 'ORD-0001', '1', 'Production', '2021-10-21 05:10:00', 'pro_comment_pdf/dummy.pdf', 'Production comment');

-- --------------------------------------------------------

--
-- Table structure for table `production_employee`
--

CREATE TABLE `production_employee` (
  `pro_employee_id` int(11) NOT NULL,
  `pro_employee_name` varchar(255) NOT NULL,
  `pro_employee_email` varchar(255) NOT NULL,
  `pro_employee_password` varchar(255) NOT NULL,
  `pro_employee_department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_employee`
--

INSERT INTO `production_employee` (`pro_employee_id`, `pro_employee_name`, `pro_employee_email`, `pro_employee_password`, `pro_employee_department`) VALUES
(8, 'Zahid Ali', 'zahid@zahid.com', 'zahid', 'Maths'),
(12, 'Hamza', 'hamza@pro.com', 'hamza', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_name` varchar(255) NOT NULL,
  `sales_email` varchar(255) NOT NULL,
  `sales_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_name`, `sales_email`, `sales_password`) VALUES
(13, 'Sale', 'sales@sales.com', 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `sales_comment`
--

CREATE TABLE `sales_comment` (
  `sales_comment_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `sales_id` varchar(255) NOT NULL,
  `sales_name` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sales_comment_pdf` varchar(255) NOT NULL,
  `sales_comment_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_comment`
--

INSERT INTO `sales_comment` (`sales_comment_id`, `order_number`, `sales_id`, `sales_name`, `date_time`, `sales_comment_pdf`, `sales_comment_order`) VALUES
(1, 'ORD-0001', '13', 'Sale', '2021-10-21 06:01:00', 'sales_comment_pdf/dummy.pdf', 'Sales Comment'),
(2, 'ORD-0001', '13', 'Sale', '2021-10-21 06:10:00', 'sales_comment_pdf/dummy.pdf', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `lead_number` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `sales_person` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `invoice_status` varchar(255) NOT NULL,
  `assign_to` varchar(999) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sale_startdate` date NOT NULL,
  `sale_enddate` date NOT NULL,
  `pdf_order` varchar(255) NOT NULL,
  `discription_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`order_id`, `order_number`, `lead_number`, `invoice_number`, `sales_person`, `course_name`, `invoice_status`, `assign_to`, `link`, `sale_startdate`, `sale_enddate`, `pdf_order`, `discription_order`) VALUES
(20, 'ORD-0001', 'LD-0001', 'INV-0001', 'Sale', 'PHP CORE', '1', '8', 'http://google.com', '2021-10-06', '2021-10-08', 'pdf_order/dummy.pdf', 'SasS'),
(21, 'ORD-0002', 'LD-0003', 'INV-0003', 'Sale', 'Maths', '2', '8', 'http://www.google.com', '2021-09-29', '2021-11-04', 'pdf_order/', '');

-- --------------------------------------------------------

--
-- Table structure for table `send_order`
--

CREATE TABLE `send_order` (
  `send_order_id` int(11) NOT NULL,
  `send_employee_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send_order`
--

INSERT INTO `send_order` (`send_order_id`, `send_employee_id`, `order_id`) VALUES
(6, 8, 7),
(7, 8, 7),
(8, 0, 7),
(9, 8, 11),
(10, 8, 7),
(11, 0, 15),
(12, 8, 15),
(13, 8, 16),
(14, 8, 16),
(15, 8, 18),
(16, 10, 18),
(17, 8, 16),
(18, 8, 18),
(19, 8, 20),
(20, 8, 21);

-- --------------------------------------------------------

--
-- Table structure for table `send_task`
--

CREATE TABLE `send_task` (
  `send_task_id` int(11) NOT NULL,
  `send_employee_id` varchar(255) NOT NULL,
  `task_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send_task`
--

INSERT INTO `send_task` (`send_task_id`, `send_employee_id`, `task_id`) VALUES
(6, '6', '2'),
(7, '9', '5'),
(8, '12', '5'),
(9, '12', '5'),
(10, '13', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_task`
--
ALTER TABLE `add_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_employee_data`
--
ALTER TABLE `all_employee_data`
  ADD PRIMARY KEY (`employe_id`);

--
-- Indexes for table `attendis`
--
ALTER TABLE `attendis`
  ADD PRIMARY KEY (`atten_id`);

--
-- Indexes for table `comment_order`
--
ALTER TABLE `comment_order`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_proof`
--
ALTER TABLE `invoice_proof`
  ADD PRIMARY KEY (`proof_id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `production_comment`
--
ALTER TABLE `production_comment`
  ADD PRIMARY KEY (`pro_comment_id`);

--
-- Indexes for table `production_employee`
--
ALTER TABLE `production_employee`
  ADD PRIMARY KEY (`pro_employee_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_comment`
--
ALTER TABLE `sales_comment`
  ADD PRIMARY KEY (`sales_comment_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `send_order`
--
ALTER TABLE `send_order`
  ADD PRIMARY KEY (`send_order_id`);

--
-- Indexes for table `send_task`
--
ALTER TABLE `send_task`
  ADD PRIMARY KEY (`send_task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_task`
--
ALTER TABLE `add_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_employee_data`
--
ALTER TABLE `all_employee_data`
  MODIFY `employe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `attendis`
--
ALTER TABLE `attendis`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `comment_order`
--
ALTER TABLE `comment_order`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `invoice_proof`
--
ALTER TABLE `invoice_proof`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `production_comment`
--
ALTER TABLE `production_comment`
  MODIFY `pro_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production_employee`
--
ALTER TABLE `production_employee`
  MODIFY `pro_employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales_comment`
--
ALTER TABLE `sales_comment`
  MODIFY `sales_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `send_order`
--
ALTER TABLE `send_order`
  MODIFY `send_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `send_task`
--
ALTER TABLE `send_task`
  MODIFY `send_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
