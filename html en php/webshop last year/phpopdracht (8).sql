-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 apr 2018 om 11:33
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpopdracht`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(10) NOT NULL,
  `Categorie` varchar(40) NOT NULL,
  `Parent` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`ID`, `Categorie`, `Parent`) VALUES
(48, 'pc', 'onderdelen'),
(49, 'laptoponderdelen', 'Systemen'),
(50, 'gamepc', 'Systemen'),
(56, 'systemen', 'laptop'),
(57, 'kaas', 'Systemen'),
(58, 'stick', 'Onderdelen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `ID` int(10) NOT NULL,
  `klantID` int(10) NOT NULL,
  `datum` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`ID`, `klantID`, `datum`) VALUES
(30, 17, '2018/04/18'),
(31, 17, '2018/04/18'),
(32, 17, '2018/04/18'),
(33, 17, '2018/04/18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuurregels`
--

CREATE TABLE `factuurregels` (
  `ID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `aantal` int(10) NOT NULL,
  `factuurID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `factuurregels`
--

INSERT INTO `factuurregels` (`ID`, `productID`, `aantal`, `factuurID`) VALUES
(93, 8, 12, 30),
(94, 7, 1, 30),
(95, 10, 1, 30),
(96, 9, 1, 30),
(97, 1, 1, 1),
(99, 12, 22, 30),
(100, 12, 23, 30),
(101, 23, 23, 30),
(102, 13, 1, 31),
(103, 15, 1, 31),
(104, 14, 1, 31),
(105, 2, 2, 31),
(106, 13, 1, 32),
(107, 11, 1, 32),
(108, 2, 23, 32),
(109, 11, 1, 33),
(110, 8, 1, 33);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `GebruikerID` int(11) NOT NULL,
  `Email` varchar(36) NOT NULL,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `functie` text NOT NULL,
  `Voornaam` varchar(36) NOT NULL,
  `Achternaam` varchar(36) NOT NULL,
  `Tussenvoegsel` varchar(8) NOT NULL,
  `Straat` varchar(36) NOT NULL,
  `HuisNr` varchar(10) NOT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Telefoonnummer` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`GebruikerID`, `Email`, `gebruikersnaam`, `wachtwoord`, `functie`, `Voornaam`, `Achternaam`, `Tussenvoegsel`, `Straat`, `HuisNr`, `Postcode`, `Telefoonnummer`) VALUES
(5, '', 'gebruiker', '6c63212ab48e8401eaf6b59b95d816a9', 'administrator', '', '', '', '', '', '', ''),
(6, '', 'hallo', '598d4c200461b81522a3328565c25f7c', '', '', '', '', '', '', '', ''),
(17, 'paul@paul.nljhkjh', 'paul', '202cb962ac59075b964b07152d234b70', 'administrator', 'paul', 'paul', 'pual', 'paul', 'kkl', '7899gh', ''),
(34, 'psh@graafschapcollege.nl', 'peters', '701f33b8d1366cde9cb3822256a62c01', '', 'han', 'peters', '', 'straat', '34', '8787jj', '0612434'),
(42, '', 'dfssdf', '20838a8df7cc0babd745c7af4b7d94e2', '', '', '', '', '', '', '', ''),
(43, '', 'sdfsdfsdfsd', '56941797873ee3731e69696924cd0c90', '', '', '', '', '', '', '', ''),
(47, '', 'sdfsdf', '887a7fecbca4f1c732762000734a27b2', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `Location` text NOT NULL COMMENT 'Fysieke locatie van de image',
  `LaptopNaam` text NOT NULL,
  `Processor` text NOT NULL,
  `graphischeKaart` text NOT NULL,
  `hddCapaciteit` text NOT NULL,
  `ssdCapaciteit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `Location`, `LaptopNaam`, `Processor`, `graphischeKaart`, `hddCapaciteit`, `ssdCapaciteit`) VALUES
(1, '907970.png', 'Laptop 24 inch', 'Intel core i7', 'nvidea geforce gtx 1050', '1TB HDD', '250 GB SSD');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Beschrijving` varchar(2000) NOT NULL,
  `eig1` varchar(36) NOT NULL,
  `eig2` varchar(36) NOT NULL,
  `eig3` varchar(36) NOT NULL,
  `eig4` varchar(36) NOT NULL,
  `Voorraad` int(10) NOT NULL,
  `Categorie` varchar(60) NOT NULL,
  `Prijs` int(10) NOT NULL,
  `Korting` int(11) NOT NULL,
  `imglocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`ID`, `Naam`, `Beschrijving`, `eig1`, `eig2`, `eig3`, `eig4`, `Voorraad`, `Categorie`, `Prijs`, `Korting`, `imglocation`) VALUES
