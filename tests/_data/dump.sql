-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 29. 10 2015 kl. 12:22:53
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `naturens-spisekammer`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(10) unsigned NOT NULL,
  `application` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Data dump for tabellen `applications`
--

INSERT INTO `applications` (`id`, `application`) VALUES
  (1, 'herb'),
  (2, 'thee'),
  (3, 'schnapps'),
  (4, 'pickled'),
  (5, 'firefood'),
  (6, 'pot'),
  (7, 'juice'),
  (8, 'supe'),
  (9, 'salad'),
  (10, 'dessert'),
  (11, 'snack');

--
-- Struktur-dump for tabellen `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
`id` int(10) unsigned NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Data dump for tabellen `colors`
--

INSERT INTO `colors` (`id`, `color`) VALUES
(1, 'red'),
(2, 'yellow'),
(3, 'blue'),
(4, 'green'),
(5, 'brown'),
(6, 'white'),
(7, 'black'),
(8, 'purple'),
(9, 'orange');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `habitats`
--

CREATE TABLE IF NOT EXISTS `habitats` (
`id` int(10) unsigned NOT NULL,
  `habitat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `habitats`
--

INSERT INTO `habitats` (`id`, `habitat`) VALUES
(1, 'farmland'),
(2, 'wetland'),
(3, 'forest'),
(4, 'moor'),
(5, 'coast');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Data dump for tabellen `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_08_17_213525_create-plants', 1),
('2015_08_19_122457_create-seasons', 1),
('2015_08_19_122517_create-plant-seaons', 1),
('2015_09_03_161614_create-plant-recipe', 1),
('2015_09_03_162905_create-recipes', 1),
('2015_09_04_172039_create-otherIngredient', 1),
('2015_09_04_172140_create-otherIngredient-recipes', 1),
('2015_10_04_003948_create-colors', 1),
('2015_10_04_004002_create-plant-colors', 1),
('2015_10_04_004038_create-sizes', 1),
('2015_10_04_004051_create-plant-sizes', 1),
('2015_10_04_004106_create-habitats', 1),
('2015_10_04_004117_create-plant-habitats', 1),
('2015_10_04_015424_create-photos', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `otheringredients`
--

CREATE TABLE IF NOT EXISTS `otheringredients` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Data dump for tabellen `otheringredients`
--

INSERT INTO `otheringredients` (`id`, `name`) VALUES
(2, 'Salt'),
(8, 'Peber'),
(9, 'Vand');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `otheringredients-recipes`
--

CREATE TABLE IF NOT EXISTS `otheringredients-recipes` (
`id` int(10) unsigned NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `otheringredient_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `photo_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=289 ;

--
-- Data dump for tabellen `photos`
--

INSERT INTO `photos` (`id`, `plant_id`, `photo_url`) VALUES
(1, 1, 'PlantPictures/1/0-plant-1.jpeg'),
(2, 1, 'PlantPictures/1/1-plant-1.jpeg'),
(3, 1, 'PlantPictures/1/2-plant-1.jpeg'),
(4, 1, 'PlantPictures/1/3-plant-1.jpeg'),
(5, 2, 'PlantPictures/2/0-plant-2.jpeg'),
(6, 2, 'PlantPictures/2/1-plant-2.jpeg'),
(7, 2, 'PlantPictures/2/2-plant-2.jpeg'),
(8, 2, 'PlantPictures/2/3-plant-2.jpeg'),
(9, 3, 'PlantPictures/3/0-plant-3.jpeg'),
(10, 3, 'PlantPictures/3/1-plant-3.jpeg'),
(11, 3, 'PlantPictures/3/2-plant-3.jpeg'),
(12, 3, 'PlantPictures/3/3-plant-3.jpeg'),
(13, 4, 'null'),
(14, 4, 'null'),
(15, 4, 'null'),
(16, 4, 'null'),
(17, 5, 'null'),
(18, 5, 'null'),
(19, 5, 'null'),
(20, 5, 'null'),
(21, 6, 'null'),
(22, 6, 'null'),
(23, 6, 'null'),
(24, 6, 'null'),
(25, 7, 'null'),
(26, 7, 'null'),
(27, 7, 'null'),
(28, 7, 'null'),
(29, 8, 'null'),
(30, 8, 'null'),
(31, 8, 'null'),
(32, 8, 'null'),
(33, 9, 'null'),
(34, 9, 'null'),
(35, 9, 'null'),
(36, 9, 'null'),
(37, 10, 'null'),
(38, 10, 'null'),
(39, 10, 'null'),
(40, 10, 'null'),
(41, 11, 'null'),
(42, 11, 'null'),
(43, 11, 'null'),
(44, 11, 'null'),
(45, 12, 'null'),
(46, 12, 'null'),
(47, 12, 'null'),
(48, 12, 'null'),
(49, 13, 'null'),
(50, 13, 'null'),
(51, 13, 'null'),
(52, 13, 'null'),
(53, 14, 'null'),
(54, 14, 'null'),
(55, 14, 'null'),
(56, 14, 'null'),
(57, 15, 'null'),
(58, 15, 'null'),
(59, 15, 'null'),
(60, 15, 'null'),
(61, 16, 'null'),
(62, 16, 'null'),
(63, 16, 'null'),
(64, 16, 'null'),
(65, 17, 'PlantPictures/17/0-plant-17.jpeg'),
(66, 17, 'null'),
(67, 17, 'null'),
(68, 17, 'null'),
(69, 18, 'null'),
(70, 18, 'null'),
(71, 18, 'null'),
(72, 18, 'null'),
(73, 19, 'null'),
(74, 19, 'null'),
(75, 19, 'null'),
(76, 19, 'null'),
(77, 20, 'null'),
(78, 20, 'null'),
(79, 20, 'null'),
(80, 20, 'null'),
(81, 21, 'null'),
(82, 21, 'null'),
(83, 21, 'null'),
(84, 21, 'null'),
(85, 22, 'null'),
(86, 22, 'null'),
(87, 22, 'null'),
(88, 22, 'null'),
(89, 23, 'null'),
(90, 23, 'null'),
(91, 23, 'null'),
(92, 23, 'null');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plants`
--

