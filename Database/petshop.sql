-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 05:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('[value-1]', '[value-2]'),
('Petshop', 'Petshop123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `Message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `address`, `contact_number`, `contact_email`, `Message`) VALUES
(1, '427, Lamtagin  Marg, Baluwatar, Kathmandu', 'Jhamsikhel(+9779702006126)\nBaluwatar(+9779823769830)', 'petmamanepal@gmail.com', '\r\n\r\nWe’d love to hear from you – please use the form to send us your messages, ideas or business queries. Or simply pop in for ogling at a cute dog being groomed\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `Comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `contact_no`, `Comment`) VALUES
(1, 'furdiki123', 'furdiki@gmail.com', '9847698214', 'hi it\'s good'),
(2, 'Furdiki sherpa', 'furdiki@gmail.com', '9847698214', 'kjdhfsjdbvfhdsb'),
(3, 'Furdiki sherpa', 'd@gmail.com', '656454535', 'nbvvgv');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `price` int(100) NOT NULL,
  `weight` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Details` varchar(200) NOT NULL,
  `Ingredints` varchar(200) NOT NULL,
  `shipping` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `price`, `weight`, `Quantity`, `Details`, `Ingredints`, `shipping`) VALUES
(3, ' ACANA Singles Grain Free Limited Ingredient Diet Duck and Pear Formula Dog Treats', 'petfood1.png', 700, 250, 10, 'Perfectly sized training bites to reward all those sitting pups, those instagram posing mutts, and the slightly naughtier puppies who need a little daily bribing. Buy this product on petsonbroadwaynyc', 'Ingredients: Rabbit with Ground Bone, Olive Oil, Pumpkin Seed, Potassium Chloride, Organic Cranberries, Organic Spinach, Organic Broccoli, Organic Beets, Sodium Phosphate Monobasic, Organic Carrots, O', 'Free Standard Shipping with any online purchase of $50 (merchandise subtotal excludes store pick up items; merchandise subtotal is calculated before sales tax, before gift wrap charges, and after any '),
(6, 'API® Bettafix Freshwater Fish Bacterial Infection Treatment', 'petfood2.png', 250, 250, 10, 'DESCRIPTION API BETTAFIX Antibacterial & Antifungal Betta Fish Infection and Fungus Remedy in the 1.7-Ounce Bottle helps keep fish healthy in a variety of ways. Use this product to treat infection', 'Ingredients: Rabbit with Ground Bone, Olive Oil, Pumpkin Seed, Potassium Chloride, Organic Cranberries, Organic Spinach, Organic Broccoli, Organic Beets, Sodium Phosphate Monobasic, Organic Carrots, O', 'Free Standard Shipping with any online purchase of $50 (merchandise subtotal excludes store pick up items; merchandise subtotal is calculated before sales tax, before gift wrap charges, and after any '),
(7, 'API® Guide Fish Problem Solving General Cure', 'petfood3.png', 899, 100, 10, 'DESCRIPTION API GENERAL CURE Freshwater and Saltwater Fish Powder Medication helps to eliminate parasitic fish disease in short order. Use these easy-to-dose packets in both freshwater and saltwater a', 'Ingredients: Rabbit with Ground Bone, Olive Oil, Pumpkin Seed, Potassium Chloride, Organic Cranberries, Organic Spinach, Organic Broccoli, Organic Beets, Sodium Phosphate Monobasic, Organic Carrots, O', 'Free Standard Shipping with any online purchase of $50 (merchandise subtotal excludes store pick up items; merchandise subtotal is calculated before sales tax, before gift wrap charges, and after any '),
(8, 'Applaws Natural Wet Cat Food Chicken Breast with Pumpkin in Broth', 'petfood4.png', 399, 250, 10, 'Applaws Chicken Breast with Pumpkin Canned Cat Food contains nothing more than the ingredients listed and is a natural complementary pet food for adult cats. Buy this product on petsonbroadwaynyc.com', 'Ingredients: Rabbit with Ground Bone, Olive Oil, Pumpkin Seed, Potassium Chloride, Organic Cranberries, Organic Spinach, Organic Broccoli, Organic Beets, Sodium Phosphate Monobasic, Organic Carrots, O', 'Free Standard Shipping with any online purchase of $50 (merchandise subtotal excludes store pick up items; merchandise subtotal is calculated before sales tax, before gift wrap charges, and after any '),
(9, 'Applaws Natural Wet Cat Food Tuna Fillet with Seaweed in Broth', 'petfood5.png', 400, 500, 10, 'Perfectly sized training bites to reward all those sitting pups, those instagram posing mutts, and the slightly naughtier puppies who need a little daily bribing. Buy this product on petsonbroadwaynyc', 'Ingredients: Rabbit with Ground Bone, Olive Oil, Pumpkin Seed, Potassium Chloride, Organic Cranberries, Organic Spinach, Organic Broccoli, Organic Beets, Sodium Phosphate Monobasic, Organic Carrots, O', 'Free Standard Shipping with any online purchase of $50 (merchandise subtotal excludes store pick up items; merchandise subtotal is calculated before sales tax, before gift wrap charges, and after any ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `order_date` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cid`, `product_id`, `product_name`, `total`, `Quantity`, `status`, `order_date`) VALUES
(42, 5, 6, 'API® Bettafix Freshwater Fish Bacterial Infection Treatment', '250', 0, 1, 2147483647),
(43, 2, 3, ' ACANA Singles Grain Free Limited Ingredient Diet Duck and Pear Formula Dog Treats', '700', 0, 1, 2147483647),
(44, 2, 6, 'API® Bettafix Freshwater Fish Bacterial Infection Treatment', '250', 1, 1, 2147483647),
(45, 2, 3, ' ACANA Singles Grain Free Limited Ingredient Diet Duck and Pear Formula Dog Treats', '700', 3, 1, 2147483647),
(46, 2, 3, ' ACANA Singles Grain Free Limited Ingredient Diet Duck and Pear Formula Dog Treats', '950', 1, 1, 2147483647),
(47, 2, 6, 'API® Bettafix Freshwater Fish Bacterial Infection Treatment', '950', 1, 1, 2147483647),
(48, 2, 6, 'API® Bettafix Freshwater Fish Bacterial Infection Treatment', '1000', 4, 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `cid` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`cid`, `full_name`, `username`, `address`, `contact_no`, `email`, `password`) VALUES
(2, 'furdiki', 'furdiki123', NULL, '', 'furdiki@gmail.com', 'furdiki123'),
(3, 'saugat', 'saugat123', NULL, '', 'saugat@gmail.com', 'saugat123'),
(4, 'Tenzy sherpa', 'tenz123', NULL, '', 'tenzy@gmail.com', 'tenzy123'),
(5, 'tenzy', 'tenzy123', NULL, '', 'tenzy@gmail.com', 'tenzy123'),
(8, 'Soniya Tamang', 'Soniya', 'Kapan', '9856787534', 'soniya1@gmail.com', 'sonIYA!@#$6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
