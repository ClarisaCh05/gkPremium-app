-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2024 at 01:26 AM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gkpremiumsby`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'gkpremium@gmail.com', 'gkpremium');

-- --------------------------------------------------------

--
-- Table structure for table `asked_costume`
--

CREATE TABLE `asked_costume` (
  `id_question` int NOT NULL,
  `id_costume` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `asked_costume`
--

INSERT INTO `asked_costume` (`id_question`, `id_costume`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(2, 12, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(3, 2, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(4, 1, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(5, 1, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(6, 1, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(7, 2, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(8, 7, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(9, 8, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(10, 12, '2024-07-03 17:56:19', '2024-07-03 17:56:19'),
(11, 60, '2024-06-03 22:57:30', '2024-06-03 22:57:30'),
(12, 62, '2024-05-07 22:57:30', '2024-07-07 22:57:30'),
(13, 99, '2024-04-01 22:58:20', '2024-04-01 22:58:20'),
(14, 109, '2024-03-08 22:58:48', '2024-03-08 22:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category` varchar(225) DEFAULT NULL,
  `views` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `views`) VALUES
(1, 'sayurbuah', 0),
(2, 'princess', 0),
(3, 'inter', 0),
(4, 'karakter', 0),
(5, 'prof', 0),
(6, 'aksesoris', 0),
(7, 'bridalstation', 0),
(8, 'chistmas', 0),
(9, 'natal', 0),
(10, 'hall', 0),
(11, 'hero', 0),
(12, 'animal', 0),
(13, 'onesie', 0),
(14, 'adat', 0),
(15, 'apron', 0),
(16, 'futuristik', 0),
(17, 'old', 0),
(18, 'model', 0),
(19, 'cosplay', 0),
(20, 'prince', 0);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_color` int NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(1, 'Merah'),
(2, 'Oranye / Jingga'),
(3, 'Kuning'),
(4, 'Hijau'),
(5, 'Biru'),
(6, 'Ungu'),
(7, 'Pink'),
(8, 'Cokelat'),
(9, 'Hitam'),
(10, 'Putih'),
(11, 'Abu-abu');

-- --------------------------------------------------------

--
-- Table structure for table `costume`
--

CREATE TABLE `costume` (
  `id_costume` int NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `size` varchar(15) DEFAULT NULL,
  `description` text,
  `views` int DEFAULT NULL,
  `interest` int NOT NULL,
  `price` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `costume`
--

INSERT INTO `costume` (`id_costume`, `name`, `size`, `description`, `views`, `interest`, `price`, `status`) VALUES
(1, 'SAYURBUAH TOMAT', 'm-a', '#gk_sayurbuah anak buah tomat tomato red merah', 126, 3, 150000, 0),
(2, 'SAYURBUAH TERONG', 'm-a', '#gk_sayurbuah anak sayur terong eggplant ungu purple', 12, 1, 100000, 0),
(3, 'SAYURBUAH STROBERI', 'm-a', '#gk_sayurbuah anak buah stroberi strawberry beri berry merah red', 4, 0, 50000, 0),
(4, 'SAYURBUAH SEMANGKA', 'm-a', '#gk_sayurbuah anak buah semangka watermelon red merah green hijau', 1, 0, 150000, 0),
(5, 'SAYURBUAH SEMANGKA 2', 'm-a', '#gk_sayurbuah anak buah semangka watermelon hijau green red merah', 1, 0, 50000, 0),
(7, 'PRINCESS ARIEL ANAK', 's-a', '#gk_princess anak cewek perempuan film animasi disney fantasy Ariel', 12, 2, 100000, 0),
(8, 'PRINCESS TINKERBELL DEWASA', 'l-w', '#gk_princess wanita dewasa remaja cewek perempuan film animasi disney fantasy peterpan tinkerbell peri fairy green hijau', 3, 1, 300000, 0),
(9, 'PRINCESS TINKERBELL ANAK', 'm-a', '#gk_princess anak cewek perempuan film animasi disney fantasy peterpan tinkerbell peri fairy green hijau', 8, 0, 250000, 0),
(10, 'PRINCESS TATIANA ANAK', 's-a', '#gk_princess anak cewek perempuan film animasi disney fantasy princess and the frog tiana fairy peri hijau gree', 581, 0, 250000, 0),
(12, 'INTER VICTORIA HITAM DEWASA', 'l-w', '#gk_inter internasional eropa belanda medieval princess putri dewasa cewek perempuan wanita hitam black elegant fancy mewah', 580, 0, 350000, 0),
(13, 'INTER VICTORIA HIJAU DEWASA', 'm-a', '#gk_inter internasional eropa belanda medieval princess putri dewasa cewek perempuan wanita hijau green mint elegant fancy mewah', 575, 0, 350000, 0),
(14, 'INTER VICTORIA CREAM DEWASA', 'l-a', '#gk_inter internasional eropa medieval princess putri dewasa cewek perempuan wanita krem cream big size besar vintage gown', 577, 0, 350000, 0),
(15, 'INTER VICTORIA BIRU WANITA', 'l-a', '#gk_inter internasional eropa medieval princess putri dewasa cewek perempuan wanita biru blue elegant fancy mewah', 585, 0, 350000, 0),
(16, 'AKSESORIS PRINCESS PUTIH', 'm-a', '#gk_aksesoris #gk_princess putri disney cinderella sophia anak cewek perempuan putih white sarung tangan glove tongkat sihir magic staff kalung necklace mahkota tiara crown earing anting-anting', 579, 0, 75000, 0),
(17, 'AKSESORIS PRINCESS PINK', 'm-a', '#gk_aksesoris #gk_princess putri disney aurora sleeping beauty anak cewek perempuan pink sarung tangan glove tongkat sihir magic staff kalung necklace mahkota tiara crown earing anting-anting', 574, 0, 75000, 0),
(18, 'AKSESORIS PRINCESS KUNING', 'm-a', '#gk_aksesoris #gk_princess putri disney belle beauty and the beast anak cewek perempuan kuning yellow sarung tangan glove tongkat sihir magic staff kalung necklace mahkota tiara crown', 572, 0, 75000, 0),
(19, 'AKSESORIS PRINCESS BIRU', 'm-a', '#gk_aksesoris #gk_princess putri disney cinderella anak cewek perempuan biru blue sarung tangan glove tongkat sihir magic staff kalung necklace mahkota tiara crown', 576, 0, 75000, 0),
(20, 'bridalstation.story White Suit JP06', 'l-p', 'bridal.station bridalstation.story jual beli sewa pesta pernikahan pre sweet wedding ultah single jas suit coat dewasa light terang cerah white putih short sleeves lengan pendek', 572, 0, 350000, 0),
(21, 'bridalstation.story Silver Glitter Dress GP73', 'l-w', 'bridal.station bridalstation.story jual beli sewa gaun dress pesta pernikahan pre sweet wedding ultah single dewasa light terang cerah silver perak glitter short sleeves lengan pendek', 574, 0, 350000, 0),
(22, 'bridalstation.story Light Gold Fancy Glitter Dress GP67', 'l-w', 'bridal.station bridalstation.story jual beli sewa gaun dress pesta pernikahan pre sweet wedding ultah single dewasa light terang cerah gold emas yellow kuning glitter fancy mewah big size besar short sleeves lengan pendek', 572, 0, 350000, 0),
(23, 'bridalstation.story Blue Short Dress GP63', 'l-w', 'bridal.station bridalstation.story jual beli sewa gaun dress pesta pernikahan pre sweet wedding ultah single dewasa dark gelap biru blue no sleeves tanpa lengan pendek short', 572, 0, 350000, 0),
(24, 'bridalstation.story Dark Blue Dress GP57', 'm-w', 'bridal.station bridalstation.story jual beli sewa gaun dress pesta pernikahan pre sweet wedding ultah single dewasa dark blue biru gelap short sleeves lengan pendek', 572, 0, 350000, 0),
(25, 'HALL WIZARD ANAK', 'm-a', '#gk_hall halloween halowen hallowen black hitam seram scary penyihir wizard arab arabian #gk_inter internasional mesir eygpt cowok anak laki-laki', 574, 0, 250000, 0),
(26, 'HALL WITCH HIJAU DEWASA', 'l-a', '#gk_hall halloween halowen hallowen dark green hijau seram scary gaun dress long ball gown victoria medieval #gk_inter internasional cewek perempuan wanita dewasa', 578, 0, 350000, 0),
(27, 'HALL VILLAIN ANAK', 'm-a', '#gk_hall halloween halowen hallowen dark purple ungu seram scary snowwhite snowhite ibu tiri villain penjahat bad guys step mother disney anak cewek perempuan', 570, 0, 250000, 0),
(28, 'HALL VAMPIRE WANITA', 'l-w', '#gk_hall halloween halowen hallowen merah red seram scary vampire drakula sexy pendek cewek dewasa perempuan wanita', 569, 0, 350000, 0),
(29, 'HALL VAMPIRE DEWASA', 'l-p', '#gk_hall halloween halowen hallowen black hitam seram scary red merah drakula vampire cowok dewasa pria laki-laki bangsawan eropa #gk_inter internasional noble', 572, 0, 300000, 0),
(30, 'ANIMAL ZEBRA 2 ANAK', 'l-a', '#gk_animal hewan binatang animal anak zebra hutan forest wood savana putih white', 571, 0, 150000, 0),
(31, 'ANIMAL UNICORN ONESIE ANAK', 'l-a', '#gk_animal hewan binatang animal anak #gk_onesie putih white pink biru blue unicorn fantasy', 570, 0, 150000, 0),
(32, 'ANIMAL ULAT ANAK', 'm-a', '#gk_animal hewan binatang animal anak serangga bug ulat caterpillar worm maggot hijau green larva', 569, 0, 100000, 0),
(33, 'ANIMAL ULAR 2 ANAK', 'l-a', '#gk_animal hewan binatang animal anak hutan forest wood snake ular boa coklat', 571, 0, 100000, 0),
(34, 'ANIMAL UDANG ANAK', 'm-a', '#gk_animal hewan binatang animal anak sea lau ocean udang ebi shrimp ikan oren orange jingga', 574, 0, 100000, 0),
(35, 'PROFESI ARSITEK ANAK', 'm-a', '#gk_prof profesi job pekerjaan arsitek bangunan perancang gedung anak tukang', 571, 0, 150000, 0),
(36, 'PROFESI POLISI BLINK ANAK', 'm-a', '#gk_prof profesi pekerjaan job anak cewek perempuan polisi police cop biru blue', 573, 0, 150000, 0),
(37, 'PROFESI POLISI ANAK', 's-a', '#gk_prof profesi pekerjaan job anak cowok laki-laki polisi police cop biru blue officer', 573, 0, 150000, 0),
(38, 'PROFESI PILOT DEWASA', 'l-p', '#gk_prof profesi pekerjaan job dewasa pria cowok laki-laki pilot biru blue', 571, 0, 300000, 0),
(39, 'PROFESI PILOT ANAK', 'l-a', '#gk_prof profesi pekerjaan job anak cowok laki-laki pilot putih white', 576, 0, 250000, 0),
(40, 'ADAT RIAU ANAK', 'm-a', 'gk_adat adat tradisional indonesia cewek perempuan cowok laki-laki anak riau sumatra kuning yellow', 578, 0, 150000, 0),
(41, 'ADAT PAPUA DEWASA', 'l-a', '#gk_adat adat tradisional indonesia cewek perempuan wanita dewasa papua coklat', 571, 0, 150000, 0),
(42, 'ADAT PAPUA ANAK~1', 'm-a', '#gk_adat adat tradisional indonesia cewek perempuan cowok laki-laki anak papua hitam black', 561, 0, 150000, 0),
(43, 'ADAT PADANG HIJAU ANAK', 'm-a', '#gk_adat adat tradisional indonesia cewek perempuan cowok laki-laki anak padang sumatra hijau green', 573, 0, 150000, 0),
(44, 'ADAT PADANG ANAK', 'l-a', '#gk_adat adat tradisional indonesia cewek perempuan cowok laki-laki anak padang sumatra blue biru', 572, 0, 150000, 0),
(45, 'HERO ZORRO', 'm-a', '#gk_hero hero superhero pahlawan super film zorro zoro anak dewasa cowok pria laki-laki hitam black', 569, 0, 300000, 0),
(46, 'HERO WONDER WOMEN BABY', '9m', '#gk_hero hero superhero pahlawan super film dc wonder woman wonderwoman ww anak cewek perempuan biru blue merah red bayi baby', 570, 0, 250000, 0),
(47, 'HERO WONDER WOMEN ANAK A', 'm-a', '#gk_hero hero superhero pahlawan super film dc wonder woman wonderwoman ww anak cewek perempuan biru blue merah red', 577, 0, 250000, 0),
(48, 'HERO WONDER WOMEN A', 'm-w', '#gk_hero hero superhero pahlawan super film dc wonder woman wonderwoman ww dewasa wanita remaja cewek perempuan biru blue merah red sexy pendek', 571, 0, 250000, 0),
(49, 'HERO WONDER WOMAN PREMIUM', 's-w', '#gk_hero hero superhero pahlawan super film dc wonder woman wonderwoman ww dewasa wanita cewek perempuan biru blue coklat brown kulit leather premium', 571, 0, 250000, 0),
(50, 'NATAL SNOWMAN ANAK', 'l-a', '#gk_chistmas #gk_natal x-mas xmas anak cowok laki-laki snowman manusia salju putih white', 576, 0, 250000, 0),
(51, 'NATAL SNOWMAN 2 ANAK', 'l-a', '#gk_chistmas #gk_natal x-mas xmas anak snowman manusia salju putih white', 574, 0, 150000, 0),
(52, 'NATAL SANTA RUDOLF DEWASA', 'l-p', '#gk_chistmas #gk_natal x-mas xmas dewasa cowok laki-laki pria rudolf rusa lucu menarik unik deer santa', 572, 0, 300000, 0),
(53, 'NATAL SANTA PREM DEWASA', 'm-w', '#gk_chistmas #gk_natal x-mas xmas dewasa premium cowok pria laki-laki cewek wanita perempuan santa dress merah maroon red sexy', 574, 0, 350000, 0),
(54, 'NATAL SANTA PREM DEWASA COWOK', 'l-p', '#gk_chistmas #gk_natal x-mas xmas dewasa pria cowok laki-laki premium santa besar merah red', 571, 0, 300000, 0),
(55, 'KARAKTER BL PUTIH ROMPI MERAH', 'm-a', '#gk_karakter karakter bajak laut perompak pirates pemburu berburu hunter hunt anak cowok laki-laki', 570, 0, 350000, 0),
(56, 'KARAKTER BL PUTIH MERAH KUNING V1', 'l-a', '#gk_karakter karakter bajak laut perompak pirates pemburu berburu hunter hunt anak cowok laki-laki bangsawan eropa #gk_inter internasional belanda', 567, 0, 350000, 0),
(57, 'KARAKTER BL PRINCE MERAH GOLD', 'l-a', '#gk_karakter karakter bajak laut perompak pirates pemburu berburu hunter hunt anak cowok laki-laki bangsawan eropa #gk_inter internasional belanda', 569, 0, 350000, 0),
(58, 'KARAKTER BL RETRO COKLAT MAROON', 'm-w', '#gk_karakter karakter bajak laut perompak pirates pemburu berburu hunter hunt dewasa cewek perempuan wanita eropa  #gk_inter retro melar internasional sirkus circus', 567, 0, 350000, 0),
(59, 'KARAKTER BL PUTIH HITAM DRESS', 'l-w', '#gk_karakter karakter bajak laut perompak pirates pemburu berburu hunter hunt dewasa cewek perempuan wanita eropa  #gk_inter retro melar internasional pendek sexy dress', 567, 0, 350000, 0),
(60, 'ONESIE UNICORN WINGS KUNING', 'semu ukuran', 'onesie #gk_onesie hewan binatang animal dewasa besar kuda horse unicorn putih white fantasy', 568, 0, 100000, 0),
(61, 'ONESIE TIGER', 'semua ukuran', 'onesie #gk_onesie hewan binatang animal dewasa besar macan harimau tiger tigger animasi kartun winnie the pooh winniethepooh disney karakter #gk_karakter', 566, 0, 100000, 0),
(62, 'ONESIE SUPERMAN', 'semua ukuran', 'onesie #gk_onesie dewasa besar dc superhero hero super superman pahlawan #gk_hero', 565, 0, 100000, 0),
(63, 'ONESIE STITCH', 'semua ukuran', 'onesie #gk_onesie dewasa besar animasi kartun disney biru blue stitch lilo and karakter #gk_karakter', 570, 0, 100000, 0),
(64, 'ONESIE SKELETON', 'semua ukuran', 'onesie #gk_onesie dewasa besar halloween halowen skeleton skull tulang hitam #gk_hall', 567, 0, 100000, 0),
(65, 'APRON SNOW WHITE', 'l-w', '#gk_apron apron celemek princess putri disney dewasa cewek perempuan wanita snow white snowwhite', 569, 0, 50000, 0),
(66, 'APRON Sheriff Callie kucing', 'l-w', '#gk_apron apron celemek dewasa cewek perempuan wanita cowboy sheriff callie kucing cat', 573, 0, 50000, 0),
(67, 'APRON POCAHONTAS', 'l-w', '#gk_apron apron celemek princess putri disney dewasa cewek perempuan wanita pochahontas', 1, 0, 50000, 0),
(68, 'APRON MICKY AND MINNIE', 'semua ukuran', '#gk_apron apron celemek disney dewasa cewek perempuan wanita cowok pria laki-laki mickey mouse minnie mini anak', 569, 0, 50000, 0),
(69, 'APRON MICKEY MOUSE anak dan dewasa', 'semua ukuran', '#gk_apron apron celemek disney dewasa cowok pria laki-laki anak mickey mouse', 565, 0, 50000, 0),
(70, 'Prince William Dewasa', 'l-p', 'New Collection! Prince William Dewasa ya ka Cakep banget  Bisa kembaran ama versi anak juga lo #gk_prince #gk_inter', 11, 0, 300000, 0),
(71, '2 pc Kostum Inggris anak PG dan TK', 'm-a', 'Ready sewa 2 pc Kostum Inggris anak PG dan TK #gk_inter #gk_prince', 17, 0, 250000, 0),
(72, 'Li ShangPrince Mulan', 'm-p', 'Ready sewa kostum Li Shang Prince Mulan #gk_prince', 7, 0, 350000, 0),
(73, 'Pangeran Hans', 'l-a', 'Ready kostum Pangeran Hans sz PG-TK #gk_prince . . #kostumpangerananak #sewakostumanak #sewakostumpangeran', 10, 0, 350000, 0),
(74, 'Pangeran Hans Anak TK', 's-a', 'Ready Kostum Pangeran Hans  Anak TK #gk_prince', 14, 0, 250000, 0),
(75, 'Fairy Khayangan Kuning', 'm-w', 'Ready sewa peri khayangan warna  kuning #gk_karakter  #gk_model #gk_modele#gk_inter -from @bridalstation.story @bridalstation.story @bridalstation.story', 9, 0, 350000, 0),
(76, 'Peri Khayangan Biru', 'm-w', 'Ready sewa peri khayangan biru -from @bridalstation.story  @bridalstation.story  @bridalstation.story  #gk_karakter #gk_model  #gk_modele #gk_inter', 7, 0, 300000, 0),
(77, 'Peri Khayangan Orens', 'm-w', 'Ready sewa peri khayangan orens -from @bridalstation.story @bridalstation.story  @bridalstation.story  #gk_karakter  #gk_inter  #gk_model #gk_modele', 7, 0, 300000, 0),
(78, 'Kostum cosplay Hiroki', 'm-p', 'Kostum cosplay Hiroki cocok juga buat kostum lainnya #gk_karakter #gk_cosplay #gk_inter . . #sewakostumcosplaysurabaya #kostumanimesurabaya #kostumanime #sewakostumanime #sewakostumcosplay #cosplaycostume #kostumanime #sewakostumcosplayer #kostumcosplayersurabaya #kostumhiroki', 9, 0, 300000, 0),
(79, 'Kostum cosplay Takuto star Driver', 'l-p', 'Kostum cosplay Takuto star Driver cocok juga buat kostum lainnya #gk_karakter #gk_cosplay #gk_inter . . #sewakostumcosplaysurabaya #kostumanimesurabaya #kostumanime #sewakostumanime #sewakostumcosplay #cosplaycostume #sewakostumcosplayer #takutostardriver #kostumtakutostardriver #takutostardrivercostume', 5, 0, 300000, 0),
(80, 'Kostum cosplay Celestia Ludenberg', 'l-w', 'Kostum cosplay Celestia Ludenberg cocok juga buat kostum lainnya #gk_karakter #gk_cosplay #gk_inter . . #sewakostumcosplaysurabaya #kostumanimesurabaya #kostumanime #sewakostumanime #sewakostumcosplay #cosplaycostume #celestialudenberg #costumecelestialudenberg #kostumcosplaysurabaya #cosplayerindonesia #kostumcelestialudenberg.', 2, 0, 300000, 0),
(81, 'Kostum cosplay Neko K', 'l-w', 'Kostum cosplay Neko K cocok juga buat kostum lainnya #gk_karakter #gk_cosplay . . #sewakostumcosplaysurabaya #kostumanimesurabaya #kostumanime #sewakostumanime #sewakostumcosplay #cosplaycostume #sewakostumcosplayer #kostumneko #sewakostumcosplayer', 4, 0, 300000, 0),
(82, 'Kostum cosplay Mirka Fortune', 'm-w', 'Kostum cosplay Mirka Fortune - Trinity Blood cocok juga buat kostum lainnya #gk_karakter #gk_cosplay . . #sewakostumcosplaysurabaya #kostumanimesurabaya #kostumanime #sewakostumanime #sewakostumcosplay #cosplaycostume #mirkafortuna #mirkafortunacosplay #kostumcosplaysurabaya #cosplayerindonesia #cosplaysurabaya #kostummirkafortuna #mirkafortunecostume', 11, 0, 300000, 0),
(83, 'Princess Leia Star Wars', 'l-w', 'Ready Kostum Princess Leia Star wars #gk_karakter #gk_hero . bisa jadi kostum #gk_futuristik . #kostumleia #princessleia #kostumstarwars #sewakostumstarwars', 11, 0, 300000, 0),
(84, 'Star Wars Dart Vader', 'l-p', 'Ready sewa kostum star wars Dart Vader import berkualitas Aneka kostum superhero cek hasta #gk_hero . bisa jadi kostum #gk_futuristik . #sewakostumsuperheromurah #sewakodtumsurabaya #sewakostumstarwars #sewakostumstarwarssurabaya #sewakostumdartvader #starwarscostume #kostumsuperherosurabaya', 14, 0, 300000, 0),
(85, 'Stormtrooper', 'l-a', 'Ready Kostum starwars Stormtrooper #gk_hero #gk_karakter .  bisa jadi kostum #gk_futuristik . #kistumstarwars #sewakostumstarwars', 4, 0, 350000, 0),
(86, 'cat women versi mini', 'm-w', 'Ready Kostum cat women versi mini #gk_hero #gk_hall . bisa jadi kostum #gk_futuristik . #kostumcatwomen #rentalkostumsuperherosurabaya #kostumjawatimur #sewakostummurah', 11, 0, 300000, 0),
(87, 'Old Fashion 1', 'l-p', 'Ready Kostum old fashion #gk_old  #kostum70an #kostum80an #sewakostumoldfashion #kostumsurabaya', 3, 0, 150000, 0),
(88, 'Old Fashion 2', 'm-w', 'Ready Kostum old fashion #gk_old  #kostum70an #kostum80an #sewakostumoldfashion #kostumsurabaya', 3, 0, 150000, 0),
(99, 'HALL QUEEN OF HEARTS', 'l-w', '#gk_hall kostum Queen of Hearts dewasa, bisa untuk buat kostum putri #gk_princess', 0, 0, 350000, 0),
(100, 'HALL ICE QUEEN', 'l-w', '#gk_hall #gk_princess Ratu es', 0, 0, 350000, 0),
(101, 'PRINCESS ANNA', 'm-a', '#gk_princess kostum princess Anna Frozen', 0, 0, 250000, 0),
(102, 'PRINCESS AURORA', 'l-a', '#gk_princess', 0, 0, 30000, 0),
(103, 'KARAKTER FAIRY HIJAU', 'l-w', '#gk_karakter kostum peri hijau dewasa', 0, 0, 300000, 0),
(104, 'INTERNATIONAL ALADIN ANAK', 'l-a', '#gk_karakter kostum aladin anabisa dipakai untuk kostum arab #gk_inter', 0, 0, 250000, 0),
(107, 'PROFESI ZOO DEWASA', 'm-w', '#gk_prof kostum penjaga kebun binatang dewasa', 0, 0, 150000, 0),
(108, 'Adat Bali Anak', 'm-a', '#gk_adat kostum adat Bali untuk anak', 0, 0, 250000, 0),
(109, 'ADAT JAWA TENGAH', 'semua ukuran', '#gk_adat kostum baju adat daerah Jawa Tengah', 0, 0, 250000, 0),
(110, 'HERO CAT WOMAN DEWASA', 'm-w', '#gk_hero kostum super hero cat woman untuk dewasa', 0, 0, 350000, 0),
(111, 'INTERNATIONAL CLEOPATRA HITAM SELENDANG BIRU PENDEK', 'l-w', '#gk_inter kostum karakter Ratu Cleopatra Hitam Selendang Biru Pendek dewasa cantik.', 0, 0, 350000, 0),
(112, 'INDIAN POCAHONTAS', 'l-w', '#gk_inter kostum  indian karakter pocahontas dewasa', 0, 0, 250000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `costume_category`
--

CREATE TABLE `costume_category` (
  `id_costume_category` int NOT NULL,
  `id_costume` int DEFAULT NULL,
  `id_category` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `costume_category`
--

INSERT INTO `costume_category` (`id_costume_category`, `id_costume`, `id_category`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 6),
(17, 16, 2),
(18, 17, 6),
(19, 17, 2),
(20, 18, 6),
(21, 18, 2),
(22, 19, 6),
(23, 19, 2),
(24, 20, 7),
(25, 21, 7),
(26, 22, 7),
(27, 23, 7),
(28, 24, 7),
(29, 25, 10),
(30, 25, 3),
(31, 26, 10),
(32, 26, 3),
(33, 27, 10),
(34, 28, 10),
(35, 29, 10),
(36, 29, 3),
(37, 30, 12),
(38, 31, 12),
(39, 32, 12),
(40, 33, 12),
(41, 34, 12),
(42, 35, 5),
(43, 36, 5),
(44, 37, 5),
(45, 38, 5),
(46, 39, 5),
(47, 40, 14),
(48, 41, 14),
(49, 42, 14),
(50, 43, 14),
(51, 44, 14),
(52, 45, 11),
(53, 46, 11),
(54, 47, 11),
(55, 48, 11),
(56, 49, 11),
(57, 50, 9),
(58, 51, 9),
(59, 52, 9),
(60, 53, 9),
(61, 54, 9),
(62, 55, 4),
(63, 56, 4),
(64, 56, 3),
(65, 57, 4),
(66, 57, 3),
(67, 58, 4),
(68, 58, 3),
(69, 59, 4),
(70, 59, 3),
(71, 60, 13),
(72, 61, 13),
(73, 61, 4),
(74, 62, 13),
(75, 62, 11),
(76, 63, 13),
(77, 63, 4),
(78, 64, 13),
(79, 64, 10),
(80, 65, 15),
(81, 66, 15),
(82, 67, 15),
(83, 68, 15),
(84, 69, 15),
(85, 70, 20),
(86, 70, 3),
(87, 71, 20),
(88, 71, 3),
(89, 72, 20),
(90, 73, 20),
(91, 74, 20),
(93, 76, 18),
(94, 77, 18),
(95, 78, 19),
(96, 78, 3),
(97, 78, 4),
(98, 79, 19),
(99, 79, 3),
(100, 79, 4),
(101, 80, 19),
(102, 80, 3),
(103, 80, 4),
(104, 81, 19),
(105, 81, 4),
(106, 83, 4),
(107, 83, 11),
(108, 83, 16),
(109, 84, 11),
(110, 84, 16),
(111, 85, 16),
(112, 85, 11),
(113, 85, 4),
(114, 86, 11),
(115, 86, 10),
(116, 86, 16),
(117, 87, 17),
(118, 88, 17),
(129, 99, 10),
(130, 99, 2),
(131, 100, 10),
(132, 100, 2),
(133, 101, 2),
(134, 102, 2),
(135, 75, 18),
(136, 103, 4),
(137, 104, 3),
(138, 104, 4),
(139, 107, 5),
(140, 108, 14),
(141, 109, 14),
(142, 110, 11),
(144, 111, 3),
(145, 112, 3);

-- --------------------------------------------------------

--
-- Table structure for table `costume_color`
--

CREATE TABLE `costume_color` (
  `id_costume_color` int NOT NULL,
  `id_costume` int NOT NULL,
  `id_color` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `costume_color`
--

INSERT INTO `costume_color` (`id_costume_color`, `id_costume`, `id_color`) VALUES
(1, 71, 1),
(2, 71, 9),
(3, 108, 3),
(4, 108, 1),
(5, 109, 8),
(6, 43, 4),
(7, 42, 9),
(8, 41, 8),
(9, 40, 3),
(10, 19, 5),
(11, 18, 3),
(12, 17, 7),
(13, 16, 10),
(14, 34, 2),
(15, 33, 8),
(16, 32, 4),
(17, 31, 10),
(18, 31, 5),
(19, 31, 7),
(20, 30, 10),
(21, 30, 9),
(22, 69, 9),
(23, 68, 9),
(24, 68, 1),
(25, 67, 8),
(26, 66, 10),
(27, 66, 8),
(28, 66, 5),
(29, 65, 5),
(30, 23, 5),
(31, 23, 5),
(32, 24, 5),
(33, 22, 3),
(34, 20, 10),
(35, 21, 11),
(36, 86, 9),
(37, 75, 3),
(38, 100, 5),
(39, 99, 1),
(40, 99, 9),
(41, 29, 9),
(42, 28, 9),
(43, 27, 9),
(44, 26, 4),
(45, 25, 9),
(46, 110, 9),
(47, 49, 1),
(48, 49, 5),
(49, 48, 1),
(50, 48, 5),
(51, 47, 1),
(52, 47, 5),
(53, 46, 5),
(54, 46, 1),
(55, 45, 9),
(56, 112, 8),
(57, 104, 5),
(58, 111, 9),
(59, 111, 5),
(60, 15, 5),
(61, 14, 10),
(62, 13, 4),
(63, 12, 9),
(65, 57, 1),
(66, 57, 3),
(67, 59, 10),
(68, 59, 9),
(69, 56, 1),
(70, 56, 10),
(71, 56, 3),
(72, 55, 10),
(73, 55, 1),
(74, 58, 8),
(75, 58, 1),
(76, 103, 4),
(77, 80, 9),
(78, 78, 9),
(79, 78, 3),
(80, 82, 7),
(81, 81, 10),
(82, 79, 10),
(83, 72, 9),
(84, 53, 1),
(85, 54, 1),
(86, 52, 8),
(87, 51, 10),
(88, 50, 10),
(89, 87, 8),
(90, 88, 8),
(91, 64, 10),
(92, 64, 9),
(93, 63, 5),
(94, 62, 5),
(95, 62, 1),
(96, 61, 2),
(97, 60, 3),
(98, 60, 10),
(99, 73, 10),
(100, 73, 9),
(101, 74, 10),
(102, 74, 9),
(103, 76, 5),
(104, 77, 2),
(105, 101, 9),
(106, 7, 9),
(107, 7, 5),
(108, 7, 10),
(109, 102, 7),
(110, 83, 4),
(111, 10, 4),
(112, 9, 4),
(113, 8, 4),
(114, 70, 1),
(115, 70, 9),
(116, 35, 8),
(117, 39, 10),
(118, 39, 9),
(119, 38, 10),
(120, 38, 9),
(121, 36, 5),
(122, 107, 8),
(123, 4, 4),
(124, 4, 1),
(125, 3, 1),
(126, 5, 4),
(127, 5, 1),
(128, 2, 6),
(129, 1, 1),
(130, 84, 9),
(131, 85, 10);

-- --------------------------------------------------------

--
-- Table structure for table `costume_theme`
--

CREATE TABLE `costume_theme` (
  `id_costume_theme` int NOT NULL,
  `id_costume` int NOT NULL,
  `id_theme` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `costume_theme`
--

INSERT INTO `costume_theme` (`id_costume_theme`, `id_costume`, `id_theme`) VALUES
(1, 1, 32),
(2, 2, 32),
(3, 3, 32),
(4, 4, 32),
(5, 5, 32),
(6, 7, 11),
(7, 8, 11),
(8, 9, 11),
(9, 10, 11),
(12, 12, 2),
(13, 12, 35),
(14, 13, 2),
(15, 13, 35),
(16, 14, 35),
(17, 14, 2),
(18, 15, 2),
(19, 15, 35),
(20, 16, 11),
(21, 17, 11),
(22, 18, 11),
(23, 19, 11),
(24, 20, 49),
(25, 21, 49),
(26, 22, 49),
(27, 23, 49),
(28, 24, 49),
(29, 25, 13),
(30, 26, 13),
(31, 27, 7),
(32, 28, 16),
(33, 29, 16),
(34, 30, 25),
(35, 31, 12),
(36, 31, 25),
(37, 25, 29),
(38, 26, 29),
(39, 27, 29),
(40, 28, 29),
(41, 29, 29),
(42, 32, 28),
(43, 33, 25),
(44, 34, 26),
(45, 35, 51),
(46, 36, 51),
(47, 37, 51),
(48, 38, 51),
(49, 39, 51),
(50, 40, 36),
(51, 41, 36),
(52, 42, 36),
(53, 43, 36),
(54, 44, 36),
(55, 45, 7),
(56, 46, 7),
(57, 47, 7),
(58, 48, 7),
(59, 49, 7),
(60, 50, 30),
(61, 51, 30),
(62, 52, 30),
(63, 53, 30),
(64, 54, 30),
(65, 55, 30),
(66, 56, 14),
(67, 57, 14),
(68, 58, 14),
(69, 59, 14),
(70, 60, 12),
(71, 61, 12),
(72, 62, 7),
(73, 63, 10),
(74, 63, 5),
(75, 64, 29),
(76, 65, 11),
(77, 66, 10),
(78, 67, 11),
(79, 68, 10),
(80, 69, 10),
(81, 70, 52),
(82, 71, 35),
(83, 71, 51),
(84, 72, 11),
(85, 73, 11),
(86, 73, 5),
(87, 74, 5),
(88, 74, 11),
(89, 75, 47),
(90, 76, 47),
(91, 77, 47),
(92, 78, 6),
(93, 79, 6),
(94, 80, 6),
(95, 81, 6),
(96, 82, 6),
(97, 83, 5),
(98, 84, 5),
(99, 85, 5),
(100, 86, 5),
(101, 86, 7),
(102, 87, 3),
(103, 88, 3),
(104, 99, 11),
(105, 99, 5),
(106, 99, 29),
(107, 100, 29),
(108, 100, 11),
(109, 101, 11),
(110, 101, 5),
(111, 102, 11),
(112, 103, 47),
(113, 104, 11),
(114, 107, 51),
(115, 108, 36),
(116, 109, 36),
(117, 110, 7),
(118, 110, 5),
(119, 111, 35),
(120, 112, 11),
(121, 112, 35);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '5eca48ab-82b9-4ae6-b5f5-fe22581a3f83', 'database', 'default', '{\"uuid\":\"5eca48ab-82b9-4ae6-b5f5-fe22581a3f83\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:1;s:11:\\\"sender_name\\\";s:6:\\\"user01\\\";s:11:\\\"reciever_id\\\";s:1:\\\"2\\\";s:7:\\\"content\\\";s:5:\\\"Doing\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-05-26 18:36:51.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"message_id\\\";i:24;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Class \"Redis\" not found in D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php:79\nStack trace:\n#0 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php(34): Illuminate\\Redis\\Connectors\\PhpRedisConnector->createClient(Array)\n#1 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php(38): Illuminate\\Redis\\Connectors\\PhpRedisConnector->Illuminate\\Redis\\Connectors\\{closure}()\n#2 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php(112): Illuminate\\Redis\\Connectors\\PhpRedisConnector->connect(Array, Array)\n#3 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve(\'default\')\n#4 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection(\'default\')\n#5 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast(Array, \'PrivateMessageE...\', Array)\n#6 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle(Object(Illuminate\\Broadcasting\\BroadcastManager))\n#7 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#12 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#13 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#14 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Broadcasting\\BroadcastEvent), false)\n#16 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#17 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#18 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#19 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#20 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#21 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#22 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#23 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#25 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#26 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#27 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#28 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#29 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#30 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#31 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#32 D:\\gkPremium-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#34 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\gkPremium-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 {main}', '2024-05-26 11:36:52'),
(2, 'a9d0d9c7-d683-4c77-a608-a692a58cc04f', 'database', 'default', '{\"uuid\":\"a9d0d9c7-d683-4c77-a608-a692a58cc04f\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:2;s:11:\\\"sender_name\\\";s:6:\\\"user02\\\";s:11:\\\"reciever_id\\\";s:1:\\\"1\\\";s:7:\\\"content\\\";s:5:\\\"Hello\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-05-26 18:49:56.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"message_id\\\";i:25;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Class \"Redis\" not found in D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php:79\nStack trace:\n#0 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php(34): Illuminate\\Redis\\Connectors\\PhpRedisConnector->createClient(Array)\n#1 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php(38): Illuminate\\Redis\\Connectors\\PhpRedisConnector->Illuminate\\Redis\\Connectors\\{closure}()\n#2 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php(112): Illuminate\\Redis\\Connectors\\PhpRedisConnector->connect(Array, Array)\n#3 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve(\'default\')\n#4 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection(\'default\')\n#5 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast(Array, \'PrivateMessageE...\', Array)\n#6 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle(Object(Illuminate\\Broadcasting\\BroadcastManager))\n#7 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#12 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#13 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#14 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Broadcasting\\BroadcastEvent), false)\n#16 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#17 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#18 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#19 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#20 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#21 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#22 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#23 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#25 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#26 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#27 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#28 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#29 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#30 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#31 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#32 D:\\gkPremium-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#34 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\gkPremium-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 {main}', '2024-05-26 11:49:58'),
(3, '92d811c6-00ae-49fb-b1cc-dfbb76084587', 'database', 'default', '{\"uuid\":\"92d811c6-00ae-49fb-b1cc-dfbb76084587\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:1;s:11:\\\"sender_name\\\";s:6:\\\"user01\\\";s:11:\\\"reciever_id\\\";s:1:\\\"2\\\";s:7:\\\"content\\\";s:11:\\\"Hello again\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-05-26 19:12:31.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"message_id\\\";i:26;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Class \"Redis\" not found in D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php:79\nStack trace:\n#0 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php(34): Illuminate\\Redis\\Connectors\\PhpRedisConnector->createClient(Array)\n#1 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php(38): Illuminate\\Redis\\Connectors\\PhpRedisConnector->Illuminate\\Redis\\Connectors\\{closure}()\n#2 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php(112): Illuminate\\Redis\\Connectors\\PhpRedisConnector->connect(Array, Array)\n#3 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve(\'default\')\n#4 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection(\'default\')\n#5 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast(Array, \'PrivateMessageE...\', Array)\n#6 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle(Object(Illuminate\\Broadcasting\\BroadcastManager))\n#7 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#12 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#13 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#14 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Broadcasting\\BroadcastEvent), false)\n#16 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#17 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#18 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#19 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Broadcasting\\BroadcastEvent))\n#20 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#21 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#22 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#23 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#25 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#26 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#27 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#28 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#29 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#30 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#31 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#32 D:\\gkPremium-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#34 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 D:\\gkPremium-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 D:\\gkPremium-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\gkPremium-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 {main}', '2024-05-26 12:12:31'),
(4, 'd57fa4a3-6255-42b5-852f-d6dfbba93012', 'database', 'default', '{\"uuid\":\"d57fa4a3-6255-42b5-852f-d6dfbba93012\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:4;s:11:\\\"sender_name\\\";s:8:\\\"Admin_GK\\\";s:11:\\\"reciever_id\\\";s:1:\\\"2\\\";s:7:\\\"content\\\";s:5:\\\"Test?\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":4:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 19:49:01.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";s:18:\\\"dumpDateProperties\\\";a:2:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 19:49:01.000000\\\";s:8:\\\"timezone\\\";s:83:\\\"O:21:\\\"Carbon\\\\CarbonTimeZone\\\":2:{s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}\\\";}}s:10:\\\"message_id\\\";i:77;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Call to a member function connect() on null in /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php:110\nStack trace:\n#0 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve()\n#1 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/Broadcasters/RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection()\n#2 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast()\n#3 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle()\n#4 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#5 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#6 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#7 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#8 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#9 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#10 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#12 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#13 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#14 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#16 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#17 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#18 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#19 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#20 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#21 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#22 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#23 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#24 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#26 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#27 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#28 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#29 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#30 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#31 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run()\n#32 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand()\n#33 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun()\n#34 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#35 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#36 {main}', '2024-06-21 19:51:19'),
(5, 'cbf3f107-cce8-4227-a413-bd33c1c15ae0', 'database', 'default', '{\"uuid\":\"cbf3f107-cce8-4227-a413-bd33c1c15ae0\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:2;s:11:\\\"sender_name\\\";s:6:\\\"user02\\\";s:11:\\\"reciever_id\\\";s:1:\\\"4\\\";s:7:\\\"content\\\";s:9:\\\"Still no?\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":4:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 19:50:47.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";s:18:\\\"dumpDateProperties\\\";a:2:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 19:50:47.000000\\\";s:8:\\\"timezone\\\";s:83:\\\"O:21:\\\"Carbon\\\\CarbonTimeZone\\\":2:{s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}\\\";}}s:10:\\\"message_id\\\";i:78;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Call to a member function connect() on null in /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php:110\nStack trace:\n#0 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve()\n#1 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/Broadcasters/RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection()\n#2 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast()\n#3 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle()\n#4 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#5 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#6 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#7 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#8 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#9 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#10 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#12 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#13 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#14 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#16 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#17 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#18 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#19 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#20 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#21 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#22 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#23 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#24 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#26 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#27 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#28 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#29 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#30 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#31 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run()\n#32 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand()\n#33 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun()\n#34 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#35 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#36 {main}', '2024-06-21 19:51:19');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(6, '54b52d07-11b6-4786-b1ed-3459fd14d5d2', 'database', 'default', '{\"uuid\":\"54b52d07-11b6-4786-b1ed-3459fd14d5d2\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:4;s:11:\\\"sender_name\\\";s:8:\\\"Admin_GK\\\";s:11:\\\"reciever_id\\\";s:1:\\\"2\\\";s:7:\\\"content\\\";s:10:\\\"I\'m trying\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":4:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:06:04.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";s:18:\\\"dumpDateProperties\\\";a:2:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:06:04.000000\\\";s:8:\\\"timezone\\\";s:83:\\\"O:21:\\\"Carbon\\\\CarbonTimeZone\\\":2:{s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}\\\";}}s:10:\\\"message_id\\\";i:79;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Call to a member function connect() on null in /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php:110\nStack trace:\n#0 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve()\n#1 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/Broadcasters/RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection()\n#2 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast()\n#3 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle()\n#4 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#5 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#6 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#7 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#8 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#9 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#10 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#12 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#13 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#14 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#16 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#17 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#18 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#19 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#20 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#21 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#22 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#23 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#24 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#26 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#27 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#28 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#29 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#30 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#31 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run()\n#32 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand()\n#33 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun()\n#34 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#35 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#36 {main}', '2024-06-21 20:06:05'),
(7, '315b6c70-62cd-4ed9-a424-aa71dabdfc37', 'database', 'default', '{\"uuid\":\"315b6c70-62cd-4ed9-a424-aa71dabdfc37\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:2;s:11:\\\"sender_name\\\";s:6:\\\"user02\\\";s:11:\\\"reciever_id\\\";s:1:\\\"4\\\";s:7:\\\"content\\\";s:8:\\\"Hmm okay\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":4:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:08:51.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";s:18:\\\"dumpDateProperties\\\";a:2:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:08:51.000000\\\";s:8:\\\"timezone\\\";s:83:\\\"O:21:\\\"Carbon\\\\CarbonTimeZone\\\":2:{s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}\\\";}}s:10:\\\"message_id\\\";i:80;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Class \"Redis\" not found in /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/Connectors/PhpRedisConnector.php:79\nStack trace:\n#0 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/Connectors/PhpRedisConnector.php(34): Illuminate\\Redis\\Connectors\\PhpRedisConnector->createClient()\n#1 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/Connectors/PhpRedisConnector.php(38): Illuminate\\Redis\\Connectors\\PhpRedisConnector->Illuminate\\Redis\\Connectors\\{closure}()\n#2 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(112): Illuminate\\Redis\\Connectors\\PhpRedisConnector->connect()\n#3 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve()\n#4 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/Broadcasters/RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection()\n#5 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast()\n#6 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle()\n#7 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#9 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#10 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#11 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#12 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#13 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#14 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#15 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#16 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#17 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#18 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#19 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#20 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#21 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#22 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#23 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#24 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#25 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#26 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#27 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#28 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#29 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#30 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#31 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#32 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#33 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#34 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run()\n#35 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand()\n#36 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun()\n#37 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#38 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#39 {main}', '2024-06-21 20:08:52'),
(8, 'a2a78fc6-83d7-4ab6-a5e8-5fa989a9028d', 'database', 'default', '{\"uuid\":\"a2a78fc6-83d7-4ab6-a5e8-5fa989a9028d\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:4;s:11:\\\"sender_name\\\";s:8:\\\"Admin_GK\\\";s:11:\\\"reciever_id\\\";s:1:\\\"2\\\";s:7:\\\"content\\\";s:20:\\\"Let\'s continue later\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":4:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:10:39.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";s:18:\\\"dumpDateProperties\\\";a:2:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:10:39.000000\\\";s:8:\\\"timezone\\\";s:83:\\\"O:21:\\\"Carbon\\\\CarbonTimeZone\\\":2:{s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}\\\";}}s:10:\\\"message_id\\\";i:81;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Call to a member function connect() on null in /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php:110\nStack trace:\n#0 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve()\n#1 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/Broadcasters/RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection()\n#2 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast()\n#3 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle()\n#4 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#5 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#6 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#7 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#8 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#9 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#10 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#12 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#13 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#14 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#16 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#17 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#18 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#19 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#20 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#21 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#22 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#23 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#24 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#26 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#27 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#28 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#29 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#30 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#31 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run()\n#32 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand()\n#33 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun()\n#34 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#35 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#36 {main}', '2024-06-21 20:10:41'),
(9, '96a2028d-3cc9-467b-87bd-25deaec9077f', 'database', 'default', '{\"uuid\":\"96a2028d-3cc9-467b-87bd-25deaec9077f\",\"displayName\":\"App\\\\Events\\\\PrivateMessageEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:30:\\\"App\\\\Events\\\\PrivateMessageEvent\\\":1:{s:4:\\\"data\\\";a:6:{s:9:\\\"sender_id\\\";i:2;s:11:\\\"sender_name\\\";s:6:\\\"user02\\\";s:11:\\\"reciever_id\\\";s:1:\\\"4\\\";s:7:\\\"content\\\";s:4:\\\"Okay\\\";s:10:\\\"created_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":4:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:12:03.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";s:18:\\\"dumpDateProperties\\\";a:2:{s:4:\\\"date\\\";s:26:\\\"2024-06-21 20:12:03.000000\\\";s:8:\\\"timezone\\\";s:83:\\\"O:21:\\\"Carbon\\\\CarbonTimeZone\\\":2:{s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}\\\";}}s:10:\\\"message_id\\\";i:82;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Error: Call to a member function connect() on null in /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php:110\nStack trace:\n#0 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Redis/RedisManager.php(91): Illuminate\\Redis\\RedisManager->resolve()\n#1 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/Broadcasters/RedisBroadcaster.php(120): Illuminate\\Redis\\RedisManager->connection()\n#2 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Broadcasting/BroadcastEvent.php(93): Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster->broadcast()\n#3 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Broadcasting\\BroadcastEvent->handle()\n#4 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#5 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#6 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#7 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#8 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#9 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#10 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#12 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#13 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#14 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then()\n#16 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#17 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#18 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#19 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process()\n#20 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob()\n#21 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon()\n#22 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#23 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#24 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#26 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#27 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call()\n#28 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#29 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute()\n#30 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Console/Command.php(181): Symfony\\Component\\Console\\Command\\Command->run()\n#31 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run()\n#32 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand()\n#33 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun()\n#34 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run()\n#35 /var/www/gkpremiumsby_usr/data/www/gkpremiumsby.my.id/gkPremiumApp/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#36 {main}', '2024-06-21 20:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int NOT NULL,
  `id_costume` int DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `id_costume`, `imageUrl`) VALUES
(1, 1, 'https://gudangkostum.com/wp-content/uploads/2020/08/SAYURBUAH-TOMAT.jpg'),
(2, 2, 'https://gudangkostum.com/wp-content/uploads/2020/08/SAYURBUAH-TERONG.jpg'),
(3, 3, 'https://gudangkostum.com/wp-content/uploads/2020/08/SAYURBUAH-STROBERI.jpg'),
(7, 7, 'https://gudangkostum.com/wp-content/uploads/2020/08/PRINCESS-URSULA-ARIEL-ANAK.jpg'),
(8, 8, 'https://gudangkostum.com/wp-content/uploads/2020/08/PRINCESS-TINKERBELL-DEWASA.jpg'),
(9, 9, 'https://gudangkostum.com/wp-content/uploads/2020/08/PRINCESS-TINKERBELL-ANAK.jpg'),
(10, 10, 'https://gudangkostum.com/wp-content/uploads/2020/08/PRINCESS-TATIANA-ANAK.jpg'),
(12, 12, 'https://gudangkostum.com/wp-content/uploads/2020/08/INTER-VICTORIA-HITAM-WANITA.jpg'),
(13, 13, 'https://gudangkostum.com/wp-content/uploads/2020/08/INTER-VICTORIA-HIJAU-DEWASA.jpg'),
(14, 14, 'https://gudangkostum.com/wp-content/uploads/2020/08/INTER-VICTORIA-CREAM-DEWASA.jpg'),
(15, 15, 'https://gudangkostum.com/wp-content/uploads/2020/08/INTER-VICTORIA-BIRU-WANITA.jpg'),
(16, 16, 'https://gudangkostum.com/wp-content/uploads/2020/08/AKSESORIS-PRINCESS-PUTIH.jpg'),
(17, 17, 'https://gudangkostum.com/wp-content/uploads/2020/08/AKSESORIS-PRINCESS-PINK.jpg'),
(18, 18, 'https://gudangkostum.com/wp-content/uploads/2020/08/AKSESORIS-PRINCESS-KUNING.jpg'),
(19, 19, 'https://gudangkostum.com/wp-content/uploads/2020/08/AKSESORIS-PRINCESS-BIRU.jpg'),
(20, 20, 'https://gudangkostum.com/wp-content/uploads/2020/08/JP06.jpg'),
(21, 21, 'https://gudangkostum.com/wp-content/uploads/2020/08/GP73.jpg'),
(22, 22, 'https://gudangkostum.com/wp-content/uploads/2020/08/GP67.jpg'),
(23, 23, 'https://gudangkostum.com/wp-content/uploads/2020/08/GP63.jpg'),
(24, 24, 'https://gudangkostum.com/wp-content/uploads/2020/08/GP57.jpg'),
(25, 25, 'https://gudangkostum.com/wp-content/uploads/2020/05/HALL-WIZARD-ANAK.jpg'),
(26, 26, 'https://gudangkostum.com/wp-content/uploads/2020/05/HALL-WITCH-HIJAU-DEWASA.jpg'),
(27, 27, 'https://gudangkostum.com/wp-content/uploads/2020/05/HALL-VILLAIN-ANAK.jpg'),
(28, 28, 'https://gudangkostum.com/wp-content/uploads/2020/05/HALL-VAMPIRE-WANITA.jpg'),
(29, 29, 'https://gudangkostum.com/wp-content/uploads/2020/05/HALL-VAMPIRE-DEWASA.jpg'),
(30, 30, 'https://gudangkostum.com/wp-content/uploads/2020/05/ANIMAL-ZEBRA-2-ANAK.jpg'),
(31, 31, 'https://gudangkostum.com/wp-content/uploads/2020/05/ANIMAL-UNICORN-ONESIE-ANAK.jpg'),
(32, 32, 'https://gudangkostum.com/wp-content/uploads/2020/05/ANIMAL-ULAT-ANAK.jpg'),
(33, 33, 'https://gudangkostum.com/wp-content/uploads/2020/05/ANIMAL-ULAR-2-ANAK.jpg'),
(34, 34, 'https://gudangkostum.com/wp-content/uploads/2020/05/ANIMAL-UDANG-ANAK.jpg'),
(35, 35, 'https://gudangkostum.com/wp-content/uploads/2020/05/PROFESI-ARSITEK-ANAK.jpg'),
(36, 36, 'https://gudangkostum.com/wp-content/uploads/2020/05/PROFESI-POLISI-BLINK-ANAK.jpg'),
(37, 37, 'https://gudangkostum.com/wp-content/uploads/2020/05/PROFESI-POLISI-ANAK.jpg'),
(38, 38, 'https://gudangkostum.com/wp-content/uploads/2020/05/PROFESI-PILOT-DEWASA.jpg'),
(39, 39, 'https://gudangkostum.com/wp-content/uploads/2020/05/PROFESI-PILOT-ANAK.jpg'),
(40, 40, 'https://gudangkostum.com/wp-content/uploads/2020/05/ADAT-RIAU-ANAK.jpg'),
(41, 41, 'https://gudangkostum.com/wp-content/uploads/2020/05/ADAT-PAPUA-DEWASA.jpg'),
(42, 42, 'https://gudangkostum.com/wp-content/uploads/2020/05/ADAT-PAPUA-ANAK1.jpg'),
(43, 43, 'https://gudangkostum.com/wp-content/uploads/2020/05/ADAT-PADANG-HIJAU-ANAK.jpg'),
(44, 44, 'https://gudangkostum.com/wp-content/uploads/2020/05/ADAT-PADANG-ANAK.jpg'),
(45, 45, 'https://gudangkostum.com/wp-content/uploads/2019/06/HERO-ZORRO.jpg'),
(46, 46, 'https://gudangkostum.com/wp-content/uploads/2019/06/HERO-WONDER-WOMEN-BABY.jpg'),
(47, 47, 'https://gudangkostum.com/wp-content/uploads/2019/06/HERO-WONDER-WOMEN-ANAK-A.jpg'),
(48, 48, 'https://gudangkostum.com/wp-content/uploads/2019/06/HERO-WONDER-WOMEN-A.jpg'),
(49, 49, 'https://gudangkostum.com/wp-content/uploads/2019/06/HERO-WONDER-WOMAN-PREMIUM.jpg'),
(50, 50, 'https://gudangkostum.com/wp-content/uploads/2020/05/NATAL-SNOWMAN-ANAK.jpg'),
(51, 51, 'https://gudangkostum.com/wp-content/uploads/2020/05/NATAL-SNOWMAN-2-ANAK.jpg'),
(52, 52, 'https://gudangkostum.com/wp-content/uploads/2020/05/NATAL-SANTA-RUDOLF-DEWASA.jpg'),
(53, 53, 'https://gudangkostum.com/wp-content/uploads/2020/05/NATAL-SANTA-PREM-DEWASA.jpg'),
(54, 54, 'https://gudangkostum.com/wp-content/uploads/2020/05/NATAL-SANTA-PREM-DEWASA-COWOK.jpg'),
(55, 55, 'https://gudangkostum.com/wp-content/uploads/2019/03/BL-anak-cowok-putih-rompi-merah.jpg'),
(56, 56, 'https://gudangkostum.com/wp-content/uploads/2019/03/BL-anak-cowok-putih-merah-kuning-vers-1.jpg'),
(57, 57, 'https://gudangkostum.com/wp-content/uploads/2019/03/BL-anak-cowok-princemerah-gold.jpg'),
(58, 58, 'https://gudangkostum.com/wp-content/uploads/2019/03/BL-wanita-retro-coklat-maron.jpg'),
(59, 59, 'https://gudangkostum.com/wp-content/uploads/2019/03/BL-wanita-putih-hitam.jpg'),
(60, 60, 'https://gudangkostum.com/wp-content/uploads/2019/03/Onesie-Unicorn-wing-kuning.jpg'),
(61, 61, 'https://gudangkostum.com/wp-content/uploads/2019/03/Onesie-Tiger-1.jpg'),
(62, 62, 'https://gudangkostum.com/wp-content/uploads/2019/03/Onesie-Superman-1.jpg'),
(64, 64, 'https://gudangkostum.com/wp-content/uploads/2019/03/Onesie-Skeleton.jpg'),
(65, 65, 'https://gudangkostum.com/wp-content/uploads/2019/03/IMG_20171112_063339_339.jpg'),
(66, 66, 'https://gudangkostum.com/wp-content/uploads/2019/03/Ap-Sheriff-Callie-kucing.jpg'),
(67, 67, 'https://gudangkostum.com/wp-content/uploads/2019/03/Ap-pocahontas-1.jpg'),
(68, 68, 'https://gudangkostum.com/wp-content/uploads/2019/03/Ap-minnie-anak.jpg'),
(69, 69, 'https://gudangkostum.com/wp-content/uploads/2019/03/Ap-Mickey-anak-dan-dewasa.jpg'),
(82, 82, '-'),
(94, NULL, NULL),
(95, NULL, NULL),
(96, NULL, NULL),
(97, 102, 'https://i.ibb.co/fxmVswj/03990605605c.jpg'),
(98, 75, 'https://i.ibb.co/wQF3qdR/d5704ab72f29.jpg'),
(99, 75, 'https://i.ibb.co/jVZMkwj/bd16302330f2.jpg'),
(100, 75, 'https://i.ibb.co/61cP7wt/c00c7a512932.jpg'),
(101, 103, 'https://i.ibb.co/FnKGmrL/3219bf62076a.jpg'),
(102, 104, 'https://i.ibb.co/3CvYdZG/4901756bacae.jpg'),
(103, 107, 'https://i.ibb.co/fxFtKqC/2f6d2f687914.jpg'),
(104, 108, 'https://i.ibb.co/CmV4rCf/d80b2fe3354c.jpg'),
(105, 109, 'https://i.ibb.co/VD9mVJf/d37b410d8966.jpg'),
(106, 110, 'https://i.ibb.co/qMpbgwn/e064dce55686.jpg'),
(107, 4, 'https://i.ibb.co/C7MzQx1/c7f8f9619803.jpg'),
(108, 5, 'https://i.ibb.co/BycY85p/ddc679870ecd.jpg'),
(109, 70, 'https://i.ibb.co/rGNvr9F/21701b064d9d.jpg'),
(110, 70, 'https://i.ibb.co/fGzd8fm/cedcaa3637e6.jpg'),
(111, 63, 'https://i.ibb.co/cxBBQjP/1aaf4a3e8ee3.jpg'),
(112, 71, 'https://i.ibb.co/JqV75B3/496877529fa0.jpg'),
(113, 74, 'https://i.ibb.co/LDwM9PY/a53dcffccabf.jpg'),
(114, 73, 'https://i.ibb.co/Hdy67kX/f13d7f3151c0.jpg'),
(115, 73, 'https://i.ibb.co/vZGzWXV/caef25fc662d.jpg'),
(116, 76, 'https://i.ibb.co/khz5br4/19406d61c556.jpg'),
(117, 77, 'https://i.ibb.co/NNySVdb/aec0b0b9929c.jpg'),
(118, 77, 'https://i.ibb.co/wpJFYWV/953e837b0319.jpg'),
(119, 77, 'https://i.ibb.co/gyrfysw/0decaf2db4e2.jpg'),
(120, 72, 'https://i.ibb.co/dmQtKmf/86a2bf0f52d2.jpg'),
(121, 78, 'https://i.ibb.co/v421k5m/ebe9b2348458.jpg'),
(122, 78, 'https://i.ibb.co/0MRHpCt/a99a5abfb507.jpg'),
(123, 79, 'https://i.ibb.co/1MkWmY4/16b8617dcd42.jpg'),
(124, 79, 'https://i.ibb.co/129JttS/8665512fe381.jpg'),
(125, 79, 'https://i.ibb.co/FHWBFWS/6855440f820a.jpg'),
(126, 80, 'https://i.ibb.co/X7bxZ8N/e78681dd5978.jpg'),
(127, 80, 'https://i.ibb.co/k0SCmb5/c1fd16d4ee3c.jpg'),
(128, 81, 'https://i.ibb.co/vh6pKDX/191b77b94dbe.jpg'),
(129, 81, 'https://i.ibb.co/0jwwt7S/25f8470c39ec.jpg'),
(130, 83, 'https://i.ibb.co/tH3KdCN/1836f9ea167a.jpg'),
(131, 84, 'https://i.ibb.co/tmpfbX7/e3f4ffb28fad.jpg'),
(132, 85, 'https://i.ibb.co/kHZP6PD/54cd1583a359.jpg'),
(133, 86, 'https://i.ibb.co/yFBM0Tm/8e7b7b3a6cf1.jpg'),
(134, 86, 'https://i.ibb.co/VjfBxH4/135d1b2df458.jpg'),
(135, 87, 'https://i.ibb.co/JRsXqvB/ff55908b623d.jpg'),
(136, 88, 'https://i.ibb.co/gWXVtR5/f776a62275f0.jpg'),
(137, 111, 'https://i.ibb.co/qWQF9sV/95027c750b37.jpg'),
(138, 112, 'https://i.ibb.co/Vx7ptFS/a86b5119a8a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '1' COMMENT '1:message, 2:file',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `parent_id`, `message`, `type`, `status`, `created_at`, `updated_at`) VALUES
(14, NULL, 'Trying', 1, 1, '2024-05-26 09:34:17', '2024-05-26 09:34:17'),
(15, NULL, 'Hello again', 1, 1, '2024-05-26 10:12:15', '2024-05-26 10:12:15'),
(16, NULL, 'Testing again', 1, 1, '2024-05-26 10:27:06', '2024-05-26 10:27:06'),
(17, NULL, 'Trying again', 1, 1, '2024-05-26 10:28:03', '2024-05-26 10:28:03'),
(18, NULL, 'Touch', 1, 1, '2024-05-26 10:29:52', '2024-05-26 10:29:52'),
(19, NULL, 'Let u down', 1, 1, '2024-05-26 10:42:56', '2024-05-26 10:42:56'),
(20, NULL, 'Trial', 1, 1, '2024-05-26 10:43:06', '2024-05-26 10:43:06'),
(21, NULL, 'Drumming', 1, 1, '2024-05-26 10:45:04', '2024-05-26 10:45:04'),
(22, NULL, 'Where?', 1, 1, '2024-05-26 10:50:10', '2024-05-26 10:50:10'),
(24, NULL, 'Doing', 1, 1, '2024-05-26 11:36:51', '2024-05-26 11:36:51'),
(25, NULL, 'Hello', 1, 1, '2024-05-26 11:49:56', '2024-05-26 11:49:56'),
(26, NULL, 'Hello again', 1, 1, '2024-05-26 12:12:31', '2024-05-26 12:12:31'),
(27, NULL, 'Try everything', 1, 1, '2024-05-26 12:47:56', '2024-05-26 12:47:56'),
(28, NULL, 'Good morning', 1, 1, '2024-05-26 13:01:03', '2024-05-26 13:01:03'),
(29, NULL, 'Hello', 1, 1, '2024-05-26 13:07:24', '2024-05-26 13:07:24'),
(30, NULL, 'Hello', 1, 1, '2024-05-26 13:10:41', '2024-05-26 13:10:41'),
(31, NULL, 'hello', 1, 1, '2024-05-26 19:43:04', '2024-05-26 19:43:04'),
(32, NULL, 'test lagi', 1, 1, '2024-05-26 19:45:23', '2024-05-26 19:45:23'),
(33, NULL, 'test 123', 1, 1, '2024-05-26 19:53:09', '2024-05-26 19:53:09'),
(34, NULL, 'halo', 1, 1, '2024-05-26 19:53:50', '2024-05-26 19:53:50'),
(35, NULL, 'Testing', 1, 1, '2024-05-26 23:33:44', '2024-05-26 23:33:44'),
(36, NULL, 'Hello!', 1, 1, '2024-05-26 23:43:18', '2024-05-26 23:43:18'),
(37, NULL, 'Hello to you too', 1, 1, '2024-05-26 23:44:41', '2024-05-26 23:44:41'),
(39, NULL, 'danger', 1, 1, '2024-05-27 03:43:06', '2024-05-27 03:43:06'),
(40, NULL, 'Change', 1, 1, '2024-05-27 03:44:58', '2024-05-27 03:44:58'),
(41, NULL, 'Hello', 1, 1, '2024-05-27 03:45:15', '2024-05-27 03:45:15'),
(42, NULL, 'Hello user 2', 1, 1, '2024-05-27 03:51:40', '2024-05-27 03:51:40'),
(43, NULL, 'Hello user 1', 1, 1, '2024-05-27 03:51:48', '2024-05-27 03:51:48'),
(44, NULL, 'Hi', 1, 1, '2024-05-27 03:52:40', '2024-05-27 03:52:40'),
(45, NULL, 'How are you?', 1, 1, '2024-05-27 03:53:09', '2024-05-27 03:53:09'),
(46, NULL, 'I\'m good', 1, 1, '2024-05-27 03:55:28', '2024-05-27 03:55:28'),
(47, NULL, 'can the other see this?', 1, 1, '2024-05-27 03:56:41', '2024-05-27 03:56:41'),
(48, NULL, 'user 3 are u there?', 1, 1, '2024-05-27 03:59:32', '2024-05-27 03:59:32'),
(49, NULL, 'Testing 123', 1, 1, '2024-05-27 08:51:01', '2024-05-27 08:51:01'),
(50, NULL, 'Hello', 1, 1, '2024-05-29 07:10:04', '2024-05-29 07:10:04'),
(51, NULL, 'Venom', 1, 1, '2024-05-29 07:11:11', '2024-05-29 07:11:11'),
(52, NULL, 'Thank you', 1, 1, '2024-05-29 07:12:55', '2024-05-29 07:12:55'),
(53, NULL, 'Ho are you?', 1, 1, '2024-05-29 09:00:33', '2024-05-29 09:00:33'),
(54, NULL, 'Hello to u too', 1, 1, '2024-05-29 09:00:54', '2024-05-29 09:00:54'),
(55, NULL, 'Hallo', 1, 1, '2024-05-29 09:37:51', '2024-05-29 09:37:51'),
(59, NULL, 'Testing', 1, 1, '2024-06-02 06:24:04', '2024-06-02 06:24:04'),
(60, NULL, 'Hello', 1, 1, '2024-06-02 06:25:02', '2024-06-02 06:25:02'),
(63, NULL, 'Good luck', 1, 1, '2024-06-02 14:01:30', '2024-06-02 14:01:30'),
(64, NULL, 'hello', 1, 1, '2024-06-02 16:12:17', '2024-06-02 16:12:17'),
(65, NULL, 'Hello', 1, 1, '2024-06-21 16:28:50', '2024-06-21 16:28:50'),
(66, NULL, 'Cek', 1, 1, '2024-06-21 16:35:23', '2024-06-21 16:35:23'),
(67, NULL, 'Good evening', 1, 1, '2024-06-21 16:55:19', '2024-06-21 16:55:19'),
(68, NULL, 'Good morning', 1, 1, '2024-06-21 17:34:47', '2024-06-21 17:34:47'),
(69, NULL, 'Here', 1, 1, '2024-06-21 17:49:11', '2024-06-21 17:49:11'),
(70, NULL, 'Here too', 1, 1, '2024-06-21 17:49:34', '2024-06-21 17:49:34'),
(71, NULL, 'Good day', 1, 1, '2024-06-21 17:49:57', '2024-06-21 17:49:57'),
(72, NULL, 'Checking again', 1, 1, '2024-06-21 18:06:54', '2024-06-21 18:06:54'),
(73, NULL, 'Hello?', 1, 1, '2024-06-21 19:13:34', '2024-06-21 19:13:34'),
(74, NULL, 'Not working', 1, 1, '2024-06-21 19:14:00', '2024-06-21 19:14:00'),
(75, NULL, 'What should we do?', 1, 1, '2024-06-21 19:44:38', '2024-06-21 19:44:38'),
(76, NULL, 'I don&#039;t know', 1, 1, '2024-06-21 19:44:57', '2024-06-21 19:44:57'),
(77, NULL, 'Test?', 1, 1, '2024-06-21 19:49:01', '2024-06-21 19:49:01'),
(78, NULL, 'Still no?', 1, 1, '2024-06-21 19:50:47', '2024-06-21 19:50:47'),
(79, NULL, 'I&#039;m trying', 1, 1, '2024-06-21 20:06:04', '2024-06-21 20:06:04'),
(80, NULL, 'Hmm okay', 1, 1, '2024-06-21 20:08:51', '2024-06-21 20:08:51'),
(81, NULL, 'Let&#039;s continue later', 1, 1, '2024-06-21 20:10:39', '2024-06-21 20:10:39'),
(82, NULL, 'Okay', 1, 1, '2024-06-21 20:12:03', '2024-06-21 20:12:03'),
(83, NULL, 'Good luck', 1, 1, '2024-06-21 20:24:24', '2024-06-21 20:24:24'),
(84, NULL, 'Hello?', 1, 1, '2024-06-22 14:29:15', '2024-06-22 14:29:15'),
(85, NULL, 'Well I tried', 1, 1, '2024-06-22 15:08:38', '2024-06-22 15:08:38'),
(86, NULL, 'Couldn&#039;t make any sense', 1, 1, '2024-06-22 15:19:17', '2024-06-22 15:19:17'),
(87, NULL, 'Are you sure?', 1, 1, '2024-06-22 15:19:42', '2024-06-22 15:19:42'),
(88, NULL, 'Not really', 1, 1, '2024-06-22 15:20:18', '2024-06-22 15:20:18'),
(89, NULL, 'It could be me', 1, 1, '2024-06-22 15:21:08', '2024-06-22 15:21:08'),
(90, NULL, 'No it&#039;s not', 1, 1, '2024-06-22 15:21:41', '2024-06-22 15:21:41'),
(91, NULL, 'Are you sure?', 1, 1, '2024-06-22 15:57:24', '2024-06-22 15:57:24'),
(92, NULL, 'Well maybe', 1, 1, '2024-06-22 16:12:10', '2024-06-22 16:12:10'),
(93, NULL, 'Yup', 1, 1, '2024-06-22 16:16:40', '2024-06-22 16:16:40'),
(94, NULL, 'Let me try', 1, 1, '2024-06-22 16:17:23', '2024-06-22 16:17:23'),
(95, NULL, 'Good luck', 1, 1, '2024-06-22 16:28:27', '2024-06-22 16:28:27'),
(96, NULL, 'Nothing seems paased through', 1, 1, '2024-06-22 16:29:24', '2024-06-22 16:29:24'),
(97, NULL, 'You passed!', 1, 1, '2024-06-22 16:29:53', '2024-06-22 16:29:53'),
(98, NULL, 'What?', 1, 1, '2024-06-22 16:30:26', '2024-06-22 16:30:26'),
(99, NULL, 'But not me tho', 1, 1, '2024-06-22 16:30:36', '2024-06-22 16:30:36'),
(100, NULL, 'Okay?', 1, 1, '2024-06-22 16:32:11', '2024-06-22 16:32:11'),
(101, NULL, 'What should we do?', 1, 1, '2024-06-22 16:32:46', '2024-06-22 16:32:46'),
(102, NULL, 'I don&#039;t know', 1, 1, '2024-06-22 16:33:34', '2024-06-22 16:33:34'),
(103, NULL, 'Sending', 1, 1, '2024-06-22 16:39:10', '2024-06-22 16:39:10'),
(104, NULL, 'Try again?', 1, 1, '2024-06-22 16:39:44', '2024-06-22 16:39:44'),
(105, NULL, 'Okay?', 1, 1, '2024-06-22 16:41:44', '2024-06-22 16:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_24_074758_create_messages_table', 1),
(7, '2024_05_24_074825_create_user_messages_table', 1),
(8, '2024_05_24_184330_create_jobs_table', 1),
(9, '2024_05_27_191212_add_is_admin_to_users_table', 2);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promo` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ended_at` datetime NOT NULL,
  `is_expired` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promo`, `title`, `created_at`, `updated_at`, `ended_at`, `is_expired`) VALUES
