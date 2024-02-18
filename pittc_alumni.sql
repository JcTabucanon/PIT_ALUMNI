-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 03:52 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pittc_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `ID` int(100) NOT NULL,
  `ID_NUMBER` varchar(100) NOT NULL,
  `PHOTO` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `MIDDLENAME` varchar(100) NOT NULL,
  `COURSE` varchar(100) NOT NULL,
  `MAJOR` varchar(255) NOT NULL,
  `BATCH` varchar(100) NOT NULL,
  `GENDER` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `BIRTHDAY` varchar(100) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `ADDRESS` varchar(1000) NOT NULL,
  `DATE_REGISTERED` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`ID`, `ID_NUMBER`, `PHOTO`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `COURSE`, `MAJOR`, `BATCH`, `GENDER`, `EMAIL`, `BIRTHDAY`, `CONTACT`, `ADDRESS`, `DATE_REGISTERED`) VALUES
(5, '1920-06-110100', '323980985_1017088566347444_1055915436430696915_n.jpg', 'COSTANILLA', 'CLEOBETH', 'MUÃ‘EZ', 'BSHM', 'N/A', '2022', 'Male', 'cleobethcostanilla@gmail.com', '2000-11-01', '09136564571', 'CAMPOKPOK, TABANGO, LEYTE 6536', 'March 24, 2023'),
(6, '1920-06-121500', '343955128_1611155159404620_1175748491468257407_n.jpg', 'VILLANUEVA', 'JESSA FE', 'FERNANDO', 'BSHM', '', '2022', 'Female', 'jessavillanueva@gmail.com', '2000-12-15', '09227362368', 'SONLOGON, CAMPOKPOK, TABANGO LEYTE 6536', 'March 24, 2023'),
(7, '1920-06-12321', '344049062_135894729379464_1768137974157101547_n.jpg', 'SALES', 'JOEMHAR', 'DENATIL', 'BSHM', 'Select Major', '2021', 'Male', 'jonathansales@gmail.com', '1996-10-11', '09985656445', 'CAMPOKPOK, TABANGO, LEYTE', 'March 27, 2023'),
(8, '12345', '', 'tinga', 'leah', 's', 'BSHM', 'N/A', '2004', 'Female', 'tingaleah@gmail.com', '1982-12-24', '09499931719', 'tabango', 'June 05, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(100) NOT NULL,
  `EVENT` varchar(1000) NOT NULL,
  `SCHEDULE` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(10000) NOT NULL,
  `BANNER` varchar(255) NOT NULL,
  `DATE_CREATED` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `EVENT`, `SCHEDULE`, `LOCATION`, `DESCRIPTION`, `BANNER`, `DATE_CREATED`) VALUES
