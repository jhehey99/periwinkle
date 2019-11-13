-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 03:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prod_periwinkle`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountId` int(11) NOT NULL,
  `Username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AccTypeId` int(11) NOT NULL,
  `FirstName` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthday` date NOT NULL,
  `Gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateRegistered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `AccountTypeId` int(11) NOT NULL,
  `AccountTypeName` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`AccountTypeId`, `AccountTypeName`) VALUES
(0, 'Admin'),
(2, 'Client'),
(1, 'Consultant');

-- --------------------------------------------------------

--
-- Table structure for table `behaviorgraph`
--

CREATE TABLE `behaviorgraph` (
  `GraphId` int(11) NOT NULL,
  `GraphClientId` int(11) NOT NULL,
  `Filename` varchar(255) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `StopTime` datetime DEFAULT NULL,
  `HighestPeak` float DEFAULT NULL COMMENT 'voltage',
  `LowestPeak` float DEFAULT NULL COMMENT 'voltage',
  `AveragePeak` float DEFAULT NULL COMMENT 'voltage',
  `LongestInterval` float DEFAULT NULL COMMENT 'in seconds',
  `ShortestInterval` float DEFAULT NULL COMMENT 'in seconds\n',
  `AverageInterval` float DEFAULT NULL COMMENT 'in seconds\n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientId` int(11) NOT NULL,
  `CliAccountId` int(11) NOT NULL,
  `Weight` float DEFAULT NULL,
  `Height` float DEFAULT NULL,
  `MbesAttemptCount` int(11) DEFAULT 0,
  `MbesAllowAttempt` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `ConsultantId` int(11) NOT NULL,
  `ConAccountId` int(11) NOT NULL,
  `License` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ApplicationDate` date DEFAULT NULL,
  `IsPending` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultantclient`
--

CREATE TABLE `consultantclient` (
  `CcConsultantId` int(11) NOT NULL,
  `CcClientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journalentry`
--

CREATE TABLE `journalentry` (
  `JournalEntryId` int(11) NOT NULL,
  `JournalClientId` int(11) NOT NULL,
  `Title` tinytext NOT NULL,
  `Body` text DEFAULT NULL,
  `DateTimeCreated` datetime DEFAULT NULL,
  `ImageFileName` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mbes`
--

CREATE TABLE `mbes` (
  `MbesId` int(11) NOT NULL,
  `MbesClientId` int(11) NOT NULL,
  `Height` float DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `BMI` float DEFAULT NULL,
  `DateCreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mbesresponse`
--

CREATE TABLE `mbesresponse` (
  `MbesResponseId` int(11) NOT NULL,
  `AttemptId` int(11) NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `ScaleValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `PsAccountId` int(11) NOT NULL,
  `PasswordHash` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordSalt` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendingconsultant`
--

CREATE TABLE `pendingconsultant` (
  `PendingConsultantId` int(11) NOT NULL,
  `RegistrationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountId`),
  ADD UNIQUE KEY `Account_AccountId_uindex` (`AccountId`),
  ADD UNIQUE KEY `Account_Contact_uindex` (`Contact`),
  ADD UNIQUE KEY `Account_Email_uindex` (`Email`),
  ADD UNIQUE KEY `Account_Username_uindex` (`Username`),
  ADD KEY `AccTypeId` (`AccTypeId`);

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`AccountTypeId`),
  ADD UNIQUE KEY `AccountType_AccountTypeId_uindex` (`AccountTypeId`),
  ADD UNIQUE KEY `AccountType_AccountTypeName_uindex` (`AccountTypeName`);

--
-- Indexes for table `behaviorgraph`
--
ALTER TABLE `behaviorgraph`
  ADD PRIMARY KEY (`GraphId`),
  ADD UNIQUE KEY `BehaviorGrap_Filename_uindex` (`Filename`),
  ADD UNIQUE KEY `BehaviorGrap_GraphId_uindex` (`GraphId`),
  ADD KEY `GraphClientId` (`GraphClientId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientId`),
  ADD UNIQUE KEY `Client_ClientId_uindex` (`ClientId`),
  ADD KEY `CliAccountId` (`CliAccountId`);

--
-- Indexes for table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`ConsultantId`),
  ADD UNIQUE KEY `Consultant_ConsultantId_uindex` (`ConsultantId`),
  ADD KEY `ConAccountId` (`ConAccountId`);

--
-- Indexes for table `consultantclient`
--
ALTER TABLE `consultantclient`
  ADD PRIMARY KEY (`CcConsultantId`,`CcClientId`),
  ADD KEY `CcClientId` (`CcClientId`);

--
-- Indexes for table `journalentry`
--
ALTER TABLE `journalentry`
  ADD PRIMARY KEY (`JournalEntryId`),
  ADD UNIQUE KEY `JournalEntry_JournalEntryId_uindex` (`JournalEntryId`);

--
-- Indexes for table `mbes`
--
ALTER TABLE `mbes`
  ADD PRIMARY KEY (`MbesId`),
  ADD KEY `mbes_client_ClientId_fk` (`MbesClientId`);

--
-- Indexes for table `mbesresponse`
--
ALTER TABLE `mbesresponse`
  ADD KEY `mbesresponse_mbes_MbesId_fk` (`MbesResponseId`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`PsAccountId`);

--
-- Indexes for table `pendingconsultant`
--
ALTER TABLE `pendingconsultant`
  ADD PRIMARY KEY (`PendingConsultantId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `behaviorgraph`
--
ALTER TABLE `behaviorgraph`
  MODIFY `GraphId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consultant`
--
ALTER TABLE `consultant`
  MODIFY `ConsultantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `journalentry`
--
ALTER TABLE `journalentry`
  MODIFY `JournalEntryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mbes`
--
ALTER TABLE `mbes`
  MODIFY `MbesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `AccTypeId` FOREIGN KEY (`AccTypeId`) REFERENCES `accounttype` (`AccountTypeId`);

--
-- Constraints for table `behaviorgraph`
--
ALTER TABLE `behaviorgraph`
  ADD CONSTRAINT `GraphClientId` FOREIGN KEY (`GraphClientId`) REFERENCES `client` (`ClientId`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `CliAccountId` FOREIGN KEY (`CliAccountId`) REFERENCES `account` (`AccountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultant`
--
ALTER TABLE `consultant`
  ADD CONSTRAINT `ConAccountId` FOREIGN KEY (`ConAccountId`) REFERENCES `account` (`AccountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultantclient`
--
ALTER TABLE `consultantclient`
  ADD CONSTRAINT `CcClientId` FOREIGN KEY (`CcClientId`) REFERENCES `client` (`ClientId`),
  ADD CONSTRAINT `CcConsultantId` FOREIGN KEY (`CcConsultantId`) REFERENCES `consultant` (`ConsultantId`);

--
-- Constraints for table `journalentry`
--
ALTER TABLE `journalentry`
  ADD CONSTRAINT `JournalClientId` FOREIGN KEY (`JournalEntryId`) REFERENCES `client` (`ClientId`);

--
-- Constraints for table `mbes`
--
ALTER TABLE `mbes`
  ADD CONSTRAINT `mbes_client_ClientId_fk` FOREIGN KEY (`MbesClientId`) REFERENCES `client` (`ClientId`);

--
-- Constraints for table `mbesresponse`
--
ALTER TABLE `mbesresponse`
  ADD CONSTRAINT `mbesresponse_mbes_MbesId_fk` FOREIGN KEY (`MbesResponseId`) REFERENCES `mbes` (`MbesId`);

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `PsAccountId` FOREIGN KEY (`PsAccountId`) REFERENCES `account` (`AccountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendingconsultant`
--
ALTER TABLE `pendingconsultant`
  ADD CONSTRAINT `ConsultantId` FOREIGN KEY (`PendingConsultantId`) REFERENCES `consultant` (`ConsultantId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
