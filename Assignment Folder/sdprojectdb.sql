-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 16, 2018 at 10:46 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_Id`, `Username`, `Password`) VALUES
(1, '$2y$10$CQOqtsJw53SpzwaI1Clb1.WHzjFO7XjDtadnJJrlWdlFPLnxFeESm', '$2y$10$W7vDEHgiC.AH.o37Oveny.s57G4RNw5UFbz63Uk.CGnvhKxo01c4q'),
(2, '$2y$10$7AQN4P3RTjj6PP48uw1TsuoDsshU3RY0foIHCWXXonVMjJv2Bn5oG', '$2y$10$iiMdaScDmQUs8jlBUArb6.IqxG1z9vwMgu8Yl7BELb0CZrpTxVO0S'),
(3, '$2y$10$590phInj5koctFkVwdeVxeCOyyVE.L0IFffVEy60ALGPEMq0EjgkC', '$2y$10$xieyjoYxFlI0u74g0tBCfeeWYrrikT45HE6ioCKmL7zQxT1EukTwW');

-- --------------------------------------------------------

--
-- Table structure for table `cloth`
--

CREATE TABLE `cloth` (
  `Cloth_Id` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloth`
--

INSERT INTO `cloth` (`Cloth_Id`, `Type`) VALUES
(1, 'Shirt'),
(2, 'Shorts'),
(3, 'Socks');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_queries`
--

CREATE TABLE `contact_us_queries` (
  `Query_Id` int(11) NOT NULL,
  `Query_Description` varchar(1000) NOT NULL,
  `Account_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Country_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Country_Id`, `Name`) VALUES
(1, 'Malta'),
(2, ''),
(3, 'knfdkfn');

-- --------------------------------------------------------

--
-- Table structure for table `kit`
--

CREATE TABLE `kit` (
  `Kit_Id` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kit`
--

