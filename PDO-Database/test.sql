-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Şub 2021, 22:25:12
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `example_table`
--

CREATE TABLE `example_table` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Content` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `for_join_ID` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Situation` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `example_table`
--

INSERT INTO `example_table` (`ID`, `Title`, `Content`, `for_join_ID`, `Situation`, `Date`) VALUES
(65, 'deneme1', 'deneme1', '1', 1, '2021-02-27 16:14:02'),
(66, 'deneme2', 'deneme2', '2', 1, '2021-02-27 16:14:09'),
(67, 'deneme3', 'deneme3', '3', 1, '2021-02-27 16:14:16'),
(68, 'deneme4', 'deneme4', '5', 0, '2021-02-27 16:29:19'),
(69, 'deneme5', 'deneme5', '5', 0, '2021-02-27 16:29:29'),
(70, 'deneme6', 'deneme6', '5', 0, '2021-02-27 16:29:40'),
(71, 'deneme7', 'deneme7', '1', 0, '2021-02-27 16:34:08'),
(72, 'deneme1', 'denene1', '1,2,3,5', 1, '2021-02-27 18:08:58'),
(73, 'denen2', 'denene2', '3', 0, '2021-02-27 18:09:06'),
(74, 'denemne3', 'denene3', '4', 0, '2021-02-27 18:09:16'),
(75, 'deneme4', 'deneme4', '2', 0, '2021-02-27 18:09:22'),
(76, 'denene5', 'deneme5', '2', 0, '2021-02-27 18:09:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `table_for_join`
--

CREATE TABLE `table_for_join` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `table_for_join`
--

INSERT INTO `table_for_join` (`ID`, `name`) VALUES
(1, 'category 1'),
(2, 'category 2'),
(3, 'category 3'),
(4, 'test'),
(5, 'denemefurkan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `test`
--

CREATE TABLE `test` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'test'),
(2, 'test'),
(3, 'test'),
(4, 'test'),
(5, 'test'),
(6, 'test'),
(7, 'test'),
(8, 'test'),
(9, 'test'),
(10, 'test'),
(11, 'test'),
(12, 'test'),
(13, 'test'),
(48, 'test'),
(49, 'test'),
(50, 'test'),
(51, 'test'),
(52, 'test'),
(53, 'test'),
(54, 'test'),
(55, 'test'),
(56, 'test'),
(57, 'test'),
(58, 'test'),
(59, 'test'),
(60, 'test'),
(61, 'test'),
(62, 'test'),
(63, 'test'),
(64, 'test'),
(65, 'test'),
(66, 'test'),
(67, 'test'),
(68, 'test'),
(69, 'test'),
(70, 'test'),
(71, 'test'),
(72, 'test'),
(73, 'test'),
(74, 'test'),
(75, 'test'),
(76, 'test'),
(77, 'test'),
(78, 'test'),
(79, 'test'),
(80, 'test'),
(81, 'test'),
(82, 'test'),
(83, 'test'),
(84, 'test'),
(85, 'test'),
(86, 'test'),
(87, 'test'),
(88, 'test'),
(89, 'test'),
(90, 'test'),
(91, 'test'),
(92, 'test'),
(93, 'test'),
(94, 'test'),
(95, 'test'),
(96, 'test'),
(97, 'test'),
(98, 'test'),
(99, 'test'),
(100, 'test'),
(101, 'test'),
(102, 'test'),
(103, 'test'),
(104, 'test'),
(105, 'test'),
(106, 'test'),
(107, 'test'),
(108, 'test'),
(109, 'test'),
(110, 'test'),
(111, 'test'),
(112, 'test'),
(113, 'test'),
(114, 'test'),
(115, 'test'),
(116, 'test'),
(117, 'test'),
(118, 'test'),
(119, 'test'),
(120, 'test'),
(121, 'test'),
(122, 'test'),
(123, 'test'),
(124, 'test'),
(125, 'test'),
(126, 'test'),
(127, 'test'),
(128, 'test'),
(129, 'test'),
(130, 'test'),
(131, 'test'),
(132, 'test'),
(133, 'test'),
(134, 'test');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `example_table`
--
ALTER TABLE `example_table`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `table_for_join`
--
ALTER TABLE `table_for_join`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `example_table`
--
ALTER TABLE `example_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Tablo için AUTO_INCREMENT değeri `table_for_join`
--
ALTER TABLE `table_for_join`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
