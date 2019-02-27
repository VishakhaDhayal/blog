-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Automotive',	'2018-09-29 03:05:21',	'2018-09-29 03:05:21'),
(2,	'Restaurants',	'2018-09-29 03:06:36',	'2018-09-29 03:06:36'),
(3,	'Arts & Entertainment',	'2018-09-29 03:47:16',	'2018-09-29 03:47:16'),
(4,	'Shopping',	'2018-09-29 03:47:20',	'2018-09-29 03:47:20'),
(5,	'Bars',	'2018-09-29 03:47:24',	'2018-09-29 03:47:24');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13,	'2014_10_12_000000_create_users_table',	1),
(14,	'2014_10_12_100000_create_password_resets_table',	1),
(15,	'2018_06_23_095004_create_todos_table',	1),
(16,	'2018_07_07_103825_create_posts_table',	1),
(17,	'2018_07_07_104201_create_categories_table',	1),
(18,	'2018_08_21_143038_create_tags_table',	1),
(19,	'2018_08_21_143653_create_post_tag_table',	1),
(20,	'2018_08_23_151224_create_profiles_table',	1),
(21,	'2018_09_22_061650_create_settings_table',	2),
(22,	'2018_10_02_134422_insert_user_id_column_to_post',	3);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `category_id`, `featured`, `deleted_at`, `created_at`, `updated_at`, `user_id`) VALUES
(1,	'Maruti Scross',	'my-first-laravel-post',	'this is an image of the best car of 2018 Scross\r\nthis is an image of the best car of 2018 Scrossthis is an image of the best car of 2018 Scross\r\nthis is an image of the best car of 2018 Scross',	1,	'uploads/posts/1538210443new-scross.jpg',	NULL,	'2018-09-29 03:10:43',	'2018-09-29 03:12:35',	1),
(2,	'Nanadoz Resturant',	'nanadoz-resturant',	'Nando\'s is an international casual dining restaurant chain originating in South Africa. Founded in 1987, Nando\'s operates over 1,000 outlets in 35',	2,	'uploads/posts/1538210630Nandos1.jpg',	NULL,	'2018-09-29 03:13:50',	'2018-09-29 03:13:50',	3),
(3,	'Cultural Exhibition',	'cultural-exhibition',	'painting',	3,	'uploads/posts/1538212924indian_musicians_iii.jpg',	NULL,	'2018-09-29 03:52:04',	'2018-09-29 03:52:04',	3),
(4,	'Pot Making',	'pot-making',	'potmaking',	3,	'uploads/posts/1538222040clay-potter-artist-making-pot-shape-on-wheel-pedestal_4jta6j3ye__F0000.png',	NULL,	'2018-09-29 06:22:07',	'2018-09-29 06:24:00',	1),
(5,	'Statue making',	'statue-making',	'statuse',	3,	'uploads/posts/1538222024001_Bruno_02192014lr_0019.jpg',	NULL,	'2018-09-29 06:23:44',	'2018-09-29 06:23:44',	1);

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1,	1,	4,	NULL,	NULL),
(2,	2,	1,	NULL,	NULL),
(3,	2,	2,	NULL,	NULL),
(4,	3,	5,	NULL,	NULL),
(5,	4,	5,	NULL,	NULL),
(6,	5,	5,	NULL,	NULL);

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `about`, `facebook`, `youtube`, `created_at`, `updated_at`) VALUES
(1,	1,	'uploads/avatar/java.png',	'About text',	'facebook.com',	'youtube.com',	'2018-09-15 02:21:14',	'2018-09-15 02:21:14'),
(3,	3,	'uploads/avatar/java.png',	'About text',	'facebook.com',	'youtube.com',	'2018-09-15 02:21:14',	'2018-09-15 02:21:14');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `site_name`, `contact_number`, `contact_email`, `contact_address`, `created_at`, `updated_at`) VALUES
(1,	'Laravel Site',	'9882431471',	'vishakhadavinder@gmail.com',	'KalkaChandigarh',	'2018-09-29 01:30:02',	'2018-09-29 02:00:50');

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'food',	'2018-09-29 03:07:05',	'2018-09-29 03:07:05'),
(2,	'pizza',	'2018-09-29 03:07:14',	'2018-09-29 03:07:14'),
(3,	'pizza',	'2018-09-29 03:07:15',	'2018-09-29 03:07:15'),
(4,	'maruti',	'2018-09-29 03:07:28',	'2018-09-29 03:07:28'),
(5,	'painting',	'2018-09-29 03:48:07',	'2018-09-29 03:48:07'),
(6,	'apparels',	'2018-09-29 03:48:16',	'2018-09-29 03:48:16');

DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
  `todo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `todo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `todos` (`todo_id`, `todo`, `completed`, `created_at`, `updated_at`) VALUES
(1,	'Voluptas nemo eum aliquid cumque molestiae quia quos ex.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15'),
(2,	'Architecto nemo nulla quasi nisi similique et autem consectetur sint.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15'),
(3,	'Blanditiis est in quasi aut ipsam ut dolorem.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15'),
(4,	'Ullam quaerat saepe sed temporibus magni tempore.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15'),
(5,	'Rem alias maiores fugiat eos ea alias voluptas ex doloremque possimus nesciunt dolor.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15'),
(6,	'Placeat aut omnis et aliquid consequatur et nostrum rerum.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15'),
(7,	'Quis animi magnam totam vel dolorum vel officiis autem maiores est voluptatibus.',	0,	'2018-09-15 02:21:15',	'2018-09-15 02:21:15');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Vishakha',	'vishakha@gmail.com',	'$2y$10$5Vi6bsGUYEkqW/H3GrzdcOrljYI6MoeKzGdpBsaES0Ymm6CJ8K.xO',	1,	'6coIRQzOWIcweb2YGyHI7MAxbUcgvTowuZFIF2mr94SygWIMs4TsIF4Ejt1j',	'2018-09-15 02:21:14',	'2018-09-15 02:21:14'),
(3,	'Davinder',	'davinder@gmail.com',	'$2y$10$5Vi6bsGUYEkqW/H3GrzdcOrljYI6MoeKzGdpBsaES0Ymm6CJ8K.xO',	0,	NULL,	'2018-09-29 02:01:53',	'2018-09-29 02:01:53');

-- 2018-11-27 12:30:57
