--
-- Table structure for table `ecocategories`
--
CREATE TABLE `ecocategories` (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `ecofacilities`
--
CREATE TABLE `ecofacilities` (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
-- Table structure for table `ecofacilitystatus`
--
CREATE TABLE `ecofacilitystatus` (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `statusComment` varchar(100) DEFAULT NULL,
  `facilityId` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `ecouser`
--
CREATE TABLE `ecouser` (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userType` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `ecousertypes`
--
CREATE TABLE `ecousertypes` (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usertype` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;