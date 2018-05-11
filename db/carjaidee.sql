-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 07:12 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carjaidee`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_accessories`
--

CREATE TABLE `car_accessories` (
  `caraccessoriesId` int(11) NOT NULL,
  `caraccessoriesName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bussinessRegistration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_profile`
--

CREATE TABLE `car_profile` (
  `carprofileId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `licensePlate` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `pictureFront` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pictureBack` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `circlePlate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `districtName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `garageId` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bussinessRegistration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `garageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `garageAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subdistrictId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `postCode` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longtitude` float NOT NULL,
  `garageMaster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `modelId` int(11) NOT NULL,
  `modelName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `provinceId` int(11) NOT NULL,
  `provinceName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict`
--

CREATE TABLE `subdistrict` (
  `subdistrictId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `subdistrictName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `dataUser` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subdistrictId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tell1` int(11) NOT NULL,
  `tell2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `categolory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `categolory`) VALUES
(1, 'dodi', 'ca26331c6bfbf9487a7cde0f1f95644449e83baa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `brandId` int(11) NOT NULL,
  `modelId` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `car_accessories`
--
ALTER TABLE `car_accessories`
  ADD PRIMARY KEY (`caraccessoriesId`,`userId`);

--
-- Indexes for table `car_profile`
--
ALTER TABLE `car_profile`
  ADD PRIMARY KEY (`carprofileId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`garageMaster`,`provinceId`,`districtId`,`subdistrictId`,`garageId`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`modelId`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`provinceId`);

--
-- Indexes for table `subdistrict`
--
ALTER TABLE `subdistrict`
  ADD PRIMARY KEY (`subdistrictId`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`dataUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`brandId`,`modelId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `dataUser` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
