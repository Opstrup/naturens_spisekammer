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
  (8, 'soup'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

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

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_habitats`
--

CREATE TABLE IF NOT EXISTS `plant_habitats` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=147 ;


-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_recipes`
--

CREATE TABLE IF NOT EXISTS `plant_recipes` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `plant_seasons`
--

CREATE TABLE IF NOT EXISTS `plant_seasons` (
`id` int(10) unsigned NOT NULL,
  `plant_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;


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
-- Struktur-dump for tabellen `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
`id` int(10) unsigned NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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
