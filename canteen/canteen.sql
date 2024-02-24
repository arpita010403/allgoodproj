-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 03:48 PM
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
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `userpassword`) VALUES
(1, 'canteen', 'canteen123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `username`, `password`) VALUES
(1, 'abc', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `customization_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `order_id`, `quantity`, `customization_description`) VALUES
(8, '::1', 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Hot Drinks'),
(3, 'Chinese Corner'),
(4, 'Dosa Corner'),
(5, 'Chat Item'),
(6, 'Cold Drinks'),
(9, 'ice creams');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`, `timestamp`) VALUES
(1, 'arpita', 'a@gmail.com', 'enquiry', 'dvrd', '2024-02-20 18:10:36'),
(2, 'arpita', 'a@gmail.com', 'enquiry', 'gytb', '2024-02-20 18:18:48'),
(4, 'arpita', 'a@gmail.com', 'enquiry', 'ijo', '2024-02-20 21:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` int(255) NOT NULL,
  `item_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_img`) VALUES
(1, 'vadapav', 15, 'vadapav.jpg'),
(2, 'misal pav', 30, 'misalpav.jpg'),
(3, 'bhelpuri', 15, 'bhelpuri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `ordered_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` text NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1557105459, 2, 1, 'pending'),
(2, 1, 1819409444, 6, 1, 'pending'),
(3, 1, 1817240042, 8, 1, 'pending'),
(4, 1, 1396320651, 2, 10, 'pending'),
(5, 1, 531483278, 3, 15, 'pending'),
(6, 1, 994944127, 8, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `name`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES
(1, 0, 'arpita', 10, 'complete', 'pay_NdYQ57phv7Qzej', '2024-02-21 02:56:07'),
(2, 0, 'bb', 500, 'complete', 'pay_NdYZJpIZEtx4ij', '2024-02-21 03:05:10'),
(3, 0, 'krutika', 452, 'complete', 'pay_NdYi6fk62WNTIB', '2024-02-21 03:13:54'),
(4, 0, 'shruti', 150, 'complete', 'pay_NdYqAIoTBdpYfA', '2024-02-21 03:22:26'),
(5, 0, 'sc', 500, 'complete', 'pay_NdYsMPBE9V4shr', '2024-02-21 03:24:32'),
(6, 0, 'arpita', 122, 'pending', '', '2024-02-21 03:29:02'),
(7, 0, 'arpita', 122, 'complete', 'pay_NdYxUpEbDyGTK3', '2024-02-21 03:29:24'),
(8, 0, 'arpita', 10, 'complete', 'pay_NdZBj6qxDbbDlP', '2024-02-21 03:42:52'),
(9, 0, 'Arpita', 122, 'complete', 'pay_NdZD44LLDqfcTC', '2024-02-21 03:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `product_image`, `product_price`, `date`, `status`) VALUES
(2, 'vadapav', 'Delight, consisting of a spiced potato vada sandwiched between a soft pav.', 'vadapav,Snacks,Vadapav', 1, 'vadapav.jpg', '12', '2024-02-19 13:18:13', 'true'),
(3, 'Misal pav', 'Misal Pav is a flavorful and spicy curry made from sprouted moth beans or mixed legumes, simmered in a fiery gravy of spices.', 'misal pav,Misal pav,Snacks', 1, 'misalpav.jpg', '30', '2024-02-09 19:50:52', 'true'),
(4, 'Masala Dosa', 'South Indian delicacy consisting of a thin, crispy crepe made from fermented rice and lentil batter, generously filled with a flavorful spiced potato mixture', 'masala dosa,Masala Dosa,dosa corner', 4, 'Masala-Dosa.jpg', '30', '2024-02-08 09:04:45', 'true'),
(5, 'Veg Fried rice', 'Fragrant Basmati rice wok-tossed with a medley of colorful vegetables, aromatic spices, and a hint of tangy sauce', 'veg fried rice,Fried rice,chinese corner', 3, 'friedrice.jpg', '50', '2024-02-08 09:04:50', 'true'),
(6, 'Bhel puri', 'Refreshing and light, bhelpuri offers a delightful combination of sweet, sour, tangy, and spicy flavors', 'bhel puri,Bhel puri,chat items', 5, 'bhelpuri.jpg', '20', '2024-02-09 19:53:34', 'true'),
(7, 'Butter Milk', 'Refreshing and tangy buttermilk, a traditional Indian beverage made from yogurt. ', 'butter milk,Buttermilk,Butter milk,cold drink', 6, 'buttermilk.jpg', '10', '2024-02-09 19:53:55', 'true'),
(8, 'chinese bhel', 'A dish with dry noodles and schezwan chutney', 'snacks, chinese bhel, bhel', 1, 'chinese bhel.jpeg', '25', '2024-02-19 13:20:03', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `product_quantities` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `product_quantities`, `order_date`, `order_status`) VALUES
(1, 1, 12, 1557105459, 1, 0, '2024-02-20 08:53:49', 'Complete'),
(2, 1, 20, 1819409444, 1, 0, '2024-02-21 13:15:43', 'Complete'),
(3, 1, 37, 1817240042, 2, 0, '2024-02-20 21:35:08', 'pending'),
(4, 1, 120, 1396320651, 1, 0, '2024-02-20 23:49:16', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `username`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, '', 2, 1473643449, 60, 'Netbanking', '2024-02-19 20:46:41'),
(2, '', 1, 497884261, 120, 'Netbanking', '2024-02-20 08:25:45'),
(3, '', 1, 1557105459, 12, 'UPI', '2024-02-20 08:53:49'),
(4, '', 2, 1819409444, 20, 'Select Payment Mode', '2024-02-21 13:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `password`, `user_image`, `user_ip`) VALUES
(1, 'a', 'a@gmail.com', '$2y$10$DSwOyc09tVzbmK5DspgKeuqsmgzW3LbfzSMzkWm39CoylGsAHeYpa', 'images.jpeg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`ordered_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `ordered_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
