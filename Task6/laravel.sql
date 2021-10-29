-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 11:31 AM
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
-- Database: `laravel`
--

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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'oppo', '69eaf6d0aa59a92d38547926a321383a0d83ab2191924e9b74c5383cd4718fc2', '[\"*\"]', '2021-10-28 18:05:34', '2021-10-28 17:08:46', '2021-10-28 18:05:34'),
(2, 'App\\Models\\User', 3, 'oppo', '902fa2843108a2770b98bbcb8c11a9285d364d9a8c4b4abefe04d7c2252ea8df', '[\"*\"]', NULL, '2021-10-28 18:32:38', '2021-10-28 18:32:38'),
(4, 'App\\Models\\User', 3, 'oppo', '210665291561faf7163d780e181c80c68a731e3f3108a78166108b0d96503060', '[\"*\"]', '2021-10-28 21:00:45', '2021-10-28 18:58:14', '2021-10-28 21:00:45'),
(5, 'App\\Models\\User', 3, 'oppo', 'c014491be5e9e8e716aa59609ba8686eb1b85f933c9954b4e8d9dafb4b54ae2f', '[\"*\"]', NULL, '2021-10-28 19:25:04', '2021-10-28 19:25:04'),
(6, 'App\\Models\\User', 3, 'oppo', '006a5462505c5b1072476de7815ecf75da381226e8549b366d9e00cb428c5095', '[\"*\"]', NULL, '2021-10-28 19:25:39', '2021-10-28 19:25:39'),
(7, 'App\\Models\\User', 3, 'oppo', '5e8fffe433d084c7a498df879e5f0c82f042f7cc57988026692483afb8078190', '[\"*\"]', NULL, '2021-10-28 20:53:13', '2021-10-28 20:53:13'),
(8, 'App\\Models\\User', 3, 'oppo', '60cbca707840e4513fdf7ff6fdb6aad0ca336336ba81994f0c867a444ba5883d', '[\"*\"]', NULL, '2021-10-28 20:53:27', '2021-10-28 20:53:27');

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
(5, 'تلفزيون ذكي بشاشة LED دون إطار مقاس 50 بوصة وبدقة 4K مع جهاز استقبال مدمج يعمل بنظام أندرويد 4T-C50DL6EX أسود', '50-Inch 4K Smart Frameless LED TV With Android System Built-In Receiver 4T-C50DL6EX Black', '8499', 'tv-toshiba.jpg', 2, 1, 'منتج مزود بمنفذ USB: للفيديو والصور والموسيقى\r\nمنظم فولتية تلقائي: تيار متردد 100 - 240 فولت\r\nاستهلاك الطاقة: 200 وات\r\nفئة كفاءة الطاقة: (C)', 'USB : Video - Photos - Music\r\nAutomatic Voltage Regulator : AC 100-240 Volt\r\nPower Consumption : 200 Watt\r\nEnergy Efficiency Class : ( C )', 1, 1, '2021-10-20 16:51:22', '2021-10-25 19:23:29'),
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` mediumint(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Ahmed', 'salsabil.tarek55@gmail.com', '2021-10-26 03:36:50', '$2y$10$dFdBMDiP1j7wV3WgXRvVV.u9tO/5U8JqpqhEwQjTVemjdQ9YC9xCC', NULL, NULL, '2021-10-26 03:36:09', '2021-10-26 03:36:50'),
(2, 'Salsabil Tarek', 'salsabilahmed968@gmail.com', '2021-10-26 15:02:49', '$2y$10$U47Umj0wim77kgzG.Tn9Qus.CuKefjGEegpMH16bzpSJzCLy62YUu', NULL, NULL, '2021-10-26 06:57:20', '2021-10-26 15:02:49'),
(3, 'ahmed', 'a@test.gmail.com', '2021-10-28 18:05:34', '$2y$10$ezOBIzxTv0jUqsEE1nn8UuIA4F2Gqf/w97mT/qJBdclLwdW4r9fai', NULL, 52771, '2021-10-28 17:08:46', '2021-10-28 20:05:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_products_fk` (`brand_id`),
  ADD KEY `subcategories_products_fk` (`subcategory_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brands_products_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategories_products_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categories_subcategories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
