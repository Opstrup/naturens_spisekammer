-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 16. 10 2015 kl. 12:09:54
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

--
-- Struktur-dump for tabellen `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
`id` int(10) unsigned NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `colors`
--

INSERT INTO `colors` (`color`) VALUES
('red'),
('yellow'),
('blue'),
('green'),
('brown');

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

INSERT INTO `habitats` (`habitat`) VALUES
('farmland'),
('wetland'),
('forest'),
('moor'),
('coast');

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
('2015_09_03_161614_create-plant-recipe', 2),
('2015_09_03_162905_create-recipes', 2),
('2015_09_04_172039_create-otherIngredient', 3),
('2015_09_04_172140_create-otherIngredient-recipes', 3),
('2015_10_04_003948_create-colors', 4),
('2015_10_04_004002_create-plant-colors', 4),
('2015_10_04_004038_create-sizes', 5),
('2015_10_04_004051_create-plant-sizes', 5),
('2015_10_04_004106_create-habitats', 5),
('2015_10_04_004117_create-plant-habitats', 5),
('2015_10_04_015424_create-photos', 5),
('2015_10_13_141006_create_users_table', 6);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `otheringredients`
--

CREATE TABLE IF NOT EXISTS `otheringredients` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Data dump for tabellen `otheringredients`
--

INSERT INTO `otheringredients` (`name`) VALUES
('Salt'),
('Peber'),
('Olie'),
('Vand'),
('Mel'),
('Rasp'),
('Oksekød'),
('Lakse fille'),
('Kylling bryst');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Data dump for tabellen `photos`
--

INSERT INTO `photos` (`plant_id`, `photo_url`) VALUES
(1, 'PlantPictures/1/0-plant-1.jpeg'),
(1, 'PlantPictures/1/1-plant-1.jpeg'),
(1, 'PlantPictures/1/2-plant-1.jpeg'),
(1, 'PlantPictures/1/3-plant-1.jpeg'),
(4, 'null'),
(4, 'null'),
(4, 'null'),
(4, 'null'),
(5, 'null'),
(5, 'null'),
(5, 'null'),
(5, 'null');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `plants`
--

INSERT INTO `plants` (`name`, `name_latin`, `description`, `history`, `herb`, `eatable`) VALUES
('First plant', 'Plant', 'Sed quis metus nisl. Sed elementum sapien sit amet diam consectetur, a convallis nibh ullamcorper. Curabitur a nisi porttitor, elementum nibh at, semper ipsum. Etiam eget nunc quis justo viverra ultrices. Suspendisse dignissim, libero sit amet feugiat imperdiet, ipsum nisi pulvinar velit, ut tincidunt elit mi vel ante. Vestibulum laoreet nulla vitae lorem tempor aliquet id eget turpis. Nam a orci eu eros fringilla viverra eu in justo. Praesent hendrerit viverra dolor ut molestie. Duis sit amet tristique massa. Mauris volutpat blandit facilisis. Nullam aliquet orci ut blandit pulvinar. Integer suscipit erat non vestibulum tincidunt. Proin egestas purus eu mi tempor, vel rhoncus lacus pulvinar. Donec dolor sem, scelerisque quis tempus in, blandit id nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi non blandit sapien. ', 'Vestibulum sollicitudin lacinia finibus. Pellentesque finibus efficitur euismod. Sed non nunc nec orci lobortis facilisis. In lobortis, dolor vitae scelerisque pellentesque, elit neque gravida eros, gravida vulputate enim lectus vitae magna. Proin rhoncus hendrerit metus ut fermentum. Nullam rhoncus interdum orci a finibus. Morbi urna augue, varius ac tellus eget, lacinia mollis augue. Etiam nec mattis tellus, quis maximus enim. Mauris ut ex elit. Sed in neque ac odio pretium ultricies quis vitae justo. Etiam accumsan pellentesque tortor, in efficitur mauris egestas eget. Aliquam lectus nulla, efficitur in nisi vitae, ullamcorper ultrices mi. Maecenas luctus, lacus fringilla semper cursus, nisl tortor finibus tellus, quis molestie odio sem at lacus. ', NULL, NULL),
('hasdjahs', 'sdfhsdfkj', 'sdfjksadoldf', 'sdafjskaldf', 0, NULL),
('sdfsdf', 'sdfsf', 'sadfsd', 'sdfsdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_colors`
--

CREATE TABLE IF NOT EXISTS `plant_colors` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Data dump for tabellen `plant_colors`
--

INSERT INTO `plant_colors` (`plant_id`, `color_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_habitats`
--

CREATE TABLE IF NOT EXISTS `plant_habitats` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Data dump for tabellen `plant_habitats`
--

INSERT INTO `plant_habitats` (`plant_id`, `habitat_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(4, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_recipes`
--

CREATE TABLE IF NOT EXISTS `plant_recipes` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_seasons`
--

CREATE TABLE IF NOT EXISTS `plant_seasons` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Data dump for tabellen `plant_seasons`
--

INSERT INTO `plant_seasons` (`plant_id`, `season_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_sizes`
--

CREATE TABLE IF NOT EXISTS `plant_sizes` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Data dump for tabellen `plant_sizes`
--

INSERT INTO `plant_sizes` (`plant_id`, `size_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(4, 3),
(4, 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

INSERT INTO `seasons` (`season`) VALUES
('spring'),
('summer'),
('autumn'),
('winter');

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

INSERT INTO `sizes` (`size`) VALUES
('10'),
('10-25'),
('25-40'),
('40-50'),
('50-75'),
('75-100'),
('100');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `colors`
--
/*ALTER TABLE `colors`
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
-- Indeks for tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `colors`
--
ALTER TABLE `colors`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tilføj AUTO_INCREMENT i tabel `habitats`
--
ALTER TABLE `habitats`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tilføj AUTO_INCREMENT i tabel `otheringredients`
--
ALTER TABLE `otheringredients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Tilføj AUTO_INCREMENT i tabel `otheringredients-recipes`
--
ALTER TABLE `otheringredients-recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Tilføj AUTO_INCREMENT i tabel `plants`
--
ALTER TABLE `plants`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_colors`
--
ALTER TABLE `plant_colors`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_habitats`
--
ALTER TABLE `plant_habitats`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_recipes`
--
ALTER TABLE `plant_recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_seasons`
--
ALTER TABLE `plant_seasons`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Tilføj AUTO_INCREMENT i tabel `plant_sizes`
--
ALTER TABLE `plant_sizes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- Tilføj AUTO_INCREMENT i tabel `recipes`
--
ALTER TABLE `recipes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
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
--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
