CREATE DATABASE IF NOT EXISTS SneakerStyleX;
USE SneakerStyleX;
SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Table structure for table `cart_items`


CREATE TABLE `cart_items` (
  `cart_id` int(11) NOT NULL,
  `sneaker_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`) VALUES
(9, 10, '2023-04-26 22:20:04'),
(10, 10, '2023-04-26 22:22:57'),
(11, 10, '2023-04-26 22:23:19'),
(12, 10, '2023-04-26 22:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `sneaker_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `order_items`

INSERT INTO `order_items` (`order_id`, `sneaker_id`, `quantity`) VALUES
(9, 24, 4),
(9, 34, 2),
(9, 41, 4),
(9, 59, 1),
(12, 34, 4);

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `roles`

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'User'),
(2, 'Admin');

-- Table structure for table `shopping_carts`


CREATE TABLE `shopping_carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `sizes`

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `sizes`

INSERT INTO `sizes` (`size_id`, `name`) VALUES
(1, 'US 7'),
(2, 'US 7.5'),
(3, 'US 8'),
(4, 'US 8.5'),
(5, 'US 9'),
(6, 'US 9.5'),
(7, 'US 10'),
(8, 'US 10.5'),
(9, 'US 11'),
(10, 'US 11.5'),
(11, 'US 12'),
(12, 'US 12.5'),
(13, 'US 13');

-- Table structure for table `sneakers`


CREATE TABLE `sneakers` (
  `sneaker_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `sneakers`

INSERT INTO `sneakers` (`sneaker_id`, `model`, `image`, `price`) VALUES
(3, 'Supreme x Air Force 1 Low \'Box Logo - White\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/071/408/055/original/585307_00.png.png', '91.00'),
(4, 'Air Force 1 \'07 \'White Black\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/051/085/945/original/717534_00.png.png', '85.00'),
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
(60, 'Air Jordan 4 Retro SE GS \'Craft\'', 'https://image.goat.com/750/attachments/product_template_pictures/images/083/862/043/original/1103562_00.png.png', '142.00'),
(63, 'ue', 'media/aboutSide.jpeg', '19.00');

-- Table structure for table `sneaker_sizes`