(19, 'Example', '2024-05-29 13:54:19', '2024-05-29 13:54:19', '2024-07-04 23:45:55', 1),
(20, 'Kids Background 1', '2024-05-29 14:05:29', '2024-06-04 08:56:43', '2024-07-31 23:46:04', 0),
(21, 'Pre-Wedding Photo', '2024-06-04 08:55:39', '2024-06-04 08:55:39', '2024-07-31 23:46:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promosi_image`
--

CREATE TABLE `promosi_image` (
  `id_promo_img` int NOT NULL,
  `id_promo` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promosi_image`
--

INSERT INTO `promosi_image` (`id_promo_img`, `id_promo`, `image`, `created_at`, `updated_at`) VALUES
(3, 19, 'https://i.ibb.co/hCxvKSP/f39c49b9a6b3.jpg', '2024-05-29 13:54:27', '2024-05-29 13:54:27'),
(8, 20, 'https://i.ibb.co/BKQS5zD/83d0e147cbb6.jpg', '2024-05-30 00:23:41', '2024-05-30 00:23:41'),
(9, 21, 'https://i.ibb.co/qyK72Kg/184c4f90c852.jpg', '2024-06-04 08:55:42', '2024-06-04 08:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `rented`
--

CREATE TABLE `rented` (
  `id_rent` int NOT NULL,
  `id_costume` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ended_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rented`
--

INSERT INTO `rented` (`id_rent`, `id_costume`, `description`, `created_at`, `updated_at`, `ended_at`) VALUES
(1, 9, 'Tongkat sihir, sepatu', '2024-05-28 18:27:40', '2024-05-28 18:27:40', '2024-07-04 23:15:44'),
(3, 2, '-', '2024-05-30 21:31:22', '2024-05-30 21:31:22', '2024-07-04 23:15:52'),
(4, 7, '-', '2024-05-30 21:31:37', '2024-05-30 21:31:37', '2024-07-06 23:15:57'),
(5, 5, '-', '2024-06-04 08:53:14', '2024-06-04 08:53:14', '2024-07-03 23:16:02'),
(6, 16, '-', '2024-06-04 08:53:27', '2024-06-04 08:53:27', '2024-07-04 23:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `id_search` int NOT NULL,
  `search` varchar(255) DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  `id_theme` int DEFAULT NULL,
  `id_color` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`id_search`, `search`, `id_category`, `id_theme`, `id_color`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, '2024-07-03 21:29:49', '2024-07-03 21:29:49'),
(2, NULL, NULL, NULL, NULL, '2024-07-03 21:29:50', '2024-07-03 21:29:50'),
(3, NULL, NULL, NULL, NULL, '2024-07-03 21:29:52', '2024-07-03 21:29:52'),
(4, NULL, NULL, NULL, NULL, '2024-07-03 21:29:55', '2024-07-03 21:29:55'),
(5, NULL, NULL, NULL, NULL, '2024-07-03 21:30:04', '2024-07-03 21:30:04'),
(6, NULL, NULL, 5, NULL, '2024-07-03 21:30:40', '2024-07-03 21:30:40'),
(7, NULL, 12, 5, NULL, '2024-07-03 21:31:07', '2024-07-03 21:31:07'),
(8, 'Hall', 10, NULL, NULL, '2024-07-03 21:34:04', '2024-07-03 21:34:04'),
(9, 'Hall', 13, NULL, NULL, '2024-07-03 21:34:12', '2024-07-03 21:34:12'),
(10, NULL, NULL, NULL, NULL, '2024-07-03 21:35:51', '2024-07-03 21:35:51'),
(11, NULL, NULL, NULL, NULL, '2024-07-03 21:35:57', '2024-07-03 21:35:57'),
(12, NULL, 7, NULL, NULL, '2024-07-03 21:36:00', '2024-07-03 21:36:00'),
(13, 'tomat', NULL, NULL, 4, '2024-07-03 21:38:08', '2024-07-03 21:38:08'),
(14, 'tomat', NULL, NULL, NULL, '2024-07-03 21:38:10', '2024-07-03 21:38:10'),
(15, 'tomat', NULL, 15, NULL, '2024-07-03 21:38:43', '2024-07-03 21:38:43'),
(16, 'princess', 10, NULL, NULL, '2024-07-04 23:48:38', '2024-07-04 23:48:38'),
(17, 'princess', 20, NULL, NULL, '2024-07-04 23:48:43', '2024-07-04 23:48:43'),
(18, 'princess', 14, NULL, NULL, '2024-07-04 23:48:45', '2024-07-04 23:48:45'),
(19, NULL, 11, NULL, NULL, '2024-07-04 23:48:56', '2024-07-04 23:48:56'),
(20, NULL, 2, NULL, NULL, '2024-07-04 23:49:05', '2024-07-04 23:49:05'),
(21, NULL, 2, NULL, NULL, '2024-07-04 23:49:42', '2024-07-04 23:49:42'),
(22, NULL, 2, NULL, NULL, '2024-07-04 23:49:45', '2024-07-04 23:49:45'),
(23, NULL, 2, NULL, NULL, '2024-07-04 23:49:53', '2024-07-04 23:49:53'),
(24, NULL, NULL, NULL, NULL, '2024-07-04 23:50:00', '2024-07-04 23:50:00'),
(25, NULL, NULL, NULL, NULL, '2024-07-04 23:50:09', '2024-07-04 23:50:09'),
(26, NULL, NULL, NULL, NULL, '2024-07-04 23:51:20', '2024-07-04 23:51:20'),
(27, NULL, NULL, 10, NULL, '2024-07-04 23:51:23', '2024-07-04 23:51:23'),
(28, NULL, NULL, 8, NULL, '2024-07-04 23:51:25', '2024-07-04 23:51:25'),
(29, NULL, NULL, 3, NULL, '2024-07-04 23:51:26', '2024-07-04 23:51:26'),
(30, NULL, NULL, 5, NULL, '2024-07-04 23:51:28', '2024-07-04 23:51:28'),
(31, NULL, NULL, NULL, NULL, '2024-07-04 23:52:22', '2024-07-04 23:52:22'),
(32, NULL, NULL, NULL, 7, '2024-07-04 23:52:24', '2024-07-04 23:52:24'),
(33, NULL, NULL, NULL, 3, '2024-07-04 23:52:26', '2024-07-04 23:52:26'),
(34, NULL, NULL, NULL, 1, '2024-07-04 23:52:28', '2024-07-04 23:52:28'),
(35, NULL, NULL, NULL, 2, '2024-07-04 23:52:31', '2024-07-04 23:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `name`, `imageUrl`, `description`) VALUES
(1, 'Tinkerbell dan Peterpan', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20180721_000339_749.jpg', 'testi testimoni anak dewasa keluarga family disney peterpan tinkerbell peri fairy #gk_karakter bagus cantik'),
(2, 'Marvels dan Penyihir', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20180123_184044_507.jpg', 'testi testimoni dewasa hero superhero marvel pirate cewe cewek cowo cowok perempuan wanita pria laki-laki #gk_hero #gk_karakter'),
(3, 'Domba dan Unta', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20180121_161819_629.jpg', 'testimoni testi animal hewan domba unta anak cewe cowo cewek cowok laki-laki perempuan #gk_animal'),
(4, 'Mancanegara', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20180121_161754_157.jpg', 'testi testimoni cewe cewek perempuan wanita cantik international cosplay #gk_inter dewasa'),
(5, 'Prince and Princess', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20171015_202550_029.jpg', 'testi testimoni wanita perempuan cewe cewek cowo cowok princess prince putri pangeran disney #gk_princess #gk_prince'),
(6, 'Aprons', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20170919_142938_354-Copy.jpg', 'testi testimoni apron pria wanita cewe cowo cewek cowok disney #gk_apron'),
(7, 'Aprons Disney', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20170905_111736_394-Copy.jpg', 'testi testimoni perempuan wanita dewasa cewe cewek apron #gk_apron disney'),
(8, 'Marvel Superheros', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20190122_165209_389.jpg', 'testi testimoni hero superhero marvel anak dewasa remaja cewe cewek cowok wanita perempuan pria laki-laki cowo marvel dc wonderwoman wonder woman ww thor antman ant man #gk_hero'),
(9, 'TESTIMONIAL BAJU VICTORIAN', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20190122_073558_130.jpg', 'testi testimoni dewasa wanita perempuan cewek cewe international eropa victoria medieval long dress panjang gaun ball gown besar mewah #gk_inter'),
(10, 'DC Superheroes', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20181215_085750_651.jpg', 'testi testimoni hero superhero pahlawan super marvel dc dewasa wanita pria cewe cowo cewek cowok perempuan laki-laki spiderman flash wonder woman wonderwoman ww superman manofsteel man of steel lengkap sewa kostum gudangkostum #gk_hero'),
(11, 'Jasmin dan Aladin', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20180922_220239_988.jpg', 'putri princess prince pangeran ali aladdin aladin jasmin jasmine hijau couple arabian night 1001 malam cewe cowok cowo cewek perempuan wanita pria laki-laki international arab #gk_inter sexy disney'),
(12, 'Harry Potter dan Kurcaci', 'https://gudangkostum.com/wp-content/uploads/2019/02/IMG_20180922_213434_390.jpg', 'testi dewasa laki-laki cowo cewe cowok cewek harry potter cosplay kurcaci snow white snowwhite biru hitam harpot besar jubah lengkap #gk_hall #gk_karakter perempuan wanita pria testimoni'),
(13, 'KARAKTER HARRY POTTER', 'https://i.ibb.co/FqPg5X0/26cefc81bd17.jpg', 'Testi testimoni harry potter harpot magic kelas kompak jubah #gk_hall hitam grifindor merah'),
(14, 'KOSTUM CHINESE KERAJAAN', 'https://i.ibb.co/Pzk2zSP/902e34b09e22.jpg', '#gk_inter kostum Chinese kerajaan untuk pria dan wanita dewasa.');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_kategori`
--

CREATE TABLE `testimoni_kategori` (
  `id_testimoni_kategori` int NOT NULL,
  `id_testimoni` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimoni_kategori`
--

INSERT INTO `testimoni_kategori` (`id_testimoni_kategori`, `id_testimoni`, `id_kategori`) VALUES
(1, 6, 15),
(2, 6, 2),
(3, 7, 15),
(4, 7, 2),
(5, 10, 11),
(6, 3, 12),
(7, 12, 4),
(8, 11, 2),
(9, 11, 20),
(10, 13, 4),
(11, 4, 3),
(12, 2, 11),
(13, 2, 4),
(14, 8, 11),
(15, 5, 20),
(16, 5, 2),
(17, 9, 3),
(18, 1, 2),
(19, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_tema`
--

CREATE TABLE `testimoni_tema` (
  `id_testimoni_tema` int NOT NULL,
  `id_testimoni` int NOT NULL,
  `id_theme` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimoni_tema`
--

INSERT INTO `testimoni_tema` (`id_testimoni_tema`, `id_testimoni`, `id_theme`) VALUES
(1, 6, 11),
(2, 7, 11),
(3, 10, 7),
(4, 3, 25),
(5, 12, 5),
(6, 12, 47),
(7, 11, 11),
(8, 13, 5),
(9, 4, 2),
(10, 4, 35),
(11, 2, 13),
(12, 2, 7),
(13, 8, 7),
(14, 5, 11),
(15, 9, 2),
(16, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id_theme` int NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id_theme`, `theme`) VALUES
(1, 'Ancient Civilization / Peradaban Kuno'),
(2, 'Medieval / Renaissance / Abad Pertengahan'),
(3, '90\'s'),
(4, 'Wild West'),
(5, 'Film dan Acara TV'),
(6, 'Anime'),
(7, 'Superhero dan Penjahat'),
(8, 'Ikon musik'),
(9, 'Karakter video game'),
(10, 'Karakter kartun'),
(11, 'Karakter Cerita / Dongeng'),
(12, 'Makhluk mitos'),
(13, 'Penyihir'),
(14, 'Bajak Laut'),
(15, 'Putri Duyung'),
(16, 'Vampir dan Manusia Serigala'),
(17, 'Steampunk'),
(18, 'Dokter dan Perawat'),
(19, 'Polisi'),
(20, 'Pemadam Kebakaran'),
(21, 'Militer'),
(22, 'Pelaut'),
(23, 'Ilmuwan'),
(24, 'Pilot dan Pramugari'),
(25, 'Hewan'),
(26, 'Hewan Laut'),
(27, 'Burung'),
(28, 'Serangga'),
(29, 'Halloween'),
(30, 'Karakter natal'),
(31, 'Paskah'),
(32, 'Buah dan Sayuran'),
(33, 'Makanan'),
(34, 'Minuman'),
(35, 'Seluruh Dunia'),
(36, 'Pakaian Tradisional'),
(37, 'Atlet'),
(38, 'Pemandu Sorak dan Maskot'),
(39, 'Petualang dan Penjelajah'),
(40, 'Penari'),
(41, 'Robot dan Cyborg'),
(42, 'Alien'),
(43, 'Hitam dan Putih'),
(44, 'Neon'),
(45, 'Pelangi'),
(46, 'Sirkus'),
(47, 'Fantasi'),
(48, 'Gotik'),
(49, 'Pesta'),
(51, 'Profesi'),
(52, 'Selebriti\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'user01', 'user01@gmail.com', NULL, '$2y$12$b8S6.ocHHDHAFbvn1JwMCur58Xa6BnRU6CLGtW0vKr3pss27NyVnO', NULL, '2024-05-26 03:19:01', '2024-05-26 03:19:01', 0),
(2, 'user02', 'user02@gmail.com', NULL, '$2y$12$a2223ISVUfoRez7qqUKQm.5GszLvOgN9Rh1vUdBG/333MgxwnSpIy', NULL, '2024-05-26 03:20:05', '2024-05-26 03:20:05', 0),
(3, 'user03@gmail.com', 'user03@gmail.com', NULL, '$2y$12$vsmLyQP7yDToceSOorEhxuREsZP3PHJnpzcm.mOc3y7J1o9pNuFPm', NULL, '2024-05-26 03:21:23', '2024-05-26 03:21:23', 0),
(4, 'Admin_GK', 'gudangkostum@gmail.com', NULL, '$2y$10$0oMYDSf1OWhWXYB2Q2R01OyF6rcNH2ZT/cUnyy05Gd6/K2HKE.g3a', NULL, '2024-05-27 19:36:37', '2024-05-27 19:36:44', 1),
(5, 'user04', 'user04@gmail.com', NULL, '$2y$12$qOvP7RaBvGButFjBQo8ta.I7U/AOyzyf6a.fGrvs/gja517aqPhL6', NULL, '2024-05-27 20:42:19', '2024-05-27 20:42:19', 0),
(6, 'test', 'test@gmail.com', NULL, '$2y$12$5kar01KvGLkcpsm69TkytOePSXKv.aKnBnaFxiHpZit4kVykxg0j6', NULL, '2024-06-07 18:40:16', '2024-06-07 18:40:16', 0),
(7, 'Roy', 'hoax@gmaol.com', NULL, '$2y$12$C8Vo7wgVhLcR801Nuond1.hOM7osrf16KdBkRbmkRT0FUx/1d7jCe', NULL, '2024-06-07 21:56:01', '2024-06-07 21:56:01', 0),
(8, 'a', 'a@gmail.com', NULL, '$2y$12$qWW4WuCUbsl0j7YwESOXc.GxP5reTs8AX7pwAiMmmd7aL2L5rtu8a', NULL, '2024-06-08 01:12:45', '2024-06-08 01:12:45', 0),
(9, 'user05', 'user05@gmail.com', NULL, '$2y$12$f0426KR8xgnTVm5mTyBtyOc32CqkRv9G4M5yjBbMtMFLEDXM00zKC', NULL, '2024-06-27 02:11:38', '2024-06-27 02:11:38', 0),
(10, 'Roy', 'b@gmail.com', NULL, '$2y$12$eqcoT0fJsY6YMuzm3iYpJuXaTC8Yf68CyRtglrscMGgezcNWnnmLK', NULL, '2024-07-03 03:24:17', '2024-07-03 03:24:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `message_id` int UNSIGNED NOT NULL,
  `sender_id` int UNSIGNED NOT NULL,
  `reciever_id` int UNSIGNED NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0' COMMENT '1:group message, 0:personal message',
  `seen_status` tinyint NOT NULL DEFAULT '0' COMMENT '1:seen',
  `deliver_status` tinyint NOT NULL DEFAULT '0' COMMENT '1:delivered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `message_id`, `sender_id`, `reciever_id`, `type`, `seen_status`, `deliver_status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 0, 0, 0, '2024-05-26 03:53:43', '2024-05-26 03:53:43'),
(2, 2, 1, 2, 0, 0, 0, '2024-05-26 05:50:43', '2024-05-26 05:50:43'),
(3, 3, 1, 2, 0, 0, 0, '2024-05-26 05:59:44', '2024-05-26 05:59:44'),
(4, 4, 2, 1, 0, 0, 0, '2024-05-26 06:03:48', '2024-05-26 06:03:48'),
(5, 5, 2, 1, 0, 0, 0, '2024-05-26 06:39:20', '2024-05-26 06:39:20'),
(6, 6, 1, 2, 0, 0, 0, '2024-05-26 07:00:08', '2024-05-26 07:00:08'),
(7, 7, 2, 1, 0, 0, 0, '2024-05-26 07:03:43', '2024-05-26 07:03:43'),
(8, 8, 1, 2, 0, 0, 0, '2024-05-26 07:30:19', '2024-05-26 07:30:19'),
(9, 9, 1, 2, 0, 0, 0, '2024-05-26 08:06:57', '2024-05-26 08:06:57'),
(10, 10, 1, 2, 0, 0, 0, '2024-05-26 08:10:45', '2024-05-26 08:10:45'),
(11, 11, 1, 2, 0, 0, 0, '2024-05-26 08:23:03', '2024-05-26 08:23:03'),
(12, 12, 1, 2, 0, 0, 0, '2024-05-26 08:24:34', '2024-05-26 08:24:34'),
(13, 13, 1, 2, 0, 0, 0, '2024-05-26 09:16:29', '2024-05-26 09:16:29'),
(14, 14, 1, 2, 0, 0, 0, '2024-05-26 09:34:17', '2024-05-26 09:34:17'),
(15, 15, 1, 2, 0, 0, 0, '2024-05-26 10:12:15', '2024-05-26 10:12:15'),
(16, 16, 1, 2, 0, 0, 0, '2024-05-26 10:27:06', '2024-05-26 10:27:06'),
(17, 17, 2, 1, 0, 0, 0, '2024-05-26 10:28:03', '2024-05-26 10:28:03'),
(18, 18, 1, 2, 0, 0, 0, '2024-05-26 10:29:52', '2024-05-26 10:29:52'),
(19, 19, 2, 1, 0, 0, 0, '2024-05-26 10:42:56', '2024-05-26 10:42:56'),
(20, 20, 2, 1, 0, 0, 0, '2024-05-26 10:43:06', '2024-05-26 10:43:06'),
(21, 21, 1, 2, 0, 0, 0, '2024-05-26 10:45:04', '2024-05-26 10:45:04'),
(22, 22, 2, 1, 0, 0, 0, '2024-05-26 10:50:10', '2024-05-26 10:50:10'),
(23, 23, 2, 1, 0, 0, 0, '2024-05-26 11:21:41', '2024-05-26 11:21:41'),
(24, 24, 1, 2, 0, 0, 0, '2024-05-26 11:36:51', '2024-05-26 11:36:51'),
(25, 25, 2, 1, 0, 0, 0, '2024-05-26 11:49:56', '2024-05-26 11:49:56'),
(26, 26, 1, 2, 0, 0, 0, '2024-05-26 12:12:31', '2024-05-26 12:12:31'),
(27, 27, 2, 1, 0, 0, 0, '2024-05-26 12:47:56', '2024-05-26 12:47:56'),
(28, 28, 2, 1, 0, 0, 0, '2024-05-26 13:01:03', '2024-05-26 13:01:03'),
(29, 29, 1, 2, 0, 0, 0, '2024-05-26 13:07:24', '2024-05-26 13:07:24'),
(30, 30, 3, 1, 0, 0, 0, '2024-05-26 13:10:41', '2024-05-26 13:10:41'),
(31, 31, 1, 3, 0, 0, 0, '2024-05-26 19:43:05', '2024-05-26 19:43:05'),
(32, 32, 1, 3, 0, 0, 0, '2024-05-26 19:45:23', '2024-05-26 19:45:23'),
(33, 33, 1, 3, 0, 0, 0, '2024-05-26 19:53:09', '2024-05-26 19:53:09'),
(34, 34, 1, 3, 0, 0, 0, '2024-05-26 19:53:50', '2024-05-26 19:53:50'),
(35, 35, 1, 3, 0, 0, 0, '2024-05-26 23:33:44', '2024-05-26 23:33:44'),
(36, 36, 1, 3, 0, 0, 0, '2024-05-26 23:43:18', '2024-05-26 23:43:18'),
(37, 37, 3, 1, 0, 0, 0, '2024-05-26 23:44:41', '2024-05-26 23:44:41'),
(38, 39, 1, 3, 0, 0, 0, '2024-05-27 03:43:06', '2024-05-27 03:43:06'),
(39, 40, 1, 3, 0, 0, 0, '2024-05-27 03:44:58', '2024-05-27 03:44:58'),
(40, 41, 1, 2, 0, 0, 0, '2024-05-27 03:45:15', '2024-05-27 03:45:15'),
(41, 42, 1, 2, 0, 0, 0, '2024-05-27 03:51:40', '2024-05-27 03:51:40'),
(42, 43, 2, 1, 0, 0, 0, '2024-05-27 03:51:48', '2024-05-27 03:51:48'),
(43, 44, 2, 1, 0, 0, 0, '2024-05-27 03:52:40', '2024-05-27 03:52:40'),
(44, 45, 1, 2, 0, 0, 0, '2024-05-27 03:53:09', '2024-05-27 03:53:09'),
(45, 46, 2, 1, 0, 0, 0, '2024-05-27 03:55:28', '2024-05-27 03:55:28'),
(46, 47, 3, 1, 0, 0, 0, '2024-05-27 03:56:41', '2024-05-27 03:56:41'),
(47, 48, 2, 1, 0, 0, 0, '2024-05-27 03:59:32', '2024-05-27 03:59:32'),
(48, 49, 1, 3, 0, 0, 0, '2024-05-27 08:51:01', '2024-05-27 08:51:01'),
(49, 50, 1, 3, 0, 0, 0, '2024-05-29 07:10:04', '2024-05-29 07:10:04'),
(50, 51, 3, 1, 0, 0, 0, '2024-05-29 07:11:11', '2024-05-29 07:11:11'),
(51, 52, 1, 3, 0, 0, 0, '2024-05-29 07:12:55', '2024-05-29 07:12:55'),
(52, 53, 1, 3, 0, 0, 0, '2024-05-29 09:00:33', '2024-05-29 09:00:33'),
(53, 54, 3, 1, 0, 0, 0, '2024-05-29 09:00:55', '2024-05-29 09:00:55'),
(54, 55, 1, 3, 0, 0, 0, '2024-05-29 09:37:51', '2024-05-29 09:37:51'),
(58, 59, 4, 1, 0, 0, 0, '2024-06-02 06:24:04', '2024-06-02 06:24:04'),
(59, 60, 1, 4, 0, 0, 0, '2024-06-02 06:25:02', '2024-06-02 06:25:02'),
(62, 63, 4, 1, 0, 0, 0, '2024-06-02 14:01:30', '2024-06-02 14:01:30'),
(63, 64, 4, 1, 0, 0, 0, '2024-06-02 16:12:17', '2024-06-02 16:12:17'),
(64, 65, 2, 4, 0, 0, 0, '2024-06-21 16:28:50', '2024-06-21 16:28:50'),
(65, 66, 4, 2, 0, 0, 0, '2024-06-21 16:35:23', '2024-06-21 16:35:23'),
(66, 67, 2, 4, 0, 0, 0, '2024-06-21 16:55:19', '2024-06-21 16:55:19'),
(67, 68, 4, 2, 0, 0, 0, '2024-06-21 17:34:47', '2024-06-21 17:34:47'),
(68, 69, 2, 4, 0, 0, 0, '2024-06-21 17:49:11', '2024-06-21 17:49:11'),
(69, 70, 4, 2, 0, 0, 0, '2024-06-21 17:49:34', '2024-06-21 17:49:34'),
(70, 71, 2, 4, 0, 0, 0, '2024-06-21 17:49:57', '2024-06-21 17:49:57'),
(71, 72, 4, 2, 0, 0, 0, '2024-06-21 18:06:54', '2024-06-21 18:06:54'),
(72, 73, 4, 2, 0, 0, 0, '2024-06-21 19:13:34', '2024-06-21 19:13:34'),
(73, 74, 2, 4, 0, 0, 0, '2024-06-21 19:14:00', '2024-06-21 19:14:00'),
(74, 75, 2, 4, 0, 0, 0, '2024-06-21 19:44:38', '2024-06-21 19:44:38'),
(75, 76, 4, 2, 0, 0, 0, '2024-06-21 19:44:57', '2024-06-21 19:44:57'),
(76, 77, 4, 2, 0, 0, 0, '2024-06-21 19:49:01', '2024-06-21 19:49:01'),
(77, 78, 2, 4, 0, 0, 0, '2024-06-21 19:50:47', '2024-06-21 19:50:47'),
(78, 79, 4, 2, 0, 0, 0, '2024-06-21 20:06:04', '2024-06-21 20:06:04'),
(79, 80, 2, 4, 0, 0, 0, '2024-06-21 20:08:51', '2024-06-21 20:08:51'),
(80, 81, 4, 2, 0, 0, 0, '2024-06-21 20:10:39', '2024-06-21 20:10:39'),
(81, 82, 2, 4, 0, 0, 0, '2024-06-21 20:12:03', '2024-06-21 20:12:03'),
(82, 83, 4, 2, 0, 0, 0, '2024-06-21 20:24:24', '2024-06-21 20:24:24'),
(83, 84, 2, 4, 0, 0, 0, '2024-06-22 14:29:15', '2024-06-22 14:29:15'),
(84, 85, 4, 2, 0, 0, 0, '2024-06-22 15:08:38', '2024-06-22 15:08:38'),
(85, 86, 4, 2, 0, 0, 0, '2024-06-22 15:19:17', '2024-06-22 15:19:17'),
(86, 87, 2, 4, 0, 0, 0, '2024-06-22 15:19:42', '2024-06-22 15:19:42'),
(87, 88, 4, 2, 0, 0, 0, '2024-06-22 15:20:18', '2024-06-22 15:20:18'),
(88, 89, 2, 4, 0, 0, 0, '2024-06-22 15:21:08', '2024-06-22 15:21:08'),
(89, 90, 4, 2, 0, 0, 0, '2024-06-22 15:21:41', '2024-06-22 15:21:41'),
(90, 91, 2, 4, 0, 0, 0, '2024-06-22 15:57:24', '2024-06-22 15:57:24'),
(91, 92, 4, 2, 0, 0, 0, '2024-06-22 16:12:10', '2024-06-22 16:12:10'),
(92, 93, 4, 2, 0, 0, 0, '2024-06-22 16:16:40', '2024-06-22 16:16:40'),
(93, 94, 4, 2, 0, 0, 0, '2024-06-22 16:17:23', '2024-06-22 16:17:23'),
(94, 95, 2, 4, 0, 0, 0, '2024-06-22 16:28:27', '2024-06-22 16:28:27'),
(95, 96, 4, 2, 0, 0, 0, '2024-06-22 16:29:24', '2024-06-22 16:29:24'),
(96, 97, 2, 4, 0, 0, 0, '2024-06-22 16:29:53', '2024-06-22 16:29:53'),
(97, 98, 4, 2, 0, 0, 0, '2024-06-22 16:30:26', '2024-06-22 16:30:26'),
(98, 99, 2, 4, 0, 0, 0, '2024-06-22 16:30:36', '2024-06-22 16:30:36'),
(99, 100, 4, 2, 0, 0, 0, '2024-06-22 16:32:11', '2024-06-22 16:32:11'),
(100, 101, 2, 4, 0, 0, 0, '2024-06-22 16:32:46', '2024-06-22 16:32:46'),
(101, 102, 4, 2, 0, 0, 0, '2024-06-22 16:33:34', '2024-06-22 16:33:34'),
(102, 103, 4, 2, 0, 0, 0, '2024-06-22 16:39:10', '2024-06-22 16:39:10'),
(103, 104, 4, 2, 0, 0, 0, '2024-06-22 16:39:44', '2024-06-22 16:39:44'),
(104, 105, 2, 4, 0, 0, 0, '2024-06-22 16:41:44', '2024-06-22 16:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `viewed_costume`
--

CREATE TABLE `viewed_costume` (
  `id_view` int NOT NULL,
  `id_costume` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `viewed_costume`
--

INSERT INTO `viewed_costume` (`id_view`, `id_costume`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-03 22:05:28', '2024-07-03 22:05:28'),
(2, 12, '2024-07-03 22:06:06', '2024-07-03 22:06:06'),
(3, 2, '2024-07-03 22:06:17', '2024-07-03 22:06:17'),
(4, 1, '2024-07-03 22:32:29', '2024-07-03 22:32:29'),
(5, 1, '2024-04-23 22:32:34', '2024-07-03 22:32:34'),
(6, 1, '2024-03-12 22:32:37', '2024-07-03 22:32:37'),
(7, 2, '2024-04-20 22:33:10', '2024-07-03 22:33:10'),
(8, 2, '2024-04-11 22:33:15', '2024-07-03 22:33:15'),
(9, 7, '2024-05-12 22:33:54', '2024-07-03 22:33:54'),
(10, 8, '2024-06-17 17:34:32', '2024-07-03 17:34:32'),
(11, 12, '2024-06-11 17:34:32', '2024-07-03 17:34:32'),
(12, 1, '2024-07-05 14:14:33', '2024-07-05 14:14:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asked_costume`
--
ALTER TABLE `asked_costume`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_asked_costume` (`id_costume`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `costume`
--
ALTER TABLE `costume`
  ADD PRIMARY KEY (`id_costume`);

--
-- Indexes for table `costume_category`
--
ALTER TABLE `costume_category`
  ADD PRIMARY KEY (`id_costume_category`),
  ADD KEY `fk_costume_id_cc` (`id_costume`),
  ADD KEY `fk_category_id_cc` (`id_category`);

--
-- Indexes for table `costume_color`
--
ALTER TABLE `costume_color`
  ADD PRIMARY KEY (`id_costume_color`),
  ADD KEY `fk_color_costume` (`id_costume`),
  ADD KEY `fk_costume_color` (`id_color`);

--
-- Indexes for table `costume_theme`
--
ALTER TABLE `costume_theme`
  ADD PRIMARY KEY (`id_costume_theme`),
  ADD KEY `fk_theme` (`id_theme`),
  ADD KEY `fk_costume_theme` (`id_costume`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_costume_id` (`id_costume`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `promosi_image`
--
ALTER TABLE `promosi_image`
  ADD PRIMARY KEY (`id_promo_img`),
  ADD KEY `id_promo` (`id_promo`);

--
-- Indexes for table `rented`
--
ALTER TABLE `rented`
  ADD PRIMARY KEY (`id_rent`),
  ADD KEY `id_rent_costume` (`id_costume`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD PRIMARY KEY (`id_search`),
  ADD KEY `fk_search_category` (`id_category`),
  ADD KEY `fk_search_color` (`id_color`),
  ADD KEY `fk_search_theme` (`id_theme`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `testimoni_kategori`
--
ALTER TABLE `testimoni_kategori`
  ADD PRIMARY KEY (`id_testimoni_kategori`),
  ADD KEY `fk_testi_category` (`id_testimoni`),
  ADD KEY `fk_category_testi` (`id_kategori`);

--
-- Indexes for table `testimoni_tema`
--
ALTER TABLE `testimoni_tema`
  ADD PRIMARY KEY (`id_testimoni_tema`),
  ADD KEY `fk_testi_themes` (`id_testimoni`),
  ADD KEY `fk_theme_testi` (`id_theme`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewed_costume`
--
ALTER TABLE `viewed_costume`
  ADD PRIMARY KEY (`id_view`),
  ADD KEY `fk_costume_views` (`id_costume`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asked_costume`
--
ALTER TABLE `asked_costume`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `costume`
--
ALTER TABLE `costume`
  MODIFY `id_costume` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `costume_category`
--
ALTER TABLE `costume_category`
  MODIFY `id_costume_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `costume_color`
--
ALTER TABLE `costume_color`
  MODIFY `id_costume_color` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `costume_theme`
--
ALTER TABLE `costume_theme`
  MODIFY `id_costume_theme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id_promo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `promosi_image`
--
ALTER TABLE `promosi_image`
  MODIFY `id_promo_img` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rented`
--
ALTER TABLE `rented`
  MODIFY `id_rent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `id_search` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimoni_kategori`
--
ALTER TABLE `testimoni_kategori`
  MODIFY `id_testimoni_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testimoni_tema`
--
ALTER TABLE `testimoni_tema`
  MODIFY `id_testimoni_tema` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `viewed_costume`
--
ALTER TABLE `viewed_costume`
  MODIFY `id_view` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asked_costume`
--
ALTER TABLE `asked_costume`
  ADD CONSTRAINT `fk_asked_costume` FOREIGN KEY (`id_costume`) REFERENCES `costume` (`id_costume`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `costume_category`
--
ALTER TABLE `costume_category`
  ADD CONSTRAINT `fk_category_id_cc` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_costume_id_cc` FOREIGN KEY (`id_costume`) REFERENCES `costume` (`id_costume`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_costume_id` FOREIGN KEY (`id_costume`) REFERENCES `costume` (`id_costume`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promosi_image`
--
ALTER TABLE `promosi_image`
  ADD CONSTRAINT `id_promo` FOREIGN KEY (`id_promo`) REFERENCES `promosi` (`id_promo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rented`
--
ALTER TABLE `rented`
  ADD CONSTRAINT `id_rent_costume` FOREIGN KEY (`id_costume`) REFERENCES `costume` (`id_costume`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `search_history`
--
ALTER TABLE `search_history`
  ADD CONSTRAINT `fk_search_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_search_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_search_theme` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `testimoni_kategori`
--
ALTER TABLE `testimoni_kategori`
  ADD CONSTRAINT `fk_category_testi` FOREIGN KEY (`id_kategori`) REFERENCES `category` (`id_category`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_testi_category` FOREIGN KEY (`id_testimoni`) REFERENCES `testimoni` (`id_testimoni`) ON UPDATE CASCADE;

--
-- Constraints for table `testimoni_tema`
--
ALTER TABLE `testimoni_tema`
  ADD CONSTRAINT `fk_testi_themes` FOREIGN KEY (`id_testimoni`) REFERENCES `testimoni` (`id_testimoni`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_theme_testi` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`) ON UPDATE CASCADE;

--
-- Constraints for table `viewed_costume`
--
ALTER TABLE `viewed_costume`
  ADD CONSTRAINT `fk_costume_views` FOREIGN KEY (`id_costume`) REFERENCES `costume` (`id_costume`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