INSERT INTO `kit` (`Kit_Id`, `Type`) VALUES
(1, 'Home'),
(2, 'Away'),
(3, 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Manager_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Email_Address` varchar(150) NOT NULL,
  `Town_Id` int(11) NOT NULL,
  `Account_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Size_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `Order_Id` int(11) NOT NULL,
  `Account_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`Order_Id`, `Account_Id`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL,
  `Price` double NOT NULL,
  `OldPrice` double NOT NULL,
  `URL` varchar(50000) NOT NULL,
  `Cloth_Id` int(11) NOT NULL,
  `Kit_Id` int(11) NOT NULL,
  `Team_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Price`, `OldPrice`, `URL`, `Cloth_Id`, `Kit_Id`, `Team_Id`) VALUES
(1, 25, 28, 'https://www.soccerpro.com/wp-content/uploads/2018/01/az8708_adidas_juventus_authentic_home_jsy_01.jpg', 1, 1, 1),
(2, 15, 51615, 'https://www.ebaysoccer.com/u_file/1712/products/16/44b7b6de7c.png', 2, 1, 1),
(3, 10, 510, 'https://store.juventus.com/data/store/product/1/12940/product.jpg', 3, 1, 1),
(4, 25, 1520, 'https://store.juventus.com/data/store/product/1/14428/product.jpg', 1, 2, 1),
(5, 15, 615, 'https://cdn.shopify.com/s/files/1/2800/4754/products/1498925960-juventus-2017-2018-away-shorts-blue-475x0_480x480.jpg?v=1520664762', 2, 2, 1),
(6, 10, 1510, 'https://www.futbolsolution.com/7609-large_default/football-socks-juventus-away-1718-adidas.jpg', 3, 2, 1),
(7, 25, 515620, 'https://images.sportsdirect.com/images/products/37738416_l.jpg', 1, 3, 1),
(8, 15, 1615, 'https://cdn.shopify.com/s/files/1/2800/4754/products/1500640704-juventus-adidas-2017-18-third-football-shorts-475x0_480x480.jpg?v=1520664688', 2, 3, 1),
(9, 10, 5110, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTo05T3btYQ3oZ4ILBtq5NYR3mokNROou-gzUnOk5bD-mEYEhkArA', 3, 3, 1),
(10, 25, 51620, 'https://www.dwsports.com/on/demandware.static/-/Sites-DWS-Master-Catalog/default/dw986d9a1d/products/images/312595201_01.jpg', 1, 1, 2),
(11, 15, 5115, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSl5bXKFS3mfdU1Nziri_cwA9unNcfSMempj-_qE2Wftbzs5UaRg', 2, 1, 2),
(12, 10, 510, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbgZE81v_AWzuFS8VZTSLQYO34wHgBeiQIHgJfxanUdK6bV7s-Zw', 3, 1, 2),
(13, 25, 120, 'https://images.fcbayern.com/is/image/fcbayern/product-gallery-small/fc-bayern-kindertrikot-away-17-18-21949_1.jpg?wid=660&hei=660&fmt=png-alpha', 1, 2, 2),
(14, 15, 5615, 'https://www.sport-bittl.com/images/product_images/popup_images/65081707A_FC_Bayern_Away_Shorts_17_18_Kinder_navy.jpg', 2, 2, 2),
(15, 10, 5610, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcST61JntIcQzaGVCqea0ayezM5VCvmt03XdA5kdwjMaP9Wr53UQ', 3, 2, 2),
(16, 25, 5620, 'http://cdn6.bigcommerce.com/s-3yufq/products/654/images/1840/bayern_third__81275.1508404715.380.380.jpg?c=2', 1, 3, 2),
(17, 15, 1615, 'https://images.fcbayern.com/is/image/fcbayern/product-gallery-small/fc-bayern-short-champions-league-17-18-21218.jpg?wid=660&hei=660&fmt=png-alpha', 2, 3, 2),
(18, 10, 5610, 'https://images.fcbayern.com/is/image/fcbayern/product-gallery-small/fc-bayern-stutzen-champions-league-17-18-21220.jpg?wid=660&hei=660&fmt=png-alpha\r\n', 3, 3, 2),
(19, 25, 5165620, 'https://cdn.shopify.com/s/files/1/1332/5677/products/swdefsrtyu_1024x1024.jpg?v=1499118279', 1, 1, 3),
(20, 15, 515, 'https://i1.wp.com/zealevince.com/wp-content/uploads/2017/08/PSG-Football-Shorts-Home-17-18-Season-1.png?fit=900%2C1200&ssl=1', 2, 1, 3),
(21, 10, 5610, 'https://ueeshop.ly200-cdn.com/u_file/UPAB/UPAB976/1707/products/02/6cf512edf8.jpg.240x240.jpg', 3, 1, 3),
(22, 25, 615620, 'https://2.bp.blogspot.com/-31EX1UABPOI/WVUnF0nlTbI/AAAAAAABP_I/ASW7HoO4kBcHi8uI7o2Mp4Zk58yP1iPUACLcBGAs/s1600/paris-saint-germain-17-18-away-kit-2.jpg', 1, 2, 3),
(23, 15, 5156115, 'https://images.sportsdirect.com/images/products/37228113_4pl.jpg', 2, 2, 3),
(24, 10, 5110, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-ZwEPL-3U8AkO79Ai3y4IMoo7IqVEnMdadFz1_S2L6ojJ9ggq', 3, 2, 3),
(25, 25, 5120, 'https://www.soccermaster.com/wp-content/uploads/847267_011_nike_psg_3rd_jsy_sm_01.jpg', 1, 3, 3),
(26, 15, 115, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyFNY0syMQh7D3JlW8cFyli4z-U24c9QTF5PgZ2KUh_ktMkVJP', 2, 3, 3),
(27, 10, 510, 'http://ds-jerseys.com/images/category/soccer_socks/aq_adult/psg/17third/a.jpg', 3, 3, 3),
(28, 25, 5120, 'https://3.bp.blogspot.com/-7XRrWRqwZv8/WS6r26duREI/AAAAAAABOMw/vpsz-SPnWuwKxLWdj46DikV6pNqxTkmdwCLcB/s1600/manchester-city-17-18-home-kit-2.jpg', 1, 1, 4),
(29, 15, 515, 'http://image2.kbobject.com/mcfc-190186.jpg?width=250&height=250&quality=80', 2, 1, 4),
(30, 10, 1510, 'http://image1.kbobject.com/mcfc-190183.jpg?width=250&height=250&quality=80', 3, 1, 4),
(31, 25, 6120, ' https://d13z1xw8270sfc.cloudfront.net/resize/482338/1504340194467_mancityaway.jpg/500/400/0/', 1, 2, 4),
(32, 15, 5115, 'https://soccerbox.global.ssl.fastly.net/media/catalog/product/cache/e3255864a60f0af9f489472b32fb8c73/m/a/manchester-city-away-shorts-17-18.jpg', 2, 2, 4),
(33, 10, 616510, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9O2s19E3XfQxU-9ujsW4hcI0tjpadrY811drDS_iw7s3IzbfUdA', 3, 2, 4),
(34, 25, 5120, 'https://www.sportit.com/ir/82131/f/f/459/0/0/1516290890680/maglia-manchester-city-third-17/18.jpg', 1, 3, 4),
(35, 15, 6565115, 'https://www.lifestylesports.com/on/demandware.static/-/Sites-LSS_eCommerce_Master/default/dwd1b79935/images/57335530xlalt1.jpg', 2, 3, 4),
(36, 10, 610, 'http://www.topsportjersey.com/wp-content/uploads/2018/02/badde92e15.240x240.jpg', 3, 3, 4),
(37, 25, 5620, 'https://images.yaoota.com/x01x4JA-r7lXeJCoZ0KvgyYL6Qw=/trim/yaootaweb-production/media/crawledproductimages/2b5367ffe6c3892e6eb6c5b348c17ced47a8246f.jpg', 1, 1, 5),
(38, 15, 1515, 'https://www.lifestylesports.com/dw/image/v2/BCDN_PRD/on/demandware.static/-/Sites-LSS_eCommerce_Master/default/dw597244e4/images/57324700xlarge.jpg?sw=530', 2, 1, 5),
(39, 10, 510, 'https://www.soccergears.com/html/upload/medium_img/201712/104466/1512540610162548335.jpg', 3, 1, 5),
(40, 25, 56120, ' https://www.dwsports.com/dw/image/v2/BBTQ_PRD/on/demandware.static/-/Sites-DWS-Master-Catalog/default/dw97e6f546/products/images/310571791_01.jpg?sw=556', 1, 2, 5),
(41, 15, 5615, 'https://www.gogogoshop.com/html/upload/item_img/201708/106552/1502782512388291281.png', 2, 2, 5),
(42, 10, 610, 'https://www.soccerdealshop.com/html/upload/medium_img/201712/104466/1512539962509295466.jpg', 3, 2, 5),
(43, 25, 120, 'https://www.dwsports.com/on/demandware.static/-/Sites-DWS-Master-Catalog/default/dwb971c923/products/310571431_01.jpg', 1, 3, 5),
(44, 15, 5615615, 'http://www.cornerfootball.com/20405-home_default/xreal-madrid-third-short-1718.jpg.pagespeed.ic.MXd7OZA6AZ.png', 2, 3, 5),
(45, 10, 510, 'http://www.cornerfootball.com/20419-large_default/real-madrid-third-socks-1718.jpg', 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `Review_Id` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` varchar(50000) NOT NULL,
  `Product_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `Size_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`Size_Id`, `Name`) VALUES