CREATE TABLE `sneaker_sizes` (
  `sneaker_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `sneaker_sizes`

INSERT INTO `sneaker_sizes` (`sneaker_id`, `size_id`) VALUES
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(7, 13),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(8, 11),
(8, 12),
(8, 13),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(10, 13),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(13, 13),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 12),
(14, 13),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(15, 12),
(15, 13),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 12),
(16, 13),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(17, 8),
(17, 9),
(17, 10),
(17, 11),
(17, 12),
(17, 13),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(18, 11),
(18, 12),
(18, 13),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12),
(19, 13),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(20, 11),
(20, 12),
(20, 13),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(21, 12),
(21, 13),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(22, 9),
(22, 10),
(22, 11),
(22, 12),
(22, 13),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 9),
(23, 10),
(23, 11),
(23, 12),
(23, 13),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(24, 9),
(24, 10),
(24, 11),
(24, 12),
(24, 13),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(26, 8),
(26, 9),
(26, 10),
(26, 11),
(26, 12),
(26, 13),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 8),
(27, 9),
(27, 10),
(27, 11),
(27, 12),
(27, 13),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(28, 7),
(28, 8),
(28, 9),
(28, 10),
(28, 11),
(28, 12),
(28, 13),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(29, 8),
(29, 9),
(29, 10),
(29, 11),
(29, 12),
(29, 13),
(30, 10),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(31, 7),
(31, 8),
(31, 9),
(31, 10),
(31, 11),
(31, 12),
(31, 13),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(32, 6),
(32, 7),
(32, 8),
(32, 9),
(32, 10),
(32, 11),
(32, 12),
(32, 13),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(33, 6),
(33, 7),
(33, 8),
(33, 9),
(33, 10),
(33, 11),
(33, 12),
(33, 13),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(34, 6),
(34, 7),
(34, 8),
(34, 9),
(34, 10),
(34, 11),
(34, 12),
(34, 13),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(35, 7),
(35, 8),
(35, 9),
(35, 10),
(35, 11),
(35, 12),
(35, 13),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(36, 7),
(36, 8),
(36, 9),
(36, 10),
(36, 11),
(36, 12),
(36, 13),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(37, 6),
(37, 7),
(37, 8),
(37, 9),
(37, 10),
(37, 11),
(37, 12),
(37, 13),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(38, 7),
(38, 8),
(38, 9),
(38, 10),
(38, 11),
(38, 12),
(38, 13),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(39, 7),
(39, 8),
(39, 9),
(39, 10),
(39, 11),
(39, 12),
(39, 13),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(40, 6),
(40, 7),
(40, 8),
(40, 9),
(40, 10),
(40, 11),
(40, 12),
(40, 13),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(41, 6),
(41, 7),
(41, 8),
(41, 9),
(41, 10),
(41, 11),
(41, 12),
(41, 13),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(42, 5),
(42, 6),
(42, 7),
(42, 8),
(42, 9),
(42, 10),
(42, 11),
(42, 12),
(42, 13),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(43, 5),
(43, 6),
(43, 7),
(43, 8),
(43, 9),
(43, 10),
(43, 11),
(43, 12),
(43, 13),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 5),
(44, 6),
(44, 7),
(44, 8),
(44, 9),
(44, 10),
(44, 11),
(44, 12),
(44, 13),
(45, 1),
(45, 2),
(45, 3),
(45, 4),
(45, 5),
(45, 6),
(45, 7),
(45, 8),
(45, 9),
(45, 10),
(45, 11),
(45, 12),
(45, 13),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(46, 6),
(46, 7),
(46, 8),
(46, 9),
(46, 10),
(46, 11),
(46, 12),
(46, 13),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(47, 5),
(47, 6),
(47, 7),
(47, 8),
(47, 9),
(47, 10),
(47, 11),
(47, 12),
(47, 13),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(48, 5),
(48, 6),
(48, 7),
(48, 8),
(48, 9),
(48, 10),
(48, 11),
(48, 12),
(48, 13),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(49, 5),
(49, 6),
(49, 7),
(49, 8),
(49, 9),
(49, 10),
(49, 11),
(49, 12),
(49, 13),
(50, 1),
(50, 2),
(50, 3),
(50, 4),
(50, 5),
(50, 6),
(50, 7),
(50, 8),
(50, 9),
(50, 10),
(50, 11),
(50, 12),
(50, 13),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(51, 5),
(51, 6),
(51, 7),
(51, 8),
(51, 9),
(51, 10),
(51, 11),
(51, 12),
(51, 13),
(52, 1),
(52, 2),
(52, 3),
(52, 4),
(52, 5),
(52, 6),
(52, 7),
(52, 8),
(52, 9),
(52, 10),
(52, 11),
(52, 12),
(52, 13),
(53, 1),
(53, 2),
(53, 3),
(53, 4),
(53, 5),
(53, 6),
(53, 7),
(53, 8),
(53, 9),
(53, 10),
(53, 11),
(53, 12),
(53, 13),
(54, 1),
(54, 2),
(54, 3),
(54, 4),
(54, 5),
(54, 6),
(54, 7),
(54, 8),
(54, 9),
(54, 10),
(54, 11),
(54, 12),
(54, 13),
(55, 1),
(55, 2),
(55, 3),
(55, 4),
(55, 5),
(55, 6),
(55, 7),
(55, 8),
(55, 9),
(55, 10),
(55, 11),
(55, 12),
(55, 13),
(56, 1),
(56, 2),
(56, 3),
(56, 4),
(56, 5),
(56, 6),
(56, 7),
(56, 8),
(56, 9),
(56, 10),
(56, 11),
(56, 12),
(56, 13),
(57, 1),
(57, 2),
(57, 3),
(57, 4),
(57, 5),
(57, 6),
(57, 7),
(57, 8),
(57, 9),
(57, 10),
(57, 11),
(57, 12),
(57, 13),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(58, 5),
(58, 6),
(58, 7),
(58, 8),
(58, 9),
(58, 10),
(58, 11),
(58, 12),
(58, 13),
(59, 1),
(59, 2),
(59, 3),
(59, 4),
(59, 5),
(59, 6),
(59, 7),
(59, 8),
(59, 9),
(59, 10),
(59, 11),
(59, 12),
(59, 13),
(60, 1),
(60, 2),
(60, 3),
(60, 4),
(60, 5),
(60, 6),
(60, 7),
(60, 8),
(60, 9),
(60, 10),
(60, 11),
(60, 12),
(60, 13);

-- Table structure for table `users`

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - false, 1 - true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `users`

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `password`, `is_admin`) VALUES
(3, 'Admin', 'User', 'admin@example.com', 'password', 1),
(10, 'Blendi', 'Rrustemi', 'blendi@gmail.com', '3cf64a833a49a8c6e803798fb5608f7149aa540fd51979d9b6f1bcc7df0a8d3e', 1),
(11, 'Mario', 'Stura', 'mario@gmail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 1),
(12, 'Michael', 'Jordan', 'mj@23.com', '3cf64a833a49a8c6e803798fb5608f7149aa540fd51979d9b6f1bcc7df0a8d3e', 0),
(13, 'Erita', 'Cunaku', 'erita@gmail.com', '9d65abec58a70d03d76f1af760f2092c743636d3a1d9ff689dbc1bc1da7e876a', 0);

-- Table structure for table `user_roles`

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `user_roles`

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(3, 1),
(10, 2),
(11, 1),
(13, 1);



-- Indexes for table `cart_items`

ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_id`,`sneaker_id`),
  ADD KEY `sneaker_id` (`sneaker_id`);

