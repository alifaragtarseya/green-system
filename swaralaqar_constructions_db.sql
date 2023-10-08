-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2022 at 11:26 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swaralaqar_constructions_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'شركة سوار للأنشاء والتعمير', 'images/about/2021021552842257660.png', '<p>شركة سوار للأنشاء والتعمير شركة رائدة فى مجال البناء والمقاولات قامت شركة سوار بتشييد العديد من المشاريع , كما نسعى للتميز عبر تحقيق أعلى مستوى لرضا عملائنا والتفوق من خلال تعزيز عملياتنا التشغيلية والألتزام بمسؤليتنا اتجاه المجتمع لتحقيق أعلى كفأة ومستوى دائم للأبتكار .</p>\r\n<h3><strong>رسالتنا</strong></h3>\r\n<p>تسعى شركة سوار لتقديم أفضل خدمة بشكل دائم للأبتكار فى اعمالها وفى الخدمات الذى تقوم بتقديمها</p>\r\n<h3><strong>رؤيتنا</strong></h3>\r\n<p>بناء العديد من المشاريع قادرة على الأستمرارية تضيف قيمة لرؤية 2030</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2021-01-10 09:28:26', '2021-02-15 17:28:42'),
(2, 'لماذا سوار للأنشاء والتعمير ؟', 'images/about/202102155285836603.png', '<p><strong>الالتزام&nbsp;</strong></p>\r\n<p>الالتزام بتنفيذ المشاريع على أعلى مستوى من الجودة، في الموعد المحدد وطبقاً للميزانية المرسومة للمشروع.<br /><br /><strong>التخصص</strong><br />فريق من المتخصصين في كافة مجالات الانشاءات العقارية، حاصلين على شهادات معتمدة ومستوى عالي من التدريب.<br /><br /><strong>الحداثة</strong></p>\r\n<p>متميز بفكر وأسلوب مختلف حيث يعكس ويحمل التطور العالمي للتصميمات الداخلية والخارجية وأحدث برامج التصميم العقاري.<br /><br /><strong>التنوع</strong></p>\r\n<p>نقدم باقة متنوعة من الخدمات العقارية المتميزة بأسلوب وأداء مختلف</p>', '2021-01-10 09:28:26', '2021-02-15 17:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `phone`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'مدير النظام', 'test@test.com', '$2y$10$WHz.qoNLKRZdK4YULJquveQtlhwcT0fSlwCslhNYzTCcZILvKDlYG', '09876543213', 'images/admins/2021010932651948861.png', 'JnRx1MIaBZhcSSIcitidglBLbtZPy740UyPHnFTFG5IjU3GiiMBsKLiAU0ep', '2021-01-09 12:35:55', '2021-01-09 13:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `email`, `phone`, `subject`, `message`, `service_id`, `view`, `created_at`, `updated_at`) VALUES
(1, 'luraxubot', 'zyqirekebu@mailinator.com', '+1 (837) 882-5088', 'Ea atque dolor simil', 'Commodo sunt elit m', NULL, 0, '2021-01-11 09:00:43', '2021-01-11 09:00:43'),
(2, 'luraxubot', 'zyqirekebu@mailinator.com', '+1 (837) 882-5088', 'Ea atque dolor simil', 'Commodo sunt elit m', NULL, 1, '2021-01-11 09:01:51', '2021-01-11 10:10:57'),
(7, 'bagacico', 'zoxuqynowo@mailinator.com', '+1 (626) 292-1893', 'Velit commodo quibus', 'Eaque quia culpa qui', NULL, 1, '2021-01-11 10:09:35', '2021-01-11 14:47:46'),
(10, 'lehuq', 'wivibapan@mailinator.com', '+1 (135) 654-4393', NULL, 'Eveniet et illo mol', 4, 0, '2021-01-11 11:17:11', '2021-01-11 11:17:11'),
(11, 'lehuq', 'wivibapan@mailinator.com', '+1 (135) 654-4393', NULL, 'Eveniet et illo mol', 4, 0, '2021-01-11 11:17:19', '2021-01-11 11:17:19'),
(12, 'lehuq', 'wivibapan@mailinator.com', '+1 (135) 654-4393', NULL, 'Eveniet et illo mol', 4, 1, '2021-01-11 11:18:29', '2021-01-11 11:24:28'),
(13, 'lehuq', 'wivibapan@mailinator.com', '+1 (135) 654-4393', NULL, 'Eveniet et illo mol', 4, 1, '2021-01-11 11:18:52', '2021-01-11 11:23:57'),
(14, 'lehuq', 'wivibapan@mailinator.com', '+1 (135) 654-4393', NULL, 'Eveniet et illo mol', 4, 0, '2021-01-11 11:22:04', '2021-01-11 11:22:04'),
(15, 'cotet', 'jujytyma@mailinator.com', '+1 (509) 309-2165', NULL, 'Aut sed pariatur Un', 2, 1, '2021-01-11 11:22:33', '2021-01-11 14:45:41'),
(16, 'kybuc', 'suxekunu@mailinator.com', '+1 (314) 102-9282', 'Distinctio Nostrud', 'Aut placeat sunt eu', NULL, 0, '2021-01-11 14:57:40', '2021-01-11 14:57:40'),
(17, 'lahysoxa', 'byjiteva@mailinator.com', '+1 (829) 553-8295', NULL, 'In eveniet alias ut', 3, 0, '2021-01-11 14:58:18', '2021-01-11 14:58:18'),
(18, 'zeziba', 'zysi@mailinator.com', '+1 (362) 775-7273', NULL, 'Id beatae hic perspi', 6, 1, '2021-01-11 15:02:24', '2021-01-19 12:37:00'),
(19, 'tegyru', 'bopa@mailinator.com', '+1 (343) 784-1837', 'Voluptate velit qui', 'Reiciendis id ut deb', NULL, 0, '2021-01-11 15:02:45', '2021-01-11 15:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `metas_banners`
--

CREATE TABLE `metas_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` enum('home','about','services','projects','contact') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas_banners`
--

INSERT INTO `metas_banners` (`id`, `page`, `title`, `keywords`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'home', 'الأنشاء و التعمير', 'الأنشاء و التعمير', 'الأنشاء و التعمير', NULL, '2021-01-10 08:44:56', '2021-01-10 10:46:13'),
(2, 'about', 'من نحن', 'من نحن', 'من نحن', 'images/banner/2021021554531283707.png', '2021-01-10 08:44:56', '2021-02-15 17:45:31'),
(3, 'services', 'الخدمات', 'الخدمات', 'الخدمات', 'images/banner/202102155464096473.png', '2021-01-10 08:44:56', '2021-02-15 17:46:41'),
(4, 'projects', 'المشاريع', 'المشاريع', 'المشاريع', 'images/banner/2021021554619909795.png', '2021-01-10 08:44:56', '2021-02-15 17:46:19'),
(5, 'contact', 'أتصل بنا', 'أتصل بنا', 'أتصل بنا', 'images/banner/2021021554604837201.png', '2021-01-10 08:44:56', '2021-02-15 17:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_09_19_031320_create_admins_table', 1),
(4, '2020_09_19_041320_create_settings_table', 1),
(5, '2021_01_09_121256_create_services_table', 1),
(6, '2021_01_09_121507_create_abouts_table', 1),
(7, '2021_01_09_121617_create_sliders_table', 1),
(8, '2021_01_09_121711_create_projects_table', 1),
(9, '2021_01_09_121804_create_project_images_table', 1),
(10, '2021_01_09_122620_create_messages_table', 1),
(11, '2021_01_09_122952_create_metas_banners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `hide`, `slug`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(4, 'مشروع مكتب التعليم بترج', '<p>سوار خبرة أكثر من عشر سنوات بمجال الأنشاء والتعمير , تم انشاء كافة المشاريع المختلفة (مدارس _ شركات _ مولات _ مصانع _ فنادق _ مكاتب تعليمية) , تم الانتهاء من مشروع مكتب التعليم بترج وذلك بأستخدام كافة خدمات التخطيط والتنفيذ بناً على متطلبات العميل وبأشراف مجموعة من المهندسيين ذات خبرة عالية .</p>', 0, 'مشروع-مكتب-التعليم-بترج', NULL, NULL, '2021-01-10 11:25:37', '2021-02-15 13:58:21'),
(5, 'مدرسة عبدالله بن الزبير الحمضة', '<p>تم تنفيذ مشروع مدرسة عبدالله بن الزبير الحمضة من خلال شركة سوار وذلك بأستخدام كافة خدمات التخطيط والتنفيذ بناً على متطلبات العميل وبأشراف مجموعة من المهندسيين ذات خبرة عالية .</p>', 0, 'مدرسة-عبدالله-بن-الزبير-الحمضة', NULL, NULL, '2021-01-10 17:02:09', '2021-03-02 13:19:28'),
(6, 'مدرسة ابو أيوب الأنصارى الثانوية', '<p>تم تنفيذ مشروع مدرسة ابو أيوب الأنصارى الثانوية من خلال شركة سوار وذلك بأستخدام كافة خدمات التخطيط والتنفيذ بناً على متطلبات العميل وبأشراف مجموعة من المهندسيين ذات خبرة وكفأة عالية .</p>', 0, 'مدرسة-ابو-يوب-النصارى-الثانوية', '\"مشروع\" \"مهندسيين\" \"تشييد\" \"بناء\"', 'تم تنفيذ مشروع مدرسة ابو أيوب الأنصارى الثانوية من خلال مؤسسة سوار وذلك بأستخدام كافة خدمات التخطيط والتنفيذ بناً على متطلبات العميل وبأشراف مجموعة من المهندسيين ذات خبرة وكفأة عالية .', '2021-02-15 14:32:19', '2021-03-02 13:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `image`, `project_id`, `created_at`, `updated_at`) VALUES
(25, 'images/projects/2021021554138381675.png', 5, '2021-02-15 17:41:39', '2021-02-15 17:41:39'),
(26, 'images/projects/2021021554305955461.png', 6, '2021-02-15 17:43:05', '2021-02-15 17:43:05'),
(27, 'images/projects/2021021554344203091.png', 4, '2021-02-15 17:43:44', '2021-02-15 17:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `icon`, `description`, `hide`, `slug`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'خدمات البنية التحتية', 'images/services/2021021553136261167.png', 'flaticon-apartment-2', '<p>نقوم بالعديد من خدمات البنية التحتية بداية من استكشاف الموقع حتى تصميم وتنفيذ المشروع من خلال القيام باعمال المقاولات المتعلقة بشبكات المياه وأنظمة الصرف الصرف الصحى , ومحطات معالجة المياه وذلك من خلال إشراك العديد من الاخصائيين والمهندسيين البيئيين لانهاء المشروع بأعلى جودة وأكثر اماناً .&nbsp;</p>\r\n<p>&nbsp;</p>', 0, 'خدمات-البنية-التحتية', '\"البنية التحتية\"', 'نقوم بالعديد من خدمات البنية التحتية بداية من استكشاف الموقع حتى تصميم وتنفيذ المشروع من خلال القيام باعمال المقاولات المتعلقة بشبكات المياه وأنظمة الصرف الصرف الصحى , ومحطات معالجة المياه وذلك من خلال إشراك العديد من الاخصائيين والمهندسيين البيئيين لانهاء المشروع بأعلى جودة وأكثر اماناً . ', '2021-01-09 15:27:55', '2021-02-15 17:31:36'),
(2, 'الخدمات الكهربائية', 'images/services/2021021553122947229.png', 'flaticon-creativity', '<p>فى شركة سوار نسعى دائماً لتقديم خدمة أكثر أماناً لعملائنا , لذلك يتم استخدام منتجات عالية الجودة مع أحدث التقنيات المتطورة للخدمات الكهربائية بتكاليف أقل مع وضع اجراءات السلامة أولاً لضمان سلامة عملائنا .</p>', 0, 'الخدمات-الكهربائية', '\"شركة سوار\" \"كهربا\" \"خدمات كهربائية\"', 'فى شركة سوار نسعى دائماً لتقديم خدمة أكثر أماناً لعملائنا , لذلك يتم استخدام منتجات عالية الجودة مع أحدث التقنيات المتطورة للخدمات الكهربائية بتكاليف أقل مع وضع اجراءات السلامة أولاً لضمان سلامة عملائنا .', '2021-01-10 15:49:10', '2021-03-02 13:17:54'),
(3, 'خدمات السباكة', 'images/services/2021021553105394721.png', 'flaticon-faucet', '<p>تتميز جميع منتجات السباكة لدينا باحدث التقنيات المتطورة مع الاخذ فى الاعتبار كافة اجراءات السلامة , فى شركة سوار نسعى دائماً لتقديم خدمة مميزة بأعلى كفأة .</p>', 0, 'خدمات-السباكة', '\"سباكة\"', 'تتميز جميع منتجات السباكة لدينا باحدث التقنيات المتطورة مع الاخذ فى الاعتبار كافة اجراءات السلامة , فى شركة سوار نسعى دائماً لتقديم خدمة مميزة بأعلى كفأة .', '2021-01-10 15:49:58', '2021-03-02 13:16:45'),
(4, 'خدمات التجهيز', 'images/services/2021021553041601144.png', 'flaticon-contract', '<p>تعد خدمة التجهيز من الخدمات الأكثر دقة وتفصيلاً فيها يتم أخذ قياسات المشروع من البداية بعناية من خلال عمل خطة منظمة ومتوافقة مع سياسة المشروع الذى نقوم بتنفيذه , حتى نتأكد من تقديم نتيجة نهائية تحقق الاستخدام الامثل للمشروع , وذلك هو جوهر خدمات التجهيز .&nbsp;&nbsp;</p>', 0, 'خدمات-التجهيز', '\"خدمة التجهيز\" \"شركة سوار\" \"بناء\" \"تشييد\" \"مبانى\"', 'تعد خدمة التجهيز من الخدمات الأكثر دقة وتفصيلاً فيها يتم أخذ قياسات المشروع من البداية بعناية من خلال عمل خطة منظمة ومتوافقة مع سياسة المشروع الذى نقوم بتنفيذه , حتى نتأكد من تقديم نتيجة نهائية تحقق الاستخدام الامثل للمشروع , وذلك هو جوهر خدمات التجهيز .  ', '2021-01-10 15:50:47', '2021-02-15 17:30:41'),
(5, 'خدمات الإنشاء والتعمير', 'images/services/2021021553022258690.png', 'flaticon-circular', '<p>فى خدمة الإنشاء والتعمير نسعى دائماً لتقديمها بأعلى كفأة , فهى من الخدمات المعقدة لذلك نقوم بتولى المهام المعقدة ويتم تحويلها الى نقاط مبسطة حتى نتمكن من أنجازها دون إهدار فى أى موارد , ليتم إنشاء تصميم أكثر دقة وأحترافية و أمتياز .</p>', 1, 'خدمات-النشاء-والتعمير', '\"مؤسسة سوار\" \"انشاء وتعمير\" \"مبانى\" \"تشييد\" \"مشروع\" \"بناء\"', 'فى خدمة الإنشاء والتعمير نسعى دائماً لتقديمها بأعلى كفأة , فهى من الخدمات المعقدة لذلك نقوم بتولى المهام المعقدة ويتم تحويلها الى نقاط مبسطة حتى نتمكن من أنجازها دون إهدار فى أى موارد , ليتم إنشاء تصميم أكثر دقة وأحترافية و أمتياز .', '2021-01-10 15:52:13', '2021-04-04 12:56:02'),
(6, 'خدمات مقاولات المبانى', 'images/services/2021021553003642697.png', 'flaticon-customer-support', '<p>تهدف شركة سوار فى مقاولات المبانى بتحويل كافة الخطط والرسومات الى واقع مع بداية كل مشروع وذلك لضمان التحكم فى التكاليف , ومن هنا تبدأ عملية تحقيق التوازن بين أقل تكلفة وأعلى جودة, كما تقوم شركة سوار فى خدمة مقاولات المبانى بالأشراف على البناء الفعلى مع المهندسين الأستشاريين لضمان جودة الخدمة وتحويل عملاؤنا الى شركاء دائمين على المدى الطويل .&nbsp;</p>', 0, 'خدمات-مقاولات-المبانى', '\"شركة سوار\" \"بناء\" \"تشييد\" \"مقاولات\"', 'تهدف شركة سوار فى مقاولات المبانى بتحويل كافة الخطط والرسومات الى واقع مع بداية كل مشروع وذلك لضمان التحكم فى التكاليف', '2021-01-10 15:52:50', '2021-03-02 13:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_white` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_white` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `sm_description`, `phone`, `phone_1`, `phone_2`, `email_1`, `email_2`, `logo`, `logo_white`, `favicon`, `favicon_white`, `location`, `address`, `facebook`, `twitter`, `instagram`, `snapchat`, `created_at`, `updated_at`) VALUES
(1, 'الانشاء و التعمير', 'شركة سوار للأنشاء والتعمير شركة رائدة فى مجال البناء والمقاولات قامت شركة سوار بتشييد العديد من المشاريع كما تسعى شركة سوار للتميز عبر تحقيق أعلى مستوى لرضا عملائنا والتفوق من خلال تعزيز عملياتنا التشغيلية والألتزام بمسؤليتنا اتجاه المجتمع لتحقيق أعلى كفأة ومستوى دائم للأبتكار .', '0114787811', '0535188889', '9200001897', 'info@swaralaqar.com', NULL, 'images/setting/2021010932233744732.png', 'images/setting/202101093234734248.png', 'images/setting/2021010932233498953.png', 'images/setting/2021010932233117668.png', 'https://goo.gl/maps/bRaAA8i7uRJmjwTF8', 'ش صلاح الدين الأيوبى - حى الملز - الرياض', 'https://www.facebook.com/swaralaqar', 'https://twitter.com/swaralaqar', 'https://www.instagram.com/swaralaqar/', 'https://www.snapchat.com/add/swaralaqar', '2021-01-09 12:35:55', '2021-03-04 16:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'سوار للأنشاء والتعمير', 'images/slider/2021021552745630052.png', 'استثمر فى المستقبل لبناء عقارك بشكل أفضل .. استخدام أفضل معايير البحث وتقديمها بشكل أحترافى', '2021-01-10 10:36:41', '2021-02-15 17:27:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_service_id_index` (`service_id`);

--
-- Indexes for table `metas_banners`
--
ALTER TABLE `metas_banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_title_unique` (`title`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_index` (`project_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_title_unique` (`title`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `metas_banners`
--
ALTER TABLE `metas_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `SERVICE_REQUEST_ID_FK` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `IMAGE_PROJECT_ID_FK` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
