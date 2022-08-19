-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2022 at 01:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_absance`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `etat` varchar(10) DEFAULT NULL,
  `id_seance` int(11) NOT NULL,
  `cne` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`etat`, `id_seance`, `cne`) VALUES
('encour', 17, '104'),
('encour', 18, '100'),
('encour', 18, '101'),
('encour', 18, '102'),
('encour', 19, '102'),
('encour', 20, '100'),
('encour', 21, '101'),
('encour', 21, '102'),
('encour', 22, '100'),
('encour', 23, '103');

-- --------------------------------------------------------

--
-- Table structure for table `filier`
--

CREATE TABLE `filier` (
  `id_filier` int(11) NOT NULL,
  `nom` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filier`
--

INSERT INTO `filier` (`id_filier`, `nom`) VALUES
(1, 'developpement digitale'),
(2, 'infrastructure digitale');

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

CREATE TABLE `formateur` (
  `login` varchar(35) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `ville` varchar(10) DEFAULT NULL,
  `adress` varchar(20) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`login`, `nom`, `prenom`, `ville`, `adress`, `tel`, `id_module`) VALUES
('issam@gmail.com', 'elhyanni', 'issam', 'ifrane', 'adress', '0622115544', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `id_filier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `nom`, `id_filier`) VALUES
(6, 'dd 101', 1),
(1, 'dd 102', 1),
(8, 'id 103', 2),
(7, 'id 104', 2);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `nom` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `nom`) VALUES
(10, 'bootstrap 5'),
(17, 'english'),
(15, 'gestion entreprise'),
(9, 'html5 css3 '),
(6, 'javascript'),
(8, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `heureD` time DEFAULT NULL,
  `heureF` time DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `login` varchar(35) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id_seance`, `date`, `heureD`, `heureF`, `type`, `login`, `id_groupe`) VALUES
(17, '2022-06-08', '08:30:00', '11:00:00', 'Presence', 'baali@gmail.com', 6),
(18, '2022-06-08', '13:30:00', '18:30:00', 'Presence', 'issam@gmail.com', 1),
(19, '2022-06-09', '08:30:00', '11:00:00', 'Presence', 'issam@gmail.com', 1),
(20, '2022-06-09', '08:30:00', '13:30:00', 'A distance', 'issam@gmail.com', 1),
(21, '2022-06-09', '08:30:00', '11:00:00', 'Presence', 'issam@gmail.com', 1),
(22, '2022-06-11', '10:30:00', '13:30:00', 'A distance', 'issam@gmail.com', 1),
(23, '2022-06-12', '08:30:00', '11:00:00', 'A distance', 'issam@gmail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `cne` varchar(10) NOT NULL,
  `nom` varchar(35) DEFAULT NULL,
  `prenom` varchar(35) DEFAULT NULL,
  `ville` varchar(35) DEFAULT NULL,
  `adress` varchar(35) DEFAULT NULL,
  `login` varchar(35) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `dateN` date DEFAULT NULL,
  `id_groupe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stagiaire`
--

INSERT INTO `stagiaire` (`cne`, `nom`, `prenom`, `ville`, `adress`, `login`, `tel`, `dateN`, `id_groupe`) VALUES
('100', 'maaza', 'outmane', 'ifrane', 'rue 5', 'maaza@gmail.com', '0612235645', '2003-12-18', 1),
('101', 'bakhou', 'meryam', 'azrou', 'rue 2', 'bakhou@gmail.com', '0655223366', '2001-05-30', 1),
('102', 'araab', 'abdelah', 'ifrane', 'rue 3', 'araab@gmail.com', '0655223311', '2001-05-30', 1),
('103', 'hafsa ', 'agoulal', 'azrou', 'ahadaf', 'agoulal@gmail.com', '0622113300', '2003-06-11', 6),
('104', 'kbiri', 'driss', 'azrou', 'rataha', 'driss@gmail.com', '0655662233', '2001-06-13', 6),
('105', 'karouchi', 'yassin', 'azrou', 'adress 01', 'yassin@gmail.com', '0604455569', '2000-01-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(35) NOT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `type_user` varchar(35) DEFAULT NULL,
  `validation` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `pass`, `type_user`, `validation`) VALUES
('baaliabdessamad3@gmail.com', 'baali23', 'admin', 1),
('issam@gmail.com', 'issam', 'formateur', 1),
('sellak@gmail.com', 'sellak', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_seance`,`cne`),
  ADD KEY `fk_6` (`cne`);

--
-- Indexes for table `filier`
--
ALTER TABLE `filier`
  ADD PRIMARY KEY (`id_filier`);

--
-- Indexes for table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`,`id_filier`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`,`login`,`id_groupe`),
  ADD KEY `fk_4` (`id_groupe`),
  ADD KEY `login` (`login`);

--
-- Indexes for table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`cne`),
  ADD KEY `fk_2` (`id_groupe`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filier`
--
ALTER TABLE `filier`
  MODIFY `id_filier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `fk_6` FOREIGN KEY (`cne`) REFERENCES `stagiaire` (`cne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
