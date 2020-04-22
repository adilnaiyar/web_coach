-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: April 22, 2020 at 06:40 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

--
-- Database: `web_coach`
--

-- --------------------------------------------------------

--
-- Table structure for table `coaching`
--

CREATE TABLE `coaching` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `coaching_name` varchar(200) NOT NULL,
 `username` varchar(200) NOT NULL,
 `email` varchar(200) NOT NULL,
 `address` longtext NOT NULL,
 `status` int(2) NOT NULL,
 `mobile` int(40) NOT NULL,
 `join_date` datetime NOT NULL DEFAULT current_timestamp(),
 `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `course_id` int(11) NOT NULL,
 `section_id` int(11) NOT NULL,
 `lesson_id` int(11) NOT NULL,
 `title` varchar(100) NOT NULL,
 `notes` text NOT NULL,
 `video` varchar(255) NOT NULL,
 `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
 `updation_date` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1

--
-- Table structure for table `courses`
--
CREATE TABLE `courses` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `course_id` varchar(100) NOT NULL,
 `user_id` int(11) NOT NULL,
 `coaching_name` varchar(200) NOT NULL,
 `title` varchar(100) NOT NULL,
 `description` varchar(200) NOT NULL,
 `duration` varchar(200) NOT NULL,
 `status` int(2) NOT NULL,
 `created_by` varchar(100) NOT NULL,
 `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
 `updation_date` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1


--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `course_id` int(11) NOT NULL,
 `section_id` int(11) NOT NULL,
 `title` varchar(100) NOT NULL,
 `duration` varchar(100) NOT NULL,
 `creation_at` datetime NOT NULL DEFAULT current_timestamp(),
 `updation_date` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1


--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `attempt_status` int(11) NOT NULL,
 `wrong_password_attempts` int(11) NOT NULL,
 `attempt_time` timestamp NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
--
-- Table structure for table `member_login_history`
--

CREATE TABLE `member_login_history` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` bigint(20) DEFAULT NULL,
 `login_dt` datetime NOT NULL DEFAULT current_timestamp(),
 `logout_dt` mediumint(10) DEFAULT NULL,
 `session_id` varchar(40) DEFAULT NULL,
 `last_activity` datetime NOT NULL DEFAULT current_timestamp(),
 `ip_address` varchar(50) NOT NULL,
 `status` int(2) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1


--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `roles_level` varchar(100) NOT NULL,
 `admin_user` int(11) NOT NULL,
 `dashboard` varchar(200) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1


--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles_level`, `admin_user`, `dashboard`) VALUES
(1, 'ADMIN', 1, 'admin'),
(2, 'CO_ADMIN', 1, 'Co_admin'),
(3, 'TEACHER', 0, 'teacher'),
(4, 'STUDENT', 0, 'student');

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `course_id` int(11) NOT NULL,
 `title` varchar(100) NOT NULL,
 `duration` varchar(100) NOT NULL,
 `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
 `updation_date` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `role_id` int(11) NOT NULL,
 `password` varchar(100) NOT NULL,
 `profile_photo` varchar(200) NOT NULL,
 `coaching_name` varchar(200) NOT NULL,
 `status` int(11) NOT NULL,
 `join_date` datetime NOT NULL DEFAULT current_timestamp(),
 `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
 `address` longtext DEFAULT NULL,
 `dob` date NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1