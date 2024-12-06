-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 12:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecobuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecocategories`
--

CREATE TABLE `ecocategories` (
  `id` int(32) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecocategories`
--

INSERT INTO `ecocategories` (`id`, `name`) VALUES
(1, 'Eco Hub'),
(2, 'Green Haven'),
(3, 'Eco Retreat'),
(4, 'Renewable Hub'),
(5, 'Sustainable Solutions'),
(6, 'Recycling Bins'),
(7, 'e-Scooters'),
(8, 'Bike Share Stations'),
(9, 'Public EV Charging Stations'),
(10, 'Battery Recycling Points'),
(11, 'Community Compost Bins'),
(12, 'Solar-Powered Benches'),
(13, 'Green Roofs'),
(14, 'Public Water Refill Stations'),
(15, 'Waste Oil Collection Points'),
(16, 'Book Swap Stations'),
(17, 'Pollinator Gardens'),
(18, 'E-Waste Collection Bins'),
(19, 'Clothing Donation Bins'),
(20, 'Community Tool Libraries');

-- --------------------------------------------------------

--
-- Table structure for table `ecofacilities`
--

CREATE TABLE `ecofacilities` (
  `id` int(32) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `category` int(32) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `houseNumber` varchar(50) DEFAULT NULL,
  `streetName` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  `postcode` varchar(7) DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `contributor` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecofacilities`
--

INSERT INTO `ecofacilities` (`id`, `title`, `category`, `description`, `houseNumber`, `streetName`, `county`, `town`, `postcode`, `lng`, `lat`, `contributor`) VALUES
(1, 'Eco Hub', 1, 'Sustainable community hub', '12', 'Baker Street', 'Greater London', 'London', 'NW1 6XE', -0.158555, 51.523774, 1),
(2, 'Green Haven', 2, 'Urban green initiative', '25', 'Downing Street', 'Greater London', 'London', 'SW1A 2A', -0.127647, 51.503363, 1),
(3, 'Eco Retreat', 3, 'Relaxation center with eco focus', '42', 'Abbey Road', 'Greater Manchester', 'Manchester', 'M15 4AA', -2.245114, 53.471521, 1),
(4, 'Renewable Hub', 4, 'Energy efficiency consultancy', '34', 'High Street', 'West Midlands', 'Birmingham', 'B1 1AA', -1.896767, 52.48142, 1),
(5, 'Sustainable Solutions', 5, 'Eco-friendly products store', '19', 'Oxford Street', 'Greater London', 'London', 'W1D 2AA', -0.138197, 51.514539, 1),
(6, 'Eco Connect', 1, 'Networking for eco businesses', '8', 'Regent Street', 'Greater London', 'London', 'W1B 5SF', -0.140832, 51.510067, 1),
(7, 'Green Bridge', 2, 'Eco-education workshops', '15', 'Piccadilly', 'Greater Manchester', 'Manchester', 'M1 4AF', -2.235436, 53.479489, 1),
(8, 'Eco Impact', 3, 'Environmental consulting services', '73', 'Fleet Street', 'Greater London', 'London', 'EC4A 2D', -0.108621, 51.513375, 1),
(9, 'Urban Nature', 4, 'Eco park initiative', '51', 'King\'s Road', 'Greater London', 'London', 'SW3 5UH', -0.168518, 51.485094, 1),
(10, 'Sustainable Living', 5, 'Eco-living advocacy', '101', 'Victoria Street', 'Greater London', 'London', 'SW1E 6D', -0.141462, 51.497494, 1),
(11, 'Recycling Bins', 6, 'Sorted bins for paper, plastics, metals, and glass', '201', 'Recycling Lane', 'Greater London', 'London', 'EC1A 1A', -0.098234, 51.517212, 1),
(12, 'e-Scooters', 7, 'Electric scooters for short-distance, eco-friendly travel', '102', 'Green Street', 'West Midlands', 'Birmingham', 'B2 3BB', -1.899083, 52.483003, 1),
(13, 'Bike Share Stations', 8, 'Stations for public bike rentals', '85', 'Cycle Avenue', 'Greater Manchester', 'Manchester', 'M13 9PL', -2.241722, 53.474126, 1),
(14, 'Public EV Charging Stations', 9, 'Charging points for electric vehicles', '17', 'Power Road', 'West Yorkshire', 'Leeds', 'LS1 4BY', -1.54778, 53.800755, 1),
(15, 'Battery Recycling Points', 10, 'Designated bins for safe battery disposal', '55', 'Battery Street', 'Merseyside', 'Liverpool', 'L1 8AA', -2.978481, 53.406456, 1),
(16, 'Community Compost Bins', 11, 'Composting facilities for organic waste', '9', 'Compost Lane', 'South Yorkshire', 'Sheffield', 'S1 2DR', -1.465912, 53.383331, 1),
(17, 'Solar-Powered Benches', 12, 'Benches equipped with solar panels for device charging', '30', 'Solar Drive', 'Hampshire', 'Southampton', 'SO14 7A', -1.40435, 50.9097, 1),
(18, 'Green Roofs', 13, 'Vegetated roofs to support biodiversity and improve air quality', '71', 'Rooftop Crescent', 'Kent', 'Maidstone', 'ME15 6A', 0.518759, 51.270363, 1),
(19, 'Public Water Refill Stations', 14, 'Water fountains to reduce bottled water usage', '22', 'Hydration Walk', 'Essex', 'Chelmsford', 'CM1 1RE', 0.468558, 51.735589, 1),
(20, 'Waste Oil Collection Points', 15, 'Facilities for recycling cooking oils', '44', 'Oil Avenue', 'Surrey', 'Guildford', 'GU1 1AA', -0.57798, 51.236222, 1),
(21, 'Book Swap Stations', 16, 'Small kiosks or boxes for sharing used books', '66', 'Library Lane', 'Greater London', 'London', 'N1 2AA', -0.10389, 51.531, 1),
(22, 'Pollinator Gardens', 17, 'Small, native plant gardens to support bees and butterflies', '39', 'Garden Way', 'West Midlands', 'Birmingham', 'B15 1AA', -1.921717, 52.469981, 1),
(23, 'E-Waste Collection Bins', 18, 'Disposal bins for electronic waste', '12', 'Electro Lane', 'Greater Manchester', 'Manchester', 'M14 6AA', -2.22231, 53.455889, 1),
(24, 'Clothing Donation Bins', 19, 'Containers for donating gently used clothes', '7', 'Donation Drive', 'West Yorkshire', 'Leeds', 'LS10 1A', -1.545439, 53.785874, 1),
(25, 'Community Tool Libraries', 20, 'Lending programs for gardening and DIY tools', '92', 'Tool Street', 'Merseyside', 'Liverpool', 'L15 9AA', -2.94017, 53.403314, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ecofacilitystatus`
--

CREATE TABLE `ecofacilitystatus` (
  `id` int(32) UNSIGNED NOT NULL,
  `statusComment` varchar(100) DEFAULT NULL,
  `facilityId` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecofacilitystatus`
--

INSERT INTO `ecofacilitystatus` (`id`, `statusComment`, `facilityId`) VALUES
(1, 'Not working', 1),
(2, 'Missing', 2),
(3, 'Lots available', 3),
(4, 'Amazing facility', 4),
(5, 'Not working', 5),
(6, 'Missing', 6),
(7, 'Lots available', 7),
(8, 'Amazing facility', 8),
(9, 'Not working', 9),
(10, 'Missing', 10),
(11, 'Lots available', 11),
(12, 'Amazing facility', 12),
(13, 'Not working', 13),
(14, 'Missing', 14),
(15, 'Lots available', 15),
(16, 'Amazing facility', 16),
(17, 'Not working', 17),
(18, 'Missing', 18),
(19, 'Lots available', 19),
(20, 'Amazing facility', 20),
(21, 'Not working', 21),
(22, 'Missing', 22),
(23, 'Lots available', 23),
(24, 'Amazing facility', 24),
(25, 'Not working', 25);

-- --------------------------------------------------------

--
-- Table structure for table `ecouser`
--

CREATE TABLE `ecouser` (
  `id` int(32) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userType` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecouser`
--

INSERT INTO `ecouser` (`id`, `username`, `password`, `userType`) VALUES
(1, 'admin', 'Demolaflo@123', 1),
(2, 'lee', 'Cscassess@2024', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ecousertypes`
--

CREATE TABLE `ecousertypes` (
  `id` int(32) UNSIGNED NOT NULL,
  `usertype` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecousertypes`
--

INSERT INTO `ecousertypes` (`id`, `usertype`, `name`) VALUES
(1, 1, 'Manager'),
(2, 2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecocategories`
--
ALTER TABLE `ecocategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecofacilities`
--
ALTER TABLE `ecofacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecofacilitystatus`
--
ALTER TABLE `ecofacilitystatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecouser`
--
ALTER TABLE `ecouser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecousertypes`
--
ALTER TABLE `ecousertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecocategories`
--
ALTER TABLE `ecocategories`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ecofacilities`
--
ALTER TABLE `ecofacilities`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ecofacilitystatus`
--
ALTER TABLE `ecofacilitystatus`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ecouser`
--
ALTER TABLE `ecouser`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecousertypes`
--
ALTER TABLE `ecousertypes`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
