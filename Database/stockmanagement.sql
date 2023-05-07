-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 08:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `SL` int(11) NOT NULL,
  `Quantity` varchar(30) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `ItemCode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`SL`, `Quantity`, `Type`, `ItemCode`, `date`, `Time`) VALUES
(1, '10', 'BUY', 'ITEM750', '2023-05-06', '11:19:41 am'),
(2, '9', 'BUY', 'ITEM364', '2023-05-06', '11:19:41 am'),
(3, '25', 'BUY', 'ITEM687', '2023-05-05', '11:19:41 am'),
(4, '12', 'BUY', 'ITEM354', '2023-05-05', '11:19:41 am'),
(5, '8', 'BUY', 'ITEM728', '2023-05-05', '11:20:31 am'),
(6, '3', 'BUY', 'ITEM725', '2023-05-05', '11:21:44 am'),
(7, '6', 'BUY', 'ITEM414', '2023-05-05', '11:21:44 am'),
(8, '20', 'BUY', 'ITEM762', '2023-05-05', '11:23:52 am'),
(9, '5', 'BUY', 'ITEM394', '2023-05-05', '11:23:52 am'),
(10, '14', 'BUY', 'ITEM447', '2023-05-05', '11:23:52 am'),
(11, '35', 'BUY', 'ITEM260', '2023-05-05', '11:23:52 am'),
(12, '4', 'BUY', 'ITEM243', '2023-05-05', '11:25:40 am'),
(13, '12', 'BUY', 'ITEM513', '2023-05-05', '11:25:40 am'),
(14, '23', 'BUY', 'ITEM150', '2023-05-05', '11:25:40 am'),
(15, '20', 'BUY', 'ITEM336', '2023-05-05', '11:25:40 am'),
(16, '1', 'SELL', 'ITEM750', '2023-05-05', '11:27:50 am'),
(17, '1', 'SELL', 'ITEM354', '2023-05-05', '11:27:50 am'),
(18, '1', 'SELL', 'ITEM762', '2023-05-05', '11:27:50 am'),
(19, '1', 'SELL', 'ITEM447', '2023-05-05', '11:27:50 am'),
(20, '1', 'SELL', 'ITEM336', '2023-05-05', '11:27:50 am'),
(21, '1', 'SELL', 'ITEM728', '2023-05-05', '14:43:23 pm'),
(22, '1', 'SELL', 'ITEM447', '2023-05-05', '14:43:23 pm'),
(23, '1', 'SELL', 'ITEM336', '2023-05-05', '14:43:23 pm'),
(24, '1', 'SELL', 'ITEM447', '2023-05-06', '10:36:53 am'),
(25, '1', 'SELL', 'ITEM260', '2023-05-06', '10:36:53 am'),
(26, '1', 'SELL', 'ITEM687', '2023-05-07', '00:39:27 am'),
(27, '2', 'SELL', 'ITEM150', '2023-05-07', '00:39:27 am'),
(28, '2', 'BUY', 'ITEM750', '2023-05-07', '23:41:18 pm'),
(29, '5', 'BUY', 'ITEM150', '2023-05-07', '23:41:18 pm'),
(30, '2', 'BUY', 'ITEM336', '2023-05-07', '23:44:23 pm'),
(31, '2', 'BUY', 'ITEM447', '2023-05-07', '23:57:43 pm'),
(32, '1', 'SELL', 'ITEM750', '2023-05-08', '00:03:30 am'),
(33, '1', 'SELL', 'ITEM447', '2023-05-08', '00:03:30 am'),
(34, '1', 'SELL', 'ITEM336', '2023-05-08', '00:03:30 am'),
(35, '1', 'SELL', 'ITEM725', '2023-05-08', '00:14:07 am');

-- --------------------------------------------------------

--
-- Table structure for table `buying`
--

CREATE TABLE `buying` (
  `SL` int(11) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `ItemCode` varchar(20) NOT NULL,
  `ItemQuantity` varchar(30) NOT NULL,
  `BuyingAmount` int(20) NOT NULL,
  `SellingAmount` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buying`
--

