-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2019 at 08:54 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokita`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Mainan'),
(4, 'Alat Tulis'),
(5, 'Buku'),
(6, 'Daily');

-- --------------------------------------------------------

--
-- Table structure for table `codeigniter_register`
--

CREATE TABLE `codeigniter_register` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `verification_key` varchar(250) NOT NULL,
  `is_email_verified` enum('no','yes') NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codeigniter_register`
--

INSERT INTO `codeigniter_register` (`id`, `name`, `email`, `password`, `verification_key`, `is_email_verified`, `level`) VALUES
(0, 'admin', 'admin@admin.com', '$2a$08$WuX/ENxkCED4mbvxwU.f3.x1eV2wRgsCB2UKvUfoRacnYG/88F.Ri', 'ae1ab30821000b5384f16e00da7339f2', 'no', 0),
(2, 'a', 'a@a.com', '$2a$08$br1962nki0sclmA1YBed0uW1fo3RsVdW16LlYFfP6jvA1596KojzW', '909ac233fe697f2fa6608dc676284425', 'no', 1),
(3, 'b', 'b@b.com', '$2a$08$JNCR2mHFbDm3RExrjt0X4eRKaDYE3KaeySNV1qCkGiGW8CY78dcxm', 'bd702dd7048797ca9d796228383d365d', 'no', 1),
(5, 'septiandy', 'septiandy@student.umn.ac.id', '$2a$08$IIaegquUxV15WJpcqQktnOL7ui/FAM5B5PoEDjRRDYYtrOAZVhAF.', 'e9d0494e47579fe8bf1396b9d3da0422', 'no', 1),
(6, 'haha', 'haha@haha.com', '$2a$08$HGrD0ZGL9PxpdNuGWrqwLOpO4AIEDntZns5gnNpYxFiTmqQZPHrPu', '8aae9b8a2f50e8f3b98437f1e9b73925', 'no', 1),
(7, 'JS', 'js@js.com', '$2a$08$/iQVWujtyNaZYLzq34QhJeuimtk14fc2q6z8TrqWhgSphoUhi3aK2', 'a0bd176ecd1a0cea3aff2604bea512d9', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_status_id`, `tracking_number`, `order_date`) VALUES
(1, 7, 1, '123123123123', '2019-05-09 14:36:26'),
(2, 7, 4, 'E12227', '2019-05-09 14:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_shopping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity_shopping`) VALUES
(1, 5, 3),
(1, 8, 2),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `description`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_weight` float NOT NULL,
  `product_detail` text NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_path_image` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_weight`, `product_detail`, `product_stock`, `product_path_image`, `category_id`) VALUES
(1, 'Coca-Cola', 5700, 600, 'Sebuah minuman bersoda yang mampu memberikan rasa segar ditenggorokan!', 150, 'assets/images/coca_cola.jpg', 2),
(2, 'Pena Metal Ball', 9800, 10, 'Pena ini mampu membuat tulisan di dinding dengan sangat tebal, dia pun juga bisa menulis.', 100, 'assets/images/pena_metal_ball.jpg', 4),
(3, 'Sabun Dettol', 5000, 500, 'Sabun Dettol Fresh yang akan membersihkan dan menyegarkan tubuh setelah mandi. ', 150, 'assets/images/sabun.jpg', 6),
(4, 'Chitato', 10000, 150, 'Rasa Varian:\r\nOriginal, Sapi Panggang, Ayam Bumbu, Ayam Bumbu Bakar, Ayam Bumbu Panggang, Keju Panggang, Indomie Goreng', 200, 'assets/images/Chitato.jpg', 1),
(5, 'Bebek Kuning', 25000, 200, 'Bebek karet yang bisa menemanimu disaat mandi sendirian.', 40, 'assets/images/bebek_kuning.jpg', 3),
(6, 'Cream Cracker', 13100, 200, 'Sebuah kue kering yang bisa mengenyangkan perutmu hingga penuh saat waktu luangmu!', 99, 'assets/images/cream_cracker.jpg', 1),
(7, 'Sprite', 4900, 600, 'Minuman bersoda berasa minum liangteh!', 150, 'assets/images/sprite.jpg', 2),
(8, 'Penghapus Staples', 7000, 10, 'Sebuah penghapus yang bahkan bisa menghapus nasib.', 80, 'assets/images/staples.jpg', 4),
(9, 'Pulpen Gel Warna Warni', 25000, 12, 'Pulpen Gel Warna Warni ini dapat mempercantik karya Anda.', 10, 'assets/images/pulpen_gel_warna.jpg', 4),
(10, 'Yoyo', 15000, 5, 'Yoyo merupakan mainan yang cocok untuk dimainkan oleh anak yang berusia 13 tahun ke bawah', 50, 'assets/images/yoyo.jpg', 3),
(11, 'Babi Ngesot', 45000, 200, 'Buku karya Raditya Dika yang keempat ini yaitu Babi Ngesot: Datang Tak Diundang, Pulang Tak Berkutang adalah kumpulan cerita pendek pengalaman pribadi Raditya Dika, penulis Indonesia terbodoh saat ini. Simak tujuh belas cerita aneh-tapi-nyata Raditya di buku ini, termasuk kalang kabut digencet kakak kelas, dihantuin setan rambut poni, sampai perjuangan menyelamatkan keteknya yang sedang \'sakit\'.', 20, 'assets/images/buku_babi_ngesot.jpeg', 5),
(12, 'Komik Doraemon', 22500, 110, 'Komik Doraemon yang ke-15 ini sangat lucu untuk dibaca dan banyak hal yang bisa dipelajari dan bermanfaat dari komik ini.', 35, 'assets/images/buku_doraemon.jpg', 5),
(13, 'Parallel Computing', 200000, 600, 'Buku karya Michael J. Quinn ini menjelaskan tentang bagaimana Parallel Computing bekerja.', 10, 'assets/images/Parallel_Computing_Book.jpg', 5),
(14, 'Pencil 2B', 12000, 200, 'Pencil 2B Faber Castell yang dapat digunakan untuk menulis apa pun dan juga untuk ujian.', 100, 'assets/images/Pensil.jpg', 4),
(15, 'Susu Ultra UHT', 5000, 600, 'Rasa Varian:\r\nPlain, Plain Low Fat, Coklat, Stroberi, Mocca, Taro', 100, 'assets/images/susu.jpg', 2),
(16, 'Tayo', 20000, 50, 'Hey Tayo... Hey Tayo dia bis kecil ramah melaju melompat Tayo selalu senang, Mainan Tayo yang melaju dengan lancar.', 40, 'assets/images/Tayo.jpg', 3),
(17, 'Sikat Gigi', 8000, 100, 'Ayo berantas kuman di gigi dengan menggunakan sikat gigi. Sikat gigi setiap hari agar gigi tetap sehat dan tidak berlubang!', 200, 'assets/images/sikat_gigi.jpg', 6),
(18, 'Odol', 10000, 75, 'Odol akan membantu membuat gigi putih bersih dan cemerlang!', 50, 'assets/images/Odol.png', 6),
(19, 'Kopi Good Day', 6000, 250, 'Kopi Good Day akan membuat hari-harimu menjadi cerah dan nikmat, senikmat rasa pada Kopi Good Day. \r\nDengan varian rasa: Originale Cappuccino Coffee, Tiramisu Bliss Coffee, Funtastic Moccacinno Coffee, Avocado Delight Coffee.', 300, 'assets/images/Good_day.png', 2),
(20, 'Beng-beng', 1300, 12, 'Beng-beng dengan kelezatan cokelat dan karamel yang begitu meleleh dimulut!', 500, 'assets/images/Beng2.jpg', 1),
(21, 'Play-Doh', 55000, 212, 'Play-Doh sebuah mainan yang akan mengasah kreativitas dari anak-anak dalam membuat sesuatu yang diinginkan dengan lilin.', 5, 'assets/images/play_doh.jpg', 3),
(22, 'Oreo', 8000, 137, 'Kelezatan Oreo dengan berbagai rasa varian: Oreo Original, Oreo Chocolate Creme, Oreo Peanut Butter and Chocolate, \r\nOreo Strawberry Creme, Oreo Ice Cream Blueberry Flavor, \r\nGolden Oreo Vanilla.', 200, 'assets/images/oreo.jpg', 1),
(23, 'Buku Diary', 30000, 100, 'Semua cerita hari-harimu dapat ditumpahkan kedalam buku harian ini...', 250, 'assets/images/diary.jpg', 5),
(24, 'Shampoo TRESemme', 45000, 900, 'Shampoo TRESemme ini dapat menghilangkan ketombe-ketombe yang membandel yang ada di kepalamu, sehingga terasa nyaman dan segar.', 55, 'assets/images/shampoo.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `shopping_cart_id` int(11) NOT NULL,
  `quantity_shopping` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_carts`