(7, 'BATCH 2021 REUNION', 'December 25, 2024- 08:00 AM', 'TABANGO SPORTS COMPLEX', 'Dear Alumni,\r\nWe are honored to have you as members of the association and to be a part of the history, development, and accomplishments of our alma mater.On this website, we will share with you the association\'s upcoming events and job opportunities that benrfit Palompon Institute of Technology Tabango alumni, recent graduates, and the local community.', '', 'March 22,2023'),
(9, 'BATCH 2020 REUNION', 'May 30, 2023\n -\n 12:00 AM', 'PIT TABANGO CAMPUS', '', '', 'April 25,2023');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(100) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `DATE_UPLOAD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `TITLE`, `IMAGE`, `DATE_UPLOAD`) VALUES
(16, 'Sample', '2023-03-30.png', 'March 31, 2023'),
(17, 'Sample', '2023-03-31.png', 'March 31, 2023'),
(18, 'sample', '2023-03-31 (1).png', 'March 31, 2023'),
(19, 'pit', 'pitlogo.png', 'April 11, 2023'),
(20, 'pit', 'banner.jpg', 'April 11, 2023'),
(21, 'pit', 'bg2.jpg', 'April 11, 2023'),
(23, 'ad', 'Law.png', 'April 16, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `EMAIL` varchar(150) NOT NULL,
  `LASTNAME` varchar(150) NOT NULL,
  `FIRSTNAME` varchar(150) NOT NULL,
  `MIDDLENAME` varchar(150) NOT NULL,
  `COURSE` varchar(150) NOT NULL,
  `MAJOR` varchar(150) NOT NULL,
  `BATCH` varchar(100) NOT NULL,
  `CIVIL` varchar(100) NOT NULL,
  `GENDER` varchar(150) NOT NULL,
  `BIRTHDAY` varchar(150) NOT NULL,
  `CONTACT` varchar(150) NOT NULL,
  `PERMANENT_ADD` varchar(150) NOT NULL,
  `REGION` varchar(150) NOT NULL,
  `PROVINCE` varchar(150) NOT NULL,
  `LOCATION_RES` varchar(150) NOT NULL,
  `AWARD` varchar(150) NOT NULL,
  `EXAM` varchar(150) NOT NULL,
  `DATE_TAKEN` varchar(150) NOT NULL,
  `RATING` varchar(150) NOT NULL,
  `RTC` varchar(10000) NOT NULL,
  `ORTC` varchar(150) NOT NULL,
  `ADVANCE` varchar(150) NOT NULL,
  `CREDIT_EARNED` varchar(150) NOT NULL,
  `TRAINING_INSTITUTION` varchar(150) NOT NULL,
  `MPAS` varchar(10000) NOT NULL,
  `OMPAS` varchar(150) NOT NULL,
  `EMPLOYABILITY` varchar(100) NOT NULL,
  `UNEMPLOYED_REASONS` varchar(10000) NOT NULL,
  `OTHER_UNEMP_REASON` varchar(150) NOT NULL,
  `EMP_TYPE` varchar(150) NOT NULL,
  `JOB_TITLE` varchar(150) NOT NULL,
  `RELEVANT` varchar(100) NOT NULL,
  `POSITION` varchar(150) NOT NULL,
  `COMPANY_NAME` varchar(150) NOT NULL,
  `COMPANY_ADDRESS` varchar(150) NOT NULL,
  `COM_CONTACT` varchar(150) NOT NULL,
  `MLB` varchar(150) NOT NULL,
  `SKILLS_LEARNED` varchar(10000) NOT NULL,
  `OTHER_SKILLS` varchar(150) NOT NULL,
  `BUSINESS_NAME` varchar(150) NOT NULL,
  `BUSINESS_ADDRESS` varchar(150) NOT NULL,
  `PROFIT` varchar(100) NOT NULL,
  `SUGGESTIONS` varchar(150) NOT NULL,
  `DATE_SUBMIT` varchar(100) NOT NULL,
  `ID_no` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`EMAIL`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `COURSE`, `MAJOR`, `BATCH`, `CIVIL`, `GENDER`, `BIRTHDAY`, `CONTACT`, `PERMANENT_ADD`, `REGION`, `PROVINCE`, `LOCATION_RES`, `AWARD`, `EXAM`, `DATE_TAKEN`, `RATING`, `RTC`, `ORTC`, `ADVANCE`, `CREDIT_EARNED`, `TRAINING_INSTITUTION`, `MPAS`, `OMPAS`, `EMPLOYABILITY`, `UNEMPLOYED_REASONS`, `OTHER_UNEMP_REASON`, `EMP_TYPE`, `JOB_TITLE`, `RELEVANT`, `POSITION`, `COMPANY_NAME`, `COMPANY_ADDRESS`, `COM_CONTACT`, `MLB`, `SKILLS_LEARNED`, `OTHER_SKILLS`, `BUSINESS_NAME`, `BUSINESS_ADDRESS`, `PROFIT`, `SUGGESTIONS`, `DATE_SUBMIT`, `ID_no`) VALUES
('jonathansales@gmail.com', 'Sales', 'Jonathan', 'D.', 'BSHM', 'N/A', '2021', 'Single', 'Male', '1996-10-11', '09786858744', 'xzmkvkzd', 'Region 8', 'Leyte', 'Municipality', '', '', '', '', '', '* ', '', '', '', '', '* ', 'Employed', '', '* ', 'Contractual', 'Job Order', 'Yes', '', '', '', '', '', '* Communication Skills.;\r\n', '* ', '', '', '', '', 'May 21, 2023', 1),
('jonathansales@gmail.com', 'Sales', 'Jonathan', 'Denatil', 'BSHM', 'N/A', '2021', 'Single', 'Male', '1996-11-10', '09185623392', 'Baguinbin', 'Region 8', 'Leyte', 'Municipality', 'qwerty', 'sskc', '', '', '', '* ', '', '', 'Vilma Mandawe Denatil', '', '* ', 'Unemployed', ' Family concern and decided not to find a job.;\r\n No job opportunity.;\r\n', '* ', '', '', '', '', '', '', '', '', '', '* ', '', '', '', '', 'May 25, 2023', 2),
('jonathansales@gmail.com', 'Sales', 'Jonathan', 'Denatil', 'BSHM', 'N/A', '2021', 'Single', 'Male', '0003-02-11', '09185623392', 'Baguinbin', 'Region 8', 'Leyte', 'Municipality', '', '', '', '', '', '* ', '', '', 'Vilma Mandawe Denatil', '', '* ', 'Employed', '', '* ', 'Regular or Permanent', 'Manager', 'Yes', 'Assitant', 'dsvdsdg', 'Baguinbin', '09185623392', 'Information and Communication Technology', '', '* ', '', '', 'P 20,000.00 to less than P 25, 000.00', '', 'May 26, 2023', 3),
('tingaleah@gmail.com', 'tinga', 'leah', 'suano', 'BSHM', 'N/A', '2004', 'Married', 'Female', '1982-03-24', '09499931719', 'sabang', 'Region 8', 'Leyte', 'Municipality', '', '', '', '', ' Strong passion for the profession.;\r\n', '* ', '', '', '', '', '* ', 'Unemployed', ' Advance  or further studies.;\r\n', '* ', '', '', '', '', '', '', '', '', '', '* ', '', '', '', '', 'June 05, 2023', 4),
('tingaleah@gmail.com', 'Tinga', 'Leah', 'Suano', 'BSHM', 'N/A', '2004', 'Married', 'Female', '41982-02-03', '09199931719', 'tababgo', 'Region 8', 'Leyte', 'Municipality', '', '', '', '', '', '* ', '', '', '', '', '* ', 'Employed', '', '* ', '', '', '', '', '', '', '', '', '', '* ', '', '', '', '', 'June 05, 2023', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_offer`
--