(1, 'Extra Small'),
(2, 'Small'),
(3, 'Medium'),
(4, 'Large'),
(5, 'Extra Large'),
(6, 'Extra Extra Large');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `Team_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`Team_Id`, `Name`) VALUES
(1, 'Juventus'),
(2, 'Bayern Munich'),
(3, 'Paris Saint Germain'),
(4, 'Manchester City'),
(5, 'Real Madrid');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `Town_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Country_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`Town_Id`, `Name`, `Country_Id`) VALUES
(1, 'Fgura', 1),
(2, '', 2),
(3, 'sfbdjhfb', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Email_Address` varchar(150) NOT NULL,
  `Town_Id` int(11) NOT NULL,
  `Account_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Name`, `Surname`, `Email_Address`, `Town_Id`, `Account_Id`) VALUES
(1, 'Raul', 'Mifsud', 'rau.mifsud@hotmai.com', 1, 1),
(2, 'Guzi', 'Zejza', '', 2, 2),
(3, 'Guzi', 'Zejzs', 'sdgsfsaf@sdsdfsd.com', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `website_review`
--

CREATE TABLE `website_review` (
  `Review_Id` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_Id`);

--
-- Indexes for table `cloth`
--
ALTER TABLE `cloth`
  ADD PRIMARY KEY (`Cloth_Id`);

--
-- Indexes for table `contact_us_queries`
--
ALTER TABLE `contact_us_queries`
  ADD PRIMARY KEY (`Query_Id`),
  ADD KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Country_Id`);

--
-- Indexes for table `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`Kit_Id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Manager_Id`),
  ADD KEY `Account_Id` (`Account_Id`),
  ADD KEY `Town_Id` (`Town_Id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`Order_Id`,`Product_Id`),
  ADD KEY `Product_Id` (`Product_Id`),
  ADD KEY `Order_Id` (`Order_Id`),
  ADD KEY `Size_Id` (`Size_Id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Cloth_Id` (`Cloth_Id`),
  ADD KEY `Kit_Id` (`Kit_Id`),
  ADD KEY `Team_Id` (`Team_Id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`Review_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`Size_Id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Team_Id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`Town_Id`),
  ADD KEY `Country_Id` (`Country_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `Town_Id` (`Town_Id`),
  ADD KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `website_review`
--
ALTER TABLE `website_review`
  ADD PRIMARY KEY (`Review_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cloth`
--
ALTER TABLE `cloth`
  MODIFY `Cloth_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_us_queries`
--
ALTER TABLE `contact_us_queries`
  MODIFY `Query_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `Country_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kit`
--
ALTER TABLE `kit`
  MODIFY `Kit_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `Manager_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `Review_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `Size_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `Team_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `Town_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `website_review`
--
ALTER TABLE `website_review`
  MODIFY `Review_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us_queries`
--
ALTER TABLE `contact_us_queries`
  ADD CONSTRAINT `contact_us_queries_ibfk_1` FOREIGN KEY (`Account_Id`) REFERENCES `account` (`Account_Id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Account_Id`) REFERENCES `account` (`Account_Id`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`Town_Id`) REFERENCES `town` (`Town_Id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`Order_Id`) REFERENCES `order_table` (`Order_Id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`),
  ADD CONSTRAINT `order_product_ibfk_3` FOREIGN KEY (`Size_Id`) REFERENCES `size` (`Size_Id`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`Account_Id`) REFERENCES `account` (`Account_Id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cloth_Id`) REFERENCES `cloth` (`Cloth_Id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Kit_Id`) REFERENCES `kit` (`Kit_Id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`Team_Id`) REFERENCES `team` (`Team_Id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`Country_Id`) REFERENCES `country` (`Country_Id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Town_Id`) REFERENCES `town` (`Town_Id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Account_Id`) REFERENCES `account` (`Account_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
