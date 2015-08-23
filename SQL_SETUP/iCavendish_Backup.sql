-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2015 at 12:22 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `iCavendish`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentID` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `title`, `description`) VALUES
(1, 'Test Department', 'The department used for testing'),
(2, 'Test2', 'The new description of department');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `imageLocation` varchar(800) DEFAULT NULL,
  `panoRef` varchar(255) NOT NULL,
  `edge` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `imageLocation`, `panoRef`, `edge`) VALUES
(1, 'images/image1.jpg', 'img_01', 'A'),
(2, 'images/image2.jpg', 'img_02', 'I'),
(3, 'images/image3.jpg', 'img_03', 'H'),
(4, 'images/image4.jpg', 'img_04', 'Q'),
(5, 'images/image5.jpg', 'img_05', 'N'),
(6, 'images/image6.jpg', 'img_06', 'O'),
(7, 'images/image7.jpg', 'img_07', 'B'),
(8, 'images/image8.jpg', 'img_08', 'C'),
(9, 'images/image9.jpg', 'img_09', 'D'),
(10, 'images/image10.jpg', 'img_10', 'E'),
(11, 'images/image11.jpg', 'img_11', 'F'),
(12, 'images/image12.jpg', 'img_12', 'G'),
(13, 'images/image13.jpg', 'img_13', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `linkID` int(255) NOT NULL,
  `Distance` int(255) NOT NULL,
  `Image` int(255) NOT NULL,
  `ConnectedTo` int(22) NOT NULL,
  `edgeConnect` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`linkID`, `Distance`, `Image`, `ConnectedTo`, `edgeConnect`, `Description`) VALUES
(2, 7, 1, 7, 'AB', 'Head in the right direction'),
(3, 8, 1, 2, 'AI', 'Straight ahead'),
(4, 6, 1, 3, 'AH', 'Head in the left direction'),
(5, 7, 7, 2, 'BI', 'Heads towards the book shop'),
(6, 2, 7, 8, 'BC', 'Straight ahead towards the double doors'),
(7, 2, 8, 7, 'CB', 'Straight ahead towards book shop'),
(8, 8, 8, 9, 'CD', 'Straight ahead by the lifts'),
(9, 2, 9, 8, 'DC', 'Straight ahead by the submission area'),
(10, 8, 9, 10, 'DE', 'Straight through the double doors'),
(11, 5, 10, 11, 'EF', 'Straight down the hallway'),
(12, 1, 10, 9, 'ED', 'Go through the double door towards the lifts'),
(13, 6, 11, 10, 'FE', 'Head towards the finance office'),
(14, 2, 11, 12, 'FG', 'Straight down to the end of the hallway'),
(16, 1, 3, 2, 'HI', 'Head forward towards Neo cafe'''),
(17, 3, 3, 4, 'HQ', 'Head straight towards student union'),
(18, 6, 3, 1, 'HA', 'Head towards the barriers on your left.'),
(19, 5, 6, 4, 'OQ', 'Head straight towards the cafe'''),
(20, 5, 6, 13, 'OP', 'First turn on your left'),
(21, 5, 13, 6, 'PO', 'Head towards the cafe and turn right');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `PathID` int(11) NOT NULL,
  `route` varchar(800) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`PathID`, `route`) VALUES
(1, '1,2,3,4');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `PalceID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`PalceID`, `ImageID`, `title`, `description`) VALUES
(3, 2, 'Cafe''', 'Neo Cafe'' entrance'),
(4, 10, 'Finance Office', 'Handles finance within the university'),
(6, 8, 'Submission Area', 'Assignment submission area'),
(7, 1, 'Front Desk', 'The reception area, information point.'),
(8, 3, 'Student Union', 'Handles student affairs'),
(9, 4, 'Student Union seating area', 'Communal area'),
(10, 5, 'Student Shop', 'Local grocery shop'),
(11, 6, 'Book Shop', 'Essential educational reading material'),
(12, 7, 'Security Post', 'Security area/ Lost and found'),
(13, 9, 'Lifts', 'Ground Floor Lifts'),
(14, 11, 'Toilet', 'Female and disabled toilets'),
(15, 12, 'CG.03/CG.02', 'Lecture rooms'),
(16, 13, 'CG.25', 'Computer Room (Windows)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `sectionID` int(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `fname`, `lname`, `contact`, `sectionID`) VALUES
(50, 'ale', '32250170a0dca92d53ec9624f336ca24', 'alex@gmail.com', 'Phillip', 'Akuamoah-Boateng', 0, 1),
(51, 'alex2', 'c81e728d9d4c2f636f067f89cc14862c', '2', '', '', 0, NULL),
(57, 'alex', '32250170a0dca92d53ec9624f336ca24', 'alex@gmail.com', 'Phillip', 'Akuamoah-Boateng', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`), ADD KEY `edge` (`edge`), ADD KEY `edge_2` (`edge`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`linkID`), ADD KEY `Image` (`Image`,`ConnectedTo`), ADD KEY `Image_2` (`Image`), ADD KEY `ConnectedTo` (`ConnectedTo`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`PathID`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`PalceID`), ADD KEY `ImageID` (`ImageID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`), ADD KEY `contact` (`contact`), ADD KEY `sectionID` (`sectionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `linkID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `PathID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `PalceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`Image`) REFERENCES `images` (`ImageID`),
ADD CONSTRAINT `links_ibfk_2` FOREIGN KEY (`ConnectedTo`) REFERENCES `images` (`ImageID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sectionID`) REFERENCES `departments` (`departmentID`);
