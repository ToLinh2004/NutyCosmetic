-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 22, 2024 lúc 04:13 PM
-- Phiên bản máy phục vụ: 8.3.0
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blue_cosmertics`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Face'),
(2, 'Hair');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `odder_items`
--

CREATE TABLE `odder_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `unit_price` float NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `odder_items`
--

INSERT INTO `odder_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `image_url`) VALUES
(1, 1, 2, 1, 3000000, NULL),
(2, 2, 4, 2, 4000000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_status_id` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `total_price` float NOT NULL,
  `payment_method` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status_id`, `date`, `total_price`, `payment_method`, `created_at`) VALUES
(1, 1, 1, '2024-03-08 21:53:40', 100000, 'Tiền mặt', '2024-03-08 14:54:40'),
(2, 1, 2, '2024-03-09 21:53:40', 100000, 'Tiền mặt', '2024-03-09 14:54:40'),
(3, 3, 3, '2024-03-10 21:53:40', 100000, 'Tiền mặt', '2024-03-10 14:54:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `status_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`id`, `status_name`) VALUES
(1, 'Ordered'),
(2, 'Paid'),
(3, 'Received ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` float NOT NULL,
  `image_name` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `category_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `image_name`, `image_url`, `quantity`, `category_id`) VALUES
(1, ' Neutrogena Oil- Free Salicylic Acid Pink', '9.1-fluid ounce pump bottle of liquid oil-free acne facial cleanser with\n salicylic acid acne medicine to treat acne and prevent future breakouts, revealing clearer skin in just 1 week', 320000, 'Neutrogena Oil- Free Salicylic Acid Pink', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701254305/Prety_Girls/ckxu1hicayac1ot6dauf.jpg', 12, 1),
(2, 'SKIN PERFECTING 2% BHA Liquid Salicylic Acid Exfol', ' GENTLE NON-ABRASIVE LEAVE-ON EXFOLIATOR: with 2% BHA (Beta hydroxy acid) to unclog & \n diminish enlarged pores, exfoliate dead skin cells, smooth wrinkles & brighten & even out skin tone', 200000, 'SKIN PERFECTING 2% BHA Liquid Salicylic Acid Exfoliant', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701258917/Prety_Girls/u3qcus1cuurgevuttfjs.jpg', 5, 1),
(3, 'CeraVe Foaming Facial Cleanse', 'Dispenses as a clear gel cleanser and transforms into a foam as you lather. Cleanses \n without leaving skin feeling tight, dry, or stripped', 235000, 'CeraVe Foaming Facial Cleanse', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701259179/Prety_Girls/rx5h4aph75rspuxgvz0d.jpg', 12, 1),
(4, 'Muji Face Soap', 'Muji Face Soap is a product that can be considered the in Muji\'s facial cleanser product . Because the product has many natural ingredients and \n is suitable for almost all skin types such as oily skin, normal skin and combination skin', 555000, 'Muji Face Soap', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701259179/Prety_Girls/rx5h4aph75rspuxgvz0d.jpg', 7, 1),
(5, 'RoC Multi Correxion 5-in-1 Anti-Aging Daily Face', 'Lightweight and mild, RoC’s formula was a heavy\n hitter for smoothing lines and skin texture in the GH Beauty Lab’s anti-aging day cream test ', 630000, 'RoC Multi Correxion 5-in-1 Anti-Aging Daily Face', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701260054/Prety_Girls/ioef2cksfaenpqt1oyyo.jpg ', 18, 1),
(6, 'Origins Clear Improvement Pore Clearing Moisturize', 'The moisturizer uses 1% salicylic acid — which is\n considered one of the most effective over-the-counter ingredients at clearing acne — to gently exfoliate the\n skin and help unclog pores.', 300000, 'Origins Clear Improvement Pore Clearing Moisturizer With Bambo', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701261481/Prety_Girls/mtp404pj9i1ru6agmwih.jpg', 30, 1),
(7, 'SkinCeuticals Metacell Renewal B3', 'A winner of the GH Beauty Lab\'s face serum test, SkinCeuticals’ formula has\n high levels of vitamin B3 to stimulate cell turnover.', 350000, 'SkinCeuticals Metacell Renewal B3', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701261748/Prety_Girls/pooyacxbaneqry4qqvb2.jpg ', 32, 1),
(8, 'Pacifica Beauty, Salty Waves', ' ADD INSTANT TEXTURE FOR SURFER GIRL HAIR without stepping into the ocean with our \n texture spray that smells of banana and coconut water', 280000, 'Pacifica Beauty, Salty Waves', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701261984/Prety_Girls/shr9vxksbuj90gzvkobc.jpg', 8, 1),
(9, 'Bella Belle Magic Whitening Body Lotion SPF46', 'The product originates from France and is 100% extracted\n from natural ingredients that care and whiten the skin from deep within', 400000, 'Bella Belle Magic Whitening Body Lotion SPF46', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701262457/Prety_Girls/wxlb28lqmzoaxr8upug7.png', 7, 1),
(10, 'Eucerin Ultra White Spotless Night Cream', 'This is Eucerin\'s night whitening cream - a famous German brand that\n is no stranger to the Vietnamese skincare community.', 235000, 'Eucerin Ultra White Spotless Night Cream', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701437441/Prety_Girls/ehnlw5cpzdceq3l0hqnj.jpg', 8, 1),
(11, 'SVR Clairial Night Peel night cream for melasma an', 'Coming from SVR - France\'s leading brand, SVR Clairial \n Night Peel skin whitening cream has the ability to reduce melasma, whiten skin, exfoliate, and improve smoother\n skin surface', 760000, 'SVR Clairial Night Peel night cream for melasma and whitening', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701437626/Prety_Girls/kxcwd2gjdr9grlkqe7cn.jpg', 33, 1),
(12, 'Bioderma Cicabio Creme SPF 50+ moisturizing and re', 'Bioderma Cicabio Crème SPF 50+ is a skin\n whitening cream and sunscreen, from the Bioderma brand ', 399000, 'Bioderma Cicabio Crème SPF 50+ moisturizing and restoring cream', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701437724/Prety_Girls/p1bcfj15kvpfhvx25d7m.jpg', 12, 1),
(13, 'Nuxe Creme Fraiche De Beaute 48hr Moisturizing Cre', 'This is a cream from Nuxe - a skin care brand from France. \nThe product helps moisturize and soften skin for 48 hours, eliminating dryness, peeling, and cracking, and soothes \nsensitive and irritated skin', 190000, 'Nuxe Creme Fraiche De Beaute 48hr Moisturizing Cream', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701438413/Prety_Girls/dvqy12ucljiqe1oc7kkx.jpg', 23, 2),
(14, 'Night cream to brighten skin and fade pigmentation', ' MartiDerm Pigment Zero DSP Renovation Cream night whitening\n cream is also a product worth trying', 255000, 'Night cream to brighten skin and fade pigmentation ', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701438627/Prety_Girls/u2pvhdzhhg4vrwi2kncw.jpg', 24, 2),
(15, 'Mliglanics herbal black hair Shampoo 250ML – SHINY', ' Milaganics offers the product Herbal Hair Blackening\n Shampoo with a combination of 7 types of herbal extracts and natural essential oils', 320000, 'Mliglanics herbal black hair Shampoo 250ML – SHINY', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701443411/Prety_Girls/k3ntmi6qkyxew4oannwp.jpg', 65, 2),
(16, 'Milaganics grapefruit conditioner 250ml', 'To maintain shiny, strong hair, just cleaning it with shampoo is not enough, \n the hair needs to be supplemented with more specialized nutrients', 530000, 'Milaganics grapefruit conditioner 250ml', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701443700/Prety_Girls/aktcoyhh7en3lk8tju5w.jpg', 76, 2),
(17, ' Milaganics herbal conditioner oil 250ml ', 'To maintain shiny, strong hair, just cleaning it with shampoo is not enough,\n the hair needs to be supplemented with more specialized nutrients.', 345000, 'Milaganics herbal conditioner oil 250ml', ' https://res.cloudinary.com/di9iwkkrc/image/upload/v1701443961/Prety_Girls/hh51kenjezj1hmfkrkpn.jpg', 87, 2),
(18, 'Tsubaki Premium Moist shampoo - conditioner - shin', ' High-end hair care products help keep hair shiny from root to tip\n thanks to Shiseido\'s exclusive absorption technology that helps nutrients absorb quickly and deeply into the hair through the mechanism.', 290000, 'Tsubaki Premium Moist shampoo - conditioner - shine conditioner', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701445222/Prety_Girls/jwdtczciynqiy9rqbs1h.webp', 34, 2),
(19, 'Label,m protein spray hair protection spray 250ml', ' Tsubaki is a brand specializing in producing hair care product lines \n belonging to the Shiseido corporation that is quite famous in Japan. Since its launch, Tsubaki products have been loved and\n chosen by many consumers .', 550000, ' Label,m protein spray hair protection spray 250ml', ' https://res.cloudinary.com/di9iwkkrc/image/upload/v1701444686/Prety_Girls/sjjxhyay0qp3b0kdlhns.jpg', 34, 2),
(20, 'Clay este conditioner for oily scalp, dandruff, an', ' Clay Esthe shampoo Ex shampoo is made\n from natural clay ingredients, helping to remove dirt and sebum on the scalp, keeping the scalp clean', 345000, 'Clay este conditioner for oily scalp, dandruff, and dry hair tails - 300ml japan ', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701444606/Prety_Girls/y183pikmuyf67ozrscig.png ', 56, 2),
(21, ' Nguyen Xuan yellow shampoo', ' lean ingredient list with many rare herbs.Gently nourishes hair, restores hair damage.\n Prevents oil, treats itchy skin and some bad factors affecting hair.', 160000, ' Nguyen Xuan yellow shampoo ', ' https://res.cloudinary.com/di9iwkkrc/image/upload/v1701444970/Prety_Girls/op0jeojbxvs5pp5eok04.jpg', 67, 2),
(22, ' Tsubaki hair conditioner', ' Helps moisturize deep inside the hair while creating a protective membrane to reduce hair dryness and split ends.', 280000, 'Tsubaki hair conditioner ', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701444302/Prety_Girls/vj9chhqmbmygh91uodww.jpg', 8, 1),
(23, 'Vijully Hair Lotion grapefruit essential oil', 'Is a specialized ingredient for hair.Helps prevent and stimulate rapid \n hair growth.Restores and reduces hair dryness.Environmentally friendly design.Easy to use, does not cause irritation. ', 250000, ' Vijully Hair Lotion grapefruit essential oil', ' https://res.cloudinary.com/di9iwkkrc/image/upload/v1701445639/Prety_Girls/ihxmt6otvxapjirwkbdy.png', 55, 2),
(24, 'Palmer\'s hair care combo ', ' Provides essential nutrients for severely damaged hair.Intensive hair care right at home.\n Use for a long time, save costs.Palmer\'s hair care combo ', 120000, 'Palmer\'s hair care combo ', ' https://res.cloudinary.com/di9iwkkrc/image/upload/v1701445894/Prety_Girls/sndfbl9mymz0ipzyfgcd.jpg', 34, 1),
(25, 'Weilaiya shampoo and conditioner set', ' Provides moisture and controls lubricant secretion. Well reviewed by\n users and highly appreciated by experts', 322000, ' Weilaiya shampoo and conditioner set', ' https://res.cloudinary.com/di9iwkkrc/image/upload/v1701446016/Prety_Girls/ci5h0znhfww5xbwxq95c.webp', 12, 2),
(26, ' Delofil Argan Oil Protein Shampoo', ' Ingredients rich in organic substances and using natural herbs effectively and safely clean the scalp.', 220000, ' Delofil Argan Oil Protein Shampoo ', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701446338/Prety_Girls/hypycmhvv9bjmhuswbyo.webp', 32, 0),
(27, 'Aurane Softliss Fantastic Repair Hair Oil', ' Creates a covering layer to help hair shine instantly and protect hair \n from harmful environmental factors.', 490000, 'Aurane Softliss Fantastic Repair Hair Oil ', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701446384/Prety_Girls/hihoaoelt9l1jf3zhbtc.jpg', 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `shop_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`shop_name`, `phone`, `email`, `address`, `description`) VALUES
('BLUE COSMETICS', '0344286689', 'bluecosmetics@gmail.com', '101B Le Huu Trac - Son Tra - Da Nang', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `phone`, `password`, `email`, `role`, `address`, `image_url`) VALUES
(1, 'Thanh Van', '0983726367', 'van1234', 'van@gmail.com', 'user', 'Da Nang', NULL),
(2, 'Mai Huyen', '0397267226', 'huyen123', 'huyen@gamil', 'admin', 'Quang Tri', 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701007211/Prety_Girls/hem0cervrfeoqfeoilvb.jpg'),
(3, 'Linh', '0398217352', 'linh123', 'linh@gmail.com', 'user', 'Quang Ngai', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Chỉ mục cho bảng `odder_items`
--
ALTER TABLE `odder_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_status_id` (`order_status_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk1` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `odder_items`
--
ALTER TABLE `odder_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `odder_items`
--
ALTER TABLE `odder_items`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_status_id` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_fk1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
