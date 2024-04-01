-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 07:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `ITEM_ID` varchar(255) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CART_ID`, `USER_ID`, `ITEM_ID`, `QUANTITY`) VALUES
(89, 10, 'I10', 4),
(90, 10, 'I14', 1),
(91, 10, 'I27', 1),
(92, 10, 'I42', 1),
(93, 10, 'I20', 1),
(95, 1, 'I11', 2),
(123, 13, 'I13', 0),
(124, 13, 'fordemo', 0),
(125, 13, 'I26', 0),
(126, 13, 'I15', 1),
(127, 13, 'I18', 0),
(128, 13, 'I27', 1),
(129, 13, 'I23', 0),
(130, 13, 'I1', 0),
(131, 13, 'a1', 0),
(132, 13, 'I25', 0),
(133, 13, 'I10', 0),
(134, 13, 'I28', 0),
(135, 13, 'I21', 0),
(138, 15, 'a1', 1),
(139, 15, 'I13', 1),
(140, 16, 'a1', 1),
(141, 16, 'I14', 0),
(142, 16, 'I13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` varchar(255) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `INVOICE_NO` varchar(255) DEFAULT NULL,
  `TOTAL_PRODUCTS` int(11) DEFAULT NULL,
  `ORDER_DATE` varchar(255) DEFAULT NULL,
  `ORDER_STATUS` varchar(255) DEFAULT NULL,
  `Payment_ID` varchar(255) NOT NULL,
  `Cust_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `USER_ID`, `AMOUNT`, `INVOICE_NO`, `TOTAL_PRODUCTS`, `ORDER_DATE`, `ORDER_STATUS`, `Payment_ID`, `Cust_Address`) VALUES
('2023012816749127049014977268', 2, 2090, '15c286ebf2e38cf08708ba3b328d0fd6', 7, 'January 28, 2023, 2:31 pm', 'online', 'c55f8e2c2c5efa07e37942de5c24f192', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749174456330907332', 2, 2090, 'd1b34a066dee762ecffd3de01be3911c', 7, 'January 28, 2023, 3:50 pm', 'online', 'b535c6cff8863031d9c945e100f1f905', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749185787332211947', 2, 2290, '8cfde742bf47b6bc2affb534c51043d4', 8, 'January 28, 2023, 4:09 pm', 'online', '467c5c7f1aa212921e74a96b82afe129', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749189946087656033', 2, 2290, '251243745837158e06cec699a15b0c8e', 8, 'January 28, 2023, 4:16 pm', 'online', '640038bc4a71bf2670ea6110c2f5a2a3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749190073881462966', 2, 2290, '3669ca6637e5a20ea804d456082a5799', 8, 'January 28, 2023, 4:16 pm', 'online', 'd98f3202ffd1f110955eefadd9f88cda', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749306212804771843', 2, 2290, '9558711453bb4830201ec5fa533eadf9', 8, 'January 28, 2023, 7:30 pm', 'online', '2d04a687117cae16dd96e85e7fb470c8', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749323198684403305', 2, 2290, 'a6755f67d0672b01a8d69298647682a1', 8, 'January 28, 2023, 7:58 pm', 'online', '78dae0e4490b025a10d99b205f09c620', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749323529897189262', 2, 1000, 'a5f63cbcfbce9db4f3189cc8d05e3b21', 5, 'January 28, 2023, 7:59 pm', 'offline', 'OFFLINE', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749325660135909646', 2, 200, 'b6147820dfcd8722bbc29b5d877b272f', 1, 'January 28, 2023, 8:02 pm', 'online', '4f7da1e6b207c47d5f30b79433aa6eb2', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749327220771793871', 2, 10100, '04c38749bf8000d8405758ac3035c73d', 5, 'January 28, 2023, 8:05 pm', 'online', 'a7981cb921910290bb07aaccc0280c8c', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749329574104525480', 2, 400, '1c7fdeb3403ff781a06ad9b692be8526', 2, 'January 28, 2023, 8:09 pm', 'online', '0cbb447138542d0eaeef4fb01606f259', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749357410131350749', 2, 400, 'eb9c538d6c36359679cfe8bcd5151f5e', 2, 'January 28, 2023, 8:55 pm', 'online', '31bf1b48c412eba0d9e9eab64e57eb09', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749358500158668860', 2, 1200, '20f407710aee5618eec46f709d9b3dd2', 6, 'January 28, 2023, 8:57 pm', 'online', '28183655408a9fe3675c5efcdeaa1248', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749361268659699816', 2, 1400, '3ff312720f7b67c064356053f9281e21', 7, 'January 28, 2023, 9:02 pm', 'online', 'aa8b7553a69ebf38738d1dda1b13d9a5', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749363124790912691', 2, 1400, '7a3744e196922253a4987db32b659695', 7, 'January 28, 2023, 9:05 pm', 'online', 'a9e9a8d64771bbaa5abb66299a8f3a72', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749384036344834986', 2, 1000, '4d630afdec86931e06af75d33f6d2f05', 5, 'January 28, 2023, 9:40 pm', 'online', '0bdaa7e20f6963adeeecfc51ddf2fd4f', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749389873625760324', 2, 1600, '51faf65d44de6fa9cfb863ab7b384042', 5, 'January 28, 2023, 9:49 pm', 'online', '1debc292e433626c8d3d691297c287d3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749407866267570690', 2, 2000, '89a92f5685a3a4bdd35d21bb30763184', 10, 'January 28, 2023, 10:19 pm', 'online', '62856ce99366183e8bdf95c7d2a7229e', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023012816749415535939901904', 2, 2000, '22f4774c46caffd89ede4f3937b5ac77', 10, 'January 28, 2023, 10:32 pm', 'online', 'ed067548149f04d351d68e867e20d70e', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? '),
('2023020616756651324052862495', 8, 2201, 'd246964cc497e4e043a64745ec2287bd', 2, 'February 6, 2023, 7:32 am', 'offline', 'OFFLINE', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, nemo accusamus ut commodi excepturi quam eum ratione fuga, autem culpa praesentium dolore dolor illum laborum cumque quasi repellendus delectus, vero atque cupiditate magni minus. Itaque, qu'),
('2023020616756663578547000644', 8, 200, '5e4cfc118949219f9d9fcc045da618cf', 2, 'February 6, 2023, 7:52 am', 'online', '0f998ad2b818dec7f14a826db115711c', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, nemo accusamus ut commodi excepturi quam eum ratione fuga, autem culpa praesentium dolore dolor illum laborum cumque quasi repellendus delectus, vero atque cupiditate magni minus. Itaque, qu'),
('2023020616756665971661176428', 12, 100, 'e6349aad96262818423e93ba45f45bb1', 1, 'February 6, 2023, 7:56 am', 'online', 'e7e071c490fbe0dfe368c78e4a9cd628', 'Lorem ipsum, dolor sit amet consectetur adipisicin'),
('2023020816758321889472215957', 13, 200, 'c80a6f8cb0d0dbef1171f35f0d3d9436', 1, 'February 8, 2023, 5:56 am', 'offline', 'OFFLINE', 'bengalore'),
('2023020916759222992555449720', 8, 490, '977a50e7a6df48e59a3182b69d9fc5b1', 3, 'February 9, 2023, 6:58 am', 'online', 'c89cc15b0706d984af902fa589acda76', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, nemo accusamus ut commodi excepturi quam eum ratione fuga, autem culpa praesentium dolore dolor illum laborum cumque quasi repellendus delectus, vero atque cupiditate magni minus. Itaque, qu'),
('2023020916759287636198909088', 14, 100, 'c9ad4e1215697a80a5fb72babe2b0813', 1, 'February 9, 2023, 8:46 am', 'online', '40be87f8c06c149d61c1ca26892f97fd', 'abc1');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `concatenate_item_ids` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    SET @item_ids = (SELECT GROUP_CONCAT(CONCAT(item_id,'-',quantity) SEPARATOR '_') FROM cart where USER_ID=new.USER_ID);
    UPDATE USERS SET PREVIOUS_ORDER = @item_ids WHERE ID=new.USER_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_cart_items` AFTER INSERT ON `orders` FOR EACH ROW BEGIN 
    DELETE FROM cart 
    WHERE user_id = NEW.user_id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PAYMENT_ID` varchar(255) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `PAYMENT_TYPE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PAYMENT_ID`, `USER_ID`, `AMOUNT`, `PAYMENT_TYPE`) VALUES
('013eef4dbabd27f510793b0c46022dc1', 2, 4002, 'online'),
('0bdaa7e20f6963adeeecfc51ddf2fd4f', 2, 1000, 'online'),
('0cbb447138542d0eaeef4fb01606f259', 2, 400, 'online'),
('0f998ad2b818dec7f14a826db115711c', 8, 200, 'online'),
('1a1f289428bd7ab3beb8a89d4c90b22f', 2, 1000, 'online'),
('1debc292e433626c8d3d691297c287d3', 2, 1600, 'online'),
('25fb02093c24dcd158f7b172bbcc4d6f', 2, 2090, 'online'),
('28183655408a9fe3675c5efcdeaa1248', 2, 1200, 'online'),
('2d04a687117cae16dd96e85e7fb470c8', 2, 2290, 'online'),
('31bf1b48c412eba0d9e9eab64e57eb09', 2, 400, 'online'),
('38c4ef062ce795e1d6466d51464fa363', 2, 2090, 'online'),
('40be87f8c06c149d61c1ca26892f97fd', 14, 100, 'online'),
('40f5888b67c748df7efba008e7c2f9d2', 1, 400, 'online'),
('467c5c7f1aa212921e74a96b82afe129', 2, 2290, 'online'),
('4a9bd19b3b8676199592a346051f950c', 8, 600, 'offline'),
('4f7da1e6b207c47d5f30b79433aa6eb2', 2, 200, 'online'),
('59c761bca58dd480bec09c7e30d60fd1', 2, 2090, 'online'),
('5b77982ece02ff86d47e077d5be69268', 2, 2090, 'online'),
('62856ce99366183e8bdf95c7d2a7229e', 2, 2000, 'online'),
('640038bc4a71bf2670ea6110c2f5a2a3', 2, 2290, 'online'),
('6a6f8494a4dc736a53b5b2457b3811a3', 0, 0, 'online'),
('771409a8fb1543788fe7d91f1ea0987f', 2, 1000, 'online'),
('78dae0e4490b025a10d99b205f09c620', 2, 2290, 'online'),
('7c70c08a4783640531712ce44c663041', 2, 1000, 'offline'),
('991349fb171970a0d7455ce6da172102', 2, 2090, 'online'),
('a7981cb921910290bb07aaccc0280c8c', 2, 10100, 'online'),
('a9e9a8d64771bbaa5abb66299a8f3a72', 2, 1400, 'online'),
('aa8b7553a69ebf38738d1dda1b13d9a5', 2, 1400, 'online'),
('b535c6cff8863031d9c945e100f1f905', 2, 2090, 'online'),
('be8670ad76914a954232d1c71afb8c8f', 8, 2201, 'offline'),
('c55f8e2c2c5efa07e37942de5c24f192', 2, 2090, 'online'),
('c89cc15b0706d984af902fa589acda76', 8, 490, 'online'),
('cb06bd7adb25d08ccfba03a9ae1982be', 2, 2090, 'online'),
('cb67c3ae286e9140355eb56d2c33ff5b', 2, 2090, 'online'),
('ce042dd48ef6d0cba7149927d331e7e0', 2, 2090, 'online'),
('d7ec88186d106a3ac950ad59b1379a07', 2, 2090, 'online'),
('d98f3202ffd1f110955eefadd9f88cda', 2, 2290, 'online'),
('de62b91792981216398d921571c9892b', 13, 200, 'offline'),
('e7d2cf7f94568da27a59a76d90fbc247', 10, 3610, 'online'),
('e7e071c490fbe0dfe368c78e4a9cd628', 12, 100, 'online'),
('eaecf647e23b377a275d449dc01aa676', 2, 2090, 'online'),
('eb4fe264c10eb7a528b047aa983a4829', 2, 1290, 'online'),
('ed067548149f04d351d68e867e20d70e', 2, 2000, 'online'),
('fe8b6aafc01404b010d4a01012f5cda6', 2, 2090, 'online');

-- --------------------------------------------------------

--
-- Stand-in structure for view `search`
-- (See below for the actual view)
--
CREATE TABLE `search` (
`ITEM_ID` varchar(255)
,`ITEM_TITLE` varchar(255)
,`ITEM_CATEGORY` varchar(255)
,`IN_STOCK1` int(11)
,`IMG_ID` varchar(255)
,`STATUS` varchar(50)
,`PRICE` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `stock1`
--

CREATE TABLE `stock1` (
  `ITEM_ID` varchar(255) NOT NULL,
  `ITEM_TITLE` varchar(255) DEFAULT NULL,
  `ITEM_CATEGORY` varchar(255) DEFAULT NULL,
  `IN_STOCK1` int(11) DEFAULT 0,
  `IMG_ID` varchar(255) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `PRICE` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock1`
