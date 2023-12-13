-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 07:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@project.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`) VALUES
(17, 0, 18),
(18, 0, 18),
(19, 0, 18),
(20, 0, 18),
(21, 0, 18),
(22, 0, 18),
(23, 0, 18),
(24, 3, 39),
(25, 3, 41),
(26, 8, 39),
(27, 0, 7),
(29, 0, 46),
(30, 0, 46),
(31, 3, 36),
(32, 13, 7),
(33, 0, 45),
(34, 0, 45),
(35, 0, 45),
(36, 0, 45),
(37, 0, 45),
(38, 0, 45),
(39, 0, 45),
(40, 0, 45),
(41, 0, 45),
(42, 0, 45),
(43, 0, 45),
(44, 0, 45),
(45, 0, 45),
(46, 0, 45),
(47, 0, 45),
(48, 0, 45),
(49, 0, 45),
(50, 0, 45),
(51, 0, 45),
(52, 0, 45),
(53, 0, 45),
(54, 0, 45),
(55, 0, 45),
(56, 0, 45),
(57, 0, 45),
(58, 0, 45),
(59, 0, 45),
(60, 0, 6),
(61, 0, 6),
(62, 0, 6),
(63, 0, 6),
(64, 0, 6),
(65, 0, 6),
(66, 0, 38),
(67, 0, 38),
(68, 0, 38),
(69, 0, 38),
(70, 0, 38),
(71, 0, 38),
(72, 0, 38),
(73, 0, 38),
(74, 0, 38),
(75, 0, 38),
(76, 0, 38),
(77, 0, 38),
(78, 0, 6),
(79, 0, 6),
(80, 0, 6),
(81, 0, 6),
(82, 0, 6),
(83, 0, 6),
(84, 0, 6),
(85, 0, 6),
(86, 0, 6),
(87, 0, 6),
(88, 0, 6),
(89, 0, 6),
(90, 0, 6),
(91, 0, 6),
(92, 0, 6),
(93, 0, 6),
(94, 0, 6),
(95, 0, 6),
(96, 0, 6),
(97, 0, 6),
(98, 0, 6),
(99, 0, 6),
(100, 0, 6),
(101, 0, 6),
(102, 0, 6),
(103, 0, 6),
(104, 0, 6),
(105, 0, 6),
(106, 0, 6),
(107, 0, 6),
(108, 0, 6),
(109, 0, 6),
(110, 0, 6),
(111, 0, 6),
(112, 0, 6),
(113, 0, 6),
(114, 0, 6),
(115, 0, 6),
(116, 0, 6),
(117, 0, 6),
(118, 0, 6),
(119, 0, 6),
(120, 0, 6),
(121, 0, 6),
(122, 0, 6),
(123, 0, 6),
(124, 0, 6),
(125, 0, 6),
(126, 0, 6),
(127, 0, 6),
(128, 0, 6),
(129, 0, 6),
(130, 0, 6),
(132, 3, 45);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Mirror'),
(2, 'Wall Clock'),
(3, 'Home Garden'),
(4, 'Light & Lamp'),
(5, 'Decor & Furniture'),
(6, 'Painting'),
(7, 'Handicraft');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `invoice_no`) VALUES
(2, 3, 1687516642),
(4, 3, 1687517277),
(5, 6, 1687523577),
(6, 6, 1687523572),
(7, 6, 1687523702),
(8, 6, 1687523512),
(13, 3, 1688137084),
(15, 3, 1688137699),
(16, 3, 1688198436),
(17, 3, 1688198529),
(18, 7, 1688292981),
(19, 3, 1688300400),
(20, 8, 1688368889),
(21, 3, 1690960540),
(22, 3, 1690960852),
(23, 3, 1690961417),
(24, 3, 1690961639),
(25, 3, 1690961425),
(26, 3, 1690961673),
(27, 3, 1690960913),
(28, 3, 1690961064),
(29, 3, 1690961187),
(30, 3, 1690961463),
(31, 3, 1690961731),
(32, 3, 1696258725),
(33, 3, 1697264954),
(34, 3, 1697271301),
(35, 3, 1697296374),
(36, 3, 1697295812),
(37, 3, 1697296274),
(38, 3, 1697296828),
(39, 3, 1697296788),
(40, 3, 1697296351),
(41, 3, 1697302808),
(42, 3, 1697303051),
(43, 3, 1697303410),
(44, 3, 1697303406),
(45, 3, 1697303368),
(46, 3, 1697303622),
(47, 3, 1697350237),
(48, 13, 1697350180),
(49, 3, 1697898221),
(50, 3, 1697988585),
(51, 3, 1697988395),
(52, 3, 1699253408);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `del_address` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `total`, `pay_status`, `order_date`, `invoice_no`, `user_id`, `order_status`, `del_address`, `phone`) VALUES
(79, 37, 2500, 1, '2023-10-12', 1697296374, 3, 1, '', '9864511000'),
(80, 37, 2500, 0, '2023-10-14', 1697295812, 3, 0, '', '9864511000'),
(81, 37, 2500, 0, '2023-10-14', 1697296274, 3, 0, ' ', '9864511000'),
(82, 37, 2500, 0, '2023-10-14', 1697296828, 3, 0, ' mmmm', '9864511000'),
(83, 37, 2500, 0, '2023-10-14', 1697296788, 3, 0, ' mmmm', '9864511000'),
(84, 37, 2500, 0, '2023-10-14', 1697296351, 3, 0, 'Chitwan mmmm', '9864511000'),
(85, 6, 20000, 0, '2023-10-14', 1697302808, 3, 0, 'Pokhara ', '9000000000'),
(86, 7, 1500, 0, '2023-10-14', 1697303051, 3, 0, ' ', '9864511000'),
(87, 18, 11, 0, '2023-10-14', 1697303410, 3, 0, 'Chitwan ', ''),
(88, 46, 1800, 0, '2023-10-14', 1697303406, 3, 0, 'Chitwan ', ''),
(89, 7, 1500, 0, '2023-10-14', 1697303368, 3, 0, 'Chitwan ', ''),
(90, 7, 1500, 0, '2023-10-14', 1697303622, 3, 0, 'chitwan ', ''),
(91, 6, 20000, 0, '2023-10-15', 1697350237, 3, 0, 'kathmandu ', ''),
(92, 42, 4500, 0, '2023-10-21', 1697898221, 3, 0, 'chitwan ', '9000000000'),
(93, 6, 20000, 0, '2023-10-22', 1697988585, 3, 0, 'chitwan ', '9000000000'),
(94, 6, 20000, 0, '2023-10-22', 1697988395, 3, 0, 'chitwan ', '9000000000'),
(95, 7, 1500, 0, '2023-11-06', 1699253408, 3, 0, 'chitwan ', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_details` varchar(50000) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `upload_type` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_details`, `product_image`, `category_id`, `product_qty`, `upload_type`, `sales`, `rating`) VALUES
(2, 'Boho Themed Wall Mirror', 1500, 'Lorem ipsum dolor sit amet, brown consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore i. At risus viverra adipisci', '../images/product-3.jpg', 1, 3, 0, 0, ''),
(4, 'sdsc', 1111, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec enim diam vulputate ut pharetra. Vitae suscipit tellus mauris a diam maecenas. Nunc scelerisque viverra mauris in aliquam sem fringilla ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere. Sit amet aliquam id diam. Fames ac turpis egestas integer eget aliquet nibh praesent. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. Duis convallis convallis tellus id. Tempus egestas sed sed risus pretium quam vulputate dignissim. Enim ut sem viverra aliquet eget sit amet tellus cras. Sed egestas egestas fringilla phasellus faucibus. Neque ornare aenean euismod elementum nisi. Libero nunc consequat interdum varius sit amet. Facilisis magna etiam tempor orci eu lobortis elementum nibh tellus. Lacinia quis vel eros donec. Volutpat sed cras ornare arcu dui. At risus viverra adipiscing at in tellus.', '../images/img1.png', 0, 0, 0, 0, ''),
(6, 'Balkwan Moon Lamp', 20000, 'A build-in rechargeable battery inside, it can last around 8 hours after 2 hours fully charging. A USB charging c', '../images/moon_lamp.jpg', 4, -1, 0, 0, ''),
(7, 'Wooden showpiece', 1500, 'asfasdfgadfg', '../images/img2.jpg', 7, 2, 0, 0, '3.5'),
(16, 'two canvas', 220000000, 'sas', '../images/canvas.jpg', 6, 2, 0, 0, ''),
(18, 'dream catcher', 11, 'sdada', '../images/img3.jpg', 7, 0, 0, 0, ''),
(35, 'Rose Gold Round Wall Mirror', 2000, 'Brand CasaGold Assembly Self Assembly Colour Gold Dimensions H 18 x W 18 x D 1 Dimensions (In Centimeters) H 7.1 x W 7.1 x D 0.4 Material Stainless Steel Pack Content 1 Rose Gold Frame Wall Mirror Product Rating 4.0 Shape Round Weight 1.5 Kgs Sku DE2069107-S-PM32619', '../images/mirror2.jpg', 1, 3, 1, 0, ''),
(36, 'Black Metal Mirror Sets', 1500, 'Brand Hosley ; Colour Black; Dimensions Diameter: 12 ; Width: 0.5 ;Dimensions (In Centimeters) Diameter: 30.48 ; Width: 1.27; Material; Metal Pack ;Shape Round', '../images/mirror3.jpg', 1, 1, 1, 0, ''),
(37, 'Sparrow Pendulum Wall Clock', 2500, 'Alarm-No;Battery Included;Colour-White;Dimensions (In Centimeters)-Length: 27.94, Width: 7.62,Height: 60.96;Dimensions (in Inches)-Length: 11, Width: 3, Height: 24;Display-Analog;Material-Plastic;Shape-Round;Warranty-12 Months Warranty;Weight-3 Kg;', '../images/clock2.jpg', 2, 1, 1, 0, ''),
(38, 'Black Vertical Modern Wall Clock', 3000, 'Brand-The Next Decor; Alarm- No; Colour- Black; Material Acrylic Dimensions (In Centimeters) L 38.1 x B 38.1 x H 0.8; ', '../images/clock3.jpg', 2, 2, 1, 0, ''),
(39, ' Lucky Bamboo Natural Plant', 600, 'plant', '../images/plant1.jpg', 3, 2, 1, 0, ''),
(40, 'Green Snake Pot Natural Plant', 800, 'ss', '../images/plant2.jpg', 3, 3, 1, 0, ''),
(41, 'Arch Black & Grey Floor Lamp', 1800, 'llll', '../images/lamp1.jpg', 4, 1, 1, 0, ''),
(42, 'Flock Of Birds Eros Canvas Wall Painting', 4500, 'Colour-\r\nBlue;\r\nDimensions-\r\nH 31 x W 31 x D 2;\r\nDimensions (In Centimeters)-\r\nH 12.2 x W 12.2 x D 0.8;\r\nFrame Type-\r\nFramed;\r\nMaterial-\r\nCanvas;\r\nOrientation-\r\nLandscape;\r\nPack Content-\r\nSet of 1- Wall Panting;\r\nPaint type-\r\nAcrylic Painting;\r\nWeight-\r\n5 Kgs;', '../images/painting1.jpg', 6, 1, 1, 0, ''),
(43, 'Lounger Armchair', 2500, 'jdnisjhf', '../images/product-1.jpg', 5, 2, 1, 0, ''),
(44, 'Antique Wall Lamp', 2990, 'wall lamp antique', '../images/product-2.jpg', 4, 1, 1, 0, ''),
(45, 'Abstract Wall Painting', 1250, 'abstract wall painting', '../images/product-4.jpg', 6, 2, 1, 0, ''),
(46, 'Pepe Multicolour Resin Figurine', 1800, 'Colour\r\nMulticolour;\r\nDimensions (In Centimeters)\r\nL 5.5 x B 6 x 1.6;\r\nDimensions (In Inches)\r\nL 2.4 x B 2.2 x H 1.6;\r\nHand crafted\r\nYes;\r\nMaterial\r\nResin', '../images/handicraft1.jpg', 7, 1, 2, 0, ''),
(47, 'table', 1250, 'black colored', '../images/ui6.png', 5, 2, 6, 0, ''),
(48, 'shoes', 250, 'stylish shoes', '../images/cart.png', 7, 4, 1, 0, ''),
(51, 'm', 4, 'jgh', '../images/ui3.png', 4, 6, 5, 0, ''),
(52, 'vdhsgdv', 26, ',,dzbfv', '../images/2dfd (3).png', 2, 2, 9, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_details` varchar(5000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `request_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `user_id`, `product_name`, `product_price`, `product_image`, `product_details`, `category_id`, `product_qty`, `request_status`) VALUES
(5, 3, 'm', 4, '../images/ui3.png', 'jgh', 4, 6, 0),
(6, 7, 'table', 1250, '../images/ui6.png', 'black colored', 5, 2, 0),
(8, 3, '-1', -1, '../images/ajax.pdf', '-1', 4, -1, 3),
(9, 3, 'vdhsgdv', 26, '../images/2dfd (3).png', ',,dzbfv', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(5000) DEFAULT NULL,
  `user_rate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `user_review`, `user_rate`) VALUES
