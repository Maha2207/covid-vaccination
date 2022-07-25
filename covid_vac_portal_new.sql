-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 05:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `admins` (
  `adminid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `admins` (`adminid`, `password`) VALUES
('admin1', '39dfa55283318d31afe5a3ff4a0e3253e2045e43'),
('admin2', '011c945f30ce2cbafc452f39840f025693339c42');



CREATE TABLE `users` (
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `users` (`userid`, `password`, `name`, `phone`) VALUES
('1001', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'krishnarjun', '92384'),
('1002', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'maha', '9053');



CREATE TABLE `vac_bookings` (
  `userid` varchar(50) NOT NULL,
  `centreid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `vac_bookings` (`userid`, `centreid`) VALUES
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1001', '1011'),
('1002', '1016');



CREATE TABLE `vac_centres` (
  `centreid` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  'hospitalname' varchar(100) NOT NULL,
  'person_incharge' varchar(100) NOT NULL,
  'cand_count' int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





INSERT INTO `vac_centres` (`centreid`, `location`,'hospital') VALUES
('1011', 'Chennai','abc hospital'),
('1013', 'Chennai','xyz hospital'),
('1014', 'Bangalore','pqr hospital'),
('1015', 'Hyderabad','mno hospital'),
('1016', 'Delhi','def hospital');
COMMIT;

