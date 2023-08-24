-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2023 at 07:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opac`
--

-- --------------------------------------------------------

--
-- Table structure for table `Blog`
--

CREATE TABLE `Blog` (
  `BlogID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text DEFAULT NULL,
  `PublishDate` date DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Blog`
--

INSERT INTO `Blog` (`BlogID`, `Title`, `Content`, `PublishDate`, `Slug`) VALUES
(1, 'Hello ', 'with the correct path to your configuration file. This code will add a new blog post with the provided title, content, and publish date, and automatically generate a slug for the blog post based on the title.', '2023-08-24', 'hello-'),
(2, 'Gello ', 'with the correct path to your configuration file. This code will add a new blog post with the provided title, content, and publish date, and automatically generate a slug for the blog post based on the title.', '2023-08-18', 'gello-'),
(3, 'Time  is now', '\r\nor selecting blogs. Since you want to retrieve all blogs, you don\'t need to provide a specific condition. Here\'s the corrected code:or selecting blogs. Since you want to retrieve all blogs, you don\'t need to provide a specific condition. Here\'s the corrected code:', '2023-08-18', 'time--is-now');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `Slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`CategoryID`, `CategoryName`, `Slug`) VALUES
(1, 'Music', 'music'),
(2, 'Movies', 'movies'),
(3, 'Games', 'games');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `FeedbackID` int(11) NOT NULL,
  `UserEmail` varchar(40) DEFAULT NULL,
  `FeedbackText` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`FeedbackID`, `UserEmail`, `FeedbackText`, `Timestamp`) VALUES
(1, 'name@gmail.com', 'Make sure to adapt the code to your specific database structure and naming conventions. Additionally, consider using prepared statements for your SQL queries to prevent SQL injection vulnerabilities.Make sure to adapt the code to your specific database structure and naming conventions. Additionally, consider using prepared statements for your SQL queries to prevent SQL injection vulnerabilities.', '2023-08-23 18:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `LocationID` int(11) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `Address` text DEFAULT NULL,
  `OpeningHours` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`LocationID`, `LocationName`, `Address`, `OpeningHours`) VALUES
(1, 'Cocis', 'JINJA (UGANDA)', '80:00');

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `MessageID` int(11) NOT NULL,
  `SenderEmail` text DEFAULT NULL,
  `SenderSubject` text DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`MessageID`, `SenderEmail`, `SenderSubject`, `MessageText`, `Timestamp`) VALUES
(1, 'ateraxantonio@gmail.com', 'Test', 'Good', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `ReservationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ResourceID` int(11) DEFAULT NULL,
  `ReservationDate` date DEFAULT NULL,
  `PickupDate` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`ReservationID`, `UserID`, `ResourceID`, `ReservationDate`, `PickupDate`, `Status`) VALUES
