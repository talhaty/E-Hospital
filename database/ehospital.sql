-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 02, 2022 at 07:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `question` varchar(50) NOT NULL,
  `qans` varchar(35) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fname`, `lname`, `sex`, `question`, `qans`, `rollno`, `contact`, `email`, `image`) VALUES
(1, 'talha', '12345', 'Talha', 'Yunus', 'Male', 'My favorite animal ?', 'cat', '2020497', '03338543815', 'talhayounas0348@gmail.com', 'ty.jpg'),
(2, 'rajab', '12345', 'Rajab', 'Ali', 'Male', 'abc', 'abc', '21313', '14324325435', 'rajab@google.com', 'rajab.jpg'),
(3, 'hamza', '12345', 'hamza', 'sattar', 'Male', 'abc', 'abc', '123124', '12432543534', 'hamza@gmail.com', 'hamza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_request`
--

CREATE TABLE `admin_request` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `edu_qulification` text NOT NULL,
  `reason` text NOT NULL,
  `city` varchar(40) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_request`
--

INSERT INTO `admin_request` (`id`, `name`, `father`, `sex`, `dob`, `edu_qulification`, `reason`, `city`, `contact`, `email`, `image`) VALUES
(5002, 'Talha Yunus', 'abc', 'Male', '2004-01-16', 'BS CS', 'DREAM', 'Abbottabad', '+923338543815', 'talhayounas0348@gmail.com', '1105143.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mstatus` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `bgroup` varchar(5) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `disease` varchar(50) NOT NULL,
  `consultant` varchar(25) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `ward_no` int(11) NOT NULL,
  `admit_date` date NOT NULL,
  `discharge_date` date NOT NULL,
  `city` varchar(35) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `mname`, `fname`, `mstatus`, `dob`, `age`, `sex`, `bgroup`, `occupation`, `disease`, `consultant`, `bed_no`, `ward_no`, `admit_date`, `discharge_date`, `city`, `contact_no`, `image`) VALUES
(1013, 'abc', 'abc', 'abc', 'Married', '2001-02-12', 22, 'Male', 'A+', 'abc', 'Skin Cancer', 'Talha Yunus', 1, 1, '2022-05-30', '0000-00-00', 'Abbottabad', '+923338543815', '944172.png'),
(1014, 'abc', 'abc', 'abc', 'Married', '2000-12-31', 23, 'Male', 'O+', 'abc', 'Headache', 'Talha Yunus', 2, 3, '2022-05-31', '0000-00-00', 'abc', 'abc', '153243.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mstatus` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bgroup` varchar(5) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `disease` varchar(35) NOT NULL,
  `consultant` varchar(30) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `ward_no` int(11) NOT NULL,
  `admit_date` date NOT NULL,
  `discharge_date` date NOT NULL,
  `city` varchar(30) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `current_status` varchar(25) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`id`, `name`, `mname`, `fname`, `mstatus`, `dob`, `age`, `sex`, `bgroup`, `occupation`, `disease`, `consultant`, `bed_no`, `ward_no`, `admit_date`, `discharge_date`, `city`, `contact_no`, `current_status`, `image`) VALUES
(1013, 'abc', 'abc', 'abc', 'Married', '2001-02-12', 22, 'Male', 'A+', 'abc', 'Skin Cancer', 'Talha Yunus', 1, 1, '2022-05-30', '0000-00-00', 'Abbottabad', '+923338543815', 'Admitted', '944172.png'),
(1014, 'abc', 'abc', 'abc', 'Married', '2000-12-31', 23, 'Male', 'O+', 'abc', 'Headache', 'Talha Yunus', 2, 3, '2022-05-31', '0000-00-00', 'abc', 'abc', 'Admitted', '153243.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mother` varchar(30) NOT NULL,
  `father` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `mstatus` varchar(20) NOT NULL,
  `bgroup` varchar(7) NOT NULL,
  `qualification` text NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `hname` text NOT NULL,
  `exp` int(11) NOT NULL,
  `achievement` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`id`, `name`, `mother`, `father`, `dob`, `age`, `sex`, `mstatus`, `bgroup`, `qualification`, `specialization`, `hname`, `exp`, `achievement`, `city`, `contact`, `phone`, `email`, `image`) VALUES
(2004, 'Talha Yunus', 'abc', 'abc', '2002-06-19', 20, 'Male', 'Single', 'O+', 'MBBS', 'Neurosurgeon', 'none', 0, 'none', 'Abbottabad', '+923338543815', '+923338543815', 'talhayounas0348@gmail.com', '900563.png'),
(2005, 'Rajab Ali', 'abc', 'abc', '2000-12-31', 23, 'Male', 'Single', 'B-', 'abc', 'Cardiologist', 'abc', 2, 'abc', 'abc', 'abc', 'abc', 'abc@gmail.com', 'wallpaperflare.com_wallpaper (165).jpg'),
(2006, 'Hamza Sattar', 'abc', 'abc', '2000-03-04', 23, 'Male', 'Single', 'B+', 'abc', 'Plastic Surgeon', 'abc', 3, 'abc', 'abc', 'abc', 'abc', 'abc@gmail.com', '714548.png');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mother` varchar(25) NOT NULL,
  `father` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `mstatus` varchar(20) NOT NULL,
  `bgroup` varchar(5) NOT NULL,
  `qualification` text NOT NULL,
  `hname` varchar(50) NOT NULL,
  `exp` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `ward_no` int(11) NOT NULL,
  `city` varchar(25) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `mother`, `father`, `dob`, `age`, `sex`, `mstatus`, `bgroup`, `qualification`, `hname`, `exp`, `designation`, `ward_no`, `city`, `contact`, `phone`, `email`, `image`) VALUES
(3005, 'abc', 'abc', 'abc', '1980-02-12', 42, 'Male', 'Married', 'O+', 'abc', 'abc', 2, 'Sweaper', 2, 'abc', 'abc', 'abc', 'abc@gmail.com', 'wallpaperflare.com_wallpaper (27).jpg'),
(3006, 'abc', 'abc', 'abc', '2000-12-31', 22, 'Female', 'Married', 'B+', 'abc', 'abc', 2, 'Nurse', 2, 'abc', 'abc', 'abc', 'abc@gmail.com', 'wallpaperflare.com_wallpaper (14).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_request`
--
ALTER TABLE `admin_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_request`
--
ALTER TABLE `admin_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5003;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `physician`
--
ALTER TABLE `physician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
