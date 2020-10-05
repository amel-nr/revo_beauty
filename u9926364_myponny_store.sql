/*
 Navicat Premium Data Transfer

 Source Server         : myponnylive
 Source Server Type    : MySQL
 Source Server Version : 100323
 Source Host           : myponnylive.com:3306
 Source Schema         : u9926364_myponny_store

 Target Server Type    : MySQL
 Target Server Version : 100323
 File Encoding         : 65001

 Date: 23/09/2020 13:46:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for addons
-- ----------------------------
DROP TABLE IF EXISTS `addons`;
CREATE TABLE `addons`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `unique_identifier` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `version` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `activated` int(1) NOT NULL DEFAULT 1,
  `image` varchar(1000) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of addons
-- ----------------------------
INSERT INTO `addons` VALUES (10, 'refund', 'refund_request', '1.0', 1, 'refund_request.png', '2020-07-07 10:12:28', '2020-08-28 21:37:40');
INSERT INTO `addons` VALUES (11, 'affiliate', 'affiliate_system', '1.2', 1, 'affiliate_banner.jpg', '2020-07-07 10:14:36', '2020-08-28 21:37:41');
INSERT INTO `addons` VALUES (12, 'club_point', 'club_point', '1.0', 1, 'club_points.png', '2020-08-27 21:15:57', '2020-08-28 21:37:42');

-- ----------------------------
-- Table structure for affiliate_configs
-- ----------------------------
DROP TABLE IF EXISTS `affiliate_configs`;
CREATE TABLE `affiliate_configs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(1000) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `value` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of affiliate_configs
-- ----------------------------
INSERT INTO `affiliate_configs` VALUES (1, 'verification_form', '[{\"type\":\"text\",\"label\":\"Your name\"},{\"type\":\"text\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"Full Address\"},{\"type\":\"text\",\"label\":\"Phone Number\"},{\"type\":\"text\",\"label\":\"How will you affiliate?\"}]', '2020-03-09 16:56:21', '2020-03-09 11:30:59');

-- ----------------------------
-- Table structure for affiliate_options
-- ----------------------------
DROP TABLE IF EXISTS `affiliate_options`;
CREATE TABLE `affiliate_options`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `details` longtext CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `percentage` double NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of affiliate_options
-- ----------------------------
INSERT INTO `affiliate_options` VALUES (2, 'user_registration_first_purchase', NULL, 20, 1, '2020-03-03 12:08:37', '2020-03-05 10:56:30');
INSERT INTO `affiliate_options` VALUES (3, 'product_sharing', NULL, 20, 0, '2020-03-08 08:55:03', '2020-03-10 09:12:32');
INSERT INTO `affiliate_options` VALUES (4, 'category_wise_affiliate', NULL, 0, 0, '2020-03-08 08:55:03', '2020-03-10 09:12:32');

-- ----------------------------
-- Table structure for affiliate_payments
-- ----------------------------
DROP TABLE IF EXISTS `affiliate_payments`;
CREATE TABLE `affiliate_payments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliate_user_id` int(11) NOT NULL,
  `amount` double(8, 2) NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `norek` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `atasnama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tgl_bayar` timestamp(0) NULL DEFAULT NULL,
  `gambar` varchar(4000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of affiliate_payments
-- ----------------------------
INSERT INTO `affiliate_payments` VALUES (1, 34, 5000.00, 'bca', NULL, '2020-08-29 15:43:49', '2020-08-29 15:44:38', 'paid', '67666755', 'luna maya', '2020-08-29 15:44:38', '[\"uploads\\/products\\/review\\/rXk5L9gdbpVYnSoCFAPp3ck1pALJxL6WQFWggWtP.jpeg\"]');
INSERT INTO `affiliate_payments` VALUES (2, 34, 5000.00, 'bca', NULL, '2020-08-29 16:45:43', '2020-08-29 16:47:04', 'paid', '6766787', 'Luna maya', '2020-08-29 16:47:04', '[\"uploads\\/products\\/review\\/IRqGlk9gg6vPVAkX9JZBJ8ILWi6bm592nZ90rJ1c.jpeg\"]');
INSERT INTO `affiliate_payments` VALUES (3, 36, 5000.00, 'bni', NULL, '2020-08-29 16:50:53', '2020-08-29 16:51:16', 'paid', '5674355', 'Dita', '2020-08-29 16:51:16', '[\"uploads\\/products\\/review\\/Oj7pAn4aqZz5IbzAFx7MW1HEHhbV9wlf4Iz3Ts3h.jpeg\"]');

-- ----------------------------
-- Table structure for affiliate_user_code
-- ----------------------------
DROP TABLE IF EXISTS `affiliate_user_code`;
CREATE TABLE `affiliate_user_code`  (
  `kode_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_active` int(1) NULL DEFAULT 1,
  `use` int(11) NOT NULL DEFAULT 0,
  `sales` int(255) NOT NULL DEFAULT 0,
  `komisi` int(255) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of affiliate_user_code
-- ----------------------------
INSERT INTO `affiliate_user_code` VALUES ('luna60', 34, '2020-08-29 14:44:43', '2020-08-31 13:07:13', 1, 3, 5000, 5000, 4);
INSERT INTO `affiliate_user_code` VALUES ('DITABRAND', 36, '2020-08-29 15:11:28', '2020-08-31 18:58:18', 1, 2, 5000, 5000, 5);
INSERT INTO `affiliate_user_code` VALUES ('brand', 36, '2020-08-29 16:51:42', '2020-08-29 16:51:42', 1, 0, 0, 5000, 6);

-- ----------------------------
-- Table structure for affiliate_users
-- ----------------------------
DROP TABLE IF EXISTS `affiliate_users`;
CREATE TABLE `affiliate_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paypal_email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `bank_information` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `user_id` int(11) NOT NULL,
  `informations` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `balance` double(10, 2) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `jenis` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nomor_hp_pic` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `ig_username` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `fb_username` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `tw_username` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `yt_username` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `alamat_perusahaan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(2) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nomor_hp_perusahaan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `deskripsi_produk` varchar(4000) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `is_approved` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of affiliate_users
-- ----------------------------
INSERT INTO `affiliate_users` VALUES (1, NULL, NULL, 32, NULL, 0.00, 0, '2020-08-29 11:24:20', '2020-08-29 11:24:20', 'influencer', '08778787873', 'ditakarang', 'ditakarang', 'ditakarang', 'ditakarang', NULL, 'ditaprabasari@gmail.com', NULL, 'P', NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (3, NULL, NULL, 34, NULL, 0.00, 0, '2020-08-29 11:44:51', '2020-08-29 11:44:51', 'influencer', '08787878787878', 'lunamaya', 'lunamaya', 'lunamaya', 'lunamaya', NULL, 'saossambel12345@gmail.com', NULL, 'P', NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (4, NULL, NULL, 35, NULL, 0.00, 0, '2020-08-29 11:55:25', '2020-08-29 11:55:25', 'influencer', '0454545454', 'sdsldsdl', 'wdewe', 'dsfdflq', 'sdfsfs', NULL, 'rizkybaity66@gmail.com', NULL, 'L', NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (5, NULL, NULL, 13, NULL, 58200.00, 0, '2020-08-29 12:01:50', '2020-08-29 16:34:37', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (6, NULL, NULL, 36, NULL, 0.00, 0, '2020-08-29 15:01:02', '2020-08-29 15:01:02', 'company', '087867676767', NULL, NULL, NULL, NULL, 'Dita Brand', 'ditacoba133@gmail.com', 'jalan semeru 678', 'P', '87878787877', 'produk kecantikan', 0);
INSERT INTO `affiliate_users` VALUES (7, NULL, NULL, 53, NULL, 0.00, 0, '2020-09-01 15:26:53', '2020-09-01 15:26:53', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (8, NULL, NULL, 56, NULL, 0.00, 0, '2020-09-01 15:39:31', '2020-09-01 15:39:31', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (9, NULL, NULL, 65, NULL, 0.00, 0, '2020-09-02 14:39:52', '2020-09-02 14:39:52', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (10, NULL, NULL, 68, NULL, 0.00, 0, '2020-09-03 14:54:42', '2020-09-04 20:43:24', 'influencer', '082232454238', 'amellzz._', 'inifacebook', 'initwitter', 'iniyoutube', NULL, 'raravivit16@gmail.com', NULL, 'P', NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (11, NULL, NULL, 63, NULL, 0.00, 0, '2020-09-07 14:29:28', '2020-09-07 14:29:28', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (12, NULL, NULL, 73, NULL, 0.00, 0, '2020-09-08 14:55:27', '2020-09-08 14:55:27', 'influencer', '087878787788', 'lunamaya', 'lunamaya', 'lunamaya', 'lunamaya', NULL, 'saossambel12345@gmail.com', NULL, 'P', NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (13, NULL, NULL, 79, NULL, 0.00, 0, '2020-09-15 09:27:38', '2020-09-15 09:27:38', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `affiliate_users` VALUES (14, NULL, NULL, 80, NULL, 0.00, 0, '2020-09-22 18:47:32', '2020-09-22 18:47:32', 'influencer', '081316850595', 'giiralda', 'Giralda Audina', 'gigiraldss', 'Giralda Audina', NULL, 'giraldadn@gmail.com', NULL, 'P', NULL, NULL, 0);

-- ----------------------------
-- Table structure for app_settings
-- ----------------------------
DROP TABLE IF EXISTS `app_settings`;
CREATE TABLE `app_settings`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `currency_id` int(11) NULL DEFAULT NULL,
  `currency_format` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `google_plus` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_settings
-- ----------------------------
INSERT INTO `app_settings` VALUES (1, 'Ponny Beaute', 'uploads/logo/matggar.png', 1, 'symbol', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://youtube.com', 'https://google.com', '2019-08-04 23:39:15', '2019-08-04 23:39:18');

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attributes
-- ----------------------------
INSERT INTO `attributes` VALUES (1, 'ukuran', '2020-02-24 12:55:07', '2020-07-18 08:58:56');
INSERT INTO `attributes` VALUES (4, 'warna', '2020-07-22 16:55:33', '2020-07-22 16:55:33');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `published` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (4, 'uploads/banners/banner.jpg', '#', 1, 1, '2019-03-12 12:58:23', '2019-06-11 11:56:50');
INSERT INTO `banners` VALUES (5, 'uploads/banners/banner.jpg', '#', 1, 1, '2019-03-12 12:58:41', '2019-03-12 12:58:57');
INSERT INTO `banners` VALUES (6, 'uploads/banners/banner.jpg', '#', 2, 1, '2019-03-12 12:58:52', '2019-03-12 12:58:57');
INSERT INTO `banners` VALUES (7, 'uploads/banners/banner.jpg', '#', 2, 1, '2019-05-26 12:16:38', '2019-05-26 12:17:34');
INSERT INTO `banners` VALUES (8, 'uploads/banners/banner.jpg', '#', 2, 1, '2019-06-11 12:00:06', '2019-06-11 12:00:27');
INSERT INTO `banners` VALUES (9, 'uploads/banners/banner.jpg', '#', 1, 1, '2019-06-11 12:00:15', '2019-06-11 12:00:29');
INSERT INTO `banners` VALUES (10, 'uploads/banners/banner.jpg', '#', 1, 0, '2019-06-11 12:00:24', '2019-06-11 12:01:56');
INSERT INTO `banners` VALUES (11, 'uploads/banner/TICFg0YCjgRVUip7pdMDdPBQavR480Up8eLUoy0s.jpeg', '#localpride', 1, 1, '2020-09-02 14:00:17', '2020-09-11 14:19:07');
INSERT INTO `banners` VALUES (12, 'uploads/banner/oVZaCe7zwWadNQ4OuAHkJc7NY53CtKe11uBtYpZ5.jpeg', '#faq', 1, 1, '2020-09-15 16:44:35', '2020-09-23 11:12:41');
INSERT INTO `banners` VALUES (13, 'uploads/banners/9TKsIdaroEYhPcu6vZZ3DQFbzinPLhZV24vDldNf.jpeg', '#promosi', 1, 0, '2020-09-23 10:37:52', '2020-09-23 10:37:52');

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_recommend` varchar(123) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoryblog_id` int(11) NOT NULL,
  `thumbnail` varchar(123) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `showblog` int(123) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categoryblog_id`(`categoryblog_id`) USING BTREE,
  CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`categoryblog_id`) REFERENCES `categoryblog` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blogs
-- ----------------------------
INSERT INTO `blogs` VALUES (12, 'Apa Itu Concealer dan Apakah Kita Membutuhkannya?', '<img style=\"width: 446px; height: 298px; display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/ponny/public/blog/gambar/15972075750.png\">\r\n\r\n<p>Apakah Anda memiliki kulit berjerawat atau noda hitam pada wajah? Atau Anda memiliki kantung mata yang mengganggu penampilan? Bagi perempuan, semua hal yang baru saja disebutkan dapat mengganggu penampilan, namun bukan berarti tidak bisa dimanipulasi. Makeup menjadi solusi bagi Anda yang ingin tampil segar.Jerawat, kemerahan, dan noda hitam pada wajah serta mata panda dapat ditutupi dengan foundation atau BB cream. Jika masih terlihat, Anda bisa menggunakan concealer.  Ya, concealer bisa menjadi penyelamat di saat-saat kondisi wajah tidak prima. Memakainya pada wajah dapat menutupi jerawat, kemerahan, noda hitam, dan kantung mata dengan baik, dibandingkan hanya dengan alas bedak saja. Lalu, apa saja yang perlu Anda tahu tentang concealer?<p><br></p><p>Apa itu concealer?Concealer adalah salah satu produk kecantikan yang digunakan untuk menutupi kekurangan pada wajah, sehingga membuat kulit seseorang terlihat lebih mulus. Concealer dapat digunakan oleh berbagai jenis kulit; kulit kering, berminyak atau kombinasi, termasuk kulit berjerawat. Yang perlu diingat, Anda perlu mengetahui jenis kulit Anda, sehingga dapat memilih bahan-bahan yang terkandung di dalam concealer dengan benar.Contohnya, untuk kulit berjerawat, Anda bisa menggunakan concealer yang mengandung benzoyl peroxide atau salicylic acid. Benzoyl peroxide dipercaya dapat mengurangi jumlah jerawat yang disebabkan oleh bakteri serta yang disebabkan oleh kulit kering dan mengelupas. Selain itu, produk yang berbahan salicylic acid dapat digunakan pada kulit berminyak dan berjerawat. Kandungan ini dipercaya dapat meringankan peradangan dan kemerahan.Apa saja macam-macam concealer?Sama seperti lipstik, concealer juga memiliki bermacam-macam bentuk, ada yang stick, krim, maupun cair. Lalu apa saja yang perlu diketahui:</p><p>1. Concealer berbentuk stickBiasanya concealer  jenis ini diaplikasikan di bawah mata, caranya sama seperti ketika mengaplikasikan lipstik pada bibir. Anda bisa memakainya setelah atau sebelum menggunakan alas bedak. l.Tips: hindari menggunakannya pada area mata dengan cara menarik atau menggores-goreskannya, hal ini dapat menyebabkan kulit Anda menjadi kendur. Jika di bawah area mata Anda kering dan berkeriput, Anda dapat memberikan pelembap yang ringan terlebih dahulu. Pastikan pelembap tidak terlalu berminyak, sehingga tidak terlihat berat di wajah. Jika Anda merasa mengoleskan pelembap terlalu banyak, Anda bisa menepuk-nepuknya dengan tisu.Kelebihan: concealer jenis ini dapat menutupi kekurangan dengan hampir sempurna.Kekurangan: biasanya jenis ini lebih berminyak, jadi tidak perlu mengoleskannya tebal-tebal. Anda perlu memikirkannya kembali jika kulit Anda termasuk kulit berminyak.</p><p>2. Liquid concealerBiasanya concealer ini memiliki wadah seperti tabung serta memiliki â€˜tongkatâ€™ aplikator untuk mengaplikasikannya.Tips: Anda bisa mengoleskannya dengan jari atau dengan aplikator, dan bubuhkan berupa titik-titik kecil pada area di kulit yang ingin Anda tutupi.Kelebihan: concealer ini biasanya lebih ringan dan tidak terlalu berminyak, sehingga Anda bisa menambahkan lapisannya lagi.Kekurangan: karena berbentuk cair, concealer ini memiliki tekstur yang sulit untuk diatur sebab mudah â€˜lariâ€™ ke mana-mana.</p><p>3. Concealer berbentuk krimBiasanya concealer tipe ini dituangkan pada sebuah wadah kecil, seperti wadah eyeshadow, teksturnya pun lembut dan creamy.Tips: concealer jenis ini sangat mudah diaplikasikan pada wajah baik dengan menggunakan jari, kuas, atau spons.Kelebihan: concealer ini cocok digunakan untuk kulit kering. Teksturnya creamy dan melembapkan, namun ada kalanya menjadi tebal dan berat. Kelebihan lainnya adalah mudah dibaurkan pada wajah.Kekurangannya: terkadang konsistensinya menjadi terlalu tebal dan berminyak. Hal tersebut dapat memperlihatkan garis muka Anda.Selain itu, Anda juga akan menemukan concealer  yang berjenis matte-finish liquid concealer, matte-finish cream-to-powder, dan ultra-matte liquid concealer. Kelebihan dari matte-finish liquid concealer adalah tidak membuat garis muka terlihat, dan menutupi jerawat dengan baik. </p><p><br></p><p>Selain itu, bisa juga digunakan untuk alas eyeshadow Anda (diaplikasikan sebelum menggunakan eyeshadow), sedangkan kekurangannya adalah mudah kering dan terlihat tebal. Untuk kulit berjerawat dan kulit kering, Anda juga perlu menghindari matte-finish cream-to-powder, sebab hasil akhirnya dapat membuat kulit kering dan garis-garis wajah terlihat jelas.Bagaimana cara memakai concealer?Anda tidak perlu menggunakan concealer jika tidak memiliki noda hitam atau area di wajah yang ingin Anda â€œsembunyikanâ€. Anda juga tidak perlu menggunakannya, jika alas bedak yang Anda gunakan cukup menutupi kekurangan yang ada. Yang perlu Anda lakukan adalah oleskan tipis-tipis concealer, sekitar satu sampai dua lapis, lalu ratakan dengan jari atau spons sehingga menyatu dengan alas bedak Anda. Pastikan tangan atau spons yang Anda gunakan bersih.</p></p>', 'null', 14, 1, 'makeup-travelling.jpg', 1, '2020-08-12 11:49:06', '2020-09-12 13:02:39');
INSERT INTO `blogs` VALUES (14, 'BEDAK BIASA VS BEDAK CUSHION; APA SAJA BEDANYA?', '<p>Penampilan cantik dengan makeup flawless bergantung dari produk makeup complexion yang Baebellines gunakan, termasuk bedak.<p>Saat ini, berbagai jenis produk bedak yang beredar di pasaran, di antaranya adalah bedak padat dan bedak tabur yang menjadi favorit banyak wanita.</p><p>Biar nggak bingung produk mana yang paling cocok untuk kulit dan cara penggunaan yang tepat, yuk, ketahui perbedaan bedak tabur dengan bedak padat berikut fungsinya.</p><p>1. Dalam Fungsi MakeUp</p><p>Bedak tabur memiliki bahan yang dapat menyerap minyak, sehingga bedak ini cocok untuk kulit yang berminyak.Karena teksturnya lebih halus dari bedak padat, maka bedak tabur sering kali dijadikan setting powder untuk mengunci makeup agar tidak bergeser dan lebih tahan lama.</p><p>Karena teksturnya juga maka bedak tabur lebih buildable dibanding bedak padat, hasilnya pun terlihat natural.</p><p>Berbeda dari bedak tabur, bedak padat terdiri dari dua jenis, yaitu bedak yang dipadatkan (pressed powder) dan bedak yang dipadatkan dan ditambahkan foundation (two-way cake).</p><p>Pressed powder fungsinya tak jauh berbeda dengan bedak tabur, yang berbeda adalah two-way cake. Coverage two-way cake yang cukup tinggi membuat bedak ini dapat membantu meratakan warna kulit dan menutupi noda di wajah.</p><p>Two-way cake juga bisa dijadikan sebagai base makeup jika kandungan foundation-nya cukup tinggi. Bedak padat cocok untuk kulit kering karena formulanya lebih lembap.<br></p></p>', 'null', 14, 1, 'makeup-travelling.jpg', 1, '2020-08-12 14:14:32', '2020-09-12 13:02:50');
INSERT INTO `blogs` VALUES (15, 'BEDAK BIASA VS BEDAK CUSHION; APA SAJA BEDANYA?', '<p></p><p>Penampilan cantik dengan makeup flawless bergantung dari produk makeup complexion yang Baebellines gunakan, termasuk bedak.Saat ini, berbagai jenis produk bedak yang beredar di pasaran, di antaranya adalah bedak padat dan bedak tabur yang menjadi favorit banyak wanita.Biar nggak bingung produk mana yang paling cocok untuk kulit dan cara penggunaan yang tepat, yuk, ketahui perbedaan bedak tabur dengan bedak padat berikut fungsinya.</p><p>1. Fungsi dalam MakeupBedak tabur memiliki bahan yang dapat menyerap minyak, sehingga bedak ini cocok untuk kulit yang berminyak.Karena teksturnya lebih halus dari bedak padat, maka bedak tabur sering kali dijadikan setting powder untuk mengunci makeup agar tidak bergeser dan lebih tahan lama.Karena teksturnya juga maka bedak tabur lebih buildable dibanding bedak padat, hasilnya pun terlihat natural.Baca juga: Trik Memilih Bedak Cushion yang Bagus untuk Menciptakan No-Makeup-Makeup-LookBerbeda dari bedak tabur, bedak padat terdiri dari dua jenis, yaitu bedak yang dipadatkan (pressed powder) dan bedak yang dipadatkan dan ditambahkan foundation (two-way cake).Pressed powder fungsinya tak jauh berbeda dengan bedak tabur, yang berbeda adalah two-way cake. Coverage two-way cake yang cukup tinggi membuat bedak ini dapat membantu meratakan warna kulit dan menutupi noda di wajah.Two-way cake juga bisa dijadikan sebagai base makeup jika kandungan foundation-nya cukup tinggi. Bedak padat cocok untuk kulit kering karena formulanya lebih lembap.</p><p>2. CoverageKarena teksturnya yang halus, maka bedak tabur memiliki coverage yang rendah sehingga Baebellines sebaiknya menggunakannya di atas foundation.Begitu juga dengan pressed powder, baiknya digunakan di atas foundation karena coverage yang rendah. Namun untuk two-way cake, karena sudah dilengkapi dengan foundation, maka dapat dipakai tersendiri.Coverage-nya pun lebih tinggi dibanding bedak lainnya, mulai dari medium sampai tinggi.Baca juga: 5 Alasan Mengapa Harus Beralih Pakai Cushion Foundation dari Sekarang</p><p><br></p><p><img src=\"https://myponnylive.com/public/blog/gambar/frEVkjmpSquoLMWaMIkJcmaT4pfEYijWeefjIkj8.png\" style=\"width: 250px;\"><br></p><p><br></p><p>3. Cara AplikasiUntuk bedak tabur dan pressed powder, cara aplikasinya nyaris tak berbeda. Baebellines bisa gunakan spons untuk aplikasi yang menyeluruh dengan cara ditepuk-tepuk, sementara untuk saat pemakaian sehari-hari, cukup aplikasikan menggunakan kuas.Hati-hati saat aplikasi bedak menggunakan spons karena makeup bisa terlihat cakey jika bedak terlalu tebal.Two-way cake biasanya diaplikasikan menggunakan spons dengan cara lebih ditekan ke kulit. Jika ingin dijadikan sebagai base makeup, maka basahi dulu spons sebelum digunakan.Maybelline memiliki berbagai pilihan bedak yang sesuai dengan kebutuhan Baebellines, semuanya memiliki tekstur yang ringan sehingga dapat digunakan sehari-hari.Untuk bedak padat ada Maybelline Fit Me! Compact Powder dengan tampilan akhir wajah yang cantik natural dan tahan lama. Bedak padat berjenis two-way cake ini terdiri dari Maybelline Fit Me! Matte + Poreless yang cocok untuk kulit normal cenderung berminyak karena memberi hasil akhir matte, serta Maybelline Fit Me! Dewy + Smooth yang ideal untuk kulit normal cenderung kering karena membuat kulit terlihat lebih halus dan dewy.Jangan lupa sempurnakan hasil makeup agar tampak natural dan bertahan lama menggunakan Maybelline Fit Me! Loose Finishing Powder, bedak tabur dengan formula yang mengandung mineral untuk mengontrol minyak di wajah dan menyamarkan pori-pori.Semua koleksi bedak Maybelline Fit Me! dapat diperoleh di website Maybelline Indonesia dan di gerai Maybelline terdekat.</p><p></p>', '[\"26\",\"27\",\"28\",\"30\"]', 14, 1, 'makeup-travelling.jpg', 1, '2020-08-12 14:20:30', '2020-09-12 13:03:25');
INSERT INTO `blogs` VALUES (16, 'judul', '<p>dxsxzsdsdsad sdsadsadxsdsadsadsa sdsadsadsadsadsa sdsadsadsa dsadsaxsaxsax sdsaxsaxsx<p><img style=\"width: 364px; height: 364px; display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/ponny/public/blog/gambar/15972837120.png\"></p><p>asdhsuaghjashxjsajhx shjxaxjhsauhxj sajhxsahjxbshjbd fgdbcxzhbcxznhjdcb ducjhbxnzhdjcbxnz dhjxbcnjhxbzcn jhxcbznxcbz zxcbxzcb xcbnxzcb xzcbzxcb xzjcdjhxcduyfgjcxbudvsjkxczn&nbsp;<br></p></p>\n', '[\"26\",\"27\",\"28\",\"29\"]', 14, 2, 'enlighten-concealer-1.jpg', 0, '2020-08-13 08:55:12', '2020-09-02 13:37:55');
INSERT INTO `blogs` VALUES (17, 'Liquid lipstick matte', '<p>Liquid lipstick matte adalah salah satu trend kecantikan yang kini melekat dibanyak tas kosmetik banyak wanita. Tapi siapa yang sangka kalau trend lipstick matte sudah pernah terjadi pada 1920? Trend ini kembali dikenalkan kembali secara jor-joran oleh The Kardashians pada 2016, dan terbukti dengan banyaknya produk yang habis terjual waktu itu.Semenjak saat itu, trend liquid lipstick belum mati hingga sekarang. Apalagi karna banyaknya brand-brand kosmetik yang menawarkan koleksi liquid lipstick matte dengan berbagai warna dari nude hingga warna eksentrik dan juga gelap. Dari semua kecantikan yang bisa kamu dapat dari memoleskan liquid lipstick matte, pada akhirnya yang akan menentukan apakah itu akan menjadi lipstick favorit atau tidak bukan lah dari segi fisiknya.Nah mari simak lima hal harus kamu tahu sebelum memoleskan liquid matte lipstick pada bibirmu.</p>', '[\"26\",\"27\",\"28\",\"29\"]', 14, 2, 'makeup-travelling.jpg', 1, '2020-08-28 14:26:04', '2020-09-12 13:05:43');
INSERT INTO `blogs` VALUES (18, 'bedak bubk', '<p>bedak bubuk buat kaki</p>', '[\"29\",\"31\",\"33\",\"45\"]', 14, 2, 'makeup-travelling.jpg', 1, '2020-08-31 11:32:06', '2020-09-12 13:07:08');
INSERT INTO `blogs` VALUES (19, 'lipstick', '<p>ewdddddddddddcsax</p>\n', '[\"27\"]', 14, 1, 'logitek.jpg', 0, '2020-08-31 11:34:37', '2020-09-02 13:37:55');
INSERT INTO `blogs` VALUES (20, 'Gold', '<p>sjcnkjfndmvmjcknd</p>\n', '[\"26\"]', 14, 1, 'enlighten-concealer-1.jpg', 0, '2020-08-31 11:36:49', '2020-09-02 13:37:55');
INSERT INTO `blogs` VALUES (21, 'Inilah 5 Beauty Blogger Indonesia Paling Terkenal yang Bisa Jadi Inspirasimu!', '<span style=\"color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">eningkatnya penggunaan media sosial memungkinkan para beauty enthusiast untuk menyalurkan minat dan bakatnya. Tak heran, banyak dari mereka yang kemudian menjadi beauty blogger ternama di tanah air dengan ratusan ribu pengikut. Tak jarang pula beauty blogger yang kemudian menjadi spokesperson atau ambassador merk kosmetik, serta menjadi narasumber dalam talkshow kecantikan lho. Siapa sajakah mereka? Ini dia 5 beauty blogger Indonesia paling terkenal yang perlu kamu tahu!<br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; display: inline; color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 20px;\"><b style=\"box-sizing: border-box; font-weight: bold;\">Andra Alodita (<a href=\"https://www.alodita.com/\" target=\"_blank\" style=\"box-sizing: border-box; background: transparent; text-decoration: none; color: rgb(0, 0, 0); transition: all 0.3s ease-in-out 0s;\">www.alodita.com</a>)</b></span></p><hr style=\"box-sizing: border-box; border-style: solid none none; border-color: rgb(230, 230, 230); margin: 16px 0px; color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Perempuan yang akrab dipanggil Alodita ini mengawali karirnya sebagai <i style=\"box-sizing: border-box;\">beauty and lifestyle blogger </i>di tahun 2008. Kala itu, ia masih sibuk berkarir sebagai fotografer. Dari tahun 2009 hingga 2011, karyanya banyak dipublikasi di berbagai majalah dan dipajang di banyak pusat perbelanjaan di Jakarta. Bidang fotografi yang diminati Alodita adalah<span> </span><i style=\"box-sizing: border-box;\">fashion</i>, makanan, serta <i style=\"box-sizing: border-box;\">wedding </i>dan <i style=\"box-sizing: border-box;\">pre-wedding</i>.<br style=\"box-sizing: border-box;\"><br style=\"box-sizing: border-box;\">Di <i style=\"box-sizing: border-box;\">blog</i>-nya, Alodita tak hanya menulis tentang produk kecantikan, namun juga fashion dan gaya hidup. Tak jarang ia menulis tentang pemikirannya atas suatu fenomena atau kehidupannya. Membaca tulisannya terasa seperti mendengarkan sahabatmu bercerita; sebagian <i style=\"box-sizing: border-box;\">review </i><i style=\"box-sizing: border-box;\">makeup</i>, catatan perjalanan, atau sekedar curhat antar sahabat. Wah, menarik ya!</p><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"pic_artikel_sisip\" align=\"center\" style=\"box-sizing: border-box; text-align: center; color: rgb(153, 153, 153); font-size: 12px; line-height: 14.4px; width: 518px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"pic\" style=\"box-sizing: border-box; position: relative; display: inline-block; max-width: 100%; text-align: center;\"><img class=\"p_img_zoomin img-zoomin\" src=\"https://akcdn.detik.net.id/community/media/visual/2020/03/20/eb789452-adc3-4137-9d06-7d755265861c.jpeg?q=90&w=480\" style=\"box-sizing: border-box; border: 0px none; vertical-align: middle; cursor: -webkit-zoom-in; position: relative; transition: transform 300ms ease 0s; max-width: 100%; max-height: 400px; height: auto; overflow: hidden; display: block; top: auto; left: auto; transform: none; border-radius: 8px; margin-left: auto; margin-right: auto;\">Foto: https://cottonink.blogspot.co.id/2014/07/a-day-with-andra-alodita_21.html</div></div><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(51, 51, 51); font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box;\"><br style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 20px;\"><b style=\"box-sizing: border-box; font-weight: bold;\">Lizzie Parra (<a href=\"https://www.lizzieparra.com/\" target=\"_blank\" style=\"box-sizing: border-box; background: transparent; text-decoration: none; color: rgb(0, 0, 0); transition: all 0.3s ease-in-out 0s;\">www.lizzieparra.com</a>)</b></span></p><br></span>', '[\"29\",\"31\",\"33\"]', 14, 1, 'makeup-travelling.jpg', 1, '2020-08-31 11:53:12', '2020-09-12 13:08:09');
INSERT INTO `blogs` VALUES (22, 'Inflamasi Sebabkan Banyak Masalah Kulit, Hindari Jenis Makanan Ini', '<p style=\"margin-bottom: 24px; font-family: Raleway, arial, helvetica, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700; color: rgb(191, 5, 97);\">Jakarta</span>&nbsp;Kita mungkin sudah tak asing dengan kata inflamasi atau peradangan pada kulit. Biasanya masalah peradangan ini diatasi dengan obat atau produk kecantikan dengan fungsi anti-inflamasi. Sesuatu yang seringkali dianggap sepele. Padahal, dampak inflamasi sangat besar, yakni berkaitan dengan penyakit dan penuaan. Seperti yang diungkapkan Nicholas Perricone, MD di bukunya “The Wrinkle Cure: Unlock the Power of Cosmeceuticals for Supple, Youthful Skin”.</p><p style=\"margin-bottom: 24px; font-family: Raleway, arial, helvetica, sans-serif; font-size: 16px;\">Selama mengenyam pendidikan kesehatan dan terjun di dunia dermatology, dr. Perricone mempelajari bahwa ada hubungan antara inflamasi dan penyakit kulit. Meski begitu, inflamasi tak hanya ditemukan pada penyakit kulit, tapi juga kulit yang menua. Itulah mengapa dr. Perricone menganggap keriput merupakan salah satu penyakit kulit, karena inflamasi merusak jaringan kulit dan membuatnya keriput.</p>', '[\"26\",\"27\",\"28\",\"29\"]', 14, 2, 'makeup-travelling.jpg', 1, '2020-09-12 13:01:41', '2020-09-12 13:01:41');

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `top` int(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `jenis` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES (1, 'LOREAL PARIS', 'uploads/brands/brand.jpg', 1, 'Demo-brand-12', 'Demo brand', NULL, '2019-03-12 13:05:56', '2020-07-18 13:18:25', NULL);
INSERT INTO `brands` VALUES (2, 'MAKE OVER', 'uploads/brands/brand.jpg', 1, 'Demo-brand1', 'Demo brand1', NULL, '2019-03-12 13:06:13', '2020-07-18 12:59:05', NULL);
INSERT INTO `brands` VALUES (5, 'SAFI', NULL, 0, 'SAFI-euh3y', 'SAFI', NULL, '2020-07-18 09:38:33', '2020-07-18 09:38:33', NULL);
INSERT INTO `brands` VALUES (6, 'COSRX', NULL, 0, 'COSRX-3tqK5', NULL, NULL, '2020-07-18 13:19:37', '2020-07-18 13:19:37', NULL);
INSERT INTO `brands` VALUES (7, 'MAYBELLINE NEWYORK', NULL, 1, 'MAYBELLINE-T39F9', NULL, NULL, '2020-07-18 13:19:48', '2020-07-18 15:01:04', NULL);
INSERT INTO `brands` VALUES (8, 'WARDAH', NULL, 0, 'WARDAH-QE74R', NULL, NULL, '2020-07-18 13:27:27', '2020-07-18 13:27:27', NULL);
INSERT INTO `brands` VALUES (9, 'EMINA', NULL, 0, 'EMINA-M4Rvt', NULL, NULL, '2020-07-18 14:17:50', '2020-08-24 12:03:01', 'local');
INSERT INTO `brands` VALUES (10, 'TRESEMME', NULL, 0, 'Tresemme-6eM5E', NULL, NULL, '2020-07-18 15:06:37', '2020-08-24 12:02:43', 'local');
INSERT INTO `brands` VALUES (11, 'BIORE', NULL, 0, 'BIORE-IbZi8', NULL, NULL, '2020-07-18 15:31:32', '2020-08-24 12:02:33', 'local');
INSERT INTO `brands` VALUES (12, 'VIVA', NULL, 0, 'VIVA-KTfMv', NULL, NULL, '2020-07-18 15:39:24', '2020-08-24 12:02:24', 'local');
INSERT INTO `brands` VALUES (13, 'SEBAMED', NULL, 0, 'SEBAMED-Fg1jW', NULL, NULL, '2020-07-18 15:43:05', '2020-08-24 12:02:14', 'import');
INSERT INTO `brands` VALUES (14, 'THE ORDINARY', NULL, 0, 'The-Ordinary-sadqi', NULL, NULL, '2020-07-22 13:01:29', '2020-08-24 12:02:06', 'import');
INSERT INTO `brands` VALUES (15, 'THAYERS', 'uploads/brands/lEA0V4S4Vn4Aty2JM6Kqc273wn3cVgsMo0hQ6dXw.jpeg', 0, 'THAYERS-5DMza', NULL, 'Witch Hazel (hamamelis virginiana) is found in damp, open woods and along stream banks from Nova Scotia east to Minnesota and south to Georgia. It is a deciduous spreading shrub or small tree with a smooth gray/brown bark. Its astringent properties are extracted from its bark, leaves and twigs. The natural astringent tannins reduce inflammation and stem bleeding.', '2020-07-22 13:27:30', '2020-09-11 14:31:58', 'import');
INSERT INTO `brands` VALUES (16, 'IUNIK', NULL, 0, 'IUNIK-cBr2y', NULL, NULL, '2020-07-22 13:56:16', '2020-08-24 12:01:57', 'import');
INSERT INTO `brands` VALUES (17, 'HAUM', NULL, 0, 'HAUM-EUl0m', NULL, NULL, '2020-07-22 14:34:53', '2020-08-24 12:01:51', 'import');

-- ----------------------------
-- Table structure for business_settings
-- ----------------------------
DROP TABLE IF EXISTS `business_settings`;
CREATE TABLE `business_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of business_settings
-- ----------------------------
INSERT INTO `business_settings` VALUES (1, 'home_default_currency', '29', '2018-10-16 08:35:52', '2020-07-01 15:51:55');
INSERT INTO `business_settings` VALUES (2, 'system_default_currency', '29', '2018-10-16 08:36:58', '2020-07-02 11:57:51');
INSERT INTO `business_settings` VALUES (3, 'currency_format', '1', '2018-10-17 10:01:59', '2018-10-17 10:01:59');
INSERT INTO `business_settings` VALUES (4, 'symbol_format', '1', '2018-10-17 10:01:59', '2019-01-20 09:10:55');
INSERT INTO `business_settings` VALUES (5, 'no_of_decimals', '0', '2018-10-17 10:01:59', '2020-07-02 11:57:09');
INSERT INTO `business_settings` VALUES (6, 'product_activation', '1', '2018-10-28 08:38:37', '2019-02-04 08:11:41');
INSERT INTO `business_settings` VALUES (7, 'vendor_system_activation', '1', '2018-10-28 14:44:16', '2019-02-04 08:11:38');
INSERT INTO `business_settings` VALUES (8, 'show_vendors', '1', '2018-10-28 14:44:47', '2019-02-04 08:11:13');
INSERT INTO `business_settings` VALUES (9, 'paypal_payment', '0', '2018-10-28 14:45:16', '2019-01-31 12:09:10');
INSERT INTO `business_settings` VALUES (10, 'stripe_payment', '0', '2018-10-28 14:45:47', '2018-11-14 08:51:51');
INSERT INTO `business_settings` VALUES (11, 'cash_payment', '1', '2018-10-28 14:46:05', '2019-01-24 10:40:18');
INSERT INTO `business_settings` VALUES (12, 'payumoney_payment', '0', '2018-10-28 14:46:27', '2019-03-05 12:41:36');
INSERT INTO `business_settings` VALUES (13, 'best_selling', '1', '2018-12-24 15:13:44', '2019-02-14 12:29:13');
INSERT INTO `business_settings` VALUES (14, 'paypal_sandbox', '0', '2019-01-16 19:44:18', '2019-01-16 19:44:18');
INSERT INTO `business_settings` VALUES (15, 'sslcommerz_sandbox', '1', '2019-01-16 19:44:18', '2019-03-14 07:07:26');
INSERT INTO `business_settings` VALUES (16, 'sslcommerz_payment', '0', '2019-01-24 16:39:07', '2019-01-29 13:13:46');
INSERT INTO `business_settings` VALUES (17, 'vendor_commission', '20', '2019-01-31 13:18:04', '2019-04-13 13:49:26');
INSERT INTO `business_settings` VALUES (18, 'verification_form', '[{\"type\":\"text\",\"label\":\"Your name\"},{\"type\":\"text\",\"label\":\"Shop name\"},{\"type\":\"text\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"License No\"},{\"type\":\"text\",\"label\":\"Full Address\"},{\"type\":\"text\",\"label\":\"Phone Number\"},{\"type\":\"file\",\"label\":\"Tax Papers\"}]', '2019-02-03 18:36:58', '2019-02-16 13:14:42');
INSERT INTO `business_settings` VALUES (19, 'google_analytics', '0', '2019-02-06 19:22:35', '2019-02-06 19:22:35');
INSERT INTO `business_settings` VALUES (20, 'facebook_login', '1', '2019-02-07 19:51:59', '2020-07-02 21:42:21');
INSERT INTO `business_settings` VALUES (21, 'google_login', '1', '2019-02-07 19:52:10', '2020-07-02 13:23:26');
INSERT INTO `business_settings` VALUES (22, 'twitter_login', '1', '2019-02-07 19:52:20', '2020-07-07 06:57:30');
INSERT INTO `business_settings` VALUES (23, 'payumoney_payment', '1', '2019-03-05 18:38:17', '2019-03-05 18:38:17');
INSERT INTO `business_settings` VALUES (24, 'payumoney_sandbox', '1', '2019-03-05 18:38:17', '2019-03-05 12:39:18');
INSERT INTO `business_settings` VALUES (36, 'facebook_chat', '0', '2019-04-15 18:45:04', '2019-04-15 18:45:04');
INSERT INTO `business_settings` VALUES (37, 'email_verification', '1', '2019-04-30 14:30:07', '2020-07-09 20:40:54');
INSERT INTO `business_settings` VALUES (38, 'wallet_system', '1', '2019-05-19 15:05:44', '2020-07-09 20:41:11');
INSERT INTO `business_settings` VALUES (39, 'coupon_system', '1', '2019-06-11 16:46:18', '2020-07-09 20:41:10');
INSERT INTO `business_settings` VALUES (40, 'current_version', '2.8', '2019-06-11 16:46:18', '2019-06-11 16:46:18');
INSERT INTO `business_settings` VALUES (41, 'instamojo_payment', '0', '2019-07-06 16:58:03', '2019-07-06 16:58:03');
INSERT INTO `business_settings` VALUES (42, 'instamojo_sandbox', '1', '2019-07-06 16:58:43', '2019-07-06 16:58:43');
INSERT INTO `business_settings` VALUES (43, 'razorpay', '0', '2019-07-06 16:58:43', '2019-07-06 16:58:43');
INSERT INTO `business_settings` VALUES (44, 'paystack', '0', '2019-07-21 20:00:38', '2019-07-21 20:00:38');
INSERT INTO `business_settings` VALUES (45, 'pickup_point', '1', '2019-10-17 18:50:39', '2020-07-09 20:41:05');
INSERT INTO `business_settings` VALUES (46, 'maintenance_mode', '0', '2019-10-17 18:51:04', '2020-07-09 20:49:01');
INSERT INTO `business_settings` VALUES (47, 'voguepay', '0', '2019-10-17 18:51:24', '2019-10-17 18:51:24');
INSERT INTO `business_settings` VALUES (48, 'voguepay_sandbox', '0', '2019-10-17 18:51:38', '2019-10-17 18:51:38');
INSERT INTO `business_settings` VALUES (50, 'category_wise_commission', '1', '2020-01-21 14:22:47', '2020-07-09 20:41:08');
INSERT INTO `business_settings` VALUES (51, 'conversation_system', '1', '2020-01-21 14:23:21', '2020-01-21 14:23:21');
INSERT INTO `business_settings` VALUES (52, 'guest_checkout_active', '0', '2020-01-22 14:36:38', '2020-07-09 20:47:06');
INSERT INTO `business_settings` VALUES (53, 'facebook_pixel', '0', '2020-01-22 18:43:58', '2020-01-22 18:43:58');
INSERT INTO `business_settings` VALUES (55, 'classified_product', '1', '2020-05-13 20:01:05', '2020-07-09 20:41:14');
INSERT INTO `business_settings` VALUES (56, 'pos_activation_for_seller', '1', '2020-06-11 16:45:02', '2020-06-11 16:45:02');
INSERT INTO `business_settings` VALUES (57, 'refund_request_time', '30', '2019-03-12 05:58:23', '2020-07-14 18:12:43');
INSERT INTO `business_settings` VALUES (58, 'club_point_convert_rate', '10', '2019-03-12 12:58:23', '2019-03-12 12:58:23');
INSERT INTO `business_settings` VALUES (59, 'club_point_user_affiliate', '12', '2020-08-28 21:47:21', '2020-08-28 21:54:31');
INSERT INTO `business_settings` VALUES (60, 'club_point_user_registration', '5', '2020-08-29 02:47:12', '2020-08-29 02:47:12');
INSERT INTO `business_settings` VALUES (62, 'club_point_user_profile', '56', '2020-08-29 02:55:03', '2020-08-29 02:55:03');
INSERT INTO `business_settings` VALUES (63, 'club_point_user_mobile', '50', '2020-08-29 03:11:50', '2020-08-29 03:11:50');
INSERT INTO `business_settings` VALUES (64, 'subsidi_ongkir', '250000', '2020-09-01 15:07:45', '2020-09-01 15:07:57');
INSERT INTO `business_settings` VALUES (65, 'club_point_user_review', '{\"value\":\"10\",\"jml_max\":\"2\"}', '2020-09-09 08:55:51', '2020-09-09 08:55:51');
INSERT INTO `business_settings` VALUES (66, 'coupon_ultah', '{\"max_discount\":\"100000\",\"discount_type\":\"percent\",\"discount\":\"50\",\"min_buy\":\"200000\"}', '2020-09-12 15:08:02', '2020-09-12 15:08:02');

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `variation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `price` double(8, 2) NULL DEFAULT NULL,
  `tax` double(8, 2) NULL DEFAULT NULL,
  `shipping_cost` double(8, 2) NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carts
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commision_rate` double(8, 2) NOT NULL DEFAULT 0,
  `banner` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `featured` int(1) NOT NULL DEFAULT 0,
  `top` int(1) NOT NULL DEFAULT 0,
  `digital` int(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (5, 'Skin Care', 0.00, 'uploads/categories/banner/hp8eBEwuQmx6okUTiNomxC7XkaAnoKcxsV7bA5fQ.jpeg', NULL, 0, 1, 0, 'Skin-Care-qkQm5', NULL, NULL, '2020-07-18 15:01:04', '2020-07-18 15:01:04');
INSERT INTO `categories` VALUES (6, 'Hair & Make Up', 0.00, 'uploads/categories/banner/GdJzywWQOoyyNcAKtQr9JmxQ2nKBbr689Axvh7aG.jpeg', NULL, 0, 0, 0, 'Hair--Make-Up-C6Jp2', NULL, NULL, '2020-07-18 14:09:04', '2020-07-18 14:09:04');
INSERT INTO `categories` VALUES (7, 'Tools', 0.00, 'uploads/categories/banner/H8NgGi9glU93kobRV8Zy1K8HSO7Upd5aJl76RUEV.jpeg', NULL, 0, 0, 0, 'Tools-N2YAY', NULL, NULL, '2020-07-18 14:09:21', '2020-07-18 14:09:21');

-- ----------------------------
-- Table structure for categoryblog
-- ----------------------------
DROP TABLE IF EXISTS `categoryblog`;
CREATE TABLE `categoryblog`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoryblog
-- ----------------------------
INSERT INTO `categoryblog` VALUES (1, 'Basic Skincare', '2127566765.png', '2020-09-23 11:09:15', '2020-09-23 12:01:51');
INSERT INTO `categoryblog` VALUES (2, 'Skin Concern', 'skin-concern.png', '2020-09-23 11:09:15', '2020-09-23 12:04:03');
INSERT INTO `categoryblog` VALUES (8, 'Facewash', '1488846427.png', '2020-09-23 11:09:15', '2020-09-23 12:05:09');
INSERT INTO `categoryblog` VALUES (9, 'Make Up', '853306547.png', '2020-09-23 12:06:58', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for club_point_details
-- ----------------------------
DROP TABLE IF EXISTS `club_point_details`;
CREATE TABLE `club_point_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_point_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `point` double(8, 2) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of club_point_details
-- ----------------------------
INSERT INTO `club_point_details` VALUES (1, 1, 49, 0, 150.00, '2020-08-29 15:34:28', '2020-08-29 15:34:28');
INSERT INTO `club_point_details` VALUES (2, 2, 52, 0, 150.00, '2020-08-29 15:42:26', '2020-08-29 15:42:26');
INSERT INTO `club_point_details` VALUES (3, 3, 54, 0, 150.00, '2020-08-29 15:53:26', '2020-08-29 15:53:26');
INSERT INTO `club_point_details` VALUES (4, 5, 53, 0, 150.00, '2020-08-29 16:06:16', '2020-08-29 16:06:16');
INSERT INTO `club_point_details` VALUES (5, 10, 52, 0, 150.00, '2020-08-29 16:34:37', '2020-08-29 16:34:37');
INSERT INTO `club_point_details` VALUES (6, 13, 54, 0, 150.00, '2020-08-31 13:07:37', '2020-08-31 13:07:37');
INSERT INTO `club_point_details` VALUES (7, 15, 54, 0, 450.00, '2020-08-31 18:59:19', '2020-08-31 18:59:19');
INSERT INTO `club_point_details` VALUES (8, 21, 53, 0, 150.00, '2020-08-31 23:59:12', '2020-08-31 23:59:12');
INSERT INTO `club_point_details` VALUES (9, 27, 53, 0, 150.00, '2020-09-01 13:15:38', '2020-09-01 13:15:38');
INSERT INTO `club_point_details` VALUES (10, 27, 55, 0, 150.00, '2020-09-01 13:15:38', '2020-09-01 13:15:38');
INSERT INTO `club_point_details` VALUES (11, 28, 53, 0, 150.00, '2020-09-01 13:31:18', '2020-09-01 13:31:18');
INSERT INTO `club_point_details` VALUES (12, 28, 54, 0, 150.00, '2020-09-01 13:31:18', '2020-09-01 13:31:18');
INSERT INTO `club_point_details` VALUES (13, 43, 54, 0, 300.00, '2020-09-02 11:39:39', '2020-09-02 11:39:39');
INSERT INTO `club_point_details` VALUES (14, 43, 53, 0, 300.00, '2020-09-02 11:39:39', '2020-09-02 11:39:39');
INSERT INTO `club_point_details` VALUES (15, 43, 42, 0, 300.00, '2020-09-02 11:39:39', '2020-09-02 11:39:39');
INSERT INTO `club_point_details` VALUES (16, 48, 53, 0, 150.00, '2020-09-02 13:28:05', '2020-09-02 13:28:05');
INSERT INTO `club_point_details` VALUES (17, 48, 52, 0, 150.00, '2020-09-02 13:28:05', '2020-09-02 13:28:05');
INSERT INTO `club_point_details` VALUES (18, 51, 58, 0, 900.00, '2020-09-02 14:05:33', '2020-09-02 14:05:33');
INSERT INTO `club_point_details` VALUES (19, 51, 55, 0, 900.00, '2020-09-02 14:05:33', '2020-09-02 14:05:33');
INSERT INTO `club_point_details` VALUES (20, 52, 28, 0, 150.00, '2020-09-02 14:35:22', '2020-09-02 14:35:22');
INSERT INTO `club_point_details` VALUES (21, 52, 54, 0, 150.00, '2020-09-02 14:35:22', '2020-09-02 14:35:22');
INSERT INTO `club_point_details` VALUES (22, 53, 38, 0, 300.00, '2020-09-02 14:40:54', '2020-09-02 14:40:54');
INSERT INTO `club_point_details` VALUES (23, 56, 38, 0, 300.00, '2020-09-02 14:44:02', '2020-09-02 14:44:02');
INSERT INTO `club_point_details` VALUES (24, 57, 38, 0, 300.00, '2020-09-02 14:45:59', '2020-09-02 14:45:59');
INSERT INTO `club_point_details` VALUES (25, 58, 38, 0, 300.00, '2020-09-02 14:46:06', '2020-09-02 14:46:06');
INSERT INTO `club_point_details` VALUES (26, 59, 48, 0, 150.00, '2020-09-02 14:51:07', '2020-09-02 14:51:07');
INSERT INTO `club_point_details` VALUES (27, 60, 47, 0, 150.00, '2020-09-02 15:18:45', '2020-09-02 15:18:45');
INSERT INTO `club_point_details` VALUES (28, 60, 48, 0, 150.00, '2020-09-02 15:18:45', '2020-09-02 15:18:45');
INSERT INTO `club_point_details` VALUES (29, 66, 27, 0, 150.00, '2020-09-02 16:18:18', '2020-09-02 16:18:18');
INSERT INTO `club_point_details` VALUES (30, 66, 31, 0, 150.00, '2020-09-02 16:18:18', '2020-09-02 16:18:18');
INSERT INTO `club_point_details` VALUES (31, 69, 38, 0, 750.00, '2020-09-02 16:26:20', '2020-09-02 16:26:20');
INSERT INTO `club_point_details` VALUES (32, 69, 55, 0, 750.00, '2020-09-02 16:26:20', '2020-09-02 16:26:20');
INSERT INTO `club_point_details` VALUES (33, 71, 44, 0, 0.00, '2020-09-03 14:23:15', '2020-09-03 14:23:15');
INSERT INTO `club_point_details` VALUES (34, 72, 55, 0, 150.00, '2020-09-04 08:01:23', '2020-09-04 08:01:23');
INSERT INTO `club_point_details` VALUES (35, 73, 54, 0, 300.00, '2020-09-04 08:23:40', '2020-09-04 08:23:40');
INSERT INTO `club_point_details` VALUES (36, 74, 54, 0, 150.00, '2020-09-04 08:39:57', '2020-09-04 08:39:57');
INSERT INTO `club_point_details` VALUES (37, 84, 54, 0, 150.00, '2020-09-05 11:18:25', '2020-09-05 11:18:25');
INSERT INTO `club_point_details` VALUES (38, 85, 40, 0, 150.00, '2020-09-05 11:26:04', '2020-09-05 11:26:04');
INSERT INTO `club_point_details` VALUES (39, 86, 47, 0, 300.00, '2020-09-05 11:34:51', '2020-09-05 11:34:51');
INSERT INTO `club_point_details` VALUES (40, 87, 54, 0, 300.00, '2020-09-05 11:46:13', '2020-09-05 11:46:13');
INSERT INTO `club_point_details` VALUES (41, 90, 53, 0, 150.00, '2020-09-05 20:46:25', '2020-09-05 20:46:25');
INSERT INTO `club_point_details` VALUES (42, 93, 54, 0, 150.00, '2020-09-07 20:31:32', '2020-09-07 20:31:32');
INSERT INTO `club_point_details` VALUES (43, 94, 31, 0, 150.00, '2020-09-08 15:21:19', '2020-09-08 15:21:19');
INSERT INTO `club_point_details` VALUES (44, 94, 54, 0, 150.00, '2020-09-08 15:21:19', '2020-09-08 15:21:19');
INSERT INTO `club_point_details` VALUES (45, 95, 48, 0, 1500.00, '2020-09-08 15:24:48', '2020-09-08 15:24:48');
INSERT INTO `club_point_details` VALUES (46, 99, 54, 0, 150.00, '2020-09-09 11:40:46', '2020-09-09 11:40:46');
INSERT INTO `club_point_details` VALUES (47, 100, 52, 0, 150.00, '2020-09-09 12:55:49', '2020-09-09 12:55:49');
INSERT INTO `club_point_details` VALUES (48, 104, 27, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (49, 104, 28, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (50, 104, 34, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (51, 104, 55, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (52, 104, 30, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (53, 104, 33, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (54, 104, 45, 0, 0.00, '2020-09-11 16:56:46', '2020-09-11 16:56:46');
INSERT INTO `club_point_details` VALUES (55, 105, 33, 0, 1350.00, '2020-09-11 16:59:17', '2020-09-11 16:59:17');
INSERT INTO `club_point_details` VALUES (56, 107, 29, 0, 150.00, '2020-09-12 10:03:24', '2020-09-12 10:03:24');
INSERT INTO `club_point_details` VALUES (57, 109, 51, 0, 1350.00, '2020-09-12 10:25:31', '2020-09-12 10:25:31');
INSERT INTO `club_point_details` VALUES (58, 110, 35, 0, 150.00, '2020-09-12 10:26:53', '2020-09-12 10:26:53');
INSERT INTO `club_point_details` VALUES (59, 111, 33, 0, 150.00, '2020-09-12 13:25:19', '2020-09-12 13:25:19');
INSERT INTO `club_point_details` VALUES (60, 112, 49, 0, 1200.00, '2020-09-12 15:01:15', '2020-09-12 15:01:15');
INSERT INTO `club_point_details` VALUES (61, 114, 51, 0, 150.00, '2020-09-12 16:14:26', '2020-09-12 16:14:26');
INSERT INTO `club_point_details` VALUES (62, 114, 47, 0, 150.00, '2020-09-12 16:14:26', '2020-09-12 16:14:26');
INSERT INTO `club_point_details` VALUES (63, 119, 27, 0, 150.00, '2020-09-16 11:59:34', '2020-09-16 11:59:34');
INSERT INTO `club_point_details` VALUES (64, 119, 29, 0, 150.00, '2020-09-16 11:59:34', '2020-09-16 11:59:34');
INSERT INTO `club_point_details` VALUES (65, 120, 51, 0, 0.00, '2020-09-17 11:21:36', '2020-09-17 11:21:36');
INSERT INTO `club_point_details` VALUES (66, 120, 41, 0, 0.00, '2020-09-17 11:21:36', '2020-09-17 11:21:36');
INSERT INTO `club_point_details` VALUES (67, 121, 41, 0, 0.00, '2020-09-17 11:24:16', '2020-09-17 11:24:16');
INSERT INTO `club_point_details` VALUES (68, 121, 27, 0, 0.00, '2020-09-17 11:24:16', '2020-09-17 11:24:16');
INSERT INTO `club_point_details` VALUES (69, 122, 51, 0, 150.00, '2020-09-17 11:28:24', '2020-09-17 11:28:24');
INSERT INTO `club_point_details` VALUES (70, 122, 53, 0, 150.00, '2020-09-17 11:28:24', '2020-09-17 11:28:24');
INSERT INTO `club_point_details` VALUES (71, 123, 54, 0, 150.00, '2020-09-17 11:31:10', '2020-09-17 11:31:10');
INSERT INTO `club_point_details` VALUES (72, 124, 41, 0, 0.00, '2020-09-17 11:33:44', '2020-09-17 11:33:44');
INSERT INTO `club_point_details` VALUES (73, 125, 41, 0, 0.00, '2020-09-17 11:36:43', '2020-09-17 11:36:43');
INSERT INTO `club_point_details` VALUES (74, 126, 30, 0, 50.00, '2020-09-17 11:39:21', '2020-09-17 11:39:21');
INSERT INTO `club_point_details` VALUES (75, 127, 41, 0, 0.00, '2020-09-17 11:41:03', '2020-09-17 11:41:03');
INSERT INTO `club_point_details` VALUES (76, 128, 41, 0, 0.00, '2020-09-17 13:24:03', '2020-09-17 13:24:03');
INSERT INTO `club_point_details` VALUES (77, 129, 41, 0, 0.00, '2020-09-17 13:30:37', '2020-09-17 13:30:37');
INSERT INTO `club_point_details` VALUES (78, 130, 41, 0, 0.00, '2020-09-17 13:35:50', '2020-09-17 13:35:50');
INSERT INTO `club_point_details` VALUES (79, 131, 54, 0, 150.00, '2020-09-17 13:39:42', '2020-09-17 13:39:42');
INSERT INTO `club_point_details` VALUES (80, 132, 54, 0, 150.00, '2020-09-17 13:41:41', '2020-09-17 13:41:41');
INSERT INTO `club_point_details` VALUES (81, 133, 51, 0, 150.00, '2020-09-17 13:44:02', '2020-09-17 13:44:02');
INSERT INTO `club_point_details` VALUES (82, 134, 33, 0, 150.00, '2020-09-17 14:10:22', '2020-09-17 14:10:22');
INSERT INTO `club_point_details` VALUES (83, 135, 41, 0, 0.00, '2020-09-17 14:35:32', '2020-09-17 14:35:32');
INSERT INTO `club_point_details` VALUES (84, 136, 41, 0, 0.00, '2020-09-17 14:36:42', '2020-09-17 14:36:42');
INSERT INTO `club_point_details` VALUES (85, 137, 33, 0, 150.00, '2020-09-17 14:40:22', '2020-09-17 14:40:22');
INSERT INTO `club_point_details` VALUES (86, 138, 27, 0, 150.00, '2020-09-19 12:52:52', '2020-09-19 12:52:52');
INSERT INTO `club_point_details` VALUES (87, 138, 33, 0, 150.00, '2020-09-19 12:52:52', '2020-09-19 12:52:52');
INSERT INTO `club_point_details` VALUES (88, 140, 30, 0, 50.00, '2020-09-22 11:30:39', '2020-09-22 11:30:39');
INSERT INTO `club_point_details` VALUES (89, 141, 33, 0, 150.00, '2020-09-22 11:31:26', '2020-09-22 11:31:26');

-- ----------------------------
-- Table structure for club_point_exchange
-- ----------------------------
DROP TABLE IF EXISTS `club_point_exchange`;
CREATE TABLE `club_point_exchange`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NULL DEFAULT NULL,
  `points` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of club_point_exchange
-- ----------------------------
INSERT INTO `club_point_exchange` VALUES (1, 7, 10, 34, '2020-08-29 15:53:08', '2020-08-29 15:53:08', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (2, 13, 10, 13, '2020-08-31 18:58:18', '2020-08-31 18:58:18', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (3, 3, 10, 13, '2020-09-01 12:53:09', '2020-09-01 12:53:09', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (4, 7, 1500, 13, '2020-09-01 14:32:36', '2020-09-01 14:32:36', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (5, 5, 10, 13, '2020-09-02 13:24:43', '2020-09-02 13:24:43', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (6, 9, 10, 13, '2020-09-02 14:06:29', '2020-09-02 14:06:29', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (11, 14, 10, 65, '2020-09-02 14:34:30', '2020-09-02 14:34:30', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (12, 17, 1500, 13, '2020-09-02 15:10:00', '2020-09-02 15:10:00', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (13, 12, 10, 56, '2020-09-05 20:46:01', '2020-09-05 20:46:01', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (14, 13, 10, 63, '2020-09-07 17:03:54', '2020-09-07 17:03:54', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (15, 20, 1500, 13, '2020-09-09 11:27:54', '2020-09-09 11:27:54', 'TUKAR POINT');
INSERT INTO `club_point_exchange` VALUES (16, 35, 7000, 13, '2020-09-12 16:13:09', '2020-09-12 16:13:09', 'TUKAR POINT');

-- ----------------------------
-- Table structure for club_points
-- ----------------------------
DROP TABLE IF EXISTS `club_points`;
CREATE TABLE `club_points`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `points` double(18, 2) NOT NULL,
  `convert_status` int(1) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `order_id` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 142 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of club_points
-- ----------------------------
INSERT INTO `club_points` VALUES (1, 34, 150.00, 0, '2020-08-29 15:34:28', '2020-08-29 15:34:28', 2, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (2, 34, 150.00, 0, '2020-08-29 15:42:26', '2020-08-29 15:42:26', 5, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (3, 34, 150.00, 0, '2020-08-29 15:53:26', '2020-08-29 15:53:26', 7, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (4, 37, 5.00, 0, '2020-08-29 16:00:08', '2020-08-29 16:00:08', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (5, 37, 150.00, 0, '2020-08-29 16:06:16', '2020-08-29 16:06:16', 8, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (6, 13, 12.00, 0, '2020-08-29 16:06:16', '2020-08-29 16:06:16', 8, 'REFERRAL POINT');
INSERT INTO `club_points` VALUES (7, 13, 10.00, 0, '2020-08-29 16:11:50', '2020-08-29 16:11:50', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (8, 13, 56.00, 0, '2020-08-29 16:13:26', '2020-08-29 16:13:26', NULL, 'COMPLETED PROFILE POINT');
INSERT INTO `club_points` VALUES (9, 38, 5.00, 0, '2020-08-29 16:26:21', '2020-08-29 16:26:21', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (10, 38, 150.00, 0, '2020-08-29 16:34:37', '2020-08-29 16:34:37', 9, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (11, 13, 12.00, 0, '2020-08-29 16:34:37', '2020-08-29 16:34:37', 9, 'REFERRAL POINT');
INSERT INTO `club_points` VALUES (12, 38, 10.00, 0, '2020-08-29 16:38:24', '2020-08-29 16:38:24', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (13, 13, 150.00, 0, '2020-08-31 13:07:37', '2020-08-31 13:07:37', 10, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (14, 41, 5.00, 0, '2020-08-31 15:58:43', '2020-08-31 15:58:43', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (15, 13, 450.00, 0, '2020-08-31 18:59:19', '2020-08-31 18:59:19', 13, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (16, 13, 10.00, 0, '2020-08-31 20:04:23', '2020-08-31 20:04:23', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (17, 44, 5.00, 0, '2020-08-31 22:32:31', '2020-08-31 22:32:31', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (18, 45, 5.00, 0, '2020-08-31 22:34:02', '2020-08-31 22:34:02', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (19, 46, 5.00, 0, '2020-08-31 23:21:41', '2020-08-31 23:21:41', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (20, 47, 5.00, 0, '2020-08-31 23:33:04', '2020-08-31 23:33:04', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (21, 16, 150.00, 0, '2020-08-31 23:59:12', '2020-08-31 23:59:12', 1, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (22, 48, 5.00, 0, '2020-09-01 09:07:11', '2020-09-01 09:07:11', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (23, 49, 5.00, 0, '2020-09-01 09:15:46', '2020-09-01 09:15:46', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (24, 50, 5.00, 0, '2020-09-01 09:32:20', '2020-09-01 09:32:20', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (25, 13, 10.00, 0, '2020-09-01 11:03:08', '2020-09-01 11:03:08', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (26, 51, 5.00, 0, '2020-09-01 12:19:12', '2020-09-01 12:19:12', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (27, 13, 450.00, 0, '2020-09-01 13:15:38', '2020-09-01 13:15:38', 4, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (28, 13, 450.00, 0, '2020-09-01 13:31:18', '2020-09-01 13:31:18', 3, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (29, 52, 5.00, 0, '2020-09-01 15:01:57', '2020-09-01 15:01:57', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (30, 53, 5.00, 0, '2020-09-01 15:23:44', '2020-09-01 15:23:44', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (31, 54, 5.00, 0, '2020-09-01 15:26:29', '2020-09-01 15:26:29', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (32, 55, 5.00, 0, '2020-09-01 15:38:00', '2020-09-01 15:38:00', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (33, 56, 5.00, 0, '2020-09-01 15:39:12', '2020-09-01 15:39:12', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (34, 57, 5.00, 0, '2020-09-01 15:44:15', '2020-09-01 15:44:15', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (35, 58, 5.00, 0, '2020-09-01 15:45:28', '2020-09-01 15:45:28', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (36, 59, 5.00, 0, '2020-09-01 15:48:00', '2020-09-01 15:48:00', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (37, 13, 10.00, 0, '2020-09-01 16:27:21', '2020-09-01 16:27:21', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (38, 56, 10.00, 0, '2020-09-01 16:30:25', '2020-09-01 16:30:25', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (39, 60, 5.00, 0, '2020-09-01 16:44:10', '2020-09-01 16:44:10', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (40, 61, 5.00, 0, '2020-09-01 16:46:49', '2020-09-01 16:46:49', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (41, 62, 5.00, 0, '2020-09-01 16:55:35', '2020-09-01 16:55:35', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (42, 63, 5.00, 0, '2020-09-01 17:14:43', '2020-09-01 17:14:43', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (43, 13, 600.00, 0, '2020-09-02 11:39:39', '2020-09-02 11:39:39', 4, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (44, 13, 10.00, 0, '2020-09-02 13:19:04', '2020-09-02 13:19:04', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (45, 13, 10.00, 0, '2020-09-02 13:20:41', '2020-09-02 13:20:41', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (46, 13, 10.00, 0, '2020-09-02 13:21:09', '2020-09-02 13:21:09', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (47, 64, 5.00, 0, '2020-09-02 13:23:53', '2020-09-02 13:23:53', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (48, 64, 300.00, 0, '2020-09-02 13:28:05', '2020-09-02 13:28:05', 6, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (49, 65, 5.00, 0, '2020-09-02 13:35:50', '2020-09-02 13:35:50', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (50, 66, 5.00, 0, '2020-09-02 13:46:53', '2020-09-02 13:46:53', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (51, 65, 1170.00, 0, '2020-09-02 14:05:33', '2020-09-02 14:05:33', 8, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (52, 65, 250.00, 0, '2020-09-02 14:35:22', '2020-09-02 14:35:22', 14, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (53, 13, 300.00, 0, '2020-09-02 14:40:54', '2020-09-02 14:40:54', 15, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (54, 65, 56.00, 0, '2020-09-02 14:41:05', '2020-09-02 14:41:05', NULL, 'COMPLETED PROFILE POINT');
INSERT INTO `club_points` VALUES (55, 66, 10.00, 0, '2020-09-02 14:43:26', '2020-09-02 14:43:26', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (56, 13, 300.00, 0, '2020-09-02 14:44:02', '2020-09-02 14:44:02', 15, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (57, 13, 300.00, 0, '2020-09-02 14:45:59', '2020-09-02 14:45:59', 15, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (58, 13, 300.00, 0, '2020-09-02 14:46:06', '2020-09-02 14:46:06', 15, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (59, 13, 150.00, 0, '2020-09-02 14:51:07', '2020-09-02 14:51:07', 16, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (60, 13, 300.00, 0, '2020-09-02 15:18:45', '2020-09-02 15:18:45', 18, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (61, 66, 10.00, 0, '2020-09-02 15:19:36', '2020-09-02 15:19:36', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (62, 66, 10.00, 0, '2020-09-02 15:24:05', '2020-09-02 15:24:05', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (63, 66, 10.00, 0, '2020-09-02 15:24:55', '2020-09-02 15:24:55', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (64, 13, 10.00, 0, '2020-09-02 15:27:14', '2020-09-02 15:27:14', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (65, 66, 10.00, 0, '2020-09-02 15:30:36', '2020-09-02 15:30:36', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (66, 13, 150.00, 0, '2020-09-02 16:18:18', '2020-09-02 16:18:18', 21, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (67, 13, 10.00, 0, '2020-09-02 16:22:16', '2020-09-02 16:22:16', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (68, 13, 10.00, 0, '2020-09-02 16:23:51', '2020-09-02 16:23:51', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (69, 13, 1050.00, 0, '2020-09-02 16:26:20', '2020-09-02 16:26:20', 22, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (70, 67, 5.00, 0, '2020-09-03 10:20:24', '2020-09-03 10:20:24', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (71, 13, 0.00, 0, '2020-09-03 14:23:15', '2020-09-03 14:23:15', 24, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (72, 53, 150.00, 0, '2020-09-04 08:01:23', '2020-09-04 08:01:23', 1, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (73, 53, 300.00, 0, '2020-09-04 08:23:40', '2020-09-04 08:23:40', 2, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (74, 53, 150.00, 0, '2020-09-04 08:39:57', '2020-09-04 08:39:57', 3, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (75, 69, 5.00, 0, '2020-09-04 10:27:05', '2020-09-04 10:27:05', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (76, 63, 10.00, 0, '2020-09-04 16:25:01', '2020-09-04 16:25:01', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (77, 56, 10.00, 0, '2020-09-04 20:31:57', '2020-09-04 20:31:57', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (78, 56, 10.00, 0, '2020-09-04 20:32:50', '2020-09-04 20:32:50', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (79, 56, 10.00, 0, '2020-09-04 20:33:09', '2020-09-04 20:33:09', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (80, 56, 10.00, 0, '2020-09-04 20:33:30', '2020-09-04 20:33:30', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (81, 56, 10.00, 0, '2020-09-04 20:35:06', '2020-09-04 20:35:06', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (82, 56, 56.00, 0, '2020-09-04 20:58:28', '2020-09-04 20:58:28', NULL, 'COMPLETED PROFILE POINT');
INSERT INTO `club_points` VALUES (83, 13, 10.00, 0, '2020-09-05 10:51:00', '2020-09-05 10:51:00', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (84, 13, 150.00, 0, '2020-09-05 11:18:25', '2020-09-05 11:18:25', 6, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (85, 13, 150.00, 0, '2020-09-05 11:26:04', '2020-09-05 11:26:04', 8, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (86, 13, 300.00, 0, '2020-09-05 11:34:51', '2020-09-05 11:34:51', 9, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (87, 53, 300.00, 0, '2020-09-05 11:46:13', '2020-09-05 11:46:13', 10, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (88, 70, 5.00, 0, '2020-09-05 11:48:33', '2020-09-05 11:48:33', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (89, 71, 5.00, 0, '2020-09-05 15:38:07', '2020-09-05 15:38:07', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (90, 56, 150.00, 0, '2020-09-05 20:46:25', '2020-09-05 20:46:25', 12, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (91, 72, 5.00, 0, '2020-09-07 12:28:19', '2020-09-07 12:28:19', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (92, 63, 56.00, 0, '2020-09-07 14:30:01', '2020-09-07 14:30:01', NULL, 'COMPLETED PROFILE POINT');
INSERT INTO `club_points` VALUES (93, 53, 150.00, 0, '2020-09-07 20:31:32', '2020-09-07 20:31:32', 14, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (94, 13, 200.00, 0, '2020-09-08 15:21:19', '2020-09-08 15:21:19', 17, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (95, 13, 1500.00, 0, '2020-09-08 15:24:48', '2020-09-08 15:24:48', 18, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (96, 13, 10.00, 0, '2020-09-08 15:31:43', '2020-09-08 15:31:43', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (97, 13, 10.00, 0, '2020-09-09 09:13:07', '2020-09-09 09:13:07', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (98, 13, 10.00, 0, '2020-09-09 09:14:24', '2020-09-09 09:14:24', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (99, 53, 182.00, 0, '2020-09-09 11:40:46', '2020-09-09 11:40:46', 21, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (100, 13, 214.00, 0, '2020-09-09 12:55:49', '2020-09-09 12:55:49', 22, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (101, 74, 5.00, 0, '2020-09-11 12:36:13', '2020-09-11 12:36:13', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (102, 75, 5.00, 0, '2020-09-11 13:06:39', '2020-09-11 13:06:39', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (103, 76, 5.00, 0, '2020-09-11 13:13:56', '2020-09-11 13:13:56', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (104, 57, 4196.55, 0, '2020-09-11 16:56:46', '2020-09-11 16:56:46', 26, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (105, 57, 6282.90, 0, '2020-09-11 16:59:17', '2020-09-11 16:59:17', 27, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (106, 77, 5.00, 0, '2020-09-11 20:14:42', '2020-09-11 20:14:42', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (107, 57, 172.00, 0, '2020-09-12 10:03:24', '2020-09-12 10:03:24', 29, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (108, 57, 10.00, 0, '2020-09-12 10:19:48', '2020-09-12 10:19:48', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (109, 57, 5886.00, 0, '2020-09-12 10:25:31', '2020-09-12 10:25:31', 30, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (110, 57, 178.00, 0, '2020-09-12 10:26:53', '2020-09-12 10:26:53', 31, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (111, 77, 180.45, 0, '2020-09-12 13:25:19', '2020-09-12 13:25:19', 32, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (112, 13, 4732.80, 0, '2020-09-12 15:01:15', '2020-09-12 15:01:15', 34, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (113, 77, 10.00, 0, '2020-09-12 15:59:57', '2020-09-12 15:59:57', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (114, 13, 10698.00, 0, '2020-09-12 16:14:26', '2020-09-12 16:14:26', 35, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (115, 13, 10.00, 0, '2020-09-12 16:19:51', '2020-09-12 16:19:51', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (116, 13, 10.00, 0, '2020-09-12 16:21:09', '2020-09-12 16:21:09', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (117, 78, 5.00, 0, '2020-09-14 13:26:00', '2020-09-14 13:26:00', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (118, 79, 5.00, 0, '2020-09-15 09:21:05', '2020-09-15 09:21:05', NULL, 'REGISTER POINT');
INSERT INTO `club_points` VALUES (119, 13, 175.20, 0, '2020-09-16 11:59:34', '2020-09-16 11:59:34', 36, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (120, 70, 184.32, 0, '2020-09-17 11:21:36', '2020-09-17 11:21:36', 38, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (121, 70, 31.70, 0, '2020-09-17 11:24:16', '2020-09-17 11:24:16', 39, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (122, 70, 355.60, 0, '2020-09-17 11:28:24', '2020-09-17 11:28:24', 40, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (123, 70, 182.00, 0, '2020-09-17 11:31:10', '2020-09-17 11:31:10', 41, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (124, 70, 6.33, 0, '2020-09-17 11:33:44', '2020-09-17 11:33:44', 42, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (125, 70, 6.33, 0, '2020-09-17 11:36:43', '2020-09-17 11:36:43', 43, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (126, 70, 58.50, 0, '2020-09-17 11:39:21', '2020-09-17 11:39:21', 44, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (127, 70, 6.33, 0, '2020-09-17 11:41:03', '2020-09-17 11:41:03', 45, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (128, 70, 6.33, 0, '2020-09-17 13:24:03', '2020-09-17 13:24:03', 46, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (129, 70, 6.33, 0, '2020-09-17 13:30:37', '2020-09-17 13:30:37', 47, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (130, 70, 6.33, 0, '2020-09-17 13:35:50', '2020-09-17 13:35:50', 48, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (131, 70, 182.00, 0, '2020-09-17 13:39:42', '2020-09-17 13:39:42', 49, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (132, 70, 182.00, 0, '2020-09-17 13:41:41', '2020-09-17 13:41:41', 50, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (133, 70, 178.00, 0, '2020-09-17 13:44:02', '2020-09-17 13:44:02', 51, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (134, 77, 180.45, 0, '2020-09-17 14:10:22', '2020-09-17 14:10:22', 52, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (135, 77, 6.33, 0, '2020-09-17 14:35:32', '2020-09-17 14:35:32', 53, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (136, 70, 6.33, 0, '2020-09-17 14:36:42', '2020-09-17 14:36:42', 54, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (137, 70, 180.45, 0, '2020-09-17 14:40:22', '2020-09-17 14:40:22', 55, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (138, 13, 214.10, 0, '2020-09-19 12:52:52', '2020-09-19 12:52:52', 56, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (139, 13, 10.00, 0, '2020-09-19 13:21:59', '2020-09-19 13:21:59', NULL, 'REVIEW POINT');
INSERT INTO `club_points` VALUES (140, 13, 67.00, 0, '2020-09-22 11:30:39', '2020-09-22 11:30:39', 60, 'PEMBELIAN POINT');
INSERT INTO `club_points` VALUES (141, 13, 210.90, 0, '2020-09-22 11:31:26', '2020-09-22 11:31:26', 59, 'PEMBELIAN POINT');

-- ----------------------------
-- Table structure for colors
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 144 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES (1, 'IndianRed', '#CD5C5C', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (2, 'LightCoral', '#F08080', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (3, 'Salmon', '#FA8072', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (4, 'DarkSalmon', '#E9967A', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (5, 'LightSalmon', '#FFA07A', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (6, 'Crimson', '#DC143C', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (7, 'Red', '#FF0000', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (8, 'FireBrick', '#B22222', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (9, 'DarkRed', '#8B0000', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (10, 'Pink', '#FFC0CB', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (11, 'LightPink', '#FFB6C1', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (12, 'HotPink', '#FF69B4', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (13, 'DeepPink', '#FF1493', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (14, 'MediumVioletRed', '#C71585', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (15, 'PaleVioletRed', '#DB7093', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (16, 'LightSalmon', '#FFA07A', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (17, 'Coral', '#FF7F50', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (18, 'Tomato', '#FF6347', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (19, 'OrangeRed', '#FF4500', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (20, 'DarkOrange', '#FF8C00', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (21, 'Orange', '#FFA500', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (22, 'Gold', '#FFD700', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (23, 'Yellow', '#FFFF00', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (24, 'LightYellow', '#FFFFE0', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (25, 'LemonChiffon', '#FFFACD', '2018-11-05 09:12:26', '2018-11-05 09:12:26');
INSERT INTO `colors` VALUES (26, 'LightGoldenrodYellow', '#FAFAD2', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (27, 'PapayaWhip', '#FFEFD5', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (28, 'Moccasin', '#FFE4B5', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (29, 'PeachPuff', '#FFDAB9', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (30, 'PaleGoldenrod', '#EEE8AA', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (31, 'Khaki', '#F0E68C', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (32, 'DarkKhaki', '#BDB76B', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (33, 'Lavender', '#E6E6FA', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (34, 'Thistle', '#D8BFD8', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (35, 'Plum', '#DDA0DD', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (36, 'Violet', '#EE82EE', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (37, 'Orchid', '#DA70D6', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (38, 'Fuchsia', '#FF00FF', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (39, 'Magenta', '#FF00FF', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (40, 'MediumOrchid', '#BA55D3', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (41, 'MediumPurple', '#9370DB', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (42, 'Amethyst', '#9966CC', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (43, 'BlueViolet', '#8A2BE2', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (44, 'DarkViolet', '#9400D3', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (45, 'DarkOrchid', '#9932CC', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (46, 'DarkMagenta', '#8B008B', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (47, 'Purple', '#800080', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (48, 'Indigo', '#4B0082', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (49, 'SlateBlue', '#6A5ACD', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (50, 'DarkSlateBlue', '#483D8B', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (51, 'MediumSlateBlue', '#7B68EE', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (52, 'GreenYellow', '#ADFF2F', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (53, 'Chartreuse', '#7FFF00', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (54, 'LawnGreen', '#7CFC00', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (55, 'Lime', '#00FF00', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (56, 'LimeGreen', '#32CD32', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (57, 'PaleGreen', '#98FB98', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (58, 'LightGreen', '#90EE90', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (59, 'MediumSpringGreen', '#00FA9A', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (60, 'SpringGreen', '#00FF7F', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (61, 'MediumSeaGreen', '#3CB371', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (62, 'SeaGreen', '#2E8B57', '2018-11-05 09:12:27', '2018-11-05 09:12:27');
INSERT INTO `colors` VALUES (63, 'ForestGreen', '#228B22', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (64, 'Green', '#008000', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (65, 'DarkGreen', '#006400', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (66, 'YellowGreen', '#9ACD32', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (67, 'OliveDrab', '#6B8E23', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (68, 'Olive', '#808000', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (69, 'DarkOliveGreen', '#556B2F', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (70, 'MediumAquamarine', '#66CDAA', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (71, 'DarkSeaGreen', '#8FBC8F', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (72, 'LightSeaGreen', '#20B2AA', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (73, 'DarkCyan', '#008B8B', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (74, 'Teal', '#008080', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (75, 'Aqua', '#00FFFF', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (76, 'Cyan', '#00FFFF', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (77, 'LightCyan', '#E0FFFF', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (78, 'PaleTurquoise', '#AFEEEE', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (79, 'Aquamarine', '#7FFFD4', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (80, 'Turquoise', '#40E0D0', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (81, 'MediumTurquoise', '#48D1CC', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (82, 'DarkTurquoise', '#00CED1', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (83, 'CadetBlue', '#5F9EA0', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (84, 'SteelBlue', '#4682B4', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (85, 'LightSteelBlue', '#B0C4DE', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (86, 'PowderBlue', '#B0E0E6', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (87, 'LightBlue', '#ADD8E6', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (88, 'SkyBlue', '#87CEEB', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (89, 'LightSkyBlue', '#87CEFA', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (90, 'DeepSkyBlue', '#00BFFF', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (91, 'DodgerBlue', '#1E90FF', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (92, 'CornflowerBlue', '#6495ED', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (93, 'MediumSlateBlue', '#7B68EE', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (94, 'RoyalBlue', '#4169E1', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (95, 'Blue', '#0000FF', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (96, 'MediumBlue', '#0000CD', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (97, 'DarkBlue', '#00008B', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (98, 'Navy', '#000080', '2018-11-05 09:12:28', '2018-11-05 09:12:28');
INSERT INTO `colors` VALUES (99, 'MidnightBlue', '#191970', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (100, 'Cornsilk', '#FFF8DC', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (101, 'BlanchedAlmond', '#FFEBCD', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (102, 'Bisque', '#FFE4C4', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (103, 'NavajoWhite', '#FFDEAD', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (104, 'Wheat', '#F5DEB3', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (105, 'BurlyWood', '#DEB887', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (106, 'Tan', '#D2B48C', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (107, 'RosyBrown', '#BC8F8F', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (108, 'SandyBrown', '#F4A460', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (109, 'Goldenrod', '#DAA520', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (110, 'DarkGoldenrod', '#B8860B', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (111, 'Peru', '#CD853F', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (112, 'Chocolate', '#D2691E', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (113, 'SaddleBrown', '#8B4513', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (114, 'Sienna', '#A0522D', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (115, 'Brown', '#A52A2A', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (116, 'Maroon', '#800000', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (117, 'White', '#FFFFFF', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (118, 'Snow', '#FFFAFA', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (119, 'Honeydew', '#F0FFF0', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (120, 'MintCream', '#F5FFFA', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (121, 'Azure', '#F0FFFF', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (122, 'AliceBlue', '#F0F8FF', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (123, 'GhostWhite', '#F8F8FF', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (124, 'WhiteSmoke', '#F5F5F5', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (125, 'Seashell', '#FFF5EE', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (126, 'Beige', '#F5F5DC', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (127, 'OldLace', '#FDF5E6', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (128, 'FloralWhite', '#FFFAF0', '2018-11-05 09:12:29', '2018-11-05 09:12:29');
INSERT INTO `colors` VALUES (129, 'Ivory', '#FFFFF0', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (130, 'AntiqueWhite', '#FAEBD7', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (131, 'Linen', '#FAF0E6', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (132, 'LavenderBlush', '#FFF0F5', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (133, 'MistyRose', '#FFE4E1', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (134, 'Gainsboro', '#DCDCDC', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (135, 'LightGrey', '#D3D3D3', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (136, 'Silver', '#C0C0C0', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (137, 'DarkGray', '#A9A9A9', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (138, 'Gray', '#808080', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (139, 'DimGray', '#696969', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (140, 'LightSlateGray', '#778899', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (141, 'SlateGray', '#708090', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (142, 'DarkSlateGray', '#2F4F4F', '2018-11-05 09:12:30', '2018-11-05 09:12:30');
INSERT INTO `colors` VALUES (143, 'Black', '#000000', '2018-11-05 09:12:30', '2018-11-05 09:12:30');

-- ----------------------------
-- Table structure for conversations
-- ----------------------------
DROP TABLE IF EXISTS `conversations`;
CREATE TABLE `conversations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `title` varchar(1000) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `sender_viewed` int(1) NOT NULL DEFAULT 1,
  `receiver_viewed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of conversations
-- ----------------------------
INSERT INTO `conversations` VALUES (2, 12, 14, 'sabun muka', 1, 1, '2020-07-04 07:47:13', '2020-07-04 07:47:37');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 297 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (1, 'AF', 'Afghanistan');
INSERT INTO `countries` VALUES (2, 'AL', 'Albania');
INSERT INTO `countries` VALUES (3, 'DZ', 'Algeria');
INSERT INTO `countries` VALUES (4, 'DS', 'American Samoa');
INSERT INTO `countries` VALUES (5, 'AD', 'Andorra');
INSERT INTO `countries` VALUES (6, 'AO', 'Angola');
INSERT INTO `countries` VALUES (7, 'AI', 'Anguilla');
INSERT INTO `countries` VALUES (8, 'AQ', 'Antarctica');
INSERT INTO `countries` VALUES (9, 'AG', 'Antigua and Barbuda');
INSERT INTO `countries` VALUES (10, 'AR', 'Argentina');
INSERT INTO `countries` VALUES (11, 'AM', 'Armenia');
INSERT INTO `countries` VALUES (12, 'AW', 'Aruba');
INSERT INTO `countries` VALUES (13, 'AU', 'Australia');
INSERT INTO `countries` VALUES (14, 'AT', 'Austria');
INSERT INTO `countries` VALUES (15, 'AZ', 'Azerbaijan');
INSERT INTO `countries` VALUES (16, 'BS', 'Bahamas');
INSERT INTO `countries` VALUES (17, 'BH', 'Bahrain');
INSERT INTO `countries` VALUES (18, 'BD', 'Bangladesh');
INSERT INTO `countries` VALUES (19, 'BB', 'Barbados');
INSERT INTO `countries` VALUES (20, 'BY', 'Belarus');
INSERT INTO `countries` VALUES (21, 'BE', 'Belgium');
INSERT INTO `countries` VALUES (22, 'BZ', 'Belize');
INSERT INTO `countries` VALUES (23, 'BJ', 'Benin');
INSERT INTO `countries` VALUES (24, 'BM', 'Bermuda');
INSERT INTO `countries` VALUES (25, 'BT', 'Bhutan');
INSERT INTO `countries` VALUES (26, 'BO', 'Bolivia');
INSERT INTO `countries` VALUES (27, 'BA', 'Bosnia and Herzegovina');
INSERT INTO `countries` VALUES (28, 'BW', 'Botswana');
INSERT INTO `countries` VALUES (29, 'BV', 'Bouvet Island');
INSERT INTO `countries` VALUES (30, 'BR', 'Brazil');
INSERT INTO `countries` VALUES (31, 'IO', 'British Indian Ocean Territory');
INSERT INTO `countries` VALUES (32, 'BN', 'Brunei Darussalam');
INSERT INTO `countries` VALUES (33, 'BG', 'Bulgaria');
INSERT INTO `countries` VALUES (34, 'BF', 'Burkina Faso');
INSERT INTO `countries` VALUES (35, 'BI', 'Burundi');
INSERT INTO `countries` VALUES (36, 'KH', 'Cambodia');
INSERT INTO `countries` VALUES (37, 'CM', 'Cameroon');
INSERT INTO `countries` VALUES (38, 'CA', 'Canada');
INSERT INTO `countries` VALUES (39, 'CV', 'Cape Verde');
INSERT INTO `countries` VALUES (40, 'KY', 'Cayman Islands');
INSERT INTO `countries` VALUES (41, 'CF', 'Central African Republic');
INSERT INTO `countries` VALUES (42, 'TD', 'Chad');
INSERT INTO `countries` VALUES (43, 'CL', 'Chile');
INSERT INTO `countries` VALUES (44, 'CN', 'China');
INSERT INTO `countries` VALUES (45, 'CX', 'Christmas Island');
INSERT INTO `countries` VALUES (46, 'CC', 'Cocos (Keeling) Islands');
INSERT INTO `countries` VALUES (47, 'CO', 'Colombia');
INSERT INTO `countries` VALUES (48, 'KM', 'Comoros');
INSERT INTO `countries` VALUES (49, 'CG', 'Congo');
INSERT INTO `countries` VALUES (50, 'CK', 'Cook Islands');
INSERT INTO `countries` VALUES (51, 'CR', 'Costa Rica');
INSERT INTO `countries` VALUES (52, 'HR', 'Croatia (Hrvatska)');
INSERT INTO `countries` VALUES (53, 'CU', 'Cuba');
INSERT INTO `countries` VALUES (54, 'CY', 'Cyprus');
INSERT INTO `countries` VALUES (55, 'CZ', 'Czech Republic');
INSERT INTO `countries` VALUES (56, 'DK', 'Denmark');
INSERT INTO `countries` VALUES (57, 'DJ', 'Djibouti');
INSERT INTO `countries` VALUES (58, 'DM', 'Dominica');
INSERT INTO `countries` VALUES (59, 'DO', 'Dominican Republic');
INSERT INTO `countries` VALUES (60, 'TP', 'East Timor');
INSERT INTO `countries` VALUES (61, 'EC', 'Ecuador');
INSERT INTO `countries` VALUES (62, 'EG', 'Egypt');
INSERT INTO `countries` VALUES (63, 'SV', 'El Salvador');
INSERT INTO `countries` VALUES (64, 'GQ', 'Equatorial Guinea');
INSERT INTO `countries` VALUES (65, 'ER', 'Eritrea');
INSERT INTO `countries` VALUES (66, 'EE', 'Estonia');
INSERT INTO `countries` VALUES (67, 'ET', 'Ethiopia');
INSERT INTO `countries` VALUES (68, 'FK', 'Falkland Islands (Malvinas)');
INSERT INTO `countries` VALUES (69, 'FO', 'Faroe Islands');
INSERT INTO `countries` VALUES (70, 'FJ', 'Fiji');
INSERT INTO `countries` VALUES (71, 'FI', 'Finland');
INSERT INTO `countries` VALUES (72, 'FR', 'France');
INSERT INTO `countries` VALUES (73, 'FX', 'France, Metropolitan');
INSERT INTO `countries` VALUES (74, 'GF', 'French Guiana');
INSERT INTO `countries` VALUES (75, 'PF', 'French Polynesia');
INSERT INTO `countries` VALUES (76, 'TF', 'French Southern Territories');
INSERT INTO `countries` VALUES (77, 'GA', 'Gabon');
INSERT INTO `countries` VALUES (78, 'GM', 'Gambia');
INSERT INTO `countries` VALUES (79, 'GE', 'Georgia');
INSERT INTO `countries` VALUES (80, 'DE', 'Germany');
INSERT INTO `countries` VALUES (81, 'GH', 'Ghana');
INSERT INTO `countries` VALUES (82, 'GI', 'Gibraltar');
INSERT INTO `countries` VALUES (83, 'GK', 'Guernsey');
INSERT INTO `countries` VALUES (84, 'GR', 'Greece');
INSERT INTO `countries` VALUES (85, 'GL', 'Greenland');
INSERT INTO `countries` VALUES (86, 'GD', 'Grenada');
INSERT INTO `countries` VALUES (87, 'GP', 'Guadeloupe');
INSERT INTO `countries` VALUES (88, 'GU', 'Guam');
INSERT INTO `countries` VALUES (89, 'GT', 'Guatemala');
INSERT INTO `countries` VALUES (90, 'GN', 'Guinea');
INSERT INTO `countries` VALUES (91, 'GW', 'Guinea-Bissau');
INSERT INTO `countries` VALUES (92, 'GY', 'Guyana');
INSERT INTO `countries` VALUES (93, 'HT', 'Haiti');
INSERT INTO `countries` VALUES (94, 'HM', 'Heard and Mc Donald Islands');
INSERT INTO `countries` VALUES (95, 'HN', 'Honduras');
INSERT INTO `countries` VALUES (96, 'HK', 'Hong Kong');
INSERT INTO `countries` VALUES (97, 'HU', 'Hungary');
INSERT INTO `countries` VALUES (98, 'IS', 'Iceland');
INSERT INTO `countries` VALUES (99, 'IN', 'India');
INSERT INTO `countries` VALUES (100, 'IM', 'Isle of Man');
INSERT INTO `countries` VALUES (101, 'ID', 'Indonesia');
INSERT INTO `countries` VALUES (102, 'IR', 'Iran (Islamic Republic of)');
INSERT INTO `countries` VALUES (103, 'IQ', 'Iraq');
INSERT INTO `countries` VALUES (104, 'IE', 'Ireland');
INSERT INTO `countries` VALUES (105, 'IL', 'Israel');
INSERT INTO `countries` VALUES (106, 'IT', 'Italy');
INSERT INTO `countries` VALUES (107, 'CI', 'Ivory Coast');
INSERT INTO `countries` VALUES (108, 'JE', 'Jersey');
INSERT INTO `countries` VALUES (109, 'JM', 'Jamaica');
INSERT INTO `countries` VALUES (110, 'JP', 'Japan');
INSERT INTO `countries` VALUES (111, 'JO', 'Jordan');
INSERT INTO `countries` VALUES (112, 'KZ', 'Kazakhstan');
INSERT INTO `countries` VALUES (113, 'KE', 'Kenya');
INSERT INTO `countries` VALUES (114, 'KI', 'Kiribati');
INSERT INTO `countries` VALUES (115, 'KP', 'Korea, Democratic People\'s Republic of');
INSERT INTO `countries` VALUES (116, 'KR', 'Korea, Republic of');
INSERT INTO `countries` VALUES (117, 'XK', 'Kosovo');
INSERT INTO `countries` VALUES (118, 'KW', 'Kuwait');
INSERT INTO `countries` VALUES (119, 'KG', 'Kyrgyzstan');
INSERT INTO `countries` VALUES (120, 'LA', 'Lao People\'s Democratic Republic');
INSERT INTO `countries` VALUES (121, 'LV', 'Latvia');
INSERT INTO `countries` VALUES (122, 'LB', 'Lebanon');
INSERT INTO `countries` VALUES (123, 'LS', 'Lesotho');
INSERT INTO `countries` VALUES (124, 'LR', 'Liberia');
INSERT INTO `countries` VALUES (125, 'LY', 'Libyan Arab Jamahiriya');
INSERT INTO `countries` VALUES (126, 'LI', 'Liechtenstein');
INSERT INTO `countries` VALUES (127, 'LT', 'Lithuania');
INSERT INTO `countries` VALUES (128, 'LU', 'Luxembourg');
INSERT INTO `countries` VALUES (129, 'MO', 'Macau');
INSERT INTO `countries` VALUES (130, 'MK', 'Macedonia');
INSERT INTO `countries` VALUES (131, 'MG', 'Madagascar');
INSERT INTO `countries` VALUES (132, 'MW', 'Malawi');
INSERT INTO `countries` VALUES (133, 'MY', 'Malaysia');
INSERT INTO `countries` VALUES (134, 'MV', 'Maldives');
INSERT INTO `countries` VALUES (135, 'ML', 'Mali');
INSERT INTO `countries` VALUES (136, 'MT', 'Malta');
INSERT INTO `countries` VALUES (137, 'MH', 'Marshall Islands');
INSERT INTO `countries` VALUES (138, 'MQ', 'Martinique');
INSERT INTO `countries` VALUES (139, 'MR', 'Mauritania');
INSERT INTO `countries` VALUES (140, 'MU', 'Mauritius');
INSERT INTO `countries` VALUES (141, 'TY', 'Mayotte');
INSERT INTO `countries` VALUES (142, 'MX', 'Mexico');
INSERT INTO `countries` VALUES (143, 'FM', 'Micronesia, Federated States of');
INSERT INTO `countries` VALUES (144, 'MD', 'Moldova, Republic of');
INSERT INTO `countries` VALUES (145, 'MC', 'Monaco');
INSERT INTO `countries` VALUES (146, 'MN', 'Mongolia');
INSERT INTO `countries` VALUES (147, 'ME', 'Montenegro');
INSERT INTO `countries` VALUES (148, 'MS', 'Montserrat');
INSERT INTO `countries` VALUES (149, 'MA', 'Morocco');
INSERT INTO `countries` VALUES (150, 'MZ', 'Mozambique');
INSERT INTO `countries` VALUES (151, 'MM', 'Myanmar');
INSERT INTO `countries` VALUES (152, 'NA', 'Namibia');
INSERT INTO `countries` VALUES (153, 'NR', 'Nauru');
INSERT INTO `countries` VALUES (154, 'NP', 'Nepal');
INSERT INTO `countries` VALUES (155, 'NL', 'Netherlands');
INSERT INTO `countries` VALUES (156, 'AN', 'Netherlands Antilles');
INSERT INTO `countries` VALUES (157, 'NC', 'New Caledonia');
INSERT INTO `countries` VALUES (158, 'NZ', 'New Zealand');
INSERT INTO `countries` VALUES (159, 'NI', 'Nicaragua');
INSERT INTO `countries` VALUES (160, 'NE', 'Niger');
INSERT INTO `countries` VALUES (161, 'NG', 'Nigeria');
INSERT INTO `countries` VALUES (162, 'NU', 'Niue');
INSERT INTO `countries` VALUES (163, 'NF', 'Norfolk Island');
INSERT INTO `countries` VALUES (164, 'MP', 'Northern Mariana Islands');
INSERT INTO `countries` VALUES (165, 'NO', 'Norway');
INSERT INTO `countries` VALUES (166, 'OM', 'Oman');
INSERT INTO `countries` VALUES (167, 'PK', 'Pakistan');
INSERT INTO `countries` VALUES (168, 'PW', 'Palau');
INSERT INTO `countries` VALUES (169, 'PS', 'Palestine');
INSERT INTO `countries` VALUES (170, 'PA', 'Panama');
INSERT INTO `countries` VALUES (171, 'PG', 'Papua New Guinea');
INSERT INTO `countries` VALUES (172, 'PY', 'Paraguay');
INSERT INTO `countries` VALUES (173, 'PE', 'Peru');
INSERT INTO `countries` VALUES (174, 'PH', 'Philippines');
INSERT INTO `countries` VALUES (175, 'PN', 'Pitcairn');
INSERT INTO `countries` VALUES (176, 'PL', 'Poland');
INSERT INTO `countries` VALUES (177, 'PT', 'Portugal');
INSERT INTO `countries` VALUES (178, 'PR', 'Puerto Rico');
INSERT INTO `countries` VALUES (179, 'QA', 'Qatar');
INSERT INTO `countries` VALUES (180, 'RE', 'Reunion');
INSERT INTO `countries` VALUES (181, 'RO', 'Romania');
INSERT INTO `countries` VALUES (182, 'RU', 'Russian Federation');
INSERT INTO `countries` VALUES (183, 'RW', 'Rwanda');
INSERT INTO `countries` VALUES (184, 'KN', 'Saint Kitts and Nevis');
INSERT INTO `countries` VALUES (185, 'LC', 'Saint Lucia');
INSERT INTO `countries` VALUES (186, 'VC', 'Saint Vincent and the Grenadines');
INSERT INTO `countries` VALUES (187, 'WS', 'Samoa');
INSERT INTO `countries` VALUES (188, 'SM', 'San Marino');
INSERT INTO `countries` VALUES (189, 'ST', 'Sao Tome and Principe');
INSERT INTO `countries` VALUES (190, 'SA', 'Saudi Arabia');
INSERT INTO `countries` VALUES (191, 'SN', 'Senegal');
INSERT INTO `countries` VALUES (192, 'RS', 'Serbia');
INSERT INTO `countries` VALUES (193, 'SC', 'Seychelles');
INSERT INTO `countries` VALUES (194, 'SL', 'Sierra Leone');
INSERT INTO `countries` VALUES (195, 'SG', 'Singapore');
INSERT INTO `countries` VALUES (196, 'SK', 'Slovakia');
INSERT INTO `countries` VALUES (197, 'SI', 'Slovenia');
INSERT INTO `countries` VALUES (198, 'SB', 'Solomon Islands');
INSERT INTO `countries` VALUES (199, 'SO', 'Somalia');
INSERT INTO `countries` VALUES (200, 'ZA', 'South Africa');
INSERT INTO `countries` VALUES (201, 'GS', 'South Georgia South Sandwich Islands');
INSERT INTO `countries` VALUES (202, 'SS', 'South Sudan');
INSERT INTO `countries` VALUES (203, 'ES', 'Spain');
INSERT INTO `countries` VALUES (204, 'LK', 'Sri Lanka');
INSERT INTO `countries` VALUES (205, 'SH', 'St. Helena');
INSERT INTO `countries` VALUES (206, 'PM', 'St. Pierre and Miquelon');
INSERT INTO `countries` VALUES (207, 'SD', 'Sudan');
INSERT INTO `countries` VALUES (208, 'SR', 'Suriname');
INSERT INTO `countries` VALUES (209, 'SJ', 'Svalbard and Jan Mayen Islands');
INSERT INTO `countries` VALUES (210, 'SZ', 'Swaziland');
INSERT INTO `countries` VALUES (211, 'SE', 'Sweden');
INSERT INTO `countries` VALUES (212, 'CH', 'Switzerland');
INSERT INTO `countries` VALUES (213, 'SY', 'Syrian Arab Republic');
INSERT INTO `countries` VALUES (214, 'TW', 'Taiwan');
INSERT INTO `countries` VALUES (215, 'TJ', 'Tajikistan');
INSERT INTO `countries` VALUES (216, 'TZ', 'Tanzania, United Republic of');
INSERT INTO `countries` VALUES (217, 'TH', 'Thailand');
INSERT INTO `countries` VALUES (218, 'TG', 'Togo');
INSERT INTO `countries` VALUES (219, 'TK', 'Tokelau');
INSERT INTO `countries` VALUES (220, 'TO', 'Tonga');
INSERT INTO `countries` VALUES (221, 'TT', 'Trinidad and Tobago');
INSERT INTO `countries` VALUES (222, 'TN', 'Tunisia');
INSERT INTO `countries` VALUES (223, 'TR', 'Turkey');
INSERT INTO `countries` VALUES (224, 'TM', 'Turkmenistan');
INSERT INTO `countries` VALUES (225, 'TC', 'Turks and Caicos Islands');
INSERT INTO `countries` VALUES (226, 'TV', 'Tuvalu');
INSERT INTO `countries` VALUES (227, 'UG', 'Uganda');
INSERT INTO `countries` VALUES (228, 'UA', 'Ukraine');
INSERT INTO `countries` VALUES (229, 'AE', 'United Arab Emirates');
INSERT INTO `countries` VALUES (230, 'GB', 'United Kingdom');
INSERT INTO `countries` VALUES (231, 'US', 'United States');
INSERT INTO `countries` VALUES (232, 'UM', 'United States minor outlying islands');
INSERT INTO `countries` VALUES (233, 'UY', 'Uruguay');
INSERT INTO `countries` VALUES (234, 'UZ', 'Uzbekistan');
INSERT INTO `countries` VALUES (235, 'VU', 'Vanuatu');
INSERT INTO `countries` VALUES (236, 'VA', 'Vatican City State');
INSERT INTO `countries` VALUES (237, 'VE', 'Venezuela');
INSERT INTO `countries` VALUES (238, 'VN', 'Vietnam');
INSERT INTO `countries` VALUES (239, 'VG', 'Virgin Islands (British)');
INSERT INTO `countries` VALUES (240, 'VI', 'Virgin Islands (U.S.)');
INSERT INTO `countries` VALUES (241, 'WF', 'Wallis and Futuna Islands');
INSERT INTO `countries` VALUES (242, 'EH', 'Western Sahara');
INSERT INTO `countries` VALUES (243, 'YE', 'Yemen');
INSERT INTO `countries` VALUES (244, 'ZR', 'Zaire');
INSERT INTO `countries` VALUES (245, 'ZM', 'Zambia');
INSERT INTO `countries` VALUES (246, 'ZW', 'Zimbabwe');
INSERT INTO `countries` VALUES (247, 'AF', 'Afghanistan');
INSERT INTO `countries` VALUES (248, 'AL', 'Albania');
INSERT INTO `countries` VALUES (249, 'DZ', 'Algeria');
INSERT INTO `countries` VALUES (250, 'DS', 'American Samoa');
INSERT INTO `countries` VALUES (251, 'AD', 'Andorra');
INSERT INTO `countries` VALUES (252, 'AO', 'Angola');
INSERT INTO `countries` VALUES (253, 'AI', 'Anguilla');
INSERT INTO `countries` VALUES (254, 'AQ', 'Antarctica');
INSERT INTO `countries` VALUES (255, 'AG', 'Antigua and Barbuda');
INSERT INTO `countries` VALUES (256, 'AR', 'Argentina');
INSERT INTO `countries` VALUES (257, 'AM', 'Armenia');
INSERT INTO `countries` VALUES (258, 'AW', 'Aruba');
INSERT INTO `countries` VALUES (259, 'AU', 'Australia');
INSERT INTO `countries` VALUES (260, 'AT', 'Austria');
INSERT INTO `countries` VALUES (261, 'AZ', 'Azerbaijan');
INSERT INTO `countries` VALUES (262, 'BS', 'Bahamas');
INSERT INTO `countries` VALUES (263, 'BH', 'Bahrain');
INSERT INTO `countries` VALUES (264, 'BD', 'Bangladesh');
INSERT INTO `countries` VALUES (265, 'BB', 'Barbados');
INSERT INTO `countries` VALUES (266, 'BY', 'Belarus');
INSERT INTO `countries` VALUES (267, 'BE', 'Belgium');
INSERT INTO `countries` VALUES (268, 'BZ', 'Belize');
INSERT INTO `countries` VALUES (269, 'BJ', 'Benin');
INSERT INTO `countries` VALUES (270, 'BM', 'Bermuda');
INSERT INTO `countries` VALUES (271, 'BT', 'Bhutan');
INSERT INTO `countries` VALUES (272, 'BO', 'Bolivia');
INSERT INTO `countries` VALUES (273, 'BA', 'Bosnia and Herzegovina');
INSERT INTO `countries` VALUES (274, 'BW', 'Botswana');
INSERT INTO `countries` VALUES (275, 'BV', 'Bouvet Island');
INSERT INTO `countries` VALUES (276, 'BR', 'Brazil');
INSERT INTO `countries` VALUES (277, 'IO', 'British Indian Ocean Territory');
INSERT INTO `countries` VALUES (278, 'BN', 'Brunei Darussalam');
INSERT INTO `countries` VALUES (279, 'BG', 'Bulgaria');
INSERT INTO `countries` VALUES (280, 'BF', 'Burkina Faso');
INSERT INTO `countries` VALUES (281, 'BI', 'Burundi');
INSERT INTO `countries` VALUES (282, 'KH', 'Cambodia');
INSERT INTO `countries` VALUES (283, 'CM', 'Cameroon');
INSERT INTO `countries` VALUES (284, 'CA', 'Canada');
INSERT INTO `countries` VALUES (285, 'CV', 'Cape Verde');
INSERT INTO `countries` VALUES (286, 'KY', 'Cayman Islands');
INSERT INTO `countries` VALUES (287, 'CF', 'Central African Republic');
INSERT INTO `countries` VALUES (288, 'TD', 'Chad');
INSERT INTO `countries` VALUES (289, 'CL', 'Chile');
INSERT INTO `countries` VALUES (290, 'CN', 'China');
INSERT INTO `countries` VALUES (291, 'CX', 'Christmas Island');
INSERT INTO `countries` VALUES (292, 'CC', 'Cocos (Keeling) Islands');
INSERT INTO `countries` VALUES (293, 'CO', 'Colombia');
INSERT INTO `countries` VALUES (294, 'KM', 'Comoros');
INSERT INTO `countries` VALUES (295, 'CG', 'Congo');
INSERT INTO `countries` VALUES (296, 'CK', 'Cook Islands');

-- ----------------------------
-- Table structure for coupon_usages
-- ----------------------------
DROP TABLE IF EXISTS `coupon_usages`;
CREATE TABLE `coupon_usages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `order_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupon_usages
-- ----------------------------
INSERT INTO `coupon_usages` VALUES (3, 34, 10, '2020-08-29 15:24:48', '2020-08-29 15:24:48', 15);
INSERT INTO `coupon_usages` VALUES (5, 34, 9, '2020-08-29 15:40:14', '2020-08-29 15:40:14', 5);
INSERT INTO `coupon_usages` VALUES (6, 38, 9, '2020-08-29 16:33:23', '2020-08-29 16:33:23', 9);
INSERT INTO `coupon_usages` VALUES (7, 13, 9, '2020-08-31 13:07:13', '2020-08-31 13:07:13', 10);
INSERT INTO `coupon_usages` VALUES (8, 13, 10, '2020-08-31 18:58:18', '2020-08-31 18:58:18', 13);
INSERT INTO `coupon_usages` VALUES (9, 13, 5, '2020-09-01 13:14:52', '2020-09-01 13:14:52', 4);
INSERT INTO `coupon_usages` VALUES (13, 13, 12, '2020-09-02 11:00:57', '2020-09-02 11:00:57', 4);
INSERT INTO `coupon_usages` VALUES (14, 65, 5, '2020-09-02 13:59:47', '2020-09-02 13:59:47', 8);
INSERT INTO `coupon_usages` VALUES (15, 13, 13, '2020-09-09 11:27:54', '2020-09-09 11:27:54', 20);

-- ----------------------------
-- Table structure for coupons
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `discount` double(8, 2) NOT NULL,
  `discount_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` int(15) NOT NULL,
  `end_date` int(15) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `banner` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `syarat` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 981 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupons
-- ----------------------------
INSERT INTO `coupons` VALUES (2, 'cart_base', 'PHOEBEXSUSAN', '{\"min_buy\":\"10000\",\"max_discount\":\"5000\"}', 30.00, 'percent', 1598288400, 1598806800, '2020-08-25 14:57:31', '2020-08-25 16:56:54', 'uploads/coupon/PY9u8jJ9IsH5hCs7y5ZBVCrkkYyPEcIrQQ4HZAvd.jpeg', 'promo', 'Kupon Susan', NULL, NULL);
INSERT INTO `coupons` VALUES (3, 'cart_base', 'ASIKINAJA', '{\"min_buy\":\"50000\",\"max_discount\":\"7000\"}', 10.00, 'percent', 1598374800, 1610470800, '2020-08-25 15:58:44', '2020-08-26 16:48:35', 'uploads/coupon/ikZPYTtr7KpWxs2zshFZqMPESY18Bu3pzn2Z5YSr.jpeg', 'promo', 'Kupon Asik', 'Asik asik jos', NULL);
INSERT INTO `coupons` VALUES (4, 'cart_base', 'BELUMMULAI', '{\"min_buy\":\"0\",\"max_discount\":\"1000\"}', 50.00, 'percent', 1598634000, 1598806800, '2020-08-25 16:35:24', '2020-08-27 15:54:34', 'uploads/coupon/gHUZQbyyl1E5m4MmLufoZdcNNVEUheOTcvIdmcxl.png', 'promo', 'Kupon Upcoming', NULL, '[null]');
INSERT INTO `coupons` VALUES (5, 'cart_base', 'DISKON30', '{\"min_buy\":\"100000\",\"max_discount\":\"500000\"}', 30.00, 'percent', 1598634000, 1601398800, '2020-08-26 16:04:07', '2020-09-01 13:02:06', 'uploads/coupon/BLjR5gkfSe2f0X6JCGE7mV2ADSyCYN76bpsT5z2C.png', 'promo', 'DISKON 30%', 'Hanya boleh digunakan 1 kali', '[\"minimal belanja Rp 100.000\",\"maksimal diskon Rp 500.000\"]');
INSERT INTO `coupons` VALUES (6, 'cart_base', '50000', '{\"min_buy\":\"100000\",\"max_discount\":\"50000\"}', 500000.00, 'amount', 1599152400, 1599757200, '2020-08-27 12:07:16', '2020-08-31 11:40:30', 'uploads/coupon/rlyjtIlOssODpVor4iCiqnDBBYeoVyUZ3V7HZkC1.png', 'promo', 'diskon 50000', NULL, '[\"tidak ada syarat lain\"]');
INSERT INTO `coupons` VALUES (7, 'product_base', 'PRODUCTOLDPROMO', '[{\"category_id\":\"5\",\"subcategory_id\":\"10\",\"subsubcategory_id\":\"18\",\"product_id\":\"26\"}]', 10.00, 'percent', 1598461200, 1599152400, '2020-08-27 14:36:11', '2020-08-29 13:29:39', 'uploads/coupon/4LBHna4sEetjmbaRJTL0oB1e8s6WliDZLIjicTlY.png', 'promo', 'Kupon Product Old', 'Ini keterangan produk old', '[\"Pelanggan lama\",\"Khusus untuk hari ini\"]');
INSERT INTO `coupons` VALUES (8, 'product_base', 'HAUM20', '[{\"category_id\":\"5\",\"subcategory_id\":\"11\",\"subsubcategory_id\":\"21\",\"product_id\":\"55\"},{\"category_id\":\"5\",\"subcategory_id\":\"11\",\"subsubcategory_id\":\"21\",\"product_id\":\"29\"}]', 20.00, 'percent', 1598634000, 1604682000, '2020-08-29 13:29:05', '2020-08-31 11:38:50', 'uploads/coupon/ZY26IVoiVirzVey0X4jhUbg5B9L9woFI5mgSVna2.jpeg', 'promo', 'HAUM diskon 20%', 'diskon 20% untuk produk tertentu', '[\"spesial produk haum dan cosrx\",\"hanya produk skincare\"]');
INSERT INTO `coupons` VALUES (9, 'cart_base', 'luna60', '{\"min_buy\":100000,\"max_discount\":50000}', 50000.00, 'amount', 1598634000, 1599498000, '2020-08-29 14:44:43', '2020-08-29 14:44:43', NULL, 'user_affiliate', '', NULL, NULL);
INSERT INTO `coupons` VALUES (10, 'cart_base', 'DITABRAND', '{\"min_buy\":100000,\"max_discount\":50000}', 50000.00, 'amount', 1598634000, 1599498000, '2020-08-29 15:11:28', '2020-08-29 15:11:28', NULL, 'user_affiliate', '', NULL, NULL);
INSERT INTO `coupons` VALUES (11, 'cart_base', 'brand', '{\"min_buy\":100000,\"max_discount\":50000}', 50000.00, 'amount', 1598634000, 1599498000, '2020-08-29 16:51:42', '2020-08-29 16:51:42', NULL, 'user_affiliate', '', NULL, NULL);
INSERT INTO `coupons` VALUES (12, 'cart_base', 'DIS50', '{\"min_buy\":\"100000\",\"max_discount\":\"300000\"}', 50.00, 'percent', 1598893200, 1601398800, '2020-09-01 16:05:15', '2020-09-01 16:05:15', 'uploads/coupon/fjjwthyMY3slg2UcAww4vRVKvLAfcMrLd5bJiC95.png', 'promo', 'Diskon 50%', 'diskon untuk semua produk', '[\"minimal belanja 100.000<br>\",\"diskon maksimal 300.000<br>\"]');
INSERT INTO `coupons` VALUES (13, 'cart_base', 'DISKON50', '{\"min_buy\":\"100000\",\"max_discount\":\"3000000\"}', 50.00, 'percent', 1599584400, 1601398800, '2020-09-09 11:23:42', '2020-09-09 11:23:42', 'uploads/coupon/xw7pG9Mb1b5nCxJ7Ojz9F1DMk6C3Wip60htnYeoL.jpeg', 'promo', 'Diskon 50%', '<p><br></p>', '[\"all product\",\"minimal beli 100.000\"]');
INSERT INTO `coupons` VALUES (14, 'cart_base', '1599898201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:10:01', '2020-09-12 15:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (15, 'cart_base', '1599898501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:15:01', '2020-09-12 15:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (16, 'cart_base', '1599898802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:20:02', '2020-09-12 15:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (17, 'cart_base', '1599899102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:25:02', '2020-09-12 15:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (18, 'cart_base', '1599899402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:30:02', '2020-09-12 15:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (19, 'cart_base', '1599899702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:35:02', '2020-09-12 15:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (20, 'cart_base', '1599900002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:40:02', '2020-09-12 15:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (21, 'cart_base', '1599900302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:45:02', '2020-09-12 15:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (22, 'cart_base', '1599900602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:50:02', '2020-09-12 15:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (23, 'cart_base', '1599900902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 15:55:02', '2020-09-12 15:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (24, 'cart_base', '1599901202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:00:02', '2020-09-12 16:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (25, 'cart_base', '1599901502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:05:02', '2020-09-12 16:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (26, 'cart_base', '1599901801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:10:01', '2020-09-12 16:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (27, 'cart_base', '1599902102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:15:02', '2020-09-12 16:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (28, 'cart_base', '1599902402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:20:02', '2020-09-12 16:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (29, 'cart_base', '1599902702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:25:02', '2020-09-12 16:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (30, 'cart_base', '1599903002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:30:02', '2020-09-12 16:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (31, 'cart_base', '1599903301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:35:01', '2020-09-12 16:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (32, 'cart_base', '1599903601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:40:01', '2020-09-12 16:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (33, 'cart_base', '1599903901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:45:01', '2020-09-12 16:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (34, 'cart_base', '1599904202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:50:02', '2020-09-12 16:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (35, 'cart_base', '1599904501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 16:55:01', '2020-09-12 16:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (36, 'cart_base', '1599904802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:00:02', '2020-09-12 17:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (37, 'cart_base', '1599905101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:05:01', '2020-09-12 17:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (38, 'cart_base', '1599905402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:10:02', '2020-09-12 17:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (39, 'cart_base', '1599905701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:15:01', '2020-09-12 17:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (40, 'cart_base', '1599906002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:20:02', '2020-09-12 17:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (41, 'cart_base', '1599906302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:25:02', '2020-09-12 17:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (42, 'cart_base', '1599906601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:30:01', '2020-09-12 17:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (43, 'cart_base', '1599906901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:35:01', '2020-09-12 17:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (44, 'cart_base', '1599907202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:40:02', '2020-09-12 17:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (45, 'cart_base', '1599907502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:45:02', '2020-09-12 17:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (46, 'cart_base', '1599907801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:50:01', '2020-09-12 17:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (47, 'cart_base', '1599908102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 17:55:02', '2020-09-12 17:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (48, 'cart_base', '1599908401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:00:01', '2020-09-12 18:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (49, 'cart_base', '1599908701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:05:01', '2020-09-12 18:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (50, 'cart_base', '1599909001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:10:01', '2020-09-12 18:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (51, 'cart_base', '1599909302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:15:02', '2020-09-12 18:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (52, 'cart_base', '1599909602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:20:02', '2020-09-12 18:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (53, 'cart_base', '1599909902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:25:02', '2020-09-12 18:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (54, 'cart_base', '1599910202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:30:02', '2020-09-12 18:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (55, 'cart_base', '1599910502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:35:02', '2020-09-12 18:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (56, 'cart_base', '1599910802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:40:02', '2020-09-12 18:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (57, 'cart_base', '1599911102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:45:02', '2020-09-12 18:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (58, 'cart_base', '1599911402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:50:02', '2020-09-12 18:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (59, 'cart_base', '1599911702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 18:55:02', '2020-09-12 18:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (60, 'cart_base', '1599912002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:00:02', '2020-09-12 19:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (61, 'cart_base', '1599912302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:05:02', '2020-09-12 19:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (62, 'cart_base', '1599912602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:10:02', '2020-09-12 19:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (63, 'cart_base', '1599912902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:15:02', '2020-09-12 19:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (64, 'cart_base', '1599913202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:20:02', '2020-09-12 19:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (65, 'cart_base', '1599913501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:25:01', '2020-09-12 19:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (66, 'cart_base', '1599913802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:30:02', '2020-09-12 19:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (67, 'cart_base', '1599914102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:35:02', '2020-09-12 19:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (68, 'cart_base', '1599914401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:40:01', '2020-09-12 19:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (69, 'cart_base', '1599914701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:45:01', '2020-09-12 19:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (70, 'cart_base', '1599915002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:50:02', '2020-09-12 19:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (71, 'cart_base', '1599915301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 19:55:01', '2020-09-12 19:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (72, 'cart_base', '1599915602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:00:02', '2020-09-12 20:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (73, 'cart_base', '1599915902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:05:02', '2020-09-12 20:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (74, 'cart_base', '1599916201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:10:01', '2020-09-12 20:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (75, 'cart_base', '1599916502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:15:02', '2020-09-12 20:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (76, 'cart_base', '1599916801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:20:01', '2020-09-12 20:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (77, 'cart_base', '1599917101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:25:01', '2020-09-12 20:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (78, 'cart_base', '1599917402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:30:02', '2020-09-12 20:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (79, 'cart_base', '1599917701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:35:01', '2020-09-12 20:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (80, 'cart_base', '1599918002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:40:02', '2020-09-12 20:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (81, 'cart_base', '1599918301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:45:01', '2020-09-12 20:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (82, 'cart_base', '1599918601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:50:01', '2020-09-12 20:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (83, 'cart_base', '1599918901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 20:55:01', '2020-09-12 20:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (84, 'cart_base', '1599919202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:00:02', '2020-09-12 21:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (85, 'cart_base', '1599919502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:05:02', '2020-09-12 21:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (86, 'cart_base', '1599919802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:10:02', '2020-09-12 21:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (87, 'cart_base', '1599920101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:15:01', '2020-09-12 21:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (88, 'cart_base', '1599920402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:20:02', '2020-09-12 21:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (89, 'cart_base', '1599920702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:25:02', '2020-09-12 21:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (90, 'cart_base', '1599921002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:30:02', '2020-09-12 21:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (91, 'cart_base', '1599921302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:35:02', '2020-09-12 21:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (92, 'cart_base', '1599921602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:40:02', '2020-09-12 21:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (93, 'cart_base', '1599921901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:45:01', '2020-09-12 21:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (94, 'cart_base', '1599922202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:50:02', '2020-09-12 21:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (95, 'cart_base', '1599922501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 21:55:01', '2020-09-12 21:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (96, 'cart_base', '1599922801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:00:01', '2020-09-12 22:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (97, 'cart_base', '1599923102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:05:02', '2020-09-12 22:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (98, 'cart_base', '1599923402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:10:02', '2020-09-12 22:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (99, 'cart_base', '1599923701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:15:01', '2020-09-12 22:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (100, 'cart_base', '1599924002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:20:02', '2020-09-12 22:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (101, 'cart_base', '1599924302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:25:02', '2020-09-12 22:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (102, 'cart_base', '1599924602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:30:02', '2020-09-12 22:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (103, 'cart_base', '1599924901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:35:01', '2020-09-12 22:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (104, 'cart_base', '1599925201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:40:01', '2020-09-12 22:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (105, 'cart_base', '1599925502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:45:02', '2020-09-12 22:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (106, 'cart_base', '1599925801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:50:01', '2020-09-12 22:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (107, 'cart_base', '1599926101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 22:55:01', '2020-09-12 22:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (108, 'cart_base', '1599926402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:00:02', '2020-09-12 23:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (109, 'cart_base', '1599926701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:05:01', '2020-09-12 23:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (110, 'cart_base', '1599927001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:10:01', '2020-09-12 23:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (111, 'cart_base', '1599927302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:15:02', '2020-09-12 23:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (112, 'cart_base', '1599927602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:20:02', '2020-09-12 23:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (113, 'cart_base', '1599927901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:25:01', '2020-09-12 23:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (114, 'cart_base', '1599928202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:30:02', '2020-09-12 23:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (115, 'cart_base', '1599928501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:35:01', '2020-09-12 23:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (116, 'cart_base', '1599928802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:40:02', '2020-09-12 23:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (117, 'cart_base', '1599929101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:45:01', '2020-09-12 23:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (118, 'cart_base', '1599929402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:50:02', '2020-09-12 23:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (119, 'cart_base', '1599929701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1599843600, 1599843600, '2020-09-12 23:55:01', '2020-09-12 23:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (120, 'cart_base', '1600102802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:00:02', '2020-09-15 00:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (121, 'cart_base', '1600103101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:05:01', '2020-09-15 00:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (122, 'cart_base', '1600103402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:10:02', '2020-09-15 00:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (123, 'cart_base', '1600103701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:15:01', '2020-09-15 00:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (124, 'cart_base', '1600104002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:20:02', '2020-09-15 00:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (125, 'cart_base', '1600104302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:25:02', '2020-09-15 00:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (126, 'cart_base', '1600104601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:30:01', '2020-09-15 00:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (127, 'cart_base', '1600104901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:35:01', '2020-09-15 00:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (128, 'cart_base', '1600105201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:40:01', '2020-09-15 00:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (129, 'cart_base', '1600105502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:45:02', '2020-09-15 00:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (130, 'cart_base', '1600105802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:50:02', '2020-09-15 00:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (131, 'cart_base', '1600106102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 00:55:02', '2020-09-15 00:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (132, 'cart_base', '1600106402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:00:02', '2020-09-15 01:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (133, 'cart_base', '1600106702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:05:02', '2020-09-15 01:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (134, 'cart_base', '1600107002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:10:02', '2020-09-15 01:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (135, 'cart_base', '1600107302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:15:02', '2020-09-15 01:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (136, 'cart_base', '1600107601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:20:01', '2020-09-15 01:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (137, 'cart_base', '1600107902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:25:02', '2020-09-15 01:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (138, 'cart_base', '1600108202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:30:02', '2020-09-15 01:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (139, 'cart_base', '1600108502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:35:02', '2020-09-15 01:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (140, 'cart_base', '1600108802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:40:02', '2020-09-15 01:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (141, 'cart_base', '1600109101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:45:01', '2020-09-15 01:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (142, 'cart_base', '1600109402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:50:02', '2020-09-15 01:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (143, 'cart_base', '1600109701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 01:55:01', '2020-09-15 01:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (144, 'cart_base', '1600110002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:00:02', '2020-09-15 02:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (145, 'cart_base', '1600110301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:05:01', '2020-09-15 02:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (146, 'cart_base', '1600110601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:10:01', '2020-09-15 02:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (147, 'cart_base', '1600110901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:15:01', '2020-09-15 02:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (148, 'cart_base', '1600111201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:20:01', '2020-09-15 02:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (149, 'cart_base', '1600111501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:25:01', '2020-09-15 02:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (150, 'cart_base', '1600111802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:30:02', '2020-09-15 02:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (151, 'cart_base', '1600112101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:35:01', '2020-09-15 02:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (152, 'cart_base', '1600112402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:40:02', '2020-09-15 02:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (153, 'cart_base', '1600112702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:45:02', '2020-09-15 02:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (154, 'cart_base', '1600113002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:50:02', '2020-09-15 02:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (155, 'cart_base', '1600113301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 02:55:01', '2020-09-15 02:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (156, 'cart_base', '1600113602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:00:02', '2020-09-15 03:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (157, 'cart_base', '1600113902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:05:02', '2020-09-15 03:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (158, 'cart_base', '1600114202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:10:02', '2020-09-15 03:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (159, 'cart_base', '1600114501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:15:01', '2020-09-15 03:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (160, 'cart_base', '1600114801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:20:01', '2020-09-15 03:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (161, 'cart_base', '1600115102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:25:02', '2020-09-15 03:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (162, 'cart_base', '1600115401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:30:01', '2020-09-15 03:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (163, 'cart_base', '1600115701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:35:01', '2020-09-15 03:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (164, 'cart_base', '1600116001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:40:01', '2020-09-15 03:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (165, 'cart_base', '1600116302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:45:02', '2020-09-15 03:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (166, 'cart_base', '1600116602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:50:02', '2020-09-15 03:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (167, 'cart_base', '1600116902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 03:55:02', '2020-09-15 03:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (168, 'cart_base', '1600117201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:00:01', '2020-09-15 04:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (169, 'cart_base', '1600117502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:05:02', '2020-09-15 04:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (170, 'cart_base', '1600117801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:10:01', '2020-09-15 04:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (171, 'cart_base', '1600118102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:15:02', '2020-09-15 04:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (172, 'cart_base', '1600118402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:20:02', '2020-09-15 04:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (173, 'cart_base', '1600118702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:25:02', '2020-09-15 04:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (174, 'cart_base', '1600119001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:30:01', '2020-09-15 04:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (175, 'cart_base', '1600119302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:35:02', '2020-09-15 04:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (176, 'cart_base', '1600119602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:40:02', '2020-09-15 04:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (177, 'cart_base', '1600119902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:45:02', '2020-09-15 04:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (178, 'cart_base', '1600120202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:50:02', '2020-09-15 04:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (179, 'cart_base', '1600120501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 04:55:01', '2020-09-15 04:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (180, 'cart_base', '1600120802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:00:02', '2020-09-15 05:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (181, 'cart_base', '1600121102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:05:02', '2020-09-15 05:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (182, 'cart_base', '1600121402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:10:02', '2020-09-15 05:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (183, 'cart_base', '1600121702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:15:02', '2020-09-15 05:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (184, 'cart_base', '1600122002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:20:02', '2020-09-15 05:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (185, 'cart_base', '1600122301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:25:01', '2020-09-15 05:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (186, 'cart_base', '1600122601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:30:01', '2020-09-15 05:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (187, 'cart_base', '1600122902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:35:02', '2020-09-15 05:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (188, 'cart_base', '1600123201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:40:01', '2020-09-15 05:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (189, 'cart_base', '1600123502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:45:02', '2020-09-15 05:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (190, 'cart_base', '1600123801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:50:01', '2020-09-15 05:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (191, 'cart_base', '1600124102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 05:55:02', '2020-09-15 05:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (192, 'cart_base', '1600124402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:00:02', '2020-09-15 06:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (193, 'cart_base', '1600124702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:05:02', '2020-09-15 06:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (194, 'cart_base', '1600125002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:10:02', '2020-09-15 06:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (195, 'cart_base', '1600125301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:15:01', '2020-09-15 06:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (196, 'cart_base', '1600125601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:20:01', '2020-09-15 06:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (197, 'cart_base', '1600125902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:25:02', '2020-09-15 06:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (198, 'cart_base', '1600126201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:30:01', '2020-09-15 06:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (199, 'cart_base', '1600126501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:35:01', '2020-09-15 06:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (200, 'cart_base', '1600126801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:40:01', '2020-09-15 06:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (201, 'cart_base', '1600127101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:45:01', '2020-09-15 06:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (202, 'cart_base', '1600127402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:50:02', '2020-09-15 06:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (203, 'cart_base', '1600127701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 06:55:01', '2020-09-15 06:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (204, 'cart_base', '1600128002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:00:02', '2020-09-15 07:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (205, 'cart_base', '1600128302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:05:02', '2020-09-15 07:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (206, 'cart_base', '1600128602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:10:02', '2020-09-15 07:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (207, 'cart_base', '1600128902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:15:02', '2020-09-15 07:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (208, 'cart_base', '1600129201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:20:01', '2020-09-15 07:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (209, 'cart_base', '1600129502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:25:02', '2020-09-15 07:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (210, 'cart_base', '1600129803', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:30:03', '2020-09-15 07:30:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (211, 'cart_base', '1600130103', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:35:03', '2020-09-15 07:35:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (212, 'cart_base', '1600130403', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:40:03', '2020-09-15 07:40:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (213, 'cart_base', '1600130703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:45:03', '2020-09-15 07:45:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (214, 'cart_base', '1600131003', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:50:03', '2020-09-15 07:50:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (215, 'cart_base', '1600131303', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 07:55:03', '2020-09-15 07:55:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (216, 'cart_base', '1600131604', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:00:04', '2020-09-15 08:00:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (217, 'cart_base', '1600131903', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:05:03', '2020-09-15 08:05:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (218, 'cart_base', '1600132205', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:10:05', '2020-09-15 08:10:05', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (219, 'cart_base', '1600132502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:15:02', '2020-09-15 08:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (220, 'cart_base', '1600132803', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:20:03', '2020-09-15 08:20:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (221, 'cart_base', '1600133703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:35:03', '2020-09-15 08:35:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (222, 'cart_base', '1600134003', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:40:03', '2020-09-15 08:40:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (223, 'cart_base', '1600134303', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:45:03', '2020-09-15 08:45:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (224, 'cart_base', '1600134603', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:50:03', '2020-09-15 08:50:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (225, 'cart_base', '1600134903', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 08:55:03', '2020-09-15 08:55:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (226, 'cart_base', '1600135203', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:00:03', '2020-09-15 09:00:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (227, 'cart_base', '1600135502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:05:02', '2020-09-15 09:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (228, 'cart_base', '1600135804', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:10:04', '2020-09-15 09:10:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (229, 'cart_base', '1600136103', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:15:03', '2020-09-15 09:15:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (230, 'cart_base', '1600136403', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:20:03', '2020-09-15 09:20:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (231, 'cart_base', '1600136703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:25:03', '2020-09-15 09:25:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (232, 'cart_base', '1600137005', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:30:05', '2020-09-15 09:30:05', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (233, 'cart_base', '1600137304', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:35:04', '2020-09-15 09:35:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (234, 'cart_base', '1600137604', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:40:04', '2020-09-15 09:40:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (235, 'cart_base', '1600137904', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:45:04', '2020-09-15 09:45:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (236, 'cart_base', '1600138203', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:50:03', '2020-09-15 09:50:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (237, 'cart_base', '1600138503', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 09:55:03', '2020-09-15 09:55:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (238, 'cart_base', '1600138803', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:00:03', '2020-09-15 10:00:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (239, 'cart_base', '1600139103', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:05:03', '2020-09-15 10:05:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (240, 'cart_base', '1600139402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:10:02', '2020-09-15 10:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (241, 'cart_base', '1600139703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:15:03', '2020-09-15 10:15:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (242, 'cart_base', '1600140002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:20:02', '2020-09-15 10:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (243, 'cart_base', '1600140302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:25:02', '2020-09-15 10:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (244, 'cart_base', '1600140602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:30:02', '2020-09-15 10:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (245, 'cart_base', '1600140901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:35:01', '2020-09-15 10:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (246, 'cart_base', '1600141201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:40:01', '2020-09-15 10:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (247, 'cart_base', '1600141502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:45:02', '2020-09-15 10:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (248, 'cart_base', '1600141802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:50:02', '2020-09-15 10:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (249, 'cart_base', '1600142101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 10:55:01', '2020-09-15 10:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (250, 'cart_base', '1600142403', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:00:03', '2020-09-15 11:00:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (251, 'cart_base', '1600142702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:05:02', '2020-09-15 11:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (252, 'cart_base', '1600143002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:10:02', '2020-09-15 11:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (253, 'cart_base', '1600143302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:15:02', '2020-09-15 11:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (254, 'cart_base', '1600143602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:20:02', '2020-09-15 11:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (255, 'cart_base', '1600143901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:25:01', '2020-09-15 11:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (256, 'cart_base', '1600144201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:30:01', '2020-09-15 11:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (257, 'cart_base', '1600144501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:35:01', '2020-09-15 11:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (258, 'cart_base', '1600144801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:40:01', '2020-09-15 11:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (259, 'cart_base', '1600145102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:45:02', '2020-09-15 11:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (260, 'cart_base', '1600145402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:50:02', '2020-09-15 11:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (261, 'cart_base', '1600145702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 11:55:02', '2020-09-15 11:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (262, 'cart_base', '1600146001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:00:01', '2020-09-15 12:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (263, 'cart_base', '1600146302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:05:02', '2020-09-15 12:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (264, 'cart_base', '1600146602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:10:02', '2020-09-15 12:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (265, 'cart_base', '1600146901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:15:01', '2020-09-15 12:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (266, 'cart_base', '1600147201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:20:01', '2020-09-15 12:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (267, 'cart_base', '1600147502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:25:02', '2020-09-15 12:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (268, 'cart_base', '1600147801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:30:01', '2020-09-15 12:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (269, 'cart_base', '1600148101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:35:01', '2020-09-15 12:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (270, 'cart_base', '1600148402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:40:02', '2020-09-15 12:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (271, 'cart_base', '1600148702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:45:02', '2020-09-15 12:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (272, 'cart_base', '1600149001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:50:01', '2020-09-15 12:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (273, 'cart_base', '1600149302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 12:55:02', '2020-09-15 12:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (274, 'cart_base', '1600149601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:00:01', '2020-09-15 13:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (275, 'cart_base', '1600149901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:05:01', '2020-09-15 13:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (276, 'cart_base', '1600150201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:10:01', '2020-09-15 13:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (277, 'cart_base', '1600150501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:15:01', '2020-09-15 13:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (278, 'cart_base', '1600150801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:20:01', '2020-09-15 13:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (279, 'cart_base', '1600151102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:25:02', '2020-09-15 13:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (280, 'cart_base', '1600151402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:30:02', '2020-09-15 13:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (281, 'cart_base', '1600151701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:35:01', '2020-09-15 13:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (282, 'cart_base', '1600152001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:40:01', '2020-09-15 13:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (283, 'cart_base', '1600152302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:45:02', '2020-09-15 13:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (284, 'cart_base', '1600152601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:50:01', '2020-09-15 13:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (285, 'cart_base', '1600152902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 13:55:02', '2020-09-15 13:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (286, 'cart_base', '1600153202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:00:02', '2020-09-15 14:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (287, 'cart_base', '1600153502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:05:02', '2020-09-15 14:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (288, 'cart_base', '1600153802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:10:02', '2020-09-15 14:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (289, 'cart_base', '1600154102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:15:02', '2020-09-15 14:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (290, 'cart_base', '1600154401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:20:01', '2020-09-15 14:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (291, 'cart_base', '1600154702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:25:02', '2020-09-15 14:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (292, 'cart_base', '1600155002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:30:02', '2020-09-15 14:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (293, 'cart_base', '1600155302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:35:02', '2020-09-15 14:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (294, 'cart_base', '1600155601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:40:01', '2020-09-15 14:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (295, 'cart_base', '1600155901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:45:01', '2020-09-15 14:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (296, 'cart_base', '1600156201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:50:01', '2020-09-15 14:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (297, 'cart_base', '1600156502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 14:55:02', '2020-09-15 14:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (298, 'cart_base', '1600156801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:00:01', '2020-09-15 15:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (299, 'cart_base', '1600157101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:05:01', '2020-09-15 15:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (300, 'cart_base', '1600157401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:10:01', '2020-09-15 15:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (301, 'cart_base', '1600157701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:15:01', '2020-09-15 15:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (302, 'cart_base', '1600158002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:20:02', '2020-09-15 15:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (303, 'cart_base', '1600158301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:25:01', '2020-09-15 15:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (304, 'cart_base', '1600158602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:30:02', '2020-09-15 15:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (305, 'cart_base', '1600158902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:35:02', '2020-09-15 15:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (306, 'cart_base', '1600159202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:40:02', '2020-09-15 15:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (307, 'cart_base', '1600159502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:45:02', '2020-09-15 15:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (308, 'cart_base', '1600159802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:50:02', '2020-09-15 15:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (309, 'cart_base', '1600160102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 15:55:02', '2020-09-15 15:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (310, 'cart_base', '1600160402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:00:02', '2020-09-15 16:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (311, 'cart_base', '1600160701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:05:01', '2020-09-15 16:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (312, 'cart_base', '1600161001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:10:01', '2020-09-15 16:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (313, 'cart_base', '1600161301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:15:01', '2020-09-15 16:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (314, 'cart_base', '1600161602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:20:02', '2020-09-15 16:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (315, 'cart_base', '1600161901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:25:01', '2020-09-15 16:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (316, 'cart_base', '1600162202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:30:02', '2020-09-15 16:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (317, 'cart_base', '1600162502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:35:02', '2020-09-15 16:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (318, 'cart_base', '1600162802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:40:02', '2020-09-15 16:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (319, 'cart_base', '1600163101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:45:01', '2020-09-15 16:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (320, 'cart_base', '1600163401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:50:01', '2020-09-15 16:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (321, 'cart_base', '1600163701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 16:55:01', '2020-09-15 16:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (322, 'cart_base', '1600164002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:00:02', '2020-09-15 17:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (323, 'cart_base', '1600164301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:05:01', '2020-09-15 17:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (324, 'cart_base', '1600164601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:10:01', '2020-09-15 17:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (325, 'cart_base', '1600164901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:15:01', '2020-09-15 17:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (326, 'cart_base', '1600165202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:20:02', '2020-09-15 17:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (327, 'cart_base', '1600165502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:25:02', '2020-09-15 17:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (328, 'cart_base', '1600165801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:30:01', '2020-09-15 17:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (329, 'cart_base', '1600166101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:35:01', '2020-09-15 17:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (330, 'cart_base', '1600166402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:40:02', '2020-09-15 17:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (331, 'cart_base', '1600166702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:45:02', '2020-09-15 17:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (332, 'cart_base', '1600167002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:50:02', '2020-09-15 17:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (333, 'cart_base', '1600167301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 17:55:01', '2020-09-15 17:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (334, 'cart_base', '1600167602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:00:02', '2020-09-15 18:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (335, 'cart_base', '1600167902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:05:02', '2020-09-15 18:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (336, 'cart_base', '1600168201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:10:01', '2020-09-15 18:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (337, 'cart_base', '1600168502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:15:02', '2020-09-15 18:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (338, 'cart_base', '1600168801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:20:01', '2020-09-15 18:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (339, 'cart_base', '1600169102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:25:02', '2020-09-15 18:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (340, 'cart_base', '1600169402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:30:02', '2020-09-15 18:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (341, 'cart_base', '1600169702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:35:02', '2020-09-15 18:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (342, 'cart_base', '1600170002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:40:02', '2020-09-15 18:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (343, 'cart_base', '1600170302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:45:02', '2020-09-15 18:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (344, 'cart_base', '1600170601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:50:01', '2020-09-15 18:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (345, 'cart_base', '1600170901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 18:55:01', '2020-09-15 18:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (346, 'cart_base', '1600171202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:00:02', '2020-09-15 19:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (347, 'cart_base', '1600171502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:05:02', '2020-09-15 19:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (348, 'cart_base', '1600171801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:10:01', '2020-09-15 19:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (349, 'cart_base', '1600172101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:15:01', '2020-09-15 19:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (350, 'cart_base', '1600172402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:20:02', '2020-09-15 19:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (351, 'cart_base', '1600172702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:25:02', '2020-09-15 19:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (352, 'cart_base', '1600173002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:30:02', '2020-09-15 19:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (353, 'cart_base', '1600173302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:35:02', '2020-09-15 19:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (354, 'cart_base', '1600173602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:40:02', '2020-09-15 19:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (355, 'cart_base', '1600173901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:45:01', '2020-09-15 19:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (356, 'cart_base', '1600174202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:50:02', '2020-09-15 19:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (357, 'cart_base', '1600174502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 19:55:02', '2020-09-15 19:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (358, 'cart_base', '1600174802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:00:02', '2020-09-15 20:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (359, 'cart_base', '1600175101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:05:01', '2020-09-15 20:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (360, 'cart_base', '1600175402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:10:02', '2020-09-15 20:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (361, 'cart_base', '1600175702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:15:02', '2020-09-15 20:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (362, 'cart_base', '1600176002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:20:02', '2020-09-15 20:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (363, 'cart_base', '1600176302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:25:02', '2020-09-15 20:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (364, 'cart_base', '1600176602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:30:02', '2020-09-15 20:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (365, 'cart_base', '1600176902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:35:02', '2020-09-15 20:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (366, 'cart_base', '1600177202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:40:02', '2020-09-15 20:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (367, 'cart_base', '1600177501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:45:01', '2020-09-15 20:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (368, 'cart_base', '1600177802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:50:02', '2020-09-15 20:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (369, 'cart_base', '1600178102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 20:55:02', '2020-09-15 20:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (370, 'cart_base', '1600178402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:00:02', '2020-09-15 21:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (371, 'cart_base', '1600178702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:05:02', '2020-09-15 21:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (372, 'cart_base', '1600179001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:10:01', '2020-09-15 21:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (373, 'cart_base', '1600179301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:15:01', '2020-09-15 21:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (374, 'cart_base', '1600179602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:20:02', '2020-09-15 21:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (375, 'cart_base', '1600179901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:25:01', '2020-09-15 21:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (376, 'cart_base', '1600180202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:30:02', '2020-09-15 21:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (377, 'cart_base', '1600180502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:35:02', '2020-09-15 21:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (378, 'cart_base', '1600180802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:40:02', '2020-09-15 21:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (379, 'cart_base', '1600181101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:45:01', '2020-09-15 21:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (380, 'cart_base', '1600181402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:50:02', '2020-09-15 21:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (381, 'cart_base', '1600181701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 21:55:01', '2020-09-15 21:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (382, 'cart_base', '1600182002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:00:02', '2020-09-15 22:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (383, 'cart_base', '1600182301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:05:01', '2020-09-15 22:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (384, 'cart_base', '1600182601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:10:01', '2020-09-15 22:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (385, 'cart_base', '1600182902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:15:02', '2020-09-15 22:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (386, 'cart_base', '1600183202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:20:02', '2020-09-15 22:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (387, 'cart_base', '1600183501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:25:01', '2020-09-15 22:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (388, 'cart_base', '1600183802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:30:02', '2020-09-15 22:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (389, 'cart_base', '1600184102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:35:02', '2020-09-15 22:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (390, 'cart_base', '1600184401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:40:01', '2020-09-15 22:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (391, 'cart_base', '1600184702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:45:02', '2020-09-15 22:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (392, 'cart_base', '1600185001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:50:01', '2020-09-15 22:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (393, 'cart_base', '1600185302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 22:55:02', '2020-09-15 22:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (394, 'cart_base', '1600185601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:00:01', '2020-09-15 23:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (395, 'cart_base', '1600185902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:05:02', '2020-09-15 23:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (396, 'cart_base', '1600186202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:10:02', '2020-09-15 23:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (397, 'cart_base', '1600186502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:15:02', '2020-09-15 23:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (398, 'cart_base', '1600186802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:20:02', '2020-09-15 23:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (399, 'cart_base', '1600187101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:25:01', '2020-09-15 23:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (400, 'cart_base', '1600187402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:30:02', '2020-09-15 23:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (401, 'cart_base', '1600187702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:35:02', '2020-09-15 23:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (402, 'cart_base', '1600188001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:40:01', '2020-09-15 23:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (403, 'cart_base', '1600188302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:45:02', '2020-09-15 23:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (404, 'cart_base', '1600188602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:50:02', '2020-09-15 23:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (405, 'cart_base', '1600188902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600102800, 1600102800, '2020-09-15 23:55:02', '2020-09-15 23:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (406, 'cart_base', '1600189202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:00:02', '2020-09-16 00:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (407, 'cart_base', '1600189501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:05:01', '2020-09-16 00:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (408, 'cart_base', '1600189801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:10:01', '2020-09-16 00:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (409, 'cart_base', '1600190101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:15:01', '2020-09-16 00:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (410, 'cart_base', '1600190401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:20:01', '2020-09-16 00:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (411, 'cart_base', '1600190701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:25:01', '2020-09-16 00:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (412, 'cart_base', '1600191001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:30:01', '2020-09-16 00:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (413, 'cart_base', '1600191302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:35:02', '2020-09-16 00:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (414, 'cart_base', '1600191602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:40:02', '2020-09-16 00:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (415, 'cart_base', '1600191902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:45:02', '2020-09-16 00:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (416, 'cart_base', '1600192201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:50:01', '2020-09-16 00:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (417, 'cart_base', '1600192501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 00:55:01', '2020-09-16 00:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (418, 'cart_base', '1600192801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:00:01', '2020-09-16 01:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (419, 'cart_base', '1600193101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:05:01', '2020-09-16 01:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (420, 'cart_base', '1600193401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:10:01', '2020-09-16 01:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (421, 'cart_base', '1600193702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:15:02', '2020-09-16 01:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (422, 'cart_base', '1600194001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:20:01', '2020-09-16 01:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (423, 'cart_base', '1600194301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:25:01', '2020-09-16 01:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (424, 'cart_base', '1600194602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:30:02', '2020-09-16 01:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (425, 'cart_base', '1600194901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:35:01', '2020-09-16 01:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (426, 'cart_base', '1600195201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:40:01', '2020-09-16 01:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (427, 'cart_base', '1600195501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:45:01', '2020-09-16 01:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (428, 'cart_base', '1600195802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:50:02', '2020-09-16 01:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (429, 'cart_base', '1600196101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 01:55:01', '2020-09-16 01:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (430, 'cart_base', '1600196402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:00:02', '2020-09-16 02:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (431, 'cart_base', '1600196702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:05:02', '2020-09-16 02:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (432, 'cart_base', '1600197001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:10:01', '2020-09-16 02:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (433, 'cart_base', '1600197302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:15:02', '2020-09-16 02:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (434, 'cart_base', '1600197601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:20:01', '2020-09-16 02:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (435, 'cart_base', '1600197902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:25:02', '2020-09-16 02:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (436, 'cart_base', '1600198201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:30:01', '2020-09-16 02:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (437, 'cart_base', '1600198502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:35:02', '2020-09-16 02:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (438, 'cart_base', '1600198802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:40:02', '2020-09-16 02:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (439, 'cart_base', '1600199102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:45:02', '2020-09-16 02:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (440, 'cart_base', '1600199402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:50:02', '2020-09-16 02:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (441, 'cart_base', '1600199701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 02:55:01', '2020-09-16 02:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (442, 'cart_base', '1600200001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:00:01', '2020-09-16 03:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (443, 'cart_base', '1600200301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:05:01', '2020-09-16 03:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (444, 'cart_base', '1600200601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:10:01', '2020-09-16 03:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (445, 'cart_base', '1600200902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:15:02', '2020-09-16 03:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (446, 'cart_base', '1600201202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:20:02', '2020-09-16 03:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (447, 'cart_base', '1600201502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:25:02', '2020-09-16 03:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (448, 'cart_base', '1600201801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:30:01', '2020-09-16 03:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (449, 'cart_base', '1600202101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:35:01', '2020-09-16 03:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (450, 'cart_base', '1600202402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:40:02', '2020-09-16 03:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (451, 'cart_base', '1600202702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:45:02', '2020-09-16 03:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (452, 'cart_base', '1600203001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:50:01', '2020-09-16 03:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (453, 'cart_base', '1600203301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 03:55:01', '2020-09-16 03:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (454, 'cart_base', '1600203601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:00:01', '2020-09-16 04:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (455, 'cart_base', '1600203902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:05:02', '2020-09-16 04:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (456, 'cart_base', '1600204202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:10:02', '2020-09-16 04:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (457, 'cart_base', '1600204501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:15:01', '2020-09-16 04:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (458, 'cart_base', '1600204802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:20:02', '2020-09-16 04:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (459, 'cart_base', '1600205101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:25:01', '2020-09-16 04:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (460, 'cart_base', '1600205401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:30:01', '2020-09-16 04:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (461, 'cart_base', '1600205701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:35:01', '2020-09-16 04:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (462, 'cart_base', '1600206001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:40:01', '2020-09-16 04:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (463, 'cart_base', '1600206302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:45:02', '2020-09-16 04:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (464, 'cart_base', '1600206602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:50:02', '2020-09-16 04:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (465, 'cart_base', '1600206902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 04:55:02', '2020-09-16 04:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (466, 'cart_base', '1600207201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:00:01', '2020-09-16 05:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (467, 'cart_base', '1600207502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:05:02', '2020-09-16 05:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (468, 'cart_base', '1600207801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:10:01', '2020-09-16 05:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (469, 'cart_base', '1600208102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:15:02', '2020-09-16 05:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (470, 'cart_base', '1600208401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:20:01', '2020-09-16 05:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (471, 'cart_base', '1600208702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:25:02', '2020-09-16 05:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (472, 'cart_base', '1600209002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:30:02', '2020-09-16 05:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (473, 'cart_base', '1600209301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:35:01', '2020-09-16 05:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (474, 'cart_base', '1600209601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:40:01', '2020-09-16 05:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (475, 'cart_base', '1600209902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:45:02', '2020-09-16 05:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (476, 'cart_base', '1600210202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:50:02', '2020-09-16 05:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (477, 'cart_base', '1600210502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 05:55:02', '2020-09-16 05:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (478, 'cart_base', '1600210801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:00:01', '2020-09-16 06:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (479, 'cart_base', '1600211101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:05:01', '2020-09-16 06:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (480, 'cart_base', '1600211402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:10:02', '2020-09-16 06:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (481, 'cart_base', '1600211702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:15:02', '2020-09-16 06:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (482, 'cart_base', '1600212001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:20:01', '2020-09-16 06:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (483, 'cart_base', '1600212301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:25:01', '2020-09-16 06:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (484, 'cart_base', '1600212602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:30:02', '2020-09-16 06:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (485, 'cart_base', '1600212901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:35:01', '2020-09-16 06:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (486, 'cart_base', '1600213201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:40:01', '2020-09-16 06:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (487, 'cart_base', '1600213502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:45:02', '2020-09-16 06:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (488, 'cart_base', '1600213802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:50:02', '2020-09-16 06:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (489, 'cart_base', '1600214102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 06:55:02', '2020-09-16 06:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (490, 'cart_base', '1600214402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:00:02', '2020-09-16 07:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (491, 'cart_base', '1600214702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:05:02', '2020-09-16 07:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (492, 'cart_base', '1600215002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:10:02', '2020-09-16 07:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (493, 'cart_base', '1600215302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:15:02', '2020-09-16 07:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (494, 'cart_base', '1600215601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:20:01', '2020-09-16 07:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (495, 'cart_base', '1600215902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:25:02', '2020-09-16 07:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (496, 'cart_base', '1600216202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:30:02', '2020-09-16 07:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (497, 'cart_base', '1600216504', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:35:04', '2020-09-16 07:35:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (498, 'cart_base', '1600216804', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:40:04', '2020-09-16 07:40:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (499, 'cart_base', '1600217103', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:45:03', '2020-09-16 07:45:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (500, 'cart_base', '1600217404', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:50:04', '2020-09-16 07:50:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (501, 'cart_base', '1600217703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 07:55:03', '2020-09-16 07:55:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (502, 'cart_base', '1600218004', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:00:04', '2020-09-16 08:00:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (503, 'cart_base', '1600218303', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:05:03', '2020-09-16 08:05:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (504, 'cart_base', '1600218606', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:10:06', '2020-09-16 08:10:06', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (505, 'cart_base', '1600218903', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:15:03', '2020-09-16 08:15:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (506, 'cart_base', '1600219203', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:20:03', '2020-09-16 08:20:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (507, 'cart_base', '1600219503', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:25:03', '2020-09-16 08:25:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (508, 'cart_base', '1600219804', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:30:04', '2020-09-16 08:30:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (509, 'cart_base', '1600220102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:35:02', '2020-09-16 08:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (510, 'cart_base', '1600220403', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:40:03', '2020-09-16 08:40:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (511, 'cart_base', '1600220703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:45:03', '2020-09-16 08:45:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (512, 'cart_base', '1600221002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:50:02', '2020-09-16 08:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (513, 'cart_base', '1600221303', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 08:55:03', '2020-09-16 08:55:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (514, 'cart_base', '1600221604', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:00:04', '2020-09-16 09:00:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (515, 'cart_base', '1600221902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:05:02', '2020-09-16 09:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (516, 'cart_base', '1600222503', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:15:03', '2020-09-16 09:15:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (517, 'cart_base', '1600222802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:20:02', '2020-09-16 09:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (518, 'cart_base', '1600223102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:25:02', '2020-09-16 09:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (519, 'cart_base', '1600223403', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:30:03', '2020-09-16 09:30:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (520, 'cart_base', '1600223704', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:35:04', '2020-09-16 09:35:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (521, 'cart_base', '1600224003', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:40:03', '2020-09-16 09:40:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (522, 'cart_base', '1600224303', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:45:03', '2020-09-16 09:45:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (523, 'cart_base', '1600224602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:50:02', '2020-09-16 09:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (524, 'cart_base', '1600224903', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 09:55:03', '2020-09-16 09:55:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (525, 'cart_base', '1600225203', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:00:03', '2020-09-16 10:00:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (526, 'cart_base', '1600225504', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:05:04', '2020-09-16 10:05:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (527, 'cart_base', '1600225804', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:10:04', '2020-09-16 10:10:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (528, 'cart_base', '1600226104', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:15:04', '2020-09-16 10:15:04', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (529, 'cart_base', '1600226402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:20:02', '2020-09-16 10:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (530, 'cart_base', '1600226703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:25:03', '2020-09-16 10:25:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (531, 'cart_base', '1600227002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:30:02', '2020-09-16 10:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (532, 'cart_base', '1600227302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:35:02', '2020-09-16 10:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (533, 'cart_base', '1600227602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:40:02', '2020-09-16 10:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (534, 'cart_base', '1600227902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:45:02', '2020-09-16 10:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (535, 'cart_base', '1600228202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:50:02', '2020-09-16 10:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (536, 'cart_base', '1600228502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 10:55:02', '2020-09-16 10:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (537, 'cart_base', '1600228802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:00:02', '2020-09-16 11:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (538, 'cart_base', '1600229102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:05:02', '2020-09-16 11:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (539, 'cart_base', '1600229402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:10:02', '2020-09-16 11:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (540, 'cart_base', '1600229702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:15:02', '2020-09-16 11:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (541, 'cart_base', '1600230002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:20:02', '2020-09-16 11:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (542, 'cart_base', '1600230302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:25:02', '2020-09-16 11:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (543, 'cart_base', '1600230602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:30:02', '2020-09-16 11:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (544, 'cart_base', '1600230902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:35:02', '2020-09-16 11:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (545, 'cart_base', '1600231202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:40:02', '2020-09-16 11:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (546, 'cart_base', '1600231501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:45:01', '2020-09-16 11:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (547, 'cart_base', '1600231802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:50:02', '2020-09-16 11:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (548, 'cart_base', '1600232102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 11:55:02', '2020-09-16 11:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (549, 'cart_base', '1600232402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:00:02', '2020-09-16 12:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (550, 'cart_base', '1600232701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:05:01', '2020-09-16 12:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (551, 'cart_base', '1600233002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:10:02', '2020-09-16 12:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (552, 'cart_base', '1600233302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:15:02', '2020-09-16 12:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (553, 'cart_base', '1600233601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:20:01', '2020-09-16 12:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (554, 'cart_base', '1600233902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:25:02', '2020-09-16 12:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (555, 'cart_base', '1600234202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:30:02', '2020-09-16 12:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (556, 'cart_base', '1600234501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:35:01', '2020-09-16 12:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (557, 'cart_base', '1600234802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:40:02', '2020-09-16 12:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (558, 'cart_base', '1600235102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:45:02', '2020-09-16 12:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (559, 'cart_base', '1600235402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:50:02', '2020-09-16 12:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (560, 'cart_base', '1600235701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 12:55:01', '2020-09-16 12:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (561, 'cart_base', '1600236002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:00:02', '2020-09-16 13:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (562, 'cart_base', '1600236302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:05:02', '2020-09-16 13:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (563, 'cart_base', '1600236602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:10:02', '2020-09-16 13:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (564, 'cart_base', '1600236902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:15:02', '2020-09-16 13:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (565, 'cart_base', '1600237201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:20:01', '2020-09-16 13:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (566, 'cart_base', '1600237502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:25:02', '2020-09-16 13:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (567, 'cart_base', '1600237802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:30:02', '2020-09-16 13:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (568, 'cart_base', '1600238102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:35:02', '2020-09-16 13:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (569, 'cart_base', '1600238401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:40:01', '2020-09-16 13:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (570, 'cart_base', '1600238702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:45:02', '2020-09-16 13:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (571, 'cart_base', '1600239002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:50:02', '2020-09-16 13:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (572, 'cart_base', '1600239301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 13:55:01', '2020-09-16 13:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (573, 'cart_base', '1600239602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:00:02', '2020-09-16 14:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (574, 'cart_base', '1600239902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:05:02', '2020-09-16 14:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (575, 'cart_base', '1600240201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:10:01', '2020-09-16 14:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (576, 'cart_base', '1600240502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:15:02', '2020-09-16 14:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (577, 'cart_base', '1600240801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:20:01', '2020-09-16 14:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (578, 'cart_base', '1600241102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:25:02', '2020-09-16 14:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (579, 'cart_base', '1600241402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:30:02', '2020-09-16 14:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (580, 'cart_base', '1600241702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:35:02', '2020-09-16 14:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (581, 'cart_base', '1600242002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:40:02', '2020-09-16 14:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (582, 'cart_base', '1600242301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:45:01', '2020-09-16 14:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (583, 'cart_base', '1600242601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:50:01', '2020-09-16 14:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (584, 'cart_base', '1600242901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 14:55:01', '2020-09-16 14:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (585, 'cart_base', '1600243202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:00:02', '2020-09-16 15:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (586, 'cart_base', '1600243501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:05:01', '2020-09-16 15:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (587, 'cart_base', '1600243801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:10:01', '2020-09-16 15:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (588, 'cart_base', '1600244101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:15:01', '2020-09-16 15:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (589, 'cart_base', '1600244402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:20:02', '2020-09-16 15:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (590, 'cart_base', '1600244702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:25:02', '2020-09-16 15:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (591, 'cart_base', '1600245001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:30:01', '2020-09-16 15:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (592, 'cart_base', '1600245302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:35:02', '2020-09-16 15:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (593, 'cart_base', '1600245602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:40:02', '2020-09-16 15:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (594, 'cart_base', '1600245901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:45:01', '2020-09-16 15:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (595, 'cart_base', '1600246201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:50:01', '2020-09-16 15:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (596, 'cart_base', '1600246502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 15:55:02', '2020-09-16 15:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (597, 'cart_base', '1600246801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:00:01', '2020-09-16 16:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (598, 'cart_base', '1600247102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:05:02', '2020-09-16 16:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (599, 'cart_base', '1600247401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:10:01', '2020-09-16 16:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (600, 'cart_base', '1600247701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:15:01', '2020-09-16 16:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (601, 'cart_base', '1600248002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:20:02', '2020-09-16 16:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (602, 'cart_base', '1600248301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:25:01', '2020-09-16 16:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (603, 'cart_base', '1600248601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:30:01', '2020-09-16 16:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (604, 'cart_base', '1600248902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:35:02', '2020-09-16 16:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (605, 'cart_base', '1600249202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:40:02', '2020-09-16 16:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (606, 'cart_base', '1600249502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:45:02', '2020-09-16 16:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (607, 'cart_base', '1600249801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:50:01', '2020-09-16 16:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (608, 'cart_base', '1600250102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 16:55:02', '2020-09-16 16:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (609, 'cart_base', '1600250401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:00:01', '2020-09-16 17:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (610, 'cart_base', '1600250702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:05:02', '2020-09-16 17:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (611, 'cart_base', '1600251002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:10:02', '2020-09-16 17:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (612, 'cart_base', '1600251302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:15:02', '2020-09-16 17:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (613, 'cart_base', '1600251602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:20:02', '2020-09-16 17:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (614, 'cart_base', '1600251901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:25:01', '2020-09-16 17:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (615, 'cart_base', '1600252201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:30:01', '2020-09-16 17:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (616, 'cart_base', '1600252502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:35:02', '2020-09-16 17:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (617, 'cart_base', '1600252802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:40:02', '2020-09-16 17:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (618, 'cart_base', '1600253101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:45:01', '2020-09-16 17:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (619, 'cart_base', '1600253402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:50:02', '2020-09-16 17:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (620, 'cart_base', '1600253701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 17:55:01', '2020-09-16 17:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (621, 'cart_base', '1600254002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:00:02', '2020-09-16 18:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (622, 'cart_base', '1600254301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:05:01', '2020-09-16 18:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (623, 'cart_base', '1600254602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:10:02', '2020-09-16 18:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (624, 'cart_base', '1600254902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:15:02', '2020-09-16 18:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (625, 'cart_base', '1600255201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:20:01', '2020-09-16 18:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (626, 'cart_base', '1600255501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:25:01', '2020-09-16 18:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (627, 'cart_base', '1600255802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:30:02', '2020-09-16 18:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (628, 'cart_base', '1600256102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:35:02', '2020-09-16 18:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (629, 'cart_base', '1600256402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:40:02', '2020-09-16 18:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (630, 'cart_base', '1600256702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:45:02', '2020-09-16 18:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (631, 'cart_base', '1600257002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:50:02', '2020-09-16 18:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (632, 'cart_base', '1600257301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 18:55:01', '2020-09-16 18:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (633, 'cart_base', '1600257602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:00:02', '2020-09-16 19:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (634, 'cart_base', '1600257902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:05:02', '2020-09-16 19:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (635, 'cart_base', '1600258202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:10:02', '2020-09-16 19:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (636, 'cart_base', '1600258502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:15:02', '2020-09-16 19:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (637, 'cart_base', '1600258802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:20:02', '2020-09-16 19:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (638, 'cart_base', '1600259101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:25:01', '2020-09-16 19:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (639, 'cart_base', '1600259401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:30:01', '2020-09-16 19:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (640, 'cart_base', '1600259701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:35:01', '2020-09-16 19:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (641, 'cart_base', '1600260002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:40:02', '2020-09-16 19:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (642, 'cart_base', '1600260301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:45:01', '2020-09-16 19:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (643, 'cart_base', '1600260601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:50:01', '2020-09-16 19:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (644, 'cart_base', '1600260901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 19:55:01', '2020-09-16 19:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (645, 'cart_base', '1600261202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:00:02', '2020-09-16 20:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (646, 'cart_base', '1600261501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:05:01', '2020-09-16 20:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (647, 'cart_base', '1600261801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:10:01', '2020-09-16 20:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (648, 'cart_base', '1600262101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:15:01', '2020-09-16 20:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (649, 'cart_base', '1600262402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:20:02', '2020-09-16 20:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (650, 'cart_base', '1600262701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:25:01', '2020-09-16 20:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (651, 'cart_base', '1600263002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:30:02', '2020-09-16 20:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (652, 'cart_base', '1600263302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:35:02', '2020-09-16 20:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (653, 'cart_base', '1600263601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:40:01', '2020-09-16 20:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (654, 'cart_base', '1600263901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:45:01', '2020-09-16 20:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (655, 'cart_base', '1600264202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:50:02', '2020-09-16 20:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (656, 'cart_base', '1600264502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 20:55:02', '2020-09-16 20:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (657, 'cart_base', '1600264801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:00:01', '2020-09-16 21:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (658, 'cart_base', '1600265102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:05:02', '2020-09-16 21:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (659, 'cart_base', '1600265402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:10:02', '2020-09-16 21:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (660, 'cart_base', '1600265702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:15:02', '2020-09-16 21:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (661, 'cart_base', '1600266001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:20:01', '2020-09-16 21:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (662, 'cart_base', '1600266302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:25:02', '2020-09-16 21:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (663, 'cart_base', '1600266602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:30:02', '2020-09-16 21:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (664, 'cart_base', '1600266901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:35:01', '2020-09-16 21:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (665, 'cart_base', '1600267202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:40:02', '2020-09-16 21:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (666, 'cart_base', '1600267502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:45:02', '2020-09-16 21:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (667, 'cart_base', '1600267802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:50:02', '2020-09-16 21:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (668, 'cart_base', '1600268102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 21:55:02', '2020-09-16 21:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (669, 'cart_base', '1600268402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:00:02', '2020-09-16 22:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (670, 'cart_base', '1600268701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:05:01', '2020-09-16 22:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (671, 'cart_base', '1600269001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:10:01', '2020-09-16 22:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (672, 'cart_base', '1600269301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:15:01', '2020-09-16 22:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (673, 'cart_base', '1600269601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:20:01', '2020-09-16 22:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (674, 'cart_base', '1600269902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:25:02', '2020-09-16 22:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (675, 'cart_base', '1600270201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:30:01', '2020-09-16 22:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (676, 'cart_base', '1600270501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:35:01', '2020-09-16 22:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (677, 'cart_base', '1600270801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:40:01', '2020-09-16 22:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (678, 'cart_base', '1600271101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:45:01', '2020-09-16 22:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (679, 'cart_base', '1600271402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:50:02', '2020-09-16 22:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (680, 'cart_base', '1600271702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 22:55:02', '2020-09-16 22:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (681, 'cart_base', '1600272002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:00:02', '2020-09-16 23:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (682, 'cart_base', '1600272301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:05:01', '2020-09-16 23:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (683, 'cart_base', '1600272602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:10:02', '2020-09-16 23:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (684, 'cart_base', '1600272902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:15:02', '2020-09-16 23:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (685, 'cart_base', '1600273202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:20:02', '2020-09-16 23:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (686, 'cart_base', '1600273501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:25:01', '2020-09-16 23:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (687, 'cart_base', '1600273801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:30:01', '2020-09-16 23:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (688, 'cart_base', '1600274101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:35:01', '2020-09-16 23:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (689, 'cart_base', '1600274401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:40:01', '2020-09-16 23:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (690, 'cart_base', '1600274702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:45:02', '2020-09-16 23:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (691, 'cart_base', '1600275002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:50:02', '2020-09-16 23:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (692, 'cart_base', '1600275301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600189200, 1600189200, '2020-09-16 23:55:01', '2020-09-16 23:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (693, 'cart_base', '1600621202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:00:02', '2020-09-21 00:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (694, 'cart_base', '1600621502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:05:02', '2020-09-21 00:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (695, 'cart_base', '1600621802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:10:02', '2020-09-21 00:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (696, 'cart_base', '1600622102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:15:02', '2020-09-21 00:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (697, 'cart_base', '1600622401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:20:01', '2020-09-21 00:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (698, 'cart_base', '1600622701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:25:01', '2020-09-21 00:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (699, 'cart_base', '1600623002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:30:02', '2020-09-21 00:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (700, 'cart_base', '1600623301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:35:01', '2020-09-21 00:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (701, 'cart_base', '1600623601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:40:01', '2020-09-21 00:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (702, 'cart_base', '1600623902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:45:02', '2020-09-21 00:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (703, 'cart_base', '1600624202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:50:02', '2020-09-21 00:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (704, 'cart_base', '1600624501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 00:55:01', '2020-09-21 00:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (705, 'cart_base', '1600624802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:00:02', '2020-09-21 01:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (706, 'cart_base', '1600625102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:05:02', '2020-09-21 01:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (707, 'cart_base', '1600625402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:10:02', '2020-09-21 01:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (708, 'cart_base', '1600625702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:15:02', '2020-09-21 01:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (709, 'cart_base', '1600626001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:20:01', '2020-09-21 01:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (710, 'cart_base', '1600626301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:25:01', '2020-09-21 01:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (711, 'cart_base', '1600626602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:30:02', '2020-09-21 01:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (712, 'cart_base', '1600626901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:35:01', '2020-09-21 01:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (713, 'cart_base', '1600627201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:40:01', '2020-09-21 01:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (714, 'cart_base', '1600627502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:45:02', '2020-09-21 01:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (715, 'cart_base', '1600627801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:50:01', '2020-09-21 01:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (716, 'cart_base', '1600628101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 01:55:01', '2020-09-21 01:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (717, 'cart_base', '1600628402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:00:02', '2020-09-21 02:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (718, 'cart_base', '1600628701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:05:01', '2020-09-21 02:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (719, 'cart_base', '1600629002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:10:02', '2020-09-21 02:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (720, 'cart_base', '1600629301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:15:01', '2020-09-21 02:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (721, 'cart_base', '1600629602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:20:02', '2020-09-21 02:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (722, 'cart_base', '1600629901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:25:01', '2020-09-21 02:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (723, 'cart_base', '1600630202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:30:02', '2020-09-21 02:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (724, 'cart_base', '1600630501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:35:01', '2020-09-21 02:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (725, 'cart_base', '1600630801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:40:01', '2020-09-21 02:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (726, 'cart_base', '1600631101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:45:01', '2020-09-21 02:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (727, 'cart_base', '1600631402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:50:02', '2020-09-21 02:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (728, 'cart_base', '1600631702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 02:55:02', '2020-09-21 02:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (729, 'cart_base', '1600632002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:00:02', '2020-09-21 03:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (730, 'cart_base', '1600632301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:05:01', '2020-09-21 03:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (731, 'cart_base', '1600632602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:10:02', '2020-09-21 03:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (732, 'cart_base', '1600632901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:15:01', '2020-09-21 03:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (733, 'cart_base', '1600633202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:20:02', '2020-09-21 03:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (734, 'cart_base', '1600633501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:25:01', '2020-09-21 03:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (735, 'cart_base', '1600633801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:30:01', '2020-09-21 03:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (736, 'cart_base', '1600634102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:35:02', '2020-09-21 03:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (737, 'cart_base', '1600634402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:40:02', '2020-09-21 03:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (738, 'cart_base', '1600634701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:45:01', '2020-09-21 03:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (739, 'cart_base', '1600635002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:50:02', '2020-09-21 03:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (740, 'cart_base', '1600635301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 03:55:01', '2020-09-21 03:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (741, 'cart_base', '1600635602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:00:02', '2020-09-21 04:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (742, 'cart_base', '1600635901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:05:01', '2020-09-21 04:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (743, 'cart_base', '1600636201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:10:01', '2020-09-21 04:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (744, 'cart_base', '1600636502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:15:02', '2020-09-21 04:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (745, 'cart_base', '1600636802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:20:02', '2020-09-21 04:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (746, 'cart_base', '1600637102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:25:02', '2020-09-21 04:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (747, 'cart_base', '1600637402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:30:02', '2020-09-21 04:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (748, 'cart_base', '1600637701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:35:01', '2020-09-21 04:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (749, 'cart_base', '1600638001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:40:01', '2020-09-21 04:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (750, 'cart_base', '1600638302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:45:02', '2020-09-21 04:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (751, 'cart_base', '1600638601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:50:01', '2020-09-21 04:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (752, 'cart_base', '1600638902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 04:55:02', '2020-09-21 04:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (753, 'cart_base', '1600639201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:00:01', '2020-09-21 05:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (754, 'cart_base', '1600639501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:05:01', '2020-09-21 05:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (755, 'cart_base', '1600639802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:10:02', '2020-09-21 05:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (756, 'cart_base', '1600640101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:15:01', '2020-09-21 05:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (757, 'cart_base', '1600640402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:20:02', '2020-09-21 05:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (758, 'cart_base', '1600640701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:25:01', '2020-09-21 05:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (759, 'cart_base', '1600641002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:30:02', '2020-09-21 05:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (760, 'cart_base', '1600641302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:35:02', '2020-09-21 05:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (761, 'cart_base', '1600641602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:40:02', '2020-09-21 05:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (762, 'cart_base', '1600641901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:45:01', '2020-09-21 05:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (763, 'cart_base', '1600642201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:50:01', '2020-09-21 05:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (764, 'cart_base', '1600642501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 05:55:01', '2020-09-21 05:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (765, 'cart_base', '1600642802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:00:02', '2020-09-21 06:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (766, 'cart_base', '1600643102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:05:02', '2020-09-21 06:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (767, 'cart_base', '1600643401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:10:01', '2020-09-21 06:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (768, 'cart_base', '1600643702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:15:02', '2020-09-21 06:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (769, 'cart_base', '1600644001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:20:01', '2020-09-21 06:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (770, 'cart_base', '1600644301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:25:01', '2020-09-21 06:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (771, 'cart_base', '1600644602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:30:02', '2020-09-21 06:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (772, 'cart_base', '1600644901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:35:01', '2020-09-21 06:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (773, 'cart_base', '1600645202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:40:02', '2020-09-21 06:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (774, 'cart_base', '1600645501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:45:01', '2020-09-21 06:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (775, 'cart_base', '1600645801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:50:01', '2020-09-21 06:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (776, 'cart_base', '1600646102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 06:55:02', '2020-09-21 06:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (777, 'cart_base', '1600646401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:00:01', '2020-09-21 07:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (778, 'cart_base', '1600646703', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:05:03', '2020-09-21 07:05:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (779, 'cart_base', '1600647002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:10:02', '2020-09-21 07:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (780, 'cart_base', '1600647302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:15:02', '2020-09-21 07:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (781, 'cart_base', '1600647602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:20:02', '2020-09-21 07:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (782, 'cart_base', '1600647901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:25:01', '2020-09-21 07:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (783, 'cart_base', '1600648201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:30:01', '2020-09-21 07:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (784, 'cart_base', '1600648502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:35:02', '2020-09-21 07:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (785, 'cart_base', '1600648802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:40:02', '2020-09-21 07:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (786, 'cart_base', '1600649101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:45:01', '2020-09-21 07:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (787, 'cart_base', '1600649401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:50:01', '2020-09-21 07:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (788, 'cart_base', '1600649702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 07:55:02', '2020-09-21 07:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (789, 'cart_base', '1600650002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:00:02', '2020-09-21 08:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (790, 'cart_base', '1600650302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:05:02', '2020-09-21 08:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (791, 'cart_base', '1600650603', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:10:03', '2020-09-21 08:10:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (792, 'cart_base', '1600650902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:15:02', '2020-09-21 08:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (793, 'cart_base', '1600651202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:20:02', '2020-09-21 08:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (794, 'cart_base', '1600651502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:25:02', '2020-09-21 08:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (795, 'cart_base', '1600651803', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:30:03', '2020-09-21 08:30:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (796, 'cart_base', '1600652102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:35:02', '2020-09-21 08:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (797, 'cart_base', '1600652402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:40:02', '2020-09-21 08:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (798, 'cart_base', '1600652702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:45:02', '2020-09-21 08:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (799, 'cart_base', '1600653002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:50:02', '2020-09-21 08:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (800, 'cart_base', '1600653302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 08:55:02', '2020-09-21 08:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (801, 'cart_base', '1600653602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:00:02', '2020-09-21 09:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (802, 'cart_base', '1600653903', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:05:03', '2020-09-21 09:05:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (803, 'cart_base', '1600654201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:10:01', '2020-09-21 09:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (804, 'cart_base', '1600654501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:15:01', '2020-09-21 09:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (805, 'cart_base', '1600654802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:20:02', '2020-09-21 09:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (806, 'cart_base', '1600655102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:25:02', '2020-09-21 09:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (807, 'cart_base', '1600655402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:30:02', '2020-09-21 09:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (808, 'cart_base', '1600655702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:35:02', '2020-09-21 09:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (809, 'cart_base', '1600656002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:40:02', '2020-09-21 09:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (810, 'cart_base', '1600656301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:45:01', '2020-09-21 09:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (811, 'cart_base', '1600656602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:50:02', '2020-09-21 09:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (812, 'cart_base', '1600656902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 09:55:02', '2020-09-21 09:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (813, 'cart_base', '1600657202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:00:02', '2020-09-21 10:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (814, 'cart_base', '1600657502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:05:02', '2020-09-21 10:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (815, 'cart_base', '1600657802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:10:02', '2020-09-21 10:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (816, 'cart_base', '1600658102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:15:02', '2020-09-21 10:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (817, 'cart_base', '1600658402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:20:02', '2020-09-21 10:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (818, 'cart_base', '1600658702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:25:02', '2020-09-21 10:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (819, 'cart_base', '1600659002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:30:02', '2020-09-21 10:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (820, 'cart_base', '1600659302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:35:02', '2020-09-21 10:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (821, 'cart_base', '1600659602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:40:02', '2020-09-21 10:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (822, 'cart_base', '1600659902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:45:02', '2020-09-21 10:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (823, 'cart_base', '1600660202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:50:02', '2020-09-21 10:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (824, 'cart_base', '1600660502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 10:55:02', '2020-09-21 10:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (825, 'cart_base', '1600660802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:00:02', '2020-09-21 11:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (826, 'cart_base', '1600661102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:05:02', '2020-09-21 11:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (827, 'cart_base', '1600661403', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:10:03', '2020-09-21 11:10:03', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (828, 'cart_base', '1600661702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:15:02', '2020-09-21 11:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (829, 'cart_base', '1600662002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:20:02', '2020-09-21 11:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (830, 'cart_base', '1600662302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:25:02', '2020-09-21 11:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (831, 'cart_base', '1600662602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:30:02', '2020-09-21 11:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (832, 'cart_base', '1600662902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:35:02', '2020-09-21 11:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (833, 'cart_base', '1600663201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:40:01', '2020-09-21 11:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (834, 'cart_base', '1600663501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:45:01', '2020-09-21 11:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (835, 'cart_base', '1600663802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:50:02', '2020-09-21 11:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (836, 'cart_base', '1600664102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 11:55:02', '2020-09-21 11:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (837, 'cart_base', '1600664401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:00:01', '2020-09-21 12:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (838, 'cart_base', '1600664702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:05:02', '2020-09-21 12:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (839, 'cart_base', '1600665002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:10:02', '2020-09-21 12:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (840, 'cart_base', '1600665302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:15:02', '2020-09-21 12:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (841, 'cart_base', '1600665602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:20:02', '2020-09-21 12:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (842, 'cart_base', '1600665902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:25:02', '2020-09-21 12:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (843, 'cart_base', '1600666202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:30:02', '2020-09-21 12:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (844, 'cart_base', '1600666501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:35:01', '2020-09-21 12:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (845, 'cart_base', '1600666801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:40:01', '2020-09-21 12:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (846, 'cart_base', '1600667101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:45:01', '2020-09-21 12:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (847, 'cart_base', '1600667402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:50:02', '2020-09-21 12:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (848, 'cart_base', '1600667701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 12:55:01', '2020-09-21 12:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (849, 'cart_base', '1600668002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:00:02', '2020-09-21 13:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (850, 'cart_base', '1600668301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:05:01', '2020-09-21 13:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (851, 'cart_base', '1600668602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:10:02', '2020-09-21 13:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (852, 'cart_base', '1600668902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:15:02', '2020-09-21 13:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (853, 'cart_base', '1600669202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:20:02', '2020-09-21 13:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (854, 'cart_base', '1600669501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:25:01', '2020-09-21 13:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (855, 'cart_base', '1600669801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:30:01', '2020-09-21 13:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (856, 'cart_base', '1600670102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:35:02', '2020-09-21 13:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (857, 'cart_base', '1600670401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:40:01', '2020-09-21 13:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (858, 'cart_base', '1600670702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:45:02', '2020-09-21 13:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (859, 'cart_base', '1600671002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:50:02', '2020-09-21 13:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (860, 'cart_base', '1600671301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 13:55:01', '2020-09-21 13:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (861, 'cart_base', '1600671602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:00:02', '2020-09-21 14:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (862, 'cart_base', '1600671902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:05:02', '2020-09-21 14:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (863, 'cart_base', '1600672202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:10:02', '2020-09-21 14:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (864, 'cart_base', '1600672502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:15:02', '2020-09-21 14:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (865, 'cart_base', '1600672801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:20:01', '2020-09-21 14:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (866, 'cart_base', '1600673102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:25:02', '2020-09-21 14:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (867, 'cart_base', '1600673402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:30:02', '2020-09-21 14:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (868, 'cart_base', '1600673702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:35:02', '2020-09-21 14:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (869, 'cart_base', '1600674002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:40:02', '2020-09-21 14:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (870, 'cart_base', '1600674301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:45:01', '2020-09-21 14:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (871, 'cart_base', '1600674602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:50:02', '2020-09-21 14:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (872, 'cart_base', '1600674901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 14:55:01', '2020-09-21 14:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (873, 'cart_base', '1600675202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:00:02', '2020-09-21 15:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (874, 'cart_base', '1600675501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:05:01', '2020-09-21 15:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (875, 'cart_base', '1600675802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:10:02', '2020-09-21 15:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (876, 'cart_base', '1600676101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:15:01', '2020-09-21 15:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (877, 'cart_base', '1600676402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:20:02', '2020-09-21 15:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (878, 'cart_base', '1600676701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:25:01', '2020-09-21 15:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (879, 'cart_base', '1600677001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:30:01', '2020-09-21 15:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (880, 'cart_base', '1600677301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:35:01', '2020-09-21 15:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (881, 'cart_base', '1600677601', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:40:01', '2020-09-21 15:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (882, 'cart_base', '1600677902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:45:02', '2020-09-21 15:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (883, 'cart_base', '1600678201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:50:01', '2020-09-21 15:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (884, 'cart_base', '1600678501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 15:55:01', '2020-09-21 15:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (885, 'cart_base', '1600678802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:00:02', '2020-09-21 16:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (886, 'cart_base', '1600679101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:05:01', '2020-09-21 16:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (887, 'cart_base', '1600679401', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:10:01', '2020-09-21 16:10:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (888, 'cart_base', '1600679702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:15:02', '2020-09-21 16:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (889, 'cart_base', '1600680002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:20:02', '2020-09-21 16:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (890, 'cart_base', '1600680302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:25:02', '2020-09-21 16:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (891, 'cart_base', '1600680602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:30:02', '2020-09-21 16:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (892, 'cart_base', '1600680902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:35:02', '2020-09-21 16:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (893, 'cart_base', '1600681202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:40:02', '2020-09-21 16:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (894, 'cart_base', '1600681501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:45:01', '2020-09-21 16:45:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (895, 'cart_base', '1600681801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:50:01', '2020-09-21 16:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (896, 'cart_base', '1600682101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 16:55:01', '2020-09-21 16:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (897, 'cart_base', '1600682402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:00:02', '2020-09-21 17:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (898, 'cart_base', '1600682702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:05:02', '2020-09-21 17:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (899, 'cart_base', '1600683002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:10:02', '2020-09-21 17:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (900, 'cart_base', '1600683302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:15:02', '2020-09-21 17:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (901, 'cart_base', '1600683602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:20:02', '2020-09-21 17:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (902, 'cart_base', '1600683901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:25:01', '2020-09-21 17:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (903, 'cart_base', '1600684202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:30:02', '2020-09-21 17:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (904, 'cart_base', '1600684502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:35:02', '2020-09-21 17:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (905, 'cart_base', '1600684802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:40:02', '2020-09-21 17:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (906, 'cart_base', '1600685102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:45:02', '2020-09-21 17:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (907, 'cart_base', '1600685402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:50:02', '2020-09-21 17:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (908, 'cart_base', '1600685702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 17:55:02', '2020-09-21 17:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (909, 'cart_base', '1600686002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:00:02', '2020-09-21 18:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (910, 'cart_base', '1600686301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:05:01', '2020-09-21 18:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (911, 'cart_base', '1600686602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:10:02', '2020-09-21 18:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (912, 'cart_base', '1600686902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:15:02', '2020-09-21 18:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (913, 'cart_base', '1600687202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:20:02', '2020-09-21 18:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (914, 'cart_base', '1600687502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:25:02', '2020-09-21 18:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (915, 'cart_base', '1600687801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:30:01', '2020-09-21 18:30:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (916, 'cart_base', '1600688101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:35:01', '2020-09-21 18:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (917, 'cart_base', '1600688402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:40:02', '2020-09-21 18:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (918, 'cart_base', '1600688702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:45:02', '2020-09-21 18:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (919, 'cart_base', '1600689001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:50:01', '2020-09-21 18:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (920, 'cart_base', '1600689302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 18:55:02', '2020-09-21 18:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (921, 'cart_base', '1600689602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:00:02', '2020-09-21 19:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (922, 'cart_base', '1600689902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:05:02', '2020-09-21 19:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (923, 'cart_base', '1600690202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:10:02', '2020-09-21 19:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (924, 'cart_base', '1600690502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:15:02', '2020-09-21 19:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (925, 'cart_base', '1600690801', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:20:01', '2020-09-21 19:20:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (926, 'cart_base', '1600691102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:25:02', '2020-09-21 19:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (927, 'cart_base', '1600691402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:30:02', '2020-09-21 19:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (928, 'cart_base', '1600691702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:35:02', '2020-09-21 19:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (929, 'cart_base', '1600692002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:40:02', '2020-09-21 19:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (930, 'cart_base', '1600692302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:45:02', '2020-09-21 19:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (931, 'cart_base', '1600692602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:50:02', '2020-09-21 19:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (932, 'cart_base', '1600692902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 19:55:02', '2020-09-21 19:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (933, 'cart_base', '1600693202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:00:02', '2020-09-21 20:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (934, 'cart_base', '1600693502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:05:02', '2020-09-21 20:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (935, 'cart_base', '1600693802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:10:02', '2020-09-21 20:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (936, 'cart_base', '1600694102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:15:02', '2020-09-21 20:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (937, 'cart_base', '1600694402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:20:02', '2020-09-21 20:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (938, 'cart_base', '1600694702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:25:02', '2020-09-21 20:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (939, 'cart_base', '1600695002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:30:02', '2020-09-21 20:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (940, 'cart_base', '1600695302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:35:02', '2020-09-21 20:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (941, 'cart_base', '1600695602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:40:02', '2020-09-21 20:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (942, 'cart_base', '1600695902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:45:02', '2020-09-21 20:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (943, 'cart_base', '1600696202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:50:02', '2020-09-21 20:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (944, 'cart_base', '1600696502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 20:55:02', '2020-09-21 20:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (945, 'cart_base', '1600696802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:00:02', '2020-09-21 21:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (946, 'cart_base', '1600697102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:05:02', '2020-09-21 21:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (947, 'cart_base', '1600697402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:10:02', '2020-09-21 21:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (948, 'cart_base', '1600697701', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:15:01', '2020-09-21 21:15:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (949, 'cart_base', '1600698002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:20:02', '2020-09-21 21:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (950, 'cart_base', '1600698302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:25:02', '2020-09-21 21:25:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (951, 'cart_base', '1600698602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:30:02', '2020-09-21 21:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (952, 'cart_base', '1600698901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:35:01', '2020-09-21 21:35:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (953, 'cart_base', '1600699201', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:40:01', '2020-09-21 21:40:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (954, 'cart_base', '1600699502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:45:02', '2020-09-21 21:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (955, 'cart_base', '1600699802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:50:02', '2020-09-21 21:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (956, 'cart_base', '1600700101', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 21:55:01', '2020-09-21 21:55:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (957, 'cart_base', '1600700402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:00:02', '2020-09-21 22:00:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (958, 'cart_base', '1600700702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:05:02', '2020-09-21 22:05:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (959, 'cart_base', '1600701002', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:10:02', '2020-09-21 22:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (960, 'cart_base', '1600701302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:15:02', '2020-09-21 22:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (961, 'cart_base', '1600701602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:20:02', '2020-09-21 22:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (962, 'cart_base', '1600701901', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:25:01', '2020-09-21 22:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (963, 'cart_base', '1600702202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:30:02', '2020-09-21 22:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (964, 'cart_base', '1600702502', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:35:02', '2020-09-21 22:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (965, 'cart_base', '1600702802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:40:02', '2020-09-21 22:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (966, 'cart_base', '1600703102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:45:02', '2020-09-21 22:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (967, 'cart_base', '1600703402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:50:02', '2020-09-21 22:50:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (968, 'cart_base', '1600703702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 22:55:02', '2020-09-21 22:55:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (969, 'cart_base', '1600704001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:00:01', '2020-09-21 23:00:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (970, 'cart_base', '1600704301', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:05:01', '2020-09-21 23:05:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (971, 'cart_base', '1600704602', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:10:02', '2020-09-21 23:10:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (972, 'cart_base', '1600704902', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:15:02', '2020-09-21 23:15:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (973, 'cart_base', '1600705202', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:20:02', '2020-09-21 23:20:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (974, 'cart_base', '1600705501', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:25:01', '2020-09-21 23:25:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (975, 'cart_base', '1600705802', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:30:02', '2020-09-21 23:30:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (976, 'cart_base', '1600706102', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:35:02', '2020-09-21 23:35:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (977, 'cart_base', '1600706402', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:40:02', '2020-09-21 23:40:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (978, 'cart_base', '1600706702', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:45:02', '2020-09-21 23:45:02', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (979, 'cart_base', '1600707001', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:50:01', '2020-09-21 23:50:01', NULL, 'user_ultah', '', NULL, NULL);
INSERT INTO `coupons` VALUES (980, 'cart_base', '1600707302', '{\"min_buy\":200000,\"max_discount\":100000}', 50.00, 'percent', 1600621200, 1600621200, '2020-09-21 23:55:02', '2020-09-21 23:55:02', NULL, 'user_ultah', '', NULL, NULL);

-- ----------------------------
-- Table structure for currencies
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exchange_rate` double(10, 5) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES (1, 'U.S. Dollar', '$', 1.00000, 1, 'USD', '2018-10-09 18:35:08', '2018-10-17 12:50:52');
INSERT INTO `currencies` VALUES (2, 'Australian Dollar', '$', 1.28000, 1, 'AUD', '2018-10-09 18:35:08', '2019-02-04 12:51:55');
INSERT INTO `currencies` VALUES (5, 'Brazilian Real', 'R$', 3.25000, 1, 'BRL', '2018-10-09 18:35:08', '2018-10-17 12:51:00');
INSERT INTO `currencies` VALUES (6, 'Canadian Dollar', '$', 1.27000, 1, 'CAD', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (7, 'Czech Koruna', 'Kč', 20.65000, 1, 'CZK', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (8, 'Danish Krone', 'kr', 6.05000, 1, 'DKK', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (9, 'Euro', '€', 0.85000, 1, 'EUR', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (10, 'Hong Kong Dollar', '$', 7.83000, 1, 'HKD', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (11, 'Hungarian Forint', 'Ft', 255.24000, 1, 'HUF', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (12, 'Israeli New Sheqel', '₪', 3.48000, 1, 'ILS', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (13, 'Japanese Yen', '¥', 107.12000, 1, 'JPY', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (14, 'Malaysian Ringgit', 'RM', 3.91000, 1, 'MYR', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (15, 'Mexican Peso', '$', 18.72000, 1, 'MXN', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (16, 'Norwegian Krone', 'kr', 7.83000, 1, 'NOK', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (17, 'New Zealand Dollar', '$', 1.38000, 1, 'NZD', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (18, 'Philippine Peso', '₱', 52.26000, 1, 'PHP', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (19, 'Polish Zloty', 'zł', 3.39000, 1, 'PLN', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (20, 'Pound Sterling', '£', 0.72000, 1, 'GBP', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (21, 'Russian Ruble', 'руб', 55.93000, 1, 'RUB', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (22, 'Singapore Dollar', '$', 1.32000, 1, 'SGD', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (23, 'Swedish Krona', 'kr', 8.19000, 1, 'SEK', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (24, 'Swiss Franc', 'CHF', 0.94000, 1, 'CHF', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (26, 'Thai Baht', '฿', 31.39000, 1, 'THB', '2018-10-09 18:35:08', '2018-10-09 18:35:08');
INSERT INTO `currencies` VALUES (27, 'Taka', '৳', 84.00000, 1, 'BDT', '2018-10-09 18:35:08', '2018-12-02 12:16:13');
INSERT INTO `currencies` VALUES (28, 'Indian Rupee', 'Rs', 68.45000, 1, 'Rupee', '2019-07-07 17:33:46', '2019-07-07 17:33:46');
INSERT INTO `currencies` VALUES (29, 'Indonesia', 'Rp', 14.45000, 1, 'Rp', '2020-07-02 11:56:41', '2020-07-02 11:57:32');

-- ----------------------------
-- Table structure for customer_addres
-- ----------------------------
DROP TABLE IF EXISTS `customer_addres`;
CREATE TABLE `customer_addres`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_belakang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_lengkap` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `results_raw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer_addres
-- ----------------------------
INSERT INTO `customer_addres` VALUES (1, 'joko', 'styawan', '82230227809', 'DKI Jakart', 'DKI Jakarta', '153', 'Jakarta Selatan', '2104', 'Jagakarsa', '6134090', 'jawa barat', 16, '', '2020-08-06 14:58:00', '2020-08-06 14:58:00', 0, '-7.431070810261371', '112.75166098409099');
INSERT INTO `customer_addres` VALUES (2, 'Dita', 'Ken', '83831450890', 'Jawa Timur', 'Jawa Timur', '444', 'Surabaya', '6145', 'Mulyorejo', '60114', 'jalan mulyorejo utara no 177', 19, '', '2020-08-24 20:03:21', '2020-08-24 20:03:21', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (3, 'Dita', 'Prabasari', '087865678898', '6', 'DKI Jakarta', '153', 'Jakarta Selatan', '2103', 'Cilandak', '60110', 'upn veteran jakarta', 19, '', '2020-08-06 15:06:22', '2020-08-06 15:06:22', 0, '-6.3156988', '106.7945761');
INSERT INTO `customer_addres` VALUES (4, 'Alfian', 'Ma\'ruf', '85815705272', '11', 'Jawa Timur', '444', 'Surabaya', '6159', 'Wiyung', '60228', 'Wiyung 2/68EE', 29, '', '2020-08-19 09:22:22', '2020-08-19 09:22:22', 0, '-7.312265299999999', '112.6943559');
INSERT INTO `customer_addres` VALUES (5, 'dita', 'ken', '087878787878', '11', 'Jawa Timur', '444', 'Surabaya', '6145', 'Mulyorejo', '600111', 'jalan mulyorejo utara 177', 13, '', '2020-08-20 23:30:54', '2020-08-20 23:30:54', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (6, 'vita', 'ageng', '878787878', '1', 'Bali', '94', 'Buleleng', '259', 'Kuta', '62001', 'jalan manukan 112', 19, '', '2020-08-24 20:02:56', '2020-08-24 20:02:56', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (7, 'luna', 'maya', '87831450890', '11', 'Jawa Timur', '444', 'Surabaya', '6145', 'Mulyorejo', '60115', 'jalan mulyorejo 123', 34, '', '2020-08-29 15:20:57', '2020-08-29 15:20:57', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (8, 'joko', 'styawan', '87947938434', '11', 'Jawa Timur', '305', 'Nganjuk', '4335', 'Pace', '6134090', 'dfdfd', 37, '', '2020-08-29 16:03:16', '2020-08-29 16:03:16', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (9, 'Joko', 'Revo', '878787878', '11', 'Jawa Timur', '444', 'Surabaya', '6145', 'Mulyorejo', '60115', 'jalan mulyorejo 123', 38, '', '2020-08-29 16:32:55', '2020-08-29 16:32:55', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (10, 'Marco', 'Soegimin', '82299008979', 'DKI Jakart', 'DKI Jakarta', '153', 'Jakarta Selatan', '2105', 'Kebayoran Baru', '12120', 'JL. HANGTUAH RAYA NO.25', 39, '', '2020-08-31 16:40:29', '2020-08-31 16:40:29', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (11, 'Tes', 'Tes', '82299008979', '1', 'Bali', '94', 'Buleleng', '1281', 'Busungbiu', '125458', 'TES', 39, '', '2020-08-31 16:41:16', '2020-08-31 16:41:16', 1, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (12, 'Marco', 'Soegimin', '82299008979', '1', 'Bali', '94', 'Buleleng', '1279', 'Banjar', '54565', 'TES', 40, '', '2020-09-01 11:45:44', '2020-09-01 11:45:44', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (13, 'joko', 'styawan', '82230227809', '11', 'Jawa Timur', '409', 'Sidoarjo', '5632', 'Buduran', '61252', 'Jalan Mbah Soleh, RT. 03/01, Desa Prasung Tani, Prasung, Buduran, Prasungtani, Prasung, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61252', 43, '', '2020-09-01 15:03:25', '2020-09-01 15:03:25', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (14, 'Alfian', 'Ma\'ruf', '85815705272', '11', 'Jawa Timur', '444', 'Surabaya', '6159', 'Wiyung', '60228', 'Wiyung 2/68EE', 64, '', '2020-09-02 13:25:52', '2020-09-02 13:25:52', 0, '-7.312265299999999', '112.6943559');
INSERT INTO `customer_addres` VALUES (15, 'Muhammad Alfian', 'Ma\'ruf', '85815705272', '11', 'Jawa Timur', '444', 'Surabaya', '6159', 'Wiyung', '60228', 'Wiyung 2/68EE', 65, '', '2020-09-02 13:53:32', '2020-09-02 13:53:32', 0, '-7.312265299999999', '112.6943559');
INSERT INTO `customer_addres` VALUES (16, 'Muhammad Alfian', 'Ma\'ruf', '85815705272', 'Jawa Timur', 'Jawa Timur', '444', 'Surabaya', '6157', 'Tegalsari', '60262', 'Kedondong Kidul 1/15', 65, '', '2020-09-02 14:43:08', '2020-09-02 14:43:08', 1, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (17, 'joko', 'styawan', '82230227809', '11', 'Jawa Timur', '409', 'Sidoarjo', '5632', 'Buduran', '61252', 'abcd', 53, '', '2020-09-04 07:43:54', '2020-09-04 07:43:54', 1, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (18, 'joko', 'styawan', '54848815', '11', 'Jawa Timur', '409', 'Sidoarjo', '5632', 'Buduran', '61252', 'ftgfg', 53, '', '2020-09-04 07:45:07', '2020-09-04 07:45:07', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (19, 'dragon', 'butter fl', '121212112', '3', 'Banten', '402', 'Serang', '5543', 'Binuang', '60236', 'asz', 69, '', '2020-09-04 13:39:04', '2020-09-04 13:39:04', 0, '51.5044479', '5.308462499999999');
INSERT INTO `customer_addres` VALUES (20, 'Marco', 'Soegimin', '82299008979', '6', 'DKI Jakarta', '153', 'Jakarta Selatan', '2105', 'Kebayoran Baru', '12120', 'HANGTUAH', 56, '', '2020-09-04 20:50:49', '2020-09-04 20:50:49', 0, '-6.398775388428459', '107.03021072327437');
INSERT INTO `customer_addres` VALUES (21, 'jess', 'a', '81265479555', '6', 'DKI Jakarta', '155', 'Jakarta Utara', '2127', 'Penjaringan', '14444', 'jalan pluit permai', 63, '', '2020-09-07 14:31:19', '2020-09-07 14:31:19', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (22, 'jess', 'a', '812452123655', '6', 'DKI Jakarta', '155', 'Jakarta Utara', '2127', 'Penjaringan', '14444', 'jalan garuda indonesia', 63, '', '2020-09-07 16:38:11', '2020-09-07 16:38:11', 1, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (23, 'Amel', 'Amelia', '878787878', '11', 'Jawa Timur', '444', 'Surabaya', '6153', 'Sukolilo', '600111', 'Jalan keputih 2 c no 2', 57, '', '2020-09-11 16:47:02', '2020-09-11 16:47:02', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (24, 'joko', 'styawan', '82230227809', '11', 'Jawa Timur', '409', 'Sidoarjo', '5632', 'Buduran', '61252', 'Jl. Prasung Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252', 77, '', '2020-09-12 13:21:41', '2020-09-12 13:21:41', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (25, 'dita', 'revo', '8383222222222', '11', 'Jawa Timur', '444', 'Surabaya', '6145', 'Mulyorejo', '60112', 'jalan mulyorejo utara 123', 70, '', '2020-09-17 11:20:11', '2020-09-17 11:20:11', 0, '-7.20455898888842', '112.734314762056');
INSERT INTO `customer_addres` VALUES (26, 'bima', 'putra', '811111111111', 'Jawa Timur', 'Jawa Timur', '444', 'Surabaya', '6138', 'Gubeng', '62102', 'kertajaya V no 9 Surabaya', 13, '', '2020-09-23 11:46:06', '2020-09-23 11:46:06', 0, '-7.20455898888842', '112.734314762056');

-- ----------------------------
-- Table structure for customer_packages
-- ----------------------------
DROP TABLE IF EXISTS `customer_packages`;
CREATE TABLE `customer_packages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `amount` double(28, 2) NULL DEFAULT NULL,
  `product_upload` int(11) NULL DEFAULT NULL,
  `logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer_packages
-- ----------------------------

-- ----------------------------
-- Table structure for customer_products
-- ----------------------------
DROP TABLE IF EXISTS `customer_products`;
CREATE TABLE `customer_products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `published` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `added_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `subcategory_id` int(11) NULL DEFAULT NULL,
  `subsubcategory_id` int(11) NULL DEFAULT NULL,
  `brand_id` int(11) NULL DEFAULT NULL,
  `photos` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `thumbnail_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `conditon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `location` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `video_provider` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `video_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `unit` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `unit_price` double(28, 2) NULL DEFAULT 0,
  `meta_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pdf` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer_products
-- ----------------------------

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (4, 8, '2019-08-01 17:35:09', '2019-08-01 17:35:09');
INSERT INTO `customers` VALUES (5, 13, '2020-07-02 07:33:56', '2020-07-02 07:33:56');
INSERT INTO `customers` VALUES (42, 53, '2020-09-01 15:23:44', '2020-09-01 15:23:44');
INSERT INTO `customers` VALUES (43, 54, '2020-09-01 15:26:29', '2020-09-01 15:26:29');
INSERT INTO `customers` VALUES (44, 55, '2020-09-01 15:37:59', '2020-09-01 15:37:59');
INSERT INTO `customers` VALUES (45, 56, '2020-09-01 15:39:12', '2020-09-01 15:39:12');
INSERT INTO `customers` VALUES (46, 57, '2020-09-01 15:44:15', '2020-09-01 15:44:15');
INSERT INTO `customers` VALUES (47, 58, '2020-09-01 15:45:28', '2020-09-01 15:45:28');
INSERT INTO `customers` VALUES (48, 59, '2020-09-01 15:48:00', '2020-09-01 15:48:00');
INSERT INTO `customers` VALUES (49, 60, '2020-09-01 16:44:10', '2020-09-01 16:44:10');
INSERT INTO `customers` VALUES (50, 61, '2020-09-01 16:46:48', '2020-09-01 16:46:48');
INSERT INTO `customers` VALUES (51, 62, '2020-09-01 16:55:32', '2020-09-01 16:55:32');
INSERT INTO `customers` VALUES (52, 63, '2020-09-01 17:14:42', '2020-09-01 17:14:42');
INSERT INTO `customers` VALUES (53, 64, '2020-09-02 13:23:53', '2020-09-02 13:23:53');
INSERT INTO `customers` VALUES (54, 65, '2020-09-02 13:35:50', '2020-09-02 13:35:50');
INSERT INTO `customers` VALUES (55, 66, '2020-09-02 13:46:53', '2020-09-02 13:46:53');
INSERT INTO `customers` VALUES (56, 67, '2020-09-03 10:20:24', '2020-09-03 10:20:24');
INSERT INTO `customers` VALUES (57, 68, '2020-09-03 14:54:42', '2020-09-03 14:54:42');
INSERT INTO `customers` VALUES (58, 69, '2020-09-04 10:27:05', '2020-09-04 10:27:05');
INSERT INTO `customers` VALUES (59, 70, '2020-09-05 11:48:33', '2020-09-05 11:48:33');
INSERT INTO `customers` VALUES (60, 71, '2020-09-05 15:38:07', '2020-09-05 15:38:07');
INSERT INTO `customers` VALUES (61, 72, '2020-09-07 12:28:19', '2020-09-07 12:28:19');
INSERT INTO `customers` VALUES (62, 73, '2020-09-08 14:55:27', '2020-09-08 14:55:27');
INSERT INTO `customers` VALUES (63, 74, '2020-09-11 12:36:13', '2020-09-11 12:36:13');
INSERT INTO `customers` VALUES (64, 75, '2020-09-11 13:06:39', '2020-09-11 13:06:39');
INSERT INTO `customers` VALUES (65, 76, '2020-09-11 13:13:56', '2020-09-11 13:13:56');
INSERT INTO `customers` VALUES (66, 77, '2020-09-11 20:14:41', '2020-09-11 20:14:41');
INSERT INTO `customers` VALUES (67, 78, '2020-09-14 13:26:00', '2020-09-14 13:26:00');
INSERT INTO `customers` VALUES (68, 79, '2020-09-15 09:21:05', '2020-09-15 09:21:05');
INSERT INTO `customers` VALUES (69, 80, '2020-09-22 18:47:32', '2020-09-22 18:47:32');

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ask` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ans` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int(123) NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faq
-- ----------------------------
INSERT INTO `faq` VALUES (1, 'Pengiriman Berasal Dari Mana ya?', 'Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia', 1, '2020-09-11 09:03:40', '2020-09-11 09:03:40');
INSERT INTO `faq` VALUES (4, 'Bagaimana cara redeem kupon', 'masukkan kode kupon ke penjaga, lalu dapatkan produknya lo', 1, '2020-09-16 10:10:58', '2020-09-11 11:01:01');
INSERT INTO `faq` VALUES (10, 'Apakah produk di ponny beute dijamin original?', 'iya', 3, '2020-09-11 21:43:02', '2020-09-11 21:42:44');
INSERT INTO `faq` VALUES (11, 'Bagaimana cara mendapatkan diskon free ongkir?', '<p>jawaban</p>', 1, '2020-09-16 10:07:32', '2020-09-16 10:07:32');
INSERT INTO `faq` VALUES (12, 'Bagaimana cara mendapatkan diskon free ongkir?', '<p>beli produk kemudian masukkan kupon free ongkir yang sedang berlaku</p>', 5, '2020-09-23 11:29:22', '2020-09-23 11:29:22');
INSERT INTO `faq` VALUES (13, 'bagaimana jika pengiriman tidak sampai', '<p>chat ke CS</p>', 5, '2020-09-23 11:53:31', '2020-09-23 11:53:31');
INSERT INTO `faq` VALUES (14, 'Bagaimana cara menaikan member?', '<p>Belanja</p>', 6, '2020-09-23 11:54:43', '2020-09-23 11:54:43');

-- ----------------------------
-- Table structure for faq_category
-- ----------------------------
DROP TABLE IF EXISTS `faq_category`;
CREATE TABLE `faq_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faq_category
-- ----------------------------
INSERT INTO `faq_category` VALUES (1, 'PERTANYAAN UMUMM', '2020-09-11 11:19:56', '2020-09-16 10:09:15');
INSERT INTO `faq_category` VALUES (3, 'PERTANYAAN PRIBADI', '2020-09-11 11:20:14', '2020-09-11 11:20:14');
INSERT INTO `faq_category` VALUES (5, 'Pengiriman', '2020-09-23 11:15:18', '2020-09-23 11:55:52');
INSERT INTO `faq_category` VALUES (6, 'Happy Skin Reward', '2020-09-23 11:54:14', '2020-09-23 11:57:26');

-- ----------------------------
-- Table structure for flash_deal_products
-- ----------------------------
DROP TABLE IF EXISTS `flash_deal_products`;
CREATE TABLE `flash_deal_products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flash_deal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` double(8, 2) NULL DEFAULT 0,
  `discount_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of flash_deal_products
-- ----------------------------
INSERT INTO `flash_deal_products` VALUES (25, 8, 16, 0.00, 'amount', '2020-07-13 10:20:12', '2020-07-13 10:20:12');
INSERT INTO `flash_deal_products` VALUES (26, 8, 18, 0.00, 'amount', '2020-07-13 10:20:12', '2020-07-13 10:20:12');
INSERT INTO `flash_deal_products` VALUES (34, 11, 17, 0.00, 'amount', '2020-07-13 11:01:14', '2020-07-13 11:01:14');
INSERT INTO `flash_deal_products` VALUES (35, 11, 19, 0.00, 'amount', '2020-07-13 11:01:14', '2020-07-13 11:01:14');
INSERT INTO `flash_deal_products` VALUES (38, 10, 17, 0.00, 'amount', '2020-07-14 10:43:13', '2020-07-14 10:43:13');
INSERT INTO `flash_deal_products` VALUES (39, 10, 18, 0.00, 'amount', '2020-07-14 10:43:13', '2020-07-14 10:43:13');
INSERT INTO `flash_deal_products` VALUES (83, 12, 26, 20000.00, 'amount', '2020-08-06 13:11:11', '2020-08-06 13:11:11');
INSERT INTO `flash_deal_products` VALUES (84, 12, 29, 56.00, 'percent', '2020-08-06 13:11:11', '2020-08-06 13:11:11');
INSERT INTO `flash_deal_products` VALUES (85, 12, 32, 45.00, 'percent', '2020-08-06 13:11:11', '2020-08-06 13:11:11');
INSERT INTO `flash_deal_products` VALUES (86, 12, 41, 45.00, 'percent', '2020-08-06 13:11:11', '2020-08-06 13:11:11');
INSERT INTO `flash_deal_products` VALUES (87, 12, 47, 10.00, 'percent', '2020-08-06 13:11:11', '2020-08-06 13:11:11');

-- ----------------------------
-- Table structure for flash_deals
-- ----------------------------
DROP TABLE IF EXISTS `flash_deals`;
CREATE TABLE `flash_deals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `start_date` int(20) NULL DEFAULT NULL,
  `end_date` int(20) NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `featured` int(1) NOT NULL DEFAULT 0,
  `background_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `text_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `banner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of flash_deals
-- ----------------------------
INSERT INTO `flash_deals` VALUES (8, 'testing', 1594728000, 1594814340, 0, 0, '#fffff', 'white', NULL, 'testing-uwwi5', '2020-07-13 10:20:12', '2020-07-13 10:20:12');
INSERT INTO `flash_deals` VALUES (10, 'flash deal 2020', 1594659600, 1594745940, 0, 0, '#fffff', 'white', NULL, 'flash-deal-2020-vf5yj', '2020-07-13 10:30:48', '2020-07-14 15:33:26');
INSERT INTO `flash_deals` VALUES (11, 'testing ghgj', 1594616400, 1594684740, 0, 0, '#fffff', 'white', NULL, 'testing-ghgj-igx9z', '2020-07-13 10:47:35', '2020-07-14 02:22:15');
INSERT INTO `flash_deals` VALUES (12, 'Flashdeal 147', 1596214800, 1601481600, 1, 0, '#FCF8F0', 'dark', 'uploads/offers/banner/uDrFztzOEPqnHGDTE2mU6Aho1yR5n7omAE7IygMg.jpeg', 'flashdeal-147-towhb', '2020-07-14 15:39:33', '2020-09-05 18:55:38');

-- ----------------------------
-- Table structure for forum_comment_like
-- ----------------------------
DROP TABLE IF EXISTS `forum_comment_like`;
CREATE TABLE `forum_comment_like`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_comment_like
-- ----------------------------
INSERT INTO `forum_comment_like` VALUES (83, 78, 156, '2020-09-13 23:36:41', '2020-09-13 23:36:41');
INSERT INTO `forum_comment_like` VALUES (86, 78, 147, '2020-09-14 01:46:03', '2020-09-14 01:46:03');

-- ----------------------------
-- Table structure for forum_comment_reply
-- ----------------------------
DROP TABLE IF EXISTS `forum_comment_reply`;
CREATE TABLE `forum_comment_reply`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_comment_reply
-- ----------------------------
INSERT INTO `forum_comment_reply` VALUES (1, 78, 181, 'sung tolodo', 0, '2020-09-12 11:20:32', '2020-09-19 10:38:57');
INSERT INTO `forum_comment_reply` VALUES (39, 67, 7, 'haw', 0, '2020-09-19 17:03:36', '2020-09-19 17:03:36');
INSERT INTO `forum_comment_reply` VALUES (40, 67, 7, 'apa', 0, '2020-09-19 17:03:58', '2020-09-19 17:03:58');

-- ----------------------------
-- Table structure for forum_have_seen
-- ----------------------------
DROP TABLE IF EXISTS `forum_have_seen`;
CREATE TABLE `forum_have_seen`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 280 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_have_seen
-- ----------------------------
INSERT INTO `forum_have_seen` VALUES (1, 14, 17);
INSERT INTO `forum_have_seen` VALUES (2, 14, 18);
INSERT INTO `forum_have_seen` VALUES (3, 14, 18);
INSERT INTO `forum_have_seen` VALUES (4, 14, 18);
INSERT INTO `forum_have_seen` VALUES (5, 14, 19);
INSERT INTO `forum_have_seen` VALUES (6, 14, 16);
INSERT INTO `forum_have_seen` VALUES (7, 14, 17);
INSERT INTO `forum_have_seen` VALUES (8, 14, 18);
INSERT INTO `forum_have_seen` VALUES (9, 14, 18);
INSERT INTO `forum_have_seen` VALUES (10, 14, 17);
INSERT INTO `forum_have_seen` VALUES (11, 14, 17);
INSERT INTO `forum_have_seen` VALUES (12, 14, 17);
INSERT INTO `forum_have_seen` VALUES (13, 14, 17);
INSERT INTO `forum_have_seen` VALUES (14, 14, 17);
INSERT INTO `forum_have_seen` VALUES (15, 14, 17);
INSERT INTO `forum_have_seen` VALUES (16, 14, 17);
INSERT INTO `forum_have_seen` VALUES (17, 14, 17);
INSERT INTO `forum_have_seen` VALUES (18, 14, 17);
INSERT INTO `forum_have_seen` VALUES (19, 14, 17);
INSERT INTO `forum_have_seen` VALUES (20, 14, 17);
INSERT INTO `forum_have_seen` VALUES (21, 14, 17);
INSERT INTO `forum_have_seen` VALUES (22, 14, 17);
INSERT INTO `forum_have_seen` VALUES (23, 14, 17);
INSERT INTO `forum_have_seen` VALUES (24, 14, 17);
INSERT INTO `forum_have_seen` VALUES (25, 14, 19);
INSERT INTO `forum_have_seen` VALUES (26, 14, 17);
INSERT INTO `forum_have_seen` VALUES (27, 14, 17);
INSERT INTO `forum_have_seen` VALUES (28, 14, 17);
INSERT INTO `forum_have_seen` VALUES (29, 14, 17);
INSERT INTO `forum_have_seen` VALUES (30, 14, 17);
INSERT INTO `forum_have_seen` VALUES (31, 14, 17);
INSERT INTO `forum_have_seen` VALUES (32, 14, 17);
INSERT INTO `forum_have_seen` VALUES (33, 14, 17);
INSERT INTO `forum_have_seen` VALUES (34, 14, 17);
INSERT INTO `forum_have_seen` VALUES (35, 14, 17);
INSERT INTO `forum_have_seen` VALUES (36, 14, 17);
INSERT INTO `forum_have_seen` VALUES (37, 14, 17);
INSERT INTO `forum_have_seen` VALUES (38, 14, 17);
INSERT INTO `forum_have_seen` VALUES (39, 14, 17);
INSERT INTO `forum_have_seen` VALUES (40, 14, 17);
INSERT INTO `forum_have_seen` VALUES (41, 14, 17);
INSERT INTO `forum_have_seen` VALUES (42, 14, 17);
INSERT INTO `forum_have_seen` VALUES (43, 14, 17);
INSERT INTO `forum_have_seen` VALUES (44, 14, 17);
INSERT INTO `forum_have_seen` VALUES (45, 14, 17);
INSERT INTO `forum_have_seen` VALUES (46, 14, 19);
INSERT INTO `forum_have_seen` VALUES (47, 14, 17);
INSERT INTO `forum_have_seen` VALUES (48, 14, 17);
INSERT INTO `forum_have_seen` VALUES (49, 14, 17);
INSERT INTO `forum_have_seen` VALUES (50, 14, 17);
INSERT INTO `forum_have_seen` VALUES (51, 14, 17);
INSERT INTO `forum_have_seen` VALUES (52, 14, 17);
INSERT INTO `forum_have_seen` VALUES (53, 14, 17);
INSERT INTO `forum_have_seen` VALUES (54, 14, 17);
INSERT INTO `forum_have_seen` VALUES (55, 14, 17);
INSERT INTO `forum_have_seen` VALUES (56, 14, 17);
INSERT INTO `forum_have_seen` VALUES (57, 14, 17);
INSERT INTO `forum_have_seen` VALUES (58, 14, 17);
INSERT INTO `forum_have_seen` VALUES (59, 14, 17);
INSERT INTO `forum_have_seen` VALUES (60, 14, 17);
INSERT INTO `forum_have_seen` VALUES (61, 14, 17);
INSERT INTO `forum_have_seen` VALUES (62, 14, 17);
INSERT INTO `forum_have_seen` VALUES (63, 14, 17);
INSERT INTO `forum_have_seen` VALUES (64, 14, 17);
INSERT INTO `forum_have_seen` VALUES (65, 14, 17);
INSERT INTO `forum_have_seen` VALUES (66, 14, 17);
INSERT INTO `forum_have_seen` VALUES (67, 14, 17);
INSERT INTO `forum_have_seen` VALUES (68, 14, 17);
INSERT INTO `forum_have_seen` VALUES (69, 14, 17);
INSERT INTO `forum_have_seen` VALUES (70, 14, 17);
INSERT INTO `forum_have_seen` VALUES (71, 14, 17);
INSERT INTO `forum_have_seen` VALUES (72, 14, 17);
INSERT INTO `forum_have_seen` VALUES (73, 14, 17);
INSERT INTO `forum_have_seen` VALUES (74, 14, 17);
INSERT INTO `forum_have_seen` VALUES (75, 14, 17);
INSERT INTO `forum_have_seen` VALUES (76, 14, 17);
INSERT INTO `forum_have_seen` VALUES (77, 14, 17);
INSERT INTO `forum_have_seen` VALUES (78, 14, 17);
INSERT INTO `forum_have_seen` VALUES (79, 14, 17);
INSERT INTO `forum_have_seen` VALUES (80, 14, 17);
INSERT INTO `forum_have_seen` VALUES (81, 14, 17);
INSERT INTO `forum_have_seen` VALUES (82, 14, 17);
INSERT INTO `forum_have_seen` VALUES (83, 14, 17);
INSERT INTO `forum_have_seen` VALUES (84, 14, 17);
INSERT INTO `forum_have_seen` VALUES (85, 14, 17);
INSERT INTO `forum_have_seen` VALUES (86, 14, 17);
INSERT INTO `forum_have_seen` VALUES (87, 14, 17);
INSERT INTO `forum_have_seen` VALUES (88, 14, 17);
INSERT INTO `forum_have_seen` VALUES (89, 14, 17);
INSERT INTO `forum_have_seen` VALUES (90, 14, 17);
INSERT INTO `forum_have_seen` VALUES (91, 14, 17);
INSERT INTO `forum_have_seen` VALUES (92, 14, 16);
INSERT INTO `forum_have_seen` VALUES (93, 14, 17);
INSERT INTO `forum_have_seen` VALUES (94, 14, 18);
INSERT INTO `forum_have_seen` VALUES (95, 14, 17);
INSERT INTO `forum_have_seen` VALUES (96, 14, 19);
INSERT INTO `forum_have_seen` VALUES (97, 14, 17);
INSERT INTO `forum_have_seen` VALUES (98, 14, 17);
INSERT INTO `forum_have_seen` VALUES (99, 14, 19);
INSERT INTO `forum_have_seen` VALUES (100, 14, 17);
INSERT INTO `forum_have_seen` VALUES (101, 14, 17);
INSERT INTO `forum_have_seen` VALUES (102, 14, 17);
INSERT INTO `forum_have_seen` VALUES (103, 14, 17);
INSERT INTO `forum_have_seen` VALUES (104, 14, 16);
INSERT INTO `forum_have_seen` VALUES (105, 14, 16);
INSERT INTO `forum_have_seen` VALUES (106, 14, 16);
INSERT INTO `forum_have_seen` VALUES (107, 14, 19);
INSERT INTO `forum_have_seen` VALUES (108, 14, 19);
INSERT INTO `forum_have_seen` VALUES (109, 14, 17);
INSERT INTO `forum_have_seen` VALUES (110, 14, 17);
INSERT INTO `forum_have_seen` VALUES (111, 14, 17);
INSERT INTO `forum_have_seen` VALUES (112, 14, 18);
INSERT INTO `forum_have_seen` VALUES (113, 14, 20);
INSERT INTO `forum_have_seen` VALUES (114, 14, 20);
INSERT INTO `forum_have_seen` VALUES (115, 14, 18);
INSERT INTO `forum_have_seen` VALUES (116, 14, 20);
INSERT INTO `forum_have_seen` VALUES (117, 14, 20);
INSERT INTO `forum_have_seen` VALUES (118, 14, 20);
INSERT INTO `forum_have_seen` VALUES (119, 14, 18);
INSERT INTO `forum_have_seen` VALUES (120, 14, 17);
INSERT INTO `forum_have_seen` VALUES (121, 14, 20);
INSERT INTO `forum_have_seen` VALUES (122, 0, 20);
INSERT INTO `forum_have_seen` VALUES (123, 0, 20);
INSERT INTO `forum_have_seen` VALUES (124, 14, 19);
INSERT INTO `forum_have_seen` VALUES (125, 14, 20);
INSERT INTO `forum_have_seen` VALUES (126, 14, 19);
INSERT INTO `forum_have_seen` VALUES (127, 14, 19);
INSERT INTO `forum_have_seen` VALUES (128, 14, 18);
INSERT INTO `forum_have_seen` VALUES (129, 14, 18);
INSERT INTO `forum_have_seen` VALUES (130, 14, 20);
INSERT INTO `forum_have_seen` VALUES (131, 14, 16);
INSERT INTO `forum_have_seen` VALUES (132, 14, 18);
INSERT INTO `forum_have_seen` VALUES (133, 14, 20);
INSERT INTO `forum_have_seen` VALUES (134, 14, 20);
INSERT INTO `forum_have_seen` VALUES (135, 14, 16);
INSERT INTO `forum_have_seen` VALUES (136, 14, 20);
INSERT INTO `forum_have_seen` VALUES (137, 14, 16);
INSERT INTO `forum_have_seen` VALUES (138, 14, 16);
INSERT INTO `forum_have_seen` VALUES (139, 14, 20);
INSERT INTO `forum_have_seen` VALUES (140, 14, 20);
INSERT INTO `forum_have_seen` VALUES (141, 14, 20);
INSERT INTO `forum_have_seen` VALUES (142, 14, 20);
INSERT INTO `forum_have_seen` VALUES (143, 14, 20);
INSERT INTO `forum_have_seen` VALUES (144, 14, 17);
INSERT INTO `forum_have_seen` VALUES (145, 14, 16);
INSERT INTO `forum_have_seen` VALUES (146, 14, 20);
INSERT INTO `forum_have_seen` VALUES (147, 14, 20);
INSERT INTO `forum_have_seen` VALUES (148, 14, 17);
INSERT INTO `forum_have_seen` VALUES (149, 14, 20);
INSERT INTO `forum_have_seen` VALUES (150, 14, 20);
INSERT INTO `forum_have_seen` VALUES (151, 14, 20);
INSERT INTO `forum_have_seen` VALUES (152, 14, 20);
INSERT INTO `forum_have_seen` VALUES (153, 0, 20);
INSERT INTO `forum_have_seen` VALUES (154, 0, 20);
INSERT INTO `forum_have_seen` VALUES (155, 14, 20);
INSERT INTO `forum_have_seen` VALUES (156, 14, 20);
INSERT INTO `forum_have_seen` VALUES (157, 14, 16);
INSERT INTO `forum_have_seen` VALUES (158, 14, 16);
INSERT INTO `forum_have_seen` VALUES (159, 14, 20);
INSERT INTO `forum_have_seen` VALUES (160, 14, 19);
INSERT INTO `forum_have_seen` VALUES (161, 14, 20);
INSERT INTO `forum_have_seen` VALUES (162, 14, 20);
INSERT INTO `forum_have_seen` VALUES (163, 14, 20);
INSERT INTO `forum_have_seen` VALUES (164, 0, 18);
INSERT INTO `forum_have_seen` VALUES (165, 0, 15);
INSERT INTO `forum_have_seen` VALUES (166, 0, 12);
INSERT INTO `forum_have_seen` VALUES (167, 0, 16);
INSERT INTO `forum_have_seen` VALUES (168, 57, 15);
INSERT INTO `forum_have_seen` VALUES (169, 57, 13);
INSERT INTO `forum_have_seen` VALUES (170, 57, 15);
INSERT INTO `forum_have_seen` VALUES (171, 57, 15);
INSERT INTO `forum_have_seen` VALUES (172, 57, 15);
INSERT INTO `forum_have_seen` VALUES (173, 57, 18);
INSERT INTO `forum_have_seen` VALUES (174, 0, 0);
INSERT INTO `forum_have_seen` VALUES (175, 0, 0);
INSERT INTO `forum_have_seen` VALUES (176, 0, 20);
INSERT INTO `forum_have_seen` VALUES (177, 0, 0);
INSERT INTO `forum_have_seen` VALUES (178, 0, 0);
INSERT INTO `forum_have_seen` VALUES (179, 78, 4);
INSERT INTO `forum_have_seen` VALUES (180, 78, 2);
INSERT INTO `forum_have_seen` VALUES (181, 0, 21);
INSERT INTO `forum_have_seen` VALUES (182, 0, 21);
INSERT INTO `forum_have_seen` VALUES (183, 0, 20);
INSERT INTO `forum_have_seen` VALUES (184, 0, 20);
INSERT INTO `forum_have_seen` VALUES (185, 0, 19);
INSERT INTO `forum_have_seen` VALUES (186, 0, 19);
INSERT INTO `forum_have_seen` VALUES (187, 0, 13);
INSERT INTO `forum_have_seen` VALUES (188, 0, 13);
INSERT INTO `forum_have_seen` VALUES (189, 0, 13);
INSERT INTO `forum_have_seen` VALUES (190, 0, 13);
INSERT INTO `forum_have_seen` VALUES (191, 0, 13);
INSERT INTO `forum_have_seen` VALUES (192, 0, 13);
INSERT INTO `forum_have_seen` VALUES (193, 0, 13);
INSERT INTO `forum_have_seen` VALUES (194, 0, 13);
INSERT INTO `forum_have_seen` VALUES (195, 13, 13);
INSERT INTO `forum_have_seen` VALUES (196, 13, 13);
INSERT INTO `forum_have_seen` VALUES (197, 0, 13);
INSERT INTO `forum_have_seen` VALUES (198, 13, 21);
INSERT INTO `forum_have_seen` VALUES (199, 0, 21);
INSERT INTO `forum_have_seen` VALUES (200, 0, 21);
INSERT INTO `forum_have_seen` VALUES (201, 0, 21);
INSERT INTO `forum_have_seen` VALUES (202, 0, 21);
INSERT INTO `forum_have_seen` VALUES (203, 0, 21);
INSERT INTO `forum_have_seen` VALUES (204, 0, 21);
INSERT INTO `forum_have_seen` VALUES (205, 0, 21);
INSERT INTO `forum_have_seen` VALUES (206, 0, 21);
INSERT INTO `forum_have_seen` VALUES (207, 13, 21);
INSERT INTO `forum_have_seen` VALUES (208, 13, 13);
INSERT INTO `forum_have_seen` VALUES (209, 13, 13);
INSERT INTO `forum_have_seen` VALUES (210, 0, 13);
INSERT INTO `forum_have_seen` VALUES (211, 0, 13);
INSERT INTO `forum_have_seen` VALUES (212, 0, 13);
INSERT INTO `forum_have_seen` VALUES (213, 0, 13);
INSERT INTO `forum_have_seen` VALUES (214, 13, 21);
INSERT INTO `forum_have_seen` VALUES (215, 0, 21);
INSERT INTO `forum_have_seen` VALUES (216, 13, 21);
INSERT INTO `forum_have_seen` VALUES (217, 0, 21);
INSERT INTO `forum_have_seen` VALUES (218, 0, 21);
INSERT INTO `forum_have_seen` VALUES (219, 0, 21);
INSERT INTO `forum_have_seen` VALUES (220, 0, 21);
INSERT INTO `forum_have_seen` VALUES (221, 0, 21);
INSERT INTO `forum_have_seen` VALUES (222, 13, 21);
INSERT INTO `forum_have_seen` VALUES (223, 0, 21);
INSERT INTO `forum_have_seen` VALUES (224, 13, 2);
INSERT INTO `forum_have_seen` VALUES (225, 67, 21);
INSERT INTO `forum_have_seen` VALUES (226, 67, 21);
INSERT INTO `forum_have_seen` VALUES (227, 78, 21);
INSERT INTO `forum_have_seen` VALUES (228, 0, 21);
INSERT INTO `forum_have_seen` VALUES (229, 0, 21);
INSERT INTO `forum_have_seen` VALUES (230, 0, 21);
INSERT INTO `forum_have_seen` VALUES (231, 0, 21);
INSERT INTO `forum_have_seen` VALUES (232, 0, 21);
INSERT INTO `forum_have_seen` VALUES (233, 0, 21);
INSERT INTO `forum_have_seen` VALUES (234, 14, 21);
INSERT INTO `forum_have_seen` VALUES (235, 0, 21);
INSERT INTO `forum_have_seen` VALUES (236, 0, 21);
INSERT INTO `forum_have_seen` VALUES (237, 14, 20);
INSERT INTO `forum_have_seen` VALUES (238, 0, 20);
INSERT INTO `forum_have_seen` VALUES (239, 0, 20);
INSERT INTO `forum_have_seen` VALUES (240, 0, 20);
INSERT INTO `forum_have_seen` VALUES (241, 14, 15);
INSERT INTO `forum_have_seen` VALUES (242, 0, 15);
INSERT INTO `forum_have_seen` VALUES (243, 0, 15);
INSERT INTO `forum_have_seen` VALUES (244, 0, 15);
INSERT INTO `forum_have_seen` VALUES (245, 0, 15);
INSERT INTO `forum_have_seen` VALUES (246, 14, 21);
INSERT INTO `forum_have_seen` VALUES (247, 14, 21);
INSERT INTO `forum_have_seen` VALUES (248, 0, 18);
INSERT INTO `forum_have_seen` VALUES (249, 0, 18);
INSERT INTO `forum_have_seen` VALUES (250, 0, 18);
INSERT INTO `forum_have_seen` VALUES (251, 0, 18);
INSERT INTO `forum_have_seen` VALUES (252, 13, 20);
INSERT INTO `forum_have_seen` VALUES (253, 0, 20);
INSERT INTO `forum_have_seen` VALUES (254, 0, 20);
INSERT INTO `forum_have_seen` VALUES (255, 0, 20);
INSERT INTO `forum_have_seen` VALUES (256, 0, 20);
INSERT INTO `forum_have_seen` VALUES (257, 0, 20);
INSERT INTO `forum_have_seen` VALUES (258, 13, 13);
INSERT INTO `forum_have_seen` VALUES (259, 13, 20);
INSERT INTO `forum_have_seen` VALUES (260, 14, 18);
INSERT INTO `forum_have_seen` VALUES (261, 0, 20);
INSERT INTO `forum_have_seen` VALUES (262, 0, 20);
INSERT INTO `forum_have_seen` VALUES (263, 0, 20);
INSERT INTO `forum_have_seen` VALUES (264, 0, 20);
INSERT INTO `forum_have_seen` VALUES (265, 0, 20);
INSERT INTO `forum_have_seen` VALUES (266, 13, 18);
INSERT INTO `forum_have_seen` VALUES (267, 13, 22);
INSERT INTO `forum_have_seen` VALUES (268, 13, 28);
INSERT INTO `forum_have_seen` VALUES (269, 13, 28);
INSERT INTO `forum_have_seen` VALUES (270, 13, 28);
INSERT INTO `forum_have_seen` VALUES (271, 13, 28);
INSERT INTO `forum_have_seen` VALUES (272, 75, 28);
INSERT INTO `forum_have_seen` VALUES (273, 78, 28);
INSERT INTO `forum_have_seen` VALUES (274, 78, 28);
INSERT INTO `forum_have_seen` VALUES (275, 0, 28);
INSERT INTO `forum_have_seen` VALUES (276, 0, 28);
INSERT INTO `forum_have_seen` VALUES (277, 0, 28);
INSERT INTO `forum_have_seen` VALUES (278, 13, 28);
INSERT INTO `forum_have_seen` VALUES (279, 78, 28);

-- ----------------------------
-- Table structure for forum_likes
-- ----------------------------
DROP TABLE IF EXISTS `forum_likes`;
CREATE TABLE `forum_likes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(123) NOT NULL,
  `comment_id` int(123) NOT NULL,
  `user_id` int(123) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 163 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_likes
-- ----------------------------
INSERT INTO `forum_likes` VALUES (1, 1, 0, 27, '2020-08-23 11:25:31', '2020-08-23 11:25:31');
INSERT INTO `forum_likes` VALUES (2, 1, 0, 20, '2020-08-23 11:25:31', '2020-08-23 11:25:31');
INSERT INTO `forum_likes` VALUES (3, 1, 0, 19, '2020-08-23 11:26:35', '2020-08-23 11:26:35');
INSERT INTO `forum_likes` VALUES (4, 1, 0, 17, '2020-08-23 11:26:35', '2020-08-23 11:26:35');
INSERT INTO `forum_likes` VALUES (5, 0, 1, 24, '2020-08-23 11:28:16', '2020-08-23 11:28:16');
INSERT INTO `forum_likes` VALUES (6, 0, 1, 25, '2020-08-23 11:28:16', '2020-08-23 11:28:16');
INSERT INTO `forum_likes` VALUES (7, 0, 1, 20, '2020-08-23 11:28:42', '2020-08-23 11:28:42');
INSERT INTO `forum_likes` VALUES (8, 0, 1, 21, '2020-08-23 11:28:42', '2020-08-23 11:28:42');
INSERT INTO `forum_likes` VALUES (9, 2, 0, 19, '2020-08-23 11:28:58', '2020-08-23 11:28:58');
INSERT INTO `forum_likes` VALUES (10, 2, 0, 22, '2020-08-23 11:28:58', '2020-08-23 11:28:58');
INSERT INTO `forum_likes` VALUES (11, 2, 0, 27, '2020-08-23 11:29:32', '2020-08-23 11:29:32');
INSERT INTO `forum_likes` VALUES (12, 0, 1, 23, '2020-08-23 11:29:32', '2020-08-23 11:29:32');
INSERT INTO `forum_likes` VALUES (108, 6, 0, 14, '2020-08-26 22:05:51', '2020-08-26 22:05:51');
INSERT INTO `forum_likes` VALUES (127, 4, 0, 14, '2020-08-26 22:17:48', '2020-08-26 22:17:48');
INSERT INTO `forum_likes` VALUES (128, 5, 0, 14, '2020-08-26 22:18:08', '2020-08-26 22:18:08');
INSERT INTO `forum_likes` VALUES (130, 7, 0, 14, '2020-08-26 22:26:41', '2020-08-26 22:26:41');
INSERT INTO `forum_likes` VALUES (132, 12, 0, 14, '2020-08-26 23:07:03', '2020-08-26 23:07:03');
INSERT INTO `forum_likes` VALUES (136, 2, 0, 13, '2020-08-27 10:01:57', '2020-08-27 10:01:57');
INSERT INTO `forum_likes` VALUES (138, 8, 0, 13, '2020-08-27 10:21:14', '2020-08-27 10:21:14');
INSERT INTO `forum_likes` VALUES (139, 10, 0, 13, '2020-08-27 10:32:41', '2020-08-27 10:32:41');
INSERT INTO `forum_likes` VALUES (140, 14, 0, 13, '2020-08-27 14:53:44', '2020-08-27 14:53:44');
INSERT INTO `forum_likes` VALUES (141, 15, 0, 14, '2020-08-28 14:17:06', '2020-08-28 14:17:06');
INSERT INTO `forum_likes` VALUES (142, 18, 0, 13, '2020-08-29 17:00:20', '2020-08-29 17:00:20');
INSERT INTO `forum_likes` VALUES (143, 13, 0, 14, '2020-09-04 19:45:24', '2020-09-04 19:45:24');
INSERT INTO `forum_likes` VALUES (144, 15, 0, 56, '2020-09-04 20:39:02', '2020-09-04 20:39:02');
INSERT INTO `forum_likes` VALUES (147, 12, 0, 63, '2020-09-08 12:03:00', '2020-09-08 12:03:00');
INSERT INTO `forum_likes` VALUES (155, 2, 0, 63, '2020-09-08 12:54:14', '2020-09-08 12:54:14');
INSERT INTO `forum_likes` VALUES (158, 15, 0, 57, '2020-09-12 14:17:54', '2020-09-12 14:17:54');
INSERT INTO `forum_likes` VALUES (159, 18, 0, 57, '2020-09-12 14:35:54', '2020-09-12 14:35:54');
INSERT INTO `forum_likes` VALUES (160, 21, 0, 0, '2020-09-19 16:51:26', '2020-09-19 16:51:26');
INSERT INTO `forum_likes` VALUES (161, 13, 0, 0, '2020-09-21 08:55:18', '2020-09-21 08:55:18');
INSERT INTO `forum_likes` VALUES (162, 18, 0, 0, '2020-09-22 13:11:10', '2020-09-22 13:11:10');

-- ----------------------------
-- Table structure for forum_notif_email
-- ----------------------------
DROP TABLE IF EXISTS `forum_notif_email`;
CREATE TABLE `forum_notif_email`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_notif_email
-- ----------------------------
INSERT INTO `forum_notif_email` VALUES (19, 67, 0, 184, '2020-09-19 11:46:35', '2020-09-19 11:46:35');
INSERT INTO `forum_notif_email` VALUES (20, 79, 0, 186, '2020-09-19 12:08:11', '2020-09-19 12:08:11');
INSERT INTO `forum_notif_email` VALUES (21, 79, 43, 0, '2020-09-19 12:14:28', '2020-09-19 12:14:28');
INSERT INTO `forum_notif_email` VALUES (22, 79, 0, 190, '2020-09-21 08:48:43', '2020-09-21 08:48:43');
INSERT INTO `forum_notif_email` VALUES (23, 79, 0, 191, '2020-09-21 08:49:11', '2020-09-21 08:49:11');
INSERT INTO `forum_notif_email` VALUES (24, 14, 44, 0, '2020-09-21 14:00:49', '2020-09-21 14:00:49');
INSERT INTO `forum_notif_email` VALUES (25, 14, 0, 193, '2020-09-21 14:01:36', '2020-09-21 14:01:36');
INSERT INTO `forum_notif_email` VALUES (26, 14, 45, 0, '2020-09-21 14:27:39', '2020-09-21 14:27:39');
INSERT INTO `forum_notif_email` VALUES (27, 79, 46, 0, '2020-09-21 14:42:44', '2020-09-21 14:42:44');
INSERT INTO `forum_notif_email` VALUES (28, 78, 0, 194, '2020-09-21 14:44:44', '2020-09-21 14:44:44');
INSERT INTO `forum_notif_email` VALUES (29, 78, 27, 0, '2020-09-23 12:21:46', '2020-09-23 12:21:46');
INSERT INTO `forum_notif_email` VALUES (30, 13, 28, 0, '2020-09-23 12:23:33', '2020-09-23 12:23:33');

-- ----------------------------
-- Table structure for forum_post_replys
-- ----------------------------
DROP TABLE IF EXISTS `forum_post_replys`;
CREATE TABLE `forum_post_replys`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int(123) NOT NULL,
  `user_id` int(123) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `notifiable` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_post_replys
-- ----------------------------
INSERT INTO `forum_post_replys` VALUES (1, 'komen', 11, 69, '2020-09-04 16:27:53', '2020-09-04 16:27:53', NULL);
INSERT INTO `forum_post_replys` VALUES (2, 'Iya', 13, 14, '2020-09-04 19:45:01', '2020-09-04 19:45:01', NULL);
INSERT INTO `forum_post_replys` VALUES (3, 'hi lol', 15, 56, '2020-09-04 20:39:13', '2020-09-04 20:39:13', NULL);
INSERT INTO `forum_post_replys` VALUES (4, 'balas', 21, 78, '2020-09-15 10:28:01', '2020-09-15 10:28:01', NULL);
INSERT INTO `forum_post_replys` VALUES (5, 'balas', 21, 78, '2020-09-15 10:28:17', '2020-09-15 10:28:17', NULL);
INSERT INTO `forum_post_replys` VALUES (6, 'balas', 21, 78, '2020-09-15 10:29:21', '2020-09-15 10:29:21', NULL);
INSERT INTO `forum_post_replys` VALUES (7, 'balas', 21, 78, '2020-09-15 10:29:49', '2020-09-15 10:29:49', NULL);
INSERT INTO `forum_post_replys` VALUES (8, 'balasan', 13, 13, '2020-09-16 09:41:23', '2020-09-16 09:41:23', NULL);
INSERT INTO `forum_post_replys` VALUES (9, 'balasan', 13, 13, '2020-09-16 09:41:50', '2020-09-16 09:41:50', NULL);
INSERT INTO `forum_post_replys` VALUES (10, 'iya', 21, 78, '2020-09-21 08:51:48', '2020-09-21 08:51:48', NULL);
INSERT INTO `forum_post_replys` VALUES (11, 'iya', 21, 78, '2020-09-21 08:52:01', '2020-09-21 08:52:01', NULL);
INSERT INTO `forum_post_replys` VALUES (12, 'bukan skincare korea', 15, 13, '2020-09-22 13:10:26', '2020-09-22 13:10:26', NULL);
INSERT INTO `forum_post_replys` VALUES (13, 'bukan skincare korea', 15, 13, '2020-09-22 13:10:31', '2020-09-22 13:10:31', NULL);
INSERT INTO `forum_post_replys` VALUES (14, 'bukan skincare korea', 15, 13, '2020-09-22 13:10:33', '2020-09-22 13:10:33', NULL);
INSERT INTO `forum_post_replys` VALUES (15, 'balasan', 28, 78, '2020-09-23 12:28:28', '2020-09-23 12:29:02', 0);
INSERT INTO `forum_post_replys` VALUES (16, 'coba merk xyz cuma 5000', 28, 75, '2020-09-23 12:32:41', '2020-09-23 12:33:02', 0);

-- ----------------------------
-- Table structure for forum_posts
-- ----------------------------
DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE `forum_posts`  (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int(123) NOT NULL,
  `room_id` int(123) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_posts
-- ----------------------------
INSERT INTO `forum_posts` VALUES (1, 'Sunscreen yang bikin muka makin berminyak', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting.', 'frontend/images/placeholder.jpg', 14, 1, '2020-08-23 10:51:46', '2020-08-23 10:51:46');
INSERT INTO `forum_posts` VALUES (2, 'Sunblock yang bikin sikut makin membatu dan tambah menguning', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting.', 'frontend/images/placeholder.jpg', 14, 2, '2020-08-23 10:51:46', '2020-08-23 10:51:46');
INSERT INTO `forum_posts` VALUES (4, 'Kenali 7 Kebiasaan yang Membuat Jerawat Betah di Wajah', 'dih ini lo', 'frontend/images/placeholder.jpg', 14, 3, '2020-08-26 18:49:06', '2020-08-26 18:49:06');
INSERT INTO `forum_posts` VALUES (5, 'lupa pake krim sore', 'guys, ada yang pernah ngalamin ga misalnya gini efeknya tuh gitu', 'frontend/images/placeholder.jpg', 14, 3, '2020-08-26 19:50:43', '2020-08-26 19:50:43');
INSERT INTO `forum_posts` VALUES (10, 'hellow', 'halo phoebe\'s!', 'frontend/images/placeholder.jpg', 14, 3, '2020-08-26 22:59:31', '2020-08-26 22:59:31');
INSERT INTO `forum_posts` VALUES (11, 'Title', 'writings', 'frontend/images/placeholder.jpg', 14, 3, '2020-08-26 23:05:19', '2020-08-26 23:05:19');
INSERT INTO `forum_posts` VALUES (12, 'Temukan topik yang kamu suka', 'apa hayooo??!', 'frontend/images/placeholder.jpg', 14, 1, '2020-08-26 23:06:41', '2020-08-26 23:06:41');
INSERT INTO `forum_posts` VALUES (13, 'Kenali 7 Kebiasaan yang Membuat Jerawat Betah di Wajah', 'CUCI MUKA!', 'frontend/images/placeholder.jpg', 13, 1, '2020-08-27 13:46:14', '2020-08-27 13:46:14');
INSERT INTO `forum_posts` VALUES (15, 'rekomendasi skincare dong', 'skincare apa ya yang cocok buat kulit kombinasi&nbsp;', 'uploads/forum/post/thumbnail/UKdPj6cGlmzCMIMQgn9ZnrFjLOlJZM0FXv2Lr90z.jpeg', 13, 3, '2020-08-28 09:19:09', '2020-08-28 09:19:09');
INSERT INTO `forum_posts` VALUES (16, 'rekomendasi skincare', 'Skin Care Apa ya yang cocok buat kulit kombinasi', 'uploads/forum/post/thumbnail/sk7khLXKBsUZRU4RjSAb35jvff4WPduo5teekxxB.jpeg', 14, 4, '2020-08-29 14:16:52', '2020-08-29 14:16:52');
INSERT INTO `forum_posts` VALUES (17, 'Rekomendasi skincare', 'Tolong dong rekomendasi skincare korea murah', 'uploads/forum/post/thumbnail/PavzZ7jcZVdzp4t5iSRvRu2hxNjgfn78ltYBdqc5.jpeg', 13, 5, '2020-08-29 16:59:06', '2020-08-29 16:59:06');
INSERT INTO `forum_posts` VALUES (18, 'Rekomendasi skincare', 'Tolong dong rekomendasi skincare korea murah', 'uploads/forum/post/thumbnail/eDOkfOdqPvzkazFbTwA20rlpcaCNrCB8RsNaOIBa.jpeg', 13, 5, '2020-08-29 16:59:07', '2020-08-29 16:59:07');
INSERT INTO `forum_posts` VALUES (20, 'coba prekom', 'rekom', 'uploads/forum/post/thumbnail/WgpTEl31mxcL36gTj76xQGN2m5Nq7OgMUDHodW5U.png', 78, 2, '2020-09-15 10:23:18', '2020-09-15 10:23:18');
INSERT INTO `forum_posts` VALUES (22, 'Ada yang penah pakai skincare dari korea?', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'uploads/forum/post/thumbnail/dGe7WNzLPCqaNCFdOdRAYxvaqNEuz565id0xqwLL.png', 13, 5, '2020-09-23 12:11:29', '2020-09-23 12:11:29');
INSERT INTO `forum_posts` VALUES (23, 'pernah pake merek XXX', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'uploads/forum/post/thumbnail/sWX0V4sx4KsC2Oj9xOvGNuDv5qDldjNzh3JXQF9e.png', 75, 5, '2020-09-23 12:16:43', '2020-09-23 12:16:43');
INSERT INTO `forum_posts` VALUES (24, 'obrolan', 'ada apa?', 'uploads/forum/post/thumbnail/3ISrYKd1lI9R0l9kxzEXWrY8apvk5zDqiqySmYsA.png', 78, 1, '2020-09-23 12:19:27', '2020-09-23 12:19:27');
INSERT INTO `forum_posts` VALUES (27, 'Gold', 'writing', 'uploads/forum/post/thumbnail/sidmhKsL7d7Qdww6SMPmpDnoMW7M0vopkUmBtgsT.png', 78, 1, '2020-09-23 12:21:46', '2020-09-23 12:21:46');
INSERT INTO `forum_posts` VALUES (28, 'Harga skincare korea termurah', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'uploads/forum/post/thumbnail/EO4G43lJt6QKETjF1lHsNctxcM5osK8cuCZ1MGN7.png', 13, 5, '2020-09-23 12:23:33', '2020-09-23 12:23:33');

-- ----------------------------
-- Table structure for forum_produk_rekomendasi
-- ----------------------------
DROP TABLE IF EXISTS `forum_produk_rekomendasi`;
CREATE TABLE `forum_produk_rekomendasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_produk_rekomendasi
-- ----------------------------
INSERT INTO `forum_produk_rekomendasi` VALUES (1, 26, 28, '2020-09-12 14:28:05', '2020-09-12 14:28:05');
INSERT INTO `forum_produk_rekomendasi` VALUES (2, 26, 30, '2020-09-12 14:28:05', '2020-09-12 14:28:05');
INSERT INTO `forum_produk_rekomendasi` VALUES (3, 27, 27, '2020-09-12 14:42:20', '2020-09-12 14:42:20');
INSERT INTO `forum_produk_rekomendasi` VALUES (4, 27, 29, '2020-09-12 14:42:20', '2020-09-12 14:42:20');
INSERT INTO `forum_produk_rekomendasi` VALUES (5, 20, 28, '2020-09-15 10:23:18', '2020-09-15 10:23:18');
INSERT INTO `forum_produk_rekomendasi` VALUES (6, 20, 29, '2020-09-15 10:23:18', '2020-09-15 10:23:18');
INSERT INTO `forum_produk_rekomendasi` VALUES (7, 22, 26, '2020-09-23 12:11:29', '2020-09-23 12:11:29');
INSERT INTO `forum_produk_rekomendasi` VALUES (8, 28, 28, '2020-09-23 12:23:33', '2020-09-23 12:23:33');

-- ----------------------------
-- Table structure for forum_produk_rekomendasi_balasan
-- ----------------------------
DROP TABLE IF EXISTS `forum_produk_rekomendasi_balasan`;
CREATE TABLE `forum_produk_rekomendasi_balasan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_produk_rekomendasi_balasan
-- ----------------------------
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (1, 27, 148, '2020-09-12 15:24:22', '2020-09-12 15:24:22');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (2, 28, 149, '2020-09-12 15:43:47', '2020-09-12 15:43:47');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (3, 28, 150, '2020-09-12 15:44:05', '2020-09-12 15:44:05');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (4, 28, 151, '2020-09-12 15:45:45', '2020-09-12 15:45:45');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (5, 28, 152, '2020-09-12 15:48:20', '2020-09-12 15:48:20');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (6, 46, 153, '2020-09-12 15:49:22', '2020-09-12 15:49:22');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (7, 27, 8, '2020-09-16 09:41:23', '2020-09-16 09:41:23');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (8, 28, 8, '2020-09-16 09:41:23', '2020-09-16 09:41:23');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (9, 29, 9, '2020-09-16 09:41:51', '2020-09-16 09:41:51');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (10, 27, 10, '2020-09-21 08:51:48', '2020-09-21 08:51:48');
INSERT INTO `forum_produk_rekomendasi_balasan` VALUES (11, 27, 11, '2020-09-21 08:52:01', '2020-09-21 08:52:01');

-- ----------------------------
-- Table structure for forum_room_user_log
-- ----------------------------
DROP TABLE IF EXISTS `forum_room_user_log`;
CREATE TABLE `forum_room_user_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(123) NOT NULL,
  `room_id` int(123) NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_room_user_log
-- ----------------------------
INSERT INTO `forum_room_user_log` VALUES (1, 19, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (2, 20, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (3, 21, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (4, 22, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (5, 23, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (6, 24, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (7, 25, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (8, 27, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (9, 19, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (10, 20, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (11, 21, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (12, 22, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (13, 23, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (14, 24, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (15, 25, 2, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (16, 27, 1, '2020-08-27 07:46:33', '2020-08-27 07:46:33');
INSERT INTO `forum_room_user_log` VALUES (51, 13, 2, '2020-08-28 09:18:06', '2020-08-28 09:18:06');
INSERT INTO `forum_room_user_log` VALUES (52, 13, 3, '2020-08-28 09:18:12', '2020-08-28 09:18:12');
INSERT INTO `forum_room_user_log` VALUES (53, 14, 4, '2020-08-29 14:16:05', '2020-08-29 14:16:05');
INSERT INTO `forum_room_user_log` VALUES (55, 13, 5, '2020-08-29 17:00:47', '2020-08-29 17:00:47');
INSERT INTO `forum_room_user_log` VALUES (57, 69, 5, '2020-09-04 13:25:43', '2020-09-04 13:25:43');
INSERT INTO `forum_room_user_log` VALUES (58, 69, 2, '2020-09-04 16:29:22', '2020-09-04 16:29:22');
INSERT INTO `forum_room_user_log` VALUES (61, 63, 1, '2020-09-08 12:51:05', '2020-09-08 12:51:05');
INSERT INTO `forum_room_user_log` VALUES (62, 57, 1, '2020-09-12 13:42:12', '2020-09-12 13:42:12');
INSERT INTO `forum_room_user_log` VALUES (68, 57, 5, '2020-09-12 14:34:50', '2020-09-12 14:34:50');
INSERT INTO `forum_room_user_log` VALUES (69, 57, 2, '2020-09-12 14:45:09', '2020-09-12 14:45:09');
INSERT INTO `forum_room_user_log` VALUES (70, 78, 2, '2020-09-15 10:21:29', '2020-09-15 10:21:29');
INSERT INTO `forum_room_user_log` VALUES (71, 13, 1, '2020-09-23 10:30:38', '2020-09-23 10:30:38');

-- ----------------------------
-- Table structure for forum_rooms
-- ----------------------------
DROP TABLE IF EXISTS `forum_rooms`;
CREATE TABLE `forum_rooms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `topics_id` int(123) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_rooms
-- ----------------------------
INSERT INTO `forum_rooms` VALUES (1, 'Kulit Berminyak', 'Ga Setiap saat harus glowing', 'frontend/images/placeholder.jpg', 3, '2020-08-23 11:33:19', '2020-08-23 11:33:19');
INSERT INTO `forum_rooms` VALUES (2, 'Kulit Berdebu', 'Ga Setiap saat harus glowang', 'frontend/images/placeholder.jpg', 1, '2020-08-23 11:33:42', '2020-08-23 11:33:42');
INSERT INTO `forum_rooms` VALUES (3, 'Kulit Berjerawat', 'semua pasti ada jalan', 'uploads/forum/room-thumbnail/zVuZfinA9m6IdRgt2SJsQ2Vf762nJsu3ctJQ7daN.jpeg', 2, '2020-08-24 20:31:30', '2020-08-24 20:31:30');
INSERT INTO `forum_rooms` VALUES (4, 'Kulit kombinasi', 'perpaduan 2 jenis kulit', 'uploads/forum/room-thumbnail/zc6GBfn7vVUhRo59Sy0DDXMnkkvkbnOL3D1IkdJY.jpeg', 2, '2020-08-29 14:15:29', '2020-08-29 14:15:29');
INSERT INTO `forum_rooms` VALUES (5, 'Skincare korea', 'glowing banget', 'uploads/forum/room-thumbnail/v2jEe7IMYUzdalwRdtKjbQ1M1dxGdMjI81gMqZTK.jpeg', 2, '2020-08-29 16:56:54', '2020-08-29 16:56:54');

-- ----------------------------
-- Table structure for forum_topics
-- ----------------------------
DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE `forum_topics`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(123) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_topics
-- ----------------------------
INSERT INTO `forum_topics` VALUES (1, 'Make Up');
INSERT INTO `forum_topics` VALUES (2, 'Skin Care');
INSERT INTO `forum_topics` VALUES (3, 'Hair');
INSERT INTO `forum_topics` VALUES (4, 'Ponny Baute');
INSERT INTO `forum_topics` VALUES (5, 'Lainnya');

-- ----------------------------
-- Table structure for general_settings
-- ----------------------------
DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE `general_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frontend_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `admin_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `admin_login_background` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `admin_login_sidebar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `site_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `facebook` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `twitter` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `youtube` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `google_plus` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of general_settings
-- ----------------------------
INSERT INTO `general_settings` VALUES (1, 'default', 'uploads/logo/pfdIuiMeXGkDAIpPEUrvUCbQrOHu484nbGfz77zB.png', 'uploads/admin_logo/4CtnIjW1rTN28eDq5vr5r3w2yehwOuoxvHDwK6pL.jpeg', 'uploads/admin_login_background/aXRgW6E8Os0YGX90d6KXO2ZYEmcLSYT36e7E1fYy.jpeg', 'uploads/admin_login_sidebar/TQeNCnYWmYDQlVV1vRnmgtdHzAkTItSZcgC8E6z4.jpeg', 'uploads/favicon/FVcAMmtJWvl15Fv9RhtW3Q5dDu4rQ2A157nv5UnF.jpeg', 'Ponny', 'Surabaya', 'Active eCommerce CMS is a Multi vendor system is such a platform to build a border less marketplace.', '08222222222', 'ponnydev@gmail.com', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', 'https://www.youtube.com', 'https://www.googleplus.com', '2020-09-08 14:27:06', '2020-09-08 14:27:06');

-- ----------------------------
-- Table structure for home_categories
-- ----------------------------
DROP TABLE IF EXISTS `home_categories`;
CREATE TABLE `home_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subsubcategories` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of home_categories
-- ----------------------------
INSERT INTO `home_categories` VALUES (3, 5, '[\"18\"]', 1, '2020-07-18 14:56:05', '2020-07-18 14:56:05');

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rtl` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES (1, 'English', 'en', 0, '2019-01-20 19:13:20', '2019-01-20 19:13:20');
INSERT INTO `languages` VALUES (3, 'Bangla', 'bd', 0, '2019-02-17 13:35:37', '2019-02-18 13:49:51');
INSERT INTO `languages` VALUES (4, 'Arabic', 'sa', 1, '2019-04-29 01:34:12', '2019-04-29 01:34:12');
INSERT INTO `languages` VALUES (5, 'Indonesia', 'id', 0, '2020-07-02 11:51:48', '2020-07-02 11:51:48');
INSERT INTO `languages` VALUES (6, 'Indonesia', 'id', 0, '2020-07-02 11:51:48', '2020-07-02 11:51:48');

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of links
-- ----------------------------

-- ----------------------------
-- Table structure for log_skin
-- ----------------------------
DROP TABLE IF EXISTS `log_skin`;
CREATE TABLE `log_skin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `skin_type_id` int(11) NOT NULL,
  `skin_concern_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `skin_concern_id`(`skin_concern_id`) USING BTREE,
  INDEX `skin_type_id`(`skin_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_skin
-- ----------------------------
INSERT INTO `log_skin` VALUES (1, 26, 2, 1);
INSERT INTO `log_skin` VALUES (2, 26, 3, 5);
INSERT INTO `log_skin` VALUES (3, 36, 2, 1);
INSERT INTO `log_skin` VALUES (4, 35, 3, 6);
INSERT INTO `log_skin` VALUES (5, 29, 5, 2);
INSERT INTO `log_skin` VALUES (6, 35, 4, 4);

-- ----------------------------
-- Table structure for m_variable
-- ----------------------------
DROP TABLE IF EXISTS `m_variable`;
CREATE TABLE `m_variable`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param_1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `param_2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `param_3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `param_4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `var_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_variable
-- ----------------------------
INSERT INTO `m_variable` VALUES (1, 'masalah', 'Barang belum saya terima', 'belum_terima', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (2, 'masalah', 'Barang rusak/cacat/pecah', 'rusak', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (3, 'masalah', 'Jumlah barang kurang', 'kurang', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (4, 'masalah', 'Barang tidak sesuai pesanan', 'tidak_sesuai', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (5, 'masalah', 'Lainnya', 'lainnya', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (6, 'solusi', 'Pengembalian Dana', 'dana_kembali', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (7, 'solusi', 'Penggantian Barang', 'ganti_barang', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (8, 'status', 'Meminta Persetujuan Admin', 'request', 'badge-info', 'komplain', 0);
INSERT INTO `m_variable` VALUES (9, 'status', 'Disetujui', 'approve', 'badge-success', 'komplain', 0);
INSERT INTO `m_variable` VALUES (10, 'status', 'Ditolak', 'reject', 'badge-danger', 'komplain', 0);
INSERT INTO `m_variable` VALUES (11, 'status', 'Permintaan resi pengembalian', 'request_upload_resi', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (12, 'status', 'Bukti transfer pengembalian dana', 'upload_bukti_refund', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (13, 'status', 'Komplain dibatalkan', 'komplain_batal', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (15, 'status', 'Menunggu Verifikasi Admin', 'dalam_verifikasi', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (16, '100000', '50000', '10', '5000', 'affiliate_cupon', 0);
INSERT INTO `m_variable` VALUES (17, 'paid', 'Terbayar', NULL, NULL, 'status_bayar', 0);
INSERT INTO `m_variable` VALUES (18, 'unpaid', 'Belum dibayar', NULL, NULL, 'status_bayar', 0);
INSERT INTO `m_variable` VALUES (19, 'waiting_confrim', 'Menunggu Konfirmasi Pembayaran', NULL, NULL, 'status_bayar', 0);
INSERT INTO `m_variable` VALUES (20, 'pending', 'Pending', NULL, NULL, 'status_kirim', 0);
INSERT INTO `m_variable` VALUES (21, 'on_delivery', 'Dalam Pengiriman', NULL, NULL, 'status_kirim', 0);
INSERT INTO `m_variable` VALUES (22, 'delivered', 'Terkirim', NULL, NULL, 'status_kirim', 0);
INSERT INTO `m_variable` VALUES (23, 'completed', 'Selesai', NULL, NULL, 'status_kirim', 0);
INSERT INTO `m_variable` VALUES (24, 'unpaid', 'pending', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (25, 'paid', 'pending', 'Terbayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (26, 'paid', 'on_review', 'Proses Konfirmasi', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (27, 'paid', 'on_delivery', 'Dalam Pengiriman', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (28, 'paid', 'delivered', 'Terkirim', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (29, 'paid', 'completed', 'Selesai', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (30, 'paid', 'komplain', 'Sedang Komplain', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (31, 'unpaid', 'pending', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (32, 'unpaid', 'on_review', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (33, 'unpaid', 'on_delivery', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (34, 'unpaid', 'delivered', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (35, 'unpaid', 'completed', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (36, 'unpaid', 'komplain', 'Belum dibayar', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (37, 'komplain', 'Sedang Komplain', 'Sedang Komplain', NULL, 'status_kirim', 0);
INSERT INTO `m_variable` VALUES (38, 'status', 'Komplain Selesai', 'completed', NULL, 'komplain', 0);
INSERT INTO `m_variable` VALUES (39, 'waiting_confrim', 'pending', 'Menunggu Konfirmasi Pembayaran', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (40, 'expire', 'pending', 'Pesanan Dibatalkan', NULL, 'status_order', 0);
INSERT INTO `m_variable` VALUES (41, 'expire', 'kadarluarsa', NULL, NULL, 'status_bayar', 0);
INSERT INTO `m_variable` VALUES (42, 'mt_tf_bca', 'BCA Virtual Account', '', NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (43, 'mt_tf_bni', 'BNI Virtual Account', '', NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (44, 'mt_tf_permata', 'Permata Virtual Account', '', NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (45, 'mt_tf_mdr', 'Mandiri Bill Payment', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (46, 'Indomaret', 'Indomaret', '', NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (47, 'alfamart', 'Alfamart', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (48, 'gopay', 'GOPAY', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (49, 'ovo', 'OVO', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (50, 'qris', 'QRIS', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (51, 'manual_bca', 'Transfer BCA (Manual)', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (52, 'manual_mandiri', 'Transfer Mandiri (Manual)', NULL, NULL, 'method_bayar', 0);
INSERT INTO `m_variable` VALUES (53, 'manual_permata', 'Transfer Permata (Manual)', NULL, NULL, 'method_bayar', 0);

-- ----------------------------
-- Table structure for membership_period_unit
-- ----------------------------
DROP TABLE IF EXISTS `membership_period_unit`;
CREATE TABLE `membership_period_unit`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of membership_period_unit
-- ----------------------------
INSERT INTO `membership_period_unit` VALUES (1, 'Tahunan');
INSERT INTO `membership_period_unit` VALUES (2, 'Bulanan');
INSERT INTO `membership_period_unit` VALUES (3, 'Mingguan');

-- ----------------------------
-- Table structure for membership_tier
-- ----------------------------
DROP TABLE IF EXISTS `membership_tier`;
CREATE TABLE `membership_tier`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(123) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `min` int(11) NOT NULL,
  `period` int(255) NOT NULL,
  `period_unit` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `is_product_istimewa` int(11) NULL DEFAULT 0,
  `is_kupon_ultah` int(1) NOT NULL DEFAULT 0,
  `is_product_spesial` int(1) NOT NULL DEFAULT 0,
  `poin_order` double NOT NULL DEFAULT 0,
  `free_shiping_cost` int(11) NOT NULL DEFAULT 0,
  `free_shiping_min_order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of membership_tier
-- ----------------------------
INSERT INTO `membership_tier` VALUES (1, 'Dewy', 1000000, 1, 2, '2020-08-25 13:40:55', '2020-09-09 09:03:51', 0, 0, 0, 0.01, 25000, 250000);
INSERT INTO `membership_tier` VALUES (2, 'Healthy', 3000000, 1, 2, '2020-08-25 15:15:00', '2020-09-09 09:04:06', 0, 0, 1, 0.02, 30000, 200000);
INSERT INTO `membership_tier` VALUES (3, 'Glowing', 10000000, 1, 2, '2020-08-25 15:38:35', '2020-09-09 09:04:26', 0, 1, 1, 0.03, 35000, 150000);
INSERT INTO `membership_tier` VALUES (4, 'Oh happy', 0, 3, 2, '2020-08-25 15:44:47', '2020-09-09 09:04:49', 0, 1, 1, 0.05, 40000, 100000);

-- ----------------------------
-- Table structure for membership_user_log
-- ----------------------------
DROP TABLE IF EXISTS `membership_user_log`;
CREATE TABLE `membership_user_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `total_purchase` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `ends_on` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of membership_user_log
-- ----------------------------
INSERT INTO `membership_user_log` VALUES (1, 13, 1, 756000, '2020-08-29 14:40:19', '2020-09-02 11:00:57', '2020-09-26 00:00:00');
INSERT INTO `membership_user_log` VALUES (7, 45, 1, 0, '2020-08-31 23:17:47', '2020-08-31 23:17:47', '2021-08-31 00:00:00');
INSERT INTO `membership_user_log` VALUES (8, 46, 1, 0, '2020-08-31 23:23:42', '2020-08-31 23:23:42', '2021-08-31 00:00:00');
INSERT INTO `membership_user_log` VALUES (9, 47, 1, 0, '2020-08-31 23:33:56', '2020-08-31 23:33:56', '2021-08-31 00:00:00');
INSERT INTO `membership_user_log` VALUES (10, 16, 1, 0, '2020-08-31 23:55:34', '2020-08-31 23:55:34', '2021-08-31 00:00:00');
INSERT INTO `membership_user_log` VALUES (11, 27, 1, 0, '2020-09-01 08:29:03', '2020-09-01 08:29:03', '2021-09-01 00:00:00');
INSERT INTO `membership_user_log` VALUES (12, 19, 1, 0, '2020-09-01 08:56:25', '2020-09-01 08:56:25', '2021-09-01 00:00:00');
INSERT INTO `membership_user_log` VALUES (13, 48, 1, 0, '2020-09-01 09:08:31', '2020-09-01 09:08:31', '2021-09-01 00:00:00');
INSERT INTO `membership_user_log` VALUES (14, 50, 1, 0, '2020-09-01 09:32:34', '2020-09-01 09:32:34', '2021-09-01 00:00:00');
INSERT INTO `membership_user_log` VALUES (15, 40, 1, 0, '2020-09-01 11:37:25', '2020-09-01 11:37:25', '2021-09-01 00:00:00');
INSERT INTO `membership_user_log` VALUES (16, 51, 1, 0, '2020-09-01 12:19:19', '2020-09-01 12:19:19', '2021-09-01 00:00:00');
INSERT INTO `membership_user_log` VALUES (17, 53, 1, 0, '2020-09-04 07:41:15', '2020-09-04 07:41:15', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (18, 53, 1, 0, '2020-09-04 07:48:48', '2020-09-04 07:48:48', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (19, 53, 1, 0, '2020-09-04 07:48:56', '2020-09-04 07:48:56', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (20, 53, 1, 0, '2020-09-04 07:49:02', '2020-09-04 07:49:02', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (21, 53, 1, 0, '2020-09-04 07:49:06', '2020-09-04 07:49:06', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (22, 53, 1, 0, '2020-09-04 07:51:47', '2020-09-04 07:51:47', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (23, 53, 1, 0, '2020-09-04 08:00:48', '2020-09-04 08:00:48', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (24, 53, 1, 0, '2020-09-04 08:00:55', '2020-09-04 08:00:55', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (25, 53, 1, 0, '2020-09-04 08:01:00', '2020-09-04 08:01:00', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (26, 53, 1, 0, '2020-09-04 08:01:03', '2020-09-04 08:01:03', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (27, 53, 1, 0, '2020-09-04 08:01:30', '2020-09-04 08:01:30', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (28, 53, 1, 0, '2020-09-04 08:01:35', '2020-09-04 08:01:35', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (29, 53, 1, 0, '2020-09-04 08:01:40', '2020-09-04 08:01:40', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (30, 53, 1, 0, '2020-09-04 08:01:45', '2020-09-04 08:01:45', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (31, 53, 1, 0, '2020-09-04 08:05:14', '2020-09-04 08:05:14', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (32, 53, 1, 0, '2020-09-04 08:05:23', '2020-09-04 08:05:23', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (33, 53, 1, 0, '2020-09-04 08:06:17', '2020-09-04 08:06:17', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (34, 53, 1, 0, '2020-09-04 08:06:22', '2020-09-04 08:06:22', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (35, 53, 1, 0, '2020-09-04 08:07:49', '2020-09-04 08:07:49', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (36, 53, 1, 0, '2020-09-04 08:09:51', '2020-09-04 08:09:51', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (37, 53, 1, 0, '2020-09-04 08:09:58', '2020-09-04 08:09:58', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (38, 53, 1, 0, '2020-09-04 08:10:04', '2020-09-04 08:10:04', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (39, 53, 1, 0, '2020-09-04 08:10:11', '2020-09-04 08:10:11', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (40, 53, 1, 0, '2020-09-04 08:11:50', '2020-09-04 08:11:50', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (41, 53, 1, 0, '2020-09-04 08:12:18', '2020-09-04 08:12:18', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (42, 53, 1, 0, '2020-09-04 08:14:27', '2020-09-04 08:14:27', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (43, 53, 1, 0, '2020-09-04 08:14:32', '2020-09-04 08:14:32', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (44, 53, 1, 0, '2020-09-04 08:14:49', '2020-09-04 08:14:49', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (45, 53, 1, 0, '2020-09-04 08:15:06', '2020-09-04 08:15:06', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (46, 53, 1, 0, '2020-09-04 08:15:12', '2020-09-04 08:15:12', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (47, 53, 1, 0, '2020-09-04 08:15:43', '2020-09-04 08:15:43', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (48, 53, 1, 0, '2020-09-04 08:25:09', '2020-09-04 08:25:09', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (49, 53, 1, 0, '2020-09-04 08:26:04', '2020-09-04 08:26:04', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (50, 53, 1, 0, '2020-09-04 08:26:27', '2020-09-04 08:26:27', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (51, 53, 1, 0, '2020-09-04 08:26:49', '2020-09-04 08:26:49', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (52, 53, 1, 0, '2020-09-04 08:26:55', '2020-09-04 08:26:55', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (53, 53, 1, 0, '2020-09-04 08:27:10', '2020-09-04 08:27:10', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (54, 53, 1, 0, '2020-09-04 08:27:15', '2020-09-04 08:27:15', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (55, 53, 1, 0, '2020-09-04 08:28:20', '2020-09-04 08:28:20', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (56, 53, 1, 0, '2020-09-04 08:28:25', '2020-09-04 08:28:25', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (57, 53, 1, 0, '2020-09-04 08:35:48', '2020-09-04 08:35:48', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (58, 53, 1, 0, '2020-09-04 08:38:21', '2020-09-04 08:38:21', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (59, 53, 1, 0, '2020-09-04 08:38:26', '2020-09-04 08:38:26', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (60, 53, 1, 0, '2020-09-04 08:38:29', '2020-09-04 08:38:29', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (61, 67, 1, 0, '2020-09-04 08:38:30', '2020-09-04 08:38:30', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (62, 53, 4, 0, '2020-09-04 10:12:04', '2020-09-04 10:12:04', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (63, 69, 1, 0, '2020-09-04 10:27:05', '2020-09-04 10:27:05', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (64, 31, 1, 0, '2020-09-04 13:23:56', '2020-09-04 13:23:56', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (65, 63, 1, 0, '2020-09-04 15:31:22', '2020-09-04 15:31:22', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (66, 14, 1, 0, '2020-09-04 19:44:06', '2020-09-04 19:44:06', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (67, 56, 1, 0, '2020-09-04 20:28:54', '2020-09-04 20:28:54', '2020-11-03 00:00:00');
INSERT INTO `membership_user_log` VALUES (68, 54, 1, 0, '2020-09-05 10:40:34', '2020-09-05 10:40:34', '2020-11-04 00:00:00');
INSERT INTO `membership_user_log` VALUES (69, 57, 1, 0, '2020-09-05 10:41:48', '2020-09-05 10:41:48', '2020-11-04 00:00:00');
INSERT INTO `membership_user_log` VALUES (70, 70, 1, 0, '2020-09-05 11:48:33', '2020-09-05 11:48:33', '2020-11-04 00:00:00');
INSERT INTO `membership_user_log` VALUES (71, 71, 1, 0, '2020-09-05 15:38:07', '2020-09-05 15:38:07', '2020-11-04 00:00:00');
INSERT INTO `membership_user_log` VALUES (72, 60, 1, 0, '2020-09-05 18:55:44', '2020-09-05 18:55:44', '2020-11-04 00:00:00');
INSERT INTO `membership_user_log` VALUES (73, 72, 1, 0, '2020-09-07 12:28:20', '2020-09-07 12:28:20', '2020-11-06 00:00:00');
INSERT INTO `membership_user_log` VALUES (74, 73, 1, 0, '2020-09-08 14:55:27', '2020-09-08 14:55:27', '2020-11-07 00:00:00');
INSERT INTO `membership_user_log` VALUES (75, 13, 2, 0, '2020-09-08 15:24:51', '2020-09-08 15:24:51', '2020-11-07 00:00:00');
INSERT INTO `membership_user_log` VALUES (76, 53, 1, 0, '2020-09-09 11:40:48', '2020-09-09 11:40:48', '2020-11-08 00:00:00');
INSERT INTO `membership_user_log` VALUES (77, 74, 1, 0, '2020-09-11 12:36:13', '2020-09-11 12:36:13', '2020-11-10 00:00:00');
INSERT INTO `membership_user_log` VALUES (78, 75, 1, 0, '2020-09-11 13:06:39', '2020-09-11 13:06:39', '2020-11-10 00:00:00');
INSERT INTO `membership_user_log` VALUES (79, 76, 1, 0, '2020-09-11 13:13:57', '2020-09-11 13:13:57', '2020-11-10 00:00:00');
INSERT INTO `membership_user_log` VALUES (80, 57, 2, 0, '2020-09-11 16:57:13', '2020-09-11 16:57:13', '2020-11-10 00:00:00');
INSERT INTO `membership_user_log` VALUES (81, 77, 1, 0, '2020-09-11 20:15:12', '2020-09-11 20:15:12', '2020-11-10 00:00:00');
INSERT INTO `membership_user_log` VALUES (82, 78, 1, 0, '2020-09-14 13:26:00', '2020-09-14 13:26:00', '2020-11-13 00:00:00');
INSERT INTO `membership_user_log` VALUES (83, 79, 1, 0, '2020-09-15 09:21:06', '2020-09-15 09:21:06', '2020-11-14 00:00:00');
INSERT INTO `membership_user_log` VALUES (84, 80, 1, 0, '2020-09-22 18:47:32', '2020-09-22 18:47:32', '2020-11-21 00:00:00');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (8, 2, 12, 'https://myponny.store/product/sabun-muka-JDrph', '2020-07-04 07:47:13', '2020-07-04 07:47:13');
INSERT INTO `messages` VALUES (9, 2, 14, 'silakan dicoba', '2020-07-04 07:47:46', '2020-07-04 07:47:46');
INSERT INTO `messages` VALUES (10, 2, 14, 'oj=k', '2020-07-09 20:41:58', '2020-07-09 20:41:58');
INSERT INTO `messages` VALUES (11, 2, 14, 'ok', '2020-07-09 21:12:48', '2020-07-09 21:12:48');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_access_tokens_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('125ce8289850f80d9fea100325bf892fbd0deba1f87dbfc2ab81fb43d57377ec24ed65f7dc560e46', 1, 1, 'Personal Access Token', '[]', 0, '2019-07-30 11:51:13', '2019-07-30 11:51:13', '2020-07-30 10:51:13');
INSERT INTO `oauth_access_tokens` VALUES ('293d2bb534220c070c4e90d25b5509965d23d3ddbc05b1e29fb4899ae09420ff112dbccab1c6f504', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 13:00:04', '2019-08-04 13:00:04', '2020-08-04 12:00:04');
INSERT INTO `oauth_access_tokens` VALUES ('5363e91c7892acdd6417aa9c7d4987d83568e229befbd75be64282dbe8a88147c6c705e06c1fb2bf', 1, 1, 'Personal Access Token', '[]', 0, '2019-07-13 13:44:28', '2019-07-13 13:44:28', '2020-07-13 12:44:28');
INSERT INTO `oauth_access_tokens` VALUES ('681b4a4099fac5e12517307b4027b54df94cbaf0cbf6b4bf496534c94f0ccd8a79dd6af9742d076b', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 14:23:06', '2019-08-04 14:23:06', '2020-08-04 13:23:06');
INSERT INTO `oauth_access_tokens` VALUES ('6d229e3559e568df086c706a1056f760abc1370abe74033c773490581a042442154afa1260c4b6f0', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 14:32:12', '2019-08-04 14:32:12', '2020-08-04 13:32:12');
INSERT INTO `oauth_access_tokens` VALUES ('6efc0f1fc3843027ea1ea7cd35acf9c74282f0271c31d45a164e7b27025a315d31022efe7bb94aaa', 1, 1, 'Personal Access Token', '[]', 0, '2019-08-08 09:35:26', '2019-08-08 09:35:26', '2020-08-08 08:35:26');
INSERT INTO `oauth_access_tokens` VALUES ('7745b763da15a06eaded371330072361b0524c41651cf48bf76fc1b521a475ece78703646e06d3b0', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 14:29:44', '2019-08-04 14:29:44', '2020-08-04 13:29:44');
INSERT INTO `oauth_access_tokens` VALUES ('815b625e239934be293cd34479b0f766bbc1da7cc10d464a2944ddce3a0142e943ae48be018ccbd0', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-22 09:07:47', '2019-07-22 09:07:47', '2020-07-22 08:07:47');
INSERT INTO `oauth_access_tokens` VALUES ('8921a4c96a6d674ac002e216f98855c69de2568003f9b4136f6e66f4cb9545442fb3e37e91a27cad', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 13:05:05', '2019-08-04 13:05:05', '2020-08-04 12:05:05');
INSERT INTO `oauth_access_tokens` VALUES ('8d8b85720304e2f161a66564cec0ecd50d70e611cc0efbf04e409330086e6009f72a39ce2191f33a', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 13:44:35', '2019-08-04 13:44:35', '2020-08-04 12:44:35');
INSERT INTO `oauth_access_tokens` VALUES ('bcaaebdead4c0ef15f3ea6d196fd80749d309e6db8603b235e818cb626a5cea034ff2a55b66e3e1a', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 14:14:32', '2019-08-04 14:14:32', '2020-08-04 13:14:32');
INSERT INTO `oauth_access_tokens` VALUES ('c25417a5c728073ca8ba57058ded43d496a9d2619b434d2a004dd490a64478c08bc3e06ffc1be65d', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-30 08:45:31', '2019-07-30 08:45:31', '2020-07-30 07:45:31');
INSERT INTO `oauth_access_tokens` VALUES ('c7423d85b2b5bdc5027cb283be57fa22f5943cae43f60b0ed27e6dd198e46f25e3501b3081ed0777', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-05 12:02:59', '2019-08-05 12:02:59', '2020-08-05 11:02:59');
INSERT INTO `oauth_access_tokens` VALUES ('e76f19dbd5c2c4060719fb1006ac56116fd86f7838b4bf74e2c0a0ac9696e724df1e517dbdb357f4', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-15 09:53:40', '2019-07-15 09:53:40', '2020-07-15 08:53:40');
INSERT INTO `oauth_access_tokens` VALUES ('ed7c269dd6f9a97750a982f62e0de54749be6950e323cdfef892a1ec93f8ddbacf9fe26e6a42180e', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-13 13:36:45', '2019-07-13 13:36:45', '2020-07-13 12:36:45');
INSERT INTO `oauth_access_tokens` VALUES ('f6d1475bc17a27e389000d3df4da5c5004ce7610158b0dd414226700c0f6db48914637b4c76e1948', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 14:22:01', '2019-08-04 14:22:01', '2020-08-04 13:22:01');
INSERT INTO `oauth_access_tokens` VALUES ('f85e4e444fc954430170c41779a4238f84cd6fed905f682795cd4d7b6a291ec5204a10ac0480eb30', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-30 13:38:49', '2019-07-30 13:38:49', '2020-07-30 12:38:49');
INSERT INTO `oauth_access_tokens` VALUES ('f8bf983a42c543b99128296e4bc7c2d17a52b5b9ef69670c629b93a653c6a4af27be452e0c331f79', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 14:28:55', '2019-08-04 14:28:55', '2020-08-04 13:28:55');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_clients_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES (1, NULL, 'Laravel Personal Access Client', 'eR2y7WUuem28ugHKppFpmss7jPyOHZsMkQwBo1Jj', 'http://localhost', 1, 0, 0, '2019-07-13 13:17:34', '2019-07-13 13:17:34');
INSERT INTO `oauth_clients` VALUES (2, NULL, 'Laravel Password Grant Client', 'WLW2Ol0GozbaXEnx1NtXoweYPuKEbjWdviaUgw77', 'http://localhost', 0, 1, 0, '2019-07-13 13:17:34', '2019-07-13 13:17:34');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_personal_access_clients_client_id_index`(`client_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES (1, 1, '2019-07-13 13:17:34', '2019-07-13 13:17:34');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_refresh_tokens_access_token_id_index`(`access_token_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `variation` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `price` double NULL DEFAULT NULL,
  `tax` double NOT NULL DEFAULT 0,
  `shipping_cost` double NOT NULL DEFAULT 0,
  `quantity` int(11) NULL DEFAULT NULL,
  `payment_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unpaid',
  `delivery_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'pending',
  `shipping_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pickup_point_id` int(11) NULL DEFAULT NULL,
  `product_referral_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `review_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, 1, 14, 55, '', 148000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-04 07:47:58', '2020-09-04 08:04:53', NULL);
INSERT INTO `order_details` VALUES (2, 2, 14, 54, '', 640000, 0, 0, 2, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-04 08:15:06', '2020-09-04 08:23:40', NULL);
INSERT INTO `order_details` VALUES (3, 3, 14, 54, '', 320000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-04 08:27:15', '2020-09-04 08:39:57', NULL);
INSERT INTO `order_details` VALUES (4, 4, 14, 55, '', 148000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-04 13:39:30', '2020-09-09 10:25:01', NULL);
INSERT INTO `order_details` VALUES (5, 5, 14, 48, '', 610000, 0, 0, 2, 'expire', 'pending', NULL, NULL, NULL, '2020-09-04 20:55:33', '2020-09-09 10:25:01', NULL);
INSERT INTO `order_details` VALUES (6, 5, 14, 57, '', 75000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-04 20:55:33', '2020-09-09 10:25:01', NULL);
INSERT INTO `order_details` VALUES (7, 6, 14, 54, '', 320000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-05 11:15:12', '2020-09-05 11:24:17', NULL);
INSERT INTO `order_details` VALUES (8, 7, 14, 52, '', 320000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-05 11:17:16', '2020-09-09 10:25:01', NULL);
INSERT INTO `order_details` VALUES (9, 8, 14, 40, '', 230000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-05 11:25:20', '2020-09-05 11:26:04', NULL);
INSERT INTO `order_details` VALUES (10, 9, 14, 47, '', 700000, 0, 0, 2, 'paid', 'on_delivery', NULL, NULL, NULL, '2020-09-05 11:34:21', '2020-09-05 11:35:16', NULL);
INSERT INTO `order_details` VALUES (11, 10, 14, 54, '', 640000, 0, 0, 2, 'paid', 'on_delivery', NULL, NULL, NULL, '2020-09-05 11:45:33', '2020-09-05 18:51:08', NULL);
INSERT INTO `order_details` VALUES (12, 11, 14, 55, '', 148000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-05 19:05:12', '2020-09-09 10:25:01', NULL);
INSERT INTO `order_details` VALUES (13, 12, 14, 53, '', 276000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-05 20:46:01', '2020-09-05 20:47:54', NULL);
INSERT INTO `order_details` VALUES (14, 13, 14, 53, '', 276000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-07 17:03:54', '2020-09-10 00:00:02', NULL);
INSERT INTO `order_details` VALUES (15, 13, 14, 54, '', 320000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-07 17:03:54', '2020-09-10 00:00:02', NULL);
INSERT INTO `order_details` VALUES (16, 13, 14, 55, '', 148000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-07 17:03:54', '2020-09-10 00:00:02', NULL);
INSERT INTO `order_details` VALUES (17, 14, 14, 54, '', 320000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-07 20:18:26', '2020-09-07 20:31:32', NULL);
INSERT INTO `order_details` VALUES (18, 15, 14, 55, '', 148000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-07 20:32:52', '2020-09-10 00:00:02', NULL);
INSERT INTO `order_details` VALUES (19, 16, 14, 53, '', 276000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-07 20:43:25', '2020-09-07 20:43:53', NULL);
INSERT INTO `order_details` VALUES (20, 17, 14, 31, '', 86000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-08 14:53:38', '2020-09-08 15:21:19', NULL);
INSERT INTO `order_details` VALUES (21, 17, 14, 54, '', 320000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-08 14:53:38', '2020-09-08 15:21:19', NULL);
INSERT INTO `order_details` VALUES (22, 18, 14, 48, '', 999999.99, 0, 0, 10, 'paid', 'pending', NULL, NULL, NULL, '2020-09-08 15:22:21', '2020-09-08 15:24:48', NULL);
INSERT INTO `order_details` VALUES (23, 19, 14, 47, '', 630000, 0, 0, 2, 'expire', 'pending', NULL, NULL, NULL, '2020-09-09 09:49:32', '2020-09-09 09:50:42', NULL);
INSERT INTO `order_details` VALUES (24, 20, 14, 54, '', 320000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-09 11:27:54', '2020-09-12 00:00:02', NULL);
INSERT INTO `order_details` VALUES (25, 20, 14, 52, '', 640000, 0, 0, 2, 'expire', 'pending', NULL, NULL, NULL, '2020-09-09 11:27:54', '2020-09-12 00:00:02', NULL);
INSERT INTO `order_details` VALUES (26, 21, 14, 54, '', 320000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-09 11:38:49', '2020-09-09 11:45:03', NULL);
INSERT INTO `order_details` VALUES (27, 22, 14, 52, '', 320000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-09 12:54:09', '2020-09-09 13:00:03', NULL);
INSERT INTO `order_details` VALUES (28, 23, 14, 52, '', 320000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-09 14:08:19', '2020-09-09 14:24:25', NULL);
INSERT INTO `order_details` VALUES (29, 24, 14, 48, '', 305000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-09 14:25:28', '2020-09-09 14:33:02', NULL);
INSERT INTO `order_details` VALUES (37, 26, 14, 27, '', 16000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (38, 26, 14, 28, '', 44000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (39, 26, 14, 34, '', 23000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (40, 26, 14, 55, '', 148000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (41, 26, 14, 30, '', 170000, 0, 0, 2, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (42, 26, 14, 33, '', 2740500, 0, 0, 9, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (43, 26, 14, 45, '', 230000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-11 16:55:44', '2020-09-11 16:56:46', NULL);
INSERT INTO `order_details` VALUES (44, 27, 14, 33, '', 2740500, 0, 0, 9, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-11 16:58:48', '2020-09-12 08:55:03', NULL);
INSERT INTO `order_details` VALUES (47, 29, 14, 29, '', 110000, 0, 0, 1, 'paid', 'on_delivery', NULL, NULL, NULL, '2020-09-12 10:02:02', '2020-09-12 10:19:48', 13);
INSERT INTO `order_details` VALUES (48, 30, 14, 51, '', 2520000, 0, 0, 9, 'paid', 'pending', NULL, NULL, NULL, '2020-09-12 10:25:09', '2020-09-12 10:25:31', NULL);
INSERT INTO `order_details` VALUES (49, 31, 14, 35, '', 140000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-12 10:26:10', '2020-09-12 14:15:03', NULL);
INSERT INTO `order_details` VALUES (50, 32, 14, 33, '', 304500, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-12 13:22:15', '2020-09-12 14:20:03', NULL);
INSERT INTO `order_details` VALUES (51, 33, 14, 26, '', 40000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-12 14:50:04', '2020-09-13 14:50:07', NULL);
INSERT INTO `order_details` VALUES (52, 34, 14, 49, '', 2208000, 0, 0, 8, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-12 14:56:08', '2020-09-12 15:05:03', NULL);
INSERT INTO `order_details` VALUES (53, 35, 14, 51, '', 2520000, 0, 0, 9, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-12 16:13:09', '2020-09-12 16:19:51', 15);
INSERT INTO `order_details` VALUES (54, 35, 14, 47, '', 315000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-12 16:13:09', '2020-09-12 16:15:43', NULL);
INSERT INTO `order_details` VALUES (55, 36, 14, 27, '', 16000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-16 11:58:51', '2020-09-19 00:00:01', NULL);
INSERT INTO `order_details` VALUES (56, 36, 14, 29, '', 110000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-16 11:58:51', '2020-09-19 00:00:01', NULL);
INSERT INTO `order_details` VALUES (57, 37, 14, 30, '', 85000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 10:30:47', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (58, 38, 14, 51, '', 280000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 11:20:33', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (59, 38, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 11:20:33', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (60, 39, 14, 41, '', 126500, 0, 0, 2, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 11:23:50', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (61, 39, 14, 27, '', 32000, 0, 0, 2, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 11:23:50', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (62, 40, 14, 51, '', 280000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-17 11:27:06', '2020-09-17 11:28:24', NULL);
INSERT INTO `order_details` VALUES (63, 40, 14, 53, '', 276000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-17 11:27:06', '2020-09-17 11:28:24', NULL);
INSERT INTO `order_details` VALUES (64, 41, 14, 54, '', 320000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-17 11:29:51', '2020-09-17 11:31:10', NULL);
INSERT INTO `order_details` VALUES (65, 42, 14, 41, '', 63250, 0, 0, 1, 'expire', 'on_delivery', NULL, NULL, NULL, '2020-09-17 11:32:25', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (66, 43, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 11:36:01', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (67, 44, 14, 30, '', 85000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-17 11:38:31', '2020-09-17 11:39:21', NULL);
INSERT INTO `order_details` VALUES (68, 45, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 11:40:31', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (69, 46, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 13:23:21', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (70, 47, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 13:29:35', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (71, 48, 14, 41, '', 63250, 0, 0, 1, 'paid', 'on_delivery', NULL, NULL, NULL, '2020-09-17 13:34:17', '2020-09-17 13:36:28', NULL);
INSERT INTO `order_details` VALUES (72, 49, 14, 54, '', 320000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 13:39:24', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (73, 50, 14, 54, '', 320000, 0, 0, 1, 'expire', 'on_delivery', NULL, NULL, NULL, '2020-09-17 13:41:22', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (74, 51, 14, 51, '', 280000, 0, 0, 1, 'expire', 'delivered', NULL, NULL, NULL, '2020-09-17 13:43:37', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (75, 52, 14, 33, '', 304500, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-17 14:08:44', '2020-09-17 14:10:22', NULL);
INSERT INTO `order_details` VALUES (76, 53, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 14:34:58', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (77, 54, 14, 41, '', 63250, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 14:35:48', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (78, 55, 14, 33, '', 304500, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-17 14:39:57', '2020-09-20 00:00:02', NULL);
INSERT INTO `order_details` VALUES (79, 56, 14, 27, '', 16000, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-19 12:44:58', '2020-09-19 13:22:01', 17);
INSERT INTO `order_details` VALUES (80, 56, 14, 33, '', 304500, 0, 0, 1, 'paid', 'delivered', NULL, NULL, NULL, '2020-09-19 12:44:58', '2020-09-19 13:00:03', NULL);
INSERT INTO `order_details` VALUES (81, 57, 14, 29, '', 110000, 0, 0, 1, 'unpaid', 'pending', NULL, NULL, NULL, '2020-09-22 11:25:05', '2020-09-22 11:25:05', NULL);
INSERT INTO `order_details` VALUES (82, 58, 14, 47, '', 315000, 0, 0, 1, 'expire', 'pending', NULL, NULL, NULL, '2020-09-22 11:26:24', '2020-09-23 11:26:30', NULL);
INSERT INTO `order_details` VALUES (83, 59, 14, 33, '', 304500, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-22 11:27:44', '2020-09-22 11:31:26', NULL);
INSERT INTO `order_details` VALUES (84, 60, 14, 30, '', 85000, 0, 0, 1, 'paid', 'pending', NULL, NULL, NULL, '2020-09-22 11:29:28', '2020-09-22 11:30:39', NULL);

-- ----------------------------
-- Table structure for order_product_point
-- ----------------------------
DROP TABLE IF EXISTS `order_product_point`;
CREATE TABLE `order_product_point`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_point_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `log_product_point` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `review_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_product_point
-- ----------------------------
INSERT INTO `order_product_point` VALUES (1, 3, 1, '2020-09-05 20:46:01', '2020-09-05 20:46:01', 12, '{\"id\":3,\"product_id\":30,\"jml_point\":10,\"is_deleted\":0,\"is_publish\":1,\"created_at\":\"2020-07-21 14:53:25\",\"updated_at\":\"2020-07-21 14:53:45\"}', NULL);
INSERT INTO `order_product_point` VALUES (2, 3, 1, '2020-09-07 17:03:54', '2020-09-07 17:03:54', 13, '{\"id\":3,\"product_id\":30,\"jml_point\":10,\"is_deleted\":0,\"is_publish\":1,\"created_at\":\"2020-07-21 14:53:25\",\"updated_at\":\"2020-07-21 14:53:45\"}', NULL);
INSERT INTO `order_product_point` VALUES (3, 4, 1, '2020-09-09 11:27:54', '2020-09-09 11:27:54', 20, '{\"id\":4,\"product_id\":54,\"jml_point\":1500,\"is_deleted\":0,\"is_publish\":1,\"created_at\":\"2020-09-01 14:04:17\",\"updated_at\":\"2020-09-01 14:07:18\"}', NULL);
INSERT INTO `order_product_point` VALUES (4, 5, 1, '2020-09-12 16:13:09', '2020-09-12 16:13:09', 35, '{\"id\":5,\"product_id\":49,\"jml_point\":7000,\"is_deleted\":0,\"is_publish\":1,\"created_at\":\"2020-09-11 16:27:53\",\"updated_at\":\"2020-09-11 16:32:04\"}', NULL);

-- ----------------------------
-- Table structure for order_sample
-- ----------------------------
DROP TABLE IF EXISTS `order_sample`;
CREATE TABLE `order_sample`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `confrim_courier` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `confrim_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `review_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_sample
-- ----------------------------
INSERT INTO `order_sample` VALUES (1, 12, 4, 1, '2020-09-05 20:46:01', '2020-09-05 20:46:01', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (2, 13, 2, 1, '2020-09-07 17:03:54', '2020-09-07 17:03:54', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (3, 20, 2, 1, '2020-09-09 11:27:54', '2020-09-09 11:27:54', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (4, 20, 3, 1, '2020-09-09 11:27:54', '2020-09-09 11:27:54', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (6, 26, 4, 1, '2020-09-11 16:55:44', '2020-09-11 16:55:44', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (7, 35, 3, 1, '2020-09-12 16:13:09', '2020-09-12 16:13:09', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (8, 35, 4, 1, '2020-09-12 16:13:09', '2020-09-12 16:13:09', NULL, NULL, NULL);
INSERT INTO `order_sample` VALUES (9, 56, 2, 1, '2020-09-19 12:44:58', '2020-09-19 12:44:58', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `guest_id` int(11) NULL DEFAULT NULL,
  `shipping_address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `payment_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `payment_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'unpaid',
  `payment_details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `grand_total` double NULL DEFAULT NULL,
  `coupon_discount` double NOT NULL DEFAULT 0,
  `code` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `date` int(20) NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT 0,
  `delivery_viewed` int(1) NOT NULL DEFAULT 0,
  `payment_status_viewed` int(1) NULL DEFAULT 0,
  `commission_calculated` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `customer_addres_id` int(11) NULL DEFAULT NULL,
  `shipping_info` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `mitrans_val` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `confrim_courier` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `confrim_resi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `delivery_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_confrim_order` int(1) NULL DEFAULT 0,
  `uniq_tf_manual` int(3) NULL DEFAULT NULL,
  `free_ongkir` double(8, 0) NULL DEFAULT NULL,
  `tgl_terkirim` timestamp(0) NULL DEFAULT NULL,
  `delivery_info` varchar(4000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_confrim_date` timestamp(0) NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 53, NULL, NULL, 'qris', 'paid', NULL, 165000, 0, '20200904-07475834', 1599180478, 1, 0, 1, 0, '2020-09-04 07:47:58', '2020-09-04 08:05:22', 18, '{\"code\":\"jne\",\"services\":\"OKE\",\"cost\":\"17000\"}', '{\"status_code\":\"201\",\"status_message\":\"GO-PAY transaction is created\",\"transaction_id\":\"463fce55-c22d-427a-b63d-d2171599fc76\",\"order_id\":\"20200904-07475834\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"165000.00\",\"currency\":\"IDR\",\"payment_type\":\"gopay\",\"transaction_time\":\"2020-09-04 07:47:58\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"actions\":[{\"name\":\"generate-qr-code\",\"method\":\"GET\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/gopay\\/463fce55-c22d-427a-b63d-d2171599fc76\\/qr-code\"},{\"name\":\"deeplink-redirect\",\"method\":\"GET\",\"url\":\"https:\\/\\/simulator.sandbox.midtrans.com\\/gopay\\/ui\\/checkout?referenceid=IP9gplkQd4&callback_url=https%3A%2F%2Fmyponnylive.com%3Forder_id%3D20200904-07475834\"},{\"name\":\"get-status\",\"method\":\"GET\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/463fce55-c22d-427a-b63d-d2171599fc76\\/status\"},{\"name\":\"cancel\",\"method\":\"POST\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/463fce55-c22d-427a-b63d-d2171599fc76\\/cancel\"}]}', NULL, NULL, 'completed', 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (2, 53, NULL, NULL, 'manual_bca', 'paid', NULL, 640000, 0, '20200904-08150612', 1599182106, 1, 0, 0, 1, '2020-09-04 08:15:06', '2020-09-04 08:26:03', 18, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', NULL, NULL, NULL, 'completed', 1, 24, 19000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (3, 53, NULL, NULL, 'mt_tf_bni', 'paid', NULL, 320000, 0, '20200904-08271540', 1599182835, 1, 0, 1, 0, '2020-09-04 08:27:15', '2020-09-04 08:39:57', 18, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"9445abf7-8921-41bb-94cf-d03a283022b5\",\"order_id\":\"20200904-08271540\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-04 08:27:15\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bni\",\"va_number\":\"9884090596919431\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 19000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (4, 69, NULL, NULL, 'mt_tf_mdr', 'expire', NULL, 164000, 0, '20200904-13393030', 1599201570, 1, 0, 1, 0, '2020-09-04 13:39:30', '2020-09-09 10:28:02', 19, '{\"code\":\"J&T\",\"services\":\"EZ\",\"cost\":\"16000\"}', '{\"status_code\":\"201\",\"status_message\":\"OK, Mandiri Bill transaction is successful\",\"transaction_id\":\"0974c33d-413e-4ec5-bc05-d459abf30ae4\",\"order_id\":\"20200904-13393030\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"164000.00\",\"currency\":\"IDR\",\"payment_type\":\"echannel\",\"transaction_time\":\"2020-09-04 13:39:30\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"bill_key\":\"770056218231\",\"biller_code\":\"70012\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (5, 56, NULL, NULL, 'mt_tf_mdr', 'expire', NULL, 685000, 0, '20200904-20553356', 1599227733, 0, 0, 1, 0, '2020-09-04 20:55:33', '2020-09-09 10:25:01', 20, '{\"code\":\"gojek\",\"services\":\"instant\",\"cost\":\"110000\"}', '{\"status_code\":\"201\",\"status_message\":\"OK, Mandiri Bill transaction is successful\",\"transaction_id\":\"f7457a3f-1ae7-4325-86b4-31381ebb771d\",\"order_id\":\"20200904-20553356\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"685000.00\",\"currency\":\"IDR\",\"payment_type\":\"echannel\",\"transaction_time\":\"2020-09-04 20:55:33\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"bill_key\":\"914519193348\",\"biller_code\":\"70012\"}', NULL, NULL, 'pending', 0, NULL, 110000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (6, 13, NULL, NULL, 'manual_mandiri', 'paid', NULL, 320000, 0, '20200905-11151218', 1599279312, 1, 0, 0, 1, '2020-09-05 11:15:12', '2020-09-05 11:24:17', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', NULL, 'sicepat', '000753176648', 'delivered', 0, 68, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (7, 13, NULL, NULL, 'qris', 'expire', NULL, 320000, 0, '20200905-11171629', 1599279436, 0, 0, 1, 0, '2020-09-05 11:17:16', '2020-09-09 10:25:01', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"GO-PAY transaction is created\",\"transaction_id\":\"befc6e8a-77a4-4b12-a8bc-ba57336dbd86\",\"order_id\":\"20200905-11171629\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"gopay\",\"transaction_time\":\"2020-09-05 11:17:17\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"actions\":[{\"name\":\"generate-qr-code\",\"method\":\"GET\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/gopay\\/befc6e8a-77a4-4b12-a8bc-ba57336dbd86\\/qr-code\"},{\"name\":\"deeplink-redirect\",\"method\":\"GET\",\"url\":\"https:\\/\\/simulator.sandbox.midtrans.com\\/gopay\\/ui\\/checkout?referenceid=nypQBZgd8A&callback_url=https%3A%2F%2Fmyponnylive.com%3Forder_id%3D20200905-11171629\"},{\"name\":\"get-status\",\"method\":\"GET\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/befc6e8a-77a4-4b12-a8bc-ba57336dbd86\\/status\"},{\"name\":\"cancel\",\"method\":\"POST\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/befc6e8a-77a4-4b12-a8bc-ba57336dbd86\\/cancel\"}]}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (8, 13, NULL, NULL, 'mt_tf_mdr', 'paid', NULL, 251000, 0, '20200905-11252074', 1599279920, 0, 0, 1, 0, '2020-09-05 11:25:20', '2020-09-05 11:26:04', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"OK, Mandiri Bill transaction is successful\",\"transaction_id\":\"a71754a5-f993-481e-9c43-53293d492550\",\"order_id\":\"20200905-11252074\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"251000.00\",\"currency\":\"IDR\",\"payment_type\":\"echannel\",\"transaction_time\":\"2020-09-05 11:25:20\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"bill_key\":\"680824318942\",\"biller_code\":\"70012\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (9, 13, NULL, NULL, 'mt_tf_mdr', 'paid', NULL, 700000, 0, '20200905-11342146', 1599280461, 1, 0, 1, 0, '2020-09-05 11:34:21', '2020-09-05 11:39:55', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"OK, Mandiri Bill transaction is successful\",\"transaction_id\":\"b23d29c0-7e2c-4a5e-a898-3a2838eeaddc\",\"order_id\":\"20200905-11342146\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"700000.00\",\"currency\":\"IDR\",\"payment_type\":\"echannel\",\"transaction_time\":\"2020-09-05 11:34:21\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"bill_key\":\"652369787796\",\"biller_code\":\"70012\"}', 'sicepat', '000753176648', 'komplain', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (10, 53, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 640000, 0, '20200905-11453330', 1599281133, 1, 0, 1, 0, '2020-09-05 11:45:33', '2020-09-05 18:51:08', 18, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"455d3276-4ddd-4983-81ad-eb22d08fb920\",\"order_id\":\"20200905-11453330\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"640000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-05 11:45:33\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905761578\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'on_delivery', 1, NULL, 19000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (11, 56, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 157000, 0, '20200905-19051229', 1599307512, 0, 0, 1, 0, '2020-09-05 19:05:12', '2020-09-09 10:25:01', 20, '{\"code\":\"jne\",\"services\":\"CTC\",\"cost\":\"9000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"6c3e2d4d-e6e8-4377-b13e-6a0c08becf31\",\"order_id\":\"20200905-19051229\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"157000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-05 19:05:12\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905423915\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (12, 56, NULL, NULL, 'qris', 'paid', NULL, 276000, 0, '20200905-20460144', 1599313561, 1, 0, 1, 1, '2020-09-05 20:46:01', '2020-09-05 20:48:22', 20, '{\"code\":\"jne\",\"services\":\"CTC\",\"cost\":\"9000\"}', '{\"status_code\":\"201\",\"status_message\":\"GO-PAY transaction is created\",\"transaction_id\":\"27e47601-e0ad-4438-b3d7-27e970ee2337\",\"order_id\":\"20200905-20460144\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"276000.00\",\"currency\":\"IDR\",\"payment_type\":\"gopay\",\"transaction_time\":\"2020-09-05 20:46:02\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"actions\":[{\"name\":\"generate-qr-code\",\"method\":\"GET\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/gopay\\/27e47601-e0ad-4438-b3d7-27e970ee2337\\/qr-code\"},{\"name\":\"deeplink-redirect\",\"method\":\"GET\",\"url\":\"https:\\/\\/simulator.sandbox.midtrans.com\\/gopay\\/ui\\/checkout?referenceid=NZjKzeRmFk&callback_url=https%3A%2F%2Fmyponnylive.com%3Forder_id%3D20200905-20460144\"},{\"name\":\"get-status\",\"method\":\"GET\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/27e47601-e0ad-4438-b3d7-27e970ee2337\\/status\"},{\"name\":\"cancel\",\"method\":\"POST\",\"url\":\"https:\\/\\/api.sandbox.veritrans.co.id\\/v2\\/27e47601-e0ad-4438-b3d7-27e970ee2337\\/cancel\"}]}', NULL, NULL, 'completed', 1, NULL, 9000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (13, 63, NULL, NULL, 'manual_bca', 'expire', NULL, 744000, 0, '20200907-17035490', 1599473034, 0, 1, 1, 0, '2020-09-07 17:03:54', '2020-09-10 00:00:02', 21, '{\"code\":\"sicepat\",\"services\":\"SIUNT\",\"cost\":\"10000\"}', NULL, NULL, NULL, 'pending', 0, 84, 10000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (14, 53, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 320000, 0, '20200907-20182672', 1599484706, 0, 0, 1, 0, '2020-09-07 20:18:26', '2020-09-07 20:31:32', 18, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"6ea84065-9b72-4572-ac6b-1688bd892354\",\"order_id\":\"20200907-20182672\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-07 20:18:26\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905943403\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 19000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (15, 53, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 167000, 0, '20200907-20325250', 1599485572, 0, 0, 1, 0, '2020-09-07 20:32:52', '2020-09-10 00:00:02', 18, '{\"code\":\"sicepat\",\"services\":\"SIUNT\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"91a265b3-33d6-401e-af62-5033fb4b5e08\",\"order_id\":\"20200907-20325250\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"167000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-07 20:32:52\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905278378\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (16, 53, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 276000, 0, '20200907-20432530', 1599486205, 0, 0, 1, 0, '2020-09-07 20:43:25', '2020-09-07 20:43:53', 18, '{\"code\":\"jne\",\"services\":\"OKE\",\"cost\":\"17000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"64c366a1-0c0a-4e3b-81b5-abf35ecaa7d3\",\"order_id\":\"20200907-20432530\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"276000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-07 20:43:25\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905685432\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 17000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (17, 13, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 406000, 0, '20200908-14533844', 1599551618, 0, 0, 1, 0, '2020-09-08 14:53:38', '2020-09-08 15:21:19', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"c18bfbb0-ae57-454e-ab89-8c383d5f5d92\",\"order_id\":\"20200908-14533844\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"406000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-08 14:53:39\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905147251\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (18, 13, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 3050000, 0, '20200908-15222134', 1599553341, 0, 0, 1, 0, '2020-09-08 15:22:21', '2020-09-08 15:24:48', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"63000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"4c0e2cdd-852e-4f85-9730-74c8af3174a3\",\"order_id\":\"20200908-15222134\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"3050000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-08 15:22:21\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905365031\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 63000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (19, 13, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 641000, 0, '20200909-09493271', 1599619772, 0, 0, 1, 0, '2020-09-09 09:49:32', '2020-09-09 09:50:42', 5, '{\"code\":\"sicepat\",\"services\":\"BEST\",\"cost\":\"41000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"4978885c-6d68-420a-a635-7862e3fa23e6\",\"order_id\":\"20200909-09493271\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"641000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-09 09:49:32\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905146035\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 30000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (20, 13, NULL, NULL, 'manual_permata', 'expire', NULL, 480000, 480000, '20200909-11275445', 1599625674, 0, 0, 1, 0, '2020-09-09 11:27:54', '2020-09-12 00:00:02', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', NULL, NULL, NULL, 'pending', 0, 81, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (21, 53, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 336000, 0, '20200909-11384983', 1599626329, 1, 0, 1, 0, '2020-09-09 11:38:49', '2020-09-09 11:45:03', 18, '{\"code\":\"sicepat\",\"services\":\"BEST\",\"cost\":\"41000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"cd5cb7ff-316f-4278-8b1f-a3a8541baece\",\"order_id\":\"20200909-11384983\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"336000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-09 11:38:49\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905029556\"}],\"fraud_status\":\"accept\"}', 'jnt', 'JP0661376867', 'delivered', 0, NULL, 25000, '2020-06-10 11:06:24', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Bu Atik\\/Bu admani\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:42:24\"}', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (22, 13, NULL, NULL, 'manual_bca', 'paid', NULL, 320000, 0, '20200909-12540921', 1599630849, 1, 0, 0, 1, '2020-09-09 12:54:09', '2020-09-09 13:00:03', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', NULL, 'sicepat', '000753176648', 'delivered', 0, 75, 21000, '2020-06-10 11:06:00', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Vita\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:19\"}', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (23, 13, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 320000, 0, '20200909-14081912', 1599635299, 0, 0, 1, 0, '2020-09-09 14:08:19', '2020-09-09 14:24:25', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"ddcf96dc-7bf2-4f3c-a9ca-6ab328edcdbd\",\"order_id\":\"20200909-14081912\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-09 14:08:19\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905295557\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (24, 13, NULL, NULL, 'manual_mandiri', 'expire', NULL, 305000, 0, '20200909-14252834', 1599636328, 0, 0, 1, 0, '2020-09-06 14:25:28', '2020-09-09 14:33:02', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', NULL, NULL, NULL, 'pending', 0, 81, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (26, 57, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 3430500, 0, '20200911-16554422', 1599818144, 0, 0, 1, 0, '2020-09-11 16:55:44', '2020-09-11 16:56:46', 23, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"84000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"aeb60eeb-ebe5-4a89-a4aa-c63d741f95ff\",\"order_id\":\"20200911-16554422\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"3430500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-11 16:55:45\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905782748\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 25000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (27, 57, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 2792500, 0, '20200911-16584836', 1599818328, 1, 0, 1, 0, '2020-09-11 16:58:48', '2020-09-12 08:55:03', 23, '{\"code\":\"sicepat\",\"services\":\"BEST\",\"cost\":\"82000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"b39b30ed-97e9-4565-8355-78f30a614c79\",\"order_id\":\"20200911-16584836\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"2792500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-11 16:58:48\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905904118\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'delivered', 0, NULL, 30000, '2020-06-10 11:06:00', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Vita\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:19\"}', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (29, 57, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 131000, 0, '20200912-10020267', 1599879722, 1, 0, 1, 0, '2020-09-12 10:02:02', '2020-09-12 10:07:39', 23, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"b70e0405-b823-459d-8358-7c3efe5655e9\",\"order_id\":\"20200912-10020267\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"131000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-12 10:02:02\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905413459\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000775872711', 'completed', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (30, 57, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 2532000, 0, '20200912-10250934', 1599881109, 0, 0, 1, 0, '2020-09-12 10:25:09', '2020-09-12 10:25:31', 23, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"42000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"13e87e86-9efa-481e-b8ad-690278b0197d\",\"order_id\":\"20200912-10250934\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"2532000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-12 10:25:09\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905697778\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 30000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (31, 57, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 161000, 0, '20200912-10261090', 1599881170, 1, 0, 1, 0, '2020-09-12 10:26:10', '2020-09-12 14:15:03', 23, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"fabd5417-7280-403c-bfb2-11408484cd90\",\"order_id\":\"20200912-10261090\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"161000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-12 10:26:10\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905900319\"}],\"fraud_status\":\"accept\"}', 'jnt', 'JP0661376867', 'delivered', 0, NULL, 0, '2020-06-10 11:06:24', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Bu Atik\\/Bu admani\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:42:24\"}', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (32, 77, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 304500, 0, '20200912-13221532', 1599891735, 1, 0, 1, 0, '2020-09-12 13:22:15', '2020-09-17 14:39:14', 24, '{\"code\":\"J&T\",\"services\":\"EZ\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"d8b60c07-bc76-4004-a095-7884b53b35d0\",\"order_id\":\"20200912-13221532\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"304500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-12 13:22:15\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905267296\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000437336302', 'completed', 1, NULL, 19000, '2020-08-29 10:08:00', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"bayu\",\"pod_date\":\"2020-08-29\",\"pod_time\":\"10:38\"}', '1992-02-04 00:00:00');
INSERT INTO `orders` VALUES (33, 77, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 57000, 0, '20200912-14500459', 1599897004, 0, 0, 1, 0, '2020-09-12 14:50:04', '2020-09-13 14:50:07', 24, '{\"code\":\"jne\",\"services\":\"OKE\",\"cost\":\"17000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"f957569d-1b88-45cf-96b8-4bb2b108c3ed\",\"order_id\":\"20200912-14500459\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"57000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-12 14:50:04\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905771054\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (34, 13, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 2220000, 0, '20200912-14560883', 1599897368, 1, 0, 1, 0, '2020-09-12 14:56:08', '2020-09-12 15:05:03', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"42000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"4633ef98-fa82-435f-a93e-578cb36f1ce4\",\"order_id\":\"20200912-14560883\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"2220000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-12 14:56:08\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905302907\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'delivered', 0, NULL, 30000, '2020-06-10 11:06:00', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Vita\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:19\"}', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (35, 13, NULL, NULL, 'manual_bca', 'paid', NULL, 2868000, 0, '20200912-16130926', 1599901989, 1, 0, 0, 1, '2020-09-12 16:13:09', '2020-09-12 16:18:42', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"63000\"}', NULL, 'sicepat', '000753176648', 'completed', 0, 79, 30000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (36, 13, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 147000, 0, '20200916-11585111', 1600232331, 0, 0, 1, 0, '2020-09-16 11:58:51', '2020-09-19 00:00:01', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"61d97474-f685-4bb0-9871-9e272fc08374\",\"order_id\":\"20200916-11585111\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"147000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-16 11:58:52\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905398604\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (37, 13, NULL, NULL, 'manual_bca', 'expire', NULL, 104000, 0, '20200917-10304746', 1600313447, 0, 0, 1, 0, '2020-09-17 10:30:47', '2020-09-20 00:00:02', 5, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', NULL, NULL, NULL, 'pending', 0, 31, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (38, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 343250, 0, '20200917-11203347', 1600316433, 0, 0, 1, 0, '2020-09-17 11:20:33', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"05efe270-6a7e-4923-bba0-fec6252f43fa\",\"order_id\":\"20200917-11203347\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"343250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:20:34\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905863157\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (39, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 179500, 0, '20200917-11235031', 1600316630, 0, 0, 1, 0, '2020-09-17 11:23:50', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"4e5f69ae-56e8-4762-a630-ec087c0b0895\",\"order_id\":\"20200917-11235031\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"179500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:23:50\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905327210\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (40, 70, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 556000, 0, '20200917-11270616', 1600316826, 0, 0, 1, 0, '2020-09-17 11:27:06', '2020-09-17 11:28:24', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"b9d35e5f-f117-4e78-a751-5bdb34cf29ee\",\"order_id\":\"20200917-11270616\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"556000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:27:06\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905676326\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (41, 70, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 320000, 0, '20200917-11295122', 1600316991, 0, 0, 1, 0, '2020-09-17 11:29:51', '2020-09-17 11:31:10', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"404178ee-a625-44cf-b975-ff9da01ab986\",\"order_id\":\"20200917-11295122\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:29:51\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905436160\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (42, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 84250, 0, '20200917-11322588', 1600317145, 1, 0, 1, 0, '2020-09-17 11:32:25', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"1b29ac84-a70c-4457-b705-937346f99be4\",\"order_id\":\"20200917-11322588\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:32:26\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905496994\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (43, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 84250, 0, '20200917-11360178', 1600317361, 1, 0, 1, 0, '2020-09-17 11:36:01', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"9ef32e1c-ff92-485a-8ca6-d6b8ad86cad0\",\"order_id\":\"20200917-11360178\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:36:01\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905169303\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (44, 70, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 106000, 0, '20200917-11383116', 1600317511, 1, 0, 1, 0, '2020-09-17 11:38:31', '2020-09-17 11:43:35', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"1a04d3cd-e796-431f-9d76-d5d6155eda78\",\"order_id\":\"20200917-11383116\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"106000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:38:32\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905400664\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (45, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 84250, 0, '20200917-11403137', 1600317631, 1, 0, 1, 0, '2020-09-17 11:40:31', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"2553173e-a420-4883-83a5-77f183d56760\",\"order_id\":\"20200917-11403137\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 11:40:31\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905871781\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (46, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 84250, 0, '20200917-13232137', 1600323801, 1, 0, 1, 0, '2020-09-17 13:23:21', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"d540cf29-406c-4c94-b334-2fef567d6f38\",\"order_id\":\"20200917-13232137\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 13:23:22\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905622866\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (47, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 84250, 0, '20200917-13293534', 1600324175, 1, 0, 1, 0, '2020-09-17 13:29:35', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"095ea6f8-5be1-40eb-8046-b0974584a2cd\",\"order_id\":\"20200917-13293534\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 13:29:35\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905124064\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (48, 70, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 84250, 0, '20200917-13341740', 1600324457, 1, 0, 1, 0, '2020-09-17 13:34:17', '2020-09-17 13:37:14', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"21aa5be7-d91b-4821-9afa-6628174b1d1d\",\"order_id\":\"20200917-13341740\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 13:34:17\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905308959\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'komplain', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (49, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 320000, 0, '20200917-13392443', 1600324764, 0, 0, 1, 0, '2020-09-17 13:39:24', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"bc5ec343-4e49-4ab4-acd1-a9df64815c34\",\"order_id\":\"20200917-13392443\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 13:39:24\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905990017\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (50, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 320000, 0, '20200917-13412238', 1600324882, 1, 0, 1, 0, '2020-09-17 13:41:22', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"4c87867b-a2fc-4f83-860c-b8960e80987c\",\"order_id\":\"20200917-13412238\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 13:41:22\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905224222\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (51, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 280000, 0, '20200917-13433742', 1600325017, 1, 0, 1, 0, '2020-09-17 13:43:37', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"bc0c4d91-2026-4d9f-b392-2637065c7936\",\"order_id\":\"20200917-13433742\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"280000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 13:43:37\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905787952\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'pending', 0, NULL, 21000, '2020-06-10 11:06:00', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Vita\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:19\"}', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (52, 77, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 304500, 0, '20200917-14084497', 1600326524, 0, 0, 1, 0, '2020-09-17 14:08:44', '2020-09-17 14:10:22', 24, '{\"code\":\"J&T\",\"services\":\"EZ\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"29fa72c6-4c9c-4daa-8485-243da4027e35\",\"order_id\":\"20200917-14084497\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"304500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 14:08:44\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905128011\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 19000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (53, 77, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 80250, 0, '20200917-14345893', 1600328098, 0, 0, 1, 0, '2020-09-17 14:34:58', '2020-09-20 00:00:02', 24, '{\"code\":\"jne\",\"services\":\"OKE\",\"cost\":\"17000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"4c9d6b52-6226-4607-86ce-a2f63a17bb6a\",\"order_id\":\"20200917-14345893\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"80250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 14:34:59\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905901463\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (54, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 84250, 0, '20200917-14354871', 1600328148, 1, 0, 1, 0, '2020-09-17 14:35:48', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"3c83a470-abfe-4e8f-9baf-0528a6269eb8\",\"order_id\":\"20200917-14354871\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"84250.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 14:35:48\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905887635\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (55, 70, NULL, NULL, 'mt_tf_bca', 'expire', NULL, 304500, 0, '20200917-14395741', 1600328397, 0, 0, 1, 0, '2020-09-17 14:39:57', '2020-09-20 00:00:02', 25, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"176fa840-0680-44d2-81c9-1075e2e194c0\",\"order_id\":\"20200917-14395741\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"304500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-17 14:39:57\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905272538\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 21000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (56, 13, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 320500, 0, '20200919-12445865', 1600494298, 1, 0, 1, 0, '2020-09-19 12:44:58', '2020-09-19 13:13:30', 5, '{\"code\":\"sicepat\",\"services\":\"REG\",\"cost\":\"21000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"78f7f59e-f831-474d-be75-ce3e86ecf91c\",\"order_id\":\"20200919-12445865\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"320500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-19 12:44:58\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905902997\"}],\"fraud_status\":\"accept\"}', 'sicepat', '000753176648', 'completed', 1, NULL, 21000, '2020-06-10 11:06:00', '{\"status\":\"DELIVERED\",\"pod_receiver\":\"Vita\",\"pod_date\":\"2020-06-10\",\"pod_time\":\"11:19\"}', '1992-02-06 00:00:00');
INSERT INTO `orders` VALUES (57, 13, NULL, NULL, 'manual_mandiri', 'unpaid', NULL, 129000, 0, '20200922-11250598', 1600748705, 0, 0, 0, 0, '2020-09-22 11:25:05', '2020-09-22 11:25:05', 5, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', NULL, NULL, NULL, 'pending', 0, 55, 0, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (58, 13, NULL, NULL, 'mt_tf_mdr', 'expire', NULL, 315000, 0, '20200922-11262496', 1600748784, 0, 0, 1, 0, '2020-09-22 11:26:24', '2020-09-23 11:26:30', 5, '{\"code\":\"J&T\",\"services\":\"EZ\",\"cost\":\"20000\"}', '{\"status_code\":\"201\",\"status_message\":\"OK, Mandiri Bill transaction is successful\",\"transaction_id\":\"c8b04e4c-0e2b-409f-bbba-45f7ce77741a\",\"order_id\":\"20200922-11262496\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"315000.00\",\"currency\":\"IDR\",\"payment_type\":\"echannel\",\"transaction_time\":\"2020-09-22 11:26:25\",\"transaction_status\":\"pending\",\"fraud_status\":\"accept\",\"bill_key\":\"615440194102\",\"biller_code\":\"70012\"}', NULL, NULL, 'pending', 0, NULL, 20000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (59, 13, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 304500, 0, '20200922-11274461', 1600748864, 0, 0, 1, 0, '2020-09-22 11:27:44', '2020-09-22 11:31:26', 5, '{\"code\":\"jne\",\"services\":\"OKE\",\"cost\":\"17000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"feb58ca4-730e-42dc-9240-6dbaf3eccb84\",\"order_id\":\"20200922-11274461\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"304500.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-22 11:27:44\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905173349\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 17000, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES (60, 13, NULL, NULL, 'mt_tf_bca', 'paid', NULL, 104000, 0, '20200922-11292814', 1600748968, 0, 0, 1, 0, '2020-09-22 11:29:28', '2020-09-22 11:30:39', 26, '{\"code\":\"jne\",\"services\":\"REG\",\"cost\":\"19000\"}', '{\"status_code\":\"201\",\"status_message\":\"Success, Bank Transfer transaction is created\",\"transaction_id\":\"6b688a2c-1eda-4f12-a23a-aab698f2f349\",\"order_id\":\"20200922-11292814\",\"merchant_id\":\"G445340905\",\"gross_amount\":\"104000.00\",\"currency\":\"IDR\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2020-09-22 11:29:29\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bca\",\"va_number\":\"40905126940\"}],\"fraud_status\":\"accept\"}', NULL, NULL, 'pending', 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for orders_komplain
-- ----------------------------
DROP TABLE IF EXISTS `orders_komplain`;
CREATE TABLE `orders_komplain`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `problem_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `solusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_setuju` int(11) NULL DEFAULT 0,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `admin_aprove` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `product_komplain` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `photos_komplain` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `photos_bukti_transfer` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomer_resi_pengembalian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_resi_pengembalian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders_komplain
-- ----------------------------
INSERT INTO `orders_komplain` VALUES (1, 9, 'tidak_sesuai', 'dana_kembali', 1, 'salah kirim', 'request', '2020-09-05 11:39:55', '2020-09-05 11:39:55', '[\"9\"]', '[\"uploads\\/products\\/review\\/AJmXftfCUgbhKDiS9kckNbiBOULfsXDdw2WbagyO.jpeg\"]', NULL, NULL, NULL, 0);
INSERT INTO `orders_komplain` VALUES (2, 29, 'rusak', 'dana_kembali', 1, 'barang pecah', 'completed', '2020-09-12 10:06:55', '2020-09-12 10:07:39', '[\"29\"]', NULL, NULL, NULL, NULL, 0);
INSERT INTO `orders_komplain` VALUES (3, 35, 'belum_terima', 'dana_kembali', 1, 'kembalikan uang saja', 'completed', '2020-09-12 16:18:12', '2020-09-12 16:18:42', '[\"35\"]', '[\"uploads\\/products\\/review\\/9UA5sPKb0m3sbEFwr7AJZP2nresA4qioObXWMGCi.jpeg\"]', NULL, NULL, NULL, 0);
INSERT INTO `orders_komplain` VALUES (4, 48, 'kurang', 'ganti_barang', 1, 'barang kurag', 'request', '2020-09-17 13:37:14', '2020-09-17 13:37:14', '[\"48\"]', NULL, NULL, NULL, NULL, 0);

-- ----------------------------
-- Table structure for orders_komplain_img
-- ----------------------------
DROP TABLE IF EXISTS `orders_komplain_img`;
CREATE TABLE `orders_komplain_img`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orders_komplain_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders_komplain_img
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('styawan_boyz@yahoo.com', '$2y$10$gnS0oPJTKy.v7nDKxwwBGe/7iatYhyJLkr7oP77kGVyS2KNcgjNzi', '2020-07-13 13:25:01');
INSERT INTO `password_resets` VALUES ('jokostyawan267@gmail.com', '$2y$10$P9vuTxcf6o0RcEA5VXEiA.x2LHXaEouCFyWJkIBfuYUBz/CWlrhNK', '2020-08-29 11:39:59');
INSERT INTO `password_resets` VALUES ('marcosoegimin@hotmail.com', '$2y$10$2rQdAK9nQIyPpOM6wN5ESOBAcsMrsOCR9xtSsKHmzGoWIZnAtF17S', '2020-08-31 17:19:40');
INSERT INTO `password_resets` VALUES ('s6134090@student.ubaya.ac.id', '$2y$10$Y0W/5Gq18yQnovnxVyaZOOa0.EasJbkHFU8EDpR6dNjNopzY28Sdu', '2020-08-31 20:54:01');
INSERT INTO `password_resets` VALUES ('msoegimin1@gmail.com', '$2y$10$eK3FH7HjCrT1VsEtsMnk..GGz4RZzeOglL0v.hmT0pN458Sz5XrzS', '2020-09-01 11:35:11');
INSERT INTO `password_resets` VALUES ('hadimrifqyfakhrul@gmail.com', '$2y$10$eiSOguiYoYygLhGyggNst.f0P3Sf7cqA/lLqSS.u.iqzKeeLafPnq', '2020-09-01 12:17:58');
INSERT INTO `password_resets` VALUES ('ditaken3@gmail.com', '$2y$10$b6XqYbDFq1NB0d4ibYqJCutAweWDDoCo3XRe7NNGNJgO6xIuRzyaC', '2020-09-01 16:18:10');

-- ----------------------------
-- Table structure for payment_tf_order
-- ----------------------------
DROP TABLE IF EXISTS `payment_tf_order`;
CREATE TABLE `payment_tf_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_img` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_rek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `an_rek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `order_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment_tf_order
-- ----------------------------
INSERT INTO `payment_tf_order` VALUES (1, 'uploads/bayar/TwP9nhwLO8iOvhtqhoysuwBe32j9GbWrSvULxDG6.jpeg', '0125852828', 'JOKO STYAWAN', 'BCA', '2020-09-04 08:15:42', '2020-09-04 08:15:42', 2);
INSERT INTO `payment_tf_order` VALUES (2, 'uploads/bayar/0RywWkq93B24LRoAaIFdFrT9pKUR0Nlgo2elFYza.jpeg', '2321412', 'dita', 'mandiri', '2020-09-05 11:15:48', '2020-09-05 11:15:48', 6);
INSERT INTO `payment_tf_order` VALUES (3, 'uploads/bayar/KMxizkwYrIC2bADrqsMPmPRDkZF8XXEDDkVCDzLs.jpeg', '123456', 'dita', 'bca', '2020-09-09 12:54:29', '2020-09-09 12:54:29', 22);
INSERT INTO `payment_tf_order` VALUES (4, 'uploads/bayar/O3huuOyD3Gk8MsCjH2hGRcaKpOkNoreZFYA6cLGZ.jpeg', '42423', 'dita', 'bca', '2020-09-12 16:13:51', '2020-09-12 16:13:51', 35);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `amount` double(8, 2) NOT NULL DEFAULT 0,
  `payment_details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `payment_method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `txn_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------

-- ----------------------------
-- Table structure for phoebe_choice
-- ----------------------------
DROP TABLE IF EXISTS `phoebe_choice`;
CREATE TABLE `phoebe_choice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of phoebe_choice
-- ----------------------------
INSERT INTO `phoebe_choice` VALUES (19, 27);
INSERT INTO `phoebe_choice` VALUES (20, 28);
INSERT INTO `phoebe_choice` VALUES (21, 29);
INSERT INTO `phoebe_choice` VALUES (22, 30);
INSERT INTO `phoebe_choice` VALUES (23, 31);
INSERT INTO `phoebe_choice` VALUES (24, 32);
INSERT INTO `phoebe_choice` VALUES (25, 33);
INSERT INTO `phoebe_choice` VALUES (26, 34);
INSERT INTO `phoebe_choice` VALUES (27, 35);
INSERT INTO `phoebe_choice` VALUES (28, 36);
INSERT INTO `phoebe_choice` VALUES (29, 37);
INSERT INTO `phoebe_choice` VALUES (30, 38);
INSERT INTO `phoebe_choice` VALUES (31, 39);
INSERT INTO `phoebe_choice` VALUES (32, 40);
INSERT INTO `phoebe_choice` VALUES (33, 41);
INSERT INTO `phoebe_choice` VALUES (34, 42);
INSERT INTO `phoebe_choice` VALUES (35, 43);
INSERT INTO `phoebe_choice` VALUES (36, 44);
INSERT INTO `phoebe_choice` VALUES (37, 45);
INSERT INTO `phoebe_choice` VALUES (38, 46);

-- ----------------------------
-- Table structure for pickup_points
-- ----------------------------
DROP TABLE IF EXISTS `pickup_points`;
CREATE TABLE `pickup_points`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pick_up_status` int(1) NULL DEFAULT NULL,
  `cash_on_pickup_status` int(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pickup_points
-- ----------------------------

-- ----------------------------
-- Table structure for policies
-- ----------------------------
DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of policies
-- ----------------------------
INSERT INTO `policies` VALUES (1, 'support_policy', NULL, '2019-10-29 19:54:45', '2019-01-22 12:13:15');
INSERT INTO `policies` VALUES (2, 'return_policy', NULL, '2019-10-29 19:54:47', '2019-01-24 12:40:11');
INSERT INTO `policies` VALUES (4, 'seller_policy', NULL, '2019-10-29 19:54:49', '2019-02-05 00:50:15');
INSERT INTO `policies` VALUES (5, 'terms', NULL, '2019-10-29 19:54:51', '2019-10-29 01:00:00');
INSERT INTO `policies` VALUES (6, 'privacy_policy', NULL, '2019-10-29 19:54:54', '2019-10-29 01:00:00');

-- ----------------------------
-- Table structure for product_best_sell
-- ----------------------------
DROP TABLE IF EXISTS `product_best_sell`;
CREATE TABLE `product_best_sell`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter` int(11) NOT NULL COMMENT '1.Terlaris 2.Brand 3.Kategori 4.Input Manual',
  `filtered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_best_sell
-- ----------------------------
INSERT INTO `product_best_sell` VALUES (1, 4, '[\"27\",\"28\",\"29\",\"30\",\"32\",\"33\",\"34\",\"35\"]');

-- ----------------------------
-- Table structure for product_point
-- ----------------------------
DROP TABLE IF EXISTS `product_point`;
CREATE TABLE `product_point`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `jml_point` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `is_publish` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_point
-- ----------------------------
INSERT INTO `product_point` VALUES (3, 30, 10, 0, 1, '2020-07-21 14:53:25', '2020-07-21 14:53:45');
INSERT INTO `product_point` VALUES (4, 54, 150, 0, 1, '2020-09-01 14:04:17', '2020-09-23 09:45:29');
INSERT INTO `product_point` VALUES (5, 49, 7000, 0, 1, '2020-09-11 16:27:53', '2020-09-11 16:32:04');

-- ----------------------------
-- Table structure for product_stocks
-- ----------------------------
DROP TABLE IF EXISTS `product_stocks`;
CREATE TABLE `product_stocks`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `variant` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `price` double(10, 2) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_stocks
-- ----------------------------
INSERT INTO `product_stocks` VALUES (1, 17, '100', 's-100', 25000.00, 10, '2020-07-18 08:54:45', '2020-07-18 08:54:45');
INSERT INTO `product_stocks` VALUES (2, 17, '200', 's-200', 50000.00, 10, '2020-07-18 08:56:27', '2020-07-18 08:56:27');
INSERT INTO `product_stocks` VALUES (3, 22, '50', 'SDDM-50', 0.00, 10, '2020-07-18 12:15:18', '2020-07-18 12:15:18');
INSERT INTO `product_stocks` VALUES (4, 23, '50', 'SDDM-50', 120000.00, 100, '2020-07-18 12:15:42', '2020-07-18 12:15:42');
INSERT INTO `product_stocks` VALUES (5, 24, '100', 'SDDM-100', 120000.00, 100, '2020-07-18 12:18:41', '2020-07-18 12:18:41');
INSERT INTO `product_stocks` VALUES (6, 26, '100', 'TOC-100', 100000.00, 100, '2020-07-18 14:26:54', '2020-07-18 14:26:54');
INSERT INTO `product_stocks` VALUES (7, 26, '60', 'TOC-60', 60000.00, 100, '2020-07-18 14:26:54', '2020-07-18 14:26:54');
INSERT INTO `product_stocks` VALUES (10, 55, '100ml-toucheofnude', 'HLSA2-100ml-toucheofnude', 149000.00, 0, '2020-07-22 16:59:39', '2020-09-02 13:59:47');
INSERT INTO `product_stocks` VALUES (11, 55, '100ml-pink', 'HLSA2-100ml-pink', 148000.00, 5, '2020-07-22 16:59:39', '2020-09-02 16:25:53');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `added_by` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NULL DEFAULT NULL,
  `brand_id` int(11) NULL DEFAULT NULL,
  `photos` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `thumbnail_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `featured_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `flash_deal_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `video_provider` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `video_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tags` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `penggunaan` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `unit_price` double(8, 2) NOT NULL,
  `purchase_price` double(8, 2) NOT NULL,
  `variant_product` int(1) NOT NULL DEFAULT 0,
  `attributes` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `choice_options` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `colors` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `variations` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `todays_deal` int(11) NOT NULL DEFAULT 0,
  `published` int(11) NOT NULL DEFAULT 1,
  `featured` int(11) NOT NULL DEFAULT 0,
  `current_stock` int(10) NOT NULL DEFAULT 0,
  `unit` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `discount` double(8, 2) NULL DEFAULT NULL,
  `discount_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tax` double(8, 2) NULL DEFAULT NULL,
  `tax_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `shipping_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'flat_rate',
  `shipping_cost` double(8, 2) NULL DEFAULT 0,
  `num_of_sale` int(11) NOT NULL DEFAULT 0,
  `meta_title` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pdf` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `refundable` int(1) NOT NULL DEFAULT 0,
  `rating` double(8, 2) NOT NULL DEFAULT 0,
  `barcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `digital` int(1) NOT NULL DEFAULT 0,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `komposisi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `nomer_bpom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bahan_aktif` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `satuan_ukuran` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `earn_point` double(8, 2) NOT NULL DEFAULT 0,
  `is_special` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (26, 'Traceless Oil Cleanser', NULL, 'admin', 14, 5, 10, 18, 9, '[\"uploads\\/products\\/photos\\/cmPhIq2iqhbuap1UJ51PyDuGRelgAI0AHrNQvue8.jpeg\"]', 'uploads/products/thumbnail/pL4qJuWZXWkJAmHv414MQPNyB9jhuUWsN3hPJwyU.jpeg', 'uploads/products/featured/XiQg99EU63wdHobt7y9qlYj4UxmneHMobnt5G8gq.jpeg', 'uploads/products/flash_deal/Uw3JroVFWM5Wzr9v1R2rgxetkFFWATrrhJL68EBS.jpeg', 'youtube', NULL, '', NULL, NULL, 60000.00, 0.00, 1, '[\"1\"]', '[{\"attribute_id\":\"1\",\"values\":[\"100\",\"60\"]}]', '[]', NULL, 0, 1, 0, -1, 'ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, NULL, NULL, NULL, 'Traceless-Oil-Cleanser-Hgc8n', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-18 14:26:54', '2020-09-12 14:50:04', 'Deskripsi Emina Traceless Oil Cleanser 60ml / CLEANSING OIL EMINA\r\nEmina Traceless Oil Cleanser 60ml\r\n\r\nWhat kind of cleanser that can do some kind of magic to clean up both waterbased and waterproof makeup without a trace?\r\nIt\'s Emina Traceless Oil Cleanser which can be used for both wet and dry clean up! It\'s all here in one bottle!\r\n\r\n- Tekstur oil utk memudahkan menghapus makeup waterproof\r\n- Aman utk mata dan kulit sensitif\r\n- Dapat dipakai saat kulit kering ataupun basah', NULL, NULL, NULL, 50.00, 0);
INSERT INTO `products` VALUES (27, 'Emina Double Bubble Fash Wash', NULL, 'admin', 14, 5, 10, 19, 9, '[\"uploads\\/products\\/photos\\/4gghwjbaJYu0SwHGYKDYWq92he09fzfCtNldjgP0.jpeg\"]', 'uploads/products/thumbnail/xig5OHixlR2SgmiNA6B7ri6gzuEuIOZXRG9MApKj.jpeg', 'uploads/products/featured/37bh28sWes9TOrgF6CwY6U2bGUlkg0BURrI1ya0m.jpeg', 'uploads/products/flash_deal/UuMQeIifuRFSA2Jl8o1klO4T33NnrhQN9HhRUgMX.jpeg', 'youtube', NULL, '', '<span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Emina Face Wash Double Bubble 60ml</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">pembersih wajah lembut yang dilengkapi dengan vitamin B3 dan ekstrak Licorice membantu mencerahkan warna kulit dan cocok untuk semua jenis kulit. Untuk kulit bersih, segar, dan lembab setiap hari</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">cara pakai: tuang secukupnya pada telapak tangan yang telah dibasahi dan busakan. usapkan pada wajah kemudian bilas hingga bersih</span><br>', NULL, 16000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 9993, 'ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 5, NULL, NULL, NULL, NULL, 'Emina-Double-Bubble-Fash-Wash-Mvhf8', 1, 0.50, NULL, 0, NULL, NULL, '2020-07-18 14:30:27', '2020-09-19 13:22:01', NULL, NULL, NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (28, 'Safi Age Defy Gold Water Essence', NULL, 'admin', 14, 5, 11, 20, 5, '[\"uploads\\/products\\/photos\\/VT02RDE65VpzhALRwHx4cd9tuoOLFLOSK4XRFmAc.jpeg\"]', 'uploads/products/thumbnail/1drPqkJZszJnulmjquFjiSqr1MHooTHUjgouZuZy.jpeg', 'uploads/products/featured/0hsL7stNB3Vq3IO2YZJl9Ugk22LDKaDaev16oXwA.jpeg', 'uploads/products/flash_deal/QrsutLwvXZ1kWKPhDSM4zyHBL6U0mS7NJfj8Z12M.jpeg', 'youtube', NULL, 'Essence', NULL, NULL, 44000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 97, 'ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 2, NULL, NULL, NULL, NULL, 'Safi-Age-Defy-Gold-Water-Essence-ZLVGi', 1, 2.25, NULL, 0, NULL, NULL, '2020-07-18 14:33:36', '2020-09-12 15:59:58', '<h2 class=\"css-d4v4mp-unf-heading e1qvo2ff2\" style=\"box-sizing: inherit; display: block; position: relative; font-family: &quot;Nunito Sans&quot;, -apple-system, sans-serif; color: rgba(49, 53, 59, 0.68); text-decoration: initial; font-weight: 400; text-transform: none; margin-top: 10px; line-height: 22px; font-size: 0.857143rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">Deskripsi<span>&nbsp;</span><span data-testid=\"lblPDPDeskripsiProdukTitle\" style=\"box-sizing: inherit; font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Safi Age Defy Gold Water Essence 30 ml</span></h2><p data-testid=\"lblPDPDeskripsiProduk\" class=\"css-olztn6-unf-heading e1qvo2ff8\" style=\"box-sizing: inherit; display: block; position: relative; font-weight: 400; font-size: 0.857143rem; line-height: 18px; color: rgba(49, 53, 59, 0.68); text-decoration: initial; margin: 0px; overflow-wrap: break-word; white-space: pre-line; font-family: &quot;open sans&quot;, tahoma, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">Safi Age Defy Gold Water Essence 30 ml<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">Safi Age Defy Gold Water Essence dalam kemasan yang lebih kecil sehingga mudah untuk dibawa. Mengandung Gold Extract dan Silk Protein yang dapat menjaga kekencangan kulit sehingga kulit wajah terlihat lebih muda - anti aging</p><br>', NULL, NULL, NULL, 50.00, 0);
INSERT INTO `products` VALUES (29, 'COSRX Pure Fit Cica Serum', NULL, 'admin', 14, 5, 11, 21, 6, '[\"uploads\\/products\\/photos\\/DarNYnSBEWDBopwjHkiUEqOBnk0gAMqwhVW1AtpN.jpeg\"]', 'uploads/products/thumbnail/d8SaZStriYddZC4iw5rxwktOqgEsU1km7DZKCSCY.jpeg', 'uploads/products/featured/gQFmUYZPEASgu0QHvw7NuMqmlmQYk8naXAqqh39k.jpeg', 'uploads/products/flash_deal/7eQWz6ATHaiRS0oZ9AYYjVo1ngIkCPzDBUXpFzn9.jpeg', 'youtube', NULL, '', '<span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Made in Korea</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Exp :</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">\"INTENSIVE SOOTHING SOLUTION DESIGNED TO REDUCE REDNESS AND REBUILD THE FOUNDATIONS OF A HEALTHIER SKIN BARRIER.\" All skin types, Sensitive skin types</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Benefits</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Soothing, Calming, Strengthening, Protecting</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- With 7 Cica ingredients that help calm sensitive skin, this serum provides concentrated care for irritated skin.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- CICA -7 Complex soothes, calms and protects irritated, weakend skin while Pinus Pinaster Bark extract helpsrelieve and restore the skin’s defenses against external stressors.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Apply two to three drops on face before moisturizier, avoiding the eyes and the mouth.</span><br>', NULL, 250000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 97, 'ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 3, NULL, NULL, NULL, NULL, 'COSRX-Pure-Fit-Cica-Serum-VTOG2', 1, 4.25, NULL, 0, NULL, NULL, '2020-07-18 14:36:49', '2020-09-22 11:25:05', '<span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">CICA-7 Complex : Soothes &amp; protects irritated, sensitive skin &amp; strengthens the skin barrier</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Asiaticoside</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Asiatic Acid</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Madecassic Acid</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Madecassoside</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Centella Asiatica Extract</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Centella Asiatica Leaf Extract</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">- Centella Asiatica Root Extract</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">* Pinus Pinaster Bark Extract : Contains Vitamin E. Relieves &amp; helps in skin recovery.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.68); font-family: &quot;open sans&quot;, tahoma, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-line; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><br>', NULL, NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (30, 'Wardah Renew You Anti Aging Eye Cream', NULL, 'admin', 14, 5, 12, 23, 8, '[\"uploads\\/products\\/photos\\/TTGbBbKaAGcUgiX4NDijeySQF6lIf9011OZAVQYj.jpeg\"]', 'uploads/products/thumbnail/eLifgL8VSNqVAswUVg0DMChsWYFSQjV4bdo3IgJ9.jpeg', 'uploads/products/featured/237vp3BTkks2FsILsfl5UE52QDktZ1FUXdB6PvUq.jpeg', 'uploads/products/flash_deal/jAkCOcuNLKezsKWBeE9JQrvNhd7eXzMs6UbC7F9c.jpeg', 'youtube', NULL, '', NULL, NULL, 85000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 95, 'ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 4, NULL, NULL, NULL, NULL, 'Wardah-Renew-You-Anti-Aging-Eye-Cream-FoFMA', 1, 2.75, NULL, 0, NULL, NULL, '2020-07-18 14:40:02', '2020-09-22 11:29:28', NULL, NULL, NULL, NULL, 50.00, 0);
INSERT INTO `products` VALUES (31, 'Tresemme', NULL, 'admin', 14, 6, 18, 35, 10, '[\"uploads\\/products\\/photos\\/LRsEvRUteZTcepcdi6vnue8aGIQodjxm9WSpbTU8.jpeg\"]', 'uploads/products/thumbnail/ttZUe2GnTOO9j5auiu3YJy0vdC4zEI7PHCuaLkUf.jpeg', 'uploads/products/featured/agDJE6mGjdjcyRo5poajsdklFNcgHbhZVCl6hh1V.jpeg', 'uploads/products/flash_deal/0Qsd9xQ1fadvPk4BwJgPFKaIeckzq9BZcUVB3v26.jpeg', 'youtube', NULL, '', 'Deskripsi&nbsp;Tresemme Total Salon Repair Shampoo 340Ml Twin PackIsi paket:2 x Tresemme Total Salon Repair Shampoo 340MlTresemmé Total Salon Repair Dengan Ionic Complex merawat dan memperbaiki dengan cepat rambut rusak akibat treatment salon seperti di bleaching, cat ombre, highlight, smoothing atau akibat styling rambut lainnya. Selain memperbaiki, kandungan macademia oil akan menjadikan rambut lebih lembut dan mengembalikan kilau rambut yang kusam. Selanjutnya, dengan Brazil Nut Oil dan Chia Seeds Oil, Tresemmé Total Salon Repair bukan hanya memperbaiki namun juga mencegah kerusakan rambut dan membuat rambut tampak lebih sehat. Untuk menutrisi dari akar, Tea Tree Oil membuat rambut tumbuh kuat dan mengurangi rambut rontok. Dapatkan rambut salon seperti idaman kamu tanpa khawatir rambut rusak!- Memperbaiki kerusakan rambut dengan cepat- Menjadikan rambut lebih kuat dan indah seperti perawatan dari salon- Ionic complex melapisi dan memperbaiki kesehatan rambut- Macademia Oil dan Chia Seeds Oil memberikan kelembutan sehingga rambut tidak kusut- Brazil Nut Oil mencegah kerusakan rambut dengan selenium dan asam lemak omega-3- Tea Tree Oil membersihkan dan menutrisi akar rambut', NULL, 86000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 996, '340ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 2, NULL, NULL, NULL, NULL, 'Tresemme-JdhTO', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-18 15:23:33', '2020-09-08 14:53:38', NULL, NULL, NULL, NULL, 50.00, 0);
INSERT INTO `products` VALUES (32, 'Biore', NULL, 'admin', 14, 5, 10, 19, 11, '[\"uploads\\/products\\/photos\\/d3K4NczUkBhAF7wabx1YVBgNaNE9YKJIVTgceQEy.jpeg\"]', 'uploads/products/thumbnail/cVhi8SVhHyzWTwUTclJ09CXFwotRLg4HD7cylz5Y.jpeg', 'uploads/products/featured/VEoHauqM0FkvtYoGHfeySXo4RBd4pMt08rfSNRiI.jpeg', 'uploads/products/flash_deal/uFYYOwmVwkDaWW4uc6TDOyZKu3WOZvaDmPpln7zF.jpeg', 'youtube', NULL, '', 'Deskripsi&nbsp;Biore Makeup Remover Perfect Cleansing Water Oil Clear 90mLWater-based &amp; oil-free Brightening Micellar makeup remover, diformulasikan dengan Japan Smooth Bright Technology. Membersihkan sisa makeup, kotoran dan minyak yang terperangkap dalam pori. Secara menyeluruh mengangkat kekusaman kulit, menjadikan kulit segar dan cerah.-Acne Care formula membersihkan hingga pori dari sisa makeup sebagai salah satu penyebab timbulnya jerawat.-Dengan Japan\'\'\'s Mineral Water menjadikan kulit segar, ternutrisi dan lembap.Terbukti kelembutannya dengan 7 fakta\'\' Allergy-tested \'\' Ophtalmologist tested \'\' Non-comedogenic \'\' Natural pH skin \'\' No added alcohol \'\' No added colorant \'\' No added fragranceTersedia dalam 2 varian :Soften Up For Normal to Dry SkinKulit lembut halus, tetap lembap, dan cerah.Oil Clear For Oily &amp; Combination SkinKulit segar tanpa minyak berlebih, dan cerah.Cukup dengan 1 tahap, tidak perlu digosok kuat dan tidak perlu dibilas', NULL, 27800.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 0, '90ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 0, NULL, 'cokicokia', 'https://i.pinimg.com/originals/35/a4/43/35a443c9ff20bc7b2f28172a91c31ce2.jpg', NULL, 'Biore-ZoOA4', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-18 15:33:42', '2020-08-24 12:50:13', NULL, NULL, NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (33, 'WARDAH C DEFENSE FACE MIST WITH VITAMIN C', NULL, 'admin', 14, 5, 15, 31, 8, '[\"uploads\\/products\\/photos\\/vRlPvnWjx3iVzl2PLaIjV1VyoG3PHbcXpZG6cusN.jpeg\"]', 'uploads/products/thumbnail/vk8GHWwDRHd5DzupKC8LYBpgN1g0j6ENfzQgRf1o.jpeg', 'uploads/products/featured/uLUbab1Zgd8iuFw7Gk7W5w0J3FAc3Ze1UMuOani8.jpeg', 'uploads/products/flash_deal/SA0JAdtmmKjTQbSdOmezNf2DgnRzlLga2Poanu47.jpeg', 'youtube', NULL, '', 'Deskripsi&nbsp;WARDAH C DEFENSE FACE MIST WITH VITAMIN CWardah C Defense Face Mist kini hadir dengan kandungan Hi Grade Vit C dan kompleks NMF (Natural Moisturizing Factor) yang membuat kulit wajahmu terasa kenyal, lembap dan segar. Bisa digunakan setelah pengaplikasian makeup.Neto 55 mlCara Pakai :Semprotkan face mist dengan jarak sekitar 30 cm dari wajah kamudian diamkan sesaat.Setelah itu tepuk-tepuk wajah agar face mist dapat meresap dengan baik.Selain lebih fresh, face mist dari Wardah ini juga bisa mengunci makeup agar lebih awet dan menjaga kulit kamu senantiasa lembap serta halus.', NULL, 304500.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 977, '55ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 7, NULL, NULL, 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'WARDAH-C-DEFENSE-FACE-MIST-WITH-VITAMIN-C-J0NGz', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-18 15:36:48', '2020-09-22 11:27:44', NULL, NULL, NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (34, 'VIVA WATERDROP SLEEPING MASK', NULL, 'admin', 14, 5, 14, 29, 12, '[\"uploads\\/products\\/photos\\/bwND29sUIc1bqGfHL8mqVXJLF1DeBh0EPsFjFo9f.jpeg\"]', 'uploads/products/thumbnail/AU2dsbKNmNt8r8Vr43PjaoPXyRRcrMc8e4VvJPGz.jpeg', 'uploads/products/featured/Z9nHc5v9xMCqJnQR9NDQz55w3wJeGVpFFGilFiGh.jpeg', 'uploads/products/flash_deal/8RgznK8J4LTufh1PRyt76UlBCQ65JnsZCKaawXsh.jpeg', 'youtube', NULL, '', 'Deskripsi&nbsp;VIVA WATERDROP SLEEPING MASK 80grNEW - NEW --NEW Hadirviva white waterdrop sleeping maskmoisture look .Gunakan Saat tidur dimalam hari , kulit tetap membutuhkanperawatan yang maksimal,waterdrop sleeping mask diformulasikan khusus untuk menutrisidan membantu menjaga keseimbangan kadar air kulit sepanjangtidur . menjadikan kulit terasa lebih lembut , dan kenyal.diperkaya dengan :-- collagen - menghidari timbul dari tanda tanda peneuan diniseperti garis garis halus .-- aloe vera gel - melembabkan menyejutkan dan memberikansensani yang menenangkan.-- spirulina extrak - kaya protein dan mineral.-- licorloe extrak - bahan pencerah alami.cara penggunaan :1. oles pada wajah dan leher yg telah dibersihkan,saat keluar butiran air, tepuk tepuk ringan agar meresapmaksimal (tidak perlu di bilas).2. tidurlah dengan nyenyak dan biarkan waterdropsleeping mask bekerja semalaman.3. rasakan manfaat saat bangun di pagi hari.( gunakan teratur setiap malam untuk mendapatkan hasilyang maksimal)', NULL, 23000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 999, '80gr', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, NULL, 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'VIVA-WATERDROP-SLEEPING-MASK-JIbcK', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-18 15:41:45', '2020-09-11 16:55:44', NULL, NULL, NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (35, 'CLEAR FACE Cleansing Facial Toner', NULL, 'admin', 14, 5, 16, 33, 13, '[\"uploads\\/products\\/photos\\/LuDw9AautZ7uxe9Af6qbKCA5mS58gwpcU5tN8Rlz.jpeg\"]', 'uploads/products/thumbnail/h6WJxvlcUktURDxA5yiPOiXr6KWkteaPlptRgs0n.jpeg', 'uploads/products/featured/R51HC6mNRf0e9WtciEXW716skiNrvzhu6XAdIBiV.jpeg', 'uploads/products/flash_deal/205i5S9q7uZf8UHQZ06jsP0h4QhljyTXfnOw7cGS.jpeg', 'youtube', NULL, '', 'Deskripsi&nbsp;CLEAR FACE Cleansing Facial Toner 150mlCocok di gunakan bila kulit sangat berminyak atau untuk kulit kombinasi untuk mengangkat minyak dan sisa kotoran sampai ke pori-pori.Cocok di gunakan bila kulit sangat berminyak atau untuk kulit kombinasi (khusus di daerah T).Tidak mengandung minyak mineral, minyak silicone atau halogenated organic compounds.Mengandung ekstrak ketimun (Cucumber Extract) dan protein sutra untuk menjaga kelembaban kulit serta mencegah dehidrasi kulit.Mengandung Panthenol untuk membantu menyembuhkan luka bekas jerawat.Mengangkat minyak dan sisa kotoran sampai ke pori-pori.Mengandung allantoin dan lactic acid untuk melembutkan dan menghaluskan kulit.DIANJURKAN UNTUK- Acne / Jerawat- Kulit sensitif- Komedo / BlackheadCARA APLIKASI- Aplikasikan Clear Face Deep Cleansing Facial Toner dengan menggunakan kapas.- Basahkan kulit, kemudian cuci wajah menggunakan Clear Face Cleansing Bar / Clear Face Antibacterial Foam 2x sehari.- Setelah cuci muka, gunakan Clear Face Care Gel pada wajah secara merata dan Anti Pimple Gel pada jerawat aktif di wajah.Biarkan mengering.- Jangan dibilas.', NULL, 140000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 999, '150ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, NULL, NULL, NULL, 'CLEAR-FACE-Cleansing-Facial-Toner-Oreqs', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-18 15:45:02', '2020-09-12 10:26:10', NULL, NULL, NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (36, 'Caffeine Solution 5% + EGCG', NULL, 'admin', 14, 5, 12, 24, 14, '[\"uploads\\/products\\/photos\\/LrY4pxcysoboNnAlpv7EhC8ipkmcNFJI62udegUs.jpeg\"]', 'uploads/products/thumbnail/cOWs3QqER0iGSSaR33Uv8nY7KJ9Kg0w2mBAzsNCL.jpeg', 'uploads/products/featured/xI8lo8qohC6MBdabjOLecFLCAzjomt28qWslEPKr.jpeg', 'uploads/products/flash_deal/gsQqsCZvXhhAizRp3bCtMNvTnZkT9O7cWOzgksJo.jpeg', 'youtube', NULL, '', '<p><span>Caffeine Solution 5% + EGCG is a lightweight, water-based serum with\r\ncaffeine and EGCG.</span><span><br>\r\n<span>This treatment visibly reduces the appearance of\r\ndark circles, under-eye bags, and puffiness in the eye contour area.</span></span></p>', 'How to Use:\r\nMassage\r\na small amount into the area around your eyes in the morning and at night.', 200000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 1000, '30ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 0, NULL, 'This treatment visibly reduces the appearance of dark circles, under-eye bags, and puffiness in the eye contour area.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Caffeine-Solution-5--EGCG-mEhmN', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:12:03', '2020-08-29 15:18:41', 'Komposisi:\r\n\r\nAqua (Water), Caffeine,\r\nMaltodextrin, Glycerin, Propanediol, Epigallocatechin Gallatyl Glucoside,\r\nGallyl Glucoside, Hyaluronic Acid, Oxidized Glutathione, Melanin, Glycine Soja\r\n(Soybean) Seed Extract, Urea, Pentylene Glycol, Hydroxyethylcellulose,\r\nPolyacrylate Crosspolymer-6, Xanthan gum, Lactic Acid, Dehydroacetic Acid,\r\nTrisodium Ethylenediamine Disuccinate, Propyl Gallate, Dimethyl Isosorbide,\r\nBenzyl Alcohol, 1,2-Hexanediol, Ethylhexylglycerin, Phenoxyethanol, Caprylyl\r\nGlycol.', 'NE11190105003', 'Caffeine Solution 5% + EGCG is a lightweight, water-based serum with caffeine and EGCG.', NULL, 150.00, 0);
INSERT INTO `products` VALUES (37, 'Niacinamide 10% + Zinc 1% 30ml', NULL, 'admin', 14, 5, 11, 21, 14, '[\"uploads\\/products\\/photos\\/cTZS3DQFatH6N6I9rirlNRYiBHUgiWy3UrI3Wplh.jpeg\"]', 'uploads/products/thumbnail/HVaydDLHZpqxcoDHwbYk5bA4cwIlfBJBSG9wIJIu.jpeg', 'uploads/products/featured/2NdTiT4FN4xhEbzYAmxjHKfP4FmK2lvxUfLrdqYE.jpeg', 'uploads/products/flash_deal/oopWpuRhYkXjfpuoNjf8YnstTx4i0MooWRNIgEk3.jpeg', 'youtube', NULL, '', '<p><span>Niacinamide 10% + Zinc 1% is a water-based serum with niacinamide\r\n(vitamin B3) and zinc.</span><span><br>\r\n<span>This treatment reduces the appearance of\r\nblemishes, redness, enlarged pores, uneven tone, and oily skin. It promotes\r\nclearer, brighter, and smoother skin while balancing sebum production.</span></span></p>', NULL, 175000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 1000, '30ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 0, NULL, 'This treatment reduces the appearance of blemishes, redness, enlarged pores, uneven tone, and oily skin. It promotes clearer, brighter, and smoother skin while balancing sebum production.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Niacinamide-10--Zinc-1-30ml-vw8sM', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:20:13', '2020-08-29 15:18:41', 'Komposisi:\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nNiacinamide: a vitamin that\r\nbrightens and reduces the appearance of skin blemishes and congestion\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nZinc PCA: a mineral that helps\r\ncontrol oil production', 'NE11181905000', 'Niacinamide 10% + Zinc 1% is a water-based serum with niacinamide (vitamin B3) and zinc.', NULL, 150.00, 0);
INSERT INTO `products` VALUES (38, 'Niacinamide 10% + zinc 1% 60ml', NULL, 'admin', 14, 5, 11, 21, 14, '[\"uploads\\/products\\/photos\\/KalKIjMYlH4OjjI9b1vx0JEyLX7NxODYyLjwuVrz.jpeg\"]', 'uploads/products/thumbnail/pzm4FmsNikZfBbpP05Gwis3mWHUMFWYr6cjvGisG.jpeg', 'uploads/products/featured/F8OMrSJMILlnnfvTxVZblIQ1ONwjehYoix2GhPyh.jpeg', 'uploads/products/flash_deal/Ni6STk8GUk2d9GeJvOf3YSzR5Ft2db8flAM6kgfv.jpeg', 'youtube', NULL, '', '<span>Niacinamide 10% + Zinc 1% is a water-based serum with niacinamide\r\n(vitamin B3) and zinc.</span><span><br>\r\n<span>This treatment reduces the appearance of\r\nblemishes, redness, enlarged pores, uneven tone, and oily skin. It promotes\r\nclearer, brighter, and smoother skin while balancing sebum production.</span></span><br>', NULL, 320000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 995, '60ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 3, NULL, 'This treatment reduces the appearance of blemishes, redness, enlarged pores, uneven tone, and oily skin. It promotes clearer, brighter, and smoother skin while balancing sebum production.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Niacinamide-10--zinc-1-60ml-MWTT2', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:26:21', '2020-09-02 16:25:53', 'Komposisi:\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nNiacinamide: a vitamin that\r\nbrightens and reduces the appearance of skin blemishes and congestion\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nZinc PCA: a mineral that helps\r\ncontrol oil production\r\n\r\n\r\n\r\n\r\n<p><br></p>', 'NE11181905000', 'Niacinamide 10% + Zinc 1% is a water-based serum with niacinamide (vitamin B3) and zinc.', NULL, 150.00, 0);
INSERT INTO `products` VALUES (39, 'Thayers Rose Petal Toning Towelettes', NULL, 'admin', 14, 5, 16, 33, 15, '[\"uploads\\/products\\/photos\\/NoraM7AzkeFGa2XMsLrbNlnkLami6hCcrmzoRy7h.jpeg\"]', 'uploads/products/thumbnail/O76GHM098EYiKWrS0GseH6jq9GdXS6SA6f2bJY7r.jpeg', 'uploads/products/featured/mMfy7Y0t2M2eGCAIeNTFBA4dbqC21XzMz6CYVNTc.jpeg', 'uploads/products/flash_deal/4LTQpLPGwnhBNfNFqr1peYwemxntb1y2VQhdgWIe.jpeg', 'youtube', NULL, '', '<p><span>Flower Power. Make\r\nyour skin bloom with THAYERS® Rose Petal Toning Towelettes. Thayers developed\r\nthis toning towelette for healthy-looking skin, adding moisture while helping\r\nto protect the skin from airborne impurities. Experience toned skin in a simple\r\nswipe! In addition to containing certified organic Aloe Vera, this unique,\r\nproprietary blend also contains certified organic, non-distilled Witch Hazel\r\nthat’s grown exclusively for Thayers. By avoiding distillation of our Witch\r\nHazel, we’re able to preserve the naturally-occurring, beneficial tannins,\r\nwhich are known to offer antioxidant and antibacterial benefits, and bring\r\nabout a natural glow. Thayers elixirs have been a fixture in medicine cabinets\r\nfor generations – once you use them, you’ll know why.</span><span><br>\r\n<span>Alcohol-Free • Paraben-Free • Phthalate-Free •\r\nGluten-Free</span></span></p>', NULL, 225000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 997, '30 sheets', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, 'Flower Power. Make your skin bloom with THAYERS® Rose Petal Toning Towelettes. Thayers developed this toning towelette for healthy-looking skin, adding moisture while helping to protect the skin from airborne impurities. Experience toned skin in a simple swipe! In addition to containing certified organic Aloe Vera, this unique, proprietary blend also contains certified organic, non-distilled Witch Hazel that’s grown exclusively for Thayers. By avoiding distillation of our Witch Hazel, we’re able to preserve the naturally-occurring, beneficial tannins, which are known to offer antioxidant and antibacterial benefits, and bring about a natural glow. Thayers elixirs have been a fixture in medicine cabinets for generations – once you use them, you’ll know why.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Thayers-Rose-Petal-Toning-Towelettes-i9ZRQ', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:32:52', '2020-09-02 15:10:00', 'Komposisi:\r\n\r\nPurified Water, Glycerin, Propanediol, Certified Organic Witch\r\nHazel Ext Blend (Hamamelis Virginiana Extract (Witch Hazel*), Aloe Barbadensis\r\nLeaf Juice (Filet of Aloe Vera*)), Rosa Damascena Flower Water, 1,3\r\nPropanediol, Citric Acid, Potassium Sorbate, Sodium Benzoate, Phenoxyethanol,\r\nFragrance.\r\n\r\n*Denotes Certified Organic Ingredient The carefully selected,\r\nnaturally sourced ingredients in this product may have undergone limited\r\nprocessing.\r\n\r\nPlease note that ingredient decks may change from time to\r\ntime.&nbsp; Ingredients listed here may differ from what is listed on your\r\nproduct package or label.&nbsp; Please refer to product package or label for\r\nthe most up-to-date ingredients for the product you receive.', 'NE51190105651', 'Alcohol-Free • Paraben-Free • Phthalate-Free • Gluten-Free', NULL, 150.00, 0);
INSERT INTO `products` VALUES (40, 'Thayers Witch Hazel Toner 355ml - Rose Petal', NULL, 'admin', 14, 5, 16, 33, 15, '[\"uploads\\/products\\/photos\\/vY4lKPIV6DWKAcRJ2G16AV4wxQ8mohHdZ9DnMQ1E.jpeg\"]', 'uploads/products/thumbnail/P0C6UB6BR0yJ5CXbGzBWAuI3NIEMMXrecKAxjrif.jpeg', 'uploads/products/featured/Zl7LUXYrJ8XLDAQfT83DGvpsWtiFSUFkyo0zSjtq.jpeg', 'uploads/products/flash_deal/Vf9ssyUOp4fCkJUjICvcD3JT2vLUpWLQOquzRBIw.jpeg', 'youtube', NULL, '', 'Skin Type :\r\nAll skin type. (Normal,\r\nOily, Combination, Dry, Sensitive)\r\n\r\nWhat is\r\nit ?\r\nFlower Power. Make your skin bloom with\r\nTHAYERS® Rose Petal Facial Toner. This gentle toner is derived from a\r\ntime-honored formula, developed by Thayers to cleanse, tone, moisturize, and\r\nbalance the pH level of skin. In addition to containing pore-cleansing Rose\r\nWater and certified organic Aloe Vera, this unique, proprietary blend also\r\ncontains certified organic, non-distilled Witch Hazel that’s grown exclusively\r\nfor Thayers on a family farm in Fairfield County, Connecticut. By avoiding\r\ndistillation of our Witch Hazel, we’re able to preserve the\r\nnaturally-occurring, beneficial tannins, which are known to offer antioxidant\r\nand antibacterial benefits, and bring about a natural glow. Thayers elixirs\r\nhave been a fixture in medicine cabinets for generations – once you use them,\r\nyou’ll know why.', 'Directions :\r\nApply with a cotton ball or\r\nsoft pad to cleanse, soften, refresh and moisturize skin. Use anytime\r\nthroughout the day as a softening refresher', 230000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 996, '355ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 3, NULL, 'Skin Type :\r\nAll skin type. (Normal, Oily, Combination, Dry, Sensitive)\r\n\r\nWhat is it ?\r\nFlower Power. Make your skin bloom with THAYERS® Rose Petal Facial Toner. This gentle toner is derived from a time-honored formula, developed by Thayers to cleanse, tone, moisturize, and balance the pH level of skin. In addition to containing pore-cleansing Rose Water and certified organic Aloe Vera, this unique, proprietary blend also contains certified organic, non-distilled Witch Hazel that’s grown exclusively for Thayers on a family farm in Fairfield County, Connecticut. By avoiding distillation of our Witch Hazel, we’re able to preserve the naturally-occurring, beneficial tannins, which are known to offer antioxidant and antibacterial benefits, and bring about a natural glow. Thayers elixirs have been a fixture in medicine cabinets for generations – once you use them, you’ll know why.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Thayers-Witch-Hazel-Toner-355ml---Rose-Petal-DL9eb', 1, 4.50, NULL, 0, NULL, NULL, '2020-07-22 13:36:57', '2020-09-09 09:15:52', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Purified Water, Glycerin, Certified Organic Witch Hazel Ext\r\nBlend (Hamamelis Virginiana Extract (Witch Hazel*), Aloe Barbadensis Leaf Juice\r\n(Filet of Aloe Vera*)), Phenoxyethanol, Rosa Centifolia (Rose) Flower Water,\r\nFragrance (Natural Rose), Citric Acid, Citrus Grandis (Grapefruit) Seed Extract\r\n*Denotes Certified Organic Ingredients</p>', 'NE51190105535', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (41, 'Thayers Witch Hazel Toner 89ml - Rose Petal', NULL, 'admin', 14, 5, 16, 33, 15, '[\"uploads\\/products\\/photos\\/efTq98Aqcwr1CDdu8z4Bapsnu4yctdCRAMROcwZa.jpeg\"]', 'uploads/products/thumbnail/YCvSq9HtZgs6yzMSRkapXFSFHv2Bb2WnHajBErt7.jpeg', 'uploads/products/featured/Et0x52aQDLGQWNxtjfpHnIvUKmRYWMtOzewkyuM4.jpeg', 'uploads/products/flash_deal/5SII90BZrq3tU5S8Hlm3dHMygl8WCLgwv40VFdEu.jpeg', 'youtube', NULL, '', 'Skin Type :\r\nAll skin type. (Normal,\r\nOily, Combination, Dry, Sensitive)\r\n\r\nWhat is\r\nit ?\r\nFlower Power. Make your skin bloom with\r\nTHAYERS® Rose Petal Facial Toner. This gentle toner is derived from a\r\ntime-honored formula, developed by Thayers to cleanse, tone, moisturize, and\r\nbalance the pH level of skin. In addition to containing pore-cleansing Rose\r\nWater and certified organic Aloe Vera, this unique, proprietary blend also\r\ncontains certified organic, non-distilled Witch Hazel that’s grown exclusively\r\nfor Thayers on a family farm in Fairfield County, Connecticut. By avoiding\r\ndistillation of our Witch Hazel, we’re able to preserve the\r\nnaturally-occurring, beneficial tannins, which are known to offer antioxidant\r\nand antibacterial benefits, and bring about a natural glow. Thayers elixirs\r\nhave been a fixture in medicine cabinets for generations – once you use them,\r\nyou’ll know why.', 'Directions :\r\nApply with a cotton ball or\r\nsoft pad to cleanse, soften, refresh and moisturize skin. Use anytime\r\nthroughout the day as a softening refresher.', 115000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 989, '89ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 10, NULL, 'Skin Type :\r\nAll skin type. (Normal, Oily, Combination, Dry, Sensitive)\r\n\r\nWhat is it ?\r\nFlower Power. Make your skin bloom with THAYERS® Rose Petal Facial Toner. This gentle toner is derived from a time-honored formula, developed by Thayers to cleanse, tone, moisturize, and balance the pH level of skin. In addition to containing pore-cleansing Rose Water and certified organic Aloe Vera, this unique, proprietary blend also contains certified organic, non-distilled Witch Hazel that’s grown exclusively for Thayers on a family farm in Fairfield County, Connecticut. By avoiding distillation of our Witch Hazel, we’re able to preserve the naturally-occurring, beneficial tannins, which are known to offer antioxidant and antibacterial benefits, and bring about a natural glow. Thayers elixirs have been a fixture in medicine cabinets for generations – once you use them, you’ll know why.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Thayers-Witch-Hazel-Toner-89ml---Rose-Petal-q9sCX', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:40:10', '2020-09-17 14:35:48', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Purified\r\nWater, Glycerin, Certified Organic Witch Hazel Ext Blend (Hamamelis Virginiana\r\nExtract (Witch Hazel*), Aloe Barbadensis Leaf Juice (Filet of Aloe Vera*)),\r\nPhenoxyethanol, Rosa Centifolia (Rose) Flower Water, Fragrance (Natural Rose),\r\nCitric Acid, Citrus Grandis (Grapefruit) Seed Extract\r\n*Denotes Certified Organic Ingredients</p>', 'NE51190105535', NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (42, 'Thayers Witch Hazel Toner 355ml – Lavender', NULL, 'admin', 14, 5, 16, 33, 15, '[\"uploads\\/products\\/photos\\/nuyHo0KiYWGNxhhcRG6b5I09XZnwuUDKHJePdv6K.jpeg\"]', 'uploads/products/thumbnail/yuIlKH24iwolqkSnYZ8xy7ua9WfwAUe6PINVBxUP.jpeg', 'uploads/products/featured/mMfDtd2bkf4IwHKiolSv1OlLp2ki0jq98VqTa55K.jpeg', 'uploads/products/flash_deal/I2Gb7REpL7uEsIQazumeklPJlNEQvmdxqlMHOLju.jpeg', 'youtube', NULL, '', '<p><span>Your Skin Will Think\r\nYou’re at a Spa. Our new Lavender Alcohol-Free Witch Hazel with Aloe Vera\r\nFormula Toner revitalizes the skin with a gentle, soothing formula. Go ahead:\r\ntreat yourself.</span><span><br>\r\n<br>\r\n<span>Lavender’s anti-inflammatory and anti-bacterial\r\nproperties cleanse skin, help manage acne, calm sensitive skin, and reduce\r\nredness and irritation. Not only does lavender help calm the skin from the\r\noutside-in, the smell can physically calm you as well. Lavender is extremely\r\ngentle and beneficial for all skin types, especially those that are sensitive\r\nor acne-prone.</span></span></p>', NULL, 230000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 990, '355ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 4, NULL, 'Your Skin Will Think You’re at a Spa. Our new Lavender Alcohol-Free Witch Hazel with Aloe Vera Formula Toner revitalizes the skin with a gentle, soothing formula. Go ahead: treat yourself.\r\n\r\nLavender’s anti-inflammatory and anti-bacterial properties cleanse skin, help manage acne, calm sensitive skin, and reduce redness and irritation. Not only does lavender help calm the skin from the outside-in, the smell can physically calm you as well. Lavender is extremely gentle and beneficial for all skin types, especially those that are sensitive or acne-prone.', 'https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg', NULL, 'Thayers-Witch-Hazel-Toner-355ml--Lavender-6ER4O', 1, 3.75, NULL, 0, NULL, NULL, '2020-07-22 13:43:06', '2020-09-05 10:51:00', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Purified Water, Certified Organic Witch Hazel Ext Blend\r\n(Hamamelis Virginiana Extract (Witch Hazel*), Aloe Barbadensis Leaf Juice\r\n(Filet of Aloe Vera*)), Glycerin, Phenoxyethanol, Lavandula Angustifolia\r\n(Lavender) Flower Water, Fragrance (Natural Lavender), Citric Acid, Citrus\r\nGrandis (Grapefruit) Seed Extract.\r\n\r\n*Denotes Certified Organic Ingredient The carefully selected,\r\nnaturally sourced ingredients in this product may have undergone limited\r\nprocessing.\r\n\r\nPlease note that ingredient decks may change from time to\r\ntime.&nbsp; Ingredients listed here may differ from what is listed on your\r\nproduct package or label.&nbsp; Please refer to product package or label for\r\nthe most up-to-date ingredients for the product you receive.</p>', 'NE51191205678', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (43, 'Thayers Witch Hazel Toner 89ml – Lavender', NULL, 'admin', 14, 5, 16, 33, 15, '[\"uploads\\/products\\/photos\\/wYSnbjHacxyGIDW47F6pZHwxyGRoouD1UU4M58Tr.jpeg\"]', 'uploads/products/thumbnail/469gYO1sE3NVXeko85WcnXdxwJAUeg8ZE5rQU6TR.jpeg', 'uploads/products/featured/pWEBqTIERHteLkXR4N6yIXGjrXEl5WafyvADVie6.jpeg', 'uploads/products/flash_deal/AIUrqa0Dd3bp8p24cEtUGiOQh82AwZ9g6pMxGnWQ.jpeg', 'youtube', NULL, '', '<p><span>Your Skin Will Think\r\nYou’re at a Spa. Our new Lavender Alcohol-Free Witch Hazel with Aloe Vera\r\nFormula Toner revitalizes the skin with a gentle, soothing formula. Go ahead:\r\ntreat yourself.</span><span><br>\r\n<br>\r\n<span>Lavender’s anti-inflammatory and anti-bacterial\r\nproperties cleanse skin, help manage acne, calm sensitive skin, and reduce\r\nredness and irritation. Not only does lavender help calm the skin from the\r\noutside-in, the smell can physically calm you as well. Lavender is extremely\r\ngentle and beneficial for all skin types, especially those that are sensitive\r\nor acne-prone.</span></span></p>', NULL, 115000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 996, '89ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, 'Your Skin Will Think You’re at a Spa. Our new Lavender Alcohol-Free Witch Hazel with Aloe Vera Formula Toner revitalizes the skin with a gentle, soothing formula. Go ahead: treat yourself.\r\n\r\nLavender’s anti-inflammatory and anti-bacterial properties cleanse skin, help manage acne, calm sensitive skin, and reduce redness and irritation. Not only does lavender help calm the skin from the outside-in, the smell can physically calm you as well. Lavender is extremely gentle and beneficial for all skin types, especially those that are sensitive or acne-prone.', NULL, NULL, 'Thayers-Witch-Hazel-Toner-89ml--Lavender-5l4Oz', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:44:54', '2020-09-02 15:10:00', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Purified Water, Certified Organic Witch Hazel Ext Blend\r\n(Hamamelis Virginiana Extract (Witch Hazel*), Aloe Barbadensis Leaf Juice\r\n(Filet of Aloe Vera*)), Glycerin, Phenoxyethanol, Lavandula Angustifolia\r\n(Lavender) Flower Water, Fragrance (Natural Lavender), Citric Acid, Citrus\r\nGrandis (Grapefruit) Seed Extract.\r\n\r\n*Denotes Certified Organic Ingredient The carefully selected,\r\nnaturally sourced ingredients in this product may have undergone limited\r\nprocessing.</p>', 'NE51191205678', NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (44, 'Thayers Witch Hazel Toner 89ml  – Unscented', NULL, 'admin', 14, 5, 16, 33, 14, '[\"uploads\\/products\\/photos\\/VBtVxvaaGr8aW4rShMaiFQZ4SaVNYRA9pALZOpVD.jpeg\"]', 'uploads/products/thumbnail/dkO76NGRwyldAgLN22rzg2gQE0MHVPbdpbPTmFGE.jpeg', 'uploads/products/featured/6gTtbftQ7glE6e6WiMh379GPg9tWqOapIaMrFD2P.jpeg', 'uploads/products/flash_deal/9Dpryf4gJUOlZPmcMd2PfMdfRx5clIoadsYzGTRk.jpeg', 'youtube', NULL, '', 'You Won’t Smell It,\r\nBut You’ll Surely Feel It. THAYERS® Alcohol-Free Unscented Witch Hazel and Aloe\r\nVera Formula Toner has all the replenishing, revitalizing magic of our scented\r\nvarieties, but is undetectable by the nose.', NULL, 115000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 997, '89ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, 'You Won’t Smell It, But You’ll Surely Feel It. THAYERS® Alcohol-Free Unscented Witch Hazel and Aloe Vera Formula Toner has all the replenishing, revitalizing magic of our scented varieties, but is undetectable by the nose.', NULL, NULL, 'Thayers-Witch-Hazel-Toner-89ml---Unscented-2vgna', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:46:28', '2020-09-03 14:22:17', 'Komposisi:\r\n\r\nPurified Water, Certified Organic Witch Hazel Ext Blend\r\n(Hamamelis Virginiana Extract (Witch Hazel*), Aloe Barbadensis Leaf Juice\r\n(Filet of Aloe Vera*)), Glycerin, Phenoxyethanol, Citric Acid, Citrus Grandis\r\n(Grapefruit) Seed Extract\r\n*Denotes Certified Organic Ingredient\r\nThe carefully selected, naturally sourced ingredients in this product may have\r\nundergone limited processing.\r\n\r\nPlease note that ingredient decks may change from time to time.&nbsp;\r\nIngredients listed here may differ from what is listed on your product package\r\nor label.&nbsp; Please refer to product package or label for the most\r\nup-to-date ingredients for the product you receive.\r\n\r\n&nbsp;', 'NE51190105439', NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (45, 'Thayers Witch Hazel Toner 355ml – Original', NULL, 'admin', 14, 5, 16, 33, 15, '[\"uploads\\/products\\/photos\\/X8O0twGT9FDcZou30u5zDgNCUC8LK4rL4i4iR3eN.jpeg\"]', 'uploads/products/thumbnail/8SsEPthPgD5roJFNCgynKTdMszDcilRfmnKnXI2z.jpeg', 'uploads/products/featured/DsKX59spS355D5CrTJ2F3LIeGafCdd7RFo4ysfhU.jpeg', 'uploads/products/flash_deal/5SmL8bpz5Z3eYlbn2QatkTaK0hKiy6WiMdwWGlgn.jpeg', 'youtube', NULL, '', '<p><span>Alcohol-Free For\r\nYears – And We Don’t Miss It. Thayers Original Alcohol-Free Witch Hazel with\r\nAloe Vera Formula Toner will make your skin come alive. Thayers original\r\nformula is made with our proprietary Witch Hazel extract.</span></p>', NULL, 230000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 999, '355ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, 'Alcohol-Free For Years – And We Don’t Miss It. Thayers Original Alcohol-Free Witch Hazel with Aloe Vera Formula Toner will make your skin come alive. Thayers original formula is made with our proprietary Witch Hazel extract.', NULL, NULL, 'Thayers-Witch-Hazel-Toner-355ml--Original-PXND9', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:48:37', '2020-09-11 16:55:44', 'Komposisi:\r\n\r\nPurified Water, Glycerin, Certified Organic Witch Hazel Extract\r\nBlend (Hamamelis Virginiana Extract (Witch Hazel*), Aloe Barbadensis Leaf Juice\r\n(Filet of Aloe Vera*)), Natural Fragrance, Phenoxyethanol, Caprylyl Glycol,\r\nEthylhexylglycerin, Citric Acid, Potassium Hydroxide', 'NE51191205706', NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (46, 'Iunik Beta Glucan Set', NULL, 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/w95TcGxLaoDGpzd6QDlUQxIaVjMyNI7V8G1iONjt.jpeg\"]', 'uploads/products/thumbnail/u6PlLzqzxm3Ct4Gl4hx4BMEAXcVlGlAMqJ3kT39U.jpeg', 'uploads/products/featured/fBEBIbeifpOFKC4vW1Uj7usU5L96PTKrDMWfvBHz.jpeg', 'uploads/products/flash_deal/Gz0jW20UmbeTIKb80NX0AhDMxXmmmM1Gb7ue4bVh.jpeg', 'youtube', NULL, '', 'Teridiri dari: \r\n\r\n1\r\nBeta Glucan Cream 60ml dan 1 Beta Glucan Power Moisture Serum 15ml', NULL, 400000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 1000, '1 set', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 0, NULL, 'Teridiri dari: \r\n1 Beta Glucan Cream 60ml dan 1 Beta Glucan Power Moisture Serum 15ml', NULL, NULL, 'Iunik-Beta-Glucan-Set-LUU5A', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 13:58:54', '2020-07-27 15:00:03', 'Komposisi:\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nBeta Glucan Daily Moisture Cream\r\n\r\nWater, Butylene Glycol,\r\nCyclopentasiloxane, Glycerin, Cyclohexasiloxane, Beta-Glucan, Cetearyl Alcohol,\r\nNiacinamide, Cetearyl Isononanoate, Hydrogenated Polyisobutene, Glyceryl\r\nStearate, Polysorbate 60, 1,2-Hexanediol, Sodium Hyaluronate, Sorbitan Stearate,\r\nAcrylates/C10-30 Alkyl Acrylate Crosspolymer, Arginine, Cetearyl Glucoside,\r\nCaprylyl Glycol, Allantoin, Centella Asiatica Extract, Betaine, Prunus Salicina\r\nFruit Extract, Rubus Idaeus (Raspberry) Fruit Extract, Fragaria Vesca\r\n(Strawberry) Fruit Extract, Prunus Persica (Peach) Fruit Extract, Punica\r\nGranatum Fruit Extract, Ficus Carica (Fig) Fruit Extract, Sodium Chondroitin\r\nSulfate, Dipotassium Glycyrrhizate, Adenosine, Ethylhexylglycerin, Aloe\r\nBarbadensis Leaf Powder, Pentylene Glycol, Aspalathus Linearis Extract,\r\nGlycyrrhiza Glabra (Licorice) Root Extract.\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nBeta Glucan Daily\r\nMoisture&nbsp;Serum\r\n\r\nWater, Butylene Glycol,\r\n1,2-Hexanediol, Ethylhexylglycerin, Beta-Glucan, Sodium PCA', '•	NA26190105586 (Beta Glucan Daily Moisture Cream) •	NA26200100070 (Beta Glucan Power Moisture Serum)', NULL, NULL, 0.00, 0);
INSERT INTO `products` VALUES (47, 'Iunik Propolis Set', NULL, 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/TSHsgv0zPRBn27yOavkxttjGMPrzmIN8qmtzQsNP.jpeg\"]', 'uploads/products/thumbnail/NH5uMsq2fcibEOKvv3QnRcRZwefH231ZHQFQY3Mh.jpeg', 'uploads/products/featured/Q3agpo9SULRDNadI8IUCIpM9yJPANsF4v2JCKp3A.jpeg', 'uploads/products/flash_deal/adGwkjP4b2tVfA3UzDB8fEGmarHLKmxWyGfydoi0.jpeg', 'youtube', NULL, '', 'Terdiri dari :\r\n\r\n1 Propolis Sleeping Mask 60ml dan 1 Propolis\r\nSynergy Serum 15ml', NULL, 350000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 987, '1 set', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 7, NULL, 'Terdiri dari :\r\n\r\n1 Propolis Sleeping Mask 60ml dan 1 Propolis Synergy Serum 15ml', NULL, NULL, 'Iunik-Propolis-Set-6j0Cu', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 14:07:40', '2020-09-22 11:26:24', 'Komposisi:\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nPropolis Vitamin Sleeping Mask\r\n\r\nWater, Propolis Extract,\r\nButylene Glycol, Glycerin, Hippophae Rhamnoides Fruit Extract, Centella\r\nAsiatica Leaf Water, Ceterayl Alcohol, Cetyl Ethylhexanoate,\r\nCyclopentasiloxane, Caprilyc/Capric Triglyceride, Niacinamide,\r\nCyclohexasiloxane, Glyceryl Stearate, Cetearyl Olivate, Sorbitan Olivate,\r\n1,2-Hexanediol, Caprylyl Glycol, Acrylates/C10-30 Alkyl Acrylate Crosspolymer,\r\nArginine, Cetearyl Glucoside, Beta-Glucan, Centella Asiatica Extract, Portulaca\r\nOleracea Extract, Allantoin, Ethylhexylglycerin, Adenosine, Dipotassium\r\nGlycyrrhizate, Aloe Barbadensis Leaf Extract, Pentylene Glycol, Aspalathus\r\nLinearis Extract, Glycyrrhiza Glabra (Licorice) Root Extract, Commiphora Myrrha\r\nResin Extract, Perilla Frutescens Leaf Extract, Yucca Schidigera Root Extract.\r\n\r\n·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nPropolis Vitamin Synergy Serum\r\n\r\nPropolis Extract,\r\nHippophae Rhamnoides (Sea Buckthorn) Fruit Extract, Water, Butylene Glycol,\r\nGlycerin, Methylpropanediol, Niacinamide, Dipropylene Glycol, 1,2-Hexanediol,\r\nRosa Damascena (Rose) Flower Water, Sodium Hyaluronate, Betaine, Glycosyl\r\nTrehalose, Honey Extract, Beta-Glucan, Hydrogenated Starch Hydrolysate,\r\nAllantoin, Carbomer, Arginine, Hydroxyethylcellulose, Adenosine, Dipotassium\r\nGlycyrrhizate, Pentylene Glycol, Citrus Aurantium Bergamia (Bergamot) Fruit\r\nOil, Centella Asiatica (Gotu Kola) Extract, Portulaca Oleracea (Green Purslane)\r\nExtract, Hamamelis Virginiana (Witch Hazel) Extract, Punica Granatum\r\n(Pomegranate) Extract, Ficus Carica (Fig) Fruit Extract, Morus Alba (White\r\nMulberry) Fruit Extract, Ginkgo Biloba (Maidenhair Tree) Nut Extract, Caprylyl\r\nGlycol', 'NA26190205229 (Propolis Vitamin Sleeping Mask)', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (48, 'Iunik Calendula Complete Cleansing Oil', NULL, 'admin', 14, 5, 10, 18, 16, '[\"uploads\\/products\\/photos\\/FbXeFx7nOXJNyWWI7cruWv9pAG3PXxA3obyPQYVN.jpeg\"]', 'uploads/products/thumbnail/eyJqs0SWx764OJzsFqBX1pOD8K7POvWpBNGO9uWF.jpeg', 'uploads/products/featured/9rZqGgu37uKe9q0jleCfga1BcAuSG2QL4PENFPGP.jpeg', 'uploads/products/flash_deal/GaLdJg73aPO34FHrJWh717mJxYnbIuHhUlTW0IBx.jpeg', 'youtube', NULL, '', NULL, NULL, 305000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 977, '200ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 6, NULL, NULL, NULL, NULL, 'Iunik-Calendula-Complete-Cleansing-Oil-gKN7g', 1, 2.50, NULL, 0, NULL, NULL, '2020-07-22 14:21:16', '2020-09-09 14:25:28', 'Komposisi:\r\n\r\nHelianthus Annuus (Sunflower)\r\nSeed Oil, &nbsp;Canola Oil, Calendula Officinalis Flower extract, Sorbeth-30\r\nTetraoleate, Simmondsia Chinensis (Jojoba) Seed Oil, Macadamia Ternifolia Seed\r\nOil, Cananga odorata flower oil, Sorbitan Sesquioleate', 'NA26191205747', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (49, 'Iunik Propolis Vitamin Synergy Serum', NULL, 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/Fn3sK3edcYsq54d7hnuXQgaNRuJXGknE7kC0IHaE.jpeg\"]', 'uploads/products/thumbnail/vLP5m0f9DVwJLwXzVrQ083PTLnAQ0IoXN7GglLUb.jpeg', 'uploads/products/featured/PP7TBTXgZ8KgViL353gp6FojLm4m7a8EQ94Imfki.jpeg', 'uploads/products/flash_deal/deeiKgMzRuf5UYiQxGAjSwDh1LS5jjp2ciYu4QMd.jpeg', 'youtube', NULL, '', 'Skin Type :\r\nAll skin type. (Normal,\r\nOily, Combination, Dry, Sensitive)\r\n\r\nWhat is\r\nit ?\r\nThis effective optimal synergy serum\r\nincludes the unique and optimal ratio, propolis extract 70% vitamin c\r\n(Hippophae Rhamnoides Fruit Extract) 12% and other natural botanical\r\ningredients by iunik. It can make Calming &amp; Brightening for Sensitive Skin.', 'Directions :\r\nUsing the dropper, gently\r\napply an appropriate amount onto your face and let it absorb.\r\n\r\n&nbsp;', 276000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 990, '50ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 3, NULL, 'Skin Type :\r\nAll skin type. (Normal, Oily, Combination, Dry, Sensitive)\r\n\r\nWhat is it ?\r\nThis effective optimal synergy serum includes the unique and optimal ratio, propolis extract 70% vitamin c (Hippophae Rhamnoides Fruit Extract) 12% and other natural botanical ingredients by iunik. It can make Calming & Brightening for Sensitive Skin.', NULL, NULL, 'Iunik-Propolis-Vitamin-Synergy-Serum-uC0FN', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 14:23:29', '2020-09-12 14:56:08', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi :Propolis Extract, Hippophae\r\nRhamnoides (Sea Buckthorn) Fruit Extract, Water, Butylene Glycol, Glycerin,\r\nMethylpropanediol, Niacinamide, Dipropylene Glycol, 1,2-Hexanediol, Rosa\r\nDamascena (Rose) Flower Water, Sodium Hyaluronate, Betaine, Glycosyl Trehalose,\r\nHoney Extract, Beta-Glucan, Hydrogenated Starch Hydrolysate, Allantoin,\r\nCarbomer, Arginine, Hydroxyethylcellulose, Adenosine, Dipotassium Glycyrrhizate,\r\nPentylene Glycol, Citrus Aurantium Bergamia (Bergamot) Fruit Oil, Centella\r\nAsiatica (Gotu Kola) Extract, Portulaca Oleracea (Green Purslane) Extract,\r\nHamamelis Virginiana (Witch Hazel) Extract, Punica Granatum (Pomegranate)\r\nExtract, Ficus Carica (Fig) Fruit Extract, Morus Alba (White Mulberry) Fruit\r\nExtract, Ginkgo Biloba (Maidenhair Tree) Nut Extract, Caprylyl Glycol</p>', 'NA26190105573', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (50, 'Iunik Propolis Vitamin Synergy Serum', 'The best result for acne skin', 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/xdQ1mrJQWuGdnDntN2wacp6tieKroNGTGX5z6sUY.jpeg\"]', 'uploads/products/thumbnail/TrzESBIgKa1i3uDJAZw9CYI7NMrXjtNAEqi3yfKb.jpeg', 'uploads/products/featured/uW0rkv0deIqvFTcaoiJQh3vWTkpPekn2hyfGsYtD.jpeg', 'uploads/products/flash_deal/7VVOxTtOPgnwYmz280Aaklqn0EZo7fcsrc0ZsrWb.jpeg', 'youtube', NULL, '', '<p>Skin Type :\r\nAll skin type. (Normal, Oily, Combination, Dry, Sensitive)What is it ?\r\nThis effective optimal synergy serum includes the unique and optimal ratio, propolis extract 70% vitamin c (Hippophae Rhamnoides Fruit Extract) 12% and other natural botanical ingredients by iunik. It can make Calming &amp; Brightening for Sensitive Skin.</p>', '<p>Directions :\r\nUsing the dropper, gently\r\napply an appropriate amount onto your face and let it absorb.</p>', 140000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 998, '15ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, NULL, NULL, NULL, 'Iunik-Propolis-Vitamin-Synergy-Serum-dvfbc', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 14:25:25', '2020-09-02 14:06:29', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi :Propolis Extract, Hippophae\r\nRhamnoides (Sea Buckthorn) Fruit Extract, Water, Butylene Glycol, Glycerin,\r\nMethylpropanediol, Niacinamide, Dipropylene Glycol, 1,2-Hexanediol, Rosa\r\nDamascena (Rose) Flower Water, Sodium Hyaluronate, Betaine, Glycosyl Trehalose,\r\nHoney Extract, Beta-Glucan, Hydrogenated Starch Hydrolysate, Allantoin,\r\nCarbomer, Arginine, Hydroxyethylcellulose, Adenosine, Dipotassium\r\nGlycyrrhizate, Pentylene Glycol, Citrus Aurantium Bergamia (Bergamot) Fruit\r\nOil, Centella Asiatica (Gotu Kola) Extract, Portulaca Oleracea (Green Purslane)\r\nExtract, Hamamelis Virginiana (Witch Hazel) Extract, Punica Granatum\r\n(Pomegranate) Extract, Ficus Carica (Fig) Fruit Extract, Morus Alba (White\r\nMulberry) Fruit Extract, Ginkgo Biloba (Maidenhair Tree) Nut Extract, Caprylyl\r\nGlycol</p>', 'NA26190105573', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (51, '16.	Iunik Noni Light Oil Serum', 'The best result for acne skin', 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/cib3gXBV2K88e9eCirgOIUwuOWYVG4PnyZbyeS1Q.jpeg\"]', 'uploads/products/thumbnail/U7UiTUWErYlVwl24l8ku2zqBjB93BYISAHKfV7Sl.jpeg', 'uploads/products/featured/DOpZdvfAJfQiIEmCze8e4MhNn3ZboEATr5XZjZZ9.jpeg', 'uploads/products/flash_deal/UIvkNLlIdUoETwNZNRLSVjNPc3zUFifb91tGU0du.jpeg', 'youtube', NULL, '', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p>\r\n\r\n\r\n\r\n\r\nThe iUNIK Noni Light Oil Serum is formulated with noni fruit extract rich in powerful antioxidants to fight signs of aging. This serum also contains various plant oils including jojoba, macadamia, and olive oil to moisturize the skin and lock in the moisture. The unique blend of oil and fruit extract adds radiance to the skin while improving fine lines and wrinkles.<br></p>', '<p>How to use:Using the dropper, gently apply an appropriate onto your face and allow\r\nto absorbs.</p>', 280000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 978, '50ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 6, NULL, NULL, NULL, NULL, '16Iunik-Noni-Light-Oil-Serum-dxHp0', 1, 4.25, NULL, 0, NULL, NULL, '2020-07-22 14:27:31', '2020-09-17 13:43:37', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Morinda Citrifolia Fruit\r\nExtract&nbsp; (42%), Water, Butylene Glycol, Glycereth-26, Glycerin, Propylene\r\nGlycol Dicaprylate, Trehalose, Macadamia Ternifolia Seed Oil, Simmondsia\r\nChinensis (Jojoba) Seed Oil, Polyglyceryl-4 Caprate, Sorbitan Sesquioleate,\r\n1,2-Hexanediol, Olea Europaea (Olive) Fruit Oil, Caprylyl Glycol, Morinda\r\nCitrifolia Extract, Vaccinium Angustifolium (Blueberry) Fruit Extract, Brassica\r\nOleracea Acephala Leaf Extract, Acrylates/C10-30 Alkyl Acrylate Crosspolymer,\r\nAllantoin, Arginine, Xanthan Gum, Argania Spinosa Kernel Oil, Rosa Canina Fruit\r\nOil, Adenosine, Ethylhexylglycerin, Dipotassium Glycyrrhizate, Pentylene\r\nGlycol, Aspalathus Linearis Extract, Glycyrrhiza Glabra (Licorice) Root\r\nExtract, Commiphora Myrrha Resin Extract, Perilla Frutescens Leaf Extract, Yucca\r\nSchidigera Root Extract</p>', 'NA26190105637', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (52, 'Iunik Tea Tree Relief Toner', 'The best result for acne skin', 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/AKNhixUYMPNFdw71Qhw5wiPEzCR34lGyKJ1MBDMC.jpeg\"]', 'uploads/products/thumbnail/92yUANNVvvGhNrk6oGNxxjWqyFvUfCjfjPo7phyz.jpeg', 'uploads/products/featured/IkzpCOAfGzz41BUAjFkzbD28pt006cCBUwQneBB0.jpeg', 'uploads/products/flash_deal/PkQRpe7Kjq7Mimk0O9HsuAXD16FsgMwY5AVLpDfF.jpeg', 'youtube', NULL, '', '<p>- Watery toner enriched with Tea Tree extract 67% and Centella Asiatica extract 20% to effectively calm sensitive skin, moisturize and give soft skin with suppleness\r\n- Contain 6,000 ppm of six sprout extracts in organic form to provide rich nutrients for healthy skin\r\n- Double functional product for Whitening &amp; Wrinkle Care by Niancinamide and Adenosine</p>', '<p>How to use:After facial cleansing, apply a proper amount to your face and gently\r\ndap for absorption.</p>', 320000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 979, '200ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 12, NULL, NULL, NULL, NULL, 'Iunik-Tea-Tree-Relief-Toner-HefRs', 1, 2.75, NULL, 0, NULL, NULL, '2020-07-22 14:29:21', '2020-09-09 14:08:19', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Melaleuca\r\nAlternifolia (Tea Tree) Leaf Water, Centella Asiatica Leaf Water, Butylene\r\nGlycol, Niacinamide, Glycerin,Water, Centella Asiatica\r\nExtract,12-Hexanediol,Betaine, Sodium Hyaluro nate, Caprylyl\r\nGlycol,Polyglyceryl-4 Caprate, Portulaca Oleracea Extract, Brassica oleracea\r\nItalica (Broccoli) Extract, Medicago Sativa (Alfalfa) Extract, Brassica\r\noleracea Capitata (Cabbage) Leaf Extract, Triticum Vulgare Wheat) Germ Extract,\r\nBrassica Campestris (Rapeseed) Extract, Raphanus Sativus (Radish) Seed\r\nExtractAllantoin, Ethylhexylglycerin, Dipotassium Glycyrrhizate, Aloe\r\nBarbadensis Leaf Extract, Ormenis Multi caulis Oil, Pentylene Glycol,\r\nAspalathus Linearis Extract, Glycyrrhiza Glabra (Licorice) Root Extract,\r\nCommiphora Myrrha Resin Extract, Perilla Frutescens Leaf Extract, Yucca\r\nSchidigera Root Extract.</p>', 'NA26191205720', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (53, 'Iunik Rose Galactomyces Synergy Serum', 'The best result for acne skin', 'admin', 14, 5, 11, 21, 16, '[\"uploads\\/products\\/photos\\/5Xbru5YIBNQ6OzZBLClaIiOJNUEUy4g0hMlV8SSX.jpeg\"]', 'uploads/products/thumbnail/8RFDiHpx7p05kvRaxHe2GbBRyNm9YufIJXnME84X.jpeg', 'uploads/products/featured/gLiG7MSPgbr6rGnYM64ViZ9kWa0NTjGekFncw3zt.jpeg', 'uploads/products/flash_deal/lsickBnaIwE2sewD3NT1gKHyJnDxgnP6DruWK5uw.jpeg', 'youtube', NULL, '', '<p>- iUNIK Rose Galactomyces Synergy Serum contains galactomyces ferment filtrate and cabbage rose water to help with hydration, whitening and sebum control at the same time.\r\n- Ultra moisturizing and nourishing Serum offering comprehensive skin improvement with the first synergy of Rose and Galactomyces\r\n- Rose Water 10% , Galactomyces Fermentation Water 50% with Niancinamade and Adenosine contents provide:\r\n- Powerful moisturizing and nourishing care\r\n- Effective sebum and pore Control\r\n- Outstanding whitening and wrinkle care\r\n\r\n\r\n\r\n\r\n</p>', 'How to use: \r\n\r\nApply a proper amount to your face and gently dap for absorption.', 276000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 182, '50ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 18, NULL, NULL, NULL, NULL, 'Iunik-Rose-Galactomyces-Synergy-Serum-Yo6lQ', 1, 4.50, NULL, 0, NULL, NULL, '2020-07-22 14:32:13', '2020-09-17 11:27:06', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Water/Aqua, Galactomyces Ferment\r\nFiltrate, Rosa Centifolia Flower Water, Butylene Glycol, Glycerin, Propylene\r\nGlycol, Niacinamide, Sodium Hyaluronate, Adenosine, Allantoin, Illicum Verum\r\n(Anise) Fruit Extract, Scutellaria Baicalensis Root Extract, 1,2-Hexanediol,\r\nZanthoxylum Piperitum Fruit Extract, Pulsatilla Koreana Extract, Dipotassium\r\nGlycyrrhizate, Aloe Barbadensis Leaf Extract, Disodiu EDTA, Usnea Barbata\r\n(Lichen) Extract, Carbomer, Sodium Hydroxide.&nbsp;</p>', 'NA26190105687', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (54, 'Iunik Vitamin Hyaluronic Acid Vitalizing Toner', NULL, 'admin', 14, 5, 16, 33, 16, '[\"uploads\\/products\\/photos\\/sA08mvCGM0fxSLzuxBbfIEalRDMfN3JACoolbdY6.jpeg\"]', 'uploads/products/thumbnail/UFsgd5O2g8rwjfi3K61Kqxj9zB83Sd9oIxkWouYU.jpeg', 'uploads/products/featured/fbSodjpb6bacRg0DtWZva9yK8Z3SNLH7eX2rnwUS.jpeg', 'uploads/products/flash_deal/IDwwpsO6UyX4VCrh1hMirqBhsJTnButCErl0fiN8.jpeg', 'youtube', NULL, '', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nDirections :\r\nAfter cleansing, gently sweep\r\nover the face and neck with a cotton pad or fingertips\r\n\r\n\r\n</p>', 'digunakan setiap hari', 320000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 447, '355ml', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 46, NULL, 'Skin Type :\r\nAll skin type. (Normal, Oily, Combination, Dry, Sensitive)\r\n\r\nWhat is it ?\r\nThis gel type toner can help to make powerful vitalizing and moisturizing with Hippophae Rhamnoides Fruits Extract 5% and Hyaluronic Acid 45%.', NULL, NULL, 'Iunik-Vitamin-Hyaluronic-Acid-Vitalizing-Toner-yRP1I', 1, 4.00, NULL, 0, NULL, NULL, '2020-07-22 14:34:00', '2020-09-17 13:41:22', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Sodium Hyaluronate, Water,\r\nHippophae Rhamnoides Fruit Extract,Glycerin, Butylene Glycol, Niacinamide,\r\nTrehalose, 1,2-Hexanediol, Caprylyl Glycol, Thuja Orientalis Leaf Extract,\r\nZanthoxylum Schinifolium Leaf Extract, Polygonum Cuspidatum Root Extract,\r\nEthylhexylglycerin, Hydroxyethylcellulose, Pentylene Glycol, Aspalathus\r\nLinearis Extract, Glycyrrhiza Glabra (Licorice) Root Extract, Commiphora Myrrha\r\nResin Extract, Perilla Frutescens Leaf Extract, Yucca Schidigera Root Extract.</p>', 'NA26191205641', 'Calamine,ZnO,Sulfur', NULL, 150.00, 0);
INSERT INTO `products` VALUES (55, 'Haum LCID Salicylic Acid 2%', NULL, 'admin', 14, 5, 11, 21, 17, '[\"uploads\\/products\\/photos\\/XgFafwHZFNBzlopQYh7dIxC9EtlOrVYDPokYXqaa.jpeg\"]', 'uploads/products/thumbnail/pWt3LLFj0MHqAcSCyLb5zzZnB04C9qAnUJiaMMnf.jpeg', 'uploads/products/featured/rLnqxYbPQENQRhcazKxwz8Gjq3L5ZxHOPd5zlOop.jpeg', 'uploads/products/flash_deal/t2b7oAvCOh8pdWAI192NVJwyZNyc6yH9HOFHbEDv.jpeg', 'youtube', NULL, '', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCara Pakai:\r\nGunakan serum setelah wajah\r\ndibersihkan.\r\nRatakan menggunakan jari dengan gerakan memutar\r\n&amp; sambil dipijat pada area wajah.\r\nGunakan 2 kali sehari pada pagi dan malam hari\r\nuntuk hasil maksimal atau 1 kali sehari pada malam hari.\r\nPenggunaan LCID harus berdampingan dengan\r\nmoisturizer dan sangat disarankan menggunakan sun screen, untuk tetap menjaga\r\nkelembaban kulit dan melindungi kulit dari paparan matahari secara\r\ntahapan sebagai berikut,\r\nCleansing\r\nToner (jika menggunakan)\r\nLCID\r\nSerum lain jika ada\r\nMoisturizer\r\nSun screen (pada pagi hari sebelum aktifitas)\r\nSimpan LCID di tempat sejuk dengan suhu ruangan.\r\n\r\n\r\n\r\n\r\n</p>', NULL, 148000.00, 0.00, 1, '[\"1\",\"4\"]', '[{\"attribute_id\":\"1\",\"values\":[\"100 ml\"]},{\"attribute_id\":\"4\",\"values\":[\"touche of nude\",\"pink\"]}]', '[]', NULL, 0, 1, 0, -14, 'botol', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 17, NULL, 'Serum Salicylic Acid 2% dengan bahan dasar air, berfungsi untuk merawat dengan mencerahkan kulit,\r\nMembantu proses eksfoliasi kulit (menggantikan sel kulit mati dengan sel kulit baru)\r\nMembersihkan kulit hingga ke pori-pori terdalam\r\nMenghilangkan jerawat dan noda pada kulit\r\nMencerahkan kulit kusam\r\nMelembutkan dan meratakan tekstur kulit wajah', NULL, NULL, 'Haum-LCID-Salicylic-Acid-2-I4Jxa', 1, 0.00, NULL, 0, NULL, NULL, '2020-07-22 14:36:41', '2020-09-11 16:55:44', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nKomposisi:Water, Polysorbate 20, Salicylic\r\nAcid, Amylopectin, Dextrin, Hamamelis Virginiana Water, Phenoxyethanol, Xantham\r\nGum, Chlorphenesin, Hydroxyethyl Cellulosa, Sodium Benzoate, Glycerin,\r\nPentylene Glycol, Alcohol, Sodium Hyaluronate, Lactic Acid, Serine, Sodium\r\nLactate, Sorbitol, Urea, Tetrasodium EDTA, Sodium Chloride, Allantoin.&nbsp; &nbsp;</p>', 'NA18190123990', NULL, NULL, 150.00, 0);
INSERT INTO `products` VALUES (57, 'brush', NULL, 'admin', 14, 7, 21, NULL, 6, '[\"uploads\\/products\\/photos\\/ZrLruuxWHnaOGa1Crz15aqO3VLkkFucRLE2dtEtW.png\"]', 'uploads/products/thumbnail/0LYiJfX6IVlOWLn8gSdYWRDk4Y9BP0AIlu13GW9y.png', 'uploads/products/featured/YCs4Qz0p45ttmcn5JVJv6B8qPQfM00fDu3xQgk3q.png', 'uploads/products/flash_deal/FCQfSpwKHn5XanGMs2QuaBaxK7vUAPeU4Nd2GyYR.png', 'youtube', NULL, '', NULL, NULL, 75000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 69, 'pcs', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, NULL, NULL, NULL, 'brush-BNLGx', 1, 0.00, NULL, 0, NULL, NULL, '2020-08-24 11:45:30', '2020-09-04 20:55:33', NULL, NULL, NULL, NULL, 50.00, 0);
INSERT INTO `products` VALUES (58, 'makeup eraser mini towel', NULL, 'admin', 14, 7, 23, NULL, 16, '[\"uploads\\/products\\/photos\\/SZNf3BvcsRu4UMzPEsRa4Y0QY6hBlkmND5nMmaFC.png\"]', 'uploads/products/thumbnail/ipwZnY8aYoNPMcY9Rb3SXKPUbUvxtIeJu4XG4wTe.png', 'uploads/products/featured/cYf136jDniNwgP0DfJBuSpRv1W5sRDtnqwiBgZ7X.png', 'uploads/products/flash_deal/vNjBJDyq8mx3cbiRdxUDZirI6O9rmAUSpcqyOO12.png', 'youtube', NULL, '', NULL, NULL, 30000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 86, 'pcs', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 2, NULL, NULL, NULL, NULL, 'makeup-eraser-mini-towel-zc1No', 1, 0.00, NULL, 0, NULL, NULL, '2020-08-24 11:54:59', '2020-09-02 13:59:47', NULL, NULL, NULL, NULL, 90.00, 0);
INSERT INTO `products` VALUES (59, 'towel', NULL, 'admin', 14, 7, 23, NULL, 15, '[\"uploads\\/products\\/photos\\/xKUMDQ4P7eg4fuwLZoQNqoUD4R2xaNbmaXOuoNv9.png\"]', 'uploads/products/thumbnail/xf8pXkjC3K0G7Np7982DCgxeTb54QBhGYmUFtaCN.png', 'uploads/products/featured/Xa67v6vggoHe9Vx89K8bxsMX1Q6QcrBBJOb6bvYU.png', 'uploads/products/flash_deal/BlTo7DBOPVhIUjVrpPkrghWS8CLqpCyu3lMtxYED.png', 'youtube', NULL, '', NULL, NULL, 90000.00, 0.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 19, 'pcs', 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 1, NULL, NULL, NULL, NULL, 'towel-0paWI', 1, 0.00, NULL, 0, NULL, NULL, '2020-08-24 11:56:15', '2020-08-31 18:09:38', NULL, NULL, NULL, NULL, 50.00, 0);

-- ----------------------------
-- Table structure for promotion
-- ----------------------------
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of promotion
-- ----------------------------
INSERT INTO `promotion` VALUES (1, 'img/promotion/pNyAWBwv7D0V9tbI3LyGGibnirpqZhkp3ufuBmEy.png', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ');
INSERT INTO `promotion` VALUES (2, 'img/promotion/eoL7UqhOtdeVguGbVwo86whVAcqRhHdHoVpjUjfe.jpeg', 'height: auto;');
INSERT INTO `promotion` VALUES (3, 'img/promotion/3rEi4tOLFPCYTPVS8oQfWmS7C1PrZYfKeanVSs7n.jpeg', 'margin-right:4px;');
INSERT INTO `promotion` VALUES (4, 'img/promotion/M5gj8wQsDhZLJkF8TQH2dR1Zq8EfhKxEEYUKEjMZ.jpeg', 'margin-right:4px;');
INSERT INTO `promotion` VALUES (5, 'img/promotion/gObkA8xwpsqcMTMDEqDOfTbKaLYqY0qoxXr7eqNg.jpeg', 'banner');

-- ----------------------------
-- Table structure for recomendasi
-- ----------------------------
DROP TABLE IF EXISTS `recomendasi`;
CREATE TABLE `recomendasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(255) NOT NULL,
  `recommendations` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recomendasi
-- ----------------------------
INSERT INTO `recomendasi` VALUES (1, 53, '[\"53\",\"51\",\"49\"]');
INSERT INTO `recomendasi` VALUES (2, 53, '[\"53\",\"50\",\"49\"]');

-- ----------------------------
-- Table structure for recomendasi_filter
-- ----------------------------
DROP TABLE IF EXISTS `recomendasi_filter`;
CREATE TABLE `recomendasi_filter`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter` int(255) NOT NULL COMMENT '1.Terlaris 2.Brand 3.Kategori 4.Input Manual',
  `filtered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recomendasi_filter
-- ----------------------------
INSERT INTO `recomendasi_filter` VALUES (1, 4, '[\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\"]');

-- ----------------------------
-- Table structure for refund_requests
-- ----------------------------
DROP TABLE IF EXISTS `refund_requests`;
CREATE TABLE `refund_requests`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_approval` int(1) NOT NULL DEFAULT 0,
  `admin_approval` int(1) NOT NULL DEFAULT 0,
  `refund_amount` double(8, 2) NOT NULL DEFAULT 0,
  `reason` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `admin_seen` int(11) NOT NULL,
  `refund_status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of refund_requests
-- ----------------------------

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_kemasan` int(11) NOT NULL DEFAULT 0,
  `comment` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `viewed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `rating_kegunaan` int(11) NULL DEFAULT NULL,
  `rating_efektif` int(11) NULL DEFAULT NULL,
  `rating_harga` int(11) NULL DEFAULT NULL,
  `status_beli` int(11) NULL DEFAULT NULL COMMENT '1. ya 0. tidak',
  `status_recomendasi` int(11) NULL DEFAULT NULL COMMENT '1. ya 0. tidak',
  `photos` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rating` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reviews
-- ----------------------------
INSERT INTO `reviews` VALUES (1, 48, 63, 4, 'waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!waw bagus banget tau!!', 1, 0, '2020-09-04 16:25:43', '2020-09-04 16:25:43', 5, 5, 5, 1, 1, '[\"uploads\\/products\\/review\\/42lO55y3vHCiEYkIg1GfGrolA6VNBwsRBpHLAJVE.png\"]', 4.75);
INSERT INTO `reviews` VALUES (2, 48, 56, 0, 'hsdfasdjkfhjkdfhjksdhfjklasdfasd', 1, 0, '2020-09-04 20:31:57', '2020-09-04 20:31:57', 0, 0, 0, 0, 1, NULL, 0);
INSERT INTO `reviews` VALUES (3, 48, 56, 5, 'gfghfggfghfghfgfghfjh', 1, 0, '2020-09-04 20:32:50', '2020-09-04 20:32:50', 5, 5, 5, 0, 1, NULL, 5);
INSERT INTO `reviews` VALUES (4, 48, 56, 0, '7445645655465456456456', 1, 0, '2020-09-04 20:33:09', '2020-09-04 20:33:09', 0, 0, 0, 1, 1, NULL, 0);
INSERT INTO `reviews` VALUES (5, 48, 56, 0, '4545656456456456', 1, 0, '2020-09-04 20:33:30', '2020-09-04 20:33:30', 0, 0, 0, 0, 0, NULL, 0);
INSERT INTO `reviews` VALUES (6, 48, 56, 5, '4545644564565645612123123123', 1, 0, '2020-09-04 20:35:06', '2020-09-04 20:35:06', 5, 5, 5, 0, 1, NULL, 5);
INSERT INTO `reviews` VALUES (7, 42, 13, 5, 'bagus tonernya . cuma harganya agak mahal', 1, 0, '2020-09-05 10:51:00', '2020-09-05 10:51:00', 4, 5, 1, 1, 1, '[\"uploads\\/products\\/review\\/8dKZgSSlYScHyw8dVKUWEv0zsRXGoRcGnlZoSPlj.jpeg\"]', 3.75);
INSERT INTO `reviews` VALUES (8, 52, 13, 4, 'bagus sih', 1, 0, '2020-09-08 15:31:43', '2020-09-08 15:31:43', 2, 2, 3, 1, 1, '[\"uploads\\/products\\/review\\/rRvv4R1CgbFy0vKHKkJ35me7d5a8COLTkU5uaE1e.jpeg\"]', 2.75);
INSERT INTO `reviews` VALUES (9, 54, 13, 4, 'bagus', 1, 0, '2020-09-09 09:13:07', '2020-09-09 09:13:07', 4, 5, 3, 1, 1, '[\"uploads\\/products\\/review\\/IebymVClqn13bIgDGWIs9A820Lu6ANiHYlcf8vmz.jpeg\"]', 4);
INSERT INTO `reviews` VALUES (10, 53, 13, 5, 'berkualitas', 1, 0, '2020-09-09 09:14:24', '2020-09-09 09:14:24', 5, 3, 5, 0, 1, '[\"uploads\\/products\\/review\\/1PbXAhgzq3EzebE73Oiv3MmbrPCCk5Z4GRWSuuXU.jpeg\",\"uploads\\/products\\/review\\/N3WRYM4SwKSLME1NN4X92vE8YvvykGDHzggwfwE7.jpeg\"]', 4.5);
INSERT INTO `reviews` VALUES (11, 40, 13, 5, 'kalo abis pasti beli lagi', 1, 0, '2020-09-09 09:15:52', '2020-09-09 09:15:52', 5, 3, 5, 1, 1, '[\"uploads\\/products\\/review\\/pIdPxBpElL6qqsoxCeRq4vMgkeQyCQJvGP9Qpwwv.jpeg\"]', 4.5);
INSERT INTO `reviews` VALUES (12, 48, 13, 3, 'bagus produknya', 1, 0, '2020-09-09 09:18:48', '2020-09-09 09:18:48', 2, 3, 3, 1, 1, NULL, 2.75);
INSERT INTO `reviews` VALUES (13, 29, 57, 4, 'bagus barangnya. admin juga menggapi komplain dengan ramah', 1, 0, '2020-09-12 10:19:48', '2020-09-12 10:19:48', 5, 4, 4, 1, 1, '[\"uploads\\/products\\/review\\/sLQM1RLi82k9MofUOOGjy0jFYWMnfvEPtDDMDrhY.jpeg\"]', 4.25);
INSERT INTO `reviews` VALUES (14, 28, 77, 3, 'testing review', 1, 0, '2020-09-12 15:59:58', '2020-09-12 15:59:58', 2, 2, 2, 0, 1, '[\"uploads\\/products\\/review\\/W1zRrTvWcDRUugGDCpemssEHdDHGz5UMWfTufouZ.png\"]', 2.25);
INSERT INTO `reviews` VALUES (15, 51, 13, 4, 'barang sesuai', 1, 0, '2020-09-12 16:19:51', '2020-09-12 16:19:51', 5, 5, 3, 1, 1, '[\"uploads\\/products\\/review\\/BdTJGGnVSQvM1b74aWa99UVGKIJK8G8mLFKPucfu.jpeg\"]', 4.25);
INSERT INTO `reviews` VALUES (16, 30, 13, 4, 'barang jelek', 1, 0, '2020-09-12 16:21:09', '2020-09-12 16:21:09', 3, 2, 2, 0, 0, NULL, 2.75);
INSERT INTO `reviews` VALUES (17, 27, 13, 2, 'produk original sis', 1, 0, '2020-09-19 13:22:01', '2020-09-19 13:22:01', 0, 0, 0, 1, 1, '[\"uploads\\/products\\/review\\/73wHnQ4ioe5UYI3Jiu68wwaOyEn0YLFcOzp9aqrO.jpeg\"]', 0.5);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permissions` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Pemilik', '[\"16\",\"1\",\"2\",\"3\",\"17\",\"6\",\"18\",\"19\",\"9\",\"12\",\"20\",\"21\",\"10\",\"22\",\"23\",\"24\"]', '2018-10-10 11:39:47', '2020-09-21 11:09:17');
INSERT INTO `roles` VALUES (2, 'Admin', '[\"16\",\"1\",\"2\",\"3\",\"17\",\"6\",\"18\",\"19\",\"9\",\"12\",\"20\",\"21\",\"10\",\"22\",\"23\",\"24\"]', '2018-10-10 11:52:09', '2020-09-21 11:09:38');
INSERT INTO `roles` VALUES (3, 'Administrator', '[\"1\",\"2\",\"3\",\"6\",\"12\",\"10\"]', '2020-07-04 01:43:54', '2020-09-21 11:09:49');
INSERT INTO `roles` VALUES (4, 'Pengiriman', '[\"14\"]', '2020-07-04 01:49:50', '2020-07-04 01:49:50');

-- ----------------------------
-- Table structure for sample_product
-- ----------------------------
DROP TABLE IF EXISTS `sample_product`;
CREATE TABLE `sample_product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `max_sample` int(11) NOT NULL,
  `stok` int(11) NULL DEFAULT NULL,
  `status_publis` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_deleted` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_product
-- ----------------------------
INSERT INTO `sample_product` VALUES (2, 29, 'COSRX Pure Fit Cica Serum Sample', 1, 1000, 1, '2020-07-21 13:35:01', '2020-07-21 13:48:47', 0);
INSERT INTO `sample_product` VALUES (3, 26, 'Trace Oil Cleanser', 1, 1000, 1, '2020-07-21 13:35:46', '2020-07-21 13:48:46', 0);
INSERT INTO `sample_product` VALUES (4, 42, 'toner Thayers', 1, 1000, 1, '2020-08-24 14:24:45', '2020-08-24 14:25:12', 0);

-- ----------------------------
-- Table structure for searches
-- ----------------------------
DROP TABLE IF EXISTS `searches`;
CREATE TABLE `searches`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of searches
-- ----------------------------
INSERT INTO `searches` VALUES (2, 'dcs', 2, '2020-03-08 07:29:09', '2020-07-03 17:12:32');
INSERT INTO `searches` VALUES (3, 'das', 3, '2020-03-08 07:29:15', '2020-03-08 07:29:50');
INSERT INTO `searches` VALUES (4, 'skin', 1, '2020-07-11 10:39:28', '2020-07-11 10:39:28');
INSERT INTO `searches` VALUES (5, 'sdfdsf', 2, '2020-07-30 09:39:26', '2020-08-01 10:09:39');
INSERT INTO `searches` VALUES (6, 'masker', 2, '2020-07-30 09:39:44', '2020-07-30 09:39:49');
INSERT INTO `searches` VALUES (7, 's', 1, '2020-08-03 11:41:05', '2020-08-03 11:41:05');
INSERT INTO `searches` VALUES (8, 'all', 1, '2020-08-03 11:41:25', '2020-08-03 11:41:25');
INSERT INTO `searches` VALUES (9, 'a', 2, '2020-08-03 11:41:35', '2020-08-03 11:43:37');
INSERT INTO `searches` VALUES (10, 'h', 1, '2020-08-03 11:45:24', '2020-08-03 11:45:24');
INSERT INTO `searches` VALUES (11, 'wardah', 5, '2020-08-03 11:45:43', '2020-09-16 13:27:21');
INSERT INTO `searches` VALUES (12, 'emina', 2, '2020-08-24 12:20:59', '2020-08-31 09:51:47');
INSERT INTO `searches` VALUES (13, 'theyers', 2, '2020-08-24 12:22:31', '2020-08-31 14:25:42');
INSERT INTO `searches` VALUES (14, 'iunik', 13, '2020-08-24 12:22:53', '2020-09-04 20:45:15');
INSERT INTO `searches` VALUES (15, 'biore', 12, '2020-08-24 12:50:37', '2020-09-07 10:07:50');
INSERT INTO `searches` VALUES (16, 'thayers', 16, '2020-08-31 09:50:34', '2020-09-11 15:54:58');
INSERT INTO `searches` VALUES (17, 'handuk', 1, '2020-08-31 09:51:33', '2020-08-31 09:51:33');
INSERT INTO `searches` VALUES (18, 'thayer', 2, '2020-08-31 09:51:41', '2020-09-03 14:11:36');
INSERT INTO `searches` VALUES (19, 'facial', 1, '2020-08-31 09:51:52', '2020-08-31 09:51:52');
INSERT INTO `searches` VALUES (20, 'pelemban', 1, '2020-08-31 09:53:25', '2020-08-31 09:53:25');
INSERT INTO `searches` VALUES (21, 'laravel', 1, '2020-08-31 14:26:31', '2020-08-31 14:26:31');
INSERT INTO `searches` VALUES (22, 'olay', 1, '2020-08-31 14:27:39', '2020-08-31 14:27:39');
INSERT INTO `searches` VALUES (23, 'signatra', 1, '2020-08-31 22:38:30', '2020-08-31 22:38:30');
INSERT INTO `searches` VALUES (24, 'the ordinary', 1, '2020-08-31 22:38:36', '2020-08-31 22:38:36');
INSERT INTO `searches` VALUES (25, 'serum', 5, '2020-09-01 10:31:20', '2020-09-01 10:40:19');
INSERT INTO `searches` VALUES (26, 'towel', 1, '2020-09-01 13:51:33', '2020-09-01 13:51:33');
INSERT INTO `searches` VALUES (27, 'Haum', 1, '2020-09-01 17:04:38', '2020-09-01 17:04:38');
INSERT INTO `searches` VALUES (28, 'witch', 1, '2020-09-02 15:23:04', '2020-09-02 15:23:04');
INSERT INTO `searches` VALUES (29, 'propolis', 1, '2020-09-02 15:23:40', '2020-09-02 15:23:40');
INSERT INTO `searches` VALUES (30, 'viva waterdrop', 1, '2020-09-03 09:12:49', '2020-09-03 09:12:49');
INSERT INTO `searches` VALUES (31, 'sjslfslfjs', 1, '2020-09-04 15:00:41', '2020-09-04 15:00:41');
INSERT INTO `searches` VALUES (32, 'sukin', 1, '2020-09-04 15:00:45', '2020-09-04 15:00:45');
INSERT INTO `searches` VALUES (33, 'clear face', 1, '2020-09-11 23:18:39', '2020-09-11 23:18:39');
INSERT INTO `searches` VALUES (34, 'Harvest moon', 1, '2020-09-16 13:27:29', '2020-09-16 13:27:29');

-- ----------------------------
-- Table structure for seller_withdraw_requests
-- ----------------------------
DROP TABLE IF EXISTS `seller_withdraw_requests`;
CREATE TABLE `seller_withdraw_requests`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `amount` double(8, 2) NULL DEFAULT NULL,
  `message` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(1) NULL DEFAULT NULL,
  `viewed` int(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seller_withdraw_requests
-- ----------------------------

-- ----------------------------
-- Table structure for sellers
-- ----------------------------
DROP TABLE IF EXISTS `sellers`;
CREATE TABLE `sellers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `verification_status` int(1) NOT NULL DEFAULT 0,
  `verification_info` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `cash_on_delivery_status` int(1) NOT NULL DEFAULT 0,
  `admin_to_pay` double(8, 2) NOT NULL DEFAULT 0,
  `bank_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bank_acc_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bank_acc_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bank_routing_no` int(50) NULL DEFAULT NULL,
  `bank_payment_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sellers
-- ----------------------------
INSERT INTO `sellers` VALUES (1, 3, 1, '[{\"type\":\"text\",\"label\":\"Name\",\"value\":\"Mr. Seller\"},{\"type\":\"select\",\"label\":\"Marital Status\",\"value\":\"Married\"},{\"type\":\"multi_select\",\"label\":\"Company\",\"value\":\"[\\\"Company\\\"]\"},{\"type\":\"select\",\"label\":\"Gender\",\"value\":\"Male\"},{\"type\":\"file\",\"label\":\"Image\",\"value\":\"uploads\\/verification_form\\/CRWqFifcbKqibNzllBhEyUSkV6m1viknGXMEhtiW.png\"}]', 1, 78.40, NULL, NULL, NULL, NULL, 0, '2018-10-07 11:42:57', '2020-01-26 11:21:11');

-- ----------------------------
-- Table structure for seo_settings
-- ----------------------------
DROP TABLE IF EXISTS `seo_settings`;
CREATE TABLE `seo_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `revisit` int(11) NOT NULL,
  `sitemap_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seo_settings
-- ----------------------------
INSERT INTO `seo_settings` VALUES (1, '', 'REVO', 11, 'myponnylive.com', 'myponnylive.com', '2020-08-29 17:07:12', '2020-08-29 17:07:12');

-- ----------------------------
-- Table structure for shops
-- ----------------------------
DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sliders` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `google` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `pick_up_point_id` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shops
-- ----------------------------
INSERT INTO `shops` VALUES (1, 3, 'Demo Seller Shop', 'shop/logo/Gt1xw7vjTpMnwpADkGSilc35qrAfcw02kuZ36Jdn.png', '[\"uploads\\/shop\\/sliders\\/lToeKDeUyWcxy1HRs2yH37oBLyIwEwyPkqdyXBRO.jpeg\",\"uploads\\/shop\\/sliders\\/asDBJ3Bro1ijNaNnx3Hpnp6uq3n66ndyLczOJ0F6.jpeg\",\"uploads\\/shop\\/sliders\\/ltwUfHND4QP1K7bPFbuOC4i8v6zL9KHJKzex4zaX.jpeg\"]', 'House : Demo, Road : Demo, Section : Demo', 'www.facebook.com', 'www.google.com', 'www.twitter.com', 'www.youtube.com', 'Demo-Seller-Shop-1', 'Demo Seller Shop Title', 'Demo description', NULL, '2018-11-27 17:23:13', '2019-08-06 13:43:16');

-- ----------------------------
-- Table structure for skin_concern
-- ----------------------------
DROP TABLE IF EXISTS `skin_concern`;
CREATE TABLE `skin_concern`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skin_concern
-- ----------------------------
INSERT INTO `skin_concern` VALUES (1, 'OIL CONTROL / PORES', 'oil-control-pores');
INSERT INTO `skin_concern` VALUES (2, 'PIGMENTATION & BLEMISH', 'pigmentation-blemish');
INSERT INTO `skin_concern` VALUES (3, 'ACNE', 'acne');
INSERT INTO `skin_concern` VALUES (4, 'DRYNES / HYDRATION', 'drynes-hydration');
INSERT INTO `skin_concern` VALUES (5, 'SENSITIVE', 'sensitive');
INSERT INTO `skin_concern` VALUES (6, 'REDNESS', 'redness');
INSERT INTO `skin_concern` VALUES (7, 'ANTI-AGING / WRINKLES', 'anti-aging-wrinkles');
INSERT INTO `skin_concern` VALUES (8, 'jerawat meradang', 'jerawat-meradang');

-- ----------------------------
-- Table structure for skin_type
-- ----------------------------
DROP TABLE IF EXISTS `skin_type`;
CREATE TABLE `skin_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skin_type
-- ----------------------------
INSERT INTO `skin_type` VALUES (1, 'Kulit Berminyak', 'kulit-berminyak', 'oily-skin.png');
INSERT INTO `skin_type` VALUES (2, 'Kulit Kombinasi', 'kulit-kombinasi', 'combination-skin.png');
INSERT INTO `skin_type` VALUES (3, 'Kulit Normal', 'kulit-normal', 'normal-skin.png');
INSERT INTO `skin_type` VALUES (4, 'Kulit Kering', 'kulit-kering', 'dry-skin.png');
INSERT INTO `skin_type` VALUES (5, 'Kulit Sensitif', 'kulit-sensitif', 'sensitive-skin.png');

-- ----------------------------
-- Table structure for skinlopedia
-- ----------------------------
DROP TABLE IF EXISTS `skinlopedia`;
CREATE TABLE `skinlopedia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skinlopedia
-- ----------------------------
INSERT INTO `skinlopedia` VALUES (8, 'Jerawat', '<div class=\"os0Kkc\" style=\"margin: 16px 0px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 14px;\"><div class=\"PZPZlf\" data-attrid=\"kc:/medicine/disease:description\">Kondisi kulit yang terjadi ketika folikel rambut tersumbat minyak dan sel-sel kulit mati.</div></div><div class=\"os0Kkc\" style=\"margin: 16px 0px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 14px;\"><div class=\"m6vS6b PZPZlf\" data-attrid=\"kc:/medicine/disease:long description\" style=\"line-height: 20px;\">Jerawat paling umum terjadi pada remaja dan dewasa muda.</div><div class=\"m6vS6b PZPZlf\" data-attrid=\"kc:/medicine/disease:long description\" style=\"line-height: 20px;\">Gejala mulai dari komedo kepala hitam hingga jerawat nanah atau benjolan besar, kemerahan, dan lembut.</div><div class=\"m6vS6b PZPZlf\" data-attrid=\"kc:/medicine/disease:long description\" style=\"line-height: 20px;\">Penanganan berupa krim dan pembersih yang dijual bebas, serta resep antibiotik.</div></div>', 'avatar-01.png', '2020-09-08 14:19:30', '2020-09-08 14:19:30');
INSERT INTO `skinlopedia` VALUES (9, 'Inflamasi', '<p><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">Inflamasi</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">&nbsp;atau peradangan merupakan mekanisme tubuh dalam melindungi diri dari infeksi mikroorganisme asing, seperti virus, bakteri, dan jamur. Pada saat mekanisme alami ini berlangsung, sel-sel darah putih dan zat yang dihasilkannya sedang melakukan perlawanan dalam rangka membentuk perlindungan</span><br></p>', 'avatar-02.png', '2020-09-08 14:21:09', '2020-09-08 14:21:09');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `published` int(1) NOT NULL DEFAULT 1,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (27, 'uploads/sliders/dVJ1E7PTeGMxXh4Q4Fr0eQrsBXKIIsFg8g1s7Cr6.jpeg', 1, './promotion', '2020-09-02 10:09:14', '2020-09-02 10:09:14');
INSERT INTO `sliders` VALUES (28, 'uploads/sliders/SS4q8SLcyN9CtKcBZ19FKJwkuXYZNwgA8pFPZ4oB.jpeg', 1, './', '2020-09-02 10:09:33', '2020-09-02 10:09:33');
INSERT INTO `sliders` VALUES (29, 'uploads/sliders/NRiuxZVwXcGoPvmdjRgu9wsRH6nO9rAy4tqsxDpK.jpeg', 1, './', '2020-09-02 10:10:17', '2020-09-02 10:10:17');
INSERT INTO `sliders` VALUES (31, 'uploads/sliders/YUnOnRoWl2oEcFARmB16ZS9ocyqXyvwGXVWAgsBZ.jpeg', 1, './', '2020-09-11 14:26:46', '2020-09-11 14:26:46');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES (1, 15, 1, '2020-07-03 06:28:48', '2020-07-03 06:28:48');
INSERT INTO `staff` VALUES (2, 31, 2, '2020-08-28 15:31:14', '2020-08-28 15:31:14');

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_category_id`(`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------
INSERT INTO `sub_categories` VALUES (10, 'Cleanser', 5, 'Cleanser-hrmeW', NULL, NULL, '2020-07-18 14:09:51', '2020-07-18 14:09:51');
INSERT INTO `sub_categories` VALUES (11, 'Treatments', 5, 'Treatments-526gS', NULL, NULL, '2020-07-18 14:10:24', '2020-07-18 14:10:24');
INSERT INTO `sub_categories` VALUES (12, 'Eye Care', 5, 'Eye-Care-41NGj', NULL, NULL, '2020-07-18 14:10:38', '2020-07-18 14:10:38');
INSERT INTO `sub_categories` VALUES (13, 'Exfoliators', 5, 'Exfoliators-w2KTU', NULL, NULL, '2020-07-18 14:10:59', '2020-07-18 14:10:59');
INSERT INTO `sub_categories` VALUES (14, 'Masks', 5, 'Masks-MHkb8', NULL, NULL, '2020-07-18 14:11:12', '2020-07-18 14:11:12');
INSERT INTO `sub_categories` VALUES (15, 'Moisturizer', 5, 'Moisturizer-xEH1H', NULL, NULL, '2020-07-18 14:11:33', '2020-07-18 14:11:33');
INSERT INTO `sub_categories` VALUES (16, 'Toner', 5, 'Toner-vBLWA', NULL, NULL, '2020-07-18 14:11:42', '2020-07-18 14:11:42');
INSERT INTO `sub_categories` VALUES (17, 'Sunscreen & Sunblock', 5, 'Sunscreen--Sunblock-jiosw', NULL, NULL, '2020-07-18 14:12:05', '2020-07-18 14:12:05');
INSERT INTO `sub_categories` VALUES (18, 'Hair Care', 6, 'Hair-Care-2IU5X', NULL, NULL, '2020-07-18 14:58:16', '2020-07-18 14:58:16');
INSERT INTO `sub_categories` VALUES (19, 'Beauty & Make Up', 6, 'Beauty--Make-Up-KRldy', NULL, NULL, '2020-07-18 14:58:34', '2020-07-18 14:58:34');
INSERT INTO `sub_categories` VALUES (20, 'Beauty Roller', 7, 'Beauty-Roller-FXxrm', NULL, NULL, '2020-07-18 14:58:57', '2020-07-18 14:58:57');
INSERT INTO `sub_categories` VALUES (21, 'Brush & Applicator', 7, 'Brush--Applicator-fIock', NULL, NULL, '2020-07-18 14:59:14', '2020-07-18 14:59:14');
INSERT INTO `sub_categories` VALUES (22, 'Cleansing Brush', 7, 'Cleansing-Brush-TpnyE', NULL, NULL, '2020-07-18 14:59:28', '2020-07-18 14:59:28');
INSERT INTO `sub_categories` VALUES (23, 'Cotton', 7, 'Cotton-vbHPS', NULL, NULL, '2020-07-18 14:59:40', '2020-07-18 14:59:40');
INSERT INTO `sub_categories` VALUES (24, 'Electronics', 7, 'Electronics-FE7fY', NULL, NULL, '2020-07-18 14:59:59', '2020-07-18 14:59:59');
INSERT INTO `sub_categories` VALUES (25, 'Eye & Eyebrow', 7, 'Eye--Eyebrow-YNLyq', NULL, NULL, '2020-07-18 15:00:13', '2020-07-18 15:00:13');
INSERT INTO `sub_categories` VALUES (26, 'Makeup Pouch & Bag', 7, 'Makeup-Pouch--Bag-KN4ct', NULL, NULL, '2020-07-18 15:00:33', '2020-07-18 15:00:33');
INSERT INTO `sub_categories` VALUES (27, 'Sponge', 7, 'Sponge-G5ZHi', NULL, NULL, '2020-07-18 15:00:44', '2020-07-18 15:00:44');
INSERT INTO `sub_categories` VALUES (28, 'Eye Care', 5, 'Eye-Care-TlmUw', NULL, NULL, '2020-07-22 12:56:56', '2020-07-22 12:56:56');
INSERT INTO `sub_categories` VALUES (29, 'Treatments', 5, 'Treatments-7CZSa', NULL, NULL, '2020-07-22 13:15:35', '2020-07-22 13:15:35');

-- ----------------------------
-- Table structure for sub_sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_sub_categories`;
CREATE TABLE `sub_sub_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_sub_category_id`(`sub_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_sub_categories
-- ----------------------------
INSERT INTO `sub_sub_categories` VALUES (18, 10, 'Oil Cleanser', 'Oil-Cleanser-iMqBn', NULL, NULL, '2020-07-18 14:12:43', '2020-07-18 14:12:43');
INSERT INTO `sub_sub_categories` VALUES (19, 10, 'Face Wash', 'Face-Wash-Ha287', NULL, NULL, '2020-07-18 14:12:56', '2020-07-18 14:12:56');
INSERT INTO `sub_sub_categories` VALUES (20, 11, 'Essence', 'Essence-LWNMi', NULL, NULL, '2020-07-18 14:13:10', '2020-07-18 14:13:10');
INSERT INTO `sub_sub_categories` VALUES (21, 11, 'Serum & Ampoule', 'Serum--Ampoule-9Fb1k', NULL, 'serum', '2020-07-18 14:13:35', '2020-08-24 11:16:16');
INSERT INTO `sub_sub_categories` VALUES (22, 11, 'Spot Treatment', 'Spot-Treatment-ipqNd', NULL, NULL, '2020-07-18 14:15:12', '2020-07-18 14:15:12');
INSERT INTO `sub_sub_categories` VALUES (23, 12, 'Eye Cream', 'Eye-Cream-2TRqm', NULL, NULL, '2020-07-18 14:15:30', '2020-07-18 14:15:30');
INSERT INTO `sub_sub_categories` VALUES (24, 12, 'Eye Mask', 'Eye-Mask-atQQG', NULL, NULL, '2020-07-18 14:15:41', '2020-07-18 14:15:41');
INSERT INTO `sub_sub_categories` VALUES (25, 13, 'Physical Exfoliators', 'Physical-Exfoliators-9FfLw', NULL, NULL, '2020-07-18 14:50:28', '2020-07-18 14:50:28');
INSERT INTO `sub_sub_categories` VALUES (26, 13, 'Chemical Exfoliators', 'Chemical-Exfoliators-Ka7vp', NULL, NULL, '2020-07-18 14:50:58', '2020-07-18 14:50:58');
INSERT INTO `sub_sub_categories` VALUES (27, 14, 'Sheet Mask', 'Sheet-Mask-Lj0jF', NULL, NULL, '2020-07-18 14:51:50', '2020-07-18 14:51:50');
INSERT INTO `sub_sub_categories` VALUES (28, 14, 'Wash-off Mask', 'Wash-off-Mask-yc2Wp', NULL, NULL, '2020-07-18 14:52:14', '2020-07-18 14:52:14');
INSERT INTO `sub_sub_categories` VALUES (29, 14, 'Sleeping Mask', 'Sleeping-Mask-nyeun', NULL, NULL, '2020-07-18 14:52:31', '2020-07-18 14:52:31');
INSERT INTO `sub_sub_categories` VALUES (30, 15, 'Facial Moisturizer', 'Facial-Moisturizer-UPYOV', NULL, NULL, '2020-07-18 14:52:55', '2020-07-18 14:52:55');
INSERT INTO `sub_sub_categories` VALUES (31, 15, 'Face Mist & oil', 'Face-Mist--oil-5wYAv', NULL, NULL, '2020-07-18 14:53:12', '2020-07-18 14:53:12');
INSERT INTO `sub_sub_categories` VALUES (32, 16, 'Acid Toner', 'Acid-Toner-0o1Ij', NULL, NULL, '2020-07-18 14:53:36', '2020-07-18 14:53:36');
INSERT INTO `sub_sub_categories` VALUES (33, 16, 'Cleansing Toner', 'Cleansing-Toner-NNJAv', NULL, NULL, '2020-07-18 14:53:56', '2020-07-18 14:53:56');
INSERT INTO `sub_sub_categories` VALUES (34, 16, 'Hydrating Toner', 'Hydrating-Toner-MzVNR', NULL, NULL, '2020-07-18 14:54:15', '2020-07-18 14:54:15');
INSERT INTO `sub_sub_categories` VALUES (35, 18, 'Shampoo', 'Shampoo-vIWYN', NULL, NULL, '2020-07-18 15:01:08', '2020-07-18 15:01:08');
INSERT INTO `sub_sub_categories` VALUES (36, 18, 'Dry Shampoo', 'Dry-shampoo-NEE0t', NULL, NULL, '2020-07-18 15:01:21', '2020-07-18 15:01:33');
INSERT INTO `sub_sub_categories` VALUES (37, 18, 'Conditioner', 'Conditioner-hQdeD', NULL, NULL, '2020-07-18 15:01:55', '2020-07-18 15:01:55');
INSERT INTO `sub_sub_categories` VALUES (38, 19, 'Face', 'Face-q6aId', NULL, NULL, '2020-07-18 15:02:20', '2020-07-18 15:02:20');
INSERT INTO `sub_sub_categories` VALUES (39, 19, 'Cheecks', 'Cheecks-KOAe1', NULL, NULL, '2020-07-18 15:02:42', '2020-07-18 15:02:42');
INSERT INTO `sub_sub_categories` VALUES (40, 19, 'Eyes', 'Eyes-CdBbK', NULL, NULL, '2020-07-18 15:02:53', '2020-07-18 15:02:53');
INSERT INTO `sub_sub_categories` VALUES (41, 19, 'Lips', 'Lips-w3zjq', NULL, NULL, '2020-07-18 15:03:08', '2020-07-18 15:03:08');
INSERT INTO `sub_sub_categories` VALUES (42, 19, 'Makeup Remover', 'Makeup-Remover-xkt0k', NULL, NULL, '2020-07-18 15:03:33', '2020-07-18 15:03:33');

-- ----------------------------
-- Table structure for subscribers
-- ----------------------------
DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscribers
-- ----------------------------

-- ----------------------------
-- Table structure for ticket_replies
-- ----------------------------
DROP TABLE IF EXISTS `ticket_replies`;
CREATE TABLE `ticket_replies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket_replies
-- ----------------------------

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `viewed` int(1) NOT NULL DEFAULT 0,
  `client_viewed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------

-- ----------------------------
-- Table structure for transfer_manual
-- ----------------------------
DROP TABLE IF EXISTS `transfer_manual`;
CREATE TABLE `transfer_manual`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `step` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transfer_manual
-- ----------------------------
INSERT INTO `transfer_manual` VALUES (1, '<div><font color=\"#5e5e5e\" face=\"Montserrat, sans-serif\"><span style=\"font-size: 14px;\">Silahkan Transfer ke&nbsp;</span></font></div><div><font color=\"#5e5e5e\" face=\"Montserrat, sans-serif\"><span style=\"font-size: 14px;\">Bank CIMB NIAGA</span></font></div><div><font color=\"#5e5e5e\" face=\"Montserrat, sans-serif\"><span style=\"font-size: 14px;\">norek 12345678</span></font></div><div><font color=\"#5e5e5e\" face=\"Montserrat, sans-serif\"><span style=\"font-size: 14px;\"><br></span></font></div><div><font color=\"#5e5e5e\" face=\"Montserrat, sans-serif\"><span style=\"font-size: 14px;\">Panduan:</span></font></div><ol style=\"margin-bottom: 0px; padding-left: 20px; font-family: Montserrat, sans-serif; font-size: 14px;\"><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Masukkan kartu ATM ke slot mesin ATM.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Masukkan nomor PIN.</li><li style=\"margin-bottom: 5px;\"><font color=\"#5e5e5e\">Pilih jenis transaksi</font> transfer.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Pilih tujuan transfer.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Masukkan jumlah transfer.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Transaksi berhasil diproses.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Menunggu konfirmasi.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Tunggu bukti transfer.</li><li style=\"color: rgb(94, 94, 94); margin-bottom: 5px;\">Sudah</li></ol>');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `referred_by` int(11) NULL DEFAULT NULL,
  `provider_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `avatar_original` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `country` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `city` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `balance` double(8, 2) NOT NULL DEFAULT 0,
  `referral_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `customer_package_id` int(11) NULL DEFAULT NULL,
  `remaining_uploads` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tgl_lahir` timestamp(0) NULL DEFAULT NULL,
  `jenis_kulit` int(10) NULL DEFAULT NULL COMMENT '1. Kulit Berminyak, 2.Kulit Kombinasi, 3.Kulit Normal, 4.Kulit Kering 5.Kulit Sensitif',
  `warna_kulit` int(10) NULL DEFAULT NULL COMMENT '1.putih 2.Kuning Langsap 3.sawo matang 4.gelap',
  `kondisi_kulit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '1.jerawat 2.garis Halus keriput 3.komedo 4.pori besar 5.kulit kusam 6.dark spot 7.kantung mata 8.kemerahan 9. flex',
  `kondisi_rambut` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `preferensi_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fbtoken` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `point` bigint(20) NOT NULL DEFAULT 0,
  `tier` int(255) NOT NULL DEFAULT 1,
  `completed_profile` int(1) NOT NULL DEFAULT 0 COMMENT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (3, NULL, NULL, 'seller', 'Mr. Seller', 'seller@example.com', '2018-12-12 01:00:00', '$2y$10$eUKRlkmm2TAug75cfGQ4i.WoUbcJ2uVPqUlVkox.cv4CCyGEIMQEm', '1zoU4eQxnOC5yxRWLsTzMNBPpJuOvTk4g3GMUVYIrbGijiXHOfIlFq0wHrIn', 'https://lh3.googleusercontent.com/-7OnRtLyua5Q/AAAAAAAAAAI/AAAAAAAADRk/VqWKMl4f8CI/photo.jpg?sz=50', 'uploads/ucQhvfz4EQXNeTbN8Eif0Cpq5LnOwvg8t7qKNKVs.jpeg', 'Demo address', 'US', 'Demo city', '1234', NULL, 0.00, '3dLUoHsR1l', NULL, NULL, '2018-10-07 11:42:57', '2020-03-05 08:33:22', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);
INSERT INTO `users` VALUES (8, NULL, NULL, 'customer', 'Mr. Customer', 'customer@example.com', '2018-12-12 01:00:00', '$2y$10$eUKRlkmm2TAug75cfGQ4i.WoUbcJ2uVPqUlVkox.cv4CCyGEIMQEm', '9ndcz5o7xgnuxctJIbvUQcP41QKmgnWCc7JDSnWdHOvipOP2AijpamCNafEe', 'https://lh3.googleusercontent.com/-7OnRtLyua5Q/AAAAAAAAAAI/AAAAAAAADRk/VqWKMl4f8CI/photo.jpg?sz=50', 'uploads/ucQhvfz4EQXNeTbN8Eif0Cpq5LnOwvg8t7qKNKVs.jpeg', 'Demo address', 'US', 'Demo city', '1234', NULL, 0.00, '8zJTyXTlTT', NULL, NULL, '2018-10-07 11:42:57', '2020-03-03 11:26:11', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);
INSERT INTO `users` VALUES (13, NULL, NULL, 'customer', 'Dita', 'ditakenprabasari@gmail.com', '2020-07-02 07:07:56', '$2y$10$P64Qs7pkQ414KIovti8.Te32btLfntki4nUgaSajKhJcay3AqCUgO', 'BNVyPBiQ0hfXCUz7Ot5QwsgoPEyGKNRd20DEh7FEkztnyPKlDJn1mFc7dAHp', NULL, 'uploads/users/GyDvkflz0bt3g8EiRFHE8liVFazSJ9tl5i0uo8Uy.jpeg', 'jalan mulyorejo utara 177', 'ID', 'surabaya', '08783232311', '83831450890', 0.00, '13meC1D5i6', NULL, 0, '2020-07-02 07:33:56', '2020-09-22 11:31:26', 'Revo', 'P', '2000-09-12 00:00:00', 1, 2, '[1,3,9]', '[5]', '[1]', NULL, 12272, 2, 1);
INSERT INTO `users` VALUES (14, NULL, NULL, 'admin', 'Admin ponny', 'ponnydev@gmail.com', '2020-07-01 15:07:55', '$2y$10$WDEXqCtyAwTeA6PREJDSuOw0dKqOtHA7FYsyqMI.Labe4tXfhlQhG', 'D3U75LkqpAe8jL5z7IngR7xpYgv5W4cAOQU1HpLMBhZlaQuH71nCIkxTZgz8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, 0, '2020-07-01 15:51:55', '2020-07-01 15:51:55', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);
INSERT INTO `users` VALUES (31, NULL, NULL, 'staff', 'Admin Penjualan', 'adminponny@gmail.com', '2020-09-01 15:34:05', '$2y$10$/BdR87i9YYyBC16nDk8YV.YZ3AsG4wqmUG28NNdVazT0k3NeMS2e2', 'AIo9kAtzkmOIH63geoqCb3vqnYZxXdfCe6BTNHl61jvhZRJopQYVZu02aEu8', NULL, NULL, NULL, NULL, NULL, NULL, '087878787878', 0.00, NULL, NULL, 0, '2020-08-28 15:31:14', '2020-08-29 09:51:54', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);
INSERT INTO `users` VALUES (53, NULL, '101207197031185697192', 'customer', 'joko', 'jokostyawan267@gmail.com', '2020-09-01 15:09:44', NULL, '3rWGAmrkQMNTE7Qgav68CaDWP9VEkrNNXcGvAs3478TvjI4nTxxpYj7NZcT3', NULL, NULL, NULL, NULL, NULL, NULL, '+6282230227809', 0.00, '534xD8kXyI', NULL, 0, '2020-09-01 15:23:44', '2020-09-09 11:40:46', 'styawan', 'L', '2020-09-16 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1237, 1, 0);
INSERT INTO `users` VALUES (54, NULL, '3687164771300950', 'customer', 'Dita Ken', 'kenzachita@yahoo.com', '2020-09-01 15:09:29', NULL, 'XONhop0cTNeHqsqH5i4F6bNnFGdyjc4UAU6uYyQyhJgxVmSf4QtTzldcmvRy', NULL, NULL, NULL, NULL, NULL, NULL, '+62087878787878', 0.00, NULL, NULL, 0, '2020-09-01 15:26:29', '2020-09-01 15:26:29', 'Prabasari', 'P', '2000-08-16 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (55, NULL, NULL, 'customer', 'dita', 'arbi.coba@gmail.com', '2020-09-01 15:38:20', '$2y$10$FCs.xIsMgykyRPSLCXuakOjsQaRo4k5D6UYu0AouXkpj10fiDn6TK', 'lwttBKqKdxjRv0IUOQLn2h8EwzunAAKeYSYZ0ilN8oitZFhkchV2KYCpICgD', NULL, NULL, NULL, NULL, NULL, NULL, '+628787878787878', 0.00, NULL, NULL, 0, '2020-09-01 15:37:59', '2020-09-01 15:38:20', 'revo', 'P', '2020-09-15 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (56, NULL, '109203513231547391651', 'customer', 'Marco', 'msoegimin@ponnybeaute.co.id', '2020-09-01 15:09:12', NULL, 'YMGXEjpIjt5TMvE6HhGbX3AvKVWF9fLIewgUvwBvS13PiMayURpRB4UOCQy2', NULL, NULL, NULL, NULL, NULL, NULL, '82299008979', 0.00, '56EXY7RkXo', NULL, 0, '2020-09-01 15:39:12', '2020-09-05 20:46:25', 'Soegimin', 'L', '1992-11-08 00:00:00', 4, 4, '[4]', '[4]', '[3]', 'cBObCAUBjSxgWOE8qgVqXV:APA91bFyT262jEeX8xSCSdNNZ_3NcskXR1oaqXXOn3dAxa96tAF-lKCJVNuFFCf1yylnGZFtul1Z55kmnALN2C3b59mRADUlYOEJ_pfimShXUpy7D8XcY1yGH0AJAw_tGAF1_PFaTTc9', 261, 1, 1);
INSERT INTO `users` VALUES (57, NULL, '111469147349416', 'customer', 'Dita Prabasari', 'ditaken3@gmail.com', '2020-09-01 15:09:15', NULL, 'BFlIdrdxQi6yLYDdfxUGcKMWus7iPOvvz5ygQG1WDXPxbkc2yufBN9c0AzJd', NULL, NULL, NULL, NULL, NULL, NULL, '+62878787878654', 0.00, NULL, NULL, 0, '2020-09-01 15:44:15', '2020-09-12 10:26:53', 'ken', 'P', '2000-07-12 00:00:00', 5, NULL, NULL, NULL, NULL, NULL, 16731, 2, 0);
INSERT INTO `users` VALUES (58, NULL, '111292041187193966068', 'customer', 'Revo', 'revotestingsatu@gmail.com', '2020-09-01 15:09:28', NULL, 'EErSJ3TE9650wwD2sPk5xTXcBPDyeK1SfYpcgECYwnx8Pl9bchSJPcUzaibM', NULL, NULL, NULL, NULL, NULL, NULL, '+6287878783422', 0.00, NULL, NULL, 0, '2020-09-01 15:45:28', '2020-09-01 15:45:28', 'Testing1', 'L', '2020-09-08 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (59, NULL, 'SHxRsL4tK1fntjWrwSMz6FaDxow2', 'customer', 'Dita', NULL, '2020-09-01 15:09:00', NULL, 'bGAfRUGyRmvawvxZdHI9CeoKJsOC6FdhvLlTk93uLVLfe5e1HXl7Z0fdK2yQ', NULL, NULL, NULL, NULL, NULL, NULL, '+62895335570826', 0.00, NULL, NULL, 0, '2020-09-01 15:48:00', '2020-09-01 15:48:00', 'Prabasari', 'P', '2020-09-01 00:00:00', 4, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (60, NULL, '80rErj7379OAuMobeQk4pLhBNvs1', 'customer', 'Marco', NULL, '2020-09-01 16:09:10', NULL, 'r8wLtD68yuJO7139y13TRF0JdqHoo2YDHU4hwllD8CXOvrt9AFkHh0u3xBkH', NULL, NULL, NULL, NULL, NULL, NULL, '+6282299008979', 0.00, NULL, NULL, 0, '2020-09-01 16:44:10', '2020-09-01 16:44:10', 'Soegimin', 'L', '1992-11-08 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (61, NULL, NULL, 'customer', 'Marco', 'msoegimin1@gmail.com', '2020-09-01 16:47:25', '$2y$10$tkzCHMrqH83x16.dSGgeAOg5izst6fltBRAnNiuSQW8cDg5h5aYt2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+6281999008979', 0.00, NULL, NULL, 0, '2020-09-01 16:46:48', '2020-09-01 16:47:25', 'Soegimin', 'L', '1992-11-08 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (62, NULL, NULL, 'customer', 'Marco', 'marcosoegimin@hotmail.com', NULL, '$2y$10$nBIRBj9Gxmzl.tKGrU8x/uCQD7psKieDFljVav4nw.vEyh5zWMR8u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+6281999008977', 0.00, NULL, NULL, 0, '2020-09-01 16:55:32', '2020-09-01 16:55:35', 'Soegimin', 'L', '1992-01-29 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (63, NULL, NULL, 'customer', 'Jess', 'jesicaaprilia@ponnybeaute.co.id', '2020-09-07 14:22:59', '$2y$10$Cnn6w4VddYvXVMKASgyfH.XkrlGFWcrvqVeb/en4TnKw0uWWydpwC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+62082349561777', 0.00, '632g0RpY6y', NULL, 0, '2020-09-01 17:14:42', '2020-09-08 15:00:30', NULL, 'P', '2020-09-09 00:00:00', 2, 2, '[2]', '[3]', '[3]', NULL, 61, 1, 1);
INSERT INTO `users` VALUES (64, NULL, 'J8ClJKs94udRWX8cCwB4a7GLyNl1', 'customer', 'Alfian', NULL, '2020-09-02 13:09:53', NULL, 'Ct7TirlgtUo20AamXxFrNK932oeRM7pAwjc3GQkWmY2k4WZdjDqevKkIDH7T', NULL, NULL, NULL, NULL, NULL, NULL, '+6285815705272', 0.00, NULL, NULL, 0, '2020-09-02 13:23:53', '2020-09-02 13:28:05', 'Ma\'ruf', 'L', '2000-04-26 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, 305, 1, 0);
INSERT INTO `users` VALUES (65, NULL, '1888852071253946', 'customer', 'Muhammad Alfian', 'alfianm264@gmail.com', '2020-09-02 13:09:50', NULL, 'lG3yxPdi53Dmr8GMm1dS3KgRZusBUHlAp8VQGXnveIbjmMUnpXwMLUuRwOvf', NULL, 'uploads/users/YIJDdrbYcxOpH7Lapnzgt83ifeKw6w5A5g50u4yS.jpeg', NULL, NULL, NULL, NULL, '+6285815705272', 0.00, '65WwVCj5BM', NULL, 0, '2020-09-02 13:35:50', '2020-09-02 14:45:30', 'Ma\'ruf', 'L', '2000-04-26 00:00:00', 1, 3, '[3]', '[4]', '[1]', NULL, 1471, 1, 1);
INSERT INTO `users` VALUES (66, NULL, 'is38XprjxGUJs0rpSj6nE1YIM2u2', 'customer', 'elfed', NULL, '2020-09-02 13:09:53', NULL, 'Z7LJZmRNU5O9MOBh3Hpz6izTB4EPmfBnLat0c4vZNzItUfRBjKTupZDoE0Vt', NULL, 'uploads/users/NRd61lYBNs2K9XEIdbaD24gFgkdSh8146vkPyvHT.jpeg', NULL, NULL, NULL, NULL, '+6281329640813', 0.00, NULL, NULL, 0, '2020-09-02 13:46:53', '2020-09-02 15:30:36', 'elford', 'L', '2020-09-09 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 55, 1, 0);
INSERT INTO `users` VALUES (67, NULL, '110348576811572585853', 'customer', 'uks', 'uks.dispendik@gmail.com', '2020-09-03 10:09:24', '$2y$10$FRaH.yUeoeMrt5VIxIv.Gut4pN5FMLIGfPIwjcbrfqoneb/FqrvTS', 'ZuVcabiiVTlwSNpbqQkNuQYZ5xD0KnLLEx3qnsCLixED4QqZvN5OCdd8Twf5', NULL, NULL, NULL, NULL, NULL, NULL, '+6281329640813', 0.00, NULL, NULL, 0, '2020-09-03 10:20:24', '2020-09-19 16:56:22', 'dispendik', 'L', '2020-09-08 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (68, NULL, NULL, 'customer', 'Luna Maya', 'raravivit16@gmail.com', NULL, '$2y$10$vjHX0PCpdNPn3Ii9bP88i.abg79d.ayBfRivtmI6bZoqdTb8UPqHi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, 0, '2020-09-03 14:54:42', '2020-09-03 14:54:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);
INSERT INTO `users` VALUES (69, NULL, '107001025511955689946', 'customer', 'faw', 'faweisung@gmail.com', '2020-09-04 10:09:05', NULL, 'BWnJ6Wi6EtvTDfgR00rwbdvtcDAbDoMnYFUc0rk0SV3rMJAY5eENvGabtt6Z', NULL, NULL, NULL, NULL, NULL, NULL, '81329640813', 0.00, NULL, NULL, 0, '2020-09-04 10:27:05', '2020-09-05 11:01:27', 'ei sung', 'L', '2020-09-02 00:00:00', 5, NULL, '[]', '[]', '[]', NULL, 5, 1, 0);
INSERT INTO `users` VALUES (70, NULL, '111214234050447', 'customer', 'Dita Revo', 'revo.ditaa@gmail.com', '2020-09-05 11:09:33', NULL, 'uXVJESPxSmXw1wP4O7id0gBkYt4ZfHUNwZiO5O4w9kxXljgkr7hBsGJun8el', NULL, NULL, NULL, NULL, NULL, NULL, '87878787878', 0.00, NULL, NULL, 0, '2020-09-05 11:48:33', '2020-09-17 14:40:22', 'Apps', 'P', '2020-09-15 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1582, 1, 0);
INSERT INTO `users` VALUES (71, NULL, 'SJJilwgT7VXZP1eYw15c7Iy5rb13', 'customer', 'JOKO', NULL, '2020-09-05 15:09:07', NULL, 'NNt1yjMcLWwzipmkAgITWaCnAtRzbTUO9rEMC3au2ZlMd4Yx2DvDgm6j23m4', NULL, NULL, NULL, NULL, NULL, NULL, '82230227809', 0.00, NULL, NULL, 0, '2020-09-05 15:38:07', '2020-09-05 15:38:07', 'Styawan', 'L', '2020-09-15 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (72, NULL, '117099644125449755220', 'customer', 'Cornelia', 'corneliahhh16@gmail.com', '2020-09-07 12:09:19', NULL, 'u274TsR2984EGn8lsuV0A1puWamQp2tYbbtBmRc7z9guVHuZLKwND0tXWRhC', NULL, NULL, NULL, NULL, NULL, NULL, '81285892808', 0.00, NULL, NULL, 0, '2020-09-07 12:28:19', '2020-09-07 12:28:19', 'Yasmin', 'P', '2020-09-26 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (73, NULL, NULL, 'customer', 'luna maya', 'saossambel12345@gmail.com', '2020-09-08 14:59:25', '$2y$10$EFbQBT5ErZDCFnBy8LD2PuPL99rL5dSyhpyt5W09jmS8JOYGGbYbC', 'di9FPy03jCX0U1WoKkVHJHJegNsMr3z9E4GBYsCdb8Q7y74009rXL7oXPV6Q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, 0, '2020-09-08 14:55:27', '2020-09-08 14:59:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);
INSERT INTO `users` VALUES (74, NULL, '103536509186307443807', 'customer', 'Arbi', 'arbiwiranata48@gmail.com', '2020-09-11 12:09:13', NULL, 'zz4IirxPfG20SxlPiPtB9JXOCAg7eOZS5sfzJlAptClGBkgOvA8vSv3iGoMk', NULL, NULL, NULL, NULL, NULL, NULL, '085645080570', 0.00, NULL, NULL, 0, '2020-09-11 12:36:13', '2020-09-11 12:36:13', 'Wiranata', 'P', '2020-09-08 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (75, NULL, '112628273913931', 'customer', 'Amel', 'revo.amel@gmail.com', '2020-09-11 13:09:39', NULL, 'LpZGmhuWIQHsAFz7u2NOEzPZOK6e8FWn36m8LWxGWSYDxNSkQMPW0P9BYhAo', NULL, NULL, NULL, NULL, NULL, NULL, '0845674573', 0.00, NULL, NULL, 0, '2020-09-11 13:06:39', '2020-09-11 13:06:39', 'Revo', 'P', '2020-09-09 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (76, NULL, 'NXIpqHlLxScJArcoyj6EfoHBQ0i2', 'customer', 'Amel', NULL, '2020-09-11 13:09:56', NULL, 'XJYlCJrvIcIZO0n2QVKjwSy5MhVADAMNAuNUxemPV7uBC2Y9KNt7J7u8XGcG', NULL, NULL, NULL, NULL, NULL, NULL, '82232454238', 0.00, NULL, NULL, 0, '2020-09-11 13:13:56', '2020-09-11 13:13:56', 'amelia', 'P', '2020-09-10 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (77, NULL, NULL, 'customer', 'JOKO', 's6134090@student.ubaya.ac.id', '2020-09-12 13:24:40', '$2y$10$OJ0xAny2U83yI5bur2VC6O3vut.l/CD5EpCRHh8Kep540ednhgrn2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+6212345678', 0.00, NULL, NULL, 0, '2020-09-11 20:14:41', '2020-09-17 14:35:32', 'Styawan', 'L', '2020-09-21 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 381, 1, 0);
INSERT INTO `users` VALUES (78, NULL, 'VmYI6RnNvIgQvLfOGj0iXP6fAEq1', 'customer', 'elfed', NULL, '2020-09-14 13:09:00', NULL, '92IF3BBg0cDUyjgdqhSj7lYBhoTtgMkaQ6IjiPYnFLGDF97t45VS6pGk06Hx', NULL, NULL, NULL, NULL, NULL, NULL, '81232072122', 0.00, NULL, NULL, 0, '2020-09-14 13:26:00', '2020-09-14 13:26:00', 'foye', 'L', '2020-09-03 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (79, NULL, '115373519738446995101', 'customer', 'Indri', 'indrinovitas98@gmail.com', '2020-09-15 09:09:05', NULL, 'J3YFvH6rbjfcocdeVN0G4iIbMvMoas5QqdqLlRfSjP0qHyHvAOoRES2IukPF', NULL, NULL, NULL, NULL, NULL, NULL, '81632351682', 0.00, '796SgfrKHn', NULL, 0, '2020-09-15 09:21:05', '2020-09-15 09:27:38', 'Novitasari', 'P', '1998-11-20 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, 5, 1, 0);
INSERT INTO `users` VALUES (80, NULL, NULL, 'customer', 'Giralda Audina', 'giraldadn@gmail.com', NULL, '$2y$10$zo.rvUOPXiePis0xqq1WbOqfY0j8XwBP0pUxTgxQZUYsghByAMmCy', 'FdEMGn6E4pLLgBDP8sPbntXW1uZuVAHCMjvXYBrUv43RBP6zsB7YLRQNYLRJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, 0, '2020-09-22 18:47:32', '2020-09-22 18:47:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);

-- ----------------------------
-- Table structure for wallets
-- ----------------------------
DROP TABLE IF EXISTS `wallets`;
CREATE TABLE `wallets`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` double(8, 2) NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wallets
-- ----------------------------

-- ----------------------------
-- Table structure for wishlists
-- ----------------------------
DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wishlists
-- ----------------------------
INSERT INTO `wishlists` VALUES (3, 19, 26, '2020-08-24 20:59:49', '2020-08-24 20:59:49');
INSERT INTO `wishlists` VALUES (4, 50, 54, '2020-09-01 09:43:24', '2020-09-01 09:43:24');
INSERT INTO `wishlists` VALUES (5, 50, 53, '2020-09-01 09:49:43', '2020-09-01 09:49:43');
INSERT INTO `wishlists` VALUES (9, 13, 48, '2020-09-02 13:25:06', '2020-09-02 13:25:06');
INSERT INTO `wishlists` VALUES (14, 66, 53, '2020-09-02 15:36:37', '2020-09-02 15:36:37');
INSERT INTO `wishlists` VALUES (15, 66, 54, '2020-09-02 15:36:41', '2020-09-02 15:36:41');
INSERT INTO `wishlists` VALUES (16, 66, 52, '2020-09-02 15:37:01', '2020-09-02 15:37:01');
INSERT INTO `wishlists` VALUES (17, 67, 27, '2020-09-04 10:21:30', '2020-09-04 10:21:30');
INSERT INTO `wishlists` VALUES (18, 67, 29, '2020-09-04 10:21:46', '2020-09-04 10:21:46');
INSERT INTO `wishlists` VALUES (19, 56, 57, '2020-09-05 20:38:22', '2020-09-05 20:38:22');
INSERT INTO `wishlists` VALUES (20, 56, 53, '2020-09-05 20:38:44', '2020-09-05 20:38:44');
INSERT INTO `wishlists` VALUES (22, 63, 53, '2020-09-07 14:33:44', '2020-09-07 14:33:44');
INSERT INTO `wishlists` VALUES (23, 63, 47, '2020-09-07 14:48:15', '2020-09-07 14:48:15');
INSERT INTO `wishlists` VALUES (24, 63, 31, '2020-09-07 15:07:13', '2020-09-07 15:07:13');
INSERT INTO `wishlists` VALUES (25, 57, 32, '2020-09-11 13:41:19', '2020-09-11 13:41:19');
INSERT INTO `wishlists` VALUES (26, 57, 27, '2020-09-11 13:41:52', '2020-09-11 13:41:52');
INSERT INTO `wishlists` VALUES (27, 57, 35, '2020-09-11 13:41:55', '2020-09-11 13:41:55');
INSERT INTO `wishlists` VALUES (28, 57, 43, '2020-09-12 10:44:56', '2020-09-12 10:44:56');
INSERT INTO `wishlists` VALUES (29, 57, 45, '2020-09-12 10:45:00', '2020-09-12 10:45:00');
INSERT INTO `wishlists` VALUES (30, 57, 59, '2020-09-12 10:45:03', '2020-09-12 10:45:03');
INSERT INTO `wishlists` VALUES (31, 57, 39, '2020-09-12 10:45:21', '2020-09-12 10:45:21');
INSERT INTO `wishlists` VALUES (32, 57, 41, '2020-09-12 10:45:24', '2020-09-12 10:45:24');
INSERT INTO `wishlists` VALUES (33, 57, 26, '2020-09-12 11:00:18', '2020-09-12 11:00:18');
INSERT INTO `wishlists` VALUES (34, 57, 48, '2020-09-12 11:00:43', '2020-09-12 11:00:43');
INSERT INTO `wishlists` VALUES (35, 13, 33, '2020-09-19 12:07:52', '2020-09-19 12:07:52');
INSERT INTO `wishlists` VALUES (36, 13, 27, '2020-09-19 12:15:01', '2020-09-19 12:15:01');

SET FOREIGN_KEY_CHECKS = 1;
