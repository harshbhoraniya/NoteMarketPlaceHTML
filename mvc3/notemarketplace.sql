-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 01:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notemarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryID`, `Name`, `CountryCode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 'India', '+91', '2021-03-01 17:16:57', 1, NULL, NULL, 1, 0),
(2, 'USA', '+01', '2021-03-02 17:16:57', 1, '2021-03-31 07:03:06', 7, 1, 0),
(3, 'United Kingdom', '+44', '2021-03-25 11:03:45', 7, '2021-03-31 07:03:49', 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `DownloadID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `IsSellerHasAllowedDownload` int(2) NOT NULL,
  `AttachmentPath` varchar(500) DEFAULT NULL,
  `IsAttachmentDownloaded` int(2) NOT NULL,
  `AttachmentDownloadedDate` datetime DEFAULT NULL,
  `IsPaid` int(2) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`DownloadID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsDeleted`) VALUES
(1, 1, 2, 3, 1, NULL, 1, '2021-03-23 11:03:57', 1, '250', 'Computer Operating System - Final Exam Book With Paper Solution', 'IT', '2021-03-04 17:46:20', 3, NULL, 2, 0),
(2, 2, 3, 2, 0, NULL, 0, '2021-03-05 17:58:08', 0, '0', 'Computer Science', 'Science', '2021-03-05 17:58:08', 2, NULL, NULL, 0),
(3, 3, 2, 7, 1, NULL, 1, '2021-03-23 11:03:00', 0, '0', 'Basic Computer Engineering Tech India Publication Series', 'IT', '2021-03-05 18:00:44', 7, NULL, 2, 0),
(4, 4, 7, 8, 1, NULL, 1, '2021-03-23 12:03:02', 1, '150', 'Computer Science Illuminted - Seventh Edition', 'Science', '2021-03-05 18:00:44', 8, NULL, 2, 0),
(5, 5, 7, 3, 1, NULL, 1, '2021-03-23 12:03:58', 1, '750', 'The Principle of Computer Hardware -Oxford', 'IT', '2021-03-05 18:00:44', 3, NULL, 2, 0),
(6, 4, 7, 9, 0, NULL, 1, '2021-03-04 11:08:18', 1, '150', 'Computer Science Illuminted - Seventh Edition', 'Science', '2021-03-16 11:12:21', 9, '2021-03-16 11:12:21', 9, 0),
(7, 4, 7, 8, 1, NULL, 1, '2021-03-23 08:03:15', 1, '150', 'Computer Science Illuminted - Seventh Edition', 'Science', '2021-03-16 11:12:21', 8, '2021-03-16 11:12:21', 8, 0),
(8, 2, 3, 9, 0, NULL, 0, NULL, 0, '0', 'Computer Science', 'Science', '2021-03-22 22:44:35', 9, '2021-03-22 22:44:35', 9, 0),
(9, 3, 2, 9, 1, NULL, 1, '2021-03-23 12:03:02', 0, '0', 'Basic Computer Engineering Tech India Publication Series', 'IT', '2021-03-22 22:47:02', 9, '2021-03-22 22:47:02', 2, 0),
(12, 11, 9, 7, 1, NULL, 0, NULL, 0, '0', 'The Computer Book', 'Commerce', '2021-03-22 22:49:33', 7, '2021-03-22 22:49:33', 7, 0),
(13, 13, 9, 7, 1, NULL, 0, NULL, 0, '0', 'Computer Book', 'IT', '2021-03-22 22:50:15', 7, '2021-03-22 22:50:15', 7, 0),
(14, 16, 8, 11, 1, NULL, 1, '2021-03-23 08:03:06', 0, '0', 'The Computer Book', 'Science', '2021-03-23 10:25:47', 11, '2021-03-23 10:25:47', 8, 0),
(15, 10, 7, 9, 0, NULL, 1, '2021-03-24 12:03:17', 1, '150', 'The Computer Book', 'IT', '2021-03-24 16:26:07', 9, '2021-03-24 12:03:17', 7, 0),
(16, 5, 7, 9, 1, NULL, 1, '2021-03-24 12:03:01', 1, '750', 'The Principle of Computer Hardware -Oxford', 'IT', '2021-03-24 16:28:34', 9, '2021-03-24 12:03:01', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notecategories`
--

CREATE TABLE `notecategories` (
  `NoteCategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notecategories`
--

INSERT INTO `notecategories` (`NoteCategoryID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 'Science', 'Science Biology', '2021-03-03 17:23:29', 1, '2021-03-26 08:03:47', 2, 1, 0),
(2, 'Commerce', 'Commerce', '2021-03-03 17:25:33', 2, '2021-03-31 07:03:38', 7, 1, 0),
(3, 'Social', 'Social', '2021-03-03 17:25:33', 7, NULL, NULL, 1, 0),
(4, 'IT', 'IT', '2021-03-03 17:25:33', 1, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notetype`
--

CREATE TABLE `notetype` (
  `NoteTypeID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notetype`
--

INSERT INTO `notetype` (`NoteTypeID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 'School Note', 'School Note', '2021-03-03 17:27:26', 1, NULL, NULL, 1, 0),
(2, 'University Note', 'University Note', '2021-03-03 17:27:26', 1, '2021-03-31 07:03:18', 7, 1, 0),
(3, 'Handwritten Book ', 'Handwritten Book', '2021-03-03 17:27:26', 1, NULL, NULL, 1, 0),
(4, 'Story Book', 'Story Book', '2021-03-03 17:27:26', 1, NULL, NULL, 1, 0),
(5, 'Novel', 'Novel', '2021-03-03 17:27:26', 1, NULL, NULL, 1, 0),
(6, 'Fashion', 'Magazine for Fashion', '2021-03-26 08:03:15', 2, '2021-03-26 08:03:23', 2, 1, 0),
(7, 'The Sporting Magazine', 'Magazine for Sports', '2021-03-26 08:03:39', 2, '2021-03-26 08:03:20', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `ReferenceDataID` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `Datavalue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`ReferenceDataID`, `Value`, `Datavalue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 'Male', 'M', 'Gender', '2021-03-01 17:10:11', 1, NULL, NULL, 1, 0),
(2, 'Female', 'Fe', 'Gender', '2021-03-01 12:39:11', 1, NULL, NULL, 1, 0),
(3, 'Unknown', 'U', 'Gender', '2021-03-01 17:08:56', 1, NULL, NULL, 1, 0),
(4, 'Paid', 'P', 'Selling Mode', '2021-03-01 12:43:41', 1, NULL, NULL, 1, 0),
(5, 'Free', 'F', 'Selling Mode', '2021-03-01 12:39:11', 1, NULL, NULL, 1, 0),
(6, 'Draft', 'Draft', 'Notes Status', '2021-03-02 17:10:55', 1, NULL, NULL, 1, 0),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-03-01 17:10:55', 1, NULL, NULL, 1, 0),
(8, 'In Review', 'In Review', 'Notes Status', '2021-03-01 17:10:55', 1, NULL, NULL, 1, 0),
(9, 'Published', 'Published', 'Notes Status', '2021-03-01 17:10:55', 1, NULL, NULL, 1, 0),
(10, 'Rejected', 'Rejected', 'Notes Status', '2021-03-01 17:10:55', 1, NULL, NULL, 1, 0),
(11, 'Removed', 'Removed', 'Notes Status', '2021-03-01 17:10:55', 1, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sellernotes`
--

CREATE TABLE `sellernotes` (
  `SellerNoteID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` varchar(500) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(500) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` int(2) NOT NULL,
  `SellingPrice` decimal(10,0) DEFAULT NULL,
  `NotesPreview` varchar(500) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellernotes`
--

INSERT INTO `sellernotes` (`SellerNoteID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 2, 9, 2, NULL, '2021-03-03 17:29:11', 'Computer Operating System - Final Exam Book With Paper Solution', 4, 'search1.png', 2, 250, 'This Book contain last 5 year solved paper.', 'Darshan Institute', 1, 'Operating System', '248706', 'Mr. Harsh Patel', 1, '250', 'preview_150321121701.pdf', '2021-03-03 17:29:11', 2, NULL, NULL, 1, 0),
(2, 3, 9, 1, NULL, '2021-03-04 17:29:11', 'Computer Science', 1, 'search2.png', 2, 105, 'This book for computer students.', 'Nirma', 2, 'Computer Name', '248705', 'Mr. Rechard Brown', 0, '0', 'preview_150321121701.pdf', '2021-03-11 17:59:25', 3, '2021-03-11 17:59:25', NULL, 1, 0),
(3, 2, 9, 1, NULL, '2021-03-04 17:34:53', 'Basic Computer Engineering Tech India Publication Series', 4, 'search3.png', 2, 350, 'This Book Published By India Series.', 'DAIICT', 1, 'Computer Science', NULL, NULL, 0, '0', 'preview_150321121701.pdf', '2021-03-11 17:59:33', 2, '2021-03-11 17:59:33', NULL, 1, 0),
(4, 7, 9, 1, NULL, '2021-03-03 17:30:54', 'Computer Science Illuminted - Seventh Edition', 1, 'search4.png', 4, 340, 'This book for those students which study the computer science in school.', 'IIT', 1, 'Computer Science', '2170103', 'Mr. Yash Gadhiya', 1, '150', 'preview_150321121701.pdf', '2021-03-04 17:40:00', 7, '2021-03-05 17:40:00', 7, 1, 0),
(5, 7, 9, 1, NULL, '2021-03-04 17:30:54', 'The Principle of Computer Hardware -Oxford', 4, 'search5.png', 2, 444, 'This book is contain main principle of computer hardware. This book help to understand of all hardware of computer.', 'University Of Oxford', 2, 'Hardware Management', '2180108', 'Mr. Happy Patel', 1, '750', 'preview_150321121701.pdf', '2021-03-04 11:31:36', 7, NULL, 7, 1, 0),
(6, 2, 9, 1, NULL, '2021-03-09 14:57:39', 'The Computer Book', 1, 'search6.png', 3, 100, 'This book has basic details about computer.', 'University of California', 2, 'Basic Computer', '3170115', 'Mr. Bhavik Patel', 0, '0', 'preview_150321121701.pdf', '2021-03-18 11:31:55', 2, NULL, 2, 1, 0),
(9, 7, 10, 2, 'Please rename the title with good name', '2021-03-16 14:57:32', 'HImanshu', 4, 'bp_150321121701.png', 2, 1111, 'fwa iwe nawkjenwea nkn', 'Oxford', 1, 'Basic Science', '1816841', 'wgenerionioerngn', 0, '0', 'preview_150321121701.pdf', '2021-03-15 16:47:01', 7, '2021-03-15 16:47:01', 7, 1, 0),
(10, 7, 9, 2, 'This book has no concept for reader', '2021-03-17 14:57:43', 'The Computer Book', 4, 'bp_170321102244.png', 2, 1183, 'This book for those student which want to clear their basic concept of computer.', 'University Of Taxas', 2, 'Computer', '2147856', 'Mr. Himanshu Patel', 1, '150', 'preview_170321102244.pdf', '2021-03-17 14:52:44', 7, '2021-03-17 14:52:44', 7, 1, 0),
(11, 9, 9, 2, NULL, '2021-03-18 11:56:12', 'The Computer Book', 2, 'bp_170321103421.png', 3, 1254, 'This book for those student which want to clear their basic concept of computer.', 'IIT', 1, 'Computer', '1816841', 'Mr. Harsh Patel', 0, '0', 'preview_170321103421.pdf', '2021-03-17 15:04:21', 9, '2021-03-17 15:04:21', 9, 1, 0),
(12, 9, 9, 9, NULL, '2021-03-20 11:56:28', 'The Computer Book', 3, 'bp_170321103636.png', 5, 215, 'This book for those student which want to clear their basic concept of computer.', 'University Of Atlantas', 2, 'Computer Enigineering', '2145637', 'Mr. Raj Patel', 1, '125', 'preview_170321103636.pdf', '2021-03-17 15:06:36', 9, '2021-03-17 15:06:36', 9, 1, 0),
(13, 9, 10, 2, 'This book is appropriate for reader', NULL, 'Computer Book', 4, 'bp_170321103937.png', 2, 1245, 'This book for those student which want to clear their basic concept of computer.', 'University Of California', 2, 'Computer Science', '1478523', 'Mr. Yash Patel', 0, '0', 'preview_170321103937.pdf', '2021-03-17 15:09:37', 9, '2021-03-17 15:09:37', 9, 1, 0),
(14, 8, 9, 8, NULL, '2021-03-30 11:56:41', 'The Computer', 4, 'bp_170321104459.png', 2, 254, 'This book for those student which want to clear their basic concept of computer.', 'DEIT', 1, 'Computer Science', '2147856', 'Mr. Harsh Patel', 1, '2000', 'preview_170321104459.pdf', '2021-03-17 15:14:59', 8, '2021-03-17 15:14:59', 8, 1, 0),
(15, 8, 8, 8, NULL, NULL, 'The Computer Book', 3, 'bp_170321104915.png', 2, 254, 'This book for those student which want to clear their basic concept of computer.', 'DAIICT', 1, 'Computer', '1816841', 'Mr. Himanshu Patel', 0, '0', 'preview_170321104915.pdf', '2021-03-17 15:19:15', 8, '2021-04-08 13:04:40', 2, 1, 0),
(16, 8, 9, 8, NULL, '2021-04-01 11:57:05', 'The Computer Book', 1, 'bp_170321105223.png', 2, 254, 'This book for those student which want to clear their basic concept of computer.', 'University Of California', 2, 'Computer Science', '1478523', 'Mr. Raj Patel', 0, '0', 'preview_170321105223.pdf', '2021-03-17 15:22:23', 8, '2021-03-17 15:22:23', 8, 1, 0),
(17, 8, 9, 8, NULL, '2021-04-02 11:57:15', 'Harsh Patel', 4, 'bp_170321105932.png', 3, 258, 'This book for those student which want to clear their basic concept of computer.', 'SVNIT', 1, 'Computer Enigineering', '2147856', 'Mr. Raj Patel', 0, '0', 'preview_170321105932.pdf', '2021-03-17 15:29:32', 8, '2021-04-06 07:04:34', 2, 1, 0),
(18, 8, 9, 8, NULL, '2021-04-03 11:57:25', 'The Computer Book', 3, 'bp_170321110354.png', 2, 254, 'This book for those student which want to clear their basic concept of computer.', 'University Of Taxas', 2, 'Computer Science', '2147856', 'Mr. Himanshu Patel', 1, '210', 'preview_170321110354.pdf', '2021-03-17 15:33:54', 8, '2021-03-17 15:33:54', 8, 1, 0),
(19, 8, 7, 8, NULL, NULL, 'The Computer Book', 2, 'bp_170321111012.png', 3, 125, 'This book for those student which want to clear their basic concept of computer.', 'IIT', 1, 'Computer', '2147856', 'Mr. Himanshu Patel', 0, '0', 'preview_170321111012.pdf', '2021-03-17 15:40:12', 8, '2021-03-17 15:40:12', 8, 1, 0),
(20, 8, 7, 8, NULL, NULL, 'The Computer Book', 2, 'bp_170321111229.png', 2, 123, 'This book for those student which want to clear their basic concept of computer.', 'University Of California', 2, 'Computer Science', '1816841', 'Mr. Raj Patel', 0, '0', 'preview_170321111229.pdf', '2021-03-17 15:42:29', 8, '2021-03-17 15:42:29', 8, 1, 0),
(21, 9, 7, 9, NULL, '2021-03-17 11:14:43', 'The Computer Book', 2, 'bp_170321111428.png', 2, 1111, 'This book for those student which want to clear their basic concept of computer.', 'University Of Atlantas', 2, 'Computer', '1478523', 'Mr. Yash Patel', 1, '120', 'preview_170321111428.pdf', '2021-03-17 15:44:28', 9, '2021-03-17 15:44:28', 9, 1, 0),
(22, 9, 7, 9, NULL, '2021-03-16 16:31:38', 'The Computer Book', 2, 'bp_170321111826.png', 2, 125, 'AddNotes.php:5 Uncaught SyntaxError: missing ) after argument list', 'University Of Taxas', 1, 'Computer Science', '2145637', 'Mr. Harsh Patel', 0, '0', 'preview_170321111826.pdf', '2021-03-17 15:48:26', 9, '2021-03-17 15:48:26', 9, 1, 0),
(23, 9, 7, 9, NULL, '2021-03-17 11:20:13', 'The Computer Book', 2, 'bp_170321112007.png', 2, 1111, 'AddNotes.php:5 Uncaught SyntaxError: missing ) after argument list', 'University Of California', 2, 'Computer Science', '1478523', 'Mr. Raj Patel', 0, '0', 'preview_170321112007.pdf', '2021-03-17 15:50:07', 9, '2021-03-17 15:50:07', 9, 1, 0),
(24, 9, 7, 9, NULL, '2021-03-17 11:22:22', 'Computer Book', 2, 'bp_170321112213.png', 2, 1111, 'This book for those student which want to clear their basic concept of computer.', 'University Of Taxas', 2, 'Computer Science', '2147856', 'Mr. Himanshu Patel', 0, '0', 'preview_170321112213.pdf', '2021-03-17 15:52:13', 9, '2021-03-17 15:52:13', 9, 1, 0),
(25, 3, 7, 3, NULL, '2021-03-17 11:26:28', 'The Computer Book', 4, 'bp_170321112611.png', 2, 1111, 'This book for those student which want to clear their basic concept of computer.', 'University Of California', 2, 'Computer Science', '2147856', 'Mr. Raj Patel', 0, '0', 'preview_170321112611.pdf', '2021-03-17 15:56:11', 3, '2021-03-17 15:56:11', 3, 1, 0),
(26, 3, 7, 3, NULL, '2021-03-17 11:33:11', 'Computer Book', 3, 'bp_170321112855.png', 2, 1111, 'This book for those student which want to clear their basic concept of computer.', 'University Of Taxas', 2, 'Computer', '1478523', 'Mr. Himanshu Patel', 1, '254', 'preview_170321112855.pdf', '2021-03-17 15:58:55', 3, '2021-03-17 15:58:55', 3, 1, 0),
(27, 3, 7, 3, NULL, '2021-03-17 11:35:27', 'The Computer Book', 2, 'bp_170321113350.png', 2, 254, 'echo $quer', 'University Of California', 2, 'Computer Science', '2147856', 'Mr. Himanshu Patel', 1, '254', 'preview_170321113350.pdf', '2021-03-17 16:03:50', 3, '2021-03-17 16:03:50', 3, 1, 0),
(31, 9, 7, 9, NULL, '2021-03-17 11:50:05', 'The Computer Book', 2, 'bp_170321115001.png', 2, 254, 'Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.', 'IIT', 2, 'Computer Enigineering', '2145637', 'Mr. Himanshu Patel', 0, '0', 'preview_170321115001.pdf', '2021-03-17 16:20:01', 9, '2021-03-17 16:20:01', 9, 1, 0),
(32, 9, 7, 9, NULL, '2021-03-17 11:52:20', 'Computer Book', 2, 'bp_170321115208.png', 2, 258, 'Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.', 'University Of Atlantas', 2, 'Computer', '5665', 'Mr. Himanshu Patel', 1, '25', 'preview_170321115208.pdf', '2021-03-17 16:22:08', 9, '2021-03-17 16:22:08', 9, 1, 0),
(33, 9, 7, 9, NULL, '2021-03-17 11:54:40', 'The Computer Book', 2, 'bp_170321115433.png', 2, 254, 'Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.', 'IIT', 2, 'Computer Enigineering', '1478523', 'Mr. Himanshu Patel', 0, '0', 'preview_170321115433.pdf', '2021-03-17 16:24:33', 9, '2021-03-17 16:24:33', 9, 1, 0),
(34, 9, 7, 9, NULL, '2021-03-17 11:59:22', 'The Computer Book', 2, 'bp_170321115917.png', 2, 1111, 'PHPMailer\\PHPMailer\\Exception: SMTP Error: Could not authenticate', 'University Of California', 2, 'Computer Science', '2147856', 'Mr. Himanshu Patel', 0, '0', 'preview_170321115917.pdf', '2021-03-17 16:29:17', 9, '2021-03-17 16:29:17', 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachements`
--

CREATE TABLE `sellernotesattachements` (
  `SellerNotesAttachmentID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellernotesattachements`
--

INSERT INTO `sellernotesattachements` (`SellerNotesAttachmentID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(8, 9, 'Attachment_[0]_150321121701.pdf', '../upload/7/9/Attachment/Attachment_[0]_150321121701.pdf', NULL, 7, NULL, 7, 1, 0),
(10, 10, 'Attachment_[0]_170321102244.pdf', '../upload/7/10/Attachment/Attachment_[0]_170321102244.pdf', '2021-03-17 14:52:44', 7, '2021-03-17 14:52:44', 7, 1, 0),
(11, 11, 'Attachment_[0]_170321103421.pdf', '../upload/9/11/Attachment/Attachment_[0]_170321103421.pdf', '2021-03-17 15:04:21', 9, '2021-03-17 15:04:21', 9, 1, 0),
(12, 12, 'Attachment_[0]_170321103636.pdf', '../upload/9/12/Attachment/Attachment_[0]_170321103636.pdf', '2021-03-17 15:06:36', 9, '2021-03-17 15:06:36', 9, 1, 0),
(13, 13, 'Attachment_[0]_170321103937.pdf', '../upload/9/13/Attachment/Attachment_[0]_170321103937.pdf', '2021-03-17 15:09:37', 9, '2021-03-17 15:09:37', 9, 1, 0),
(14, 14, 'Attachment_[0]_170321104459.pdf', '../upload/8/14/Attachment/Attachment_[0]_170321104459.pdf', '2021-03-17 15:14:59', 8, '2021-03-17 15:14:59', 8, 1, 0),
(15, 15, 'Attachment_[0]_170321104915.pdf', '../upload/8/15/Attachment/Attachment_[0]_170321104915.pdf', '2021-03-17 15:19:15', 8, '2021-03-17 15:19:15', 8, 1, 0),
(16, 16, 'Attachment_[0]_170321105224.pdf', '../upload/8/16/Attachment/Attachment_[0]_170321105224.pdf', '2021-03-17 15:22:24', 8, '2021-03-17 15:22:24', 8, 1, 0),
(17, 17, 'Attachment_[0]_170321105932.pdf', '../upload/8/17/Attachment/Attachment_[0]_170321105932.pdf', '2021-03-17 15:29:32', 8, '2021-03-17 15:29:32', 8, 1, 0),
(18, 18, 'Attachment_[0]_170321110354.pdf', '../upload/8/18/Attachment/Attachment_[0]_170321110354.pdf', '2021-03-17 15:33:54', 8, '2021-03-17 15:33:54', 8, 1, 0),
(19, 19, 'Attachment_[0]_170321111012.pdf', '../upload/8/19/Attachment/Attachment_[0]_170321111012.pdf', '2021-03-17 15:40:12', 8, '2021-03-17 15:40:12', 8, 1, 0),
(20, 20, 'Attachment_[0]_170321111229.pdf', '../upload/8/20/Attachment/Attachment_[0]_170321111229.pdf', '2021-03-17 15:42:29', 8, '2021-03-17 15:42:29', 8, 1, 0),
(21, 21, 'Attachment_[0]_170321111429.pdf', '../upload/9/21/Attachment/Attachment_[0]_170321111429.pdf', '2021-03-17 15:44:29', 9, '2021-03-17 15:44:29', 9, 1, 0),
(22, 22, 'Attachment_[0]_170321111826.pdf', '../upload/9/22/Attachment/Attachment_[0]_170321111826.pdf', '2021-03-17 15:48:26', 9, '2021-03-17 15:48:26', 9, 1, 0),
(23, 23, 'Attachment_[0]_170321112007.pdf', '../upload/9/23/Attachment/Attachment_[0]_170321112007.pdf', '2021-03-17 15:50:07', 9, '2021-03-17 15:50:07', 9, 1, 0),
(24, 24, 'Attachment_[0]_170321112213.pdf', '../upload/9/24/Attachment/Attachment_[0]_170321112213.pdf', '2021-03-17 15:52:13', 9, '2021-03-17 15:52:13', 9, 1, 0),
(25, 25, 'Attachment_[0]_170321112611.pdf', '../upload/3/25/Attachment/Attachment_[0]_170321112611.pdf', '2021-03-17 15:56:11', 3, '2021-03-17 15:56:11', 3, 1, 0),
(26, 26, 'Attachment_[0]_170321112855.pdf', '../upload/3/26/Attachment/Attachment_[0]_170321112855.pdf', '2021-03-17 15:58:55', 3, '2021-03-17 15:58:55', 3, 1, 0),
(27, 27, 'Attachment_[0]_170321113350.pdf', '../upload/3/27/Attachment/Attachment_[0]_170321113350.pdf', '2021-03-17 16:03:50', 3, '2021-03-17 16:03:50', 3, 1, 0),
(31, 31, 'Attachment_[0]_170321115001.pdf', '../upload/9/31/Attachment/Attachment_[0]_170321115001.pdf', '2021-03-17 16:20:01', 9, '2021-03-17 16:20:01', 9, 1, 0),
(32, 32, 'Attachment_[0]_170321115209.pdf', '../upload/9/32/Attachment/Attachment_[0]_170321115209.pdf', '2021-03-17 16:22:09', 9, '2021-03-17 16:22:09', 9, 1, 0),
(33, 33, 'Attachment_[0]_170321115433.pdf', '../upload/9/33/Attachment/Attachment_[0]_170321115433.pdf', '2021-03-17 16:24:33', 9, '2021-03-17 16:24:33', 9, 1, 0),
(34, 34, 'Attachment_[0]_170321115917.pdf', '../upload/9/34/Attachment/Attachment_[0]_170321115917.pdf', '2021-03-17 16:29:17', 9, '2021-03-17 16:29:17', 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreportedissues`
--

CREATE TABLE `sellernotesreportedissues` (
  `SellerNotesReportedIssueID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReportedByID` int(11) NOT NULL,
  `AgainstDownloadID` int(11) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--

CREATE TABLE `sellernotesreviews` (
  `SellerNotesReviewID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReviewedByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Ratings` decimal(10,2) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellernotesreviews`
--

INSERT INTO `sellernotesreviews` (`SellerNotesReviewID`, `NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 1, 3, 2, '3.00', 'Good Book', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(2, 1, 7, 2, '5.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(3, 1, 8, 2, '3.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(4, 1, 9, 2, '4.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(5, 1, 10, 2, '1.00', 'Bad', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(6, 1, 12, 2, '5.00', 'Good', '2021-03-24 09:54:10', 12, '2021-03-24 09:54:10', 12, 1, 0),
(7, 2, 2, 3, '4.00', 'Good', '2021-03-24 09:54:10', 2, '2021-03-24 09:54:10', 2, 1, 0),
(8, 2, 7, 3, '3.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(9, 2, 8, 3, '4.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(10, 2, 9, 3, '3.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(11, 2, 10, 3, '2.00', 'Good', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(12, 2, 11, 3, '2.00', 'Bad', '2021-03-24 09:54:10', 11, '2021-03-24 09:54:10', 11, 1, 0),
(13, 3, 3, 2, '4.00', 'Good', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(14, 3, 7, 2, '3.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(15, 3, 8, 2, '5.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(16, 3, 9, 2, '4.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(17, 3, 10, 2, '1.00', 'Bad', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(18, 3, 12, 2, '5.00', 'Good', '2021-03-24 09:54:10', 12, '2021-03-24 09:54:10', 12, 1, 0),
(19, 4, 3, 7, '5.00', 'Good', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(20, 4, 8, 7, '3.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(21, 4, 9, 7, '3.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(22, 4, 10, 7, '2.00', 'Bad', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(23, 4, 11, 7, '4.00', 'Good', '2021-03-24 09:54:10', 11, '2021-03-24 09:54:10', 11, 1, 0),
(24, 5, 3, 7, '2.00', 'Bad', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(25, 5, 8, 7, '3.00', 'Good', '2021-03-24 09:54:10', 5, '2021-03-24 09:54:10', 5, 1, 0),
(26, 5, 9, 7, '4.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(27, 5, 10, 7, '3.00', 'Good', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(28, 5, 12, 7, '3.00', 'Good', '2021-03-24 09:54:10', 12, '2021-03-24 09:54:10', 12, 1, 0),
(29, 6, 8, 2, '3.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(30, 6, 7, 2, '5.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(31, 6, 10, 2, '3.00', 'Good', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(32, 9, 3, 7, '5.00', 'Good', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(33, 9, 10, 7, '2.00', 'Bad', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(34, 9, 12, 7, '5.00', 'Good', '2021-03-24 09:54:10', 12, '2021-03-24 09:54:10', 12, 1, 0),
(35, 10, 8, 7, '5.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(36, 10, 10, 7, '2.00', 'Bad', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(37, 10, 9, 7, '3.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(38, 11, 7, 9, '5.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(39, 11, 8, 9, '5.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(40, 11, 11, 9, '3.00', 'Good', '2021-03-24 09:54:10', 11, '2021-03-24 09:54:10', 11, 1, 0),
(41, 12, 3, 9, '5.00', 'Good', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(42, 12, 8, 9, '4.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(43, 12, 11, 9, '4.00', 'Good', '2021-03-24 09:54:10', 11, '2021-03-24 09:54:10', 11, 1, 0),
(44, 13, 3, 9, '5.00', 'Good', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(45, 13, 7, 9, '2.00', 'Bad', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(46, 13, 8, 9, '4.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(47, 14, 3, 8, '5.00', 'Good', '2021-03-24 09:54:10', 8, '2021-03-24 09:54:10', 8, 1, 0),
(48, 14, 7, 8, '3.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(49, 14, 9, 8, '3.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(50, 15, 10, 8, '3.00', 'Good', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(51, 15, 11, 8, '4.00', 'Good', '2021-03-24 09:54:10', 11, '2021-03-24 09:54:10', 11, 1, 0),
(52, 15, 12, 8, '3.00', 'Good', '2021-03-24 09:54:10', 12, '2021-03-24 09:54:10', 12, 1, 0),
(53, 16, 7, 8, '3.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(54, 16, 9, 8, '5.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(55, 16, 3, 8, '3.00', 'Good', '2021-03-24 09:54:10', 3, '2021-03-24 09:54:10', 3, 1, 0),
(56, 17, 7, 8, '5.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0),
(57, 17, 9, 8, '3.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(58, 17, 10, 8, '3.00', 'Good', '2021-03-24 09:54:10', 10, '2021-03-24 09:54:10', 10, 1, 0),
(59, 18, 12, 8, '5.00', 'Good', '2021-03-24 09:54:10', 12, '2021-03-24 09:54:10', 12, 1, 0),
(60, 18, 9, 8, '5.00', 'Good', '2021-03-24 09:54:10', 9, '2021-03-24 09:54:10', 9, 1, 0),
(61, 18, 7, 8, '4.00', 'Good', '2021-03-24 09:54:10', 7, '2021-03-24 09:54:10', 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `systemconfigurations`
--

CREATE TABLE `systemconfigurations` (
  `SystemConfigID` int(11) NOT NULL,
  `SCKey` varchar(100) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `IsEmailVerified` int(2) NOT NULL,
  `Token` varchar(50) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBY` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `Token`, `CreatedDate`, `CreatedBY`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 1, 'Harsh', 'Bhoraniya', 'hdrsh19@gmail.com', '1', 1, '', '2021-03-01 17:07:28', 1, NULL, NULL, 1, 0),
(2, 2, 'Harsh', 'Patel', 'hdrsh128@gmail.com', '1', 1, '', '2021-03-01 17:07:28', 1, NULL, NULL, 1, 0),
(3, 3, 'Yash', 'Bhatasana', 'ypatel2000@gmail.com', '1', 1, '', '2021-03-01 17:08:56', 1, NULL, NULL, 1, 0),
(7, 3, 'Badboy', 'Lucifer', 'badboys2811@gmail.com', '1', 1, '5aca0f21546509a2594bb7146553d544', NULL, NULL, '2021-03-25 16:03:23', 7, 1, 0),
(8, 3, 'Harsh', 'Bhoraniya', 'harshkumarbhoraniya@gmail.com', 'ha', 1, 'b3c624ba379f7d4e1158401623d6b0df', NULL, NULL, NULL, NULL, 1, 0),
(9, 3, 'Himanshu', 'Bhoraniya', 'himanshubhoraniya1997@gmail.com', '1', 1, '8c221f5a7acd7dc596cd1c738217756e', '2021-03-16 10:30:08', NULL, '2021-03-31 07:03:15', 7, 1, 0),
(10, 3, 'Bhavik', 'Patel', 'bhavik.exam@gmail.com', '1', 1, '3dcf6b95b1c6424bc4431b8cb806df0d', '2021-03-17 16:49:45', NULL, '2021-03-17 16:49:45', NULL, 1, 0),
(11, 3, 'Bhavik', 'Patel', 'yadavbhavik.senseque@gmail.com', '1', 1, 'f7a3c532caa437cde6713ac3ddfcd367', '2021-03-17 16:56:35', NULL, '2021-03-31 07:03:12', 7, 1, 0),
(12, 2, 'Hiral', 'Bhoraniya', '170540107016@darshan.ac.in', '1', 1, '39306420c5af7be240596784409ce68c', NULL, NULL, '2021-04-07 07:04:16', 12, 1, 0),
(13, 2, 'Shubham', 'Vadukul', 'shubham.vadukul@searce.com', 'admin123', 1, '1cfc7d231ff9c534a19e3ab7fdbcd59f', '2021-04-06 07:04:02', 2, '2021-04-07 07:04:07', 13, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `UserProfileID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) DEFAULT NULL,
  `CountryCode` varchar(5) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`UserProfileID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `CountryCode`, `PhoneNumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsDeleted`) VALUES
(1, 1, '1999-11-01 11:01:14', 1, 'hdrsh1199@gmail.com', '+91', '9099096043', 'pp_250321014616.png', 'Radhe Residency', 'Raiya ROad', 'Rajkot', 'Gujarat', '360007', 'India', 'Gujarat Technologically University', 'Darshan Institute Of Engineering and Technology', '2021-03-01 17:18:13', 1, NULL, NULL, 0),
(2, 2, '1999-11-28 17:18:13', 1, NULL, '+91', '9099096042', 'pp_250321014919.png', 'Kothariya', 'Kothariya Road', 'Rajkot', 'Gujarat', '360001', 'India', 'Gujarat Technologically University', 'Darshan Institute Of Engineering and Technology', '2021-03-02 17:18:13', 2, NULL, NULL, 0),
(3, 8, '1999-11-01 00:00:00', 1, NULL, '+91', '9099096043', 'pp_240321083253.png', '802 Tower C', 'Ganesh Genesis SG High Way', 'Ahmedabad', 'Gujarat', '380001', 'USA', 'Nirma', 'Nirma', '2021-03-24 13:02:53', 8, '2021-03-24 13:02:53', 8, 0),
(8, 9, '1998-11-17 00:00:00', 1, NULL, '+91', '9099096040', 'pp_240321092705.png', '801 Tower C', 'Ganesh Genesis SG High Way', 'Ahmedabad', 'Gujarat', '380001', 'India', 'Nirma', 'Nirma', '2021-03-24 13:19:58', 9, '2021-03-24 09:03:05', 9, 0),
(9, 7, '1999-11-13 00:00:00', 1, NULL, '+44', '2145789300', 'pp_250321015140.png', 'Deanshanger Memorial', 'Community Cent', 'Little London', 'London', '012345', 'United Kingdom', 'University of Cambridge', 'University of Cambridge', '2021-03-25 13:03:16', 7, '2021-03-25 13:03:40', 7, 0),
(11, 10, '1998-01-01 00:00:00', 1, NULL, '+01', '2354789610', 'pp_250321015710.jpg', '423 N', 'Frederic St', 'Burbank', 'CA', '91505', 'USA', 'Harvard University', 'Harvard University', '2021-03-25 13:03:10', 10, '2021-03-25 13:03:10', 10, 0),
(12, 11, '1996-06-08 00:00:00', 1, NULL, '+01', '7458963217', 'pp_250321015947.jpg', '6828 Shoestrng', 'Hill Rd', 'Quincy', 'PA', '17247', 'USA', 'Columbia University', 'Columbia University', '2021-03-25 13:03:47', 11, '2021-03-25 13:03:47', 11, 0),
(13, 3, '2001-01-16 00:00:00', 3, NULL, '+91', '7412589632', 'pp_250321020452.jpg', '501-3 Vallabh Terrace', 'Sardar V Patel Road', 'Mumbai', 'Maharashtra', '400004', 'India', 'University of Mumbai', 'University of Mumbai', '2021-03-25 14:03:52', 3, '2021-03-25 14:03:52', 3, 0),
(19, 13, NULL, NULL, 'shubhamvadukul@gmail.com', '+91', '9428603778', 'pp_070421071307.jpg', '', '', '', '', '', NULL, NULL, NULL, '2021-04-06 07:04:59', 2, '2021-04-07 07:04:07', 13, 0),
(20, 12, NULL, NULL, 'hiralbhoraniya@gmail.com', '+44', '7456982130', 'pp_070421072616.jpg', '', '', '', '', '', NULL, NULL, NULL, '2021-04-07 07:04:16', 12, '2021-04-07 07:04:16', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `UserRoleID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`UserRoleID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) VALUES
(1, 'Super Admin', 'Super', '2021-02-12 10:40:47', NULL, NULL, NULL, 1, 0),
(2, 'Admin', 'Sub Admin Which handle the site and data', '2021-02-24 10:38:53', NULL, NULL, NULL, 1, 0),
(3, 'Member', 'This is sell books and download books.', '2021-02-24 10:38:53', NULL, NULL, NULL, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryID`),
  ADD KEY `CountryCode` (`CountryCode`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`DownloadID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD PRIMARY KEY (`NoteCategoryID`);

--
-- Indexes for table `notetype`
--
ALTER TABLE `notetype`
  ADD PRIMARY KEY (`NoteTypeID`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`ReferenceDataID`);

--
-- Indexes for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD PRIMARY KEY (`SellerNoteID`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `Category` (`Category`),
  ADD KEY `NoteType` (`NoteType`),
  ADD KEY `Country` (`Country`);

--
-- Indexes for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  ADD PRIMARY KEY (`SellerNotesAttachmentID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD PRIMARY KEY (`SellerNotesReportedIssueID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedByID` (`ReportedByID`),
  ADD KEY `AgainstDownloadID` (`AgainstDownloadID`);

--
-- Indexes for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD PRIMARY KEY (`SellerNotesReviewID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `sellernotesreviews_ibfk_3` (`AgainstDownloadsID`);

--
-- Indexes for table `systemconfigurations`
--
ALTER TABLE `systemconfigurations`
  ADD PRIMARY KEY (`SystemConfigID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`UserProfileID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Gender` (`Gender`),
  ADD KEY `CountryCode` (`CountryCode`),
  ADD KEY `Country` (`Country`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`UserRoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `DownloadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `NoteCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notetype`
--
ALTER TABLE `notetype`
  MODIFY `NoteTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ReferenceDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `SellerNoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  MODIFY `SellerNotesAttachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `SellerNotesReportedIssueID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `SellerNotesReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `systemconfigurations`
--
ALTER TABLE `systemconfigurations`
  MODIFY `SystemConfigID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `UserProfileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `UserRoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`SellerNoteID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD CONSTRAINT `sellernotes_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `sellernotes_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `referencedata` (`ReferenceDataID`),
  ADD CONSTRAINT `sellernotes_ibfk_3` FOREIGN KEY (`Category`) REFERENCES `notecategories` (`NoteCategoryID`),
  ADD CONSTRAINT `sellernotes_ibfk_4` FOREIGN KEY (`NoteType`) REFERENCES `notetype` (`NoteTypeID`),
  ADD CONSTRAINT `sellernotes_ibfk_5` FOREIGN KEY (`Country`) REFERENCES `countries` (`CountryID`);

--
-- Constraints for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  ADD CONSTRAINT `sellernotesattachements_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`SellerNoteID`);

--
-- Constraints for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`SellerNoteID`),
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_3` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`DownloadID`);

--
-- Constraints for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD CONSTRAINT `sellernotesreviews_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`SellerNoteID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`UserRoleID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`ReferenceDataID`),
  ADD CONSTRAINT `userprofile_ibfk_3` FOREIGN KEY (`CountryCode`) REFERENCES `countries` (`CountryCode`),
  ADD CONSTRAINT `userprofile_ibfk_4` FOREIGN KEY (`Country`) REFERENCES `countries` (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