(1, 1, 3, 'fdfsfdsd', ''),
(2, 1, 3, 'sdsfs', ''),
(3, 1, 3, 'sdsfs', ''),
(4, 1, 2, 'sdfsfs', ''),
(5, 1, 4, 'sdzxsaz', ''),
(6, 3, 18, 'ss', ''),
(7, 3, 34, 'ddd', ''),
(8, 3, 37, 'the color of the product is very good', ''),
(9, 3, 37, 'bakwas', ''),
(10, 3, 37, '', ''),
(11, 3, 47, 'nice', ''),
(12, 3, 46, 'mmm', ''),
(13, 13, 42, 'good product', ''),
(18, 3, 7, 'hellooo', '4'),
(19, 3, 7, 'hellooo', '4'),
(20, 3, 7, 'hello', '3'),
(21, 3, 7, '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sell_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sell_id`, `user_id`, `product_id`, `req_id`) VALUES
(1, 3, 30, 49),
(2, 3, 31, 50),
(3, 3, 32, 55),
(4, 3, 33, 62),
(5, 3, 34, 64),
(6, 3, 42, 1),
(7, 6, 46, 2),
(8, 7, 47, 6),
(9, 3, 50, 5),
(10, 3, 49, 5),
(11, 3, 50, 9),
(12, 3, 51, 5),
(13, 3, 52, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_address` varchar(10) NOT NULL,
  `registered_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_password`, `user_phone`, `user_address`, `registered_at`) VALUES
(3, 'mark prin', 'mark@project.com', 'mark', '2147483647', 'Kathmandu', '0000-00-00'),
(6, 'Sarishma Ghale', 'saru@project.com', '123', '2147483647', 'Bharatpur', '2023-06-23'),
(7, 'shahil', 'shahilgrg22@gmail.com', '1manarmy', '2147483647', 'bharatpur-', '2023-07-02'),
(8, 'aadesh bhandari', 'bhandariaadesh43@gmail.com', '123', '1111111111', '11111', '2023-07-03'),
(9, '99', 'aayusha@gmail.com', 'aayusha', '2147483647', '1213', '2023-10-02'),
(10, 'Safal Adhikari', 'irakihda.lafas@gmail.com', '@safal', '2147483647', 'Ratananaga', '2023-10-13'),
(11, '-1', '-1@11', '1', '2147483647', '-1', '2023-10-14'),
(12, 'Sarishma Ghale', 'project1@gmail.com', 'sarishma', '2147483647', 'Bharatpur', '2023-10-14'),
(13, 'aayusha', 'aayusha0@gmail.com', 'aayusha', '9012345678', 'chitwan', '2023-10-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
