-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 04:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_email`, `admin_password`) VALUES
(3, 'Mushfique Tajwar', 'rutab', 'rutab@gmail.com', 'rutab'),
(4, 'Aryan Rayeen Rahman', 'aryan', 'aryan@gmail.com', 'aryan'),
(5, 'Sajid Aryan Sami', 'sajid', 'sajid@gmail.com', 'sajid'),
(6, 'Pranto Roy', 'pranto', 'pranto@gmail.com', 'pranto'),
(7, 'Ramisa Rahman 1', 'ramisa1', 'ramisa1@gmail.com', 'ramisa1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `cart_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `quantity`, `cart_id`) VALUES
(7, 1, '21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Clothing'),
(3, 'Furniture'),
(4, 'Sports'),
(18, 'Decorations'),
(19, 'Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `invoice` int(11) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `amount`, `invoice`, `total_products`, `order_date`, `order_status`) VALUES
(47, 21, 400, 1120643171, 1, '2024-09-24 19:05:08', 'Confirmed'),
(48, 21, 62000, 1128113523, 1, '2024-09-24 19:06:11', 'Pending'),
(49, 21, 68500, 1734256785, 2, '2024-09-26 15:40:51', 'Pending'),
(50, 21, 3450, 1314911960, 2, '2024-09-30 14:16:58', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`order_id`, `user_id`, `invoice`, `product_id`, `quantity`, `order_status`) VALUES
(40, 21, 1120643171, 3, 2, 'Pending'),
(41, 21, 1128113523, 37, 1, 'Pending'),
(42, 21, 1734256785, 36, 1, 'Pending'),
(43, 21, 1314911960, 16, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_keyword`, `category_id`, `product_image`, `product_price`, `status`) VALUES
(1, 'Gaming Chair', 'Extremely Comfortable', 'chair, gaming, rgb, fps, gamering, gamer, chairing', 3, 'Chair.png', '4000', 'true'),
(2, 'RTX 4090', 'Lots and lots of FPS', 'RTX, GTX, GPU, Graphics Card, Graphics', 1, 'GPU.png', '150000', 'true'),
(3, 'Football', 'Bouncy and will guarantee a better playing experience', 'Football, ball, baal, balls, balling, messi, ronaldo, sui, kick', 4, 'Football.png', '200', 'true'),
(4, 'Mouse', 'Best mouse to increase you KDA', 'mouse, computer, logitech, game, gaming, gamer, rgb', 1, 'mouse.png', '4000', 'true'),
(5, 'Hoodie', 'Get warm and cozy in our comfortable hoodie.', 'hoodie, sweater, dress, winter, jacket', 2, 'hoodie.png', '500', 'true'),
(7, 'Air Fryer', 'Make the best french fries easily', 'air fryer, air, fryer, french, kitchen', 19, 'air_fryer.png', '2500', 'true'),
(8, 'Cap', 'Protect yourself from the sun', 'cap, sun, shade, hat', 2, 'cap.png', '250', 'true'),
(9, 'Cricket Ball', 'Showoff your bowling skills', 'ball, cricket, cricket ball, spin, bowling', 4, 'cricket_ball.png', '750', 'true'),
(10, '64 GB DDR5 RAM', 'Dual Channel 64 GB RAM (2 x 32 GB)', 'RAM, Computer, cpu, gaming, rgb', 0, 'ram.png', '12000', 'true'),
(12, 'Shoes', 'You can now finally run faster all thanks to our new shoe.', 'show, nike, air, jordan, air jordan', 2, 'shoes.jpg', '1250', 'true'),
(14, 'Gamepad', 'Get the most ergonomic and comfortable game controller for yourself', 'gamepad, controller, game, gaming, xbox, gamer, rgb', 1, 'gamepad.png', '2500', 'true'),
(15, 'Sofa', 'Get comfy and chill and watch TV while being on our new sofa.', 'sofa, couch', 3, 'sofa.png', '4500', 'true'),
(16, '1 TeraByte SSD', 'Enough to store your brain', 'ssd, 1 tb, hdd, m2', 0, 'ssd.png', '2200', 'true'),
(17, 'Office Chair', 'Stay comfortable for an extended period of time in our office chair', 'chair, office, office chair, ', 3, 'office_chair.png', '7000', 'true'),
(18, 'Rocking Chair', 'The best chair for you to relax in your free time', 'chair, rocking chair, rocking', 3, 'rocking_chair.png', '5500', 'true'),
(19, 'Cargo Pant', 'Get comfy in the latest cargo pant released by us', 'cargo, cargo pant, cargo pants, pant, pants', 2, 'pant.png', '1500', 'true'),
(20, 'Home Theater', 'Listen to audios more clearly and get in the mood with the industry leading home theater', 'home theater, speaker, home, theater, sound system', 1, 'home_theater.png', '12000', 'true'),
(21, 'Tennis Ball', 'The longest lasting tennis ball you will ever find', 'tennis ball, tennis, ball', 4, 'tennis_ball.png', '50', 'true'),
(22, 'Tennis Racket', 'Strongest tennis racket with the best elastics', 'tennis, racket, tennis racket', 4, 'tennis_racket.png', '1000', 'true'),
(23, 'Cricket Bat', 'Be the best batsman with the best bat out there', 'cricket bat, bat, cricket', 4, 'cricket_bat.png', '1500', 'true'),
(24, 'Football Boot', 'Sprint the fastest in the playng field in the coolest boot.', 'football, boot, football boot', 4, 'boot.png', '2000', 'true'),
(25, 'Dining Table Set', 'Seat six people comfortably and eat to your fullest', 'table, dining table, dining', 3, 'dining_table_set.png', '20000', 'true'),
(26, 'Wardrobe', 'Store all your clothing and accesories in the most spacious wardrobe', 'wardobe, wooden, wooden wardrobe', 3, 'wardrobe.png', '17000', 'true'),
(27, 'Bed', 'Sleep to your fullest and get cozy in the best bed out there', 'bed, comfortable', 3, 'bed.png', '10000', 'true'),
(28, 'Study Table', 'Get locked in and focus on your work or study', 'study table, office table, table', 3, 'table.png', '8000', 'true'),
(29, 'Suit', 'Get classy in the finest suit in the market', 'suit, formal', 2, 'suit.png', '37000', 'true'),
(30, 'Sunglass', 'Protect your eyes from the sun in the coolest looking sunglass', 'sunglass, glass, shades', 2, 'sunglass.png', '500', 'true'),
(31, 'Backpack', 'Store all your goodies and daily carry with ease', 'backpack, carry, bag', 2, 'backpack.png', '2000', 'true'),
(32, 'Belt', 'Buckle up with this full leather belt', 'belt, buckle, leather', 2, 'belt.png', '770', 'true'),
(33, 'Watch', 'Tell the time in a fashionable way', 'watch, rolex, time', 2, 'watch.png', '54000', 'true'),
(34, 'Watch - Black', 'Our best in class watch now in a new design', 'watch, black watch, black, time', 2, 'watch_2.png', '66000', 'true'),
(35, 'Laptop', 'Carry your work around with you anywhere', 'laptop, gaming laptop', 1, 'laptop.png', '110000', 'true'),
(36, 'Classic Phone', 'Go back in time with the simplest phone.', 'phone, dumbphone, button phone, button, nokia, classic, classic phone', 1, 'dumbphone.png', '2500', 'true'),
(37, 'DSLR Camera', 'Take the best photo in the highest quality.', 'dslr, camera, slr, digital camera', 1, 'dslr.png', '62000', 'true'),
(38, 'Phone', 'Spend your hard earned money in the market leading smartphone', 'smartphone, sony, phone, smart', 1, 'smartphone.png', '80000', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` int(20) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_full_name`, `user_name`, `user_email`, `user_phone`, `user_image`, `user_address`, `user_ip`, `user_password`) VALUES
(21, 'Mushfique Tajwar Rutab', 'rutab', 'rutab@gmail.com', 1595563744, 'P1.jpg', 'Mohammadpur', '127.0.0.1', '$2y$10$jQPRCgKacCnxpKsuIb1e6.oZsoEuys5dC8XaDfE9lpyfWHKIjyGG.');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(15, 47, 1120643171, 400, 0, '2024-09-24 19:05:08'),
(16, 50, 1314911960, 3450, 0, '2024-09-30 14:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `product_id` int(11) NOT NULL,
  `wishlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`product_id`, `wishlist_id`) VALUES
(18, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