CREATE TABLE IF NOT EXISTS `plants` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_latin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `history` longtext COLLATE utf8_unicode_ci NOT NULL,
  `herb` tinyint(1) DEFAULT NULL,
  `eatable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

--
-- Data dump for tabellen `plants`
--

INSERT INTO `plants` (`id`, `name`, `name_latin`, `description`, `history`, `herb`, `eatable`) VALUES
(1, 'First plant 123', 'First plant', 'Mauris varius elementum quam, at vestibulum tellus dictum ut. Donec bibendum mauris ut tortor bibendum, ut iaculis est porta. Mauris sagittis turpis non ipsum ultricies, nec vulputate purus elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque malesuada orci nunc, sit amet viverra ligula pellentesque vitae. Etiam finibus elit nibh, non pellentesque magna porta eu. Nulla at quam vel quam placerat lacinia. Fusce leo mauris, convallis vel laoreet sed, ullamcorper vel nisi. Integer luctus sapien id viverra fringilla.', 'Nullam laoreet, ipsum nec pretium iaculis, mi est pretium purus, scelerisque porta ipsum nunc vitae lorem. Phasellus a sodales velit. Morbi sit amet tempor odio, non pellentesque justo. Sed id eros malesuada, commodo dui sed, congue eros. Sed nec quam ut enim interdum lobortis a quis arcu. Fusce ultrices efficitur massa, vel fermentum nulla lacinia sed. Morbi sed finibus erat. Donec at diam pharetra, facilisis nisi id, convallis justo. Nulla facilisi. Suspendisse et vulputate est. Fusce auctor euismod erat, id sagittis odio viverra ut. Aliquam gravida commodo arcu, a vehicula tortor tempor a. Aenean tempus lobortis sapien id fermentum. Phasellus ac ante justo. Duis non gravida magna, non feugiat nibh. Quisque dictum auctor metus vel viverra. ', NULL, 1),
(2, 'kskd', 'asldm', '', '', NULL, NULL),
(17, 'New plant with season', 'nosaes', '', '', NULL, NULL),
(22, 'Ny farve til planter', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_applications`
--