--

INSERT INTO `shopping_carts` (`shopping_cart_id`, `quantity_shopping`, `user_id`, `product_id`) VALUES
(1, 3, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 6),
(4, 1, 1, 2),
(5, 1, 1, 2),
(6, 1, 1, 6),
(7, 1, 1, 1),
(8, 1, 1, 6),
(9, 1, 1, 10),
(10, 1, 1, 15),
(11, 1, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT '0',
  `is_finish` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_user`, `id_product`, `transaction_date`, `quantity`, `total_price`, `is_sent`, `is_finish`) VALUES
(2, 2, 10, '2019-05-13 20:27:56', 1, 15000, 0, 0),
(3, 3, 16, '2019-05-13 23:47:54', 1, 20000, 0, 0),
(4, 5, 16, '2019-05-14 09:14:25', 1, 20000, 0, 0),
(5, 5, 10, '2019-05-14 09:14:53', 1, 15000, 0, 0),
(6, 5, 16, '2019-05-14 09:14:57', 1, 20000, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `codeigniter_register`
--
ALTER TABLE `codeigniter_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_status_id` (`order_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id_idx` (`category_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`shopping_cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `codeigniter_register`
--
ALTER TABLE `codeigniter_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `shopping_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_status_id` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`order_status_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `codeigniter_register` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `codeigniter_register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
