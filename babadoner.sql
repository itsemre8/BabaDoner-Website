-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 30 mrt 2026 om 16:19
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babadoner`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int NOT NULL,
  `gebruikersnaam` varchar(100) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechten`
--

CREATE TABLE `gerechten` (
  `id` int NOT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `afbeelding` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gerechten`
--

INSERT INTO `gerechten` (`id`, `naam`, `beschrijving`, `prijs`, `categorie`, `afbeelding`) VALUES
(2, 'Döner Schotel', 'Rijkelijk belegde döner schotel met rijst, gegrilde groenten en cacik.', 15.00, 'Döner', 'pictures/donerschotel.png'),
(19, 'Döner Wrap', 'Verse wrap gevuld met döner, sla, ui, tomaat en speciale saus.', 10.50, 'Döner', 'pictures/durum-et-doner_b.png'),
(20, 'Adana Kebab\r\n', 'Pittig gehakt lam op houtskool, geserveerd met flatbread en gegrilde paprika.', 16.50, 'Kebab', 'pictures/adanakebap.jpg'),
(21, 'Urfa Kebab', 'Zachte urfa kebab met subtiele kruiden, geserveerd met rijst en salade.', 16.50, 'Kebab', 'pictures/urfakebap.webp'),
(22, 'Tavuk Şiş\r\n', 'Gemarineerde kip spiesjes van de houtskoolbarbecue, met yoghurtsaus.', 14.50, 'Kebab', 'pictures/tavuksis.jpg'),
(23, 'Gemengde Meze\r\n', 'Selectie van hummus, baba ghanoush, cacık en gegrilde aubergine.\r\n\r\n', 12.00, 'Meze', 'pictures/meze.png'),
(24, 'Hummus', 'Huisgemaakte hummus met olijfolie, paprikapoeder en versgebakken pide.\r\n\r\n', 7.50, 'Meze', 'pictures/hummus.jpg'),
(25, 'Cacık', 'Verse Turkse yoghurt met komkommer, knoflook en munt.\r\n\r\n', 6.00, 'Meze', 'pictures/Cacik.png'),
(26, 'Kaşarlı Pide\r\n', 'Turkse bootpizza met gesmolten kaşar kaas, vers uit de steenoven.\r\n\r\n', 11.00, 'Pide', 'pictures/kasarli-pide.jpg'),
(27, 'Kıymalı Pide\r\n', 'Pide met gekruid gehakt, ui, tomaat en verse peterselie.\r\n\r\n', 13.00, 'Pide', 'pictures/kiymali-pide.jpg.webp'),
(28, 'Yumurtalı Pide\r\n', 'Pide met ei, sucuk worstjes en kaas — een klassiek Anatolisch ontbijt.\r\n\r\n', 12.00, 'Pide', 'pictures/kasarli-yumurtali-pide-518c-c.jpg'),
(29, 'Baklava', 'Knapperig deeg gevuld met pistache en honing, recept van grootmoeder.\r\n\r\n', 6.50, 'Dessert', 'pictures/Baklava(1).png'),
(30, 'Sütlaç', 'Traditionele Turkse rijstepudding, koud geserveerd met kaneelpoeder.\r\n\r\n', 5.50, 'Dessert', 'pictures/sutlac.webp'),
(31, 'Künefe', 'Warme kadayıf met smeltende kaas en suikersiroop, bestrooid met pistache.\r\n\r\n', 8.00, 'Dessert', 'pictures/kunefe.jpg'),
(32, 'Turkse Thee\r\n', 'Traditionele çay geserveerd in klassiek tulpglas, sterk en aromatisch.\r\n\r\n', 2.50, 'Dranken', 'pictures/turkse thee.jpg'),
(33, 'Ayran', 'Gezouten yoghurtdrank, de perfecte frisse begeleider bij uw maaltijd.\r\n\r\n', 3.00, 'Dranken', 'pictures/ayran.webp'),
(35, 'Turkse Koffie\r\n', 'Authentieke mokka bereid op zand, geserveerd met Turkse lokum.\r\n\r\n', 3.50, 'Dranken', 'pictures/turkish coffee.avif'),
(36, 'Döner Kebab Deluxe', 'Malse döner gegaard aan het spit, geserveerd met verse salade, tomaat en huisgemaakte saus.', 13.50, 'Döner', 'pictures/Doner-Kebab.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gerechten`
--
ALTER TABLE `gerechten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `gerechten`
--
ALTER TABLE `gerechten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