INSERT INTO `buying` (`SL`, `Category`, `ItemName`, `ItemCode`, `ItemQuantity`, `BuyingAmount`, `SellingAmount`, `Date`, `Time`) VALUES
(1, '1', '1', '2', 'ITEM750', 50000, 54490, '2023-05-07', '23:41:18'),
(2, '5', '14', '5', 'ITEM150', 300, 399, '2023-05-07', '23:41:18'),
(3, '5', '15', '2', 'ITEM336', 500, 690, '2023-05-07', '23:44:23'),
(4, '4', '10', '2', 'ITEM447', 999, 1499, '2023-05-07', '23:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `CategoryStatus` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `CategoryName`, `CategoryStatus`, `Date`, `Time`) VALUES
(1, 'Laptop', 'Active', '2023-05-05', '11:15:56 am'),
(2, 'Laptop Adaptor', 'Active', '2023-05-05', '11:15:56 am'),
(3, 'Methorbord', 'Active', '2023-05-05', '11:15:56 am'),
(4, 'Storage Devices', 'Active', '2023-05-05', '11:15:56 am'),
(5, 'kwyboard', 'Active', '2023-05-05', '11:15:56 am');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detalis`
--

CREATE TABLE `customer_detalis` (
  `csl` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `PurchesDate` date NOT NULL,
  `Referance` varchar(30) NOT NULL,
  `PhoneNo` varchar(16) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Discount` varchar(20) NOT NULL,
  `Tax` varchar(20) NOT NULL,
  `SubTotal` varchar(20) NOT NULL,
  `TotalAmount` varchar(20) NOT NULL,
  `PaymentType` varchar(20) NOT NULL,
  `PaymentStatus` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_detalis`
--

INSERT INTO `customer_detalis` (`csl`, `Name`, `PurchesDate`, `Referance`, `PhoneNo`, `Email`, `Address`, `Discount`, `Tax`, `SubTotal`, `TotalAmount`, `PaymentType`, `PaymentStatus`, `Date`, `Time`) VALUES
(1, 'Mamun All Rasid', '2023-05-05', 'CCMP05050551', '7001731589', 'mamunallrasid20@gmail.com', 'Bis2wajit Mess, Debinagar, Raiganj', '10', '18', '61924', '66877.92', 'Online', 'Success', '2023-05-05', '11:27:50 am'),
(2, 'Sushama Parvin Ahammed', '2023-05-05', 'CCMP05050544', '8170969489', 'sushamaparvin32@gmail.com', 'Uttar Chirail Mandal Para Kaliyaganj 733129', '5', '18', '2986', '3374.18', 'Online', 'Success', '2023-05-05', '14:43:23 pm'),
(3, 'Osman Goni', '2023-05-06', 'CCMP06050539', '9012873290', 'osman4564@gmail.com', 'Kumed Pur,Itahar,Raiganj', '5', '18', '2057', '2324.41', 'Cash', 'Success', '2023-05-06', '10:36:53 am'),
(4, 'Mamun All Rasid', '2023-05-07', 'CCMP06050545', '7001731589', 'rasidallmamun2345@gmail.com', 'Sahebghata,Raiganj,Uttar Dinajpur', '2', '18', '1198', '1389.67', 'Cash', 'Success', '2023-05-07', '00:39:27 am'),
(5, 'Israt Banu Sarkar', '2023-05-08', 'CCMP07050530', '8933238901', 'isratbanu346@gmail.com', 'opposite Side of Star Nurshing Home,Collage Para,Raiganj,733134', '10', '18', '51999', '56158.92', 'Cash', 'Success', '2023-05-08', '00:03:30 am'),
(6, 'Rasid All Mamun', '2023-05-08', 'CCMP07050522', '7001731589', 'rasid458@gmail.com', 'Saheebghata Malgaon Grampanchayet Kaliyaganj', '5', '18', '30498', '34462.74', 'pending', 'Pending', '2023-05-08', '00:14:07 am');

-- --------------------------------------------------------

--
-- Table structure for table `itemes`
--

CREATE TABLE `itemes` (
  `ItemSl` int(11) NOT NULL,
  `ItemCategory` varchar(10) NOT NULL,
  `ItemName` varchar(500) NOT NULL,
  `ItemAmount` int(50) NOT NULL,
  `ItemCode` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemes`
--

INSERT INTO `itemes` (`ItemSl`, `ItemCategory`, `ItemName`, `ItemAmount`, `ItemCode`, `Date`, `Time`) VALUES
(1, '1', 'ASUS TUF Gaming A15 Ryzen 5 Hexa Core AMD R5-4600H - (8 GB/1 TB SSD/Windows 11 Home/4 GB Graphics/NVIDIA GeForce GTX 1650/144 Hz) FA506IHRZ-HN112W Gaming Laptop  (15.6 inch, Graphite Black, 2.30 Kg)', 50000, 'ITEM750', '2023-05-05', '11:19:41 am'),
(2, '1', 'ASUS TUF Gaming A17 with 90Whr Battery Ryzen 7 Octa Core AMD R7-4800H - (8 GB/512 GB SSD/Windows 11 Home/4 GB Graphics/NVIDIA GeForce RTX RTX 3050/144 Hz) FA706ICB-HX061W | FA706IC-HX036W Gaming Laptop  (17.3 Inch, Graphite Black, 2.60 Kg)', 67900, 'ITEM364', '2023-05-05', '11:19:41 am'),
(3, '2', 'Dell 14‑3451', 600, 'ITEM687', '2023-05-05', '11:19:41 am'),
(4, '2', 'LENOVO ALL', 850, 'ITEM354', '2023-05-05', '11:19:41 am'),
(5, '2', 'Lapcare LOADHY5023 Laptop Adapter Designed for HP 65 Watt with 4.5 x 3 mm', 599, 'ITEM728', '2023-05-05', '11:20:31 am'),
(6, '3', 'ASUS TUF Gaming Z790-PLUS D4 Intel Z790 LGA 1700 ATX Gaming Motherboard with 16+1 DrMOS Power Stages, PCIe 5.0, DDR4 RAM Support, M.2 Slots, USB 3.2 Gen 2x2 Type-C, and Aura Sync RGB Lighting.', 30498, 'ITEM725', '2023-05-05', '11:21:44 am'),
(7, '3', 'Zebronics H61 Motherboard ATX Intel LGA 1155 Socket | 6USB,1VGA,1LAN,1Audio,1HDMI Port, DDR3', 2524, 'ITEM414', '2023-05-05', '11:21:44 am'),
(8, '4', 'Seagate Expansion 1TB External HDD - USB 3.0 for Windows and Mac with 3 yr Data Recovery Services, Portable Hard Drive (STKM1000400)', 4197, 'ITEM762', '2023-05-05', '11:23:52 am'),
(9, '4', 'TOSHIBA Canvio Basics 1TB Portable External HDD - USB 3.2 for PC Laptop Windows and Mac, 3 Years Warranty, External Hard Drive -', 3798, 'ITEM394', '2023-05-05', '11:23:52 am'),
(10, '4', 'SanDisk Ultra Flair 256GB USB 3.0 Flash Drive', 1499, 'ITEM447', '2023-05-05', '11:23:52 am'),
(11, '4', 'SanDisk Cruzer Blade 64GB USB 2.0 Flash Drive', 369, 'ITEM260', '2023-05-05', '11:23:52 am'),
(12, '5', 'Logitech K480 Wireless Multi-Device Keyboard For Windows, Macos, Ipados, Android Or Chrome Os, Bluetooth, Compact, Compatible With', 1200, 'ITEM243', '2023-05-05', '11:25:40 am'),
(13, '5', 'Zebronics ZEB-KM2100 Multimedia USB Keyboard Comes with 114 Keys Including 12 Dedicated Multimedia Keys & with Rupee Key', 278, 'ITEM513', '2023-05-05', '11:25:40 am'),
(14, '5', 'ZEBRONICS K24 USB Keyboard with Long Life 8 Million Keystrokes, Silent & Comfortable Use, Slim Design, Retractable Stand, 1.5 Meter', 300, 'ITEM150', '2023-05-05', '11:25:40 am'),
(15, '5', 'HP 150 Wired Keyboard, Quick, Comfy and Ergonomically Design, 12Fn Shortcut Keys, Plug and Play USB Connection and LED Indicator, 3', 500, 'ITEM336', '2023-05-05', '11:25:40 am');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `UserName`, `Password`, `Date`) VALUES
(1, 'mamunallrasid20@gmail.com', 'MamunAllRasid', '2023-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetalis`
--

CREATE TABLE `paymentdetalis` (
  `PSl` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Referance` varchar(40) NOT NULL,
  `TransactionID` varchar(40) NOT NULL,
  `Amount` int(20) NOT NULL,
  `PhNo` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentdetalis`
--

INSERT INTO `paymentdetalis` (`PSl`, `Name`, `Referance`, `TransactionID`, `Amount`, `PhNo`, `Email`, `Date`, `Time`) VALUES
(1, 'Mamun All Rasid', 'CCMP05050551', 'pay_LlsGFqH2v8093N', 66878, '7001731589', 'mamunallrasid20@gmail.com', '2023-05-05', '07:58:24 am'),
(2, 'Sushama Parvin Ahamm', 'CCMP05050544', 'pay_LlvahHp6cRAjlN', 3374, '8170969489', 'sushamaparvin32@gmail.com', '2023-05-05', '11:13:49 am');

-- --------------------------------------------------------

--
-- Table structure for table `purches_detalis`
--

CREATE TABLE `purches_detalis` (
  `Psl` int(11) NOT NULL,
  `ReferanceNo` varchar(50) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `ItemAmount` varchar(20) NOT NULL,
  `ItemCode` varchar(20) NOT NULL,
  `ItemQuantity` varchar(20) NOT NULL,
  `Itemtamount` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purches_detalis`
--

INSERT INTO `purches_detalis` (`Psl`, `ReferanceNo`, `CategoryName`, `ItemName`, `ItemAmount`, `ItemCode`, `ItemQuantity`, `Itemtamount`, `Date`, `Time`) VALUES
(1, 'CCMP05050551', '1', '1', '54490', 'ITEM750', '1', '54490', '2023-05-05', '11:27:50 am'),
(2, 'CCMP05050551', '2', '4', '850', 'ITEM354', '1', '850', '2023-05-05', '11:27:50 am'),
(3, 'CCMP05050551', '4', '8', '4197', 'ITEM762', '1', '4197', '2023-05-05', '11:27:50 am'),
(4, 'CCMP05050551', '4', '10', '1688', 'ITEM447', '1', '1688', '2023-05-05', '11:27:50 am'),
(5, 'CCMP05050551', '5', '15', '699', 'ITEM336', '1', '699', '2023-05-05', '11:27:50 am'),
(6, 'CCMP05050544', '2', '5', '599', 'ITEM728', '1', '599', '2023-05-05', '14:43:23 pm'),
(7, 'CCMP05050544', '4', '10', '1688', 'ITEM447', '1', '1688', '2023-05-05', '14:43:23 pm'),
(8, 'CCMP05050544', '5', '15', '699', 'ITEM336', '1', '699', '2023-05-05', '14:43:23 pm'),
(9, 'CCMP06050539', '4', '10', '1688', 'ITEM447', '1', '1688', '2023-05-06', '10:36:53 am'),
(10, 'CCMP06050539', '4', '11', '369', 'ITEM260', '1', '369', '2023-05-06', '10:36:53 am'),
(11, 'CCMP06050545', '2', '3', '600', 'ITEM687', '1', '600', '2023-05-07', '00:39:27 am'),
(12, 'CCMP06050545', '5', '14', '299', 'ITEM150', '2', '598', '2023-05-07', '00:39:27 am'),
(13, 'CCMP07050530', '1', '1', '50000', 'ITEM750', '1', '50000', '2023-05-08', '00:03:30 am'),
(14, 'CCMP07050530', '4', '10', '1499', 'ITEM447', '1', '1499', '2023-05-08', '00:03:30 am'),
(15, 'CCMP07050530', '5', '15', '500', 'ITEM336', '1', '500', '2023-05-08', '00:03:30 am'),
(16, 'CCMP07050522', '3', '6', '30498', 'ITEM725', '1', '30498', '2023-05-08', '00:14:07 am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `buying`
--
ALTER TABLE `buying`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer_detalis`
--
ALTER TABLE `customer_detalis`
  ADD PRIMARY KEY (`csl`);

--
-- Indexes for table `itemes`
--
ALTER TABLE `itemes`
  ADD PRIMARY KEY (`ItemSl`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paymentdetalis`
--
ALTER TABLE `paymentdetalis`
  ADD PRIMARY KEY (`PSl`);

--
-- Indexes for table `purches_detalis`
--
ALTER TABLE `purches_detalis`
  ADD PRIMARY KEY (`Psl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `buying`
--
ALTER TABLE `buying`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_detalis`
--
ALTER TABLE `customer_detalis`
  MODIFY `csl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itemes`
--
ALTER TABLE `itemes`
  MODIFY `ItemSl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentdetalis`
--
ALTER TABLE `paymentdetalis`
  MODIFY `PSl` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purches_detalis`
--
ALTER TABLE `purches_detalis`
  MODIFY `Psl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