CREATE TABLE IF NOT EXISTS `plant_applications` (
  `id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Struktur-dump for tabellen `plant_colors`
--

CREATE TABLE IF NOT EXISTS `plant_colors` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Data dump for tabellen `plant_colors`
--

INSERT INTO `plant_colors` (`id`, `plant_id`, `color_id`) VALUES
(7, 2, 3),
(8, 2, 4),
(30, 1, 1),
(31, 1, 2),
(32, 1, 3),
(33, 1, 4),
(42, 17, 3),
(43, 17, 4),
(44, 17, 5),
(74, 22, 3),
(75, 22, 4),
(76, 22, 7),
(77, 22, 8),
(78, 22, 9);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_habitats`
--

CREATE TABLE IF NOT EXISTS `plant_habitats` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=147 ;

--
-- Data dump for tabellen `plant_habitats`
--

INSERT INTO `plant_habitats` (`id`, `plant_id`, `habitat_id`) VALUES
(43, 2, 2),
(44, 2, 3),
(58, 1, 2),
(59, 1, 3),
(60, 1, 4),
(97, 17, 2),
(98, 17, 3),
(99, 17, 4);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_recipes`
--

CREATE TABLE IF NOT EXISTS `plant_recipes` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `plant_recipes`
--

INSERT INTO `plant_recipes` (`id`, `plant_id`, `recipe_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_seasons`
--

CREATE TABLE IF NOT EXISTS `plant_seasons` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Data dump for tabellen `plant_seasons`
--

INSERT INTO `plant_seasons` (`id`, `plant_id`, `season_id`) VALUES
(43, 2, 2),
(44, 2, 3),
(58, 1, 1),
(59, 1, 2),
(60, 1, 4),
(85, 17, 1),
(86, 17, 2),
(87, 17, 4);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_sizes`
--

CREATE TABLE IF NOT EXISTS `plant_sizes` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=141 ;

--
-- Data dump for tabellen `plant_sizes`
--

INSERT INTO `plant_sizes` (`id`, `plant_id`, `size_id`) VALUES
(43, 2, 3),
(44, 2, 4),
(62, 1, 3),
(63, 1, 4),
(67, 3, 2),
(68, 3, 3),
(69, 3, 4),
(70, 20, 2),
(71, 20, 3),
(72, 21, 1),
(73, 21, 2),
(74, 21, 3),
(75, 21, 4),
(76, 21, 5),
(77, 21, 6),
(78, 21, 7),
(79, 21, 1),
(80, 21, 2),
(81, 21, 5),
(82, 21, 6),
(83, 21, 7),
(90, 17, 4),
(91, 17, 5),
(114, 22, 3),
(115, 22, 4);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `storage` longtext COLLATE utf8_unicode_ci NOT NULL,
  `guide` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favorite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `storage`, `guide`, `type`, `favorite`) VALUES
(1, 'Test Opskrift', 'Man skal opbevare denne ret så ledes.', 'Man tilberede opbevare denne ret så ledes.', 'soup', NULL),
(2, 'Test Opskrift', 'Man skal opbevare denne ret så ledes.', 'Man tilberede opbevare denne ret så ledes.', 'soup', NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
`id` int(10) unsigned NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `seasons`
--

INSERT INTO `seasons` (`id`, `season`) VALUES
(1, 'spring'),
(2, 'summer'),
(3, 'autumn'),
(4, 'winter');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
`id` int(10) unsigned NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Data dump for tabellen `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, '10'),
(2, '10-25'),
(3, '25-40'),
(4, '40-50'),
(5, '50-75'),
(6, '75-100'),
(7, '100');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `colors`
--
ALTER TABLE `colors`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `habitats`
--
ALTER TABLE `habitats`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `otheringredients`
--
ALTER TABLE `otheringredients`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `otheringredients-recipes`
--
ALTER TABLE `otheringredients-recipes`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `plants`
--
ALTER TABLE `plants`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `plant_colors`
--
ALTER TABLE `plant_colors`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `plant_habitats`
--
ALTER TABLE `plant_habitats`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `plant_recipes`
--
ALTER TABLE `plant_recipes`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `plant_seasons`
--
ALTER TABLE `plant_seasons`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `plant_sizes`
--
ALTER TABLE `plant_sizes`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `recipes`
--
ALTER TABLE `recipes`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `seasons`
--
ALTER TABLE `seasons`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `sizes`
--
ALTER TABLE `sizes`
 ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `colors`
--
ALTER TABLE `colors`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Tilføj AUTO_INCREMENT i tabel `habitats`
--
ALTER TABLE `habitats`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tilføj AUTO_INCREMENT i tabel `otheringredients`
--
ALTER TABLE `otheringredients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Tilføj AUTO_INCREMENT i tabel `otheringredients-recipes`
--
ALTER TABLE `otheringredients-recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=289;
--
-- Tilføj AUTO_INCREMENT i tabel `plants`
--
ALTER TABLE `plants`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_colors`
--
ALTER TABLE `plant_colors`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_habitats`
--
ALTER TABLE `plant_habitats`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=147;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_recipes`
--
ALTER TABLE `plant_recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_seasons`
--
ALTER TABLE `plant_seasons`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_sizes`
--
ALTER TABLE `plant_sizes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- Tilføj AUTO_INCREMENT i tabel `recipes`
--
ALTER TABLE `recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tilføj AUTO_INCREMENT i tabel `seasons`
--
ALTER TABLE `seasons`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tilføj AUTO_INCREMENT i tabel `sizes`
--
ALTER TABLE `sizes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