(7, 'Laptop 2', 'Een hele mooie laptop', 'lenovo', '1234', 'game laptop', 'goed', 10, 'gamepc', 100, 0, 'productImages/72151c9508077b88d1284c1fe321eb69f4db4.png'),
(8, 'Laptop 3', 'Een hele mooie laptop', 'Msi', '1234', 'game laptop', 'goed', 10, 'gamepc', 110, 0, 'productImages/84c9508077b88d1284c1fe321eb69f4db4.png'),
(9, 'Laptop 4', 'Een hele mooie laptop', 'Msi', '1234', 'game laptop', 'goed', 0, 'laptoponderdelen', 300, 0, ''),
(10, 'Laptop 5', 'Een hele mooie laptop', 'msi', '1234', 'game laptop', 'goed', 30, '\r\n                                           \r\n             ', 250, 15, ''),
(11, 'Laptop 6', 'Een hele mooie laptop', 'xcv', 'vxcv', 'vcx', 'vc', 35, '\r\n                                           kaas', 10, 5, ''),
(12, 'fdgdsg', 'dsgdffsdgfggf', 'sdf', 'sdf', 'sdf', 'dsf', 10, '\r\n                                           \r\n             ', 20, 0, ''),
(13, 'Laptop 6', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(14, 'Laptop 7', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(15, 'Laptop 8', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(16, 'Laptop 9', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(17, 'Laptop 10', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(18, 'Laptop 11', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(19, 'Laptop 12', 'Een hele mooie laptop', 'MSI', '123', 'game laptop', 'goed', 20, 'gamepc', 300, 0, ''),
(20, 'sdflkdsfljkdslkjj', 'kjl', 'lkj', 'kjl', 'ljk', 'ljk', 0, 'gamepc', 0, 0, ''),
(21, 'jklj', 'fdgsdfdsf', 'lkjl', 'kj', 'lkjljk', 'lk', 11, '\r\n                                           pc', 11, 11, ''),
(22, 'jklj', '', 'lkjl', 'kj', 'lkjljk', 'lk', 11, 'pc', 11, 11, ''),
(23, 'laptop 30', '', 'klj', 'lkj', 'lkj', 'lkj', 10, 'pc', 10, 10, ''),
(24, 'dfgffdgdf', 'dgdsfadfads bnb vzcvb sdd', 'gdf', 'fgdfg', 'gd', 'sdf', 100, '\r\n                                           \r\n             ', 100, 9, ''),
(25, 'mooie laptop', '', 'MSI', 'model 3', '123', '213', 100, 'laptoponderdelen', 999, 99, ''),
(26, 'laptop', '', '', '', '', '', 1, '\r\n                                           pc', 100, 9, ''),
(27, 'kjlkjkj', 'dssafljsdlkfjlkjlkjlkjlkjlksdffffffffffwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwdsfdafsadfsadfsfdfasdfsasdfsdf', 'kljlkj', 'lkj', 'kjl', 'jkl', 10, '\r\n                                           \r\n             ', 100, 2, 'productImages/274c9508077b88d1284c1fe321eb69f4db4.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productreparaties`
--

CREATE TABLE `productreparaties` (
  `Product` text NOT NULL,
  `Beschrijving` text NOT NULL,
  `telefoonnummer` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `productreparaties`
--

INSERT INTO `productreparaties` (`Product`, `Beschrijving`, `telefoonnummer`) VALUES
('test', 'adsadasdadsads', 5646),
('test', 'start niet op', 4863518),
('dsffds', ' dsfsdf', 10101),
('dfdsfds', ' sdffdssdf', 45534),
('knlk', 'slskdjflksjdflkjsdlkj ', 612345678);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexen voor tabel `factuurregels`
--
ALTER TABLE `factuurregels`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`GebruikerID`);

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT voor een tabel `factuur`
--
ALTER TABLE `factuur`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT voor een tabel `factuurregels`
--
ALTER TABLE `factuurregels`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `GebruikerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