--

INSERT INTO `stock1` (`ITEM_ID`, `ITEM_TITLE`, `ITEM_CATEGORY`, `IN_STOCK1`, `IMG_ID`, `STATUS`, `PRICE`) VALUES
('a1', 'aloe vera', 'BONSAI', 12, 'aloevera.jpg', 'ok', 100),
('fordemo', 'plant111', 'BONSAI', 50, 'NEW_PLANT4.jpg', 'ok', 50),
('I1', 'Green Mound Juniper (Outdoor)', 'BONSAI', 255, 'bon1.jpg', 'OK', 200),
('I10', 'Aglaonema Pictum Tricolor (Outdoor)', 'BONSAI', 248, 'bon10.jpg', 'OK', 200),
('I11', 'Air Plant (Outdoor)', 'BONSAI', 255, 'bon11.jpg', 'OK', 200),
('I12', 'Ajuga (Outdoor)', 'BONSAI', 254, 'bon12.jpg', 'OK', 200),
('I13', 'Gloss White Square Milano Pot', 'HOUSE_PLANTS', 253, 'house1.jpg', 'OK', 200),
('I14', 'Almond Tree Pot', 'HOUSE_PLANTS', 199, 'house2.jpg', 'OK', 290),
('I15', 'Algerian Ivy Pot', 'HOUSE_PLANTS', 24, 'house3.jpg', 'OK', 300),
('I18', 'Alocasia Black Velvet Pot', 'HOUSE_PLANTS', 355, 'house6.jpg', 'OK', 200),
('I20', 'Aluminum Plant Pot', 'HOUSE_PLANTS', 285, 'house8.jpg', 'OK', 2020),
('I21', 'Amaranth Pot', 'HOUSE_PLANTS', 222, 'house9.jpg', 'OK', 2001),
('I22', 'Amarlyllis Pot', 'HOUSE_PLANTS', 275, 'house10.jpg', 'OK', 290),
('I23', 'Ambassador Allium Pot', 'HOUSE_PLANTS', 295, 'house11.jpg', 'OK', 299),
('I24', 'Amur Adonis Pot', 'HOUSE_PLANTS', 265, 'house12.jpg', 'OK', 2900),
('I25', 'Mini Mauve Orchid', 'OFFICE_PLANTS', 255, 'office1.jpg', 'OK', 200),
('I26', 'American Sweethum Orchid', 'OFFICE_PLANTS', 200, 'office2.jpg', 'OK', 290),
('I27', 'Anemone Orchid', 'OFFICE_PLANTS', 26, 'office3.jpg', 'OK', 300),
('I28', 'Angel Trumpet Datura Orchid', 'OFFICE_PLANTS', 265, 'office4.jpg', 'OK', 500),
('I29', 'Angelica Orchid', 'OFFICE_PLANTS', 50, 'office5.jpg', 'OK', 800),
('I3', 'Snake Plant (Outdoor)', 'BONSAI', 255, 'bon3.jpg', 'OK', 200),
('I30', 'Angelonia Orchid', 'OFFICE_PLANTS', 355, 'office6.jpg', 'OK', 200),
('I31', 'Areca Palm Orchid', 'OFFICE_PLANTS', 265, 'office7.jpg', 'OK', 2500),
('I32', 'Arizona Cypress Orchid', 'OFFICE_PLANTS', 285, 'office8.jpg', 'OK', 2020),
('I33', 'Aronia Orchid', 'OFFICE_PLANTS', 225, 'office9.jpg', 'OK', 2001),
('I34', 'Artichoke Orchid', 'OFFICE_PLANTS', 275, 'office10.jpg', 'OK', 290),
('I36', 'Ashe Magnolia Orchid', 'OFFICE_PLANTS', 265, 'office12.jpg', 'OK', 2900),
('I37', 'The Sanservieria', 'GIFT_PLANTS', 255, 'gift1.jpg', 'OK', 200),
('I38', 'Asparagus', 'GIFT_PLANTS', 200, 'gift2.jpg', 'OK', 290),
('I39', 'Aubrieta', 'GIFT_PLANTS', 25, 'gift3.jpg', 'OK', 300),
('I4', 'Split-Leaf Philodendron (Outdoor)', 'BONSAI', 255, 'bon4.jpg', 'OK', 200),
('I40', 'Autograph Tree', 'GIFT_PLANTS', 265, 'gift4.jpg', 'OK', 500),
('I41', 'Autumn Blaze Maple Tree', 'GIFT_PLANTS', 50, 'gift5.jpg', 'OK', 800),
('I42', 'Avacado', 'GIFT_PLANTS', 355, 'gift6.jpg', 'OK', 200),
('I43', 'Baby Rubber Plant', 'GIFT_PLANTS', 265, 'gift7.jpg', 'OK', 2500),
('I44', 'Baby Tears', 'GIFT_PLANTS', 285, 'gift8.jpg', 'OK', 2020),
('I45', 'Ball Cactus', 'GIFT_PLANTS', 225, 'gift9.jpg', 'OK', 2001),
('I46', 'Balm Of Gilead', 'GIFT_PLANTS', 275, 'gift10.jpg', 'OK', 290),
('I47', 'Bamboo Palm', 'GIFT_PLANTS', 295, 'gift11.jpg', 'OK', 299),
('I48', 'Banana Yucca', 'GIFT_PLANTS', 265, 'gift12.jpg', 'OK', 2900),
('I5', 'Aerangis Orchids (Outdoor)', 'BONSAI', 255, 'bon5.jpg', 'OK', 200),
('I6', 'Acoma Crape Myrtle (Outdoor)', 'BONSAI', 255, 'bon6.jpg', 'OK', 200),
('I7', 'African Fern Pine (Outdoor)', 'BONSAI', 255, 'bon7.jpg', 'OK', 200),
('I8', 'Agastache (Outdoor)', 'BONSAI', 255, 'bon8.jpg', 'OK', 200),
('I9', 'African Milk Tree (Outdoor)', 'BONSAI', 255, 'bon9.jpg', 'OK', 200),
('qwerty1', 'test', 'BONSAI', 50, 'NEW_PLANT1.jpg', 'ok', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `PREVIOUS_ORDER` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `Address`, `phone`, `PREVIOUS_ORDER`) VALUES
(1, 'ash', '4a7d1ed414474e4033ac29ccb8653d9b', 'ashutosh', NULL, NULL, NULL),
(2, 'ABC', '4a7d1ed414474e4033ac29ccb8653d9b', 'ABC', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed quis ipsa maiores ipsum, ut, exercitationem eligendi atque eveniet et, architecto ratione minus placeat beatae nesciunt commodi itaque reiciendis odit earum iste esse! Quo, quae blanditiis? ', '7894561230', 'I1-0_I21-2'),
(3, 'vansh', '4a7d1ed414474e4033ac29ccb8653d9b', 'vansh', NULL, NULL, NULL),
(4, 'soni', '4a7d1ed414474e4033ac29ccb8653d9b', 'vivek', NULL, NULL, NULL),
(5, 'dixitpriyanshu', '50e6b0ac71c7a3708920191eb5ec301b', 'Priyanshu', NULL, NULL, NULL),
(6, 'ABCD', '4a7d1ed414474e4033ac29ccb8653d9b', 'ABCD', 'adr', 'ph', NULL),
(7, 'ABCDE', '4a7d1ed414474e4033ac29ccb8653d9b', 'ABCDE', 'PATNA', '9632154870', NULL),
(8, 'Tester1', '4a7d1ed414474e4033ac29ccb8653d9b', 'Tester1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, nemo accusamus ut commodi excepturi quam eum ratione fuga, autem culpa praesentium dolore dolor illum laborum cumque quasi repellendus delectus, vero atque cupiditate magni minus. Itaque, qu', '9874123056', 'I14-1_a1-2'),
(9, 'abhay', '4a7d1ed414474e4033ac29ccb8653d9b', 'abhay', 'asdfghjklqwertyui', '9874563210', NULL),
(10, 'demo', '4a7d1ed414474e4033ac29ccb8653d9b', 'demo', 'qwerty', '1478523690', NULL),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Lorem ipsum, dolor sit amet consectetur adipisicin', '987456123', 'a1-1'),
(13, 'user2', '4a7d1ed414474e4033ac29ccb8653d9b', 'user2', 'bengalore', '987654213', 'I12-1'),
(14, 'abc1', '23734cd52ad4a4fb877d8a1e26e5df5f', 'abc1', 'abc1', '1234', 'a1-1'),
(15, 'test100', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'test100', 'bangalore', '1346789', NULL),
(16, 'Amrit', '701d20d98e740d1d7070071345296a82', 'Amrit', 'bangalore', '123456789', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v1`
--

CREATE TABLE `v1` (
  `ITEM_ID` varchar(255) DEFAULT NULL,
  `ITEM_TITLE` varchar(255) DEFAULT NULL,
  `ITEM_CATEGORY` varchar(255) DEFAULT NULL,
  `IN_STOCK1` int(11) DEFAULT NULL,
  `IMG_ID` varchar(255) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v2`
--

CREATE TABLE `v2` (
  `ITEM_ID` varchar(255) DEFAULT NULL,
  `ITEM_TITLE` varchar(255) DEFAULT NULL,
  `ITEM_CATEGORY` varchar(255) DEFAULT NULL,
  `IN_STOCK1` int(11) DEFAULT NULL,
  `IMG_ID` varchar(255) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `search`
--
DROP TABLE IF EXISTS `search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `search`  AS SELECT `stock1`.`ITEM_ID` AS `ITEM_ID`, `stock1`.`ITEM_TITLE` AS `ITEM_TITLE`, `stock1`.`ITEM_CATEGORY` AS `ITEM_CATEGORY`, `stock1`.`IN_STOCK1` AS `IN_STOCK1`, `stock1`.`IMG_ID` AS `IMG_ID`, `stock1`.`STATUS` AS `STATUS`, `stock1`.`PRICE` AS `PRICE` FROM `stock1` WHERE `stock1`.`ITEM_TITLE` like '%outdoor%\'%outdoor%' ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
