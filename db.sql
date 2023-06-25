-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 12:19 PM
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
-- Database: `compass`
--
CREATE DATABASE IF NOT EXISTS `compass` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `compass`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `meetingID` int(11) NOT NULL,
  `membersID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`meetingID`, `membersID`, `date`, `time`) VALUES
(101, 1001, '2023-06-23', '13:14:02'),
(102, 1001, '2023-06-23', '15:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(10) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventVenue` varchar(255) NOT NULL,
  `eventDesc` text NOT NULL,
  `eventImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventDate`, `eventVenue`, `eventDesc`, `eventImg`) VALUES
(100, 'MLBB UiTM Championship', '2023-05-20', 'Dewan Karyawan 3', 'Ya Allah, sesungguhnya aku berlindung kepada-Mu, janganlah sampai aku tersesat atau disesatkan (syaitan atau orang jahat), tergelincir atau digelincirkan orang lain, menganiaya atau dianiaya orang lain, dan berbuat bodoh atau dibodohi orang lain.\" (HR Abu Dawud dan At Tirmidzi).', 'images/event-1.jpg'),
(101, 'Food King', '2023-06-23', 'Intan Food Court', 'Anda suka makan? Setiap kali anda makan seperti tiada hari esok? Andalah orangnya! Mari sertai pertandingan ini! Anda akan makan sehingga perut meletup. Pemenang akan mendapat penambahan berat badan!', 'images/event-2.jpg'),
(102, 'Topi', '2023-06-23', 'Bilik Saya', 'lorem blablalblablalbla', 'images/IMG_5028_1200x1200.webp'),
(103, 'Pak Mat Western', '2023-07-01', 'Restoran Pak Mat Western, Kulai, Johor', 'AAAAAKU BUKANLAH SUPERMAN, AKU JUGA BISA NANGIS', 'images/logo-pakmatwestern.png');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meetingID` int(11) NOT NULL,
  `meetingCode` varchar(255) NOT NULL,
  `meetingName` varchar(255) NOT NULL,
  `meetingDate` date NOT NULL,
  `meetingTime` time NOT NULL,
  `meetingVenue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`meetingID`, `meetingCode`, `meetingName`, `meetingDate`, `meetingTime`, `meetingVenue`) VALUES
(101, 'xyz123', 'Executive Meetings', '2023-06-23', '20:00:00', 'C001 - C002'),
(102, 'suka123', 'Suka Suka', '2023-06-23', '20:00:00', 'Dewan Sri Cempaka');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `membersID` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `membersName` varchar(255) NOT NULL,
  `membersPosition` varchar(255) NOT NULL,
  `membersCity` varchar(255) NOT NULL,
  `membersState` varchar(255) NOT NULL,
  `membersPart` int(2) NOT NULL,
  `membersPhone` varchar(255) NOT NULL,
  `membersEmail` varchar(255) NOT NULL,
  `membersLinkedin` varchar(255) NOT NULL,
  `membersImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`membersID`, `password`, `membersName`, `membersPosition`, `membersCity`, `membersState`, `membersPart`, `membersPhone`, `membersEmail`, `membersLinkedin`, `membersImg`) VALUES
(1001, 'ayel', 'Muhammad Azril bin Shukor', 'Treasurer', 'Muar', 'Johor', 4, '0195038620', 'mshahrizat05@gmail.com', 'www.linkedin.com/muhdazril', 'images\\photo_2023-05-30_15-44-51.jpg'),
(1002, 'jabir123', 'Zabir Asnawi bin Zailani', 'Secretary', 'Shah Alam', 'Selangor', 4, '0112345678', 'zabir03@gmail.com', 'www.linkedin/muhdjabir', 'images\\photo_2023-05-30_18-42-33.jpg\"'),
(1003, 'mal123', 'Ahmad Ikhmal bin Yakob', 'Multimedia', 'Kota Tinggi', 'Johor', 4, '0123456789', 'maltootz@gmail.com', 'www.linkedin/malboi', 'images\\photo_2023-05-30_18-42-37.jpg\"');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `merchID` int(10) NOT NULL,
  `merchName` varchar(255) NOT NULL,
  `merchDesc` varchar(255) NOT NULL,
  `merchStock` int(11) NOT NULL,
  `merchPrice` decimal(10,0) NOT NULL,
  `merchImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`merchID`, `merchName`, `merchDesc`, `merchStock`, `merchPrice`, `merchImg`) VALUES