-- Indexes for table `orders`

ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

-- Indexes for table `order_items`

ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`sneaker_id`),
  ADD KEY `sneaker_id` (`sneaker_id`),
  ADD KEY `idx_sneaker_id` (`sneaker_id`);


-- Indexes for table `roles`

ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);


-- Indexes for table `shopping_carts`

ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);


-- Indexes for table `sizes`

ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);


-- Indexes for table `sneakers`

ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`sneaker_id`);


-- Indexes for table `sneaker_sizes`

ALTER TABLE `sneaker_sizes`
  ADD PRIMARY KEY (`sneaker_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);


-- Indexes for table `users`

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


-- Indexes for table `user_roles`

ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);


-- AUTO_INCREMENT for dumped tables



-- AUTO_INCREMENT for table `orders`

ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


-- AUTO_INCREMENT for table `roles`

ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


-- AUTO_INCREMENT for table `shopping_carts`

ALTER TABLE `shopping_carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;


-- AUTO_INCREMENT for table `sizes`

ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


-- AUTO_INCREMENT for table `sneakers`

ALTER TABLE `sneakers`
  MODIFY `sneaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;


-- AUTO_INCREMENT for table `users`

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


-- Constraints for dumped tables



-- Constraints for table `cart_items`

ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_carts` (`cart_id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`sneaker_id`);


-- Constraints for table `orders`

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);


-- Constraints for table `order_items`

ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`sneaker_id`);


-- Constraints for table `shopping_carts`

ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);


-- Constraints for table `sneaker_sizes`

ALTER TABLE `sneaker_sizes`
  ADD CONSTRAINT `sneaker_sizes_ibfk_1` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`sneaker_id`),
  ADD CONSTRAINT `sneaker_sizes_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`);


-- Constraints for table `user_roles`

ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
