-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2023 at 05:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` int(11) NOT NULL,
  `sneaker_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `sneaker_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sneakers`
--

CREATE TABLE `sneakers` (
  `sneaker_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sneakers`
--

INSERT INTO `sneakers` (`sneaker_id`, `model`, `image`, `price`) VALUES
(1, 'Wmns Air Force 1 \'07 \'Triple White\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/051/194/458/original/717555_00.png.png', '85.00'),
(2, 'Air Force 1 \'07 \'Triple Black\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/054/211/154/original/719115_00.png.png', '85.00'),
(3, 'Supreme x Air Force 1 Low \'Box Logo - White\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/071/408/055/original/585307_00.png.png', '91.00'),
(4, 'Air Force 1 \'07 \'White Black\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/051/085/945/original/717534_00.png.png', '85.00'),
(5, 'Air Force 1 Jewel \'Color of the Month - Light Smoke Grey\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/083/071/311/original/1108304_00.png.png', '139.00'),
(6, 'Wmns Air Force 1 Shadow \'Ghost Swoosh\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/072/388/911/original/934525_00.png.png', '105.00'),
(7, 'Air Force 1 Low \'07 LV8 1 \'Triple Red\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/082/584/514/original/581712_00.png.png', '104.00'),
(8, 'Air Force 1 LE GS \'Triple White\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/054/966/859/original/749178_00.png.png', '76.00'),
(9, 'Air Force 1 Low \'Color of the Month - White Silver\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/081/532/683/original/1084858_00.png.png', '144.00'),
(10, 'NOCTA x Air Force 1 Low \'Certified Lover Boy\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/081/976/035/original/933222_00.png.png', '151.00'),
(11, 'NOCTA x Air Force 1 Low \'Certified Lover Boy\' With Love You Forever Book', 'https://image.goat.com/750/attachments/product_template_pictures/images/081/804/588/original/CZ8065_100_LYF_BOOK.png.png', '152.00'),
(12, 'Air Force 1 \'07 LV8 \'Tartan Plaid\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/084/670/065/original/1115020_00.png.png', '121.00'),
(13, 'Air Force 1 \'07 \'White Gum Light Brown\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/051/275/555/original/738569_00.png.png', '85.00'),
(14, 'Air Force 1 \'07 LX \'Cacao Plaid\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/084/275/658/original/1122400_00.png.png', '132.00'),
(15, 'Air Force 1 \'07 LV8 \'40th Anniversary - White Black\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/079/296/283/original/1028182_00.png.png', '123.00'),
(16, 'Off-White x Air Force 1 Mid SP Leather \'Pine Green\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/080/297/803/original/953841_00.png.png', '173.00'),
(17, 'Air Force 1 \'07 LV8 EMB \'All-Star - Salt Flats\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/085/439/170/original/1134652_00.png.png', '124.00'),
(18, 'Supreme x Air Force 1 Low \'Box Logo - Black\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/063/456/488/original/585320_00.png.png', '91.00'),
(19, 'Air Force 1 Low \'Color of the Month - University Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/080/256/032/original/1070954_00.png.png', '142.00'),
(20, 'Air Force 1 \'07 Premium \'White Metallic Silver\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/078/856/614/original/1034844_00.png.png', '142.00'),
(21, 'Air Jordan 1 Retro High OG \'Chicago Lost & Found\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/080/963/035/original/920714_00.png.png', '170.00'),
(22, 'Air Jordan 1 Mid SE GS \'White Ice Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/086/271/155/original/1155000_00.png.png', '113.00'),
(23, 'Air Jordan 1 Retro High OG \'Patent Bred\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/062/992/402/original/784379_00.png.png', '161.00'),
(24, 'Air Jordan 1 Retro High OG \'True Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/083/239/239/original/1059448_00.png.png', '170.00'),
(25, 'Air Jordan 1 Retro High OG \'University Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/049/887/651/original/599627_00.png.png', '161.00'),
(26, 'Air Jordan 1 Mid \'Cement True Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/082/196/300/original/1097475_00.png.png', '118.00'),
(27, 'Air Jordan 1 Mid SE \'Space Jam\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/084/316/916/original/1118896_00.png.png', '128.00'),
(28, 'Air Jordan 1 Retro High OG \'Skyline\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/086/118/077/original/1072277_00.png', '166.00'),
(29, 'Air Jordan 1 Retro High OG \'Stage Haze\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/072/682/079/original/895937_00.png.png', '161.00'),
(30, 'Travis Scott x Air Jordan 1 Low OG SP PS \'Black Phantom\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/082/155/391/original/DO5442_001.png.png', '58.00'),
(31, 'Wmns Air Jordan 1 Mid \'Stealth\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/080/298/091/original/1056097_00.png.png', '117.00'),
(32, 'Air Jordan 1 Retro High \'85 OG \'Black White\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/085/007/537/original/1071994_00.png.png', '189.00'),
(33, 'Air Jordan 1 Mid \'Bred Toe\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/076/377/053/original/998590_00.png.png', '118.00'),
(34, 'Air Jordan 1 Retro High OG \'Yellow Toe\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/078/250/443/original/931515_00.png.png', '161.00'),
(35, 'Air Jordan 1 Mid SE \'White Ice Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/085/185/990/original/1137767_00.png.png', '128.00'),
(36, 'Air Jordan 1 Retro High OG GS \'Chicago Lost & Found\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/080/963/059/original/1029146_00.png.png', '133.00'),
(37, 'Travis Scott x Air Jordan 1 Low OG TD \'Reverse Mocha\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/075/829/268/original/946191_00.png.png', '48.00'),
(38, 'Wmns Air Jordan 1 Retro High OG \'Reverse Laney\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/085/024/424/original/1103103_00.png.png', '171.00'),
(39, 'Wmns Air Jordan 1 High OG \'Starfish\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/076/974/579/original/939977_00.png.png', '170.00'),
(40, 'Air Jordan 1 Retro High OG \'Dark Marina Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/064/377/034/original/815796_00.png.png', '161.00'),
(41, 'Air Jordan 4 Retro \'Military Black\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/071/333/263/original/895934_00.png.png', '198.00'),
(42, 'Air Jordan 4 Retro SE \'Craft\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/083/405/298/original/1037302_00.png.png', '202.00'),
(43, 'Wmns Air Jordan 4 Retro \'Seafoam\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/084/368/708/original/952731_00.png.png', '189.00'),
(44, 'Air Jordan 4 Retro \'Midnight Navy\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/078/713/580/original/946189_00.png.png', '198.00'),
(45, 'Air Jordan 4 Retro SE \'Black Canvas\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/079/407/687/original/933532_00.png.png', '198.00'),
(46, 'A Ma Maniére x Air Jordan 4 Retro \'Violet Ore\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/081/581/385/original/1015173_00.png.png', '213.00'),
(47, 'Air Jordan 4 Retro GS \'Midnight Navy\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/080/197/233/original/1069060_00.png.png', '151.00'),
(48, 'Nike SB x Air Jordan 4 Retro SP \'Pine Green\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/086/042/495/original/1154359_00.png.png', '209.00'),
(49, 'Air Jordan 4 Retro OG \'Fire Red\' 2020', 'https://image.goat.com/750/attachments/product_template_pictures/images/046/247/195/original/612313_00.png.png', '189.00'),
(50, 'Air Jordan 4 Retro \'Red Thunder\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/061/943/941/original/791362_00.png.png', '180.00'),
(51, 'Air Jordan 4 Retro \'Thunder\' 2023', 'https://image.goat.com/750/attachments/product_template_pictures/images/086/042/594/original/1124754_00.png.png', '198.00'),
(52, 'Air Jordan 4 Retro \'White Oreo\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/054/789/997/original/697107_00.png.png', '180.00'),
(53, 'Air Jordan 4 Retro \'University Blue\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/051/754/897/original/631510_00.png.png', '180.00'),
(54, 'Air Jordan 4 Retro PS \'Midnight Navy\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/079/745/747/original/BQ7669_140.png.png', '84.00'),
(55, 'Air Jordan 4 Retro \'Infrared\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/070/041/022/original/888097_00.png.png', '180.00'),
(56, 'Air Jordan 4 Retro \'Black Cat\' 2020', 'https://image.goat.com/750/attachments/product_template_pictures/images/071/407/619/original/529535_00.png.png', '180.00'),
(57, 'Air Jordan 4 Retro \'Lightning\' 2021', 'https://image.goat.com/750/attachments/product_template_pictures/images/058/005/414/original/704168_00.png.png', '208.00'),
(58, 'Wmns Air Jordan 4 Retro \'Canyon Purple\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/077/642/835/original/944673_00.png.png', '189.00'),
(59, 'Air Jordan 4 Retro OG \'Bred\' 2019', 'https://image.goat.com/750/attachments/product_template_pictures/images/079/306/456/original/461782_00.png.png', '189.00'),
(60, 'Air Jordan 4 Retro SE GS \'Craft\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/083/862/043/original/1103562_00.png.png', '142.00');

-- --------------------------------------------------------

--
-- Table structure for table `sneaker_sizes`
--

CREATE TABLE `sneaker_sizes` (
  `sneaker_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - false, 1 - true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_id`,`sneaker_id`),
  ADD KEY `sneaker_id` (`sneaker_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`sneaker_id`),
  ADD KEY `sneaker_id` (`sneaker_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`sneaker_id`);

--
-- Indexes for table `sneaker_sizes`
--
ALTER TABLE `sneaker_sizes`
  ADD PRIMARY KEY (`sneaker_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `sneaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_carts` (`cart_id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`sneaker_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`sneaker_id`);

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sneaker_sizes`
--
ALTER TABLE `sneaker_sizes`
  ADD CONSTRAINT `sneaker_sizes_ibfk_1` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`sneaker_id`),
  ADD CONSTRAINT `sneaker_sizes_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