(100, 'COMPASS Lanyard', 'A lanyard that comes with a stylish cardholder.', 0, 20, 'images\\il_fullxfull.2872300330_n7ru.webp'),
(101, 'COMPASS Workwear', 'A trendy workwear shirt that has COMPASS logo at chest.', 10, 70, 'images\\photo_2023-05-30_18-42-33.jpg'),
(102, 'COMPASS Cap', 'A stylish cap that match your daily outfits.', 0, 40, 'images\\IMG_5028_1200x1200.webp'),
(103, 'COMPASS Keychain', 'A mini compass keychain.', 10, 11, 'images\\61ycgCNgZCL._SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message_log`
--

CREATE TABLE `message_log` (
  `message_log` int(11) NOT NULL,
  `messageContent` text NOT NULL,
  `sentDate` date NOT NULL,
  `sentTime` time NOT NULL,
  `membersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_log`
--

INSERT INTO `message_log` (`message_log`, `messageContent`, `sentDate`, `sentTime`, `membersID`) VALUES
(1, 'Hello guys! How are you doing?', '2023-06-23', '09:17:12', 1002),
(2, 'Hello Jabir! Takyah acah borak english la kau wkwkwkkwk', '2023-06-23', '09:18:12', 1003),
(3, 'HAHAHAHAH tak baik sia mal. Kesian jabir asnawai kitee', '2023-06-23', '09:19:12', 1001),
(4, 'Mal memang do. Mentang mentang sekarang dah ada gf, dia berlagak lah ', '2023-06-23', '09:20:12', 1002),
(5, 'aloo lek ah. aku gurau je. btw kau bila lagi nak ada gf. president kita reject engko ke wkwkwkwkwkwkwkwk', '2023-06-23', '09:22:12', 1003),
(6, 'HAHAHAHAA. janganlah buat kantoi mal. member dah lama plan dan tu ', '2023-06-23', '09:24:12', 1001),
(7, 'diam diam jelah mal aduu. nanti dia baca malu lah aku xixixixi', '2023-06-23', '09:26:12', 1002),
(8, 'lek ah, dalam ni kan kita bertiga je baru ada wkwkwkk', '2023-06-23', '09:27:12', 1003),
(9, 'tu ah tu, baik do compass dah ada app', '2023-06-23', '09:30:12', 1002),
(10, 'mantap doo geys', '2023-06-23', '16:40:20', 1001),
(38, 'asdsd asdsdasd sasdsads asdasdasd sdasdasd sadsadasd sadsdasd sadsdasd asdasdsad asdasdsa dasdsadsa', '2023-06-23', '18:09:29', 1001),
(39, 'hellowww', '2023-06-23', '18:10:33', 1001),
(40, 'hellow mucukzz', '2023-06-23', '18:10:40', 1002),
(41, 'tengah buat ap tu jabir', '2023-06-23', '18:10:57', 1001),
(42, 'tengah on the way balik nich', '2023-06-23', '18:11:16', 1002),
(43, 'ooo, hati hati bir. jaga diri', '2023-06-23', '18:11:32', 1001),
(44, 'assalam', '2023-06-23', '18:11:56', 1001),
(45, 'waalaikumussalam', '2023-06-23', '18:12:05', 1002),
(46, 'btw, ko balik dengan qis ke tu xixixiix', '2023-06-23', '18:12:54', 1001),
(47, 'pala otak ko', '2023-06-23', '18:13:02', 1002),
(74, 'jangan marah hehe', '2023-06-23', '19:01:54', 1001),
(75, 'hfhffhh', '2023-06-23', '19:03:03', 1001),
(76, 'jhhjhj', '2023-06-23', '19:03:22', 1001),
(77, 'mantap doo geys', '2023-06-23', '22:10:34', 1001),
(78, 'hihihi', '2023-06-23', '22:15:23', 1001),
(79, 'jkjkj', '2023-06-23', '22:16:01', 1001),
(80, 'jkjkj', '2023-06-23', '22:16:17', 1001),
(81, 'hihi', '2023-06-23', '22:16:34', 1001),
(82, 'hello', '2023-06-23', '22:35:13', 1002),
(83, 'll', '2023-06-23', '22:35:18', 1002),
(84, 'jadi sudah huuhu', '2023-06-23', '23:09:57', 1002),
(85, 'buto ah jabir', '2023-06-23', '23:48:23', 1001),
(86, 'lllll', '2023-06-24', '21:37:31', 1001),
(87, 'oooo', '2023-06-24', '21:38:26', 1001),
(88, 'salam cuk', '2023-06-25', '01:53:16', 1002),
(89, 'nak apa bir', '2023-06-25', '01:53:31', 1001),
(90, 'test', '2023-06-25', '18:10:33', 1002),
(91, 'buset', '2023-06-25', '18:10:44', 1001),
(92, 'hihih', '2023-06-25', '18:11:07', 1002),
(93, 'hello', '2023-06-25', '18:12:17', 1002),
(94, 'sup', '2023-06-25', '18:12:34', 1001),
(95, 'test', '2023-06-25', '18:12:41', 1002),
(96, 'wkwkwk', '2023-06-25', '18:12:50', 1001),
(97, 'apa sih', '2023-06-25', '18:13:13', 1002),
(98, 'apakahh', '2023-06-25', '18:13:25', 1001),
(99, 'apa', '2023-06-25', '18:14:09', 1001),
(100, 'huhuhu', '2023-06-25', '18:14:17', 1001),
(101, 'b', '2023-06-25', '18:14:39', 1001),
(102, 'mende ko ni cuk', '2023-06-25', '18:14:55', 1002),
(103, 'diam ah bir', '2023-06-25', '18:15:17', 1001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`meetingID`,`membersID`),
  ADD UNIQUE KEY `meetingID` (`meetingID`),
  ADD KEY `pk_fk2` (`membersID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meetingID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`membersID`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`merchID`);

--
-- Indexes for table `message_log`
--
ALTER TABLE `message_log`
  ADD PRIMARY KEY (`message_log`),
  ADD KEY `pk_fk3` (`membersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `membersID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `merchID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `message_log`
--
ALTER TABLE `message_log`
  MODIFY `message_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `pk_fk1` FOREIGN KEY (`meetingID`) REFERENCES `meetings` (`meetingID`),
  ADD CONSTRAINT `pk_fk2` FOREIGN KEY (`membersID`) REFERENCES `members` (`membersID`);

--
-- Constraints for table `message_log`
--
ALTER TABLE `message_log`
  ADD CONSTRAINT `pk_fk3` FOREIGN KEY (`membersID`) REFERENCES `members` (`membersID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
