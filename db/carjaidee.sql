-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 10:13 AM
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
  `brandPicture` varchar(255) DEFAULT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandPicture`, `brandName`) VALUES
(1, NULL, 'BMW'),
(2, NULL, 'Lamborghini');

-- --------------------------------------------------------

--
-- Table structure for table `car_accessories`
--

CREATE TABLE `car_accessories` (
  `car_accessoriesId` int(11) NOT NULL,
  `car_accessoriesName` varchar(255) NOT NULL,
  `businessRegistration` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car_profile`
--

CREATE TABLE `car_profile` (
  `car_profileId` int(11) NOT NULL,
  `licenseplate` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `pictureFront` varchar(255) DEFAULT NULL,
  `pictureBack` varchar(255) DEFAULT NULL,
  `circlePlate` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtId` int(11) NOT NULL,
  `districtName` varchar(255) NOT NULL,
  `provinceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `garageId` int(11) NOT NULL,
  `comment` varchar(45) NOT NULL,
  `businessRegistration` varchar(45) NOT NULL,
  `garageName` varchar(255) NOT NULL,
  `garageAddress` varchar(255) NOT NULL,
  `postCode` varchar(45) NOT NULL,
  `latitude` varchar(45) NOT NULL,
  `longtitude` varchar(45) NOT NULL,
  `garageMaster` varchar(255) NOT NULL,
  `approve` varchar(45) NOT NULL,
  `subdistrictId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `province_provinceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `modelId` int(11) NOT NULL,
  `modelName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`modelId`, `modelName`) VALUES
(1, 'i8'),
(2, 'M2'),
(3, 'Aventador'),
(4, 'Huracan');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `provinceId` int(11) NOT NULL,
  `provinceName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict`
--

CREATE TABLE `subdistrict` (
  `subdistrictId` int(11) NOT NULL,
  `subdistrictName` varchar(25) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `category`, `email`, `phone`) VALUES
(1, 'admin', '$2y$10$z0glw9l0y.YcYQGPmM7eCuRmuNoZgVED5YxP/yVKBkJYrFaaNIVpe', '1', 'admin@admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_profile` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `tell1` varchar(45) DEFAULT NULL,
  `tell2` varchar(45) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `subdistrictId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `brandId` int(11) NOT NULL,
  `modelId` int(11) NOT NULL,
  `year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`brandId`, `modelId`, `year`) VALUES
(1, 1, '2016'),
(1, 1, '2017'),
(1, 2, '2016'),
(2, 1, '2015'),
(2, 1, '2016'),
(2, 2, '2014'),
(2, 2, '2015');

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
  ADD PRIMARY KEY (`car_accessoriesId`),
  ADD KEY `fk_car_accessories_users1_idx` (`id`);

--
-- Indexes for table `car_profile`
--
ALTER TABLE `car_profile`
  ADD PRIMARY KEY (`car_profileId`),
  ADD KEY `fk_car_profile_users1_idx` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`),
  ADD KEY `fk_district_province_idx` (`provinceId`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`garageId`,`garageMaster`),
  ADD KEY `fk_garage_subdistrict1_idx` (`subdistrictId`),
  ADD KEY `fk_garage_district1_idx` (`districtId`),
  ADD KEY `fk_garage_province1_idx` (`province_provinceId`);

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
  ADD PRIMARY KEY (`subdistrictId`),
  ADD KEY `fk_subdistrict_district1_idx` (`districtId`),
  ADD KEY `fk_subdistrict_province1_idx` (`provinceId`);

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
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_profile`),
  ADD KEY `fk_user_profile_province1_idx` (`provinceId`),
  ADD KEY `fk_user_profile_district1_idx` (`districtId`),
  ADD KEY `fk_user_profile_subdistrict1_idx` (`subdistrictId`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`brandId`,`modelId`,`year`),
  ADD KEY `fk_brand_has_model_model1_idx` (`modelId`),
  ADD KEY `fk_brand_has_model_brand1_idx` (`brandId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_accessories`
--
ALTER TABLE `car_accessories`
  MODIFY `car_accessoriesId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_profile`
--
ALTER TABLE `car_profile`
  MODIFY `car_profileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `garageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `modelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `provinceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdistrict`
--
ALTER TABLE `subdistrict`
  MODIFY `subdistrictId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_profile` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_accessories`
--
ALTER TABLE `car_accessories`
  ADD CONSTRAINT `fk_car_accessories_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `car_profile`
--
ALTER TABLE `car_profile`
  ADD CONSTRAINT `fk_car_profile_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_province` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `fk_garage_district1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_garage_province1` FOREIGN KEY (`province_provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_garage_subdistrict1` FOREIGN KEY (`subdistrictId`) REFERENCES `subdistrict` (`subdistrictId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subdistrict`
--
ALTER TABLE `subdistrict`
  ADD CONSTRAINT `fk_subdistrict_district1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subdistrict_province1` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `fk_user_profile_district1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_profile_province1` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_profile_subdistrict1` FOREIGN KEY (`subdistrictId`) REFERENCES `subdistrict` (`subdistrictId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `year`
--
ALTER TABLE `year`
  ADD CONSTRAINT `fk_brand_has_model_brand1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_brand_has_model_model1` FOREIGN KEY (`modelId`) REFERENCES `model` (`modelId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
