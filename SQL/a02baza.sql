-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 29, 2026 at 09:43 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a02baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rola`
--

CREATE TABLE `rola` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
);

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`id`, `nazwa`) VALUES
(1, 'Pracownik'),
(2, 'Technik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
);

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nazwa`) VALUES
(1, 'nowe'),
(2, 'w trakcie'),
(3, 'skończone');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
);

--
-- Dumping data for table `uprawnienia`
--

INSERT INTO `uprawnienia` (`id`, `nazwa`) VALUES
(1, 'baner_prac'),
(2, 'baner_tech');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `nick` text NOT NULL,
  `login` text NOT NULL,
  `haslo` text DEFAULT NULL,
  `id_rola` int(11) NOT NULL,
  `id_uprawnienia` int(11) NOT NULL DEFAULT 1
);

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nick`, `login`, `haslo`, `id_rola`, `id_uprawnienia`) VALUES
(1, 'Adam', 'Pracownik', '123', 1, 1),
(2, 'Niko985642', 'Technik', '321', 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zglosenia`
--

CREATE TABLE `zglosenia` (
  `id` int(11) NOT NULL,
  `tytul` varchar(120) NOT NULL,
  `opis` varchar(2000) NOT NULL,
  `lokalizacja` varchar(100) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `data` date NOT NULL,
  `autor` varchar(255) NOT NULL
);

--
-- Dumping data for table `zglosenia`
--

INSERT INTO `zglosenia` (`id`, `tytul`, `opis`, `lokalizacja`, `id_status`, `data`, `autor`) VALUES
(1, '2323;jhgtfrtfg', '23,mnyujk,mn', 'bvfgjkl,2vfdghjk', 2, '2026-10-28', 'Adam');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_uzytkownicy_rola` (`id_rola`),
  ADD KEY `fk_uzytkownicy_uprawnienia` (`id_uprawnienia`);

--
-- Indeksy dla tabeli `zglosenia`
--
ALTER TABLE `zglosenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zglosenia_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zglosenia`
--
ALTER TABLE `zglosenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `fk_uzytkownicy_rola` FOREIGN KEY (`id_rola`) REFERENCES `rola` (`id`),
  ADD CONSTRAINT `fk_uzytkownicy_uprawnienia` FOREIGN KEY (`id_uprawnienia`) REFERENCES `uprawnienia` (`id`);

--
-- Constraints for table `zglosenia`
--
ALTER TABLE `zglosenia`
  ADD CONSTRAINT `fk_zglosenia_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
