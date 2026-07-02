-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2026 at 06:36 AM
-- Server version: 9.1.0
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmvk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(4, 'superadmin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', 'rvuWJHMd5LTxLC2J', '$2y$10$LDUi4w/UAM2PgfMoKkLo4.igJX39G5/WQOEDHRaDy3y2KZeIxXggm', '2019-02-16 22:39:57', 'super'),
(7, 'anand', '$2y$10$OrQFRZdSUP3X2kvGZrg.zeplQkxcJAq1s6atRehyCpbEvOVPu8KPe', NULL, NULL, NULL, 'admin'),
(8, 'admin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', 'MyG5Xw2I12EWdJeD', '$2y$10$XL/RhpCz.uQoWE1xV77Wje4I4ker.gtg7YV4yqNwLZfzIYnP7E8Na', '2019-08-22 01:12:33', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_title` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `vacancies` int NOT NULL DEFAULT '1',
  `employment_type` enum('Full Time','Part Time','Contract','Internship') NOT NULL,
  `work_mode` enum('On-site','Hybrid','Remote') NOT NULL,
  `location` varchar(150) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `education` varchar(150) DEFAULT NULL,
  `skills` text NOT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `job_description` text NOT NULL,
  `status` enum('Open','Draft','Closed','On Hold') NOT NULL DEFAULT 'Open',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `department`, `vacancies`, `employment_type`, `work_mode`, `location`, `experience`, `education`, `skills`, `salary`, `application_deadline`, `job_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ASP .NET Developer', 'IT', 1, 'Full Time', 'On-site', 'Satara', 'Fresher', 'BTECH', 'C#, OOP (Object-Oriented Programming), ASP.NET Core, ASP.NET MVC, Web API, Entity Framework Core (EF Core), LINQ, Razor Pages, HTML5, CSS3, JavaScript, Bootstrap, jQuery, SQL, Microsoft SQL Server, Stored Procedures, Views, Joins, Indexes, Database Design, REST API, JSON, JWT Authentication, ASP.NET Identity, Git, GitHub, Visual Studio, NuGet, IIS, Dependency Injection, Middleware, Async/Await, Logging, Unit Testing, Docker, Azure App Service.', '200000', '2026-07-31', 'Design, develop, and maintain web applications using ASP.NET Core/MVC.\r\nDevelop and integrate RESTful Web APIs.\r\nWrite clean, efficient, and reusable C# code.\r\nDesign and manage databases using Microsoft SQL Server.\r\nCreate and optimize stored procedures, views, and SQL queries.\r\nWork with Entity Framework Core for database operations.\r\nDevelop responsive user interfaces using HTML, CSS, JavaScript, Bootstrap, and jQuery.\r\nDebug, troubleshoot, and resolve application issues.', 'Open', '2026-07-02 00:12:03', '2026-07-02 00:25:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
