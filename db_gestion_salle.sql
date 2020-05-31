-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2020 at 08:20 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gestion_salle`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activite`
--

CREATE TABLE `Activite` (
  `idActivite` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `nomActivite` varchar(254) NOT NULL,
  `descriptionActivite` varchar(254) NOT NULL,
  `codeActivite` varchar(250) NOT NULL,
  `dateActivite` varchar(254) NOT NULL,
  `heureDebutActivite` varchar(254) NOT NULL,
  `heureFinActivite` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Cours`
--

CREATE TABLE `Cours` (
  `idCours` int(11) NOT NULL,
  `idTypeCours` int(11) DEFAULT NULL,
  `statutCours` tinyint(1) DEFAULT NULL,
  `dateCours` datetime DEFAULT NULL,
  `heureDebutCours` varchar(10) DEFAULT NULL,
  `heureFinCours` varchar(10) DEFAULT NULL,
  `enabledCours` tinyint(1) DEFAULT NULL,
  `acceptedCours` tinyint(1) DEFAULT NULL,
  `idEcue` int(11) NOT NULL,
  `idSalle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cours`
--

INSERT INTO `Cours` (`idCours`, `idTypeCours`, `statutCours`, `dateCours`, `heureDebutCours`, `heureFinCours`, `enabledCours`, `acceptedCours`, `idEcue`, `idSalle`) VALUES
(1, 1, 1, '2020-05-28 00:00:00', '08:00', '12:00', 1, 1, 1, 1),
(2, 1, 1, '2020-05-13 00:00:00', '14:00', '18:00', 1, 1, 3, 1),
(3, 2, 0, '2020-12-18 00:00:00', '08:00', '12:00', 0, 1, 1, NULL),
(4, 2, 0, '2020-12-18 00:00:00', '12:00', '17:30', 0, NULL, 2, 1),
(5, 2, 0, '2020-12-18 00:00:00', '14:00', '18:00', 1, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Departement`
--

CREATE TABLE `Departement` (
  `idDepartement` int(11) NOT NULL,
  `nomDepartement` varchar(254) DEFAULT NULL,
  `adresseDepartement` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Departement`
--

INSERT INTO `Departement` (`idDepartement`, `nomDepartement`, `adresseDepartement`) VALUES
(1, 'Mathematique', NULL),
(2, 'Informatique', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `DetailCoursSalle`
--

CREATE TABLE `DetailCoursSalle` (
  `idDetailCoursSalle` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DetailEcueEnseignant`
--

CREATE TABLE `DetailEcueEnseignant` (
  `idDetail` int(11) NOT NULL,
  `idEnseignant` int(11) NOT NULL,
  `idEcue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DetailEcueEnseignant`
--

INSERT INTO `DetailEcueEnseignant` (`idDetail`, `idEnseignant`, `idEcue`) VALUES
(1, 3, 1),
(2, 2, 3),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Ecue`
--

CREATE TABLE `Ecue` (
  `idEcue` int(11) NOT NULL,
  `idUe` int(11) NOT NULL,
  `creditEcue` int(11) DEFAULT NULL,
  `nomEcue` varchar(254) DEFAULT NULL,
  `heureCmEcue` int(11) DEFAULT NULL,
  `heureTdEcue` int(11) DEFAULT NULL,
  `heureTpEcue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ecue`
--

INSERT INTO `Ecue` (`idEcue`, `idUe`, `creditEcue`, `nomEcue`, `heureCmEcue`, `heureTdEcue`, `heureTpEcue`) VALUES
(1, 1, 2, 'Outils de Programmation', NULL, NULL, NULL),
(2, 1, 2, 'Paradigmes de Programmation', NULL, NULL, NULL),
(3, 1, 2, 'Intergiciels', NULL, NULL, NULL),
(4, 2, 2, 'Concepts et Architecture', NULL, NULL, NULL),
(5, 2, 2, 'Projet de mise en œuvre', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Enseignant`
--

CREATE TABLE `Enseignant` (
  `idEnseignant` int(11) NOT NULL,
  `idGrade` int(11) DEFAULT NULL,
  `idDepartement` int(11) NOT NULL,
  `matriculeEnseignant` varchar(254) DEFAULT NULL,
  `passwordEnseignant` varchar(254) NOT NULL,
  `nomEnseignant` varchar(254) DEFAULT NULL,
  `prenomEnseignant` varchar(254) DEFAULT NULL,
  `dateNaissEnseignant` datetime DEFAULT NULL,
  `telephoneEnseignant` varchar(254) DEFAULT NULL,
  `emailEnseignant` varchar(254) DEFAULT NULL,
  `idPoste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Enseignant`
--

INSERT INTO `Enseignant` (`idEnseignant`, `idGrade`, `idDepartement`, `matriculeEnseignant`, `passwordEnseignant`, `nomEnseignant`, `prenomEnseignant`, `dateNaissEnseignant`, `telephoneEnseignant`, `emailEnseignant`, `idPoste`) VALUES
(1, 1, 2, 'RT185223N', '$2y$10$m1GdPDBiPqIO2Bvq36ZEOekG8nqFKPHGTkHhxo2ZWnxWPIIS4n7Oa', 'Djandjinou', 'Mesmin', '1965-02-17 00:00:00', '78596856', 'mesmin.hotmail.com', 1),
(2, 1, 2, '55gjkhei', '$2y$10$fEUinfsZosB9ckcpZOKdg.tYGXkr97y1uwVFy4tRcjNp8vP/h90f2', 'SABANE/ZERBO', 'Aminata', '2020-05-05 00:00:00', '88964444', 'aminata@gmail.com', 0),
(3, 2, 2, 'NM585565D', '$2y$10$fEUinfsZosB9ckcpZOKdg.tYGXkr97y1uwVFy4tRcjNp8vP/h90f2', 'Belem', 'Mahamoud', '1976-02-15 00:00:00', '75896235', 'belem@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `idEtudiant` int(11) NOT NULL,
  `idNiveau` int(11) DEFAULT NULL,
  `matriculeEtudiant` varchar(254) DEFAULT NULL,
  `nomEtudiant` varchar(254) DEFAULT NULL,
  `prenomEtudiant` varchar(254) DEFAULT NULL,
  `dateNaissEtudiant` datetime DEFAULT NULL,
  `lieuNaissEtudiant` varchar(254) DEFAULT NULL,
  `telephoneEtudiant` varchar(254) DEFAULT NULL,
  `emailEtudiant` varchar(254) DEFAULT NULL,
  `passwordEtudiant` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Evaluation`
--

CREATE TABLE `Evaluation` (
  `idEvaluation` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `noteEvaluation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Examen`
--

CREATE TABLE `Examen` (
  `idExamen` int(11) NOT NULL,
  `nomExamen` varchar(254) DEFAULT NULL,
  `dateDebutExamen` datetime DEFAULT NULL,
  `dateFinExamen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Grade`
--

CREATE TABLE `Grade` (
  `idGrade` int(11) NOT NULL,
  `codeGrade` varchar(254) DEFAULT NULL,
  `nomGrade` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Grade`
--

INSERT INTO `Grade` (`idGrade`, `codeGrade`, `nomGrade`) VALUES
(1, 'Maitre de conférence', ''),
(2, 'Maitre assistant', '');

-- --------------------------------------------------------

--
-- Table structure for table `Horaire`
--

CREATE TABLE `Horaire` (
  `idHoraire` int(11) NOT NULL,
  `heureDebut` datetime DEFAULT NULL,
  `heureFin` datetime DEFAULT NULL,
  `nomJour` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Niveau`
--

CREATE TABLE `Niveau` (
  `idNiveau` int(11) NOT NULL,
  `codeNiveau` varchar(254) DEFAULT NULL,
  `nomNiveau` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Niveau`
--

INSERT INTO `Niveau` (`idNiveau`, `codeNiveau`, `nomNiveau`) VALUES
(1, 'L1', 'Licence 1ere année'),
(2, 'L2', 'Licence 2eme année'),
(3, 'M1', 'Master 1ere année'),
(4, 'M2', 'Master 2 eme année');

-- --------------------------------------------------------

--
-- Table structure for table `Poste`
--

CREATE TABLE `Poste` (
  `idPoste` int(11) NOT NULL,
  `idEnseignant` int(11) DEFAULT NULL,
  `codePoste` varchar(254) DEFAULT NULL,
  `nomPoste` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RapportSurveillance`
--

CREATE TABLE `RapportSurveillance` (
  `idSurveillant` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `idRapportSurveillance` int(11) NOT NULL,
  `dateRapportSurveillance` datetime DEFAULT NULL,
  `commentaireRapportSurveillance` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Salle`
--

CREATE TABLE `Salle` (
  `idSalle` int(11) NOT NULL,
  `nomSalle` varchar(254) DEFAULT NULL,
  `codeSalle` varchar(254) DEFAULT NULL,
  `nombrePlaceSalle` int(11) DEFAULT NULL,
  `idTypeSalle` int(11) NOT NULL,
  `descriptionSalle` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Salle`
--

INSERT INTO `Salle` (`idSalle`, `nomSalle`, `codeSalle`, `nombrePlaceSalle`, `idTypeSalle`, `descriptionSalle`) VALUES
(1, 'Salle Master 1', NULL, 30, 2, NULL),
(2, 'Amphi A600', NULL, 600, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Surveillant`
--

CREATE TABLE `Surveillant` (
  `idSurveillant` int(11) NOT NULL,
  `nomSurveillant` varchar(254) DEFAULT NULL,
  `prenomSurveillant` varchar(254) DEFAULT NULL,
  `telephoneSurveillant` varchar(254) DEFAULT NULL,
  `passwordSurveillant` varchar(254) NOT NULL,
  `emailSurveillant` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TypeCours`
--

CREATE TABLE `TypeCours` (
  `idTypeCours` int(11) NOT NULL,
  `codeTypeCours` varchar(254) DEFAULT NULL,
  `nomTypeCours` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TypeCours`
--

INSERT INTO `TypeCours` (`idTypeCours`, `codeTypeCours`, `nomTypeCours`) VALUES
(1, 'CM', 'Cours magistral'),
(2, 'TD', 'Travaux Dirigés'),
(3, 'TP', 'Travaux Pratiques'),
(4, 'DEV', 'Devoir');

-- --------------------------------------------------------

--
-- Table structure for table `TypeSalle`
--

CREATE TABLE `TypeSalle` (
  `idTypeSalle` int(11) NOT NULL,
  `codeTypeSalle` varchar(254) NOT NULL,
  `nomTypeSalle` varchar(254) NOT NULL,
  `statusTypeSalle` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TypeSalle`
--

INSERT INTO `TypeSalle` (`idTypeSalle`, `codeTypeSalle`, `nomTypeSalle`, `statusTypeSalle`) VALUES
(1, 'SALLE-AMPHI', 'Amphithéatre', 1),
(2, 'SALLE-MACHINE', 'Salle de travaux prratique en Informatique', 1),
(3, 'SALLE-LABO', 'Salle de laboratoire', 1),
(4, 'SALLE-SIMPLE', 'Salle de cours ordinaire', 1),
(5, 'SALLEONLINE', ' Salle de cours en ligne', 1);

-- --------------------------------------------------------

--
-- Table structure for table `UniteEnseignement`
--

CREATE TABLE `UniteEnseignement` (
  `idUe` int(11) NOT NULL,
  `codeUe` varchar(254) DEFAULT NULL,
  `nomUe` varchar(254) DEFAULT NULL,
  `creditUe` int(11) DEFAULT NULL,
  `idNiveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UniteEnseignement`
--

INSERT INTO `UniteEnseignement` (`idUe`, `codeUe`, `nomUe`, `creditUe`, `idNiveau`) VALUES
(1, 'UEF INF 4000', 'Génie Logiciel', NULL, 3),
(2, 'UEF INF 4010', 'Bases de données', NULL, 3),
(3, 'UEF INF 4020', 'Réseaux et Services', NULL, 3),
(4, 'UEF INF 4030', 'Conception Orientée Objet', NULL, 3),
(5, 'UEF INF 4040', 'Technologies Web', NULL, 3),
(6, 'UEF INF 4050', 'Système et sécurité', NULL, 3),
(7, 'UEF INF 4500', 'Recherche Opérationnelle', NULL, 3),
(8, 'UEF INF 4510', 'Analyse de données', NULL, 3),
(9, 'UEF INF 4520', 'Modélisation et Simulation', NULL, 3),
(10, 'UEF INF 4530', 'Compilation et Théorie des langages', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cours`
--
ALTER TABLE `Cours`
  ADD PRIMARY KEY (`idCours`),
  ADD KEY `idCours` (`idCours`),
  ADD KEY `idCours_2` (`idCours`);

--
-- Indexes for table `Departement`
--
ALTER TABLE `Departement`
  ADD PRIMARY KEY (`idDepartement`);

--
-- Indexes for table `DetailCoursSalle`
--
ALTER TABLE `DetailCoursSalle`
  ADD PRIMARY KEY (`idDetailCoursSalle`);

--
-- Indexes for table `DetailEcueEnseignant`
--
ALTER TABLE `DetailEcueEnseignant`
  ADD PRIMARY KEY (`idDetail`);

--
-- Indexes for table `Ecue`
--
ALTER TABLE `Ecue`
  ADD PRIMARY KEY (`idEcue`);

--
-- Indexes for table `Enseignant`
--
ALTER TABLE `Enseignant`
  ADD PRIMARY KEY (`idEnseignant`);

--
-- Indexes for table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`idEtudiant`);

--
-- Indexes for table `Evaluation`
--
ALTER TABLE `Evaluation`
  ADD PRIMARY KEY (`idEvaluation`);

--
-- Indexes for table `Examen`
--
ALTER TABLE `Examen`
  ADD PRIMARY KEY (`idExamen`);

--
-- Indexes for table `Grade`
--
ALTER TABLE `Grade`
  ADD PRIMARY KEY (`idGrade`);

--
-- Indexes for table `Horaire`
--
ALTER TABLE `Horaire`
  ADD PRIMARY KEY (`idHoraire`);

--
-- Indexes for table `Niveau`
--
ALTER TABLE `Niveau`
  ADD PRIMARY KEY (`idNiveau`);

--
-- Indexes for table `Poste`
--
ALTER TABLE `Poste`
  ADD PRIMARY KEY (`idPoste`);

--
-- Indexes for table `RapportSurveillance`
--
ALTER TABLE `RapportSurveillance`
  ADD PRIMARY KEY (`idRapportSurveillance`),
  ADD KEY `FK_association16` (`idSurveillant`);

--
-- Indexes for table `Salle`
--
ALTER TABLE `Salle`
  ADD PRIMARY KEY (`idSalle`),
  ADD KEY `TypeSalle_Salle` (`idTypeSalle`);

--
-- Indexes for table `Surveillant`
--
ALTER TABLE `Surveillant`
  ADD PRIMARY KEY (`idSurveillant`);

--
-- Indexes for table `TypeCours`
--
ALTER TABLE `TypeCours`
  ADD PRIMARY KEY (`idTypeCours`);

--
-- Indexes for table `TypeSalle`
--
ALTER TABLE `TypeSalle`
  ADD PRIMARY KEY (`idTypeSalle`);

--
-- Indexes for table `UniteEnseignement`
--
ALTER TABLE `UniteEnseignement`
  ADD PRIMARY KEY (`idUe`),
  ADD KEY `niveau_UniteEnseignement` (`idNiveau`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cours`
--
ALTER TABLE `Cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Departement`
--
ALTER TABLE `Departement`
  MODIFY `idDepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `DetailEcueEnseignant`
--
ALTER TABLE `DetailEcueEnseignant`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Ecue`
--
ALTER TABLE `Ecue`
  MODIFY `idEcue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Enseignant`
--
ALTER TABLE `Enseignant`
  MODIFY `idEnseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Grade`
--
ALTER TABLE `Grade`
  MODIFY `idGrade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Niveau`
--
ALTER TABLE `Niveau`
  MODIFY `idNiveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Salle`
--
ALTER TABLE `Salle`
  MODIFY `idSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `TypeCours`
--
ALTER TABLE `TypeCours`
  MODIFY `idTypeCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `TypeSalle`
--
ALTER TABLE `TypeSalle`
  MODIFY `idTypeSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `UniteEnseignement`
--
ALTER TABLE `UniteEnseignement`
  MODIFY `idUe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `RapportSurveillance`
--
ALTER TABLE `RapportSurveillance`
  ADD CONSTRAINT `FK_association16` FOREIGN KEY (`idSurveillant`) REFERENCES `Surveillant` (`idSurveillant`);

--
-- Constraints for table `Salle`
--
ALTER TABLE `Salle`
  ADD CONSTRAINT `TypeSalle_Salle` FOREIGN KEY (`idTypeSalle`) REFERENCES `TypeSalle` (`idTypeSalle`);

--
-- Constraints for table `UniteEnseignement`
--
ALTER TABLE `UniteEnseignement`
  ADD CONSTRAINT `niveau_UniteEnseignement` FOREIGN KEY (`idNiveau`) REFERENCES `Niveau` (`idNiveau`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
