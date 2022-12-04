-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 06:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_contact`
--

CREATE TABLE `add_contact` (
  `contact_id` int(255) NOT NULL,
  `contact_uniqid` int(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_contact`
--

INSERT INTO `add_contact` (`contact_id`, `contact_uniqid`, `contact_no`) VALUES
(2, 243633, '9724073520'),
(3, 243633, '9724073520');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `reciver_id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_id`, `reciver_id`, `message`, `Date`, `Time`) VALUES
(43, 816165, 243633, 'husain', '11-11-2021', ' 05:19 PM'),
(45, 816165, 243633, '0', '11-11-2021', ' 05:22 PM'),
(46, 816165, 243633, 's', '11-11-2021', ' 05:23 PM'),
(44, 816165, 243633, 'abbas', '11-11-2021', ' 05:21 PM'),
(16, 816165, 353340, 'helo', '06-11-2021', ' 05:13 PM'),
(15, 816165, 243633, 'hello', '06-11-2021', ' 04:50 PM'),
(14, 816165, 353340, 'abbas', '06-11-2021', ' 12:00 PM'),
(13, 353340, 816165, 'husain', '06-11-2021', ' 12:00 PM'),
(10, 353340, 816165, 'nhi bhai aaj milte he', '06-11-2021', ' 11:41 AM'),
(11, 353340, 816165, 'haa aajao', '06-11-2021', ' 11:42 AM'),
(12, 816165, 353340, 'kal', '06-11-2021', ' 11:42 AM'),
(17, 816165, 353340, 'hello', '06-11-2021', ' 05:15 PM'),
(18, 816165, 353340, 'I am very excited about the I always thought you might have some fun with your company and I will send it out here and I will be a great 👍👍 I have some fun I have some fun I will send the money to pay a great day ahead with this mail your account we I hav', '06-11-2021', ' 05:21 PM'),
(19, 816165, 353340, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste repellat voluptatum hic esse corrupti dolorum assumenda rerum ipsa culpa. Omnis, illum pariatur? Possimus ducimus architecto modi nulla dignissimos voluptas incidunt porro? Quod molestiae dolo', '06-11-2021', ' 05:37 PM'),
(20, 816165, 353340, 'nhi', '07-11-2021', ' 07:02 PM'),
(22, 816165, 243633, 'hello', '06-11-2021', ' 07:15 PM'),
(23, 816165, 243633, 'baba', '06-11-2021', ' 07:15 PM'),
(24, 816165, 243633, 'abbas ', '07-11-2021', ' 05:05 PM'),
(25, 816165, 697398, 'abbas ali', '07-11-2021', ' 07:41 PM'),
(26, 816165, 243633, 'hello', '07-11-2021', ' 07:42 PM'),
(27, 816165, 697398, 'nara', '07-11-2021', ' 07:42 PM'),
(28, 816165, 697398, 'husain', '07-11-2021', ' 07:42 PM'),
(29, 697398, 816165, 'maherban', '07-11-2021', ' 07:42 PM'),
(30, 816165, 353340, 'hiabu', '09-11-2021', ' 09:56 AM'),
(47, 816165, 243633, 'nhi yaar', '11-11-2021', ' 05:23 PM'),
(48, 816165, 697398, 'hii brp', '11-11-2021', ' 05:48 PM'),
(49, 816165, 243633, 'abbas', '01-12-2021', ' 02:26 PM'),
(50, 816165, 0, '', '01-12-2021', ' 02:29 PM'),
(31, 816165, 353340, ' Mahammad husainLogout Search Contacts...  Abbas Ali Last seen today at 9:00 PM  Kasam Ali Last seen today at 9:00 PM  Kazim Ali Last seen today at 9:00 PM  Maherban Ali Last seen today at 9:00 PM  Add-Contact  Setting  Kasam Ali Last seen today at 7:48 A', '09-11-2021', ' 09:56 AM'),
(32, 816165, 353340, 'wwqewqe', '09-11-2021', ' 09:56 AM'),
(33, 816165, 353340, 'esrrdtfytfy', '09-11-2021', ' 09:56 AM'),
(34, 816165, 697398, 'Nhi', '10-11-2021', ' 08:56 AM'),
(35, 816165, 697398, 'yaaar', '10-11-2021', ' 08:56 AM'),
(36, 816165, 353340, 'husain', '10-11-2021', ' 10:36 AM'),
(37, 697398, 816165, 'Babba', '10-11-2021', ' 10:38 AM'),
(38, 697398, 816165, 'abbs', '10-11-2021', ' 10:39 AM'),
(39, 697398, 816165, 'mobile', '10-11-2021', ' 10:39 AM'),
(40, 816165, 243633, '.....', '11-11-2021', ' 12:55 PM'),
(41, 816165, 353340, 'nhi yaar', '', ' 01:22 PM'),
(42, 816165, 353340, 'naa', '', ' 01:23 PM'),
(51, 816165, 0, '', '01-12-2021', ' 02:29 PM'),
(52, 816165, 0, '', '01-12-2021', ' 02:29 PM'),
(53, 816165, 0, '', '01-12-2021', ' 02:30 PM'),
(54, 816165, 0, '', '01-12-2021', ' 02:30 PM'),
(55, 816165, 0, '', '01-12-2021', ' 02:31 PM'),
(56, 816165, 0, '', '01-12-2021', ' 02:31 PM'),
(57, 816165, 0, '', '01-12-2021', ' 02:31 PM'),
(58, 816165, 0, '', '01-12-2021', ' 02:31 PM'),
(59, 816165, 0, '', '01-12-2021', ' 02:31 PM'),
(60, 816165, 0, '', '01-12-2021', ' 02:31 PM'),
(61, 816165, 0, '', '01-12-2021', ' 02:33 PM'),
(62, 816165, 353340, 'abbas', '01-12-2021', ' 02:34 PM'),
(63, 816165, 0, '', '01-12-2021', ' 02:35 PM'),
(64, 816165, 0, '', '01-12-2021', ' 02:36 PM'),
(65, 816165, 0, '', '01-12-2021', ' 02:36 PM'),
(66, 816165, 0, '', '01-12-2021', ' 02:36 PM'),
(67, 816165, 0, '', '01-12-2021', ' 02:36 PM'),
(68, 816165, 0, '', '01-12-2021', ' 02:37 PM'),
(69, 816165, 0, '', '01-12-2021', ' 02:37 PM'),
(70, 816165, 0, '', '01-12-2021', ' 02:37 PM'),
(71, 816165, 0, '', '01-12-2021', ' 02:37 PM'),
(72, 816165, 0, '', '01-12-2021', ' 02:38 PM'),
(73, 816165, 243633, 'husain baba', '01-12-2021', ' 02:38 PM'),
(74, 816165, 0, '', '01-12-2021', ' 02:38 PM'),
(75, 816165, 243633, 'hekl', '01-12-2021', ' 02:41 PM'),
(76, 816165, 243633, 'hja', '01-12-2021', ' 03:13 PM'),
(77, 816165, 243633, 'hhj', '01-12-2021', ' 03:16 PM'),
(78, 243633, 816165, 'okay', '01-12-2021', ' 03:30 PM'),
(79, 243633, 816165, 'ok', '01-12-2021', ' 03:30 PM'),
(80, 816165, 243633, ' ', '01-12-2021', ' 05:02 PM'),
(81, 816165, 353340, 'hhha', '01-12-2021', ' 05:36 PM'),
(82, 816165, 0, '', '01-12-2021', ' 05:36 PM'),
(83, 816165, 0, '', '01-12-2021', ' 05:37 PM'),
(84, 816165, 0, '', '01-12-2021', ' 05:38 PM'),
(85, 816165, 0, '', '01-12-2021', ' 05:38 PM'),
(86, 816165, 353340, 'abbas ali ', '01-12-2021', ' 05:41 PM'),
(87, 816165, 0, '', '01-12-2021', ' 05:41 PM'),
(88, 816165, 0, '', '01-12-2021', ' 05:41 PM'),
(89, 816165, 0, '', '01-12-2021', ' 05:43 PM'),
(90, 816165, 243633, 'hello', '17-12-2021', ' 07:44 PM'),
(91, 816165, 243633, 'h', '17-12-2021', ' 07:52 PM'),
(92, 816165, 243633, 'hello', '17-12-2021', ' 07:53 PM'),
(93, 816165, 243633, 'ali', '17-12-2021', ' 07:53 PM'),
(94, 816165, 243633, 'he;lo', '17-12-2021', ' 07:54 PM'),
(95, 816165, 243633, 'get', '17-12-2021', ' 07:54 PM'),
(96, 816165, 697398, 'nhi', '17-12-2021', ' 07:55 PM'),
(97, 816165, 243633, 'hello', '17-12-2021', ' 08:02 PM'),
(98, 816165, 243633, 'hello', '17-12-2021', ' 08:03 PM'),
(99, 816165, 243633, 'he;;o', '17-12-2021', ' 08:04 PM'),
(100, 816165, 243633, 'abba', '17-12-2021', ' 08:04 PM'),
(101, 816165, 243633, 'abbas', '17-12-2021', ' 08:04 PM'),
(102, 816165, 243633, 'kazim', '17-12-2021', ' 08:04 PM'),
(103, 816165, 243633, 'nhi', '17-12-2021', ' 08:04 PM'),
(104, 816165, 243633, 'ab', '17-12-2021', ' 08:07 PM'),
(105, 816165, 243633, 'ba', '17-12-2021', ' 08:07 PM'),
(106, 816165, 243633, 'abbas', '17-12-2021', ' 08:08 PM'),
(107, 816165, 697398, 'nhi', '17-12-2021', ' 08:09 PM'),
(108, 816165, 697398, 'abbas', '17-12-2021', ' 08:09 PM'),
(109, 816165, 697398, 'hello', '17-12-2021', ' 08:18 PM'),
(110, 816165, 243633, 'baba', '17-12-2021', ' 08:18 PM'),
(111, 816165, 243633, 'hs', '17-12-2021', ' 08:38 PM'),
(112, 816165, 243633, 'hello', '17-12-2021', ' 08:39 PM'),
(113, 816165, 243633, 'hello', '17-12-2021', ' 08:57 PM'),
(114, 816165, 243633, 'abbas', '17-12-2021', ' 08:57 PM'),
(115, 816165, 243633, 'a', '17-12-2021', ' 08:58 PM'),
(116, 816165, 243633, 'a', '17-12-2021', ' 08:58 PM'),
(117, 816165, 243633, 'abbas', '17-12-2021', ' 08:58 PM'),
(118, 816165, 998601, 'hsh', '05-04-2022', ' 08:59 PM'),
(119, 816165, 243633, 'hhha', '05-04-2022', ' 08:59 PM'),
(120, 816165, 353340, 'jdd', '26-07-2022', ' 11:13 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `uniq_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Profile_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `uniq_id`, `fname`, `lname`, `phoneno`, `password`, `status`, `Time`, `Date`, `Profile_img`) VALUES
(1, 816165, 'Mahammad', 'husain', '9724073530', 'husain', '0', ' 11:14 AM', '26-07-2022', '1636092603-login.jpg'),
(2, 243633, 'Abbas', 'Ali', '9724073520', '12345', '0', ' 04:49 PM', '01-12-2021', '1636111777-Syllabus_NIMCET.png'),
(3, 353340, 'Kasam', 'Ali', '9898989898', '12345', '0', ' 11:23 AM', '17-12-2021', 'user.jpg'),
(4, 998601, 'Kazim', 'Ali', '9898984050', '12345', '0', ' 11:23 AM', '01-12-2021', '1636269929-Screenshot (7).png'),
(5, 697398, 'Maherban', 'Ali', '9696969696', '12345', '0', ' 03:20 PM', '01-12-2021', 'user.jpg'),
(6, 182840, 'A', 'B', '9696969630', '12345', '0', ' 11:24 AM', '02-01-2022', 'user.jpg'),
(7, 325668, 'AbbasAli', 'Kas', '9855555552', '1235', '0', '', '', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_contact`
--
ALTER TABLE `add_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_contact`
--
ALTER TABLE `add_contact`
  MODIFY `contact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