CREATE TABLE `jobs_offer` (
  `ID` int(100) NOT NULL,
  `JOB_TITLE` varchar(100) NOT NULL,
  `BANNER` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(10000) NOT NULL,
  `DATE_CREATED` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_offer`
--

INSERT INTO `jobs_offer` (`ID`, `JOB_TITLE`, `BANNER`, `DESCRIPTION`, `DATE_CREATED`) VALUES
(3, 'Computer Programmer II', 'img4.jpg', 'The Palompon Institute of Technology Tabango is hiring (1)Computer Programmer II Instructor . The Job offer is open until March 22, 2022.', 'April 30, 2023'),
(4, 'IT Instructors', 'img1.jpg', 'LOOK: The Palompon Institute of Technology Tabango is hiring (2) Instructors under Contract of Service (COS). The Job offer is open until June 30, 2022.', 'April 30, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `ID` int(100) NOT NULL,
  `TITLE` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `ABBREVIATION` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `DESCRIPTION` varchar(10000) CHARACTER SET utf8mb4 NOT NULL,
  `DATE_ADDED` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`ID`, `TITLE`, `ABBREVIATION`, `DESCRIPTION`, `DATE_ADDED`) VALUES
(13, 'Bachelor of Science in Information Technology', 'BSIT', '', 'March 21,2023'),
(20, 'Bachelor in Secondary Education', 'BSED', '', 'March 21,2023'),
(21, 'Bachelor of Science in Hospitality Management', 'BSHM', '', 'March 21,2023'),
(22, 'Bachelor in Elemantary Education', 'BEED', '', 'March 21,2023'),
(23, 'Bachelor in Technical-Vocational Teacher Education', 'BTVTEd', '', 'May 01,2023'),
(24, 'Bachelor of Technology and Livelihood Education', 'BTLED', '', 'May 01,2023'),
(25, 'Bachelor of Science in Fisheries', 'BSFi', '', 'May 01,2023'),
(26, 'Bachelor of Science in Industrial Technology', 'BSINT', '', 'May 01,2023');

-- --------------------------------------------------------

--
-- Table structure for table `submit_ats`
--

CREATE TABLE `submit_ats` (
  `ID` int(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `DATE_SUBMITED` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_ats`
--

INSERT INTO `submit_ats` (`ID`, `EMAIL`, `DATE_SUBMITED`) VALUES
(5, 'jonathansales@gmail.com', 'April 21, 2023 04:12:56 PM'),
(6, 'jessavillanueva@ymail.com', 'April 21, 2023 06:15:12 PM'),
(7, 'cleobethcostanilla@gmail.com', 'April 22, 2023 01:04:25 AM'),
(8, 'jonathansales@gmail.com', 'May 07, 2023 12:59:44 AM'),
(9, 'jessavillanueva@gmail.com', 'May 07, 2023 01:12:13 AM'),
(10, 'cleobethcostanilla@gmail.com', 'May 07, 2023 01:19:12 AM'),
(16, 'jonathansales@gmail.com', 'May 07, 2023 01:34:03 PM'),
(17, 'jonathansales@gmail.com', 'May 21, 2023 07:38:30 AM'),
(18, 'jonathansales@gmail.com', 'May 25, 2023 11:14:40 PM'),
(19, 'jonathansales@gmail.com', 'May 26, 2023 03:57:27 PM'),
(20, 'tingaleah@gmail.com', 'June 05, 2023 10:43:18 AM'),
(21, 'tingaleah@gmail.com', 'June 05, 2023 10:52:10 AM');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `ID` int(100) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `LASTNAME` varchar(150) NOT NULL,
  `FIRSTNAME` varchar(150) NOT NULL,
  `MIDDLENAME` varchar(150) NOT NULL,
  `COURSE` varchar(150) NOT NULL,
  `MAJOR` varchar(150) NOT NULL,
  `BATCH` varchar(100) NOT NULL,
  `CIVIL` varchar(100) NOT NULL,
  `GENDER` varchar(150) NOT NULL,
  `BIRTHDAY` varchar(150) NOT NULL,
  `CONTACT` varchar(150) NOT NULL,
  `PERMANENT_ADD` varchar(150) NOT NULL,
  `REGION` varchar(150) NOT NULL,
  `PROVINCE` varchar(150) NOT NULL,
  `LOCATION_RES` varchar(150) NOT NULL,
  `AWARD` varchar(150) NOT NULL,
  `EXAM` varchar(150) NOT NULL,
  `DATE_TAKEN` varchar(150) NOT NULL,
  `RATING` varchar(150) NOT NULL,
  `RTC` varchar(10000) NOT NULL,
  `ORTC` varchar(150) NOT NULL,
  `ADVANCE` varchar(150) NOT NULL,
  `CREDIT_EARNED` varchar(150) NOT NULL,
  `TRAINING_INSTITUTION` varchar(150) NOT NULL,
  `MPAS` varchar(10000) NOT NULL,
  `OMPAS` varchar(150) NOT NULL,
  `EMPLOYABILITY` varchar(100) NOT NULL,
  `UNEMPLOYED_REASONS` varchar(10000) NOT NULL,
  `OTHER_UNEMP_REASON` varchar(150) NOT NULL,
  `EMP_TYPE` varchar(150) NOT NULL,
  `JOB_TITLE` varchar(150) NOT NULL,
  `RELEVANT` varchar(100) NOT NULL,
  `POSITION` varchar(150) NOT NULL,
  `COMPANY_NAME` varchar(150) NOT NULL,
  `COMPANY_ADDRESS` varchar(150) NOT NULL,
  `COM_CONTACT` varchar(150) NOT NULL,
  `MLB` varchar(150) NOT NULL,
  `SKILLS_LEARNED` varchar(10000) NOT NULL,
  `OTHER_SKILLS` varchar(150) NOT NULL,
  `BUSINESS_NAME` varchar(150) NOT NULL,
  `BUSINESS_ADDRESS` varchar(150) NOT NULL,
  `PROFIT` varchar(100) NOT NULL,
  `SUGGESTIONS` varchar(150) NOT NULL,
  `DATE_SUBMIT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`ID`, `EMAIL`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `COURSE`, `MAJOR`, `BATCH`, `CIVIL`, `GENDER`, `BIRTHDAY`, `CONTACT`, `PERMANENT_ADD`, `REGION`, `PROVINCE`, `LOCATION_RES`, `AWARD`, `EXAM`, `DATE_TAKEN`, `RATING`, `RTC`, `ORTC`, `ADVANCE`, `CREDIT_EARNED`, `TRAINING_INSTITUTION`, `MPAS`, `OMPAS`, `EMPLOYABILITY`, `UNEMPLOYED_REASONS`, `OTHER_UNEMP_REASON`, `EMP_TYPE`, `JOB_TITLE`, `RELEVANT`, `POSITION`, `COMPANY_NAME`, `COMPANY_ADDRESS`, `COM_CONTACT`, `MLB`, `SKILLS_LEARNED`, `OTHER_SKILLS`, `BUSINESS_NAME`, `BUSINESS_ADDRESS`, `PROFIT`, `SUGGESTIONS`, `DATE_SUBMIT`) VALUES
(47, 'jonathansales@gmail.com', 'Sales', 'Jonathan', 'Denatil', 'BSHM', 'N/A', '2021', 'Single', 'Male', '0003-02-11', '09185623392', 'Baguinbin', 'Region 8', 'Leyte', 'Municipality', '', '', '', '', '', '* ', '', '', 'Vilma Mandawe Denatil', '', '* ', 'Employed', '', '* ', 'Regular or Permanent', 'Manager', 'Yes', 'Assitant', 'dsvdsdg', 'Baguinbin', '09185623392', 'Information and Communication Technology', '', '* ', '', '', 'P 20,000.00 to less than P 25, 000.00', '', 'May 26, 2023'),
(48, 'jessavillanueva@gmail.com', 'Villanueva', 'Jessa Fe', 'Fernando', 'BSHM', 'N/A', '2022', 'Single', 'Male', '3422-03-04', '09185623392', 'Baguinbin', 'Region 8', 'Leyte', 'Municipality', 'teyweyr', 'grr', '0785-08-07', 'dfhd', '* Strong passion for the profession.\r\n* Prospect for immediate employment.\r\n* Status or prestige of the profession.\r\n* Availability of course offering in chosen institution.\r\n', '* gggtth', 'hyy5', 'trr', 'Vilma Mandawe Denatil', '* For Promotion.\r\n* For Professional Developmanent.\r\n', '* fgdffd', 'Employed', '', '* ', 'Regular or Permanent', 'tyrrt', 'Yes', 'gdft', 'dsvdsdg', 'Baguinbin', '9185623392', 'Information and Communication Technology', '* Communication Skills.\r\n* Human Relations Skills.\r\n* Enterprenuerial Skills.\r\n', '* gffghfh', '', '', '0999', 'hghfh', 'May 07, 2023'),
(49, 'cleobethcostanilla@gmail.com', 'Costanilla', 'Cleobeth', 'Munez', 'BSHM', 'N/A', '2022', 'Single', 'Male', '2000-01-11', '09185623392', 'Campokpok, Tabango, Leyte', 'Region 8', 'Leyte', 'Municipality', 'geer', 'sssf', '2022-04-21', 'gr', 'highgrades\r\ngoodgrades\r\npeer\r\n', 'dgdg', 'hyy5', 'trr', 'trtrty', 'For Promotion\r\nFor Professional Developmanent\r\n', 'fdffd', 'Self-Employed', '', '', '', '', 'Yes', '', '', '', '', 'Information and Communication Technology', 'Communication Skills.\r\nHuman Relations Skills.\r\nEnterprenuerial Skills.\r\n', 'gffghfh', 'bdfgd', 'Baguinbin', '098766', 'hghfh', 'May 07, 2023'),
(50, 'tingaleah@gmail.com', 'Tinga', 'Leah', 'Suano', 'BSHM', 'N/A', '2004', 'Married', 'Female', '41982-02-03', '09199931719', 'tababgo', 'Region 8', 'Leyte', 'Municipality', '', '', '', '', '', '* ', '', '', '', '', '* ', 'Employed', '', '* ', '', '', '', '', '', '', '', '', '', '* ', '', '', '', '', 'June 05, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(100) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `BIRTHDAY` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERNAME`, `PASSWORD`, `LASTNAME`, `FIRSTNAME`, `BIRTHDAY`, `GENDER`, `ADDRESS`) VALUES
(1, 'ADMIN', 'admin123', '', '', '', '', ''),
(2, '4d136bbf5c7cf606ab12a9de08393839', 'f3ae4f3a9bf95ca00d1d5f9ce77082d4', 'Joemhar', 'Sales', '1995-02-09', 'Male', 'Baguinbin, Campokpok. Tabango, leyte 6536'),
(3, 'eac246a7fe7582cc4f56b1145b1b276e', 'e628be6786f73288ebdd352c9d4e0e1a', 'Tabango', 'PIT', '2023-06-11', 'Male', 'Otabon, Poblacion, Tabango, Leyte 6536');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_NUMBER` (`ID_NUMBER`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID_no`);

--
-- Indexes for table `jobs_offer`
--
ALTER TABLE `jobs_offer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ABBREVIATION` (`ABBREVIATION`);

--
-- Indexes for table `submit_ats`
--
ALTER TABLE `submit_ats`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs_offer`
--
ALTER TABLE `jobs_offer`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `submit_ats`
--
ALTER TABLE `submit_ats`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
