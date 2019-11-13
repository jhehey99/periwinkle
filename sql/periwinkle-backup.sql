-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 09:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `periwinkle`
--

-- --------------------------------------------------------

--
-- Table structure for table `accelerometerrecord`
--

CREATE TABLE `accelerometerrecord` (
  `RecordId` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `Filename` varchar(255) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `StopTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accelerometerrecord`
--

INSERT INTO `accelerometerrecord` (`RecordId`, `ClientId`, `Filename`, `StartTime`, `StopTime`) VALUES
(1, 9, 'accell4.par', '0001-01-01 00:00:00', '0001-01-01 00:00:00');

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

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountId`, `Username`, `AccTypeId`, `FirstName`, `LastName`, `Email`, `Contact`, `Birthday`, `Gender`, `DateRegistered`) VALUES
(10, 'contest', 1, 'first_consultant', 'last_consultant', 'first_lastkbpfgudzycbhqrbzasv@gmail.com', '09284131743', '2011-10-04', 'M', '2019-11-11 00:00:00'),
(11, 'clitest', 2, 'first_client', 'last_client', 'first_lastlfmxmkddfopvnhbyxf@gmail.com', '09043727119', '2016-08-13', 'M', '2019-11-11 00:00:00'),
(12, 'clioszrtiknrgwi', 2, 'first_rixKwoiQJJdCTAyMJãÓ', 'last_rixKwoiQJJdCTAyMJãÓ', 'first_lastoszrtiknrgwi@gmail.com', '09054307227', '1953-01-15', 'F', '2019-11-11 00:00:00'),
(13, 'cliopgmtmrneylpolxl', 2, 'first_gMpibPTGjOYfSHhxQńŠ', 'last_gMpibPTGjOYfSHhxQńŠ', 'first_lastopgmtmrneylpolxl@gmail.com', '09427723672', '1994-09-25', 'F', '2019-11-11 00:00:00'),
(14, 'clilfofxn', 2, 'first_HzXCzRuBgsymrsCwMîÂ', 'last_HzXCzRuBgsymrsCwMîÂ', 'first_lastlfofxn@gmail.com', '09205015144', '2007-07-27', 'F', '2019-11-11 00:00:00'),
(15, 'climcvlpsk', 2, 'first_ISSxuTgyUJEgbwżń', 'last_ISSxuTgyUJEgbwżń', 'first_lastmcvlpsk@gmail.com', '09533493748', '1964-09-02', 'M', '2019-11-11 00:00:00'),
(16, 'conknzeaakrvvwfjfwgjvy', 1, 'first_XfgxZdvbImkxzZRĆÌ', 'last_XfgxZdvbImkxzZRĆÌ', 'first_lastknzeaakrvvwfjfwgjvy@gmail.com', '09799482268', '1974-06-09', 'F', '2019-11-11 00:00:00'),
(17, 'clixakbdwuipgmmkr', 2, 'first_cEsOegcqnDixSZDléÂ', 'last_cEsOegcqnDixSZDléÂ', 'first_lastxakbdwuipgmmkr@gmail.com', '09467402321', '1962-03-11', 'F', '2019-11-11 00:00:00'),
(18, 'clihyvhibhgs', 2, 'first_kJsthwHBkVpPxdòĖ', 'last_kJsthwHBkVpPxdòĖ', 'first_lasthyvhibhgs@gmail.com', '09816959185', '1984-04-18', 'F', '2019-11-11 00:00:00'),
(19, 'cliyazjtwwfdayyth', 2, 'first_kjWBNcypvBwUYTëĄ', 'last_kjWBNcypvBwUYTëĄ', 'first_lastyazjtwwfdayyth@gmail.com', '09425638243', '1951-03-25', 'M', '2019-11-11 00:00:00'),
(20, 'clivdnavetncytus', 2, 'first_JIEuCZcVÇÙ', 'last_JIEuCZcVÇÙ', 'first_lastvdnavetncytus@gmail.com', '09356747384', '2004-10-23', 'M', '2019-11-11 00:00:00'),
(21, 'cliouuyfltjksfz', 2, 'first_mGjdOUPqJCtnYhVVūū', 'last_mGjdOUPqJCtnYhVVūū', 'first_lastouuyfltjksfz@gmail.com', '09246380249', '1989-03-24', 'F', '2019-11-11 00:00:00'),
(22, 'condoaxcybphwh', 1, 'first_rRVVZTkGŒį', 'last_rRVVZTkGŒį', 'first_lastdoaxcybphwh@gmail.com', '09531943925', '1974-05-23', 'M', '2019-11-13 00:00:00'),
(24, 'conmwzheo', 1, 'first_CbAIČî', 'last_CbAIČî', 'first_lastmwzheo@gmail.com', '09904260577', '2013-06-13', 'F', NULL),
(25, 'conhooqpqrbdgxfjibof', 1, 'first_sEiqUHaSSCIźä', 'last_sEiqUHaSSCIźä', 'first_lasthooqpqrbdgxfjibof@gmail.com', '09144673474', '1954-06-19', 'F', NULL),
(26, 'conehuvbzofnfbwefzz', 1, 'first_YuVvtOsFxqxVŹì', 'last_YuVvtOsFxqxVŹì', 'first_lastehuvbzofnfbwefzz@gmail.com', '09973749169', '1986-04-09', 'M', NULL),
(27, 'conarpmhgdcwuqakrimg', 1, 'first_efhNUOUXgvivkqWjŹÆ', 'last_efhNUOUXgvivkqWjŹÆ', 'first_lastarpmhgdcwuqakrimg@gmail.com', '09595752688', '2009-12-13', 'M', NULL),
(28, 'clizxggjiedyjcnjxr', 2, 'first_dyqMzHSANįÄ', 'last_dyqMzHSANįÄ', 'first_lastzxggjiedyjcnjxr@gmail.com', '09426232244', '1982-11-03', 'F', NULL),
(29, 'contlukhwcyaao', 1, 'first_EcSWYKsPsDZtmeŒì', 'last_EcSWYKsPsDZtmeŒì', 'first_lasttlukhwcyaao@gmail.com', '09572795569', '1966-10-21', 'M', NULL),
(30, 'clizhfrzefw', 2, 'first_IxZnRpkNYYIPoEsÔß', 'last_IxZnRpkNYYIPoEsÔß', 'first_lastzhfrzefw@gmail.com', '09044682976', '1962-04-07', 'F', '2019-11-11 00:00:00'),
(31, 'conuvrwibmp', 1, 'first_ynQfZyPbžÔ', 'last_ynQfZyPbžÔ', 'first_lastuvrwibmp@gmail.com', '09570134371', '2010-12-03', 'M', NULL),
(34, 'admin29', 0, 'first_nzhJNKuJgWKQRxuÝŽ', 'last_nzhJNKuJgWKQRxuÝŽ', 'first_lastdwjcmj@gmail.com', '09643344063', '2011-05-27', 'F', NULL);

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

--
-- Dumping data for table `behaviorgraph`
--

INSERT INTO `behaviorgraph` (`GraphId`, `GraphClientId`, `Filename`, `StartTime`, `StopTime`, `HighestPeak`, `LowestPeak`, `AveragePeak`, `LongestInterval`, `ShortestInterval`, `AverageInterval`) VALUES
(12, 9, 'graph12.pbg', '0001-01-01 00:00:00', '0001-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientId`, `CliAccountId`, `Weight`, `Height`, `MbesAttemptCount`, `MbesAllowAttempt`) VALUES
(9, 11, 122, 139, 0, 1),
(10, 12, 121, 118, 0, 1),
(11, 13, 118, 188, 0, 1),
(12, 14, 66, 115, 0, 1),
(13, 15, 103, 241, 0, 1),
(14, 17, 54, 228, 0, 1),
(15, 18, 92, 177, 0, 1),
(16, 19, 116, 100, 0, 1),
(17, 20, 58, 231, 0, 1),
(18, 21, 102, 229, 0, 1),
(19, 28, 143, 127, 0, 0),
(20, 30, 147, 220, 0, 1);

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

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`ConsultantId`, `ConAccountId`, `License`, `ApplicationDate`, `IsPending`) VALUES
(2, 10, '291043', '2019-11-11', 0),
(3, 16, '551664', '2019-11-11', 0),
(4, 22, '47664', '2019-11-11', 0),
(6, 24, '760751', '2019-11-11', 1),
(7, 25, '497577', '2019-11-11', 1),
(8, 26, '843946', '2019-11-11', 1),
(9, 27, '575488', '2019-11-11', 1),
(10, 29, '545080', '2019-11-11', 1),
(11, 31, '634313', '2019-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consultantclient`
--

CREATE TABLE `consultantclient` (
  `CcConsultantId` int(11) NOT NULL,
  `CcClientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultantclient`
--

INSERT INTO `consultantclient` (`CcConsultantId`, `CcClientId`) VALUES
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(10, 20);

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

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`PsAccountId`, `PasswordHash`, `PasswordSalt`) VALUES
(10, '$2a$12$i5IyWnZ/eUQ8EhyQqT.Jn.AAG1Ko3aMQ1TxDQx9cWW3vs0QqKZEEO', '$2a$12$i5IyWnZ/eUQ8EhyQqT.Jn.'),
(11, '$2a$12$K71vnFoEcZTetirkq/yXSu16LBg/g3Tz2EEg2.KsDrMzRBku0DKWW', '$2a$12$K71vnFoEcZTetirkq/yXSu'),
(12, '$2a$12$aDqnHcmPMnIw4GsKruA3Gezr7/uqMlQBd1EGPVGbSk6hUCqTVMwCe', '$2a$12$aDqnHcmPMnIw4GsKruA3Ge'),
(13, '$2a$12$lsEPu845r6ExHRmP2jy0tOwZjcRtFZ0n6dAiY1XpAXB39/jBVrQWW', '$2a$12$lsEPu845r6ExHRmP2jy0tO'),
(14, '$2a$12$NdK173yAVG26/c.GxxE0Auv5q9E.ZO0xOa7obQ4NI0eG1aDBVS1jW', '$2a$12$NdK173yAVG26/c.GxxE0Au'),
(15, '$2a$12$FWwIQHntVzPofmvb21.x5e56d1v7z1A/A5j5l7WQuZ8zW.065eMlO', '$2a$12$FWwIQHntVzPofmvb21.x5e'),
(16, '$2a$12$NIVeEDaoybqa.FCd33qdsO1V75TyfEwnnEczVHSj9btfiy8FfWQ0W', '$2a$12$NIVeEDaoybqa.FCd33qdsO'),
(17, '$2a$12$UJzXdJD.Wuxcz4ykbhxyNe1mH/RIvpX5wRCDoc1sGtQXfw/5BJHM6', '$2a$12$UJzXdJD.Wuxcz4ykbhxyNe'),
(18, '$2a$12$TdqT353hiGRhimC76y7xV.eRwNRYnBam7RLZsvq9V4WCjqhgCc/J6', '$2a$12$TdqT353hiGRhimC76y7xV.'),
(19, '$2a$12$9y8R/C5Xw7xOSkKzxWDQ8u1vUG27/qjn8/E4DBKDXZge4tLhLats6', '$2a$12$9y8R/C5Xw7xOSkKzxWDQ8u'),
(20, '$2a$12$9eSv6oJe1/oSf0/mWDx47eY02nzI5CCFU/3XmwiKFshzaPunQUocS', '$2a$12$9eSv6oJe1/oSf0/mWDx47e'),
(21, '$2a$12$mG3th9Sl04wnA4bJNmGc1u.xvLh2zzPzy2vlvJnzNSG4Hm1aPehfm', '$2a$12$mG3th9Sl04wnA4bJNmGc1u'),
(22, '$2a$12$pBtNfgRDWtMWEvB7D4Lk0.ylqN8xrQlb.mY4GwuQCjIktwQ7K0PAC', '$2a$12$pBtNfgRDWtMWEvB7D4Lk0.'),
(24, '$2a$12$htpG/jNAA1X9R4TQhH73YOKB3z.CbUF2Ja/2lsYqhQDwJtzsU6sAq', '$2a$12$htpG/jNAA1X9R4TQhH73YO'),
(25, '$2a$12$TurNMhfseEFcTIDziiyhbuUizS3GtB8SqfA.0qS9fAAp98F9gxw9W', '$2a$12$TurNMhfseEFcTIDziiyhbu'),
(26, '$2a$12$DGmaMZjHDwHhE1s1w3OI7Oma.DVAThWZpkUpZS7t9qtrPwvZifnEa', '$2a$12$DGmaMZjHDwHhE1s1w3OI7O'),
(27, '$2a$12$TdKR.Ijr2F1bvjIciOUtTed1BLZp5i/0VmUQwYE6BrhS5YfVBIbPW', '$2a$12$TdKR.Ijr2F1bvjIciOUtTe'),
(28, '$2a$12$HeFu95s4FyGbv4vM3YfWL.bDvKVxt.e1F/Nu3dXyag8RJbR2ZPh1.', '$2a$12$HeFu95s4FyGbv4vM3YfWL.'),
(29, '$2a$12$E242t5KMplVPSBAb1ZrA8utFW1F6w7DgZf7RUrs7SQ0QOzfHRrzWW', '$2a$12$E242t5KMplVPSBAb1ZrA8u'),
(30, '$2a$12$RzFSO4N6XfcATxHA0YAcse3uasywK/FYh.1Peqdi7hl/lrNGLvAQ.', '$2a$12$RzFSO4N6XfcATxHA0YAcse'),
(31, '$2a$12$9qTKIIvXBoKxxS2/IXgEzei3lVGhANSrbqM3UmwN9.z9bxZ81Qx8.', '$2a$12$9qTKIIvXBoKxxS2/IXgEze'),
(34, '$2a$12$8HDFCDTVDHH7UHOvg0jEtuIMqLaOelRxTkUZLyPxNb/vDO3U5Wn0m', '$2a$12$8HDFCDTVDHH7UHOvg0jEtu');

-- --------------------------------------------------------

--
-- Table structure for table `pendingconsultant`
--

CREATE TABLE `pendingconsultant` (
  `PendingConsultantId` int(11) NOT NULL,
  `RegistrationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensorrecord`
--

CREATE TABLE `sensorrecord` (
  `SensorRecordId` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `RecordType` int(11) NOT NULL,
  `Filename` varchar(255) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `StopTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sensorrecord`
--

INSERT INTO `sensorrecord` (`SensorRecordId`, `ClientId`, `RecordType`, `Filename`, `StartTime`, `StopTime`) VALUES
(1, 9, 0, 'hxuhsqrhomknjos.pbg', '2019-11-13 15:52:57', '2019-11-13 15:52:57'),
(2, 9, 0, 'srzhexhhhbu.pbg', '2019-11-13 15:53:39', '2019-11-13 15:53:39'),
(3, 9, 1, 'bllhgnzaiqo.par', '2019-11-13 15:56:08', '2019-11-13 15:56:08'),
(4, 9, 1, 'fsczfv.par', '2019-11-13 15:56:37', '2019-11-13 15:56:37'),
(5, 9, 0, 'wfwfqw.pbg', '2019-11-13 15:56:52', '2019-11-13 15:56:52'),
(6, 9, 1, 'nrdsfjenydwfrjcc.par', '2019-11-13 16:01:26', '2019-11-13 16:01:26'),
(7, 9, 0, 'hltbimf.pbg', '2019-11-13 16:01:26', '2019-11-13 16:01:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accelerometerrecord`
--
ALTER TABLE `accelerometerrecord`
  ADD PRIMARY KEY (`RecordId`),
  ADD UNIQUE KEY `Record_Filename_uindex` (`Filename`) USING BTREE,
  ADD UNIQUE KEY `Record_RecordId_uindex` (`RecordId`) USING BTREE,
  ADD KEY `RecordClientId` (`ClientId`);

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
-- Indexes for table `sensorrecord`
--
ALTER TABLE `sensorrecord`
  ADD PRIMARY KEY (`SensorRecordId`),
  ADD KEY `SensorRecordClientId` (`ClientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accelerometerrecord`
--
ALTER TABLE `accelerometerrecord`
  MODIFY `RecordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `behaviorgraph`
--
ALTER TABLE `behaviorgraph`
  MODIFY `GraphId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `consultant`
--
ALTER TABLE `consultant`
  MODIFY `ConsultantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `sensorrecord`
--
ALTER TABLE `sensorrecord`
  MODIFY `SensorRecordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accelerometerrecord`
--
ALTER TABLE `accelerometerrecord`
  ADD CONSTRAINT `RecordClientId` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ClientId`);

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

--
-- Constraints for table `sensorrecord`
--
ALTER TABLE `sensorrecord`
  ADD CONSTRAINT `SensorRecordClientId` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ClientId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
