-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 01:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_gender` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `pet_color` varchar(255) NOT NULL,
  `pet_species` varchar(255) NOT NULL,
  `pet_bday` date NOT NULL,
  `neutered` varchar(255) NOT NULL,
  `history` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `service` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_contact`
--

CREATE TABLE `archive_contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(1028) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_inventory`
--

CREATE TABLE `archive_inventory` (
  `id` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_date` date NOT NULL,
  `item _expiration` date NOT NULL,
  `item_stocks` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_logs`
--

CREATE TABLE `archive_logs` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_services`
--

CREATE TABLE `archive_services` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complete_patients`
--

CREATE TABLE `complete_patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `datetime_created` datetime NOT NULL,
  `datetime_ended` datetime NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complete_patients`
--

INSERT INTO `complete_patients` (`id`, `name`, `phone`, `pet_name`, `service`, `datetime_created`, `datetime_ended`, `action`) VALUES
(0, 'a', 'a', 'a', 'a', '2023-12-04 06:46:18', '2023-12-04 06:46:18', 'completed'),
(1, 'a', 'a', 'a', 'a', '2023-12-04 06:46:18', '2023-12-04 06:46:18', 'completed'),
(1, 'a', 'a', 'a', 'a', '2023-12-04 06:46:18', '2023-12-04 06:46:18', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `message`, `datetime`) VALUES
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'I have concern hehe', '2023-10-26 00:15:55'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasdadsa', '2023-11-02 23:59:14'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasdadsa', '2023-11-02 23:59:28'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'iloveyou po', '2023-11-03 00:00:04'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasddsaddasdasdas', '2023-11-03 00:03:00'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasdadasddasda', '2023-11-03 00:06:09'),
('Marcus Osalvo', 'jhanelvillamor@gmail.com', 'dasdadadas', '2023-11-03 00:06:48'),
('Marcus Osalvo', 'jhanelvillamor@gmail.com', 'dasdadadas', '2023-11-03 00:08:18'),
('Marcus Osalvo', 'jhanelvillamor@gmail.com', 'dasdadadas', '2023-11-03 00:09:24'),
('Jhanel Vilamor', 'osalvomarcus@gmail.com', 'dadadas', '2023-11-03 00:10:20'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dadasdad', '2023-11-03 00:10:42'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasdasdad', '2023-11-03 00:11:38'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasdasa', '2023-11-03 00:12:08'),
('Marcus Osalvo', 'dada@gmail.com', 'dsadsadasdas', '2023-11-03 00:12:51'),
('Marcus Osalvo', 'Jblaraa@gmail.com', 'sdasdas', '2023-11-03 00:14:00'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'sdasddasdsa', '2023-11-03 00:14:38'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dassddasdasdasda', '2023-11-03 00:15:25'),
('Jhanel Vilamor', 'jhanelvillamor@gmail.com', 'HEHE', '2023-11-06 15:27:08'),
('Jhanel Vilamor', 'jhanelvillamor@gmail.com', 'ilovedogs', '2023-11-13 14:17:57'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'sdadasd', '2023-11-16 14:27:48'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dasdsaa', '2023-11-16 14:32:28'),
('Marcus Osalvo', 'osalvomarcus@gmail.com', 'dsadsadas', '2023-11-16 14:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `decline_app`
--

CREATE TABLE `decline_app` (
  `id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_gender` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `pet_color` varchar(255) NOT NULL,
  `pet_species` varchar(255) NOT NULL,
  `pet_bday` date NOT NULL,
  `neutered` varchar(255) NOT NULL,
  `history` varchar(1028) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `service` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_date` date NOT NULL,
  `item_expiration` date NOT NULL,
  `item_stocks` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `item_name`, `item_date`, `item_expiration`, `item_stocks`) VALUES
(10, 'Anti Rabis', '2023-11-06', '2023-11-30', 10);

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `username`, `position`, `action`, `log_datetime`) VALUES
(7, 'jec', 'Admin', 'Logged in', '2023-10-03 03:07:40'),
(8, 'jec', 'Admin', 'Logged out', '2023-10-03 03:08:59'),
(9, 'jec', 'Admin', 'Logged in', '2023-10-03 03:10:44'),
(10, 'jec', 'Admin', 'Logged out', '2023-10-03 03:14:37'),
(11, 'jec', 'Admin', 'Logged in', '2023-10-03 03:14:58'),
(12, 'jec', 'Admin', 'Logged out', '2023-10-03 03:20:17'),
(13, 'MPJV', 'Staff', 'Logged in', '2023-10-03 03:20:21'),
(14, 'MPJV', 'Staff', 'Logged out', '2023-10-03 03:20:33'),
(15, 'jec', 'Admin', 'Logged in', '2023-10-06 11:48:32'),
(16, 'jec', 'Admin', 'Logged out', '2023-10-06 12:59:55'),
(17, 'jec', 'Admin', 'Logged in', '2023-10-06 13:24:45'),
(18, 'jec', 'Admin', 'Logged in', '2023-10-12 04:40:28'),
(19, 'jec', 'Admin', 'Logged out', '2023-10-12 05:47:13'),
(20, 'jec', 'Admin', 'Logged in', '2023-10-12 05:47:32'),
(21, 'jec', 'Admin', 'Logged out', '2023-10-12 05:48:55'),
(22, 'jec', 'Admin', 'Logged in', '2023-10-12 05:52:57'),
(23, 'jec', 'Admin', 'Logged out', '2023-10-12 06:24:44'),
(24, 'jec', 'Admin', 'Logged in', '2023-10-12 06:25:48'),
(25, 'jec', 'Admin', 'Logged out', '2023-10-12 08:13:47'),
(26, 'jec', 'Admin', 'Logged in', '2023-10-12 08:15:18'),
(27, 'jec', 'Admin', 'Logged in', '2023-10-12 11:24:30'),
(28, 'jec', 'Admin', 'Logged out', '2023-10-12 12:42:23'),
(29, 'jec', 'Admin', 'Logged in', '2023-10-12 12:43:04'),
(30, 'jec', 'Admin', 'Logged out', '2023-10-12 12:46:53'),
(31, 'MAO', 'Admin', 'Logged in', '2023-10-12 13:21:19'),
(32, 'MAO', 'Admin', 'Logged out', '2023-10-12 13:30:29'),
(33, 'MAO', 'Admin', 'Logged in', '2023-10-12 16:25:40'),
(34, 'MAO', 'Admin', 'Logged out', '2023-10-12 17:36:45'),
(35, 'MAO', 'Admin', 'Logged in', '2023-10-13 06:08:50'),
(36, 'MAO', 'Admin', 'Logged out', '2023-10-13 06:10:46'),
(37, 'MAO', 'Admin', 'Logged out', '2023-10-13 06:10:46'),
(38, 'MAO', 'Admin', 'Logged in', '2023-10-20 06:13:57'),
(39, 'MAO', 'Admin', 'Logged out', '2023-10-20 06:19:10'),
(40, 'MAO', 'Admin', 'Logged in', '2023-10-20 09:24:30'),
(41, 'MAO', 'Admin', 'Logged out', '2023-10-20 09:56:48'),
(42, 'MAO', 'Admin', 'Logged in', '2023-10-26 01:53:43'),
(43, 'MAO', 'Admin', 'Logged in', '2023-10-26 06:36:44'),
(44, 'MAO', 'Admin', 'Logged out', '2023-10-26 07:54:24'),
(45, 'admin', 'Admin', 'Logged in', '2023-10-26 07:54:35'),
(46, 'admin', 'Admin', 'Logged in', '2023-10-26 13:10:54'),
(47, 'admin', 'Admin', 'Logged in', '2023-11-01 15:40:11'),
(48, 'admin', 'Admin', 'Logged in', '2023-11-03 03:27:26'),
(49, 'admin', 'Admin', 'Logged out', '2023-11-03 04:02:16'),
(50, 'admin', 'Admin', 'Logged in', '2023-11-03 04:02:20'),
(51, 'admin', 'Admin', 'Logged out', '2023-11-03 05:05:01'),
(52, 'admin', 'Admin', 'Logged in', '2023-11-05 15:23:45'),
(53, 'admin', 'Admin', 'Logged out', '2023-11-05 17:05:58'),
(54, 'admin', 'Admin', 'Logged in', '2023-11-06 04:28:23'),
(55, 'admin', 'Admin', 'Logged in', '2023-11-06 07:05:38'),
(56, 'admin', 'Admin', 'Logged out', '2023-11-06 07:27:56'),
(57, 'admin', 'Admin', 'Logged in', '2023-11-06 07:28:30'),
(58, 'admin', 'Admin', 'Logged out', '2023-11-06 07:28:44'),
(59, 'MPJV', 'Admin', 'Logged in', '2023-11-06 07:28:50'),
(60, 'MPJV', 'Admin', 'Logged out', '2023-11-06 07:33:27'),
(61, 'admin', 'Admin', 'Logged in', '2023-11-06 08:37:37'),
(62, 'admin', 'Admin', 'Logged out', '2023-11-06 08:45:28'),
(63, 'admin', 'Admin', 'Logged in', '2023-11-07 12:49:21'),
(64, 'admin', 'Admin', 'Logged out', '2023-11-07 14:28:28'),
(65, 'admin', 'Admin', 'Logged in', '2023-11-07 14:28:48'),
(66, 'admin', 'Admin', 'Logged out', '2023-11-07 14:39:15'),
(67, 'admin', 'Admin', 'Logged in', '2023-11-07 14:39:29'),
(68, 'admin', 'Admin', 'Logged in', '2023-11-13 06:18:14'),
(69, 'admin', 'Admin', 'Logged out', '2023-11-13 06:32:15'),
(70, 'MPJV', 'Admin', 'Logged in', '2023-11-13 06:32:25'),
(71, 'MPJV', 'Admin', 'Logged out', '2023-11-13 06:38:51'),
(72, 'admin', 'Admin', 'Logged in', '2023-11-13 06:44:03'),
(73, 'admin', 'Admin', 'Logged out', '2023-11-13 06:44:09'),
(74, 'admin', 'Admin', 'Logged in', '2023-11-13 06:58:57'),
(75, 'admin', 'Admin', 'Logged out', '2023-11-13 07:04:23'),
(76, 'admin', 'Admin', 'Logged in', '2023-11-13 11:19:49'),
(77, 'admin', 'Admin', 'Logged in', '2023-11-13 12:54:01'),
(78, 'admin', 'Admin', 'Logged in', '2023-11-13 14:51:33'),
(79, 'admin', 'Admin', 'Logged out', '2023-11-13 15:28:39'),
(80, 'admin', 'Admin', 'Logged in', '2023-11-14 04:52:11'),
(81, 'admin', 'Admin', 'Logged in', '2023-11-14 10:03:46'),
(82, 'admin', 'Admin', 'Logged out', '2023-11-14 10:28:41'),
(83, 'admin', 'Admin', 'Logged in', '2023-11-16 02:52:33'),
(84, 'admin', 'Admin', 'Logged in', '2023-11-16 06:15:02'),
(85, 'admin', 'Admin', 'Logged in', '2023-11-16 07:00:03'),
(86, 'admin', 'Admin', 'Logged in', '2023-11-17 04:50:54'),
(87, 'admin', 'Admin', 'Logged out', '2023-11-17 06:22:25'),
(88, 'admin', 'Admin', 'Logged in', '2023-11-17 06:22:28'),
(89, 'admin', 'Admin', 'Logged out', '2023-11-17 06:28:57'),
(90, 'admin', 'Admin', 'Logged in', '2023-11-17 06:29:23'),
(91, 'admin', 'Admin', 'Logged out', '2023-11-17 06:33:16'),
(92, 'admin', 'Admin', 'Logged in', '2023-11-17 06:33:19'),
(93, 'admin', 'Admin', 'Logged out', '2023-11-17 06:33:40'),
(94, 'admin', 'Admin', 'Logged in', '2023-11-17 06:33:43'),
(95, 'admin', 'Admin', 'Logged in', '2023-11-17 06:36:04'),
(96, 'admin', 'Admin', 'Logged out', '2023-11-17 06:40:31'),
(97, 'admin', 'Admin', 'Logged in', '2023-11-17 06:40:34'),
(98, 'admin', 'Admin', 'Logged in', '2023-11-21 08:38:52'),
(99, 'admin', 'Admin', 'Logged in', '2023-11-21 12:49:17'),
(100, 'admin', 'Admin', 'Logged out', '2023-11-21 12:49:25'),
(101, 'admin', 'Admin', 'Logged in', '2023-11-21 13:17:11'),
(102, 'admin', 'Admin', 'Logged in', '2023-11-23 18:17:36'),
(103, 'admin', 'Admin', 'Logged in', '2023-11-25 02:25:05'),
(104, 'admin', 'Admin', 'Logged out', '2023-11-25 05:37:26'),
(105, 'admin', 'Admin', 'Logged in', '2023-11-25 05:47:05'),
(106, 'admin', 'Admin', 'Logged out', '2023-11-25 05:54:25'),
(107, 'admin', 'Admin', 'Logged in', '2023-11-25 06:20:49'),
(108, 'admin', 'Admin', 'Logged out', '2023-11-25 06:21:01'),
(109, 'admin', 'Admin', 'Logged in', '2023-11-25 06:30:30'),
(110, 'admin', 'Admin', 'Logged in', '2023-11-25 09:47:09'),
(111, 'admin', 'Admin', 'Logged in', '2023-12-04 05:03:19'),
(112, 'admin', 'Admin', 'Logged out', '2023-12-04 07:41:26'),
(113, 'admin', 'Admin', 'Logged in', '2023-12-04 07:42:13'),
(114, 'admin', 'Admin', 'Logged out', '2023-12-04 07:42:55'),
(115, 'admin', 'Admin', 'Logged in', '2023-12-04 07:43:19'),
(116, 'admin', 'Admin', 'Logged out', '2023-12-04 07:43:54'),
(117, 'admin', 'Admin', 'Logged in', '2023-12-04 07:53:30'),
(118, 'admin', 'Admin', 'Logged in', '2023-12-04 11:09:42'),
(119, 'admin', 'Admin', 'Logged out', '2023-12-04 11:57:10'),
(120, 'admin', 'Admin', 'Logged in', '2023-12-04 11:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_gender` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `pet_color` varchar(255) NOT NULL,
  `pet_type` varchar(255) NOT NULL,
  `pet_bday` date DEFAULT NULL,
  `neutered` varchar(255) NOT NULL,
  `history` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `name`, `email`, `contact`, `address`, `pet_name`, `pet_gender`, `pet_breed`, `pet_color`, `pet_type`, `pet_bday`, `neutered`, `history`, `service`, `total`, `date`, `time`, `date_created`, `action`) VALUES
(50, 'Osalvo, Marcus -', 'osalvomarcus@gmail.com', '+63 927 455 9756', 'SMR', 'Bruce', 'male', 'Doberman', 'Black', 'dog', '2023-12-04', 'no', 'dada', 'Surgery,Grooming', 800, '0000-00-00', '00:00:00', '2023-12-04 14:02:33', 'Completed'),
(51, 'Jhanel Vilamor', 'jhanelvillamor@gmail.com', '+63 927 455 9756', 'adaasdas', 'rowea', 'male', 'Doberman', 'Black', 'dog', '0000-00-00', 'no', 'dasda', 'Home Service,Vaccination and Deworming', 2800, '0000-00-00', '00:00:00', '2023-12-04 14:25:04', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `Name`, `Username`, `Password`, `Position`) VALUES
(7, 'Coy', 'Admin', '12345', 'Admin'),
(8, 'Mark ', 'MPJV', '12345', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `title`, `description`, `price`, `status`) VALUES
(6, 'Surgery', 'Pet surgery is a branch of veterinary medicine that involves the use of surgical procedures to diagnose, treat, or prevent health issues in animals, primarily focusing on domestic pets like dogs, cats, and other small animals. These surgical interventions are carried out by skilled veterinary surgeons to enhance the well-being and health of animals.', 300, 'Active'),
(7, 'Grooming', 'Pet grooming is an essential part of responsible pet care and focuses on maintaining the cleanliness, hygiene, and overall appearance of pets, primarily dogs and cats. This practice involves various grooming techniques and services designed to keep pets healthy, comfortable, and looking their best. ', 500, 'Active'),
(8, 'Treatment and Confinement', 'Treatment and confinement for pets involve providing a controlled environment and specific care for animals that are unwell, injured, or recovering from a medical procedure. This is a critical aspect of pet healthcare and ensures that pets receive the necessary attention, medication, and support during their healing process.', 750, 'Active'),
(9, 'Consultation', 'Pet consultation is a fundamental aspect of veterinary care, where pet owners or caregivers seek professional advice, diagnosis, and recommendations from veterinarians or pet healthcare experts regarding the health, behavior, and overall well-being of their pets. It plays a pivotal role in maintaining the health and happiness of pets, preventing and addressing health issues, and ensuring responsible pet ownership.', 250, 'Active'),
(10, 'Pet Boarding', 'Pet boarding, also known as pet kenneling or pet lodging, is a service provided by professional boarding facilities or kennels to accommodate and care for pets when their owners are unable to do so. It offers a safe and supervised environment for pets, ensuring they receive proper care, feeding, and attention in the absence of their owners. Pet boarding is especially useful during vacations, business trips, or in emergencies.', 500, 'Active'),
(11, 'Home Service', 'Home pet services refer to a range of professional services provided to pet owners in the comfort of their own homes. These services are designed to address the specific needs of pets while minimizing stress and disruption to their routines. Home pet services are especially beneficial for pet owners who prefer not to travel with their pets or when the pet requires specialized care.', 2500, 'Active'),
(12, 'Vaccination and Deworming', 'Vaccination and deworming are essential components of preventive healthcare for pets, including dogs, cats, and other animals. These measures are designed to protect pets from a variety of infectious diseases and internal parasites. Vaccination stimulates the pets immune system to build resistance to specific diseases, while deworming helps eliminate and prevent infestations of internal parasites.', 300, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