(4, 1, 11, '2023-08-24', NULL, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `Resource`
--

CREATE TABLE `Resource` (
  `ResourceID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Authors` varchar(255) DEFAULT NULL,
  `PublicationYear` int(11) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Keywords` varchar(255) DEFAULT NULL,
  `Format` varchar(50) DEFAULT NULL,
  `AvailabilityStatus` varchar(20) DEFAULT NULL,
  `LocationID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Resource`
--

INSERT INTO `Resource` (`ResourceID`, `Title`, `Authors`, `PublicationYear`, `Publisher`, `ISBN`, `Description`, `Keywords`, `Format`, `AvailabilityStatus`, `LocationID`, `CategoryID`, `Slug`) VALUES
(3, 'The Margie', 'Mark and Rain', 2002, 'Margie Fier', '343FDS', 'In this version, I\'ve used a prepared statement with parameter binding to safely execute the SQL query. This helps prevent SQL injection attacks. Additionally, I\'ve added comments where you might want to handle cases where no book details are found or if there\'s an error during database execution. Always ensure that you have proper error handling to provide feedback to users and administrators in case something goes wrong.In this version, I\'ve used a prepared statement with parameter binding to safely execute the SQL query. This helps prevent SQL injection attacks. Additionally, I\'ve added comments where you might want to handle cases where no book details are found or if there\'s an error during database execution. Always ensure that you have proper error handling to provide feedback to users and administrators in case something goes wrong.', 'LIFE PRIDE WISE', 'Digital', 'Available', 1, 1, 'the-margie'),
(4, 'The Alien Woman', 'Oganga Opur', 2000, 'Modify', 'Array', 'In the example above, clicking the \"Add More ISBNs, Formats, Locations\" button will dynamically add fields for ISBN, format, and location. When the form is submitted, you\'ll receive arrays of ISBNs, formats, and location IDs in PHP, which you can process and insert into the database accordingly. This approach allows users to add multiple entries with different ISBNs, formats, and locations for the same book.In the example above, clicking the \"Add More ISBNs, Formats, Locations\" button will dynamically add fields for ISBN, format, and location. When the form is submitted, you\'ll receive arrays of ISBNs, formats, and location IDs in PHP, which you can process and insert into the database accordingly. This approach allows users to add multiple entries with different ISBNs, formats, and locations for the same book.', 'Love Village Relationship', 'Array', 'Unavailable', 1, 2, 'the-alien-woman'),
(5, 'Oganga', 'Mark and Rain', 200, 'Margie Fier', 'Y7645', 'This should work correctly with the dynamic fields you\'ve added in the HTML form. Make sure that the number of placeholders in mysqli_stmt_bind_param matches the number of bind variables you\'re using for each iteration.', 'The is Bad ', 'Print', 'Unavailable', 1, 2, 'oganga'),
(7, 'Doma', 'Mark and Rain', 7666, 'Modify', 'Y7645', 'In this modified function, after generating the slug from the input string, a random string of characters and numbers is generated using md5(rand()) and then trimmed to the desired length (in this case, 5 characters). The random string is then appended to the slug using a hyphen as a separator. This will help ensure that the generated slugs are unique even for resources with the same title.', 'Love Village Relationship', 'Print', 'Available', 1, 2, 'doma-9e910'),
(9, 'Doma', 'Mark and Rain', 7666, 'Modify', 'Y7645', 'In this modified function, after generating the slug from the input string, a random string of characters and numbers is generated using md5(rand()) and then trimmed to the desired length (in this case, 5 characters). The random string is then appended to the slug using a hyphen as a separator. This will help ensure that the generated slugs are unique even for resources with the same title.', 'Love Village Relationship', 'Print', 'Available', 1, 2, 'doma-fab2c'),
(10, 'Makr', 'Mark and Rain', 4332, 'Margie Fier', 'Y7645', 'yhdfsnkalxb kugruejwnyu njcbgf nuinuid', 'LIFE PRIDE WISE', 'Print', 'Available', 1, 3, 'makr-52921'),
(11, 'This is a smaple', 'Oganga Opur', 1231, 'Modify', 'Y7645', 'In this updated function, after generating the initial slug, it checks if that slug already exists in the database. If it does, it generates a new random string and combines it with the base slug, then checks again. This loop continues until a unique slug is found. This approach guarantees that each generated sluIn this updated function, after generating the initial slug, it checks if that slug already exists in the database. If it does, it generates a new random string and combines it with the base slug, then checks again. This loop continues until a unique slug is found. This approach guarantees that each generated slug is unique in the database.\r\n\r\n\r\n\r\n\r\n', 'The is Bad ', 'Print', 'Unavailable', 1, 1, 'y7645-0b44d'),
(12, 'This is again', 'Mark and Rain', 2321, 'Margie Fier', 'Y76453', 'In this updated function, after generating the initial slug, it checks if that slug already exists in the database. If it does, it generates a new random string and combines it with the base slug, then checks again. This loop continues until a unique slug is found. This approach guarantees that each generated slug is unique in the database.\r\n\r\n\r\n\r\n\r\nIn this updated function, after generating the initial slug, it checks if that slug already exists in the database. If it does, it generates a new random string and combines it with the base slug, then checks again. This loop continues until a unique slug is found. This approach guarantees that each generated slug is unique in the database.', 'The is Bad ', 'Print', 'Available', 1, 1, 'y76453-d7481'),
(13, 'This is again', 'Mark and Rain', 2321, 'Margie Fier', 'H67567', 'In this updated function, after generating the initial slug, it checks if that slug already exists in the database. If it does, it generates a new random string and combines it with the base slug, then checks again. This loop continues until a unique slug is found. This approach guarantees that each generated slug is unique in the database.\r\n\r\n\r\n\r\n\r\nIn this updated function, after generating the initial slug, it checks if that slug already exists in the database. If it does, it generates a new random string and combines it with the base slug, then checks again. This loop continues until a unique slug is found. This approach guarantees that each generated slug is unique in the database.', 'The is Bad ', 'Print', 'Available', 1, 1, 'h67567-64d9a');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `role` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Email`, `PhoneNumber`, `Address`, `role`) VALUES
(1, 'Anna', '$2y$10$95d/YXlivpokJPqRNZazVedeaFdnV9l3C3pKA63nF5xH2BR/fwOJG', 'ateraxantonio@gmail.com', '0780562201', 'JINJA (UGANDA)', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Blog`
--
ALTER TABLE `Blog`
  ADD PRIMARY KEY (`BlogID`),
  ADD UNIQUE KEY `Slug` (`Slug`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Slug` (`Slug`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ResourceID` (`ResourceID`);

--
-- Indexes for table `Resource`
--
ALTER TABLE `Resource`
  ADD PRIMARY KEY (`ResourceID`),
  ADD UNIQUE KEY `Slug` (`Slug`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `LocationID` (`LocationID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Blog`
--
ALTER TABLE `Blog`
  MODIFY `BlogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Location`
--
ALTER TABLE `Location`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Resource`
--
ALTER TABLE `Resource`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `Reservation_ibfk_4` FOREIGN KEY (`ResourceID`) REFERENCES `Resource` (`ResourceID`);

--
-- Constraints for table `Resource`
--
ALTER TABLE `Resource`
  ADD CONSTRAINT `Resource_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`CategoryID`),
  ADD CONSTRAINT `Resource_ibfk_2` FOREIGN KEY (`LocationID`) REFERENCES `Location` (`LocationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
