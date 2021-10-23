-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 06:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `building`, `floor`, `notes`, `user_id`, `region_id`, `created_at`, `updated_at`) VALUES
(1, '75st', '5', '3', NULL, 31, 2, '2021-10-23 12:54:43', '2021-10-23 12:54:43'),
(2, '78 beside pharamcy', '80', '2', NULL, 36, 2, '2021-10-23 12:55:16', '2021-10-23 12:55:16'),
(3, '96 Front Of Hospital', '4', '5', NULL, 35, 5, '2021-10-23 12:55:55', '2021-10-23 12:55:55'),
(4, '99 Ras elteen', '8', '1', NULL, 33, 3, '2021-10-23 12:56:52', '2021-10-23 12:56:52'),
(5, '12 elharam', '6', '1', NULL, 26, 5, '2021-10-23 12:57:49', '2021-10-23 12:57:49'),
(6, '8 elmaadi school', '6', '3', NULL, 32, 2, '2021-10-23 12:57:49', '2021-10-23 12:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `name_en` varchar(1000) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not active & 1=>active',
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'توشيبا', 'TOSHIBA', '1', 'default.jpg', '2021-10-20 16:46:04', '2021-10-20 16:46:04'),
(2, 'تورنيدو', 'TORNADO', '1', 'default.jpg', '2021-10-20 16:46:04', '2021-10-20 16:46:04'),
(3, 'كانون', 'CANON', '1', 'default.jpg', '2021-10-20 17:00:20', '2021-10-20 17:00:20'),
(4, 'إنسومنياك جيمز', 'INSOMNIAC GAMES', '1', 'default.jpg', '2021-10-20 17:00:20', '2021-10-20 17:00:20'),
(5, 'باث اند بودى شوب', 'Bath & Body Works', '1', 'default.jpg', '2021-10-20 17:10:03', '2021-10-20 17:10:03'),
(6, 'سيبال', 'CYBELE', '1', 'default.jpg', '2021-10-20 17:10:03', '2021-10-20 17:10:03'),
(7, 'بيبى هيرو', 'Baby Hero', '1', 'default.jpg', '2021-10-20 17:17:23', '2021-10-20 17:17:23'),
(8, 'سانوسان', 'Sanosan', '1', 'default.jpg', '2021-10-20 17:17:23', '2021-10-20 17:17:23'),
(9, 'بيتى بيبى', 'Petit bebe', '1', 'default.jpg', '2021-10-20 17:27:08', '2021-10-20 17:27:08'),
(10, 'كليمنتونى', 'Clementoni', '1', 'default.jpg', '2021-10-20 17:27:08', '2021-10-20 17:27:08'),
(11, 'لونا', 'Luna', '1', 'default.jpg', '2021-10-20 17:37:34', '2021-10-20 17:37:34'),
(12, 'ستيفز', 'Stives', '1', 'default.jpg', '2021-10-20 17:37:34', '2021-10-20 17:37:34'),
(13, 'ليبتون', 'LIBTON', '1', 'default.jpg', '2021-10-20 17:47:54', '2021-10-20 17:47:54'),
(14, 'كاتشب', 'kITCHUB', '1', 'default.jpg', '2021-10-20 17:47:54', '2021-10-20 17:47:54'),
(15, 'لينو', 'LINO', '1', 'default.jpg', '2021-10-20 17:52:28', '2021-10-20 17:52:28'),
(16, 'وايت', 'White', '1', 'default.jpg', '2021-10-20 17:56:02', '2021-10-20 17:56:02'),
(17, 'لينوفو', 'Lenovo', '1', 'default.jpg', '2021-10-20 19:14:57', '2021-10-20 19:14:57'),
(18, 'غارنييه', 'Garnier', '1', 'default.jpg', '2021-10-20 19:19:13', '2021-10-20 19:19:13'),
(19, 'ايفون', 'Iphone', '1', 'default.jpg', '2021-10-21 09:44:07', '2021-10-21 09:44:07'),
(20, 'كريستال', 'Crystal', '1', 'default.jpg', '2021-10-21 09:50:57', '2021-10-21 09:50:57'),
(21, 'جونسون', 'johnson', '1', 'default.jpg', '2021-10-23 16:19:59', '2021-10-23 16:19:59'),
(22, 'ريدبول', 'Redpull', '1', 'default.jpg', '2021-10-23 16:35:47', '2021-10-23 16:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `name_en` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `status` enum('0','1') DEFAULT '0' COMMENT '0=>not active & 1=> not active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الإلكترونيات', 'Electronics', 'default.jpg', '1', '2021-10-20 15:53:53', '2021-10-20 16:07:49'),
(2, 'الجمال والعطور', 'Beauty & Health', 'default.jpg', '1', '2021-10-20 15:53:53', '2021-10-20 16:07:38'),
(3, 'الاطفال و الالعاب', 'Baby & Toys', 'default.jpg', '1', '2021-10-20 15:55:02', '2021-10-20 16:07:15'),
(4, 'سوبر ماركت', 'Super Markets', 'default.jpg', '1', '2021-10-20 15:55:02', '2021-10-20 16:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>exist&1=>not exist',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الاسكندرية', 'Alexandria', '1', '2021-10-23 12:47:11', '2021-10-23 12:47:11'),
(2, 'القاهرة', 'cairo', '1', '2021-10-23 12:47:11', '2021-10-23 12:47:11'),
(3, 'الجيزة', 'Giza', '1', '2021-10-23 12:47:30', '2021-10-23 12:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not active & 1=>active',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `maxUserUsage` int(20) NOT NULL,
  `maxUsageCount` int(20) NOT NULL,
  `miniOrderPrice` decimal(7,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `start_date`, `end_date`, `discount_type`, `maxUserUsage`, `maxUsageCount`, `miniOrderPrice`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-10-23 14:51:14', '2021-10-23 14:51:14', '50', 100, 100, '250', '2021-10-23 12:51:36', '2021-10-23 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupons_products`
--

CREATE TABLE `coupons_products` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_users`
--

CREATE TABLE `coupons_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `desc_ar` varchar(1000) NOT NULL,
  `desc_en` varchar(1000) NOT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `maxUserUsage` int(20) NOT NULL,
  `maxUserCount` int(20) NOT NULL,
  `miniOrderPrice` decimal(7,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>not active & 1=>active',
  `deliever_date` datetime DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `deliever_date`, `coupon_id`, `address_id`, `created_at`, `updated_at`) VALUES
(2, '1', '2021-10-23 15:06:44', 1, 4, '2021-10-23 13:07:35', '2021-10-23 13:08:14'),
(3, '1', '2021-10-23 15:10:12', 1, 5, '2021-10-23 13:10:21', '2021-10-23 13:10:21'),
(4, '1', '2021-10-23 15:33:22', 1, 2, '2021-10-23 13:33:51', '2021-10-23 13:33:51'),
(5, '1', '2021-10-23 15:33:22', 1, 4, '2021-10-23 13:33:51', '2021-10-23 13:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `name_en` varchar(1000) NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpgp',
  `quantity` smallint(5) NOT NULL DEFAULT 1,
  `status` smallint(1) NOT NULL DEFAULT 1 COMMENT '0=>no active & 1=>active',
  `description_ar` longtext NOT NULL,
  `description_en` longtext NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `price`, `image`, `quantity`, `status`, `description_ar`, `description_en`, `brand_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(4, 'تلفزيون دون إطار يعمل بنظام تشغيل أندرويد بدقة كاملة الوضوح مزود بجهاز استقبال مدمج UA1400E-50 فضي\r\n', 'Full HD Android TV Frameless With Built-in Receiver UA1400E-50 Silver\r\n', '7199', 'Tv-1.jpg', 30, 1, 'منتج مزود بجهاز استقبال مدمج\r\nمتصفح الويب\r\nتطبيق نتفليكس\r\nمنتج يمكن توصيله مع موقع اليوتيوب\r\nمدخل USB مناسب للفيديو والصور والموسيقى', 'With built-in receiver\r\nWeb Browser\r\nNetflix Application\r\nCommunication with YouTube\r\nUSB Input: Video - Photos - Music', 2, 1, '2021-10-20 16:51:22', '2021-10-21 06:31:47'),
(5, 'تلفزيون ذكي بشاشة LED دون إطار مقاس 50 بوصة وبدقة 4K مع جهاز استقبال مدمج يعمل بنظام أندرويد 4T-C50DL6EX أسود\r\n', '50-Inch 4K Smart Frameless LED TV With Android System Built-In Receiver 4T-C50DL6EX Black\r\n', '7499', 'tv-toshiba.jpg', 2, 1, 'منتج مزود بمنفذ USB: للفيديو والصور والموسيقى\r\nمنظم فولتية تلقائي: تيار متردد 100 - 240 فولت\r\nاستهلاك الطاقة: 200 وات\r\nفئة كفاءة الطاقة: (C)', 'USB : Video - Photos - Music\r\nAutomatic Voltage Regulator : AC 100-240 Volt\r\nPower Consumption : 200 Watt\r\nEnergy Efficiency Class : ( C )', 1, 1, '2021-10-20 16:51:22', '2021-10-20 16:52:06'),
(6, 'لعبة \"Ratchet And Clank: Rift Apart\" (إصدار المملكة العربية السعودية) - مغامرة - بلايستيشن 5 (PS5)\r\n', 'Ratchet And Clank: Rift Apart (KSA Version) - Adventure - PlayStation 5 (PS5)\r\n', '873', 'video-game.jpg', 1, 1, 'عاد مغامرو المجرات بضجة كبيرة في لعبة الفيديو \"Ratchet & Clank: Rift apart\". ساعدهم على إيقاف النية الروبوتية للإمبراطور على غزو العوالم متعددة الأبعاد، مع وجود العالم الخاص بهم معاً على خط إطلاق النار\r\nمنتج مصمم من الألف إلى الياء من قبل شركة إنسومنياك جيمز الشهيرة، ويمكنك مواصلة اللعب لأبعد حد بفضل السرعة الفائقة والميزات الغامرة لجهاز الألعاب بلايستيشن 5\r\nالعب بشخصيتي راتشيت وريفيت، فصيلة لومباكس جديدة وغامضة من بُعد آخر\r\nيكمل أسلوب حياتك بطريقة عصرية وأنيقة\r\nمنتج يمتاز بتصميم هندسي دقيق يوفر مستوى فائقاً من الخدمة', 'Intergalactic adventurers are back with a bang in Ratchet & Clank: Rift apart. Help them stop a robotic intention of the emperor to conquer transdimensional worlds, with their own universe together on the firing line\r\nBuilt from the ground up by acclaimed studio insomnia games, go further with the mind-blowing speed and immersive features of the PS5 console\r\nPlay as Ratchet and Rivet, a mysterious new Lombax from another dimension\r\nComplements your lifestyle in a fresh and modern way\r\nPrecisely engineered to render a superior level of service', 4, 12, '2021-10-20 16:59:22', '2021-10-20 17:01:12'),
(7, 'طابعة حبرية متكاملة بيكسما طراز G3411 أسود\r\n', 'Pixma G3411 Inkjet All-In-One Printer Black\r\n', '2599', 'printer.jpg', 5, 1, 'مصممة بتقنية فائقة للحصول على أداء دقيق وتحقيق كفاءة عالية للغاية\r\nتمنحك طباعة ثابتة وموثوق بها في كل مرة\r\nسهولة في التركيب وتتبع بسهولة لاستخدام الحبر\r\nحبر ذو جودة ممتازة يضمن طبعات مقاومة للبهتان\r\nتركيبة مصممة لتوفير مستندات وصور ملونة من دون عناء', 'Engineered with technology for a precise performance and attain super high efficiency\r\nBrings you stable and reliable printing every time\r\nOffers quick installation and easily tracks toner usage\r\nPremium quality ink ensures fade-resistant prints\r\nFormulated to provide colour documents and photos effortlessly', 3, 3, '2021-10-20 16:59:22', '2021-10-20 17:00:57'),
(8, 'بخاخ معطر فريش كت ليلاكس فاين 236ملليلتر\r\n', 'Fresh Cut Lilacs Fine Fragrance Mist 236Mililitre', '300', 'perfume.jpg', 0, 1, '', '', 5, 5, '2021-10-20 17:07:31', '2021-10-20 17:10:38'),
(9, 'بخاخ الجسم برائحة الفراولة 236مل\r\n', 'Strawberry Body Spray 236ml\r\n', '175', 'body-lotion.jpg', 3, 1, 'رقيق وجذاب\r\nيجمع هذا العطر المنعش بين العطر المركز لأزهار الربيع الأولى مع المسك الناعم الرقيق\r\nعطر فريد مستوحى من البراعة والإبداع\r\nهذا العطر المنعش سوف يصنع حولك هالة من الثقة', 'Light and alluring\r\nThis fresh scent combines the heady fragrance of spring\'s first blossoms with soft, delicate musk\r\nIt is a unique fragrance inspired by the virtuosity and creativity\r\nThis refreshing perfume will help you create an aura of confidence', 5, 5, '2021-10-20 17:07:31', '2021-10-20 17:10:24'),
(10, 'أحمر شفاه ريتش كريم وايلد بيرز 129\r\n', 'Rich Cream Lipstick Wild Berries 129\r\n', '63', 'makeup.jpg', 1, 1, 'ينساب على شفاهك بسلاسة لمظهر مستوٍ وطبيعي\r\nغني بزيت الأرغان لحماية الشفاه وتنعيمها\r\nيمكن إزالته بسهولة باستخدام مزيل الماكياج العادي', 'Smoothly glides on your lips for an even and a natural finish\r\nEnriched with argon oil to condition and soften lips\r\nCan be easily removed with a standard make-up remover', 6, 11, '2021-10-20 17:16:11', '2021-10-20 19:10:14'),
(11, 'مسحوق حليب نيوتراديفنس رقم 1 400غم\r\n', 'Nutradefense 1 Milk Powder 400g\r\n', '115', 'baby-food-2.jpg', 1, 1, 'مغذٍ ومصنوع من مزيج من قطع الدجاج والأرز والخضراوات\r\nغني بالألياف الطبيعية كما في حليب الأم والتي تعمل على تحسين وتعزيز المناعة الطبيعية لطفلك\r\nفعال ولذيذ وحاصل على شهادة اختبار الأغذية المعدلة وراثياً', 'Nutritious and mix made with chicken pieces, rice and veggies\r\nNatural fibers as in breast milk that enhance and reinforce your baby\'s natural defenses\r\nEffective, GM food certification and tasty', 7, 8, '2021-10-20 17:16:11', '2021-10-20 17:17:39'),
(12, 'زيت العناية بالبشرة للأطفال\r\n', 'Baby Skin Care Oil', '120', 'sanosan.jpg', 10, 1, 'يساعد على استعادة الحاجز الطبيعي الواقي للبشرة وحمايته\r\nيتغلغل الزيت بسرعة بينما يسهل التدليك\r\nقم بوضع هذا الزيت المرطب على يديك لتدليك بشرة الطفل\r\nمنتج العناية بالبشرة مغذي وملطف لتدليك طفلك من الولادة\r\nخالٍ من زيوت البارافين والبارابين والملونات، وله تأثير مهدئ على بشرة الطفل ليمنحه شعوراً بالانتعاش والسعادة', 'Helps restore and protect the skin’s natural protective barrier\r\nOil texture penetrates quickly while facilitating the massage\r\nSpread this moisturizing oil for baby and child onto your hands then massage the body\r\nNourishing and soothing care product to massage baby from the birth\r\nParaffin oils free, paraben free, colorant free and its soothing effect on the skin that leaves the baby feeling fresh and happy', 8, 7, '2021-10-20 17:24:33', '2021-10-20 17:24:33'),
(13, 'حقيبة حفاضات ليدي بيرد\r\n', 'Diaper Bag Lady Bird\r\n', '370', 'baby-bag-1.jpg', 1, 1, 'حقيبة حفاضات خفيفة الوزن\r\nتحتوي على جيوب تنظيم متعددة لحمل جميع مستلزمات طفلك.\r\nحزام كتف قابل للتعديل ليناسب جميع الأمهات.\r\nتأتي مع ملحقات مجانية: وسادة للتغيير.\r\nجيبان جانبيان مناسبان لحمل زجاجات الأطفال.\r\nحزام كتف قابل للتعديل ليناسب جميع الأمهات.', 'Light weight diaper bag.\r\nContains multi organization pockets to carry your entire baby’s essentials.\r\nAdjustable Shoulder belt to suit all mothers.\r\nIt comes with free accessories: changing pad.\r\nTwo side pockets suitable for holding the baby’s bottles.\r\nAdjustable Shoulder belt to suit all mothers.', 7, 9, '2021-10-20 17:24:33', '2021-10-20 17:24:33'),
(14, 'مقعد سيارة بي ون إس بي بتصميم ميني وندرز\r\n', 'Beone SP Car Seat - Minnie Wonders\r\n', '4000', 'baby-car.jpg', 1, 1, 'جرو لطيف وتفاعلي يوجه الأطفال الرضع لاكتشاف المشاعر بأسلوب بسيط ومرح!\r\nالضغط على الزر الموجود على رأس المنتج يغير نظرته: \"سعيد\"، أو \"حزين\" أو \"نائم\". كما يتغير الزر الموجود على البطن\r\nمنتج يتميز بتأثير ملون ومضيء وفقاً للمشاعر.\r\nتوفر مؤثراتٍ صوتيةً وأنغاماً سعيدةً تحفز المشاعر\r\nالعمر الموصي به: 10 أشهر', 'Suitable from birth to 13kg\r\nRearward facing\r\n3 point safety harness\r\nSide impact protection\r\nRemovable covers', 10, 10, '2021-10-20 17:35:25', '2021-10-20 17:35:25'),
(15, 'لوشن ما بعد التعرض لأشعة الشمس 130ملليمتر\r\n', 'After Sun Lotion 130millimeter\r\n', '200', 'skin-care-1.jpg', 6, 1, 'يأتي بتركيبة معتدلة مضادة للحساسية\r\nواقي الشمس بقوام خفيف يُمتص بسرعة في الجلد\r\nيتخلل الجلد ليوفر حماية وترطيباً عميقاً لخلايا جميع أنواع البشرة', 'Comes with minimalist hypo-allergenic formula\r\nLightweight sunscreen lotion that absorbs quickly into the skin\r\nPenetrates the skin to offer a deep cellular protection and moisturisation to all skin types', 8, 4, '2021-10-20 17:35:25', '2021-10-20 17:35:25'),
(16, 'سنفرة منشطة بجوز الهند والبن 6أوقية\r\n', 'Energizing Coconut And Coffee Scrub 6ounce', '195', 'skin-care-2.jpg', 1, 1, 'يقشر بعمق ويترك البشرة منتعشة ومتوهجة\r\nمنتج يقلل من علامات الشيخوخة بالحفاظ على مرونة البشرة\r\nيساعد في تقليل ظهور الخطوط السطحية والتجاعيد\r\n', 'Deeply exfoliates and leaves skin fresh and glowing\r\nReduces the signs of ageing by maintaining the elasticity of the skin\r\nHelps diminish the appearance of surface lines and wrinkles', 12, 4, '2021-10-20 17:39:23', '2021-10-20 17:39:23'),
(17, 'كاتشاب الطماطم بالوصفة الأصلية 440غم\r\n', 'Original Recipe Tomato Ketchup 440g\r\n', '50', 'market-3.jpg', 1, 1, 'هذا هو الكاتشب الذي يتمتع بألذ مذاق والأكثر صحة بدون إضافة أي محليات\r\nعدد السعرات الحرارية قليل للغاية\r\nيمكنك بسهولة إضافة ملعقة إضافية إلى طبقك دون الشعور بالذنب', 'This is the most tasteful and healthiest ketchup with no added sweeteners\r\nThe number of calories is so low\r\nyou can easily add an extra spoonful to your plate without feeling guilty', 14, 16, '2021-10-20 17:52:01', '2021-10-20 17:52:01'),
(18, 'بسكويت الشوفان بالتفاح والقرفة 25غم عبوة من 12 قطعة\r\n', 'Oat Biscuit Apple And Cinnamon 25g Pack of 12\r\n', '80', 'market-8.jpg', 3, 1, 'حزمة الكوكيز بالشوفان من كويكر مع المكونات الطبيعية والعناصر الغذائية\r\nتم خبزه بعناية ليكون هشاً ومقرمشاً\r\nمثالية كوجبة خفيفة مغذية من شأنها أن تبقيك مستعداً', 'Quaker Oats Oat Cookies packed with natural ingredients and nutrients\r\nCarefully baked to be crisp and crunchy\r\nPerfect as a nourishing snack that will keep you going', 15, 19, '2021-10-20 17:52:01', '2021-10-20 17:52:46'),
(19, 'شاي أسود العلامة الصفراء، 100 كيس شاي 200غم عبوة من 100 قطعة\r\n', 'Yellow Label Black Tea 100 Bags 200g Pack of 100', '120', 'libton.jpg', 1, 1, 'استمتع بمذاق الشاي الأسود\r\nمنتج مصنوع من أوراق الشاي الناضجة بالشمس\r\nمنتج يمنح نكهة غنية وعطرية', 'Enjoy the goodness of black tea\r\nMade with sun-ripened tea leaves\r\nOffers a rich and aromatic flavour', 13, 20, '2021-10-20 17:55:04', '2021-10-20 17:55:04'),
(20, '2-Piece Hand Paper Tissues أبيض 240 sheets *2\r\n', '2-Piece Hand Paper Tissues White 240 sheets *2', '195', 'clean.jpg', 1, 1, 'مثالية للاستخدام في المدارس والفنادق والمكاتب والمنزل\r\nناعمة ومتينة وفائقة الامتصاص\r\nلا تحتوي مناديل الوجه الصديقة للبيئة على أي مسحوق أو بقايا، ولن تترك قصاصات ورقية على الجلد\r\nطبيعية خالية من العطور والمواد الكيميائية، تتميز بالمرونة والرقة ولا تسبب أي خدوش', 'Ideal for use in schools, hotels, offices and at home\r\nSoft, strong and very absorbent\r\nEco-friendly facial tissue has no powder and no residue, will not leave paper scraps on the skin\r\nNatural fragrance free, chemical free, flexible and delicate, no paper scraps', 16, 15, '2021-10-20 17:57:27', '2021-10-20 17:57:27'),
(21, 'لابتوب مودرن 14‏ ‏B10MW بشاشة مقاس 14 بوصة ومعالج كور i5-10210U/ذاكرة رام سعة 8 جيجابايت/محرك أقراص SSD سعة 512 جيجابايت/بطاقة رسومات إنتل بدقة فائقة الوضوح رمادي كربوني', 'Modern 14 B10MW Laptop With 14-Inch Display, Core i5-10210U Processor/8GB RAM/512GB SSD/Intel UHD Graphics Carbon Grey', '10999', 'laptop.jpg', 1, 1, 'يمكّنك من إجراء المهام المتعددة بسرعة وسهولة بفضل معالج Intel عالي الأداء\r\nيتميز بعمر طويل للبطارية وتقنية الشحن السريع ما يتيح لك العمل والمشاهدة واستمرار الاتصال طوال اليوم\r\nتمتع بالأفلام والصور بجودة صور ودقة عاليتين\r\nخيار التخزين يسمح لك بتخزين جميع الملفات والوسائط الخاصة بك بسهولة\r\nشاشة قياس 14 بوصة تعرض صوراً واضحة وساطعة للاستمتاع بالأفلام ومقاطع الفيديو', 'Multitasking feels easy and fast with a high performance Intel processor\r\nWith a long battery life and fast-charge technology, this laptop lets you work, watch, and stay connected all day\r\nEnjoy movies and photos with the great image quality and high-definition\r\nThe storage option allows you to store all your files and media easily\r\n14-Inch display delivers bright, crisp visuals to enjoy your movies and music videos', 17, 2, '2021-10-20 19:17:18', '2021-10-20 19:17:18'),
(22, 'صبغة شعر كلر ناتشورالز بلون فاتح رقم 8 8 أشقر فاتح Colourant 60 Gram, Developer 70 Milliliter, Conditioner 5مل', 'Color Naturals 8 Light 8 Light Blonde Colourant 60 Gram, Developer 70 Milliliter, Conditioner 5ml', '610', 'hair.jpg', 3, 1, 'كريم الصبغة الدائمة كولور ناتشورالز غني بزيت الزيتون الذي يغذي الشعر ويصبغه\r\nمنتج يغذى شعرك بعمق ويمنحه لوناً موحداً ولامعاً وغنياً أكثر\r\nتمثل نسبة زيت الزيتون في هذا البلسم علاجاً حقيقياً لشعرك\r\nمنتج يجعل شعرك ناعماً ويكسبه لوناً زاهياً ويغطي كل الشعر الرمادي\r\nلون الشعر الدائم الأول من نوعه الذي يوفر التغذية اللازمة للشعر بفضل تركيبته من زيت الزيتون والأفوكادو والشيا', 'Color Naturals is a permanent colour cream enriched with Olive oil, that nourishes the hair as it colours\r\nYour hair is deeply nourished, your colour is richer, more uniform and shinier\r\nSecond ratio of olive oil in the conditioner is a real treatment for your hair\r\nYour hair becomes soft and colour radiant and covers all grey hairs\r\n1st nourishing permanent hair color with olive oil, avocado and karite', 18, 6, '2021-10-20 19:21:12', '2021-10-20 19:21:12'),
(25, '', 'iPhone XR With FaceTime Blue 128GB 4G LTE\r\n', '9449', 'iphone.jpg', 6, 1, '', 'Dual SIM features 1 physical SIM and 1 e-SIM\r\nYou can unlock your iPhone and log in to apps, accounts and more with a glance, Face ID is the most secure and fastest facial authentication\r\nA12 Bionic Chip is the smartest, most powerful chip in a smartphone\r\nThe world’s most popular camera is defining a new era of photography where an innovative sensor works with the ISP and Neural Engine to help you create photos like never before\r\nSingle-lens camera and machine learning to keep people in the foreground in sharp focus against an artfully blurred background', 19, 21, '2021-10-21 09:47:14', '2021-10-21 09:47:14'),
(26, '', 'Pants Diapers, Size 6, 16+ Kg, 48 Diapers\r\n', '160', 'pampers.jpg', 1, 1, '', '3 absorbing channels that help distribute the wetness evenly\r\nFlexible waistband that adapts to baby\'s movement for a comfortable fit\r\nBaby lotion that helps protect your baby\'s delicate skin from irritation\r\nMicro pearls that lock wetness away for up to 12 hours of dryness\r\nEasy On and Out', 9, 9, '2021-10-21 09:49:58', '2021-10-21 09:49:58'),
(27, '', 'Sunflower Oil 5L\r\n', '134', 'oil.jpg', 3, 1, '', 'Makes a must-have pick for your daily cooking needs\r\nGood-quality ingredients make it a tasty and healthy option\r\nIdeal for cooking, deep frying, shallow frying and more', 20, 16, '2021-10-21 09:51:49', '2021-10-21 10:28:02'),
(28, '', 'Bedtime Baby Shampoo', '90', 'johnson.jpg', 1, 1, '', 'Bedtime shampoo gently cleanses to leave delicate skin and hair feeling healthy\r\nEnriched with soothing natural calm essences\r\nRinses easily, leaving baby’s hair soft, shiny and smelling wonderfully fresh\r\nProduces rich lather that rinses easily\r\nAllows for a tear-free experience and is as gentle to the eyes as pure water', 21, 7, '2021-10-23 16:22:14', '2021-10-23 16:22:14'),
(29, 'مشروب ريد بول', 'Red Bull Energy Drink, 250ml Pack of 12\r\n', '24', 'drink.jpg', 1, 1, '', 'Red Bull Energy Drink, 250 ml (12 pack)\r\nRed Bull Energy Drink\'s special formula contains ingredients of high quality: Caffeine, Taurine, B-Group Vitamins, Sugars, Alpine Water.\r\nOne 250 ml can of Red Bull Energy Drink contains 80 mg of caffeine, about the same amount as in a cup of home-brewed coffee.\r\nThe amount of sugars in a can of Red Bull Energy Drink is comparable to the level of sugars in an equivalent amount of apple or orange juice – 11 g per 100 ml.\r\nRed Bull cans are made of 100% recyclable aluminium.\r\nCase of twenty-four 250 ml Red Bull Energy Drink cans.\r\nVitalizes Body and Mind.', 22, 20, '2021-10-23 16:37:41', '2021-10-23 16:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `products_offers`
--

CREATE TABLE `products_offers` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `quantity` tinyint(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_orders`
--

INSERT INTO `products_orders` (`product_id`, `order_id`, `price`, `quantity`) VALUES
(9, 2, '250', 1),
(12, 2, '0', 1),
(13, 2, '250', 2),
(8, 2, '100', 1),
(15, 3, '150', 2),
(15, 3, '150', 1),
(18, 2, '50', 1),
(7, 3, '700', 2),
(8, 2, '200', 1),
(16, 3, '50', 1),
(18, 2, '30', 1),
(4, 2, '5000', 1),
(9, 3, '70', 1),
(9, 2, '50', 1),
(12, 4, '50', 1),
(5, 5, '55000', 3),
(12, 5, '30', 1),
(12, 4, '60', 2),
(8, 4, '100', 1),
(15, 2, '200', 1),
(15, 5, '100', 1),
(12, 4, '50', 2),
(9, 3, '300', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_reviews`
-- (See below for the actual view)
--
CREATE TABLE `products_reviews` (
`id` bigint(20) unsigned
,`name_ar` varchar(1000)
,`name_en` varchar(1000)
,`price` decimal(7,0)
,`image` varchar(100)
,`quantity` smallint(5)
,`status` smallint(1)
,`description_ar` longtext
,`description_en` longtext
,`brand_id` bigint(20) unsigned
,`subcategory_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`brand_name_en` varchar(1000)
,`category_name_en` varchar(1000)
,`category_id` bigint(20) unsigned
,`subcategory_name_en` varchar(1000)
,`reviews_count` bigint(21)
,`reviews_avg` decimal(2,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `products_specs`
--

CREATE TABLE `products_specs` (
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `spec_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_specs`
--

INSERT INTO `products_specs` (`spec_id`, `product_id`, `spec_value`) VALUES
(1, 4, 'Black'),
(2, 11, '400'),
(1, 14, 'Pink'),
(2, 15, '130'),
(2, 5, '50'),
(1, 10, 'Red'),
(1, 5, 'Black'),
(3, 5, '4K'),
(2, 21, '14'),
(2, 9, '236 ml'),
(2, 12, '200 ml'),
(1, 18, '25 mg'),
(2, 15, '130 ml'),
(2, 27, '5 L'),
(2, 26, '6'),
(2, 28, '500 ml'),
(1, 28, 'pirple');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not exist & 1=>exist',
  `distance` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_ar`, `name_en`, `status`, `distance`, `lat`, `long`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'الرصافة', 'Alrasafa', '1', '', '', '', 1, '2021-10-23 12:49:27', '2021-10-23 12:49:27'),
(2, 'المعادى', 'Almaadi', '1', '', '', '', 2, '2021-10-23 12:49:27', '2021-10-23 12:49:27'),
(3, 'بحرى', 'Bahri', '1', '', '', '', 1, '2021-10-23 12:50:05', '2021-10-23 12:50:05'),
(4, 'المهندسين', 'Almohandsen', '1', '', '', '', 2, '2021-10-23 12:50:05', '2021-10-23 12:50:05'),
(5, 'الهرم', 'Alharam', '1', '', '', '', 3, '2021-10-23 12:50:59', '2021-10-23 12:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `value` enum('1','2','3','4','5') DEFAULT '5' COMMENT '1=>bad , 2=>accept, 3=>good , 4=>very good , 5=>excellent',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `comments`, `value`, `created_at`, `updated_at`) VALUES
(28, 5, 'Good Produt', '3', '2021-10-23 06:56:20', '2021-10-23 06:56:20'),
(28, 17, 'Nice', '3', '2021-10-23 06:56:20', '2021-10-23 06:56:20'),
(36, 9, 'Vey Good', '4', '2021-10-23 07:18:35', '2021-10-23 07:18:35'),
(36, 20, 'Bad', '1', '2021-10-23 07:18:35', '2021-10-23 07:18:35'),
(31, 20, 'Good But Not Perfect', '3', '2021-10-23 07:19:25', '2021-10-23 07:19:25'),
(33, 5, 'Nice', '4', '2021-10-23 07:19:25', '2021-10-23 07:19:25'),
(34, 26, 'Excellent', '3', '2021-10-23 07:19:57', '2021-10-23 07:19:57'),
(34, 12, 'Excellent', '5', '2021-10-23 07:19:57', '2021-10-23 07:19:57'),
(32, 12, 'I live it', '5', '2021-10-23 07:20:35', '2021-10-23 07:20:35'),
(32, 21, 'Very Good', '4', '2021-10-23 07:20:35', '2021-10-23 07:20:35'),
(35, 4, NULL, '5', '2021-10-23 07:21:06', '2021-10-23 07:21:06'),
(28, 4, 'Excellent', '5', '2021-10-23 07:21:06', '2021-10-23 07:21:06'),
(26, 12, 'I love this product', '5', '2021-10-23 07:21:45', '2021-10-23 07:21:45'),
(26, 7, 'Good Product', '4', '2021-10-23 07:21:45', '2021-10-23 07:21:45'),
(28, 17, 'Not Have good quality', '1', '2021-10-23 08:30:11', '2021-10-23 08:30:11'),
(28, 12, 'Very Good For sensitive Skin', '4', '2021-10-23 15:53:32', '2021-10-23 15:53:32'),
(33, 4, 'Good ', '2', '2021-10-23 15:53:32', '2021-10-23 15:53:32'),
(36, 12, 'Very Good', '4', '2021-10-23 15:56:52', '2021-10-23 15:56:52'),
(34, 5, 'Good Product', '4', '2021-10-23 15:56:52', '2021-10-23 15:56:52'),
(32, 17, 'Delicious', '5', '2021-10-23 15:58:53', '2021-10-23 15:58:53'),
(36, 4, 'Good', '3', '2021-10-23 15:58:53', '2021-10-23 15:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `name_en` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specs`
--

INSERT INTO `specs` (`id`, `name_ar`, `name_en`) VALUES
(1, 'اللون', 'Color'),
(2, 'الحجم', 'Size'),
(3, 'الجودة', 'Resolutions');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `name_en` varchar(1000) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not active & 1=> active',
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_ar`, `name_en`, `status`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'تليفزيونات', 'television', '1', 'Tv-1.jpg', 1, '2021-10-20 16:00:10', '2021-10-20 23:12:20'),
(2, 'لاب توب', 'laptops', '1', 'laptop.jpg', 1, '2021-10-20 16:00:10', '2021-10-20 23:11:09'),
(3, 'طابعات', 'printers', '1', 'printer.jpg', 1, '2021-10-20 16:03:23', '2021-10-20 23:12:41'),
(4, 'العنايه بالبشرة', 'skin-care', '1', 'skin-category.png', 2, '2021-10-20 16:03:23', '2021-10-20 22:59:50'),
(5, 'عطور', 'fragrance', '1', 'perfum-cat.jpg', 2, '2021-10-20 16:04:51', '2021-10-20 23:07:19'),
(6, 'العنايه بالشعر', 'hair-care', '1', 'hair-cat.jpg', 2, '2021-10-20 16:04:51', '2021-10-20 23:08:12'),
(7, 'استحمام وعناية بالبشرة', 'Bathing & Skin Care', '1', 'baby-cat-2.jpg', 3, '2021-10-20 16:11:50', '2021-10-20 23:15:19'),
(8, 'مستلزمات الرضاعه و الإطعام', 'Feeding & Nursing', '1', 'baby-category.png', 3, '2021-10-20 16:11:50', '2021-10-20 22:58:45'),
(9, 'حقائب الحفاضات', 'Diapers & Diaper Bags', '1', 'baby-cat.png', 3, '2021-10-20 16:22:21', '2021-10-20 23:03:36'),
(10, 'عربيات أطفال', 'Baby Transport Carousels', '1', 'baby-car.jpg', 3, '2021-10-20 16:22:21', '2021-10-20 23:16:11'),
(11, 'مكياج', 'Make up', '1', 'makeup-cat.png', 2, '2021-10-20 16:24:25', '2021-10-20 23:01:20'),
(12, 'ألعاب الفيديو', 'Video Games', '1', 'video-game.jpg', 1, '2021-10-20 16:24:25', '2021-10-20 23:13:30'),
(15, 'العناية ونظافة المنزل', 'Home & Care & Cleaning', '1', 'clean-cat.jpg', 4, '2021-10-20 17:43:36', '2021-10-20 23:31:06'),
(16, 'الأغذية المعلبة والجافة والمعبأة', 'Canned, Dry & Packaged Food', '1', 'food-cat.jpg', 4, '2021-10-20 17:43:36', '2021-10-20 23:29:01'),
(19, 'طعام خفيف', 'Snack Food', '1', 'default.jpg', 4, '2021-10-20 17:45:43', '2021-10-20 17:45:43'),
(20, 'المشروبات', 'Drinks', '1', 'drink.jpg', 4, '2021-10-20 17:45:43', '2021-10-20 23:27:47'),
(21, 'موبايلات', 'Mobile', '1', 'mobile-1.jpg', 1, '2021-10-21 09:46:02', '2021-10-23 11:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '	0=>user not verifeid , 1=>user verified',
  `code` int(20) DEFAULT NULL,
  `gender` enum('f','m') NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `status`, `code`, `gender`, `image`, `verified_at`, `created_at`, `updated_at`) VALUES
(26, 'Salsabil                                   ', 'Tarek ', 'salsabilahmed968@gmail.com', 'd7f0300f56d20365ee37f9e125dce992', '01270842635', 1, 56265, 'f', '1634677994-26.jpg', '2021-10-23 06:17:17', '2021-10-19 06:17:03', '2021-10-23 07:17:17'),
(28, 'Ahmed', 'Mohamed', 'Ahmed@hotmail.com', '26c7206242fdd2479c5b6feb07ab1fe9', '012248320045', 1, 82845, 'm', 'default.jpg', '2021-10-23 06:17:17', '2021-10-20 18:35:34', '2021-10-23 07:17:17'),
(31, 'Ali', 'Mohamed', 'ali@gmail.com', '63498b0045d088e556315437f0a73f73', '01099776609', 1, 19756, 'm', 'default.jpg', '2021-10-23 06:17:17', '2021-10-23 07:07:05', '2021-10-23 07:17:17'),
(32, 'Salma', 'Adel', 'salma@hotmail.com', 'a0e5da1c4208493c17767fd7656bacc7', '01270843931', 1, 54594, 'f', 'default.jpg', '2021-10-23 06:17:17', '2021-10-23 07:10:14', '2021-10-23 07:17:17'),
(33, 'Youssef', 'Tarek', 'youssef@gmail.com', 'ea17621f8f20b1ea733e8f3b8a8b4171', '01224830042', 1, 57685, 'm', 'default.jpg', '2021-10-23 06:17:17', '2021-10-23 07:13:05', '2021-10-23 07:17:17'),
(34, 'Mostafa', 'Mohamed', 'm@gmail.com', '7cb859a5ec9fbb8f744280586514c22e', '01274015968', 1, 41888, 'm', 'default.jpg', '2021-10-23 06:17:17', '2021-10-23 07:14:54', '2021-10-23 07:17:17'),
(35, 'Tarek', 'Mohamed', 'tarek@gmail.com', 'f6f7fad45eebebf782930ef62551bb86', '01274812369', 1, 92943, 'm', 'default.jpg', '2021-10-23 06:17:17', '2021-10-23 07:16:07', '2021-10-23 07:17:17'),
(36, 'Mona', 'Ahmed', 'mona@yahoo.com', '0dc5c268449306838ee143d2dd2bfbed', '01099778800', 1, 88989, 'f', 'default.jpg', '2021-10-23 06:17:17', '2021-10-23 07:17:08', '2021-10-23 07:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `products_reviews`
--
DROP TABLE IF EXISTS `products_reviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_reviews`  AS   (select `products`.`id` AS `id`,`products`.`name_ar` AS `name_ar`,`products`.`name_en` AS `name_en`,`products`.`price` AS `price`,`products`.`image` AS `image`,`products`.`quantity` AS `quantity`,`products`.`status` AS `status`,`products`.`description_ar` AS `description_ar`,`products`.`description_en` AS `description_en`,`products`.`brand_id` AS `brand_id`,`products`.`subcategory_id` AS `subcategory_id`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`brands`.`name_en` AS `brand_name_en`,`categories`.`name_en` AS `category_name_en`,`categories`.`id` AS `category_id`,`subcategories`.`name_en` AS `subcategory_name_en`,count(`reviews`.`product_id`) AS `reviews_count`,if(round(avg(`reviews`.`value`),0) is null,0,round(avg(`reviews`.`value`),0)) AS `reviews_avg` from ((((`products` left join `brands` on(`products`.`brand_id` = `brands`.`id`)) left join `subcategories` on(`products`.`subcategory_id` = `subcategories`.`id`)) left join `categories` on(`categories`.`id` = `subcategories`.`category_id`)) left join `reviews` on(`products`.`id` = `reviews`.`product_id`)) group by `products`.`id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_addresses_fk` (`region_id`),
  ADD KEY `users_addresses_fk` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD KEY `user_carts_fk` (`user_id`),
  ADD KEY `products_carts_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD KEY `coupons_products_fk` (`coupon_id`),
  ADD KEY `products_coupons_fk` (`product_id`);

--
-- Indexes for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD KEY `users_coupons_fk` (`user_id`),
  ADD KEY `coupons_users_fk` (`coupon_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_addresses_fk` (`address_id`),
  ADD KEY `orders_coupons_fk` (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_products_fk` (`brand_id`),
  ADD KEY `subcategories_products_fk` (`subcategory_id`);

--
-- Indexes for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD KEY `offers_products_fk` (`offer_id`),
  ADD KEY `products_offers_fk` (`product_id`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD KEY `orders_products_fk` (`order_id`),
  ADD KEY `products_orders_fk` (`product_id`);

--
-- Indexes for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD KEY `specs_products_fk` (`spec_id`),
  ADD KEY `products_specs_fk` (`product_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_regions_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `users_reviews_fk` (`user_id`),
  ADD KEY `products_review_fk` (`product_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_subcategories_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD KEY `users_wishlists_fk` (`user_id`),
  ADD KEY `products_wishlists_fk` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `regions_addresses_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_addresses_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `products_carts_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_carts_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD CONSTRAINT `coupons_products_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_coupons_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD CONSTRAINT `coupons_users_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_coupons_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_addresses_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_coupons_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brands_products_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategories_products_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD CONSTRAINT `offers_products_fk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_offers_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `orders_products_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_orders_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD CONSTRAINT `products_specs_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specs_products_fk` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `products_review_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_reviews_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categories_subcategories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `products_wishlists_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_wishlists_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
