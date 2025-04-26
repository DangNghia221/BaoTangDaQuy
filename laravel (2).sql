-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2025 lúc 02:12 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artifacts`
--

CREATE TABLE `artifacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `artifacts`
--

INSERT INTO `artifacts` (`id`, `name`, `category`, `material`, `age`, `description`, `location`, `image`, `created_at`, `updated_at`, `product_id`, `deleted_at`) VALUES
(2, 'ruby', 'Gemstone', 'Natural Ruby', 'Estimated to be over 500 million years old', '<p>This natural ruby gemstone, with its vibrant red hue, is one of the finest examples of corundum minerals. Mined from the Luc Yen region in northern Vietnam, it showcases excellent transparency and minimal inclusions. Rubies have long been associated with nobility, protection, and passion in various cultures.</p>', 'Vietnamese Gemstone Exhibition', 'artifacts/QEKmQQlPruXMLN4sZioQuI30qZnQFQSLznok8WEb.jpg', '2025-04-24 02:59:46', '2025-04-26 05:10:48', 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','canceled') NOT NULL DEFAULT 'pending',
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `booking_date`, `created_at`, `updated_at`) VALUES
(4, 7, 3, 1, 55000, 'confirmed', '2025-04-04 06:18:25', '2025-04-04 06:18:25', '2025-04-04 06:19:07'),
(6, 7, 9, 10, 2000000, 'canceled', '2025-04-06 07:06:50', '2025-04-06 07:06:50', '2025-04-06 07:06:58'),
(7, 7, 9, 10, 2000000, 'pending', '2025-04-08 22:08:46', '2025-04-08 22:08:46', '2025-04-08 22:08:46'),
(8, 7, 3, 1, 55000, 'pending', '2025-04-09 03:20:35', '2025-04-09 03:20:35', '2025-04-09 03:20:35'),
(9, 7, 3, 1, 55000, 'pending', '2025-04-09 03:20:49', '2025-04-09 03:20:49', '2025-04-09 03:20:49'),
(10, 16, 3, 1, 55000, 'confirmed', '2025-04-09 20:34:57', '2025-04-09 20:34:57', '2025-04-10 22:05:29'),
(11, 19, 3, 1, 55000, 'confirmed', '2025-04-09 20:57:23', '2025-04-09 20:57:23', '2025-04-21 06:29:34'),
(12, 14, 3, 1, 55000, 'pending', '2025-04-09 20:58:31', '2025-04-09 20:58:31', '2025-04-09 20:58:31'),
(13, 14, 6, 1, 123000, 'pending', '2025-04-09 20:59:44', '2025-04-09 20:59:44', '2025-04-09 20:59:44'),
(14, 14, 10, 3, 300000, 'confirmed', '2025-04-09 21:04:47', '2025-04-09 21:04:47', '2025-04-09 22:45:25'),
(15, 19, 6, 2, 246000, 'confirmed', '2025-04-09 22:46:02', '2025-04-09 22:46:02', '2025-04-10 20:40:10'),
(16, 19, 6, 1, 123000, 'confirmed', '2025-04-10 22:21:11', '2025-04-10 22:21:11', '2025-04-10 22:22:46'),
(18, 16, 6, 1, 123000, 'confirmed', '2025-04-20 20:42:02', '2025-04-20 20:42:02', '2025-04-21 06:29:51'),
(19, 16, 6, 1, 123000, 'pending', '2025-04-21 06:53:00', '2025-04-21 06:53:00', '2025-04-21 06:53:00'),
(20, 19, 3, 1, 55000, 'pending', '2025-04-22 01:08:11', '2025-04-22 01:08:11', '2025-04-22 01:08:11'),
(21, 16, 6, 1, 123000, 'pending', '2025-04-22 02:01:12', '2025-04-22 02:01:12', '2025-04-22 02:01:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ý nghĩa', 'ý nghĩa của đá quý', 1, 'categories/bi4lgOtcJPKzBKhxJUBxrhLXLchspGxCVCkyiNU8.jpg', 7, '2025-04-03 03:11:39', '2025-04-03 22:38:03'),
(5, 'sự kiện', 'áccac', 1, 'categories/r8glBRrTMQSRxxdICdAN9m87JOpggq7wrEk4gaTZ.jpg', 7, '2025-04-06 07:06:20', '2025-04-06 07:06:20'),
(6, 'khái niệm', 'các khái niệm', 1, 'categories/QjINuGtILrXO22kBJv1tee0ZmnOaPgdfiWJUnaWj.jpg', 7, '2025-04-07 01:30:11', '2025-04-07 01:30:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `libaries`
--

CREATE TABLE `libaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `libaries`
--

INSERT INTO `libaries` (`id`, `filename`, `path`, `created_at`, `updated_at`) VALUES
(1, 'tải xuống (11).jfif', 'uploads/libary/SxWb34EBemFyOzWHsztidRo2vwOFujocu2D6yBO6.jpg', '2025-04-17 20:42:31', '2025-04-17 20:42:31'),
(2, 'tải xuống (8).jfif', 'uploads/libary/qSaesR3Vkyj5JRl3oVM8vuLrYxrcPnCvOd0PMDcG.jpg', '2025-04-17 20:45:15', '2025-04-17 20:45:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2025_03_22_083712_create_sessions_table', 1),
(13, '2025_03_29_050428_create_products_table', 2),
(14, '2025_03_31_064853_add_avatar_to_users_table', 3),
(16, '2025_03_31_094743_remove_stock_from_products', 5),
(17, '2025_03_31_081617_create_products_table', 6),
(18, '2025_04_01_093727_create_posts_table', 7),
(19, '2025_04_02_093805_create_categories_table', 8),
(20, '2025_04_02_095506_create_categories_table', 9),
(21, '2025_04_03_083422_remove_status_from_posts_and_categories', 10),
(23, '2025_04_03_091600_add_status_to_categories_table', 11),
(24, '2025_04_03_095231_add_status_to_categories_table', 12),
(25, '2025_04_04_032709_modify_category_foreign_key_in_posts', 13),
(26, '2025_04_04_034003_create_bookings_table', 14),
(27, '2025_04_04_054419_add_is_hidden_to_users_table', 15),
(28, '2025_04_04_123722_add_price_to_bookings_table', 16),
(29, '2025_04_06_140147_remove_is_hidden_from_users_table', 17),
(30, '2025_04_09_092907_add_quantity_to_products_table', 18),
(31, '2025_04_11_045248_add_deleted_at_to_users_table', 19),
(32, '2025_04_17_112030_add_deleted_at_to_products_table', 20),
(33, '2025_04_17_113636_create_settings_table', 21),
(34, '2025_04_17_120002_change_sitemap_column_in_settings_table', 22),
(35, '2025_04_17_125638_create_libaries_table', 23),
(36, '2025_04_22_025228_add_event_date_to_products_table', 24),
(37, '2025_04_22_043300_create_product_histories_table', 25),
(38, '2025_04_22_082756_create_product_views_table', 26),
(39, '2025_04_22_104549_create_artifacts_table', 27),
(40, '2025_04_24_093504_add_image_to_artifacts_table', 28),
(41, '2025_04_24_100846_add_product_id_to_artifacts_table', 29),
(42, '2025_04_25_024924_update_location_column_in_artifacts_table', 29),
(43, '2025_04_25_025118_make_location_nullable_in_artifacts_table', 29),
(44, '2025_04_25_030212_add_deleted_at_to_artifacts_table', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `user_id`, `created_at`, `updated_at`, `category_id`) VALUES
(3, 'The History of Gemstones in Vietnam', '<p>&nbsp;</p>\r\n\r\n<p><strong>Discover the rich legacy of gemstones throughout Vietnam&rsquo;s cultural and geological history.</strong><br />\r\nThis document explores the journey of gemstones in Vietnam&mdash;from their discovery and mining in ancient times, to their cultural and spiritual significance across different regions and historical periods. Learn how gemstones have influenced local craftsmanship, art, and trade through centuries.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/libary/qSaesR3Vkyj5JRl3oVM8vuLrYxrcPnCvOd0PMDcG.jpg\" style=\"height:258px; width:196px\" /></p>', 'posts/jb7e03vnR1BYBBQeOvGwa5Ikxs9QhWiJe9DaDcMW.jpg', 7, '2025-04-02 02:58:37', '2025-04-21 19:14:45', 1),
(13, 'The Different Types of Gemstones: A Complete Guide', '<p>Gemstones can be categorized into two main types: precious and semi-precious. Precious stones, such as diamonds, rubies, emeralds, and sapphires, have long been prized for their beauty, rarity, and durability. They are often the centerpiece of high-end jewelry and are associated with significant emotional value, such as engagement rings.</p>\r\n\r\n<p>On the other hand, semi-precious stones are more abundant and include varieties like amethyst, topaz, garnet, and aquamarine. These stones come in a wide range of colors and are often used in less expensive jewelry pieces. Despite being less rare, semi-precious gemstones are no less beautiful, and many hold personal or cultural significance.</p>\r\n\r\n<p>Another important distinction within the gemstone world is between organic and inorganic gemstones. Inorganic gemstones are formed from minerals, such as diamonds and rubies, while organic gemstones, like pearls, amber, and coral, are derived from living organisms. Each type of gemstone has its own unique characteristics, and choosing the right one often depends on the desired color, durability, and setting.</p>', 'posts/Uv1j0itZqQmbINjx3CLFWSnp2KMTIrIRv1GYpHst.jpg', 7, '2025-04-03 20:28:16', '2025-04-21 19:27:22', 1),
(14, 'How to Identify Genuine Gemstones: A Beginner\'s Guide', '<p>&nbsp;</p>\r\n\r\n<p>Identifying genuine gemstones can be a tricky task for beginners. However, with the right knowledge and tools, you can start distinguishing authentic gemstones from imitations. The first step is to familiarize yourself with the basic properties of gemstones, such as their hardness, color, transparency, and refractive index.</p>\r\n\r\n<p>The hardness of a gemstone can be tested using the Mohs scale, which ranks minerals from 1 (talc) to 10 (diamond). Genuine gemstones like diamonds (ranked 10) and sapphires (ranked 9) are significantly harder than most other materials and will scratch most common items.</p>\r\n\r\n<p>Another way to test authenticity is through the gemstone&#39;s refractive index, which measures how light bends as it passes through the stone. High-quality gemstones like emeralds and diamonds have a distinct brilliance due to their high refractive indices. A simple way to check a stone&#39;s brilliance is by using a gemstone loupe to examine its facets.</p>\r\n\r\n<p>In addition, you can also use tools like a jeweler&#39;s loupe or a specific gemstone identification chart to help you identify different types of gemstones based on their characteristics. It&#39;s also a good idea to consult with a professional gemologist for a more accurate assessment of a gemstone&rsquo;s authenticity.</p>', 'posts/wwy5rEK8cJJrEMT7PW71JH89FqoBg7GvzPms6tzb.jpg', 7, '2025-04-03 22:37:34', '2025-04-21 19:28:24', 1),
(15, 'Famous Gemstones Around the World: Legends and Lore', '<p>Gemstones have long been the subject of legends and myths, often attributed with special powers or historical significance. One of the most famous gemstones in the world is the <strong>Hope Diamond</strong>, a large, blue diamond weighing 45.52 carats. Its history is filled with tales of misfortune, and it is said to carry a curse. The diamond was originally part of an Indian temple treasure before being stolen and making its way through the hands of various owners, many of whom suffered ill fate.</p>\r\n\r\n<p>Another famous gemstone is the <strong>Black Prince&#39;s Ruby</strong>, which is actually a red spinel, set in the Imperial State Crown of the United Kingdom. This gemstone has been part of British royal regalia for centuries and is associated with the legend of the Black Prince, a renowned military leader in medieval England.</p>\r\n\r\n<p>The <strong>Koh-i-Noor Diamond</strong> is another legendary gemstone that has passed through the hands of many rulers, including Persian kings and Indian emperors. It is said to bring great power to its wearer, though it also carries a history of conquest and bloodshed. Today, it resides in the British Crown Jewels, though its history continues to stir debates about ownership.</p>\r\n\r\n<p>These documents will give your visitors a deeper understanding of gemstones, from their history and cultural significance to how they are identified and valued.</p>\r\n\r\n<p>4o mini</p>\r\n\r\n<p>&nbsp;</p>', 'posts/QkHOGimHWii35KO6MMmxg9bBxw9sCQPwDcnUWyMl.jpg', 7, '2025-04-03 23:22:32', '2025-04-21 19:28:38', 1),
(16, 'The Science of Gemstones: How They Are Formed', '<p>Gemstones are formed deep within the Earth under extreme conditions of heat, pressure, and time. The process begins with the crystallization of minerals in magma beneath the Earth&#39;s surface. Over millions of years, geological processes like volcanic activity, erosion, and tectonic movement bring these minerals to the surface, where they are mined as raw gemstones.</p>\r\n\r\n<p>Different gemstones form under varying conditions, which is why each type has unique properties. For instance, diamonds are formed deep within the Earth&rsquo;s mantle under immense pressure and temperature, making them the hardest known natural material. In contrast, gemstones like amethyst and aquamarine are formed in cooler, more accessible environments like sedimentary rocks, which explains their relatively lower cost and abundance.</p>\r\n\r\n<p>The unique formation process of each gemstone also contributes to its distinct colors, clarity, and internal features, known as inclusions. Understanding the science behind gemstone formation can help us appreciate the natural forces that create these stunning treasures.</p>\r\n\r\n<p>&nbsp;</p>', 'posts/UlgSeZREs8hudyqWiA782VmpabTVxOu0G1la5Coa.jpg', 7, '2025-04-06 07:05:47', '2025-04-21 19:28:59', 5),
(17, 'Gemstone Treatments and Enhancements: What You Need to Know', '<p>Many gemstones undergo treatments to enhance their color, clarity, or durability. These treatments are common in the jewelry industry and help make gemstones more affordable and visually appealing. The most common types of gemstone treatments include heat treatment, irradiation, and oiling.</p>\r\n\r\n<p><strong>Heat treatment</strong> is often used to enhance the color of gemstones such as sapphires, rubies, and amethysts. This process involves heating the gemstone to high temperatures to improve its hue. For example, rubies can be heated to intensify their red color, while sapphires may undergo heat treatment to bring out their deep blue shade.</p>\r\n\r\n<p><strong>Irradiation</strong> is a process used on certain gemstones, such as diamonds and topaz, to improve their color. This method involves exposing the gemstone to radiation, which alters its chemical structure and can produce vibrant blue, green, or yellow hues.</p>\r\n\r\n<p><strong>Oiling</strong> is commonly used for emeralds to enhance their clarity. Emeralds often have natural inclusions, or &quot;garden,&quot; that can affect their transparency. Oil is used to fill in these inclusions, making the emerald appear clearer and more vibrant.</p>\r\n\r\n<p>While gemstone treatments are widely accepted in the industry, it&rsquo;s important for buyers to be aware of these enhancements and ensure that treated gemstones are disclosed as such. Many sellers provide certificates of authenticity that indicate whether a gemstone has been treated.</p>', 'posts/fQeC4F0074ILeM9hJEXcbMgjcOhHROluvPZpC7eF.jpg', 7, '2025-04-06 07:06:32', '2025-04-21 19:29:11', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `event_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Vietnamese Gemstone Exhibition', 'Showcasing gemstones native to Vietnam such as ruby from Yên Bái, sapphire from Quỳ Châu, and quartz from Đà Nẵng. Celebrates the rich natural resources of the country.', 55000.00, 4, 'products/SYK8AkgiNrRY6AJhoVdorwwFHZheod6kG1lUJxAW.jpg', '2025-04-24', '2025-03-31 03:01:22', '2025-04-22 01:08:11', NULL),
(6, 'nternational Gemstone Gallery', 'A global display of famous gemstones including South African diamonds, Colombian emeralds, Australian opals, and Sri Lankan sapphires – highlighting the diversity of the gem world.', 123000.00, 2, 'products/MOWvZsWBpKXMErvfCBfu6KlclU2WwOiBRdShzTlM.jpg', '2025-04-25', '2025-03-31 03:05:17', '2025-04-22 02:01:12', NULL),
(9, 'Ancient Gem Jewelry Hall', 'Exhibiting antique gemstone jewelry from different eras – from the Đông Sơn culture to the Nguyễn Dynasty, as well as classic Western collections from the 18th–19th centuries.', 200000.00, 7, 'products/hiiHJWHjMuPZKlq3POzAk1CCKHtUGuBE1I5gNHNS.jpg', NULL, '2025-04-06 07:05:12', '2025-04-21 05:35:15', NULL),
(10, 'Gem Education & Knowledge Zone', 'An interactive area offering information on gemstone formation, crystal structures, physical properties, and how to identify real vs. fake stones. May include 3D models, touchscreens, and microscopes.', 100000.00, 2, 'products/aXXrU9HqbjseeoE45OlZRKgJMsrdgv9F6s4YsfJa.jpg', '2025-04-27', '2025-04-09 02:34:53', '2025-04-21 20:06:09', NULL),
(11, 'Spiritual & Feng Shui Gemstones Zone', 'Focusing on gemstones used in Eastern traditions for spiritual and feng shui purposes – such as quartz, black jade, and nephrite – believed to bring healing, luck, and prosperity.', 200000.00, 9, 'products/UXGYFOZRP0I0eI1RaQ6ydgCXFp6Und37Pjyxd4B2.jpg', '2025-04-23', '2025-04-09 22:21:26', '2025-04-21 21:22:52', NULL),
(12, 'Mining & Extraction Area', 'Recreates gemstone mining environments – from underground tunnels to open-pit sites. Educates visitors on the real-world journey of a gemstone from the earth to the display case.', 1000000.00, 7, 'products/ZMlyExvHgl9hO3stXbVzwzatNkhVzXcYL0pIRUpP.jpg', '2025-04-30', '2025-04-09 22:21:39', '2025-04-21 20:48:48', NULL),
(13, 'Minerals', 'Highlights a variety of minerals and semi-precious stones such as pyrite, azurite, malachite, and agate', 123000.00, 8, 'products/hUZUEMKnwCwiC7U9DTUZWiMFs9b6YtgVyBFFtxcS.jpg', '2025-04-23', '2025-04-09 22:22:06', '2025-04-21 21:22:44', NULL),
(14, 'sadf à', 'zxc', 100000.00, 3, 'product/83EwywFa8OMQDEDTiCHnPyzUbcbIp8Y9zIoyx2iI.jpg', NULL, '2025-04-17 04:24:53', '2025-04-17 04:25:00', '2025-04-17 04:25:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_histories`
--

CREATE TABLE `product_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_histories`
--

INSERT INTO `product_histories` (`id`, `user_id`, `product_id`, `name`, `price`, `image`, `event_date`, `created_at`, `updated_at`) VALUES
(10, 16, 6, 'nternational Gemstone Gallery', 123000.00, 'products/MOWvZsWBpKXMErvfCBfu6KlclU2WwOiBRdShzTlM.jpg', '2025-04-22', NULL, NULL),
(11, 16, 9, 'Ancient Gem Jewelry Hall', 200000.00, 'products/hiiHJWHjMuPZKlq3POzAk1CCKHtUGuBE1I5gNHNS.jpg', '2025-04-22', NULL, NULL),
(12, 19, 11, 'Spiritual & Feng Shui Gemstones Zone', 200000.00, 'products/UXGYFOZRP0I0eI1RaQ6ydgCXFp6Und37Pjyxd4B2.jpg', '2025-04-22', NULL, NULL),
(13, 19, 3, 'Vietnamese Gemstone Exhibition', 55000.00, 'products/SYK8AkgiNrRY6AJhoVdorwwFHZheod6kG1lUJxAW.jpg', '2025-04-22', NULL, NULL),
(14, 19, 12, 'Mining & Extraction Area', 1000000.00, 'products/ZMlyExvHgl9hO3stXbVzwzatNkhVzXcYL0pIRUpP.jpg', '2025-04-22', NULL, NULL),
(15, 19, 6, 'nternational Gemstone Gallery', 123000.00, 'products/MOWvZsWBpKXMErvfCBfu6KlclU2WwOiBRdShzTlM.jpg', '2025-04-22', NULL, NULL),
(16, 19, 12, 'Mining & Extraction Area', 1000000.00, 'products/ZMlyExvHgl9hO3stXbVzwzatNkhVzXcYL0pIRUpP.jpg', '2025-04-22', NULL, NULL),
(17, 19, 6, 'nternational Gemstone Gallery', 123000.00, 'products/MOWvZsWBpKXMErvfCBfu6KlclU2WwOiBRdShzTlM.jpg', '2025-04-22', NULL, NULL),
(18, 19, 6, 'nternational Gemstone Gallery', 123000.00, 'products/MOWvZsWBpKXMErvfCBfu6KlclU2WwOiBRdShzTlM.jpg', '2025-04-22', NULL, NULL),
(19, 16, 10, 'Gem Education & Knowledge Zone', 100000.00, 'products/aXXrU9HqbjseeoE45OlZRKgJMsrdgv9F6s4YsfJa.jpg', '2025-04-26', NULL, NULL),
(20, 16, 10, 'Gem Education & Knowledge Zone', 100000.00, 'products/aXXrU9HqbjseeoE45OlZRKgJMsrdgv9F6s4YsfJa.jpg', '2025-04-26', NULL, NULL),
(21, 16, 3, 'Vietnamese Gemstone Exhibition', 55000.00, 'products/SYK8AkgiNrRY6AJhoVdorwwFHZheod6kG1lUJxAW.jpg', '2025-04-26', NULL, NULL),
(22, 20, 3, 'Vietnamese Gemstone Exhibition', 55000.00, 'products/SYK8AkgiNrRY6AJhoVdorwwFHZheod6kG1lUJxAW.jpg', '2025-04-26', NULL, NULL),
(23, 20, 9, 'Ancient Gem Jewelry Hall', 200000.00, 'products/hiiHJWHjMuPZKlq3POzAk1CCKHtUGuBE1I5gNHNS.jpg', '2025-04-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0ZUpumaPpIpUG5x0LU6anORiKqOKGP0cU363ktZe', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDhTZWxJWHN6Zml1Y2NockRnZkxtMjdMWlBWbE1TVkQyMngwRzZ0cyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9oaXN0b3J5Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjA7fQ==', 1745669535),
('qTa6Ix8FKqZlFTWPA1QlhIiGFh9zMEFP85qCzhf8', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWkzeE1BTVJhRDJVczljUUJGamM5THVwSWxBSGZ1RmwweEh1dmdJNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2FydGlmYWN0cy8yL2VkaXQiO319', 1745489196),
('smHdWO6ttQk3JK3rl5WHKMOES31hMHbJYgZ8Fp8j', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWXVNb2g3R0U2bko3d3lTTzdsQUZqWjl5WkZHZXlkQWtHOXp6cWN0dyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2FydGlmYWN0cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcHJvZHVjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1745669451);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `site_keywords` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `sitemap` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `site_type` varchar(255) NOT NULL DEFAULT 'cart',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `business_info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_description`, `site_keywords`, `logo`, `favicon`, `sitemap`, `is_active`, `site_type`, `email`, `phone`, `address`, `business_info`, `created_at`, `updated_at`) VALUES
(1, 'GEM MUSEUMmmm', 'Một bảo tàng sưu tâm đá quý', 'đá quý', 'uploads/how4gqn6XufN5BmsS59FdJ5ljWlpVA4nEjiMmyoZ.jpg', 'uploads/ht5ScTFFavKSjSzo2J9A319YDdz9XLW282bATwpM.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7862816516144!2d105.78062307484632!3d10.034487190072689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a012ce1a7f%3A0x94227f06590edd93!2sMuseum%20of%20Tarot%20-%20B%E1%BA%A3o%20T%C3%A0ng%20Tarot!5e0!3m2!1sen!2s!4v1744891183483!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 'cart', 'danghuunghia2k3@gmail.com', '0399909430', 'Nguyen Khuyen Street, Tan An, Ninh Kieu, Can Tho 900000, Vietnam.', 'Gem Museum', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `phone`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'admin', 'admin@gmail.com', 'avatars/DJ61G3R0uATCKQeOotONx3mJHTGXaXvxLpRbadX1.jpg', '0112233', 'admin', NULL, '$2y$12$2jKc2gpRRQzY4hmmynuNTuiR/hvf4db9LNfdo.I.HV9ea5YyttGYm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 21:30:43', '2025-04-07 01:31:28', NULL),
(14, 'nghia', 'nghia@gmail.com', NULL, '123546', 'user', NULL, '$2y$12$d/7GqrD5C4AMvkk9Q8f2X./S7bEMRtwmSSHlSeRwHMxfeBhqk/bYm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 01:35:16', '2025-04-07 01:35:16', NULL),
(16, 'chinh', 'chinh@gmail.com', 'avatars/fQ5aZioaQzgHZ2dTEwCFnt7P22H6JidCoMZFFlx3.jpg', '23165', 'user', NULL, '$2y$12$VFe5NfZlpUyzdqpRyj1LQ.eKCkQZgq/QwxOmm5Nnk/jdcBAA.FlXy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 02:26:24', '2025-04-21 06:57:44', NULL),
(17, 'anh', 'anh@gmail.com', 'avatars/krb6FqWZg9S2JHUzFFvF7snV7d7UbuRlbQBlw0Or.jpg', '3216574', 'user', NULL, '$2y$12$MbZcKYCN4RxK7e4IN6wyAOFTLH.QRwNWdxCN0b7N2V1ZYzPs0jg8G', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 02:29:38', '2025-04-13 03:54:00', NULL),
(19, 'haha', 'hung@gmail.com', 'avatars/uy4rFZ7nwNWeDantECQCUVKguwbUVMsjmlm0S0eM.jpg', '654987', 'user', NULL, '$2y$12$nMshfvSLXUA56gSZ5hFCFuAfzbOPCMssirs4Z5hxA/5g9ksE0J0s.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 03:14:15', '2025-04-10 22:22:22', NULL),
(20, 'trunggg', 'trungg@gmail.com', NULL, '564612', 'user', NULL, '$2y$12$vTnxLVhuRK2JGBVxR8YSY.r4p4uy1Ub46VTs7daPBreCPv/mJSxme', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-26 05:12:00', '2025-04-26 05:12:00', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `artifacts`
--
ALTER TABLE `artifacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artifacts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `libaries`
--
ALTER TABLE `libaries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_histories`
--
ALTER TABLE `product_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_histories_user_id_foreign` (`user_id`),
  ADD KEY `product_histories_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `artifacts`
--
ALTER TABLE `artifacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `libaries`
--
ALTER TABLE `libaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_histories`
--
ALTER TABLE `product_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `artifacts`
--
ALTER TABLE `artifacts`
  ADD CONSTRAINT `artifacts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_histories`
--
ALTER TABLE `product_histories`
  ADD CONSTRAINT `product_histories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
